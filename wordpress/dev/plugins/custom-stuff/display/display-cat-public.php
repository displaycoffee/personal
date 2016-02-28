<?php

	// Loop through post type and custom meta
	function xyz_cat_public() {

		$taxonomies = array( 
		    'xyz-cat-public'
		);

		$args = array(
		    'hide_empty' => 0
		); 

		$terms = get_terms($taxonomies, $args);

		echo '<h3>Display Category Public</h3>';
		echo '<ul>';
		foreach ($terms as $term) {
			echo '<li>' . $term->name . '</li>';
			echo '<li>' . $term->term_id . '</li>';
			echo '<li>' . $term->slug . '</li>';
			echo '<li>' . $term->description . '</li>';
			echo '<li>' . get_term_meta($term->term_id, 'xyz-text', true) . '</li>';
			echo '<li>' . get_term_meta($term->term_id, 'xyz-url', true) . '</li>'; 
			echo '<li>' . get_term_meta($term->term_id, 'xyz-multitext01', true) . '</li>';
			echo '<li>' . get_term_meta($term->term_id, 'xyz-multitext02', true) . '</li>';
			echo '<li>' . get_term_meta($term->term_id, 'xyz-multitext03', true) . '</li>';
			echo '<li>' . get_term_meta($term->term_id, 'xyz-multitext04', true) . '</li>';
			echo '<li>' . wpautop(get_term_meta($term->term_id, 'xyz-textarea', true)) . '</li>'; 
			echo '<li>' . get_term_meta($term->term_id, 'xyz-select', true) . '</li>'; 
			echo '<li>' . get_term_meta($term->term_id, 'xyz-radio', true) . '</li>'; 
			echo '<li>' . get_term_meta($term->term_id, 'xyz-checkbox', true) . '</li>'; 
			echo '<li>' . get_term_meta($term->term_id, 'xyz-multicheck01', true) . '</li>';
			echo '<li>' . get_term_meta($term->term_id, 'xyz-multicheck02', true) . '</li>';
			echo '<li>' . get_term_meta($term->term_id, 'xyz-multicheck03', true) . '</li>';
			echo '<li>' . get_term_meta($term->term_id, 'xyz-multicheck04', true) . '</li>';			
			echo '<li>' . get_term_meta($term->term_id, 'xyz-color', true) . '</li>'; 
			echo '<li>' . get_term_meta($term->term_id, 'xyz-image', true) . '</li>'; 
			echo '<li>' . get_term_meta($term->term_id, 'xyz-editor', true) . '</li>'; 
		}
		echo '</ul>';
		echo '<hr />';

	}
	add_shortcode( 'display-cat-public', 'xyz_cat_public' );