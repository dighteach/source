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
function outputFormat(array $headers, array $cells, $result, $content_name) {
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
  echo '</tr>';
  }
  echo '</table>';
}


if (isset($_POST['content_chooser'])) {
$content_option = $_POST['content_chooser'];

if ($content_option == 2) {
$content_name = 'image';
$headers = array('content type','content name','content');
$cells = array('content_type_name', 'contentname', 'contentimage');
$query = 'SELECT content_type.content_type_name, content.contentname, content.contentimage FROM content, content_type, content_lookup WHERE content_lookup.content_id=content.contentid AND content_lookup.content_type_id=content_type.content_type_id AND content_lookup.content_type_id='.$content_option.'';
$result = basicQuery($query);
outputFormat($headers, $cells, $result, $content_name);
}
else if ($content_option == 1) {
$content_name = 'text';
$headers = array('content type','content name','content');
$cells = array('content_type_name', 'contentname', 'contenttext');
$query = 'SELECT content_type.content_type_name, content.contentname, content.contenttext FROM content, content_type, content_lookup WHERE content_lookup.content_id=content.contentid AND content_lookup.content_type_id=content_type.content_type_id AND content_lookup.content_type_id='.$content_option.'';
$result = basicQuery($query);
outputFormat($headers, $cells, $result, $content_name);
}
else {
$content_name = 'all';
$headers = array('content id', 'content name', 'content description', 'content', 'content created');
$cells = array('contentid', 'contentname', 'contentdesc', 'contenttext', 'contentcreated');
$query = 'SELECT * FROM content';
$result = basicQuery($query);
outputFormat($headers, $cells, $result, $content_name);
}
}

?>
