<?php
session_start(); 
$username = $xoopsUser->getVar('uname');
$email = $xoopsUser->getVar('email');
global $xoopsDB;
$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username';";
$result_edu = $xoopsDB -> query($sql) or die($sql);

?>