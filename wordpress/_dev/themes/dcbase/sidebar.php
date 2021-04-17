<?php
	/**
	* Template for displaying sidebar
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }
?>
<aside id="sidebar" class="flex-column">
	<?php if ( is_active_sidebar( 'default-widgets' ) ) : ?>
		<div id="default-widgets" class="widgets">
			<?php dynamic_sidebar( 'default-widgets' ); ?>
		</div>
	<?php endif; ?>
</aside>
