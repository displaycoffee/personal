<?php
	// Loop through post type and custom meta
	function xyz_options_page() {

		$option = get_option( 'xyz-options' );
		echo '<h3>Display Options</h3>';
		echo '<ul>';		
		echo '<li>' . esc_html( $option['xyz-text'] ) . '</li>';
		echo '<li>' . esc_url( $option['xyz-url'] ) . '</li>';
		echo '<li>' . wpautop( esc_html( $option['xyz-textarea'] ) ) . '</li>';
		echo '<li>' . esc_html( $option['xyz-select'] ) . '</li>';
		echo '<li>' . esc_html( $option['xyz-radio'] ) . '</li>';
		echo '<li>' . esc_html( $option['xyz-checkbox'] ) . '</li>';
		echo '<li>' . esc_html( $option['xyz-color'] ) . '</li>';
		echo '<li>' . esc_html( $option['xyz-image'] ) . '</li>';
		echo '</ul>';
		echo '<hr />';
	}
	add_shortcode( 'display-options', 'xyz_options_page' );