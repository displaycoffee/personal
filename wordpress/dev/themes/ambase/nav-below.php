<?php
	/**
	* Template for displaying pagination
	*/
?>
<?php
	if ( $wp_query->max_num_pages > 1 ) {

		// Pagination arguements
		$args = array(
			'end_size' => 2,
			'mid_size' => 3,
			'prev_text' => __( 'Previous', 'ambase' ),
			'next_text' => __( 'Next', 'ambase' ),
		);

		echo '<nav class="pagination">'. paginate_links( $args ) . '</nav>';
	}
?>