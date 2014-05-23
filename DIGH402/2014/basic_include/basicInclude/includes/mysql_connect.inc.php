<?php
/*connect to mysql DB, submit query, return results*/
function basicQuery($query) {
$con = mysqli_connect('localhost', 'DBuser', 'DBpass', 'DB');
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
$result = mysqli_query($con,$query);
mysqli_close($con);
return $result;
}
?>
