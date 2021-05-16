<?php
	/**
	* Template for adding function helpers
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Function for setting up variable object
	function dcbase_config() {
		// Variables for config object
		$prefix = 'dcbase';
		$theme = get_template_directory_uri();
		$theme_assets = $theme . '/assets';

		// Set up default config
		$config = (object) [
			'id'        => get_queried_object_id() ? get_queried_object_id() : false,
			'home'    => get_home_url( '/' ),
			'images'  => (object) [
				'sizes' => array( '180x180', '192x192', '32x32', '16x16' )
			],
			'lang'    => $prefix,
			'name'    => get_bloginfo( 'name' ),
			'paths'   => (object) [
				'images' => $theme_assets . '/images',
				'js'     => $theme_assets . '/js',
				'lang'   => $theme . '/languages'
			],
			'prefix'  => $prefix,
			'search'  => (object) [
				'label'   => 'Search for:',
				'results' => 'Search results for:',
				'text'    => 'Search'
			],
			'type'    => 'page'
		];

		// Check what type of page it is and assign page type
		if ( is_front_page() ) {
			$config->type = 'home';
		}
		if ( is_home() ) {
			$config->type = 'blog';
		}
		if ( is_archive() ) {
			$config->type = 'archive';
		}
		if ( is_search() ) {
			$config->type = 'search';
		}
		if ( is_attachment() ) {
			$config->type = 'attachment';
		}
		if ( is_404() ) {
			$config->type = 'error404';
		}

		// Add extra details using default config
		$config->images->thumbnail = $config->paths->images . '/publisher-logo.png';
		$config->images->thumbnail_width = '600';
		$config->images->thumbnail_height = '60';
		$config->paths->favicons = $config->paths->images . '/favicons';

		// Update image thumbnail
		if ( $config->id && get_the_post_thumbnail_url( $config->id ) ) {
			$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
			$config->images->thumbnail = $thumbnail[0];
			$config->images->thumbnail_width = $thumbnail[1];
			$config->images->thumbnail_height = $thumbnail[2];
		}

		return $config;
	}

	// Create a function to build title html with link text
	function dcbase_create_title( $args ) {
		// Attributes for title
		$title_class = $args['class'] ? ( ' class="' . esc_attr( $args['class'] ) . '"' ) : '';
		$title_rel = $args['rel'] ? ( ' rel="' . esc_attr( $args['rel'] ) . '"' ) : '';

		// Wrapper element html
		$title_open = $args['element'] ? ( '<' . $args['element'] . $title_class . '>' ) : '';
		$title_close = $args['element'] ? ( '</' . $args['element'] . '>' ) : '';

		// Link element html
		$title_link_open = $args['url'] ? ( '<a href="' . esc_url( $args['url'] ) . '" title="' . esc_attr( $args['label'] ) . '"' . $title_rel . '>' ) : '';
		$title_link_close = $args['url'] ? ( '</a>' ) : '';

		// Display title html
		$title_html  = $title_open;
		$title_html .= $title_link_open;
		$title_html .= esc_html( $args['label'] );
		$title_html .= $title_link_close;
		$title_html .= $title_close;

		echo $title_html;
	}

	// Generate favicon
	function dcbase_get_icon( $index ) {
		$image_name = ( $index == 'touch' ) ? 'touch' : dcbase_config()->images->sizes[$index];
		echo esc_url( dcbase_config()->paths->favicons . '/favicon-' . $image_name . '.png' );
	}

	// Determine if on an archive or not
	function dcbase_is_archive() {
		if ( is_front_page() || is_home() || ( is_front_page() && is_home() ) || is_archive() || is_search() ) {
			return true;
		} else {
			return false;
		}
	}

	// Determine if on home or not
	function dcbase_is_home() {
		if ( is_front_page() || is_home() || is_front_page() && is_home() ) {
			return true;
		} else {
			return false;
		}
	}
