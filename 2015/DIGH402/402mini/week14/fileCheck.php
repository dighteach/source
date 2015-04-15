<?php
/**
 * fileCheck.php - check and return details for specified file
 */

/**
 * load and initialise Directory Loader class for 402mini
 */
class FileCheck {
 
	//directory contents
	private static $file_type;
	
 	//getter to return directory contents and details
 	function get_file_type($file) {
 	$this->check_file($file);
 	return self::$file_type;
 	}
	
	//return the specified file details
	function check_file($file) {
	//check directory exists
	if (file_exists($file)) {
	//get file type per content - read mime type for specified file
	$finfo = finfo_open(FILEINFO_MIME_TYPE);
	$filetype = finfo_file($finfo, $file);
	$filetype = explode("/", $filetype, 2);
	self::$file_type = $filetype[0];
	} else {
	//return error
	throw new Exception("Specified file does not exist!");
	} 
 	}
}
?>