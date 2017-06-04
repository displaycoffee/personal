<?php
	/**
	* Functions specific to ambase theme
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Set up theme options
	function ambase_setup() {
		// Load theme text domain
		load_theme_textdomain( 'ambase', get_template_directory() . '/languages' );

		// Add them support options
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );	

		// Register navigation menus
		register_nav_menus( array(
			'main-menu' => __( 'Main Menu', 'ambase' )
		) );
	}
	add_action( 'after_setup_theme', 'ambase_setup' );	

	// Add theme related scripts
	function ambase_load_scripts() {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'functions', get_template_directory_uri () . '/assets/js/functions.js', 'jquery', '', true );

		// Get blog url to use in JavaScript
		wp_localize_script( 'functions', 'wpurl', array( 'siteurl' => get_option( 'siteurl' ) ) );		
	}
	add_action( 'wp_enqueue_scripts', 'ambase_load_scripts' );
	
	// Enable shortcodes in text widgets
	add_filter( 'widget_text', 'do_shortcode' );

	// Add user contact methods
	function ambase_user_contact_methods( $user_contact ) {		
		$user_contact['facebook']  = __( 'Facebook', 'ambase' );
		$user_contact['gplus']     = __( 'Google+', 'ambase' );
		$user_contact['linkedin']  = __( 'LinkedIn', 'ambase' );
		$user_contact['twitter']   = __( 'Twitter', 'ambase' );
		$user_contact['instagram'] = __( 'Instagram', 'ambase' );
		$user_contact['youtube']   = __( 'YouTube', 'ambase' );
		$user_contact['pinterest'] = __( 'Pinterest', 'ambase' );
		$user_contact['tumblr']    = __( 'Tumblr', 'ambase' );
		return $user_contact;
	}
	add_filter( 'user_contactmethods', 'ambase_user_contact_methods' );

	// Include extra function files
	require_once( 'includes/functions-display.php' );
	require_once( 'includes/functions-json-ld.php' );

	// Include shortcode file
	require_once( 'includes/shortcodes.php' );	

	// Include customizer files
	require_once( 'customizer/customizer-enqueue.php' );	
	require_once( 'customizer/customizer-choices.php' );
	require_once( 'customizer/customizer-date-picker.php' );
	require_once( 'customizer/customizer-validation.php' );
	require_once( 'customizer/customizer.php' );