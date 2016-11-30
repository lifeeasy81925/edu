<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
$school_area_0= $_POST['school_area_0'];
$school_area_1= $_POST['school_area_1'];
$school_area_2= $_POST['school_area_2'];
$school_area_3= $_POST['school_area_3'];
$school_area_4= $_POST['school_area_4'];
$school_area_5= $_POST['school_area_5'];
$school_area_6= $_POST['school_area_6'];

if($class == '1' ){
			$point="100element_point";
	}
	else{
			$point="100junior_point";
}
$p5_1 = ($school_area_0 == 1);
$p5_2 = ($school_area_1==1 || $school_area_2==1|| $school_area_3==1|| $school_area_4==1);
$p5_3 = ($school_area_5==1);
if($p5_1 ){
	echo '<br><br>符合指標 五－１<br>';
	$sql = "update ".$point. " set point5_1 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$sql = "update ".$point. " set point5_1 = '0' where account = '$username' ";
	mysql_query($sql);
}
if($p5_2 ){
	echo '<br><br>符合指標 五－２<br>';
	$sql = "update ".$point. " set point5_2 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$sql = "update ".$point. " set point5_2 = '0' where account = '$username' ";
	mysql_query($sql);
}
if($p5_3 ){
	echo '<br><br>符合指標 五－３<br>';
	$sql = "update ".$point. " set point5_3 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$sql = "update ".$point. " set point5_3 = '0' where account = '$username' ";
	mysql_query($sql);
}

	if($class == '1' ){
			$sql = "update 100element_point345 set school_area_0 = '$school_area_0' , school_area_1 = '$school_area_1',  school_area_2='$school_area_2' ,  school_area_3='$school_area_3',  school_area_4='$school_area_4',  school_area_5='$school_area_5',  school_area_6='$school_area_6' where account = '$username'";
	}
	else{
			$sql = "update 100junior_point345 set school_area_0 = '$school_area_0' , school_area_1 = '$school_area_1',  school_area_2='$school_area_2' ,  school_area_3='$school_area_3',  school_area_4='$school_area_4',  school_area_5='$school_area_5',  school_area_6='$school_area_6' where account = '$username'";
	}



        //新增資料進資料庫語法
        if(mysql_query($sql))
        {
                echo '<br>新增成功!';
                echo '<meta http-equiv=REFRESH CONTENT=0;url=point6.php>';
        }
        else
        {
                echo '<br>新增失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
        }

?>
<?php
include "../../footer.php";
?>