<!DOCTYPE HTML>

<!--                                                                                                                                                
FILE NAME: passwordMismatch.php                                                                                                                   
WRITTEN BY: Chesley                                                                                                                                \
WHEN: June 25 2014                                                                                                                                  
PURPOSE: user is redirected to this page when the password and password confirmation they 
         provided in the accountForm do not match                                                                                                   -->

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

    <p>Your passwords do not match! Click below to try again. <br>

    <a href="accountForm.php">Return to Create an Account form</a>

  </body>
  </head>
</html>

