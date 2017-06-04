<?php
	/**
	* Template for displaying entry footer
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }	
?>
<footer class="entry-footer">
	<?php 
		// Display list of categories
		echo ambase_term_list( $post->ID, 'category', ', ', '<p class="categories"><strong>' . __( 'Categories', 'ambase' ) . ':</strong> ', '</p>' );
		
		// Display list of tags
		echo ambase_term_list( $post->ID, 'post_tag', ', ', '<p class="tags"><strong>' . __( 'Tags', 'ambase' ) . ':</strong> ', '</p>' );

		// sharing buttons
		get_template_part( 'partials/sharing', 'buttons' );

		// Display edit post link
		edit_post_link( __( 'Edit Content', 'ambase' ), '<p class="edit">', '</p>' );
	?>
</footer>