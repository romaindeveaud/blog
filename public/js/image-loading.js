$(document).on('ready', function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $("#input-24").fileinput({
  language: 'fr',
  uploadUrl: '/img-bg-upload',
  uploadExtraData: { post_id: $('input[name="_post_id"]').attr('value') },
  allowedFileExtensions: ["jpg", "png", "gif"]
      });
});
