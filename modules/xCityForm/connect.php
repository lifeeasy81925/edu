<?php
session_start(); 
//$username = $_SESSION['username'];
$username = $xoopsUser->getVar('uname');
echo $username;  
  global $xoopsDB;
  $sql = "select * from " . $xoopsDB->prefix('school') . " where `account` = '$username'";
  $result = $xoopsDB -> query($sql) or die($sql);
  list($account , $city , $school , $class) = $xoopsDB->fetchRow($result);
  echo $city;
  echo $school;
  echo "--";
	/*
	if($class == '1'){
			echo '國小組';
		}
		else{
			echo '國中組';
	}
	*/
?>