<?php
/**
 * 402mini - framework for rapid, simple publication
 */

//load constants
require_once "constants.php";
//load directory loader class
require_once "dirLoader.php";
//require content format class
require_once "contentFormat.php";
//require html header
require_once "htmlHeader.php";

//set headers for content table
$table_headers = ['filename', 'filetype', 'link'];

//instantiate directory loader object
$dir = new DirLoader;

//get content directory contents
try {
$content = $dir->get_dir_content(MEDIA_DIR);
//instantiate content format object
$format = new ContentFormat();
//get formatted table content
$content_table = $format->get_table_content($content, $table_headers);
//output content table
echo '<div id="content"><h4>Content</h4>'.$content_table.'</div>';
}
catch(Exception $e) {
echo '<p>Error: '.$e->getMessage().'</p>';
}

//require html footer
require_once "htmlFooter.php";

?>