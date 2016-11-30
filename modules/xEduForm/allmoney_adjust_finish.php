<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
$username = $xoopsUser->getVar('uname');
  global $xoopsDB;
if($username == 'edu0001' || $username == 'edu0025'|| $username == 'edu0099'){			
	}
else{
	echo "<script Language="."Javascript"." FOR="."window"." EVENT="."onLoad"."> window.alert("."您沒有設定權限!".")</script>";
	echo "<meta http-equiv=REFRESH CONTENT=0;url=education_index.php>";
}
// 補助金額			
	$sql = "select  *  from 100education_money ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_row($result))
        {
                 $a1_1=$row[2];
				 $a1_2=$row[3];
				 $a2_1=$row[4];
				 $a2_2=$row[5];
				 $a2_3=$row[6];
				 $a3_1=$row[18];
				 $a3_2=$row[19];
				 $a4_1=$row[8];
				 $a4_2=$row[9];
				 $a5=$row[10];
				 $a6_1=$row[20];
				 $a6_2=$row[21];
				 $a7_1=$row[12];
				 $a7_2=$row[13];
				 $a7_3=$row[14];
				 $a8_1=$row[15];
				 $a8_2=$row[16];
 				 $a8_3=$row[17];
				 $total = $row[18];
				 $rate = $row[22];
		}
	//計算總合
				$p1_1=$p1_1+$a1_1;
				$p1_2=$p1_2+$a1_2;
				$p2_1=$p2_1+$a2_1;
				$p2_2=$p2_2+$a2_1;
				$p2_3=$p2_3+$a2_1;
				$p3_1=$p3_1+$a3_1;
				$p3_2=$p3_2+$a3_2;
				$p4_1=$p4_1+$a4_1;
				$p4_2=$p4_2+$a4_2;
				$p5=$p5+$a5;
				$p6_1=$p6_1+$a6_1;
				$p6_2=$p6_2+$a6_2;
				$p7_1=$p7_1+$a7_1;
				$p7_2=$p7_2+$a7_2;
				$p7_3=$p7_3+$a7_3;
				$p8_1=$p8_1+$a8_1;
				$p8_2=$p8_2+$a8_2;
 				$p8_3=$p8_3+$a8_3;
$a1="2000000";
$a2="3000000";
$a3="4000000";
$a4="5000000";
$a5="6000000";
$a6="7000000";
$a7="8000000";
$a8="9000000";
$a9="9000000";

include "../../footer.php";
?>