<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");
$data = [];

if (isset($_POST['status']) && $_POST['status'] == 'addfirstform' && !isset($_POST['id'])) {

	$db = new Database( $db_host, $db_login, $db_passwd, $db_name );
	$db->connect();

	$nomber = $_POST['nomber'];
	$date = $_POST['date'];
	$datework = $_POST['datework'];
	$old_nomber = $_POST['old_nomber'];
	$cifr_nomer = $_POST['cifr_nomer'];
	$client = $_POST['client'];
	$firma = $_POST['firma'];
	$city = $_POST['city'];
	$bank = $_POST['bank'];
	$meta = $_POST['meta'];
	$manager = $_POST['manager'];
	$vidygodi = $_POST['vidygodi'];
	$nomerygodi = $_POST['nomerygodi'];
	$dateygodi = $_POST['dateygodi'];

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


	if (!( !is_int($vidygodi) ? (ctype_digit($vidygodi)) : true )) {
		$id = $db->query_insert( 's_vidygodi',array('name' => $vidygodi));
		$vidygodi = $id;
	}

	$field = array(
		'nomber' => $nomber,
		'date' => $date,
		'datework' => $datework,
		'prev_id' => $old_nomber,
		'client_id' => $client,
		'cifr_nomer' => $cifr_nomer,
		'firma_id' => $firma,
		'city_id' => $city,
		'bank_id' => $bank,
		'meta_id' => $meta,
		'manager_id' => $manager,
		'vidygodi_id' => $vidygodi,
		'nomerygodi' => $nomerygodi,
		'dateygodi' => $dateygodi,
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
				"cifr_nomer" => $record['cifr_nomer'],
				"client"     => $record['client'],
				"firma"      => $record['firma'],
				"city"       => $record['city'],
				"bank"       => $record['bank'],
				"meta"       => $record['meta'],
				"manager"    => $record['manager'],
				"nomerygodi" => $record['nomerygodi'],
				"dateygodi"  => datf($record['dateygodi']),
				"countpage"  => $rowp['page'],
			);

			$data[] = $list;
		}
	} else {
		$data['error'] = 'Что-то пошло не так 2';
	}
	$db->close();

} elseif (isset($_POST['status']) && $_POST['status'] == 'editform' && isset($_POST['id'])) {

	$db = new Database( $db_host, $db_login, $db_passwd, $db_name );
	$db->connect();

	$idrr = $_POST['id'];
	$nomber = $_POST['nomber'];
	$date = $_POST['date'];
	$datework = $_POST['datework'];
	$old_nomber = $_POST['old_nomber'];
	$cifr_nomer = $_POST['cifr_nomer'];
	$client = $_POST['client'];
	$firma = $_POST['firma'];
	$city = $_POST['city'];
	$bank = $_POST['bank'];
	$meta = $_POST['meta'];
	$manager = $_POST['manager'];
	$vidygodi = $_POST['vidygodi'];
	$nomerygodi = $_POST['nomerygodi'];
	$dateygodi = $_POST['dateygodi'];


	$rows = $db->query_first( 'SELECT id FROM s_client WHERE name = "'.$client.'" LIMIT 1');
	$client = $rows['id'];

	if (!( !is_int($client) ? (ctype_digit($client)) : true ) && $client > 0) {
		$id = $db->query_insert( 's_client',array('name' => $client));
		$client = $id;
	} else {
		$client = $_POST['client'];
	}

	$rows = $db->query_first( 'SELECT id FROM s_firma WHERE name = "'.$firma.'" LIMIT 1');
	$firma = $rows['id'];

	if (!( !is_int($firma) ? (ctype_digit($firma)) : true )) {
		$id = $db->query_insert( 's_firma',array('name' => $firma));
		$firma = $id;
	}

//	$sql2  = "SELECT * FROM `s_firma` WHERE id=".$firma;
//	$rows2 = $db->fetch_all_array( $sql2 );
//
//	foreach ( $rows2 as $record ) {
//		if ($record['autonomer'] == 1) {
//			$nid = str_replace($record['firstchar'],'',$nomber);
//			$sqlu = 'UPDATE `s_firma` SET `lastnomer`="'.$nid.'" WHERE `id` = '.$firma;
//			$db->query($sqlu);
//		}
//	}

	$rows = $db->query_first( 'SELECT id FROM s_city WHERE name = "'.$city.'" LIMIT 1');
	$city = $rows['id'];

	if (!( !is_int($city) ? (ctype_digit($city)) : true )) {
		$id = $db->query_insert( 's_city',array('name' => $city));
		$city = $id;
	}

	$rows = $db->query_first( 'SELECT id FROM s_bank WHERE name = "'.$bank.'" LIMIT 1');
	$bank = $rows['id'];

	if (!( !is_int($bank) ? (ctype_digit($bank)) : true )) {
		$id = $db->query_insert( 's_bank',array('name' => $bank));
		$bank = $id;
	}

	$rows = $db->query_first( 'SELECT id FROM s_meta WHERE name = "'.$meta.'" LIMIT 1');
	$meta = $rows['id'];

	if (!( !is_int($meta) ? (ctype_digit($meta)) : true )) {
		$id = $db->query_insert( 's_meta',array('name' => $meta));
		$meta = $id;
	}

	$rows = $db->query_first( 'SELECT id FROM s_manager WHERE name = "'.$manager.'" LIMIT 1');
	$manager = $rows['id'];

	if (!( !is_int($manager) ? (ctype_digit($manager)) : true )) {
		$id = $db->query_insert( 's_manager',array('name' => $manager, 'city_id' => $city));
		$manager = $id;
	}

	$rows = $db->query_first( 'SELECT id FROM s_vidygodi WHERE name = "'.$vidygodi.'" LIMIT 1');
	$vidygodi = $rows['id'];

	if (!( !is_int($vidygodi) ? (ctype_digit($vidygodi)) : true )) {
		$id = $db->query_insert( 's_vidygodi',array('name' => $vidygodi));
		$vidygodi = $id;
	}

	$field = array(
		'nomber' => $nomber,
		'date' => $date,
		'datework' => $datework,
		'prev_id' => $old_nomber,
		'client_id' => $client,
		'cifr_nomer' => $cifr_nomer,
		'firma_id' => $firma,
		'city_id' => $city,
		'bank_id' => $bank,
		'meta_id' => $meta,
		'manager_id' => $manager,
		'vidygodi_id' => $vidygodi,
		'nomerygodi' => $nomerygodi,
		'dateygodi' => $dateygodi,
		'status' => 'n',
	);


	$idr = $db->query_update( 'reestr', $field, 'id='.$idrr);


	$sql = "SELECT reestr.*, s_client.name as client, s_firma.name as firma, s_city.name as city, s_bank.name as bank, s_meta.name as meta, s_manager.name as manager ".
	       "FROM reestr ".
	       "LEFT JOIN s_client  ON reestr.client_id  = s_client.id ".
	       "LEFT JOIN s_firma   ON reestr.firma_id   = s_firma.id ".
	       "LEFT JOIN s_city    ON reestr.city_id    = s_city.id ".
	       "LEFT JOIN s_bank    ON reestr.bank_id    = s_bank.id ".
	       "LEFT JOIN s_meta    ON reestr.meta_id    = s_meta.id ".
	       "LEFT JOIN s_manager ON reestr.manager_id = s_manager.id ".
		   "ORDER BY ID DESC ";

	$rows = $db->fetch_all_array($sql);

	foreach ( $rows as $record ) {
		$list = array(
			"id"         => $record['id'],
			"nomber"     => $record['nomber'],
			"date"       => datf($record['date']),
			"datework"   => datf($record['datework']),
			"old_nomber" => $record['prev_id'],
			"cifr_nomer" => $record['cifr_nomer'],
			"client"     => $record['client'],
			"firma"      => $record['firma'],
			"city"       => $record['city'],
			"bank"       => $record['bank'],
			"meta"       => $record['meta'],
			"manager"    => $record['manager'],
			"nomerygodi" => $record['nomerygodi'],
			"dateygodi"  => datf( $record['dateygodi'] ),
			"countpage"  => 0,
		);

		$data[] = $list;
	}
	$db->close();

} else {
	echo 'error';
}

die(json_encode($data, 256));
?>