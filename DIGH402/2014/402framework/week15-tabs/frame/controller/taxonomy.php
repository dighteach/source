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
	//taxonomy children
	private static $db_taxonomy_children;
	//taxonomy content
	private static $db_taxonomy_content;
	//taxonomy related
	private static $db_taxonomy_related;
	
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
	$this->taxonomy_content_check($controller, $params);
	return self::$db_taxonomy_content;
	}
	
	/**
	 * return related taxa details for specified taxa id
	 */
	function get_taxonomy_related($params) {
	$this->taxonomy_related_check($params);
	return self::$db_taxonomy_related;
	}
	
	/**
	 * return related links for specified content id
	 */
	function get_content_related($params) {
	$this->content_related_check($params);
	return self::$db_taxonomy_related;
	}
	
	//taxonomy query for taxa_id - top of sidebar etc
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
	
	//taxonomy query for taxa id - checks for parent id for specified taxa id
	private function taxonomy_parent_query($params) {
	if (isset($params['id'])) {
	$tables = DB_TAXONOMY.', '.DB_TAXONOMY_LOOKUP;
	$columns = DB_TAXONOMY.'.*';
	$where = 'taxonomy_lookup.taxa_parent_id=taxonomy.taxa_id and taxonomy_lookup.taxa_id=?';
	$field = array($params['id']);
	$db_results = BuildQuery::all_field_query($tables, $columns, $where, $field);
	return $db_results;
	}
	}
	
	//taxonomy query for taxa_id - returns child taxa_ids for specified parent id
	private function taxonomy_child_query($params) {
	if (isset($params['id'])) {
	$tables = DB_TAXONOMY.', '.DB_TAXONOMY_LOOKUP;
	$columns = DB_TAXONOMY.'.*';
	$where = 'taxonomy_lookup.taxa_id=taxonomy.taxa_id and taxonomy_lookup.taxa_parent_id=?';
	$field = array($params['id']);
	$db_results = BuildQuery::all_field_query($tables, $columns, $where, $field);
	return $db_results;
	}
	}
	
	//get taxonomy id for specified content id
	private function content_taxa_query($params) {
	if (isset($params['id'])) {
	$tables = DB_CONTENT_LOOKUP;
	$columns = DB_CONTENT_LOOKUP.'.taxa_id';
	$where = DB_CONTENT_LOOKUP.'.content_id=?';
	$field = array($params['id']);
	$db_results = BuildQuery::all_field_query($tables, $columns, $where, $field);
	return $db_results;
	}
	}
	
	//get taxonomy id for specified content id and format
	private function contentformat_taxa_query($params) {
	if (isset($params['id']) && isset($params['format'])) {
	$tables = DB_CONTENT_LOOKUP;
	$columns = DB_CONTENT_LOOKUP.'.taxa_id';
	$where = DB_CONTENT_LOOKUP.'.content_id=? and '.DB_CONTENT_LOOKUP.'.content_type_id=?';
	$field = array($params['id'], $params['format']);
	$db_results = BuildQuery::all_field_query($tables, $columns, $where, $field);
	return $db_results;
	}
	}
	
	//taxonomy content query for given taxa id - returns all content
	private function taxonomy_content_query($controller, $params) {
	if (isset($params['id'])) {
	$tables = DB_CONTENT.', '.DB_CONTENT_LOOKUP;
	$columns = 'DISTINCT '.DB_CONTENT.'.*';
	$where = DB_CONTENT.'.contentid='.DB_CONTENT_LOOKUP.'.content_id and '.DB_CONTENT_LOOKUP.'.taxa_id=?';
	$field = array($params['id']);
	$db_results = BuildQuery::all_field_query($tables, $columns, $where, $field);
	return $db_results;
	}
	}
	
	//return related taxa details for specified taxa id
	private function taxonomy_related_check($params) {
	if (isset($params['id'])) {
	$related_links = array();
	//check if parent available
	$parent_check = $this->taxonomy_parent_query($params);
	if (!empty($parent_check)) {
	foreach($parent_check as $key=>$val) {
	$parent_id = $val['taxa_id'];
	array_push($related_links, $val);
	//get child related links
	$child_db_results = $this->taxonomy_child_query($parent_id);
	//check if parent or not
	if (!empty($child_db_results)) {
	foreach($child_db_results as $key2=>$val2) {
	$child_id = $val2['taxa_id'];
	if ($child_id != $params['id']) {
	array_push($related_links, $val2);
	}
	}
	}
	}
	self::$db_taxonomy_related = $related_links;
	}
	else {
	$child_db_results = $this->taxonomy_child_query($params);
	//check if parent or not
	if (!empty($child_db_results)) {
	self::$db_taxonomy_related = $child_db_results;
	}
	}
	}
	}
	
	//return related taxa details for specified content id
	private function content_related_check($params) {
	if (isset($params['id']) && isset($params['format'])) {
	//get taxa id for given content id and format - format needed to check format&id for differences
	$taxa_check = $this->contentformat_taxa_query($params);
	foreach($taxa_check as $key=>$val) {
	$taxa_id = $val['taxa_id'];
	$this->taxonomy_related_check($taxa_id);
	}
	}
	else if (isset($params['id'])) {
	//get taxa id for given content id and format - format needed to check format&id for differences
	$taxa_check = $this->content_taxa_query($params);
	foreach($taxa_check as $key=>$val) {
	$taxa_id = $val['taxa_id'];
	$this->taxonomy_related_check($taxa_id);
	}
	}
	}
	
	//taxonomy content query for given taxa id
	private function taxonomy_content_check($controller, $params) {
	$child_content = array();
	if (isset($params['id'])) {
	$db_results = $this->taxonomy_content_query($controller, $params);
	//check content for passed taxa id
	if (empty($db_results)) {
	//check for children if no content available
	$child_db_results = $this->taxonomy_child_query($params);
	foreach ($child_db_results as $key=>$val) {
	//check values from query
	if (is_array($val)) {
	//get taxa id for each child
	$child_id = $val['taxa_id'];
	$params_child['id'] = $child_id;
	//check content for each returned child
	$db_child_results = $this->taxonomy_content_query($controller, $params_child);
	foreach ($db_child_results as $key2=>$val2) {
	//push child content
	array_push($child_content, $val2);
	}
	}
	}
	self::$db_taxonomy_content = $child_content;
	}
	else {
	self::$db_taxonomy_content = $db_results;
	}
	}
	}
	
}
?>