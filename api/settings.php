<?php
/**
 * Created by PhpStorm.
 * User: eugen
 * Date: 22.01.2018
 * Time: 20:05
 */


include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();


$sql = "SELECT count(*) as cnt FROM `s_valute` WHERE `currency` = 'UAH' AND `date`='".date( 'Y-m-d')."'";
$rows = $db->query_first($sql);
if ($rows['cnt'] < 1) {
	$sql = "SELECT count(*) as cnt FROM `s_valute` WHERE `currency` = 'UAH' AND `date`='".date( 'Y-m-d')."'";
	$rows = $db->query_first($sql);

	if ($rows['cnt'] < 1) {
		$insert = array(
			'currency' => 'UAH',
			'date'     => date( 'Y-m-d' ),
			'rate'     => 1
		);
		$id     = $db->query_insert( 's_valute', $insert );
	}

	$curl = curl_init('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json');
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	$json = curl_exec($curl);
	curl_close($curl);

	$currency = json_decode($json,true);

	foreach ($currency as $item) {
		$sql = "SELECT count(*) as cnt FROM `s_valute` WHERE `currency` = '".$item['cc']."' AND `date`='".date( 'Y-m-d', strtotime($item['exchangedate']))."'";
		$rows = $db->query_first($sql);
		if ($rows['cnt'] < 1) {
			$insert = array(
				'currency' => $item['cc'],
				'date'     => date( 'Y-m-d', strtotime($item['exchangedate'])),
				'rate'     => $item['rate']
			);
			$id     = $db->query_insert( 's_valute', $insert );
		}
	}
}

$db->close();