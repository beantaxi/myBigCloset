<!DOCTYPE HTML>

<!--
FILE NAME: closet.php
WRITTEN BY: Chesley                                                                                                                                \
WHEN: June 26 2014
PURPOSE: where user views items in their closet
-->

<?php
require_once("Dao.cls.php");
$dao = new Dao($debug);
$id = $_GET['id'];
$user = $dao->getUser($id);
$firstName = $user['first'];
$items = $dao->getItems($id);
$nItems = count($items);
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title> <?php echo "$firstName's Closet" ?> </title>
	<link type="text/css" href="style.css" rel="stylesheet"/>
	<link rel="shortcut icon" href="greenHanger.jpg">
</head>
<body>
	<div id='header'>
	<?php echo $firstName ?>'s Closet<br/><p/>
	</div>

	<div class style="background-color: white; width: 80%;"/>
	<!-- table of items and descriptions -->
	<table>
	<?php
	//for all items
	foreach ($items as $item)
	{

		//get name, description, item id and print them out in table form
		$name = $item['name'];
		$description = $item['description'];
		$iid = $item['iid'];
		$cartLink = "addToCart.php?id=$id&iid=$iid";
		echo "<tr> <td> <img src='greenHanger.jpg' alt='Item Image' height='42' width='42'></td>".
		     "<td>Item</td> <td>$iid</td> <td><b>$name</b></td> <td>$description</td>".
		     "<td><a href='$cartLink'>Add to Cart</a></td></tr>";
	}
	?>
	</table>

	<!-- link to profile page -->
	<a href='profile.php?id=<?php echo $id?>'>Return to your Profile</a><br>


	<div id="footer">
		<p>(c) Chris & Cheese
	</div>

</body>
</html>