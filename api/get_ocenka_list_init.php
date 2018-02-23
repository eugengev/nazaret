<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

$id_user = $_SESSION['id_user'];

$sql = "SELECT 'новые задачи' as name, count(*) as cont ".
       " FROM `maino` ".
       " WHERE vikon = ".$id_user." AND status='n'";
$rows = $db->fetch_all_array($sql);

$db->close();

$data = [];

foreach($rows as $record){
	$list = array(
		"name"   => $record['name'],
		"count"  => $record['cont'],
	);

	$data[] = $list;
}

die(json_encode($data, 256));
?>