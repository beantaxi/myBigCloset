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

<?php
}
catch (Exception $ex)
{
	$msg = $ex->getMessage();
	echo "<span class='error'>$msg</span><br/>";
}
?>
</html>
