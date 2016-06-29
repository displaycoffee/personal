<?php
	/**
	* Custom validation functions for customizer
	*/	

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }
	
	// Textarea 
	function ambase_sanitize_textarea( $input ) {
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
	function ambase_sanatize_checkbox( $input ) {
	    if ( $input == 1 || $input == '1' ) {
	        return 1;
	    } else {
	        return '';
	    }
	}

	// Select
	function ambase_sanitize_select( $input ) {
		// Get select choices
	    $valid = ambase_select_choices();	

	    // Check if choices are in array 
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}

	// Radio
	function ambase_sanitize_radio( $input ) {
		// Get radio choices
	    $valid = ambase_radio_choices();

	    // Check if choices are in array	 
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}	

	// Numbers
    function ambase_sanitize_number( $input ) {
	    if ( is_numeric( $input ) ) {
    		return intval( $input );
	    } else {
	    	return '';
	    }
	}

	// Date validation
    function ambase_sanitize_date( $input ) {
    	// Get each value in the date - month, day, year
        $date = preg_match( '/(\d{4})-(\d{2})-(\d{2})/', $input, $match );

        if ( $date == '1' && checkdate( $match[2], $match[3], $match[1] ) ) {
        	return $input;
        } else {
        	return '';
        }
    }		