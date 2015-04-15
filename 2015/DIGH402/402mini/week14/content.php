<?php
/**
* content.php - check requested content and render
*/

//load constants
require_once "constants.php";
//load file check class
require_once "fileCheck.php";
//require html header
require_once "htmlHeader.php";

//check URI and HTTP GET variables
if (isset($_GET['name']) && isset($_GET['type'])) {
$content_name = $_GET['name'];
$content_type = $_GET['type'];
$content_file = MEDIA_DIR.'/'.$content_name.'.'.$content_type;

//instantiate file check class - check file exists & return file info...
$filecheck = new FileCheck;

//try requested file or handle exception
try {
$filetype = $filecheck->get_file_type($content_file);
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
catch(Exception $e) {
echo '<p>Error: '.$e->getMessage().'</p>';
echo '<p>Please return to <a href="./">home page</a></p>';
}
}
else {
echo '<p>No content found. Please return to <a href="./">home page</a></p>';
}

//require html footer
require_once "htmlFooter.php";
?>