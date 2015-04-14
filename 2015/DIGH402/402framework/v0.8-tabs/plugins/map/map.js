/**
 * map.js - js for Google Maps API plugin using jquery library
 */

$(document).ready(function() {
$("span#map").hide();
});
 
function detectBrowser() {
  var useragent = navigator.userAgent;
  var mapdiv = document.getElementById("map_canvas");
    
  if (useragent.indexOf('iPhone') != -1 || useragent.indexOf('Android') != -1 ) {
    mapdiv.style.width = '100%';
    mapdiv.style.height = '100%';
  } else {
    mapdiv.style.width = '600px';
    mapdiv.style.height = '800px';
  }
}

function initialize() {

var map_coords = $('div#map_canvas').attr('coordinates');
//split coordinates into latitude and longitude
var coords = map_coords.split(",");
//output coordinates for current content id
$('div.description').append('<h6>Map Coordinates</h6><p>latitude = '+coords[0]+'<br/>longitude = '+coords[1]+'</p>');

//standard google map output
var map_canvas = document.getElementById('map_canvas');
var coords = {"lat" : coords[0], "long" : coords[1]};
var map_options = {
center: new google.maps.LatLng(coords.lat, coords.long),
zoom: 15,
mapTypeId: google.maps.MapTypeId.ROADMAP
}
var map = new google.maps.Map(map_canvas, map_options)
}
//load and render the map on window load
google.maps.event.addDomListener(window, 'load', initialize);