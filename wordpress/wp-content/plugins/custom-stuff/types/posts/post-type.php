<?php
	// Creates custom content type
	function xyz_create_post_type() {

		$labels = array(
			'name'               => _x( 'XYZ Entries', 'xyz-textdomain' ),
			'singular_name'      => _x( 'XYZ Entry', 'xyz-textdomain' ),
			'add_new'            => __( 'Add New', 'xyz-textdomain' ),
			'add_new_item'       => __( 'Add New Entry', 'xyz-textdomain' ),
			'edit_item'          => __( 'Edit Entry', 'xyz-textdomain' ),
			'new_item'           => __( 'New Entry', 'xyz-textdomain' ),
			'all_items'          => __( 'All Entries', 'xyz-textdomain' ),
			'view_item'          => __( 'View Entry', 'xyz-textdomain' ),			
			'search_items'       => __( 'Search Entries', 'xyz-textdomain' ),
			'not_found'          => __( 'No entries found.', 'xyz-textdomain' ),
			'not_found_in_trash' => __( 'No entries found in trash.', 'xyz-textdomain' ),
			'parent_item_colon'  => __( 'Parent Entry:', 'xyz-textdomain' ),
			'menu_name'          => __( 'XYZ Entries', 'xyz-textdomain' ),
			'update_item'        => __( 'Update Entries', 'xyz-textdomain' )
		);

		$args = array(
			'label'               => __( 'XYZ Entry', 'xyz-textdomain' ),
			'labels'              => $labels,
			'description'         => __( 'Add XYZ entries.', 'xyz-textdomain' ),	
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
		
		register_post_type( 'xyz-post-type', $args );

	}

	add_action( 'init', 'xyz_create_post_type', 0 );