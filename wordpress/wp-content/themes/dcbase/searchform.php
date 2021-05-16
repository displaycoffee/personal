<?php
	/**
	* Template for displaying custom search bar
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Add config object to footer
	$config = dcbase_config();

	// Create search form id
	if ( $args && count( $args ) && $args['id'] ) {
		$search_id = 'search-form-' . $args['id'];
	} else {
		$search_id = 'search-form-' . wp_unique_id();
	}

	// Create aria-label value
	if ( get_search_query() ) {
		$search_aria = $config->search->results . ' ' . get_search_query();
	} else {
		$search_aria = $config->search->text;
	}
?>
<form class="search-form" aria-label="<?php echo esc_attr( $search_aria ); ?>" method="get" action="<?php echo esc_url( $config->home ); ?>" role="search">
	<div class="flex-row">
		<div class="search-form-label flex-column">
			<label class="form-label" for="<?php echo esc_attr( $search_id ); ?>"><?php _e( $config->search->label, $config->lang ); ?></label>
		</div>
		<div class="search-form-field flex-column">
			<input id="<?php echo esc_attr( $search_id ); ?>" class="form-field" type="search" placeholder="<?php echo esc_attr_x( $config->search->text, 'placeholder', $config->lang ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		</div>
		<div class="search-form-submit flex-column">
			<button class="button" type="submit" role="button">
				<span class="button-icon icon icon-search"></span><span class="button-label"><?php _e( $config->search->text, $config->lang ); ?></span>
			</button>
		</div>
	</div>
</form>
