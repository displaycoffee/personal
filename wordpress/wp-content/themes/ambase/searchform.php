<?php
	/**
	* Template for displaying a custom search bar
	*/
?>
<div class="search-bar">
	<form class="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	    <label for="search">
	    	<?php _e( 'Search for:', 'ambase' ); ?>
	    </label>
	    <input class="text" id="s" name="s" type="text" value="<?php echo esc_attr( get_search_query() ); ?>" />
	    <input class="submit-button" type="submit" value="<?php _e( 'Search', 'ambase' ); ?>" />
	</form>
</div>