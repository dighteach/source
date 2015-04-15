<?php
/**
 * imageReader.php - simple image renderer for 402mini
 */

/**
 * load and initialise image reader class for 402mini
 */
class ImageReader {

	//rendered content
	private static $rendered_content;
	
	//return the rendered content
	function get_render($name, $type) {
	$this->prepare_content($name, $type);
	return self::$rendered_content;
	}

	//prepare content for rendering
	private function prepare_content($name, $type) {
	$prepare_function = 'prepare_'.$type;
	$this->$prepare_function($name, $type);
	}
	
	//prepare jpg content
	private function prepare_jpg($name, $type) {
	$filename = $name.'.'.$type;
	$title = '<h4>'.str_replace('_', ' ', ucfirst($name)).'</h4>';
	//create content for rendering with txt new lines converted to HTML <br>
	$content = '<div class="'.$type.'_content"><img src="'.MEDIA_DIR.'/'.$filename.'" /></div>';
	self::$rendered_content = $title.$content;
	}
	
}
?>