<?php
	/**
	* Template for displaying a basic post loop
	*/
?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>	
		<div id="post-<?php esc_attr( the_ID() ); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<h2>
					<a href="<?php esc_url( the_permalink() ); ?>" title="<?php esc_attr( the_title_attribute() ); ?>"><?php the_title(); ?></a>
				</h2>
			</header>
			<div class="entry-meta">
				<p class="author"><?php the_author_posts_link(); ?></p>
				<p class="date"><?php the_time( get_option( 'date_format' ) ); ?></p>
			</div>
			<?php 
				if ( has_post_thumbnail() ) { 
					echo '<div class="entry-thumbnail">' . get_the_post_thumbnail() . '</div>'; 
				} 
			?>
			<div class="entry-content"><?php echo ambase_excerpt(); ?></div>
			<footer class="entry-footer">
				<div class="categories">
					<?php _e( '<strong>Categories:</strong> ', 'ambase' ); ?><?php the_category( ', ' ); ?>
				</div>
				<?php echo the_tags( '<div class="tags"><strong>Tags:</strong> ', ', ', '</div>' ); ?>
				<?php
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
				?>
				<?php edit_post_link(); ?>
			</footer>
		</div>
	<?php endwhile; ?>
	<?php get_template_part( 'nav', 'below' ); ?>
<?php else : ?>
	<div id="no-post" class="not-found">
		<p>
			<?php 
				if ( is_search() ) { 
					_e( 'No posts match your search.', 'ambase' );
				} else {
					_e( 'No posts found.', 'ambase' );
				}
			?>
		</p>
		<p><?php echo sprintf( __( 'Return to %1$s%2$s%3$s?', 'ambase' ), '<a href="', esc_url( home_url( '/' ) ), '">home</a>' ); ?></p>		
	</div>
<?php endif; ?>