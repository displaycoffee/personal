<?php
	// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) exit;

	// Loop through basic field types
	function cstmstff_display_fields( $key, $value, $meta_value ) {
		$checked = ' checked="checked"';
		$field_display = '';

		switch ( $value['type'] ) {
			// Text area
			case 'textarea':
				$field_display .= '<textarea name="' . $key . '" id="' . $key . '">' . $value['validate']( $meta_value ) . '</textarea>';
				break;

			// Select drop down
			case 'select':
				$field_display .= '<select name="' . $key . '" id="' . $key . '">';
				foreach ( $value['options'] as $option ) {
					// Check for selected option and set as value
					$selected_option = ( $meta_value == $option ) ? ' selected="selected"' : '';

					// Create option block
					$field_display .= '<option' . $selected_option . '>';
					$field_display .= $value['validate']( $option, $value['options'] );
					$field_display .= '</option>';
				}
				$field_display .= '</select>';
				break;

			//  Radio option
			case 'radio':
				foreach ( $value['options'] as $option_key => $option_value ) {
					// Check for selected radio and set as value
					$selected_option = '';
					if ( $meta_value == $option_value['label'] || ( $option_value['default'] && !$meta_value ) ) {
						$selected_option = $checked;
					}

					// Create option block
					$field_display .= '<input type="radio" name="' . $key . '" id="' . $option_key . '" value="' . $value['validate']( $option_value['label'], $value['options'] ) . '"' . $selected_option . ' />';
				}
				break;

			// Checkbox
			case 'checkbox':
				$selected_option = $meta_value ? $checked : '';
				$field_display .= '<input type="checkbox" name="' . $key . '" value="' . $value['validate']( $value['value'] )  . '" id="' . $key . '"' . $selected_option . ' />';
				break;

			// Default - Used for text, url, date, and color
			default:
				// Classes for date and color
				$field_class = '';
				if ( $value['type'] == 'date' ) {
					$field_class = ' class="date-picker"';
				} else if ( $value['type'] == 'color' ) {
					$field_class = ' class="color-picker"';
				}

				// Field type attribute
				$field_type = $value['type'] == 'url' ? 'url' : 'text';

				// Display final field type
				$field_display .= '<input type="' . $field_type . '" name="' . $key . '" id="' . $key . '" value="' . $value['validate']( $meta_value ) . '"' . $field_class . ' />';




			//
			// // Wordpress Media library
			// case 'media':
			// 	// Check if there's an image already
			// 	$image = $value ? '<div class="image-preview"><strong>' . __( 'Current Image:', 'custom-stuff' ) . '</strong><img src="' . $field['validate']( $value ) . '" /></div>' : '';
			//
			// 	// Create media selection block
			// 	$media_selection = '<div class="media-field">';
			// 	$media_selection .= $image;
			// 	$media_selection .= '<input type="url" name="' . $field['name'] . '" id="' . $field['id'] . '" value="' . $field['validate']( $value ) . '" /><br />';
			// 	$media_selection .= '<input type="button" class="image-select button" value="' . __( 'Choose or Upload an Image', 'custom-stuff' ) . '" />';
			// 	$media_selection .= '<input type="button" class="image-reset button" value="' . __( 'Clear Image', 'custom-stuff' ) . '" />';
			// 	$media_selection .= '</div>';
			//
			// 	// Display media selection block
			// 	echo $media_selection;
			// 	break;
			//
			// // Wordpress Editor
			// case 'editor':
			// 	$settings = array(
			// 		'textarea_name' => $field['name'],
			// 		'editor_class'  => 'cstmstff-editor'
			// 	);
			// 	wp_editor( $value, $field['id'], $settings );
			// 	break;
		}

		return $field_display;
	}

	//
	// // Display description if one is there
	// function cstmstff_display_description( $field ) {
	// 	echo $field['desc'] ? '<p class="description">' . $field['desc'] . '</p>' : '';
	// }
