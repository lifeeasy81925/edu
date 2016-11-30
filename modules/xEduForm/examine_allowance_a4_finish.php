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
	$table_name = "alc_aboriginal_education";
	$table_name_item = $table_name."_item";

	$school_year = $_POST['school_year'];
	$main_seq = $_POST['main_seq'];
	$audit_city = $_POST['city']; //若為空值不會怎樣，但是儲存後無法正確回到上一頁

	$a = $_GET['a'];

	//讀取網頁資料
	$edu_total_money = $_POST['edu_total_money']; //總金額
	$edu_total_money_ny1 = $_POST['edu_total_money_ny1']; //總金額
	$edu_total_money_ny2 = $_POST['edu_total_money_ny2']; //總金額

	$edu_p1_money = $_POST['edu_p1_money'];
	$edu_p1_current_money = $_POST['edu_p1_current_money'];
	$edu_p1_capital_money = $_POST['edu_p1_capital_money'];
	$edu_p2_money = $_POST['edu_p2_money'];
	$edu_p2_current_money = $_POST['edu_p2_current_money'];
	$edu_p2_capital_money = $_POST['edu_p2_capital_money'];

	$edu_p1_money_ny1 = $_POST['edu_p1_money_ny1'];
	$edu_p1_current_money_ny1 = $_POST['edu_p1_current_money_ny1'];
	$edu_p1_capital_money_ny1 = $_POST['edu_p1_capital_money_ny1'];
	$edu_p2_money_ny1 = $_POST['edu_p2_money_ny1'];
	$edu_p2_current_money_ny1 = $_POST['edu_p2_current_money_ny1'];
	$edu_p2_capital_money_ny1 = $_POST['edu_p2_capital_money_ny1'];

	$edu_p1_money_ny2 = $_POST['edu_p1_money_ny2'];
	$edu_p1_current_money_ny2 = $_POST['edu_p1_current_money_ny2'];
	$edu_p1_capital_money_ny2 = $_POST['edu_p1_capital_money_ny2'];
	$edu_p2_money_ny2 = $_POST['edu_p2_money_ny2'];
	$edu_p2_current_money_ny2 = $_POST['edu_p2_current_money_ny2'];
	$edu_p2_capital_money_ny2 = $_POST['edu_p2_capital_money_ny2'];

	$edu_desc = $_POST['edu_desc'];
	$edu_desc_ny1 = $_POST['edu_desc_ny1'];
	$edu_desc_ny2 = $_POST['edu_desc_ny2'];
	$edu_desc_p2 = $_POST['edu_desc_p2'];
	$edu_desc_ny1_p2 = $_POST['edu_desc_ny1_p2'];
	$edu_desc_ny2_p2 = $_POST['edu_desc_ny2_p2'];
	$edu_approved = $_POST['edu_approved'];

	for($i = 1;$i <= 5;$i++)
	{
		for($k = 105;$k <= 107;$k++)
		{
			$p = "p".$i."_".$k;

			for($j = 1;$j <= 10;$j++) //細項填寫資料
			{
				$seq_no = $_POST[$p.'_seq_no_'.$j];
				$subject = $_POST[$p.'_subject_'.$j];
				$category = $_POST[$p.'_category_'.$j];
				$edu_money = $_POST[$p.'_edu_money_'.$j];
				$edu_delete = $_POST[$p.'_edu_delete_'.$j];

				if($seq_no != '') //更新項目
				{
					$sql = " update $table_name_item set subject='$subject' ".
						   "                           , category='$category' ".
						   "                           , edu_money='$edu_money' ".
						   "                           , edu_delete='$edu_delete' ".
						   " where seq_no = '$seq_no'; ";
					mysql_query($sql);
				}
			}
		}
	}

	$sql = " update $table_name set edu_total_money='$edu_total_money' ".
		   "                      , edu_total_money_ny1='$edu_total_money_ny1' ".
		   "                      , edu_total_money_ny2='$edu_total_money_ny2' ".

		   "                      , edu_p1_money='$edu_p1_money' ".
		   "                      , edu_p1_current_money='$edu_p1_current_money' ".
		   "                      , edu_p1_capital_money='$edu_p1_capital_money' ".

		   "                      , edu_p1_money_ny1='$edu_p1_money_ny1' ".
		   "                      , edu_p1_current_money_ny1='$edu_p1_current_money_ny1' ".
		   "                      , edu_p1_capital_money_ny1='$edu_p1_capital_money_ny1' ".

		   "                      , edu_p1_money_ny2='$edu_p1_money_ny2' ".
		   "                      , edu_p1_current_money_ny2='$edu_p1_current_money_ny2' ".
		   "                      , edu_p1_capital_money_ny2='$edu_p1_capital_money_ny2' ".

		   "                      , edu_p2_money='$edu_p2_money' ".
		   "                      , edu_p2_current_money='$edu_p2_current_money' ".
		   "                      , edu_p2_capital_money='$edu_p2_capital_money' ".

		   "                      , edu_p2_money_ny1='$edu_p2_money_ny1' ".
		   "                      , edu_p2_current_money_ny1='$edu_p2_current_money_ny1' ".
		   "                      , edu_p2_capital_money_ny1='$edu_p2_capital_money_ny1' ".

		   "                      , edu_p2_money_ny2='$edu_p2_money_ny2' ".
		   "                      , edu_p2_current_money_ny2='$edu_p2_current_money_ny2' ".
		   "                      , edu_p2_capital_money_ny2='$edu_p2_capital_money_ny2' ".

		   "                      , edu_desc='$edu_desc' ".
		   "                      , edu_desc_ny1='$edu_desc_ny1' ".
		   "                      , edu_desc_ny2='$edu_desc_ny2' ".
		   "                      , edu_desc_p2='$edu_desc_p2' ".
		   "                      , edu_desc_ny1_p2='$edu_desc_ny1_p2' ".
		   "                      , edu_desc_ny2_p2='$edu_desc_ny2_p2' ".
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
		echo "<meta http-equiv=REFRESH CONTENT=2;url=a4_examine_table.php?id=$audit_city&a=$a>";
	}
	else
	{
		echo "新增失敗。";
		echo "<meta http-equiv=REFRESH CONTENT=2;url=a4_examine_table.php?id=$audit_city&a=$a>";
	}
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>