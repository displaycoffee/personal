<?php

	// Loop through post type and custom meta
	function xyz_display_post() {

		$args = array(
			'post_type' => 'xyz-post-type'
		);

		$query = new WP_Query($args);

		if ( $query->have_posts() ) {
			echo '<h3>Display Post Type</h3>';
			echo '<ul>';
			while ( $query->have_posts() ) {
				$query->the_post();
				$postID = get_the_ID();
				echo '<li>' . get_the_title() . '</li>';
				echo '<li>' . get_the_content() . '</li>';
				echo '<li>' . get_post_meta( $postID, '_xyz-text', true ) . '</li>';
				echo '<li>' . get_post_meta( $postID, '_xyz-url', true ) . '</li>';
				echo '<li>' . get_post_meta( $postID, '_xyz-multitext01', true ) . '</li>';
				echo '<li>' . get_post_meta( $postID, '_xyz-multitext02', true ) . '</li>';
				echo '<li>' . get_post_meta( $postID, '_xyz-multitext03', true ) . '</li>';
				echo '<li>' . get_post_meta( $postID, '_xyz-multitext04', true ) . '</li>';
				echo '<li>' . wpautop(get_post_meta( $postID, '_xyz-textarea', true )) . '</li>';
				echo '<li>' . get_post_meta( $postID, '_xyz-select', true ) . '</li>';
				echo '<li>' . get_post_meta( $postID, '_xyz-radio', true ) . '</li>';
				echo '<li>' . get_post_meta( $postID, '_xyz-checkbox', true ) . '</li>';
				echo '<li>' . get_post_meta( $postID, '_xyz-multicheck01', true ) . '</li>';
				echo '<li>' . get_post_meta( $postID, '_xyz-multicheck02', true ) . '</li>';
				echo '<li>' . get_post_meta( $postID, '_xyz-multicheck03', true ) . '</li>';
				echo '<li>' . get_post_meta( $postID, '_xyz-multicheck04', true ) . '</li>';
				echo '<li>' . get_post_meta( $postID, '_xyz-color', true ) . '</li>';
				echo '<li>' . get_post_meta( $postID, '_xyz-image', true ) . '</li>';
			}
			echo '</ul>';
			echo '<hr />';
		}

		wp_reset_postdata();

	}
	add_shortcode( 'display-posts', 'xyz_display_post' );