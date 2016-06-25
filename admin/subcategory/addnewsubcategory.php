<?php
require_once '../../library/config.php';
require_once '../../library/functions.php';
require_once '../library/functions.php';

$errorMessage = '&nbsp;';

if (isset($_POST['subCategoryName'])) {
    $result = addsubCategory();

    if ($result != '') {
        $errorMessage = $result;
    }
} else {
    renderAddsubCatForm("", "", "", "", $errorMessage);
}

function renderAddsubCatForm($subCategoryName, $subCategoryDesc, $mainCategory, $mainCatId, $errorMessage) {
    ?>



    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
    <html>
        <head>
            <title>New Category</title>
            <script type="text/javascript" src="../js/jquery.autocomplete.js"></script>
            <script type="text/javascript">
                submitForm = function(){
                    var subCategoryName = $('#subCategoryname').val();
                    var subCategoryDesc = $('#subCategorydesc').val();
                    var mainCategory=$('#mainCategory').val();
                    var mainCategoryId=$('#mainCategoryId').val();                               
                    var dataString = {  
                        "subCategoryName"     : subCategoryName,
                        "subCategoryDesc"     : subCategoryDesc,
                        "mainCategory"        :mainCategory,
                        "mainCategoryId"           :mainCategoryId
                    };
                                        
                    invokeAjax("subcategory/addnewsubcategory.php", dataString, "#adminDynamicDiv");
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
                        <td><input type="text" name="mainCategory" id="mainCategory" value="<?php  ?>"/>
                        <input type="hidden" name="mainCategoryId" id="mainCategoryId" value="<?php  ?>"/>
                        </td>
                        </tr>
                        <tr>
                            <td align="right">Sub Category Name&nbsp;<font style="color:red">*</font></td>
                        <td><input type="text" name="subCategoryname" id="subCategoryname" value="<?php echo $subCategoryName; ?>"/>
                        </td>
                        </tr>
                        <tr>
                            <td align="right">Sub Category Description &nbsp;<font style="color:red">*</font></td>
                        <td><input type="text" name="subCategorydesc" id="subCategorydesc" value="<?php echo $subCategoryDesc; ?>"/>
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