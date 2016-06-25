<div class="menudiv" style="width: 860px; 
     -moz-border-radius: 0px;
     -webkit-border-radius: 0px;
     -khtml-border-radius: 0px;
     border-radius: 0px;">

    <?php
    if (isset($_SESSION['hardware_user_id'])) {
        ?>
        <div class="menulinks">

            <ul>
                <li><a href="javascript:invokeAjax('dashboard.php', '', '#adminDynamicDiv');">Home</a></li>
                <li><a href="javascript:invokeAjax('products/adminproductlistPaginated.php?page=1', '', '#adminDynamicDiv');">Products</a></li>
                <li><a href="javascript:invokeAjax('category/admincategorylistPaginated.php?page=1', '', '#adminDynamicDiv');">Category</a></li>
                <li><a href="javascript:invokeAjax('subcategory/adminsubcategorylistPaginated.php?page=1', '', '#adminDynamicDiv');">Sub Category</a></li>
                <li><a href="javascript:invokeAjax('common/changepassword.php', '', '#adminDynamicDiv');">Change Password</a></li>
                <li><a href="?logout">Logout</a></li>
            </ul>
        </div>
    <?php } ?>
</div>