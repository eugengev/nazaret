<?php
header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

print_r($_POST);

$nomer_act = $_POST['nomer'];
$date_act = $_POST['date'];
$idr = $_POST['idr'];

$sqlu = 'UPDATE `reestr` SET `nomer_act`="'.$nomer_act.'", `date_act`="'.$date_act.'" WHERE `id` = '.$idr;
$db->query($sqlu);
$db->close();

$data['ok'] = 'ok';

die(json_encode($data, 256));

?>