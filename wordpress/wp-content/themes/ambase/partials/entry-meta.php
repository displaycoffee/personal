<?php
	/**
	* Template for displaying entry meta
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }	
?>
<div class="entry-meta">
	<?php 
		// Dont display publisher schema on attachment pages
		if ( !is_attachment() ) {
			// Variables from theme customizer options
			$publisher_logo = get_template_directory_uri() . '/assets/images/publisher-logo.png';

			// Display publisher schema
			$publisher_schema = '<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">';
			$publisher_schema .= '<meta itemprop="name" content="' . get_bloginfo( 'name' ) . '">';
			$publisher_schema .= '<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">';
			$publisher_schema .= '<meta itemprop="url" content="' . esc_url( $publisher_logo ) . '">';
			$publisher_schema .= '<meta itemprop="width" content="600">';
			$publisher_schema .= '<meta itemprop="height" content="60">';
			$publisher_schema .= '</div></div>';
			echo $publisher_schema;
		}
	?>
	<?php 
		// Dont display author schema attribute on attachment pages
		if ( !is_attachment() ) {
			$att_schema = ' itemprop="author"';
		} else {
			$att_schema = '';
		}

		// Check if author is available
		if ( !is_author() ) {
			echo '<p class="author"' . $att_schema . '>' .  get_the_author_posts_link() . '</p>';
		}
	?>
	<?php 
		// Dont display date schema attribute on attachment pages
		if ( !is_attachment() ) {
			$date_schema = ' itemprop="datePublished"';
		} else {
			$date_schema = '';
		}

		// Display the date
		echo '<p class="date"' . $date_schema . '>' .  get_the_time( get_option( 'date_format' ) ) . '</p>';

		// Dont display modified date schema on attachment pages
		if ( !is_attachment() ) {
			echo '<meta itemprop="dateModified" content="' .  get_the_modified_date( get_option( 'date_format' ) ) . '"/>';
		}
	?>
</div>