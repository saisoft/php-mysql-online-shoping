<?php
// connect to the database
include_once '../library/config.php';
include_once '../library/database.php';
include_once 'library/functions.php';

// get results from database
$result = mysql_query("SELECT count_date, visit_count FROM hardware_shopee.tbl_visitcount;")
        or die(mysql_error());

$ArrayToReturn = '';

while ($row = mysql_fetch_array($result)) {

    $arrayToString = "['" . $row['count_date'] . "'," . $row['visit_count'] . "]";

    $ArrayToReturn = $ArrayToReturn . "," . $arrayToString;
}

$ArrayToReturn = '[' . substr($ArrayToReturn, 1) . ']';
?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/jquery.jqplot.css" />
        <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->

        <!-- BEGIN: load jquery -->
        <script language="javascript" type="text/javascript" src="js/jquery.js"></script>

        <!-- END: load jquery -->

        <!-- BEGIN: load jqplot -->
        <script language="javascript" type="text/javascript" src="js/jquery.jqplot.js"></script>
        <script language="javascript" type="text/javascript" src="js/plugins/jqplot.logAxisRenderer.js"></script>
        <script language="javascript" type="text/javascript" src="js/plugins/jqplot.canvasTextRenderer.js"></script>
        <script language="javascript" type="text/javascript" src="js/plugins/jqplot.canvasAxisLabelRenderer.js"></script>
        <script language="javascript" type="text/javascript" src="js/plugins/jqplot.canvasAxisTickRenderer.js"></script>
        <script language="javascript" type="text/javascript" src="js/plugins/jqplot.dateAxisRenderer.js"></script>
        <script language="javascript" type="text/javascript" src="js/plugins/jqplot.categoryAxisRenderer.js"></script>

        <style type="text/css">
            .jqplot-point-label {white-space: nowrap;}
            /*    .jqplot-yaxis-label {font-size: 14pt;}*/
            /*    .jqplot-yaxis-tick {font-size: 7pt;}*/
            .jqplot { margin: 10px;}

            .DashBoardDiv{
                background-color: #ffffff;
                margin: auto;
                padding: 10px;
                position: relative;
                width: 800px;
            }

            .dashBoardtitle{
                width: 100%;
                height: 30px;
                text-align: center;
                font-weight:bolder;
                font-size: 20px;
                color: blue;
            }

            .dashBoardValue{
                width: 5%;
                height: 30px;
                position: relative;
                float: left;
                text-align: left;
                font-weight:bolder;
                color: red;
            }

            .dashBoardSubtitle{
                width: 28%;
                height: 30px;
                position: relative;
                float: left;
                text-align: right;
                font-weight:bolder;
                color: blue;
            }
        </style>



        <script class="code" type="text/javascript" language="javascript">
            $(document).ready(function(){
                $.jqplot.config.enablePlugins = true;
<?php echo "line2 = " . $ArrayToReturn . ";" ?>
                plot2 = $.jqplot('chart2', [line2], {
                    axes: {
                        xaxis: {
                            renderer: $.jqplot.DateAxisRenderer,
                            label: 'Incliment Occurrance',
                            labelRenderer: $.jqplot.CanvasAxisLabelRenderer,
                            tickRenderer: $.jqplot.CanvasAxisTickRenderer,
                            tickOptions: {
                                // labelPosition: 'middle',
                                angle: 15
                            }

                        },
                        yaxis: {
                            label: 'Incliment Factor',
                            labelRenderer: $.jqplot.CanvasAxisLabelRenderer
                        }
                    }
                });

            });
        </script>


    </head>
    <body>


        <div id="chart2" data-height="100" data-width="600" style="width:700px; height: 200px; margin-top: 20px; margin-left: 20px"></div>

        <div class="DashBoardDiv">
            <div class="dashBoardtitle">
                :: Admin Dashboard ::
            </div>
            <div class="dashBoardSubtitle">
                Over visits till today :
            </div>
            <div class="dashBoardValue">
                <?php echo getOverallVisits(); ?>
            </div>
            <div class="dashBoardSubtitle">
                Over all product views till today :
            </div>
            <div class="dashBoardValue">
                <?php echo getOverallProdViewCounts(); ?>
            </div>
              <div class="dashBoardSubtitle">
                Over visits till today :
            </div>
            <div class="dashBoardValue">
                <?php echo getOverallVisits(); ?>
            </div>
            <div class="dashBoardSubtitle">
                Over all product views till today :
            </div>
            <div class="dashBoardValue">
                <?php echo getOverallProdViewCounts(); ?>
            </div>
              <div class="dashBoardSubtitle">
                Over visits till today :
            </div>
            <div class="dashBoardValue">
                <?php echo getOverallVisits(); ?>
            </div>
            <div class="dashBoardSubtitle">
                Over all product views till today :
            </div>
            <div class="dashBoardValue">
                <?php echo getOverallProdViewCounts(); ?>
            </div>
              <div class="dashBoardSubtitle">
                Over visits till today :
            </div>
            <div class="dashBoardValue">
                <?php echo getOverallVisits(); ?>
            </div>
            <div class="dashBoardSubtitle">
                Over all product views till today :
            </div>
            <div class="dashBoardValue">
                <?php echo getOverallProdViewCounts(); ?>
            </div>
              <div class="dashBoardSubtitle">
                Over visits till today :
            </div>
            <div class="dashBoardValue">
                <?php echo getOverallVisits(); ?>
            </div>
            <div class="dashBoardSubtitle">
                Over all product views till today :
            </div>
            <div class="dashBoardValue">
                <?php echo getOverallProdViewCounts(); ?>
            </div>
              <div class="dashBoardSubtitle">
                Over visits till today :
            </div>
            <div class="dashBoardValue">
                <?php echo getOverallVisits(); ?>
            </div>
            <div class="dashBoardSubtitle">
                Over all product views till today :
            </div>
            <div class="dashBoardValue">
                <?php echo getOverallProdViewCounts(); ?>
            </div>
        </div>
    </body>


</html>