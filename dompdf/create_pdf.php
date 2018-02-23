<?
require_once( $_SERVER['HTTP_ORIGIN'].'/dompdf/dompdf_config.inc.php');
//
//if (isset($_POST['html'])) {
//	$html_post = $_POST['html'];
//}
//if (isset($_POST['file'])) {
//	$html_file = $_POST['file'];
//}

$html =
	'<html><meta http-equiv="content-type" content="text/html; charset=utf-8" /><body>'.
	'<p>Теперь решим проблему с шрифтами в domPDF!</p>'.
	'</body></html>';

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream('mypdf.pdf'); // Выводим результат (скачивание)

?>