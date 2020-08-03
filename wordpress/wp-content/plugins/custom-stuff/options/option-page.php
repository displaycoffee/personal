<?php
	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Class for putting together all the option box goodness
	class CSTMSTFF_Option_Page {
		// Contruct variables and actions
		function __construct( $meta_key, $meta_value, $obj ) {
			// Setting up "global" variables
			$this->meta_key = $meta_key;
			$this->meta_value = $meta_value;
			$this->obj = $obj;
			$this->nonce = 'option_field_nonce';

			// Add actions for option boxes
			add_action( 'admin_menu', array( &$this, 'add' ) );
			add_action( 'admin_init', array( &$this, 'register' ) );
		}

		// Add options page
		function add() {
			add_submenu_page(
				$this->meta_value['parent_slug'],
				$this->meta_value['page_title'],
				$this->meta_value['menu_title'],
				$this->meta_value['capability'],
				$this->meta_value['menu_slug'],
				array( &$this, 'show_page' )
			);
		}

		// Show options page
		function show_page() {
			// Create and display opening HTML block
			$opening = '<div class="' . $this->obj['prefix'] . '-options wrap">';
			$opening .= '<h1>' . $this->meta_value['page_title'] . '</h1>';
			$opening .= '<form method="post" action="options.php">';
			echo $opening;

			// Use nonce for verification
			echo '<input type="hidden" name="' . $this->nonce . '" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';

			// Add fields
			settings_fields( $this->meta_value['options_group'] );

			// Add sections
			do_settings_sections( $this->meta_value['menu_slug'] );

			// Create and display closing HTML block
			$closing = '<p class="submit"> ';
			$closing .= submit_button();
			$closing .= '</p>';
			$closing .= '</form>';
			$closing .= '</div>';
			echo $closing;
		}

		// Register sections and fields to place on options page
		function register() {
			// Register settings
			register_setting(
				$this->meta_value['options_group'],
				$this->meta_value['options_group'],
				array( &$this, 'save' )
			);

			// Loop through sections and add
			foreach ( $this->meta_value['sections'] as $section_key => $section_value ) {
				add_settings_section(
					$section_key,
					$section_value['title'],
					array( &$this, 'show_section' ),
					$this->meta_value['menu_slug']
				);
			}

			// Loop through fields and add
			foreach ( $this->meta_value['fields'] as $field_key => $field_value ) {
				// Add to value properties
				$field_value['id'] = $field_key;
				$field_value['name'] = $this->meta_value['options_group'] . '[' . $field_key . ']';

				// Field class
				$field_class = $this->obj['classes']['field'];
				$field_class_type = ' ' . $this->obj['classes']['field'] . '-' . $field_value['type'];

				// Arguments for adding onto the th / label element
				$field_args = array(
					'label_for' => $field_key,
					'class'     => $field_class . $field_class_type,
				);

				// Add fields
				add_settings_field(
					$field_key,
					$field_value['label'],
					array( &$this, 'show_fields' ),
					$this->meta_value['menu_slug'],
					$field_value['section'],
					array_merge( $field_args, $field_value )
				);
			}
		}

		// Show extra section content
		function show_section( $section ) {
			foreach ( $this->meta_value['sections'] as $section_key => $section_value ) {
				if ( $section_key == $section['id'] ) {
					echo '<p>' . $section_value['desc'] . '</p>';
				}
			}
		}

		function show_fields( $field ) {
			// Set up variables for fields
			$field_key = $field['id'];
			$field_value = $field;

			// Get the option data and value
			$option_meta_data = get_option( $this->meta_value['options_group'] );
			$option_meta_value = isset( $option_meta_data[$field_key] ) ? $option_meta_data[$field_key] : false;

			if ( $field_value['multi'] ) {
				// Create and display opening row HTML block
				$fields = '<div class="' . $this->obj['classes']['row'] . '">';

				// Loop through multiple text and checkbox fields
				foreach ( $field_value['options'] as $option_key => $option_value ) {
					// Get the multi meta data and value
					$multitext_data = get_option( $this->meta_value['options_group'] );
					$multitext_value = isset( $option_meta_data[$option_key] ) ? $option_meta_data[$option_key] : false;

					// Add to option properties
					$option_value['name'] = $this->meta_value['options_group'] . '[' . $option_key . ']';
					$option_value['type'] = $field_value['type'];
					$option_value['validate'] = $field_value['validate'];
					$option_value['value'] = $field_value['value'];
					$option_value['parent'] = true;

					// Display mutli fields
					$fields .= cstmstff_get_layout_open( $this->obj['classes'], $option_key, $option_value, 'div' );
					$fields .= cstmstff_display_fields( $option_key, $option_value, $multitext_value, $this->obj );
					$fields .= cstmstff_get_layout_close( $this->obj['classes'], $option_value, 'div' );
				}

				// Create and display closing row HTML block
				$fields .= '</div>';
			} else {
				// Display all other field types
				$fields = cstmstff_display_fields( $field_key, $field_value, $option_meta_value, $this->obj );
			}

			// Add description if there is one
			// Can't use cstmstff_get_layout_close for this since the options page is set up different
			if ( $field_value['desc'] ) {
				$fields .= '<p class="' . $this->obj['classes']['desc'] . '">' . $field_value['desc'] . '</p>';
			}

			// Display all field HTML
			echo $fields;
		}

		// Save data from fields
		function save( $input_id ) {
			// Verify nonce
			if ( !isset( $_POST[$this->nonce] ) || !wp_verify_nonce( $_POST[$this->nonce], basename( __FILE__ ) ) ) {
				return $input_id;
			}

			// Validate fields before updating
			// If there is no validate in the array, nothing will save
			foreach( $input_id as $input_key => $input_value ) {
				foreach ( $this->meta_value['fields'] as $field_key => $field_value ) {
					if ( $field_value['validate'] != '' ) {
						if ( $field_value['multi'] ) {
							foreach ( $field_value['options'] as $option_key => $option_value ) {
								if ( $option_key == $input_key ) {
									// Update or delete meta data
									$new[$input_key] = $field_value['validate']( $input_value );
								}
							}
						} else if ( $field_key == $input_key ) {
							// Some validate functions pass an extra parameter
							if ( $field_value['type'] == 'select' || $field_value['type'] == 'radio' ) {
								$validated_value = $field_value['validate']( $input_value, $field_value['options'] );
							} else {
								$validated_value = $field_value['validate']( $input_value );
							}

							// Update or delete meta data
							$new[$input_key] = $validated_value;
						}
					}
				}
			}
			return $new;
		}
	}

	// Go through each option array and build them
	foreach ( $option_fields as $meta_key => $meta_value ) {
		new CSTMSTFF_Option_Page( $meta_key, $meta_value, $obj );
	}
