<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");


$db = new Database( $db_host, $db_login, $db_passwd, $db_name );
$db->connect();

if (isset($_POST['staus']) && $_POST['staus'] == 'updateAdress') {

	$userinfo = array(
		"zip"     => $_POST['zip'],
		"oblast"   => $_POST['oblast'],
		"raion"    => $_POST['raion'],
		"t_pynkt"  => $_POST['t_pynkt'],
		"pynkt"    => $_POST['pynkt'],
		"t_street" => $_POST['t_street'],
		"street"   => $_POST['street'],
		"dom"      => $_POST['dom'],
	);

	$id    = $db->query_update( 's_adress', $userinfo, '`id` = '.$_POST['id'] );
	$users = $id;
}

$db->close();

die(json_encode($data, 256));
?>