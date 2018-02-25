<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");


$db = new Database( $db_host, $db_login, $db_passwd, $db_name );
$db->connect();

if (isset($_POST['staus']) && $_POST['staus'] == 'updateBank') {

	$userinfo = array(
		"mfo"     => $_POST['mfo'],
		"bank"   => $_POST['bank'],
		"ras"    => $_POST['ras'],
	);

	$id    = $db->query_update( 'banki', $userinfo, '`id` = '.$_POST['id'] );
	$users = $id;
}

$sql  = "SELECT * FROM `banki` WHERE `parent_id` =".$_POST['parent_id']." AND `type` = '".$_POST['type']."'";
$rows = $db->fetch_all_array( $sql );

foreach ( $rows as $record ) {
	$list = array(
		"id"   => $record['id'],
		"bank" => $record['bank'],
		"mfo" => $record['mfo'],
		"ras" => $record['ras'],
		"type" => $record['type'],
		"parent_id" => $record['parent_id'],
	);

	$data[] = $list;
}

$db->close();

die(json_encode($data, 256));
?>