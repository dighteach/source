<?php
/**
 * directory.php - set constants for directories for 402 framework
 */

//base framework directory - get current working directory
$base_dir = getcwd()."/";
chdir($base_dir);
set_include_path($base_dir);

//set base folder for framework
define("BASE_DIR", $base_dir);
define("BASE_NAME", basename($base_dir));

//set base folders for framework
define("CONFIG_DIR", "config/");
define("DESIGN_DIR", "design/");
define("FRAMEWORK_DIR", "frame/");
define("MEDIA_DIR", "media/");
define("PLUGINS_DIR", "plugins/");
define("SYSTEM_DIR", "system/");

//set framework system folders
define("LIBRARY_DIR", "system/library/");
define("CONSTANTS_DIR", "system/constants/");

//set framework design folders
define("JAVASCRIPT_DIR", "design/js/");
define("CSS_DIR", "design/css/");
define("DESIGN_IMAGES_DIR", "design/images/");
define("THEMES_DIR", "design/themes/");
define("THEME_DEFAULT", "design/themes/default/");

//set framework media folders
define("MEDIA_IMAGES_DIR", "media/images/");
define("MEDIA_TEXTS_DIR", "media/texts/");

//set framework plugins folders
define("PLUGINS_ADMIN_DIR", "plugins/admin/");

//set framework MVC folders
define("MODEL_DIR", "frame/model/");
define("VIEW_DIR", "frame/view/");
define("CONTROLLER_DIR", "frame/controller/");

?>