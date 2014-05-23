<?php
/**
 * metadata.php - metadata controller class for 402 framework
 */

require_once MODEL_DIR."query_builder.php";

/**
 * load and initialise metadata controller class for 402 framework
 */
class MetadataController extends BuildQuery {

	//meta row result
	private static $db_meta_row;
	
	/**
	 * return the DB meta row
	 */
	function get_meta_row($controller, $params) {
	$this->meta_row_query($controller, $params);
	return self::$db_meta_row;
	}

 	//metadata lookup query for specified DB field -  ?_lookup and ?_meta
	private function meta_row_query($controller, $params) {
	if (isset($params['id'])) {
	$tables = $controller.'_meta, '.$controller.'_lookup';
	//set variable value to retrieve all columns
	$columns = $controller.'_meta.*';
	$where = $controller.'_lookup.meta_id='.$controller.'_meta.meta_id AND '.$controller.'_lookup.'.$controller.'_id';
	$field = array($params['id']);
	//build single query from BuildQuery class
	$db_results = BuildQuery::single_field_query($tables, $columns, $where, $field);
	self::$db_meta_row = $db_results;
	}
	}
	
}
?>