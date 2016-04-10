// Check if simple-navigation on attachment.php is empty. If so, remove it
function checkSimpleNav() {
	if ( jQuery( 'body' ).hasClass( 'attachment' ) ) {
		// Get length of child elements in previous and next
		var previous = jQuery( '.simple-navigation .previous' ).children().length;
		var next = jQuery( '.simple-navigation .next' ).children().length;
		
		// Hide simple-navigation elements if they are empty
		if ( !previous && !next ) {
			jQuery( '.simple-navigation' ).remove();
		} else if ( !previous ) {
			jQuery( '.simple-navigation .previous' ).remove();
		} else if ( !next ) {
			jQuery( '.simple-navigation .next' ).remove();
		}
	}
}