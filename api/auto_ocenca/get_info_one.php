<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("./../mysql.php");

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

$data = [];

if (isset($_POST['idoa'])) {
	$sql = "SELECT * FROM `ocenca_auto` WHERE `id` = ".$_POST['idoa']." LIMIT 1";
	$rowa = $db->fetch_all_array($sql);
}

if (isset($_POST['idoa'])) {
	$sql = "SELECT * FROM `ocenca_auto_analog` WHERE `ocenca_auto_id` = ".$_POST['idoa'];
	$rowanal = $db->fetch_all_array($sql);
}
$db->close();


foreach($rowa as $record){
	$items = array(
		"id"                    => $record['id'],
		"maino_id"              => $record['maino_id'],
		"name"                  => $record['name'],
		"model"                 => $record['model'],
		"marka"                 => $record['marka'],
		"year"                  => $record['year'],
		"vin"                   => $record['vin'],
		"sale_price"            => $record['sale_price'],
		"sale_price_2"          => $record['sale_price_2'],
		"sale_price_3"          => $record['sale_price_3'],
		"proiz"                 => $record['proiz'],
		"dizelbenzinelectro"    => $record['dizelbenzinelectro'],
		"obem"                  => $record['obem'],
		"datesvidet"            => $record['datesvidet'],
		"datektsproiz"          => $record['datektsproiz'],
		"fullyear"              => $record['fullyear'],
		"fullmonth"             => $record['fullmonth'],
		"reg_nom_tran"          => $record['reg_nom_tran'],
		"reg_nom_tran_val"      => $record['reg_nom_tran_val'],
		"svid_reg_tran"         => $record['svid_reg_tran'],
		"svid_reg_tran_val"     => $record['svid_reg_tran_val'],
		"vin_nom_kyz"           => $record['vin_nom_kyz'],
		"vin_nom_kyz_val"       => $record['vin_nom_kyz_val'],
		"nom_dvig"              => $record['nom_dvig'],
		"nom_shasi"             => $record['nom_shasi'],
		"nom_rami"              => $record['nom_rami'],
		"color"                 => $record['color'],
		"vladel_kts"            => $record['vladel_kts'],
		"vladel_adres"          => $record['vladel_adres'],
		"vlad_tot"              => $record['vlad_tot'],
		"kts"                   => $record['kts'],
		"kyzov"                 => $record['kyzov'],
		"data_vedenja"          => $record['data_vedenja'],
		"zavod_nomer"           => $record['zavod_nomer'],
		"invent_nomer"          => $record['invent_nomer'],
		"teh_har"               => $record['teh_har'],
	);
}
$data[] = $items;

die(json_encode($data[0], 256));
?>