<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("./../mysql.php");

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

$ocenca_auto_id = 0;

$data = [];

if (isset($_POST['items'])) {
	$items = $_POST['items'];
	foreach ($items as $item) {
		$id = $item['id'];
		$ocenca_auto_id = $item['ocenca_auto_id'];
		unset($item['items']);
		unset($item['id']);
		unset($item['ocenca_auto_id']);
		if ($item['pdv'] == '1') {
			$sum = $item['price_bez'];
		} else {
			$sum = $item['price'];
		}

		$item['kor_torg'] = str_replace(',','.', $item['kor_torg']);
		$item['kor_year'] = str_replace(',','.', $item['kor_year']);
		$item['kor_tech'] = str_replace(',','.', $item['kor_tech']);
		$item['kor_model'] = str_replace(',','.', $item['kor_model']);

		$sum = $sum * $item['kor_torg'];
		$sum = $sum * $item['kor_year'];
		$sum = $sum * $item['kor_tech'];
		$sum = $sum * $item['kor_model'];
		$item['vartis'] = $sum;
		$db->query_update('ocenca_auto_analog', $item, 'id='.$id);
	}
}

if ($ocenca_auto_id != 0) {
	$sql     = "SELECT AVG(vartis) as vavg FROM `ocenca_auto_analog` WHERE `ocenca_auto_id` = " . $ocenca_auto_id;
	$rowavg = $db->query_first( $sql );

	$item = array( 'sale_price' => round($rowavg['vavg']));
	$db->query_update('ocenca_auto', $item, 'id='.$ocenca_auto_id);

	$sql     = "SELECT * FROM `ocenca_auto_analog` WHERE `ocenca_auto_id` = " . $ocenca_auto_id;
	$rowanal = $db->fetch_all_array( $sql );
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