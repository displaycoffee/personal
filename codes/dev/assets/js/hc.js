// Hello Content! (A Tabbing Script) by Memoria / displaycoffee.
// Last updated 07.21.18.
function helloContent(selector) {
	var selector = jQuery(selector);

	// Check if selector is on the page
	if (selector && selector.length) {
	    // Click action for tabs
        selector.off().on( 'click', function() {
		    // Store the current selector as a variable
	        var current = jQuery(this);

			// Get parent wrapper
			var tabWrapper = current.parent().closest('.hc-tabs-wrapper');

			// Remove all show and active classes
			tabWrapper.find('.hc-tabs-list li').removeClass('hc-tab-active');
			tabWrapper.find('.hc-tab-content').removeClass('hc-tab-show');

			// Add active class onto the active clicked tab
			current.parent('li').addClass('hc-tab-active');
			
	        // Find the content tab for the current selector and show it
			tabWrapper.find('.' + current.attr('data-tab')).addClass('hc-tab-show');
		});
	}
}

jQuery(document).ready( function($) {
	// Initialize the tabs
	// Should be run AFTER jQuery loads on the site
    helloContent('.hc-tabs-list li span');
});
