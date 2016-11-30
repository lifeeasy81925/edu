<?php
session_start(); 
$username = $xoopsUser->getVar('uname');
$email = $xoopsUser->getVar('email');
  global $xoopsDB;
  $sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
  $result = $xoopsDB -> query($sql) or die($sql);
  list($cityid , $city , $cityman , $cityno) = $xoopsDB->fetchRow($result);
?>