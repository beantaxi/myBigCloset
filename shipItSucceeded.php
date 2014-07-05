<?php
require_once("Dao.cls.php");
$debug = 0;
$dao = new Dao($debug);
$uid = $_GET['id'];
$user = $dao->getUser($uid, $debug);
$title = "Ship It Succeeded!";
?>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title> <?= $title ?>  </title>
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
		<div id='content'/>
			Your items are shipping, <?= $user->first ?>!
			<br/><p/>
			They should arrive within 24-36 hours.
			<br/><p/>
			Return to <?= "<a href='closet.php?id=$uid'>" ?>Your Closet</a><br/>
		</div>
		<div id="footer">
			<p>(c) Chris & Cheese
		</div>  
	</body>
</html>