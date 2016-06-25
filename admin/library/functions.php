<?php

/*
  Check if a session user id exist or not. If not set redirect
  to login page. If the user session id exist and there's found
  $_GET['logout'] in the query string logout the user
 */

function checkUser() {
    // if the session id is not set, redirect to login page
    if (!isset($_SESSION['hardware_user_id'])) {
        header('Location: /' . WEB_ROOT . 'admin/login.php');
        exit;
    }

    // the user want to logout
    if (isset($_GET['logout'])) {
        doLogout();
    }
}

/*

 */

function doLogin() {
    // if we found an error save the error message in this variable
    $errorMessage = '';

    $userName = $_POST['txtUserName'];
    $password = $_POST['txtPassword'];

    // first, make sure the username & password are not empty
    if ($userName == '') {
        $errorMessage = 'You must enter your username';
    } else if ($password == '') {
        $errorMessage = 'You must enter the password';
    } else {
        // check the database and see if the username and password combo do match
        $sql = "SELECT user_id
		        FROM tbl_user 
				WHERE user_name = '$userName' AND user_password = '$password'";
        $result = dbQuery($sql);

        if (dbNumRows($result) == 1) {
            $row = dbFetchAssoc($result);
            $_SESSION['hardware_user_id'] = $row['user_id'];

            // log the time when the user last login
            $sql = "UPDATE tbl_user 
			        SET user_last_login = NOW() 
					WHERE user_id = '{$row['user_id']}'";
            dbQuery($sql);

            // now that the user is verified we move on to the next page
            // if the user had been in the admin pages before we move to
            // the last page visited
            if (isset($_SESSION['login_return_url'])) {
                header('Location: ' . $_SESSION['login_return_url']);
                exit;
            } else {
                header('Location: index.php');
                exit;
            }
        } else {
            $errorMessage = 'Wrong username or password';
        }
    }

    return $errorMessage;
}

/*
  Logout a user
 */

function doLogout() {
    if (isset($_SESSION['hardware_user_id'])) {
        unset($_SESSION['hardware_user_id']);
        session_unregister('hardware_user_id');
    }

    header('Location: login.php');
    exit;
}

function populateCategoryList() {
    $query = "SELECT 	cat_id AS CATEGORYID, 
	cat_name AS CATEGORYNAME	 
	FROM 
	hardware_shopee.tbl_category; ";

    /* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */

    $result = dbQuery($query);
    echo "<select name='category' id='category' value=''>Category</option>";
// printing the list box select command

    while ($nt = mysql_fetch_array($result)) {//Array or records stored in $nt
        echo "<option value=$nt[CATEGORYID]>$nt[CATEGORYNAME]</option>";
        /* Option values are added by looping through the array */
    }
    echo "</select>"; // Closing of list box 
}

function populateMainCategoryList() {
    $query = "
SELECT 	maincat_id AS MAINCATID, 
	maincat_name AS MAINCATDESC
	 
	FROM 
	hardware_shopee.tbl_main_category;";

    /* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */

    $result = dbQuery($query);
    echo "<select name='maincategory' id='maincategory' value=''>Main Category</option>";
// printing the list box select command

    while ($nt = mysql_fetch_array($result)) {//Array or records stored in $nt
        echo "<option value=$nt[MAINCATID]>$nt[MAINCATDESC]</option>";
        /* Option values are added by looping through the array */
    }
    echo "</select>"; // Closing of list box 
}

