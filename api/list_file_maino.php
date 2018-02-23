<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

$reestrid = $_POST['reestrid'];
$datall = [];

$sql = "SELECT * FROM `maino` WHERE `reestr_id` = ".$reestrid;
$rows = $db->fetch_all_array($sql);
$data = [];

foreach($rows as $record){
	$list = array(
		"id"        => $record['id'],
		"reestr_id" => $record['reestr_id'],
		"vid_id"    => $record['vid_id'],
		"opis"      => $record['opis'],
		"count"     => $record['count'],
		"price"     => $record['price'],
		"vartist"   => $record['vartist'],
		"vikon"     => $record['vikon'],
	);

	$data[] = $list;
}

$datall['items'] = $data;

$sql = "SELECT * FROM `maino_file` WHERE `reestr_id` = ".$reestrid;
$rows = $db->fetch_all_array($sql);
$data = [];

foreach($rows as $record){
	$list = array(
		"id" => $record['id'],
		"maino" => $record['maino_id'],
		"file" => $record['file_pach'],
		"name" => $record['name'],
		"type" => $record['type'],
	);

	$data[] = $list;
}

$datall['files'] = $data;


$db->close();


die(json_encode($datall, 256));

?>