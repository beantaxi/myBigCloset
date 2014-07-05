<?php
require_once("Dao.cls.php");
$dao = new Dao();
$uid = $_GET['id'];
$user = $dao->getUser($uid);
$cart = $dao->getCart($uid);
$title = "Successfully Added";
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
			<br/><p/>
		</div>
		<div id='content'>
			That item was successfully added, <?= $user->first ?>!
			<br/><p/>
			<b>Current cart contents</b><br/>
			<table>
			<?php
			foreach ($cart as $item)
			{
				echo "<tr> <td><img src='$item->photo' alt='Item Image' height='42' width='42'/></td> <td>$item->name</td> <td>$item->description</td> </tr>";
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
