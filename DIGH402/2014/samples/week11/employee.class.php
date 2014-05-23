<?php
/**
 * employee.class.php - set and format various outputs for a user
 */
 
//require parent user class
require_once("user.class.php");
 
/*
 * employee class
 */ 
class Employee extends User 
{
	//properties for class
	protected $jobtitle;
	
	//constructor
	function __construct($employeename) {
		$this->set_name($employeename);
	}
	
	//setter for new job title
	function set_jobtitle($newjobtitle) {
		$this->jobtitle = $newjobtitle;
	}
	
	//getter for job title
	function get_jobtitle() {
		return $this->jobtitle;
	}

}
?>