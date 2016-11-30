<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	
	//補一table name
	$table_name = "alc_parenting_education";
	$table_name_effect = $table_name."_effect";
	
	$school_year = $_POST['school_year'];
	$main_seq = $_POST['main_seq'];
	
	//讀取網頁資料
	$execute_money = $_POST['execute_money'];
	$p1_times = $_POST['p1_times'];
	$p1_parents = $_POST['p1_parents'];
	$p1_target_parents = $_POST['p1_target_parents'];
	$p1_used_money = $_POST['p1_used_money'];
	$p2_people = $_POST['p2_people'];
	$p2_used_money = $_POST['p2_used_money'];
	$effect_desc = $_POST['effect_desc'];
	$remark = $_POST['remark'];
	
	$sql = " update $table_name_effect set execute_money='$execute_money' ".
		   "                             , p1_times='$p1_times' ".
		   "                             , p1_parents='$p1_parents' ".
		   "                             , p1_target_parents='$p1_target_parents' ".
		   "                             , p1_used_money='$p1_used_money' ".
		   "                             , p2_people='$p2_people' ".
		   "                             , p2_used_money='$p2_used_money' ".
		   "                             , effect_desc='$effect_desc' ".
		   "                             , remark='$remark' ".
		   "                             , update_date=now() ".
		   " where sy_seq = '$main_seq'; ";
	
	//echo "<br />".$sql."<br />";
		
	//新增資料進資料庫語法  
	if(mysql_query($sql))
	{
		echo '新增成功!';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=effect_school_list.php>';
	}
	else
	{
		echo '新增失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=effect_school_list.php>';
		//echo (mysql_errno() != 0)?"5 : ".$sql."<br />".mysql_errno().mysql_error()."<br />----<br />":""; 
	}

?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>