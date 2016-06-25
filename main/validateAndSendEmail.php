<?php

$customerName = $_POST["customerName"];
$customerEmail = $_POST["customerEmail"];
$customerPhone = $_POST["customerPhone"];
$customerComment = $_POST["customerComment"];
$emailSubject = $_POST["emailSubject"];


$postField = "customerName=".$customerName."&"."customerEmail=".$customerEmail."&"."customerPhone=".$customerPhone."&"."customerComment=".$customerComment."&"."emailSubject=".$emailSubject;

$curlInit = curl_init('http://www.saisoft.co.in/mail.php');
curl_setopt($curlInit, CURLOPT_POST, 1);
curl_setopt($curlInit, CURLOPT_POSTFIELDS, $postField);
curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curlInit);
curl_close($curlInit);
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
