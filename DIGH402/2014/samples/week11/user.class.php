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
	protected $name;
	protected $gender;
	protected $age;
	
	
	//constructor
	function __construct($fullname) {
		$this->name = $fullname;
	}

	//setter for new name
	function set_name($newname) {
		$this->name = $newname;
	}
	
	//getter for name
	function get_name() {
		return $this->name;
	}
	
	//setter for new gender
	function set_gender($newgender) {
		$this->gender = $newgender;
	}
	
	//getter for gender
	function get_gender() {
		return $this->gender;
	}
	
	//setter for new age
	function set_age($newage) {
		$this->age = $newage;
	}
	
	//getter for age
	function get_age() {
		return $this->age;
	}
	
}
?>