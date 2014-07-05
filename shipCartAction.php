<?php
require_once("Dao.cls.php");
$dao = new Dao($debug);
$uid = $_POST["uid"];
$cart = $dao->getCart($uid, $debug);
printCart($cart);

// Update items, to set checkedOut column
$sql = <<<SQL
update item
join cart on item.uid=cart.uid and item.iid=cart.iid
set isShipped = 1
where item.uid=$uid;
SQL;
query($dao->pdo, $sql, $debug);

$sql = "delete from cart where uid=$uid";
query($dao->pdo, $sql, $debug);

$url = "shipItSucceeded.php?id=$uid";
?>

<pre>
</pre>

<?php
redirect($url, $debug);
?>
