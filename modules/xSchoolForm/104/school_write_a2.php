<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "checkdate.php";
	
	include "../../function/config_for_104.php"; //本年度基本設定
	
	$keyClasses = '13'; // 設定可申請特色二的最少班級數

	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   //補二資料
		   "      , a2.p1_name, a2.p2_name ".
		   "      , a2.s_p1_student, a2.s_p2_student ".
		   "      , a2.s_p1_target, a2.s_p2_target ".
		   "      , a2.s_total_money ".
		   "      , a2.s_p1_money, a2.s_p2_money ".
		   "      , a2.s_p1_current_cnt, a2.s_p1_current_money ".
		   "      , a2.s_p1_capital_cnt, a2.s_p1_capital_money ".
		   "      , a2.s_p2_current_cnt, a2.s_p2_current_money ".
		   "      , a2.s_p2_capital_cnt, a2.s_p2_capital_money ".
		   "      , a2.p1_IsContinue, a2.p2_IsContinue, a2.p_num ".
		   "      , a2.p1_ContinueYear, a2.p2_ContinueYear ".
		   
		   "      , a2.s_total_money_ny1 ".
		   "      , a2.s_p1_money_ny1, a2.s_p2_money_ny1 ".
		   "      , a2.s_p1_current_cnt_ny1, a2.s_p1_current_money_ny1 ".
		   "      , a2.s_p1_capital_cnt_ny1, a2.s_p1_capital_money_ny1 ".
		   "      , a2.s_p2_current_cnt_ny1, a2.s_p2_current_money_ny1 ".
		   "      , a2.s_p2_capital_cnt_ny1, a2.s_p2_capital_money_ny1 ".
		   
		   "      , a2.s_total_money_ny2 ".
		   "      , a2.s_p1_money_ny2, a2.s_p2_money_ny2 ".
		   "      , a2.s_p1_current_cnt_ny2, a2.s_p1_current_money_ny2 ".
		   "      , a2.s_p1_capital_cnt_ny2, a2.s_p1_capital_money_ny2 ".
		   "      , a2.s_p2_current_cnt_ny2, a2.s_p2_current_money_ny2 ".
		   "      , a2.s_p2_capital_cnt_ny2, a2.s_p2_capital_money_ny2 ".
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join alc_education_features as a2 on sy.seq_no = a2.sy_seq ".
		   " where sy.school_year = '$school_year' ".
		   "   and sd.account = '$username' ";
	//echo "<br />".$sql."<br />";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$account = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];
		$area = $row['area'];
		
		$student = $row['student'];
		$target_aboriginal = $row['target_aboriginal'];
		$target_no_aboriginal = $row['target_no_aboriginal'];
		$class_total = $row['class_total'];
		
		$main_seq = $row['seq_no']; //school_year的seq_no		
		$p1_name = $row['p1_name'];
		$p2_name = $row['p2_name'];
		$p1_IsContinue = $row['p1_IsContinue'];
		$p2_IsContinue = $row['p2_IsContinue'];
		$p1_ContinueYear = $row['p1_ContinueYear'];
		$p2_ContinueYear = $row['p2_ContinueYear'];
		$s_p1_student = $row['s_p1_student'];
		$s_p2_student = $row['s_p2_student'];
		$s_p1_target = $row['s_p1_target'];
		$s_p2_target = $row['s_p2_target'];
		$p_num = $row['p_num'];
		
		$s_total_money = ($row['s_total_money'] == '')?0:$row['s_total_money']; //NULL則填入0
		$s_p1_money = ($row['s_p1_money'] == '')?0:$row['s_p1_money']; //NULL則填入0
		$s_p1_current_cnt = ($row['s_p1_current_cnt'] == '')?0:$row['s_p1_current_cnt'];
		$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
		$s_p1_capital_cnt = ($row['s_p1_capital_cnt'] == '')?0:$row['s_p1_capital_cnt'];
		$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];
		$s_p2_money = ($row['s_p2_money'] == '')?0:$row['s_p2_money'];
		$s_p2_current_cnt = ($row['s_p2_current_cnt'] == '')?0:$row['s_p2_current_cnt'];
		$s_p2_current_money = ($row['s_p2_current_money'] == '')?0:$row['s_p2_current_money'];
		$s_p2_capital_cnt = ($row['s_p2_capital_cnt'] == '')?0:$row['s_p2_capital_cnt'];
		$s_p2_capital_money = ($row['s_p2_capital_money'] == '')?0:$row['s_p2_capital_money'];
			
		$s_total_money_ny1 = ($row['s_total_money_ny1'] == '')?0:$row['s_total_money_ny1']; //NULL則填入0
		$s_p1_money_ny1 = ($row['s_p1_money_ny1'] == '')?0:$row['s_p1_money_ny1']; //NULL則填入0
		$s_p1_current_cnt_ny1 = ($row['s_p1_current_cnt_ny1'] == '')?0:$row['s_p1_current_cnt_ny1'];
		$s_p1_current_money_ny1 = ($row['s_p1_current_money_ny1'] == '')?0:$row['s_p1_current_money_ny1'];
		$s_p1_capital_cnt_ny1 = ($row['s_p1_capital_cnt_ny1'] == '')?0:$row['s_p1_capital_cnt_ny1'];
		$s_p1_capital_money_ny1 = ($row['s_p1_capital_money_ny1'] == '')?0:$row['s_p1_capital_money_ny1'];
		$s_p2_money_ny1 = ($row['s_p2_money_ny1'] == '')?0:$row['s_p2_money_ny1'];
		$s_p2_current_cnt_ny1 = ($row['s_p2_current_cnt_ny1'] == '')?0:$row['s_p2_current_cnt_ny1'];
		$s_p2_current_money_ny1 = ($row['s_p2_current_money_ny1'] == '')?0:$row['s_p2_current_money_ny1'];
		$s_p2_capital_cnt_ny1 = ($row['s_p2_capital_cnt_ny1'] == '')?0:$row['s_p2_capital_cnt_ny1'];
		$s_p2_capital_money_ny1 = ($row['s_p2_capital_money_ny1'] == '')?0:$row['s_p2_capital_money_ny1'];
		
		$s_total_money_ny2 = ($row['s_total_money_ny2'] == '')?0:$row['s_total_money_ny2']; //NULL則填入0
		$s_p1_money_ny2 = ($row['s_p1_money_ny2'] == '')?0:$row['s_p1_money_ny2']; //NULL則填入0
		$s_p1_current_cnt_ny2 = ($row['s_p1_current_cnt_ny2'] == '')?0:$row['s_p1_current_cnt_ny2'];
		$s_p1_current_money_ny2 = ($row['s_p1_current_money_ny2'] == '')?0:$row['s_p1_current_money_ny2'];
		$s_p1_capital_cnt_ny2 = ($row['s_p1_capital_cnt_ny2'] == '')?0:$row['s_p1_capital_cnt_ny2'];
		$s_p1_capital_money_ny2 = ($row['s_p1_capital_money_ny2'] == '')?0:$row['s_p1_capital_money_ny2'];
		$s_p2_money_ny2 = ($row['s_p2_money_ny2'] == '')?0:$row['s_p2_money_ny2'];
		$s_p2_current_cnt_ny2 = ($row['s_p2_current_cnt_ny2'] == '')?0:$row['s_p2_current_cnt_ny2'];
		$s_p2_current_money_ny2 = ($row['s_p2_current_money_ny2'] == '')?0:$row['s_p2_current_money_ny2'];
		$s_p2_capital_cnt_ny2 = ($row['s_p2_capital_cnt_ny2'] == '')?0:$row['s_p2_capital_cnt_ny2'];
		$s_p2_capital_money_ny2 = ($row['s_p2_capital_money_ny2'] == '')?0:$row['s_p2_capital_money_ny2'];
		
		//計算目標學生百分比
		if($s_p1_student != '' && $s_p1_target != '')
		{
			$s_p1_per = number_format($s_p1_target / $s_p1_student * 100, 2);
		}
		if($s_p2_student != '' && $s_p2_target != '')
		{
			$s_p2_per = number_format($s_p2_target / $s_p2_student * 100, 2);
		}
	}

	//顯示填寫的資料
	//allowance_table_name => 各補助細項的 table name ex.alc_education_features_item
	//p => 特色 ex.p1 p2
	//main_seq => 各補助的 seq_no，ex.alc_education_features 的 seq_no (注意!!不是 _item 的 seq_no)
	function print_item($allowance_table_name, $p, $main_seq)
	{
		$sql = " select * ".
		   " from $allowance_table_name ".
		   " where main_seq = '$main_seq' ".
		   "   and section = '$p' ". //特色1
		   " order by seq_no asc ";
		//echo "<br />".$sql."<br />";
		$result = mysql_query($sql);
		$num_rows = mysql_num_rows($result); //列數
	
		$has_outlay = 0; //有無雜支項目
		$idx = 0;
		
		//順序：顯示已填資料 -> 補滿9項(未滿9時補上空值) -> 顯示雜支
		while($row = mysql_fetch_array($result))
		{
			$seq_no = $row['seq_no'];
			$subject = $row['subject'];
			$category = $row['category'];
			$item = $row['item'];
			$unit = $row['unit'];
			$price = $row['price'];
			$amount = $row['amount'];
			$s_money = $row['s_money'];
			$s_desc = $row['s_desc'];

			$s1 = array("","經常門","資本門");
			$s3 = array(""=>array("")
					 , "經常門"=>array("","鐘點費","鐘點費(含補充保費)","器材購置","器材維護","教材","道具","硬體設備","其他")//,"加班費",
					 , "資本門"=>array("","器材購置","器材維護","硬體設備","其他")
						);
									
			if($category != '雜支')
			{
				$idx++;
				
				//name 或 id 最後格式為 p1_xxx_1, p1=特色一(p2為二), xxx=名稱(ex.subject=科目、category=類別), 最後一位數字表示項次，每個特色有1~10
				echo "<tr>";
				echo "<td width='10' align='center' nowrap='nowrap'>$idx.<input type='hidden' name='".$p."_seq_no_$idx' value='$seq_no'></td>";
				echo "<td align='left'>"; //科目
				echo "<select name='".$p."_subject_$idx' id='".$p."_opt_subject_$idx' size='1' onChange='js:change_subject(this,$idx,1);'>";
				for($j = 0;$j < count($s1);$j++)
				{
					echo "	<option ".($subject == $s1[$j]?"selected":"")." >".$s1[$j]."</option>";
				}
				echo "</select></td>";
				echo "<td align='left'>"; //類別
				echo "<select name='".$p."_category_$idx' id='".$p."_opt_category_$idx' size='1' onChange='js:Count(this,$idx);' >";
				for($j = 0;$j < count($s3[$subject]);$j++)
				{
					echo "	<option ".($category == $s3[$subject][$j]?"selected":"")." >".$s3[$subject][$j]."</option>";
				}
				echo "</select></td>";
				echo "<td align='left'><input type='text' size='10' name='".$p."_item_$idx' value='$item' onchange='js:Count(this,$idx);' ></td>";
				echo "<td align='left'><input type='text' size='2' name='".$p."_unit_$idx' value='$unit' onchange='js:Count(this,$idx);' ></td>";
				echo "<td align='left'><input type='text' size='4' name='".$p."_price_$idx' value='$price' onchange='js:Count(this,$idx);' ></td>";
				echo "<td align='left'><input type='text' size='2' name='".$p."_amount_$idx' value='$amount' onchange='js:Count(this,$idx);' ></td>";
				echo "<td align='left'><input type='text' size='4' name='".$p."_s_money_$idx' value='$s_money' style='border:0px; text-align: left;' readonly ></td>";
				echo "<td align='left'><input type='text' size='6' name='".$p."_s_desc_$idx' value='$s_desc' ></td>";
				echo "</tr>";
			}
			else
			{
				$has_outlay = 1;
				
				$outlay_seq_no = $row['seq_no'];
				$outlay_subject = $row['subject'];
				$outlay_category = $row['category'];
				$outlay_item = $row['item'];
				$outlay_s_money = $row['s_money'];
				$outlay_s_desc = $row['s_desc'];
			}
		}
		
		//補滿9項
		for($i = ($num_rows+1-$has_outlay);$i < 10;$i++)
		{		
			echo "<tr>";
			echo "<td width='10' align='center' nowrap='nowrap'>$i.<input type='hidden' name='".$p."_seq_no_$i' value=''></td>";
			echo "<td align='left'>"; //科目
			echo "<select name='".$p."_subject_$i' id='".$p."_opt_subject_$i' size='1' onChange='js:change_subject(this,$i,1);'>";
			echo "	<option selected></option>";
			echo "	<option>經常門</option>";
			echo "	<option>資本門</option>";
			echo "</select></td>";
			echo "<td align='left'>"; //類別
			echo "<select name='".$p."_category_$i' id='".$p."_opt_category_$i' size='1' onChange='js:Count(this,$i);' >";
			echo "	<option selected></option>";
			echo "</select></td>";
			echo "<td align='left'><input type='text' size='10' name='".$p."_item_$i' value='' onchange='js:Count(this,$i);' ></td>";
			echo "<td align='left'><input type='text' size='2' name='".$p."_unit_$i' value='' onchange='js:Count(this,$i);' ></td>";
			echo "<td align='left'><input type='text' size='4' name='".$p."_price_$i' value='' onchange='js:Count(this,$i);' ></td>";
			echo "<td align='left'><input type='text' size='2' name='".$p."_amount_$i' value='' onchange='js:Count(this,$i);' ></td>";
			echo "<td align='left'><input type='text' size='4' name='".$p."_s_money_$i' value='' style='border:0px; text-align: left;' readonly ></td>";
			echo "<td align='left'><input type='text' size='6' name='".$p."_s_desc_$i' value='' ></td>";
			echo "</tr>";
		}
		
		if($has_outlay != 1) //如果沒有雜支，把項目清空
		{
			$outlay_seq_no = '';
			$outlay_subject = '經常門';
			$outlay_category = '雜支';
			$outlay_item = '';
			$outlay_s_money = '';
			$outlay_s_desc = '';
		}
		
		//顯示雜支
		echo "<tr>";
		echo "<td width='10' align='center' nowrap='nowrap'>10.<input type='hidden' name='".$p."_seq_no_10' value='$outlay_seq_no'></td>";
		echo "<td align='left'>"; //科目
		echo "<select name='".$p."_subject_10' id='".$p."_opt_subject_10' size='1' >";
		echo "	<option selected>$outlay_subject</option>";
		echo "</select></td>";
		echo "<td align='left'>"; //類別
		echo "<select name='".$p."_category_10' id='".$p."_opt_category_10' size='1' >";
		echo "	<option selected>$outlay_category</option>";
		echo "</select></td>";
		echo "<td align='left'><input type='checkbox' name='".$p."_item_10' value='Y' onclick='js:chkbox(this);' ".(($outlay_item == 'Y')?"checked":"")." >申請雜支</td>";
		echo "<td align='left'><input type='text' size='2' name='".$p."_unit_10' value='' style='border:0px; text-align: left;' readonly ></td>";
		echo "<td align='left'><input type='text' size='4' name='".$p."_price_10' value='' style='border:0px; text-align: left;' readonly ></td>";
		echo "<td align='left'><input type='text' size='2' name='".$p."_amount_10' value='' style='border:0px; text-align: left;' readonly ></td>";
		echo "<td align='left'><input type='text' size='4' name='".$p."_s_money_10' value='$outlay_s_money' style='border:0px; text-align: left;' readonly ></td>";
		echo "<td align='left'><input type='text' size='6' name='".$p."_s_desc_10' value='$outlay_s_desc' ></td>";
		echo "</tr>";
	}

