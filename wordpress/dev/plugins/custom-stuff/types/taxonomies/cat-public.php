<?php
	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) {
		echo 'Beep boop!';
		exit; 
	}
	
	// Creates a category (public)
	function cstmstff_create_cat_public() {

		$labels = array(
			'name'              => __( 'Public Categories', 'custom-stuff' ),
			'singular_name'     => __( 'Public Category', 'custom-stuff' ),
			'search_items'      => __( 'Search Public Categories', 'custom-stuff' ),
			'all_items'         => __( 'All Public Categories', 'custom-stuff' ),
			'parent_item'       => __( 'Parent Public Category', 'custom-stuff' ),
			'parent_item_colon' => __( 'Parent Public Category:', 'custom-stuff' ),
			'edit_item'         => __( 'Edit Public Category', 'custom-stuff' ), 
			'update_item'       => __( 'Update Public Category', 'custom-stuff' ),
			'add_new_item'      => __( 'Add New Public Category', 'custom-stuff' ),
			'new_item_name'     => __( 'New Public Category', 'custom-stuff' ),
			'menu_name'         => __( 'Public Categories', 'custom-stuff' ),
			'not_found'         => __( 'No public categories found.', 'custom-stuff' )
		);

		$args = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'rewrite'           => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => false
		);

		register_taxonomy( 'cstmstff-cat-public', 'cstmstff-post-type', $args );
	}
	add_action( 'init', 'cstmstff_create_cat_public', 0 );