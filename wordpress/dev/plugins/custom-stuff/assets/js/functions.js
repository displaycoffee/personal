// Reset image that's been selected
function xyzResetImage( resetButton, selector ) {
    jQuery( resetButton ).click( function() {
        jQuery( selector ).val( '' );
        jQuery( selector ).prev( '.image-preview' ).remove();
    });
}
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
jQuery( document ).ready( function( $ ) {
    $( '.media-field' ).each( function() {
        var selectButton = $( this ).find( '.image-select' );
        var resetButton = $( this ).find( '.image-reset' );
        var selector = $( this ).find( 'input[type="url"]' );
        xyzSelectImage( selectButton, selector );
        xyzResetImage( resetButton, selector );
    });    

    $( '.color-select' ).wpColorPicker();

    $( '.xyz-options .form-table' ).each( function() {
        $( this ).find( 'tr' ).addClass( 'form-field' );
    });

    $( '.date-picker' ).datepicker();
});