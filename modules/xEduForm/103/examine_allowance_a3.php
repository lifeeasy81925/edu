<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
	include "../../function/checkdate_edu.php";

	$account = ($_POST['account'] == '')?$_GET['id']:$_POST['account']; //取回傳遞來的學校編號，get為測試用
	$audit_city = $_POST['city']; //若為空值不會怎樣，但是儲存後無法正確回到上一頁
	$school_year = 103; //為學年度
	$table_name = 'alc_repair_dormitory';
	$table_name_item = $table_name.'_item';
	$a_num = 'a3';
	$a = $_GET['a'];

	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   //補三資料
		   "      , $a_num.* ".
		   
		   "      , a3_102.a029, a3_102.a192 ". //a029 = 97、98、99、100、101有沒有申請過 有申請過=1，a192 = 102年有沒有申請過 教育部核準金額 > 0為有申請
		   "      , a3_102.a023, a3_102.a024 ". //去年教師住宿人數, 前年教師住宿人數
		   "      , a3_102.a026, a3_102.a027 ". //去年學生住宿人數, 前年學生住宿人數
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join $table_name as $a_num on sy.seq_no = $a_num.sy_seq ".
		   "                       left join 102allowance3 as a3_102 on sd.account = a3_102.account ".
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
		$apply_last5year = $row['apply_last5year'];
		$apply_reason = $row['apply_reason'];
		
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
		
		$city_total_money = ($row['city_total_money'] == '')?$s_total_money:$row['city_total_money']; //NULL則填入學校資料
		$city_p1_money = ($row['city_p1_money'] == '')?$s_p1_money:$row['city_p1_money']; 
		$city_p1_current_cnt = ($row['city_p1_current_cnt'] == '')?$s_p1_current_cnt:$row['city_p1_current_cnt'];
		$city_p1_current_money = ($row['city_p1_current_money'] == '')?$s_p1_current_money:$row['city_p1_current_money'];
		$city_p1_capital_cnt = ($row['city_p1_capital_cnt'] == '')?$s_p1_capital_cnt:$row['city_p1_capital_cnt'];
		$city_p1_capital_money = ($row['city_p1_capital_money'] == '')?$s_p1_capital_money:$row['city_p1_capital_money'];
		$city_p2_money = ($row['city_p2_money'] == '')?$s_p2_money:$row['city_p2_money'];
		$city_p2_current_cnt = ($row['city_p2_current_cnt'] == '')?$s_p2_current_cnt:$row['city_p2_current_cnt'];
		$city_p2_current_money = ($row['city_p2_current_money'] == '')?$s_p2_current_money:$row['city_p2_current_money'];
		$city_p2_capital_cnt = ($row['city_p2_capital_cnt'] == '')?$s_p2_capital_cnt:$row['city_p2_capital_cnt'];
		$city_p2_capital_money = ($row['city_p2_capital_money'] == '')?$s_p2_capital_money:$row['city_p2_capital_money'];
		$city_desc = $row['city_desc'];
		$city_approved = $row['city_approved'];
		
		$edu_total_money = ($row['edu_total_money'] == '')?$city_total_money:$row['edu_total_money'];
		$edu_p1_money = ($row['edu_p1_money'] == '')?$city_p1_money:$row['edu_p1_money']; 
		$edu_p1_current_cnt = ($row['edu_p1_current_cnt'] == '')?$city_p1_current_cnt:$row['edu_p1_current_cnt'];
		$edu_p1_current_money = ($row['edu_p1_current_money'] == '')?$city_p1_current_money:$row['edu_p1_current_money'];
		$edu_p1_capital_cnt = ($row['edu_p1_capital_cnt'] == '')?$city_p1_capital_cnt:$row['edu_p1_capital_cnt'];
		$edu_p1_capital_money = ($row['edu_p1_capital_money'] == '')?$city_p1_capital_money:$row['edu_p1_capital_money'];
		$edu_p2_money = ($row['edu_p2_money'] == '')?$city_p2_money:$row['edu_p2_money'];
		$edu_p2_current_cnt = ($row['edu_p2_current_cnt'] == '')?$city_p2_current_cnt:$row['edu_p2_current_cnt'];
		$edu_p2_current_money = ($row['edu_p2_current_money'] == '')?$city_p2_current_money:$row['edu_p2_current_money'];
		$edu_p2_capital_cnt = ($row['edu_p2_capital_cnt'] == '')?$city_p2_capital_cnt:$row['edu_p2_capital_cnt'];
		$edu_p2_capital_money = ($row['edu_p2_capital_money'] == '')?$city_p2_capital_money:$row['edu_p2_capital_money'];
		$edu_desc = $row['edu_desc'];
		$edu_approved = $row['edu_approved'];
		
		$persent = number_format($edu_total_money/$city_total_money*100,2);
		
		$stay_teacher = $row['stay_teacher'];
		$stay_teacher_last = $row['a023'];
		$stay_teacher_last2 = $row['a024'];
		$stay_student = $row['stay_student'];
		$stay_student_last = $row['a026'];
		$stay_student_last2 = $row['a027'];
		
		$page1_warning = $row['page1_warning'];
		$page1_desc = $row['page1_desc'];
		$page2_warning = $row['page2_warning'];
		$page2_desc = $row['page2_desc'];
		$page3_warning = $row['page3_warning'];
		$page3_desc = $row['page3_desc'];
		
		$accord_point = $row['accord_point']; //符合的指標
		$accord_point_ary = explode(",",$accord_point);
		
		$applied = $row['applied']; //已申請的補助
		$applied_ary = explode(",",$applied);
		//可能會變動，每次進網頁重新判定
		$apply_name_t = (in_array("a3_1",$applied_ary))?"教師宿舍":"";
		$apply_name_s = (in_array("a3_2",$applied_ary))?"學生宿舍":"";
			
		$apply_name_t = "教師宿舍";
		$stay_teacher_last = 30;
		$stay_teacher_last2 = 20;
		
		$apply_name = ($apply_name_t != '' && $apply_name_s != '')?"教師及學生宿舍":$apply_name_t.$apply_name_s;

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
		//補三沒有雜支選項!!
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
			$city_delete = ($row['city_delete'] == '')?0:$row['city_delete'];
			$edu_money = ($row['edu_money'] == '')?$city_money:$row['edu_money'];
			$edu_delete = ($row['edu_delete'] == '')?0:$row['edu_delete'];

			$s1 = array("","經常門","資本門");
			if($p == 'p1') //教師不含學生修繕，反之亦然
			{
				$s3 = array(""=>array("")
						 , "經常門"=>array("","充實設備","其他")
						 , "資本門"=>array("","充實設備","教師宿舍修繕","其他")
							);
			}
			else
			{
				$s3 = array(""=>array("")
						 , "經常門"=>array("","充實設備","其他")
						 , "資本門"=>array("","充實設備","學生宿舍修繕","其他")
							);
			}

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
			echo "<td align='left'><input type='text' size='6' name='".$p."_city_money_$idx' value='$city_money' style='border:0px; text-align: left;' readonly ></td>";
			echo "<td align='left'><input type='text' size='6' name='".$p."_city_delete_$idx' value='$city_delete' style='border:0px; text-align: left;' readonly ></td>";
			echo "<td align='left'><input type='text' size='6' name='".$p."_edu_money_$idx' value='$edu_money' style='border:0px; text-align: left;' readonly ></td>";
			echo "<td align='left'><input type='text' size='6' name='".$p."_edu_delete_$idx' value='$edu_delete' onChange='js:Count(this,$idx);' ></td>";
			echo "</tr>";
		
		}
	}
	
	$sql = "select * from school_upload_name where sy_seq = '$main_seq' ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$point2 = $row['point2'];
		$a3_1 = $row['a3_1'];
		$a3_2 = $row['a3_2'];
	}
	
	$file_path = '/edu_upload/'.$school_year.'/'.$account.'/';
	//echo $file_path;

?> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p><b>補助項目三：修繕離島或偏遠地區師生宿舍</b>　<a href="/edu/modules/xSchoolForm/download/allowance-03.htm" target="_blank">(補助項目說明)</a><br />
說明：本項目最高補助140萬元。
</p>
<form name="form" method="post" action="examine_allowance_a3_finish.php?a=<?=$a;?>" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return add_crlf();">
●學校：<?=($account.' '.$cityname.$district.$schoolname);?>
<p>
<b>※符合指標：</b><a href="print_point_page.php?id=<?=$account;?>" target="_blank">點此查看詳細資料</a><br />
<? 
	//符合指標
	for($i = 0;$i < count($accord_point_ary);$i++)
	{
		switch($accord_point_ary[$i])
		{
			case "p1_1":
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
			case "p6_1":
				echo  '　　　'.'指標六～（一）'.'<br />';
				break;
			case "p6_2":
				echo  '　　　'.'指標六～（二）'.'<br />';
				break;
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
			102年度 <a href="../effect_102_view_up_03.php?school=<?=$account;?>" target="_blank">執行計畫與經費</a>
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" >
			101年度 <a href="../effect_101_view_03.php?school=<?=$account;?>" target="_blank">執行成果</a>
		</td>
	</tr>
</table>
<p>
<table border="0" style="width:750px;table-layout:fixed;word-break:break-all">
	<tr>
		<td>
			<b>※申請資料與審核：</b><br />
			●最近五年是否曾獲本項補助：<font color="red" ><?=($apply_last5year == 'Y')?'近五年曾接受本項補助之宿舍，再提出申請須註明原因。':'近五年未受補助。';?></font><br />
			<?
				if($apply_last5year == 'Y')
					echo "●申請原因：<font color='blue' >".$apply_reason."</font><br />";
			?>
			●學校申請修繕(含設備)：<font color="red" ><?=$apply_name;?></font><br />
			●最近三年住宿情形：<br />
			<? if ($apply_name_t == '') { echo "<!--"; } ?>
			　<strong>教師宿舍</strong><br />
			　　今(<?=($school_year-1);?>)學年度教師宿舍住宿人數 <?=$stay_teacher;?> 人<br />
			　　去(<?=($school_year-2);?>)學年度教師宿舍住宿人數 <?=$stay_teacher_last;?> 人<br />
			　　前(<?=($school_year-3);?>)學年度教師宿舍住宿人數 <?=$stay_teacher_last2;?> 人<br />
			<? if ($apply_name_t == '') { echo "-->"; } ?>
			<? if ($apply_name_s == '') { echo "<!--"; } ?>
			　<strong>學生宿舍</strong><br />
			　　今(<?=($school_year-1);?>)學年度學生宿舍住宿人數 <?=$stay_student;?> 人<br />
			　　去(<?=($school_year-2);?>)學年度學生宿舍住宿人數 <?=$stay_student_last;?> 人<br />
			　　前(<?=($school_year-3);?>)學年度學生宿舍住宿人數 <?=$stay_student_last2;?> 人<br />
			<? if ($apply_name_s == '') { echo "-->"; } ?>
		</td>
	</tr>
</table>
<p>
※補助師生宿舍-申請補助經費： <?=$s_total_money;?> 元<br />
※補助師生宿舍-初審金額： <?=$city_total_money;?> 元<br />
<font color=blue>※補助師生宿舍-複審金額：<input type="text" size="6" name="edu_total_money" value="<?=$edu_total_money;?>" style="border:0px; text-align: right;" readonly >
元 (本列自動計算)</font> 百分比<input type="text" size="6" name="persent" value="<?=$persent;?>" style="border:0px; text-align: right;" readonly >%
<p>
<? if ($apply_name_t == '') { echo "<!--"; } ?>
<table border="0">
	<tr>
		<td nowrap="nowrap" colspan="2"><b>※教師宿舍</b></td>
	</tr>
	<tr>
		<td nowrap="nowrap" colspan="2">學校申請：經費共計 <?=$s_p1_money;?> 元，
		其中包含經常門經費 <?=$s_p1_current_cnt;?> 項 <?=$s_p1_current_money;?> 元，
		資本門經費 <?=$s_p1_capital_cnt;?> 式 <?=$s_p1_capital_money;?> 元。
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" colspan="2">初審金額：經費共計 <?=$city_p1_money;?> 元，
		其中包含經常門經費 <?=$city_p1_current_cnt;?> 項 <?=$city_p1_current_money;?> 元，
		資本門經費 <?=$city_p1_capital_cnt;?> 式 <?=$city_p1_capital_money;?> 元。
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" colspan="2">
			<b>複審金額：<font color=blue>經費共計<input type="text" size="6" name="edu_p1_money" value="<?=$edu_p1_money;?>" style="border:0px; text-align: right;" readonly>元</font>，
			其中包含經常門經費<input type="text" size="2" name="edu_p1_current_cnt" value="<?=$edu_p1_current_cnt;?>" style="border:0px; text-align: right;" readonly >項
			<input type="text" size="6" name="edu_p1_current_money" value="<?=$edu_p1_current_money;?>" style="border:0px; text-align: right;" readonly >元，
			資本門經費<input type="text" size="2" name="edu_p1_capital_cnt" value="<?=$edu_p1_capital_cnt;?>" style="border:0px; text-align: right;" readonly >式
			<input type="text" size="6" name="edu_p1_capital_money" value="<?=$edu_p1_capital_money;?>" style="border:0px; text-align: right;" readonly >元。
			</b>
		</td>
	</tr>
</table>
<? //經費表 教師宿舍 ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
	<tr>
		<td colspan="9" align="center" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;">教師宿舍經費概算：學校申請</td>
		<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FFCC66"  style="font-size:14px;">縣市初審</td>
		<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FF9966"  style="font-size:14px;">教育部複審</td>
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
		<td align="left" nowrap="nowrap" bgcolor="#FFDD66">刪減金額</td>
		<td align="left" nowrap="nowrap" bgcolor="#FFCCCC">複審金額<br />自動產生</td>
		<td align="left" nowrap="nowrap" bgcolor="#FFCCCC">刪減金額</td>
	</tr>
<?
	//顯示教師宿舍	細項
	print_item($table_name_item, 'p1', $main_seq);
	
?>
</table>
<p>
<? if ($apply_name_t == '') { echo "-->"; } ?>

<? if ($apply_name_s == '') { echo "<!--"; } ?>
<table border="0">
	<tr>
		<td nowrap="nowrap" colspan="2"><b>※學生宿舍</b></td>
	</tr>
	<tr>
		<td nowrap="nowrap" colspan="2">學校申請：經費共計 <?=$s_p2_money;?> 元，
		其中包含經常門經費 <?=$s_p2_current_cnt;?> 項 <?=$s_p2_current_money;?> 元，
		資本門經費 <?=$s_p2_capital_cnt;?> 式 <?=$s_p2_capital_money;?> 元。
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" colspan="2">初審金額：經費共計 <?=$city_p2_money;?> 元，
		其中包含經常門經費 <?=$city_p2_current_cnt;?> 項 <?=$city_p2_current_money;?> 元，
		資本門經費 <?=$city_p2_capital_cnt;?> 式 <?=$city_p2_capital_money;?> 元。
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" colspan="2">
			<b>複審金額：<font color=blue>經費共計<input type="text" size="6" name="edu_p2_money" value="<?=$edu_p2_money;?>" style="border:0px; text-align: right;" readonly>元</font>，
			其中包含經常門經費<input type="text" size="2" name="edu_p2_current_cnt" value="<?=$edu_p2_current_cnt;?>" style="border:0px; text-align: right;" readonly >項
			<input type="text" size="6" name="edu_p2_current_money" value="<?=$edu_p2_current_money;?>" style="border:0px; text-align: right;" readonly >元，
			資本門經費<input type="text" size="2" name="edu_p2_capital_cnt" value="<?=$edu_p2_capital_cnt;?>" style="border:0px; text-align: right;" readonly >式
			<input type="text" size="6" name="edu_p2_capital_money" value="<?=$edu_p2_capital_money;?>" style="border:0px; text-align: right;" readonly >元。
			</b>
		</td>
	</tr>
</table>
<? //經費表 學生宿舍 ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
	<tr>
		<td colspan="9" align="center" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;">學生宿舍經費概算：學校申請</td>
		<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FFCC66"  style="font-size:14px;">縣市初審</td>
		<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FF9966"  style="font-size:14px;">教育部複審</td>
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
		<td align="left" nowrap="nowrap" bgcolor="#FFDD66">刪減金額</td>
		<td align="left" nowrap="nowrap" bgcolor="#FFCCCC">複審金額<br />自動產生</td>
		<td align="left" nowrap="nowrap" bgcolor="#FFCCCC">刪減金額</td>
	</tr>
<?
	//顯示教師宿舍	細項
	print_item($table_name_item, 'p2', $main_seq);
	
?>
</table>
<p>
<? if ($apply_name_s == '') { echo "-->"; } ?>

<table border="0" style="width:750px;table-layout:fixed;word-break:break-all">
	<tr>
		<td nowrap="nowrap" style="width:120px; text-align:right; vertical-align:top;"><b>※初審意見：</b>
		</td>
		<td><?=$city_desc;?><p>
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" style="width:120px; text-align:right; vertical-align:top;"><b>※複審意見：</b>
		</td>
		<td nowrap="nowrap"><textarea name="edu_desc" cols="55" rows="4"><?=$edu_desc;?></textarea><p>
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" style="text-align:right; vertical-align:top;"><b>※應上傳檔案：</b>
		</td>
		<td nowrap="nowrap">
		實施計畫：<? echo ($a3_1 == ''?"<font color=red>未上傳</font>":"<font color=blue>已上傳</font>，檔名：<a href='".$file_path.$a3_1."' target='_new'>$a3_1</a>");?><br />
		近三年住宿人員資料：<? echo ($a3_2 == ''?"<font color=red>未上傳</font>":"<font color=blue>已上傳</font>，檔名：<a href='".$file_path.$a3_2."' target='_new'>$a3_2</a>");?><br />
		<div style="display:<?=($page3_warning == '')?'none':''; //空白就不顯示?>;">目標學生名冊：
		<? echo ($point2 == ''?"<font color=red>未上傳</font>":"<font color=blue>已上傳</font>，檔名：<a href='".$file_path.$point2."' target='_new'>$point2</a>");?><br />
		</div><p>
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
		<td nowrap="nowrap" style="text-align:right; vertical-align:top;"><b>※複審結果：</b>
		</td>
		<td nowrap="nowrap">
			<input type="radio" name="edu_approved" value="Y" id="edu_approved_1" <?=(($edu_approved == 'Y')?'checked':"");?>/>審核通過<br />
			<input type="radio" name="edu_approved" value="N" id="edu_approved_2" <?=(($edu_approved == 'N')?'checked':"");?>/>審核不通過且列入退件名單<p>
		</td>
	</tr>
</table>
<input type="hidden" name="main_seq" value="<?=$main_seq;?>">
<input type="hidden" name="school_year" value="<?=$school_year;?>">
<input type="hidden" name="city" value="<?=$audit_city;?>">
<input type="button" value="　取消(不儲存)　" onClick="window.close()">
<input type="submit" name="button" value="　確認(儲存送出)　" />

<!-- 檢查空值 與 資料驗證 -->
<script language="JavaScript">
	function toCheck() 
	{
		//加總檢核，不得大於140萬元
		if (document.form.edu_total_money.value > 1400000) 
		{
			alert('申請總額錯誤！\n申請總額不得大於140萬元。');
			return false;
		}
		
		//檢查有無未填寫的資料
		var i;
		for(i = 1;i < 10;i++)
		{
			for(j = 1;j <= 10;j++)
			{
				var opt_subject = document.getElementById('p' + i + '_opt_subject_' + j); //科目
				var opt_category = document.getElementById('p' + i + '_opt_category_' + j); //類別
				var edu_money = document.getElementsByName('p' + i + '_edu_money_' + j)[0]; //金額
				var s_money = document.getElementsByName('p' + i + '_s_money_' + j)[0]; //金額
				
				if(opt_subject != null)
				{
					if(opt_subject.value == '' || opt_category.value == '' || edu_money.value == '')
					{
						alert('項次「' + j + '.」的資料未填寫完成！');
						return false;
					}
					
					if(edu_money.value != '' && parseInt(edu_money.value) > parseInt(s_money.value))
					{
						alert('項次「' + j + '.」的複審金額不可大於學校申請金額！');
						return false;
					}
				}
				else
					break;
			}
		}
		
		var edu_money = document.getElementsByName("edu_total_money")[0];
		var s_money = <?=$s_total_money;?>;
		if(edu_money.value != '' && parseInt(edu_money.value) > parseInt(s_money))
		{
			alert('複審金額不能超過學校的申請金額。');
			return false;
		}
		
		if(document.getElementsByName("edu_approved")[1].checked == true && document.form.city_desc.value == "")
		{
			alert('若審核不通過，請在審核意見說明原因。');
			return false;
		}
		
		return true;
	}

	//計算單一項目的金額
	function Count(obj, item_idx) 
	{
		//alert(obj.name);
		//取得控制項
		var p = left(obj.name, 2);
		var opt_subject = document.getElementById(p + '_opt_subject_' + item_idx); //科目
		var s_money = document.getElementsByName(p + '_s_money_' + item_idx)[0]; //金額
		var city_money = document.getElementsByName(p + '_city_money_' + item_idx)[0]; //金額
		var city_delete = document.getElementsByName(p + '_city_delete_' + item_idx)[0]; //金額
		var edu_money = document.getElementsByName(p + '_edu_money_' + item_idx)[0]; //金額
		var edu_delete = document.getElementsByName(p + '_edu_delete_' + item_idx)[0]; //金額
			
		//驗證輸入的資料是否為數字 
		var regex = /^[0-9]*$/;
		var flag = 1;
		
		//驗證分成兩部分
		//1.填寫 科目 類別 項目 單位
		//2.填寫 單價 數量
		switch (obj.name)
		{
			case edu_delete.name:
				/*if (!(regex.test(edu_money.value)))
				{
					alert('「初審金額」請輸入整數。');
					edu_money.value = '';
					edu_money.focus();
					flag = 0;
				}
				if(opt_subject.value == '資本門' && regex.test(edu_money.value) && edu_money.value < 10000 && edu_money.value != '')
				{
					alert('資本門的「單價」需為一萬元以上。'); 
					price.value = "";
					s_money.value = '';
					flag = 0;
				}*/
				if (!(regex.test(edu_delete.value)))
				{
					alert('「刪除金額」請輸入整數。');
					edu_delete.value = 0;
					edu_money.value = city_money.value;
					edu_delete.focus();
				}
				if(parseInt(edu_delete.value) > parseInt(city_money.value))
				{
					alert('「刪除金額」超過「初審金額」。');
					edu_delete.value = 0;
					edu_money.value = city_money.value;
					edu_delete.focus();
				}
				if(edu_delete.value == '')
				{
					edu_delete.value = 0;
					edu_money.value = city_money.value;
				}
					
				break;
		}
		
		if(flag == 1)
			edu_money.value = parseInt(city_money.value) - parseInt(edu_delete.value);
				
		//計算雜支
		chkbox(obj);
		
	}
	
	//計算雜支
	function chkbox(obj)
	{
		var p = left(obj.name, 2);
		var i;
		var total = 0;
		
		for(i = 1;i <= 10;i++)
		{
			var opt_subject = document.getElementById(p + '_opt_subject_' + i); //科目
			var opt_category = document.getElementById(p + '_opt_category_' + i); //類別
			var s_money = document.getElementsByName(p + '_s_money_' + i)[0]; //金額
			var city_money = document.getElementsByName(p + '_city_money_' + i)[0]; //金額
			var city_delete = document.getElementsByName(p + '_city_delete_' + i)[0]; //金額
			var edu_money = document.getElementsByName(p + '_edu_money_' + i)[0]; //金額
			var edu_delete = document.getElementsByName(p + '_edu_delete_' + i)[0]; //金額
			
			if(opt_subject != null)
			{
				if(opt_subject.value == '經常門' && edu_money.value != '' && opt_category.value != '雜支')
					total += parseInt(edu_money.value);
					
				if(opt_category.value == '雜支')
				{
					edu_money.value = parseInt(total * 0.06);
					edu_delete.value = parseInt(city_money.value) - parseInt(edu_money.value);
				}
			}
				
		}
		
		count_all();
	}
	
	//計算總金額
	function count_all()
	{
		var edu_total_money = document.getElementsByName('edu_total_money')[0]; //總金額
		var i;
		
		edu_total_money.value = 0;
		
		for(i = 1;i < 10;i++)
		{
			var edu_p_money = document.getElementsByName('edu_p' + i + '_money')[0]; //ex.edu_p1_money ,edu_p2_money
			var edu_p_current_cnt = document.getElementsByName('edu_p' + i + '_current_cnt')[0]; //ex.edu_p1_current_cnt
			var edu_p_current_money = document.getElementsByName('edu_p' + i + '_current_money')[0]; //ex.edu_p1_current_money 
			var edu_p_capital_cnt = document.getElementsByName('edu_p' + i + '_capital_cnt')[0]; //ex.edu_p1_capital_cnt
			var edu_p_capital_money = document.getElementsByName('edu_p' + i + '_capital_money')[0]; //ex.edu_p1_capital_money
			//alert(edu_p_money.name);
			if(edu_p_money != null)
			{
				var current_cnt = 0;
				var current_money = 0;
				var capital_cnt = 0;
				var capital_money = 0;
				
				for(j = 1;j <= 10;j++) //計算各特色經常 & 資本
				{
					var opt_subject = document.getElementById('p' + i + '_opt_subject_' + j); //科目
					var edu_money = document.getElementsByName('p' + i + '_edu_money_' + j)[0]; //金額
					
					if(opt_subject != null)
					{
						if(edu_money.value != '' && opt_subject.value == '經常門')
						{
							current_cnt++;
							current_money += parseInt(edu_money.value);
						}
						
						if(edu_money.value != '' && opt_subject.value == '資本門')
						{
							capital_cnt++;
							capital_money += parseInt(edu_money.value);
						}
					}
				}
				
				edu_p_money.value = parseInt(current_money) + parseInt(capital_money); //各特色的經常 + 資本
				edu_p_current_cnt.value = current_cnt;
				edu_p_current_money.value = current_money; //各特色的經常門金額
				edu_p_capital_cnt.value = capital_cnt;
				edu_p_capital_money.value = capital_money; //各特色的資本門金額
				
				edu_total_money.value = parseInt(edu_total_money.value) + parseInt(edu_p_money.value); //所有特色的總和
			}
		}
		
		//計算百分比
		var persent = document.getElementsByName('persent')[0]; 
		var city_total_money = '<?=$city_total_money;?>';
		var x;
		
		x = parseInt(edu_total_money.value) * 100 / parseInt(city_total_money);
		persent.value = x.toFixed(2);
		
	}
	
	//在textarea按Enter才有作用，其他方無用避免按了之後網頁直接送出
	function add_crlf()
	{
		var obj_text = document.getElementsByName('edu_desc')[0];
		if(document.activeElement == obj_text)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	
	//設定預設值
	function set_default() 
	{
		//補三沒預設
	}
	
	//設定下拉選單
	function change_subject(obj, idx, YN)
	{
		var selectName=obj.options[obj.selectedIndex].text;
		NewOpt = new Array;
		
		var p = left(obj.id,3); //取得p1_ or p2_

		if (selectName == ""){
			NewOpt[0] = new Option("");
		}

		if (selectName == "經常門")	{
			NewOpt[0] = new Option("");
			NewOpt[1] = new Option("充實設備");
			NewOpt[2] = new Option("其他");
		}

		if (selectName == "資本門" && p == 'p1_')
		{
			NewOpt[0] = new Option("");
			NewOpt[1] = new Option("充實設備");
			NewOpt[2] = new Option("教師宿舍修繕");
			NewOpt[3] = new Option("其他");
		}
		
		if (selectName == "資本門" && p == 'p2_')
		{
			NewOpt[0] = new Option("");
			NewOpt[1] = new Option("充實設備");
			NewOpt[2] = new Option("學生宿舍修繕");
			NewOpt[3] = new Option("其他");
		}

		newnum = NewOpt.length;
		
		var opt_category = document.getElementById(p + 'opt_category_' + idx)

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
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?> 
