<script type="text/javascript">
    submitSearchForm = function(){
        var searchName = $('#s').val();
        var dataString = {
            "searchName"     : searchName
        };

        invokeAjax("main/searchResult.php", dataString, "#dynamicDiv");
    }
</script>


<div class="menudiv">

    <div class="menulinks">

        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="productlist.php">Product List</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="hotdeals.php">Hot Deals</a></li>
        </ul>
    </div>

    <div id="searchbox">
        <input type="text" name="s" id="s" size="10" value="Search Here" class="textfield" />
        <input type="button" value="" class="button" onclick="submitSearchForm();" />
    </div>
</div>