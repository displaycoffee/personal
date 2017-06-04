<?php
	/**
	* Template for displaying entry meta
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }	
?>
<div class="entry-meta">
	<?php 
		echo '<p class="author"><strong>' .  __( 'By', 'ambase' ) . ':</strong> ' .  get_the_author_posts_link() . '</p>';
	?>
	<?php 
		echo '<p class="date"><strong>' .  __( 'Date', 'ambase' ) . ':</strong> ' .  get_the_time( get_option( 'date_format' ) ) . '</p>';
	?>
	<?php 
		// Don't display these top category lists on single pages
		if ( !is_single() ) {
			// Get post type to generate dyanmic categories
			$post_type = get_post_type();			

			// Check what type of post we're viewing and display the right categories (mostly setup for search archive)
			if ( $post_type == 'post' ) {
				echo ambase_term_list( $post->ID, 'category', ', ', '<p class="categories"><strong>' . __( 'Categories', 'ambase' ) . ':</strong> ', '</p>' );
			} 
		}
	?>
</div>