<?php
	// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) exit;

	// Get opening layout for fields
	function cstmstff_get_layout_open( $obj, $key, $value, $layout ) {
		// Configure element structure
		$column_element = ( $layout == 'table' ) ? 'tr' : 'div';
		$label_element  = ( $layout == 'table' ) ? 'th' : 'div';
		$value_element  = ( $layout == 'table' ) ? 'td' : 'div';

		// Column HTML layout
		$column_type = $obj['main'] . ' ' . $obj['field'] . ' ' . $obj['field'] . '-' . $value['type'];
		$column_class = $value['parent'] ? ( ' ' . $obj['column'] ) : '';
		$display = '<' . $column_element . ' class="' . $column_type . $column_class .  '">';

		// Label HTML layout
		$display .= '<' . $label_element . ' class="' . $obj['label'] . '">';
		$display .= '<label for="' . $key . '">' . $value['label'] . '</label>';
		$display .= '</' . $label_element . '>';

		// Value HTML layout
		$display .= '<' . $value_element . ' class="' . $obj['value'] . '">';

		// Row HTML layout
		$display .= $value['multi'] ? ( '<div class="' . $obj['row'] . '">' ) : '';

		return $display;
	}

	// Get closing layout for fields
	function cstmstff_get_layout_close( $obj, $value, $layout ) {
		// Configure element structure
		$column_element = ( $layout == 'table' ) ? 'tr' : 'div';
		$label_element  = ( $layout == 'table' ) ? 'th' : 'div';
		$value_element  = ( $layout == 'table' ) ? 'td' : 'div';

		// Row HTML layout
		$display = $value['multi'] ? '</div>' : '';

		// Description HTML layout
		$display .= $value['desc'] ? ( '<p class="' . $obj['desc'] . '">' . $value['desc'] . '</p>' ) : '';

		// Value HTML layout
		$display .= '</' . $value_element . '>';

		// Column HTML layout
		$display .= '</' . $column_element . '>';

		return $display;
	}

	// Loop through basic field types
	function cstmstff_display_fields( $key, $value, $meta_value, $obj ) {
		$checked = ' checked="checked"';
		$display = '';

		switch ( $value['type'] ) {
			// Text area
			case 'textarea':
				$display .= '<textarea name="' . $key . '" id="' . $key . '">' . $value['validate']( $meta_value ) . '</textarea>';
				break;

			// Select drop down
			case 'select':
				$display .= '<select name="' . $key . '" id="' . $key . '">';
				foreach ( $value['options'] as $option ) {
					// Check for selected option and set as value
					$selected_option = ( $meta_value == $option ) ? ' selected="selected"' : '';

					// Create option block
					$display .= '<option' . $selected_option . '>';
					$display .= $value['validate']( $option, $value['options'] );
					$display .= '</option>';
				}
				$display .= '</select>';
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
					$display .= '<input type="radio" name="' . $key . '" id="' . $option_key . '" value="' . $value['validate']( $option_value['label'], $value['options'] ) . '"' . $selected_option . ' />';
				}
				break;

			// Checkbox
			case 'checkbox':
				$selected_option = $meta_value ? $checked : '';
				$display .= '<input type="checkbox" name="' . $key . '" value="' . $value['validate']( $value['value'] )  . '" id="' . $key . '"' . $selected_option . ' />';
				break;

			// Color
			case 'color':
				// Check if selected color is available
				if ( $meta_value ) {
					$display .= '<div class="selected-color"><strong>' . __( 'Current Color:', $obj['lang'] ) . '</strong>' . $value['validate']( $meta_value ) . '</div>';
				}

				$display .= '<input type="text" name="' . $key . '" id="' . $key . '" value="' . $value['validate']( $meta_value ) . '" class="color-picker" />';
				break;

			// Media
			case 'media':
				// Check if selected media is available
				if ( $meta_value ) {
					$display .= '<div class="selected-media"><strong>' . __( 'Current Image:', $obj['lang'] ) . '</strong><img src="' . $value['validate']( $meta_value ) . '" /></div>';
				}

				$display .= '<div class="media-picker">';
				$display .= '<input type="url" name="' . $key . '" id="' . $key . '" value="' . $value['validate']( $meta_value ) . '" />';
				$display .= '<button type="button" class="button button-primary media-select" />' . __( 'Choose Image', $obj['lang'] ) . '</button>';
				$display .= '<button type="button" class="button button-secondary media-reset" />' . __( 'Clear Image', $obj['lang'] ) . '</button>';
				$display .= '</div>';
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
				$display .= '<input type="' . $field_type . '" name="' . $key . '" id="' . $key . '" value="' . $value['validate']( $meta_value ) . '"' . $field_class . ' />';
		}

		return $display;
	}
