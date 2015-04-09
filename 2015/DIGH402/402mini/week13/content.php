<?php
/**
* content.php - check requested content and render
*/

//load constants
require_once "constants.php";
//require html header
require_once "htmlHeader.php";

//check URI and HTTP GET variables
if (isset($_GET['name']) && isset($_GET['type'])) {
$content_name = $_GET['name'];
$content_type = $_GET['type'];
$content_file = MEDIA_DIR.'/'.$content_name.'.'.$content_type;

//get file type per content - read mime type for specified file
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$filetype = finfo_file($finfo, $content_file);
$filetype = explode("/", $filetype, 2);
$filetype = $filetype[0];

//require content reader for requested filetype - eg: text, image...
require_once $filetype.'Reader.php';

//instantiate object of content reader class
$reader_class = ucfirst($filetype).'Reader';
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