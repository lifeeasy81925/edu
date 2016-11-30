<?php
session_start(); 
$username = $xoopsUser->getVar('uname');
  global $xoopsDB;
  $sql = "select * from " . $xoopsDB->prefix('school') . " where `account` = '$username'";
  $result = $xoopsDB -> query($sql) or die($sql);
  list($account , $city , $school , $class) = $xoopsDB->fetchRow($result);
?>