<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("./../mysql.php");

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

$data = [];

if (isset($_POST['nazva'])) {

	$field = $_POST;
	$id = $field['id'];
	unset($field['nomber']);
	unset($field['old_nomber']);
	unset($field['date']);
	unset($field['client']);
	unset($field['firma']);
	unset($field['nomber']);
	unset($field['nomber']);
	unset($field['nomber']);
	unset($field['id']);
	$field['obekt_list']     = json_encode($field['obekt_list']);
	$field['ocenchiki_list'] = json_encode($field['ocenchiki_list']);
	$field['vartist_list']   = json_encode($field['vartist_list']);
	$field['rezenzetami_list']   = json_encode($field['rezenzetami_list']);
	$field['opisobekt_list']   = json_encode($field['opisobekt_list']);
	$field['docum_list']   = json_encode($field['docum_list']);
	$field['visnov3_list']   = json_encode($field['visnov3_list']);
	$field['visnov4_list']   = json_encode($field['visnov4_list']);
	$field['vikoroce_list']   = json_encode($field['vikoroce_list']);

	$id = $db->query_update('recenzij', $field, 'id='.$id);
}

die(json_encode($data, 256));
?>