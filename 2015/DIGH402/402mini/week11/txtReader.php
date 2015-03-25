<?php
/**
 * txtReader.php - simple text renderer for 402mini
 */

/**
 * load and initialise text reader class for 402mini
 */
class TxtReader {

	//rendered content
	private static $rendered_content;
	private static $file_content;
	
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
	
	//prepare txt content
	private function prepare_txt($name, $type) {
	$this->file_contents($name, $type);
	$title = '<h4>'.str_replace('_', ' ', ucfirst($name)).'</h4>';
	//create content for rendering with txt new lines converted to HTML <br>
	$content = '<div class="'.$type.'_content">'.nl2br(self::$file_content).'</div>';
	self::$rendered_content = $title.$content;
	}

	//read file contents
	private function file_contents($name, $type) {
	$dir = $type;
	$filename = $name.'.'.$type;
	
	//read file and return content
	self::$file_content = file_get_contents($dir.'/'.$filename);
	}
	
}
?>