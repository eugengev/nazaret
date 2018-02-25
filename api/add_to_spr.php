<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");

if (isset($_POST['table'])) {
	$db = new Database( $db_host, $db_login, $db_passwd, $db_name );
	$db->connect();

	if (isset($_POST['val_new'])) {
		$userinfo = array(
			'name' => $_POST['val_new'],
		);

		$id = $db->query_insert( $_POST['table'], $userinfo );
	}

	$sql  = "SELECT * FROM `".$_POST['table']."` WHERE `name` LIKE '%".$_POST['val_new']."%'";
	$rows = $db->fetch_all_array( $sql );
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