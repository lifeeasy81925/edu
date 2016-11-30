<?php
	include "../../mainfile.php";
	include "../../header.php";
	session_start();
	$username = $xoopsUser->getVar('uname');
	global $xoopsDB;

	if($username == 'edu0001' || 'edu0099' )
	{
		echo '<meta http-equiv=REFRESH CONTENT=0;url=examine_setting_name.php>';
	}
	else
	{
		echo '<script Language='.'"'.'Javascript'.'"'.' FOR='.'"'.'window'.'"'.' EVENT='.'"'.'onLoad'.'"'.'>'.' window.alert('.'"'.'您沒有設定權限!'.'"'.')'.'</script>';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=education_index.php>';
	}
	include "../../footer.php";
?>

<?
/*
//  $sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
//  $result = $xoopsDB -> query($sql) or die($sql);
*/
?>