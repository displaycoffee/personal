<?php
	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Creates custom post type
	function cstmstff_create_post_type( $obj ) {
		// Post type name variables
		$singular = 'Entry';
		$singular_lower = strtolower( $singular );
		$plural = 'Entries';
		$plural_lower = strtolower( $plural );

		// Array of post type labels
		$labels = array(
			'name'                     => __( $plural, $obj['lang'] ),
			'singular_name'            => __( $singular, $obj['lang'] ),
			'add_new'                  => __( 'Add New', $obj['lang'] ),
			'add_new_item'             => __( 'Add New ' . $singular, $obj['lang'] ),
			'edit_item'                => __( 'Edit ' . $singular, $obj['lang'] ),
			'new_item'                 => __( 'New ' . $singular, $obj['lang'] ),
			'view_item'                => __( 'View ' . $singular, $obj['lang'] ),
			'view_items'               => __( 'View ' . $plural, $obj['lang'] ),
			'search_items'             => __( 'Search ' . $plural, $obj['lang'] ),
			'not_found'                => __( 'No ' . $plural_lower . ' found.', $obj['lang'] ),
			'not_found_in_trash'       => __( 'No ' . $plural_lower . ' found in trash.', $obj['lang'] ),
			'parent_item_colon'        => __( 'Parent ' . $singular . ':', $obj['lang'] ),
			'all_items'                => __( 'All ' . $plural, $obj['lang'] ),
			'archives'                 => __( $singular . ' Archives', $obj['lang'] ),
			'attributes'               => __( $singular . ' Attributes', $obj['lang'] ),
			'insert_into_item'         => __( 'Insert into ' . $plural_lower, $obj['lang'] ),
			'uploaded_to_this_item'    => __( 'Uploaded to this ' . $singular_lower, $obj['lang'] ),
			'featured_image'           => __( 'Featured image', $obj['lang'] ),
			'set_featured_image'       => __( 'Set featured image', $obj['lang'] ),
			'remove_featured_image'    => __( 'Remove featured image', $obj['lang'] ),
			'use_featured_image'       => __( 'Use as featured image', $obj['lang'] ),
			'menu_name'                => __( $plural, $obj['lang'] ),
			'filter_items_list'        => __( '‘Filter ' . $plural_lower . ' list', $obj['lang'] ),
			'items_list_navigation'    => __( $plural . ' list', $obj['lang'] ),
			'item_published'           => __( $singular . ' published.', $obj['lang'] ),
			'item_published_privately' => __( $singular . ' published privately.', $obj['lang'] ),
			'item_reverted_to_draft'   => __( $singular . ' reverted to draft.', $obj['lang'] ),
			'item_scheduled'           => __( $singular . ' scheduled.', $obj['lang'] ),
			'item_updated '            => __( $singular . ' updated.', $obj['lang'] )
		);

		// Array of features for post type support
		$supports = array( 'title', 'editor', 'comments', 'author', 'excerpt', 'page-attributes', 'thumbnail' );

		// Array of arguments for post type features
		$args = array(
			'label'               => __( $singular, $obj['lang'] ),
			'labels'              => $labels,
			'description'         => __( 'Add ' . $plural_lower . '.', $obj['lang'] ),
			'public'              => true,
			'hierarchical'        => false, // Set to true for page format
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'show_in_nav_menus'   => true,
			'show_in_rest'        => true,
			'menu_position'       => 6,
			'menu_icon'           => 'dashicons-book-alt',
			'capability_type'     => 'post',
			'supports'            => $supports,
			'has_archive'         => true
		);

		// Register the post type
		register_post_type( $obj['prefix'] . '-post-type', $args );
	}

	// Init the post type
	add_action( 'init', function() use ( $obj ) { cstmstff_create_post_type( $obj ); }, 10 );
