$(document).on('ready', function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var $input = $("#input-image-bg");
  $input.fileinput({
  language: 'fr',
  uploadUrl: '/img-bg-upload',
  uploadExtraData: { post_id: $('input[name="_post_id"]').attr('value') },
  allowedFileExtensions: ["jpg", "png", "gif"],
  initialPreview: [
    "<img style='height:160px' src='/img/"+$('input[name="_post_bg_image"]').attr('value')+"' />"
    ],
  initialPreviewConfig: [
    {caption: $('input[name="_post_bg_image"]').attr('value'), width: "120px", url: "/site/file-delete", key: 1}
  ],
  uploadAsync: false,
  minFileCount: 1,
  maxFileCount: 1,
  showUpload: false, // hide upload button
  showRemove: false, // hide remove button
      }).on("filebatchselected", function(event, files) {
         // trigger upload method immediately after files are selected
         $input.fileinput("upload");
       });
});
