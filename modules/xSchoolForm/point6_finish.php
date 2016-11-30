<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

$tnumber1 = $_POST['tnumber1'];
$tnumber2 = $_POST['tnumber2'];
$tnumber3 = $_POST['tnumber3'];
$ltnumber1 = $_POST['ltnumber1'];
$ltnumber2 = $_POST['ltnumber2'];
$ltnumber3 = $_POST['ltnumber3'];
$ltnumber4 = $_POST['ltnumber4'];
$ltnumber5 = $_POST['ltnumber5'];
$ltnumber6 = $_POST['ltnumber6'];
$ltnumber7 = $_POST['ltnumber7'];
$ltnumber8 = $_POST['ltnumber8'];
$ltnumber9 = $_POST['ltnumber9'];

if($class == '1' ){
			$point="100element_point";
	}
	else{
			$point="100junior_point";
		}
//流動率
$per = ($ltnumber1+$ltnumber2+$ltnumber3+$ltnumber4+$ltnumber5+$ltnumber6)/($tnumber1+$tnumber2+$tnumber3);
//代理率
$per2 =($ltnumber4+$ltnumber5+$ltnumber6+$ltnumber7+$ltnumber8+$ltnumber9)/($tnumber1+$tnumber2+$tnumber3);
//流動率寫入
if($per >= 0.3){
	echo '<br>符合指標六-1 教師流動率'.'<br>';
	$sql = "update ".$point. " set point6 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$sql = "update ".$point. " set point6 = '0' where account = '$username' ";
	mysql_query($sql);
}
//代理率寫入
if($per2 >= 0.3){
	echo '<br>符合指標六-2 教師代理率'.'<br>';
	$sql = "update ".$point. " set point6_2 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$sql = "update ".$point. " set point6_2 = '0' where account = '$username' ";
	mysql_query($sql);
}
//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
/*if($tnumber1!= null && $tnumber2 != null && $tnumber3 != null && $ltnumber1 != null && $ltnumber2 != null &&$ltnumber3 != null)
{*/

	if($class == '1' ){
			$sql = "update 100element_point6 set tnumber1='$tnumber1',tnumber2='$tnumber2',tnumber3='$tnumber3',ltnumber1='$ltnumber1',ltnumber2='$ltnumber2',ltnumber3='$ltnumber3',ltnumber4='$ltnumber4',ltnumber5='$ltnumber5',ltnumber6='$ltnumber6',ltnumber7='$ltnumber7',ltnumber8='$ltnumber8',ltnumber9='$ltnumber9' where account='$username'";
	}
	else{
			$sql = "update 100junior_point6 set tnumber1='$tnumber1',tnumber2='$tnumber2',tnumber3='$tnumber3',ltnumber1='$ltnumber1',ltnumber2='$ltnumber2',ltnumber3='$ltnumber3',ltnumber4='$ltnumber4',ltnumber5='$ltnumber5',ltnumber6='$ltnumber6',ltnumber7='$ltnumber7',ltnumber8='$ltnumber8',ltnumber9='$ltnumber9' where account='$username'";
	}


        //新增資料進資料庫語法  
/*$sql = "update 100element_point6 set tnumber1='$tnumber1',tnumber2='$tnumber2',tnumber3='$tnumber3',ltnumber1='$ltnumber1',ltnumber2='$ltnumber2',ltnumber3='$ltnumber3' where account='$username'";
*/        if(mysql_query($sql))
        {
                echo '<br>新增成功!';
                echo '<meta http-equiv=REFRESH CONTENT=0;url=point_result.php>';
        }
        else
        {
                echo '<br>新增失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=point6.php>';
        }
/*}
else
{
        echo '所有的欄位都需要填寫!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=point6.php>';
}*/
?>
<?php
include "../../footer.php";
?>