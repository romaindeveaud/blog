$(document).on('ready', function() {
  $('.post-item .clickable').on('click', function() {
    $(this).siblings('.post-content').toggle( 300, function () {} );
  });

    /*
  $('.form-post').on('submit', function() {

    var postdata = $(this).serializeArray();
    alert(JSON.stringify(postdata));
    });
    */

  $('.publish-button').on('click', function () {
    var form = $(this).parents('form:first');
    form.children("input[name=_submit]").val("publish");
    form.submit();
  });

  $('.draft-button').on('click', function () {
    var form = $(this).parents('form:first');
    form.children("input[name=_submit]").val("draft");

    var spinner = $(this).children("span.glyphicon");

    $("#post_content").val(simplemde.value());
    var postdata = form.serializeArray();
    $.ajax({
      url: '/save-draft',
      type: "POST",
      data: postdata,
      beforeSend: function(jqXHR, settings) {
        $('.draft-button').html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> En cours...');
        $('.draft-button').prop('disabled', true);
      },
      success: function(data, textStatus, jqXHR) {
        $('.draft-button').prop('disabled', false);
        $('.draft-button').html('Sauvegarder');
        //data: return data from server
      },
    });
    
//    form.submit();
  });

  setInterval(function() {
    $('.draft-button').click();
  }, 10000);

});
