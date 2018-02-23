<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");

$id_user = $_SESSION['id_user'];

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

$sql = "SELECT * FROM `users` WHERE id_user=".$id_user;
$rows = $db->fetch_all_array($sql);
$db->close();


foreach($rows as $record){
	$list = array(
		"id" => $record['id_user'],
		"login" => $record['login_user'],
		"mail_user" => $record['mail_user'],
		"role" => $record['role'],
		"fio" => $record['fio'],

	);

	$data[] = $list;
}

die(json_encode($data, 256));
?>