<?php
	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }
	
	// Creates a tag
	function cstmstff_create_tag() {
		$labels = array(
			'name'              => __( 'Tags', 'custom-stuff' ),
			'singular_name'     => __( 'Tag', 'custom-stuff' ),
			'search_items'      => __( 'Search Tags', 'custom-stuff' ),
			'all_items'         => __( 'All Tags', 'custom-stuff' ),
			'parent_item'       => __( 'Parent Tag', 'custom-stuff' ),
			'parent_item_colon' => __( 'Parent Tag:', 'custom-stuff' ),
			'edit_item'         => __( 'Edit Tag', 'custom-stuff' ), 
			'update_item'       => __( 'Update Tag', 'custom-stuff' ),
			'add_new_item'      => __( 'Add New Tag', 'custom-stuff' ),
			'new_item_name'     => __( 'New Tag', 'custom-stuff' ),
			'menu_name'         => __( 'Tags', 'custom-stuff' ),
			'not_found'         => __( 'No tags found.', 'custom-stuff' )
		);

		$args = array(
			'labels'            => $labels,
			'hierarchical'      => false,
			'public'            => true,
			'rewrite'           => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => false
		);

		register_taxonomy( 'cstmstff-tag', 'cstmstff-post-type', $args );
	}
	add_action( 'init', 'cstmstff_create_tag', 0 );