<?php
	/**
	* Template for displaying the entry links
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }
?>
<?php if ( is_search() && wp_link_pages() ) : ?>
	<div class="entry-links flex-column"><?php wp_link_pages(); ?></div>
<?php endif; ?>
