<?php
include "../../mainfile.php";
include "../../header.php";
session_start();
$username = $xoopsUser->getVar('uname');
  global $xoopsDB;
  $sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
  $result = $xoopsDB -> query($sql) or die($sql);
  list($cityid , $city ) = $xoopsDB->fetchRow($result);
	$id=$_POST["id"];
	$semail= $_POST["email"];
	$enddate = $_POST["enddate"];
	$content = $_POST["content"];
	$ap = $_POST["ap"];
	//$semail= "kuanscheng@gmail.com";
//更新截止日期,寫入送信者代號
	$sql_date = "update school_checkdate set  end_date = '$enddate' ,send_city = '$username' where account='$id'";
	mysql_query($sql_date);
//信件主旨
	$subject = "教育部教育優先區網站通知信件";
//通知信件的內容
	$email_content = $content.'再次提醒:更新資料截止日期為:'.$enddate."請速至該網站更新資料,謝謝您!!";
//寄件者資訊
	$headers = "\Content-Type:text/html; charset=utf-8\r\n";
	$headers .= "From:教育優先區網站--".$city."政府教育局\r\n";
 mail($semail, $subject, $email_content, $headers);
 //mail($email, "教育優先區網站通知信", $email_content, "From:教育優先區網站<kuan3188@tp.edu.tw>\nContent-Type:text/html");
 echo "寄信給".$semail.",寄信成功!!<br>";
 echo "信件內容如下:<br>";
 echo $content."<br>";
 echo "修正截止日期為：".$enddate;
 echo "<br><br>";
 if($ap == 'p'){
	echo "<a href="."print_102point_reexamined.php".">回退件審查頁</a>";}
else{
	echo "<a href="."print_102money_reexamined.php".">回退件審查頁</a>";}

include "../../footer.php";
?>