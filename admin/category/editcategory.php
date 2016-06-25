<?php
require_once '../../library/config.php';
require_once '../../library/functions.php';
require_once '../library/functions.php';

$errorMessage = '&nbsp;';

if (isset($_GET['edit'])) {
    $result = editcategory();

    if ($result != '') {
        $errorMessage = $result;
    }
}
else if (isset($_POST['update'])){
    $result = updatecategory();

    if ($result != '') {
        $errorMessage = $result;
    }
}else {
    renderEditCatForm("","", "", $errorMessage);
}

function renderEditCatForm($mainCatId, $mainCategoryName, $mainCategoryDesc, $errorMessage) {
    ?>



    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
    <html>
        <head>
            <title>Update Product</title>
            <script type="text/javascript">
                submitForm = function(){
                    var mainCatId=$('#mainCatId').val();
                    var mainCategoryName = $('#mainCategoryname').val();
                    var mainCategoryDesc = $('#mainCategorydesc').val();
                                                   
                    var dataString = {  
                            "mainCatId"       : mainCatId,
                        "mainCategoryName"     : mainCategoryName,
                        "mainCategoryDesc"     : mainCategoryDesc,
                        "update" : "update"
                    };
                                
                    invokeAjax("category/editcategory.php", dataString, "#adminDynamicDiv");
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
                            new Category</font></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="right">Main Category Name&nbsp;<font style="color:red">*</font></td>
                        <td><input type="text" name="mainCategoryname" id="mainCategoryname" value="<?php echo $mainCategoryName; ?>"/>
                            <input type="hidden" name="mainCatId" id="mainCatId" value="<?php echo $mainCatId; ?>"/>
                        </td>
                        </tr>
                        <tr>
                            <td align="right">Main Category Description &nbsp;<font style="color:red">*</font></td>
                        <td><input type="text" name="mainCategorydesc" id="mainCategorydesc" value="<?php echo $mainCategoryDesc; ?>"/>
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