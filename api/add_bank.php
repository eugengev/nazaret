<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");

$db = new Database( $db_host, $db_login, $db_passwd, $db_name );
$db->connect();
$data = [];

if (isset($_POST['idf'])) {

	$userinfo = array(
		'parent_id' => $_POST['idf'],
		'type' => $_POST['type']
	);

	$id = $db->query_insert( 'banki', $userinfo );

	$sql  = "SELECT * FROM `banki` WHERE `parent_id` =".$_POST['idf']." AND `type` = '".$_POST['type']."'";
	$rows = $db->fetch_all_array( $sql );
	$db->close();

	foreach ( $rows as $record ) {
		$list = array(
			"id"   => $record['id'],
			"bank" => $record['bank'],
			"mfo" => $record['mfo'],
			"ras" => $record['ras'],
			"type" => $record['type'],
			"parent_id" => $record['parent_id'],
		);

		$data[] = $list;
	}
}
die(json_encode($data, 256));

?>