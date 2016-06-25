// Declaring required variables
var digits = "0123456789";
// non-digit characters which are allowed in phone numbers
var phoneNumberDelimiters = "()- ";
// characters which are allowed in international phone numbers
// (a leading + is OK)
var validWorldPhoneChars = phoneNumberDelimiters + "+";
// Minimum no of digits in an international phone no.
var minDigitsInIPhoneNumber = 10;
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var imgAjaxLoaderLocation = '<img src="img/loading_blue.gif" /><br /><font color="blue" font-weight="bold">Loading...</font>';

var currentActiveMenu;


invokeAjax = function(url, dataString, divName)
{
    showLoading(divName);
    // alert(dataString);
    $.ajax({
        type: "POST",
        url: url,
        data: dataString,
        success : function (data) {
            $(divName).empty();
            $(divName).html(data);           
        }
    });
}

invokeJason = function(url, dataString)
{
    $.ajax({
        type: "POST",
        url: url,
        data: dataString        
    });
}

/*
 Show Loading text while Ajax Request is processing.
 */
showLoading = function(divId) {
    $(divId).empty();
    $(divId).empty().html(imgAjaxLoaderLocation);
}


/*
 Show Loading text while Ajax Request is processing.
 */
hideLoading = function(divId) {
    $(divId).empty();
}

function validateEmailForm() {
    
    var customerName = $('#customerName').val();  
    var customerEmail= $('#customerEmail').val();
    var customerPhone= $('#customerPhone').val();
    var customerComment= $('#customerComment').val();
    var emailSubject = $('#mailSubject').val();
 
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
 
    if (customerName==null || customerName=="")
    {
        $('#frmEmailError').empty().html("First name must be filled out");
        $('#customerName').focus();
        return false;
    }
    if ((customerEmail==null)||(customerEmail=="")){
        $('#frmEmailError').empty().html("Customer email must be filled out");
        $('#customerEmail').focus();
        return false;
    } 
    if(reg.test(customerEmail) == false) {
        alert("Invalid Email Address");
        $('#customerEmail').focus();
        return false;
    }
   
    if ((customerPhone==null)||(customerPhone=="")){
        $('#frmEmailError').empty().html("Please Enter your Phone Number");        
        $('#customerPhone').focus();
        return false;
    }
    if (checkInternationalPhone(customerPhone)==false){
        $('#frmEmailError').empty().html("Please Enter a Valid Phone Number");
        $('#customerPhone').val= "";
        $('#customerPhone').focus();
        return false
    }

    if (customerComment==null || customerComment=="")
    {
        $('#frmEmailError').empty().html("Query must be filled out");     
        $('#customerComment').focus();
        return false;
    }
    
    var customerName = $('#customerName').val();  
    var customerEmail= $('#customerEmail').val();
    var customerPhone= $('#customerPhone').val();
    var customerComment= $('#customerComment').val();
    var emailSubject = $('#mailSubject').val();
    
    var dataString = {  
        "customerName" : customerName,
        "customerEmail" : customerEmail,
        "customerPhone" : customerPhone,
        "customerComment" : customerComment,
        "emailSubject" : emailSubject
    };
    
    invokeJason("http://www.saisoft.co.in/mail.php", dataString);
    $('#frmEmailError').empty().html("<div style='color: green;'>Message Sent Successfully</div>");
    return true; 
}

function checkInternationalPhone(strPhone){
    var bracket=3
    strPhone=trim(strPhone)
    if(strPhone.indexOf("+")>1) return false
    if(strPhone.indexOf("-")!=-1)bracket=bracket+1
    if(strPhone.indexOf("(")!=-1 && strPhone.indexOf("(")>bracket)return false
    var brchr=strPhone.indexOf("(")
    if(strPhone.indexOf("(")!=-1 && strPhone.charAt(brchr+2)!=")")return false
    if(strPhone.indexOf("(")==-1 && strPhone.indexOf(")")!=-1)return false
    s=stripCharsInBag(strPhone,validWorldPhoneChars);
    return (isInteger(s) && s.length >= minDigitsInIPhoneNumber);
}

function stripCharsInBag(s, bag)
{
    var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++)
    {   
        // Check that current character isn't whitespace.
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}

function trim(s)
{
    var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not a whitespace, append to returnString.
    for (i = 0; i < s.length; i++)
    {   
        // Check that current character isn't whitespace.
        var c = s.charAt(i);
        if (c != " ") returnString += c;
    }
    return returnString;
}


function isInteger(s)
{
    var i;
    for (i = 0; i < s.length; i++)
    {   
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}



