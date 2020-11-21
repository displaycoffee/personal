<?php get_header(); ?>
<section class="wrapper">
	<div class="flex-row">
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'flex-column' ); ?>>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'entry' ); ?>
				<?php if ( comments_open() && ! post_password_required() ) { comments_template( '', true ); } ?>
			<?php endwhile; endif; ?>
		</article>
		<?php get_sidebar(); ?>
	</div>
	<?php get_template_part( 'nav', 'below-single' ); ?>
</section>
<?php get_footer(); ?>
