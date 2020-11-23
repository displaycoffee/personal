<?php
	/**
	* Template for displaying a custom search bar
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Variables for search form
	$search_label = 'Search for:';
	$search_text = 'Search';
	$search_id = 'header-search-form-input';
?>
<form role="search" aria-label="<?php echo esc_attr( $search_label ); ?>" method="get" class="search-form" action="<?php echo esc_url( get_home_url( '/' ) ); ?>">
	<div class="flex-row-nowrap flex-row-center">
		<div class="flex-column search-form-label">
			<label for="<?php echo esc_attr( $search_id ); ?>" class="form-label"><?php _e( $search_label, 'dcbase' ); ?></label>
		</div>
		<div class="flex-column search-form-field">
			<input type="search" id="<?php echo esc_attr( $search_id ); ?>" class="form-field" placeholder="<?php echo esc_attr_x( $search_text, 'placeholder', 'dcbase' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		</div>
		<div class="flex-column search-form-submit">
			<button type="submit" class="button" role="button">
				<span class="button-icon icon icon-search"></span><span class="button-label"><?php _e( $search_text, 'dcbase' ); ?></span>
			</button>
		</div>
	</div>
</form>
