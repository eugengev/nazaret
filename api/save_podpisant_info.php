<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");


	$db = new Database( $db_host, $db_login, $db_passwd, $db_name );
	$db->connect();

	if (isset($_POST['staus']) && $_POST['staus'] == 'adduser') {

		$userinfo = array(
			'login_user'  => '',
			'passwd_user' => '',
			'mail_user'   => $_POST['mail_user'],
			'role'        => $_POST['role'],
			'fio'         => $_POST['fio'],
		);

		$id    = $db->query_insert( 'podpisant', $userinfo );
		$users = $id;
	}

	$sql  = "SELECT * FROM `podpisant`";
	$rows = $db->fetch_all_array( $sql );

	$data = [];

	foreach ( $rows as $record ) {
		$list = array(
			"id"        => $record['id_user'],
			"login"     => $record['login_user'],
			"mail_user" => $record['mail_user'],
			"role"      => $record['role'],
			"fio"       => $record['fio'],

		);

		$data[] = $list;
	}

	$db->close();

die(json_encode($data, 256));
?>