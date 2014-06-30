<?php
require_once('common.inc');

connect(1);
mysql_select_db('MYSQL5_316376_smartcube') or die('Could not select database');
//mysql_query("select * from user where uid=5");

$items = getItems(26, $debug=1);
$nItems = count($items);
echo "$nItems item(s)<br/>";

echo "<table>";
foreach ($items as $item)
{
	$name = $item['name'];
	$description = $item['description'];
	$iid = $item['iid'];
	echo "<tr> <td>Item</td> <td>$iid</td> <td>$name</td> <td>$description</td> </tr>";
}
echo "</table>";

?>