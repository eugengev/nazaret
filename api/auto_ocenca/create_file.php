<?php
error_reporting(E_ALL);

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("./../mysql.php");
require ($_SERVER['DOCUMENT_ROOT'].'/vendor/vendor/autoload.php');

$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($_SERVER['DOCUMENT_ROOT'].'/uploads/word_shablon/Sample_07_TemplateCloneRow.docx');

$templateProcessor->setValue('weekday', date('l'));            // On section/content
$templateProcessor->setValue('time', date('H:i'));             // On footer
$templateProcessor->setValue('serverName', realpath(__DIR__)); // On header

$templateProcessor->cloneRow('rowValue', 10);

$templateProcessor->setValue('rowValue#1', 'Sun');
$templateProcessor->setValue('rowValue#2', 'Mercury');
$templateProcessor->setValue('rowValue#3', 'Venus');
$templateProcessor->setValue('rowValue#4', 'Earth');
$templateProcessor->setValue('rowValue#5', 'Mars');
$templateProcessor->setValue('rowValue#6', 'Jupiter');
$templateProcessor->setValue('rowValue#7', 'Saturn');
$templateProcessor->setValue('rowValue#8', 'Uranus');
$templateProcessor->setValue('rowValue#9', 'Neptun');
$templateProcessor->setValue('rowValue#10', 'Pluto');

$templateProcessor->setValue('rowNumber#1', '1');
$templateProcessor->setValue('rowNumber#2', '2');
$templateProcessor->setValue('rowNumber#3', '3');
$templateProcessor->setValue('rowNumber#4', '4');
$templateProcessor->setValue('rowNumber#5', '5');
$templateProcessor->setValue('rowNumber#6', '6');
$templateProcessor->setValue('rowNumber#7', '7');
$templateProcessor->setValue('rowNumber#8', '8');
$templateProcessor->setValue('rowNumber#9', '9');
$templateProcessor->setValue('rowNumber#10', '10');


echo date('H:i:s'), ' Saving the result document...', EOL;

$templateProcessor->saveAs($_SERVER['DOCUMENT_ROOT'].'/uploads/word_shablon/Sample__TemplateCloneRow.docx');


?>