<?php
//require the file
require 'user.class.php';

//instantiate object of User class
$user = new User();

//set name
$user->set_name("ancientlives");
//get name
$newname = $user->get_name();
//output name
echo 'new name = '.$newname;

?>