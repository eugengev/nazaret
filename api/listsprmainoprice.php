<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

$sql = "SELECT * FROM `s_price`";
$rows = $db->fetch_all_array($sql);

$data = [];

foreach($rows as $record){
	$list = array(
		"id" => $record['id'],
		"name" => $record['name'],
		"price" => $record['price'],
	);

	$data[] = $list;
}

die(json_encode($data, 256));

?>