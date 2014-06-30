<!DOCTYPE HTML>

<!--                                                                                                                                                
FILE NAME: accountSettings.php                                                                                                                   
WRITTEN BY: Chesley                                                                                                                                \
WHEN: June 26 2014                                                                                                                                  
PURPOSE: user edits their account here
-->

<?php

require_once("common.inc");
if (!connect(1)){
   error(mysql_error(), mysql_errno());
}else{
   echo "Successfully Connected";

   //extract user id from URL
   $id = $_GET['id'];
}

$table = 'user';
echo $id;

$first = getResult($id,'first',$table);
$last = getResult($id,'last',$table);
$birthdate = getResult($id,'birthdate',$table);
$email = getResult($id,'email',$table);
$street = getResult($id,'street',$table);
$city = getResult($id,'city',$table);
$state = getResult($id,'state',$table);
$zip = getResult($id,'zip',$table);
$phone = getResult($id,'phone',$table);

?>

<html>
 <head>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8">
   <title> <?php echo $first."'s Settings" ?> </title>
   <link type="text/css" href="style.css" rel="stylesheet"/>
   <link rel="shortcut icon" href="greenHanger.jpg">
 </head>
 <body>

   <div class style="background-color: white; width: 80%;"/>

   <?php
	echo $first."'s	Account Settings<br>";
	echo $first."<br>";
	echo $last."<br>";
	echo $birthdate."<br>";
	echo $email."<br>";
	echo $street."<br>";
	echo $city."<br>";
	echo $state."<br>";
	echo $zip."<br>";
	echo $phone."<br>";
	echo "<a href='profile.php?id=$id'>Return to your Profile</a><br>";
   ?>

   
   <div id="footer">
     <p>(c) Chris & Cheese
   </div>

 </body>
</html>