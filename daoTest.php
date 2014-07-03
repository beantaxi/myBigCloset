<!--
daoTest.php
Created By: Chris
Created On: 6/30/14
-->
<?php
require_once("Dao.cls.php");
$idUser = 26;
?>

<html>
<?php
try
{
?>

<b>c'tor</b><br/>
<?php
$dao = new Dao($debug=1);
?>
OK!
<br/><p/>



<b>getItems()</b><br/>
<?php
$items = $dao->getItems($idUser);
echo("<pre>");
foreach ($items as $item)
{
	var_dump($item);
}
echo("</pre>");
?>
OK!
<br/><p/>


<b>validateUser()</b><br/>
<?php
$user = $dao->validateUser("beantaxi@gmail.com", "password");
?>
<pre>
Name=<?= "$user->first $user->last" ?>

Email=<?=$user->email?>

ID=<?=$user->uid?>
</pre>
OK!
<br/><p/>

<b>getCart()</b><br/>
<?php
$cart = $dao->getCart(26);
$nItems = count($cart);
?>
<pre>
<?= $nItems ?> item(s)
<table>
<?php
foreach ($cart as $item)
{
?>
	<tr>
		<td><?= $item->name ?></td>
		<td><?= $item->description ?></td>
	</tr>
<?php
}
?>
</table>
</pre>
OK!
<br/><p/>




<?php
}
catch (Exception $ex)
{
	$msg = $ex->getMessage();
	echo "<span class='error'>$msg</span><br/>";
}
?>
</html>
