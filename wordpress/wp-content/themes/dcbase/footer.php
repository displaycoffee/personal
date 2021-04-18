<?php
	/**
	* Template for displaying header
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Add config object
	$config = dcbase_config();
?>
		</main>
		<footer id="footer" class="footer">
			<div class="site-copyright">
				&copy; <?php echo esc_html( date_i18n( __( 'Y', $config->lang ) ) ); ?> <?php echo esc_html( $config->name ); ?>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>
