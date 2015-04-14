/**
 * highlighter.js - js for highlighter plugin using jquery library
 */
 
 $(document).ready(function() {
$("span#highlighter").hide();
});
 
//gets URI parameters by name
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/gi, " "));
}

//find each search term in text and wrap highlight class 
$(document).ready(function() {
//get value for highlight parameter
var highlight = getParameterByName('hi');
//check if highlight has been set
if(highlight){
$('div.description').append('<h6>Search query</h6><p>Current query = '+highlight+'</p>');
//split highlight parameter
var highlight_split = highlight.split(/[ ,]+/);
//iterate over all child elements of default text class div
$('div.text').children().each(function(index) {
var text = $(this).text();
//check for multiple search terms and iterate over split array
for (var i=0;i<highlight.split.length;i++)
{
//get each split search term
var highlight_word = highlight_split[i];
//identify children with highlight word
$(this).html(function(i, html) {
//replace highlight with wrapped highlight
regexp = RegExp( '(' + highlight_word + ')', 'gi' );
replacement = '<span class="highlight">$1</span>';
return html.replace( regexp, replacement );
});
}
});
}

});