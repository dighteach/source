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

	//setter for new name
	function set_name($newname) {
		$this->name = $newname;
	}
	
	//getter for name
	function get_name() {
		return $this->name;
	}
	
	//setter for gender
	function set_gender($newgender) {
		$this->gender = $newgender;
	}
	
	//getter for gender
	function get_gender() {
		return $this->gender;
	}

}
?>