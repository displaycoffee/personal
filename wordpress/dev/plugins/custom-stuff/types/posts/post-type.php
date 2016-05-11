<?php
	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }
	
	// Creates custom content type
	function cstmstff_create_post_type() {
		$labels = array(
			'name'               => __( 'Entries', 'custom-stuff' ),
			'singular_name'      => __( 'Entry', 'custom-stuff' ),
			'add_new'            => __( 'Add New', 'custom-stuff' ),
			'add_new_item'       => __( 'Add New Entry', 'custom-stuff' ),
			'edit_item'          => __( 'Edit Entry', 'custom-stuff' ),
			'new_item'           => __( 'New Entry', 'custom-stuff' ),
			'all_items'          => __( 'All Entries', 'custom-stuff' ),
			'view_item'          => __( 'View Entry', 'custom-stuff' ),			
			'search_items'       => __( 'Search Entries', 'custom-stuff' ),
			'not_found'          => __( 'No entries found.', 'custom-stuff' ),
			'not_found_in_trash' => __( 'No entries found in trash.', 'custom-stuff' ),
			'parent_item_colon'  => __( 'Parent Entry:', 'custom-stuff' ),
			'menu_name'          => __( 'Entries', 'custom-stuff' ),
			'update_item'        => __( 'Update Entries', 'custom-stuff' )
		);

		$args = array(
			'label'               => __( 'Entry', 'custom-stuff' ),
			'labels'              => $labels,
			'description'         => __( 'Add entries.', 'custom-stuff' ),	
			'public'              => true,
			'menu_position'       => 6,
			'menu_icon'           => 'dashicons-book-alt',
			'supports'            => array( 'title', 'page-attributes', 'editor', 'thumbnail', 'excerpt', 'comments' ),
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,			
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'hierarchical'        => false,
			'can_export'          => true,
			'capability_type'     => 'post',
		);		
		
		register_post_type( 'cstmstff-post-type', $args );
	}

	add_action( 'init', 'cstmstff_create_post_type', 0 );