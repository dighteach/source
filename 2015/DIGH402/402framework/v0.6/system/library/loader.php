<?php
/**
 * loader.php - main loader for 402 framework
 */

//require assorted non-specific functions for the framework
require_once LIBRARY_DIR."functions.php";
//require assorted constants for the framework
require_once CONSTANTS_DIR."constants.php";
//require assorted error functions for the framework
require_once LIBRARY_DIR."error_functions.php";

/**
 * load and initialise Loader for 402 framework
 */
class Loader {

	protected static $default_theme = THEME_DEFAULT;
	protected static $content_meta = array();
	protected static $plugins = array();

/**
 * load the settings file
 */
function init_settings($config_dir = CONFIG_DIR, $settings_file = "settings.php"){
	require_once CONFIG_DIR."settings.php";
}

/**
 * initialise the database class
 */
function init_db($name = null){
	require_once LIBRARY_DIR."db.php";
			
	if(!$name)
		$name = DB::DEFAULT_CONNECT_NAME;		
		db::init($name);
}

function auto_load_controller() {
	require_once LIBRARY_DIR."router.php";
	
	$router = new Router;
	$controller = $router->get_controller();
	$controller_dir = $router->get_controller_dir();
	$format = $router->get_format();
	$group = $router->get_group();
	$params = $router->get_params();
	
	$this->load_controller($controller, $controller_dir, $format, $group, $params);
	
	}

/**
 * load content selected by URI, and save output to default content area
 */
function load_controller($controller = null, $controller_dir = null, $format = null, $group = null, $params = null) {
 
	//determine required controller and load class
	if ($controller != null) {
	$controller_file = $controller_dir.FRAME_EXTENSION;
	//require taxonomy controller class
	$taxonomy_file = CONTROLLER_DIR.'taxonomy'.FRAME_EXTENSION;
	//load required controller
	require_once $controller_file;
	//load required taxonomy controller
	require_once $taxonomy_file;
 
	//define class name for required controller
	$controller_class = ucfirst($controller).CONTROLLER_CLASS_NAME;
	//define class name for taxonomy controller
	$taxonomy_class = ucfirst('taxonomy').CONTROLLER_CLASS_NAME;
 
	//check controller class exists and instantiate object
	if (class_exists($controller_class)) {
	$controller_object = new $controller_class();
	}
	else {
	//trigger debug error - for testing at the moment...
	return trigger_error("Debug: Controller Class not found - <b>".$controller."</b>");
	}
	
	//check taxonomy controller class exists and instantiate object
	if (class_exists($taxonomy_class)) {
	$taxonomy_object = new $taxonomy_class();
	}
	else {
	//trigger debug error - for testing at the moment...
	return trigger_error("Debug: Taxonomy Class not found</b>");
	}
  	
  	//check content format, group, and params for controller - group content returned eg: image gallery
  	if ($controller !=null && $format != null && $group != null && $params != null) {
  	//get content for specified route
	$content = $controller_object->get_content_group($controller, $format, $group, $params);
	//get taxonomy title and description for metadata
	$taxonomy_meta = $taxonomy_object->get_taxonomy_row($params);
	$taxonomy_title = $taxonomy_meta['taxa_name'];
	$taxonomy_desc = $taxonomy_meta['taxa_description'];
	//add taxonomy title and description meta to content meta array
	self::$content_meta['title'] = $taxonomy_title;
	self::$content_meta['description'] = $taxonomy_desc;
	
	//build and draw view for framework with theme (if applicable)
	if (!empty($content)) { 
	//get chosen theme
	View::selected_theme();
	
	//get default view for user select route - eg: content/image/gallery using $group
	$group_view = VIEW_DIR.$group.FRAME_EXTENSION;
	//load required view
	require_once $group_view;
	
	//define class name for required group viewer
	$group_class = ucfirst($group).VIEWER_CLASS_NAME;

	//check group class exists and instantiate object
	if (class_exists($group_class)) {
	$group_object = new $group_class();
	//group attributes array for use with group content html output
	$group_attributes = array("id"=>$params["id"],"class"=>$group);
	//taxonomy attributes array eg: title, desc
	$taxonomy_attributes = array("title"=>$taxonomy_title,"desc"=>$taxonomy_desc);
	//get formatted content with required viewer plugin (image/text etc)
	$group_content = $group_object->get_group_content($content, $group_attributes, $taxonomy_attributes);
	}
	else {
	//trigger debug error - for testing at the moment...
	return trigger_error("Debug: Viewer Class not found - <b>".$group."</b>");
	}
	
	//check available plugins for format
 	$plugin_controller = CONTROLLER_DIR.'plugin'.FRAME_EXTENSION;
 	//load required plugin file
 	require_once $plugin_controller;
 	
 	//define controller plugin class
 	$plugin_class = 'Plugin'.CONTROLLER_CLASS_NAME;
 	
 	//check plugin class and instantiate object
 	if (class_exists($plugin_class)) {
	$plugin_object = new $plugin_class();
	$plugin_check = $plugin_object->get_group_plugins($group);
	self::load_plugins($plugin_check);
	}
	else {
	//trigger debug error - for testing at the moment...
	return trigger_error("Debug: Plugin Class not found - <b>".$controller.', '.$format."</b>");
	}
	//draw theme for plugin, metadata, and content
	self::draw_theme($group_content, self::$content_meta, self::$plugins);
	}
	else {
	//get chosen theme
	View::selected_theme();
	$content = 'No content found.';
	self::$content_meta = null;
	self::$plugins = null;
	self::draw_theme($content, self::$content_meta, self::$plugins);
	}
  	}
	//check content format and params for controller - single content returned eg: image, text...
	else if ($controller !=null && $format != null && $params != null) {
	//get content for specified route
	$content = $controller_object->get_content_field($controller, $format, $params);
	//get content title for specified route
	$format_name = "name";
	$content_title = $controller_object->get_content_field($controller, $format_name, $params);
	//add title meta to content meta array
	self::$content_meta['title'] = $content_title;
	//get content desc for specified route
	$format_desc = "desc";
	$content_desc = $controller_object->get_content_field($controller, $format_desc, $params);
	//add desc meta to content meta array
	self::$content_meta['description'] = $content_desc;

	//build and draw view for framework with selected plugin and theme (if applicable)
	if (!empty($content)) { 
	//get meta for content
	self::load_meta($controller, $format, $params);
	//get chosen theme
	View::selected_theme();
	
	//get default view for user select route - eg: content/image using $format
	$format_view = VIEW_DIR.$format.FRAME_EXTENSION;
	//load required view
	require_once $format_view;
	
	//define class name for required viewer
	$viewer_class = ucfirst($format).VIEWER_CLASS_NAME;

	//check viewer class exists and instantiate object
	if (class_exists($viewer_class)) {
	$viewer_object = new $viewer_class();
	//viewer attributes array for use with viewer content html output
	$viewer_attributes = array("id"=>$params["id"],"class"=>$format);
	//format attributes array for the $format itself - eg: title, desc
	$format_attributes = array("title"=>$content_title.' - '.$content_desc,"desc"=>$content_desc);
	//get formatted content with required viewer plugin (image/text etc)
	$viewer_content = $viewer_object->get_viewer_content($content, $viewer_attributes, $format_attributes);
	}
	else {
	//trigger debug error - for testing at the moment...
	return trigger_error("Debug: Viewer Class not found - <b>".$format."</b>");
	}
 	
 	//check available plugins for format
 	$plugin_controller = CONTROLLER_DIR.'plugin'.FRAME_EXTENSION;
 	//load required plugin file
 	require_once $plugin_controller;
 	
 	//define controller plugin class
 	$plugin_class = 'Plugin'.CONTROLLER_CLASS_NAME;
 	
 	//check plugin class and instantiate object
 	if (class_exists($plugin_class)) {
	$plugin_object = new $plugin_class();
	$plugin_check = $plugin_object->get_plugins($controller, $format);
	self::load_plugins($plugin_check);
	}
	else {
	//trigger debug error - for testing at the moment...
	return trigger_error("Debug: Plugin Class not found - <b>".$controller.', '.$format."</b>");
	}
	//draw theme for plugin, metadata, and content
	self::draw_theme($viewer_content, self::$content_meta, self::$plugins);
	}
	else {
	//get chosen theme
	View::selected_theme();
	$content = 'No content found.';
	self::$content_meta = null;
	self::$plugins = null;
	self::draw_theme($content, self::$content_meta, self::$plugins);
	}
	}
	}
	//else handle default home route request
	else {
	View::selected_theme();
	//temporary handler for home page...
	$content = "<h3>Welcome to the 402 framework</h3>";
	self::$content_meta = null;
	self::$plugins = null;
	self::draw_theme($content, self::$content_meta, self::$plugins);
	}

}

function load_meta($controller, $format, $params) {
	$metadata_controller_file = CONTROLLER_DIR.'metadata'.FRAME_EXTENSION;
	//load the metadata class
	require_once $metadata_controller_file;
	
	//define class name for required controller
 	$meta_class = 'Metadata'.CONTROLLER_CLASS_NAME;
 
 	//check class exists and instantiate object
 	if (class_exists($meta_class)) {
 	$meta_object = new $meta_class();
 	}
 	else {
 	//trigger debug error - for testing at the moment...
 	return trigger_error("Debug: Metadata Class not found");
 	}
 	
 	$metadata = $meta_object->get_meta_row($controller, $format, $params);
 	if (!empty($metadata)) {
 	self::$content_meta = array_merge(self::$content_meta, $metadata);
 	}
}

/**
 * load the chosen plugins for the framework
 */
function load_plugins($plugin_check) {
	//set plugin controller
 	$plugin_controller = CONTROLLER_DIR.'plugin'.FRAME_EXTENSION;
 	//load required plugin file
 	require_once $plugin_controller;
 	//define controller plugin class
 	$plugin_class = 'Plugin'.CONTROLLER_CLASS_NAME;
 	//check plugin class and instantiate object
 	if (class_exists($plugin_class)) {
	$plugin_object = new $plugin_class();
	//loop over return results for plugin lookup
	foreach($plugin_check as $key=>$val) {
	//get each plugin_id from $plugin_check
	$plugin_id = $val['plugin_id'];
	//get all plugin details
	$plugin_details = $plugin_object->get_plugin($plugin_id);
	//push returned plugin details to 
	array_push(self::$plugins, $plugin_details);
	}
	}
	else {
	//trigger debug error - for testing at the moment...
	return trigger_error("Debug: Plugin Class not found - <b>".$controller.', '.$format."</b>");
	}
}

/**
 * load the chosen viewer theme for the framework
 */
function init_theme($theme) {
	$view_file = LIBRARY_DIR."view".FRAME_EXTENSION;
	//load the view class
	require_once $view_file;
	
	//check if requested theme is available - or load default theme
	if (is_dir(THEMES_DIR.$theme."/")) {
		$user_theme = $theme;
		View::set_theme($user_theme);
	}
	else {
		$default_theme = self::$default_theme;
		View::set_theme($default_theme);
	}
}

/**
 *draw the chosen viewer theme and output content for the framework
 */
function draw_theme($content, $content_meta, $plugins) {
	//set required default css and js files for framework
	$css = array(FRAME_CSS, GRID_CSS, JQUERY_UI_CSS);
	$js = array(JQUERY_JS, JQUERY_UI_JS, FRAME_JS);
	//draw the template and theme
	View::draw_head($css, $js);
	View::draw_top();
	View::draw_header();
	View::draw_middle($content, $content_meta, $plugins);
	View::draw_footer();
	View::draw_bottom();
}


}
?>