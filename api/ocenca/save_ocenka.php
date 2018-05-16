<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("./../mysql.php");

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

if (isset($_POST['type']) && $_POST['type']=='updateogljad') {

	$fields = array(
		'oglad_date' => $_POST['oglad_date'],
		'oglad_sutok' => $_POST['oglad_sutok'],
		'oglad_prisut' => $_POST['oglad_prisut'],
	);

	$idan = $db->query_update( 'maino', $fields,  'id='.$_POST['id']);
}

$data[] = $items;

die(json_encode($data[0], 256));
?>