<?php
	/**
	* Template for displaying single entries
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	get_header();
?>
<header class="entry-single-header">
	<div class="wrapper">
		<div class="flex-row">
			<?php
				get_template_part( 'partials/entry', 'thumbnail' );
				dcbase_create_title( array(
					'element' => 'h1',
					'class'   => 'entry-title flex-column',
					'url'     => get_the_permalink(),
					'label'   => get_the_title()
				) );
			?>
		</div>
	</div>
</header>
<div class="entry-single-content">
	<?php
		get_template_part( 'partials/layout', 'open' );
		get_template_part( 'entry' );
		get_template_part( 'partials/layout', 'close' );
		get_footer();
	?>
</div>
