<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");


$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

if (isset($_POST['clientid'])) {
	$sql = "SELECT * FROM `s_client` WHERE `id` = ".$_POST['clientid'];
	$rows = $db->query_first($sql);
	if ($rows['adres1'] == 0) {
		$ida = $db->query_insert('s_adress', array('zip'=>''));
		$db->query_update('s_client', array('adres1'=>$ida), 'id='.$_POST['clientid']);
	}
	if ($rows['adres2'] == 0) {
		$idy = $db->query_insert('s_adress', array('zip'=>''));
		$db->query_update('s_client', array('adres2'=>$idy), 'id='.$_POST['clientid']);
	}
	if ($rows['adres_ukr'] == 0) {
		$idy = $db->query_insert('s_adress', array('zip'=>''));
		$db->query_update('s_client', array('adres_ukr'=>$idy), 'id='.$_POST['clientid']);
	}
	if ($rows['adres_np'] == 0) {
		$idy = $db->query_insert('s_adress', array('zip'=>''));
		$db->query_update('s_client', array('adres_np'=>$idy), 'id='.$_POST['clientid']);
	}
	$sql = "SELECT * FROM `s_client` WHERE `id` = ".$_POST['clientid'];
	
} else {
	$sql = "SELECT * FROM `s_client`";
}


$rows = $db->fetch_all_array($sql);

$data = [];

foreach($rows as $record){
	$list = array(
		"id" => $record['id'],
		"name" => $record['name'],
		"phone" => $record['phone'],
		"email" => $record['email'],
		"inn" => $record['inn'],
		"pasport" => $record['pasport'],
		"pravforma" => $record['pravforma'],
		"dir_role" => $record['dir_role'],
		"dir_fio" => $record['dir_fio'],
		"buh_fio" => $record['buh_fio'],
		"dover" => $record['dover'],
		"adres1" => $record['adres1'],
		"adres2" => $record['adres2'],
		"adres_ukr" => $record['adres_ukr'],
		"adres_np" => $record['adres_np'],
		"phone1" => $record['phone1'],
		"ras" => $record['ras'],
		"mfo" => $record['mfo'],
		"bank" => $record['bank'],
	);

	$data[] = $list;
}

$datall['client'] = $data;
$datall['adress1'] = [];
$datall['adress2'] = [];
$datall['adress3'] = [];
$datall['adress4'] = [];

if (isset($_POST['clientid'])) {
	$sql = "SELECT * FROM `s_adress` WHERE `id`=".$data[0]['adres1'];
	$rowa = $db->query_first($sql);
	$datall['adress1'] = $rowa;

	$sql = "SELECT * FROM `s_adress` WHERE `id`=".$data[0]['adres2'];
	$rowa = $db->query_first($sql);
	$datall['adress2'] = $rowa;

	$sql = "SELECT * FROM `s_adress` WHERE `id`=".$data[0]['adres_ukr'];
	$rowa = $db->query_first($sql);
	$datall['adress3'] = $rowa;

	$sql = "SELECT * FROM `s_adress` WHERE `id`=".$data[0]['adres_np'];
	$rowa = $db->query_first($sql);
	$datall['adress4'] = $rowa;
}

$db->close();



die(json_encode($datall, 256));
?>