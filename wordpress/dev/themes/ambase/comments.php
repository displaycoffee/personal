<?php
	/**
	* Template for displaying comments
	*
	* The area of the page that contains both current comments
	* and the comment form.	
	*/

	/* 
	* Check if post password is required
	*/
	if ( post_password_required() ) {
		return;
	}

	/* 
	* Check if a person is trying to directly access the template
	*/
	if ( 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
		die( 'You can not access this page directly!' );
	}	

	function display_comments() {
		if ( get_comment_pages_count() > 1 ) {
			echo '<nav class="simple-navigation">';
			echo '<div class="paginated-comments-links">' . paginate_comments_links() . '</div>';
			echo '</nav>';
		}
	}

?>
<?php 
	if ( have_comments() ) : 
		global $comments_by_type;
		$get_comments = get_comments('status=approve&post_id=' . $id); 
		$comments_by_type = separate_comments( $get_comments );
		if ( !empty( $comments_by_type['comment'] ) ) : 
?>
	<div id="comments">
		<div id="comments-list" class="comments">
			<h3><?php comments_number(); ?></h3>
			<?php display_comments() ?>
			<ul>
				<?php wp_list_comments( 'callback=ambase_custom_comments' ); ?>
			</ul>
			<?php display_comments() ?>			
		</div>
		<?php endif; ?>
	</div>
<?php endif; ?>	
<?php if ( comments_open() ) comment_form(); ?>