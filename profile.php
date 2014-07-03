<!DOCTYPE HTML>

<?php
require_once("Dao.cls.php");
$debug = 0;
$dao = new Dao($debug);
$uid = $_GET['id'];
$user = $dao->getUser($uid, $debug);
$title = "$user->first's Profile";	
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
			<?= "$user->first $user->last" ?><br/>
			<?= $user->email ?><br/>
			<?= $user->birthdate ?><br/>
			
			<br/><p/>
			<?= "<a href='closet.php?id=$uid'>View your closet</a>" ?><br/>           <!-- link to closet page with id included in URL -->
			<?= "<a href='accountSettings.php?id=$uid'>Edit your account</a>" ?><br/> <!-- link to accountSettings page with id included in URL -->
		</div>
		<div id="footer">
			<p>(c) Chris & Cheese
		</div>  
	</body>
</html>