<?php
	/**
	* Template for displaying sidebar
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }
?>
<aside id="sidebar" class="flex-column">
	<?php if ( is_active_sidebar( 'default-widget' ) ) : ?>
		<div id="default-widget" class="widgets">
			<?php dynamic_sidebar( 'default-widget' ); ?>
		</div>
	<?php endif; ?>
</aside>
