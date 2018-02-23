<?php
header('Content-Type: application/json;charset=utf-8');

function time_elapsed_string($datetime, $full = false) {
	$now = new DateTime;
	$ago = new DateTime($datetime);
	$diff = $now->diff($ago);

	$diff->w = floor($diff->d / 7);
	$diff->d -= $diff->w * 7;

	$string = array(
		'y' => 'лет',
		'm' => 'месяцев',
		'w' => 'недель',
		'd' => 'дней',
		'h' => 'часов',
		'i' => 'минут',
		's' => 'секунд',
	);
	foreach ($string as $k => &$v) {
		if ($diff->$k) {
			$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
		} else {
			unset($string[$k]);
		}
	}

	if (!$full) $string = array_slice($string, 0, 1);
	return $string ? implode(', ', $string) . ' ago' : 'just now';
}

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");

$id_user = $_SESSION['id_user'];

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

$sql = "SELECT mes.*, fro.fio fromname, too.fio toname FROM `messages` as mes ".
       "	LEFT JOIN `users` as fro ON fro.id_user = mes.user_id_from ".
       "	LEFT JOIN `users` as too ON too.id_user = mes.user_id_to ".
       "	WHERE  user_id_to = ".$id_user." AND status = 0 ".
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
		"dayago" => time_elapsed_string($record['timestamp'],false),

	);

	$data[] = $list;
}

die(json_encode($data, 256));
?>