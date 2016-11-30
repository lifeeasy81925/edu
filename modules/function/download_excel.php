<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "connect.php";
	
	$filename= $username."_".date("Ymd").".xls";
	$content = $_POST['Excel_innerHtml'];
	
	header("Content-disposition: filename=$filename");
	header('Content-type: application/vnd.ms-excel;charset=UTF-8');
	header("Pragma: no-cache");
	header("Expires: 0");

	echo $content;
	
?>
