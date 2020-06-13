<?php
	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Creates a taxonomy
	function cstmstff_create_taxonomy_private( $obj ) {
		// Taxonomy name variables
		$singular = 'Private Category';
		$singular_lower = strtolower( $singular );
		$plural = 'Private Categories';
		$plural_lower = strtolower( $plural );

		// Array of taxonomy labels
		$labels = array(
			'name'                       => __( $plural, $obj['lang'] ),
			'singular_name'              => __( $singular, $obj['lang'] ),
			'search_items'               => __( 'Search ' . $plural, $obj['lang'] ),
			'popular_items'              => __( 'Popular ' . $plural, $obj['lang'] ),
			'all_items'                  => __( 'All ' . $plural, $obj['lang'] ),
			'parent_item'                => __( 'Parent ' . $singular, $obj['lang'] ),
			'parent_item_colon'          => __( 'Parent ' . $singular . ':', $obj['lang'] ),
			'edit_item'                  => __( 'Edit ' . $singular, $obj['lang'] ),
			'view_item'                  => __( 'View ' . $singular, $obj['lang'] ),
			'update_item'                => __( 'Update ' . $singular, $obj['lang'] ),
			'add_new_item'               => __( 'Add New ' . $singular, $obj['lang'] ),
			'new_item_name'              => __( 'New ' . $singular . ' Name', $obj['lang'] ),
			'separate_items_with_commas' => __( 'Separate ' . $plural_lower . ' with commas', $obj['lang'] ),
			'add_or_remove_items'        => __( 'Add or remove ' . $plural_lower, $obj['lang'] ),
			'choose_from_most_used'      => __( 'Choose from the most used ' . $plural_lower, $obj['lang'] ),
			'not_found'                  => __( 'No ' . $plural_lower . ' found.', $obj['lang'] ),
			'no_terms'                   => __( 'No ' . $plural_lower, $obj['lang'] ),
			'items_list_navigation'      => __( $plural . ' list', $obj['lang'] ),
			'items_list'                 => __( $plural . ' list', $obj['lang'] ),
			'most_used'                  => __( 'Most Used', $obj['lang'] ),
			'back_to_items'              => __( 'Back to ' . $plural, $obj['lang'] )
		);

		// Array of arguments for taxonomy features
		$args = array(
			'labels'            => $labels,
			'descritpion'      	=> 'This is a taxonomy. Kinda like a category.',
			'public'            => false, // Set to false for private taxonomy
			'hierarchical'      => true, // Set to false for tags
			'show_ui'           => true,
			'show_in_nav_menus' => false,
			'show_in_rest'      => true,
			'show_admin_column' => true
		);

		// Register the taxonomy
		register_taxonomy( $obj['prefix'] . '-taxonomy-private', $obj['prefix'] . '-post-type', $args );
	}

	// Init the taxonomy
	add_action( 'init', function() use ( $obj ) { cstmstff_create_taxonomy_private( $obj ); }, 10 );
