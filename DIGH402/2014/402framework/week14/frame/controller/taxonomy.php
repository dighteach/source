<?php
/**
 * taxonomy.php - taxonomy controller class for 402 framework
 */

require_once MODEL_DIR."query_builder.php";

/**
 * load and initialise Taxonomy controller class for 402 framework
 */
class TaxonomyController extends BuildQuery {

	//taxonomy row result
	private static $db_taxonomy_row;
	//taxonomy content
	private static $db_taxonomy_content;
	
	/**
	 * return the DB taxonomy row for specified field
	 */
	function get_taxonomy_row($params) {
	$this->taxonomy_row_query($params);
	return self::$db_taxonomy_row;
	}
	
	/**
	 * return content results for specified taxa id
	 */
	function get_controller_content($controller, $params) {
	$this->taxonomy_content_query($controller, $params);
	return self::$db_taxonomy_content;
	}
	
	//taxonomy query for taxa_id
	private function taxonomy_row_query($params) {
	if (isset($params['id'])) {
	$table = DB_TAXONOMY;
	$where = "taxa_id";
	$field = array($params['id']);
	//build single query from BuildQuery class
	$db_results = BuildQuery::single_row_query($table, $where, $field);
	self::$db_taxonomy_row = $db_results;
	}
	}
	
	//taxonomy content query for given taxa id
	private function taxonomy_content_query($controller, $params) {
	if (isset($params['id'])) {
	$tables = DB_CONTENT.', '.DB_CONTENT_LOOKUP;
	$columns = DB_CONTENT.'.*';
	$where = "content.contentid=content_lookup.content_id and content_lookup.taxa_id=?";
	$field = array($params['id']);
	$db_results = BuildQuery::all_field_query($tables, $columns, $where, $field);
	self::$db_taxonomy_content = $db_results;
	}
	}
	
}
?>