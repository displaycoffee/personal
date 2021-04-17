<?php
	/**
	* Template for displaying the entry content
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Determine if summary block show or not
	$show_summary = ( has_post_thumbnail() || get_the_excerpt() || ( is_search() && wp_link_pages() ) ) ? true : false;
?>
<div class="entry-content flex-column">
	<?php
		if ( $show_summary ) {
			the_excerpt();
		} else {
			the_content();
		}
	?>
</div>
