<?php
error_reporting(0);

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/vendor/autoload.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/conf.php';
require($_SERVER['DOCUMENT_ROOT']."/api/mysql.php");
require($_SERVER['DOCUMENT_ROOT']."/print/summ.php");


$phpWord = new \PhpOffice\PhpWord\PhpWord();
$section = $phpWord->addSection();
$sectionStyle = $section->getSettings();
$sectionStyle->setMarginLeft(600);
$sectionStyle->setMarginRight(600);

$idocenca = 0;
if (isset($_GET['id'])) {
	$idocenca = $_GET['id'];
	$db = new Database($db_host, $db_login, $db_passwd, $db_name);
	$db->connect();

	$maino   = $db->query_first("SELECT * FROM `maino`    WHERE id=".$idocenca);
	$ocenca  = $db->fetch_all_array("SELECT * FROM `ocenca_auto` WHERE maino_id=".$maino['id']);
	$maino_literal  = $db->fetch_all_array("SELECT * FROM `maino_literal` WHERE maino_id=".$maino['id']);
	$maino_img  = $db->fetch_all_array("SELECT * FROM `maino_file` WHERE maino_id=".$maino['id']." AND chosen = 1");
	$reestr  = $db->query_first("SELECT * FROM `reestr`   WHERE id=".$maino['reestr_id']);
	$s_maino = $db->query_first("SELECT * FROM `s_maino`  WHERE id=".$maino['vid_id']);
	$s_usd   = $db->query_first("SELECT * FROM `s_valute` WHERE `currency` = 'USD' AND `date`='".$reestr['datework']."'");
	$s_eur   = $db->query_first("SELECT * FROM `s_valute` WHERE `currency` = 'EUR' AND `date`='".$reestr['datework']."'");
	$s_meta  = $db->query_first("SELECT * FROM `s_meta`   WHERE id=".$reestr['meta_id']);
	$s_bank  = $db->query_first("SELECT * FROM `s_bank`   WHERE id=".$reestr['bank_id']);
	$s_bank  = $db->query_first("SELECT * FROM `s_bank`   WHERE id=".$reestr['bank_id']);
	$writer  = $db->query_first("SELECT * FROM `writer`   WHERE id=".$maino['podpisant']);
	$client  = $db->query_first("SELECT * FROM `s_client` WHERE id=".$reestr['client_id']);
	$adr1    = $db->query_first("SELECT * FROM `s_adress` WHERE id=".$client['adres1']);
	$adr2    = $db->query_first("SELECT * FROM `s_adress` WHERE id=".$client['adres2']);
	$firma   = $db->query_first("SELECT * FROM `s_firma`  WHERE id=".$reestr['firma_id']);

	$adres_yur = $adr2['t_pynkt'].' '.$adr2['pynkt'].' '.$adr2['t_street'].' '.$adr2['street'].' '.$adr2['dom'];

	$allSumm    = 0;
	$tablemaino = '';
	$nom        = 0;
	$list_info_maino = '';
	$teh_har = '';
	$analog_table = '';
	$dz_info = '';
	$rez_sum_tab = '';

	$img_list_analog = '<table><tr>';



	foreach ( $ocenca as $value ) {
		$rezSumm = floatval($value['sale_price'])*(1+(floatval($value['gk'])/100)+(floatval($value['dz'])/100));
		$field = array(
			'rez_summ' => $rezSumm
		);
		$db->query_update('ocenca_auto', $field, 'id='.$value['id']);
	}

	$ocenca  = $db->fetch_all_array("SELECT * FROM `ocenca_auto` WHERE maino_id=".$maino['id']);

	$liter_spis = '';
	foreach ($maino_literal as $liter) {
		$liter_spis .= '<p>'.$liter['name'].'</p>';
	}

	$rez_sum_tab = '<table style="width: 100%; border: 1px #000 double; text-align: center; vertical-align: middle">
						    <thead>
						        <tr style="text-align: center; font-weight: bold; vertical-align: middle">
						            <th>№</th>
						            <th>Найменування модель</th>
						            <th>VIN/№ шасі (кузова) № заводський</th>
						            <th>Середня вартість об’єкта оцінки без ПДВ, грн.</th>
						            <th>Коефіцієнт ринку регіону  для даної моделі</th>
						            <th>Ринкова вартість об’єкта оцінки без ПДВ.грн.</th>
						        </tr>
						    </thead>';

	foreach ( $ocenca as $value ) {
		$nom ++;
		$allSumm    = $allSumm + $value['rez_summ'];
		$tablemaino .= '<tr>
	        <td>' . $nom . '</td>
	        <td>' . $value['name'] . ' ' . $value['marka'] . $value['model'] . '</td>
	        <td>' . $value['vin'] . '</td>
	        <td>' . $value['year'] . '</td>
	        <td>' . $value['rez_summ'] . '</td>
	    </tr>';


		$rez_sum_tab .= '<tr style="text-align: center; font-weight: bold; vertical-align: middle">
				            <td>' . $nom . '</td>
				            <td>' . $value['name'] . ' ' . $value['marka'] . $value['model'] . '</td>
				            <td>' . $value['vin'] . '</td>
				            <td>' . $value['rez_summ'] . '</td>
				            <td>' . $value['koefic'] . '</td>
				            <td>' . round(floatval($value['rez_summ'])*floatval($value['koefic']),0) . '</td>
				        </tr>';


		$list_info_maino .= '<p style="font-size: 16px; font-weight: bold;">'.$value['name'].'</p>';
		$list_info_maino .= '<table style="width: 100%; border: 1px #000 double; text-align: center; vertical-align: middle">
							    <thead>
							        <tr style="text-align: center; font-weight: bold; vertical-align: middle">
							            <th>№ зп</th>
							            <th>Складові ідентифікації </th>
							            <th>Характеристика</th>
							        </tr>
							    </thead>';
		$list_info_maino .= '<tbody>';
		$list_info_maino .= '<tr style="vertical-align: middle">
								<td>1</td>
								<td>Тип КТЗ</td>
								<td>'.$value['kts'].'</td>
							</tr>';
		$list_info_maino .= '<tr style="vertical-align: middle">
								<td>2</td>
								<td>Марка, модель, модифікація КТЗ</td>
								<td>'. $value['marka'] . $value['model'] .'</td>
							</tr>';
		$list_info_maino .= '<tr style="vertical-align: middle">
								<td>3</td>
								<td>Реєстраційний номер</td>
								<td>'.$value['reg_nom_tran_val'].'</td>
							</tr>';
		$list_info_maino .= '<tr style="vertical-align: middle">
								<td>4</td>
								<td>Рік випуску (згідно зі свідоцтвом  про реєстрацію)</td>
								<td>'.$value['year'].'</td>
							</tr>';
		$list_info_maino .= '<tr style="vertical-align: middle">
								<td>5</td>
								<td>Заводський номер</td>
								<td>'.$value['zavod_nomer'].'</td>
							</tr>';
		$list_info_maino .= '<tr style="vertical-align: middle">
								<td>6</td>
								<td>Свідоцтво про реєстрацію машини</td>
								<td>'.$value['svid_reg_tran_val'].'</td>
							</tr>';
		$list_info_maino .= '</tbody>';
		$list_info_maino .= '</table>';
		$list_info_maino .= '<p>&nbsp;</p>';


		$teh_har .= '<p style="font-size: 16px; font-weight: bold;">'.$value['name'].'</p>';
		$teh_har .= $value['teh_har'];
		$teh_har .= '<p>&nbsp;</p>';

		$ocencaAnalog  = $db->fetch_all_array("SELECT * FROM `ocenca_auto_analog` WHERE ocenca_auto_id=".$value['id']);
		if (!empty($ocencaAnalog)) {
			$analog_table .= '<p style="font-size: 16px; font-weight: bold;">' . $value['name'] . '</p>';
			$analog_table .= '<table style="width: 100%; border: 1px #000 double; text-align: center; vertical-align: middle">
							    <thead>
							        <tr style="text-align: center; font-weight: bold; vertical-align: middle">
							            <th>Джерело інформації</th>
							            <th>Марка, модель</th>
							            <th>Рік випуску</th>
							            <th>Вартість пропозиції</th>
							            <th>Вартість пропозиції, грн.</th>
							            <th>Вартість пропозиції, грн., без ПДВ</th>
							            <th>Коригу-вання на торг</th>
							            <th>Коригу-вання на рік випуску</th>
							            <th>Коригу-вання на тех. Стан</th>
							            <th>Коригу-вання на модель</th>
							            <th>Вартість продажу, грн.</th>
							        </tr>
							    </thead>';
			$countimg = 0;
			foreach ( $ocencaAnalog as $aanlog ) {
				$analog_table .= '  <tr>
						            <td>' . $aanlog['url'] . '</td>
						            <td>' . $aanlog['name'] . '</td>
						            <td>' . $aanlog['year'] . '</td>
						            <td>' . $aanlog['curency'] . ' ' . $aanlog['price'] . '</td>
						            <td>' . $aanlog['price_uah'] . '</td>
						            <td>' . $aanlog['price_bez'] . '</td>
						            <td>' . $aanlog['kor_torg'] . '</td>
						            <td>' . $aanlog['kor_year'] . '</td>
						            <td>' . $aanlog['kor_tech'] . '</td>
						            <td>' . $aanlog['kor_model'] . '</td>
						            <td>' . $aanlog['vartis'] . '</td>
						        </tr>';

				if ($aanlog['link_pic'] != '') {
					$countimg ++;
					$img_list_analog .= '<td><img style="width: 300px; height: 300px" src="' . "http" . ( ( $_SERVER["HTTPS"] == "on" ) ? "s" : "" ) . "://" . $_SERVER["HTTP_HOST"] . $aanlog['link_pic'] . '"  width="400" /></td>';
					if ( $countimg == 2 ) {
						$countimg        = 0;
						$img_list_analog .= '</tr><tr>';
					}
				}
			}
			if ($ocencaAnalog[0]['sale_price_chose'] == 'sale_price_1') {
				$namse = 'Середне ';
			}
			if ($ocencaAnalog[0]['sale_price_chose'] == 'sale_price_2') {
				$namse = 'Серединне';
			}
			if ($ocencaAnalog[0]['sale_price_chose'] == 'sale_price_3') {
				$namse = 'Медианне';
			}
			$analog_table .= '  <tr>
						            <td colspan="10">'.$namse.'</td>
						            <td>' . $value['sale_price'] . '</td>
						        </tr>';
			$analog_table .= '</table>';
			$analog_table .= '<p>&nbsp;</p>';
		}

		if ($value['dz_json'] != '') {
			$dz_info .= '<p style="font-size: 16px; font-weight: bold;">' . $value['name'] . '</p>';
			$dz_json = json_decode( $value['dz_json'], true );
			$dz_info .= '<table style="width: 100%; border: 1px #000 double; text-align: center; vertical-align: middle">
						    <thead>
						        <tr style="text-align: center; font-weight: bold; vertical-align: middle">
						            <th>№</th>
						            <th>Найменування факторів, які визначають умови експлуатації</th>
						            <th>Дз,% </th>
						        </tr>
						    </thead>';
			$count = 0;

			foreach ($dz_json as $dz) {
				$count++;
				$dz_info .= '   <tr style="text-align: center; font-weight: bold; vertical-align: middle">
						            <td>'.$count.'</td>
						            <td>'.$dz['label'].'</td>
						            <td>'.$dz['value'].'</td>
						        </tr>';
			}
			$dz_info .= '</table>';
		}
	}

	$rez_sum_tab .= '</table>';


	$img_list = '<table><tr>';
	$countimg = 0;
	foreach ($maino_img as $imgv) {
		$countimg++;
		$img_list .= '<td><img src="'."http".(($_SERVER["HTTPS"]=="on")?"s":"")."://".$_SERVER["HTTP_HOST"].$imgv['file_pach'].'" width="400" /></td>';
		if ($countimg == 2) {
			$countimg = 0;
			$img_list .= '</tr><tr>';
		}
	}
	$img_list .= '</tr></table>';
	$img_list_analog .= '</tr></table>';

	$img_list_analog = '';

	$countHtml = 19;

	for ($i=1;$i<=$countHtml;$i++) {

		$html = file_get_contents( $_SERVER['DOCUMENT_ROOT'] . "/template/docx/ocenca_avto_".$i.".html" );

		$html = str_replace( '{nom_zvit}', $maino['nomber'], $html );
		$html = str_replace( '{s_maino}', $s_maino['name'], $html );
		$html = str_replace( '{name_maino}', $maino['opis'], $html );
		$html = str_replace( '{count}', $maino['count'], $html );
		$html = str_replace( '{name_client}', $client['name'], $html );
		$html = str_replace( '{adres_yur}', $adres_yur, $html );
		$html = str_replace( '{firma_name}', $firma['full_name'], $html );
		$html = str_replace( '{svidot_nomer}', $firma['svidot_nomer'], $html );
		$html = str_replace( '{svidot_date}', datful( $firma['svidot_date'] ), $html );
		$html = str_replace( '{svidot_organ}', $firma['svidot_organ'], $html );
		$html = str_replace( '{nom_dog}', $reestr['nomber'], $html );
		$html = str_replace( '{meta}', $s_meta['name'], $html );
		$html = str_replace( '{bank}', $s_bank['name'], $html );
		$html = str_replace( '{vidygodi}', $s_vidygodi['name'], $html );
		$html = str_replace( '{datework}', datful( $reestr['datework'] ), $html );
		$html = str_replace( '{rinkovavartist}', $allSumm . ' ' . num2text_ua( $allSumm ), $html );
		$html = str_replace( '{tablemaino}', $tablemaino, $html );
		$html = str_replace( '{director}', $firma['dir_role'], $html );
		$html = str_replace( '{director_fio}', $firma['dir_fio'], $html );
		$html = str_replace( '{writer_fio}', $writer['fio'], $html );
		$html = str_replace( '{writer_certif}', $writer['dolg'], $html );
		$html = str_replace( '{USD}', $s_usd['rate'], $html );
		$html = str_replace( '{EUR}', $s_eur['rate'], $html );
		$html = str_replace( '{list_info_maino}', $list_info_maino, $html );
		$html = str_replace( '{teh_har}', $teh_har, $html );
		$html = str_replace( '{analog_table}', $analog_table, $html );
		$html = str_replace( '{dz_info}', $dz_info, $html );
		$html = str_replace( '{rez_sum_tab}', $rez_sum_tab, $html );
		$html = str_replace( '{liter_spis}', $liter_spis, $html );
		$html = str_replace( '{img_list}', $img_list, $html );
		$html = str_replace( '{img_list_analog}', $img_list_analog, $html );



		\PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false, false);
		$section->addPageBreak();
	}

	$html = '';
	$db->close();
} else {
	$html = '<h1>Error</h1>';
}

$footer = $section->createFooter();
$footer->addPreserveText('звіт про незалежну оцінку '.$s_maino['name'].' '.$maino['opis'].' що належить '.$client['name'], array('bold'=>true),array('align'=>'center'));
$footer->addPreserveText('{PAGE}', array(),array('align'=>'right'));



\PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false, false);

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment;filename="ocenca_avto_'.$maino['nomber'].'.docx"');
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('php://output');

?>