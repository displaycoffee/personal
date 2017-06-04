<?php
	/**
	* Template for displaying the front page
	*
	* Settings > Reading > Static page > Front page
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }
	
	// Include header	
	get_header(); 
?>
<section class="content">
	<div class="wrapper">
		<article>			
			<?php _e( 'Front page content goes here.', 'ambase' ) ?>
		</article>
	</div>
</section>	
<?php get_footer(); ?>