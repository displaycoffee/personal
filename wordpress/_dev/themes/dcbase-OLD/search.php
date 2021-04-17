<?php
	/**
	* Template for displaying search
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Add config object to footer
	$config = dcbase_config();

	get_header();
?>
<header class="entry-search-header">
	<div class="wrapper">
		<?php
			dcbase_create_title( array(
				'element' => 'h1',
				'class'   => 'entry-search-title',
				'label'   => sprintf( __( $config->search->results . ' %s', $config->lang ), get_search_query() )
			) );
		?>
	</div>
</header>
<div class="entry-search-content">
	<?php
		get_template_part( 'partials/layout', 'open' );
		get_template_part( 'loop', 'index' );
		get_template_part( 'partials/layout', 'close' );
		get_footer();
	?>
</div>
