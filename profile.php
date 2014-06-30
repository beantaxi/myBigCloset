<!DOCTYPE HTML>

<?php

require_once("common.inc");
if (!connect(1)){
   error(mysql_error(), mysql_errno());
}else{
   echo "Successfully Connected";

   //extract user id from URL
   $id = $_GET['id'];
}

$table = 'user';
echo $id;

$first = getResult($id,'first',$table);
$last = getResult($id,'last',$table);
$birthdate = getResult($id,'birthdate',$table);

?>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title> <?php echo $first."'s Profile" ?>  </title>
    <link type="text/css" href="style.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="greenHanger.jpg">
  <body>
    <div class style="background-color: white; width: 80%;"/>

    <?php

	echo $first."'s Profile<br>";
	echo "$first $last <br> $birthdate <br>";
	echo "<a href='closet.php?id=$id'>View your closet</a><br>"; //link to closet page with id included in URL
	echo "<a href='accountSettings.php?id=$id'>Edit your account</a>"; //link to accountSettings page with id included in URL
    ?>

  </body>
  </head>
</html>