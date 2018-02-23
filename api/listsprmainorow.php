<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

if (isset($_POST['reestrid'])) {
	$id = $db->query_insert( 'maino',array('reestr_id' => $_POST['reestrid'], 'status' => 'n'));
} else {
	$id = 0;
}

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
$db->close();

$data = [];

foreach($rows as $record){
	$list = array(
		"id" => $record['id_user'],
		"name" => $record['fio'],
	);

	$data[] = $list;
}

$dataall['viconav'] = $data;

$dataall['idrow'] = $id;

die(json_encode($dataall, 256));

?>