<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");


$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

if (isset($_POST['firmaname'])) {
	$sql = "SELECT * FROM `s_firma` WHERE `name` = '".$_POST['firmaname']."'";
}

$rows = $db->fetch_all_array($sql);


$data = [];

foreach($rows as $record){
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

$datall['firma'] = $data;
$datall['adress1'] = [];
$datall['adress2'] = [];
$datall['bank'] = [];

if (isset($_POST['firmaname'])) {
	$datall['firma'] = $data;
	$sql = "SELECT * FROM `s_adress` WHERE `id`=".$data[0]['adress'];
	$rowa = $db->query_first($sql);
	$datall['adress1'] = $rowa;
	$sql = "SELECT * FROM `s_adress` WHERE `id`=".$data[0]['adres_yur'];
	$rowa = $db->query_first($sql);
	$datall['adress2'] = $rowa;
	$sql = "SELECT * FROM `banki` WHERE type='f' AND `parent_id`=".$data[0]['id'];
	$rowb = $db->fetch_all_array($sql);
	$datall['bank'] = $rowb;
}

$db->close();
die( json_encode( $datall, 256 ) );


?>