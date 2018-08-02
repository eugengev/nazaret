<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("./../mysql.php");

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

$data = [];



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
	       "LEFT JOIN reestr  ON reestr.id  = maino.reestr_id ".
	       "LEFT JOIN s_city  ON reestr.city_id   = s_city.id ".
	       "LEFT JOIN s_bank  ON reestr.bank_id    = s_bank.id ".
	       "LEFT JOIN s_meta  ON reestr.meta_id    = s_meta.id ".
	       "LEFT JOIN s_maino ON maino.vid_id    = s_maino.id ".
	       "WHERE maino.id = ".$_POST['idm']." LIMIT 1";
	$rowm = $db->fetch_all_array($sql);

	$sql = "SELECT * FROM `recenzij` WHERE `maino_id` = ".$_POST['idm']." AND `reestr_id` = ".$_POST['idr'];
	$rowa = $db->query_first($sql);

	if (empty($rowa)) {
		$rowa = $db->query_insert('recenzij', array('maino_id'=>$_POST['idm'], 'reestr_id'=>$_POST['idr']));
		$sql = "SELECT * FROM `recenzij` WHERE `maino_id` = ".$_POST['idm']." AND `reestr_id` = ".$_POST['idr'];
		$rowa = $db->query_first($sql);

	}
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


$items = array(
	"id"          => $rowa['id'],
	"maino_id"    => $rowa['maino_id'],
	"reestr_id"   => $rowa['reestr_id'],
	"nazva"       => $rowa['nazva'],
	"zamov"       => $rowa['zamov'],
	"obekt"       => $rowa['obekt'],
	"vikonav"     => $rowa['vikonav'],
	"ocenchiki"   => $rowa['ocenchiki'],
	"pidstava"    => $rowa['pidstava'],
	"meta"        => $rowa['meta'],
	"vid"         => $rowa['vid'],
	"data_ocenka" => datf($rowa['data_ocenka']),
	"pidhodi"     => $rowa['pidhodi'],
	"vartist"     => $rowa['vartist'],
	"pidstavaoc"  => $rowa['pidstavaoc'],
	"visnov1"     => $rowa['visnov1'],
	"visnov2"     => $rowa['visnov2'],
	"visnov3"     => $rowa['visnov3'],
	"visnov4"     => $rowa['visnov4'],
	"data_oforml" => datf($rowa['data_oforml']),
	"obekt_list"  => json_decode($rowa['obekt_list']),
	"ocenchiki_list"   => json_decode($rowa['ocenchiki_list']),
	"vartist_list"     => json_decode($rowa['vartist_list']),
	"rezenzetami"      => $rowa['rezenzetami'],
	"rezenzetami_list" => json_decode($rowa['rezenzetami_list']),
	"opisobekt"        => $rowa['rezenzetami'],
	"opisobekt_list"   => json_decode($rowa['opisobekt_list']),
	"opisobekt2"       => $rowa['opisobekt2'],
	"docum"            => $rowa['docum'],
	"docum_list"       => json_decode($rowa['docum_list']),
	"vizual"           => $rowa['vizual'],
	"factori"          => $rowa['factori'],
	"jakist"           => $rowa['jakist'],
	"visnov3_list"     => json_decode($rowa['visnov3_list']),
	"visnov4_list"     => json_decode($rowa['visnov4_list']),
	"obgruntuv"        => $rowa['obgruntuv'],
	"visnov"           => $rowa['visnov'],
	"obgrunt"          => $rowa['obgrunt'],
	"vikoroce"         => $rowa['vikoroce'],
	"vikoroce_list"    => json_decode($rowa['vikoroce_list']),
	"opis"         => $rowa['opis'],


);

$ol = json_decode($rowa['opisobekt_list']);
$olre = array();
if (!empty($ol)) {
	foreach ( $ol->name as $key => $value ) {
		$olrep  = array(
			'name' => $ol->name[ $key ],
			'opis' => $ol->opis[ $key ],
		);
		$olre[] = $olrep;
	}
}
$items["opisobekt_list"] = $olre;

$data['items'] = $items;

die(json_encode($data, 256));
?>