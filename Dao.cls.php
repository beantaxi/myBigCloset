<!--
Dao.cls.php
Created By: Chris
Created On: 6/28/2014
-->
<?php
require_once("common.inc");

$ERR_ValidationFailed = 10000;
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
		$this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		if ($this->debug)
		{
			echo "<pre>Connected Successfully</pre>";
		}
	}


	function getAllUsers ($orderBy = NULL, $debug=0)
	{
		$sql = "SELECT * FROM user";
		if ($orderBy)
		{
			$sql = $sql . " ORDER BY $orderBy";
		}
		
		$rs = query($this->pdo, $sql, $debug);
		$users = $rs->fetchAll();
		
		return $users;
	}
	
	
	function getCart ($idUser, $debug=0)
	{
		$sql = <<<SQL
			select item.photo, item.name, item.description from cart
		   inner join item on cart.iid=item.iid
		   where cart.uid=$idUser
SQL;
		$rs = query($this->pdo, $sql, $debug);
		$cart = $rs->fetchAll();
		return $cart;
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
		$sql = "SELECT * FROM item WHERE uid=$idUser and isHidden=0";
		$rs = query($this->pdo, $sql, $debug);
		$items = $rs->fetchAll();

		return $items;
	}


	// get all items for a specific user
	function getUser ($idUser, $debug=0)
	{
		$sql = "SELECT * FROM user WHERE uid=$idUser";
		$user = queryRow($this->pdo, $sql, $debug);
		if (!$user)
		{
			throw new Exception("User for id=$id not found!");
		}

		return $user;
	}
	
	
	function validateUser ($email, $password, $debug=0)
	{
		global $ERR_ValidationFailed;
		
		$sql = "SELECT * FROM user WHERE email='$email'	and pw='$password'";
		$user = queryRow($this->pdo, $sql, $debug);
		if (!$user)
		{
			throw new Exception("User for username=$username, password=******** not found!", $ERR_ValidationFailed);
		}

		return $user;
	}
}
?>
