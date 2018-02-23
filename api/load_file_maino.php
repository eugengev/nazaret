<?php
header('Content-Type: application/json;charset=utf-8');
include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");


if (isset($_FILES['files']) && !empty($_FILES['files'])) {
	$root = $_SERVER['DOCUMENT_ROOT'];

	$reestr_id = $_POST['retid'];
	$idmaino = $_POST['id'];
	$type = $_POST['type'];

	if (!file_exists($root.'/uploads/'.$reestr_id.'/'.$idmaino)) {
		mkdir($root.'/uploads/'.$reestr_id.'/'.$idmaino, 0777, true);
	}
	$yes_files = [];

	$no_files = count($_FILES["files"]['name']);
	for ($i = 0; $i < $no_files; $i++) {
		if ($_FILES["files"]["error"][$i] > 0) {
//				echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
		} else {
			if (file_exists($root.'/uploads/'.$reestr_id.'/'.$idmaino.'/' . $_FILES["files"]["name"][$i])) {
//					echo 'File already exists : '.$root.'/uploads/'.$reestr_id.'/'.$idmaino.'/' . $_FILES["files"]["name"][$i];
			} else {
				move_uploaded_file($_FILES["files"]["tmp_name"][$i], $root.'/uploads/'.$reestr_id.'/'.$idmaino.'/' . $_FILES["files"]["name"][$i]);
//					echo 'File successfully uploaded : '.$root.'/uploads/'.$reestr_id.'/'.$idmaino.'/' . $_FILES["files"]["name"][$i] . ' ';
				$f = [];
				$f['name'] =  $_FILES["files"]["name"][$i];
				$f['link'] =  '/uploads/'.$reestr_id.'/'.$idmaino.'/' . $_FILES["files"]["name"][$i];
				$yes_files[] = $f;
			}
		}
	}

	$db = new Database($db_host, $db_login, $db_passwd, $db_name);
	$db->connect();

	foreach ($yes_files as $file) {
		$id = $db->query_insert( 'maino_file',array('reestr_id' => $reestr_id, 'maino_id' => $idmaino, 'type' => $type, 'file_pach' => $file['link'], 'name' => $file['name']));
		$firma = $id;
	}

	$sql = "SELECT id,file_pach,name FROM `maino_file` WHERE  `maino_id` = '".$idmaino."' AND `type` = '".$type."'";
	$rows = $db->fetch_all_array($sql);

	$data = [];

	foreach($rows as $record){
		$list = array(
			"id" => $record['id'],
			"file" => $record['file_pach'],
			"name" => $record['name'],
		);

		$data[] = $list;
	}

	$db->close();

	die(json_encode($data, 256));

} else {
	echo 'Please choose at least one file';
}



?>