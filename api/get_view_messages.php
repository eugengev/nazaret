<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");

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
	return $string ? implode(', ', $string) . ' тому назад' : 'just now';
}

$id_user = $_SESSION['id_user'];

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

if (isset($_POST['messageid'])) {
	$messageid = $_POST['messageid'];
}
	$sql  = "SELECT mes.*, fro.fio fromname, too.fio toname FROM `messages` as mes " .
	        "	LEFT JOIN `users` as fro ON fro.id_user = mes.user_id_from " .
	        "	LEFT JOIN `users` as too ON too.id_user = mes.user_id_to " .
	        "	WHERE id=".$messageid.
	        " UNION ALL ".
	        "SELECT mes.*, fro.fio fromname, too.fio toname FROM `messages` as mes " .
	        "	LEFT JOIN `users` as fro ON fro.id_user = mes.user_id_from " .
	        "	LEFT JOIN `users` as too ON too.id_user = mes.user_id_to " .
	        "	WHERE parent_id=".$messageid.
	        " order BY timestamp";
	$rows = $db->fetch_all_array( $sql );

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

$db->close();


die(json_encode($data, 256));
?>