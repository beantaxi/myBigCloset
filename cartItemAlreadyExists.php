<?php
require_once("Dao.cls.php");
$dao = new Dao();
$uid = $_GET['id'];
$user = $dao->getUser($uid);
$cart = $dao->getCart($uid);
$title = "Item already exists";
$urlCloset = "closet.php?id=$uid";
?>

<html>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title> <?= $title ?> </title>
	<link type="text/css" href="style.css" rel="stylesheet"/>
	<link rel="shortcut icon" href="greenHanger.jpg">
	<body>
		<div id='header'>
			<?= $title ?>
			<?php
			if ($user)
			{
				echo "<a href='cart.php?id=$uid'>View Cart</a>";
			}
			?>
		</div>
		<div id='content'>
			That item already exists in your cart, <?= $user->first ?>!
			<br/><p/>
			<table>
			<?php
			foreach ($cart as $item)
			{
				echo "<tr> <td>$item->name</td> <td>$item->description</td> </tr>";
			}
			?>
			</table>
			<br/><p/>
			<a href='<?= $urlCloset ?>'>Return to your closet</a><br/>
		</div>
		<div id="footer">
			<p>(c) Chris & Cheese
		</div>  
	</body>
</html>
