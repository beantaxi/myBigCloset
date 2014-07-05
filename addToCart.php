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
$user = $dao->getUser($id, $debug);
$item = $dao->getItem($iid, $debug);
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title> <?= $user->first ?>'s Cart</title>
	<link type="text/css" href="style.css" rel="stylesheet"/>
	<link rel="shortcut icon" href="greenHanger.jpg">
</head>
<body>
	<div id='header'>
		Item(s) to Add to <?= $user->first ?>'s Cart
	</div>

   <div class style="background-color: white; width: 80%;"/>
	Would you like to add these item(s), <?= $user->first ?>?
	<form class='standardForm' action='addToCartAction.php' method='post'>
		<table>
		<!-- for all items get name, description, item id and print them out in table form -->
			<tr> 
				<td><?= "<img src='$item->photo' alt='Item Image' height='42' width='42'>" ?></td>
				<td>Item</td>
				<td><?= $iid ?></td>
				<td><b><?= $item->name ?></b></td>
				<td><?= $item->description ?></td>
				<td><input type='hidden' name='id' value='<?= $id ?>'/></td>
				<td><input type='hidden' name='iid' value='<?= $iid ?>'/></td>
			</tr>
		</table>
		<input type='submit' value='Add Item(s)'/>
	</form>
	<a href='closet.php?id=<?= $id ?>'>Return to your Closet</a><br> <!-- return to Closet -->
	</div>

   <div id="footer">
     <p>(c) Chris & Cheese
   </div>

 </body>
</html>