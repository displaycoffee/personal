<?php
	/**
	* Template for displaying a basic post loop
	*/
?>
<?php if ( have_posts() ) : ?>
	<div class="post-multiple">
		<?php while ( have_posts() ) : the_post(); ?>	
			<div id="post-<?php esc_attr( the_ID() ); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h2>
						<a href="<?php esc_url( the_permalink() ); ?>" title="<?php esc_attr( the_title_attribute() ); ?>"><?php the_title(); ?></a>
					</h2>
				</header>
				<?php get_template_part( 'partials/entry', 'meta' ); ?>
				<?php get_template_part( 'partials/entry', 'thumbnail' ); ?>
				<div class="entry-content"><?php echo ambase_excerpt(); ?></div>
				<?php get_template_part( 'partials/entry', 'footer' ); ?>
			</div>
		<?php endwhile; ?>
	</div>
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