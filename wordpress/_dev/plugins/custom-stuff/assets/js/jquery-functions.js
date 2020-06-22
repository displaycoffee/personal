// Add classes to table elements on options page
function addOptionClasses( selector ) {
	var tableRows = jQuery( selector );
	var labelClass = 'form-field-label';
	var valueClass = 'form-field-value';

	if ( tableRows && tableRows.length > 0 ) {
		tableRows.each( function() {
			var currentRow = jQuery( this );
			var currentTh = currentRow.find( 'th' );
			var currentTd = currentRow.find( 'td' );

			if ( !currentTh.hasClass( labelClass ) ) {
				currentTh.addClass( labelClass );
			}

			if ( !currentTd.hasClass( valueClass ) ) {
				currentTd.addClass( valueClass );
			}
		});
	}
}

// WordPress Media Library
function cstmstffSelectImage( selectButton, selectInput ) {
	// Instantiates the variable that holds the media library frame...
	var cstmstffSelectImageFrame;

	// Runs when the image button is clicked
	selectButton.click( function( e ) {
		// Prevents the default action from occuring
		e.preventDefault();

		// If the frame already exists, re-open it
		if ( cstmstffSelectImageFrame ) {
			cstmstffSelectImageFrame.open();
			return;
		}

		// Sets up the media library frame
		cstmstffSelectImageFrame = wp.media.frames.cstmstffSelectImageFrame = wp.media({
			title   : cstmstffSelectImage.title,
			button  : { text : cstmstffSelectImage.selectButton },
			library : { type : 'image' }
		});

		// Runs when an image is selected
		cstmstffSelectImageFrame.on( 'select', function() {
			// Grabs the attachment selection and creates a JSON representation of the model
			var mediaAttachment = cstmstffSelectImageFrame.state().get( 'selection' ).first().toJSON();

			// Sends the attachment URL to our custom image input field
			selectInput.val( mediaAttachment.url );
		});

		// Opens the media library frame
		cstmstffSelectImageFrame.open();
	});
}
