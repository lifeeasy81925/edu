<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	include "checkdate_city.php";

	include "../../function/config_for_104.php"; //本年度基本設定
	
	$account = ($_POST['account'] == '')?$_GET['id']:$_POST['account']; //取回傳遞來的學校編號，get為測試用
	
	$table_name = $a2_table_name;
	$table_name_item = $table_name.'_item';
	$a_num = 'a2';

	$keyClasses = '13'; // 設定可申請特色二的最少班級數

	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   //補二資料
		   "      , $a_num.* ".
		   		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join $table_name as $a_num on sy.seq_no = $a_num.sy_seq ".
		   " where sy.school_year = '$school_year' ". 
		   "   and sd.account = '$account' ";
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
		$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
		$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];
		$s_p2_money = ($row['s_p2_money'] == '')?0:$row['s_p2_money'];
		$s_p2_current_money = ($row['s_p2_current_money'] == '')?0:$row['s_p2_current_money'];
		$s_p2_capital_money = ($row['s_p2_capital_money'] == '')?0:$row['s_p2_capital_money'];
		
		$s_total_money_ny1 = ($row['s_total_money_ny1'] == '')?0:$row['s_total_money_ny1']; //NULL則填入0
		$s_p1_money_ny1 = ($row['s_p1_money_ny1'] == '')?0:$row['s_p1_money_ny1']; //NULL則填入0
		$s_p1_current_money_ny1 = ($row['s_p1_current_money_ny1'] == '')?0:$row['s_p1_current_money_ny1'];
		$s_p1_capital_money_ny1 = ($row['s_p1_capital_money_ny1'] == '')?0:$row['s_p1_capital_money_ny1'];
		$s_p2_money_ny1 = ($row['s_p2_money_ny1'] == '')?0:$row['s_p2_money_ny1'];
		$s_p2_current_money_ny1 = ($row['s_p2_current_money_ny1'] == '')?0:$row['s_p2_current_money_ny1'];
		$s_p2_capital_money_ny1 = ($row['s_p2_capital_money_ny1'] == '')?0:$row['s_p2_capital_money_ny1'];
		
		$s_total_money_ny2 = ($row['s_total_money_ny2'] == '')?0:$row['s_total_money_ny2']; //NULL則填入0
		$s_p1_money_ny2 = ($row['s_p1_money_ny2'] == '')?0:$row['s_p1_money_ny2']; //NULL則填入0
		$s_p1_current_money_ny2 = ($row['s_p1_current_money_ny2'] == '')?0:$row['s_p1_current_money_ny2'];
		$s_p1_capital_money_ny2 = ($row['s_p1_capital_money_ny2'] == '')?0:$row['s_p1_capital_money_ny2'];
		$s_p2_money_ny2 = ($row['s_p2_money_ny2'] == '')?0:$row['s_p2_money_ny2'];
		$s_p2_current_money_ny2 = ($row['s_p2_current_money_ny2'] == '')?0:$row['s_p2_current_money_ny2'];
		$s_p2_capital_money_ny2 = ($row['s_p2_capital_money_ny2'] == '')?0:$row['s_p2_capital_money_ny2'];
		
		$city_total_money = ($row['city_total_money'] == '')?$s_total_money:$row['city_total_money']; //NULL則填入學校資料
		$city_p1_money = ($row['city_p1_money'] == '')?$s_p1_money:$row['city_p1_money']; 
		$city_p1_current_money = ($row['city_p1_current_money'] == '')?$s_p1_current_money:$row['city_p1_current_money'];
		$city_p1_capital_money = ($row['city_p1_capital_money'] == '')?$s_p1_capital_money:$row['city_p1_capital_money'];
		$city_p2_money = ($row['city_p2_money'] == '')?$s_p2_money:$row['city_p2_money'];
		$city_p2_current_money = ($row['city_p2_current_money'] == '')?$s_p2_current_money:$row['city_p2_current_money'];
		$city_p2_capital_money = ($row['city_p2_capital_money'] == '')?$s_p2_capital_money:$row['city_p2_capital_money'];
		
		$city_total_money_ny1 = ($row['city_total_money_ny1'] == '')?$s_total_money_ny1:$row['city_total_money_ny1']; //NULL則填入學校資料
		$city_p1_money_ny1 = ($row['city_p1_money_ny1'] == '')?$s_p1_money_ny1:$row['city_p1_money_ny1']; 
		$city_p1_current_money_ny1 = ($row['city_p1_current_money_ny1'] == '')?$s_p1_current_money_ny1:$row['city_p1_current_money_ny1'];
		$city_p1_capital_money_ny1 = ($row['city_p1_capital_money_ny1'] == '')?$s_p1_capital_money_ny1:$row['city_p1_capital_money_ny1'];
		$city_p2_money_ny1 = ($row['city_p2_money_ny1'] == '')?$s_p2_money_ny1:$row['city_p2_money_ny1'];
		$city_p2_current_money_ny1 = ($row['city_p2_current_money_ny1'] == '')?$s_p2_current_money_ny1:$row['city_p2_current_money_ny1'];
		$city_p2_capital_money_ny1 = ($row['city_p2_capital_money_ny1'] == '')?$s_p2_capital_money_ny1:$row['city_p2_capital_money_ny1'];
		
		$city_total_money_ny2 = ($row['city_total_money_ny2'] == '')?$s_total_money_ny2:$row['city_total_money_ny2']; //NULL則填入學校資料
		$city_p1_money_ny2 = ($row['city_p1_money_ny2'] == '')?$s_p1_money_ny2:$row['city_p1_money_ny2']; 
		$city_p1_current_money_ny2 = ($row['city_p1_current_money_ny2'] == '')?$s_p1_current_money_ny2:$row['city_p1_current_money_ny2'];
		$city_p1_capital_money_ny2 = ($row['city_p1_capital_money_ny2'] == '')?$s_p1_capital_money_ny2:$row['city_p1_capital_money_ny2'];
		$city_p2_money_ny2 = ($row['city_p2_money_ny2'] == '')?$s_p2_money_ny2:$row['city_p2_money_ny2'];
		$city_p2_current_money_ny2 = ($row['city_p2_current_money_ny2'] == '')?$s_p2_current_money_ny2:$row['city_p2_current_money_ny2'];
		$city_p2_capital_money_ny2 = ($row['city_p2_capital_money_ny2'] == '')?$s_p2_capital_money_ny2:$row['city_p2_capital_money_ny2'];
		
		$city_desc = $row['city_desc'];
		$city_desc_ny1 = $row['city_desc_ny1'];
		$city_desc_ny2 = $row['city_desc_ny2'];
		$city_desc_p2 = $row['city_desc_p2'];
		$city_desc_ny1_p2 = $row['city_desc_ny1_p2'];
		$city_desc_ny2_p2 = $row['city_desc_ny2_p2'];
		$city_approved = $row['city_approved'];
								
		$lastyear_leaving = ($row['lastyear_leaving'] == '')?0:$row['lastyear_leaving']; 
		$page1_warning = $row['page1_warning'];
		$page1_desc = $row['page1_desc'];
		$page2_warning = $row['page2_warning'];
		$page2_desc = $row['page2_desc'];
		$page3_warning = $row['page3_warning'];
		$page3_desc = $row['page3_desc'];
		
		$accord_point = $row['accord_point']; //符合的指標
		$accord_point_ary = explode(",",$accord_point);
		
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
			$city_money = ($row['city_money'] == '')?$s_money:$row['city_money'];
			//$city_delete = ($row['city_delete'] == '')?0:$row['city_delete'];
			//修正加總錯誤
			if($city_money > $s_money)
				$city_money = $s_money;
			$city_delete = $s_money - $city_money;

			$s1 = array("","經常門","資本門");
			$s3 = array(""=>array("")
					 , "經常門"=>array("","鐘點費","鐘點費(含補充保費)","器材購置","器材維護","教材","道具","硬體設備","加班費","其他")
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
				echo "<select name='".$p."_category_$idx' id='".$p."_opt_category_$idx' size='1' >";
				for($j = 0;$j < count($s3[$subject]);$j++)
				{
					echo "	<option ".($category == $s3[$subject][$j]?"selected":"")." >".$s3[$subject][$j]."</option>";
				}
				echo "</select></td>";
				echo "<td align='left'><input type='text' size='10' name='".$p."_item_$idx' value='$item' style='border:0px; text-align: left;' readonly ></td>";
				echo "<td align='left'><input type='text' size='2' name='".$p."_unit_$idx' value='$unit' style='border:0px; text-align: left;' readonly ></td>";
				echo "<td align='left'><input type='text' size='4' name='".$p."_price_$idx' value='$price' style='border:0px; text-align: left;' readonly ></td>";
				echo "<td align='left'><input type='text' size='2' name='".$p."_amount_$idx' value='$amount' style='border:0px; text-align: left;' readonly ></td>";
				echo "<td align='left'><input type='text' size='4' name='".$p."_s_money_$idx' value='$s_money' style='border:0px; text-align: left;' readonly ></td>";
				echo "<td align='left'><input type='text' size='6' name='".$p."_s_desc_$idx' value='$s_desc' style='border:0px; text-align: left;' readonly ></td>";
				echo "<td align='left'><input type='text' size='6' name='".$p."_city_money_$idx' value='$city_money' onChange='js:Count(this,$idx);'></td>";
				echo "<td align='left'><input type='text' size='6' name='".$p."_city_delete_$idx' value='$city_delete' style='border:0px; text-align: left;' readonly ></td>";
				echo "</tr>";
			}
			else
			{
				$has_outlay = 1;
				
				$outlay_seq_no = $seq_no;
				$outlay_subject = $subject;
				$outlay_category = $category;
				$outlay_item = $item;
				$outlay_s_money = $s_money;
				$outlay_s_desc = $s_desc;
				$outlay_city_money = ($city_money == '')?$s_money:$city_money;
				$outlay_city_delete = ($city_delete == '')?0:$city_delete;
				
			}
		}
		
		if($has_outlay == 1) //有雜支才顯示
		{
			$idx++;
			//顯示雜支
			echo "<tr>";
			echo "<td width='10' align='center' nowrap='nowrap'>$idx.<input type='hidden' name='".$p."_seq_no_$idx' value='$outlay_seq_no'></td>";
			echo "<td align='left'>"; //科目
			echo "<select name='".$p."_subject_$idx' id='".$p."_opt_subject_$idx' size='1' >";
			echo "	<option selected>$outlay_subject</option>";
			echo "</select></td>";
			echo "<td align='left'>"; //類別
			echo "<select name='".$p."_category_$idx' id='".$p."_opt_category_$idx' size='1' >";
			echo "	<option selected>$outlay_category</option>";
			echo "</select></td>";
			echo "<td align='left'><input type='checkbox' name='".$p."_item_$idx' value='Y' ".(($outlay_item == 'Y')?"checked":"")." disabled>申請雜支</td>";
			echo "<td align='left'><input type='text' size='2' name='".$p."_unit_$idx' value='' style='border:0px; text-align: left;' readonly ></td>";
			echo "<td align='left'><input type='text' size='4' name='".$p."_price_$idx' value='' style='border:0px; text-align: left;' readonly ></td>";
			echo "<td align='left'><input type='text' size='2' name='".$p."_amount_$idx' value='' style='border:0px; text-align: left;' readonly ></td>";
			echo "<td align='left'><input type='text' size='4' name='".$p."_s_money_$idx' value='$outlay_s_money' style='border:0px; text-align: left;' readonly ></td>";
			echo "<td align='left'><input type='text' size='6' name='".$p."_s_desc_$idx' value='$outlay_s_desc' style='border:0px; text-align: left;' readonly ></td>";
			echo "<td align='left'><input type='text' size='6' name='".$p."_city_money_$idx' value='$outlay_city_money' style='border:0px; text-align: left;' readonly ></td>";
			echo "<td align='left'><input type='text' size='6' name='".$p."_city_delete_$idx' value='$outlay_city_delete' style='border:0px; text-align: left;' readonly ></td>";
			echo "</tr>";
			
		}
	}
	
	$sql = "select * from school_upload_name where sy_seq = '$main_seq' ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$point2 = $row['point2'];
		$lastyear_leaving_file = $row['lastyear_leaving_file'];
		$a2_1 = $row['a2_1'];
		$a2_2 = $row['a2_2'];
	}
	
	$file_path = '/edu_upload/'.$school_year.'/'.$account.'/';
	//echo $file_path;

