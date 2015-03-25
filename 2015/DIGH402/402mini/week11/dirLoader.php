<?php
/**
 * dirLoader.php - iterate over a directory and return contents
 */

/**
 * load and initialise Directory Loader class for 402mini
 */
class DirLoader {
 
	//directory contents
	private static $dir_content = array();
	
 	//getter to return directory contents and details
 	function get_dir_content($dir) {
 	$this->iterate_dir($dir);
 	return self::$dir_content;
 	}
	
	//return the specified directory contents
	function iterate_dir($dir) {
	//check and open a directory handle for use with readdir(), closedir()...
	if ($dir_handle = opendir($dir))
	
	//loop over directory
	while (false !== ($entry = readdir($dir_handle))) {
	//ignore . and .. in specified directory
	if ($entry != '.' && $entry != '..') {
	 //push directory contents to array
	 array_push(self::$dir_content, $entry);
	 }
	}
	
	//close directory handle
	closedir($dir_handle);
	} 
 	 
}
?>