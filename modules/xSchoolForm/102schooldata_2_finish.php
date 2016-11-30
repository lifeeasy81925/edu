<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

$tnumber1 = $_POST['tnumber1']; //101編制
$tnumber2 = $_POST['tnumber2']; //100編制
$tnumber3 = $_POST['tnumber3']; //99編制
$ltnumber1 = $_POST['ltnumber1']; //101調入
$ltnumber2 = $_POST['ltnumber2']; //100調入
$ltnumber3 = $_POST['ltnumber3']; //99調入
$ltnumber4 = $_POST['ltnumber4']; //101實缺
$ltnumber5 = $_POST['ltnumber5']; //100實缺
$ltnumber6 = $_POST['ltnumber6']; //99實缺
$ltnumber7 = $_POST['ltnumber7']; //101其他
$ltnumber8 = $_POST['ltnumber8']; //100其他
$ltnumber9 = $_POST['ltnumber9']; //99其他

//$a147 = $_POST['a147'];
$a148 = $_POST['a148'];
//$a149 = $_POST['a149'];
//$a189 = $_POST['a189'];
$a190 = $_POST['a190'];
//$a191 = $_POST['a191'];

//流動率
$per = ($ltnumber1+$ltnumber2+$ltnumber3+$ltnumber4+$ltnumber5+$ltnumber6)/($tnumber1+$tnumber2+$tnumber3);
//代理率
$per2 =($ltnumber4+$ltnumber5+$ltnumber6+$ltnumber7+$ltnumber8+$ltnumber9)/($tnumber1+$tnumber2+$tnumber3);

$sql = "update 102schooldata set a145='$per', a146='$per2', a135='$tnumber1', a134='$tnumber2', a133='$tnumber3', a138='$ltnumber1', a137='$ltnumber2', a136='$ltnumber3', a141='$ltnumber4', a140='$ltnumber5', a139='$ltnumber6', a144='$ltnumber7', a143='$ltnumber8', a142='$ltnumber9', a148='$a148', a190='$a190' where account='$username'";

if(mysql_query($sql)){
	echo '<br>新增成功!';
	echo '<meta http-equiv=REFRESH CONTENT=0;url=102schooldata_3.php>';
}else{
	echo '<br>新增失敗!';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=../../user.php?op=login>';
}

?>
<?php
include "../../footer.php";
?>