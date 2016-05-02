<?php
	// Creates a category (public)
	function xyz_create_cat_public() {

		$labels = array(
			'name'              => _x( 'Public Categories', 'xyz-textdomain' ),
			'singular_name'     => _x( 'Public Category', 'xyz-textdomain' ),
			'search_items'      => __( 'Search Public Categories', 'xyz-textdomain' ),
			'all_items'         => __( 'All Public Categories', 'xyz-textdomain' ),
			'parent_item'       => __( 'Parent Public Category', 'xyz-textdomain' ),
			'parent_item_colon' => __( 'Parent Public Category:', 'xyz-textdomain' ),
			'edit_item'         => __( 'Edit Public Category', 'xyz-textdomain' ), 
			'update_item'       => __( 'Update Public Category', 'xyz-textdomain' ),
			'add_new_item'      => __( 'Add New Public Category', 'xyz-textdomain' ),
			'new_item_name'     => __( 'New Public Category', 'xyz-textdomain' ),
			'menu_name'         => __( 'Public Categories', 'xyz-textdomain' ),
			'not_found'         => __( 'No public categories found.', 'xyz-textdomain' )
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

		register_taxonomy( 'xyz-cat-public', 'xyz-post-type', $args );
	}
	add_action( 'init', 'xyz_create_cat_public', 0 );