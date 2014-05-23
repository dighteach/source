<?php
/**
 * query_builder.php - build sql query in model for 402 framework
 */

/**
 * load the sql query builder for the framework model
 */
class BuildQuery {
	
	/**
	 * return all fields for a DB query for a specified single row and table 
	 */
	protected function single_row_query($table, $where, $field) {
	$db_query = DB::get_row('SELECT * FROM '.$table.' WHERE '.$where.'=?', $field);
	return $db_query;
	}
	
	/**
	 * return a specified single field for a DB query for a single specified row and table 
	 */
	protected function single_field_query($table, $column, $where, $field) {
	$db_query = DB::get_row('SELECT '.$column.' FROM '.$table.' WHERE '.$where.'=?', $field);
	return $db_query;
	}

}

?>