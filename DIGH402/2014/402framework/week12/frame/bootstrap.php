<?php
/**
 * bootstrap.php - initialisation file for 402 framework
 */

//require framework loader
require_once LIBRARY_DIR."loader.php";

$loader = new Loader();
//load any required generic settings for 402 framework
$loader->init_settings();
//load the db connection
$loader->init_db();
//load the framework theme - parameter for optional theme
$loader->init_theme('minimal');

//auto load controller
$loader->auto_load_controller();

?>