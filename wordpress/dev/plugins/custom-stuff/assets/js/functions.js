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

// Reset image that's been selected
function xyz_reset_image(resetButton, selector) {
    jQuery(document).ready(function($){
        $(resetButton).click(function() {
            $(selector).val('');
            $(selector).prev('.image-preview').remove();
        });
    }); 
}

jQuery(document).ready(function($){
    $('.media-field').each(function() {
        var selectButton = $(this).find('.image-select');
        var resetButton = $(this).find('.image-reset');
        var selector = $(this).find('input[type="url"]');
        xyz_select_image(selectButton, selector);
        xyz_reset_image(resetButton, selector);
    });    

    $('.color-select').wpColorPicker();

    $('.xyz-term-field').parents('.wrap').addClass('xyz-term-meta');

    $('.xyz-options .form-table').each(function() {
        $(this).find('tr').addClass('form-field');
    });

    $('.date-picker').datepicker();
});