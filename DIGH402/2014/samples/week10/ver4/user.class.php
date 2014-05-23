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
	private $gender;
	
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
	
	//set gender
	function set_gender($newgender) {
		$this->gender = $newgender;
	}
	
	//get gender
	function get_gender() {
		return $this->gender;
	}

}
?>