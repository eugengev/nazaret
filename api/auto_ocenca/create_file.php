<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("./../mysql.php");
require ($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

print_r($_POST);

$PHPWord = new \PhpOffice\PhpWord\PhpWord();
$document = $PHPWord->loadTemplate($_SERVER['DOCUMENT_ROOT'].'/uploads/word_shablon/ocenca_avto.doc'); //шаблон
$document->setValue('d_num', '777'); //номер договора
$document->setValue('d_date', '04.10.2014'); //дата договора
$document->setValue('last_name', 'Никоненко'); //фамилия
$document->setValue('name', 'Сергей');// имя
$document->setValue('surname', 'Васильевич');// отчество
$document->save($_SERVER['DOCUMENT_ROOT'].'/uploads/word_shablon/ocenca_avto_'.$_POST['id'].'.docx'); //имя заполненного шаблона для сохранения


$db->close();
?>