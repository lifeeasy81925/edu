<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
	include "checkdate_edu.php";
	
	include "../../function/config_for_105.php"; //本年度基本設定

	$account = ($_POST['account'] == '')?$_GET['id']:$_POST['account']; //取回傳遞來的學校編號，get為測試用
	$audit_city = $_POST['city']; //若為空值不會怎樣，但是儲存後無法正確回到上一頁
	$table_name = 'alc_parenting_education';
	$table_name_item = $table_name.'_item';
	$a_num = 'a1';
	$a = $_GET['a'];

	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   //補一資料
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
		
		$s_total_money = ($row['s_total_money'] == '')?0:$row['s_total_money']; //NULL則填入0
		$s_p1_times = $row['s_p1_times'];
		$s_p1_people = $row['s_p1_people'];
		$s_p1_money = ($row['s_p1_money'] == '')?0:$row['s_p1_money'];
		$s_p2_people = $row['s_p2_people'];
		$s_p2_money = ($row['s_p2_money'] == '')?0:$row['s_p2_money'];
		$s_p2_student = $row['s_p2_student'];
		
		$city_total_money = ($row['city_total_money'] == '')?$s_total_money:$row['city_total_money']; //NULL則填入學校資料
		$city_p1_money = ($row['city_p1_money'] == '')?$s_p1_money:$row['city_p1_money']; 
		$city_p1_times = ($row['city_p1_times'] == '')?$s_p1_times:$row['city_p1_times'];
		$city_p2_money = ($row['city_p2_money'] == '')?$s_p2_money:$row['city_p2_money'];
		$city_p2_people = ($row['city_p2_people'] == '')?$s_p2_people:$row['city_p2_people'];
		$city_desc = $row['city_desc'];
		$city_approved = $row['city_approved'];
		
		$edu_total_money = ($row['edu_total_money'] == '')?$city_total_money:$row['edu_total_money']; //NULL則填入縣市資料
		$edu_p1_money = ($row['edu_p1_money'] == '')?$city_p1_money:$row['edu_p1_money']; 
		$edu_p1_times = ($row['edu_p1_times'] == '')?$city_p1_times:$row['edu_p1_times'];
		$edu_p2_money = ($row['edu_p2_money'] == '')?$city_p2_money:$row['edu_p2_money'];
		$edu_p2_people = ($row['edu_p2_people'] == '')?$city_p2_people:$row['edu_p2_people'];
		$edu_desc = $row['edu_desc'];
		$edu_approved = $row['edu_approved'];
		
		$persent = number_format($edu_total_money/$city_total_money*100,2);
		
		$lastyear_leaving = ($row['lastyear_leaving'] == '')?0:$row['lastyear_leaving']; 
		$page1_warning = $row['page1_warning'];
		$page1_desc = $row['page1_desc'];
		$page2_warning = $row['page2_warning'];
		$page2_desc = $row['page2_desc'];
		$page3_warning = $row['page3_warning'];
		$page3_desc = $row['page3_desc'];
		
		$accord_point = $row['accord_point']; //符合的指標
		$accord_point_ary = explode(",",$accord_point);
		
		$keep = $row['keep'];
		
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

			$s1 = array("","經常門");
			$s3 = array(""=>array("")
					 , "經常門"=>array("","鐘點費","鐘點費(含補充保費)","場地費","誤餐費","講義文件費","加班費","其他")
					 , "資本門"=>array("") //補一沒資本門
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
				echo "<td align='left'><input type='text' size='6' name='".$p."_city_money_$idx' value='$city_money' style='border:0px; text-align: left;' readonly ></td>";
				echo "<td align='left'><input type='text' size='6' name='".$p."_city_delete_$idx' value='$city_delete' style='border:0px; text-align: left;' readonly ></td>";
				echo "<td align='left'><input type='text' size='6' name='".$p."_edu_money_$idx' value='$edu_money' style='border:0px; text-align: left;' readonly ></td>";
				echo "<td align='left'><input type='text' size='6' name='".$p."_edu_delete_$idx' value='$edu_delete' onChange='js:Count(this,$idx);' ></td>"; //style='border:0px; text-align: left;' readonly 
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
				$outlay_city_money = ($row['city_money'] == '')?$s_money:$row['city_money'];
				$outlay_city_delete = ($row['city_delete'] == '')?0:$row['city_delete'];
				$outlay_edu_money = ($row['edu_money'] == '')?$city_money:$row['edu_money'];
				$outlay_edu_delete = ($row['edu_delete'] == '')?0:$row['edu_delete'];
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
			echo "<td align='left'><input type='text' size='6' name='".$p."_edu_money_$idx' value='$outlay_edu_money' style='border:0px; text-align: left;' readonly ></td>";
			echo "<td align='left'><input type='text' size='6' name='".$p."_edu_delete_$idx' value='$outlay_edu_delete' style='border:0px; text-align: left;' readonly ></td>"; //style='border:0px; text-align: left;' readonly 
			echo "</tr>";
			
		}

	}
	
	$sql = "select * from school_upload_name where sy_seq = '$main_seq' ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$point2 = $row['point2'];
		$lastyear_leaving_file = $row['lastyear_leaving_file'];
		$a1_1 = $row['a1_1'];
		$a1_2 = $row['a1_2'];
	}
	
	$file_path = '/epa_uploads/'.$school_year.'/pub/'.$account.'/';
	$file_path2 = '/epa_uploads/'.$school_year.'/pri/'.$account.'/';
	//echo $file_path;

