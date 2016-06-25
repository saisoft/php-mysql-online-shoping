<link href="../css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../js/imgscroller.js"></script>
<script type="text/javascript" src="../js/commonfunctions.js"></script>



<?php
include_once '../library/config.php';
require_once '../library/functions.php';

$productkey = $_GET["prodkey"];
$hotdeal = $_GET["hotdeal"];

updateViewCount($productkey);

$result = dbQuery("SELECT pd_name AS PRODUCTNAME,  pd_description AS PRODUCTDESC,
pd_price AS PRODUCTPRICE, pd_qty AS PRODUCTQTY, pd_image AS PRODUCTIMAGE,
pd_views as PRODUCTVIEWS FROM tbl_product
WHERE
pd_id = '" . $productkey . "';");

while ($row = mysql_fetch_array($result)) {

    $productName = $row['PRODUCTNAME'];

    $productDesc = $row['PRODUCTDESC'];
    $productDescDisplay = str_replace("\n", "<br/>", $productDesc);

    echo "<div class='DetailProductView'>";
    echo "<div class='DetailProductName'><font size='5' face='Trebuchet MS, Arial, Verdana, Georgia' color='#cc0000'><strong><font face='Tahoma, Verdana, Arial, Trebuchet MS'>" . $productName . "</font></strong></font></div><br />";
    echo "<br />";
    if ($hotdeal == 0) {
        echo '<div class="DetailProductImage"><img width="250px" height="250px" src="img/' . $row['PRODUCTIMAGE'] . '" /></div>';
    }
    if ($hotdeal == 1) {
        echo '<div class="DetailProductImage"><img width="250px" height="250px" src="../img/' . $row['PRODUCTIMAGE'] . '" /></div>';
    }
    echo "<div class='DetailProductDesc'>";
    echo $productDescDisplay;
    echo "<br />";
    echo "<br />";
    echo "<div class='DetailProductPrice'>Price : " . $row['PRODUCTPRICE'] . "</div>";
    echo "<br />";
    echo "<div class='DetailProductViews'>Quantity : " . $row['PRODUCTQTY'] . "</div>";
    echo "<br />";
    echo "<div class='DetailProductViews'>Views : " . $row['PRODUCTVIEWS'] . "</div>";
    echo "<br />";
    echo "</div>";
    ?>

    <table cellspacing="0" cellpadding="3" border="0" width="100%">
        <tbody>
            <tr>
                <td colspan="2"><font size="3" face="Tahoma, Verdana, Arial, Trebuchet MS">Request
                    a Call for this Product</font></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><div id="frmEmailError" style="color: red;">&nbsp;</div></td>
            </tr>
            <tr>
                <td align="right">Name &nbsp;</td>
                <td><input type="text" size="40" id="customerName" class="form" name="Name" /></td>
            </tr>
            <tr>
                <td width="15%" align="right">Email
                    ID &nbsp;</td>
                <td width="85%"><input type="text" size="30" id="customerEmail" class="form" name="Email" /></td>
            </tr>
            <tr>
                <td align="right">Phone
                    No. &nbsp;</td>
                <td style="color: green;"><input type="text" size="20" class="form" id="customerPhone" name="Phone" /> Valid format 091-citycode-your number </td>
            </tr>
            <tr>
                <td align="right">Subject &nbsp;</td>
                <td><input type="text" size="60" value="<?php echo $productName ?>" id="mailSubject" class="form" name="Subject" /></td>
            </tr>
            <tr>
                <td valign="top" align="right">Query &nbsp;</td>
                <td><textarea id="customerComment" class="form" rows="10" cols="60" name="Comment"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="button" value="Submit" onclick="validateEmailForm();" class="form" name="submit" />
                </td>
            </tr>
        </tbody></table>
    <br />


    <?php
    echo "</div>";
}
?>

