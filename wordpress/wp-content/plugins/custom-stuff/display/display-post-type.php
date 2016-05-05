<?php
	// Loop through post type and custom meta
	function cstmstff_display_post() {

		$args = array(
			'post_type' => 'cstmstff-post-type'
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			echo '<h3>' . __( 'Display Post Type', 'custom-stuff' ) . '</h3>';
			echo '<ul>';
			while ( $query->have_posts() ) {
				$query->the_post();
				$postID = get_the_ID();
				echo '<li>' . get_the_title() . '</li>';
				echo '<li>' . get_the_content() . '</li>';
				echo '<li>' . esc_html( get_post_meta( $postID, '_cstmstff-text', true ) ) . '</li>';
				echo '<li>' . esc_url( get_post_meta( $postID, '_cstmstff-url', true ) ) . '</li>';
				echo '<li>' . esc_html( get_post_meta( $postID, '_cstmstff-multitext01', true ) ) . '</li>';
				echo '<li>' . esc_html( get_post_meta( $postID, '_cstmstff-multitext02', true ) ) . '</li>';
				echo '<li>' . esc_html( get_post_meta( $postID, '_cstmstff-multitext03', true ) ) . '</li>';
				echo '<li>' . esc_html( get_post_meta( $postID, '_cstmstff-multitext04', true ) ) . '</li>';
				echo '<li>' . wpautop( esc_html( get_post_meta( $postID, '_cstmstff-textarea', true ) ) ) . '</li>';
				echo '<li>' . esc_html( get_post_meta( $postID, '_cstmstff-select', true ) ) . '</li>';
				echo '<li>' . esc_html( get_post_meta( $postID, '_cstmstff-radio', true ) ) . '</li>';
				echo '<li>' . esc_html( get_post_meta( $postID, '_cstmstff-checkbox', true ) ) . '</li>';
				echo '<li>' . esc_html( get_post_meta( $postID, '_cstmstff-multicheck01', true ) ) . '</li>';
				echo '<li>' . esc_html( get_post_meta( $postID, '_cstmstff-multicheck02', true ) ) . '</li>';
				echo '<li>' . esc_html( get_post_meta( $postID, '_cstmstff-multicheck03', true ) ) . '</li>';
				echo '<li>' . esc_html( get_post_meta( $postID, '_cstmstff-multicheck04', true ) ) . '</li>';
				echo '<li>' . esc_html( get_post_meta( $postID, '_cstmstff-color', true ) ) . '</li>';
				echo '<li>' . esc_url( get_post_meta( $postID, '_cstmstff-image', true ) ) . '</li>';
			}
			echo '</ul>';
			echo '<hr />';
		}

		wp_reset_postdata();

	}
	add_shortcode( 'display-posts', 'cstmstff_display_post' );