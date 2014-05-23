<?php
/**
 * user.class.php - set and format various outputs for a user
 */
 
/*
 * user class
 */ 
class User 
{
	//properties for class
	public $name;
	
	//constructor
	function __construct($fullname) {
		$this->name = $fullname;
	}
	
	//set name
	function set_name($newname) {
		$this->name = $newname;
	}
	
	//get name
	function get_name() {
		return $this->name;
	}

}
?>