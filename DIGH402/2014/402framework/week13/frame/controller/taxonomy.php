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
	
	/**
	 * return the DB taxonomy row for specified field
	 */
	function get_taxonomy_row($params) {
	$this->taxonomy_row_query($params);
	return self::$db_taxonomy_row;
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
	
}
?>