?> 
<body onload="set_default()">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p><b>補助項目二：補助學校發展教育特色</b>　<a href="/edu/modules/xSchoolForm/<?=$school_year;?>/allowance-02.htm" target="_blank">(補助項目說明)</a><br />
說明：分校分班最高核列6萬元，12班以下最高核列8萬元，13班以上最高核列2項特色，每項最高8萬元；設備採購單價一萬元以上者，始列入資本門。
</p>
<form name="form" method="post" action="examine_allowance_a2_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
●學校：<?=($account.' '.$schoolname);?>
<p>
<b>※符合指標：</b><a href="print_point_page.php?id=<?=$account;?>" target="_blank">點此查看詳細資料</a><br />
<? 
	//符合指標
	for($i = 0;$i < count($accord_point_ary);$i++)
	{
		switch($accord_point_ary[$i])
		{
			/*case "p1_1":
				echo  '　　　'.'指標一～（一）'.'<br />';
				break;
			case "p1_2":
				echo  '　　　'.'指標一～（二）'.'<br />';
				break;
			case "p1_3":
				echo  '　　　'.'指標一～（三）'.'<br />';
				break;
			case "p1_4":
				echo  '　　　'.'指標一～（四）'.'<br />';
				break;*/
			case "p2_1":
				echo  '　　　'.'指標二～（一）'.'<br />';
				break;
			case "p2_2":
				echo  '　　　'.'指標二～（二）'.'<br />';
				break;
			case "p2_3":
				echo  '　　　'.'指標二～（三）'.'<br />';
				break;
			/*case "p3_1":
				echo  '　　　'.'指標三～（一）'.'<br />';
				break;*/
			case "p4_1":
				echo  '　　　'.'指標四～（一）'.'<br />';
				break;
			case "p5_1":
				echo  '　　　'.'指標五～（一）'.'<br />';
				break;
			case "p5_2":
				echo  '　　　'.'指標五～（二）'.'<br />';
				break;
			case "p5_3":
				echo  '　　　'.'指標五～（三）'.'<br />';
				break;
			/*case "p6_1":
				echo  '　　　'.'指標六～（一）'.'<br />';
				break;
			case "p6_2":
				echo  '　　　'.'指標六～（二）'.'<br />';
				break;*/
		}
	}
