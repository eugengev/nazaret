<?php
//header('Content-Type: application/json;charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("./../mysql.php");

function screen($url, $razr, $razm, $form, $name)
{
	if (file_exists($root."/uploads/screen/auto/".$name.".".$form)) {
		unlink($root."/uploads/screen/auto/".$name.".".$form);
	}
	$root = $_SERVER['DOCUMENT_ROOT'];
	$toapi="http://mini.s-shot.ru/".$razr."/".$razm."/".$form."/?".$url;
	$scim=file_get_contents($toapi);
	file_put_contents($root."/uploads/screen/auto/".$name.".".$form, $scim);
	return "/uploads/screen/auto/".$name.".".$form;
	// exemple/screen/ - путь к папке в которую сохранять скрин
}

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

if (isset($_POST['link']) && $_POST['link'] != '' && isset($_POST['id'])) {

	$link = $_POST['link'];
	$id = $_POST['id'];

	$sql = "SELECT * FROM `ocenca_auto` WHERE `id` = ".$id." LIMIT 1";
	$rowa = $db->query_first($sql);

	$userinfo = array(
		'ocenca_auto_id' => $id,
		'url'  => $link,
		'curency' => 'UAH',
		"kor_torg"     => 1,
		"kor_year"     => 1,
		"kor_tech"     => 1,
		"kor_model"    => 1,
		'name' => $rowa['marka'].'/'.$rowa['model'],
		'year' => $rowa['year']
	);

	$idan = $db->query_insert( 'ocenca_auto_analog', $userinfo );

	$screenname = 'screen_auto_'.$id.'_'.$idan;
	$link = screen($link, "1920x2000", "1920", "jpeg", $screenname);

	$userinfo = array(
		'link_pic' => $link
	);
	$db->query_update('ocenca_auto_analog', $userinfo, 'id='.$idan);
}

if (isset($_POST['type']) && $_POST['type'] == 'deleterow' && isset($_POST['idd']) ) {
	$sql = "DELETE FROM `ocenca_auto_analog` WHERE `id` = ".$_POST['idd'];
	$db->query($sql);
}
?>