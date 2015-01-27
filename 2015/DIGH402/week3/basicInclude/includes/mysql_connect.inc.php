<?php
/*connect to mysql DB, submit query, return results*/
function basicQuery($query) {
$con = mysqli_connect('localhost', '402user', 'celine59', '402framework');
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
$result = mysqli_query($con,$query);
mysqli_close($con);
return $result;
}
?>