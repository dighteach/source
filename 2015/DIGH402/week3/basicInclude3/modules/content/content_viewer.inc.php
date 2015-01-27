<?php
include('root.inc.php');
include($root_includes.'default_includes.inc.php');
include($root_template.'header.inc.php');
?>

<body>
<?php
include($root_content.'content_processor.inc.php');

if (isset($_GET['contentid'])) {
$content_id = $_GET['contentid'];
$query = 'select '.DB_CONTENT.'.contentname, '.DB_CONTENT.'.contentdesc, '.DB_CONTENT.'.contenttext, '.DB_CONTENT.'.contentcreated, '.DB_CONTENT_LOOKUP.'.content_type_id, '.DB_CONTENT_LOOKUP.'.user_id from '.DB_CONTENT.', '.DB_CONTENT_LOOKUP.' where '.DB_CONTENT_LOOKUP.'.content_id='.DB_CONTENT.'.contentid and '.DB_CONTENT_LOOKUP.'.content_id='.$content_id.'';
$result = basicQuery($query);
$cells = array('contentname', 'contentdesc', 'contenttext', 'contentcreated', 'content_type_id', 'user_id');
contentViewer($cells, $result);
}
else {
exit('No content requested. Please return to <a href="../../">home menu</a>');
}
?>