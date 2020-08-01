// Run all jquery functions on document ready
jQuery( document ).ready( function( $ ) {
	// Add classes to options page as needed
	cstmstffAddOptionClasses( '.' + pluginObj['prefix'] + '-options .' + pluginObj['prefix'] + '-form-field' );

	// Add date field functionality
	cstmstffInitDate( $( '.form-field-date' ) );

	// Add color picker
	$( '.color-picker' ).wpColorPicker();

	// Add color picker reset
	$( '.wp-picker-clear' ).each( function() {
		var resetCurrent = $( this );
		var resetParents = resetCurrent.parents( pluginObj['fieldValue'] );

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
		var selectParents = selectCurrent.parents( pluginObj['fieldValue'] );

		cstmstffSelectImage( selectCurrent, selectParents.find( mediaInput ), selectParents.find( '.selected-media img' ) );
	});

	// Add media library reset
	var resetMedia = $( '.media-reset' );
	resetMedia.each( function() {
		var resetCurrent = $( this );
		var resetParents = resetCurrent.parents( pluginObj['fieldValue'] );

		resetCurrent.click( function() {
			resetParents.find( mediaInput ).val( '' );
			resetParents.find( '.selected-media' ).remove();
		});
	});
});
