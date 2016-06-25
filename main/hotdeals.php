        <script type="text/javascript">
            function showHotDealPopUp(prodID){
                myRef = window.open('main/productview.php?hotdeal=1&prodkey='+prodID,'mywin',
                'left=20,top=20,width=700,height=400,toolbar=1,scrollbars=1,resizable=0');
            }
        </script>


        <script type="text/javascript">
            $(function(){
                var offsetX = 20;
                var offsetY = 10;
                $('a.hover').hover(function(e){
                    var href = $(this).attr('href');
                    $('<img id="largeImage" src="' + href + '" alt="image" />')
                    .css({'top':e.pageY + offsetY,'left':e.pageX + offsetX})
                    .appendTo('body');
                }, function(){
                    $('#largeImage').remove();
                });
                $('a.hover').mousemove(function(e){
                    $('#largeImage').css({'top':e.pageY + offsetY,'left':e.pageX + offsetX});
                });
                $('a.hover').click(function(e){
                    e.preventDefault();
                });
            });
        </script>


        <div class="maincontents">

            <div class="mainText" style="position: relative; overflow: auto ">



                <?php
                include_once 'library/config.php';



                $result = dbQuery("SELECT pd_id AS PRODUCTID, pd_name AS PRODUCTNAME,  pd_description AS PRODUCTDESC,
pd_price AS PRODUCTPRICE, pd_qty AS PRODUCTQTY, pd_image AS PRODUCTIMAGE, pd_thumbnail AS PRODUCTTHUMBNAIL,
pd_views as PRODUCTVIEWS FROM tbl_product
WHERE
hotdeals = '1';");

                while ($row = mysql_fetch_array($result)) {
                    $productDesc = $row['PRODUCTDESC'];
                    $productDescDisplay = substr($productDesc, 0, 40) . "...";
                    echo "<div class='product' style='width: 823px'>";
                    echo "<div class='productThumbnail'><a href='img/" . $row['PRODUCTIMAGE'] . "' class='hover'><img height='70' border='0' width='70' alt='" . $row['PRODUCTNAME'] . "' src='img/" . $row['PRODUCTIMAGE'] . "'/></a></div>";
                    echo "<div class='details'>";
                    echo '<div class="productName"><a href=\'JavaScript:showHotDealPopUp('. $row['PRODUCTID'] . ');\'>' . $row['PRODUCTNAME'] . '</a></div>';
                    echo "<div class='productDesc'>" . $productDescDisplay . "</div>";
                    echo "<div class='productPrice'>Price : " . $row['PRODUCTPRICE'] . "</div>";
                    echo "</div>";
                    echo "<div class='hotdeals' id='blinker'><img height='85px' width='110px' src='img/deals.jpg'/></div>";
                    echo "<div class='views'>Views<br />&nbsp;&nbsp;&nbsp;" . $row['PRODUCTVIEWS'] . "</div>";
                    echo "</div>";
                }
                ?>


            </div>
        </div>
