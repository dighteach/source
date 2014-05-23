<?php
/**
 * text.php - text viewer class for 402 framework
 */

require_once VIEW_DIR."html_builder.php";

/**
 * load and initialise Text Viewer class for 402 framework
 */
class TextViewer extends BuildHTML {

	//formatted content
	private static $viewer_content;
	//html elements
	private static $div = "div";

	/**
	 * return the formatted text view content
	 */
	function get_viewer_content($content, $txt_viewer_attributes, $txt_attributes) {
	$this->format_text_view($content, $txt_viewer_attributes, $txt_attributes);
	return self::$viewer_content;
	}
	
	//format the select text content
	function format_text_view($content, $txt_viewer_attributes, $txt_attributes) {
	$txt_full_attributes = array_merge($txt_viewer_attributes, $txt_attributes);
	$txt_start = BuildHTML::start_element(self::$div, $txt_full_attributes);
	$txt_end = BuildHTML::end_element(self::$div);
	self::$viewer_content = $txt_start.$content.$txt_end;
	}
	
	
}
?>