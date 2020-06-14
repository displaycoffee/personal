<?php
	// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) exit;

	// Class for putting together all the meta box goodness
	class CSTMSTFF_Term_Meta_Box {
		// Add actions for meta boxes
		function __construct( $meta_key, $meta_value, $obj ) {
			// Setting up "global" variables
			$this->meta_key = $meta_key;
			$this->meta_value = $meta_value;
			$this->obj = $obj;

			// Add actions for meta boxes
			add_action( $meta_value['category'] . '_add_form_fields', array( &$this, 'add' ), 10, 2 );
			add_action( $meta_value['category'] . '_edit_form_fields', array( &$this, 'edit' ), 10, 2 );
			add_action( 'created_' . $meta_value['category'], array( &$this, 'save' ), 10, 2 );
			add_action( 'edited_' . $meta_value['category'], array( &$this, 'save' ), 10, 2 );
			// add_filter( 'manage_edit-' . $meta_value['category'] . '_columns', array( &$this, 'add_column' ) );
			// add_filter( 'manage_' . $meta_value['category'] . '_custom_column', array( &$this, 'add_column_content' ), 10, 3 );
			// add_filter( 'manage_edit-' . $meta_value['category'] . '_sortable_columns', array( &$this, 'add_column_sort' ) );
		}

		// Show meta box on add term page
		function add( $term ) {
			// Use nonce for verification
			$open = '<input type="hidden" name="term_meta_field_nonce" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';

			// Loop through each meta box
			$fields = '';
			foreach ( $this->meta_value['fields'] as $field_key => $field_value ) {
				// Get the meta data and value
				$term_meta_data = false;
				$term_meta_value = isset( $term_meta_data ) ? $term_meta_data : false;

				// START - Create and display opening HTML block
				$fields .= cstmstff_display_open( $field_key, $field_value, $field_value['type'], $this->obj, false );

				if ( $field_value['multi'] ) {
					// Loop through multiple text and checkbox fields
					foreach ( $field_value['options'] as $option_key => $option_value ) {
						// Get the multi meta data and value
						$multitext_data = false;
						$multitext_value = isset( $multitext_data ) ? $multitext_data : false;

						// Display mutli fields
						$fields .= cstmstff_display_open( $option_key, $option_value, $field_value['type'], $this->obj, true );
						$fields .= cstmstff_display_fields( $option_key, $field_value, $multitext_value, $this->obj );
						$fields .= cstmstff_display_close();
					}
				} else {
					// Display all other field types
					$fields .= cstmstff_display_fields( $field_key, $field_value, $term_meta_value, $this->obj );
				}

				// Create and display closing HTML block
				$fields .= cstmstff_display_close();
			}

			// Display all field HTML
			echo $open . $fields . $close;
		}

		// Show meta box on edit term page
		function edit( $term ) {
			// Use nonce for verification
			$open = '<input type="hidden" name="term_meta_field_nonce" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';

			// Loop through each meta box
			$fields = '';
			foreach ( $this->meta_value['fields'] as $field_key => $field_value ) {
				// Get the meta data and value
				$term_meta_data = get_term_meta( $term->term_id, $field_key, true );
				$term_meta_value = isset( $term_meta_data ) ? $term_meta_data : false;

				// START - Create and display opening HTML block
				$fields .= cstmstff_display_open( $field_key, $field_value, $field_value['type'], $this->obj, false );

				if ( $field_value['multi'] ) {
					// Loop through multiple text and checkbox fields
					foreach ( $field_value['options'] as $option_key => $option_value ) {
						// Get the multi meta data and value
						$multitext_data = get_term_meta( $term->term_id, $option_key, true );
						$multitext_value = isset( $multitext_data ) ? $multitext_data : false;

						// Display mutli fields
						$fields .= cstmstff_display_open( $option_key, $option_value, $field_value['type'], $this->obj, true );
						$fields .= cstmstff_display_fields( $option_key, $field_value, $multitext_value, $this->obj );
						$fields .= cstmstff_display_close();
					}
				} else {
					// Display all other field types
					$fields .= cstmstff_display_fields( $field_key, $field_value, $term_meta_value, $this->obj );
				}

				// Create and display closing HTML block
				$fields .= cstmstff_display_close();
			}

			// Display all field HTML
			echo $open . $fields . $close;
		}

		// Save data from meta box
		function save( $term_id ) {
			// Verify nonce
			if ( !isset( $_POST['term_meta_field_nonce'] ) || !wp_verify_nonce( $_POST['term_meta_field_nonce'], basename( __FILE__ ) ) ) {
				return $term_id;
			}

			// Check permissions
			if ( !current_user_can( 'manage_categories' ) ) {
				return $term_id;
			}

			// Validate fields before updating
			// If there is no validate in the array, nothing will save
			foreach ( $this->meta_value['fields'] as $field_key => $field_value ) {
				if ( $field_value['validate'] != '' ) {
					if ( $field_value['multi'] ) {
						foreach ( $field_value['options'] as $option_key => $option_value ) {
							// Get new and old values
							$old = get_term_meta( $term_id, $option_key, true );
							$new = ( isset( $_POST[$option_key] ) ? $field_value['validate']( $_POST[$option_key] ) : '' );

							// Update or delete meta data
							if ( $new && $new != $old || $new === '0' ) {
								update_term_meta( $term_id, $option_key, $new );
							} elseif ( '' == $new && $old || $old === '0' ) {
								delete_term_meta( $term_id, $option_key, $old );
							}
						}
					} else {
						// Some vaidate functions pass an extra parameter
						if ( $field_value['type'] == 'select' || $field_value['type'] == 'radio' ) {
							$validated_value = $field_value['validate']( $_POST[$field_key], $field_value['options'] );
						} else {
							$validated_value = $field_value['validate']( $_POST[$field_key] );
						}

						// Get new and old values
						$old = get_term_meta( $term_id, $field_key, true );
						$new = ( isset( $_POST[$field_key] ) ? $validated_value : '' );

						// Update or delete meta data
						if ( $new && $new != $old || $new === '0' ) {
							update_term_meta( $term_id, $field_key, $new );
						} elseif ( '' == $new && $old || $old === '0' ) {
							delete_term_meta( $term_id, $field_key, $old );
						}
					}
				}
			}
		}
	}

	// Go through each meta box array and build them
	foreach ( $term_meta_fields as $meta_key => $meta_value ) {
		new CSTMSTFF_Term_Meta_Box( $meta_key, $meta_value, $obj );
	}
