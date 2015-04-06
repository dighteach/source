/**
 * image_zoom.js - js for image_zoom plugin using jquery library
 */
 
$(document).ready(function() { 
  $("#image_zoom").click(function() {
  $("#content img").toggle("fast", function() {
    // Animation complete.
  });
});
});