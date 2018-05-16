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

		$sql = "SELECT re.datework as dat FROM `ocenca_auto` as oa, `maino` as ma, `reestr` as re WHERE oa.id = ".$item['ocenca_auto_id']." AND ma.id = oa.maino_id AND re.id = ma.reestr_id";
		$vald = $db->query_first($sql);

		$datwork = $vald['dat'];

		$sqll = "SELECT * FROM `s_valute` WHERE `date`='".$datwork."' AND `currency`='".$item['curency']."'";
		$val = $db->fetch_all_array($sqll);

		$val_rate = 1.0;
		foreach ($val as $v) {
			if ($v['currency'] == $item['curency']) {
				$val_rate = $v['rate'];
			}
		}

		$id = $item['id'];
		$ocenca_auto_id = $item['ocenca_auto_id'];
		unset($item['items']);
		unset($item['id']);
		unset($item['ocenca_auto_id']);
		unset($item['avgsum2']);
		unset($item['avgsum3']);

		$sum = $item['price']*$val_rate;
		$item['price_uah'] = $sum;

		$pdvv =$sum/6;
		$item['price_bez'] = round($sum - $pdvv);

		if ($item['pdv'] == '1') {
			$sum = $item['price_bez'];
		}

		$item['kor_torg'] = str_replace(',','.', $item['kor_torg']);
		$item['kor_year'] = str_replace(',','.', $item['kor_year']);
		$item['kor_tech'] = str_replace(',','.', $item['kor_tech']);
		$item['kor_model'] = str_replace(',','.', $item['kor_model']);

		$sum = $sum * $item['kor_torg'];
		$sum = $sum * $item['kor_year'];
		$sum = $sum * $item['kor_tech'];
		$sum = $sum * $item['kor_model'];
		$item['vartis'] = round($sum);
		$db->query_update('ocenca_auto_analog', $item, 'id='.$id);
	}
}
$avgsum = 0;
if ($ocenca_auto_id != 0) {
	$sql     = "SELECT AVG(vartis) as vavg FROM `ocenca_auto_analog` WHERE `ocenca_auto_id` = " . $ocenca_auto_id;
	$rowavg = $db->query_first( $sql );
	$avgsum = round($rowavg['vavg']);
	$items = array( 'sale_price' => round($rowavg['vavg']));
	$db->query_update('ocenca_auto', $items, 'id='.$ocenca_auto_id);

	$sql     = "SELECT vartis FROM `ocenca_auto_analog` WHERE `ocenca_auto_id` = " . $ocenca_auto_id. " ORDER BY vartis ASC";
	$rowanal = $db->fetch_all_array( $sql );

	unset($rowanal[count($rowanal)-1]);
	unset($rowanal[0]);

	$count = 0;
	$mediane = 0;
	foreach ($rowanal as $item) {
		$count++;
		$mediane = $mediane + (float) $item['vartis'];
	}
	$mediane = round($mediane/$count);

	$items = array( 'sale_price_2' => round($mediane));
	$db->query_update('ocenca_auto', $items, 'id='.$ocenca_auto_id);

	$sql     = "SELECT vartis FROM `ocenca_auto_analog` WHERE `ocenca_auto_id` = " . $ocenca_auto_id. " ORDER BY vartis ASC";
	$rowanal = $db->fetch_all_array( $sql );

	while (count($rowanal) > 2) {
		array_shift($rowanal);
		array_pop($rowanal);
	}

	$count = 0;
	$sered = 0;
	foreach ($rowanal as $item) {
		$count++;
		$sered = $sered + (float) $item['vartis'];
	}
	$sered = round($sered/$count);

	$items = array( 'sale_price_3' => round($sered));
	$db->query_update('ocenca_auto', $items, 'id='.$ocenca_auto_id);

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
		"price_uah"    => $record['price_uah'],
		"pdv"          => $record['pdv'],
		"kor_torg"     => $record['kor_torg'],
		"kor_year"     => $record['kor_year'],
		"kor_tech"     => $record['kor_tech'],
		"kor_model"    => $record['kor_model'],
		"vartis"       => $record['vartis'],
		"sale_price_chose" => $record['sale_price_chose'],
		"avgsum"       => $avgsum,
		"avgsum2"      => $mediane,
		"avgsum3"      => $sered,

	);
	$data[] = $items;
}

die(json_encode($data, 256));
?>