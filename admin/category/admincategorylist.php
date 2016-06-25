
<?php
/*
  VIEW.PHP
  Displays all products from 'hardware_shopee' table
 */

// connect to the database
require_once '../../library/config.php';
require_once '../../library/functions.php';

// get results from database
$result = mysql_query("SELECT maincat_id, 	
                        maincat_name, 
                        maincat_description
                        FROM 
                        hardware_shopee.tbl_main_category;")
        or die(mysql_error());

// display data in table
echo '<p> &nbsp; <b>View All</b> | <a href=\'JavaScript:invokeAjax("category/admincategorylistPaginated.php?page=1", "", "#adminDynamicDiv");\'>View Paginated</a></p>';
echo "<table border='0' cellpadding='5' cellspacing='2'>";
echo "<tr bgcolor='#cccccc'> <th>Name</th> <th>Description</th>  <th>Edit Actions</th> <th>Delete Actions</th></tr>";
$cssrow = 0;
// loop through results of database query, displaying them in the table
while ($row = mysql_fetch_array($result)) {
    $cssrow++;
    $mainCatDesc = $row['maincat_description'];
    $mainCatDisplay = substr($mainCatDesc, 0, 40) . "...";
    // echo out the contents of each row into a table
    echo "<tr class='link" . ($cssrow & 1) . "'>";
    echo '<td>' . $row['maincat_name'] . '</td>';
    echo '<td>' . $mainCatDisplay . '</td>';

    echo '<td><a href=\'JavaScript:invokeAjax("category/editcategory.php?edit=' . $row['maincat_id'] . '", "", "#adminDynamicDiv");\'>Edit</a></td>';
    echo '<td><a href=\'JavaScript:invokeAjax("category/deletecategory.php?id=' . $row['maincat_id'] . '", "", "#adminDynamicDiv");\'>Delete</a></td>';
    echo "</tr>";
}

// close table>
echo "</table>";
?>
<p><a href='JavaScript:invokeAjax("category/addnewcategory.php", "", "#adminDynamicDiv");'>Add a new category</a></p>
