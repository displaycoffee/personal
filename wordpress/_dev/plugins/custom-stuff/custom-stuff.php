<?php
	/**
	* Plugin Name: Custom Stuff
	* Plugin URI: https://github.com/displaycoffee/personal/tree/master/wordpress
	* Description: Used for setting up custom content types, taxonomies, and meta boxes.
	* Author: Adria Murphy
	* Author URI: https://github.com/displaycoffee
	* Version: 6.0
	* Text Domain: custom-stuff
	**/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Re-usable variables for the plugin
	$prefix = 'cstmstff';
	$obj = array(
		'lang'    => 'custom-stuff',
		'prefix'  => $prefix,
		'classes' => array(
			'main'   => $prefix . '-form-field',
			'field'  => 'form-field',
			'row'    => 'form-field-row',
			'column' => 'form-field-column',
			'label'  => 'form-field-label',
			'value'  => 'form-field-value',
			'desc'   => 'form-field-description description'
		)
	);

	// Define paths
	define( 'CSTMSTFF_DIR', plugin_dir_path( __FILE__ ) );

	// Load plugin text domain
	function cstmstff_load_textdomain() {
		load_plugin_textdomain( $obj['lang'], false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}

	// Loads necessary javascript and CSS
	function cstmstff_enqueue_assets( $obj ) {
		if ( get_current_screen()->post_type == ( $obj['prefix'] . '-post-type' ) ) {
			// Enqueue color picker
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker' );

			// Enqueue and localize media library
			wp_enqueue_media();

			// Enqueue the required javascript
			wp_enqueue_script( $obj['prefix'] . '_asset', plugin_dir_url( __FILE__ ) . 'assets/js/functions.js' );

			// Enqueue the required CSS
			wp_enqueue_style( 'cstmstff_asset', plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );
		}
	}
	add_action( 'admin_enqueue_scripts', function() use ( $obj ) { cstmstff_enqueue_assets( $obj ); }, 10, 1 );

	// Include multi-use files
	require_once( CSTMSTFF_DIR . 'includes/fields.php' );
	require_once( CSTMSTFF_DIR . 'includes/validation.php' );

	// Options
	require_once( CSTMSTFF_DIR . 'options/option-fields.php' );
	require_once( CSTMSTFF_DIR . 'options/option-page.php' );

	// Post Types
	require_once( CSTMSTFF_DIR . 'types/posts/post-type.php' );
	require_once( CSTMSTFF_DIR . 'types/posts/post-meta-fields.php' );
	require_once( CSTMSTFF_DIR . 'types/posts/post-meta-boxes.php' );

	// Taxonomies
	require_once( CSTMSTFF_DIR . 'types/taxonomies/taxonomy-public.php' );
	require_once( CSTMSTFF_DIR . 'types/taxonomies/taxonomy-private.php' );
	require_once( CSTMSTFF_DIR . 'types/taxonomies/taxonomy-tag.php' );
	require_once( CSTMSTFF_DIR . 'types/taxonomies/term-meta-fields.php' );
	require_once( CSTMSTFF_DIR . 'types/taxonomies/term-meta-boxes.php' );
	//
	// // Display
	// require_once( CSTMSTFF_DIR . 'display/display-cat-public.php' );
	// require_once( CSTMSTFF_DIR . 'display/display-options.php' );
	// require_once( CSTMSTFF_DIR . 'display/display-post-type.php' );