function updateProduct() {
    // if we found an error save the error message in this variable
    $errorMessage = '';

    $prodId = mysql_real_escape_string(htmlspecialchars($_POST['prodId']));
    $mainCategory = mysql_real_escape_string(htmlspecialchars($_POST['mainCategory']));
    $mainCategoryId = mysql_real_escape_string(htmlspecialchars($_POST['mainCategoryId']));
    $category = mysql_real_escape_string(htmlspecialchars($_POST['category']));
    $categoryId = mysql_real_escape_string(htmlspecialchars($_POST['categoryId']));
    $prodName = mysql_real_escape_string(htmlspecialchars($_POST['prod_Name']));
    $prodQty = mysql_real_escape_string(htmlspecialchars($_POST['prod_Qty']));
    $prodPrice = mysql_real_escape_string(htmlspecialchars($_POST['prod_Price']));
    $prodImage = mysql_real_escape_string(htmlspecialchars($_POST['prod_Image']));
    $prodComment = htmlspecialchars($_POST['prod_Comment']);
    $hotdeals = htmlspecialchars($_POST['hotdeals']);
    $hotdealsTosave=0;
     if($hotdeals=="true")
    {
        $hotdealsTosave=1;
    } 
    // first, make sure the username & password are not empty
    if ($prodName == '' or $prodQty == '' or $prodPrice == '' or $prodImage == '' or $prodComment == '') {
        $errorMessage = 'You must enter all required values';
        // if either field is blank, display the form again
        renderEditProdForm($prodId, $mainCategory, $mainCategoryId, $category, $categoryId, $prodName, $prodQty, $prodPrice, $prodImage, $prodComment, $errorMessage);
    } else {
        // check the database and see if the username and password combo do match
        // save the data to the database
        $productImage = $prodImage;
        $prodThumbnail = 'small' . $prodImage;
        $sql = "INSERT INTO hardware_shopee.tbl_product 
                (cat_id, 
                pd_name, 
                pd_description, 
                pd_price, 
                pd_qty, 
                pd_image, 
                pd_thumbnail, 
                pd_date, 
                pd_last_update, 
                pd_views,
               hotdeals
                )
                VALUES
                ($categoryId, 
                '$prodName', 
                '$prodComment', 
                $prodPrice, 
                $prodQty, 
                '$productImage', 
                '$prodThumbnail', 
                CURDATE(), 
                CURDATE(), 
                0,
                $hotdealsTosave
                );";

        dbQuery($sql);

        $errorMessage = '<div style="color:green;">Product Added Successfully</div>';
        renderEditProdForm('', '', '', '', '', '', '', '', '', '','', $errorMessage);
    }

    return $errorMessage;
}

function editproduct() {
    // if we found an error save the error message in this variable
    $errorMessage = '';

    $prodKey = mysql_real_escape_string(htmlspecialchars($_GET['edit']));

    if ($prodKey == '') {
        $errorMessage = 'You must enter a vlaid product to edit';
        renderEditProdForm('', '', '', '', '', '', '', '', '', '','', $errorMessage);
    } else {

        $sql = "SELECT 	
        pd_id AS prodId,
        tbl_main_category.maincat_id AS mainCategoryId,  
        maincat_name AS mainCategoryName,
        tbl_category.cat_id AS categoryId,  
	cat_name AS categoryName,  
	pd_name AS prodName, 
	pd_description AS prodComment, 
	pd_price AS prodPrice, 
	pd_qty AS prodQty, 
	pd_image AS prodImage, 
	hotdeals As hotDeals
        
	FROM hardware_shopee.tbl_product JOIN hardware_shopee.tbl_category 
        JOIN hardware_shopee.tbl_main_category
	
	
	ON 
	tbl_product.cat_id = tbl_category.cat_id AND
	tbl_category.main_cat_id = tbl_main_category.maincat_id AND
	
	pd_id ='$prodKey'";

        $result = dbQuery($sql);

        $row = dbFetchArray($result);

        if ($row) {
            // get data from db
            $prodId = $row['prodId'];
            $mainCategoryId = $row['mainCategoryId'];
            $mainCategoryName = $row['mainCategoryName'];
            $categoryId = $row['categoryId'];
            $categoryName = $row['categoryName'];
            $prodName = $row['prodName'];
            $prodQty = $row['prodQty'];
            $prodPrice = $row['prodPrice'];
            $prodImage = $row['prodImage'];
            $prodComment = $row['prodComment'];
            $hotdeals=$row['hotDeals'];
            // show form
            renderEditProdForm($prodId, $mainCategoryName, $mainCategoryId, $categoryName, $categoryId, $prodName, $prodQty, $prodPrice, $prodImage, $prodComment,$hotdeals, '');
        } else {
            // if no match, display result
            $errorMessage = 'No Results';
            renderEditProdForm('', '', '', '', '', '', '', '', '', '','', $errorMessage);
        }
    }
}

