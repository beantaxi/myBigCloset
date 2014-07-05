<?php
$title = "Sign In!";
?>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title><?= $title ?></title>
  <link type="text/css" href="style.css" rel="stylesheet"/>
  <link rel="shortcut icon" href="greenHanger.jpg"></head>
<body>
	<div id='header'>
		<?= $title ?>
		<br/><p/>
	</div>
	<div id='content'>
		<form class='standardForm' action='signinFormAction.php' method='post'>
			<table>
				<tr> <td>Email</td> <td><input name='email'/></td> </tr>
				<tr> <td>Password</td> <td><input name='password' type='password'/></td> </tr>
				<tr> <td></td> <td><input type='submit' value='Sign In'/> <input type='reset'/></td> </tr>
			</table>
		</form>
	</div>
	<div id='footer'>
		<p>(c) Chris & Cheese
	</div>
</body>
</html>