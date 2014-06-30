<!DOCTYPE HTML>

<!--FILE NAME: accountFormResponse.php
WRITTEN BY: Chris
WHEN: June 20 2014
PURPOSE:-->

<?php
require_once("common.inc");
if (!connect(1)){
   error(mysql_error(), mysql_errno());
}else{
   echo "Successfully Connected";
  
   //extract user id from URL
   $id = $_GET['id'];
}

?>

<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title> Create an Account</title>
  <link type="text/css" href="style.css" rel="stylesheet"/>
  <link rel="shortcut icon" href="greenHanger.jpg">
</head>
<body>

  <div class style="background-color: white; position: absolute; width: 80%;"/>

  <?php
     if (!$id)
     {
        echo "User not created<br/>";
     }
     else
     {
	echo "Created new user (id=$id)<br/>";
        //from the user table, get the first name of the person who just made an account using their uid
        $para = 'first';
        $table = 'user';
        $firstName = getResult($id,$para,$table);
        echo "Hi $firstName! Welcome to the Family!<br>";
        echo "<a href='profile.php?id=$id'>Visit your Profile page!</a>"; //link to profile page with id included in URL
     }
  ?>

  

  <div id="footer">
    <p>(c) Chris & Cheese
  </div> 

</body>
</html>
