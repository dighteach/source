<?php
//require the file
require 'user.class.php';

//instantiate object of User class
$user = new User("ancientlives");

//get and output name
echo '<p>name = '.$user->get_name().'</p>';
//output gender (NB: error output)
echo '<p>gender = '.$user->gender.'</p>';

?>