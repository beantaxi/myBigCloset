<!DOCTYPE HTML>

<!--
FILE NAME: emailAlreadyExists.php                                                                                                                
WRITTEN BY: Chesley                                                                                                                                 WHEN: June 20 2014                                                                                                                                 
PURPOSE: user is redirected to this page when an email entered in the 
         accountForm already exists in the database                                                                                                
-->

<?php
require_once("common.inc");
?>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title> Email Already Exists </title>
    <link type="text/css" href="style.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="greenHanger.jpg">
  <body>
    <div class style="background-color: white; width: 80%;"/>

    <p>This email already exists in our database! <br>

    <a href="accountForm.php">Return to Create an Account form</a>

  </body>
  </head>
</html>
