<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

	//school_location
	$high = $_POST['high'];
	$bonus = $_POST['bonus'];
	$bonus_name = $_POST['bonus_name'];
	$bonus_money = $_POST['bonus_money'];
	$cityhall = $_POST['cityhall']; //縣市政府
	$localoffice_name = $_POST['localoffice_name']; //所在地公所
	$localoffice = $_POST['localoffice']; //
	$nearest_localoffice_name = $_POST['nearest_localoffice_name']; //最近公所
	$nearest_localoffice = $_POST['nearest_localoffice']; //
	$bus_stop = $_POST['rdo_bus_stop'];
	
	$sql = " update school_location set high='$high' ".
		   "                          , bonus='$bonus' ".
		   "                          , bonus_name='$bonus_name' ".
		   "                          , bonus_money='$bonus_money' ".
		   "                          , cityhall='$cityhall' ".
		   "                          , localoffice_name='$localoffice_name' ".
		   "                          , localoffice='$localoffice' ".
		   "                          , nearest_localoffice_name='$nearest_localoffice_name' ".
		   "                          , nearest_localoffice='$nearest_localoffice' ".
		   "                          , bus_stop='$bus_stop' ".
		   " where account='$username' ";
	mysql_query($sql);
		   
	$student = $_POST['student'];
	$class_total = $_POST['class_total'];
	$c1 = $_POST['c1'];
	$c2 = $_POST['c2'];
	$c3 = $_POST['c3'];
	$c4 = $_POST['c4'];
	$c5 = $_POST['c5'];
	$c6 = $_POST['c6'];
	$cs = $_POST['cs'];
	$lastyear_graduate = $_POST['lastyear_graduate'];
	
	$school_year = $_POST['school_year'];

	$page1_warning = $_POST['page1_warning'];
	$page1_desc = $_POST['page1_desc'];
	
	$sql = " update schooldata_year set student='$student' ".
		   "                          , class_total='$class_total' ".
		   "                          , class_grade1='$c1' ".
		   "                          , class_grade2='$c2' ".
		   "                          , class_grade3='$c3' ".
		   "                          , class_grade4='$c4' ".
		   "                          , class_grade5='$c5' ".
		   "                          , class_grade6='$c6' ".
		   "                          , class_special='$cs' ".
		   "                          , lastyear_graduate='$lastyear_graduate' ".
		   "                          , page1_warning='$page1_warning' ".
		   "                          , page1_desc='$page1_desc' ".
		   " where account='$username' and school_year = '$school_year' ";

	if(mysql_query($sql))
	{
		echo '新增成功!';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=schooldata_2_new.php>';
	}
	else
	{
		echo '新增失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=../../../user.php?op=logout>';
	}
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>