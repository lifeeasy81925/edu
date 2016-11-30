<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<?php

	//補五table name
	$table_name = "alc_transport_car";
	$table_name_item = $table_name."_item";
	
	$school_year = $_POST['school_year'];
	$main_seq = $_POST['main_seq'];
	
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
		$city_boarders_money = $_POST['city_boarders_money'];
		$city_no_boarders_money = $_POST['city_no_boarders_money'];
	}
	if($item == '購置交通車')
	{
		$city_money = $_POST['city_money_3'];
	}

	$sql = " update $table_name set city_total_money='$city_total_money' ".
		   "                      , city_money='$city_money' ".
		   "                      , city_boarders_money='$city_boarders_money' ".
		   "                      , city_no_boarders_money='$city_no_boarders_money' ".
		   "                      , city_desc='$city_desc' ".
		   "                      , city_approved='$city_approved' ".
		   "                      , city_approved_id='$username' ".
		   " where sy_seq = '$main_seq'; ";

	//新增資料進資料庫語法  
	if(mysql_query($sql))
	{
		echo "<table align='center'>";
		echo "<tr>";
		echo "<td align='center' valign='center'>";
		echo "<font face='標楷體' size='+3'>";
		echo "新增成功。<p>";
		echo "資料儲存中，請稍候．．．<p>";
		echo "<img src='/edu/images/loading02.gif' /><p>";
		echo "</font>";
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=a5_examine_table.php>';
	}
	else
	{
		echo '<p>';
		echo '新增失敗！';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=a5_examine_table.php>';
	}
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>