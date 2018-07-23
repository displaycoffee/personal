// Hello Content! (A Tabbing Script) by Memoria / displaycoffee.
// Last updated 07.22.18.
helloContent('.hc-tabs-list li span');

// You only need to add this function once
function helloContent(selector) {
	var tabSelector = document.querySelectorAll(selector);

	// Check if selector is on the page
	if (tabSelector) {
		// Loop through tabs and add click event
		for (var i = 0; i < tabSelector.length; i++) {
			tabSelector[i].addEventListener( 'click', function(e) {
				// Store the current selector as a variable
				var current = e.target || e.srcElement;
				var dataAttribute = current.getAttribute('data-tab');

				// Get parent elements
				var tabContent = hcFindParent(current, 'hc-tabs-wrapper').querySelector('.hc-tab-content');
				var tabList = hcFindParent(current, 'hc-tabs-list');

				// Check if necessary elements are available
				if (tabList && tabContent) {
					if (tabList) {
						// Loop through hc-tabs-list child elements
						for (var j = 0; j < tabList.childNodes.length; j++) {
							var tabListOption = tabList.childNodes[j];
							var tabListClass = tabListOption.className;

							// Find any element with hc-tab-active and remove the class
							if (tabListClass && hcCheckValue(tabListClass, 'hc-tab-active')) {
								tabListOption.className = hcToggleClass('remove', tabListClass, 'hc-tab-active');
							}
						}

						// Add hc-tab-active to the new active tab
						current.parentNode.className = hcToggleClass('add', current.parentNode.className, 'hc-tab-active');
					}

					if (tabContent) {
						// Loop through hc-tabs-wrapper child elements
						for (var k = 0; k < tabContent.childNodes.length; k++) {
							var tabContentBlock = tabContent.childNodes[k];
							var tabContentClass = tabContentBlock.className;

							// Find the hc-content-block elements and add or remove hc-tab-show class
							if (tabContentClass && hcCheckValue(tabContentClass, 'hc-content-block')) {
								if (hcCheckValue(tabContentClass, 'hc-tab-show') && !hcCheckValue(tabContentClass, dataAttribute)) {
									tabContentBlock.className = hcToggleClass('remove', tabContentClass, 'hc-tab-show');
								} else if (!hcCheckValue(tabContentClass, 'hc-tab-show') && hcCheckValue(tabContentClass, dataAttribute)) {
									tabContentBlock.className = hcToggleClass('add', tabContentClass, 'hc-tab-show');
								}
							}
						}
					}
				}
			});
		}

		// Find specific parent selectors
		function hcFindParent(selector, selectorClass) {
			while (selector = selector.parentNode) {
				if (hcCheckValue(selector.parentNode.className, selectorClass)) {
					return selector.parentNode;
				}
			}
			return null;
		}

		// Add or remove classes
		function hcToggleClass(type, selectorClass, value) {
			var newClasses = (type == 'add') ? (selectorClass + ' ' + value) : selectorClass.replace(value, '');
			return newClasses.replace(/ +/g, ' ').trim()
		}

		// Check if the value is in the string
		function hcCheckValue(selector, find) {
			return (selector.indexOf(find) !== -1) ? true : false;
		}
	}
}
