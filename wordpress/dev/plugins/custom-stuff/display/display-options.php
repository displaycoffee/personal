<?php

	// Loop through post type and custom meta
	function xyz_options_page() {

		$option = get_option('xyz-options');
		echo '<h3>Display Options</h3>';
		echo '<ul>';		
		echo '<li>' . $option['xyz-text'] . '</li>';
		echo '<li>' . $option['xyz-url'] . '</li>';
		echo '<li>' . wpautop($option['xyz-textarea']) . '</li>';
		echo '<li>' . $option['xyz-select'] . '</li>';
		echo '<li>' . $option['xyz-radio'] . '</li>';
		echo '<li>' . $option['xyz-checkbox'] . '</li>';
		echo '<li>' . $option['xyz-color'] . '</li>';
		echo '<li>' . $option['xyz-image'] . '</li>';
		echo '</ul>';
		echo '<hr />';

	}
	add_shortcode( 'display-options', 'xyz_options_page' );