<?php
require_once("Dao.cls.php");
$debug = 0;
$dao = new Dao();
$email = $_POST['email'];
$password = $_POST['password'];
try
{
	$user = $dao->validateUser($email, $password);
	$url = "profile.php?id=$user->uid";
}
catch (Exception $ex)
{
	echo $ex->getCode();
	if ($ex->getCode() == $ERR_ValidationFailed)
	{
		$url = "validationFailed.php";
	}
	else
	{
		throw $ex;
	}
}
finally
{
	redirect($url, $debug);
}

?>

<pre>
email = <?=$email?>

password = <?=$password?>
</pre>
