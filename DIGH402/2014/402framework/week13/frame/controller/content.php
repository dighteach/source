<?php
/**
 * content.php - content controller class for 402 framework
 */

require_once MODEL_DIR."query_builder.php";

/**
 * load and initialise Content controller class for 402 framework
 */
class ContentController extends BuildQuery {

	//content field result
	private static $db_content_field;
	//content row result
	private static $db_content_row;
	//content group result
	private static $db_content_group;
	//content type id
	private static $db_content_type;
	
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
	function get_content_row($controller, $params) {
	$this->content_row_query($controller, $params);
	return self::$db_content_row;
	}
	
	/**
	 * return the DB content group
	 */
	function get_content_group($controller, $format, $group, $params) {
	$this->content_group_query($controller, $format, $group, $params);
	return self::$db_content_group;
	}
	
	/**
	 * return the DB content type id
	 */
	function get_content_type($controller, $format) {
	$this->content_type_query($controller, $format);
	return self::$db_content_type;
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
	
	//content query for specified DB group
	private function content_group_query($controller, $format, $group, $params) {
	if (isset($params['id'])) {
	$tables = $controller.', '.$controller.'_lookup, '.$controller.'_group, '.$controller.'_type';
	$columns = $controller.'.*';
	$where = 'content_lookup.content_id=content.contentid AND content_lookup.content_type_id=content_type.content_type_id AND content_lookup.content_group_id=content_group.content_group_id AND content_type.content_type_name=? AND content_group.content_group_name=? AND content_lookup.taxa_id=?';
	$fields = array($format, $group, $params['id']);
	//build single query from BuildQuery class
	$db_results = BuildQuery::all_field_query($tables, $columns, $where, $fields);
	self::$db_content_group = $db_results;
	}
	}
	
	//content query for specified DB row
	private function content_row_query($controller, $params) {
	if (isset($params['id'])) {
	$table = $controller;
	$where = "contentid";
	$field = array($params['id']);
	//build single query from BuildQuery class
	$db_results = BuildQuery::single_row_query($table, $where, $field);
	self::$db_content_row = $db_results;
	}
	}
	
	//content type query for specified content type - returns id for content type
	private function content_type_query($controller, $format) {
	$table = $controller.'_type';
	$column = $controller.'_type_id';
	$where = $controller."_type_name";
	$field = array($format);
	//build single query from BuildQuery class
	$db_results = BuildQuery::single_field_query($table, $column, $where, $field);
	$db_result = $db_results[$column];
	self::$db_content_type = $db_result;
	}
	
}
?>