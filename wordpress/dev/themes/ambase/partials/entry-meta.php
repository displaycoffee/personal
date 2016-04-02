<?php
	/**
	* Template for displaying entry meta
	*/
?>
<div class="entry-meta">
	<?php 
		if ( !is_author() ) {
			echo '<p class="author">' .  get_the_author_posts_link() . '</p>';
		}
	?>
	<p class="date"><?php the_time( get_option( 'date_format' ) ); ?></p>
</div>