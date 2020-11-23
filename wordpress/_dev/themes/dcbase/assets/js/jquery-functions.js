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
			hidden  : 'dropdown-not-visible',
			visible : 'dropdown-visible'
		},
		selectors : {},
		html      : {}
	};

	// Update object properties
	config.selectors.main = jQuery( config.dropdown.main );
	config.selectors.trigger = jQuery( '.' + config.classes.trigger );
	config.html.label = '<div class="' + config.classes.label + '"></div>';
	config.html.trigger = '<span class="' + config.classes.trigger + ' icon icon-angle-down"></span>';

	if ( config.selectors.main && config.selectors.main.length ) {
		config.selectors.main.each( function() {
			var current = jQuery( this );
			current.addClass( config.classes.hidden );

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
						config.selectors.main.removeClass( config.classes.visible ).addClass( config.classes.hidden );
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
				config.selectors.main.removeClass( config.classes.visible ).addClass( config.classes.hidden );
			}
		});
	}
}

// Initialize Mobile Menu
function initializeMobileMenu( options ) {
	// Variables from mobile object
	var menu = jQuery( config.menu );
	var menuContainer = jQuery( config.menuContainer );
	var mobileButton = jQuery( config.mobileButton );
	var mobileMenu = jQuery( config.mobileMenu );
	var mobileContent = jQuery( config.mobileContent );
	var mobileOverlay = jQuery( config.mobileOverlay );
	var width = config.width;

	// Set a mobile false state (for window resize mainly)
	var mobileOnce = false;

	// Create open / close function
	function toggleMobileMenu() {
		if ( mobileMenu.hasClass( 'show' ) ) {
			mobileMenu.removeClass( 'show' );
			jQuery( 'body, html' ).removeClass( 'mobile-open' );
		} else {
			mobileMenu.addClass( 'show' );
			jQuery( 'body, html' ).addClass( 'mobile-open' );
		}
	}

	// Add/remove classes when mobile menu button or overlay is clicked on
	mobileButton.off().on( 'click', function() {
		toggleMobileMenu();
	});
	mobileOverlay.off().on( 'click', function() {
		toggleMobileMenu();
	});

	// Resize actions for mobile menu
	function mobileResizeAction() {
		// Check if we are on mobile
		var onMobile = isMobile( width / khy.variables.fontSize );

		// Check all sorts of window and document widths to make sure resizing is consistent across browsers
		if ( onMobile ) {
			// Check if mobile ones is false, meaning we haven't activated the mobile menu yet
			if ( !mobileOnce ) {
				// Close menu when button is clicked on
				jQuery( '.mobile-menu-header .fa-close' ).off().on( 'click', function() {
					toggleMobileMenu();
				});

				// Move menu to menu container
				menu.detach().appendTo( mobileContent );

				// After everything has been done, set mobile to true so it's not run again on resize
				mobileOnce = true;
			}
		} else {
			// Check if mobile is true, meaning we're resizing and want to clean up on resize
			if ( mobileOnce ) {
				// Remove close button, replace menu, remove slide menu toggle, and remove any extra slide-open class
				menu.detach().appendTo( menuContainer );
				jQuery( 'body, html' ).removeClass( 'mobile-open' );
				mobileMenu.removeClass( 'show' );

				// Then set mobile to false again so we can start over
				mobileOnce = false;
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
