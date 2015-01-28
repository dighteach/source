<?php
/*connect to mysql DB, submit query, return results*/
function basicQuery($query) {
$con = mysqli_connect('localhost', 'user', 'pass', 'db');
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
$result = mysqli_query($con,$query);
mysqli_close($con);
//check if there are any rows available in the returned dataset
if ($result->num_rows == 0) {
return exit('<p>No records have been found. Please return to the <a href="'.$_SERVER['HTTP_REFERER'].'">previous page</a> / <a href="./">home menu</a>.</p>');
}
else {
return $result;
}
}
?>
