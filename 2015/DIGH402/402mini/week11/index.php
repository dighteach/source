<?php
/**
 * 402mini - framework for rapid, simple publication
 */

//load directory loader class
require_once "dirLoader.php";
//require content format class
require_once "contentFormat.php";

//specify test directory
$txt_dir = 'txt';
//set headers for content table
$table_headers = ['filename', 'filetype', 'link'];

//instantiate directory loader object
$dir = new DirLoader;
//get text directory contents
$texts = $dir->get_dir_content($txt_dir);

//instantiate content format object
$format = new ContentFormat();
//get formatted table content
$texts_table = $format->get_table_content($texts, $table_headers);

//require html header
require_once "htmlHeader.php";
//output text table
echo '<div id="content">'.$texts_table.'</div>';
//require html footer
require_once "htmlFooter.php";

?>