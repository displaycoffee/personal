<?php
	/**
	* Template for displaying the footer
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }	
?>
	<footer id="footer">
		<p id="copyright">
			<?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'ambase' ), '&copy;', date( 'Y' ), get_bloginfo( 'name' ) ); ?>
		</p>
		<p id="credits">
			<?php printf( __( 'Theme by %s', 'ambase' ), '<a href="//neverend.org/adria" target="_blank">Adria Murphy</a>' ); ?>
		</p>
	</footer>
	<?php wp_footer(); ?>
	<a href="#" class="scroll-to-top" title="<?php _e( 'Scroll to Top', 'ambase' ) ?>"><?php _e( 'Scroll to Top', 'ambase' ) ?></a>
	<a href="#" class="scroll-to-bottom" title="<?php _e( 'Scroll to Bottom', 'ambase' ) ?>"><?php _e( 'Scroll to Bottom', 'ambase' ) ?></a>	
</body>
</html>