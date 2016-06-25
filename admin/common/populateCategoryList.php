<?php
require_once "../../library/config.php";
require_once "../../library/functions.php";

$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select DISTINCT cat_name as CATEGORY, cat_id FROM 
	hardware_shopee.tbl_category where cat_name LIKE '$q%'";

$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['CATEGORY'];
        $cid = $rs['cat_id'];
	echo "$cname|$cid\n";
}
?>