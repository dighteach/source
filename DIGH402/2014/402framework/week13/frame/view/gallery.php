<?php
/**
 * gallery.php - gallery viewer class for 402 framework
 */

require_once VIEW_DIR."html_builder.php";

/**
 * load and initialise Gallery Viewer class for 402 framework
 */
class GalleryViewer extends BuildHTML {

	//formatted content
	private static $viewer_content;
	private static $gallery_content;
	private static $div = "div";
	private static $img = "img";
	private static $link = "a";

	/**
	 * return the formatted gallery view content
	 */
	function get_group_content($content, $group_viewer_attributes, $taxonomy_attributes) {
	$this->format_gallery_view($content, $group_viewer_attributes, $taxonomy_attributes);
	return self::$viewer_content;
	}
	
	//format the select image content
	function format_gallery_view($content, $group_viewer_attributes, $taxonomy_attributes) {
	$gallery_full_attributes = array_merge($group_viewer_attributes, $taxonomy_attributes);
	$gallery_start = BuildHTML::start_element(self::$div, $gallery_full_attributes);
	$gallery_end = BuildHTML::end_element(self::$div);
	self::format_gallery_layout($content);
	self::$viewer_content = $gallery_start.self::$gallery_content.$gallery_end;
	}
	
	function format_gallery_layout($content) {
	$div_end = BuildHTML::end_element(self::$div); 
	$link_end = BuildHTML::end_element(self::$link);
	foreach ($content as $key=>$val) {
	$img_id = $val['contentid'];
	$img_name = $val['contentname'];
	$img_desc = $val['contentdesc'];
	$img = $val['contentimage'];
	$thumb_attributes = array("class"=>"grid_3 thumb_contain group_item");
	$img_attributes = array("id"=>$img_id,"class"=>GALLERY_IMG,"title"=>$img_name.' - '.$img_desc,"alt"=>$img_name,"src"=>MEDIA_IMAGES_DIR.$img);
	$link_attributes = array("href"=>'?node=content/image&id='.$img_id,"class"=>GALLERY_LINK,"title"=>"click to open image page");
	$thumb_start = BuildHTML::start_element(self::$div, $thumb_attributes);
	$img_start = BuildHTML::start_element(self::$img, $img_attributes);
	$link_start = BuildHTML::start_element(self::$link, $link_attributes); 
	self::$gallery_content .= $thumb_start.$img_start.$link_start.$img_name.$link_end.$div_end;
	}
	return self::$gallery_content;
	}
	
	
}
?>