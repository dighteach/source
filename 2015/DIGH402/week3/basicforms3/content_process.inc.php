<?php

/*connect to mysql DB, submit query, return results*/
function basicQuery($query) {
$con = mysqli_connect('localhost', 'user', 'pass', 'db');
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
$result = mysqli_query($con,$query);
mysqli_close($con);
return $result;
}

/*format results from mysql DB and output*/
function outputFormat(array $headers, array $cells, $result, $content_name, $link, $link_end) {
echo '<h3>'.ucfirst($content_name).' Content</h3>';
echo '<table>';
foreach ($headers as $val) {
echo '<th>'.$val.'</th>';
}
while($row = mysqli_fetch_array($result))
  {
  echo '<tr>';
  foreach ($cells as $val) {
  echo '<td>'.$row[$val].'</td>';
  }
  if (!empty($link) && !empty($link_end)) {
  $link_id = $row[0];
  echo '<td>'.$link.$link_id.$link_end.'</td>';
  }
  echo '</tr>';
  }
  echo '</table>';
}


if (isset($_POST['content_chooser'])) {
$content_name = 'all';
$headers = array('user id', 'username', 'firstname', 'lastname', 'usercreated', 'link');
$cells = array('userid', 'username', 'firstname', 'lastname', 'usercreated');
$query = 'SELECT * FROM users';
$result = basicQuery($query);
$link = '<a href="content_process.inc.php?userid=';
$link_end = '">View user content</a>';
outputFormat($headers, $cells, $result, $content_name, $link, $link_end);
}

if (isset($_GET['userid'])) {
$content_option = $_GET['userid'];
$base_query = 'SELECT content.contentid, content.contentname, users.username FROM content_lookup, content, users WHERE content_lookup.content_id=content.contentid AND users.userid=content_lookup.user_id AND content_lookup.user_id=';
$headers = array('content id','content name','username');
$cells = array('contentid', 'contentname', 'username');
$content_name = 'user';
$query = $base_query.$content_option;
$result = basicQuery($query);
$link = '<a href="content_viewer.inc.php?contentid=';
$link_end = '">View content</a>';
outputFormat($headers, $cells, $result, $content_name, $link, $link_end);
}

?>