?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body onload="set_default()"> 
<form name="form" method="post" action="school_write_a2_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><b>補助項目二：補助學校發展教育特色</b>　<a href="allowance-02.htm" target="_blank">(補助項目說明)</a>
<p>
<font color=blue>※補助學校發展教育特色-申請補助經費：<?=$school_year;?>年度：<input type="text" size="6" name="s_total_money" value="<?=$s_total_money;?>" style="border:0px; text-align: right;" readonly >
元 (本列自動計算)</font><br />
<font color=blue>※補助學校發展教育特色-申請補助經費：<?=($school_year+1);?>年度：<input type="text" size="6" name="s_total_money_ny1" value="<?=$s_total_money_ny1;?>" style="border:0px; text-align: right;" readonly >
元 (本列自動計算)</font><br />
<font color=blue>※補助學校發展教育特色-申請補助經費：<?=($school_year+2);?>年度：<input type="text" size="6" name="s_total_money_ny2" value="<?=$s_total_money_ny2;?>" style="border:0px; text-align: right;" readonly >
元 (本列自動計算)</font><br />
說明：分校分班最高核列6萬元，12班以下最高核列8萬元，13班以上最高核列2項特色，每項最高8萬元；設備採購單價一萬元以上者，始列入資本門；<font color="red">鐘點費(含補充保費)，金額會自動計入額外2%金額</font>。
<p>
※貴校班級數為 <?=$class_total;?> 班，全校學生人數 <?=$student;?> 人，您最多可以申請 <?=($class_total < $keyClasses)?"1":"2"?> 項特色補助。<br />
※申請<input type="text" size="6" name="p_num" value="<?=$p_num;?>" >項特色
<p>
<table border="0">
	<tr>
		<td nowrap="nowrap" style="text-align:right; vertical-align:top;">※特色一：</td>
		<td><input type="text" size="20" name="p1_name" value="<?=$p1_name;?>" >(特色名稱)
			，參加學生人數<input type="text" size="6" name="s_p1_student" value="<?=$s_p1_student;?>" onChange="js:target_per('p1',this);">人
			，其中含目標學生<input type="text" size="6" name="s_p1_target" value="<?=$s_p1_target;?>" onChange="js:target_per('p1',this);">人
			，目標學生佔參加學生<input type="text" size="6" name="s_p1_per" value="<?=$s_p1_per;?>" style="border:0px; text-align: right;" readonly >%。</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="checkbox" name="p1_IsContinue" value="Y" <?=($p1_IsContinue == "Y")?"checked":"";?> >本特色為延續性辦理，
			本年度為第<input type="text" size="2" name="p1_ContinueYear" value="<?=$p1_ContinueYear;?>" >年辦理。
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" colspan="2">
			<?=$school_year;?>年度：<font color=blue>經費<input type="text" size="6" name="s_p1_money" value="<?=$s_p1_money;?>" style="border:0px; text-align: right;" readonly>元
			(含經常門經費<input type="text" size="6" name="s_p1_current_money" value="<?=$s_p1_current_money;?>" style="border:0px; text-align: right;" readonly >元，
			資本門經費<input type="text" size="6" name="s_p1_capital_money" value="<?=$s_p1_capital_money;?>" style="border:0px; text-align: right;" readonly >元)</font>
		</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
	<tr>
		<td colspan="9" align="left"  bgcolor="#99CC66"  style="font-size:14px;">特色一經費概算：</td>
		</tr>
	<tr>
		<td width="10px" align="left" bgcolor="#99CCCC">項次</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">科目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">類別</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">項目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">說明</td>
	</tr>
