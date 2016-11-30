<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_edu_ex2.php";
//$id = $_SESSION['id'];
$id = $_GET["id"];
$sid = $_POST["sid"];

$a190 = $_POST["pass"];	//複審狀態
$a191 = $_POST['a191'];	//複審意見

//$a192 = $_POST['a192'];	//本項目總額
//$a193 = $_POST['a193'];	//本項目經常門
//$a194 = $_POST['a194'];	//本項目資本門

$a195 = $_POST['a195'];	//複審租車費搭車人數
$a196 = $_POST['a196'];	//複審租車費搭車金額
$a197 = $_POST['a197'];	//複審交通費補助人數
$a198 = $_POST['a198'];	//複審交通費補助金額
$a199 = $_POST['a199'];	//複審交通車人座
$a200 = $_POST['a200'];	//複審交通車金額

$a193 = $a196 + $a198;		//經常門
$a194 = $a200;				//資本門
$a192 = $a193 + $a194;		//本項目總額

if($a190=='2'){
	$a192=0;
	$a193=0;
	$a194=0;
	$a195=0;
	$a196=0;
	$a197=0;
	$a198=0;
	$a199=0;
	$a200=0;
	$a201=0;
	$a202=0;
	$a203=0;
	$a204=0;
	$a205=0;
	$a206=0;
	$a207=0;
	$a208=0;
	$a209=0;
}

//$allowance=$_POST["allowance"];


$sql = "update 
102allowance6 set 
a190='$a190', 
a191='$a191', 
a192='$a192', 
a193='$a193', 
a194='$a194', 
a195='$a195', 
a196='$a196', 
a197='$a197', 
a198='$a198', 
a199='$a199', 
a200='$a200',
a252='$email',
a253='$username' 
where account='$id'";
if(mysql_query($sql)){
	echo '新增成功!';
	//echo '<meta http-equiv=REFRESH CONTENT=2;url=a1_examine_table.php>';
	//改由最後面的JavaScript關閉此視窗
}else{
	echo '新增失敗';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=../../user.php?op=logout>';
}
?>
<?
//include "../../footer.php";
?>
<script language="JavaScript">
setTimeout( "window.close();", 1000 );
</script>