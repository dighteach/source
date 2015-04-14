/**
 * image_magnify.js - js for image_magnify plugin using jquery library
 */
 
$(document).ready(function() { 
  $("#image_magnify").click(function() {
  $("#content img").toggle( "slow", function() {
    // Animation complete.
  });
});
});