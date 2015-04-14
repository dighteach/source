<?php
/**
 * metadata.php - metadata controller class for 402 framework
 */

require_once CONTROLLER_DIR."content.php";

/**
 * load and initialise metadata controller class for 402 framework
 */
class MetadataController extends ContentController  {

	//meta row result
	private static $db_meta_row;
	
	/**
	 * return the DB meta row
	 */
	function get_meta_row($controller, $format, $params) {
	$this->meta_row_query($controller, $format, $params);
	return self::$db_meta_row;
	}

 	//metadata lookup query for specified DB field -  ?_lookup and ?_meta
	private function meta_row_query($controller, $format, $params) {
	if (isset($params['id'])) {
	$tables = $controller.'_meta, '.$controller.'_lookup';
	//set variable value to retrieve all columns
	$columns = $controller.'_meta.*';
	if (!empty($format)) {
	$type_id = ContentController::get_content_type($controller, $format);
	}
	$where = $controller.'_lookup.meta_id='.$controller.'_meta.meta_id AND '.$controller.'_lookup.'.$controller.'_type_id=? AND '.$controller.'_lookup.'.$controller.'_id=?';
	$field = array($type_id, $params['id']);
	//build single query from BuildQuery class
	$db_results = BuildQuery::single_lookup_query($tables, $columns, $where, $field);
	self::$db_meta_row = $db_results;
	}
	}
	
}
?>