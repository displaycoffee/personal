// WordPress Media Library
function xyzSelectImage( selectButton, selector ) {
    // Instantiates the variable that holds the media library frame    
    var xyzSelectImageFrame;
 
    // Runs when the image button is clicked
    jQuery( selectButton ).click( function( e ) {
 
        // Prevents the default action from occuring
        e.preventDefault();
 
        // If the frame already exists, re-open it
        if ( xyzSelectImageFrame ) {
            xyzSelectImageFrame.open();
            return;
        }
 
        // Sets up the media library frame
        xyzSelectImageFrame = wp.media.frames.xyzSelectImageFrame = wp.media({
            title: xyzSelectImage.title,
            button: { text: xyzSelectImage.selectButton },
            library: { type: 'image' }
        });
 
        // Runs when an image is selected
        xyzSelectImageFrame.on( 'select', function() {
 
            // Grabs the attachment selection and creates a JSON representation of the model
            var mediaAttachment = xyzSelectImageFrame.state().get( 'selection' ).first().toJSON();
 
            // Sends the attachment URL to our custom image input field
            jQuery( selector ).val( mediaAttachment.url );

        });
 
        // Opens the media library frame
        xyzSelectImageFrame.open();
    });
}