function addCategory() {
    // if we found an error save the error message in this variable
    $errorMessage = '';

    $mainCategoryName = mysql_real_escape_string(htmlspecialchars($_POST['mainCategoryName']));
    $mainCategoryDesc = mysql_real_escape_string(htmlspecialchars($_POST['mainCategoryDesc']));


    // first, make sure the username & password are not empty
    if ($mainCategoryName == '' or $mainCategoryDesc == '') {
        $errorMessage = 'You must enter all required values';
        // if either field is blank, display the form again
        renderAddCatForm($mainCategoryName, $mainCategoryDesc, $errorMessage);
    } else {
        // check the database and see if the username and password combo do match
        // save the data to the database
        $sql = "INSERT INTO hardware_shopee.tbl_main_category 
                (maincat_name, 
                maincat_description                
                )
                VALUES
                ('$mainCategoryName', 
                '$mainCategoryDesc'  
                );";

        dbQuery($sql);

        $errorMessage = '<div style="color:green;">Category Added Successfully</div>';
        renderAddCatForm('', '', $errorMessage);
    }

    return $errorMessage;
}

function editcategory() {
    // if we found an error save the error message in this variable
    $errorMessage = '';

    $categoryKey = mysql_real_escape_string(htmlspecialchars($_GET['edit']));

    if ($categoryKey == '') {
        $errorMessage = 'You must enter a vlaid category to edit';
        renderEditCatForm('', '', '', $errorMessage);
    } else {

        $sql = "SELECT 
        maincat_id as mainCatId,
        maincat_name AS categoryName,
       maincat_description AS categoryDesc  
        
	FROM hardware_shopee.tbl_main_category
	
	WHERE 
	tbl_main_category.maincat_id = '$categoryKey'";

        $result = dbQuery($sql);

        $row = dbFetchArray($result);

        if ($row) {
            // get data from db

            $mainCategoryDesc = $row['categoryDesc'];
            $mainCategoryName = $row['categoryName'];
            $mainCatId = $row['mainCatId'];
            // show form
            renderEditCatForm($mainCatId, $mainCategoryName, $mainCategoryDesc, '');
        } else {
            // if no match, display result
            $errorMessage = 'No Results';
            renderEditCatForm('', '', '', $errorMessage);
        }
    }
}

function updatecategory() {
// if we found an error save the error message in this variable
    $errorMessage = '';

    $mainCatId = mysql_real_escape_string(htmlspecialchars($_POST['mainCatId']));
    $mainCategoryName = mysql_real_escape_string(htmlspecialchars($_POST['mainCategoryName']));
    $mainCategoryDesc = mysql_real_escape_string(htmlspecialchars($_POST['mainCategoryDesc']));


    // first, make sure the username & password are not empty
    if ($mainCategoryName == '' or $mainCategoryDesc == '') {
        $errorMessage = 'You must enter all required values';
        // if either field is blank, display the form again
        renderEditCatForm($mainCatId, $mainCategoryName, $mainCategoryDesc, $errorMessage);
    } else {
        // check the database and see if the username and password combo do match
        // save the data to the database
        $sql = "UPDATE hardware_shopee.tbl_main_category 
	SET
	maincat_name = '$mainCategoryName' , 
	maincat_description = '$mainCategoryDesc'
	
	WHERE
	maincat_id = '$mainCatId' ;";

        dbQuery($sql);

        $errorMessage = '<div style="color:green;">Product Added Successfully</div>';
        renderEditCatForm('', '', '', $errorMessage);
    }

    return $errorMessage;
}

