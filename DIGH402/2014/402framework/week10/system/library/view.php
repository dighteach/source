<?php
/**
 * view.php - view loader for framework template for 402 framework
 */

require_once VIEW_DIR."html_builder.php";

/**
 * load the template for the framework viewer
 */
class View extends BuildHTML {

	private static $theme;
	private static $theme_dir;
	private static $content;
	private static $div = "div";
	
	//setter method for theme
	function set_theme($value) {
		$theme = $value;
		self::$theme = $theme;
		self::$theme_dir = THEMES_DIR.$theme."/";
	}
	
	//set the selected theme
	function selected_theme() {
		$theme = self::$theme;
		$theme_dir = self::$theme_dir;		
	}
	
	//draw framework css from supplied parameters
	function draw_css($dir, $file, $type, $media) {
	echo '<link href="'.$dir.$file.'" rel="stylesheet" type="'.$type.'" media="'.$media.'" />';
	}
	
	//draw framework js from supplied parameters
	function draw_js($dir, $file, $type) {
	echo '<script type="'.$type.'" src="'.$dir.$file.'"></script>';
	}
	
	//draw the HTML head element and associated elements
	function draw_head($css, $js) {
		$theme = self::$theme;
		$head_start = BuildHTML::start_element(HTML_HEAD);
		$head_end = BuildHTML::end_element(HTML_HEAD);	
		//output html head element
		echo $head_start;
		
		//add project title and other metadata
		global $settings;
		$title = $settings['project_title'];
		$keywords = $settings['meta_keywords'];
		$keywords_attributes = array("name"=>"keywords","content"=>$keywords);
		$desc = $settings['meta_description'];
		$desc_attributes = array("name"=>"description","content"=>$desc);
		$charset = $settings['meta_charset'];
		$charset_attributes = array("charset"=>$charset);
		//output html head/title
		$title_start = BuildHTML::start_element(HTML_TITLE);
		$title_end = BuildHTML::end_element(HTML_TITLE);
		echo $title_start.$title.$title_end;
		//output html head/meta
		$meta_keywords = BuildHTML::start_element(HTML_META, $keywords_attributes);
		$meta_desc = BuildHTML::start_element(HTML_META, $desc_attributes);
		$meta_charset = BuildHTML::start_element(HTML_META, $charset_attributes);
		echo $meta_keywords.$meta_desc.$meta_charset;
		
		//add default css to html head
		if (is_array($css)) {
		foreach ($css as $val) {
		$type = "text/css";
		$media = "screen";
		self::draw_css(CSS_DIR, $val, $type, $media);
		}
		}
		
		//add default js to html head
		if (is_array($js)) {
		foreach ($js as $val) {
		$type = "text/javascript";
		self::draw_js(JAVASCRIPT_DIR, $val, $type);
		}
		}
		echo $head_end;
	}
	
	//draw html elements for defined top of framework template - body and container
	function draw_top() {
		$attributes = array("id"=>HTML_CONTAINER,"class"=>HTML_CONTAINER_CLASS);
		$body_start = BuildHTML::start_element(HTML_BODY);
		$container_start = BuildHTML::start_element(self::$div, $attributes);
		echo $body_start;
		echo $container_start;
	}
	
	//draw html header element with attributes
	function draw_header() {
		$attributes = array("id"=>HTML_HEADER,"class"=>HTML_HEADER_CLASS);
		$header_start = BuildHTML::start_element(self::$div, $attributes);
		echo $header_start;
		$header_end = BuildHTML::end_element(self::$div);
		echo $header_end;
	}
	
	//draw html elements for defined middle of framework template - centre, main, and sidebar
	function draw_middle($content) {
		$attributes = array("id"=>HTML_CENTRE,"class"=>HTML_CENTRE_CLASS);
		$centre_start = BuildHTML::start_element(self::$div, $attributes);
		$centre_end = BuildHTML::end_element(self::$div);
		echo $centre_start;
		self::draw_main($content);
		self::draw_sidebar();
		echo $centre_end;
		
	}
	
	//draw main content output for framework template
	function draw_main($content) {
		self::$content = $content;
		$attributes = array("id"=>HTML_CONTENT,"class"=>HTML_CONTENT_CLASS);
		$main_start = BuildHTML::start_element(self::$div, $attributes);
		$main_end = BuildHTML::end_element(self::$div);
		echo $main_start;
		//NB: we'll need to add a plugin handler for content types etc - eg: for images, texts etc...
		echo self::$content;
		echo $main_end;
	}
	
	//draw html sidebar element with attributes
	function draw_sidebar() {
		$attributes = array("id"=>HTML_SIDEBAR,"class"=>HTML_SIDEBAR_CLASS);
		$sidebar_start = BuildHTML::start_element(self::$div, $attributes);
		$sidebar_end = BuildHTML::end_element(self::$div);
		echo $sidebar_start;
		echo $sidebar_end;
	}
	
	//draw html footer element with attributes
	function draw_footer() {
		$attributes = array("id"=>HTML_FOOTER,"class"=>HTML_FOOTER_CLASS);
		$footer_start = BuildHTML::start_element(self::$div, $attributes);
		$footer_end = BuildHTML::end_element(self::$div);
		echo $footer_start;
		echo $footer_end;
	}
	
	//draw html elements for defined bottom of framework template - end element tags for container and body
	function draw_bottom() {
		$container_end = BuildHTML::end_element(self::$div);
		echo $container_end;
		$body_end = BuildHTML::end_element(HTML_BODY);
		echo $body_end;
	}

}

?>