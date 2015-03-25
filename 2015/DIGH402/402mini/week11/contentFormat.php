<?php
/**
 * contentFormat.php - format passed content for rendering
 */

/**
 * load and initialise Content Format class for 402mini
 */
class ContentFormat {

	//formatted content
	private static $viewer_content;
	private static $table_headers;
	private static $table_header_cells;
	private static $table_rows;

	//return the formatted table content
	function get_table_content($content, $headers) {
	$this->format_table($content, $headers);
	return self::$viewer_content;
	}
	
	//format content as a table
	function format_table($content, $headers) {
	//create table header cells
	foreach ($headers as $key=>$val) {
	self::$table_header_cells .= '<th>'.$val.'</th>';
	}
	//create table headers row
	self::$table_headers = '<tr>'.self::$table_header_cells.'</tr>';
	//create content rows and cells
	foreach ($content as $key=>$val) {
	//get array of filename details - filename and extension...
	$fileinfo = pathinfo($val);
	$filename = $fileinfo['filename'];
	$fileext = $fileinfo['extension'];
	//set link for file
	$filelink = '<a href="content.php?name='.$filename.'&type='.$fileext.'">view file</a>';
	self::$table_rows .= '<tr><td>'.str_replace('_', ' ', $filename).'</td><td>'.$fileext.'</td><td>'.$filelink.'</td></tr>';
	}
	//concatenate formatted content to create table
	self::$viewer_content = '<table class="table table-bordered">'.self::$table_headers.self::$table_rows.'</table>';
	}
	
}
?>