<?php
/**
 * content.php - content controller class for 402 framework
 */

require_once MODEL_DIR."query_builder.php";

/**
 * load and initialise Content controller class for 402 framework
 */
class ContentController extends BuildQuery {

	//content row result
	private static $db_content_row;
	//content field result
	private static $db_content_field;
	
	/**
	 * return the DB content field - eg: contenttext, contentimage
	 */
	function get_content_field($controller, $format, $params) {
	$this->content_field_query($controller, $format, $params);
	return self::$db_content_field;
	}
	
	/**
	 * return the DB content row
	 */
	function get_content_row($controller, $format, $params) {
	$this->content_row_query($controller, $format, $params);
	return self::$db_content_row;
	}
	
	//content query for specified DB field - $format specifies required field eg: contenttext, contentimage, contentdesc...
	private function content_field_query($controller, $format, $params) {
	if (isset($params['id'])) {
	$table = $controller;
	$column = $controller.$format;
	$where = "contentid";
	$field = array($params['id']);
	//build single query from BuildQuery class
	$db_results = BuildQuery::single_field_query($table, $column, $where, $field);
	$db_result = $db_results[$column];
	self::$db_content_field = $db_result;
	}
	}
	
	//content query for specified DB row
	private function content_row_query($controller, $format, $params) {
	if (isset($params['id'])) {
	$table = $controller;
	$column = $controller.$format;
	$where = "contentid";
	$field = array($params['id']);
	//build single query from BuildQuery class
	$db_results = BuildQuery::single_row_query($table, $where, $field);
	self::$db_content_row = $db_results;
	}
	}
	
}
?>