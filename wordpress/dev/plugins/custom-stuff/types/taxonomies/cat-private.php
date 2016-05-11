<?php
	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) {
		echo 'Beep boop!';
		exit; 
	}
	
	// Creates a category (private)
	function cstmstff_create_cat_private() {

		$labels = array(
			'name'              => __( 'Private Categories', 'custom-stuff' ),
			'singular_name'     => __( 'Private Category', 'custom-stuff' ),
			'search_items'      => __( 'Search Private Categories', 'custom-stuff' ),
			'all_items'         => __( 'All Private Categories', 'custom-stuff' ),
			'parent_item'       => __( 'Parent Private Category', 'custom-stuff' ),
			'parent_item_colon' => __( 'Parent Private Category:', 'custom-stuff' ),
			'edit_item'         => __( 'Edit Private Category', 'custom-stuff' ), 
			'update_item'       => __( 'Update Private Category', 'custom-stuff' ),
			'add_new_item'      => __( 'Add New Private Category', 'custom-stuff' ),
			'new_item_name'     => __( 'New Private Category', 'custom-stuff' ),
			'menu_name'         => __( 'Private Categories', 'custom-stuff' ),
			'not_found'         => __( 'No private categories found.', 'custom-stuff' )
		);

		$args = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => false,
			'rewrite'           => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => false
		);

		register_taxonomy( 'cstmstff-cat-private', 'cstmstff-post-type', $args );
	}
	add_action( 'init', 'cstmstff_create_cat_private', 0 );