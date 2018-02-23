<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");

$id_user = $_SESSION['id_user'];

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

if (isset($_POST['staus']) && $_POST['staus'] == 'addmessage') {
	foreach ($_POST['user_id_to'] as $idd ) {
		$messageinfo = array(
			'date'         => date("Y-m-d"),
			'time'         => date("h:i:s"),
			'user_id_from' => $id_user,
			'user_id_to'   => $idd,
			'message'      => $_POST['message'],
		);

		$id = $db->query_insert( 'messages', $messageinfo );
	}
}

$sql = "SELECT mes.*, fro.fio fromname, too.fio toname FROM `messages` as mes ".
       "	LEFT JOIN `users` as fro ON fro.id_user = mes.user_id_from ".
       "	LEFT JOIN `users` as too ON too.id_user = mes.user_id_to ".
       "	WHERE user_id_from=".$id_user." OR user_id_to = ".$id_user .") AND parent_id = 0 ".
       " order BY timestamp";
$rows = $db->fetch_all_array($sql);
$db->close();

foreach($rows as $record){
	$list = array(
		"id" => $record['id'],
		"user_id_from" => $record['user_id_from'],
		"user_id_to" => $record['user_id_to'],
		"message" => $record['message'],
		"parent_id" => $record['parent_id'],
		"status" => $record['status'],
		"date" => $record['date'],
		"time" => $record['time'],
		"fromname" => $record['fromname'],
		"toname" => $record['toname'],

	);

	$data[] = $list;
}

die(json_encode($data, 256));
?>