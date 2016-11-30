<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
$username = $xoopsUser->getVar('uname');
global $xoopsDB;
$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
$result_city = $xoopsDB -> query($sql) or die($sql);
while($row = mysql_fetch_row($result_city)) {
	$cityman = $row[2];
	$examine = $row[3];
	$cityno = $row[4];
}
$id = $_GET["id"];
$money = $_POST['money'];
$money1 = $_POST['money1'];
$money2 = $_POST['money2'];
$other = $_POST['other'];
$sid = $_POST["sid"];
$allowance6=$_POST["allowance6"];
$allowance6_pass=$_POST["allowance6_pass"];

//叫出學校資料庫,區分國小或國中資料表
$sql_school = "select  *  from edu_school where account like '$id'";
$result_school = mysql_query($sql_school);
while($row = mysql_fetch_row($result_school)){
	$city = $row[1];//縣市名稱
	$school = $row[2];//學校名稱
	$class = $row[3];//縣市別
}

//寫入審核經費資料
if($class == '1' ){
	$sql = "update 100element_examine_education set a6 ='$money', a6_1 ='$money1', a6_2 ='$money2', a6_p = '$allowance6_pass' where account='$id'";
	mysql_query($sql);
}else{
	$sql = "update 100junior_examine_education set a6 ='$money', a6_1 ='$money1', a6_2 ='$money2', a6_p = '$allowance6_pass' where account='$id'";
	mysql_query($sql);
}
//寫入審核結果資料
if($class == '1' ){
	$sql = "update 100element_examine_a6 set education_1 ='$money', education_1_1 ='$money1', education_1_2 ='$money2', other_education='$other' ,edu_pass='$allowance6_pass' where account='$id'";
}else{
	$sql = "update 100junior_examine_a6 set education_1 ='$money', education_1_1 ='$money1', education_1_2 ='$money2', other_education='$other' ,edu_pass='$allowance6_pass' where account='$id'";
}
if(mysql_query($sql)){
	echo $school;
	echo '審核成功!';
	echo "<meta http-equiv=REFRESH CONTENT=2;url="."a6_examine_table.php?id=$city".">";
}else{
	echo '新增失敗';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=../../user.php?op=logout>';
}
?>
<?php
include "../../footer.php";
?>