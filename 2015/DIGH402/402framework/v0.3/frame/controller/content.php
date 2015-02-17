<?php
/**
 * content.php - content controller class for 402 framework
 */


/**
 * load and initialise Content controller class for 402 framework
 */
class ContentController {

	//basic content
	private static $default_content;
	
	/**
	 * return the select basic content
	 */
	function get_content($format, $params) {
	$this->content_query($format, $params);
	return self::$default_content;
	}
	
	private function content_query($format, $params) {
	//basic content query for id
	if (isset($params['id'])) {
	$field = array($params['id']);
	//initial test query for single row content
	$db_content = DB::get_row("SELECT contenttext FROM content WHERE contentid=?", $field);
	$db_content = $db_content['contenttext'];
	}
	self::$default_content = $db_content;
	}
	
}
?>