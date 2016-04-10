<?php
	/**
	* Template for displaying a basic post loop
	*/
?>
<?php if ( have_posts() ) : ?>
	<div class="post-multiple">
		<?php while ( have_posts() ) : the_post(); ?>	
			<div id="post-<?php esc_attr( the_ID() ); ?>" <?php post_class(); ?>>
				<?php 
					// Since the string is long, create variables for title before/after
					$title_before = '<header class="entry-header"><h2><a href="' . esc_url( get_the_permalink() ) . '">';
					$title_after = '</a></h2></header>';

					// Display the title
					the_title($title_before, $title_after);
				?>
				<?php get_template_part( 'partials/entry', 'meta' ); ?>
				<?php get_template_part( 'partials/entry', 'thumbnail' ); ?>
				<div class="entry-content"><?php echo ambase_excerpt(); ?></div>
				<?php get_template_part( 'partials/entry', 'footer' ); ?>
			</div>
		<?php endwhile; ?>
	</div>
	<?php get_template_part( 'partials/nav', 'pagination' ); ?>
<?php else : ?>
	<div id="no-post" class="not-found">
		<p>
			<?php
				// Display different text for search versus other pages if no posts are found 
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