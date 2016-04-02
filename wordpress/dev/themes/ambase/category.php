<?php
	/**
	* Template for displaying category pages
	*/

	get_header(); 
?>
<article>
	<header class="main-title">
		<h1><?php _e( 'Category: ', 'ambase' ); ?><?php single_cat_title(); ?></h1>
	</header>
	<?php 
		if ( '' != category_description() ) {
			echo '<div class="category-description"><p>' .  category_description() . '</p></div>';
		}
	?>	
	<h2><?php _e( 'Posts', 'ambase' ); ?></h2>
	<?php get_template_part( 'loop', 'index' ); ?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>