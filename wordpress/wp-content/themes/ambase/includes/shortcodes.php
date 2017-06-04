<?php 
	/**
	* For theme shortcodes
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }	

	// Easy clearfix for floated images and content
	function ambase_clearfix() {
		return '<div class="clearfix"></div>';
	}
	add_shortcode( 'clearfix', 'ambase_clearfix' );