<?php get_header(); ?>
<div id="content" role="main">
	<h1 class="entry-title">
		<?php _e( 'Tag Archives: ', 'ambase' ); ?><?php single_tag_title(); ?>
	</h1>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'entry' ); ?>
	<?php endwhile; endif; ?>
	<?php get_template_part( 'nav', 'below' ); ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>