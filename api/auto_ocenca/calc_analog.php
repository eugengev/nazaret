<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("./../mysql.php");

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

$ocenca_auto_id = $_POST['ocenca_auto_id'];

$data = [];

$avgsum = 0;
$min = 0;
$max = 0;
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


	$sql     = "SELECT MIN(vartis) as minn FROM `ocenca_auto_analog` WHERE `ocenca_auto_id` = " . $ocenca_auto_id;
	$rowavg = $db->query_first( $sql );
	$min = $rowavg['minn'];

	$sql     = "SELECT max(vartis) as maxx FROM `ocenca_auto_analog` WHERE `ocenca_auto_id` = " . $ocenca_auto_id;
	$rowavg = $db->query_first( $sql );
	$max = $rowavg['maxx'];


	$count = 0;
	$sered = 0;
	foreach ($rowanal as $item) {
		$count++;
		$sered = $sered + (float) $item['vartis'];
	}
	$sered = round($sered/$count);

	$items = array( 'sale_price_3' => round($sered));
	$db->query_update('ocenca_auto', $items, 'id='.$ocenca_auto_id);

	$vid = (1 - ($min / $max))*100;


	$sql     = "SELECT sale_price_chose FROM `ocenca_auto_analog` WHERE `ocenca_auto_id` = " . $ocenca_auto_id. " LIMIT 1";
	$rowanal =  $db->query_first( $sql );

	$sale_price_chose = $rowanal['sale_price_chose'];

	switch ($sale_price_chose) {
		case 'sale_price':
			$sql     = "UPDATE `ocenca_auto` SET `sale_price` = '".$avgsum."' WHERE id = ". $ocenca_auto_id;
			$rowanal = $db->query( $sql );
			break;
		case 'sale_price_2':
			$sql     = "UPDATE `ocenca_auto` SET `sale_price` = '".$mediane."' WHERE id = ". $ocenca_auto_id;
			$rowanal = $db->query( $sql );
			break;
		case 'sale_price_3':
			$sql     = "UPDATE `ocenca_auto` SET `sale_price` = '".$sered."' WHERE id = ". $ocenca_auto_id;
			$rowanal = $db->query( $sql );
			break;
	}

}

$db->close();

$items = array(
	"avgsum"        => $avgsum,
	"avgsum2"       => $mediane,
	"avgsum3"       => $sered,
	"min"           => $min,
	"max"           => $max,
	"vid"           => $vid.' %',
	"sale_price_chose" => $sale_price_chose,

);
$data = $items;

die(json_encode($data, 256));
?>