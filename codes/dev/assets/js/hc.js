// Hello Content! (A Tabbing Script) by Memoria / displaycoffee.
// Last updated 07.21.18.
function helloContent(selector) {
	var selector = document.querySelectorAll(selector);

	// Check if selector is on the page
	if (selector && selector.length) {
		for (var i = 0; i < selector.length; i++) {

			selector[i].addEventListener( 'click', function(e) {
				// Store the current selector as a variable
				var current = e.target || e.srcElement;

				// Get parent wrapper
				var tabWrapper = findParent(current, 'hc-tabs-wrapper');

				for (var j = 0; j < tabWrapper.childNodes.length; j++) {
					var tabContent = tabWrapper.childNodes[j];
					var tabClass = tabContent.className;

					if (tabClass && tabClass.indexOf('hc-tab-content') !== -1 && tabClass.indexOf('hc-tab-show') !== -1) {
						tabContent.className = tabContent.className.replace('hc-tab-show', '');
					}

					// if (tabContent && tabContent.className.indexOf('hc-tab-content') !== -1) {
					// 	console.log('true')
					// }
				}

			});
		}

		// Click action for tabs
		// selector.off().on( 'click', function() {
		//
		// 	var current = jQuery(this);
		//

		//
		// 	// Remove all show and active classes
		// 	tabWrapper.find('.hc-tabs-list li').removeClass('hc-tab-active');
		// 	tabWrapper.find('.hc-tab-content').removeClass('hc-tab-show');
		//
		// 	// Add active class onto the active clicked tab
		// 	current.parent('li').addClass('hc-tab-active');
		//
		// 	// Find the content tab for the current selector and show it
		// 	tabWrapper.find('.' + current.attr('data-tab')).addClass('hc-tab-show');
		// });

		function findParent(selector, selectorClass) {
			while ((selector = selector.parentNode)) {
				if (selector.parentNode.className.indexOf(selectorClass) !== -1) {
					return selector.parentNode;
				}
			}
			return null;
		}

	}
}

//jQuery(document).ready( function($) {
	// Initialize the tabs
	// Should be run AFTER jQuery loads on the site
	helloContent('.hc-tabs-list li span');
//});
