<!DOCTYPE HTML>

<!--                                                                                                                                                
FILE NAME: closet.php                                                                                                                   
WRITTEN BY: Chesley                                                                                                                                \
WHEN: June 26 2014                                                                                                                                  
PURPOSE: where user views items in their closet
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

echo $id;

$first = getResult($id,'first','user'); //get first name of user

$items = getResult($id,'name','item'); //get names of items stored in user's closet
echo $items;

$description =  getResult($id,'description','item'); //get description of items stored
echo $description;
?>

<html>
 <head>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8">
   <title> <?php echo $first."'s Closet" ?> </title>
   <link type="text/css" href="style.css" rel="stylesheet"/>
   <link rel="shortcut icon" href="greenHanger.jpg">
 </head>
 <body>

   <div class style="background-color: white; width: 80%;"/>

   <?php
	echo $first."'s Closet<br>";

	//get items from table that belong to user
	$items = getItems($id, 'uid');
	$nItems = count($items); 
	echo "$nItems item(s)<br/>";

	//table of items and descriptions
	echo "<table>";
	//for all items
	foreach ($items as $item)
	{
		//get name, description, item id and print them out in table form
		$name = $item['name'];
        	$description = $item['description'];
        	$iid = $item['iid'];
		$cartLink = "<a href='cart.php?id=$id&iid=$iid'>Add item to your cart</a>";
        	echo "<tr> <td> <img src='greenHanger.jpg' alt='Item Image' height='42' width='42'></td>".
		     "<td>Item</td> <td>$iid</td> <td><b>$name</b></td> <td>$description</td>".
		     "<td>$cartLink</td></tr>";
	}
	echo "</table>";

	echo "<a href='profile.php?id=$id'>Return to your Profile</a><br>"; //link to profile page
   ?>

   <div id="footer">
     <p>(c) Chris & Cheese
   </div>

 </body>
</html>