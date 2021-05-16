<?php
	/**
	* Template for displaying the entry pages
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Properties for single versus multiple
	if ( is_singular() ) {
		$flex_column = '';
	} else {
		$flex_column = ' flex-column';
	}

	// Page variables
	$pages_class = 'entry-pages' . $flex_column;
	$pages_label = '<span class="post-page-label">Pages:</span>';

	// Render entry pages if available
	wp_link_pages( array(
		'before' => '<div class="' . esc_attr( $pages_class ) . '">' . $pages_label,
		'after'  => '</div>'
	) );
?>
