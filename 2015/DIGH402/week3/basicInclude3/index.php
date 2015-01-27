<?php
include('root.inc.php');
include($root_includes.'default_includes.inc.php');
include($root_template.'header.inc.php');
?>

<body>
<?php
echo '<div id="menu_options">
<h3>Menu</h3>
<p>
<ul>
<li><a href="'.$root_base.'results.php?req=all_content" title="Show all current content">Output all content</a></li>
<li><a href="'.$root_base.'results.php?req=all_users" title="Show all current users">Output all users</a></li>
<li><a href="'.$root_base.'results.php?req=all_images" title="Show all current images">Output all images</a></li>
</ul>
</p>
</div>';
?>

</body>
</html>