?> 
<p><b>補助項目一：推展親職教育活動</b>　<a href="/edu/modules/xSchoolForm/<?=$school_year;?>/allowance-01.htm" target="_blank">(補助項目說明)</a><br />
說明：本項目最高補助7萬元<br />
親職講座：最高補助2場共2萬元(每場最高補助1萬元)，並以目標學生家長為主要對象；<br />
家庭訪視：補助經費標準為每人次200元，並以目標學生中有學習適應困難或<br />　　　　　特殊行為之學生為主要對象，且應擬具個案家庭輔導方案。
</p>
<form name="form" method="post" action="examine_allowance_a1_finish.php?a=<?=$a;?>" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return add_crlf();">
●學校：<?=($account.' '.$cityname.$district.$schoolname);?>
<p>
<? if($keep == 0) echo "<!--"; ?>
<b>※符合指標：</b><a href="print_point_page.php?id=<?=$account;?>" target="_blank">點此查看詳細資料</a><br />
<? if($keep == 0) echo "-->"; ?>
<? if($keep == 1) echo "<!--"; ?>
<b>※符合指標：</b><a href="print_point_page_new.php?id=<?=$account;?>" target="_blank">點此查看詳細資料</a><br />
<? if($keep == 1) echo "-->"; ?>
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
			<?=($school_year-1);?>年度 <a href="../104/effect_view_school_up_01.php?id=<?=$account;?>" target="_blank">執行計畫與經費</a>
		</td>
	</tr>
	<!--
	<tr>
		<td nowrap="nowrap" >
			<?=($school_year-2);?>年度 <a href="../103/effect_school_02.php?id=<?=$account;?>" target="_blank">執行成果</a> 
		</td>
	</tr>
	-->
</table>
<p>
※親職教育-申請補助經費： <?=$s_total_money;?> 元<br />
※親職教育-初審金額： <?=$city_total_money;?> 元<br />
<font color=blue>※親職教育-複審金額：<input type="text" size="6" name="edu_total_money" value="<?=$edu_total_money;?>" style="border:0px; text-align: right;" readonly >
元 (本列自動計算)</font> 百分比<input type="text" size="6" name="persent" value="<?=$persent;?>" style="border:0px; text-align: right;" readonly >%
<p>
<table border="0">
	<tr>
		<td nowrap="nowrap" colspan="2"><b>※親職講座</b></td>
	</tr>
	<tr>
		<td nowrap="nowrap" colspan="2">學校申請：經費共計 <?=$s_p1_money;?> 元，預計辦理親職講座 <?=$s_p1_times;?> 場，預計參加人數 <?=$s_p1_people;?> 人。
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" colspan="2">初審金額：經費共計 <?=$city_p1_money;?> 元，預計辦理親職講座 <?=$city_p1_times;?> 場。
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" colspan="2">
			<b>複審金額：<font color=blue>經費共計<input type="text" size="6" name="edu_p1_money" value="<?=$edu_p1_money;?>" style="border:0px; text-align: right;" readonly>元</font>，
			辦理親職講座<input type="text" size="2" name="edu_p1_times" value="<?=$edu_p1_times;?>" >場。
		</td>
	</tr>
</table>
<table width="700px" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFCC" style="font-size:12px;">
	<tr>
		<td colspan="9" align="center" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;">親職講座經費概算：學校申請</td>
		<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FFCC66"  style="font-size:14px;">縣市初審</td>
		<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FF9966"  style="font-size:14px;">教育部複審</td>
	</tr>
	<tr>
		<td width="10" align="left" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
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
	//顯示 細項
	print_item($table_name_item, 'p1', $main_seq);
	
