<?php
	/**
	* Template for displaying entry navigation
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Add config object
	$config = dcbase_config();

	// Config for pagination
	$pagination_show = ( $wp_query->max_num_pages > 1 ) ? true : false;
	$pagination_config = array(
		'end_size'  => 1,
		'mid_size'  => 3,
		'prev_text' => __( 'Previous', $config->lang ),
		'next_text' => __( 'Next', $config->lang )
	);
?>
<?php if ( $pagination_show ) : ?>
	<nav class="navigation navigation-pagination">
		<div class="pagination">
			<?php echo paginate_links( $pagination_config ) ?>
		</div>
	</nav>
<?php endif; ?>
