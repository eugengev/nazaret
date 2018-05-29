<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require($_SERVER['DOCUMENT_ROOT']."/api/mysql.php");

$db = new Database( $db_host, $db_login, $db_passwd, $db_name );
$db->connect();

if (isset($_POST['staus']) && $_POST['staus'] == 'updateWriter') {

	$userinfo = array(
		"fio"        => $_POST['fio'],
		"dolg"       => $_POST['dolg'],
		"sert_date"  => $_POST['sert_date'],
		"sert_nomer" => $_POST['sert_nomer'],
		"firma_id"   => $_POST['firma_id'],
	);

	$id    = $db->query_update( 'writer', $userinfo, '`id` = '.$_POST['id'] );
	$users = $id;
}

$sql  = "SELECT * FROM `writer` WHERE `firma_id` =".$_POST['firma_id'];
$rows = $db->fetch_all_array( $sql );

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

$db->close();

die(json_encode($data, 256));
?>