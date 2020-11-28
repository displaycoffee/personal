// Add browser class to html tag
function addBrowserClass() {
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

// Create dropdown toggles
function initializeDropdownMenu( config ) {
	config = {
		dropdown  : config,
		classes   : {
			label   : 'dropdown-label',
			content : 'dropdown-content',
			trigger : 'dropdown-trigger',
			hidden  : 'dropdown-hidden',
			visible : 'dropdown-visible'
		},
		selectors : {},
		html      : {}
	};

	// Update object properties
	config.selectors.main = jQuery( config.dropdown.main );
	config.selectors.trigger = jQuery( '.' + config.classes.trigger );
	config.html.label = '<div class="' + config.classes.label + '  flex-row-nowrap flex-row-center"></div>';
	config.html.trigger = '<button type="button" class="button-link ' + config.classes.trigger + '" role="button"><span class="icon icon-angle-down"></span></button>';

	if ( config.selectors.main && config.selectors.main.length ) {
		config.selectors.main.each( function() {
			var current = jQuery( this );
			current.addClass( 'dropdown' );

			// Don't do any of the below if there is no dropdown content
			var dropdownContent = current.find( config.dropdown.content );

			if ( dropdownContent && dropdownContent.length ) {
				dropdownContent.addClass( config.classes.content );

				// Wrap dropdown text and add trigger element
				current.find( config.dropdown.label ).wrap( config.html.label ).after( config.html.trigger );

				// Add dropdown trigger click
				current.find( '.' + config.classes.trigger ).off().on( 'click', function() {
					// Toggle casses on dropdown content
					if ( current.hasClass( config.classes.visible ) ) {
						config.selectors.main.removeClass( config.classes.visible ).removeClass( config.classes.hidden );
					} else {
						config.selectors.main.removeClass( config.classes.visible ).addClass( config.classes.hidden );
						current.removeClass( config.classes.hidden ).addClass( config.classes.visible );
					}
				});
			} else {
				// Wrap dropdown text
				current.find( config.dropdown.label ).wrap( config.html.label );
			}
		});

		// If anything outside the dropdown trigger is clicked on, hide dropdown
		jQuery( document ).off().on( 'click', function( event ) {
			if ( !jQuery( event.target ).closest( config.dropdown.main ).length ) {
				config.selectors.main.removeClass( config.classes.visible ).removeClass( config.classes.hidden );
			}
		});
	}
}

// Initialize Mobile Menu
function initializeMobileMenu( config ) {
	config = {
		menu      : config,
		classes   : {
			hidden  : 'navigation-hidden',
			visible : 'navigation-visible'
		},
		selectors : {
			body : jQuery( 'body' )
		}
	};

	// Update object properties
	config.selectors.menu = jQuery( config.menu.menu );
	config.selectors.menuContainer = jQuery( config.menu.menuContainer );
	config.selectors.mobileToggle = jQuery( config.menu.mobileToggle );
	config.selectors.mobileMenu = jQuery( config.menu.mobileMenu );
	config.selectors.mobileContent = jQuery( config.menu.mobileContent );

	// Set a mobile false state (for window resize mainly)
	config.menu.once = false;

	// Create open / close function
	function toggleMobileMenu() {
		if ( config.selectors.body.hasClass( config.classes.visible ) ) {
			config.selectors.body.removeClass( config.classes.visible );
		} else {
			config.selectors.body.addClass( config.classes.visible );
		}
	}

	// Add/remove classes when mobile menu button or overlay is clicked on
	config.selectors.mobileToggle.off().on( 'click', function() {
		toggleMobileMenu();
	});

	// Resize actions for mobile menu
	function mobileResizeAction() {
		// Check if we are on mobile
		config.menu.isMobile = isMobile( config.menu.width / obj.variables.fontSize );

		// Check all sorts of window and document widths to make sure resizing is consistent across browsers
		if ( config.menu.isMobile ) {
			// Check if mobile ones is false, meaning we haven't activated the mobile menu yet
			if ( !config.menu.once ) {
				// Move menu to menu container
				config.selectors.menu.detach().appendTo( config.selectors.mobileContent );

				// After everything has been done, set mobile to true so it's not run again on resize
				config.menu.once = true;
			}
		} else {
			// Check if mobile is true, meaning we're resizing and want to clean up on resize
			if ( config.menu.once ) {
				// Remove close button, replace menu, remove slide menu toggle, and remove any extra classes
				config.selectors.menu.detach().appendTo( config.selectors.menuContainer );
				config.selectors.body.removeClass( config.classes.visible );

				// Then set mobile to false again so we can start over
				config.menu.once = false;
			}
		}
	}

	// Call mobile menu once if browser is brought up or refreshed
	mobileResizeAction();

	// Then run mobile menu on resizing using debounce
	var resizeMenuForMobile = debounce( function() {
		mobileResizeAction();
	}, 100 );
	window.addEventListener( 'resize', resizeMenuForMobile );
}
