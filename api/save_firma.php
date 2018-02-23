<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");


$db = new Database( $db_host, $db_login, $db_passwd, $db_name );
$db->connect();

if (isset($_POST['staus']) && $_POST['staus'] == 'addFirma') {

	$userinfo = array(
		"name" => $_POST['name'],
		"autonomer" => $_POST['autonomer'],
		"lastnomer" => $_POST['lastnomer'],
		"firstchar" => $_POST['firstchar'],
		"okpo" => $_POST['okpo'],
		"tel" => $_POST['tel'],
		"ras" => $_POST['ras'],
		"bank" => $_POST['bank'],
		"mfo" => $_POST['mfo'],
		"adress" => $_POST['adress'],
		"email" => $_POST['email'],
		"full_name" => $_POST['full_name'],
		"dir_role" => $_POST['dir_role'],
		"dir_fio" => $_POST['dir_fio'],
		"buh_fio" => $_POST['buh_fio'],
		"adres_yur" => $_POST['adres_yur'],
		"tel1" => $_POST['tel1'],
		"svidot_nomer" => $_POST['svidot_nomer'],
		"svidot_date" => $_POST['svidot_date'],
		"svidot_organ" => $_POST['svidot_organ'],
	);

	$id    = $db->query_insert( 's_firma', $userinfo );
	$users = $id;
}


if (isset($_POST['staus']) && $_POST['staus'] == 'editFirma') {

	$userinfo = array(
		"name" => $_POST['name'],
		"autonomer" => $_POST['autonomer'],
		"lastnomer" => $_POST['lastnomer'],
		"firstchar" => $_POST['firstchar'],
		"okpo" => $_POST['okpo'],
		"tel" => $_POST['tel'],
		"ras" => $_POST['ras'],
		"bank" => $_POST['bank'],
		"mfo" => $_POST['mfo'],
		"adress" => $_POST['adress'],
		"email" => $_POST['email'],
		"full_name" => $_POST['full_name'],
		"dir_role" => $_POST['dir_role'],
		"dir_fio" => $_POST['dir_fio'],
		"buh_fio" => $_POST['buh_fio'],
		"adres_yur" => $_POST['adres_yur'],
		"tel1" => $_POST['tel1'],
		"svidot_nomer" => $_POST['svidot_nomer'],
		"svidot_date" => $_POST['svidot_date'],
		"svidot_organ" => $_POST['svidot_organ'],
	);

	$id = $db->query_update( 's_firma', $userinfo, '`id` = '.$_POST['id']);
	$users = $id;
}


$sql  = "SELECT * FROM `s_firma`";
$rows = $db->fetch_all_array( $sql );

$data = [];

foreach ( $rows as $record ) {
	$list = array(
		"id" => $record['id'],
		"name" => $record['name'],
		"autonomer" => $record['autonomer'],
		"lastnomer" => $record['lastnomer'],
		"firstchar" => $record['firstchar'],
		"okpo" => $record['okpo'],
		"tel" => $record['tel'],
		"ras" => $record['ras'],
		"bank" => $record['bank'],
		"mfo" => $record['mfo'],
		"adress" => $record['adress'],
		"email" => $record['email'],
		"full_name" => $record['full_name'],
		"dir_role" => $record['dir_role'],
		"dir_fio" => $record['dir_fio'],
		"buh_fio" => $record['buh_fio'],
		"adres_yur" => $record['adres_yur'],
		"tel1" => $record['tel1'],
		"svidot_nomer" => $record['svidot_nomer'],
		"svidot_date" => $record['svidot_date'],
		"svidot_organ" => $record['svidot_organ'],
	);

	$data[] = $list;
}

$db->close();

die(json_encode($data, 256));
?>