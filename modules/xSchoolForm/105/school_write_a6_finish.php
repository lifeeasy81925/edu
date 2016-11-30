<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	//補六table name
	$table_name = "alc_transport_car";
	$table_name_item = "";
	
	$school_year = $_POST['school_year'];
	$main_seq = $_POST['main_seq'];
	
	//如果沒資料，先新增
	$cnt_sql = " SELECT sy_seq FROM $table_name where sy_seq = '$main_seq' ";
	$result = mysql_query($cnt_sql);
	$num_rows = mysql_num_rows($result);
	if($num_rows == 0) //沒資料
	{
		$insert_sql = "insert into $table_name (sy_seq, account, school_year) ".
					  "                     values ('$main_seq', '$username', '$school_year'); ";
		mysql_query($insert_sql);
	}
	//echo "-main_seq=".$main_seq."-<br />";
	
	//讀取網頁資料
	$s_total_money = $_POST['s_total_money']; //總金額
	
	$item = $_POST['rdo_item'];
	
	if($item == '租車費')
	{
		$s_money = $_POST['s_money_1'];
		$s_people = $_POST['s_people_1'];
	}
	if($item == '交通費')
	{
		$s_money = $_POST['s_money_2'];
		$s_people = $_POST['s_people_2'];
		$s_boarders = $_POST['s_boarders'];
		$s_no_boarders = $_POST['s_no_boarders'];
		$s_boarders_money = $_POST['s_boarders_money'];
		$s_no_boarders_money = $_POST['s_no_boarders_money'];
	}
	if($item == '購置交通車')
	{
		$s_money = $_POST['s_money_3'];
		$s_people = $_POST['s_people_3'];
	}

	$sql = " update $table_name set s_total_money='$s_total_money' ".
		   "                      , s_money='$s_money' ".
		   "                      , s_people='$s_people' ".
		   "                      , item='$item' ".
		   "                      , s_boarders='$s_boarders' ".
		   "                      , s_no_boarders='$s_no_boarders' ".
		   "                      , s_boarders_money='$s_boarders_money' ".
		   "                      , s_no_boarders_money='$s_no_boarders_money' ".
		   " where sy_seq = '$main_seq'; ";
	
	//新增資料進資料庫語法  
	if(mysql_query($sql))
	{
		echo '新增成功!';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=school_write_allowance.php>';
	}
	else
	{
		echo '新增失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=school_write_a6.php>';
		//echo (mysql_errno() != 0)?"5 : ".$sql."<br />".mysql_errno().mysql_error()."<br />----<br />":""; 
	}
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>