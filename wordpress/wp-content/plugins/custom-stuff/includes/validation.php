<?php
	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Textarea 
	function cstmstff_sanitize_textarea( $input ) {
		// Find line replaces and replace them with text
	    $replaced_input = str_replace( "\r\n", '**--KEEPNEWLINES--**', $input );

	    // Sanitize the replaced text
	    $sanitized_input = sanitize_text_field( $replaced_input );

	    // Then add line breaks back in with new replacement on sanitized string
	    $new_input = str_replace( '**--KEEPNEWLINES--**', "\r\n", $sanitized_input );

	    // Return input
	    return $new_input;
	}	
	
	// Checkbox
	function cstmstff_sanatize_checkbox( $input ) {
	    if ( $input == 1 || $input == '1' ) {
	        return 1;
	    } else {
	        return null;
	    }
	}

	// Select
	function cstmstff_sanitize_select( $input ) {
		// Get select choices
	    $choices = cstmstff_select_choices();	

	    // Check if choices are in array 
	    if ( in_array( $input, $choices ) ) {
	        return $input;
	    } else {
	        return null;
	    }
	}

	// Post radio
	function cstmstff_sanitize_post_radio( $input ) {
		// Get radio choices
	    $choices = cstmstff_post_radio_choices();

	    // Check if choices are in array 
	    foreach ( $choices as $choice ) {
		   	if ( $choice['label'] == $input ) {
		   		return $input;
		    }
	    }
	}

	// Term radio
	function cstmstff_sanitize_other_radio( $input ) {
		// Get radio choices
	    $choices = cstmstff_other_radio_choices();

	    // Check if choices are in array 
	    foreach ( $choices as $choice ) {
		   	if ( $choice['label'] == $input ) {
		   		return $input;
		    }
	    }
	}	

	// Hex color
    function cstmstff_sanitize_hex( $input ) {
        if ( '' ===  $input ) {
            return '';
        }     
        
        // 3 or 6 hex digits, or the empty string.
        if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $input ) ) {
            return $input;
        }
        return null;
    }

	// Date
    function cstmstff_sanitize_date( $input ) {
    	// Get each value in the date - month, day, year
        $date = preg_match( '/(\d{2})\/(\d{2})\/(\d{4})/', $input, $match );

        if ( $date == '1' && checkdate( $match[1], $match[2], $match[3] ) ) {
        	return $input;
        } else {
        	return null;
        }
    }

	// Use wp_kses to allow only certain html values in text and text area fields
    function cstmstff_sanitize_html( $input ) {
	    $args = array(
		    'strong' => array(),
		    'em'	 => array(),
		    'b'		 => array(),
		    'i'		 => array(),
		    'br'	 => array(),
		);
		return wp_kses( $input, $args );
	}

	// For santizing numbers
    function cstmstff_sanitize_number( $input ) {
	    if ( $input === '0' ) {
	    	return '0';
	    } elseif ( is_numeric( $input ) ) {
    		return floatval( $input );
	    } else {
	    	return null;
	    }
	}

	// If a number is over a certain amount, don't update (for ratings)
    function cstmstff_sanitize_rating( $input ) {
	    if ( $input === '0' ) {
	    	return '0';
	    } elseif ( is_numeric( $input ) && $input <= 5 ) {
    		return floatval( $input );
	    } elseif ( is_numeric( $input ) && $input > 5 ) {
    		return 5;
	    } else {
	    	return null;
	    }	    
	}
	
	// If the value is a number, left, right, or center (for positioning background)
	function cstmstff_sanitize_image_x_pos( $input ) {
	    if ( $input === '0' ) {
	    	return '0';
	    } elseif ( is_numeric( $input ) ) {
    		return floatval( $input );
	    } elseif ( strtolower( $input ) == 'center' ) {
	    	return 'center';
	    } elseif ( strtolower( $input ) == 'left' ) {
	    	return 'left';
	    } elseif ( strtolower( $input ) == 'right' ) {
	    	return 'right';
	    } else {
	    	return null;
	    }		
	}

	// If the value is a number, top, bottom, or center (for positioning background)
	function cstmstff_sanitize_image_y_pos( $input ) {
	    if ( $input === '0' ) {
	    	return '0';
	    } elseif ( is_numeric( $input ) ) {
    		return floatval( $input );
	    } elseif ( strtolower( $input ) == 'center' ) {
	    	return 'center';
	    } elseif ( strtolower( $input ) == 'top' ) {
	    	return 'top';
	    }  elseif ( strtolower( $input ) == 'bottom' ) {
	    	return 'bottom';
	    } else {
	    	return null;
	    }		
	}

	// If the value is a number or auto (for positioning content)
	function cstmstff_sanitize_pos( $input ) {
	    if ( $input  === '0' ) {
	    	return '0';
	    } elseif ( is_numeric( $input ) ) {
    		return floatval( $input );
	    } elseif ( strtolower( $input ) == 'auto' ) {
	    	return 'auto';
	    } else {
	    	return null;
	    }			
	}