<?
	//顯示特色一 細項
	print_item($a2_table_name_item, 'p1_'.$school_year, $main_seq);
	
?>
</table>
<p>
<table border="0">
	<tr>
		<td nowrap="nowrap" colspan="2">
			<?=($school_year+1);?>年度：<font color=blue>經費<input type="text" size="6" name="s_p1_money_ny1" value="<?=$s_p1_money_ny1;?>" style="border:0px; text-align: right;" readonly>元
			(含經常門經費<input type="text" size="6" name="s_p1_current_money_ny1" value="<?=$s_p1_current_money_ny1;?>" style="border:0px; text-align: right;" readonly >元，
			資本門經費<input type="text" size="6" name="s_p1_capital_money_ny1" value="<?=$s_p1_capital_money_ny1;?>" style="border:0px; text-align: right;" readonly >元)</font>
		</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
	<tr>
		<td colspan="9" align="left" style="font-size:14px;">
			<input type="button" value="點此複製<?=$school_year;?>年度經費概算表" onClick="js:copy_data('p1','<?=$school_year;?>','<?=($school_year+1);?>')">
		</td>
	</tr>
	<tr>
		<td colspan="9" align="left"  bgcolor="#99CC66"  style="font-size:14px;">特色一經費概算：</td>
	</tr>
	<tr>
		<td width="10px" align="left" bgcolor="#99CCCC">項次</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">科目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">類別</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">項目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">說明</td>
	</tr>
