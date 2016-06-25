<?php

// connect to the database

function addVisitCount() {
// get results from database
    $result = dbQuery("SELECT count_date, visit_count    FROM hardware_shopee.tbl_visitcount WHERE tbl_visitcount.count_date=CURDATE();")
            or die(mysql_error());

    $rowfound = dbNumRows($result);

    if ($rowfound >= 1) {
        $row = dbFetchAssoc($result);
        $visitcount = $row['visit_count'];

        $visitcount++;
        $sql = "UPDATE hardware_shopee.tbl_visitcount SET visit_count = '" . $visitcount . "' WHERE tbl_visitcount.count_date=CURDATE();";
        $result = dbQuery($sql)
                or die(mysql_error());
    }
    if ($rowfound == 0) {
        $result = dbQuery("INSERT INTO hardware_shopee.tbl_visitcount (count_date, visit_count)VALUES(CURDATE(),1);")
                or die(mysql_error());
    }
}

function updateViewCount($productkey) {
    $sql = "SELECT pd_views FROM hardware_shopee.tbl_product WHERE pd_id='$productkey'";
    $result = dbQuery($sql);
    $row = dbFetchAssoc($result);
    $pd_views = $row['pd_views'];

    $pd_views++;
    $sql = "UPDATE hardware_shopee.tbl_product SET pd_views = '" . $pd_views . "' WHERE tbl_product.pd_id='$productkey'";
    $result = dbQuery($sql);
}

function getHotDeals() {
    $sql = "SELECT 	pd_id, 
            pd_name, 
            pd_qty,
            pd_price
            FROM 
            hardware_shopee.tbl_product 
            WHERE
            hotdeals =1;";
    $result = dbQuery($sql);
    
    while($row = mysql_fetch_array( $result )) {
               
                $productId = $row['pd_id'];
                $productName = $row['pd_name'];
                $productQty = $row['pd_qty'];
                $productPrice = $row['pd_price'];
                
                $productNameDisplay = substr($productName, 0, 17);
                // echo out the contents of each row into a table
                                
                echo "<p><strong>";
                echo '<a href=\'JavaScript:showHotDealPopUp("'.$productId.'")\'>';
                echo "".$productNameDisplay."<br />";
                echo "Quantity - ".$productQty."<br />";
                echo "Rs.".$productPrice."/- each";
                echo "</a></strong></p> <br /><br /><br />";
    }
}
?>

