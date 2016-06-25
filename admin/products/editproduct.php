<?php
require_once '../../library/config.php';
require_once '../../library/functions.php';
require_once '../library/functions.php';

$errorMessage = '&nbsp;';

if (isset($_GET['edit'])) {
    
    $result = editproduct();

    if ($result != '') {
        $errorMessage = $result;
    }
}
    else if (isset($_POST['update'])){
    $result = updateProduct();

    if ($result != '') {
        $errorMessage = $result;
    }
} else {
   renderEditProdForm("","", "", "", "", "", "", "", "", "","" ,$errorMessage);
}

function renderEditProdForm($prodId,$mainCategory, $mainCategoryId, $category, $categoryId, $prodName, $prodQty, $prodPrice, $prodImage, $prodComment,$hotdeals, $errorMessage) {
    ?>



    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
    <html>
        <head>
            <title>New Product</title>
             <script type="text/javascript" src="../js/jquery.autocomplete.js"></script>
            <script type="text/javascript">
                submitForm = function(){
                    var mainCategory = $('#mainCategory').val();
                    var mainCategoryId = $('#mainCategoryId').val();
                    var category = $('#category').val();
                    var categoryId = $('#categoryId').val();
                    var prod_Name = $('#prod_Name').val();
                    var prod_Qty = $('#prod_Qty').val();
                    var prod_Price = $('#prod_Price').val();
                    var prod_Image = $('#prod_Image').val();
                    var prod_Comment = $('#prod_Comment').val();
                    var hotdeals=$('#hotdeals').is(':checked');        
                    var dataString = {  
                        "mainCategory"     : mainCategory,
                        "mainCategoryId"     : mainCategoryId,
                        "category"     : category,
                        "categoryId"     : categoryId,
                        "prod_Name"     : prod_Name,
                        "prod_Qty"     : prod_Qty,
                        "prod_Price" : prod_Price,
                        "prod_Image" : prod_Image,
                        "prod_Comment" : prod_Comment,
                        "hotdeals":hotdeals,
                        "update" : "update"
                    };
                            
                    invokeAjax("products/editproduct.php", dataString, "#adminDynamicDiv");
                }            
            </script>
            <script type="text/javascript">
                                       
                $().ready(function() {
        	
                    $("#mainCategory").autocomplete("../common/populateMainCategoryList.php", {
                        width: 260,
                        matchContains: true,
                        mustMatch: true,
                        //minChars: 0,
                        //multiple: true,
                        //highlight: false,
                        //multipleSeparator: ",",
                        selectFirst: false
                    });
        	
                    $("#mainCategory").result(function(event, data, formatted) {
                        $("#mainCategoryId").val(data[1]);
                    });
                });
                    
                $().ready(function() {
        	
                    $("#category").autocomplete("../common/populateCategoryList.php", {
                        width: 260,
                        matchContains: true,
                        mustMatch: true,
                        //minChars: 0,
                        //multiple: true,
                        //highlight: false,
                        //multipleSeparator: ",",
                        selectFirst: false
                    });
        	
                    $("#category").result(function(event, data, formatted) {
                        $("#categoryId").val(data[1]);
                    });
                });
                    
            </script>
             <script type="text/javascript" >
                    function changeImageboxtxtval(txtVal){
                        $("#imgTxt").empty().val(txtVal);
                    }
         </script>
        </head>
        <body>
            <div class="errorMessageAdmin" align="center"><?php echo $errorMessage; ?></div>
            <form method="post">
                <div>
                    <table cellspacing="0" cellpadding="3" border="0" width="100%">
                        <tbody>
                            <tr>
                                <td colspan="2"><font size="3" face="Tahoma, Verdana, Arial, Trebuchet MS">Add
                            new product</font></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;
                            <input type="hidden" name="prodId" id="prodId" value="<?php echo $prodId; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">Main Category &nbsp;<font style="color:red">*</font></td>
                        <td><input type="text" name="mainCategory" id="mainCategory" value="<?php echo $mainCategory; ?>"/>
                            <input type="hidden" name="mainCategoryId" id="mainCategoryId" value="<?php echo $mainCategoryId; ?>"/></td>
                        </tr>
                        <tr>
                            <td align="right">Category &nbsp;<font style="color:red">*</font></td>
                        <td><input type="text" name="category" id="category" value="<?php echo $category; ?>"/>
                            <input type="hidden" name="categoryId" id="categoryId" value="<?php echo $categoryId; ?>"/></td>
                        </tr>
                        <tr>
                            <td align="right">Name &nbsp;<font style="color:red">*</font></td>
                        <td><input type="text" size="40" id="prod_Name" name="prod_Name" value="<?php echo $prodName; ?>"/></td>
                        </tr>
                        <tr>
                            <td width="15%" align="right">Quantity &nbsp<font style="color:red">*</font></td>
                        <td width="85%"><input type="text" size="30" id="prod_Qty" name="prod_Qty" value="<?php echo $prodQty; ?>"/></td>
                        </tr>
                        <tr>
                            <td align="right">Price &nbsp;<font style="color:red">*</font></td>
                        <td><input type="text" size="20" name="prod_Price" id="prod_Price" value="<?php echo $prodPrice; ?>"/></td>
                        </tr>
                        <tr>
                            <td align="right">Image &nbsp;<font style="color:red">*</font></td>
                    <td><input type="file" name="file" onchange="changeImageboxtxtval(this.value);" size="50" id="prod_Image" name="prod_Image" /><input style="border: 0px #ffffff" size="20" type="text"  id="imgTxt" name="imgTxt" value="<?php echo $prodImage; ?>"></td>
                        </tr>                                  

                        <tr>
                            <td valign="top" align="right">Description &nbsp;<font style="color:red">*</font></td>
                        <?php echo '<td><textarea id="prod_Comment" rows="7" cols="80" name="prod_Comment">' . $prodComment . '</textarea></td>'; ?>
                        </tr>
                        <tr>
                            <td valign="top" align="right">Hotdeals
                             </td>
                             <td><input type="checkbox"  name="hotdeals" size="50" id="hotdeals" /></td>
                        </tr>  
                        <tr>
                            <td>&nbsp;</td>
                            <td> <p style="color: red;">* required </p>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="button" value="Submit" name="submit" onclick="submitForm();">
                                &nbsp; <input type="reset" value="Cancel" name="reset">
                            </td>
                        </tr>
                        </tbody></table>

                </div>
            </form>
        </body>
    </html>
    <?php
}
?>