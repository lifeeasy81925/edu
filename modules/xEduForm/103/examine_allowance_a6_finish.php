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
	$audit_city = $_POST['city']; //若為空值不會怎樣，但是儲存後無法正確回到上一頁
	
	//echo "-main_seq=".$main_seq."-<br />";
	$a = $_GET['a'];
	
	//讀取網頁資料
	$edu_total_money = $_POST['edu_total_money']; //總金額

	$item = $_POST['item'];
	$edu_desc = $_POST['edu_desc'];
	$edu_approved = $_POST['edu_approved'];
		
	if($item == '租車費')
	{
		$edu_money = $_POST['edu_money_1'];
	}
	if($item == '交通費')
	{
		$edu_money = $_POST['edu_money_2'];
	}
	if($item == '購置交通車')
	{
		$edu_money = $_POST['edu_money_3'];
	}

	$sql = " update $table_name set edu_total_money='$edu_total_money' ".
		   "                      , edu_money='$edu_money' ".
		   "                      , edu_desc='$edu_desc' ".
		   "                      , edu_approved='$edu_approved' ".
		   "                      , edu_approved_id='$username' ".
		   " where sy_seq = '$main_seq'; ";

	//新增資料進資料庫語法  
	if(mysql_query($sql))
	{
		echo "新增成功!";
		echo "<meta http-equiv=REFRESH CONTENT=2;url=a6_examine_table.php?id=$audit_city&a=$a>";
	}
	else
	{
		echo "新增失敗!";
		echo "<meta http-equiv=REFRESH CONTENT=2;url=a6_examine_table.php?id=$audit_city&a=$a>";
		//echo (mysql_errno() != 0)?"5 : ".$sql."<br />".mysql_errno().mysql_error()."<br />----<br />":""; 
	}
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>