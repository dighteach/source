<?php
//require the file
require 'user.class.php';

//instantiate object of User class
$user = new User("ancientlives");

//get and output name
echo '<p>name = '.$user->get_name().'</p>';
//set gender
$user->set_gender("male");
//get and output gender
echo '<p>gender = '.$user->get_gender().'</p>';

?>