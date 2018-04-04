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

if (isset($_POST['link']) && isset($_POST['id'])) {

	$link = $_POST['link'];
	$id = $_POST['id'];

	$sql = "SELECT * FROM `ocenca_auto` WHERE `id` = ".$id." LIMIT 1";
	$rowa = $db->query_first($sql);

	$userinfo = array(
		'ocenca_auto_id' => $id,
		'url'  => $link,
		'curency' => 'UAH',
		'name' => $rowa['name'],
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
/*
$data = [];

$sql = "SELECT * FROM `ocenca_auto_analog` WHERE `ocenca_auto_id` = ".$_POST['id'];
$rowanal = $db->fetch_all_array($sql);

$db->close();

foreach($rowa as $record){
	$items = array(
		"id"                => $record['id'],
		"ocenca_auto_id"    => $record['ocenca_auto_id'],
		"url"          => $record['url'],
		"link_pic"     => $record['link_pic'],
		"name"         => $record['name'],
		"year"         => $record['year'],
		"curency"      => $record['curency'],
		"price"        => $record['price'],
		"price_bez"    => $record['price_bez'],
		"kor_torg"     => $record['kor_torg'],
		"kor_year"     => $record['kor_year'],
		"kor_tech"     => $record['kor_tech'],
		"kor_model"    => $record['kor_model'],
		"vartis"       => $record['vartis'],

	);
	$data[] = $items;
}

die(json_encode($data, 256));
*/
?>