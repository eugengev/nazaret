<?php
	include_once 'conf.php';
	require($_SERVER['DOCUMENT_ROOT']."/api/mysql.php");
	require($_SERVER['DOCUMENT_ROOT']."/print/summ.php");
	$auth = new auth(); //~ Создаем новый объект класса
	if ($auth->check()) {
		if (isset($_REQUEST['work']) && $_REQUEST['work'] == 'print') {
			if (isset($_REQUEST['template'])) {
				$template = $_REQUEST['template'];
				$zajva = $_REQUEST['schet'];
				$id = $_REQUEST['id'];
				if (isset($_REQUEST['email'])) {
					$email = true;
				} else {
					$email = false;
				}

				global $zajva;
				switch ($template) {
					case 'schet':
						include_once $_SERVER['DOCUMENT_ROOT'] . '/print/schet.php';
						break;
					case 'zajava':
						include_once $_SERVER['DOCUMENT_ROOT'] . '/print/zajava.php';
						break;
					case 'act':
						include_once $_SERVER['DOCUMENT_ROOT'] . '/print/act.php';
						break;
				}
			}

		} else {
			echo 'error';
		}
	}
?>