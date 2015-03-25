<?php
/**
* content.php - check requested content and render
*/
//require html header
require_once "htmlHeader.php";

//check URI and HTTP GET variables
if (isset($_GET['name']) && isset($_GET['type'])) {
$content_name = $_GET['name'];
$content_type = $_GET['type'];
//require content reader for requested filetype
require_once $content_type.'Reader.php';

//instantiate object of content reader class
$reader_class = ucfirst($content_type).'Reader';
$reader = new  $reader_class;
//get rendered content
$content = $reader->get_render($content_name, $content_type);
//output mini menu
echo '<div id="mini_menu"><a href="./">Home</a></div>';
echo '<div id="content">'.$content.'</div>';
}
else {
echo 'No content found. Please return to <a href="./">home page</a>';
}

//require html footer
require_once "htmlFooter.php";
?>