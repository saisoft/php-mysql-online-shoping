<?php
/*
  VIEW-PAGINATED.PHP
  Displays all products from 'hardware_shopee' table
  This is a modified version of view.php that includes pagination
 */

// connect to the database
require_once '../../library/config.php';
require_once '../../library/functions.php';
// number of results to show per page
$per_page = 5;

// figure out the total pages in the database
// get results from database
$result = mysql_query("SELECT maincat_id, 	
                        maincat_name, 
                        maincat_description
                        FROM 
                        hardware_shopee.tbl_main_category;")
        or die(mysql_error());

$total_results = mysql_num_rows($result);

$total_pages = ceil($total_results / $per_page);

// check if the 'page' variable is set in the URL (ex: view-paginated.php?page=1)
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $show_page = $_GET['page'];

    // make sure the $show_page value is valid
    if ($show_page > 0 && $show_page <= $total_pages) {
        $start = ($show_page - 1) * $per_page;
        $end = $start + $per_page;
    } else {
        // error - show first set of results
        $start = 0;
        $end = $per_page;
    }
} else {
    // if page isn't set, show first set of results
    $start = 0;
    $end = $per_page;
}

// display pagination

echo '<p><a href=\'JavaScript:invokeAjax("category/admincategorylist.php", "", "#adminDynamicDiv");\'>View All</a> | <b>View Page:</b>';
for ($i = 1; $i <= $total_pages; $i++) {
    echo '<a href=\'JavaScript:invokeAjax("category/admincategorylistPaginated.php?page=' . $i . '", "", "#adminDynamicDiv");\'> ' . $i . ' | </a>';
}
echo "</p>";
echo '<br />';
// display data in table
echo "<table border='0' cellpadding='5' cellspacing='2'>";
echo "<tr bgcolor='#cccccc'> <th>Name</th> <th>Description</th> <th>Edit Actions</th> <th>Delete Actions</th></tr>";
$cssrow = 0;

// loop through results of database query, displaying them in the table 
for ($i = $start; $i < $end; $i++) {
    // make sure that PHP doesn't try to show results that don't exist
    if ($i == $total_results) {
        break;
    }
    $cssrow++;
    $mainCatDesc = mysql_result($result, $i, 'maincat_description');
    $mainCatDisplay = substr($mainCatDesc, 0, 40) . "...";
    // echo out the contents of each row into a table
    echo "<tr class='link" . ($cssrow & 1) . "'>";
    echo '<td>' . mysql_result($result, $i, 'maincat_name') . '</td>';
    echo '<td>' . $mainCatDisplay . '</td>';
    echo '<td><a href=\'JavaScript:invokeAjax("category/editcategory.php?edit=' . mysql_result($result, $i, 'maincat_id') . '", "", "#adminDynamicDiv");\'>Edit</a></td>';
    echo '<td><a href=\'JavaScript:invokeAjax("category/deletecategorypaginated.php?id=' . mysql_result($result, $i, 'maincat_id') . '", "", "#adminDynamicDiv");\'>Delete</a></td>';

    echo "</tr>";
}
// close table>
echo "</table>";

// pagination
?>
<p><a href='JavaScript:invokeAjax("category/addnewcategory.php", "", "#adminDynamicDiv");'>Add a new category</a></p>
