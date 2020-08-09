// Add browser class to html tag
function dcbaseAddBrowserClass() {
	var deviceAgent = navigator.userAgent.toLowerCase();
	var htmlSelector = jQuery( 'html' );

	if ( deviceAgent.match( /(iphone|ipod|ipad)/ ) ) {
		htmlSelector.addClass( obj['prefix'] + '-ios mobile' );
	}

	if ( navigator.userAgent.search( 'MSIE' ) >= 0 ) {
		htmlSelector.addClass( obj['prefix'] + '-ie' );
	} else if ( navigator.userAgent.search( 'Chrome' ) >= 0 ) {
		htmlSelector.addClass( obj['prefix'] + '-chrome' );
	} else if ( navigator.userAgent.search( 'Firefox' ) >= 0 ) {
		htmlSelector.addClass( obj['prefix'] + '-firefox' );
	} else if ( navigator.userAgent.search( 'Safari' ) >= 0 && navigator.userAgent.search( 'Chrome' ) < 0 ) {
		htmlSelector.addClass( obj['prefix'] + '-safari' );
	} else if ( navigator.userAgent.search( 'Opera' ) >= 0 ) {
		htmlSelector.addClass( obj['prefix'] + '-opera' );
	}
}
