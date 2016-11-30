<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "../../function/connect_city.php";
	include "../../function/connect_edu.php";
	include "/../function/config_for_106.php";  // 本年度基本設定

	session_start();
	$id = $xoopsUser->getVar('uname');

	$name         = $_POST["name"];
	$org          = $_POST["org"];
	$worker       = $_POST["worker"];
	$position     = $_POST["position"];
	$email        = $_POST["email"];
	$tel          = $_POST["tel"];
	$fax          = $_POST["fax"];
	$mobile       = $_POST["mobile"];
	$remarks      = $_POST["remarks"];

	$sql =  " UPDATE edu_users                         ".
			"    SET edu_users.user_msnm = '$org'      ".
			"      , edu_users.user_from = '$worker'   ".
			"      , edu_users.user_occ  = '$position' ".
			"      , edu_users.email     = '$email'    ".
			"      , edu_users.user_icq  = '$tel'      ".
			"      , edu_users.user_aim  = '$fax'      ".
			"      , edu_users.user_yim  = '$mobile'   ".
			"      , edu_users.bio       = '$remarks'  ".
			"  WHERE uname               = '$id'       ";

	$result = mysql_query($sql) or die('MySQL query error');
?>

<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />

<script>alert("資料修改成功。");</script>

<meta http-equiv="refresh" content="0;url=user_basedata.php" />

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>