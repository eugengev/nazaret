<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");


$db = new Database( $db_host, $db_login, $db_passwd, $db_name );
$db->connect();

if (isset($_POST['staus']) && $_POST['staus'] == 'updClient') {

	$userinfo = array(
		"name"          => $_POST['name'],
		"type"          => $_POST['type'],
		"phone"         => $_POST['phone'],
		"email"         => $_POST['email'],
		"inn"           => $_POST['inn'],
		"pasport"       => $_POST['pasport'],
		"pasp_nom"      => $_POST['pasp_nom'],
		"pasp_ser"      => $_POST['pasp_ser'],
		"pasp_data"     => $_POST['pasp_data'],
		"pasp_vidan"    => $_POST['pasp_vidan'],
		"svid_date"     => $_POST['svid_date'],
		"svid_nomer"    => $_POST['svid_nomer'],
		"pravforma"     => $_POST['pravforma'],
		"dir_role"      => $_POST['dir_role'],
		"dir_fio"       => $_POST['dir_fio'],
		"buh_fio"       => $_POST['buh_fio'],
		"dover"         => $_POST['dover'],
		"osoba_fio"     => $_POST['osoba_fio'],
		"osoba_email"   => $_POST['osoba_email'],
		"osoba_telefon" => $_POST['osoba_telefon'],
		"osoba_posada"  => $_POST['osoba_posada'],
		"adres1"        => $_POST['adres1'],
		"adres2"        => $_POST['adres2'],
		"phone1"        => $_POST['phone1'],
		"ras"           => $_POST['ras'],
		"mfo"           => $_POST['mfo'],
		"bank"          => $_POST['bank'],
		"buh_email"     => $_POST['buh_email'],
		"buh_phone"     => $_POST['buh_phone'],
		"buh_phone1"    => $_POST['buh_phone1'],
		"delivertype"   => $_POST['delivertype'],
	);

	$id    = $db->query_insert( 's_client', $userinfo );
	$users = $id;

	$sql  = "SELECT * FROM `s_client` WHERE id = ".$users;
	$rows = $db->fetch_all_array( $sql );

	$data = [];

	foreach ( $rows as $record ) {
		$list = array(
			"id" => $record['id'],
			"type" => $record['type'],
			"name" => $record['name'],
			"phone" => $record['phone'],
			"email" => $record['email'],
			"inn" => $record['inn'],
			"pasport" => $record['pasport'],
			"pasp_nom" => $record['pasp_nom'],
			"pasp_ser" => $record['pasp_ser'],
			"pasp_data" => datf($record['pasp_data']),
			"pasp_vidan" => $record['pasp_vidan'],
			"svid_date" => datf($record['svid_date']),
			"svid_nomer" => $record['svid_nomer'],
			"pravforma" => $record['pravforma'],
			"dir_role" => $record['dir_role'],
			"dir_fio" => $record['dir_fio'],
			"buh_fio" => $record['buh_fio'],
			"dover" => $record['dover'],
			"osoba_fio" => $record['osoba_fio'],
			"osoba_email" => $record['osoba_email'],
			"osoba_telefon" => $record['osoba_telefon'],
			"osoba_posada" => $record['osoba_posada'],
			"adres1" => $record['adres1'],
			"adres2" => $record['adres2'],
			"adres_ukr" => $record['adres_ukr'],
			"adres_np" => $record['adres_np'],
			"phone1" => $record['phone1'],
			"ras" => $record['ras'],
			"mfo" => $record['mfo'],
			"bank" => $record['bank'],
			"buh_email"   => $record['buh_email'],
			"buh_phone"   => $record['buh_phone'],
			"buh_phone1"  => $record['buh_phone1'],
			"delivertype" => $record['delivertype'],
		);

		$data[] = $list;
	}
	$db->close();

	die(json_encode($data, 256));

}

if (isset($_POST['staus']) && $_POST['staus'] == 'addClient') {

	$userinfo = array(
		"name"  => '',
		"stat"  => 'r'
	);

	$idc    = $db->query_insert( 's_client', $userinfo );
	$users = $idc;

	$sql = "SELECT * FROM `s_client` WHERE `id` = ".$idc;
	$rows = $db->query_first($sql);
	if ($rows['adres1'] == 0) {
		$ida = $db->query_insert('s_adress', array('zip'=>''));
		$db->query_update('s_client', array('adres1'=>$ida), 'id='.$idc);
	}
	if ($rows['adres2'] == 0) {
		$idy = $db->query_insert('s_adress', array('zip'=>''));
		$db->query_update('s_client', array('adres2'=>$idy), 'id='.$idc);
	}
	if ($rows['adres_ukr'] == 0) {
		$idy = $db->query_insert('s_adress', array('zip'=>''));
		$db->query_update('s_client', array('adres_ukr'=>$idy), 'id='.$idc);
	}
	if ($rows['adres_np'] == 0) {
		$idy = $db->query_insert('s_adress', array('zip'=>''));
		$db->query_update('s_client', array('adres_np'=>$idy), 'id='.$idc);
	}


	$sql  = "SELECT * FROM `s_client` WHERE id = ".$idc;
	$rows = $db->fetch_all_array( $sql );

	$data = [];

	foreach ( $rows as $record ) {
		$list = array(
			"id" => $record['id'],
			"type" => $record['type'],
			"name" => $record['name'],
			"phone" => $record['phone'],
			"email" => $record['email'],
			"inn" => $record['inn'],
			"pasport" => $record['pasport'],
			"pasp_nom" => $record['pasp_nom'],
			"pasp_ser" => $record['pasp_ser'],
			"pasp_data" => datf($record['pasp_data']),
			"pasp_vidan" => $record['pasp_vidan'],
			"svid_date" => datf($record['svid_date']),
			"svid_nomer" => $record['svid_nomer'],
			"pravforma" => $record['pravforma'],
			"dir_role" => $record['dir_role'],
			"dir_fio" => $record['dir_fio'],
			"buh_fio" => $record['buh_fio'],
			"dover" => $record['dover'],
			"osoba_fio" => $record['osoba_fio'],
			"osoba_email" => $record['osoba_email'],
			"osoba_telefon" => $record['osoba_telefon'],
			"osoba_posada" => $record['osoba_posada'],
			"adres1" => $record['adres1'],
			"adres2" => $record['adres2'],
			"adres_ukr" => $record['adres_ukr'],
			"adres_np" => $record['adres_np'],
			"phone1" => $record['phone1'],
			"ras" => $record['ras'],
			"mfo" => $record['mfo'],
			"bank" => $record['bank'],
			"buh_email"   => $record['buh_email'],
			"buh_phone"   => $record['buh_phone'],
			"buh_phone1"  => $record['buh_phone1'],
			"delivertype" => $record['delivertype'],
		);

		$data[] = $list;
	}
	$datall['client'] = $data;
	$datall['adress1'] = [];
	$datall['adress2'] = [];
	$datall['adress3'] = [];
	$datall['adress4'] = [];

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

	$db->close();

	die(json_encode($datall, 256));

}

?>