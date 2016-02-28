<?php

	// Class for putting together all the meta box goodness
	class XYZTermMetaBox {

        protected $_termMetaBox; 

        // Add actions for meta boxes
        function __construct($termMetaBox) {
            $this->_termMetaBox = $termMetaBox;
            add_action( $this->_termMetaBox['category'] . '_add_form_fields', array(&$this, 'add'), 10, 2 );
            add_action( $this->_termMetaBox['category'] . '_edit_form_fields', array(&$this, 'show'), 10, 2 );
			add_action( 'edited_' . $this->_termMetaBox['category'], array(&$this, 'save'), 10, 2 );  
			add_action( 'create_' . $this->_termMetaBox['category'], array(&$this, 'save'), 10, 2 );
        } 

        // Add description onto the 'Add New' page
		function add() {
			$description = '<div class="form-field">';
			$description .= '<p>';
			$description .= sprintf( __( '%s', 'xyz-textdomain' ), $this->_termMetaBox['desc'] );
			$description .= '</p>';
			$description .= '</div>';
			echo $description;
		}

		// Show meta box
        function show($term) {

        	// Loop through each meta box array
            foreach ($this->_termMetaBox['fields'] as $field) {

				// Get the term ID
				$term_id = $term->term_id;
			 	$option_name = $this->_termMetaBox['category'] . '_' . $term_id . '_meta';

				// Get the name of the term meta
				$term_meta = get_option( $option_name );

				// Common display value
				if (isset($term_meta[$field['id']])) {
					$value = $term_meta[$field['id']];
				} else {
					$value = '';
				}

	            // Start opening HTML
				$opening = '<tr class="form-field xyz-term-field">';
				$opening .= '<th scope="row">';
	            $opening .= '<label for="' . $field['id'] . '">';
	            $opening .= sprintf( __( '%s', 'xyz-textdomain' ), $field['label'] );
	            $opening .= '</label>';
				$opening .= '</th>';
				$opening .= '<td>';
				echo $opening;	

				// Loop through field types
				switch ($field['type']) {

	                // Text and url
	                case 'text':
	                case 'url':
	                   	xyz_display_field($field, $value);
	                    break;

	                // Text area
	                case 'textarea':
	                    xyz_display_textarea($field, $value);
	                    break;

	                // Select drop down  
	                case 'select':
	                   	xyz_display_select_open($field);	
	                        foreach ($field['options'] as $option) {
	                            $selected = ($value == $option) ? ' selected="selected"' : '';
	                            xyz_display_select_option($field, $selected, $option);
	                        }
	                    xyz_display_select_close();
	                    break;

	                //  Radio option
	                case 'radio':
	                    foreach ($field['options'] as $option) {
	                        if (isset($option['default'])) {
	                            $checked = ' checked="checked"';
	                        } else {
	                            $checked = ($value == $option['label']) ? ' checked="checked"' : '';
	                        }
	                        xyz_display_radio($field, $option, $checked);
	                    }
	                    break;

	                // Checkbox    
	                case 'checkbox':
	                    $checked = $value ? ' checked="checked"' : '';
	                    xyz_display_checkbox($field, $checked);
	                    break;

	                // Hex color color selection
	                case 'color':
	                    $color = $value ? $field['validate']($value) : 'No color selected.';
	                    xyz_display_hex_field($field, $value, $color);
	                    break;

	                // Wordpress Media library    
	                case 'media':
	                    $image = $value ? '<div class="image-preview"><strong>' . __( 'Current Image:', 'xyz-textdomain' ) . '</strong><img src="' . $field['validate']($value) . '" /></div>' : '';
	                    xyz_display_media_field($field, $value, $image);
	                    break; 

                    // Wordpress Editor    
                    case 'editor':
                        xyz_display_editor($field, $value);
                        break; 
				}

                // Display description if one is there
                $description = sprintf( __( '%s', 'xyz-textdomain' ), $field['desc'] ) ? '<p class="description">' . sprintf( __( '%s', 'xyz-textdomain' ), $field['desc'] ) . '</p>' : '';
                echo $description;

	            // Start closing HTML
	            $closing = '</td>';
	            $closing .= '</tr>';
	            echo $closing;						

            }

        } 

        // Save data from meta box
		function save($term_id) {
		    if ( isset( $_POST['term-meta'] ) ) {
		        $term_meta = $_POST['term-meta'];
				foreach ($this->_termMetaBox['fields'] as $field) {
			        foreach ($term_meta as $k => $v) {
						if ($field['id'] == $k) {
							$term_meta[$k] = $field['validate']($v);
						}
			        }
			    }
			    $option_name = $this->_termMetaBox['category'] . '_' . $term_id . '_meta';
		        update_option( $option_name, $term_meta );
			}			
		}
		
	}

    // Go through each meta box array and build them
    foreach ($termMetaBoxes as $termMetaBox) {
        new XYZTermMetaBox($termMetaBox);
    }