<?
	//顯示特色一 細項
	print_item($a2_table_name_item, 'p1_'.($school_year+1), $main_seq);
	
?>
</table>
<p>
<table border="0">
	<tr>
		<td nowrap="nowrap" colspan="2">
			<?=($school_year+2);?>年度：<font color=blue>經費<input type="text" size="6" name="s_p1_money_ny2" value="<?=$s_p1_money_ny2;?>" style="border:0px; text-align: right;" readonly>元
			(含經常門經費<input type="text" size="6" name="s_p1_current_money_ny2" value="<?=$s_p1_current_money_ny2;?>" style="border:0px; text-align: right;" readonly >元，
			資本門經費<input type="text" size="6" name="s_p1_capital_money_ny2" value="<?=$s_p1_capital_money_ny2;?>" style="border:0px; text-align: right;" readonly >元)</font>
		</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
	<tr>
		<td colspan="9" align="left" style="font-size:14px;">
			<input type="button" value="點此複製<?=$school_year;?>年度經費概算表" onClick="js:copy_data('p1','<?=$school_year;?>','<?=($school_year+2);?>')">
		</td>
	</tr>
	<tr>
		<td colspan="9" align="left"  bgcolor="#99CC66"  style="font-size:14px;">特色一經費概算：</td>
		</tr>
	<tr>
		<td width="10px" align="left" bgcolor="#99CCCC">項次</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">科目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">類別</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">項目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">說明</td>
	</tr>
<?
	//顯示特色一 細項
	print_item($a2_table_name_item, 'p1_'.($school_year+2), $main_seq);
	
?>
</table>
<p>
<? if($class_total < $keyClasses) echo "<!--"; ?>
<table border="0">
	<tr>
		<td nowrap="nowrap" style="text-align:right; vertical-align:top;">※特色二：</td>
		<td><input type="text" size="20" name="p2_name" value="<?=$p2_name;?>" >(特色名稱)
			，參加學生人數<input type="text" size="6" name="s_p2_student" value="<?=$s_p2_student;?>" onChange="js:target_per('p2',this);">人
			，其中含目標學生<input type="text" size="6" name="s_p2_target" value="<?=$s_p2_target;?>" onChange="js:target_per('p2',this);">人
			，目標學生佔參加學生<input type="text" size="6" name="s_p2_per" value="<?=$s_p2_per;?>" style="border:0px; text-align: right;" readonly >%。</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="checkbox" name="p2_IsContinue" value="Y" <?=($p2_IsContinue == "Y")?"checked":"";?> >本特色為延續性辦理，
			本年度為第<input type="text" size="2" name="p2_ContinueYear" value="<?=$p2_ContinueYear;?>" >年辦理。
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" colspan="2">
			<font color=blue>經費<input type="text" size="6" name="s_p2_money" value="<?=$s_p2_money;?>" style="border:0px; text-align: right;" readonly>元
			(含經常門經費<input type="text" size="6" name="s_p2_current_money" value="<?=$s_p2_current_money;?>" style="border:0px; text-align: right;" readonly >元，
			資本門經費<input type="text" size="6" name="s_p2_capital_money" value="<?=$s_p2_capital_money;?>" style="border:0px; text-align: right;" readonly >元)</font>
		</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
	<tr>
		<td colspan="9" align="left" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;">特色二經費概算：</td>
		</tr>
	<tr>
		<td width="10px" align="left" bgcolor="#99CCCC">項次</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">科目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">類別</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">項目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">說明</td>
	</tr>
