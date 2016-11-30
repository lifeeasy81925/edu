<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	$table_name      = "alc_teaching_equipment";
	$table_name_item = "alc_teaching_equipment_item";	
	$school_year     = $_POST['school_year'];
	$main_seq        = $_POST['main_seq'];
	
	// 如果沒資料，先新增
	$cnt_sql  = " SELECT sy_seq FROM $table_name where sy_seq = '$main_seq' ";
	$result   = mysql_query($cnt_sql);
	$num_rows = mysql_num_rows($result);
	
	if($num_rows == 0)  // 沒資料
	{
		$insert_sql = "insert into     $table_name (  sy_seq,      account,     school_year)   ".
					  "       values               ('$main_seq', '$username', '$school_year'); ";
		mysql_query($insert_sql);
	}

	// 讀取網頁資料
	$s_total_money   = $_POST['s_total_money'];  // 總金額
	$apply_last3year = $_POST['rdo_last3year'];
	
	$s_p1_money         = $_POST['s_p1_money'];
	$s_p1_current_money = $_POST['s_p1_current_money'];
	$s_p1_capital_money = $_POST['s_p1_capital_money'];
	
	for($i = 1; $i <= 5; $i++)
	{
		$p = "p".$i;
		if($_POST['s_'.$p.'_money'] != '' && $_POST['s_'.$p.'_money'] != 0)  // 當申請金額不為0時才存資料庫
		{
			for($j = 1;$j <= 10;$j++)  // 細項填寫資料
			{
				$seq_no   = $_POST[$p.'_seq_no_'.$j];
				$subject  = $_POST[$p.'_subject_'.$j];
				$category = $_POST[$p.'_category_'.$j];
				$item     = $_POST[$p.'_item_'.$j];
				$unit     = $_POST[$p.'_unit_'.$j];
				$price    = $_POST[$p.'_price_'.$j];
				$amount   = $_POST[$p.'_amount_'.$j];
				$s_money  = $_POST[$p.'_s_money_'.$j];
				$s_desc   = $_POST[$p.'_s_desc_'.$j];

				if($seq_no == '' && $s_money != 0 && $s_money != '') //新增項目
				{
					$sql = " insert into $table_name_item ( main_seq, section, subject, category, item, unit, price, amount, s_money, s_desc) ".
						   "                       values ( '$main_seq' ".
						   "                              , '$p'        ".
						   "                              , '$subject'  ".
						   "                              , '$category' ".
						   "                              , '$item'     ".
						   "                              , '$unit'     ".
						   "                              , '$price'    ".
						   "                              , '$amount'   ".
						   "                              , '$s_money'  ".
						   "                              , '$s_desc'   ".
						   "                              );            ";
					mysql_query($sql);
				}
				
				if($seq_no != '' && $s_money != 0 && $s_money != '')  // 更新項目
				{
					$sql = " update $table_name_item set subject  = '$subject'  ".
						   "                           , category = '$category' ".
						   "                           , item     = '$item'     ".
						   "                           , unit     = '$unit'     ".
						   "                           , price    = '$price'    ".
						   "                           , amount   = '$amount'   ".
						   "                           , s_money  = '$s_money'  ".
						   "                           , s_desc   = '$s_desc'   ".
						   " where seq_no = '$seq_no';                          ";
					mysql_query($sql);
				}
				
				if($seq_no != '' && ($s_money == 0 || $s_money == ''))  // 刪除項目，當金額 = 空白 or 0
				{
					$sql = " delete from $table_name_item ".
						   " where seq_no = '$seq_no';    ";
					mysql_query($sql);
				}				
			}
		}
		else  // 當申請金額=0時，刪除原本的資料
		{
			$sql = " delete from $table_name_item                     ".
				   " where main_seq = '$main_seq' and section = '$p'; ";
			mysql_query($sql);
		}
	}
	
	$sql = " update $table_name set s_total_money      = '$s_total_money'      ".
		   "                      , apply_last3year    = '$apply_last3year'    ".
		   "                      , s_p1_money         = '$s_p1_money'         ".
		   "                      , s_p1_current_money = '$s_p1_current_money' ".
		   "                      , s_p1_capital_money = '$s_p1_capital_money' ".
		   " where sy_seq = '$main_seq';                                       ";
		
	// 新增資料進資料庫語法  
	if(mysql_query($sql))
	{
		echo '新增成功!';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=school_write_allowance.php>';
	}
	else
	{
		echo '新增失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=school_write_a4.php>';
	}
?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>