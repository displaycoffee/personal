<?php
	/**
	* Template for displaying entry footer
	*/
?>
<footer class="entry-footer">
	<div class="categories" itemprop="keywords">
		<?php _e( '<strong>Categories:</strong> ', 'ambase' ); ?><?php the_category( ', ' ); ?>
	</div>
	<?php echo the_tags( '<div class="tags" itemprop="keywords"><strong>Tags:</strong> ', ', ', '</div>' ); ?>
	<?php
		// Check if we're on a single post page
		if ( !is_single() ) {
			// Alter text based on number of comments or no comments
			if ( comments_open() ) {					
				echo '<div class="comments"><a href="' . esc_url( get_comments_link() ) . '">';
				comments_number( __( 'No comments', 'ambase' ), __( 'One comment', 'ambase' ), __( '% comments', 'ambase') );
				echo '</a></div>';
			}
		}
	?>
	<?php edit_post_link( __('Edit', 'ambase'), '<div class="edit">', '</div>' ); ?>
</footer>