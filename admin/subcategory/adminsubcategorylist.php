
<?php
/*
  VIEW.PHP
  Displays all products from 'hardware_shopee' table
 */

// connect to the database
require_once '../../library/config.php';
require_once '../../library/functions.php';

// get results from database
$result = mysql_query("SELECT cat_id, 	
                        cat_name, 
                        cat_description,
                        main_cat_id
                        FROM 
                        hardware_shopee.tbl_category;")
        or die(mysql_error());

// display data in table
echo '<p> &nbsp; <b>View All</b> | <a href=\'JavaScript:invokeAjax("subcategory/adminsubcategorylistPaginated.php?page=1", "", "#adminDynamicDiv");\'>View Paginated</a></p>';
echo "<table border='0' cellpadding='5' cellspacing='2'>";
echo "<tr bgcolor='#cccccc'> <th>Name</th> <th>Description</th> <th>Main Category Name</th> <th>Edit Actions</th> <th>Delete Actions</th></tr>";
$cssrow = 0;
// loop through results of database query, displaying them in the table
while ($row = mysql_fetch_array($result)) {
    $cssrow++;
    $CatDesc = $row['cat_description'];
    $CatDisplay = substr($CatDesc, 0, 40) . "...";
    $MainCatId=$row['main_cat_id'];
    // echo out the contents of each row into a table
    echo "<tr class='link" . ($cssrow & 1) . "'>";
    echo '<td>' . $row['cat_name'] . '</td>';
    echo '<td>' . $CatDisplay . '</td>';
    echo '<td>'.$MainCatId.'</td>';

    echo '<td><a href=\'JavaScript:invokeAjax("subcategory/editsubcategory.php?edit=' . $row['cat_id'] . '", "", "#adminDynamicDiv");\'>Edit</a></td>';
    echo '<td><a href=\'JavaScript:invokeAjax("subcategory/deletesubcategory.php?id=' . $row['cat_id'] . '", "", "#adminDynamicDiv");\'>Delete</a></td>';
    echo "</tr>";
}

// close table>
echo "</table>";
?>
<p><a href='JavaScript:invokeAjax("subcategory/addnewsubcategory.php", "", "#adminDynamicDiv");'>Add a new subcategory</a></p>
