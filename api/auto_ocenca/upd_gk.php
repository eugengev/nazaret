<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("./../mysql.php");

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

$data = [];

if (isset($_POST['id']) && $_POST['id'] > 0) {
	$gk = 0;

	$field = array(
		"koefic"                => $_POST['koefic'],
		"probeg_norm"           => round($_POST['probeg_norm'],0),
		"probeg_fact"           => round($_POST['probeg_fact'],0),
		"probeg_fact_sred"      => round($_POST['probeg_fact_sred'],0),
		"probeg_nedop"          => round($_POST['probeg_nedop'],0),
		"gk"                    => $gk
	);

	if ($field['probeg_nedop'] < 0) {
		$sql  = "SELECT * FROM `s_gk` WHERE `do` < " . $field['probeg_nedop'] . " AND `od` > " . $field['probeg_nedop'] . " LIMIT 1";
		$rowgk = $db->query_first( $sql );
	} else {
		$sql  = "SELECT * FROM `s_gk` WHERE `do` > " . $field['probeg_nedop'] . " AND `od` < " . $field['probeg_nedop'] . " LIMIT 1";
		$rowgk = $db->query_first( $sql );
	}

	$gk = 0;
	if  ($_POST['fullyear'] <= 90) {
		$gk = $rowgk['y90'];
	}
	if  ($_POST['fullyear'] <= 22) {
		$gk = $rowgk['y22'];
	}
	if  ($_POST['fullyear'] <= 20) {
		$gk = $rowgk['y20'];
	}
	if  ($_POST['fullyear'] <= 18) {
		$gk = $rowgk['y18'];
	}
	if  ($_POST['fullyear'] <= 16) {
		$gk = $rowgk['y16'];
	}
	if  ($_POST['fullyear'] <= 14) {
		$gk = $rowgk['y14'];
	}
	if  ($_POST['fullyear'] <= 12) {
		$gk = $rowgk['y12'];
	}
	if  ($_POST['fullyear'] <= 10) {
		$gk = $rowgk['y10'];
	}
	if  ($_POST['fullyear'] <= 8) {
		$gk = $rowgk['y08'];
	}
	if  ($_POST['fullyear'] <= 5) {
		$gk = $rowgk['y05'];
	}
	if  ($_POST['fullyear'] <= 2) {
		$gk = $rowgk['y02'];
	}

	$fullyearr = $_POST['fullyear'] + ($_POST['fullmonth']/12);

	$field = array(
		"koefic"                => $_POST['koefic'],
		"probeg_norm"           => round($_POST['probeg_norm'],0),
		"probeg_fact"           => round($_POST['probeg_fact'],0),
		"probeg_fact_sred"      => round($_POST['probeg_fact_sred'],0),
		"probeg_nedop"          => round($_POST['probeg_nedop'],0),
		"gk"                    => $gk
	);
	$id = $db->query_update('ocenca_auto', $field, 'id='.$_POST['id']);


	$sql  = "SELECT * FROM `ocenca_auto` WHERE `id` = " . $_POST['id'] . " LIMIT 1";
	$rowa = $db->fetch_all_array( $sql );
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
		"dz_json"               => $record['dz_json'],
		"dz"                    => $record['dz'],
		"koefic"                => $record['koefic'],
		"probeg_norm"           => $record['probeg_norm'],
		"probeg_fact"           => $record['probeg_fact'],
		"probeg_fact_sred"      => $record['probeg_fact_sred'],
		"probeg_nedop"          => $record['probeg_nedop'],
		"gk"                    => $record['gk'],
	);
}
$data[] = $items;

die(json_encode($data[0], 256));
?>