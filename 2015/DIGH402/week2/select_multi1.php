<?php
//currently set to basic query against content_lookup, content, and users
$con = mysqli_connect('localhost', 'user', 'pw', 'db');
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

$result = mysqli_query($con,"SELECT content.contentid, content.contentname, users.username FROM content_lookup, content, users WHERE content_lookup.content_id=content.contentid AND users.userid=content_lookup.user_id AND content_lookup.user_id=1");

echo '<ul>';

while($row = mysqli_fetch_array($result))
  {
  echo '<li>contentid = '.$row['contentid'].' & contentname = '.$row['contentname'].' & username = '.$row['username'].'</li>';
  }
  
echo '</ul>';

mysqli_close($con);
?>