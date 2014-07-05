<?php
session_start();
require("../Dao.cls.php");
$name = $_POST['name'];
?>

<pre>

<?php
$uid = $_SESSION['uid'];
if (!$uid)
{
	echo "No user id set\n";
	$url = "addItem.php";
}
else
{
	$description = $_POST['description'];
	$filename = $_FILES['photo']['name'];
	$tmp_name = $_FILES['photo']['tmp_name'];
	$size = $_FILES['photo']['size'];
	$type = $_FILES['photo']['type'];
	$error = $_FILES['photo']['error'];
	$parent = "../photos/$uid";
	if (!file_exists($parent))
	{
		mkdir($parent);
	}
	$destFileName = tempnam($parent, "") . ".$filename";
	move_uploaded_file($tmp_name, $destFileName);

	$parent = realpath("..");
	$nParent = strlen($parent);
	$photoPath = substr($destFileName, $nParent);

	echo "destFileName=$destFileName\n";
	echo "parent=$parent\n";
	echo "nParent=$nParent\n";
	echo "photoPath=$photoPath\n";

	$sql = "INSERT INTO item set uid=:uid, name=:name, description=:description, photo=:photo";
	$dao = new Dao($debug);
	$stmt = $dao->pdo->prepare($sql);
	$args = [];
	$args[":uid"] = $uid;
	$args[":name"] = $name;
	$args[":description"] = $description;
	$args[":photo"] = $photoPath;
	$r = $stmt->execute($args);
	$url = "addItem.php";
	?>

	name=<?=$name?>

	description=<?=$description?>

	filename=<?=$filename?>

	size=<?=$size?>

	type=<?=$type?>

	tmp_name=<?=$tmp_name?>

	error=<?=$error?>

	destFileName=<?=$destFileName?>

	r=<?=$r?>
	
<?php
}

redirect($url, $debug);
?>


</pre>
