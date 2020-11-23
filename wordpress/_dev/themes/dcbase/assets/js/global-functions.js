var prefix = 'dcbase';
var obj = {
	'lang'      : 'dcbase',
	'prefix'    : prefix,
	'classes'   : {},
	'variables' : {
		'bottom'   : document.body.scrollHeight + window.innerHeight,
		'fontSize' : 16
	}
};

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