<?
	//顯示特色二 細項
	print_item($a2_table_name_item, 'p2_'.$school_year, $main_seq);
	
?>
</table>
<p>
<table border="0">
	<tr>
		<td nowrap="nowrap" colspan="2">
			<?=($school_year+1);?>年度：<font color=blue>經費<input type="text" size="6" name="s_p2_money_ny1" value="<?=$s_p2_money_ny1;?>" style="border:0px; text-align: right;" readonly>元
			(含經常門經費<input type="text" size="6" name="s_p2_current_money_ny1" value="<?=$s_p2_current_money_ny1;?>" style="border:0px; text-align: right;" readonly >元，
			資本門經費<input type="text" size="6" name="s_p2_capital_money_ny1" value="<?=$s_p2_capital_money_ny1;?>" style="border:0px; text-align: right;" readonly >元)</font>
		</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
	<tr>
		<td colspan="9" align="left" style="font-size:14px;">
			<input type="button" value="點此複製<?=$school_year;?>年度經費概算表" onClick="js:copy_data('p2','<?=$school_year;?>','<?=($school_year+1);?>')">
		</td>
	</tr>
	<tr>
		<td colspan="9" align="left" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;">特色二經費概算：</td>
		</tr>
	<tr>
		<td width="10px" align="left" bgcolor="#99CCCC">項次</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">科目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">類別</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">項目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">說明</td>
	</tr>
<?
	//顯示特色二 細項
	print_item($a2_table_name_item, 'p2_105', $main_seq);
	
?>
</table>
<p>
<table border="0">
	<tr>
		<td nowrap="nowrap" colspan="2">
			<?=($school_year+2);?>年度：<font color=blue>經費<input type="text" size="6" name="s_p2_money_ny2" value="<?=$s_p2_money_ny2;?>" style="border:0px; text-align: right;" readonly>元
			(含經常門經費<input type="text" size="6" name="s_p2_current_money_ny2" value="<?=$s_p2_current_money_ny2;?>" style="border:0px; text-align: right;" readonly >元，
			資本門經費<input type="text" size="6" name="s_p2_capital_money_ny2" value="<?=$s_p2_capital_money_ny2;?>" style="border:0px; text-align: right;" readonly >元)</font>
		</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
	<tr>
		<td colspan="9" align="left" style="font-size:14px;">
			<input type="button" value="點此複製<?=$school_year;?>年度經費概算表" onClick="js:copy_data('p2','<?=$school_year;?>','<?=($school_year+2);?>')">
		</td>
	</tr>
	<tr>
		<td colspan="9" align="left" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;">特色二經費概算：</td>
		</tr>
	<tr>
		<td width="10px" align="left" bgcolor="#99CCCC">項次</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">科目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">類別</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">項目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">說明</td>
	</tr>
<?
	//顯示特色二 細項
	print_item($a2_table_name_item, 'p2_106', $main_seq);
	
?>
</table>
<? if($class_total < $keyClasses) echo "-->"; ?>

<p>
下載：<a href="/edu/modules/xSchoolForm/download/A0-1空白計畫範本.doc" target="_new">空白計畫範本</a><br />
說明：確認送出後，請於學校入口「上傳檔案專區」上傳「補助學校發展教育特色計畫」檔案。
<p>
<input type="hidden" name="main_seq" value="<?=$main_seq;?>">
<input type="hidden" name="school_year" value="<?=$school_year;?>">
<input type="button" value="上一頁(不儲存)" onClick="history.go(-1)">
<input type="submit" name="button" value="儲存並回上一頁" >

