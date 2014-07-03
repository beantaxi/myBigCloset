<?php
require("../Dao.cls.php");
$name = $_POST['name'];
$uid = 26;
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

echo "destFileName=$destFileName";
$parent = realpath("..");
echo "parent=$parent";
$nParent = strlen($parent);
echo "nParent=$nParent";
$photoPath = substr($destFileName, $nParent);
echo "photoPath=$photoPath";

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
<pre>

name=<?=$name?>

description=<?=$description?>

filename=<?=$filename?>

size=<?=$size?>

type=<?=$type?>

tmp_name=<?=$tmp_name?>

error=<?=$error?>

destFileName=<?=$destFileName?>

r=<?=$r?>

</pre>