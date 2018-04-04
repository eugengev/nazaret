<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");

if (isset($_POST['table'])) {
	$db = new Database( $db_host, $db_login, $db_passwd, $db_name );
	$db->connect();

	if (isset($_POST['idcity']) && $_POST['idcity'] != 0) {
		$sql  = "SELECT * FROM `".$_POST['table']."` WHERE `city_id`=".$_POST['idcity'];
		$rows = $db->fetch_all_array( $sql );
	} elseif (isset($_POST['idmarka']) && $_POST['idmarka'] != '') {
		$sql  = "SELECT * FROM `".$_POST['table']."` WHERE `marka_id` in (SELECT id FROM `s_marka` WHERE `name` = '".$_POST['idmarka']."')";
		$rows = $db->fetch_all_array( $sql );
	} else {
		$sql  = "SELECT * FROM `".$_POST['table']."`";
		$rows = $db->fetch_all_array( $sql );
	}
	$db->close();

	$data = [];

	foreach ( $rows as $record ) {
		$list = array(
			"id"   => $record['id'],
			"name" => $record['name'],
		);

		$data[] = $list;
	}
}
die(json_encode($data, 256));

?>