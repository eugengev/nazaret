<?php
header('Content-Type: application/json;charset=utf-8');
include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require ($_SERVER['DOCUMENT_ROOT'].'/api/mysql.php');
require ($_SERVER['DOCUMENT_ROOT']."/vendor/PHPExcel.php");


if (isset($_FILES['files']) && !empty($_FILES['files'])) {
	$root = $_SERVER['DOCUMENT_ROOT'];

	$reestr_id = $_POST['restrid'];
	$maino_id = $_POST['mainoid'];

	if (!file_exists($root.'/uploads/excel')) {
		mkdir($root.'/uploads/excel', 0777, true);
	}
	$yes_files = [];

	$no_files = count($_FILES["files"]['name']);
	for ($i = 0; $i < $no_files; $i++) {
		if ($_FILES["files"]["error"][$i] > 0) {
//				echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
		} else {
			if (file_exists($root.'/uploads/excel/' . $_FILES["files"]["name"][$i])) {
//					echo 'File already exists : '.$root.'/uploads/'.$reestr_id.'/'.$idmaino.'/' . $_FILES["files"]["name"][$i];
			} else {
				move_uploaded_file($_FILES["files"]["tmp_name"][$i], $root.'/uploads/excel/' . $_FILES["files"]["name"][$i]);
//					echo 'File successfully uploaded : '.$root.'/uploads/'.$reestr_id.'/'.$idmaino.'/' . $_FILES["files"]["name"][$i] . ' ';
				$f = [];
				$f['name'] =  $_FILES["files"]["name"][$i];
				$f['link'] =  '/uploads/excel/' . $_FILES["files"]["name"][$i];
				$yes_files[] = $f;
			}
		}
	}
	$db = new Database($db_host, $db_login, $db_passwd, $db_name);
	$db->connect();
	foreach ($yes_files as $file) {
		$f = $root.$file['link'];
		$Reader = PHPExcel_IOFactory::createReaderForFile($f);
		$Reader->setReadDataOnly(true);

		$objXLS = $Reader->load($f);
		$value = $objXLS->getSheet(0)->getCell('A1')->getValue();
		$lastRow = $objXLS->getActiveSheet()->getHighestRow();
		$rowse = array();

		for ($i=2;$i<=$lastRow;$i++) {
			$row = array();
			$row['maino_id'] = $maino_id;
			$row['name']  = $objXLS->getSheet(0)->getCell('A'.$i)->getValue();
			$row['marka'] = $objXLS->getSheet(0)->getCell('B'.$i)->getValue();
			$row['model'] = $objXLS->getSheet(0)->getCell('C'.$i)->getValue();
			$row['year']  = $objXLS->getSheet(0)->getCell('D'.$i)->getValue();
			$row['vin']   = $objXLS->getSheet(0)->getCell('E'.$i)->getValue();
			$row['reg_nom_tran_val']   = $objXLS->getSheet(0)->getCell('F'.$i)->getValue();

			$idan = $db->query_insert( 'ocenca_auto', $row );
		}

		$objXLS->disconnectWorksheets();
		unset($objXLS);
		unlink($f);
	}


	if (isset($_POST['restrid'])) {
		$sql = "SELECT reestr.*, s_client.name as client, s_firma.name as firma, s_city.name as city, s_bank.name as bank, s_meta.name as meta, s_manager.name as manager ".
		       "FROM reestr ".
		       "LEFT JOIN s_client  ON reestr.client_id  = s_client.id ".
		       "LEFT JOIN s_firma   ON reestr.firma_id   = s_firma.id ".
		       "LEFT JOIN s_city    ON reestr.city_id    = s_city.id ".
		       "LEFT JOIN s_bank    ON reestr.bank_id    = s_bank.id ".
		       "LEFT JOIN s_meta    ON reestr.meta_id    = s_meta.id ".
		       "LEFT JOIN s_manager ON reestr.manager_id = s_manager.id ".
		       "WHERE reestr.id = ".$_POST['restrid']." LIMIT 0, 1";
		$rowr = $db->fetch_all_array($sql);
	}

	if (isset($_POST['mainoid'])) {
		$sql = "SELECT maino.*, reestr.id as rid, reestr.nomber, reestr.datework, s_city.name as city, s_bank.name as bank, s_meta.name as meta, s_maino.name as mname ".
		       " FROM `maino` ".
		       "LEFT JOIN reestr ON reestr.id  = maino.reestr_id ".
		       "LEFT JOIN s_city ON reestr.city_id   = s_city.id ".
		       "LEFT JOIN s_bank    ON reestr.bank_id    = s_bank.id ".
		       "LEFT JOIN s_meta    ON reestr.meta_id    = s_meta.id ".
		       "LEFT JOIN s_maino   ON maino.vid_id    = s_maino.id ".
		       "WHERE maino.id = ".$_POST['mainoid']." LIMIT 0, 1";
		$rowm = $db->fetch_all_array($sql);

		$sql = "SELECT * FROM `ocenca_auto` WHERE `maino_id` = ".$_POST['mainoid'];
		$rowa = $db->fetch_all_array($sql);
	}

	$db->close();


	foreach($rowr as $record){
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
			"nomer_act"  => $record['nomer_act'],
			"date_act"   => $record['date_act'],
		);
	}
	$data['reestr'] = $list;

	foreach($rowm as $record){
		$list = array(
			"id"       => $record['id'],
			"opis"     => $record['opis'],
			"mname"    => $record['mname'],
			"vid_id"   => $record['vid_id'],
			"nomber"   => $record['nomber'],
			"datework" => $record['datework'],
			"status"   => $record['status'],
			"city"     => $record['city'],
			"count"    => $record['count'],
			"bank"     => $record['bank'],
			"meta"     => $record['meta'],
			"rid"      => $record['rid'],
		);
	}
	$data['ocenca'] = $list;
	$items = [];

	foreach($rowa as $record){
		$items[] = array(
			"id"         => $record['id'],
			"maino_id"   => $record['maino_id'],
			"name"       => $record['name'],
			"model"      => $record['model'],
			"marka"      => $record['marka'],
			"year"       => $record['year'],
			"vin"        => $record['vin'],
			"sale_price" => $record['sale_price'],
			"sale_price_2"=> $record['sale_price_2'],
			"sale_price_3"=> $record['sale_price_3'],
		);
	}
	$data['items'] = $items;

	die(json_encode($data, 256));


} else {
	echo 'Please choose at least one file';
}



?>