// Reset image that's been selected
function xyzResetImage( resetButton, selector ) {
    jQuery( resetButton ).click( function() {
        jQuery( selector ).val( '' );
        jQuery( selector ).prev( '.image-preview' ).remove();
    });
}