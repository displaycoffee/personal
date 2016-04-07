<?php
	/**
	* Template for displaying the main page
	*/

	get_header(); 
?>
<article>
	<?php get_template_part( 'loop', 'index' ); ?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>