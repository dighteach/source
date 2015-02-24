<?php
/**
 * router.php - router for 402 framework
 */

/**
 * set the route within the framework based upon user input - everything needed to get and set route within framework & return to loader
 */
class Router {
	
	//default route
	private static $route;
	//controller directory
	private static $controller_dir;
	//controller
	private static $controller;
	//action
	private static $format;
	//parameters
	private static $params = array();
					

function __construct () {
	if (!self::$route) {
		//return values set in init() for use in loader class via this class' methods
		return $this->init();
	}
}

/**
 * return the selected user's route
 */
 function get_route() {
 	return self::$route;
 }
 
/**
 * return the controller directory
 */
 function get_controller_dir() {
 	return self::$controller_dir;
 }
 
/**
 * return the required controller
 */
 function get_controller() {
 	return self::$controller;
 }
 
/**
 * return the required format
 */
 function get_format() {
 	return self::$format;
 }
 
/**
 * return any required parameters eg: id
 */
 function get_params() {
 	return self::$params;
 }

private function init() {

	//get user requested route
	if (isset($_GET['node'])) {
	//define route without parameters (helps with showing base URI request)
	$route = $_GET['node'];
	self::$route = $route;
	
	//break requested route into chunks in array
	$route_chunks = explode("/", $route);
	
	//define controller
	$controller = $route_chunks[0];
	self::$controller = $controller;
	
	//define controller directory
	$controller_dir = CONTROLLER_DIR.$controller;
	self::$controller_dir = $controller_dir;
	
	//define format
	if (!empty($route_chunks[1])) {
	$format = $route_chunks[1];
	self::$format = $format;
	}
	
	//define parameters - get full url etc and extract all strings after &..
	global $settings;
	$request_uri = $settings['request_uri'];
	//break requested route into chunks in array
	$route_params = explode("&", $request_uri);
	//remove first value from array & return $route_params as just parameters
	$params_shift = array_shift($route_params);
	//update $params array
	foreach ($route_params as $val) {
	$param_chunks = explode("=", $val);
	$params[$param_chunks[0]] = $param_chunks[1];
	}
	self::$params = $params;
	}	 
}

} 
?>