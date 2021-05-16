<?php
	/**
	* Template for displaying the entry edit link
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Display edit link
	edit_post_link( null, '<div class="entry-edit">', '</div>', '', 'entry-edit-link' );
?>
