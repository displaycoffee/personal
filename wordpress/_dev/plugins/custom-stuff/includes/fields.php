<?php
	// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) exit;

	// Display opening type HTML
	function cstmstff_display_type( $value, $obj, $column ) {
		$field_class_column = ( $column ) ? ( ' ' . $obj['classes']['field'] . '-column' ) : '';
		return '<div class="' . $obj['classes']['field'] . ' ' . $obj['classes']['field'] . '-' . $value['type'] . $field_class_column . '">';
	}

	// Display opening layout HTML
	function cstmstff_display_layout( $layout, $value, $obj ) {
		$field_class_row = ( $value['multi'] ) ? ( ' ' . $obj['classes']['field'] . '-row' ) : '';
		return '<div class="' . $obj['classes'][$layout] . $field_class_row . '">';
	}

	// Display field type labels and descriptions
	function cstmstff_display_label( $key, $value, $obj ) {
		$label_display = cstmstff_display_layout( 'label', $value, $obj );
		$label_display .= '<label for="' . $key . '">' . $value['label'] . '</label>';
		$label_display .= ( $value['desc'] ) ? '<p class="' . $obj['classes']['desc'] . '">' . $value['desc'] . '</p>' : '';
		$label_display .= '</div>';
		return $label_display;
	}

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
				$field_type = ( $value['type'] == 'url' || $value['type'] == 'media' ) ? 'url' : 'text';

				// Display final field type
				$field_display .= '<input type="' . $field_type . '" name="' . $key . '" id="' . $key . '" value="' . $value['validate']( $meta_value ) . '"' . $field_class . ' />';
		}

		return $field_display;
	}
