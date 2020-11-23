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
	// initializeMobileMenu({
	// 	menu          : '#page-header .navbar .wrapper > ul',
	// 	menuContainer : '#page-header .navbar .wrapper',
	// 	mobileButton  : '.mobile-menu-button',
	// 	mobileMenu    : '#mobile-menu',
	// 	mobileContent : '.mobile-menu-content',
	// 	mobileOverlay : '#mobile-overlay',
	// 	width         : 768
	// });
});
