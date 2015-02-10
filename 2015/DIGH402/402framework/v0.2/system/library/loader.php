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
 if ($format != null && $params != null) {
  	$content = $controller_object->get_content($format, $params);
  	if (!empty($content)) { 
  	echo '<p>'.$content.'</p>';
  	}
  	else {
  	return trigger_error('No content found - ');
  	}
    }
	}
	//else handle default home route request
	else {
	//test default output for home page...
	echo '<h3>We need to load the home page!</h3>';
	}

}


}
?>