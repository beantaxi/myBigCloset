<!--
Dao.cls.php
Created By: Chris
Created On: 6/28/2014
-->
<?php
require_once("common.inc");
class Dao
{
	public $pdo;
	private $debug;
	
	function __construct ($debug=0)
	{
		$this->debug = $debug;
		$this->connect();
	}
	
	
	function connect ()
	{
		$dsn = "uri:file:///s/cygwin64/home/Chrissy/public_html/storage/dsn.php";
		$username = "chez";
		$password = "chez";
		$this->pdo = new PDO($dsn, $username, $password);
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if ($this->debug)
		{
			echo "Connected Successfully<br/>";
		}
	}


	// get all items for a specific user
	function getItems ($idUser)
	{
		$items = array();

		$sql = "SELECT * FROM item WHERE uid=$idUser";
		$rs = query($this->pdo, $sql, $this->debug);
		while ($row = $rs->fetch(PDO::FETCH_ASSOC))
		{
			$items[] = $row;	
		}

		return $items;
	}
}
?>
