<?php
	/**
	* Template for displaying entry footer
	*/
?>
<footer class="entry-footer">
	<div class="categories">
		<?php _e( '<strong>Categories:</strong> ', 'ambase' ); ?><?php the_category( ', ' ); ?>
	</div>
	<?php echo the_tags( '<div class="tags"><strong>Tags:</strong> ', ', ', '</div>' ); ?>
	<?php
		// Check if we're on a single post page
		if ( !is_single() ) {
			// Get number of comments
			$num_comments = get_comments_number();

			// Alter text based on number of comments or no comments
			if ( comments_open() ) {					
				if ( $num_comments == 0 ) {
					$comments = __( 'No comments', 'ambase' );
				} elseif ( $num_comments > 1 ) {
					$comments = $num_comments . __( ' comments', 'ambase' );
				} else {
					$comments = __( '1 comment', 'ambase' );
				}
				echo '<div class="comments"><a href="' . esc_url( get_comments_link() ) . '">' . $comments . '</a></div>';
			}
		}
	?>
	<?php edit_post_link(); ?>
</footer>