<script language="JavaScript">
	//檢查空值
	function toCheck() 
	{
		//驗證輸入的資料是否為數字 
		var regex = /^[0-9]*$/;
		var flag = 1;
		var errmsg = "";
		
		if (document.form.p_num.value == "") 
		{
			errmsg += "請填寫「發展特色申請項目數量」！\n";
			document.form.p_num.focus();
			flag = 0;
		}
		//申請項目數檢核
		if(<?=$class_total;?> < <?=$keyClasses;?> )
		{
			if(document.form.p_num.value > 1 )
			{
				errmsg += '申請項目超過可申請上限！\n'; 
				document.form.p_num.focus();
				flag = 0;
			}
		}
		else
		{
			if(document.form.p_num.value > 2 )
			{
				errmsg += '申請項目超過可申請上限！\n'; 
				document.form.p_num.focus();
				flag = 0;
			}
		}
	
		if ( document.form.p1_name.value == "" ) 
		{
			errmsg += "請填寫「優先申請特色一申請項目名稱」！\n";
			document.form.p1_name.focus();
			flag = 0;
		}
		if (document.getElementsByName('s_p1_student')[0].value == "" ) 
		{
			errmsg += "請填寫特色一的「參加學生人數」！\n";
			document.getElementsByName('s_p1_student')[0].focus();
			flag = 0;
		}
		if (document.getElementsByName('s_p1_target')[0].value == "" ) 
		{
			errmsg += "請填寫特色一的「目標學生人數」！\n";
			document.getElementsByName('s_p1_target')[0].focus();
			flag = 0;
		}
		if ( document.form.s_p1_money.value > 80000) 
		{
			errmsg += '特色一申請金額超過可申請上限！\n';
			flag = 0;
		}
		if(document.form.p1_IsContinue.checked == true && document.form.p1_ContinueYear.value == '')
		{
			errmsg += "特色一為延續性辦理，請填寫「延續年分」！\n";
			document.form.p1_ContinueYear.focus();
			flag = 0;
		}
		if(document.getElementsByName('p1_IsContinue')[0].checked == false)
		{
			var p1_ny1 = document.getElementsByName('s_p1_money_ny1')[0].value;
			var p1_ny2 = document.getElementsByName('s_p1_money_ny2')[0].value;
			
			if(p1_ny1 == '0' || p1_ny1 == '' || p1_ny2 == '0' || p1_ny2 == '')
			{
				errmsg += "特色一為「非延續性辦理」，請一次填寫三年的概算表！\n";
				flag = 0;
			}
			
		}
		
		//特色二的項目存在才驗證
		var s_p_money = document.getElementsByName('s_p2_money')[0]; 
		if(s_p_money != null)
		{
			if(document.form.p2_name.value == "") 
			{
				errmsg += "請填寫「特色二申請項目名稱」，若不申請請填「無」。\n";
				document.form.p2_name.focus();
				flag = 0;
			}
			if(document.form.p2_name.value != "" && document.form.p2_name.value != "無")
			{
				if(document.getElementsByName('s_p2_student')[0].value == "" ) 
				{
					errmsg += "請填寫特色二的「參加學生人數」！\n";
					document.getElementsByName('s_p2_student')[0].focus();
					flag = 0;
				}
				if(document.getElementsByName('s_p2_target')[0].value == "" ) 
				{
					errmsg += "請填寫特色二的「目標學生人數」！\n";
					document.getElementsByName('s_p2_target')[0].focus();
					flag = 0;
				}
				if( document.form.s_p2_money.value > 80000) 
				{
					errmsg += '特色二申請金額超過可申請上限！\n';
					flag = 0;
				}	
				if(document.form.p2_IsContinue.checked == true && document.form.p2_ContinueYear.value == '')
				{
					errmsg += "特色二為延續性辦理，請填寫「延續年分」！\n";
					document.form.p1_ContinueYear.focus();
					flag = 0;
				}
				
				if(document.getElementsByName('p2_IsContinue')[0].checked == false && document.form.p2_name.value != '無')
				{
					var p2_ny1 = document.getElementsByName('s_p2_money_ny1')[0].value;
					var p2_ny2 = document.getElementsByName('s_p2_money_ny2')[0].value;
					
					if(p2_ny1 == '0' || p2_ny1 == '' || p2_ny2 == '0' || p2_ny2 == '')
					{
						errmsg += "特色二為「非延續性辦理」，請一次填寫三年的概算表，不申請請填「無」。\n";
						flag = 0;
					}
					
				}
			}
		}
						
		if (flag == 0)
		{
			alert(errmsg);
			return false;
		}
		else
		{
			return true;
		}
	}

	//計算單一項目的金額
	function Count(obj, item_idx) 
	{
		//alert(obj.name);
		//取得控制項
		var p = left(obj.name, 6);
		var opt_subject = document.getElementById(p + '_opt_subject_' + item_idx); //科目
		var opt_category = document.getElementById(p + '_opt_category_' + item_idx); //類別
		var item = document.getElementsByName(p + '_item_' + item_idx)[0]; //項目
		var unit = document.getElementsByName(p + '_unit_' + item_idx)[0]; //單位
		var price = document.getElementsByName(p + '_price_' + item_idx)[0]; //單價
		var amount = document.getElementsByName(p + '_amount_' + item_idx)[0]; //數量
		var s_money = document.getElementsByName(p + '_s_money_' + item_idx)[0]; //金額
			
		//驗證輸入的資料是否為數字 
		var regex = /^[0-9]*$/;
		var flag = 1;
		
		//驗證分成兩部分
		//1.填寫 科目 類別 項目 單位
		//2.填寫 單價 數量
		switch (obj.name)
		{
			case opt_subject.name: //資本門時才需驗證
				if(opt_subject.value == '資本門' && regex.test(price.value) && price.value < 10000 && price.value != '')
				{
					alert('資本門的「單價」需為一萬元以上。'); 
					price.value = '';
					s_money.value = '';
					flag = 0;
				}
			case opt_category.name:
			
			case item.name:
				if(item.value.match("雜支") != null)
				{
					alert('不可直接填寫雜支，請在表單下方勾選。');
					item.value = "";
					flag = 0;
				}
				if(item.value.indexOf("外聘") > -1)
				{
					price.value = 400;
				}
				
			case unit.name:
				//6個欄位有一個為空值就不計算
				if(opt_subject.value == '' || opt_category.value == '' || item.value == '' || unit.value == '' || amount.value == '' || price.value == '')
				{
					s_money.value = ''; //清空金額欄位
					flag = 0;
				}
				
				break;
				
			case price.name:
			case amount.name:
				if (!(regex.test(price.value)))
				{
					alert('「單價」請輸入整數。');
					price.value = '';
					s_money.value = '';
					price.focus();
					flag = 0;
				}
				if(opt_subject.value == '資本門' && regex.test(price.value) && price.value < 10000 && price.value != '')
				{
					alert('資本門的「單價」需為一萬元以上。'); 
					price.value = "";
					s_money.value = '';
					flag = 0;
				}
			
				if (!(regex.test(amount.value)))
				{
					alert('「數量」請輸入整數。');
					amount.value = '';
					s_money.value = '';
					amount.focus();
					flag = 0;
				}				
				if(amount.value == '' || price.value == '') //空白時不計算 不顯訊息
				{
					s_money.value = '';
					flag = 0;
				}
				if(opt_subject.value == '' || opt_category.value == '' || item.value == '' || unit.value == '')
				{
					s_money.value = ''; //清空金額欄位
					flag = 0;
				
					if(price.value != '' && amount.value != '') //單價 數量 都有填才顯示警告訊息
						alert('「科目」、「類別」、「項目」、「單位」不能為空白。');
				}
				
				break;
		}
		
		if(flag == 1)
		{
			if(item.value.indexOf("外聘") > -1)
			{
				price.value = 400;
			}
			s_money.value = parseInt(price.value) * parseInt(amount.value); //單價 * 數量
			
			if(opt_category.value == '鐘點費(含補充保費)')
				s_money.value = Math.ceil(parseInt(s_money.value) * 1.02) //無條件進位
		}
		
		//計算雜支
		chkbox(document.getElementsByName(p + '_item_10')[0]);
		
	}
	
	//計算雜支
	function chkbox(obj)
	{
		var p = left(obj.name, 6);
		var s_money_10 = document.getElementsByName(p + '_s_money_10')[0]; //第10項的金額控制項
		
		if (obj.checked == false)
		{
			s_money_10.value = ""; //沒選就清空金額
		}
		else
		{
			var opt_subject, s_money;
			var i;
			var total = 0;
			
			//把1~9項金額加總
			for(i = 1;i < 10;i++)
			{
				opt_subject = document.getElementById(p + '_opt_subject_' + i); //科目
				opt_category = document.getElementById(p + '_opt_category_' + i); //類別
				s_money = document.getElementsByName(p + '_s_money_' + i)[0]; //金額
				
				//雜支
				if(opt_subject.value == '經常門' && s_money.value != '')
					total += parseInt(s_money.value);
		
			}
			
			s_money_10.value = parseInt(total * 0.06);
			
		}
		
		count_all();
	}
	
	//計算總金額
	function count_all()
	{
		var s_total_money = document.getElementsByName('s_total_money')[0]; //總金額
		var s_total_money_ny1 = document.getElementsByName('s_total_money_ny1')[0]; //總金額
		var s_total_money_ny2 = document.getElementsByName('s_total_money_ny2')[0]; //總金額
	
		s_total_money.value = 0;
		s_total_money_ny1.value = 0;
		s_total_money_ny2.value = 0;
		
		var i,j,k;
		var school_year = <?=$school_year;?>;
		
		for(i = 1;i < 10;i++)
		{
			for(k = school_year;k <= school_year+2;k++)
			{
				if(k == 104)
				{
					var s_p_money = document.getElementsByName('s_p' + i + '_money')[0]; //ex.s_p1_money ,s_p2_money
					var s_p_current_money = document.getElementsByName('s_p' + i + '_current_money')[0]; //ex.s_p1_current_money 
					var s_p_capital_money = document.getElementsByName('s_p' + i + '_capital_money')[0]; //ex.s_p1_capital_money
				}
				else if(k == 105)
				{
					var s_p_money = document.getElementsByName('s_p' + i + '_money_ny1')[0]; //ex.s_p1_money ,s_p2_money
					var s_p_current_money = document.getElementsByName('s_p' + i + '_current_money_ny1')[0]; //ex.s_p1_current_money 
					var s_p_capital_money = document.getElementsByName('s_p' + i + '_capital_money_ny1')[0]; //ex.s_p1_capital_money
				}
				else if(k == 106)
				{
					var s_p_money = document.getElementsByName('s_p' + i + '_money_ny2')[0]; //ex.s_p1_money ,s_p2_money
					var s_p_current_money = document.getElementsByName('s_p' + i + '_current_money_ny2')[0]; //ex.s_p1_current_money 
					var s_p_capital_money = document.getElementsByName('s_p' + i + '_capital_money_ny2')[0]; //ex.s_p1_capital_money
				}
						
				if(s_p_money != null)
				{
					var current_money = 0;
					var capital_money = 0;
					
					for(j = 1;j <= 10;j++) //計算各特色經常 & 資本
					{
						var opt_subject = document.getElementById('p' + i + '_' + k + '_opt_subject_' + j); //科目
						var s_money = document.getElementsByName('p' + i + '_' + k + '_s_money_' + j)[0]; //金額
						
						if(s_money.value != '' && opt_subject.value == '經常門')
							current_money += parseInt(s_money.value);
						
						if(s_money.value != '' && opt_subject.value == '資本門')
							capital_money += parseInt(s_money.value);
					}
					
					s_p_money.value = parseInt(current_money) + parseInt(capital_money); //各特色的經常 + 資本
					s_p_current_money.value = current_money; //各特色的經常門金額
					s_p_capital_money.value = capital_money; //各特色的資本門金額

					if(k == 104)
					{
						s_total_money.value = parseInt(s_total_money.value) + parseInt(s_p_money.value); //所有特色的總和
					}
					else if(k == 105)
					{
						s_total_money_ny1.value = parseInt(s_total_money_ny1.value) + parseInt(s_p_money.value); //所有特色的總和
					}
					else if(k == 106)
					{
						s_total_money_ny2.value = parseInt(s_total_money_ny2.value) + parseInt(s_p_money.value); //所有特色的總和
					}
					
				}
			
			}
		}
		
	}
	
	//複製概算表
	function copy_data(p, s_sy, t_sy) //p = 特色1 2  s_sy = 從此年度複製  t_sy = 複製到此年度
	{
		if(confirm("複製後將會覆蓋原本資料，確定要複製嗎？"))
		{
			//alert("y");
			var i;
			var ps, pt;
			
			ps = p + '_' + s_sy;
			pt = p + '_' + t_sy;
			/*
			var opt_subject = document.getElementById(p + '_opt_subject_' + item_idx); //科目
			var opt_category = document.getElementById(p + '_opt_category_' + item_idx); //類別
			var item = document.getElementsByName(p + '_item_' + item_idx)[0]; //項目
			var unit = document.getElementsByName(p + '_unit_' + item_idx)[0]; //單位
			var price = document.getElementsByName(p + '_price_' + item_idx)[0]; //單價
			var amount = document.getElementsByName(p + '_amount_' + item_idx)[0]; //數量
			var s_money = document.getElementsByName(p + '_s_money_' + item_idx)[0]; //金額*/
			
			for(i = 1;i <= 10;i++)
			{
				if(i != 10)
				{
					//複製科目
					document.getElementById(pt + '_opt_subject_' + i).selectedIndex = document.getElementById(ps + '_opt_subject_' + i).selectedIndex;
					//先設定下拉選單，再複製類別
					change_subject(document.getElementById(pt + '_opt_subject_' + i), i, 0);
					document.getElementById(pt + '_opt_category_' + i).selectedIndex = document.getElementById(ps + '_opt_category_' + i).selectedIndex;
					
					document.getElementsByName(pt + '_item_' + i)[0].value = document.getElementsByName(ps + '_item_' + i)[0].value; //項目
					document.getElementsByName(pt + '_unit_' + i)[0].value = document.getElementsByName(ps + '_unit_' + i)[0].value; //單位
					document.getElementsByName(pt + '_price_' + i)[0].value = document.getElementsByName(ps + '_price_' + i)[0].value; //單價
					document.getElementsByName(pt + '_amount_' + i)[0].value = document.getElementsByName(ps + '_amount_' + i)[0].value; //數量
					document.getElementsByName(pt + '_s_money_' + i)[0].value = document.getElementsByName(ps + '_s_money_' + i)[0].value; //金額
					
				}
				else
				{
					document.getElementsByName(pt + '_item_' + i)[0].checked = document.getElementsByName(ps + '_item_' + i)[0].checked;
					document.getElementsByName(pt + '_s_money_' + i)[0].value = document.getElementsByName(ps + '_s_money_' + i)[0].value; //金額
					
				}
			}
			
			//重新計算金額
			count_all();
		}
		else
		{
			//alert("n");
		}
	}
	
	//計算目標學生佔參加學生百分比
	function target_per(p, obj)
	{
		var student = document.getElementsByName('s_' + p + '_student')[0];
		var target = document.getElementsByName('s_' + p + '_target')[0];
		var per = document.getElementsByName('s_' + p + '_per')[0];
		
		var str;
		if(p == 'p1')
			str = "特色一";
		else
			str = "特色二";
		
		//驗證輸入的資料是否為數字 
		var regex = /^[0-9]*$/;
		var flag = 1;
		var errmsg = "";
		
		if (!(regex.test(student.value)))
		{
			errmsg += str + '的「參加學生人數」須為正整數\n';
			flag = 0;
		}
		if (!(regex.test(student.value)))
		{
			errmsg += str + '的「目標學生人數」須為正整數\n';
			flag = 0;
		}
		if (flag == 0)
		{
			alert(errmsg);
			per.value = "";
			return false;
		}
		
		if(student != '' && target != '')
		{	
			if(parseInt(student.value) < parseInt(target.value))
			{
				obj.value = '';
				per.value = '';
				alert(str + '的「參加學生人數」不可小於「目標學生人數」');
			}
			else
			{
				var x;
				x = target.value / student.value * 100;
				per.value = x.toFixed(2);
			}
		}
	}
		
	//設定預設值
	function set_default() 
	{
		/*
		//alert('onload');
		if(document.getElementsByName("p1_seq_no_1")[0].value == '')
		{
			var obj_subject = document.getElementById('p1_opt_subject_1'); //科目
			var obj_category = document.getElementById('p1_opt_category_1'); //類別
			var obj_unit = document.getElementsByName('p1_unit_1')[0]; //單位
			//設定科目
			obj_subject.options[1].selected = true; //經常門
			//產生 科目對應的類別下拉選單
			change_subject(obj_subject, 1, 0); 
			//設定類別
			obj_category.options[1].selected = true;  //鐘點費
			obj_unit.value = '節';
		}
		
		if(document.getElementsByName("p2_seq_no_1")[0] != null)
		{
			if(document.getElementsByName("p2_seq_no_1")[0].value == '')
			{
				var obj_subject = document.getElementById('p2_opt_subject_1'); //科目
				var obj_category = document.getElementById('p2_opt_category_1'); //類別
				var obj_unit = document.getElementsByName('p2_unit_1')[0]; //單位
				//設定科目
				obj_subject.options[1].selected = true; 
				//產生 科目對應的類別下拉選單
				change_subject(obj_subject, 1, 0); 
				//設定類別
				obj_category.options[1].selected = true;
				obj_unit.value = '節';
			}
		}
		*/
	}
	
	//設定下拉選單
	function change_subject(obj, idx, YN)
	{
		var selectName=obj.options[obj.selectedIndex].text;
		NewOpt = new Array;

		if (selectName == ""){
			NewOpt[0] = new Option("");
		}

		if (selectName == "經常門")	{
			NewOpt[0] = new Option("");
			NewOpt[1] = new Option("鐘點費");
			NewOpt[2] = new Option("鐘點費(含補充保費)");
			NewOpt[3] = new Option("器材購置");
			NewOpt[4] = new Option("器材維護");
			NewOpt[5] = new Option("教材");
			NewOpt[6] = new Option("道具");
			NewOpt[7] = new Option("硬體設備");			
			//NewOpt[8] = new Option("加班費");
			NewOpt[8] = new Option("其他");
		}

		if (selectName == "資本門"){
			NewOpt[0] = new Option("");
			NewOpt[1] = new Option("器材購置");
			NewOpt[2] = new Option("器材維護");
			NewOpt[3] = new Option("硬體設備");
			NewOpt[4] = new Option("其他");
		}

		newnum = NewOpt.length;
		
		var p = left(obj.id,6); //取得p1_XXX or p2_XXX
		
		var opt_category = document.getElementById(p + '_opt_category_' + idx)

		// 清除之前下拉選單中的項目
		opt_category.options.length = 0;
		
		// 加入新選類別的項目
		for (i = 0; i < newnum; i++) opt_category.options[i] = NewOpt[i];

		opt_category.options[0].selected = true;
		
		//page load 時不計算總金額
		if(YN == '1')
			Count(obj, idx); //變換項目後計算總金額
	}
	
	//取得左N位
	function left(mainStr,n) 
	{ 
		return mainStr.substring(0,n);
	} 
	
	// 左邊補0
	function padLeft(str,lenght)
	{
		if(str.length >= lenght)
			return str;
		else
			return padLeft("0" + str,lenght);
	}
	
</script>
</form>
</body>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>