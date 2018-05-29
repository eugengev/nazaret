<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

if (isset($_POST['pagenom'])) {
	$limit = " LIMIT ".(20*$_POST['pagenom']).", 20 ";
} else {
	$limit = " LIMIT 0, 20 ";
}

if (isset($_POST['id'])) {
	$sql = 'UPDATE reestr SET status = "d" WHERE id = '.$_POST['id'];
	$idd = $db->query($sql);
}

$sql = "SELECT reestr.*, s_client.name as client, s_firma.name as firma, s_city.name as city, s_bank.name as bank, s_meta.name as meta, s_manager.name as manager ".
       "FROM reestr ".
       "LEFT JOIN s_client  ON reestr.client_id  = s_client.id ".
       "LEFT JOIN s_firma   ON reestr.firma_id   = s_firma.id ".
       "LEFT JOIN s_city    ON reestr.city_id    = s_city.id ".
       "LEFT JOIN s_bank    ON reestr.bank_id    = s_bank.id ".
       "LEFT JOIN s_meta    ON reestr.meta_id    = s_meta.id ".
       "LEFT JOIN s_manager ON reestr.manager_id = s_manager.id ".
       "WHERE NOT status = 'd' ".
       "ORDER BY timestamp DESC ".$limit;
$rows = $db->fetch_all_array($sql);

//echo $sql;

$sqlp = 'SELECT round(count(*)/20) as page FROM `reestr` WHERE 1';
$rowp = $db->query_first($sqlp);

$db->close();

$data = [];

foreach($rows as $record){
	$list = array(
		"id"         => $record['id'],
		"nomber"     => $record['nomber'],
		"date"       => $record['date'],
		"datework"   => $record['datework'],
		"old_nomber" => $record['prev_id'],
		"cifr_nomer" => $record['cifr_nomer'],
		"client"     => $record['client'],
		"firma"      => $record['firma'],
		"city"       => $record['city'],
		"bank"       => $record['bank'],
		"meta"       => $record['meta'],
		"manager"    => $record['manager'],
		"nomer_act"  => $record['nomer_act'],
		"date_act"   => $record['date_act'],
		"countpage"  => $rowp['page'],
	);

	$data[] = $list;
}

die(json_encode($data, 256));
?>