?>
</table>
<p>
<table border="0">
	<tr>
		<td nowrap="nowrap" colspan="2"><b>※個別家庭訪視</b></td>
	</tr>
	<tr>
		<td nowrap="nowrap" style="text-align:right; vertical-align:top;">
			學校申請：
		</td>
		<td>
			目標學生 <?=$target_aboriginal;?> 人，預計申請個別家庭訪視 <?=$s_p2_student;?> 人，
			每人訪視2-4次，共 <?=$s_p2_people;?> 人次，申請補助經費 <?=$s_p2_money;?> 元(200元/人)。
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" style="text-align:right; vertical-align:top;">
			初審金額：
		</td>
		<td>
			目標學生 <?=$target_aboriginal;?> 人，預計申請個別家庭訪視 <?=$s_p2_student;?> 人，
			每人訪視2-4次，共 <?=$city_p2_people;?> 人次，補助經費 <?=$city_p2_money;?> 元。
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" style="text-align:right; vertical-align:top;">
			<b>複審金額：</b>
		</td>
		<td>
			<b>目標學生 <?=$target_aboriginal;?> 人，預計申請個別家庭訪視 <?=$s_p2_student;?> 人，
			每人訪視2-4次，共<input type="text" size="2" name="edu_p2_people" value="<?=$edu_p2_people;?>" onChange="js:Count_family(this);">人次，
			<font color=blue>補助經費<input type="text" size="6" name="edu_p2_money" value="<?=$edu_p2_money;?>" style="border:0px; text-align: right;" readonly>元</font>。</b>
		</td>
	</tr>
</table>
<p>
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
			親職教育講座實施計畫：<? echo ($a1_1 == ''?"<font color=red>未上傳</font>":"<font color=blue>已上傳</font>，檔名：<a href='".$file_path.$a1_1."' target='_new'>$a1_1</a>");?><br />
			家庭訪視實施計畫：<? echo ($a1_2 == ''?"<font color=red>未上傳</font>":"<font color=blue>已上傳</font>，檔名：<a href='".$file_path.$a1_2."' target='_new'>$a1_2</a>");?><br />
			<div style="display:<?=($page3_warning == '')?'none':''; //空白就不顯示?>;">
			目標學生名冊：<? echo ($point2 == ''?"<font color=red>未上傳</font>":"<font color=blue>已上傳</font>，檔名：<a href='".$file_path2.$point2."' target='_new'>$point2</a>");?><br />
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
<!--結束 -->
<script language="JavaScript">

	function toCheck() 
	{
		if ( document.form.edu_p1_times.value == "" ) 
		{
			alert("請填寫「親職講座預計辦理場次」！");
			document.form.edu_p1_times.focus();
			return false;
		}
		if ( document.form.edu_p2_people.value == "" ) 
		{
			alert("請填寫「家庭訪視預計訪視人次」！");
			document.form.edu_p2_people.focus();
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
				//雜支					
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
	
	//計算家庭訪視金額
	function Count_family(obj)
	{
		var edu_p2_people = document.getElementsByName("edu_p2_people")[0];
		//驗證輸入的資料是否為數字 
		var regex = /^[0-9]*$/;
		if (!(regex.test(edu_p2_people.value)))
		{
			alert('「家庭訪視人次」必須為數字');
			edu_p2_people.value = "";
			edu_p2_people.focus();
		}
		else
		{
			if (edu_p2_people.value == "")
				edu_p2_people.value = 0;
				
			document.getElementsByName("edu_p2_money")[0].value = parseInt(edu_p2_people.value) * 200;
			
			count_all();
		}
		
	}
	
	//計算總金額
	function count_all()
	{
		var edu_total_money = document.getElementsByName('edu_total_money')[0]; //總金額
		var i;
		
		edu_total_money.value = 0;
		
		//補一只有特色一的部分要計算細項
		var edu_p1_money = document.getElementsByName('edu_p1_money')[0];
		edu_p1_money.value = 0;
		for(j = 1;j <= 10;j++) //計算各特色經常 & 資本，
		{
			var edu_money = document.getElementsByName('p1_edu_money_' + j)[0]; //金額
			
			if(edu_money != null)
				edu_p1_money.value = parseInt(edu_p1_money.value) + parseInt(edu_money.value);
		}
		
		var edu_p2_money = document.getElementsByName('edu_p2_money')[0]; 
		
		edu_total_money.value = parseInt(edu_p1_money.value) + parseInt(edu_p2_money.value);
		
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
			NewOpt[3] = new Option("場地費");
			NewOpt[4] = new Option("誤餐費");
			NewOpt[5] = new Option("講義文件費");
			NewOpt[6] = new Option("加班費");
			NewOpt[7] = new Option("其他");
		}

		if (selectName == "資本門") //補一沒資本門
		{
			NewOpt[0] = new Option("");
		}

		newnum = NewOpt.length;
		
		var p = left(obj.id,3); //取得p1_ or p2_
		
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