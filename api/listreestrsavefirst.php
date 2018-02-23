<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");
$data = [];

if (isset($_POST['status']) && $_POST['status'] == 'addfirstform') {

	$db = new Database( $db_host, $db_login, $db_passwd, $db_name );
	$db->connect();

	$nomber = $_POST['nomber'];
	$date = $_POST['date'];
	$datework = $_POST['datework'];
	$old_nomber = $_POST['old_nomber'];
	$client = $_POST['client'];
	$firma = $_POST['firma'];
	$city = $_POST['city'];
	$bank = $_POST['bank'];
	$meta = $_POST['meta'];
	$manager = $_POST['manager'];

	if (!( !is_int($client) ? (ctype_digit($client)) : true )) {
		$id = $db->query_insert( 's_client',array('name' => $client));
		$client = $id;
	}

	if (!( !is_int($firma) ? (ctype_digit($firma)) : true )) {
		$id = $db->query_insert( 's_firma',array('name' => $firma));
		$firma = $id;
	}

	$sql2  = "SELECT * FROM `s_firma` WHERE id=".$firma;
	$rows2 = $db->fetch_all_array( $sql2 );

	foreach ( $rows2 as $record ) {
		if ($record['autonomer'] == 1) {
			$nid = str_replace($record['firstchar'],'',$nomber);
			$sqlu = 'UPDATE `s_firma` SET `lastnomer`="'.$nid.'" WHERE `id` = '.$firma;
			$db->query($sqlu);
		}
	}

	if (!( !is_int($city) ? (ctype_digit($city)) : true )) {
		$id = $db->query_insert( 's_city',array('name' => $city));
		$city = $id;
	}

	if (!( !is_int($bank) ? (ctype_digit($bank)) : true )) {
		$id = $db->query_insert( 's_bank',array('name' => $bank));
		$bank = $id;
	}

	if (!( !is_int($meta) ? (ctype_digit($meta)) : true )) {
		$id = $db->query_insert( 's_meta',array('name' => $meta));
		$meta = $id;
	}

	if (!( !is_int($manager) ? (ctype_digit($manager)) : true )) {
		$id = $db->query_insert( 's_manager',array('name' => $manager, 'city_id' => $city));
		$manager = $id;
	}

	$field = array(
		'nomber' => $nomber,
		'date' => $date,
		'datework' => $datework,
		'prev_id' => $old_nomber,
		'client_id' => $client,
		'firma_id' => $firma,
		'city_id' => $city,
		'bank_id' => $bank,
		'meta_id' => $meta,
		'manager_id' => $manager,
		'status' => 'n',
	);

	$idr = $db->query_insert( 'reestr',$field);

	if ($idr != 0) {
		$sql = "SELECT reestr.*, s_client.name as client, s_firma.name as firma, s_city.name as city, s_bank.name as bank, s_meta.name as meta, s_manager.name as manager ".
				"FROM reestr ".
				"LEFT JOIN s_client  ON reestr.client_id  = s_client.id ".
				"LEFT JOIN s_firma   ON reestr.firma_id   = s_firma.id ".
				"LEFT JOIN s_city    ON reestr.city_id    = s_city.id ".
		        "LEFT JOIN s_bank    ON reestr.bank_id    = s_bank.id ".
		        "LEFT JOIN s_meta    ON reestr.meta_id    = s_meta.id ".
				"LEFT JOIN s_manager ON reestr.manager_id = s_manager.id ".
				"WHERE reestr.id=".$idr;

		$rows = $db->fetch_all_array($sql);

		foreach ( $rows as $record ) {
			$list = array(
				"id"         => $record['id'],
				"nomber"     => $record['nomber'],
				"date"       => $record['date'],
				"datework"   => $record['datework'],
				"old_nomber" => $record['prev_id'],
				"client"     => $record['client'],
				"firma"      => $record['firma'],
				"city"       => $record['city'],
				"bank"       => $record['bank'],
				"meta"       => $record['meta'],
				"manager"    => $record['manager'],
			);

			$data[] = $list;
		}
	} else {
		$data['error'] = 'Что-то пошло не так 2';
	}
	$db->close();

} else {
	$data['error'] = 'Что-то пошло не так';
}

die(json_encode($data, 256));
?>