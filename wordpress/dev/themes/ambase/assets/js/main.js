// Toggle navigation sub menus
function toggleNavSubMenus( selector ) {
	jQuery( selector ).each( function() {
		// Get current selector and check if there are any second level lists
		var currentNav = jQuery( this );
		var children = currentNav.children( 'ul' );

		// If there is a second level list, add a menu toggle icon
		if ( children.length > 0 ) {
			console.log('hello');
			// Add a toggle icon after main link element
			jQuery( '<span class="icon toggle-submenu">+</span>' ).insertAfter( currentNav.find( '> a' ) ); 

			// Create sub menu variables for targetting			
			var subMenuButton = currentNav.find( '.toggle-submenu' );
			var subMenu = currentNav.find( '.sub-menu' );

			// Toggle show/hide class if search button is clicked on
			jQuery( subMenuButton ).click( function() {
				jQuery( subMenu ).toggleClass( 'show' );
				jQuery( subMenuButton ).toggleClass( 'show' );
			});

			// If anything outside search-button is clicked on, hide the search bar
			jQuery( document ).on( 'click', function( event ) {
				if ( !jQuery( event.target ).closest( currentNav ).length ) {
					jQuery( subMenu ).removeClass( 'show' );
					jQuery( subMenuButton ).removeClass( 'show' );
				}
			}); 
		}
	});
}

// Remove navigation when empty - mostly for attachment.php navigation
function hideNavigation( selector ) {
	var previous = jQuery( selector ).find( '.prev' );
	var next = jQuery( selector ).find( '.next' );

	// Remove previous link there's nothing there
	if ( previous.children().length == 0 ) {
		previous.remove();
	}

	// Remove next link there's nothing there
	if ( next.children().length == 0 ) {
		next.remove();
	}

	// If previous and next links are empty, remove pagination/selector container
	if ( ( previous.children().length == 0 ) && ( next.children().length == 0 ) ) {
		jQuery( selector ).remove();
	}
}

// Convert WordPress galleries with images into a featherlight gallery
function addFeatherLightGallery( selector ) {
	jQuery( selector ).each( function() {
		// Get variables for the galleries  
		var currentGallery = jQuery( this );
		var galleryID = currentGallery.attr( 'id' );
		var galleryImageLink = currentGallery.find( '.gallery-item .gallery-icon a' );
		var galleryValid;

		// Check all links in a gallery to see if they link to valid image file extensions
		jQuery( galleryImageLink ).each( function() {
			// Get the current image link
			var currentImageLink = jQuery( this );

			// Check if the link has a valid image extension
			var srcCheck = ( /\.(gif|jpg|jpeg|tiff|png|bmp|svg)$/i ).test( currentImageLink.attr( 'href' ) ); 

			// If gallery has all valid links, set gallery to valid
			if ( srcCheck == false ) {
				galleryValid = false;
				return false;
			} else {
				galleryValid = galleryID;
			}
		});

		// If the gallery is valid...
		if ( galleryValid == galleryID ) {
			jQuery( galleryImageLink ).featherlightGallery({
				previousIcon  : '&#10092;',
				nextIcon	  : '&#10093;',
				closeIcon	  : 'x',
				galleryFadeIn : 300,
				openSpeed	  : 300,
				afterOpen	  : function(event){
					jQuery( 'body, html' ).addClass( 'featherlight-open' );
				},
				afterClose	  : function(event){
					jQuery( 'body, html' ).removeClass( 'featherlight-open' );
				}										
			});
		}
	});
}

// Scroll to top functionality
// Modified from https://paulund.co.uk/how-to-create-an-animated-scroll-to-top-with-jquery
function scrollOnPage( selector, distance, position ) {
	// Check to see if the window is top if not then display button
	jQuery( window ).scroll( function() {
		if ( jQuery( this ).scrollTop() > distance ) {
			jQuery( selector ).fadeIn();
		} else {
			jQuery( selector ).fadeOut();
		}
	});
	
	// Click event to scroll to top
	jQuery( selector ).click( function() {
		jQuery( 'html, body' ).animate({
			scrollTop : position
		}, 1000 );
		return false;
	});	
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

// Initialize Mobile Menu
function initializeMobileMenu( options ) {
	// Variables from mobile object
	var menu = jQuery( options.menu );
	var menuContainer = jQuery( options.menuContainer );
	var mobileButton = jQuery( options.mobileButton );
	var mobileMenu = jQuery( options.mobileMenu );
	var width = options.width;

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

	// Add/remove classes when mobile menu button is clicked on
	mobileButton.click( function() {
		toggleMobileMenu();
	});

	// Resize actions for mobile menu
	function mobileResizeAction() {
		// Widths for em comparison		
		var windowWidth = ( window.innerWidth / baseFontSize );
		var docWidth = ( document.documentElement.clientWidth / baseFontSize );
		var bodyWidth = ( document.body.clientWidth / baseFontSize );
		var responseWidth = ( width / baseFontSize );

		// Check all sorts of window and document widths to make sure resizing is consistent across browsers
		if ( ( windowWidth || docWidth || bodyWidth ) <= responseWidth ) {			
			// Check if mobile ones is false, meaning we haven't activated the mobile menu yet
			if ( !mobileOnce ) {
				// Create a mobile header and insert it at the top
				var mobileButton = '<header class="mobile-menu-header"><span class="mobile-header">Menu</span><span class="icon mobile-close">X</span></header>';
				jQuery( mobileButton ).appendTo( mobileMenu );

				// Close menu when button is clicked on
				jQuery( '.mobile-menu-header .mobile-close' ).click( function() {
					toggleMobileMenu();
				});

				// Move menu to menu container
				menu.detach().appendTo( mobileMenu );

				// In that mobile menu container, look for first level list and its items
				menu.children( 'ul' ).children( 'li' ).each( function() {
					// Get current selector and check if there are any second level lists
					var current = jQuery( this );
					var children = current.children( 'ul' );

					// If there is a second level list, add a menu toggle icon
					if ( children.length > 0 ) {
						jQuery('<span class="icon slide-submenu">&#10093;</span>').insertBefore( children );
					}
				});

				// Add/remove classes to slide second level menu open
				jQuery( '.slide-submenu' ).click( function() {
					if ( jQuery( this ).next().hasClass( 'slide-open' ) ) {						
						menu.children( 'ul' ).children( 'li' ).removeClass( 'slide-close' );
						jQuery( this ).next().add( jQuery( this ).parent() ).removeClass( 'slide-open' );
					} else {						
						menu.children( 'ul' ).children( 'li' ).addClass( 'slide-close' );
						jQuery( this ).next().add( jQuery( this ).parent() ).addClass( 'slide-open' ).removeClass('slide-close');
					}
				});	

				// After everything has been done, set mobile to true so it's not run again on resize
				mobileOnce = true;
			}
		} else {
			// Check if mobile is true, meaning we're resizing and want to clean up on resize
			if ( mobileOnce ) {
				// Remove close button, replace menu, remove slide menu toggle, and remove any extra slide-open class
				jQuery( '.mobile-menu-header' ).remove()
				menu.detach().appendTo( menuContainer );
				jQuery( '.slide-submenu' ).remove();
				jQuery( 'ul, li' ).removeClass( 'slide-open' );
				jQuery( 'li' ).removeClass( 'slide-close' );
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
	var resizeForMobile = debounce(function() { 
		mobileResizeAction(); 
	}, 100 );
	window.addEventListener( 'resize', resizeForMobile );
}