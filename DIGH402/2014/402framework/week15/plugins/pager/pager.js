/**
 * pager.js - js for pager plugin using jquery library
 */
 
$(document).ready(function() {
$("span#pager").hide();
});
 
$(document).ready(function() { 
$('div#content').append('<div class="clear">&nbsp;</div><center><ul id="paging"></ul></center>');

pageSize = 12;

var total = $('.group_item').length;
var pages = Math.ceil(total/pageSize);
if (total >= 1) {
$('div#content').prepend('<div class="group_counter"><p>Total items: '+total+'</p></div>');
}

for ( var i = 1; i < pages+1; i++ ) {
if (i == 1) {
$('ul#paging').append('<li class="current" title="select page '+i+'">'+i+'</li>');
} else {
$('ul#paging').append('<li title="select page '+i+'">'+i+'</li>');
}
}

showPage = function(page) {
    $(".group_item").hide();
    $(".group_item").each(function(n) {
        if (n >= pageSize * (page - 1) && n < pageSize * page)
            $(this).show();
    });        
}
    
showPage(1);

$("#paging li").click(function() {
    $("#paging li").removeClass("current");
    $(this).addClass("current");
    showPage(parseInt($(this).text())) 
});

});