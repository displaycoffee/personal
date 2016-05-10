<?php
	// Select choices
	function cstmstff_select_choices() {
		return array(
            __( 'Option 1', 'custom-stuff' ), 
            __( 'Option 2', 'custom-stuff' ), 
            __( 'Option 3', 'custom-stuff' )
	    );
	}

	// Post radio choices
	function cstmstff_post_radio_choices() {
		return array(
            array(
                'label'   => __( 'Name 1', 'custom-stuff' ), 
                'id'      => '_cstmstff-value01', 
                'name'    => '_cstmstff-value01',
                'default' => 'yes'
            ),
            array(
                'label' => __( 'Name 2', 'custom-stuff' ), 
                'id'    => '_cstmstff-value02',
                'name'  => '_cstmstff-value02',
            )
        );
	}		

	// Term and option radio choices
	function cstmstff_other_radio_choices() {
		return array(
            array(
                'label'   => __( 'Name 1', 'custom-stuff' ), 
                'id'      => 'cstmstff-value01', 
                'name'    => 'cstmstff-value01',
                'default' => 'yes'
            ),
            array(
                'label' => __( 'Name 2', 'custom-stuff' ), 
                'id'    => 'cstmstff-value02',
                'name'  => 'cstmstff-value02',
            )
        );
	}			