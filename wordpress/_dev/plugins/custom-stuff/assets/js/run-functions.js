// Run all jquery functions on document ready
jQuery( document ).ready( function( $ ) {
	var formFieldSelector = '.' + obj['classes']['admin'] + ' .' + obj['classes']['field'];

	// Add classes and wrappers to form fields as needed
	cstmstffAddOptionClasses( formFieldSelector );
	cstmstffAddWrappers( formFieldSelector + ':not(.' + obj['classes']['column'] + ') > label' );

	// Add date field functionality
	cstmstffInitDate( $( '.' + obj['classes']['field'] + '-date' ) );

	// Add color picker
	$( '.color-picker' ).wpColorPicker();

	// Add color picker reset
	$( '.wp-picker-clear' ).each( function() {
		var resetCurrent = $( this );
		var resetParents = resetCurrent.parents( '.' + obj['classes']['value'] );

		resetCurrent.click( function() {
			resetParents.find( '.selected-color' ).remove();
		});
	});

	// Media picker input
	var mediaInput = 'input[type="url"]';

	// Add media library picker
	var selectMedia = $( '.media-select' );
	selectMedia.each( function() {
		var selectCurrent = $( this );
		var selectParents = selectCurrent.parents( '.' + obj['classes']['value'] );

		cstmstffSelectImage( selectCurrent, selectParents.find( mediaInput ), selectParents.find( '.selected-media img' ) );
	});

	// Add media library reset
	var resetMedia = $( '.media-reset' );
	resetMedia.each( function() {
		var resetCurrent = $( this );
		var resetParents = resetCurrent.parents( '.' + obj['classes']['value'] );

		resetCurrent.click( function() {
			resetParents.find( mediaInput ).val( '' );
			resetParents.find( '.selected-media' ).remove();
		});
	});
});
