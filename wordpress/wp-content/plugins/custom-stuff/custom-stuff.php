<?php
	/**
	* Plugin Name: Custom Stuff
	* Plugin URI: http://neverend.org/adria
	* Description: Used for setting up custom content types, taxonomies, and meta boxes.
	* Author: Adria Murphy
	* Author URI: http://neverend.org/adria
	* Version: 4.1
	* Text Domain: custom-stuff
	**/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Load plugin text domain
	function cstmstff_load_textdomain() {
		load_plugin_textdomain( 'custom-stuff', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
	}

	// Loads necessary javascript and CSS
	function cstmstff_enqueue_assets() {
	    global $typenow;
	    if ( $typenow == 'cstmstff-post-type' ) {

	    	// Enqueue and localize media library
	        wp_enqueue_media();
	        wp_localize_script( 'cstmstff_asset', 'image_select',
	            array(
	                'title'  => __( 'Choose or Upload an Image', 'custom-stuff' ),
	                'button' => __( 'Use this image', 'custom-stuff' ),
	            )
	        );

	        // Enqueue color picker
	        wp_enqueue_style( 'wp-color-picker' );
	        wp_enqueue_script( 'wp-color-picker' );

	        // Enqueue date picker
			wp_enqueue_style( 'jquery-ui-datepicker' );
			wp_enqueue_script( 'jquery-ui-datepicker', array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker' ), time(), true );	
				 	 
	        // Enqueue the required javascript
	        wp_enqueue_script( 'cstmstff_asset', plugin_dir_url( __FILE__ ) . 'assets/js/functions.js' );

	        // Enqueue the required CSS
	        wp_enqueue_style( 'cstmstff_asset', plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );

	    }
	}
	add_action( 'admin_enqueue_scripts', 'cstmstff_enqueue_assets' );

	// Include multi-use files
	require_once( 'includes/choices.php' );
	require_once( 'includes/fields.php' );
	require_once( 'includes/validation.php' );

	// Options
	require_once( 'options/options-array.php' );
	require_once( 'options/options-page.php' );

	// Post Types
	require_once( 'types/posts/post-type.php' );
	require_once( 'types/posts/post-meta-array.php' );
	require_once( 'types/posts/post-meta-boxes.php' );

	// Taxonomies
	require_once( 'types/taxonomies/cat-public.php' );		
	require_once( 'types/taxonomies/cat-private.php' );	
	require_once( 'types/taxonomies/tag.php' );	
	require_once( 'types/taxonomies/term-meta-array.php' );
	require_once( 'types/taxonomies/term-meta-boxes.php' );	

	// Display
	require_once( 'display/display-cat-public.php' );	
	require_once( 'display/display-options.php' );	
	require_once( 'display/display-post-type.php' );	