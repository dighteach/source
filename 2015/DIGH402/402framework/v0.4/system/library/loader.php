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

function auto_load_controller () {
	require_once LIBRARY_DIR."router.php";
	
	$router = new Router;
	$controller = $router->get_controller();
	$controller_dir = $router->get_controller_dir();
	$format = $router->get_format();
	$params = $router->get_params();
	
	$this->load_controller($controller, $controller_dir, $format, $params);
	
	}

/**
 * load content selected by URI, and save output to default content area
 */
 function load_controller ($controller = null, $controller_dir = null, $format = null, $params = null) {
 
 //determine required controller and load class
 if ($controller != null) {
 $controller_file = $controller_dir.FRAME_EXTENSION;
 //load required controller
 require_once $controller_file;
 
 //define class name for required controller
 $class = ucfirst($controller).CONTROLLER_CLASS_NAME;
 
 //check class exists and instantiate object
 if (class_exists($class)) {
 $controller_object = new $class();
 }
 else {
 //trigger debug error - for testing at the moment...
 return trigger_error("Debug: Controller Class not found - <b>".$controller."</b>");
 }
  
 //check content format and params for controller
 if ($format != null && $params != null && $controller !=null) {
 	//get content for specified route
  	$content = $controller_object->get_content_field($controller, $format, $params);
  	//get content title for specified route
  	$format = "name";
  	$content_title = $controller_object->get_content_field($controller, $format, $params);
  	//add title meta to content meta array
  	self::$content_meta['title'] = $content_title;
  	//get content desc for specified route
  	$format = "desc";
  	$content_desc = $controller_object->get_content_field($controller, $format, $params);
  	//add desc meta to content meta array
  	self::$content_meta['description'] = $content_desc;
  	
  	//get full metadata for specified route


  	//build and draw view for framework with selected theme
  	if (!empty($content)) { 
  	//get meta for content
  	self::load_meta($controller, $params);
  	//get chosen theme
  	View::selected_theme();
  	self::draw_theme($content, self::$content_meta);
  	}
  	else {
  	//get chosen theme
  	View::selected_theme();
  	$content = 'No content found.';
  	self::$content_meta = null;
  	self::draw_theme($content, self::$content_meta);
  	}
    }
	}
	//else handle default home route request
	else {
	View::selected_theme();
	//temporary handler for home page...
	$content = "<h3>Welcome to the 402 framework</h3>";
	self::$content_meta = null;
  	self::draw_theme($content, self::$content_meta);
	}

}

function load_meta($controller, $params) {
	$metadata_controller_file = CONTROLLER_DIR.'metadata'.FRAME_EXTENSION;
	//load the metadata class
	require_once $metadata_controller_file;
	
	//define class name for required controller
 	$class = 'Metadata'.CONTROLLER_CLASS_NAME;
 
 	//check class exists and instantiate object
 	if (class_exists($class)) {
 	$meta_object = new $class();
 	}
 	else {
 	//trigger debug error - for testing at the moment...
 	return trigger_error("Debug: Controller Class not found - <b>".$controller."</b>");
 	}
 	
 	$metadata = $meta_object->get_meta_row($controller, $params);
 	if (!empty($metadata)) {
 	self::$content_meta = array_merge(self::$content_meta, $metadata);
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
function draw_theme($content, $content_meta) {
	//set required default css and js files for framework
	$css = array(FRAME_CSS, GRID_CSS);
	$js = array(FRAME_JS, JQUERY_JS);
	//draw the template and theme
	View::draw_head($css, $js);
	View::draw_top();
	View::draw_header();
	View::draw_middle($content, $content_meta);
	View::draw_footer();
	View::draw_bottom();
}


}
?>