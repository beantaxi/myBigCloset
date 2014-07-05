<?php
require_once("Dao.cls.php");
$dao = new Dao();
$uid = $_POST['id'];
$iid = $_POST['iid'];

$sql = "INSERT into CART (uid, iid) VALUES (:uid, :iid)";
$args = (array(':uid' => $uid, ':iid' => $iid));
$stmt = $dao->pdo->prepare($sql);
try
{
	$r = $stmt->execute($args);
	$id = $dao->pdo->lastInsertId();
	$url = "cartAddedSuccess.php?id=$uid";
}
catch (PDOException $ex)
{
	if ($ex->getCode() == 23000)
	{
		$url = "cartItemAlreadyExists.php?id=$uid";
	}
	else
	{
		throw $ex;
	}
}
?>

<pre>
uid=<?= $uid ?>

iid=<?= $iid ?>

r = <?= $r ?>

id=<?= $id ?>
</pre>
<br/><p/>
<?= "<a href='$url'>$url</a>" ?>