function addsubCategory() {
    // if we found an error save the error message in this variable
    $errorMessage = '';

    $subCategoryName = mysql_real_escape_string(htmlspecialchars($_POST['subCategoryName']));
    $subCategoryDesc = mysql_real_escape_string(htmlspecialchars($_POST['subCategoryDesc']));
    $mainCategoryId = mysql_real_escape_string(htmlspecialchars($_POST['mainCategoryId']));
    $mainCategory = mysql_real_escape_string(htmlspecialchars($_POST['mainCategory']));
    

    // first, make sure the username & password are not empty
    if ($subCategoryName == '' or $subCategoryDesc == '' or $mainCategoryId=='' or $mainCategory=='') {
        $errorMessage = 'You must enter all required values';
        // if either field is blank, display the form again
        renderAddSubCatForm($subCategoryName, $subCategoryDesc,$mainCategory, $mainCategoryId, $errorMessage);
    } else {
        // check the database and see if the username and password combo do match
        // save the data to the database
        $sql = "INSERT INTO hardware_shopee.tbl_category 
                (cat_name, 
                cat_description,
                main_cat_id
                )
                VALUES
                ('$subCategoryName', 
                '$subCategoryDesc',
                '$mainCategoryId'
                );";

        dbQuery($sql);

        $errorMessage = '<div style="color:green;">Category Added Successfully</div>';
        renderAddSubCatForm('', '','','', $errorMessage);
    }

    return $errorMessage;
}

function editsubcategory() {
    // if we found an error save the error message in this variable
    $errorMessage = '';

    $categoryKey = mysql_real_escape_string(htmlspecialchars($_GET['edit']));

    if ($categoryKey == '') {
        $errorMessage = 'You must enter a valid category to edit';
        renderEditSubCatForm('', '', '', '','', $errorMessage);
    } else {

        $sql = "SELECT cat_id, 	
                        cat_name, 
                        cat_description,
                        maincat_name,
                        tbl_category.main_cat_id
                        FROM 
                        hardware_shopee.tbl_category 
                        JOIN 
                        hardware_shopee.tbl_main_category
                        ON
                        tbl_main_category.maincat_id = tbl_category.main_cat_id
                        WHERE cat_id= '$categoryKey'";

        $result = dbQuery($sql);

        $row = dbFetchArray($result);

        if ($row) {
            // get data from db

            $CategoryDesc = $row['cat_description'];
            $CategoryName = $row['cat_name'];
            $CatId = $row['cat_id'];
            $mainCatName = $row['maincat_name'];
            $mainCatId = $row['main_cat_id'];
            
            // show form
            renderEditSubCatForm($CatId, $CategoryName, $CategoryDesc, $mainCatName, $mainCatId, '');
        } else {
            // if no match, display result
            $errorMessage = 'No Results';
            renderEditSubCatForm('', '', '','','', $errorMessage);
        }
    }
}

