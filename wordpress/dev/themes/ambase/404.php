<?php
	/**
	* Template for displaying 404 pages (not found)
	*/

	get_header(); 
?>
<article>
	<div class="title">
		<h1>
			<?php _e( 'Not Found', 'ambase' ); ?>
		</h1>
	</div>
	<div id="post-0" class="post not-found">
		<p>
			<?php _e( 'Nothing found for the requested page.', 'ambase' ); ?>
		</p>
		<p>
			<?php echo sprintf( __( 'Return to %1$s%2$s%3$s?', 'ambase' ), '<a href="', home_url( '/' ), '">home</a>' ); ?>
		</p>
	</div>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>