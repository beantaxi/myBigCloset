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
		global $DSN;

		$dsn = $DSN;
		$username = "chez";
		$password = "chez";
		$this->pdo = new PDO($dsn, $username, $password);
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if ($this->debug)
		{
			echo "Connected Successfully<br/>";
		}
	}


	function getItem ($idItem, $sql, $debug=0)
	{
		$sql = "SELECT * FROM item WHERE iid=$idItem";
		$item = queryRow($this->pdo, $sql, $debug);
		return $item;
	}


	// get all items for a specific user
	function getItems ($idUser, $debug=0)
	{
		$items = array();

		$sql = "SELECT * FROM item WHERE uid=$idUser";
		$rs = query($this->pdo, $sql, $debug);
		while ($row = $rs->fetch(PDO::FETCH_ASSOC))
		{
			$items[] = $row;
		}

		return $items;
	}


	// get all items for a specific user
	function getUser ($idUser)
	{
		$user = array();

		$sql = "SELECT * FROM user WHERE uid=$idUser";
		$rs = query($this->pdo, $sql, $this->debug);
		$user = $rs->fetch(PDO::FETCH_ASSOC);

		return $user;
	}
}
?>
