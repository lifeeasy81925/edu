<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "../../function/connect_city.php";
	include "../../function/connect_edu.php";
	include "/../function/config_for_106.php";  // 本年度基本設定

	session_start();
	$id = $xoopsUser->getVar('uname');

	$pass     = $_POST["pass"];
	$oldpass  = $_POST["oldpass"];
	$newpass1 = $_POST["newpass1"];
	$newpass2 = $_POST["newpass2"];

	$q = "";

	if($oldpass == "")
	{
		echo "<script> alert('請輸入舊密碼。'); </script>";
		toPage();
	}
	elseif($newpass1 == "")
	{
		echo "<script> alert('請輸入新密碼'); </script>";
		toPage();
	}
	elseif($newpass2 == "")
	{
		echo "<script> alert('再次輸入新密碼'); </script>";
		toPage();
	}
	elseif($pass != md5($oldpass))
	{
		echo "<script> alert('舊密碼有誤。'); </script>";
		toPage();
	}
	elseif($newpass1 != $newpass2)
	{
		echo "<script> alert('新密碼兩次輸入不一致。'); </script>";
		toPage();
	}
	elseif($pass == md5($oldpass) && $newpass1 == $newpass2)
	{
		$newpass1 = md5($newpass1);

		$sql =  " UPDATE edu_users                    ".
				"    SET edu_users.pass = '$newpass1' ".
				"  WHERE uname          = '$id'       ";

		$result = mysql_query($sql) or die('MySQL query error');

		echo "<script> alert('密碼修改成功，系統將為您登出，請以新密碼登入。'); </script>";
		echo "<meta http-equiv='refresh' content='0;url=/edu/user.php?op=logout' />";
	}
	else
	{
		toPage();
	}
?>

<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />

<?
	function toPage()
	{
		echo "<meta http-equiv='refresh' content='0;url=user_changepw.php' />";
	}
?>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>