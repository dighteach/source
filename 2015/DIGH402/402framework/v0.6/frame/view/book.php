<?php
/**
 * book.php - book viewer class for 402 framework
 */

require_once VIEW_DIR."html_builder.php";

/**
 * load and initialise Book Viewer class for 402 framework
 */
class BookViewer extends BuildHTML {

	//formatted content
	private static $viewer_content;
	private static $book_content;
	private static $book_headers;
	private static $div = "div";
	private static $img = "img";
	private static $link = "a";
	private static $table = "table";
	private static $thead = "thead";
	private static $th = "th";
	private static $tr = "tr";
	private static $td = "td";

	/**
	 * return the formatted book view content
	 */
	function get_group_content($content, $group_viewer_attributes, $taxonomy_attributes) {
	$this->format_book_view($content, $group_viewer_attributes, $taxonomy_attributes);
	return self::$viewer_content;
	}
	
	//format the select book content
	function format_book_view($content, $group_viewer_attributes, $taxonomy_attributes) {
	$book_full_attributes = array_merge($group_viewer_attributes, $taxonomy_attributes);
	$book_start = BuildHTML::start_element(self::$div, $book_full_attributes);
	$book_end = BuildHTML::end_element(self::$div);
	$table_start = BuildHTML::start_element(self::$table, $taxonomy_attributes);
	$table_end = BuildHTML::end_element(self::$table);
	$headers = array("page title","page description","page text","page link");
	self::table_headers($headers);
	self::format_book_layout($content);
	self::$viewer_content = $book_start.$table_start.self::$book_headers.self::$book_content.$table_end.$book_end;
	}
	
	//format the layout of our book pages in table rows and cells
	function format_book_layout($content) {
	//table row, cell, link ends
	$row_end = BuildHTML::end_element(self::$tr);
	$cell_end = BuildHTML::end_element(self::$td);
	$link_end = BuildHTML::end_element(self::$link);
	foreach ($content as $key=>$val) {
	//page details
	$page_id = $val['contentid'];
	$page_name = $val['contentname'];
	$page_desc = $val['contentdesc'];
	$page = $val['contenttext'];
	$page_sub = substr($page, 0, 100)."....";
	//table row for each page
	$page_attributes = array("id"=>$page_id,"class"=>"group_item","title"=>$page_name.' - '.$page_desc);
	$page_row_start = BuildHTML::start_element(self::$tr, $page_attributes);
	//table cell for page title
	$page_title_attributes = array("title"=>"page title");
	$page_title_start = BuildHTML::start_element(self::$td, $page_title_attributes);
	$page_title_cell = $page_title_start.$page_name.$cell_end;
	//table cell for page description
	$page_desc_attributes = array("title"=>"page description");
	$page_desc_start = BuildHTML::start_element(self::$td, $page_desc_attributes);
	$page_desc_end = BuildHTML::end_element(self::$td);
	$page_desc_cell = $page_desc_start.$page_desc.$cell_end;
	//table cell for substring of page text
	$page_text_attributes = array("title"=>"a snippet of page text");
	$page_text_start = BuildHTML::start_element(self::$td, $page_text_attributes);
	$page_text_end = BuildHTML::end_element(self::$td);
	$page_text_cell = $page_text_start.$page_sub.$cell_end;
	//table cell for link to full text page view
	$page_link_attributes = array("title"=>"click to view full page");
	$page_link_start = BuildHTML::start_element(self::$td, $page_link_attributes);
	$link_attributes = array("href"=>'?node=content/text&id='.$page_id,"class"=>BOOK_LINK);
	$link_start = BuildHTML::start_element(self::$link, $link_attributes); 
	$page_link_cell = $page_link_start.$link_start."View Page".$link_end.$cell_end;
	self::$book_content .= $page_row_start.$page_title_cell.$page_desc_cell.$page_text_cell.$page_link_cell.$row_end;
	}
	return self::$book_content;
	}
	
	//format table headings
	function table_headers($headers) {
	$header_start = BuildHTML::start_element(self::$thead);
	$header_end = BuildHTML::end_element(self::$thead);
	$th_attribute = array("title"=>"click to change sort order");
	foreach ($headers as $key=>$val) {
	$th_start = BuildHTML::start_element(self::$th, $th_attribute);
	$th_end = BuildHTML::end_element(self::$th);
	self::$book_headers .= $th_start.$val.$th_end;
	}
	self::$book_headers = $header_start.self::$book_headers.$header_end;
	return self::$book_headers;
	}
	
}
?>