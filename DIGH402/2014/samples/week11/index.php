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
//set age
$employee_age = $employee->set_age("old enough, thank you!");
//get age
$employee_age = $employee->get_age();
//set job title
$employee_jobtitle = $employee->set_jobtitle("director");
//get job title
$employee_jobtitle = $employee->get_jobtitle();

//output name
echo '<p>new employee = '.$employee_name.'</p>';
//output gender
echo '<p>employee gender = '.$employee_gender.'</p>';
//output age
echo '<p>employee age = '.$employee_age.'</p>';
//output job title
echo '<p>employee job title = '.$employee_jobtitle.'</p>';


?>