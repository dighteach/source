<?php
include('root.inc.php');
include($root_includes.'default_includes.inc.php');
include($root_template.'header.inc.php');
?>

<body>
<?php
include($root_base.'results_format.inc.php');

if (isset($_GET['userid'])) {
$user_id = $_GET['userid'];
$query = 'SELECT * FROM '.DB_USERS.' WHERE userid='.$user_id.'';
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
$query = 'select '.DB_CONTENT.'.contentid, '.DB_CONTENT.'.contentname, '.DB_CONTENT.'.contentdesc, '.DB_CONTENT.'.contenttext, '.DB_CONTENT.'.contentcreated from '.DB_CONTENT.', '.DB_CONTENT_LOOKUP.' where '.DB_CONTENT_LOOKUP.'.content_id='.DB_CONTENT.'.contentid and '.DB_CONTENT_LOOKUP.'.user_id='.$user_id.'';
$result = basicQuery($query);
$link = '<a href="'.$root_content.'content_viewer.inc.php?contentid=';
$link_end = '">View content</a>';
outputTable($headers, $cells, $result, $link, $link_end);
}
else {
exit('No user requested. Please return to <a href="../../">home menu</a>');
}
?>