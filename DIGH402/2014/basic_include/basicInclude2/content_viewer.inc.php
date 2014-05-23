<?php
include('includes/mysql_connect.inc.php');
include('includes/content_processor.inc.php');

if (isset($_GET['contentid'])) {
$content_id = $_GET['contentid'];
$query = 'select content.contentname, content.contentdesc, content.contenttext, content.contentcreated, content_lookup.content_type_id, content_lookup.user_id from content_lookup, content where content_lookup.content_id=content.contentid and content_lookup.content_id='.$content_id.'';
$result = basicQuery($query);
$cells = array('contentname', 'contentdesc', 'contenttext', 'contentcreated', 'content_type_id', 'user_id');
contentViewer($cells, $result);
}
else {
exit('No content requested. Please return to <a href="./">home menu</a>');
}
?>