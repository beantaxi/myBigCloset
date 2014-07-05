<?php
require_once("../Dao.cls.php");
$dao = new Dao();
$title = "Add Item";

function getUserSelect ($dao)
{
	global $debug;
	global $_SESSION;
	session_start();
	$uid = $_SESSION['uid'];
	
	$s = "<select name='uid'>";
	$users = $dao->getAllUsers("email", $debug);
	foreach ($users as $user)
	{
		$option = "<option value='$user->uid'";
		if ($user->uid == $uid)
		{
			$option .= " selected";
		}
		$option .= ">$user->email</option>";
		$s = $s . $option;
	}
	$s = $s . "</select>";
	
	return $s;
}


function selectUserForm ($dao)
{
	$userSelect = getUserSelect($dao);
	echo <<< S
<form action='selectUserAction.php' method='post'>
$userSelect <input type='submit' value='Set User'/>
</form>
S;
}
?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title> <?= $title ?> </title>
	<link type="text/css" href="adminStyle.css" rel="stylesheet"/>
	<link rel="shortcut icon" href="greenHanger.jpg">
</head>
<body>
	<div id='header'>
		<?= $title ?> <?php selectUserForm($dao) ?>
		<br/><p/>
	</div>
	<div id='content'>
		<form action='addItemAction.php' method='post' enctype="multipart/form-data">
			<table>
				<tr> <td>Upload</td> <td><input name='photo' type='file'/></td> </tr>
				<tr> <td>Name</td> <td><input name='name' size='104'/></td> </tr>
				<tr> <td>Description</td> <td><textarea name='description' rows='5' cols='80'></textarea></td> </tr>
				<tr> <td></td> <td><input type='submit' value='Add It'</td> </tr>
			</table>
		</form>
	</div>
	<div id="footer">
		<p>(c) Chris & Cheese
	</div>
</body>
</html>