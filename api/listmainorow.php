<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

$dataall = [];

$sql = "SELECT * FROM `s_maino`";
$rows = $db->fetch_all_array($sql);

$data = [];

foreach($rows as $record){
	$list = array(
		"id" => $record['id'],
		"name" => $record['name'],
	);

	$data[] = $list;
}

$dataall['maino'] = $data;

$sql = "SELECT id_user,fio FROM `users` WHERE  `role` = 'm'";
$rows = $db->fetch_all_array($sql);

$data = [];

foreach($rows as $record){
	$list = array(
		"id" => $record['id_user'],
		"name" => $record['fio'],
	);

	$data[] = $list;
}

$dataall['viconav'] = $data;



$sql = "SELECT id,fio FROM `writer`";
$rows = $db->fetch_all_array($sql);

$data = [];

foreach($rows as $record){
	$list = array(
		"id" => $record['id'],
		"name" => $record['fio'],
	);

	$data[] = $list;
}

$dataall['podpisant'] = $data;


$sql = "SELECT * FROM `maino` WHERE `reestr_id` = ".$_POST['reestrid'];
$rows = $db->fetch_all_array($sql);
$db->close();

$data = [];

foreach($rows as $record){
	$list = array(
		"id"        => $record['id'],
		"reestr_id" => $record['reestr_id'],
		"nomber"    => $record['nomber'],
		"vid_id"    => $record['vid_id'],
		"opis"      => $record['opis'],
		"count"     => $record['count'],
		"price"     => $record['price'],
		"vartist"   => $record['vartist'],
		"vikon"     => $record['vikon'],
		"podpisant" => $record['podpisant'],
	);

	$data[] = $list;
}

$dataall['mainorow'] = $data;


die(json_encode($dataall, 256));

?>