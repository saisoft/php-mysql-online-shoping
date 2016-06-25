<?php

include_once '../../library/config.php';
include_once '../../library/database.php';

$errorMsg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $image = $_FILES["fileToUpload"]["name"];
    $uploadedfile = $_FILES['fileToUpload']['tmp_name'];
    $hotdealsTosave = 0;
    $mainCategory = mysql_real_escape_string(htmlspecialchars($_POST['mainCategory']));
    $mainCategoryId = mysql_real_escape_string(htmlspecialchars($_POST['mainCategoryId']));
    $category = mysql_real_escape_string(htmlspecialchars($_POST['category']));
    $categoryId = mysql_real_escape_string(htmlspecialchars($_POST['categoryId']));
    $prodName = mysql_real_escape_string(htmlspecialchars($_POST['prod_Name']));
    $prodQty = mysql_real_escape_string(htmlspecialchars($_POST['prod_Qty']));
    $prodPrice = mysql_real_escape_string(htmlspecialchars($_POST['prod_Price']));
    $prodComment = mysql_real_escape_string(htmlspecialchars($_POST['prod_Comment']));
    if (isset($_POST['hotdeals'])) {
        $hotdeals = mysql_real_escape_string(htmlspecialchars($_POST['hotdeals']));
        if ($hotdeals == "on") {
            $hotdealsTosave = 1;
        }
    }


    // check the database and see if the username and password combo do match
    // save the data to the database

    $productImage = $image;
    $prodThumbnail = 'small' . $image;
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


    if (!($image == '')) {
        uploadfile($image, $uploadedfile);
    } else {
        $errorMsg = 'Please select Image to upload';
    }
}
?>


<?php

function uploadfile($image, $uploadedfile) {

    define("MAX_SIZE", "400");

    $errors = 0;



    if ($image) {
        $filename = stripslashes($_FILES['fileToUpload']['name']);
        $extension = getExtension($filename);
        $extension = strtolower($extension);
        if (($extension != "jpg") && ($extension != "jpeg")
                && ($extension != "png") && ($extension != "gif")) {
            echo ' Unknown Image extension ';
            $errors = 1;
        } else {
            $size = filesize($_FILES['fileToUpload']['tmp_name']);

            if ($size > MAX_SIZE * 8192) {
                echo 'You have exceeded the size limit';
                $errors = 1;
            }

            if ($extension == "jpg" || $extension == "jpeg") {
                $uploadedfile = $_FILES['fileToUpload']['tmp_name'];
                $src = imagecreatefromjpeg($uploadedfile);
            } else if ($extension == "png") {
                $uploadedfile = $_FILES['fileToUpload']['tmp_name'];
                $src = imagecreatefrompng($uploadedfile);
            } else {
                $src = imagecreatefromgif($uploadedfile);
            }

            list($width, $height) = getimagesize($uploadedfile);

            $newwidth = 300;
            $newheight = 300;
            $tmp = imagecreatetruecolor($newwidth, $newheight);

            $newwidth1 = 70;
            $newheight1 = 70;
            $tmp1 = imagecreatetruecolor($newwidth1, $newheight1);

            imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

            imagecopyresampled($tmp1, $src, 0, 0, 0, 0, $newwidth1, $newheight1, $width, $height);

            $filename = "../../img/" . $_FILES['fileToUpload']['name'];
            $filename1 = "../../img/small" . $_FILES['fileToUpload']['name'];

            imagejpeg($tmp, $filename, 100);
            imagejpeg($tmp1, $filename1, 100);

            imagedestroy($src);
            imagedestroy($tmp);
            imagedestroy($tmp1);
        }
    }
}

//If no errors registred, print the success message

if (isset($_POST['Submit']) && !$errors) {
    // mysql_query("update SQL statement ");
    echo "Image Uploaded Successfully!";
}

function getExtension($str) {

    $i = strrpos($str, ".");
    if (!$i) {
        return "";
    }

    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}
?>