<?php

	// Checkbox
	function ambase_sanatize_checkbox( $input ) {
	    if ( $input == 1 ) {
	        return 1;
	    } else {
	        return null;
	    }
	}