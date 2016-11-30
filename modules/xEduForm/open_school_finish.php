<?php
include "../../mainfile.php";
include "../../header.php";
session_start();
$username = $xoopsUser->getVar('uname');
  global $xoopsDB;
  $sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
  $result = $xoopsDB -> query($sql) or die($sql);
  
	$id=$_POST["id"];
	$school=$_POST["school"];
	$enddate = $_POST["textfield"];
//更新截止日期
	$sql_date = "update school_checkdate set  end_date = '$enddate' where account='$id'";
	mysql_query($sql_date);
  echo "變更".$school."更新資料截止日期為：".$enddate.",異動成功!!";
 ?>
  <br><br><a href="education_index.php">回教育部首頁</a>
 <?
include "../../footer.php";
?>