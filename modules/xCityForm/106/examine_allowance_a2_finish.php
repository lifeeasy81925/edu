<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>
<?php
	// 補二table name
	$table_name 				= "alc_education_features";
	$table_name_item 			= $table_name."_item";
	
	$school_year				= $_POST['school_year'];
	$main_seq 					= $_POST['main_seq'];
	
	//讀取網頁資料
	$city_total_money 			= $_POST['city_total_money']; 		//初審金額
	$city_total_money_ny1 		= $_POST['city_total_money_ny1']; 	//初審下一年金額
	$city_total_money_ny2 		= $_POST['city_total_money_ny2']; 	//初審下二年金額
	
	$city_p1_money 				= $_POST['city_p1_money'];
	$city_p1_current_money 		= $_POST['city_p1_current_money'];
	$city_p1_capital_money 		= $_POST['city_p1_capital_money'];
	$city_p2_money 				= $_POST['city_p2_money'];
	$city_p2_current_money 		= $_POST['city_p2_current_money'];
	$city_p2_capital_money 		= $_POST['city_p2_capital_money'];
	
	$city_p1_money_ny1 			= $_POST['city_p1_money_ny1'];
	$city_p1_current_money_ny1 	= $_POST['city_p1_current_money_ny1'];
	$city_p1_capital_money_ny1 	= $_POST['city_p1_capital_money_ny1'];
	$city_p2_money_ny1 			= $_POST['city_p2_money_ny1'];
	$city_p2_current_money_ny1 	= $_POST['city_p2_current_money_ny1'];
	$city_p2_capital_money_ny1 	= $_POST['city_p2_capital_money_ny1'];
	
	$city_p1_money_ny2 			= $_POST['city_p1_money_ny2'];
	$city_p1_current_money_ny2 	= $_POST['city_p1_current_money_ny2'];
	$city_p1_capital_money_ny2 	= $_POST['city_p1_capital_money_ny2'];
	$city_p2_money_ny2 			= $_POST['city_p2_money_ny2'];
	$city_p2_current_money_ny2 	= $_POST['city_p2_current_money_ny2'];
	$city_p2_capital_money_ny2 	= $_POST['city_p2_capital_money_ny2'];
	
	$city_desc 					= $_POST['city_desc'];
	$city_desc_ny1 				= $_POST['city_desc_ny1'];
	$city_desc_ny2				= $_POST['city_desc_ny2'];
	$city_desc_p2 				= $_POST['city_desc_p2'];
	$city_desc_ny1_p2 			= $_POST['city_desc_ny1_p2'];
	$city_desc_ny2_p2 			= $_POST['city_desc_ny2_p2'];
	$city_approved 				= $_POST['city_approved'];
	
	for($i = 1;$i <= 5;$i++)
	{
		for($k = 106;$k <= 108;$k++) // 這裡每年要回來改哦(三年計畫的長度)
		{			
			$p = "p".$i."_".$k;
			
			for($j = 1;$j <= 20;$j++) //細項填寫資料
			{
				//存入本地變數
				$seq_no 		= $_POST[$p.'_seq_no_'.$j];
				$subject 		= $_POST[$p.'_subject_'.$j];
				$category 		= $_POST[$p.'_category_'.$j];
				$city_money		= $_POST[$p.'_city_money_'.$j];
				$city_delete	= $_POST[$p.'_city_delete_'.$j];
				
				//本地變數存入資料庫
				if($seq_no != '') //更新項目
				{
					$sql = " update $table_name_item set subject='$subject' ".
						   "                           , category='$category' ".
						   "                           , city_money='$city_money' ".
						   "                           , city_delete='$city_delete' ".
						   "  where seq_no = '$seq_no'; ";
					mysql_query($sql);
				}				
			}
		}
	}
	
	$sql = " update $table_name set city_total_money='$city_total_money' ".
		   "                      , city_total_money_ny1='$city_total_money_ny1' ".
		   "                      , city_total_money_ny2='$city_total_money_ny2' ".
	
		   "                      , city_p1_money='$city_p1_money' ".
		   "                      , city_p1_current_money='$city_p1_current_money' ".
		   "                      , city_p1_capital_money='$city_p1_capital_money' ".
		   
		   "                      , city_p1_money_ny1='$city_p1_money_ny1' ".
		   "                      , city_p1_current_money_ny1='$city_p1_current_money_ny1' ".
		   "                      , city_p1_capital_money_ny1='$city_p1_capital_money_ny1' ".
		   
		   "                      , city_p1_money_ny2='$city_p1_money_ny2' ".
		   "                      , city_p1_current_money_ny2='$city_p1_current_money_ny2' ".
		   "                      , city_p1_capital_money_ny2='$city_p1_capital_money_ny2' ".
		   
		   "                      , city_p2_money='$city_p2_money' ".
		   "                      , city_p2_current_money='$city_p2_current_money' ".
		   "                      , city_p2_capital_money='$city_p2_capital_money' ".
		   
		   "                      , city_p2_money_ny1='$city_p2_money_ny1' ".
		   "                      , city_p2_current_money_ny1='$city_p2_current_money_ny1' ".
		   "                      , city_p2_capital_money_ny1='$city_p2_capital_money_ny1' ".
		   
		   "                      , city_p2_money_ny2='$city_p2_money_ny2' ".
		   "                      , city_p2_current_money_ny2='$city_p2_current_money_ny2' ".
		   "                      , city_p2_capital_money_ny2='$city_p2_capital_money_ny2' ".
		   
		   "                      , city_desc='$city_desc' ".
		   "                      , city_desc_ny1='$city_desc_ny1' ".
		   "                      , city_desc_ny2='$city_desc_ny2' ".
		   "                      , city_desc_p2='$city_desc_p2' ".
		   "                      , city_desc_ny1_p2='$city_desc_ny1_p2' ".
		   "                      , city_desc_ny2_p2='$city_desc_ny2_p2' ".
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
		echo '<meta http-equiv=REFRESH CONTENT=2;url=a2_examine_table.php>';
	}
	else
	{
		echo '<p>';
		echo '新增失敗！';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=a2_examine_table.php>';
	}
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>