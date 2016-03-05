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