<?php
	/**
	* Template for displaying entry thumbnail
	*/
?>
<?php 
	if ( has_post_thumbnail() ) { 
		echo '<div class="entry-thumbnail">' . get_the_post_thumbnail() . '</div>'; 
	} 
?>