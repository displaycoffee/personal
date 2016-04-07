<?php
	/**
	* Template for displaying pages
	*/

	get_header(); 
?>
<article>
	<header class="main-title">
		<h1><?php the_title(); ?></h1>
	</header>	
	<?php if ( have_posts() ) : ?>
		<div class="post-single">	
			<?php while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php esc_attr( the_ID() ); ?>" <?php post_class(); ?>>
					<?php get_template_part( 'partials/entry', 'thumbnail' ); ?>
					<div class="entry-content"><?php the_content(); ?></div>
					<footer class="entry-footer">
						<?php edit_post_link(); ?>
					</footer>
				</div>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>