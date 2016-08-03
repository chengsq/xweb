window.attach_image = function(html) {
 
  $('body').append('<div id="temp_image">' + html + '</div>');
 
  var img = $('#temp_image').find('img');
 
  imgurl   = img.attr('src');
  imgclass = img.attr('class');
  imgid    = parseInt(imgclass.replace(/D/g, ''), 10);
 
  $('#upload_image_id').val(imgid);
  $('#remove-book-image').show();
 
  $('img#book_image').attr('src', imgurl);
 
  try{tb_remove();}catch(e){};
 
  $('#temp_image').remove();
 
  window.send_to_editor = window.send_to_editor_default;
}