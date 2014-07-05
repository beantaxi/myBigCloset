<!DOCTYPE HTML>

<!--
FILE NAME: cart.php
WRITTEN BY: Chesley                                                                                                                                \
WHEN: June 26 2014
PURPOSE: the cart for items a user wants delivered to them/to be picked up?
-->

<?php
require_once("Dao.cls.php");
$debug = 0;
$dao = new Dao($debug);
//extract user id and iid from URL
$uid = $_GET['id']; //user id
$user = $dao->getUser($uid, $debug);
$cart = $dao->getCart($uid, $debug);
$title = "$user->first's Cart";
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title> <?= $title ?></title>
	<link type="text/css" href="style.css" rel="stylesheet"/>
	<link rel="shortcut icon" href="greenHanger.jpg">
</head>
<body>
	<div id='header'>
			<?= $title ?>
			<br/><p/>
	</div>
 	<div id='content'>
		<form class='standardForm' action='shipCartAction.php' method='post'>
			<table>
			<?php
			if (count($cart) == 0)
			{
				echo "Your cart is empty, $user->first<br/><p/>";
			}
			else
			{
				foreach ($cart as $item)
				{
					echo "<tr> <td><img src='$item->photo' alt='Item Image' height='42' width='42'/></td> <td>$item->name</td> <td>$item->description</td> </tr>";
				}
				?>
				</table>
				<input type='submit' value='Ship It!'/>
				<input type='hidden' name='uid' value='<?= $uid ?>'/>
			<?php
			}
			?>
		</form>
		<br/><p/>
		<?= "<a href='closet.php?id=$uid'>Return to your Closet</a>" ?><br> <!-- return to Closet -->
	</div>

   <div id="footer">
     <p>(c) Chris & Cheese
   </div>

 </body>
</html>