// Run all jquery functions on document ready
jQuery( document ).ready( function( $ ) {
	// Add jquery date picker
	$( '.date-picker' ).datepicker({
		dateFormat : 'mm/dd/yy'
	});

	// Add color picker
	$( '.color-picker' ).wpColorPicker();
});