?>
<p>
<table border="0">
	<tr>
		<td nowrap="nowrap" ><b>※歷史資料：</b></td>
	</tr>
	<tr>
		<td nowrap="nowrap" >
			<?=($school_year-1);?>年度 <a href="../103/effect_view_school_up_02.php?school=<?=$account;?>" target="_blank">執行計畫與經費</a>
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" >
			<?=($school_year-2);?>年度 <a href="../effect_102_view_02.php?school=<?=$account;?>" target="_blank">執行成果</a>
		</td>
	</tr>
</table>
<p>
<b>※申請資料與審核：</b><br />
●該校班級數為 <?=$class_total;?> 班，您最多可以申請 <?=($class_total < $keyClasses)?"1":"2"?> 項特色補助。<br />
●申請 <?=$p_num;?> 項特色
<p>
<table border="0">
	<tr>
		<td nowrap="nowrap" >※補助學校發展教育特色-申請補助經費： <?=$school_year;?>年度：<?=$s_total_money;?> 元</td>
	</tr>
	<tr style="display:<?=($s_total_money_ny1 == 0 || $s_total_money_ny1 == '')?"none":"";?>;">
		<td nowrap="nowrap" >※補助學校發展教育特色-申請補助經費： <?=($school_year+1);?>年度：<?=$s_total_money_ny1;?> 元</td>
	</tr>
	<tr style="display:<?=($s_total_money_ny2 == 0 || $s_total_money_ny2 == '')?"none":"";?>;">
		<td nowrap="nowrap" >※補助學校發展教育特色-申請補助經費： <?=($school_year+2);?>年度：<?=$s_total_money_ny2;?> 元</td>
	</tr>
	<tr>
		<td nowrap="nowrap" >
			<font color=blue>※補助學校發展特色-初審金額：<?=$school_year;?>年度：<input type="text" size="6" name="city_total_money" value="<?=$city_total_money;?>" style="border:0px; text-align: right;" readonly >元 (本列自動計算)</font>
		</td>
	</tr>
	<tr style="display:<?=($s_total_money_ny1 == 0 || $s_total_money_ny1 == '')?"none":"";?>;">
		<td nowrap="nowrap" >
			<font color=blue>※補助學校發展特色-初審金額：<?=($school_year+1);?>年度：<input type="text" size="6" name="city_total_money_ny1" value="<?=$city_total_money_ny1;?>" style="border:0px; text-align: right;" readonly >元 (本列自動計算)</font>
		</td>
	</tr>
	<tr style="display:<?=($s_total_money_ny2 == 0 || $s_total_money_ny2 == '')?"none":"";?>;">
		<td nowrap="nowrap" >
			<font color=blue>※補助學校發展特色-初審金額：<?=($school_year+2);?>年度：<input type="text" size="6" name="city_total_money_ny2" value="<?=$city_total_money_ny2;?>" style="border:0px; text-align: right;" readonly >元 (本列自動計算)</font>
		</td>
	</tr>
