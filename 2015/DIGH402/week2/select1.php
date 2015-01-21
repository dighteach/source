<?php
$con = mysqli_connect('localhost', 'user', 'pw', 'db');
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

$result = mysqli_query($con,"SELECT * FROM users");

while($row = mysqli_fetch_array($result))
  {
  echo 'user = '.$row['username'] . " & created = " . $row['usercreated'];
  echo "<br>";
  }

mysqli_close($con);
?>