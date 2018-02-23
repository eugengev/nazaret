<?php
error_reporting(E_ERROR | E_PARSE);
//~ Старт сессии, файл должен быть сохранен без DOM информации
session_start();

include_once 'module.php';

//~ Параметры подключения к бд
$db_host = 'localhost';
$db_login = 'root'; //~ логин для подключения
$db_passwd = ''; //~ пароль для подключения
$db_name = 'rybolov_nazaret'; //~ Имя таблицы

// подключаемся к бд
$db = new mysql(); //~ Создаем новый объект класса
$db -> connect($db_host, $db_login, $db_passwd, $db_name);

?>