</table>
<p>
<table border="0">
	<tr>
		<td nowrap="nowrap" colspan="2"><b>※特色一：</b><?=$p1_name;?> &nbsp; <?=($p1_IsContinue == "Y")?"(本年度為第 ".$p1_ContinueYear." 年辦理)":"";?>
		，參加學生人數 <?=$s_p1_student;?> 人
		，其中含目標學生 <?=$s_p1_target;?> 人
		，目標學生佔參加學生 <?=$s_p1_per;?>%。</td>
	</tr>
	<tr>
		<td nowrap="nowrap" colspan="2">
		<?=$school_year;?>年度：<br />
		學校申請：經費共計 <?=$s_p1_money;?> 元，
		其中包含經常門經費 <?=$s_p1_current_money;?> 元，
		資本門經費 <?=$s_p1_capital_money;?> 元。
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" colspan="2">
			<b>初審金額：<font color=blue>經費共計<input type="text" size="6" name="city_p1_money" value="<?=$city_p1_money;?>" style="border:0px; text-align: right;" readonly>元</font>，
			其中包含經常門經費<input type="text" size="6" name="city_p1_current_money" value="<?=$city_p1_current_money;?>" style="border:0px; text-align: right;" readonly >元，
			資本門經費<input type="text" size="6" name="city_p1_capital_money" value="<?=$city_p1_capital_money;?>" style="border:0px; text-align: right;" readonly >元。
			</b>
		</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
	<tr>
		<td colspan="9" align="center" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;">特色一經費概算：學校申請</td>
		<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FFCC66"  style="font-size:14px;">縣市初審</td>
	</tr>
	<tr>
		<td width="10px" align="left" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">科目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">類別</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">項目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">說　　明</td>
		<td align="left" nowrap="nowrap" bgcolor="#FFDD66">初審金額</td>
		<td align="left" nowrap="nowrap" bgcolor="#FFDD66">刪減金額<br />自動產生</td>
	</tr>
<?
	//顯示	細項
	print_item($table_name_item, 'p1_'.$school_year, $main_seq);
	
?>
</table>
<p>
<table border="0" style="width:750px;table-layout:fixed;word-break:break-all">
	<tr>
		<td nowrap="nowrap" style="width:150px; text-align:right; vertical-align:top;"><b>※<?=$school_year;?>年度特色一<br />初審意見：</b>
		</td>
		<td nowrap="nowrap"><textarea name="city_desc" cols="55" rows="4"><?=$city_desc;?></textarea><p>
		</td>
	</tr>
</table>
<p>
<? if($s_p1_money_ny1 == 0 || $s_p1_money_ny1 == '') echo "<!--"; ?>
<table border="0">
	<tr>
		<td nowrap="nowrap" colspan="2">
		<?=($school_year+1);?>年度：<br />
		學校申請：經費共計 <?=$s_p1_money_ny1;?> 元，
		其中包含經常門經費 <?=$s_p1_current_money_ny1;?> 元，
		資本門經費 <?=$s_p1_capital_money_ny1;?> 元。
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" colspan="2">
			<b>初審金額：<font color=blue>經費共計<input type="text" size="6" name="city_p1_money_ny1" value="<?=$city_p1_money_ny1;?>" style="border:0px; text-align: right;" readonly>元</font>，
			其中包含經常門經費<input type="text" size="6" name="city_p1_current_money_ny1" value="<?=$city_p1_current_money_ny1;?>" style="border:0px; text-align: right;" readonly >元，
			資本門經費<input type="text" size="6" name="city_p1_capital_money_ny1" value="<?=$city_p1_capital_money_ny1;?>" style="border:0px; text-align: right;" readonly >元。
			</b>
		</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
	<tr>
		<td colspan="9" align="center" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;">特色一經費概算：學校申請</td>
		<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FFCC66"  style="font-size:14px;">縣市初審</td>
	</tr>
	<tr>
		<td width="10px" align="left" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">科目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">類別</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">項目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">說　　明</td>
		<td align="left" nowrap="nowrap" bgcolor="#FFDD66">初審金額</td>
		<td align="left" nowrap="nowrap" bgcolor="#FFDD66">刪減金額<br />自動產生</td>
	</tr>
<?
	//顯示	細項
	print_item($table_name_item, 'p1_105', $main_seq);
	
?>
</table>
<p>
<table border="0" style="width:750px;table-layout:fixed;word-break:break-all">
	<tr>
		<td nowrap="nowrap" style="width:150px; text-align:right; vertical-align:top;"><b>※<?=($school_year+1);?>年度特色一<br />初審意見：</b>
		</td>
		<td nowrap="nowrap"><textarea name="city_desc_ny1" cols="55" rows="4"><?=$city_desc_ny1;?></textarea><p>
		</td>
	</tr>
