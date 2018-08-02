<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("./../mysql.php");

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();


$data = [];

if (isset($_POST['type']) && $_POST['type'] == 'changefile') {
	$change = 0;
	if ($_POST['change'] == 'true') {
		$change = 1;
	} else {
		$change = 0;
	}
	$sql = "UPDATE `maino_file` SET chosen=".$change." WHERE id=".$_POST['idfile'];
	$rows = $db->query($sql);
}

if (isset($_POST['id'])) {
	$sql = "SELECT * FROM `maino_file` WHERE `maino_id` in (SELECT maino_id FROM `ocenca_auto` WHERE id = ".$_POST['id']." ) ORDER BY `type`, `id`";
	$rows = $db->fetch_all_array($sql);

	foreach($rows as $record) {
		$items = array(
			'id' => $record['id'],
			'file_pach' => $record['file_pach'],
			'name' => $record['name'],
			'type' => $record['type'],
			'chosen' => $record['chosen'],
		);
		$data[] = $items;
	}
}

$db->close();
die(json_encode($data, 256));
?>