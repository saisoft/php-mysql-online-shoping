<?php

$sql = "SELECT tbl_category.cat_id AS CATAGORYID, cat_name AS CATAGORY, COUNT(tbl_product.cat_id) AS PRODUCTCOUNT FROM
tbl_category, tbl_product
WHERE tbl_category.cat_id = tbl_product.cat_id
GROUP BY (tbl_product.cat_id);";

$result = dbQuery($sql);
$cssrow = 0;
while($row = mysql_fetch_array($result))
  {
  $cssrow++;
  echo "<div class='link".($cssrow & 1)."'> &nbsp;";
  echo "<div style='position:relative; top:-5px; left:20px'>";
  echo '<a href=\'JavaScript:invokeAjax("main/productlistview.php?cat_id='.$row['CATAGORYID'].'","","#dynamicDiv");\'>';
  echo "<img height='12px' width='12px' src='img/list-icon-play.gif' />";
  echo "<font size='2' style='font-weight:bold' face='Tahoma, Verdana, Arial, Trebuchet MS' color='#333333'> ".$row['CATAGORY']."";
  echo "(" . $row['PRODUCTCOUNT'] . ")";
  echo "</font>";
  echo "</a>";
  echo "</div>";
  echo "</div>";
  }
?>