</table>
<p>
<? if($s_p1_money_ny1 == 0 || $s_p1_money_ny1 == '') echo "--!>"; ?>
<? if($s_p1_money_ny2 == 0 || $s_p1_money_ny2 == '') echo "<!--"; ?>
<table border="0">
	<tr>
		<td nowrap="nowrap" colspan="2">
		<?=($school_year+2);?>年度：<br />
		學校申請：經費共計 <?=$s_p1_money_ny2;?> 元，
		其中包含經常門經費 <?=$s_p1_current_money_ny2;?> 元，
		資本門經費 <?=$s_p1_capital_money_ny2;?> 元。
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" colspan="2">
			<b>初審金額：<font color=blue>經費共計<input type="text" size="6" name="city_p1_money_ny2" value="<?=$city_p1_money_ny2;?>" style="border:0px; text-align: right;" readonly>元</font>，
			其中包含經常門經費<input type="text" size="6" name="city_p1_current_money_ny2" value="<?=$city_p1_current_money_ny2;?>" style="border:0px; text-align: right;" readonly >元，
			資本門經費<input type="text" size="6" name="city_p1_capital_money_ny2" value="<?=$city_p1_capital_money_ny2;?>" style="border:0px; text-align: right;" readonly >元。
			</b>
		</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
	<tr>
		<td colspan="9" align="center" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;">特色一經費概算：學校申請</td>
		<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FFCC66"  style="font-size:14px;">縣市初審</td>
	</tr>
	<tr>
		<td width="10px" align="left" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">科目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">類別</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">項目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">說　　明</td>
		<td align="left" nowrap="nowrap" bgcolor="#FFDD66">初審金額</td>
		<td align="left" nowrap="nowrap" bgcolor="#FFDD66">刪減金額<br />自動產生</td>
	</tr>
<?
	//顯示	細項
	print_item($table_name_item, 'p1_106', $main_seq);
	
?>
</table>
<p>
<table border="0" style="width:750px;table-layout:fixed;word-break:break-all">
	<tr>
		<td nowrap="nowrap" style="width:150px; text-align:right; vertical-align:top;"><b>※<?=($school_year+2);?>年度特色一<br />初審意見：</b>
		</td>
		<td nowrap="nowrap"><textarea name="city_desc_ny2" cols="55" rows="4"><?=$city_desc_ny2;?></textarea><p>
		</td>
	</tr>
</table>
<p>
<? if($s_p1_money_ny2 == 0 || $s_p1_money_ny2 == '') echo "--!>"; ?>
<? if($s_p2_money == 0) echo "<!--"; ?>
<table border="0">
	<tr>
		<td nowrap="nowrap" colspan="2"><b>※特色二：</b><?=$p2_name;?> &nbsp; <?=($p2_IsContinue == "Y")?"(本年度為第 ".$p2_ContinueYear." 年辦理)":"";?>
		，參加學生人數 <?=$s_p2_student;?> 人
		，其中含目標學生 <?=$s_p2_target;?> 人
		，目標學生佔參加學生 <?=$s_p2_per;?>%。</td>
	</tr>
	<tr>
		<td nowrap="nowrap" colspan="2">
		<?=$school_year;?>年度：<br />
		學校申請：經費共計 <?=$s_p2_money;?> 元，
		其中包含經常門經費 <?=$s_p2_current_money;?> 元，
		資本門經費 <?=$s_p2_capital_money;?> 元。
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" colspan="2">
			<b>初審金額：<font color=blue>經費共計<input type="text" size="6" name="city_p2_money" value="<?=$city_p2_money;?>" style="border:0px; text-align: right;" readonly>元</font>，
			其中包含經常門經費<input type="text" size="6" name="city_p2_current_money" value="<?=$city_p2_current_money;?>" style="border:0px; text-align: right;" readonly >元，
			資本門經費<input type="text" size="6" name="city_p2_capital_money" value="<?=$city_p2_capital_money;?>" style="border:0px; text-align: right;" readonly >元。
			</b>
		</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
	<tr>
		<td colspan="9" align="center" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;">特色二經費概算：學校申請</td>
		<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FFCC66"  style="font-size:14px;">縣市初審</td>
	</tr>
	<tr>
		<td width="10px" align="left" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">科目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">類別</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">項目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">說　　明</td>
		<td align="left" nowrap="nowrap" bgcolor="#FFDD66">初審金額</td>
		<td align="left" nowrap="nowrap" bgcolor="#FFDD66">刪減金額<br />自動產生</td>
	</tr>
<?
	//顯示	細項
	print_item($table_name_item, 'p2_'.$school_year, $main_seq);
	
?>
</table>
<p>
<table border="0" style="width:750px;table-layout:fixed;word-break:break-all">
	<tr>
		<td nowrap="nowrap" style="width:150px; text-align:right; vertical-align:top;"><b>※<?=$school_year;?>年度特色二<br />初審意見：</b>
		</td>
		<td nowrap="nowrap"><textarea name="city_desc_p2" cols="55" rows="4"><?=$city_desc_p2;?></textarea><p>
		</td>
	</tr>
</table>
<p>
<? if($s_p2_money == 0) echo "-->"; ?>
<? if($s_p2_money_ny1 == 0 || $s_p2_money_ny1 == '') echo "<!--" ;?>
<table border="0">
	<tr>
		<td nowrap="nowrap" colspan="2">
		<?=($school_year+1);?>年度：<br />
		學校申請：經費共計 <?=$s_p2_money_ny1;?> 元，
		其中包含經常門經費 <?=$s_p2_current_money_ny1;?> 元，
		資本門經費 <?=$s_p2_capital_money_ny1;?> 元。
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" colspan="2">
			<b>初審金額：<font color=blue>經費共計<input type="text" size="6" name="city_p2_money_ny1" value="<?=$city_p2_money_ny1;?>" style="border:0px; text-align: right;" readonly>元</font>，
			其中包含經常門經費<input type="text" size="6" name="city_p2_current_money_ny1" value="<?=$city_p2_current_money_ny1;?>" style="border:0px; text-align: right;" readonly >元，
			資本門經費<input type="text" size="6" name="city_p2_capital_money_ny1" value="<?=$city_p2_capital_money_ny1;?>" style="border:0px; text-align: right;" readonly >元。
			</b>
		</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
	<tr>
		<td colspan="9" align="center" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;">特色二經費概算：學校申請</td>
		<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FFCC66"  style="font-size:14px;">縣市初審</td>
	</tr>
	<tr>
		<td width="10px" align="left" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">科目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">類別</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">項目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">說　　明</td>
		<td align="left" nowrap="nowrap" bgcolor="#FFDD66">初審金額</td>
		<td align="left" nowrap="nowrap" bgcolor="#FFDD66">刪減金額<br />自動產生</td>
	</tr>
