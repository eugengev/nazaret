<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");

if (isset($_POST['nomfirm'])) {
	$db = new Database( $db_host, $db_login, $db_passwd, $db_name );
	$db->connect();

	$sql  = "SELECT * FROM `s_firma` WHERE id=".$_POST['nomfirm'];
	$rows = $db->fetch_all_array( $sql );
	$db->close();

	$data = [];

	$nomer = 0;

	foreach ( $rows as $record ) {
		if ($record['autonomer'] == 1) {
			$nomer = $record['firstchar'].((int)$record['lastnomer']+1);
		}
//		$list = array(
//			"id"   => $record['id'],
//			"name" => $record['name'],
//		);
//
//		$data[] = $list;
	}
	$data['nomer'] = $nomer;
}
die(json_encode($data, 256));

?>