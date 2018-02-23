<?php
header("Content-type:application/pdf");
require_once $_SERVER['DOCUMENT_ROOT'].'/dompdf/dompdf_config.inc.php';

$db = new Database($db_host, $db_login, $db_passwd, $db_name);
$db->connect();

$sql = "SELECT s_firma.*, reestr.id as idd, reestr.date, fio FROM `s_firma`, `users`, `reestr` WHERE reestr.id = ".$id." AND reestr.firma_id = s_firma.id AND s_firma.dr_user_id = users.id_user";
$firma = $db->query_first($sql);

$sql = "SELECT reestr.*, s_client.name as client, s_firma.name as firma, s_city.name as city, s_bank.name as bank, s_meta.name as meta, s_manager.name as manager ".
       "FROM reestr ".
       "LEFT JOIN s_client  ON reestr.client_id  = s_client.id ".
       "LEFT JOIN s_firma   ON reestr.firma_id   = s_firma.id ".
       "LEFT JOIN s_city    ON reestr.city_id    = s_city.id ".
       "LEFT JOIN s_bank    ON reestr.bank_id    = s_bank.id ".
       "LEFT JOIN s_meta    ON reestr.meta_id    = s_meta.id ".
       "LEFT JOIN s_manager ON reestr.manager_id = s_manager.id ".
       "WHERE reestr.id = ".$id." ";
$reestr = $db->query_first($sql);

$sql = "SELECT s_client.* FROM `s_client`, `reestr` WHERE reestr.id = ".$id." AND reestr.client_id = s_client.id";
$client = $db->query_first($sql);

$sql = "SELECT * FROM `maino` WHERE `reestr_id` = ".$id;
$rows = $db->fetch_all_array($sql);


	$html = '';
	ob_start();
	?>
    <html>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <style>
        p {
            padding: 0;
            margin: 0;
        }

        .tc {
            text-align: center;
        }

        .tr {
            text-align: right;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        th, td {
            border: #000 solid 1px;
            padding: 2px 5px;
        }

        th {
            background: #eee;
        }

        td.nobr {
            border: none
        }

        .bb {
            border-bottom: #000 solid 1px
        }

        .ml70 {
            padding-left: 70%;
        }
    </style>
    <body>
    <p class="ml70">Директору <?= $firma['name']; ?></p>
    <p class="ml70"><?= $firma['fio']; ?></p>
    <p class="ml70">від <?= $client['name']; ?></p>
    <p class="ml70">тел. <?= $client['phone']; ?><p>
        <br>
        <br>
    <h1 class="tc">ЗАЯВА</h1>
    <br>
    <p>Прошу Вас надати наступні послуги:</p>
    <br>
	<?php
	$count   = 0;
	$allSumm = 0;
	foreach ( $rows as $row ) {
		$count ++;
		$allSumm = $row['price'] * $row['count'];
		?>
        <p><?= $count ?>) Оцінка майна <?= $row['opis'] ?></p>
		<?php
	}
	?>
    <br>
    <p>Мета оцінки: <?= $reestr['meta']; ?>. <?= $reestr['bank']; ?> </p>
    <p>Оплату гарантую </p>
    <br>
    <br>
    <br>
    <br>
    <p>Перелік наданих документів:</p>
    <br>
    <div class="bb"></div>
    <br>
    <div class="bb"></div>
    <br>
    <div class="bb"></div>
    <br>
    <div class="bb"></div>
    <br>
    <br>
    <p class="tr">Виписав(ла): ____________________</p>

    </body>
    </html>
	<?php
	$html = ob_get_contents();
	ob_end_clean();

	$dompdf = new DOMPDF();
	$dompdf->load_html( $html );
	$dompdf->render();
	$outputpdf = $dompdf->output();

    if (!isset($_POST['email'])) {
        echo $outputpdf;
    } else {
        $filename = 'zajava-'.$id.'-.pdf';
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