<?php
	/**
	* Template for displaying 404 pages (not found)
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }
	
	// Include header
	get_header(); 
?>
<header class="main-title">
	<div class="wrapper">
		<h1><?php _e( 'Not Found', 'ambase' ); ?></h1>
	</div>
</header>
<section class="content">
	<div class="wrapper">
		<article>
			<div id="error-404" class="not-found">
				<p><?php _e( 'Nothing found for the requested page.', 'ambase' ); ?></p>
				<p><?php echo sprintf( __( 'Return to %1$s%2$s%3$s?', 'ambase' ), '<a href="',  esc_url( home_url( '/' ) ), '">home</a>' ); ?></p>
			</div>
		</article>
		<?php get_sidebar(); ?>
	</div>
</section>			
<?php get_footer(); ?>