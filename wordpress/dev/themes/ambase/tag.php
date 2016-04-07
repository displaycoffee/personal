<?php
	/**
	* Template for displaying tag pages
	*/

	get_header(); 
?>
<article>
	<header class="main-title">
		<h1><?php _e( 'Tag: ', 'ambase' ); ?><?php single_tag_title(); ?></h1>
	</header>
	<?php 
		if ( '' != tag_description() ) {
			echo '<div class="category-description"><p>' .  tag_description() . '</p></div>';
		}
	?>	
	<h2><?php _e( 'Posts', 'ambase' ); ?></h2>
	<?php get_template_part( 'loop', 'index' ); ?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>