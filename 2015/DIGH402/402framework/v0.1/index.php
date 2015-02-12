<?php
/**
 * index.php - index page for the 402 framework v0.1
 */

//load the directory constants for the framework
require_once "config/directory.php";

//load the bootstrap for the framework
require_once "frame/bootstrap.php";

//test global settings 
echo '<h3>'.$settings['project_title'].'</h3>';

//test query the database and return single row result
$field = array("1");
$db_results = DB::get_row("select * from users where userid=?", $field);
print_r($db_results);

?>
