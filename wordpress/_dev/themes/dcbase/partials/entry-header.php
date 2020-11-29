<?php
	/**
	* Template for displaying the entry header
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }
?>
<header class="entry-header">
	<?php
		dcbase_create_title( array(
			'element' => is_singular() ? 'h1' : 'h2',
			'class'   => 'entry-title',
			'url'     => get_the_permalink(),
			'label'   => get_the_title(),
			'rel'     => 'bookmark'
		) );

		edit_post_link();

		if ( !is_search() ) {
			get_template_part( 'entry', 'meta' );
		}
	?>
</header>
