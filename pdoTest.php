<!--
pdoTest.php
Created By: Chris
Created On: 6/30/2014
-->
<html>

<?php
require_once("common.inc");
$debug = 1;
$idUser = 26;
try
{
?>

<b>connect</b><br/>
<?php
$username = "chez";
$password = "chez";
$pdo = connect($DSN, $username, $password, $debug);
?>
OK!
<br/><p/>


<b>query</b><br/>
<?php
$sql = "select * from user where uid=$idUser";
$rs = query($pdo, $sql, $debug);
?>
OK!
<br/><p/>

<b>loop over results</b><br/>
<?php
while ($r = $rs->fetch(PDO::FETCH_ASSOC))
{
	var_dump($r);
}
?>
OK!
<br/><p/>


<b>prepared statement</b><br/>
<?php
$sql = "insert into test (name, luckyNumber) values (:name, :luckyNumber)";
$args = array();
$args[':name'] = 'Cheese';
$args[':luckyNumber'] = 7;
$pstmt = $pdo->prepare($sql);
$pstmt->execute($args);
?>
OK!
<br/><p/>


<?php
}
catch (PDOException $ex)
{
	$msg = $ex->getMessage();
	echo("$msg<br/>");
	var_dump($ex->getTraceAsString());
}
?>

</html>
