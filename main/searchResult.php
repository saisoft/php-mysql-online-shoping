<script type="text/javascript">
    $(function(){
        var offsetX = 20;
        var offsetY = 10;
        $('a.hover').hover(function(e){
            var href = $(this).attr('href');
            $('<img id="largeImage" src="' + href + '" alt="image" />')
            .css({'top':e.pageY + offsetY,'left':e.pageX + offsetX})
            .appendTo('body');
        }, function(){
            $('#largeImage').remove();
        });
        $('a.hover').mousemove(function(e){
            $('#largeImage').css({'top':e.pageY + offsetY,'left':e.pageX + offsetX});
        });
        $('a.hover').click(function(e){
            e.preventDefault();
        });
    });
</script>

<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../library/config.php';

$catogaryid = $_POST["searchName"];

$result = dbQuery("SELECT pd_id AS PRODUCTID, pd_name AS PRODUCTNAME,  pd_description AS PRODUCTDESC,
pd_price AS PRODUCTPRICE, pd_qty AS PRODUCTQTY, pd_image AS PRODUCTIMAGE, pd_thumbnail AS PRODUCTTHUMBNAIL,
pd_views AS PRODUCTVIEWS FROM tbl_product
WHERE
cat_id IN (SELECT cat_id FROM tbl_category WHERE cat_name LIKE ('%$catogaryid%'));
");
if (dbNumRows($result) == 0) {
    echo "<b>No required result found Kindly contact us on - 020</b>";
} else {
    while ($row = mysql_fetch_array($result)) {
        $productDesc = $row['PRODUCTDESC'];
        $productDescDisplay = substr($productDesc, 0, 40) . "...";
        echo "<div class='product'>";
        echo "<div class='productThumbnail'><a href='img/" . $row['PRODUCTIMAGE'] . "' class='hover'><img height='70' border='0' width='70' alt='" . $row['PRODUCTNAME'] . "' src='img/" . $row['PRODUCTIMAGE'] . "'/></a></div>";
        echo "<div class='details'>";
        echo '<div class="productName"><a href=\'JavaScript:invokeAjax("main/productview.php?hotdeal=0&prodkey=' . $row['PRODUCTID'] . '","","#dynamicDiv");\'>' . $row['PRODUCTNAME'] . '</a></div>';
        echo "<div class='productDesc'>" . $productDescDisplay . "</div>";
        echo "<div class='productPrice'>Price : " . $row['PRODUCTPRICE'] . "</div>";
        echo "</div>";
        echo "<div class='views'>Views<br />&nbsp;&nbsp;&nbsp;" . $row['PRODUCTVIEWS'] . "</div>";
        echo "</div>";
    }
}
?>
