<?php
	/**
	* Template for displaying the main page
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	get_header();

	get_template_part( 'partials/layout', 'open' );

	if ( have_posts() ) : while ( have_posts() ) : the_post();

		get_template_part( 'partials/entry', 'header' );

		get_template_part( 'entry', ( dcbase_is_archive() ? 'summary' : 'content' ) );

		if ( is_singular() ) {
			get_template_part( 'entry-footer' );
		}

		comments_template();

	endwhile; endif;

	get_template_part( 'nav', 'below' );

	get_template_part( 'partials/layout', 'close' );

	get_footer();
?>
