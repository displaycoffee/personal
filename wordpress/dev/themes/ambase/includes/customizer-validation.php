<?php
	/**
	* Custom validation functions for customizer
	*/	

	// Sanitize textarea 
	function ambase_sanitize_textarea( $input ) {
	    return esc_textarea( $input );
	}

	// Checkbox
	function ambase_sanatize_checkbox( $input ) {
	    if ( $input == 1 ) {
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