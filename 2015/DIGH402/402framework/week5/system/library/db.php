<?php
/**
 * db.php - db connection and various functions for 402 framework
 */


/**
 * class for db connection and management using PDO
 */ 
class DB {

	static protected $db;
	static protected $selected_database = "dev";
	static protected $fetch_mode = PDO::FETCH_ASSOC;
	static protected $statement;
	static protected $link;
	static protected $config_dir = CONFIG_DIR;
	static protected $config_file = "config_db.php";
		
	//set default connection type (development or production)
 	const DEFAULT_CONNECT_NAME = "dev";

/**
 * initialise database settings and connect to framework database
 */ 	
static function init($name = self::DEFAULT_CONNECT_NAME) {
 	
	if( !self::$db ){
	//load the required variables and settings for the db
    require_once self::$config_dir . self::$config_file;
    self::$db = $db;
    }
 	
 	//set db account info
    $hostname = self::$db[$name]['hostname'];
    $database = self::$db[$name]['database'];
    $username = self::$db[$name]['username'];
    $password = self::$db[$name]['password'];
    $pdo_options = array();
    
    $string = "mysql:host=$hostname;dbname=$database";
    $pdo_options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    
    //connect to the specified db using the setup function
    self::setup($string, $username, $password, $name, $pdo_options);
}
 	
/**
 * connect to the specified database
 */
static function setup($string, $username, $password, $name = self::DEFAULT_CONNECTION_NAME, $pdo_options = array()){

try{
	self::$link = new PDO($string, $username, $password, $pdo_options);
	self::$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    self::$db[$name]['link'] = self::$link;
    //test the connection and debug 'well done'
    echo 'DB connected. Well done!';
	} 
catch (PDOException $exception) {
	die( "Error!: " . $exception->getMessage() . "<br/>" );
	}

}

/**
 * query the database
 */
static function query($query=null,$field=array()){
	try{
		//use $link connection from setup
		self::$statement = self::$link->prepare($query);
		self::$statement->execute($field);
		return self::$statement;
		} catch (PDOException $exception){
		error_reporting("Error!: ".$exception->getMessage()."<br/>", E_USER_ERROR);
	}
}

/**
 * get a single specified row for the given query
 */		
static function get_row($query=null,$field=array()){
	return self::query($query,$field)->fetch(self::$fetch_mode );
}


}
 
?>