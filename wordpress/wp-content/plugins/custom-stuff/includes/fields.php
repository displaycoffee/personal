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

	// Create column layout for date field
	function cstmstff_get_date_layout( $obj, $key, $value, $type ) {
		$date_field_type = ( $type == 'month' ) ? 'select' : 'number';
		$date_field_class = 'class="date-field-' . $type . '"';

		// HTML for month versus day and year
		if ( $type == 'month' ) {
			$date_field = '<select id="' . $key . '-month" ' . $date_field_class . ' name="' . $key . '-month" >';
			for ( $i = 1; $i < 13; $i = $i + 1 ) {
				// Format month number, text, and selected attributes
				$month_number = zeroise( $i, 2 );
				$month_text = date( 'M', mktime( 0, 0, 0, $month_number, 10 ) );
				$month_selected = ( $value == $month_number ) ? ' selected="selected"' : '';

				// Put together option
				$date_field .= '<option value="' . $month_number . '"' . $month_selected . '>' . $month_number . '-' . $month_text . '</option>';
			}
			$date_field .= '</select>';

		} else {
			$date_limit = ( $type == 'year' ) ? 4 : 2;
			$date_field = '<input type="number" id="' . $key . '-' . $type . '" ' . $date_field_class . ' name="' . $key . '-' . $type . '" value="' . $value . '" size="' . $date_limit . '" maxlength="' . $date_limit . '" />';
		}

		// Setup date field classes
		$date_field_class = $obj['classes']['main'] . ' ' . $obj['classes']['field'] . ' form-field-' . $date_field_type  . ' ' . $obj['classes']['column'];

		// Create columns for all date fields
		$column = '<div class="' . $date_field_class . '">';
		$column .= '<div class="' . $obj['classes']['value'] . '">';
		$column .= $date_field;
		$column .= '</div>';
		$column .= '</div>';
		return $column;
	}

	// Loop through basic field types
	function cstmstff_display_fields( $key, $value, $meta_value, $obj ) {
		$checked = ' checked="checked"';
		$display = '';

		switch ( $value['type'] ) {
			// Text area
			case 'textarea':
				$display .= '<textarea name="' . $value['name'] . '" id="' . $key . '">' . $value['validate']( $meta_value ) . '</textarea>';
				break;

			// Select drop down
			case 'select':
				$display .= '<select name="' . $value['name'] . '" id="' . $key . '">';
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
					$display .= '<input type="radio" name="' . $value['name'] . '" id="' . $option_key . '" value="' . $value['validate']( $option_value['label'], $value['options'] ) . '"' . $selected_option . ' />';
				}
				break;

			// Checkbox
			case 'checkbox':
				$selected_option = $meta_value ? $checked : '';
				$display .= '<input type="checkbox" name="' . $value['name'] . '" value="' . $value['validate']( $value['value'] )  . '" id="' . $key . '"' . $selected_option . ' />';
				break;

			// Color
			case 'color':
				// Check if selected color is available
				if ( $meta_value ) {
					$display .= '<div class="selected-color"><strong>' . __( 'Current Color:', $obj['lang'] ) . '</strong>' . $value['validate']( $meta_value ) . '</div>';
				}

				$display .= '<input type="text" name="' . $value['name'] . '" id="' . $key . '" value="' . $value['validate']( $meta_value ) . '" class="color-picker" />';
				break;

			// Media
			case 'media':
				// Check if selected media is available
				if ( $meta_value ) {
					$display .= '<div class="selected-media"><strong>' . __( 'Current Image:', $obj['lang'] ) . '</strong><img src="' . $value['validate']( $meta_value ) . '" /></div>';
				}

				$display .= '<div class="media-picker">';
				$display .= '<input type="url" name="' . $value['name'] . '" id="' . $key . '" value="' . $value['validate']( $meta_value ) . '" />';
				$display .= '<button type="button" class="button button-primary media-select" />' . __( 'Choose Image', $obj['lang'] ) . '</button>';
				$display .= '<button type="button" class="button button-secondary media-reset" />' . __( 'Clear Image', $obj['lang'] ) . '</button>';
				$display .= '</div>';
				break;

			// Date
			case 'date':
				// Split date
				$date_array = $meta_value ? explode( '/' , $meta_value ) : array( '01', '01', date( 'Y' ) );

				// Display final date type
				$display .= '<input type="text" name="' . $value['name'] . '" id="' . $key . '" class="date-field-text" value="' . $value['validate']( $meta_value ) . '" />';
				$display .= '<div class="' . $obj['classes']['row'] . '">';
				$display .= cstmstff_get_date_layout( $obj, $key, $date_array[0], 'month' );
				$display .= cstmstff_get_date_layout( $obj, $key, $date_array[1], 'day' );
				$display .= cstmstff_get_date_layout( $obj, $key, $date_array[2], 'year' );
				$display .= '</div>';
				break;

			// Default - Used for text, and url
			default:
				// Field type attribute
				$field_type = ( $value['type'] == 'url' ) ? 'url' : 'text';

				// Display final field type
				$display .= '<input type="' . $field_type . '" name="' . $value['name'] . '" id="' . $key . '" value="' . $value['validate']( $meta_value ) . '" />';
		}

		return $display;
	}
