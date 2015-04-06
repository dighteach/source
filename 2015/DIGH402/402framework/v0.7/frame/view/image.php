<?php
/**
 * image.php - image viewer class for 402 framework
 */

require_once VIEW_DIR."html_builder.php";

/**
 * load and initialise Image Viewer class for 402 framework
 */
class ImageViewer extends BuildHTML {

	//formatted content
	private static $viewer_content;
	//framework images directory
	private static $img_dir = MEDIA_IMAGES_DIR;
	//html elements
	private static $div = "div";
	private static $img = "img";

	/**
	 * return the formatted image view content
	 */
	function get_viewer_content($content, $img_viewer_attributes, $img_attributes) {
	$this->format_image_view($content, $img_viewer_attributes, $img_attributes);
	return self::$viewer_content;
	}
	
	//format the select image content
	function format_image_view($content, $img_viewer_attributes, $img_attributes) {
	$img_content = self::$img_dir.$content;
	$img_attributes["src"] = $img_content;
	$img_start = BuildHTML::start_element(self::$div, $img_viewer_attributes);
	$img = BuildHTML::start_element(self::$img, $img_attributes);
	$img_end = BuildHTML::end_element(self::$div);
	self::$viewer_content = $img_start.$img.$img_end;
	}
	
	
}
?>