<?
	//顯示	細項
	print_item($table_name_item, 'p2_105', $main_seq);
	
?>
</table>
<p>
<table border="0" style="width:750px;table-layout:fixed;word-break:break-all">
	<tr>
		<td nowrap="nowrap" style="width:150px; text-align:right; vertical-align:top;"><b>※<?=($school_year+1);?>年度特色二<br />初審意見：</b>
		</td>
		<td nowrap="nowrap"><textarea name="city_desc_ny1_p2" cols="55" rows="4"><?=$city_desc_ny1_p2;?></textarea><p>
		</td>
	</tr>
</table>
<p>
<? if($s_p2_money_ny1 == 0 || $s_p2_money_ny1 == '') echo "--!>"; ?>
<? if($s_p2_money_ny2 == 0 || $s_p2_money_ny2 == '') echo "<!--"; ?>
<table border="0">
	<tr>
		<td nowrap="nowrap" colspan="2">
		<?=($school_year+2);?>年度：<br />
		學校申請：經費共計 <?=$s_p2_money_ny2;?> 元，
		其中包含經常門經費 <?=$s_p2_current_money_ny2;?> 元，
		資本門經費 <?=$s_p2_capital_money_ny2;?> 元。
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" colspan="2">
			<b>初審金額：<font color=blue>經費共計<input type="text" size="6" name="city_p2_money_ny2" value="<?=$city_p2_money_ny2;?>" style="border:0px; text-align: right;" readonly>元</font>，
			其中包含經常門經費<input type="text" size="6" name="city_p2_current_money_ny2" value="<?=$city_p2_current_money_ny2;?>" style="border:0px; text-align: right;" readonly >元，
			資本門經費<input type="text" size="6" name="city_p2_capital_money_ny2" value="<?=$city_p2_capital_money_ny2;?>" style="border:0px; text-align: right;" readonly >元。
			</b>
		</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
	<tr>
		<td colspan="9" align="center" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;">特色二經費概算：學校申請</td>
		<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FFCC66"  style="font-size:14px;">縣市初審</td>
	</tr>
	<tr>
		<td width="10px" align="left" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">科目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">類別</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">項目</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
		<td align="left" nowrap="nowrap" bgcolor="#99CCCC">說　　明</td>
		<td align="left" nowrap="nowrap" bgcolor="#FFDD66">初審金額</td>
		<td align="left" nowrap="nowrap" bgcolor="#FFDD66">刪減金額<br />自動產生</td>
	</tr>
<?
	//顯示	細項
	print_item($table_name_item, 'p2_106', $main_seq);
	
?>
</table>
<p>
<table border="0" style="width:750px;table-layout:fixed;word-break:break-all">
	<tr>
		<td nowrap="nowrap" style="width:150px; text-align:right; vertical-align:top;"><b>※<?=($school_year+2);?>年度特色二<br />初審意見：</b>
		</td>
		<td nowrap="nowrap"><textarea name="city_desc_ny2_p2" cols="55" rows="4"><?=$city_desc_ny2_p2;?></textarea><p>
		</td>
	</tr>
</table>
<p>
<? if($s_p2_money_ny2 == 0 || $s_p2_money_ny2 == '') echo "--!>"; ?>
<table border="0" style="width:750px;table-layout:fixed;word-break:break-all">
	<tr>
		<td nowrap="nowrap" style="width:120px; text-align:right; vertical-align:top;"><b>※應上傳檔案：</b>
		</td>
		<td nowrap="nowrap">
			特色一實施計畫：<? echo ($a2_1 == ''?"<font color=red>未上傳</font>":"<font color=blue>已上傳</font>，檔名：<a href='".$file_path.$a2_1."' target='_new'>$a2_1</a>");?><br />
			<div style="display:<?=($a2_2 == '')?'none':''; //空白就不顯示?>;">
			特色二實施計畫：<? echo ($a2_2 == ''?"<font color=red>未上傳</font>":"<font color=blue>已上傳</font>，檔名：<a href='".$file_path.$a2_2."' target='_new'>$a2_2</a>");?><br />
			</div>
			<div style="display:<?=($page3_warning == '')?'none':''; //空白就不顯示?>;">
			目標學生名冊：<? echo ($point2 == ''?"<font color=red>未上傳</font>":"<font color=blue>已上傳</font>，檔名：<a href='".$file_path.$point2."' target='_new'>$point2</a>");?><br />
			</div>
			<p>
		</td>
	</tr>
	<tr style="display:<?=($page1_warning == '')?'none':''; //空白就不顯示?>;">
		<td nowrap="nowrap" colspan="2" style="vertical-align:top;">學校資料_警示原因：<?=$page1_warning;?>
		</td>
	</tr>
	<tr style="display:<?=($page1_warning == '')?'none':''; //空白就不顯示?>;">
		<td colspan="2" style="vertical-align:top;">學校資料_學校說明：<?=$page1_desc;?><p>
		</td>
	</tr>
	<tr style="display:<?=($page2_warning == '')?'none':''; //空白就不顯示?>;">
		<td nowrap="nowrap" colspan="2" style="vertical-align:top;">教師資料_警示原因：<?=$page2_warning;?>
		</td>
	</tr>
	<tr style="display:<?=($page2_warning == '')?'none':''; //空白就不顯示?>;">
		<td colspan="2" style="vertical-align:top;">教師資料_學校說明：<?=$page2_desc;?><p>
		</td>
	</tr>
	<tr style="display:<?=($page3_warning == '')?'none':''; //空白就不顯示?>;">
		<td nowrap="nowrap" colspan="2" style="vertical-align:top;">目標學生_警示原因：<?=$page3_warning;?>
		</td>
	</tr>
	<tr style="display:<?=($page3_warning == '')?'none':''; //空白就不顯示?>;">
		<td colspan="2" style="vertical-align:top;">目標學生_學校說明：<?=$page3_desc;?><p>
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" style="text-align:right; vertical-align:top;"><b>※初審結果：</b>
		</td>
		<td nowrap="nowrap">
			<input type="radio" name="city_approved" value="Y" id="city_approved_1" <?=(($city_approved == 'Y')?'checked':"");?>/>審核通過<br />
			<input type="radio" name="city_approved" value="N" id="city_approved_2" <?=(($city_approved == 'N')?'checked':"");?>/>審核不通過且列入退件名單<p>
		</td>
	</tr>
