// Reset image that's been selected
function xyz_reset_image(resetButton, selector) {
    jQuery(document).ready(function($){
        $(resetButton).click(function() {
            $(selector).val('');
            $(selector).prev('.image-preview').remove();
        });
    }); 
}