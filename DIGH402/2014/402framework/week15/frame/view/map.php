<?php
/**
 * map.php - map viewer class for 402 framework
 */

require_once VIEW_DIR."html_builder.php";

/**
 * load and initialise Map Viewer class for 402 framework
 */
class MapViewer extends BuildHTML {

	//formatted content
	private static $viewer_content;
	private static $div = "div";

	/**
	 * return the formatted content view
	 */
	function get_viewer_content($content, $viewer_attributes, $meta_attributes) {
	$this->format_content_view($content, $viewer_attributes, $meta_attributes);
	return self::$viewer_content;
	}
	
	//format the content
	function format_content_view($content, $viewer_attributes, $meta_attributes) {
	$map_attributes = array("id"=>"map_canvas","class"=>"grid_6","coordinates"=>$content);
	$map_start = BuildHTML::start_element(self::$div, $map_attributes);
	$map_end = BuildHTML::end_element(self::$div);
	$map_output = $map_start.$map_end;
	self::$viewer_content = $map_output;
	}
	
}
?>