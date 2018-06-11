<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require("mysql.php");


$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

if (($file = fopen($_SERVER['DOCUMENT_ROOT'].'/uploads/houses_en.csv', 'r')) === false)
{
	throw new Exception('There was an error loading the CSV file.');
}
else
{
	$count = 0;
	while (($line = fgetcsv($file, 1000, ';')) !== false)
	{
		$count++;
//		$csv[] = $line;
		$import = array(
			'oblast' => $line[0],
			'rayon' => $line[1],
			'misto' => $line[2],
			'zip' => $line[3],
			'street' => $line[4],
			'dom' => $line[5],
		);
		$db->query_insert('s_adress_full', $import);
		echo $count.'<br />';
	}

	fclose($file);
}

$db->close();


?>