<?php
session_start(); 
$username = $xoopsUser->getVar('uname');
$email = $xoopsUser->getVar('email');
global $xoopsDB;
$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username';";
$result_edu = $xoopsDB -> query($sql) or die($sql);
while($row = mysql_fetch_row($result_edu)) {
	$edu = $row[1];
	$eduman = $row[2];
	$examine = $row[3];
	$eduno = $row[4];
}
/*
session_start(); 
$username = $xoopsUser->getVar('uname');
  global $xoopsDB;
  $sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
  $result_city = $xoopsDB -> query($sql) or die($sql);
  while($row = mysql_fetch_row($result_city)) {
            $city = $row[1];
			$cityman = $row[2];
			$examine = $row[3];
			$cityno = $row[4];
			}
*/
?>