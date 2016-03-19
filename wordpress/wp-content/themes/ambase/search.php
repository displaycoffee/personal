<?php
	/**
	* Template for displaying search page
	*/

	get_header(); 
?>
<article>
	<div class="title">
		<h1>
			<?php printf( __( 'Search results for "%s"', 'ambase' ), get_search_query() ); ?>			
		</h1>
	</div>
	<?php get_template_part( 'loop' ); ?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>