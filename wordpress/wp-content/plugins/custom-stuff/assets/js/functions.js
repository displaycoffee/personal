function cstmstffResetImage(e,t){jQuery(e).click(function(){jQuery(t).val(""),jQuery(t).prev(".image-preview").remove()})}function cstmstffSelectImage(e,t){var i;jQuery(e).click(function(e){return e.preventDefault(),i?void i.open():(i=wp.media.frames.cstmstffSelectImageFrame=wp.media({title:cstmstffSelectImage.title,button:{text:cstmstffSelectImage.selectButton},library:{type:"image"}}),i.on("select",function(){var e=i.state().get("selection").first().toJSON();jQuery(t).val(e.url)}),void i.open())})}jQuery(document).ready(function(e){e(".media-field").each(function(){var t=e(this).find(".image-select"),i=e(this).find(".image-reset"),c=e(this).find('input[type="url"]');cstmstffSelectImage(t,c),cstmstffResetImage(i,c)}),e(".color-select").wpColorPicker(),e(".cstmstff-options .form-table").each(function(){e(this).find("tr").addClass("form-field")}),e(".date-picker").datepicker({dateFormat:"mm/dd/yy"})});