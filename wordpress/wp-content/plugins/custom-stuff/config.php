<?php

	/*
		Plugin Name: Custom Stuff
		Plugin URI: http://neverend.org/adria
		Description: Used for setting up custom content types, taxonomies, and meta boxes.
		Author: Adria Murphy
		Author URI: http://neverend.org/adria
		Version: 4.0
		Text Domain: xyz-textdomain
	*/

	// Load plugin text domain
	function xyz_load_textdomain() {
		load_plugin_textdomain( 'xyz-textdomain', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
	}

	// Loads necessary javascript and CSS
	function xyz_enqueue_assets() {
	    global $typenow;
	    if( $typenow == 'xyz-post-type' ) {

	    	// Enqueue and localize media library
	        wp_enqueue_media();
	        wp_localize_script( 'xyz_asset', 'image_select',
	            array(
	                'title' => __( 'Choose or Upload an Image', 'xyz-textdomain' ),
	                'button' => __( 'Use this image', 'xyz-textdomain' ),
	            )
	        );

	        // Enqueue color picker
	        wp_enqueue_style( 'wp-color-picker' );
	        wp_enqueue_script( 'wp-color-picker' );

	        // Enqueue date picker
			wp_enqueue_style( 'jquery-ui-datepicker' );
			wp_enqueue_script( 'jquery-ui-datepicker', array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker'), time(), true );	
				 	 
	        // Enqueue the required javascript
	        wp_enqueue_script( 'xyz_asset', plugin_dir_url( __FILE__ ) . 'assets/js/functions.js' );

	        // Enqueue the required CSS
	        wp_enqueue_style( 'xyz_asset', plugin_dir_url( __FILE__ ) . 'assets/css/styles.css' );

	    }
	}
	add_action( 'admin_enqueue_scripts', 'xyz_enqueue_assets' );

	// Include common files
	require_once('common/fields.php');
	require_once('common/validation.php');

	// Options
	require_once('options/options-array.php');
	require_once('options/options-page.php');

	// Post Types
	require_once('types/posts/post-type.php');
	require_once('types/posts/post-meta-array.php');
	require_once('types/posts/post-meta-boxes.php');

	// Taxonomies
	require_once('types/taxonomies/cat-public.php');		
	require_once('types/taxonomies/cat-private.php');	
	require_once('types/taxonomies/tag.php');	
	require_once('types/taxonomies/term-meta-array.php');
	require_once('types/taxonomies/term-meta-boxes.php');	

	// Display
	require_once('display/display-cat-public.php');	
	require_once('display/display-options.php');	
	require_once('display/display-post-type.php');	