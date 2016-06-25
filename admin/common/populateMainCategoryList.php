<?php
require_once "../../library/config.php";
require_once "../../library/functions.php";

$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select DISTINCT maincat_name as MAINCATEGORY, maincat_id FROM 
	hardware_shopee.tbl_main_category where maincat_name LIKE '$q%'";

$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
	$mcname = $rs['MAINCATEGORY'];
        $mcid = $rs['maincat_id'];
	echo "$mcname|$mcid\n";
}
?>