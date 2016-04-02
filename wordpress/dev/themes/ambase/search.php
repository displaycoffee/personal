<?php
	/**
	* Template for displaying search page
	*/

	get_header(); 
?>
<article>
	<header class="main-title">
		<h1><?php printf( __( 'Search results for "%s"', 'ambase' ), get_search_query() ); ?></h1>
	</header>
	<?php get_template_part( 'loop' ); ?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>