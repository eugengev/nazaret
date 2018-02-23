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

$sql = "SELECT * FROM `settings`";

$rows = $db->fetch_all_array($sql);
// print out array later on when we need the info on the page
foreach($rows as $record){
	echo "<tr><td>$record[id]</td>
          <td>$record[name]</td></tr>";
}

$db->close();