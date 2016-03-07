<?php get_header(); ?>
<div id="content" role="main">
	<?php if ( have_posts() ) : ?>
		<h1 class="entry-title">
			<?php printf( __( 'Search Results for: %s', 'ambase' ), get_search_query() ); ?>
		</h1>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'entry' ); ?>
		<?php endwhile; ?>
		<?php get_template_part( 'nav', 'below' ); ?>
	<?php else : ?>
		<div id="post-0" class="post no-results not-found">
			<h2 class="entry-title">
				<?php _e( 'Nothing Found', 'ambase' ); ?>
			</h2>
			<div class="entry-content">
				<p>
					<?php _e( 'Sorry, nothing matched your search. Please try again.', 'ambase' ); ?>
				</p>
				<?php get_search_form(); ?>
			</div>
		</div>
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>