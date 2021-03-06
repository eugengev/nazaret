<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");

if (isset($_POST['nomfirm'])) {
	$db = new Database( $db_host, $db_login, $db_passwd, $db_name );
	$db->connect();

	$sql  = "SELECT * FROM `s_firma` WHERE id=".$_POST['nomfirm'];
	$rows = $db->query_first( $sql );
	$data = [];
	$nomer = 0;
	if ($rows['autonomer'] == 1) {
		$sql  = "SELECT cifr_nomer FROM `reestr` WHERE firma_id=".$rows['id']." AND status != 'd' ORDER BY ID DESC LIMIT 1";
		$rowss = $db->query_first( $sql );
		$nomer = $rows['firstchar'].((int)$rowss['cifr_nomer']+1);
	}
	$data['nomer'] = $nomer;
	$data['cifr_nomer'] = (int)$rowss['cifr_nomer']+1;
	$db->close();
}

die(json_encode($data, 256));

?>