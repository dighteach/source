<?php
/**
 * map.php - map controller class for 402 framework
 */

require_once MODEL_DIR."query_builder.php";

/**
 * load and initialise map controller class for 402 framework
 */
class MapController extends BuildQuery {

	//content row result
	private static $db_content_row;
	
	/**
	 * return the DB content for controller and param
	 */
	 function get_controller_content($controller, $params) {
	 $this->map_row_query($controller, $params);
	 return self::$db_content_row;
	 }
	
	/**
	* return the DB content for controller and param
	*/
	function get_content_row($controller, $params) {
	$this->map_row_query($controller, $params);
	 return self::$db_content_row;
	}
	
	//content query for specified DB row
	private function map_row_query($controller, $params) {
	if (isset($params['id'])) {
	$table = DB_CONTENT;
	$where = "contentid";
	$field = array($params['id']);
	//build single query from BuildQuery class
	$db_results = BuildQuery::single_row_query($table, $where, $field);
	self::$db_content_row = $db_results;
	}
	}
	
}
?>