<?php
	/**
	* Template for displaying all single posts
	*/

	get_header(); 
?>
<article>
	<header class="main-title">
		<h1>Title goes here??</h1>
	</header>
	<?php if ( have_posts() ) : ?>
		<div class="post-single">	
			<?php while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php esc_attr( the_ID() ); ?>" <?php post_class(); ?>>
					<?php get_template_part( 'partials/entry', 'meta' ); ?>
					<?php get_template_part( 'partials/entry', 'thumbnail' ); ?>
					<div class="entry-content"><?php the_content(); ?></div>
					<?php get_template_part( 'partials/entry', 'footer' ); ?>
				</div>
			<?php endwhile; ?>
		</div>
		<?php get_template_part( 'partials/nav', 'simple' ); ?>
		<?php comments_template(); ?>
	<?php endif; ?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>