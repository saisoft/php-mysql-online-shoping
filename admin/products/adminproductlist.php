
<?php
/*
        VIEW.PHP
        Displays all products from 'hardware_shopee' table
*/

        // connect to the database
require_once '../../library/config.php';
require_once '../../library/functions.php';

        // get results from database
        $result = mysql_query("SELECT 	pd_id,
                                        cat_id,
                                        pd_name,
                                        pd_description,
                                        pd_price,
                                        pd_qty,
                                        pd_image,
                                        pd_thumbnail,
                                        pd_date,
                                        pd_last_update,
                                        pd_views

                                        FROM
                                        hardware_shopee.tbl_product;")
         or die(mysql_error());

        // display data in table
        echo '<p> &nbsp; <b>View All</b> | <a href=\'JavaScript:invokeAjax("products/adminproductlistPaginated.php?page=1", "", "#adminDynamicDiv");\'>View Paginated</a></p>';
        echo "<table border='0' cellpadding='5' cellspacing='2'>";
        echo "<tr bgcolor='#cccccc'> <th>Name</th> <th>Description</th> <th>Price</th> <th>Quantity</th> <th>Date</th> <th>Last Update</th> <th>Edit Actions</th> <th>Delete Actions</th></tr>";
        $cssrow = 0;
        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                $cssrow++;
                $productDesc = $row['pd_description'];
                $productDescDisplay = substr($productDesc, 0, 40)."...";
                // echo out the contents of each row into a table
                echo "<tr class='link".($cssrow & 1)."'>";
                echo '<td>' . $row['pd_name'] . '</td>';
                echo '<td>' . $productDescDisplay . '</td>';
                echo '<td>' . $row['pd_price'] . '</td>';
                echo '<td>' . $row['pd_qty'] . '</td>';
                echo '<td>' . $row['pd_date'] . '</td>';
                echo '<td>' . $row['pd_last_update'] . '</td>';
                echo '<td><a href=\'JavaScript:invokeAjax("products/editproduct.php?edit=' . $row['pd_id'] . '", "", "#adminDynamicDiv");\'>Edit</a></td>';
                echo '<td><a href=\'JavaScript:invokeAjax("products/deleteproduct.php?edit=' . $row['pd_id'] . '", "", "#adminDynamicDiv");\'>Delete</a></td>';
                echo "</tr>";
        }

        // close table>
        echo "</table>";
?>
<p><a href='JavaScript:invokeAjax("products/addnewproduct.php", "", "#adminDynamicDiv");'>Add a new Product</a></p>
