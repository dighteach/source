<?php
/**
 * search.php - search controller class for 402 framework
 */

require_once MODEL_DIR."query_builder.php";

/**
 * load and initialise search controller class for 402 framework
 */
class SearchController extends BuildQuery {

	//content row result
	private static $db_content_rows;
	
	/**
	* return the DB content for controller and param
	*/
	function get_controller_content($controller, $params) {
	$this->search_row_query($controller, $params);
	return self::$db_content_rows;
	}
	
	//content query for specified search query
	private function search_row_query($controller, $params) {
	if (isset($params['query'])) {	
	$tables = 'content';
	$columns = 'content.*';
	$where = 'match (content.contenttext) against (? in boolean mode) order by content.contentid';
	$fields = array($params['query']);
	//build query from BuildQuery class
	$db_results = BuildQuery::all_field_query($tables, $columns, $where, $fields);	
	//print_r($db_results);
	self::$db_content_rows = $db_results;
	}
	}
	
}
?>