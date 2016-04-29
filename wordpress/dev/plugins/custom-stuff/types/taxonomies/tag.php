<?php
	// Creates a tag
	function xyz_create_tag() {

		$labels = array(
			'name'              => _x( 'Tags', 'xyz-textdomain' ),
			'singular_name'     => _x( 'Tag', 'xyz-textdomain' ),
			'search_items'      => __( 'Search Tags', 'xyz-textdomain' ),
			'all_items'         => __( 'All Tags', 'xyz-textdomain' ),
			'parent_item'       => __( 'Parent Tag', 'xyz-textdomain' ),
			'parent_item_colon' => __( 'Parent Tag:', 'xyz-textdomain' ),
			'edit_item'         => __( 'Edit Tag', 'xyz-textdomain' ), 
			'update_item'       => __( 'Update Tag', 'xyz-textdomain' ),
			'add_new_item'      => __( 'Add New Tag', 'xyz-textdomain' ),
			'new_item_name'     => __( 'New Tag', 'xyz-textdomain' ),
			'menu_name'         => __( 'Tags', 'xyz-textdomain' ),
			'not_found'         => __( 'No tags found.', 'xyz-textdomain' )
		);

		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'rewrite'                    => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => false
		);

		register_taxonomy( 'xyz-tag', 'xyz-post-type', $args );
	}
	add_action( 'init', 'xyz_create_tag', 0 );