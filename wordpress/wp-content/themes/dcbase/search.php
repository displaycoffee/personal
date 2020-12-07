<?php
	/**
	* Template for displaying search
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Add config object to footer
	$config = dcbase_config();
?>
<?php
	get_header();
	get_template_part( 'partials/layout', 'open' );
?>
<header class="entry-search-header">
	<?php
		dcbase_create_title( array(
			'element' => 'h1',
			'class'   => 'entry-search-title',
			'label'   => sprintf( __( $config->search->results . ' %s', $config->lang ), get_search_query() )
		) );
	?>
</header>
<?php
	get_template_part( 'loop', 'index' );
	get_template_part( 'partials/layout', 'close' );
	get_footer();
?>
