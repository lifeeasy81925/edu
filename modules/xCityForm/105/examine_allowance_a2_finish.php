<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	//補二table name
	$table_name = "alc_education_features";
	$table_name_item = $table_name."_item";
	
	$school_year = $_POST['school_year'];
	$main_seq = $_POST['main_seq'];
	
	//echo "-main_seq=".$main_seq."-<br />";
	
	//讀取網頁資料
	$city_total_money = $_POST['city_total_money']; //總金額
	$city_total_money_ny1 = $_POST['city_total_money_ny1']; //總金額
	$city_total_money_ny2 = $_POST['city_total_money_ny2']; //總金額
	
	$city_p1_money = $_POST['city_p1_money'];
	$city_p1_current_money = $_POST['city_p1_current_money'];
	$city_p1_capital_money = $_POST['city_p1_capital_money'];
	$city_p2_money = $_POST['city_p2_money'];
	$city_p2_current_money = $_POST['city_p2_current_money'];
	$city_p2_capital_money = $_POST['city_p2_capital_money'];
	
	$city_p1_money_ny1 = $_POST['city_p1_money_ny1'];
	$city_p1_current_money_ny1 = $_POST['city_p1_current_money_ny1'];
	$city_p1_capital_money_ny1 = $_POST['city_p1_capital_money_ny1'];
	$city_p2_money_ny1 = $_POST['city_p2_money_ny1'];
	$city_p2_current_money_ny1 = $_POST['city_p2_current_money_ny1'];
	$city_p2_capital_money_ny1 = $_POST['city_p2_capital_money_ny1'];
	
	$city_p1_money_ny2 = $_POST['city_p1_money_ny2'];
	$city_p1_current_money_ny2 = $_POST['city_p1_current_money_ny2'];
	$city_p1_capital_money_ny2 = $_POST['city_p1_capital_money_ny2'];
	$city_p2_money_ny2 = $_POST['city_p2_money_ny2'];
	$city_p2_current_money_ny2 = $_POST['city_p2_current_money_ny2'];
	$city_p2_capital_money_ny2 = $_POST['city_p2_capital_money_ny2'];
	
	$city_desc = $_POST['city_desc'];
	$city_desc_ny1 = $_POST['city_desc_ny1'];
	$city_desc_ny2 = $_POST['city_desc_ny2'];
	$city_desc_p2 = $_POST['city_desc_p2'];
	$city_desc_ny1_p2 = $_POST['city_desc_ny1_p2'];
	$city_desc_ny2_p2 = $_POST['city_desc_ny2_p2'];
	$city_approved = $_POST['city_approved'];
		
	for($i = 1;$i <= 5;$i++)
	{
		for($k = 105;$k <= 107;$k++)                     //j10407，改105~107、原本104~106
		{			
			$p = "p".$i."_".$k;
			
			for($j = 1;$j <= 10;$j++) //細項填寫資料
			{
				$seq_no = $_POST[$p.'_seq_no_'.$j];
				$subject = $_POST[$p.'_subject_'.$j];
				$category = $_POST[$p.'_category_'.$j];
				/*$item = $_POST[$p.'_item_'.$j];
				$unit = $_POST[$p.'_unit_'.$j];
				$price = $_POST[$p.'_price_'.$j];
				$amount = $_POST[$p.'_amount_'.$j];
				$s_money = $_POST[$p.'_s_money_'.$j];
				$s_desc = $_POST[$p.'_s_desc_'.$j];*/
				$city_money = $_POST[$p.'_city_money_'.$j];
				$city_delete = $_POST[$p.'_city_delete_'.$j];
				
				//echo $j."/".$seq_no."/".$subject."/".$category."/".$item."/".$unit."/".$price."/".$amount."/".$s_money."/".$s_desc."/"."<br />";
				
				if($seq_no != '') //更新項目
				{
					$sql = " update $table_name_item set subject='$subject' ".
						   "                           , category='$category' ".
						   /*"                         , item='$item' ".
						   "                           , unit='$unit' ".
						   "                           , price='$price' ".
						   "                           , amount='$amount' ".
						   "                           , s_money='$s_money' ".
						   "                           , s_desc='$s_desc' ".*/
						   "                           , city_money='$city_money' ".
						   "                           , city_delete='$city_delete' ".
						   " where seq_no = '$seq_no'; ";
					mysql_query($sql);
					//echo (mysql_errno() != 0)?"2 : ".$sql."<br />".mysql_errno().mysql_error()."<br />----<br />":""; 
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
		echo '新增成功!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=a2_examine_table.php>';
	}
	else
	{
		echo '新增失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=a2_examine_table.php>';
		//echo (mysql_errno() != 0)?"5 : ".$sql."<br />".mysql_errno().mysql_error()."<br />----<br />":""; 
	}
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>