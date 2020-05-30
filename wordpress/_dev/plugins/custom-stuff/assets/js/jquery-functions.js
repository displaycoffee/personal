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
