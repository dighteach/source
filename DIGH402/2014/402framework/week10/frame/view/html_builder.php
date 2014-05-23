<?php
/**
 * html_builder.php - build html in view for 402 framework
 */

/**
 * load the html builder for the framework viewer
 */
class BuildHTML {
	
	protected static $attributes = array();
	
	//build empty element container allowing ajax insertion for any subsequent content
	function build_element($id, $class) {
	
	}
	
	//build start of html element
	function start_element($element = null, $attributes=null) {
	//check element parameter
	if ($element != null) {
	$element_name = $element;
	}
	//check if attribute array is empty or not - ie: if attributes have been set as paremeters
	if (empty($attributes)) {
	$element_start = '<'.$element_name.'>';
	}
	else {
	self::$attributes = $attributes;
	//build element attributes for specified element parameter
	$element_start =  '<'.$element_name.' '.Functions::array_implode('="', '" ', self::$attributes).'">';
	}
	
	//return completed opening element tag with any specified attributes
	return $element_start;
	}
	
	//build end of html element
	function end_element($element) {
	//get element from parameter
	$element_name = $element;
	//return end element tag
	$element_end = '</'.$element_name.'>';
	
	return $element_end;
	}

}

?>