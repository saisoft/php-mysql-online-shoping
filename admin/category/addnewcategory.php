<?php
require_once '../../library/config.php';
require_once '../../library/functions.php';
require_once '../library/functions.php';

$errorMessage = '&nbsp;';

if (isset($_POST['mainCategoryName'])) {
    $result = addCategory();

    if ($result != '') {
        $errorMessage = $result;
    }
} else {
    renderAddCatForm("", "", $errorMessage);
}

function renderAddCatForm($mainCategoryName, $mainCategoryDesc, $errorMessage) {
    ?>



    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
    <html>
        <head>
            <title>New Category</title>
            <script type="text/javascript">
                submitForm = function(){
                    var mainCategoryName = $('#mainCategoryname').val();
                    var mainCategoryDesc = $('#mainCategorydesc').val();
                                                   
                    var dataString = {  
                        "mainCategoryName"     : mainCategoryName,
                        "mainCategoryDesc"     : mainCategoryDesc
                    };
                                
                    invokeAjax("category/addnewcategory.php", dataString, "#adminDynamicDiv");
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