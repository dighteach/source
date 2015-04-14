<?php
/**
 * search.php - search viewer class for 402 framework
 */

require_once VIEW_DIR."html_builder.php";

/**
 * load and initialise Search Viewer class for 402 framework
 */
class SearchViewer extends BuildHTML {

	//formatted content
	private static $viewer_content;
	private static $search_content;
	private static $search_headers;
	//html elements
	private static $div = "div";
	private static $img = "img";
	private static $link = "a";
	private static $table = "table";
	private static $thead = "thead";
	private static $th = "th";
	private static $tr = "tr";
	private static $td = "td";

	/**
	 * return the formatted searcher view content
	 */
	function get_controller_content($content, $viewer_attributes, $search_attributes) {
	$this->format_search_view($content, $viewer_attributes, $search_attributes);
	return self::$viewer_content;
	}
	
	//format the select search content
	function format_search_view($content, $viewer_attributes, $search_attributes) {
	$search_full_attributes = array_merge($viewer_attributes, $search_attributes);
	$search_start = BuildHTML::start_element(self::$div, $search_full_attributes);
	$search_end = BuildHTML::end_element(self::$div);
	$table_start = BuildHTML::start_element(self::$table, $search_attributes);
	$table_end = BuildHTML::end_element(self::$table);
	$headers = array("title","description","text","image","map","text link", "image link","map link");
	self::table_headers($headers);
	self::format_search_layout($content);
	self::$viewer_content = $search_start.$table_start.self::$search_headers.self::$search_content.$table_end.$search_end;
	}
	
	//format the layout of our search items in table rows and cells
	function format_search_layout($content) {
	//table row, cell, link ends
	$row_end = BuildHTML::end_element(self::$tr);
	$cell_end = BuildHTML::end_element(self::$td);
	$link_end = BuildHTML::end_element(self::$link);
	foreach ($content as $key=>$val) {
	//item details
	$item_id = $val['contentid'];
	$item_name = $val['contentname'];
	$item_desc = $val['contentdesc'];
	$item_text = $val['contenttext'];
	$item_img = $val['contentimage'];
	$item_map = $val['contentmap'];
	$item_sub = substr($item_text, 0, 100)."....";
	//table row for each item
	$item_attributes = array("id"=>$item_id,"class"=>"group_item","title"=>$item_name.' - '.$item_desc);
	$item_row_start = BuildHTML::start_element(self::$tr, $item_attributes);
	//generic table cell start - no attributes etc - useful for empty cells
	$item_start = BuildHTML::start_element(self::$td);
	$na_link = $item_start.'N/A'.$cell_end;
	//table cell for item title
	$link_title_attributes = array("href"=>'?node=content&id='.$item_id,"class"=>SEARCH_LINK);
	$link_title_start = BuildHTML::start_element(self::$link, $link_title_attributes);
	$item_title_attributes = array("title"=>"View parallel image and text");
	$item_title_start = BuildHTML::start_element(self::$td, $item_title_attributes);
	$item_title_cell = $item_title_start.$link_title_start.$item_name.$link_end.$cell_end;
	//table cell for item description
	$item_desc_attributes = array("title"=>"item description");
	$item_desc_start = BuildHTML::start_element(self::$td, $item_desc_attributes);
	$item_desc_cell = $item_desc_start.$item_desc.$cell_end;
	//table cell for substring of item text
	if (!empty($item_text)) {
	$item_text_attributes = array("title"=>"a snippet of item text");
	$item_text_start = BuildHTML::start_element(self::$td, $item_text_attributes);
	$item_text_cell = $item_text_start.$item_sub.$cell_end;
	}
	else {
	$item_text_cell = $na_link;
	}
	//table cell for image thumbnail
	if (!empty($item_img)) {
	$item_img_attributes = array("title"=>"image thumbnail","class"=>"image");
	$item_img_start = BuildHTML::start_element(self::$td, $item_img_attributes);
	$img_attributes = array("src"=>"media/images/".$item_img,"title"=>$item_name);
	$img_start = BuildHTML::start_element(self::$img, $img_attributes);
	$item_img_cell = $item_img_start.$img_start.$cell_end;
	}
	else {
	$item_img_cell = $na_link;
	}
	//table cell for map coordinates
	if (!empty($item_map)) {
	$map_attributes = array("title"=>"map coordinates - latitude and longitude");
	$map_start = $item_link_start = BuildHTML::start_element(self::$td, $map_attributes);
	$item_map_cell = $map_start.$item_map.$cell_end;
	}
	else {
	$item_map_cell = $na_link;
	}
	//table cells for links to full text, image, and map item views
	$item_link_attributes = array("title"=>"click to view full item");
	$item_link_start = BuildHTML::start_element(self::$td, $item_link_attributes);
	if (isset($_GET['query'])) {
	$search_query = $_GET['query'];
	$link_text_attributes = array("href"=>'?node=content/text&id='.$item_id.'&hi='.$search_query,"class"=>SEARCH_LINK);
	}
	else { 
	$link_text_attributes = array("href"=>'?node=content/text&id='.$item_id,"class"=>SEARCH_LINK);
	}
	$link_img_attributes = array("href"=>'?node=content/image&id='.$item_id,"class"=>SEARCH_LINK);
	$link_map_attributes = array("href"=>'?node=content/map&id='.$item_id,"class"=>SEARCH_LINK);
	//text link
	if (!empty($item_text)) { 
	$link_text_start = BuildHTML::start_element(self::$link, $link_text_attributes);
	$text_link_cell = $item_link_start.$link_text_start."View text".$link_end.$cell_end;
	}
	else {
	$text_link_cell = $na_link;
	}
	//image link
	if (!empty($item_img)) {
	$link_img_start = BuildHTML::start_element(self::$link, $link_img_attributes); 
	$img_link_cell = $item_link_start.$link_img_start."View image".$link_end.$cell_end;
	}
	else {
	$img_link_cell = $na_link;
	}
	//map link
	if (!empty($item_map)) {
	$link_map_start = BuildHTML::start_element(self::$link, $link_map_attributes); 
	$map_link_cell = $item_link_start.$link_map_start."View map".$link_end.$cell_end;
	}
	else {
	$map_link_cell = $na_link;
	}
	//output all cells
	self::$search_content .= $item_row_start.$item_title_cell.$item_desc_cell.$item_text_cell.$item_img_cell.$item_map_cell.$text_link_cell.$img_link_cell.$map_link_cell.$row_end;
	}
	return self::$search_content;
	}
	
	//format table headings
	function table_headers($headers) {
	$header_start = BuildHTML::start_element(self::$thead);
	$header_end = BuildHTML::end_element(self::$thead);
	$th_attribute = array("title"=>"click to change sort order");
	foreach ($headers as $key=>$val) {
	$th_start = BuildHTML::start_element(self::$th, $th_attribute);
	$th_end = BuildHTML::end_element(self::$th);
	self::$search_headers .= $th_start.$val.$th_end;
	}
	self::$search_headers = $header_start.self::$search_headers.$header_end;
	return self::$search_headers;
	}
	
}
?>