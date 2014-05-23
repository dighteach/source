<?php
/**
 * functions.php - various functions for 402 framework
 */

/**
 * various helper functions for 402 framework
 */
class Functions {

/**
 * implode an array to element attributes etc for output as a string
 */
function array_implode($joint, $separator, $array) {
 	if (!is_array($array))
 	return $array;

 	$string = array();

 	foreach ($array as $key => $val) {
 	//format $key, $join, and $val as attributes
 	$output = $key.$joint.$val;
 	//store attribute in $string array
 	$string[] = $output;
 	}
 	//return attribute string
 	return implode( $separator, $string );
	}
	
/**
 * iterate over specified directory and return available files
 */
function dir_iterate($dir) {
	if (!empty($dir)) {
	//array for files in specified directory
	$files = array();
	//create a handler for the directory
    $handler = opendir($dir);
	//open directory and iterate over the files
    while ($file = readdir($handler)) {
    //if file isn't this directory or its parent, add to $files array
      if ($file != "." && $file != "..") {
        $files[] = $file;
      }
    }
    closedir($handler);
    //return the $files array
    return $files;
	}
}

}
?>