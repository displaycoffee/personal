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
		$column_class = $value['parent'] ? ( $obj['column'] . ' ' ) : '';
		$display = '<' . $column_element . ' class="' . $column_class . $column_type .  '">';

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

			// Date
			case 'date':
				// Split date
				$date_array = $meta_value ? explode( '/' , $meta_value ) : array( '', '', '' );

				// Setup date field classes
				$date_column_class = $obj['classes']['column'] . ' ' . $obj['classes']['main'] . ' ' . $obj['classes']['field'] . ' ' . $obj['classes']['field'] . '-';

				// First date column
				$month_select = '<select id="' . $key . '-month" class="date-field-month" name="' . $key . '-month">';
				$month_select .= '<option value="00">-- ' . __( 'Select Month', $obj['lang'] ) . ' --</option>';
				for ( $i = 1; $i < 13; $i = $i + 1 ) {
					// Format month number, text, and selected attributes
					$month_number = zeroise( $i, 2 );
					$month_text = date( 'M', mktime( 0, 0, 0, $month_number, 10 ) );
					$month_selected = ( $date_array[0] == $month_number ) ? ' selected="selected"' : '';

					// Put together option
					$month_select .= '<option value="' . $month_number . '"' . $month_selected . '>' . $month_number . '-' . __( $month_text, $obj['lang'] ) . '</option>';
				}
				$month_select .= '</select>';

				$column_1 = '<div class="' . $date_column_class . 'select">';
				$column_1 .= '<div class="' . $obj['classes']['value'] . '">';
				$column_1 .= $month_select;
				$column_1 .= '</div>';
				$column_1 .= '</div>';

				// Second date column
				$column_2 = '<div class="' . $date_column_class . 'number">';
				$column_2 .= '<div class="' . $obj['classes']['value'] . '">';
				$column_2 .= '<input type="number" id="' . $key . '-day"  class="date-field-day" name="' . $key . '-day" value="' . $date_array[1] . '" size="2" maxlength="2" />';
				$column_2 .= '</div>';
				$column_2 .= '</div>';

				// Third date column
				$column_3 = '<div class="' . $date_column_class . 'number">';
				$column_3 .= '<div class="' . $obj['classes']['value'] . '">';
				$column_3 .= '<input type="number" id="' . $key . '-year"  class="date-field-year" name="' . $key . '-year" value="' . $date_array[2] . '" size="4" maxlength="4" />';
				$column_3 .= '</div>';
				$column_3 .= '</div>';

				// Remaining date display put together
				$display .= '<input type="text" name="' . $value['name'] . '" id="' . $key . '" class="date-field-text" value="' . $value['validate']( $meta_value ) . '" />';
				$display .= '<div class="' . $obj['classes']['row'] . '">';
				$display .= $column_1;
				$display .= $column_2;
				$display .= $column_3;
				$display .= '</div>';
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

				// Setup date field classes
				$media_column_class = $obj['classes']['column'] . ' ' . $obj['classes']['main'] . ' ' . $obj['classes']['field'] . ' ' . $obj['classes']['field'] . '-';

				// First media column
				$column_1 = '<div class="' . $media_column_class . 'url">';
				$column_1 .= '<div class="' . $obj['classes']['value'] . '">';
				$column_1 .= '<input type="url" name="' . $value['name'] . '" id="' . $key . '" value="' . $value['validate']( $meta_value ) . '" />';
				$column_1 .= '</div>';
				$column_1 .= '</div>';

				// Second media column
				$column_2 = '<div class="' . $media_column_class . 'button">';
				$column_2 .= '<div class="' . $obj['classes']['value'] . '">';
				$column_2 .= '<button type="button" class="button button-primary media-select" />' . __( 'Choose Image', $obj['lang'] ) . '</button>';
				$column_2 .= '</div>';
				$column_2 .= '</div>';

				// Third media column
				$column_3 = '<div class="' . $media_column_class . 'button">';
				$column_3 .= '<div class="' . $obj['classes']['value'] . '">';
				$column_3 .= '<button type="button" class="button button-secondary media-reset" />' . __( 'Clear Image', $obj['lang'] ) . '</button>';
				$column_3 .= '</div>';
				$column_3 .= '</div>';

				// Remaining media display put together
				$display .= '<div class="media-picker ' . $obj['classes']['row'] . '">';
				$display .= $column_1;
				$display .= $column_2;
				$display .= $column_3;
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
