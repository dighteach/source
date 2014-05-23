<?php
/**
 * content.php - content viewer class for 402 framework
 */

require_once VIEW_DIR."html_builder.php";

/**
 * load and initialise Content Viewer class for 402 framework - outputs all content for specified single content id
 */
class ContentViewer extends BuildHTML {

	//formatted content
	private static $viewer_content;
	//framework images directory
	private static $img_dir = MEDIA_IMAGES_DIR;
	//html elements
	private static $div = "div";
	private static $img = "img";
	private static $link = "a";

	/**
	 * return the formatted content view
	 */
	function get_controller_content($content, $viewer_attributes, $meta_attributes) {
	$this->format_content_view($content, $viewer_attributes, $meta_attributes);
	return self::$viewer_content;
	}
	
	//format the content
	function format_content_view($content, $viewer_attributes, $meta_attributes) {
	$content_txt = $content['contenttext'];
	$content_img = $content['contentimage'];
	$txt_tab_attributes = array("class"=>'grid_6 text');
	$txt_tab_start = BuildHTML::start_element(self::$div, $txt_tab_attributes);
	$img_tab_attributes = array("class"=>'grid_6 image');
	$img_tab_start = BuildHTML::start_element(self::$div, $img_tab_attributes);
	$content_end = BuildHTML::end_element(self::$div);
	if (!empty($content_txt)) {
	$txt = $content_txt;
	}
	else {
	$txt = "No associated text available";
	}
	if (!empty($content_img)) {
	$img_content = self::$img_dir.$content_img;
	$img_attributes["src"] = $img_content;
	$img = BuildHTML::start_element(self::$img, $img_attributes);
	}
	else {
	$img = "No associated image available";
	}
	$txt_output = $txt_tab_start.$txt.$content_end;
	$img_output = $img_tab_start.$img.$content_end;
	self::$viewer_content = $img_output.$txt_output;
	}
	
}
?>