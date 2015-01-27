<?php
/*format results from mysql DB and output as TABLE*/
function outputTable(array $headers, array $cells, $result, $link, $link_end) {
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

function outputList($cells, $result, $list_style, $link, $link_end) {
echo '<'.$list_style.'>';
while($row = mysqli_fetch_array($result))
  {
  foreach ($cells as $val) {
  echo '<li>'.$row[$val].'</li>';
  }
  if (!empty($link) && !empty($link_end)) {
  $link_id = $row[0];
  echo '<li>'.$link.$link_id.$link_end.'</li>';
  }
  }
echo '</'.$list_style.'>';
}
?>