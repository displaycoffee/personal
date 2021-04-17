<?php
	/**
	* Template for displaying entry no results
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Add config object to footer
	$config = dcbase_config();

	// No entries text
	$no_entries = is_search() ? 'No entries match your search.' : 'No entries found.';
?>
<div class="entry-none">
	<p><?php _e( $no_entries, $config->lang ); ?></p>
	<p>
		<?php echo sprintf( __( 'Return to %1$s%2$s%3$s?', $config->lang ), '<a href="', esc_url( $config->home ), '">home</a>' ); ?>
	</p>
</div>
