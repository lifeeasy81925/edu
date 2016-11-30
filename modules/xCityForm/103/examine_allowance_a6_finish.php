<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	//補六table name
	$table_name = "alc_transport_car";
	$table_name_item = $table_name."_item";
	
	$school_year = $_POST['school_year'];
	$main_seq = $_POST['main_seq'];
	
	//echo "-main_seq=".$main_seq."-<br />";
	
	//讀取網頁資料
	$city_total_money = $_POST['city_total_money']; //總金額

	$item = $_POST['item'];
	$city_desc = $_POST['city_desc'];
	$city_approved = $_POST['city_approved'];
		
	if($item == '租車費')
	{
		$city_money = $_POST['city_money_1'];
	}
	if($item == '交通費')
	{
		$city_money = $_POST['city_money_2'];
	}
	if($item == '購置交通車')
	{
		$city_money = $_POST['city_money_3'];
	}

	$sql = " update $table_name set city_total_money='$city_total_money' ".
		   "                      , city_money='$city_money' ".
		   "                      , city_desc='$city_desc' ".
		   "                      , city_approved='$city_approved' ".
		   "                      , city_approved_id='$username' ".
		   " where sy_seq = '$main_seq'; ";

	//新增資料進資料庫語法  
	if(mysql_query($sql))
	{
		echo '新增成功!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=a6_examine_table.php>';
	}
	else
	{
		echo '新增失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=a6_examine_table.php>';
		//echo (mysql_errno() != 0)?"5 : ".$sql."<br />".mysql_errno().mysql_error()."<br />----<br />":""; 
	}
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>