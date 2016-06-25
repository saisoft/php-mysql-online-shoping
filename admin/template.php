<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php
require_once '../library/config.php';
require_once './library/functions.php';
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
        <script type="text/javascript">
            loadDashboard = function(){
                invokeAjax('dashboard.php', '', '#adminDynamicDiv');
            }
        </script> 
    </head>
    <body onload="loadDashboard();">

        <?php include("header.php"); ?>
        <?php include("menu.php"); ?>
        <div class="loginDiv">
         <div id='adminDynamicDiv' itemid='adminDynamicDiv' style="height: 400px; background: none repeat-y scroll 0pt 0pt rgb(255, 255, 255); overflow: auto;">
                      
         </div>    
        </div>
       
        <?php include("footer.php"); ?>

    </body>
</html>