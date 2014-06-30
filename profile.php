<!DOCTYPE HTML>

<?php
require_once("common.inc");
require_once("Dao.cls.php");
$dao = new Dao($debug);
$id = $_GET['id'];
$user = $dao->getUser($id);
$firstName = $user['first'];
$lastName = $user['last'];
$birthDate = $user['birthdate'];
$table = 'user';
echo $id;
?>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title> <?php echo $firstName."'s Profile" ?>  </title>
    <link type="text/css" href="style.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="greenHanger.jpg">
  <body>
    <div class style="background-color: white; width: 80%;"/>

    <?php

	echo $firstName."'s Profile<br>";
	echo "$firstName $lastName<br> $birthDate <br>";
	echo "<a href='closet.php?id=$id'>View your closet</a><br>"; //link to closet page with id included in URL
	echo "<a href='accountSettings.php?id=$id'>Edit your account</a>"; //link to accountSettings page with id included in URL
    ?>

  </body>
  </head>
</html>