// Run all jquery functions on document ready
jQuery( document ).ready( function( $ ) {
	// Add jquery date picker
	$( '.date-picker' ).datepicker({
		dateFormat : 'mm/dd/yy'
	});

	// Add color picker
	$( '.color-picker' ).wpColorPicker();

	// Add color picker reset
	var resetColor = $( '.wp-picker-clear' );
	resetColor.each( function() {
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

		cstmstffSelectImage( selectCurrent, selectParents.find( mediaInput ) );
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

	// $( '.cstmstff-options .form-table' ).each( function() {
	// 	$( this ).find( 'tr' ).addClass( 'form-field' );
	// });
});
