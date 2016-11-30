<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
$username = $xoopsUser->getVar('uname');
  global $xoopsDB;
  $sql_city = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
  $result_city = $xoopsDB -> query($sql_city) or die($sql_city);
  while($row = mysql_fetch_row($result_city)) {
			}
//取回資料值
$id = $_POST["sid"];
$point1=$_POST["point1"];
$point2=$_POST["point2"];
$point3=$_POST["point3"];
$point4=$_POST["point4"];
$point5=$_POST["point5"];
$point6=$_POST["point6"];
$point1_pass=$_POST["point1_pass"];
$point2_pass=$_POST["point2_pass"];
$point3_pass=$_POST["point3_pass"];
$point4_pass=$_POST["point4_pass"];
$point5_pass=$_POST["point5_pass"];
$point6_pass=$_POST["point6_pass"];
$other = $_POST['other'];

//叫出學校資料庫,區分國小或國中資料表
$sql_school = "select  *  from edu_school where account like '$id'";
$result_school = mysql_query($sql_school);
while($row = mysql_fetch_row($result_school))
        {
                 $school = $row[2];//學校名稱
				 $class = $row[3];//縣市別
        }
		
if($class == '1' ){
	if($point1 == 'point1' ){
			$sql = "update 100element_point set point1_p ='$point1_pass' ,suggestion1='$other' where account='$id'";
	}
	elseif($point2 == 'point2' ){
			$sql = "update 100element_point set point2_p ='$point2_pass' ,suggestion1='$other' where account='$id'";
	}
	elseif($point3 == 'point3' ){
			$sql = "update 100element_point set point3_p ='$point3_pass' ,suggestion1='$other' where account='$id'";
	}
	elseif($point4 == 'point4' ){
			$sql = "update 100element_point set point4_p ='$point4_pass' ,suggestion1='$other' where account='$id'";
	}
	elseif($point5 == 'point5' ){
			$sql = "update 100element_point set point5_p ='$point5_pass' ,suggestion1='$other' where account='$id'";
	}
	else{
			$sql = "update 100element_point set point6_p ='$point6_pass' ,suggestion1='$other' where account='$id'";
	}
	}
if($class == '2' ){
		if($point1 == 'point1' ){
			$sql = "update 100junior_point set point1_p ='$point1_pass' , suggestion2='$other' where account='$id'";
	}
	elseif($point2 == 'point2' ){
			$sql = "update 100junior_point set point2_p ='$point2_pass' , suggestion2='$other' where account='$id'";
	}
	elseif($point3 == 'point3' ){
			$sql = "update 100junior_point set point3_p ='$point3_pass' , suggestion2='$other' where account='$id'";
	}
	elseif($point4 == 'point4' ){
			$sql = "update 100junior_point set point4_p ='$point4_pass' , suggestion2='$other' where account='$id'";
	}
	elseif($point5 == 'point5' ){
			$sql = "update 100junior_point set point5_p ='$point5_pass' , suggestion2='$other' where account='$id'";
	}
	else{
			$sql = "update 100junior_point set point6_p ='$point6_pass' , suggestion2='$other' where account='$id'";
	}
	}

    if(mysql_query($sql))
        {
			if($point1 == 'point1'){
			 echo '審核成功!';
                echo '<meta http-equiv=REFRESH CONTENT=0;url=print_point1_table.php?id=1>';
			}
			elseif($point2 == 'point2'){
			 echo '審核成功!';
                echo '<meta http-equiv=REFRESH CONTENT=0;url=print_point2_table.php?id=1>';
			}
			elseif($point3 == 'point3'){
			 echo '審核成功!';
                echo '<meta http-equiv=REFRESH CONTENT=0;url=print_point3_table.php?id=1>';
			}
			elseif($point4 == 'point4'){
			 echo '審核成功!';
                echo '<meta http-equiv=REFRESH CONTENT=0;url=print_point4_table.php?id=1>';
			}
			elseif($point5 == 'point5'){
			 echo '審核成功!';
                echo '<meta http-equiv=REFRESH CONTENT=0;url=print_point5_table.php?id=1>';
			}
			elseif($point6 == 'point6'){
			 echo '審核成功!';
                echo '<meta http-equiv=REFRESH CONTENT=0;url=print_point6_table.php?id=1>';
			}
        else{
                echo '審核失敗';
                echo '<meta http-equiv=REFRESH CONTENT=0;url=point_examine.php>';
			}
		}

include "../../footer.php";
?>