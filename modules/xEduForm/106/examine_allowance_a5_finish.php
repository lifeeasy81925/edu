<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<p>
<hr>
<p>

<?php
	//補五table name
	$table_name = "alc_transport_car";
	$table_name_item = $table_name."_item";

	$school_year = $_POST['school_year'];
	$main_seq = $_POST['main_seq'];
	$audit_city = $_POST['city']; //若為空值不會怎樣，但是儲存後無法正確回到上一頁

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
		$edu_boarders_money = $_POST['edu_boarders_money'];
		$edu_no_boarders_money = $_POST['edu_no_boarders_money'];
	}
	if($item == '購置交通車')
	{
		$edu_money = $_POST['edu_money_3'];
	}

	$sql = " update $table_name set edu_total_money='$edu_total_money' ".
		   "                      , edu_money='$edu_money' ".
		   "                      , edu_boarders_money='$edu_boarders_money' ".
		   "                      , edu_no_boarders_money='$edu_no_boarders_money' ".
		   "                      , edu_desc='$edu_desc' ".
		   "                      , edu_approved='$edu_approved' ".
		   "                      , edu_approved_id='$username' ".
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
		echo "<meta http-equiv=REFRESH CONTENT=2;url=a5_examine_table.php?id=$audit_city&a=$a>";
	}
	else
	{
		echo "新增失敗。";
		echo "<meta http-equiv=REFRESH CONTENT=2;url=a5_examine_table.php?id=$audit_city&a=$a>";
	}
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>