<?php
/**
 * atlas.php - atlas viewer class for 402 framework
 */

require_once VIEW_DIR."html_builder.php";

/**
 * load and initialise Atlas Viewer class for 402 framework
 */
class AtlasViewer extends BuildHTML {

	//formatted content
	private static $viewer_content;
	private static $atlas_content;
	private static $atlas_headers;
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
	 * return the formatted atlas view content
	 */
	function get_group_content($content, $group_viewer_attributes, $taxonomy_attributes) {
	$this->format_atlas_view($content, $group_viewer_attributes, $taxonomy_attributes);
	return self::$viewer_content;
	}
	
	//format the select atlas content
	function format_atlas_view($content, $group_viewer_attributes, $taxonomy_attributes) {
	$atlas_full_attributes = array_merge($group_viewer_attributes, $taxonomy_attributes);
	$atlas_start = BuildHTML::start_element(self::$div, $atlas_full_attributes);
	$atlas_end = BuildHTML::end_element(self::$div);
	$table_start = BuildHTML::start_element(self::$table, $taxonomy_attributes);
	$table_end = BuildHTML::end_element(self::$table);
	$headers = array("title","description","page text","map coordinates","map link");
	self::table_headers($headers);
	self::format_atlas_layout($content);
	self::$viewer_content = $atlas_start.$table_start.self::$atlas_headers.self::$atlas_content.$table_end.$atlas_end;
	}
	
	//format the layout of our atlas maps in table rows and cells
	function format_atlas_layout($content) {
	//table row, cell, link ends
	$row_end = BuildHTML::end_element(self::$tr);
	$cell_end = BuildHTML::end_element(self::$td);
	$link_end = BuildHTML::end_element(self::$link);
	//generic table cell start - no attributes etc - useful for empty cells
	$item_start = BuildHTML::start_element(self::$td);
	$na_link = $item_start.'N/A'.$cell_end;
	foreach ($content as $key=>$val) {
	//map details
	$map_id = $val['contentid'];
	$map_name = $val['contentname'];
	$map_desc = $val['contentdesc'];
	$map_text = $val['contenttext'];
	$map = $val['contentmap'];
	$map_text_sub = substr($map_text, 0, 100)."....";
	//table row for each map
	$map_attributes = array("id"=>$map_id,"class"=>"group_item","title"=>$map_name.' - '.$map_desc);
	$map_row_start = BuildHTML::start_element(self::$tr, $map_attributes);
	//table cell for title
	$title_attributes = array("title"=>"item title");
	$title_start = BuildHTML::start_element(self::$td, $title_attributes);
	$title_cell = $title_start.$map_name.$cell_end;
	//table cell for description
	$desc_attributes = array("title"=>"item description");
	$desc_start = BuildHTML::start_element(self::$td, $desc_attributes);
	$desc_end = BuildHTML::end_element(self::$td);
	$desc_cell = $desc_start.$map_desc.$cell_end;
	//table cell for substring of page text
	if (!empty($map_text)) {
	$text_attributes = array("title"=>"a snippet of page text");
	$text_start = BuildHTML::start_element(self::$td, $text_attributes);
	$text_end = BuildHTML::end_element(self::$td);
	$text_cell = $text_start.$map_text_sub.$cell_end;
	}
	else {
	$text_cell = $na_link;
	}
	//table cell for map coordinates - latitude and longitude
	if (!empty($map)) {
	$map_attributes = array("title"=>"map coordinates - latitude and longitude");
	$map_start = BuildHTML::start_element(self::$td, $map_attributes);
	$map_cell = $map_start.$map.$cell_end;
	}
	else {
	$map_cell = $na_link;
	}
	//table cell for link to full text page view
	$map_link_attributes = array("title"=>"click to view full map");
	$map_link_start = BuildHTML::start_element(self::$td, $map_link_attributes);
	$link_attributes = array("href"=>'?node=content/map&id='.$map_id,"class"=>MAP_LINK);
	$link_start = BuildHTML::start_element(self::$link, $link_attributes); 
	$map_link_cell = $map_link_start.$link_start."View Map".$link_end.$cell_end;
	self::$atlas_content .= $map_row_start.$title_cell.$desc_cell.$text_cell.$map_cell.$map_link_cell.$row_end;
	}
	return self::$atlas_content;
	}
	
	//format table headings
	function table_headers($headers) {
	$header_start = BuildHTML::start_element(self::$thead);
	$header_end = BuildHTML::end_element(self::$thead);
	$th_attribute = array("title"=>"click to change sort order");
	foreach ($headers as $key=>$val) {
	$th_start = BuildHTML::start_element(self::$th, $th_attribute);
	$th_end = BuildHTML::end_element(self::$th);
	self::$atlas_headers .= $th_start.$val.$th_end;
	}
	self::$atlas_headers = $header_start.self::$atlas_headers.$header_end;
	return self::$atlas_headers;
	}
	
}
?>