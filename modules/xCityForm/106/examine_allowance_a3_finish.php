<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<?php

	//補三 table name

	$table_name = "alc_teaching_equipment";
	$table_name_item = $table_name."_item";

	$school_year = $_POST['school_year'];
	$main_seq = $_POST['main_seq'];

	//讀取網頁資料
	$city_total_money = $_POST['city_total_money']; //總金額

	$city_p1_money         = $_POST['city_p1_money'];
	$city_p1_current_money = $_POST['city_p1_current_money'];
	$city_p1_capital_money = $_POST['city_p1_capital_money'];

	$city_desc     = $_POST['city_desc'];
	$city_approved = $_POST['city_approved'];

	for($i = 1;$i <= 5;$i++)
	{
		$p = "p".$i;

		for($j = 1;$j <= 10;$j++) //細項填寫資料
		{
			$seq_no = $_POST[$p.'_seq_no_'.$j];
			$subject = $_POST[$p.'_subject_'.$j];
			$category = $_POST[$p.'_category_'.$j];
			$city_money = $_POST[$p.'_city_money_'.$j];
			$city_delete = $_POST[$p.'_city_delete_'.$j];

			if($seq_no != '') //更新項目
			{
				$sql = " update $table_name_item set subject='$subject' ".
					   "                           , category='$category' ".
					   "                           , city_money='$city_money' ".
					   "                           , city_delete='$city_delete' ".
					   " where seq_no = '$seq_no'; ";
				mysql_query($sql);
			}
		}
	}

	$sql = " update $table_name set city_total_money='$city_total_money' ".
		   "                      , city_p1_money='$city_p1_money' ".
		   "                      , city_p1_current_money='$city_p1_current_money' ".
		   "                      , city_p1_capital_money='$city_p1_capital_money' ".
		   "                      , city_desc='$city_desc' ".
		   "                      , city_approved='$city_approved' ".
		   "                      , city_approved_id='$username' ".
		   " where sy_seq = '$main_seq'; ";

	// 新增資料進資料庫語法
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
		echo '<meta http-equiv=REFRESH CONTENT=2;url=a3_examine_table.php>';
	}
	else
	{
		echo '<p>';
		echo '新增失敗！';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=a3_examine_table.php>';
	}
?>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>