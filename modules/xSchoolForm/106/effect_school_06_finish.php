<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	
	//補七table name
	$table_name = "alc_school_activity";
	$table_name_effect = $table_name."_effect";
	
	$school_year = $_POST['school_year'];
	$main_seq = $_POST['main_seq'];
	
	//讀取網頁資料
	$execute_money = $_POST['execute_money'];
	$execute_current_money = $_POST['execute_current_money'];
	$execute_capital_money = $_POST['execute_capital_money'];
	
	$p_num = $_POST['p_num'];
		
	$effect_desc = $_POST['effect_desc'];
	$remark = $_POST['remark'];
	
	$sql = " update $table_name_effect set execute_money='$execute_money' ".
		   "                             , execute_current_money='$execute_current_money' ".
		   "                             , execute_capital_money='$execute_capital_money' ".
			   
		   "                             , p_num='$p_num' ".
		   
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