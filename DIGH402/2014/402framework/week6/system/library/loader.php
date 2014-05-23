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
//require controller for the framework
require_once LIBRARY_DIR."controller.php";

/**
 * load and initialise the framework Loader class
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



}

?>