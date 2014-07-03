<?php
$title = "Add Item";
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
		<?= $title ?>
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