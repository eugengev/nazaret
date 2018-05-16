<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("./../mysql.php");

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

$data = [];

if (isset($_POST['type']) && $_POST['type'] == 'changeliteral') {
	$sql = "UPDATE `maino_literal` SET chosen=0 WHERE id=".$_POST['idfile'];
	$rows = $db->query($sql);
}

if (isset($_POST['id'])) {
	$sql = "SELECT * FROM `maino_literal` WHERE `maino_id` in (SELECT maino_id FROM `ocenca_auto` WHERE id = ".$_POST['id']." ) ORDER BY `id`";
	$rows = $db->fetch_all_array($sql);

	if (empty($rows)) {
		$sql = "SELECT maino_id FROM `ocenca_auto` WHERE id = ".$_POST['id'];
		$rowm = $db->query_first($sql);

		$idmaino = $rowm['maino_id'];
		$sql = "INSERT INTO `maino_literal` (`maino_id`,`name`,`chose`) SELECT ".$idmaino.",namr,1 FROM `s_literat` WHERE type_o = 'a'";
		$db->query($sql);

		$sql = "SELECT * FROM `maino_literal` WHERE `maino_id` in (SELECT maino_id FROM `ocenca_auto` WHERE id = ".$_POST['id']." ) ORDER BY `type`, `id`";
		$rows = $db->fetch_all_array($sql);
	}

	foreach($rows as $record) {
		$items = array(
			'id' => $record['id'],
			'name' => $record['name'],
			'chose' => $record['chose'],
		);
		$data[] = $items;
	}
}


die(json_encode($data, 256));
?>