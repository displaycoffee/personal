<?php
	// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) exit;

	// Get form field class
	function cstmstff_get_column( $obj, $type, $has_column, $element ) {
		$column_class = ( $has_column ) ? ( ' ' . $obj['classes']['field'] . '-column' ) : '';
		$column_html = '<' . $element . ' class="' . $obj['classes']['field'] . ' ' . $obj['classes']['field'] . '-' . $type . $column_class .  '">';
		return $column_html;
	}

	// Get form field class
	function cstmstff_get_row( $obj, $element ) {
		$row_html = '<' . $element . ' class="' . $obj['classes']['value'] . '">';
		$row_html .= '<div class="' . $obj['classes']['field'] . '-row' . '">';
		return $row_html;
	}

	// Get label
	function cstmstff_get_label( $obj, $key, $label, $element ) {
		$label_html = '<' . $element . ' class="' . $obj['classes']['label'] . '">';
		$label_html .= '<label for="' . $key . '">' . $label . '</label>';
		$label_html .= '</' . $element . '>';
		return $label_html;
	}

	// Loop through basic field types
	function cstmstff_display_fields( $key, $value, $meta_value, $obj, $element ) {
		$checked = ' checked="checked"';
		$field_display = '<' . $element . ' class="' . $obj['classes']['value'] . '">';

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

			// Color
			case 'color':
				// Check if selected color is available
				if ( $meta_value ) {
					$field_display .= '<div class="selected-color"><strong>' . __( 'Current Color:', $obj['lang'] ) . '</strong>' . $value['validate']( $meta_value ) . '</div>';
				}

				$field_display .= '<input type="text" name="' . $key . '" id="' . $key . '" value="' . $value['validate']( $meta_value ) . '" class="color-picker" />';
				break;

			// Media
			case 'media':
				// Check if selected media is available
				if ( $meta_value ) {
					$field_display .= '<div class="selected-media"><strong>' . __( 'Current Image:', $obj['lang'] ) . '</strong><img src="' . $value['validate']( $meta_value ) . '" /></div>';
				}

				$field_display .= '<div class="media-picker">';
				$field_display .= '<input type="url" name="' . $key . '" id="' . $key . '" value="' . $value['validate']( $meta_value ) . '" />';
				$field_display .= '<button type="button" class="button button-primary media-select" />' . __( 'Choose Image', $obj['lang'] ) . '</button>';
				$field_display .= '<button type="button" class="button button-secondary media-reset" />' . __( 'Clear Image', $obj['lang'] ) . '</button>';
				$field_display .= '</div>';
				break;

			// Default - Used for text, url, date, and color
			default:
				// Classes for date and color
				$field_class = '';
				if ( $value['type'] == 'date' ) {
					$field_class = ' class="date-picker"';
				}

				// Field type attribute
				$field_type = ( $value['type'] == 'url' ) ? 'url' : 'text';

				// Display final field type
				$field_display .= '<input type="' . $field_type . '" name="' . $key . '" id="' . $key . '" value="' . $value['validate']( $meta_value ) . '"' . $field_class . ' />';
		}

		$field_display .= '</' . $element . '>';

		return $field_display;
	}
