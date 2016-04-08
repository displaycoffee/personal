<?php
	/**
	* Template for displaying archive pages (dates, categories and tags)
	*
	* @link https://codex.wordpress.org/Template_Hierarchy
	*/

	get_header(); 
?>
<article>
	<header class="main-title">
		<?php the_archive_title( '<h1>', '</h1>' ); ?>
	</header>
	<?php the_archive_description( '<div class="category-description">', '</div>' ); ?>	
	<h2><?php _e( 'Posts', 'ambase' ); ?></h2>
	<?php get_template_part( 'loop', 'index' ); ?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>