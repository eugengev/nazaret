<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require($_SERVER['DOCUMENT_ROOT']."/api/mysql.php");

$db = new Database( $db_host, $db_login, $db_passwd, $db_name );
$db->connect();
$data = [];

if (isset($_POST['idf'])) {

	$userinfo = array(
		'firma_id' => $_POST['idf']
	);

	$id = $db->query_insert( 'writer', $userinfo );

	$sql  = "SELECT * FROM `writer` WHERE `firma_id` =".$_POST['idf'];
	$rows = $db->fetch_all_array( $sql );
	$db->close();

	foreach ( $rows as $record ) {
		$list = array(
			"id"   => $record['id'],
			"fio" => $record['fio'],
			"dolg" => $record['dolg'],
			"sert_date" => $record['sert_date'],
			"sert_nomer" => $record['sert_nomer'],
			"firma_id" => $record['firma_id'],
		);

		$data[] = $list;
	}
}
die(json_encode($data, 256));

?>