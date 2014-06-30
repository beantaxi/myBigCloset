<!DOCTYPE HTML>

<!--
FILE NAME: cart.php
WRITTEN BY: Chesley                                                                                                                                \
WHEN: June 26 2014
PURPOSE: the cart for items a user wants delivered to them/to be picked up?
-->

<?php

require_once("common.inc");
if (!connect(1)){
   error(mysql_error(), mysql_errno());
}else{
   echo "Successfully Connected";

   //extract user id and iid from URL
   $id = $_GET['id']; //user id
   $iid = $_GET['iid']; //item id

}

$first = getResult($id,'first','user');

?>

<html>
 <head>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8">
   <title> <?php echo $first."'s Cart" ?> </title>
   <link type="text/css" href="style.css" rel="stylesheet"/>
   <link rel="shortcut icon" href="greenHanger.jpg">
 </head>
 <body>

   <div class style="background-color: white; width: 80%;"/>

   <?php
   echo $first."'s Cart";   

   $items = getItems($iid,'iid');
  
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

    echo "<a href='closet.php?id=$id'>Return to your Closet</a><br>"; //return to Closet

   ?>

   <div id="footer">
     <p>(c) Chris & Cheese
   </div>

 </body>
</html>