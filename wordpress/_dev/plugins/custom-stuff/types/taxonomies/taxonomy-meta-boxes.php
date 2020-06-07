<?php
	// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) exit;

	// Class for putting together all the meta box goodness
	class CSTMSTFF_Taxonomy_Meta_Box {
		// Add actions for meta boxes
		function __construct( $meta_key, $meta_value, $obj ) {
			// Setting up "global" variables
			$this->meta_key = $meta_key;
			$this->meta_value = $meta_value;
			$this->obj = $obj;

			// Add actions for meta boxes
			add_action( $meta_value['category'] . '_add_form_fields', array( &$this, 'add' ), 10, 2 );
			// add_action( $meta_value['category'] . '_edit_form_fields', array( &$this, 'edit_meta' ), 10, 2 );
			// add_action( 'created_' . $meta_value['category'], array( &$this, 'save' ), 10, 2 );
			// add_action( 'edited_' . $meta_value['category'], array( &$this, 'save' ), 10, 2 );
			// add_filter( 'manage_edit-' . $meta_value['category'] . '_columns', array( &$this, 'add_column' ) );
			// add_filter( 'manage_' . $meta_value['category'] . '_custom_column', array( &$this, 'add_column_content' ), 10, 3 );
			// add_filter( 'manage_edit-' . $meta_value['category'] . '_sortable_columns', array( &$this, 'add_column_sort' ) );
		}

		// Show meta box
		function add( $taxonomy ) {
			// Use nonce for verification
			$open = '<input type="hidden" name="taxonomy_meta_field_nonce" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';

			// Opening div to style meta
			$open .= '<div class="' . $this->obj['classes']['fields'] . '-meta-fields">';

			// Loop through each meta box
			$fields = '';
			foreach ( $this->meta_value['fields'] as $field_key => $field_value ) {
				// Common display value
				$taxonomy_meta_value = false;

				// START - Create and display opening HTML block
				$fields .= cstmstff_display_type( $field_value, $this->obj, false );
				$fields .= cstmstff_display_label( $field_key, $field_value, $this->obj );
				$fields .= cstmstff_display_layout( 'value', $field_value, $this->obj );

				if ( $field_value['multi'] ) {
					// Loop through multiple text fields
					foreach ( $field_value['options'] as $option_key => $option_value ) {
						// Display mutlitext fields
						$fields .= cstmstff_display_type( $field_value, $this->obj, true );
						$fields .= cstmstff_display_label( $option_key, $option_value, $this->obj );
						$fields .= cstmstff_display_layout( 'value', $option_value, $this->obj );
						$fields .= cstmstff_display_fields( $option_key, $field_value, $taxonomy_meta_value );
						$fields .= '</div></div>'; // End for cstmstff_display_layout and cstmstff_display_type
					}
				} else if ( $field_value['type'] == 'media' ) {
					// Button classes
					$media_select = 'is-primary media-select';
					$media_reset = 'is-secondary media-reset';

					// Create media selection block
					$fields .= '<div class="media-picker">';
					$fields .= cstmstff_display_fields( $field_key, $field_value, $taxonomy_meta_value );
					$fields .= '<button type="button" class="components-button ' . $media_select . '" />' . __( 'Choose Image', $this->obj['lang'] ) . '</button>';
					$fields .= '<button type="button" class="components-button ' . $media_reset . '" />' . __( 'Clear Image', $this->obj['lang'] ) . '</button>';
					$fields .= '</div>';
				} else {
					// Display basic field types
					$fields .= cstmstff_display_fields( $field_key, $field_value, $taxonomy_meta_value );
				}

				// Create and display closing HTML block
				$fields .= '</div></div>'; // End for cstmstff_display_layout and cstmstff_display_type
			}

			// Create closing HTML block
			$close = '</div>'; // End for previous opening meta fields

			// Display all field HTML
			echo $open . $fields . $close;
		}
		//
		// // Save data from meta box
		// function save( $post_id ) {
		// 	// Verify nonce
		// 	if ( !isset( $_POST['meta_field_nonce'] ) || !wp_verify_nonce( $_POST['meta_field_nonce'], basename( __FILE__ ) ) ) {
		// 		return $post_id;
		// 	}
		//
		// 	// Check autosave
		// 	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		// 		return $post_id;
		// 	}
		//
		// 	// Check permissions
		// 	if ( 'page' == $_POST['post_type'] ) {
		// 		if ( !current_user_can( 'edit_page', $post_id ) ) {
		// 			return $post_id;
		// 		}
		// 	} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
		// 		return $post_id;
		// 	}
		//
		// 	// Validate fields before updating
		// 	// If there is no validate in the array, nothing will save
		// 	foreach ( $this->meta_value['fields'] as $field_key => $field_value ) {
		// 		if ( $field_value['validate'] != '' ) {
		// 			if ( $field_value['multi'] ) {
		// 				foreach ( $field_value['options'] as $option_key => $option_value ) {
		// 					// Get new and old values
		// 					$old = get_post_meta( $post_id, $option_key, true );
		// 					$new = ( isset( $_POST[$option_key] ) ? $field_value['validate']( $_POST[$option_key] ) : '' );
		//
		// 					// Update or delete meta data
		// 					if ( $new && $new != $old || $new === '0' ) {
		// 						update_post_meta( $post_id, $option_key, $new );
		// 					} elseif ( '' == $new && $old || $old === '0' ) {
		// 						delete_post_meta( $post_id, $option_key, $old );
		// 					}
		// 				}
		// 			} else {
		// 				// Some vaidate functions pass an extra parameter
		// 				if ( $field_value['type'] == 'select' || $field_value['type'] == 'radio' ) {
		// 					$validated_value = $field_value['validate']( $_POST[$field_key], $field_value['options'] );
		// 				} else {
		// 					$validated_value = $field_value['validate']( $_POST[$field_key] );
		// 				}
		//
		// 				// Get new and old values
		// 				$old = get_post_meta( $post_id, $field_key, true );
		// 				$new = ( isset( $_POST[$field_key] ) ? $validated_value : '' );
		//
		// 				// Update or delete meta data
		// 				if ( $new && $new != $old || $new === '0' ) {
		// 					update_post_meta( $post_id, $field_key, $new );
		// 				} elseif ( '' == $new && $old || $old === '0' ) {
		// 					delete_post_meta( $post_id, $field_key, $old );
		// 				}
		// 			}
		// 		}
		// 	}
		// }
	}

	// Go through each meta box array and build them
	foreach ( $taxonomy_meta_fields as $meta_key => $meta_value ) {
		new CSTMSTFF_Taxonomy_Meta_Box( $meta_key, $meta_value, $obj );
	}
