<?php
/**
 * menu.php - menu controller class for 402 framework
 */

require_once MODEL_DIR."query_builder.php";

/**
 * load and initialise Menu controller class for 402 framework
 */
class MenuController extends BuildQuery {

	//menu link structure
	private static $all_links;
	
	/**
	 * return the formatted menu links
	 */
	function get_menu($menu_id) {
	$this->menu_links_query($menu_id);
	return self::$all_links;
	}
	
	//menu query for menu_id
	private function menu_links_query($menu_id) {
	//resets menu_links prior to getting all the required links for specified menu_id
	$menu_links = array();
	if (isset($menu_id)) {
	$tables = DB_MENU_LOOKUP.', '.DB_NODE;
	$columns = DB_NODE.'.*';
	$where = DB_MENU_LOOKUP.'.node_id='.DB_NODE.'.node_id and '.DB_MENU_LOOKUP.'.menu_id=? and '.DB_MENU_LOOKUP.'.parent_id=0';
	$fields = array($menu_id);
	$db_results = BuildQuery::all_field_query($tables, $columns, $where, $fields);
	//get child links from db
	foreach ($db_results as $key=>$val) {
	if (is_array($val)) {
	$parent_id = $val['node_id'];
	$child_links = $this->menu_child_query($menu_id, $parent_id);
	//check child links
	if (!empty($child_links)) {
	foreach ($child_links as $key2=>$val2) {
	//push child after parent
	array_push($val, $val2);
	}
	}
	}
	//push parent and child links to menu links array
	array_push($menu_links, $val);
	}
	}
	self::$all_links = $menu_links;
	}
	
	//menu query for child links for parent_id
	private function menu_child_query($menu_id, $parent_id) {
	if (isset($parent_id)) {
	$tables = DB_MENU_LOOKUP.', '.DB_NODE;
	$columns = DB_NODE.'.*';
	$where = DB_MENU_LOOKUP.'.node_id='.DB_NODE.'.node_id and '.DB_MENU_LOOKUP.'.menu_id=? and '.DB_MENU_LOOKUP.'.parent_id=?';
	$fields = array($menu_id, $parent_id);
	$db_results = BuildQuery::all_field_query($tables, $columns, $where, $fields);
	}
	return $db_results;
	}
	
}
?>