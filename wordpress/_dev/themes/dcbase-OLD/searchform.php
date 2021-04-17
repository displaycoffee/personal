<?php
	/**
	* Template for displaying a custom search bar
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Add config object to footer
	$config = dcbase_config();
?>
<form role="search" aria-label="<?php echo esc_attr( $config->search->label ); ?>" method="get" class="search-form" action="<?php echo esc_url( $config->home ); ?>">
	<div class="flex-row-nowrap flex-row-center">
		<div class="flex-column search-form-label">
			<label for="<?php echo esc_attr( $config->search->id ); ?>" class="form-label"><?php _e( $config->search->label, $config->lang ); ?></label>
		</div>
		<div class="flex-column search-form-field">
			<input type="search" id="<?php echo esc_attr( $config->search->id ); ?>" class="form-field" placeholder="<?php echo esc_attr_x( $config->search->text, 'placeholder', $config->lang ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		</div>
		<div class="flex-column search-form-submit">
			<button type="submit" class="button" role="button">
				<span class="button-icon icon icon-search"></span><span class="button-label"><?php _e( $config->search->text, $config->lang ); ?></span>
			</button>
		</div>
	</div>
</form>
