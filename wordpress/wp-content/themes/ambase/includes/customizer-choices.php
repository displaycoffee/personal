<?php
	/**
	* Funtions for customizer fields that have choices
	*/	

	function ambase_select_choices() {
		return array(
	        'Option 01' => __( 'Option 01', 'ambase' ),
	        'Option 02' => __( 'Option 02', 'ambase' ),
	        'Option 03' => __( 'Option 03', 'ambase' )
	    );
	}

	function ambase_radio_choices() {
		return array(
            'Yes' => __( 'Yes', 'ambase' ),
            'No' => __( 'No', 'ambase' )
	    );
	}	
