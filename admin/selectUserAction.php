<?php
session_start();
require_once("../common.inc");
$debug = 0;
$uid = $_POST["uid"];
$_SESSION['uid'] = $uid;
$url = "addItem.php";
redirect($url, $debug);
?>

<pre>
<?php
echo "uid=$uid\n";
?>

</pre>