function  updatesubcategory()
{
// if we found an error save the error message in this variable
    $errorMessage = '';

    $mainCategoryId = mysql_real_escape_string(htmlspecialchars($_POST['mainCategoryId']));
    $mainCatName= mysql_real_escape_string(htmlspecialchars($_POST['mainCatName']));
    $subCategoryName = mysql_real_escape_string(htmlspecialchars($_POST['subCategoryName']));
    $subCatId=mysql_real_escape_string(htmlspecialchars($_POST['subCatId']));
    $subCategoryDesc= mysql_real_escape_string(htmlspecialchars($_POST['subCategoryDesc']));
    

    // first, make sure the username & password are not empty
    if ($mainCategoryId == '' or $mainCatName == ''or $subCategoryName=='' or  $subCatId=='' or $subCategoryDesc=='') {
        $errorMessage = 'You must enter all required values';
        // if either field is blank, display the form again
        renderEditsubCatForm($mainCategoryId, $mainCatName, $subCategoryName,$subCatId,$subCategoryDesc, $errorMessage);
    } else {
        // check the database and see if the username and password combo do match
        // save the data to the database
        $sql = "UPDATE hardware_shopee.tbl_category 
	SET
        
	cat_name = '$subCategoryName' , 
	cat_description = '$subCategoryDesc',
        main_cat_id=$mainCategoryId
	
	WHERE
	cat_id = '$subCatId' ;";

        dbQuery($sql);

        $errorMessage = '<div style="color:green;">Sub Category Updated Successfully</div>';
        renderEditsubCatForm('', '', '','','', $errorMessage);
    }

    return $errorMessage;
}
function doChangePassword() {
    // if we found an error save the error message in this variable
    $errorMessage = '';

    $oldTxtPassword = mysql_real_escape_string(htmlspecialchars($_POST['oldTxtPassword']));
    $newTxtPassword = mysql_real_escape_string(htmlspecialchars($_POST['newTxtPassword']));
    $confirmTxtPassword = mysql_real_escape_string(htmlspecialchars($_POST['confirmTxtPassword']));

    if ($oldTxtPassword == "") {
        $errorMessage = "You must enter old password";
        renderCngPwdForm($oldTxtPassword, $newTxtPassword, $confirmTxtPassword, $errorMessage);
    } else if ($newTxtPassword == "") {
        $errorMessage = "You must enter new password";
        renderCngPwdForm($oldTxtPassword, $newTxtPassword, $confirmTxtPassword, $errorMessage);
    } else if ($confirmTxtPassword == "") {
        $errorMessage = "You must enter confirm password";
        renderCngPwdForm($oldTxtPassword, $newTxtPassword, $confirmTxtPassword, $errorMessage);
    } else if (strlen($newTxtPassword) < 3 or strlen($newTxtPassword) > 8) {
        $errorMessage = "Password must be more than 3 char legth and maximum 8 char lenght";
        renderCngPwdForm($oldTxtPassword, $newTxtPassword, $confirmTxtPassword, $errorMessage);
    } else if ($newTxtPassword <> $confirmTxtPassword) {
        $errorMessage = "Both passwords are not matching";
        renderCngPwdForm($oldTxtPassword, $newTxtPassword, $confirmTxtPassword, $errorMessage);
    } else {
        $userId = $_SESSION['hardware_user_id'];

        $sql = "UPDATE hardware_shopee.tbl_user SET user_password='$newTxtPassword' WHERE user_id='$userId' 
        and user_password='$oldTxtPassword'";

        $result = dbQuery($sql);

        $affectedRow = dbAffectedRows();

        if ($affectedRow == 1) {
            $errorMessage = '<div style="color:green;">Password changed successfully.</div>';
            renderCngPwdForm('', '', '', $errorMessage);
        }
        if ($affectedRow == 0) {
            $errorMessage = 'Old Password in Database wont match.';
            renderCngPwdForm($oldTxtPassword, $newTxtPassword, $confirmTxtPassword, $errorMessage);
        }
    }

    return $errorMessage;
}

define("FETCH_OVERALL_VISITS", "SELECT SUM(visit_count) AS TOTAL_VISIT_COUNT FROM hardware_shopee.tbl_visitcount");
define("FETCH_OVERALL_VIEWS", "SELECT SUM(pd_views) AS TOTAL_VIEW_COUNT	FROM hardware_shopee.tbl_product");

function getOverallVisits() {

    return global_query(FETCH_OVERALL_VISITS, "TOTAL_VISIT_COUNT");
}

function getOverallProdViewCounts() {

    return global_query(FETCH_OVERALL_VIEWS, "TOTAL_VIEW_COUNT");
}

function global_query($queryString, $rowToReturn) {
    $result = mysql_query($queryString);

    if ($result == false) {
        // Remove following line from production servers
        die("SQL error: " . mysql_error() . "\b<br>\n<br>Original query: $string \n<br>\n<br>");
    }


    $row = mysql_fetch_array($result);

    $selectedRow = $row[$rowToReturn];

    return $selectedRow;
}

?>