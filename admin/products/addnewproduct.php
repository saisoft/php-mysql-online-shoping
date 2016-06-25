<?php
require_once '../../library/config.php';
require_once '../../library/functions.php';
require_once '../library/functions.php';
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title>New Product</title>
        <script type="text/javascript" src="../js/jquery.autocomplete.js"></script>
        <script type="text/javascript" src="../js/jquery.form.js"></script>

        <script type="text/javascript">
            function validateForm()
            {
                var mainCategory = $('#mainCategory').val();
                var mainCategoryId = $('#mainCategoryId').val();
                var category = $('#category').val();
                var categoryId = $('#categoryId').val();
                var prod_Name = $('#prod_Name').val();
                var prod_Qty = $('#prod_Qty').val();
                var prod_Price = $('#prod_Price').val();
                var prod_Image = $('#fileToUpload').val();
                var prod_Comment = $('#prod_Comment').val();
                var hotdeals=$('#hotdeals').is(':checked');
                                                
                if (mainCategory==null || mainCategory=="")
                {
                    $('#errorMsgAddProd').empty().html("Main Category Cannot be left blank");
                    $('#mainCategory').val= "";
                    $('#mainCategory').focus();
                    return false;
                }
                if (category==null || category=="")
                {
                    $('#errorMsgAddProd').empty().html("Category Cannot be left blank");
                    $('#category').val = "";
                    $('#category').focus();
                    return false;
                }
                if (prod_Name==null || prod_Name=="")
                {
                    $('#errorMsgAddProd').empty().html("Product Name Cannot be left blank");
                    $('#prod_Name').focus();
                    return false;
                }
                if (prod_Qty==null || prod_Qty=="")
                {
                    $('#errorMsgAddProd').empty().html("Product Quantity Cannot be left blank");
                    $('#prod_Qty').focus();
                    return false;
                }
                if (isInteger(prod_Qty)==false)
                {
                    $('#errorMsgAddProd').empty().html("Please Enter Product Quantity Number ");
                    $('#prod_Qty').empty();
                    $('#prod_Qty').focus();
                    return false
                }
                if (prod_Price==null || prod_Price=="")
                {
                    $('#errorMsgAddProd').empty().html("Product Price Cannot be left blank");
                    $('#prod_Price').focus();
                    return false;
                }
                if (isInteger(prod_Price)==false)
                {
                    $('#errorMsgAddProd').empty().html("Please Enter Proper Product Price  ");
                    $('#prod_Price').val= "";
                    $('#prod_Price').focus();
                    return false
                }
                if (prod_Image==null || prod_Image=="")
                {
                    $('#errorMsgAddProd').empty().html("Product Image Cannot be left blank");
                    $('#prod_Image').focus(); 
                    return false;
                }
                if (isImage(prod_Image)==false)
                {
                    $('#errorMsgAddProd').empty().html("We supports .JPG, .PNG, and .GIF image formats.");
                    $('#prod_Image').val= "";
                    $('#prod_Image').focus();
                    return false
                }
                if (prod_Comment==null || prod_Comment=="")
                {
                    $('#errorMsgAddProd').empty().html("Product Comment Cannot be left blank");
                    $('#prod_Comment').focus(); 
                    return false;
                }
                return true;
            }
                                        
            function  isImage(imagePath)
            {
                var pathLength = imagePath.length;
                var lastDot = imagePath.lastIndexOf(".");
                var fileType = imagePath.substring(lastDot,pathLength);
                if((fileType == ".gif") || (fileType == ".jpg") || (fileType == ".png") || (fileType == ".GIF") || (fileType == ".JPG") || (fileType == ".PNG")) {
                    return true;}
                else {
                    return false;
                }
            }
        </script>
        <script type="text/javascript">

            $().ready(function() {
                var data ="";
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

            $().ready(function() {

                $("#category").autocomplete("common/populateCategoryList.php", {
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
        <script type="text/javascript">

            $(document).ready(function() {

                var options = {
                    beforeSubmit:  showRequest,
                    complete:       showResponse,
                    url:       'products/uploadImgAndData.php',  // your upload script
                    dataType:  'json'
                };
                $('#Form1').submit(function() {
                    $(this).ajaxSubmit(options);
                    return false;
                });
            });

            function showRequest() {
                $("#errorMsgAddProd").html("Uploading Data...Please Wait");
            } 

            function showResponse()  {
                $("#errorMsgAddProd").html("<div style='color:green;'>Product Added SuccessFully</div>");
            } 

        </script>

        <script language="javascript" type="text/javascript">
            var cntChar = 0
            function GetKeyPress()
            {
                if(cntChar == 60)
                {
                    document.getElementById('prod_Comment').value = document.getElementById('prod_Comment').value + '\r\n';
                    cntChar = 1;
                }
                else
                {
                    cntChar = cntChar + 1;
                }
            }
        </script>
    </head>
    <body>
        <div class="errorMessageAdmin" id="errorMsgAddProd" align="center"></div>
        <form id="Form1" name="Form1" method="post" action="">
            <div>
                <table cellspacing="0" cellpadding="3" border="0" width="100%">
                    <tbody>
                        <tr>
                            <td colspan="2"><font size="3" face="Tahoma, Verdana, Arial, Trebuchet MS">Add
                        new product</font></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right">Main Category &nbsp;<font style="color:red">*</font></td>
                    <td><input type="text" name="mainCategory" id="mainCategory"/>
                        <input type="hidden" name="mainCategoryId" id="mainCategoryId" /></td>
                    </tr>
                    <tr>
                        <td align="right">Category &nbsp;<font style="color:red">*</font></td>
                    <td><input type="text" name="category" id="category" />
                        <input type="hidden" name="categoryId" id="categoryId" /></td>
                    </tr>
                    <tr>
                        <td align="right">Name &nbsp;<font style="color:red">*</font></td>
                    <td><input type="text" size="40" id="prod_Name" name="prod_Name" /></td>
                    </tr>
                    <tr>
                        <td width="15%" align="right">Quantity &nbsp<font style="color:red">*</font></td>
                    <td width="85%"><input type="text" size="30" id="prod_Qty" name="prod_Qty" /></td>
                    </tr>
                    <tr>
                        <td align="right">Price &nbsp;<font style="color:red">*</font></td>
                    <td><input type="text" size="20" name="prod_Price" id="prod_Price" /></td>
                    </tr>
                    <tr>
                        <td align="right">Image &nbsp;<font style="color:red">*</font></td>
                    <td><input type="file" name="fileToUpload" id="fileToUpload" size="18" /></td>
                    </tr>

                    <tr>
                        <td valign="top" align="right">Description &nbsp;<font style="color:red">*</font></td>
                    <td><textarea id="prod_Comment" rows="7" cols="80" name="prod_Comment" OnKeyPress="GetKeyPress();"></textarea></td>
                    </tr>
                    <tr>
                        <td valign="top" align="right">Hotdeals
                        </td>
                        <td><input type="checkbox"  name="hotdeals" size="50" id="hotdeals" checked/></td>
                    </tr>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td> <p style="color: red;">* required </p>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="Submit" value="Submit" id="buttonForm" onclick="return validateForm();" />
                            &nbsp; <input type="reset" value="Cancel" name="reset">
                        </td>
                    </tr>
                    </tbody></table>

            </div>
        </form>
    </body>
</html>
