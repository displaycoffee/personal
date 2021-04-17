<?php
	/**
	* Template for displaying the entry header
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }
?>
<header class="entry-header">
	<?php
		// Don't add title on single post pages
		if ( !is_singular() ) {
			dcbase_create_title( array(
				'element' => 'h2',
				'class'   => 'entry-title',
				'url'     => get_the_permalink(),
				'label'   => get_the_title(),
				'rel'     => 'bookmark'
			) );
		}
		edit_post_link();
	?>
	<div class="entry-meta">
		<span class="entry-meta-author"><?php the_author_posts_link(); ?></span>
		<span class="entry-meta-separator"> | </span>
		<span class="entry-meta-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
	</div>
</header>
