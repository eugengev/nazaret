<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("./../mysql.php");

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

$data = [];

if (isset($_POST['id'])) {
	$sql = "SELECT * FROM `ocenca_auto_analog` WHERE `ocenca_auto_id` = ".$_POST['id'];
	$rowanal = $db->fetch_all_array($sql);
}
$db->close();


foreach($rowanal as $record){
	$items = array(
		"id"                => $record['id'],
		"ocenca_auto_id"    => $record['ocenca_auto_id'],
		"url"          => $record['url'],
		"link_pic"     => $record['link_pic'],
		"name"         => $record['name'],
		"year"         => $record['year'],
		"curency"      => $record['curency'],
		"price"        => $record['price'],
		"price_bez"    => $record['price_bez'],
		"price_uah"    => $record['price_uah'],
		"pdv"          => $record['pdv'],
		"kor_torg"     => $record['kor_torg'],
		"kor_year"     => $record['kor_year'],
		"kor_tech"     => $record['kor_tech'],
		"kor_model"    => $record['kor_model'],
		"vartis"       => $record['vartis'],

	);
	$data[] = $items;
}


die(json_encode($data, 256));
?>