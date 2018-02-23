<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");


$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();
if (isset($_POST['clientid'])) {
	$sql = "SELECT * FROM `s_client` WHERE `id` = ".$_POST['clientid'];
} else {
	$sql = "SELECT * FROM `s_client`";
}

$rows = $db->fetch_all_array($sql);
$db->close();

$data = [];

foreach($rows as $record){
	$list = array(
		"id" => $record['id'],
		"name" => $record['name'],
		"phone" => $record['phone'],
		"email" => $record['email'],
		"inn" => $record['inn'],
		"pasport" => $record['pasport'],
		"pravforma" => $record['pravforma'],
		"dir_role" => $record['dir_role'],
		"dir_fio" => $record['dir_fio'],
		"buh_fio" => $record['buh_fio'],
		"dover" => $record['dover'],
		"adres1" => $record['adres1'],
		"adres2" => $record['adres2'],
		"phone1" => $record['phone1'],
		"ras" => $record['ras'],
		"mfo" => $record['mfo'],
		"bank" => $record['bank'],
	);

	$data[] = $list;
}

die(json_encode($data, 256));
?>