<?php
//require the file
require 'user.class.php';

//instantiate object of User class
$user = new User("ancientlives");
//get and output name
echo 'name = '.$user->get_name();

?>