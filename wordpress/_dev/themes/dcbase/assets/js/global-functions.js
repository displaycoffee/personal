var prefix = 'dcbase';
var obj = {
	lang      : 'dcbase',
	prefix    : prefix,
	classes   : {},
	variables : {
		bottom   : document.body.scrollHeight + window.innerHeight,
		fontSize : 16
	}
};

// Check if substring is in string
function inString( value, search ) {
	return ( value.indexOf(search) !== -1 ) ? true : false;
}

// Check for mobile
function isMobile( respond ) {
	var windowWidth = ( window.innerWidth / obj.variables.fontSize );
	var docWidth = ( document.documentElement.clientWidth / obj.variables.fontSize );
	var bodyWidth = ( document.body.clientWidth / obj.variables.fontSize );

	if ( ( windowWidth || docWidth || bodyWidth ) <= respond ) {
		return true;
	} else {
		return false;
	}
}

// Debounce function from underscore.js and https://davidwalsh.name/javascript-debounce-function
function debounce( func, wait, immediate ) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if ( !immediate ) {
				func.apply( context, args );
			}
		};
		var callNow = immediate && !timeout;
		clearTimeout( timeout );
		timeout = setTimeout( later, wait );
		if ( callNow ) {
			func.apply( context, args );
		}
	};
};
