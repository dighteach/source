<?php
/*basic content viewer*/
function contentViewer(array $cells, $result) {
echo '<ul>';
while($row = mysqli_fetch_array($result))
  {
  foreach ($cells as $val) {
  echo '<li>'.$row[$val].'</li>';
  }
  }
  echo '</ul>';
}

?>