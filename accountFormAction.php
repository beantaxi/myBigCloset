<!DOCTYPE HTML>

<!--FILE NAME: accountFormAction.php
WRITTEN BY: Chesley
WHEN: June 20 2014
PURPOSE: stuff to create an account
-->

<?php
require_once("common.inc");
$pdo = connect($DSN, "chez", "chez", 1);
$debug = 1;

//extract provided information from the account form
if (isset($_POST['first']))
{
	$first = $_POST['first'];
	$last= $_POST['last'];
	$birthdate = $_POST['birthdate'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$pw = $_POST['pw']; //password
	$pwConf = $_POST['pwConf']; //second entry of desired pw for confirmation

	echo "First: $first <br> Last: $last <br> bday: $birthdate <br> email: email <br> ".
	   "Phone: $phone <br> address: $street <br> $city, $state $zip <br> your secret password is: $pw <br> again: $pwConf<br>";

	$id = addToUser($pdo, $first,$last,$birthdate,$email,$phone,$street,$city,$state,$zip,$pw,$pwConf);

	if ($id==0)
	{ //if the email already exists
		echo "Email Already Exists!<br/>";
		$url = "emailAlreadyExists.php"; //redirect to page specifically for email already exists error
	}
    elseif ($id == -1)
    { //if the passwords given do not match
		echo "Your passwords do not match!<br>";
		$url = "passwordMismatch.php"; //redirect to specific error page
	}
	else //the email does not already exist- there is an id other than 0 returned by addToUser function
	{
		echo "Created new user (id=$id)<br/>";
		$url = "accountFormResponse.php?id=$id";
	}
}

//inserts users provided info into the user table
function addToUser($pdo, $first,$last,$birthdate,$email,$phone,$street,$city,$state,$zip,$pw,$pwConf){

   //check if email exists in database already. If it does, do not create an account with it!
   $emailExists = doesEmailExist($pdo, $email);
   $pwCheck = passwordCheck($pw,$pwConf);

   //if the email does not exist and the passwords match
   if ($emailExists == FALSE & $pwCheck == TRUE)
   {
      $insert = "INSERT into user(first,last,birthdate,email,phone,street,city,state,zip,pw) ".
                "values('$first','$last','$birthdate','$email','$phone','$street','$city','$state','$zip','$pw')";
      query($pdo, $insert);
      $id = $pdo->lastInsertId(); //grab id from what we just instered
   }
   elseif ($pwCheck == FALSE){
      echo "Your passwords do not match, try again!";
      $id = -1;
      //will direct to a page specific to this error
   }
   else
   {
      echo "This email is already tied to an account!";
      $id = 0;
      //if exists, we will redirect to separate page entirely
   }
   return $id;
}

//checks the provided email against the user table to see if it is already in use
//returns True if the email exists in the database, False if not.
function doesEmailExist($pdo, $email)
{
	$sql = "SELECT count(*) from user where email = '$email'";
	$count = query($pdo, $sql, $debug);
	$numRows = mysql_num_rows($rs);
	if ($numRows > 0)
	{
		return TRUE;
	}
	return FALSE;
}

//returns True if the passwords given match each other, False if not.
function passwordCheck ($pw, $pwConf){
  if (strcmp($pw, $pwConf) == 0){ //not strings, case sensitive
    return TRUE;
  }
  return FALSE;
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

<div class style="background-color: white; width: 80%;"/>

<?php
redirect($url, 1);
?>

<div id="footer">
    <p>(c) Chris & Cheese
</div>

</body>
</html>
