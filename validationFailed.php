<?php
require_once("common.inc");
$title = "Validation Failed";
?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title> <?= $title ?></title>
	<link type="text/css" href="style.css" rel="stylesheet"/>
	<link rel="shortcut icon" href="greenHanger.jpg">
</head>
<body>
	<div id='header'>
		<?= $title ?>
		<br/><p/>
	</div>
	<div id='content'>
		Sorry, we couldn't find anyone with that username/password.
		<br/><p/>
		Would you like to <a href='signinForm.php'>try again</a>?<br/>
	</div>
	<div id="footer">
		<p>(c) Chris & Cheese</p>
	</div>
</body>
</html>