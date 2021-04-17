<?php
	/**
	* Template for displaying the main page (site.com/blog)
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	get_header();
?>
<div class="entry-index-content">
	<?php
		get_template_part( 'partials/layout', 'open' );
		get_template_part( 'entry' );
		get_template_part( 'nav', 'below' );
		get_template_part( 'partials/layout', 'close' );
		get_footer();
	?>
</div>
