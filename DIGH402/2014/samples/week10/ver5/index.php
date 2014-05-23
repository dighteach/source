<?php
//require the file
require 'employee.class.php';

//instantiate object of employee class (NB: extends User class)
$employee = new Employee("ancientlives");

//get name
$employee_name = $employee->get_name();
//set gender
$employee_gender = $employee->set_gender("male");
//get gender
$employee_gender = $employee->get_gender();

//output name
echo '<p>new employee = '.$employee_name.'</p>';
//output gender
echo '<p>gender = '.$employee_gender.'</p>';

?>