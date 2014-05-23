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

	//setter for name
	function set_name($newname) {
		$this->name = $newname;
	}
	
	//getter for name
	function get_name() {
		return $this->name;
	}

}
?>