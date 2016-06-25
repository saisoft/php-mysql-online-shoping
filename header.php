<?php
include_once 'library/config.php';
include_once 'library/database.php';
include_once 'library/functions.php';
?>

<html>
<head>

<script type="text/javascript">
       function showHotDealPopUp(prodID){
           myRef = window.open('main/productview.php?hotdeal=1&prodkey='+prodID,'mywin',
           'left=20,top=20,width=700,height=400,toolbar=1,scrollbars=1,resizable=0');
       }
</script>

<script type="text/javascript">

    /***********************************************
     * Cross browser Marquee II- © Dynamic Drive (www.dynamicdrive.com)
     * This notice MUST stay intact for legal use
     * Visit http://www.dynamicdrive.com/ for this script and 100s more.
     ***********************************************/

    var delayb4scroll=2000 //Specify initial delay before marquee starts to scroll on page (2000=2 seconds)
    var marqueespeed=2 //Specify marquee scroll speed (larger is faster 1-10)
    var pauseit=1 //Pause marquee onMousever (0=no. 1=yes)?

    ////NO NEED TO EDIT BELOW THIS LINE////////////

    var copyspeed=marqueespeed
    var pausespeed=(pauseit==0)? copyspeed: 0
    var actualheight=''

    function scrollmarquee(){
        if (parseInt(cross_marquee.style.top)>(actualheight*(-1)+8)) //if scroller hasn't reached the end of its height
            cross_marquee.style.top=parseInt(cross_marquee.style.top)-copyspeed+"px" //move scroller upwards
        else //else, reset to original position
            cross_marquee.style.top=parseInt(marqueeheight)+8+"px"
    }

    function initializemarquee(){
        cross_marquee=document.getElementById("vmarquee")
        cross_marquee.style.top=0
        marqueeheight=document.getElementById("marqueecontainer").offsetHeight
        actualheight=cross_marquee.offsetHeight //height of marquee content (much of which is hidden from view)
        if (window.opera || navigator.userAgent.indexOf("Netscape/7")!=-1){ //if Opera or Netscape 7x, add scrollbars to scroll and exit
            cross_marquee.style.height=marqueeheight+"px"
            cross_marquee.style.overflow="scroll"
            return
        }
        setTimeout('lefttime=setInterval("scrollmarquee()",80)', delayb4scroll)
    }

    if (window.addEventListener)
        window.addEventListener("load", initializemarquee, false)
    else if (window.attachEvent)
        window.attachEvent("onload", initializemarquee)
    else if (document.getElementById)
        window.onload=initializemarquee


</script>

<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/commonfunctions.js"></script>

<script type="text/javascript">
    var blink = function(){
        $('#blinker').toggle();
    };
    $(document).ready(function() {
        setInterval(blink, 500);
    });
</script>

<link href="css/main.css" rel="stylesheet" type="text/css" />
<style type="text/css">

    #marqueecontainer {
            height: 57px;
			left: 500px;
			overflow: hidden;
			padding: 2px 2px 2px 4px;
			position: relative;
			width: 200px;
			top: -25px;
    }

    #marqueecontainer a{
        text-decoration:none;
        color: #006969;
    }

    #marqueecontainer a:hover {
        color:black;
        text-decoration:none;
    }


</style>

</head>
<body>
<div class="headerdiv">
	<div style="height:46px; background-image: url('img/topgrd.jpg'); border-radius: 30px 30px 0 0;"></div>
    <div class="companylogo">
        <a href="/online-shopee"><img width="107" height="100" src="img/pearl.jpeg" /></a>
    </div>
    <div class="companyname">
        <!--<font color="FFaa00">Company Name</font> <font color="snow">Here</font>-->
        <font color="#2375ab">Online</font> <font color="#555555">Shopee</font> <font size="3" color="#666666">SYSTEMS</font>
    </div>
	<div class="companymoto">
        <font color="#666666">Every thing in Computers....</font>
    </div>
    <div class="topmenu">
        <!--<a href="/pearltech"><img width="30px" height="30px" src="img/home.png"></a> &nbsp;&nbsp; <a href="contact.php"><img width="30px" height="30px" src="img/contact.gif"></a> &nbsp;&nbsp; <a href="admin"><img width="30px" height="30px" src="img/admin.gif"></a>-->
        <a href="/pearltech">: Home :</a> &nbsp;|&nbsp; <a href="contact.php">: Contact Us :</a> &nbsp;|&nbsp; <a href="admin">: Admin :</a>
    </div>
    <div class="hotdeals" id="blinker"><img height="70px" width="70px" src="img/deals.jpg"/></div>
        <div id="marqueecontainer" onMouseover="copyspeed=pausespeed" onMouseout="copyspeed=marqueespeed">
            <div id="vmarquee" style="position: relative; width: 98%;">

                <!--YOUR SCROLL CONTENT HERE-->
                <?php getHotDeals(); ?>
                <!--YOUR SCROLL CONTENT HERE-->
                <br /><br /><br />
            </div>
        </div>
</div>
</body>
</html>




