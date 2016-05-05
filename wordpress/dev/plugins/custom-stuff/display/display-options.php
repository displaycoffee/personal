<?php
	// Loop through post type and custom meta
	function cstmstff_options_page() {

		$option = get_option( 'cstmstff-options' );
		echo '<h3>' . __( 'Display Options', 'custom-stuff' ) . '</h3>';
		echo '<ul>';		
		echo '<li>' . esc_html( $option['cstmstff-text'] ) . '</li>';
		echo '<li>' . esc_url( $option['cstmstff-url'] ) . '</li>';
		echo '<li>' . wpautop( esc_html( $option['cstmstff-textarea'] ) ) . '</li>';
		echo '<li>' . esc_html( $option['cstmstff-select'] ) . '</li>';
		echo '<li>' . esc_html( $option['cstmstff-radio'] ) . '</li>';
		echo '<li>' . esc_html( $option['cstmstff-checkbox'] ) . '</li>';
		echo '<li>' . esc_html( $option['cstmstff-color'] ) . '</li>';
		echo '<li>' . esc_html( $option['cstmstff-image'] ) . '</li>';
		echo '</ul>';
		echo '<hr />';
	}
	add_shortcode( 'display-options', 'cstmstff_options_page' );