</table>
<input type="hidden" name="main_seq" value="<?=$main_seq;?>">
<input type="hidden" name="school_year" value="<?=$school_year;?>">
<input type="button" value="　取消(不儲存)　" onClick="window.close()">
<input type="submit" name="button" value="　確認(儲存送出)　" />
<!--結束 -->
<script language="JavaScript">
	
	function toCheck() 
	{
		var flag = 1;
		var errmsg = "";
		if ( document.form.city_p1_money.value > 80000) 
		{
			errmsg += '特色一審核金額超過可申請上限！\n';
			flag = 0;
		}
		
		if ( document.form.city_p2_money != null) 
		{
			if ( document.form.city_p1_money.value > 80000) 
			{
				errmsg += '特色二審核金額超過可申請上限！\n';
				flag = 0;
			}
		}
		
		//檢查有無未填寫的資料
		var i;
		for(i = 1;i < 10;i++)
		{
			for(j = 1;j <= 10;j++)
			{
				var opt_subject = document.getElementById('p' + i + '_opt_subject_' + j); //科目
				var opt_category = document.getElementById('p' + i + '_opt_category_' + j); //類別
				var city_money = document.getElementsByName('p' + i + '_city_money_' + j)[0]; //金額
				var s_money = document.getElementsByName('p' + i + '_s_money_' + j)[0]; //金額
				
				if(opt_subject != null)
				{
					if(opt_subject.value == '' || opt_category.value == '' || city_money.value == '')
					{
						errmsg += '項次「' + j + '.」的資料未填寫完成！\n';
						flag = 0;
					}
					
					if(city_money.value != '' && parseInt(city_money.value) > parseInt(s_money.value))
					{
						errmsg += '項次「' + j + '.」的初審金額不可大於學校申請金額！\n';
						flag = 0;
					}
					
				}
				else
					break;
			}
		}
				
		var city_money = document.getElementsByName("city_total_money")[0];
		var s_money = <?=$s_total_money;?>;
		if(city_money.value != '' && parseInt(city_money.value) > parseInt(s_money))
		{
			errmsg += '104年度初審金額不能超過學校的申請金額。\n';
			flag = 0;
		}
		
		city_money = document.getElementsByName("city_total_money_ny1")[0];
		s_money = <?=$s_total_money_ny1;?>;
		if(city_money != null)
		{
			if(city_money.value != '' && parseInt(city_money.value) > parseInt(s_money))
			{
				errmsg += '105年度初審金額不能超過學校的申請金額。\n';
				flag = 0;
			}
		}
		
		city_money = document.getElementsByName("city_total_money_ny2")[0];
		s_money = <?=$s_total_money_ny2;?>;
		if(city_money != null)
		{
			if(city_money.value != '' && parseInt(city_money.value) > parseInt(s_money))
			{
				errmsg += '106年度初審金額不能超過學校的申請金額。\n';
				flag = 0;
			}
		}
		
		if(document.getElementsByName("city_approved")[1].checked == true && document.form.city_desc.value == "")
		{
			errmsg += '若審核不通過，請在審核意見說明原因。\n';
			flag = 0;
		}
				
		if(flag == 0)
		{
			alert(errmsg);
			return false;
		}
		else
			return true;
			
	}
	
	//計算單一項目的金額
	function Count(obj, item_idx) 
	{
		//alert(obj.name);
		//取得控制項
		var p = left(obj.name, 6);
		var opt_subject = document.getElementById(p + '_opt_subject_' + item_idx); //科目
		var s_money = document.getElementsByName(p + '_s_money_' + item_idx)[0]; //金額
		var city_money = document.getElementsByName(p + '_city_money_' + item_idx)[0]; //金額
		var city_delete = document.getElementsByName(p + '_city_delete_' + item_idx)[0]; //金額
			
		//驗證輸入的資料是否為數字 
		var regex = /^[0-9]*$/;
		var flag = 1;
		
		//驗證分成兩部分
		//1.填寫 科目 類別 項目 單位
		//2.填寫 單價 數量
		switch (obj.name)
		{
			case city_money.name:
				if (!(regex.test(city_money.value)))
				{
					alert('「初審金額」請輸入整數。');
					city_money.value = '';
					city_money.focus();
					flag = 0;
				}
				if(opt_subject.value == '資本門' && regex.test(city_money.value) && city_money.value < 10000 && city_money.value != 0 && city_money.value != '') //資本門可以砍成0
				{
					alert('資本門的「金額」需為一萬元以上。'); 
					city_money.value = '';
					city_money.focus();
					flag = 0;
				}
				if(city_money.value == '')
				{
					city_money.value = s_money.value;
					city_delete.value = 0;
					flag = 0;
				}
				
				break;
		}
		
		if(flag == 1)
			city_delete.value = parseInt(s_money.value) - parseInt(city_money.value);
		
		//計算雜支
		chkbox(obj);
		
	}
	
	//計算雜支
	function chkbox(obj)
	{
		var p = left(obj.name, 6);
		var i;
		var total = 0;
		
		for(i = 1;i <= 10;i++)
		{
			var opt_subject = document.getElementById(p + '_opt_subject_' + i); //科目
			var opt_category = document.getElementById(p + '_opt_category_' + i); //類別
			var s_money = document.getElementsByName(p + '_s_money_' + i)[0]; //金額
			var city_money = document.getElementsByName(p + '_city_money_' + i)[0]; //金額
			var city_delete = document.getElementsByName(p + '_city_delete_' + i)[0]; //金額
			
			if(opt_subject != null)
			{
				//雜支
				if(opt_subject.value == '經常門' && city_money.value != '' && opt_category.value != '雜支')
					total += parseInt(city_money.value);
					
				if(opt_category.value == '雜支')
				{
					city_money.value = parseInt(total * 0.06);
					city_delete.value = parseInt(s_money.value) - parseInt(city_money.value);
				}
			}
				
		}
		
		count_all();
	}

	//計算總金額
	function count_all()
	{
		var city_total_money = document.getElementsByName('city_total_money')[0]; //總金額
		var city_total_money_ny1 = document.getElementsByName('city_total_money_ny1')[0]; //總金額
		var city_total_money_ny2 = document.getElementsByName('city_total_money_ny2')[0]; //總金額
	
		city_total_money.value = 0;
		city_total_money_ny1.value = 0;
		city_total_money_ny2.value = 0;
		
		var i,j,k;
		var school_year = <?=$school_year;?>;
		
		for(i = 1;i < 10;i++)
		{
			for(k = school_year;k <= school_year+2;k++)
			{
				if(k == 104)
				{
					var city_p_money = document.getElementsByName('city_p' + i + '_money')[0]; //ex.city_p1_money ,city_p2_money
					var city_p_current_money = document.getElementsByName('city_p' + i + '_current_money')[0]; //ex.city_p1_current_money 
					var city_p_capital_money = document.getElementsByName('city_p' + i + '_capital_money')[0]; //ex.city_p1_capital_money
				}
				else if(k == 105)
				{
					var city_p_money = document.getElementsByName('city_p' + i + '_money_ny1')[0]; //ex.city_p1_money ,city_p2_money
					var city_p_current_money = document.getElementsByName('city_p' + i + '_current_money_ny1')[0]; //ex.city_p1_current_money 
					var city_p_capital_money = document.getElementsByName('city_p' + i + '_capital_money_ny1')[0]; //ex.city_p1_capital_money
				}
				else if(k == 106)
				{
					var city_p_money = document.getElementsByName('city_p' + i + '_money_ny2')[0]; //ex.city_p1_money ,city_p2_money
					var city_p_current_money = document.getElementsByName('city_p' + i + '_current_money_ny2')[0]; //ex.city_p1_current_money 
					var city_p_capital_money = document.getElementsByName('city_p' + i + '_capital_money_ny2')[0]; //ex.city_p1_capital_money
				}
				
				if(city_p_money != null)
				{
					var current_money = 0;
					var capital_money = 0;
					
					for(j = 1;j <= 10;j++) //計算各特色經常 & 資本
					{
						var opt_subject = document.getElementById('p' + i + '_' + k + '_opt_subject_' + j); //科目
						var city_money = document.getElementsByName('p' + i + '_' + k + '_city_money_' + j)[0]; //金額
						
						if(opt_subject != null)
						{
							if(city_money.value != '' && opt_subject.value == '經常門')
							{
								current_money += parseInt(city_money.value);
							}
							
							if(city_money.value != '' && opt_subject.value == '資本門')
							{
								capital_money += parseInt(city_money.value);
							}
						}
					}
					
					city_p_money.value = parseInt(current_money) + parseInt(capital_money); //各特色的經常 + 資本
					city_p_current_money.value = current_money; //各特色的經常門金額
					city_p_capital_money.value = capital_money; //各特色的資本門金額
					
					if(k == 104)
					{
						city_total_money.value = parseInt(city_total_money.value) + parseInt(city_p_money.value); //所有特色的總和
					}
					else if(k == 105)
					{
						city_total_money_ny1.value = parseInt(city_total_money_ny1.value) + parseInt(city_p_money.value); //所有特色的總和
					}
					else if(k == 106)
					{
						city_total_money_ny2.value = parseInt(city_total_money_ny2.value) + parseInt(city_p_money.value); //所有特色的總和
					}
				}	
			}
			
		}
		
	}
	
	//設定預設值
	function set_default() 
	{
		var city_p1_money = document.getElementsByName('city_p1_money')[0]; 
		if (city_p1_money != null)
		{
			chkbox(city_p1_money);
		}
		
		var city_p1_money_ny1 = document.getElementsByName('city_p1_money_ny1')[0]; 
		if (city_p1_money_ny1 != null)
		{
			chkbox(city_p1_money_ny1);
		}
		
		var city_p1_money_ny2 = document.getElementsByName('city_p1_money_ny2')[0]; 
		if (city_p1_money_ny2 != null)
		{
			chkbox(city_p1_money_ny2);
		}
		
		var city_p2_money = document.getElementsByName('city_p2_money')[0]; 
		if (city_p2_money != null)
		{
			chkbox(city_p2_money);
		}
		
		var city_p2_money_ny1 = document.getElementsByName('city_p2_money_ny1')[0]; 
		if (city_p2_money_ny1 != null)
		{
			chkbox(city_p2_money_ny1);
		}
		
		var city_p2_money_ny2 = document.getElementsByName('city_p2_money_ny2')[0]; 
		if (city_p2_money_ny2 != null)
		{
			chkbox(city_p2_money_ny2);
		}
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