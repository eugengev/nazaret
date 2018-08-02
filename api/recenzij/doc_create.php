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

	$sql = "SELECT * FROM `recenzij` WHERE `id` = ".$idocenca;
	$rowa = $db->query_first($sql);
	$sql = "SELECT * FROM `maino` WHERE `id` = ".$rowa['maino_id'];
	$rowm = $db->query_first($sql);
	$nomber_maino = $rowm['nomber'];

	$html = file_get_contents( $_SERVER['DOCUMENT_ROOT'] . "/template/docx/recenzij/recenzij_1.html" );

	\PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false, false);

	$html = '<p style="font-size: 22px; text-align: center; font-weight: bold;">'.$rowa['nazva'].'</p>';
	$html .= '<br />';
	$html .= '<p style="font-size: 20px; text-align: center; font-weight: bold;">Розділ 1. Загальна інформація</p>';
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Назва Звіту:</strong>'.$rowa['nazva'].'</p><br />';
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$rowa['opis'].'</p>';
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Замовник оцінки:</strong>'.$rowa['zamov'].'</p>';
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Об\'єкт оцінки:</strong>'.$rowa['obekt'].'</p>';
	$data_list = json_decode($rowa['obekt_list']); $count = 0;
	foreach ($data_list as $value) {
		$count++;
		$html .= '<p style="font-size: 16px;">'.$count.') '.$value.'</p>';
	}
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Віконавець:</strong>'.$rowa['vikonav'].'</p>';
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Оцінювач:</strong>'.$rowa['ocenchiki'].'</p>';
	$data_list = json_decode($rowa['ocenchiki_list']); $count = 0;
	foreach ($data_list as $value) {
		$count++;
		$html .= '<p style="font-size: 16px;">'.$value.'</p>';
	}
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Підстава для виконання оцінки:</strong>'.$rowa['pidstava'].'</p>';
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Мета оцінки:</strong>'.$rowa['meta'].'</p>';
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Вид вартості:</strong>'.$rowa['vid'].'</p>';
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Дата оцінки:</strong>'.datf($rowa['data_ocenka']).'</p>';
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Використані методологічні підходи:</strong>'.$rowa['pidhodi'].'</p>';
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Вартість об\'єкта оцінки:</strong>'.$rowa['vartist'].'</p>';
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Підстава для рецензування:</strong>'.$rowa['pidstavaoc'].'</p>';
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Дата оформлення рецензій:</strong>'.datf($rowa['data_oforml']).'</p>';
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Висновок по розділу 1:</strong></p>';
	$html .= '<ul><li><em>'.$rowa['visnov1'].'</em></li></ul>';
	$html .= '<br />';
	$html .= '<p style="font-size: 20px; text-align: center; font-weight: bold;">Розділ 2. Інформація про рецензентів</p>';
	$html .= '<p style="font-size: 16px;">'.$rowa['rezenzetami'].'</p>';
	$data_list = json_decode($rowa['rezenzetami_list']); $count = 0;
	foreach ($data_list as $value) {
		$count++;
		$html .= '<p style="font-size: 16px;">'.$value.'</p>';
	}
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Висновок по розділу 2:</strong></p>';
	$html .= '<ul><li><em>Залучені до рецензування експерти-оцінювачі мали право на здійснення професійної оціночної діяльності за відповідним напрямом на дату виконання оцінки.</em></li></ul>';
	$html .= '<br />';
	$html .= '<p style="font-size: 20px; text-align: center; font-weight: bold;">Розділ 3. Характеристика об\'єкта оцінки та якості Звіту</p>';
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Загальні характеристики:</strong>'.$rowa['opisobekt'].'</p>';
	$ol = json_decode($rowa['opisobekt_list']);
	$olre = array();
	foreach ($ol->name as $key => $value) {
		$olrep = array(
			'name' => $ol->name[$key],
			'opis' => $ol->opis[$key],
		);
		$olre[] = $olrep;
	}
	$count = 0;
	foreach ($olre as $value) {
		$count++;
		$html .= '<p style="font-size: 16px;"><strong>'.$count.') '.$value['name'].'</strong></p>';
		$html .= '<p style="font-size: 16px;">'.$value['opis'].'</p>';

	}
	$html .= '<p style="font-size: 16px;">'.$rowa['opisobekt2'].'</p>';
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Вхідні документи:</strong>'.$rowa['docum'].'</p>';
	$data_list = json_decode($rowa['docum_list']); $count = 0;
	foreach ($data_list as $value) {
		$count++;
		$html .= '<p style="font-size: 16px;">'.$count.') '.$value.'</p>';
	}
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Візуалізація:</strong>'.$rowa['vizual'].'</p>';
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Характеристика зовнішніх факторів:</strong>'.$rowa['factori'].'</p>';
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Якість оформлення Звіту з оцінки:</strong>'.$rowa['jakist'].'</p>';
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Висновок по розділу 3:</strong></p>';
	$html .= '<ul><li><em>'.$rowa['visnov3'].'</em></li>';
	$data_list = json_decode($rowa['visnov3_list']); $count = 0;
	foreach ($data_list as $value) {
		$count++;
		$html .= '<li><em>'.$value.'</em></li>';
	}
	$html .= '</ul>';
	$html .= '<br />';
	$html .= '<p style="font-size: 20px; text-align: center; font-weight: bold;">Розділ 4. методологія оцінки</p>';
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Обгрунтування бази оцінки:</strong>'.$rowa['obgrunt'].'</p>';
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Використані оцінювачем спецціальні припущення та обмежувальні умови, методичні підходи, методи та оціночні процедурм:</strong>'.$rowa['vikoroce'].'</p>';
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Висновок по розділу 4:</strong></p>';
	$html .= '<ul><li><em>'.$rowa['visnov4'].'</em></li>';
	$data_list = json_decode($rowa['visnov4_list']); $count = 0;
	foreach ($data_list as $value) {
		$count++;
		$html .= '<li><em>'.$value.'</em></li>';
	}
	$html .= '</ul>';
	$html .= '<br />';
	$html .= '<p style="font-size: 20px; text-align: center; font-weight: bold;">Розділ 5. Зауваження</p>';
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$rowa['obgruntuv'].'</p>';
	$html .= '<p style="font-size: 20px; text-align: center; font-weight: bold;">Розділ 6. Загальний висновок про достовірність оцінки</p>';
	$html .= '<p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$rowa['visnov'].'</p>';

	\PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false, false);

	$html = '';
	$db->close();
} else {
	$html = '<h1>Error</h1>';
}

\PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false, false);

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment;filename="Рецензія_'.$nomber_maino.'.docx"');
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('php://output');

?>