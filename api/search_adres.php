<?php
header('Content-Type: application/json;charset=utf-8');
include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

$data  =array();

if (isset($_GET['getoblastf'])) {
	$termFind = $db->escape($_GET['term']);
	$sql = "SELECT DISTINCT oblast FROM `s_adress_full` WHERE `oblast` LIKE '%".$termFind."%'";
	$rows = $db->fetch_all_array( $sql );
	foreach ( $rows as $record ) {
		$list = array(
			"id"    => $record['oblast'],
			"label" => $record['oblast'],
			"value" => $record['oblast']
		);

		$data[] = $list;
	}
}

if (isset($_GET['getraionf'])) {
	$termFind   = $db->escape($_GET['term']);
	$oblastFind = $db->escape($_GET['oblast']);
	$sql = "SELECT DISTINCT rayon FROM `s_adress_full` WHERE `oblast` LIKE '%".$oblastFind."%' AND rayon LIKE '%".$termFind."%'";
	$rows = $db->fetch_all_array( $sql );
	foreach ( $rows as $record ) {
		$list = array(
			"id"    => $record['rayon'],
			"label" => $record['rayon'],
			"value" => $record['rayon']
		);

		$data[] = $list;
	}
}

if (isset($_GET['getmisto'])) {
	$termFind   = $db->escape($_GET['term']);
	$oblastFind = $db->escape($_GET['oblast']);
	$raionFind  = $db->escape($_GET['raion']);
	$sql = "SELECT DISTINCT misto FROM `s_adress_full` WHERE `oblast` LIKE '%".$oblastFind."%' AND rayon LIKE '%".$raionFind."%' AND misto LIKE '%".$termFind."%'";
	$rows = $db->fetch_all_array( $sql );
	foreach ( $rows as $record ) {
		$list = array(
			"id"    => $record['misto'],
			"label" => $record['misto'],
			"value" => $record['misto']
		);

		$data[] = $list;
	}
}

if (isset($_GET['getstreet'])) {
	$termFind   = $db->escape($_GET['term']);
	$oblastFind = $db->escape($_GET['oblast']);
	$raionFind  = $db->escape($_GET['raion']);
	$mistoFind  = $db->escape($_GET['misto']);
	$sql = "SELECT DISTINCT street FROM `s_adress_full` WHERE `oblast` LIKE '%".$oblastFind."%' AND rayon LIKE '%".$raionFind."%' AND misto LIKE '%".$mistoFind."%' AND street LIKE '%".$termFind."%'";
	$rows = $db->fetch_all_array( $sql );
	foreach ( $rows as $record ) {
		$list = array(
			"id"    => $record['street'],
			"label" => $record['street'],
			"value" => $record['street']
		);

		$data[] = $list;
	}
}

if (isset($_GET['getdom'])) {
	$termFind    = $db->escape($_GET['term']);
	$oblastFind  = $db->escape($_GET['oblast']);
	$raionFind   = $db->escape($_GET['raion']);
	$mistoFind   = $db->escape($_GET['misto']);
	$streetFind  = $db->escape($_GET['street']);
	$sql = "SELECT DISTINCT dom FROM `s_adress_full` WHERE `oblast` LIKE '%".$oblastFind."%' AND rayon LIKE '%".$raionFind."%' AND misto LIKE '%".$mistoFind."%' AND street LIKE '%".$streetFind."%' AND dom LIKE '%".$termFind."%'";
	$rows = $db->fetch_all_array( $sql );
	foreach ( $rows as $record ) {
		foreach (explode(',',$record['dom']) as $dom) {
			$list = array(
				"id"    => $dom,
				"label" => $dom,
				"value" => $dom
			);

			$data[] = $list;
		}
	}
}
$db->close();
die(json_encode($data, 256));
?>