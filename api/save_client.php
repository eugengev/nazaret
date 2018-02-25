<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");


$db = new Database( $db_host, $db_login, $db_passwd, $db_name );
$db->connect();

if (isset($_POST['staus']) && $_POST['staus'] == 'addClient') {

	$userinfo = array(
		"name"      => $_POST['name'],
		"phone"     => $_POST['phone'],
		"email"     => $_POST['email'],
		"inn"       => $_POST['inn'],
		"pasport"   => $_POST['pasport'],
		"pravforma" => $_POST['pravforma'],
		"dir_role"  => $_POST['dir_role'],
		"dir_fio"   => $_POST['dir_fio'],
		"buh_fio"   => $_POST['buh_fio'],
		"dover"     => $_POST['dover'],
		"adres1"    => $_POST['adres1'],
		"adres2"    => $_POST['adres2'],
		"phone1"    => $_POST['phone1'],
		"ras"       => $_POST['ras'],
		"mfo"       => $_POST['mfo'],
		"bank"      => $_POST['bank'],
	);

	$id    = $db->query_insert( 's_client', $userinfo );
	$users = $id;
}


if (isset($_POST['staus']) && $_POST['staus'] == 'updateClient') {

	$userinfo = array(
		"name"      => $_POST['name'],
		"phone"     => $_POST['phone'],
		"email"     => $_POST['email'],
		"inn"       => $_POST['inn'],
		"pasport"   => $_POST['pasport'],
		"pravforma" => $_POST['pravforma'],
		"dir_role"  => $_POST['dir_role'],
		"dir_fio"   => $_POST['dir_fio'],
		"buh_fio"   => $_POST['buh_fio'],
		"dover"     => $_POST['dover'],
		"adres1"    => $_POST['adres1'],
		"adres2"    => $_POST['adres2'],
		"phone1"    => $_POST['phone1'],
		"ras"       => $_POST['ras'],
		"mfo"       => $_POST['mfo'],
		"bank"      => $_POST['bank'],
	);

	$id = $db->query_update( 's_client', $userinfo, '`id` = '.$_POST['id']);
	$users = $id;
}

$sql  = "SELECT * FROM `s_client`";
$rows = $db->fetch_all_array( $sql );

$data = [];

foreach ( $rows as $record ) {
	$list = array(
		"id"        => $record['id'],
		"name"      => $record['name'],
		"phone"     => $record['phone'],
		"email"     => $record['email'],
		"inn"       => $record['inn'],
		"pasport"   => $record['pasport'],
		"pravforma" => $record['pravforma'],
		"dir_role"  => $record['dir_role'],
		"dir_fio"   => $record['dir_fio'],
		"buh_fio"   => $record['buh_fio'],
		"dover"     => $record['dover'],
		"adres1"    => $record['adres1'],
		"adres2"    => $record['adres2'],
		"phone1"    => $record['phone1'],
		"ras"       => $record['ras'],
		"mfo"       => $record['mfo'],
		"bank"      => $record['bank'],
	);

	$data[] = $list;
}

$db->close();

die(json_encode($data, 256));
?>