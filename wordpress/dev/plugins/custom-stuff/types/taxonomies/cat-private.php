<?php

	// Creates a category (private)
	function xyz_create_cat_private() {

		$labels = array(
			'name'              => _x( 'Private Categories', 'xyz-textdomain' ),
			'singular_name'     => _x( 'Private Category', 'xyz-textdomain' ),
			'search_items'      => __( 'Search Private Categories', 'xyz-textdomain' ),
			'all_items'         => __( 'All Private Categories', 'xyz-textdomain' ),
			'parent_item'       => __( 'Parent Private Category', 'xyz-textdomain' ),
			'parent_item_colon' => __( 'Parent Private Category:', 'xyz-textdomain' ),
			'edit_item'         => __( 'Edit Private Category', 'xyz-textdomain' ), 
			'update_item'       => __( 'Update Private Category', 'xyz-textdomain' ),
			'add_new_item'      => __( 'Add New Private Category', 'xyz-textdomain' ),
			'new_item_name'     => __( 'New Private Category', 'xyz-textdomain' ),
			'menu_name'         => __( 'Private Categories', 'xyz-textdomain' ),
			'not_found'         => __( 'No private categories found.', 'xyz-textdomain' )
		);

		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => false,
			'rewrite'                    => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => false
		);

		register_taxonomy( 'xyz-cat-private', 'xyz-post-type', $args );
	}
	add_action( 'init', 'xyz_create_cat_private', 0 );