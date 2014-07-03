<!DOCTYPE HTML>

<!--
FILE NAME: closet.php
WRITTEN BY: Chesley                                                                                                                                \
WHEN: June 26 2014
PURPOSE: where user views items in their closet
-->

<?php
require_once("Dao.cls.php");
$debug = 0;
$dao = new Dao($debug);
$uid = $_GET['id'];
$user = $dao->getUser($uid, $debug);
$items = $dao->getItems($uid, $debug);
$nItems = count($items);
$title = "$user->first's Closet";
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title> <?= $title ?> </title>
	<link type="text/css" href="style.css" rel="stylesheet"/>
	<link rel="shortcut icon" href="greenHanger.jpg">
</head>
<body>
	<div id='header'>
		<?= $title ?>
		<?php
		if ($user)
		{
			echo "<a href='cart.php?id=$uid'>View Cart</a>";
		}
		?>
		<br/><p/>
	</div>

	<div class style="background-color: white; width: 80%;"/>
	<!-- table of items and descriptions -->
	<table>
	<?php
	//for all items
	foreach ($items as $item)
	{
		//get name, description, item id and print them out in table form
		$cartLink = "addToCart.php?id=$uid&iid=$item->iid";
		?>
		<tr> 
			<td> <?= "<img src='$item->photo' alt='Item Image' height='42' width='42'/>" ?></td>
			<td>Item</td>
			<td><?= $item->iid ?></td>
			<td><b><?= $item->name ?></b></td>
			<td><?= $item->description ?></td>
		   <td><?= $item->isShipped ? "Shippped!" : "" ?></td>
		   <td><?= !$item->isShipped ? "<a href='$cartLink'>Add to Cart</a>" : "" ?></td>
		</tr>
	<?php	    
	}
	?>
	</table>

	<!-- link to profile page -->
	<a href='profile.php?id=<?php echo $uid?>'>Return to your Profile</a><br>


	<div id="footer">
		<p>(c) Chris & Cheese
	</div>

</body>
</html>