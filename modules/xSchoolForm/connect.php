<?php
session_start(); 
//$username = $_SESSION['username'];
$username = $xoopsUser->getVar('uname');
$email = $xoopsUser->getVar('email');
$user_from = $xoopsUser->getVar('user_from');
echo $username.'--'.$user_from.'--'.$email;	//Account & E-Mail
	global $xoopsDB;
	$sql = "select * from " . $xoopsDB->prefix('school') . " where `account` = '$username'";
	$result = $xoopsDB -> query($sql) or die($sql);
	list($account , $city , $school , $class) = $xoopsDB->fetchRow($result);
	
$sql_school = "select * from 102schooldata where `account` = '$username'";
$result = mysql_query($sql_school);
while($row = mysql_fetch_row($result)){
	$class = $row[1];
	$city = $row[2];
	$school = $row[2].$row[4].$row[5];//學校全名
}

echo " -- "; 
echo $school;
echo " -- ";
if($class == '1'){echo '國小組';} elseif ($class == '2'){echo '國中組';} else {echo '非學校單位';}
?>