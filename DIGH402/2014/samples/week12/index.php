<?php
//require the file
require 'employee.class.php';
require 'player.class.php';

//instantiate object of employee class (NB: extends User class)
$employee = new Employee("ancientlives");
//instantiate object of employee class (NB: extends User class)
$player = new Player("ancientlives");

//get name
$player_name = $player->get_name();
//set age
$player_age = $player->set_age("old enough, just, to hit a ball!");
//get age
$player_age = $player->get_age();
//set player height
$player_height = $player->set_height("tallish");
//get player height
$player_height = $player->get_height();
//set player position
$player_position = $player->set_position("the one who throws the ball");
//get player position
$player_position = $player->get_position();
//set player stat
$player_stat = $player->set_stat("strikes", "152");
//get player stat
$player_stat = $player->get_stat();

//output name
echo '<p>new player = '.$player_name.'</p>';
//output age
echo '<p>player age = '.$player_age.'</p>';
//output height
echo '<p>player height = '.$player_height.'</p>';
//output position
echo '<p>player position = '.$player_position.'</p>';
//output stat
echo '<p>'.$player_stat.'</p>';


?>