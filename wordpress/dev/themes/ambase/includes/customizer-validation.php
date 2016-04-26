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
	        return null;
	    }
	}

	// Select
	function ambase_sanitize_select( $input ) {
	    $valid = array(
	        'Option 01' => 'Option 01',
	        'Option 02' => 'Option 02',
	        'Option 03' => 'Option 03'
	    );
	 
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return null;
	    }
	}

	// Radio
	function ambase_sanitize_radio( $input ) {
	    $valid = array(
	        'Yes' => 'Yes',
	        'No' => 'No'
	    );
	 
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return null;
	    }
	}	

	// Numbers
    function ambase_sanitize_number( $input ) {
	    if ( is_numeric( $input ) ) {
    		return intval( $input );
	    } else {
	    	return null;
	    }
	}	