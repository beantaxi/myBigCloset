<!DOCTYPE HTML>

<!--
FILE NAME: cart.php
WRITTEN BY: Chesley                                                                                                                                \
WHEN: June 26 2014
PURPOSE: the cart for items a user wants delivered to them/to be picked up?
-->

<?php
require_once("Dao.cls.php");
$dao = new Dao();
//extract user id and iid from URL
$id = $_GET['id']; //user id
$iid = $_GET['iid']; //item id
$user = $dao->getUser($id);
$firstName = $user['first'];
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title> <?php echo $firstName."'s Cart" ?> </title>
	<link type="text/css" href="style.css" rel="stylesheet"/>
	<link rel="shortcut icon" href="greenHanger.jpg">
</head>
<body>

   <div class style="background-color: white; width: 80%;"/>
   <?php

	echo "$firstName's Cart";

	$item = $dao->getItem($iid, $debug);

	echo "<table>";
	//for all items
	//get name, description, item id and print them out in table form
	$name = $item['name'];
	$description = $item['description'];
	$iid = $item['iid'];
	$cartLink = "<a href='cart.php?id=$id&iid=$iid'>Add item to your cart</a>";
	echo "<tr> <td> <img src='greenHanger.jpg' alt='Item Image' height='42' width='42'></td>".
		 "<td>Item</td> <td>$iid</td> <td><b>$name</b></td> <td>$description</td>".
		 "<td>$cartLink</td></tr>";
	echo "</table>";

	echo "<a href='closet.php?id=$id'>Return to your Closet</a><br>"; //return to Closet

   ?>

   <div id="footer">
     <p>(c) Chris & Cheese
   </div>

 </body>
</html>