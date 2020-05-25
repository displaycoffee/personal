<?php
	// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) exit;

	// Class for putting together all the meta box goodness
	class CSTMSTFF_Post_Meta_Box {
		// protected $_key;
		// protected $_meta_field;

		// Add actions for meta boxes
		function __construct( $meta_key, $meta_value, $obj ) {
			// Setting up "global" variables
			$this->meta_key = $meta_key;
			$this->meta_value = $meta_value;
			$this->obj = $obj;

			// Add actions for meta boxes
			add_action( 'admin_menu', array( &$this, 'add' ) );
			add_action( 'save_post', array( &$this, 'save' ) );
		}

		// Add meta box
		function add() {
			add_meta_box(
				$this->meta_key,
				$this->meta_value['title'],
				array( &$this, 'show' ),
				$this->meta_value['page'],
				$this->meta_value['context'],
				$this->meta_value['priority']
			);
		}

		// Show meta box
		function show( $post ) {
			// global $post;

			// Use nonce for verification
			$open = '<input type="hidden" name="meta_field_nonce" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';

			// Opening div to style meta
			$open .= '<div class="' . $this->obj['prefix'] . '-meta-fields">';

			// Loop through each meta box
			$fields = '';
			foreach ( $this->meta_value['fields'] as $field_key => $field_value ) {
				// Get the post meta
				$post_meta_data = get_post_meta( $post->ID, $field_key, true );

				// Common display value
				$post_meta_value = isset( $post_meta_data ) ? $post_meta_data : false;

				// Main class
				$field_class = $this->obj['prefix'] . '-field';

				// Other classes
				$field_class_type =  $field_class . ' ' . $field_class . '-' . $field_value['type'];
				$field_class_label = $field_class . '-label';
				$field_class_value = $field_class . '-value';

				// Multi-type classes
				$field_class_row = ( $field_value['multi'] ) ? ( ' ' . $field_class . '-row' ) : '';
				$field_class_column = ( $field_value['multi'] ) ? ( ' ' . $field_class . '-column' ) : '';

				// Create and display opening HTML block
				$fields .= '<div class="' . $field_class_type . '">';
				$fields .= '<div class="' . $field_class_label . $field_class_row . '">';
				$fields .= '<label for="' . $field_key . '">' . $field_value['label'] . '</label>';
				$fields .= '</div>';
				$fields .= '<div class="' . $field_class_value . $field_class_row . '">';

				if ( $field_value['multi'] ) {
					// Loop through multiple text fields
					foreach ( $field_value['options'] as $option_key => $option_value ) {
						// Get the multitext meta
						$multitext_data = get_post_meta( $post->ID, $option_key, true );

						// Common multitext value
						$multitext_value = isset( $multitext_data ) ? $multitext_data : false;

						// Display mutlitext fields
						$fields .= '<div class="' . $field_class_type . $field_class_column . '">';
						$fields .= '<div class="' . $field_class_label . '">';
						$fields .= '<label for=' . $option_key . '>' . $option_value['label'] . '</label>';
						$fields .= '</div>';
						$fields .= '<div class="' . $field_class_value . '">';
						$fields .= cstmstff_display_fields( $option_key, $field_value, $multitext_value );
						$fields .= '</div>';
						$fields .= '</div>';
					}
				} else if ( $field_value['type'] == 'color' ) {
					// Check if color is selected already
					$selected_color = $post_meta_value ? $field_value['validate']( $post_meta_value ) : __( 'No color selected.', $this->obj['lang'] );

					// Display color field
					$fields .= cstmstff_display_fields( $field_key, $field_value, $post_meta_value );
					$fields .= '<div class="' . $this->obj['prefix'] . '-selected-color">';
					$fields .= '<strong>' . __( 'Current Color:', $this->obj['lang'] ) . '</strong> ' . $selected_color;
					$fields .= '</div>';
				} else {
					// Display basic field types
					$fields .= cstmstff_display_fields( $field_key, $field_value, $post_meta_value );
				}

				// Create and display closing HTML block
				$fields .= '</div></div>';
			}
			//
			// 	// Display description if one is there
			// 	cstmstff_display_description( $field );

			// Create closing HTML block
			$close = '</div>';

			echo $open . $fields . $close;
		}

		// Save data from meta box
		function save( $post_id ) {
			// Verify nonce
			if ( !isset( $_POST['meta_field_nonce'] ) || !wp_verify_nonce( $_POST['meta_field_nonce'], basename( __FILE__ ) ) ) {
				return $post_id;
			}

			// Check autosave
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return $post_id;
			}

			// Check permissions
			if ( 'page' == $_POST['post_type'] ) {
				if ( !current_user_can( 'edit_page', $post_id ) ) {
					return $post_id;
				}
			} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
				return $post_id;
			}

			// Validate fields before updating
			// If there is no validate in the array, nothing will save
			foreach ( $this->meta_value['fields'] as $field_key => $field_value ) {
				if ( $field_value['validate'] != '' ) {
					if ( $field_value['multi'] ) {
						foreach ( $field_value['options'] as $option_key => $option_value ) {
							// Get new and old values
							$old = get_post_meta( $post_id, $option_key, true );
							$new = ( isset( $_POST[$option_key] ) ? $field_value['validate']( $_POST[$option_key] ) : '' );

							// Update or delete meta data
							if ( $new && $new != $old || $new === '0' ) {
								update_post_meta( $post_id, $option_key, $new );
							} elseif ( '' == $new && $old || $old === '0' ) {
								delete_post_meta( $post_id, $option_key, $old );
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
						$old = get_post_meta( $post_id, $field_key, true );
						$new = ( isset( $_POST[$field_key] ) ? $validated_value : '' );

						// Update or delete meta data
						if ( $new && $new != $old || $new === '0' ) {
							update_post_meta( $post_id, $field_key, $new );
						} elseif ( '' == $new && $old || $old === '0' ) {
							delete_post_meta( $post_id, $field_key, $old );
						}
					}
				}
			}
		}
	}

	// Go through each meta box array and build them
	foreach ( $post_meta_fields as $meta_key => $meta_value ) {
		new CSTMSTFF_Post_Meta_Box( $meta_key, $meta_value, $obj );
	}
