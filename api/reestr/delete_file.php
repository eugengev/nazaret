<?php
header('Content-Type: application/json;charset=utf-8');
include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("./../mysql.php");

if (isset($_POST['id']) && $_POST['id'] != '') {
	$db = new Database($db_host, $db_login, $db_passwd, $db_name);
	$db->connect();

	$sql = "DELETE FROM `maino_file` WHERE  `id` = ".$_POST['id'];
	$rows = $db->query($sql);
	$db->close();

	$data = [];

	die(json_encode($data, 256));

} else {
	echo 'Please choose at least one file';
}



?>