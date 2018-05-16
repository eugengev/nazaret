<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

$id_user = $_SESSION['id_user'];

$sql = "SELECT maino.*, maino.nomber as nomer, reestr.id as rid, reestr.nomber, reestr.datework, s_city.name as city, s_bank.name as bank, s_meta.name as meta, s_maino.name as mname ".
	   " FROM `maino` ".
	        "LEFT JOIN reestr ON reestr.id  = maino.reestr_id ".
            "LEFT JOIN s_city ON reestr.city_id   = s_city.id ".
	        "LEFT JOIN s_bank    ON reestr.bank_id    = s_bank.id ".
            "LEFT JOIN s_meta    ON reestr.meta_id    = s_meta.id ".
            "LEFT JOIN s_maino   ON maino.vid_id    = s_maino.id ";
//       " WHERE vikon = ".$id_user;
$rows = $db->fetch_all_array($sql);

$db->close();

$data = [];

foreach($rows as $record){
	$list = array(
		"id"       => $record['id'],
		"nomer"    => $record['nomer'],
		"opis"     => $record['opis'],
		"mname"    => $record['mname'],
		"vid_id"   => $record['vid_id'],
		"nomber"   => $record['nomber'],
		"datework" => $record['datework'],
		"status"   => $record['status'],
		"city"     => $record['city'],
		"bank"     => $record['bank'],
		"meta"     => $record['meta'],
		"rid"     => $record['rid'],
	);

	$data[] = $list;
}

die(json_encode($data, 256));
?>