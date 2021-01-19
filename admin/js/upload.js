jQuery(document).ready(function() {
   
   /* ######### Media Start ########### */
    jQuery("body").on("click", "#upload_image_edit", function (e) {
        e.preventDefault();
        var image = wp.media({
           title: 'Cargar Foto',
           multiple: false
        }).open()
                .on('select', function (e) {
                   var uploaded_image = image.state().get('selection').first();
                   var image_url = uploaded_image.toJSON().url;
                   jQuery("#upload_image_src_edit").val(image_url);
                   jQuery("#upload_image_img_edit").attr("src", image_url);
                });
        jQuery("#wpm_6310_add_new_media").css({
           "overflow-x": "hidden",
           "overflow-y": "auto"
        });
    });
    /* ######### Media End ########### */

      /* ######### Media Start ########### */
      jQuery("body").on("click", "#upload_image_add", function (e) {
         e.preventDefault();
         var image = wp.media({
            title: 'Cargar Foto',
            multiple: false
         }).open()
                 .on('select', function (e) {
                    var uploaded_image = image.state().get('selection').first();
                    var image_url = uploaded_image.toJSON().url;
                    jQuery("#upload_image_src_add").val(image_url);
                    jQuery("#upload_image_img_add").attr("src", image_url);
                 });
         jQuery("#wpm_6310_add_new_media").css({
            "overflow-x": "hidden",
            "overflow-y": "auto"
         });
     });
     /* ######### Media End ########### */

    /* Modal Close Start */
    jQuery("body").on("click", ".wpm-6310-close, #wpm-from-close", function () {
      jQuery("#wpm-6310-modal-add, #wpm-6310-modal-edit").fadeOut(500);
      jQuery("body").css({
         "overflow": "initial"
      });
   });
   jQuery(window).click(function (event) {
      if (event.target == document.getElementById('wpm-6310-modal-add')) {
         jQuery("#wpm-6310-modal-add").fadeOut(500);
         jQuery("body").css({
            "overflow": "initial"
         });
      } else if (event.target == document.getElementById('wpm-6310-modal-edit')) {
         jQuery("#wpm-6310-modal-edit").fadeOut(500);
         jQuery("body").css({
            "overflow": "initial"
         });
      }
   });
   /* Modal Close End */
    
});