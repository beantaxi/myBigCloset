<?php
// Title: common.inc
// Date: June 24th 2014
// Created By: Chesley & Chris
// Purpose: Commonly used functions for MBC
// ----------------------------------------

$DSN = "uri:file:///" . dirname(__FILE__) . "/dsn.php";
$debug = 1;
function connect ($dsn, $username, $password, $debug = 0)
{
	$pdo = new PDO($dsn, $username, $password);
	if ($debug)
	{
		echo "Connected Successfully<br/>";
	}
	
	return $pdo;
}

/*
// get all items for a specific user
function getItems ($pdo, $idUser, $debug=0)
{
	$items = array();
	
	$sql = "SELECT * FROM item WHERE uid=$idUser";
	$rs = query($pdo, $sql, $debug);
	while ($row = $rs->fetch(PDO::FETCH_ASSOC))
	{
		$items[] = $row;	
	}
	
	return $items;
}
*/

//given a uid, table, and parameter (such as '*','first', or 'last'), this function will
//craft a sql query to get the desired result set.
function getResult($id, $para, $table){
  $sql = "SELECT $para FROM $table WHERE uid=$id";
  $rs = queryItem($sql);
  return $rs;
}

function getResult2($para, $table, $where, $id){
  $sql = "SELECT $para FROM $table WHERE $where=$id";
  $rs = queryItem($sql);
  return $rs;
}


//runs the sql input and checks for errors if second argument is supplied as '1', default second arg is '0'
//returns the entire result set
function query ($pdo, $sql, $debug=0){
  if ($debug){
    echo "sql=$sql<br/>";
  }
  $rs = $pdo->query($sql);
  return $rs;
}

//runs the sql input and checks for errors if second argument is supplied as '1', default second arg is '0'
//returns a single row from the result set
function queryRow ($pdo, $sql, $debug=0){
  $rs = query($pdo, $sql, $debug);
  $row = $rs->fetch(PDO::FETCH_ASSOC);
  return $row;
}

//runs the sql input and checks for errors if second argument is supplied as '1', default second arg is '0'
//returns the first item of the first row of the result set
function queryItem ($pdo, $sql, $debug=0){
  $row = queryRow($pdo, $sql, $debug);
  $item = $row[0];
  return $item;
}

function redirect ($url, $debug=0)
{
	if ($debug)
	{
		echo "<a href='$url'>Redirect to $url</a><br/>";
	}
	else
	{
		header("Location: $url");
		die();
	}
}


function error($error, $errNo)
{
   echo "OOOOOOOPS!";
}

?>