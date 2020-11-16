<?php
	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Re-usable variables for the plugin
	$prefix = 'dcbase';
	$obj = array(
		'lang'    => 'dcbase',
		'prefix'  => $prefix,
		'classes' => array(),
		'paths'   => array(
			'js'   => get_template_directory_uri() . '/assets/js',
			'lang' => get_template_directory_uri() . '/languages'
		)
	);

	// Create theme setup
	function dcbase_setup( $obj ) {
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array( 'search-form' ) );
		load_theme_textdomain( $obj['lang'], $obj['paths']['lang'] );
		register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', $obj['lang'] ) ) );
	}
	add_action( 'after_setup_theme', function() use ( $obj ) { dcbase_setup( $obj ); }, 10, 1 );

	// Loads necessary javascript and CSS
	function dcbase_load_scripts( $obj ) {
		wp_enqueue_style( $obj['prefix'] . '-style', get_stylesheet_uri() );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'functions', $obj['paths']['js'] . '/functions.js', 'jquery', '', true );
	}
	add_action( 'wp_enqueue_scripts', function() use ( $obj ) { dcbase_load_scripts( $obj ); }, 10, 1 );

	// Trim default excerpt length
	function dcbase_excerpt_length( $length ) {
		return 50;
	}
	add_filter( 'excerpt_length', 'dcbase_excerpt_length' );

	// Change text if excerpt length is reached
	function dcbase_excerpt_more( $more ) {
		return '...';
	}
	add_filter( 'excerpt_more', 'dcbase_excerpt_more' );

	// Custom read more link for excerpts
	function dcbase_read_more() {
		return '<div class="read-more"><a href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . __( 'Read More', 'dcbase' ) . '</a></div>';
	}

	// Check if there is a custom excerpt and if so, make sure it's not too long
	function dcbase_excerpt( $html ) {
		// // Set defauly message if there is no excerpt or page body text
		// if ( strlen( get_the_excerpt() ) > 0 ) {
		// 	$message = get_the_excerpt();
		// } else {
		// 	$message = __( 'For additional information, please read post or page.', 'dcbase' );
		// }
		//
		// if ( $html == true ) {
		// 	if ( has_excerpt() ) {
		// 	    return '<p>' . wp_trim_words( get_the_excerpt(), 50 ) . '</p>' . dcbase_read_more();
		// 	} else {
		// 		return '<p>' . $message . '</p>' . dcbase_read_more();
		// 	}
		// } else {
		// 	if ( has_excerpt() ) {
		// 	    return wp_trim_words( get_the_excerpt(), 50 );
		// 	} else {
		// 		return $message;
		// 	}
		// }
	}

// add_filter( 'the_content_more_link', 'dcbase_read_more_link' );
// function dcbase_read_more_link() {
// 	if ( ! is_admin() ) {
// 		return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">...</a>';
// 	}
// }
//
// add_filter( 'excerpt_more', 'dcbase_excerpt_read_more_link' );
// function dcbase_excerpt_read_more_link( $more ) {
// if ( ! is_admin() ) {
// global $post;
// return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">...</a>';
// }
// }
//
// add_filter( 'intermediate_image_sizes_advanced', 'dcbase_image_insert_override' );
// function dcbase_image_insert_override( $sizes ) {
// unset( $sizes['medium_large'] );
// return $sizes;
// }
//
// add_action( 'widgets_init', 'dcbase_widgets_init' );
// function dcbase_widgets_init() {
// register_sidebar( array(
// 'name' => esc_html__( 'Sidebar Widget Area', 'dcbase' ),
// 'id' => 'primary-widget-area',
// 'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
// 'after_widget' => '</li>',
// 'before_title' => '<h3 class="widget-title">',
// 'after_title' => '</h3>',
// ) );
// }
//
// add_action( 'wp_head', 'dcbase_pingback_header' );
// function dcbase_pingback_header() {
// if ( is_singular() && pings_open() ) {
// printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
// }
// }
//
// add_action( 'comment_form_before', 'dcbase_enqueue_comment_reply_script' );
// function dcbase_enqueue_comment_reply_script() {
// if ( get_option( 'thread_comments' ) ) {
// wp_enqueue_script( 'comment-reply' );
// }
// }
//
// function dcbase_custom_pings( $comment ) {

// }
//
// add_filter( 'get_comments_number', 'dcbase_comment_count', 0 );
// function dcbase_comment_count( $count ) {
// if ( ! is_admin() ) {
// global $id;
// $get_comments = get_comments( 'status=approve&post_id=' . $id );
// $comments_by_type = separate_comments( $get_comments );
// return count( $comments_by_type['comment'] );
// } else {
// return $count;
// }
// }
