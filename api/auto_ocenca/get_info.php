<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("./../mysql.php");

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

$data = [];

if (isset($_POST['type']) && $_POST['type'] == 'addzero' ) {
	$sql = "SELECT count(id) as cnt FROM `ocenca_auto` WHERE `maino_id` = ".$_POST['idm'];
	$rowc = $db->fetch_all_array($sql);
	$cnt = $rowc[0]['cnt'];
	$addzero = array(
		'maino_id' => $_POST['idm']
	);
	for ($i=$cnt; $i<$_POST['countOscenca']; $i++) {
		$rowr = $db->query_insert('ocenca_auto',$addzero);
	}
}

if (isset($_POST['type']) && $_POST['type'] == 'deleterow' ) {
	$sql = "DELETE FROM `ocenca_auto` WHERE `id` = ".$_POST['idoa'];
	$rowc = $db->query($sql);
	$sql = "DELETE FROM `ocenca_auto_analog` WHERE `ocenca_auto_id` = ".$_POST['idoa'];
	$rowc = $db->query($sql);
}


if (isset($_POST['idr'])) {
	$sql = "SELECT reestr.*, s_client.name as client, s_firma.name as firma, s_city.name as city, s_bank.name as bank, s_meta.name as meta, s_manager.name as manager ".
	       "FROM reestr ".
	       "LEFT JOIN s_client  ON reestr.client_id  = s_client.id ".
	       "LEFT JOIN s_firma   ON reestr.firma_id   = s_firma.id ".
	       "LEFT JOIN s_city    ON reestr.city_id    = s_city.id ".
	       "LEFT JOIN s_bank    ON reestr.bank_id    = s_bank.id ".
	       "LEFT JOIN s_meta    ON reestr.meta_id    = s_meta.id ".
	       "LEFT JOIN s_manager ON reestr.manager_id = s_manager.id ".
	       "WHERE reestr.id = ".$_POST['idr']." LIMIT 1";
	$rowr = $db->fetch_all_array($sql);
}

if (isset($_POST['idm'])) {
	$sql = "SELECT maino.*, maino.nomber as nomer,  reestr.id as rid, reestr.nomber, reestr.datework, s_city.name as city, s_bank.name as bank, s_meta.name as meta, s_maino.name as mname ".
	       " FROM `maino` ".
	       "LEFT JOIN reestr ON reestr.id  = maino.reestr_id ".
	       "LEFT JOIN s_city ON reestr.city_id   = s_city.id ".
	       "LEFT JOIN s_bank    ON reestr.bank_id    = s_bank.id ".
	       "LEFT JOIN s_meta    ON reestr.meta_id    = s_meta.id ".
	       "LEFT JOIN s_maino   ON maino.vid_id    = s_maino.id ".
	       "WHERE maino.id = ".$_POST['idm']." LIMIT 1";
	$rowm = $db->fetch_all_array($sql);

	$sql = "SELECT * FROM `ocenca_auto` WHERE `maino_id` = ".$_POST['idm'];
	$rowa = $db->fetch_all_array($sql);
}
$db->close();

foreach($rowr as $record){
	$list = array(
		"id"         => $record['id'],
		"nomber"     => $record['nomber'],
		"date"       => datf($record['date']),
		"datework"   => datf($record['datework']),
		"old_nomber" => $record['prev_id'],
		"client"     => $record['client'],
		"firma"      => $record['firma'],
		"city"       => $record['city'],
		"bank"       => $record['bank'],
		"meta"       => $record['meta'],
		"manager"    => $record['manager'],
		"nomer_act"  => $record['nomer_act'],
		"date_act"   => datf($record['date_act']),
	);
}
$data['reestr'] = $list;

foreach($rowm as $record){
	$list = array(
		"id"       => $record['id'],
		"nomer"    => $record['nomer'],
		"opis"     => $record['opis'],
		"mname"    => $record['mname'],
		"vid_id"   => $record['vid_id'],
		"nomber"   => $record['nomber'],
		"datework" => datf($record['datework']),
		"status"   => $record['status'],
		"city"     => $record['city'],
		"count"    => $record['count'],
		"bank"     => $record['bank'],
		"meta"     => $record['meta'],
		"rid"      => $record['rid'],
		"oglad_date"   => datf($record['oglad_date']),
		"oglad_sutok"  => $record['oglad_sutok'],
		"oglad_prisut" => $record['oglad_prisut'],
	);
}
$data['ocenca'] = $list;
$items = [];

foreach($rowa as $record){
	$items[] = array(
		"id"         => $record['id'],
		"maino_id"   => $record['maino_id'],
		"name"       => $record['name'],
		"model"      => $record['model'],
		"marka"      => $record['marka'],
		"year"       => $record['year'],
		"vin"        => $record['vin'],
		"sale_price" => $record['sale_price'],
		"sale_price_2"=> $record['sale_price_2'],
		"sale_price_3"=> $record['sale_price_3'],
	);
}
$data['items'] = $items;

die(json_encode($data, 256));
?>