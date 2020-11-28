// Run all jquery functions on document ready
jQuery( document ).ready( function( $ ) {
	addBrowserClass();

	// Start navigation dropdown menus
	initializeDropdownMenu({
		main    : '.menu > .menu-item',
		label   : ' > a',
		content : ' > .sub-menu'
	});

	// Start the mobile menu
	initializeMobileMenu({
		menu          : '.navigation-main .menu-primary-container > .menu',
		menuContainer : '.navigation-main .menu-primary-container',
		mobileToggle  : '[data-toggle-mobile]',
		mobileMenu    : '.navigation-mobile',
		mobileContent : '.navigation-mobile-content',
		width         : 768
	});
});
