<?php
	/**
	* Template for displaying the sidebar
	*/
?>
<aside class="sidebar">
	<?php if ( is_active_sidebar( 'default-widget-area' ) ) : ?>
		<div id="default-widget-area" class="widget-area">
			<?php dynamic_sidebar( 'default-widget-area' ); ?>
		</div>
	<?php endif; ?>
</aside>