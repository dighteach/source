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
	private static $span = "span";
	private static $img = "img";
	private static $ul = "ul";
	private static $li = "li";
	private static $form = "form";
	private static $input = "input";
	private static $css_type = "text/css";
	private static $css_media = "screen";
	private static $js_type = "text/javascript";
	
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
	
	//draw metadata
	function draw_meta($meta) {
	if (is_array($meta)) {
	foreach ($meta as $key=>$val) {
	$meta_attributes = array("class"=>'meta '.$key);
	$meta_start = BuildHTML::start_element(self::$div, $meta_attributes);
	$meta_end = BuildHTML::end_element(self::$div);
	echo $meta_start;
	//check content title and description for non-sidebar draw
	if ($key == 'title' || $key == 'description') { 
	echo $val;
	}
	else {
	echo str_replace('meta_', 'meta ', $key).' = '.$val;
	}
	echo $meta_end;
	}
	}
	}
	
	//draw basic search form
	function draw_search_form() {
	//html search form with get method
	$form_attributes = array("class"=>"search_form","name"=>"search", "method"=>"get");
	$form_start = BuildHTML::start_element(self::$form, $form_attributes);
	$form_end = BuildHTML::end_element(self::$form);
	echo $form_start;
	//input fields for search form
	$input_attributes1 = array("type"=>"hidden","name"=>"node","value"=>"search");
	$input_attributes2 = array("type"=>"text","name"=>"query");
	$input_attributes3 = array("type"=>"submit","value"=>"search");
	$input1 = BuildHTML::start_element(self::$input, $input_attributes1);
	$input2 = BuildHTML::start_element(self::$input, $input_attributes2);
	$input3 = BuildHTML::start_element(self::$input, $input_attributes3);
	//output all input elements
	echo $input1.$input2.$input3;
	echo $form_end;
	}
	
	//draw required options etc for specified plugins
	function draw_plugins($plugins) {
	if (!empty($plugins)) {
	$plugins_attributes = array("id"=>"plugins","class"=>"plugin_options");
	$plugins_start = BuildHTML::start_element(self::$div, $plugins_attributes);
	$plugins_end = BuildHTML::end_element(self::$div);
	echo $plugins_start;
	//loop through plugins array
	foreach($plugins as $key=>$val) {
	$plugin_name = $val['plugin_name'];
	$plugin_desc = $val['plugin_desc'];
	$plugin_dir = $val['plugin_directory'];
	$plugin_attributes = array("id"=>$plugin_name,"class"=>"plugin_link","title"=>$plugin_desc);
	$plugin_start = BuildHTML::start_element(self::$span, $plugin_attributes);
	$plugin_end = BuildHTML::end_element(self::$span);
	//iterate over specified plugin directory and return all css and js files
	$plugin_dir = PLUGINS_DIR.$plugin_dir.'/';
	$files = Functions::dir_iterate(BASE_DIR.$plugin_dir);
	//iterate over $files array
	if (!empty($files)) {
	foreach($files as $key=>$val) {
	$fileparts = pathinfo($val);
	$fileext = $fileparts['extension'];
	//check for js files
	if ($fileext == 'js') {
	//draw js file
	self::draw_js($plugin_dir, $val, self::$js_type);
	}
	}
	}
	echo $plugin_start;
	echo str_replace('_', ' ', $plugin_name);
	echo $plugin_end;
	}
	echo $plugins_end;
	}
	}
	
	//draw menu links and structure
	function draw_menu($menu_links, $menu_class) {
	$menu_attributes = array("class"=>'grid_6 '.$menu_class);
	$menu_start = BuildHTML::start_element(self::$div, $menu_attributes);
	$menu_end = BuildHTML::end_element(self::$div);
	$ul_start = BuildHTML::start_element(self::$ul);
	$ul_end = BuildHTML::end_element(self::$ul);
	$li_start = BuildHTML::start_element(self::$li);
	$li_end = BuildHTML::end_element(self::$li);
	echo $menu_start;
	echo $ul_start;
	if ($menu_class == 'vertical_menu') {
	echo $li_start.'Menu'.$li_end;
	}
	if (is_array($menu_links)) {
	foreach ($menu_links as $key=>$val) {
	$parent_id = $val['node_id'];
	$parent_name = $val['node_name'];
	$parent_desc = $val['node_desc'];
	$parent_link = $val['node_link'];
	//can be abstracted using BuildHTML start element
	echo '<li id="'.$parent_id.'"><a href="?node='.$parent_link.'" title="'.$parent_desc.'">'.$parent_name.'</a>';
	if (is_array($val)) {
	echo $ul_start;
	foreach ($val as $key2=>$val2) {
	if (is_array($val2)) {
	$child_id = $val2['node_id'];
	$child_name = $val2['node_name'];
	$child_desc = $val2['node_desc'];
	$child_link = $val2['node_link'];
	//can be abstracted using BuildHTML start element
	echo '<li id="'.$child_id.'"><a href="?node='.$child_link.'" title="'.$child_desc.'">'.$child_name.'</a>'.$li_end;
	}
	}
	echo $ul_end.$li_end;
	}
	else {
	echo $li_end;
	}
	}
	}
	echo $ul_end;
	echo $menu_end;
	}
	
	//draw related links for taxa
	function draw_related_links($related_links) {
	if (is_array($related_links)) {
	$related_attributes = array("class"=>'related_links grid_12 vertical_menu');
	$related_start = BuildHTML::start_element(self::$div, $related_attributes);
	$related_end = BuildHTML::end_element(self::$div);
	$ul_start = BuildHTML::start_element(self::$ul);
	$ul_end = BuildHTML::end_element(self::$ul);
	$li_start = BuildHTML::start_element(self::$li);
	$li_end = BuildHTML::end_element(self::$li);
	echo $related_start;
	echo $ul_start;
	echo $li_start.'Related Taxa'.$li_end;
	foreach ($related_links as $key=>$val) {
	$related_id = $val['taxa_id'];
	$related_name = ucfirst($val['taxa_name']);
	$related_desc = $val['taxa_description'];
	echo $li_start.'<a href="?node=taxonomy&id='.$related_id.'" title="'.$related_desc.'">'.$related_name.'</a>'.$li_end;
	}
	echo $ul_end.$related_end;
	}
	}
	
	//draw related links for taxa
	function draw_related_content($related_content) {
	if (is_array($related_content)) {
	$related_attributes = array("class"=>'related_content grid_12 vertical_menu');
	$related_start = BuildHTML::start_element(self::$div, $related_attributes);
	$related_end = BuildHTML::end_element(self::$div);
	$ul_start = BuildHTML::start_element(self::$ul);
	$ul_end = BuildHTML::end_element(self::$ul);
	$li_start = BuildHTML::start_element(self::$li);
	$li_end = BuildHTML::end_element(self::$li);
	echo $related_start;
	echo $ul_start;
	echo $li_start.'Related Content'.$li_end;
	foreach ($related_content as $key=>$val) {
	echo $li_start.'<a href="?node='.$key.'&id='.$val.'" title="View related page for '.$key.'">'.$key.'</a>'.$li_end;
	}
	echo $ul_end.$related_end;
	}
	}
	
	//draw css & js for user selected theme 
	function draw_theme() {
		//add basic user specified theme css
		$css_file = THEME_CSS;
		self::draw_css(self::$theme_dir, $css_file, self::$css_type, self::$css_media);
		//add basic user specified theme js
		$js_file = THEME_JS;
		self::draw_js(self::$theme_dir, $js_file, self::$js_type);
	}
	
	//draw the HTML head element and associated elements
	function draw_head($css, $js) {
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
		self::draw_css(CSS_DIR, $val, self::$css_type, self::$css_media);
		}
		}
		//add script for google maps api
		$gmap_url = "https://maps.googleapis.com/maps/api/js";
		$gmap_val = "?sensor=false";
		self::draw_js($gmap_url, $gmap_val, self::$js_type);
		//add default js to html head
		if (is_array($js)) {
		foreach ($js as $val) {
		self::draw_js(JAVASCRIPT_DIR, $val, self::$js_type);
		}
		}
		//add user specified theme - simple css and js
		if (self::$theme != "default") {
		self::draw_theme();
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
	function draw_header($main_menu) {
		global $settings;
		$logo = $settings['project_logo'];
		$menu_class = "horizontal_menu";
		$attributes = array("id"=>HTML_HEADER,"class"=>HTML_HEADER_CLASS);
		$logo_attributes = array("src"=>DESIGN_IMAGES_DIR.$logo, "alt"=>"framework default logo", "title"=>"402 framework", "class"=>"logo");
		$header_start = BuildHTML::start_element(self::$div, $attributes);
		$header_end = BuildHTML::end_element(self::$div);
		$logo_start = BuildHTML::start_element(self::$img, $logo_attributes);
		echo $header_start;
		echo '<div id="header_logo" class="grid_3">'.$logo_start.'</div>';
		self::draw_menu($main_menu, $menu_class);
		self::draw_search_form();
		echo $header_end;
	}
	
	//draw html elements for defined middle of framework template - centre, main, and sidebar
	function draw_middle($content, $content_meta, $plugins, $content_menu, $related_links, $related_content) {
		$attributes = array("id"=>HTML_CENTRE,"class"=>HTML_CENTRE_CLASS);
		$centre_start = BuildHTML::start_element(self::$div, $attributes);
		$centre_end = BuildHTML::end_element(self::$div);
		echo $centre_start;
		self::draw_sidebar($content_meta, $content_menu, $related_links, $related_content);
		if ($plugins != null) {
		self::draw_plugins($plugins);
		}
		self::draw_main($content);
		echo $centre_end;
		
	}
	
	//draw main content output for framework template
	function draw_main($content) {
		self::$content = $content;
		$attributes = array("id"=>HTML_CONTENT,"class"=>HTML_CONTENT_CLASS);
		$main_start = BuildHTML::start_element(self::$div, $attributes);
		$main_end = BuildHTML::end_element(self::$div);
		echo $main_start;
		echo self::$content;
		echo $main_end;
	}
	
	//draw html sidebar element with attributes
	function draw_sidebar($content_meta, $content_menu, $related_links, $related_content) {
		$menu_class = "vertical_menu";
		$attributes = array("id"=>HTML_SIDEBAR,"class"=>HTML_SIDEBAR_CLASS);
		$sidebar_start = BuildHTML::start_element(self::$div, $attributes);
		$sidebar_end = BuildHTML::end_element(self::$div);
		echo $sidebar_start;
		if (!empty($content_meta)) {
		//remove content title and description from content metadata
		$sidebar_meta = array_slice($content_meta, 2);
		self::draw_titles($content_meta);
		self::draw_meta($sidebar_meta);
		//draw related content
		if (!empty($related_content)) {
		self::draw_related_content($related_content);
		}
		//draw related links
		if (!empty($related_links)) {
		self::draw_related_links($related_links);
		}
		self::draw_menu($content_menu, $menu_class);
		}
		echo $sidebar_end;
	}
	
	//draw content title and content description from content_meta
	function draw_titles($content_meta) {
		$titles_meta = array();
		//extract first two keys and values from $content_meta and splice into new $titles_meta array
		$titles_meta = array_splice($content_meta,0,2,$titles_meta);
		self::draw_meta($titles_meta);
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