<?php
require_once '../../library/config.php';
require_once '../../library/functions.php';
require_once '../library/functions.php';

$errorMessage = '&nbsp;';

if (isset($_GET['edit'])) {
    $result = editsubcategory();

    if ($result != '') {
        $errorMessage = $result;
    }
}
else if (isset($_POST['update'])){
    $result = updatesubcategory();

    if ($result != '') {
        $errorMessage = $result;
    }
}else {
    renderEditSubCatForm("","", "","","", $errorMessage);
}

function renderEditSubCatForm($catId, $categoryName, $categoryDesc, $mainCatName, $mainCatId, $errorMessage) {
    ?>



    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
    <html>
        <head>
            <title>Update Product</title>
            <script type="text/javascript" src="../js/jquery.autocomplete.js"></script>
            <script type="text/javascript">
                submitForm = function(){
                    var mainCategoryId=$('#mainCategoryId').val();
                    var mainCatName=$('#mainCatName').val();
                    var subCategoryName = $('#subCategoryName').val();
                    var subCatId = $('#subCatId').val();
                    var subCategoryDesc=$('#subCategoryDesc').val();
                    
                    var dataString = {  
                        "mainCategoryId"        : mainCategoryId,
                        "mainCatName"           :mainCatName,
                        "subCategoryName"       : subCategoryName,
                        "subCatId"              : subCatId,
                        "subCategoryDesc"       :subCategoryDesc,
                        "update" : "update"
                    };
                                
                    invokeAjax("subcategory/editsubcategory.php", dataString, "#adminDynamicDiv");
                }            
            </script>
      <script type="text/javascript">
                                               
                $().ready(function() {
                	
                    $("#mainCategory").autocomplete("common/populateMainCategoryList.php", {
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
                            new Category</font></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                             <td align="right">Main Category Name&nbsp;<font style="color:red">*</font></td>
                        <td><input type="text" name="mainCatName" id="mainCatName" value="<?php echo $mainCatName  ?>"/>
                        <input type="hidden" name="mainCategoryId" id="mainCategoryId" value="<?php echo $mainCatId  ?>"/>
                        </td></tr>
                    <tr>
                            <td align="right">Sub Category Name&nbsp;<font style="color:red">*</font></td>
                        <td><input type="text" name="subCategoryName" id="subCategoryName" value="<?php echo $categoryName; ?>"/>
                            <input type="hidden" name="subCatId" id="subCatId" value="<?php echo $catId; ?>"/>
                        </td>
                        </tr>
                        <tr>
                            <td align="right">Main Category Description &nbsp;<font style="color:red">*</font></td>
                        <td><input type="text" name="subCategoryDesc" id="subCategoryDesc" value="<?php echo $categoryDesc; ?>"/>
                        </td>
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