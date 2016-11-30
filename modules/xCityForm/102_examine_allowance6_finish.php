<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_city_ex2.php";
//$id = $_SESSION['id'];
$id = $_GET["id"];
$sid = $_POST["sid"];

$a130 = $_POST["pass"];	//縣市審核狀態
$a131 = $_POST['a131'];	//縣市審核意見

//$a132 = $_POST['a132'];	//本項目總額
//$a133 = $_POST['a133'];	//本項目經常門
//$a134 = $_POST['a134'];	//本項目資本門

$a135 = $_POST['a135'];	//縣市租車費搭車人數
$a136 = $_POST['a136'];	//縣市租車費搭車金額
$a137 = $_POST['a137'];	//縣市交通費補助人數
$a138 = $_POST['a138'];	//縣市交通費補助金額
$a139 = $_POST['a139'];	//縣市交通車人座
$a140 = $_POST['a140'];	//縣市交通車金額

$a133 = $a136 + $a138;		//經常門
$a134 = $a140;				//資本門
$a132 = $a133 + $a134;		//本項目總額
if($a130=='2'){
	$a132=0;
	$a133=0;
	$a134=0;
	$a135=0;
	$a136=0;
	$a137=0;
	$a138=0;
	$a139=0;
	$a140=0;
	$a141=0;
	$a142=0;
	$a143=0;
	$a144=0;
	$a145=0;
	$a146=0;
	$a147=0;
	$a148=0;
	$a149=0;
}

//$allowance=$_POST["allowance"];


$sql = "update 
102allowance6 set 
a130='$a130', 
a131='$a131', 
a132='$a132', 
a133='$a133', 
a134='$a134', 
a135='$a135', 
a136='$a136', 
a137='$a137', 
a138='$a138', 
a139='$a139', 
a140='$a140',
a250='$email',
a251='$username'  
where account='$id'";
mysql_query($sql);
//↑a190 ='$email' 刪除，補助項目的a190是複審狀態專用(email資料先移到a250)

//寫入是否審核通過
	$sql = "update 102schooldata set a197 = '$a130' where account='$id'";
	mysql_query($sql);
	
//寫入審查委員代號
  $sql = "update school_checkdate set  money_ex6 = '$username' where account='$id'";

//更新資料庫
if(mysql_query($sql)){
	echo '新增成功!';
	//echo '<meta http-equiv=REFRESH CONTENT=2;url=a1_examine_table.php>';
	//改由最後面的JavaScript關閉此視窗
}else{
	echo '新增失敗';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=../../user.php?op=logout>';
}

include "../../footer.php";
?>
<script language="JavaScript">
setTimeout( "window.close();", 1000 );
</script>