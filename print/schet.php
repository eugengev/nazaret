<?php
header("Content-type:application/pdf");
require_once $_SERVER['DOCUMENT_ROOT'].'/dompdf/dompdf_config.inc.php';

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

$sql = "SELECT s_firma.*, reestr.id as idd, reestr.date FROM `s_firma`, `reestr` WHERE reestr.id = ".$id." AND reestr.firma_id = s_firma.id";
$firma = $db->query_first($sql);

$sql = "SELECT s_client.* FROM `s_client`, `reestr` WHERE reestr.id = ".$id." AND reestr.client_id = s_client.id";
$client = $db->query_first($sql);

$sql = "SELECT maino.opis, s_maino.name 
          FROM `maino`
          LEFT JOIN `s_maino` ON maino.vid_id = s_maino.id
          WHERE `reestr_id` = ".$id;
$rows = $db->fetch_all_array($sql);

$html = '';
ob_start();
?>
	<html>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<style>
			p { padding: 0; margin: 0; }
			.tc { text-align: center; }
			.tr { text-align: right; }
			table { width: 100%; border-collapse: collapse; border-spacing: 0; }
			th, td {  border: #000 solid 1px; padding: 2px 5px; }
			th { background: #eee; }
			td.nobr { border: none }
		</style>
		<body>
		<p><strong>Постачальник <?=$firma['name'];?></strong></p>
		<p>ЄДРПОУ <?=$firma['okpo'];?>, тел. <?=$firma['tel'];?></p>
		<p>Р/р <?=$firma['ras'];?> <?=$firma['bank'];?></p>
		<p>МФО <?=$firma['mfo'];?></p>
		<p>Адреса <?=$firma['adress'];?></p>
		<br>
		<p>Одержувач <?=$client['name'];?></p>
		<p>тел. <?=$client['phone'];?><p>
		<p>Замовлення Договір № <?=$firma['idd'];?> від <?=$firma['date'];?> р.<p>
		<br>
		<p class="tc">Рахунок-фактура № <?=$firma['idd'];?></p>
		<p class="tc">від <?=$firma['date'];?> р.</p>
		<br>
		<table>
			<thead>
				<tr>
					<th>№</th>
					<th>Назва</th>
					<th>Од.</th>
					<th>Кількість</th>
					<th>Ціна без ПДВ</th>
					<th>Сума без ПДВ</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$count = 0;
				$allSumm = 0;
				foreach ($rows as $row) {
					$count++;
					$allSumm += $row['price']*$row['count'];
					?>
					<tr>
						<td class="tc"><?=$count?></td>
						<td><?= $row['name'] ?> <?= $row['opis'] ?></td>
						<td class="tc">шт.</td>
						<td class="tc"><?=$row['count']?></td>
						<td class="tr"><?=$row['price']?></td>
						<td class="tr"><?=$row['price']*$row['count']?></td>
					</tr>
					<?php
				}
			?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="5" class="tr nobr">Разом без ПДВ:</td>
					<td class="tr"><?=$allSumm?></td>
				</tr>
				<tr>
					<td colspan="5" class="tr nobr">ПДВ:</td>
					<td class="tr">0</td>
				</tr>
				<tr>
					<td colspan="5" class="tr nobr">Всього з ПДВ:</td>
					<td class="tr"><?=$allSumm?></td>
				</tr>
			</tfoot>
		</table>
		<br>
		<br>
		<p>Всього на суму:</p>
		<p><?=num2text_ua($allSumm);?> </p>
		<p>ПДВ: 0.00 грн. </p>
		<br>
		<br>
		<p class="tr">Виписав(ла): ____________________</p>

		</body>
	</html>
<?php
$html = ob_get_contents();
ob_end_clean ();



$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$outputpdf = $dompdf->output();
if (!isset($_POST['email'])) {
	echo $outputpdf;
} else {
	$filename = 'schet-'.$id.'-.pdf';
	$rootd = $_SERVER['DOCUMENT_ROOT'];
	$filepdf = $rootd.'/uploads/pdf/'.$filename;
	file_put_contents($filepdf, $outputpdf);

	$file = $filepdf;
	$content = file_get_contents( $file);
	$content = chunk_split(base64_encode($content));
	$uid = md5(uniqid(time()));
	$name = basename($file);

	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

	// message & attachment
	$subject = 'Заявка с сайта nevatk.ru';
	$nmessage = "--".$uid."\r\n";
	$nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
	$nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
	$nmessage .= $nmessage."\r\n\r\n";
	$nmessage .= "--".$uid."\r\n";
	$nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
	$nmessage .= "Content-Transfer-Encoding: base64\r\n";
	$nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
	$nmessage .= $content."\r\n\r\n";
	$nmessage .= "--".$uid."--";

	mail($client['email'], $subject, $nmessage, $header);
}
?>