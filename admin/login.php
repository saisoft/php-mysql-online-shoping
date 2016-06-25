<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php
require_once '../library/config.php';
require_once './library/functions.php';

$errorMessage = '&nbsp;';

if (isset($_POST['txtUserName'])) {
    $result = doLogin();

    if ($result != '') {
        $errorMessage = $result;
    }
}
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
    <head>
        <link href="../css/main.css" rel="stylesheet" type="text/css" />
        <link href="../css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="Shortcut Icon" href="../img/favicon.ico" type="image/x-icon" />
        <title>BLUE CAT COMPUTERS - HOME</title>

        <script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="../js/commonfunctions.js"></script>
        <script type="text/javascript" src="../js/jquery.form.js"></script>
                
    </head>
    <body>

        <?php include("header.php"); ?>
         <?php include("menu.php"); ?>
        <div class="loginDiv">
            <form method="post" name="frmLogin" id="frmLogin">
            <div style="height: 400px; background: none repeat-y scroll 0 0 #ffffff;">
                <div class="errorMessage" align="center"><?php echo $errorMessage; ?></div>
                <div class="logintitle" style="border: 10px outset; height: 115px; width: 250px; left: 300px; position: relative">
                <div class="logintitle">
                            :: Admin Login ::    
                        </div>      
                        <div class="loginsubtitle">
                            User Name : 
                        </div>
                        <div class="loginbox">
                            <input name="txtUserName" type="text" class="box" id="txtUserName" value="" size="10" maxlength="20"/>
                        </div>     
                        <div class="loginsubtitle">
                            Password : 
                        </div>    
                        <div class="loginbox">
                            <input name="txtPassword" type="password" class="box" id="txtPassword" value="" size="10"/>
                        </div>  
                        <div class="logintitle">
                            <input name="btnLogin" type="submit" class="box" id="btnLogin" value="Login"/>
                        </div>
                   </div> 
            </div>  
            </form>
        </div>
        <?php include("footer.php"); ?>

    </body>
</html>