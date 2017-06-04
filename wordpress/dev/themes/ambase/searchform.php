<?php
	/**
	* Template for displaying a custom search bar
	*/

	// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) { exit; }	
?>
<div class="search-bar">
	<form class="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">	    
	    <input class="text" id="s" name="s" type="text" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php _e( 'Search for content..', 'ambase' ); ?>" />
	    <button class="submit-button inline-button" type="submit" value="<?php _e( 'Search', 'ambase' ); ?>">
	    	<?php _e( 'Submit', 'ambase' ); ?>
	    </button>
	</form>
</div>