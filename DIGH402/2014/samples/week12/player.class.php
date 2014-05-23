<?php
/**
 * player.class.php - set and format various outputs for a player
 */
 
//require parent user class
require_once("user.class.php");
 
/*
 * employee class
 */ 
class Player extends User 
{
	//properties for class
	protected $playername;
	protected $playerposition;
	protected $playerstat;
	protected $playerstatval;
	
	//constructor
	function __construct($playername) {
		$this->set_name($playername);
	}
	
	//setter for new player position
	function set_position($newposition) {
		$this->playerposition = $newposition;
	}
	
	//getter for player position
	function get_position() {
		return $this->playerposition;
	}
	
	//setter for new player stat
	function set_stat($stat, $statval) {
		$this->playerstat = $stat;
		$this->playerstatval = $statval;
	}
	
	//getter for player position
	function get_stat() {
		$playerstats = $this->playerstat.' = '.$this->playerstatval;
		return $playerstats;
	}

}
?>