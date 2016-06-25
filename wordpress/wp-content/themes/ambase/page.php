<?php
	/**
	* Template for displaying pages
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Include header	
	get_header(); 
?>
<article>
	<?php the_title( '<header class="main-title"><h1>', '</h1></header>' ); ?>	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="entry-single">	
			<div id="entry-<?php esc_attr( the_ID() ); ?>" class="entry page">
				<?php get_template_part( 'partials/entry', 'thumbnail' ); ?>
				<div class="entry-content"><?php the_content(); ?></div>
				<?php edit_post_link( __('Edit', 'ambase'), '<footer class="entry-footer"><div class="edit">', '</div></footer>' ); ?>				
			</div>
		</div>
	<?php endwhile; endif; ?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>