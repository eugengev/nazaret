<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("./../mysql.php");

if (isset($_POST['idBank']) && isset($_POST['idReestr'])) {
	$db = new Database($db_host, $db_login, $db_passwd, $db_name);
	$db->connect();

	$idBank   = $_POST['idBank'];
	$idReestr = $_POST['idReestr'];

	$field = array(
		'bank_info_id' => $idBank
	);

	$db->query_update('reestr', $field, 'id='.$idReestr);

	$db->close();
}

?>