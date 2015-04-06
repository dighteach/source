/**
 * image_popup.js - js for image_popup plugin using jquery library
 */
 
$(document).ready(function() { 
  $("#image_popup").hide();
  $('div#content').append('<div id="gallery_popup"></div>');
  $('div#gallery_popup').empty();
});

$(document).ready(function() { 
  $('.image img').click(function() {
  var img_src = $(this).attr('src');
  var img_url = '<img src="'+img_src+'">';
  $('div#gallery_popup').html(img_url);
  $('div#gallery_popup img').css({'width' : '100%'});
  
  $( "div#gallery_popup" ).dialog({
      width: 'auto',
      modal: true,
      title: "Drag and resize window as required"
    });
  
  });
});