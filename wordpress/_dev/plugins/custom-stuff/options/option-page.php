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

			// Add settings
			do_settings_sections( $this->meta_value['menu_slug'] );

			// Create and display closing HTML block
			$closing = '<p class="submit"> ';
			$closing .= '<input type="submit" class="button button-primary" value="' . __( 'Save Changes', $this->obj['lang'] ) . '" />';
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

			// Add sections
			foreach ( $this->meta_value['sections'] as $section_key => $section_value ) {
				add_settings_section(
					$section_key,
					$section_value['title'],
					array( &$this, 'show_section' ),
					$this->meta_value['menu_slug']
				);
			}

			// Add fields
			foreach ( $this->meta_value['fields'] as $field_key => $field_value ) {
				// Add id to field_value
				$field_value['id'] = $field_key;
				$field_value['name'] = $this->meta_value['options_group'] . '[' . $field_key . ']';

				add_settings_field(
					$field_key,
					$field_value['label'],
					array( &$this, 'show_fields' ),
					$this->meta_value['menu_slug'],
					$field_value['section'],
					$field_value
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
				// Loop through multiple text and checkbox fields
				$fields = '';
			} else {
				// Display all other field types
				$fields = cstmstff_display_fields( $field_key, $field_value, $option_meta_value, $this->obj );
			}

			// Display all field HTML
			echo $fields;

			// Loop through basic field types
			// if ( $field )
			// echo cstmstff_display_fields( $field['id'], $field, $option_meta_value, $this->obj );

			// cstmstff_display_fields( $field, $value );
			//
		    // // Display description if one is there
            // cstmstff_display_description( $field );
		}

		// Save data from fields
		function save( $input ) {
			// Verify nonce
			if ( !isset( $_POST[$this->nonce] ) || !wp_verify_nonce( $_POST[$this->nonce], basename( __FILE__ ) ) ) {
				return;
			}

			// Validate fields before updating
			if ( isset( $input ) ) {
				foreach( $input as $k => $v ) {
					foreach ( $this->meta_value['fields'] as $field_key => $field_value ) {
						if ( $field_key == $k ) {
							//$new[$k] = $field_value['validate']( $v );
							$new[$k] = $v;
						}
					}
				}
				return $new;
			}
		}
	}

	// Go through each meta box array and build them
	foreach ( $option_fields as $meta_key => $meta_value ) {
		new CSTMSTFF_Option_Page( $meta_key, $meta_value, $obj );
	}
