<?php
	/**
	* Template for displaying the main page (site.com/blog)
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }
?>
<?php
	get_header();
	get_template_part( 'partials/layout', 'open' );
	get_template_part( 'loop', 'index' );
	get_template_part( 'partials/layout', 'close' );
	get_footer();
?>
