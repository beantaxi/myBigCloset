<?php
session_start();
require("../Dao.cls.php");
$debug = 1;
$name = $_POST['name'];
?>

<pre>

<?php
try
{
	$uid = $_SESSION['uid'];
	if (!$uid)
	{
		throw new Exception("No user id set");
	}
	else if (!$_FILES['photo']['name'])
	{
		throw new Exception("No photo uploaded");
	}
	else 
	{
		$url = "addItem.php";
		redirect($url, $debug);
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
}
catch (Exception $ex)
{
	echo $ex->getMessage() . "\n\n";
	echo "Return to <a href='addItem.php'>Add Item</a>";
}
?>


</pre>
