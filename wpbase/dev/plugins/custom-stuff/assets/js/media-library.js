// WordPress Media Library
function xyz_select_image(selectButton, selector) {
    jQuery(document).ready(function($){   

        // Instantiates the variable that holds the media library frame    
        var xyz_select_image_frame;
     
        // Runs when the image button is clicked
        $(selectButton).click(function(e){
     
            // Prevents the default action from occuring
            e.preventDefault();
     
            // If the frame already exists, re-open it
            if ( xyz_select_image_frame ) {
                xyz_select_image_frame.open();
                return;
            }
     
            // Sets up the media library frame
            xyz_select_image_frame = wp.media.frames.xyz_select_image_frame = wp.media({
                title: xyz_select_image.title,
                button: { text:  xyz_select_image.selectButton },
                library: { type: 'image' }
            });
     
            // Runs when an image is selected
            xyz_select_image_frame.on('select', function(){
     
                // Grabs the attachment selection and creates a JSON representation of the model
                var media_attachment = xyz_select_image_frame.state().get('selection').first().toJSON();
     
                // Sends the attachment URL to our custom image input field
                $(selector).val(media_attachment.url);

            });
     
            // Opens the media library frame
            xyz_select_image_frame.open();
        });
    });
}