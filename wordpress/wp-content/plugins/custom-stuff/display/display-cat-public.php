<?php
	// Loop through post type and custom meta
	function cstmstff_cat_public() {

		$taxonomies = array( 
		    'cstmstff-cat-public'
		);

		$args = array(
		    'hide_empty' => 0
		); 

		$terms = get_terms( $taxonomies, $args );

		echo '<h3>' . __( 'Display Category Public', 'custom-stuff' ) . '</h3>';
		echo '<ul>';
		foreach ( $terms as $term ) {
			echo '<li>' . esc_html( $term->name ) . '</li>';
			echo '<li>' . esc_html( $term->term_id ) . '</li>';
			echo '<li>' . esc_html( $term->slug ) . '</li>';
			echo '<li>' . esc_html( $term->description ) . '</li>';
			echo '<li>' . esc_html( get_term_meta( $term->term_id, 'cstmstff-text', true ) ) . '</li>';
			echo '<li>' . esc_url( get_term_meta( $term->term_id, 'cstmstff-url', true ) ) . '</li>'; 
			echo '<li>' . esc_html( get_term_meta( $term->term_id, 'cstmstff-multitext01', true ) ) . '</li>';
			echo '<li>' . esc_html( get_term_meta( $term->term_id, 'cstmstff-multitext02', true ) ) . '</li>';
			echo '<li>' . esc_html( get_term_meta( $term->term_id, 'cstmstff-multitext03', true ) ) . '</li>';
			echo '<li>' . esc_html( get_term_meta( $term->term_id, 'cstmstff-multitext04', true ) ) . '</li>';
			echo '<li>' . wpautop( esc_html( get_term_meta( $term->term_id, 'cstmstff-textarea', true ) ) ) . '</li>'; 
			echo '<li>' . esc_html( get_term_meta( $term->term_id, 'cstmstff-select', true ) ) . '</li>'; 
			echo '<li>' . esc_html( get_term_meta( $term->term_id, 'cstmstff-radio', true ) ) . '</li>'; 
			echo '<li>' . esc_html( get_term_meta( $term->term_id, 'cstmstff-checkbox', true ) ) . '</li>'; 
			echo '<li>' . esc_html( get_term_meta( $term->term_id, 'cstmstff-multicheck01', true ) ) . '</li>';
			echo '<li>' . esc_html( get_term_meta( $term->term_id, 'cstmstff-multicheck02', true ) ) . '</li>';
			echo '<li>' . esc_html( get_term_meta( $term->term_id, 'cstmstff-multicheck03', true ) ) . '</li>';
			echo '<li>' . esc_html( get_term_meta( $term->term_id, 'cstmstff-multicheck04', true ) ) . '</li>';			
			echo '<li>' . esc_html( get_term_meta( $term->term_id, 'cstmstff-color', true ) ) . '</li>'; 
			echo '<li>' . esc_url( get_term_meta( $term->term_id, 'cstmstff-image', true ) ) . '</li>'; 
			echo '<li>' . esc_html( get_term_meta( $term->term_id, 'cstmstff-editor', true ) ) . '</li>'; 
		}
		echo '</ul>';
		echo '<hr />';

	}
	add_shortcode( 'display-cat-public', 'cstmstff_cat_public' );