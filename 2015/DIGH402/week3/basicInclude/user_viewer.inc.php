<?php
include('includes/mysql_connect.inc.php');
include('includes/results_format.inc.php');

if (isset($_GET['userid'])) {
$user_id = $_GET['userid'];
$query = 'SELECT * FROM users WHERE userid='.$user_id.'';
$result = basicQuery($query);
$cells = array('userid', 'username', 'firstname', 'lastname', 'usercreated');
$list_style = 'ol';
$link = '<a href="user_viewer.inc.php?usercontent=';
$link_end = '">View User Content</a>';
outputList($cells, $result, $list_style, $link, $link_end);
}
else if (isset($_GET['usercontent'])) {
$user_id = $_GET['usercontent'];
$headers = array('content id', 'content name', 'description', 'content', 'created', 'link');
$cells = array('contentid', 'contentname', 'contentdesc', 'contenttext', 'contentcreated');
$query = 'select content.contentid, content.contentname, content.contentdesc, content.contenttext, content.contentcreated from content_lookup, content where content_lookup.content_id=content.contentid and content_lookup.user_id='.$user_id.'';
$result = basicQuery($query);
$link = '<a href="content_viewer.inc.php?contentid=';
$link_end = '">View content</a>';
outputTable($headers, $cells, $result, $link, $link_end);
}
?>