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

//set headers for content table
$table_headers = ['filename', 'filetype', 'link'];

//instantiate directory loader object
$dir = new DirLoader;
//get content directory contents
$content = $dir->get_dir_content(MEDIA_DIR);

//instantiate content format object
$format = new ContentFormat();
//get formatted table content
$content_table = $format->get_table_content($content, $table_headers);
//require html header
require_once "htmlHeader.php";
//output content table
echo '<div id="content"><h4>Content</h4>'.$content_table.'</div>';
//require html footer
require_once "htmlFooter.php";

?>