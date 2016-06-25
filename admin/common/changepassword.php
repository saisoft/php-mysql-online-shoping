
<?php
require_once '../../library/config.php';
require_once '../../library/functions.php';
require_once '../library/functions.php';

$errorMessage = '&nbsp;';

if (isset($_POST['oldTxtPassword'])) {
    $result = doChangePassword();

    if ($result != '') {
        $errorMessage = $result;
    }
} else {
    renderCngPwdForm("", "", "", $errorMessage);
}

function renderCngPwdForm($oldTxtPassword, $newTxtPassword, $confirmTxtPassword, $errorMessage) {
    ?>
    <html>
        <head>
            <title>Change Password</title>
            <script type="text/javascript">
                submitForm = function(){
                    var oldTxtPassword = $('#oldTxtPassword').val();
                    var newTxtPassword = $('#newTxtPassword').val();
                    var confirmTxtPassword = $('#confirmTxtPassword').val();
                                        
                    var dataString = {  
                        "oldTxtPassword" : oldTxtPassword,
                        "newTxtPassword" : newTxtPassword,
                        "confirmTxtPassword" : confirmTxtPassword
                    };
                        
                    invokeAjax("common/changepassword.php", dataString, "#adminDynamicDiv");
                }            
            </script>

        <div style="height: 400px; background: none repeat-y scroll 0 0 #ffffff;">
            <div class="errorMessage" align="center"><?php echo $errorMessage; ?></div>
            <div class="logintitle" style="border: 10px outset; height: 145px; width: 250px; left: 280px; position: relative">
                <div class="logintitle">
                    :: Admin Change Password ::    
                </div>      
                <div class="loginsubtitle">
                    Old Password : 
                </div>    
                <div class="loginbox">
                    <input name="txtPassword" type="password" class="box" id="oldTxtPassword" value="<?php echo $oldTxtPassword; ?>" size="10"/>
                </div> 
                <div class="loginsubtitle">
                    New Password : 
                </div>    
                <div class="loginbox">
                    <input name="txtPassword" type="password" class="box" id="newTxtPassword" value="<?php echo $newTxtPassword; ?>" size="10"/>
                </div> 
                <div class="loginsubtitle">
                    Confirm Password : 
                </div>    
                <div class="loginbox">
                    <input name="txtPassword" type="password" class="box" id="confirmTxtPassword" value="<?php echo $confirmTxtPassword; ?>" size="10"/>
                </div>  
                <div class="logintitle">
                    <input name="btnChangePassword" type="button" class="box" id="btnLogin" value="Change Password" onclick="submitForm();"/>
                </div>
            </div> 
        </div>  
    </form>
    </body>
    </html>
    <?php
}
?>