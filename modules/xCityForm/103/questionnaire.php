<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	
	$school_year = 103; //為學年度
	
	$get_id = $_GET['id'];
	
	if($get_id != "")
		$username = $get_id;
		
	//如果沒資料，先新增
	$cnt_sql = " SELECT seq_no FROM questionnaire_103 where account = '$username' ";
	$result = mysql_query($cnt_sql);
	$num_rows = mysql_num_rows($result);
	if($num_rows == 0) //沒資料
	{
		$insert_sql = "insert into questionnaire_103 (account) ".
					  "                     values ('$username'); ";
		mysql_query($insert_sql);
	}
	
	//教育部核定金額
	$sql = " select sd.account as sd_account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   //補一
		   "      , a1.s_p1_money as a1_s_p1_money ".
		   "      , a1.s_p2_money as a1_s_p2_money ".
		   "      , a1.s_total_money as a1_s_total_money ".
		   
		   //補二
		   "      , a2.s_total_money as a2_s_total_money ".
		   
		   //補三
		   "      , a3.s_total_money as a3_s_total_money ".
		   
		   //補四
		   "      , a4.s_total_money as a4_s_total_money ".
		   
		   //補五
		   "      , a5.s_total_money as a5_s_total_money ".
		   
		   //補六
		   "      , a6.s_total_money as a6_s_total_money ".
		   "      , a6.item as a6_item ".
		   
		   //補七
		   "      , a7.s_total_money as a7_s_total_money ".
		   
		   "      , q103.* ".
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join alc_parenting_education as a1 on sy.seq_no = a1.sy_seq ".
		   "                       left join alc_education_features as a2 on sy.seq_no = a2.sy_seq ".
		   "                       left join alc_repair_dormitory as a3 on sy.seq_no = a3.sy_seq ".
		   "                       left join alc_teaching_equipment as a4 on sy.seq_no = a4.sy_seq ".
		   "                       left join alc_aboriginal_education as a5 on sy.seq_no = a5.sy_seq ".
		   "                       left join alc_transport_car as a6 on sy.seq_no = a6.sy_seq ".
		   "                       left join alc_school_activity as a7 on sy.seq_no = a7.sy_seq ".
		   "                       left join questionnaire_103 as q103 on q103.account = sd.account ".
		   
		   " where sy.school_year = '$school_year' ".
		   "   and sd.account = '$username' ";
	//echo "<br />".$sql."<br />";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$account = $row['sd_account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];
		$area = $row['area'];
		
		$student = $row['student'];
		$teacher = $row['teacher'];
		$class_total = $row['class_total'];
		
		$a1_s_p1_money = ($row['a1_s_p1_money'] == '')?0:$row['a1_s_p1_money'];
		$a1_s_p2_money = ($row['a1_s_p2_money'] == '')?0:$row['a1_s_p2_money'];
		$a1_s_total_money = ($row['a1_s_total_money'] == '')?0:$row['a1_s_total_money'];
		
		$a2_s_total_money = ($row['a2_s_total_money'] == '')?0:$row['a2_s_total_money'];
		
		$a3_s_total_money = ($row['a3_s_total_money'] == '')?0:$row['a3_s_total_money'];
		
		$a4_s_total_money = ($row['a4_s_total_money'] == '')?0:$row['a4_s_total_money'];
		
		$a5_s_total_money = ($row['a5_s_total_money'] == '')?0:$row['a5_s_total_money'];
		
		$a6_item = $row['a6_item'];
		$a6_s_total_money = ($row['a6_s_total_money'] == '')?0:$row['a6_s_total_money'];
		
		$a7_s_total_money = ($row['a7_s_total_money'] == '')?0:$row['a7_s_total_money'];
		
		$q1_1 = $row['q1_1'];
		$q2_1 = $row['q2_1'];
		$q3_1 = $row['q3_1'];
		$q4_1 = $row['q4_1'];
		$q5_1 = $row['q5_1'];
		
		$q6_1 = $row['q6_1'];
		$q6_2 = $row['q6_2'];
		$q6_3 = $row['q6_3'];
		$q6_4 = $row['q6_4'];
		$q6_5 = $row['q6_5'];
		
		$q7_1 = $row['q7_1'];
		$q7_2 = $row['q7_2'];
		$q7_3 = $row['q7_3'];
		$q7_4 = $row['q7_4'];
		$q7_2_other = $row['q7_2_other'];
		$q7_3_other = $row['q7_3_other'];
				
		$q8_1 = $row['q8_1'];
		$q8_2 = $row['q8_2'];
		$q8_3 = $row['q8_3'];
		$q8_4 = $row['q8_4'];
		$q8_2_other = $row['q8_2_other'];
		$q8_3_other = $row['q8_3_other'];
		
		$q9_1 = $row['q9_1'];
		$q9_2 = $row['q9_2'];
		$q9_3 = $row['q9_3'];
		$q9_4 = $row['q9_4'];
		$q9_2_other = $row['q9_2_other'];
		$q9_3_other = $row['q9_3_other'];
		
		$q10_1 = $row['q10_1'];
		$q10_2 = $row['q10_2'];
		$q10_3 = $row['q10_3'];
		$q10_4 = $row['q10_4'];
		$q10_2_other = $row['q10_2_other'];
		$q10_3_other = $row['q10_3_other'];
		
		$q11_1 = $row['q11_1'];
		$q11_2 = $row['q11_2'];
		$q11_3 = $row['q11_3'];
		$q11_4 = $row['q11_4'];
		$q11_5 = $row['q11_5'];
		$q11_3_other = $row['q11_3_other'];
		$q11_4_other = $row['q11_4_other'];
		
		$q12_1 = $row['q12_1'];
		$q12_2 = $row['q12_2'];
		$q12_3 = $row['q12_3'];
		$q12_2_other = $row['q12_2_other'];
		$q12_3_other = $row['q12_3_other'];
		
		$q13_1 = $row['q13_1'];
		$q14_1 = $row['q14_1'];
		$q15_1 = $row['q15_1'];
		
		$fill_date = $row['fill_date'];
		
		//把字串分割成array
		$q5_1_ary = explode(",", $q5_1);
				
		//測試用
		/*
		for($i = 1;$i <= 7;$i++)
		{
			${'a'.$i.'_s_total_money'} = 1;
		}
		*/
		
	}
				
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
	.bg_title
	{ 
		background-color:#FFCECD; 
	}
	
	.bg_content1
	{ 
		background-color:#EECDE5; 
	} 
	
	.bg_content2
	{ 
		background-color:#DEFFF8; 
	} 
	
	.bg_content3
	{ 
		background-color:#DFDEFF; 
	} 
</style> 
<INPUT TYPE="button" VALUE="返回學校功能選單" onClick="location='../school_index.php'"><br />
<p><font color="blue"><strong>國民中小學執行<?=$school_year;?>年度「教育部推動教育優先區計畫」成效評估調查問卷</strong></font>
<form name="form" method="post" action="questionnaire_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return add_crlf();">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td class="bg_title">壹、基本資料</td>
	</tr>
	<tr>
		<td class="bg_content1">學校名稱：
			<?=$cityname.$district.$schoolname;?>，學生數：<?=$student;?>人，教師數：<?=$teacher;?>
		</td>
	</tr>
	<tr>
		<td class="bg_content1">學校規模：
			<?
				switch($class_total) 
				{ 
					case $class_total <= 6:
						echo "6班以下";
						break;
					case (($class_total >= 7) && ($class_total <= 12)):
						echo "7-12班";
						break;
					case (($class_total >= 13) && ($class_total <= 24)):
						echo "13-24班";
						break;
					case $class_total >= 25:
						echo "25班以上";
						break;
					default:
						echo "無貴校所在區域資料，請聯繫教育局(處)承辦人更新資料，謝謝";
				}
			?>
		</td>
	</tr>
	<tr>
		<td class="bg_content1">學校類型：
			<?
				switch($area) 
				{ 
					case "1":
						echo "離島";
						break;
					case "2":
						echo "偏遠";
						break;
					case "3":
						echo "一般";
						break;
					case "4":
						echo "都會";
						break;
					default:
						echo "無貴校所在區域資料，請聯繫教育局(處)承辦人更新資料，謝謝";
				}
			?>
		</td>
	</tr>
	<tr>
		<td><hr /></td>
	</tr>
	<tr>
		<td class="bg_title">貳、問卷內容</td>
	</tr>
	<tr>
		<td class="bg_content2">
			一、您認為教育局(處)辦理教育優先區計畫說明會，是否能讓貴校充份了解教育優先區計畫目標內容？<br />
			<input type="radio" name="q1_1"  value="Y" <?=(($q1_1 == 'Y')?"checked":"");?> onclick="return false;" />是<br />
			<input type="radio" name="q1_1"  value="N" <?=(($q1_1 == 'N')?"checked":"");?> onclick="return false;" />否
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content3">
			二、您認為教育局(處)辦理教育優先區計畫說明會，是否能讓貴校充份了解教育優先區計畫各項指標之內涵？<br />
			<input type="radio" name="q2_1"  value="Y" <?=(($q2_1 == 'Y')?"checked":"");?> onclick="return false;" />是<br />
			<input type="radio" name="q2_1"  value="N" <?=(($q2_1 == 'N')?"checked":"");?> onclick="return false;" />否
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content2">
			三、您認為教育局(處)辦理教育優先區計畫說明會，是否能讓貴校充份了解教育優先區計畫各項補助？<br />
			<input type="radio" name="q3_1"  value="Y" <?=(($q3_1 == 'Y')?"checked":"");?> onclick="return false;" />是<br />
			<input type="radio" name="q3_1"  value="N" <?=(($q3_1 == 'N')?"checked":"");?> onclick="return false;" />否
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content3">
			四、您認為教育局(處)辦理教育優先區計畫說明會，是否能讓貴校充份了解教育優先區計畫各流程之申請期程？<br />
			<input type="radio" name="q4_1"  value="Y" <?=(($q4_1 == 'Y')?"checked":"");?> onclick="return false;" />是<br />
			<input type="radio" name="q4_1"  value="N" <?=(($q4_1 == 'N')?"checked":"");?> onclick="return false;" />否
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content2">
			五、您覺得本計畫各項補助中，對改善教育問題、提昇教育品質，最有績效的是：(至少1項，最多4項)<br />
			<input type="checkbox" name="q5_1"  value="1" <?=(in_array('1',$q5_1_ary)?'checked':'');?> onclick="return false;" />推展親職教育活動<br />
			<input type="checkbox" name="q5_2"  value="2" <?=(in_array('2',$q5_1_ary)?'checked':'');?> onclick="return false;" />補助學校發展教育特色<br />
			<input type="checkbox" name="q5_3"  value="3" <?=(in_array('3',$q5_1_ary)?'checked':'');?> onclick="return false;" />修繕離島或偏遠地區師生宿舍<br />
			<input type="checkbox" name="q5_4"  value="4" <?=(in_array('4',$q5_1_ary)?'checked':'');?> onclick="return false;" />充實學校基本教學設備<br />
			<input type="checkbox" name="q5_5"  value="5" <?=(in_array('5',$q5_1_ary)?'checked':'');?> onclick="return false;" />發展原住民教育文化特色及充實設備器材<br />
			<input type="checkbox" name="q5_6"  value="6" <?=(in_array('6',$q5_1_ary)?'checked':'');?> onclick="return false;" />補助交通不便地區交通車(費)<br />
			<input type="checkbox" name="q5_7"  value="7" <?=(in_array('7',$q5_1_ary)?'checked':'');?> onclick="return false;" />整建學校社區化活動場所
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content3" style="white-space: nowrap">
			六、對教育優先區計畫補助「推展親職教育活動」的看法：<br />
			<?
				if($a1_s_total_money == 0)
				{
					echo "<font color='blue'>※貴校未申請此項補助，無需填寫問題「六」。</font><p>";
				}
				else
				{
					if($a1_s_p1_money > 0 && $a1_s_p2_money == 0)
						$str = "1";
					if($a1_s_p1_money == 0 && $a1_s_p2_money > 0)
						$str = "2";
					if($a1_s_p1_money > 0 && $a1_s_p2_money > 0)
						$str = "3";
					
			?>
			1、貴校辦理「親職教育活動」包括哪些項目內容？<font color='blue'>(此項自動帶出)</font><br />
			<input type="radio" name="q6_1"  value="1" onclick="return false;" <?=(($str == '1')?"checked":"");?>/>親職教育講座<br />
			<input type="radio" name="q6_1"  value="2" onclick="return false;" <?=(($str == '2')?"checked":"");?>/>個案家庭輔導<br />
			<input type="radio" name="q6_1"  value="3" onclick="return false;" <?=(($str == '3')?"checked":"");?>/>兩者皆有<br />
			<p>
			2、您認為辦理「推展親職教育活動」最能提升下列哪一項指標對象的教育品質：<br />
			<input type="radio" name="q6_2"  value="1" <?=(($q6_2 == '1')?"checked":"");?> onclick="return false;" />原住民學生比例偏高之學校<br />
			<input type="radio" name="q6_2"  value="2" <?=(($q6_2 == '2')?"checked":"");?> onclick="return false;" />低收入戶、隔代教養、單（寄）親家庭、親子年齡差距過大之學生比例偏高之學校<br />
			<input type="radio" name="q6_2"  value="3" <?=(($q6_2 == '3')?"checked":"");?> onclick="return false;" />中途輟學率偏高之學校<br />
			<input type="radio" name="q6_2"  value="4" <?=(($q6_2 == '4')?"checked":"");?> onclick="return false;" />離島或偏遠交通不便之學校<br />
			<p>
			3、您認為貴校辦理「推展親職教育活動」最大的特色：<br />
			<input type="radio" name="q6_3"  value="1" <?=(($q6_3 == '1')?"checked":"");?> onclick="return false;" />提升父母知能 <br />
			<input type="radio" name="q6_3"  value="2" <?=(($q6_3 == '2')?"checked":"");?> onclick="return false;" />強化學校與家庭聯繫<br />
			<input type="radio" name="q6_3"  value="3" <?=(($q6_3 == '3')?"checked":"");?> onclick="return false;" />增進親子關係<br />
			<input type="radio" name="q6_3"  value="4" <?=(($q6_3 == '4')?"checked":"");?> onclick="return false;" />提升家長終身學習的理念<br />
			<p>
			4、您認為貴校辦理「推展親職教育活動」最大的問題：<br />
			<input type="radio" name="q6_4"  value="1" <?=(($q6_4 == '1')?"checked":"");?> onclick="return false;" />家長參加的意願不高<br />
			<input type="radio" name="q6_4"  value="2" <?=(($q6_4 == '2')?"checked":"");?> onclick="return false;" />補助經費不夠<br />
			<input type="radio" name="q6_4"  value="3" <?=(($q6_4 == '3')?"checked":"");?> onclick="return false;" />經費運用限制太多<br />
			<input type="radio" name="q6_4"  value="4" <?=(($q6_4 == '4')?"checked":"");?> onclick="return false;" />活動內容限制太多<br />
			<p>
			5、您認為辦理「推展親職教育活動」對於提升學校教育品質的成效：<br />
			<input type="radio" name="q6_5"  value="1" <?=(($q6_5 == '1')?"checked":"");?> onclick="return false;" />滿意<br />
			<input type="radio" name="q6_5"  value="2" <?=(($q6_5 == '2')?"checked":"");?> onclick="return false;" />普通<br />
			<input type="radio" name="q6_5"  value="3" <?=(($q6_5 == '3')?"checked":"");?> onclick="return false;" />不滿意<br />
			<?
				}
			?>
		</td>
	</tr>
	<tr>
		<td class="bg_content2" >
			七、您對本計畫補助「學校發展教育特色」的看法：<br />
			<?
				if($a2_s_total_money == 0)
				{
					echo "<font color='blue'>※貴校未申請此項補助，無需填寫問題「七」。</font><p>";
				}
				else
				{
					
			?>
			1、您認為辦理本項活動對下列哪一項指標對象最有幫助?<br />
			<input type="radio" name="q7_1"  value="1" <?=(($q7_1 == '1')?"checked":"");?> onclick="return false;" />低收入戶、隔代教養、單（寄）親家庭、親子年齡差距過大之學生比例偏高之學校<br />
			<input type="radio" name="q7_1"  value="2" <?=(($q7_1 == '2')?"checked":"");?> onclick="return false;" />中途輟學率偏高之學校<br />
			<input type="radio" name="q7_1"  value="3" <?=(($q7_1 == '3')?"checked":"");?> onclick="return false;" />離島或偏遠交通不便之學校<br />
			<p>
			2、您認為貴校辦理「學校發展教育特色」最大的效益是什麼?<br />
			<input type="radio" name="q7_2"  value="1" <?=(($q7_2 == '1')?"checked":"");?> onclick="return false;" />提升學校知名度<br />
			<input type="radio" name="q7_2"  value="2" <?=(($q7_2 == '2')?"checked":"");?> onclick="return false;" />培養學生才藝專長<br />
			<input type="radio" name="q7_2"  value="3" <?=(($q7_2 == '3')?"checked":"");?> onclick="return false;" />增進學生多元學習<br />
			<input type="radio" name="q7_2"  value="4" <?=(($q7_2 == '4')?"checked":"");?> onclick="return false;" />培養學生休閒活動習慣<br />
			<input type="radio" name="q7_2"  value="5" <?=(($q7_2 == '5')?"checked":"");?> onclick="return false;" />其他：<input type="text" readonly size="12" name="q7_2_other" value="<?=$q7_2_other;?>"><br />
			<p>
			3、您認為貴校辦理「學校發展教育特色」最大的問題是什麼?<br />
			<input type="radio" name="q7_3"  value="1" <?=(($q7_3 == '1')?"checked":"");?> onclick="return false;" />專長教師不足<br />
			<input type="radio" name="q7_3"  value="2" <?=(($q7_3 == '2')?"checked":"");?> onclick="return false;" />補助經費不足<br />
			<input type="radio" name="q7_3"  value="3" <?=(($q7_3 == '3')?"checked":"");?> onclick="return false;" />學生參加意願不高<br />
			<input type="radio" name="q7_3"  value="4" <?=(($q7_3 == '4')?"checked":"");?> onclick="return false;" />家長配合度不夠<br />
			<input type="radio" name="q7_3"  value="5" <?=(($q7_3 == '5')?"checked":"");?> onclick="return false;" />其他：<input type="text" readonly size="12" name="q7_3_other" value="<?=$q7_3_other;?>"><br />
			<p>
			4、您認為辦理「學校發展教育特色」對於提升學校教育品質的成效如何?<br />
			<input type="radio" name="q7_4"  value="1" <?=(($q7_4 == '1')?"checked":"");?> onclick="return false;" />滿意<br />
			<input type="radio" name="q7_4"  value="2" <?=(($q7_4 == '2')?"checked":"");?> onclick="return false;" />普通<br />
			<input type="radio" name="q7_4"  value="3" <?=(($q7_4 == '3')?"checked":"");?> onclick="return false;" />不滿意<br />
			<?
				}
			?>
		</td>
	</tr>
	<tr>
		<td class="bg_content3" >
			八、對本計畫補助「修繕離島或偏遠地區師生宿舍」的看法：<br />
			<?
				if($a3_s_total_money == 0)
				{
					echo "<font color='blue'>※貴校未申請此項補助，無需填寫問題「八」。</font><p>";
				}
				else
				{
					
			?>
			1、您認為辦理「修繕離島或偏遠地區師生宿舍」對下列哪一項指標對象最有幫助?<br />
			<input type="radio" name="q8_1"  value="1" <?=(($q8_1 == '1')?"checked":"");?> onclick="return false;" />原住民學生比例偏高之學校<br />
			<input type="radio" name="q8_1"  value="2" <?=(($q8_1 == '2')?"checked":"");?> onclick="return false;" />離島或偏遠交通不便之學校<br />
			<input type="radio" name="q8_1"  value="3" <?=(($q8_1 == '3')?"checked":"");?> onclick="return false;" />教師流動率及代理教師比例偏高之學校<br />
			<p>
			2、您認為貴校辦理「修繕離島或偏遠地區師生宿舍」最大的效益是什麼?<br />
			<input type="radio" name="q8_2"  value="1" <?=(($q8_2 == '1')?"checked":"");?> onclick="return false;" />解決教師宿舍問題<br />
			<input type="radio" name="q8_2"  value="2" <?=(($q8_2 == '2')?"checked":"");?> onclick="return false;" />提昇教師服務熱忱<br />
			<input type="radio" name="q8_2"  value="3" <?=(($q8_2 == '3')?"checked":"");?> onclick="return false;" />增進教師人事穩定<br />
			<input type="radio" name="q8_2"  value="4" <?=(($q8_2 == '4')?"checked":"");?> onclick="return false;" />提供學生生活協助及學習輔導<br />
			<input type="radio" name="q8_2"  value="5" <?=(($q8_2 == '5')?"checked":"");?> onclick="return false;" />其他：<input type="text" readonly size="12" name="q8_2_other" value="<?=$q8_2_other;?>"><br />
			<p>
			3、您認為貴校辦理「修繕離島或偏遠地區師生宿舍」最大的問題是什麼?<br />
			<input type="radio" name="q8_3"  value="1" <?=(($q8_3 == '1')?"checked":"");?> onclick="return false;" />無法改善教師流動率<br />
			<input type="radio" name="q8_3"  value="2" <?=(($q8_3 == '2')?"checked":"");?> onclick="return false;" />補助經費不足<br />
			<input type="radio" name="q8_3"  value="3" <?=(($q8_3 == '3')?"checked":"");?> onclick="return false;" />教師住宿意願不高<br />
			<input type="radio" name="q8_3"  value="4" <?=(($q8_3 == '4')?"checked":"");?> onclick="return false;" />學生住宿增加學校負擔<br />
			<input type="radio" name="q8_3"  value="5" <?=(($q8_3 == '5')?"checked":"");?> onclick="return false;" />其他：<input type="text" readonly size="12" name="q8_3_other" value="<?=$q8_3_other;?>"><br />
			<p>
			4、您認為辦理「修繕離島或偏遠地區師生宿舍」對於提升學校教育品質的成效如何?<br />
			<input type="radio" name="q8_4"  value="1" <?=(($q8_4 == '1')?"checked":"");?> onclick="return false;" />滿意<br />
			<input type="radio" name="q8_4"  value="2" <?=(($q8_4 == '2')?"checked":"");?> onclick="return false;" />普通<br />
			<input type="radio" name="q8_4"  value="3" <?=(($q8_4 == '3')?"checked":"");?> onclick="return false;" />不滿意<br />
			<?
				}
			?>
		</td>
	</tr>
	<tr>
		<td class="bg_content2">
			九、對本計畫補助「充實學校基本教學設備」的看法：<br />
			<?
				if($a4_s_total_money == 0)
				{
					echo "<font color='blue'>※貴校未申請此項補助，無需填寫問題「九」。</font><p>";
				}
				else
				{
					
			?>
			1、您認為辦理「充實學校基本教學設備」對下列哪一項指標對象最有幫助?<br />
			<input type="radio" name="q9_1"  value="1" <?=(($q9_1 == '1')?"checked":"");?> onclick="return false;" />原住民學生比例偏高之學校<br />
			<input type="radio" name="q9_1"  value="2" <?=(($q9_1 == '2')?"checked":"");?> onclick="return false;" />國中學習弱勢學生比例偏高之學校<br />
			<input type="radio" name="q9_1"  value="3" <?=(($q9_1 == '3')?"checked":"");?> onclick="return false;" />離島或偏遠交通不便之學校<br />
			<p>
			2、您認為貴校辦理「充實學校基本教學設備」最大的效益是什麼?<br />
			<input type="radio" name="q9_2"  value="1" <?=(($q9_2 == '1')?"checked":"");?> onclick="return false;" />有效發揮教學資源效益<br />
			<input type="radio" name="q9_2"  value="2" <?=(($q9_2 == '2')?"checked":"");?> onclick="return false;" />增進教學效果<br />
			<input type="radio" name="q9_2"  value="3" <?=(($q9_2 == '3')?"checked":"");?> onclick="return false;" />提高學生學習興趣<br />
			<input type="radio" name="q9_2"  value="4" <?=(($q9_2 == '4')?"checked":"");?> onclick="return false;" />提升學校社區地位<br />
			<input type="radio" name="q9_2"  value="5" <?=(($q9_2 == '5')?"checked":"");?> onclick="return false;" />其他：<input type="text" readonly size="12" name="q9_2_other" value="<?=$q9_2_other;?>"><br />
			<p>
			3、您認為貴校辦理「充實學校基本教學設備」最大的問題是什麼?<br />
			<input type="radio" name="q9_3"  value="1" <?=(($q9_3 == '1')?"checked":"");?> onclick="return false;" />補助經費不足<br />
			<input type="radio" name="q9_3"  value="2" <?=(($q9_3 == '2')?"checked":"");?> onclick="return false;" />購置的設備不實用<br />
			<input type="radio" name="q9_3"  value="3" <?=(($q9_3 == '3')?"checked":"");?> onclick="return false;" />學校缺乏設備維護費<br />
			<input type="radio" name="q9_3"  value="4" <?=(($q9_3 == '4')?"checked":"");?> onclick="return false;" />其他：<input type="text" readonly size="12" name="q9_3_other" value="<?=$q9_3_other;?>"><br />
			<p>
			4、您認為辦理「充實學校基本教學設備」對於提升學校教育品質的成效如何?<br />
			<input type="radio" name="q9_4"  value="1" <?=(($q9_4 == '1')?"checked":"");?> onclick="return false;" />滿意<br />
			<input type="radio" name="q9_4"  value="2" <?=(($q9_4 == '2')?"checked":"");?> onclick="return false;" />普通<br />
			<input type="radio" name="q9_4"  value="3" <?=(($q9_4 == '3')?"checked":"");?> onclick="return false;" />不滿意<br />
			<?
				}
			?>
		</td>
	</tr>
	<tr>
		<td class="bg_content3">
			十、對本計畫補助「發展原住民教育文化特色及充實設備器材」的看法：<br />
			<?
				if($a5_s_total_money == 0)
				{
					echo "<font color='blue'>※貴校未申請此項補助，無需填寫問題「十」。</font><p>";
				}
				else
				{
					
			?>
			1、您認為辦理「發展原住民教育文化特色及充實設備器材」是否能改善學校「原住民學生比例偏高之學校」之教育品質？<br />
			<input type="radio" name="q10_1"  value="Y" <?=(($q10_1 == 'Y')?"checked":"");?> onclick="return false;" />是<br />
			<input type="radio" name="q10_1"  value="N" <?=(($q10_1 == 'N')?"checked":"");?> onclick="return false;" />否<br />
			<p>
			2、您認為貴校辦理「發展原住民教育文化特色及充實設備器材」最大的效益是什麼?<br />
			<input type="radio" name="q10_2"  value="1" <?=(($q10_2 == '1')?"checked":"");?> onclick="return false;" />傳承原住民文化<br />
			<input type="radio" name="q10_2"  value="2" <?=(($q10_2 == '2')?"checked":"");?> onclick="return false;" />建立學生自信心<br />
			<input type="radio" name="q10_2"  value="3" <?=(($q10_2 == '3')?"checked":"");?> onclick="return false;" />提高學生學習興趣<br />
			<input type="radio" name="q10_2"  value="4" <?=(($q10_2 == '4')?"checked":"");?> onclick="return false;" />提升學校社區地位<br />
			<input type="radio" name="q10_2"  value="5" <?=(($q10_2 == '5')?"checked":"");?> onclick="return false;" />其他：<input type="text" readonly size="12" name="q10_2_other" value="<?=$q10_2_other;?>"><br />
			<p>
			3、您認為貴校辦理「發展原住民教育文化特色及充實設備器材」最大的問題是什麼?：<br />
			<input type="radio" name="q10_3"  value="1" <?=(($q10_3 == '1')?"checked":"");?> onclick="return false;" />補助經費不足<br />
			<input type="radio" name="q10_3"  value="2" <?=(($q10_3 == '2')?"checked":"");?> onclick="return false;" />學生參加意願不高<br />
			<input type="radio" name="q10_3"  value="3" <?=(($q10_3 == '3')?"checked":"");?> onclick="return false;" />學校缺乏設備維護費<br />
			<input type="radio" name="q10_3"  value="4" <?=(($q10_3 == '4')?"checked":"");?> onclick="return false;" />缺乏專長教師<br />
			<input type="radio" name="q10_3"  value="5" <?=(($q10_3 == '5')?"checked":"");?> onclick="return false;" />其他：<input type="text" readonly size="12" name="q10_3_other" value="<?=$q10_3_other;?>"><br />
			<p>
			4、您認為辦理「發展原住民教育文化特色及充實設備器材」對於提升學校教育品質的成效如何?<br />
			<input type="radio" name="q10_4"  value="1" <?=(($q10_4 == '1')?"checked":"");?> onclick="return false;" />滿意<br />
			<input type="radio" name="q10_4"  value="2" <?=(($q10_4 == '2')?"checked":"");?> onclick="return false;" />普通<br />
			<input type="radio" name="q10_4"  value="3" <?=(($q10_4 == '3')?"checked":"");?> onclick="return false;" />不滿意<br />
			<?
				}
			?>
		</td>
	</tr>
	<tr>
		<td class="bg_content2">
			十一、對本計畫補助「交通不便地區學校交通車」的看法：<br />
			<?
				if($a6_s_total_money == 0)
				{
					echo "<font color='blue'>※貴校未申請此項補助，無需填寫問題「十一」。</font><p>";
				}
				else
				{
				
			?>
			1、貴校申請「交通不便地區學校交通車」包括哪些項目內容？<font color='blue'>(此項自動帶出)</font><br />
			<input type="radio" name="q11_1"  value="1" onclick="return false;" <?=(($a6_item == '租車費')?"checked":"");?>/>補助租車費<br />
			<input type="radio" name="q11_1"  value="2" onclick="return false;" <?=(($a6_item == '交通費')?"checked":"");?>/>補助交通費<br />
			<input type="radio" name="q11_1"  value="3" onclick="return false;" <?=(($a6_item == '購置交通車')?"checked":"");?>/>補助購置交通車<br />
			<p>
			2、您認為辦理本項計畫是否能改善「離島或偏遠交通不便之學校」的教育品質?<br />
			<input type="radio" name="q11_2"  value="Y" <?=(($q11_2 == 'Y')?"checked":"");?> onclick="return false;" />是<br />
			<input type="radio" name="q11_2"  value="N" <?=(($q11_2 == 'N')?"checked":"");?> onclick="return false;" />否<br />
			<p>
			3、您認為貴校申請「交通不便地區學校交通車」最大的效益是什麼?<br />
			<input type="radio" name="q11_3"  value="1" <?=(($q11_3 == '1')?"checked":"");?> onclick="return false;" />減輕家長經濟負擔<br />
			<input type="radio" name="q11_3"  value="2" <?=(($q11_3 == '2')?"checked":"");?> onclick="return false;" />提高學生上學意願<br />
			<input type="radio" name="q11_3"  value="3" <?=(($q11_3 == '3')?"checked":"");?> onclick="return false;" />有效降低學校的中輟率<br />
			<input type="radio" name="q11_3"  value="4" <?=(($q11_3 == '4')?"checked":"");?> onclick="return false;" />提供學童上學的人身安全<br />
			<input type="radio" name="q11_3"  value="5" <?=(($q11_3 == '5')?"checked":"");?> onclick="return false;" />提供學生學習視野<br />
			<input type="radio" name="q11_3"  value="6" <?=(($q11_3 == '6')?"checked":"");?> onclick="return false;" />其他：<input type="text" readonly size="12" name="q11_3_other" value="<?=$q11_3_other;?>"><br />
			<p>
			4、您認為貴校申請「交通不便地區學校交通車」遭遇的問題困境是什麼?：<br />
			<input type="radio" name="q11_4"  value="1" <?=(($q11_4 == '1')?"checked":"");?> onclick="return false;" />補助之經費不足<br />
			<input type="radio" name="q11_4"  value="2" <?=(($q11_4 == '2')?"checked":"");?> onclick="return false;" />購置之交通車不實用<br />
			<input type="radio" name="q11_4"  value="3" <?=(($q11_4 == '3')?"checked":"");?> onclick="return false;" />學校設備維護費不足<br />
			<input type="radio" name="q11_4"  value="4" <?=(($q11_4 == '4')?"checked":"");?> onclick="return false;" />司機管理問題<br />
			<input type="radio" name="q11_4"  value="5" <?=(($q11_4 == '5')?"checked":"");?> onclick="return false;" />沒有車庫<br />
			<input type="radio" name="q11_4"  value="6" <?=(($q11_4 == '6')?"checked":"");?> onclick="return false;" />其他：<input type="text" readonly size="12" name="q11_4_other" value="<?=$q11_4_other;?>"><br />
			<p>
			5、您對於貴校申請「交通不便地區學校交通車」的成效評估如何?<br />
			<input type="radio" name="q11_5"  value="1" <?=(($q11_5 == '1')?"checked":"");?> onclick="return false;" />滿意<br />
			<input type="radio" name="q11_5"  value="2" <?=(($q11_5 == '2')?"checked":"");?> onclick="return false;" />普通<br />
			<input type="radio" name="q11_5"  value="3" <?=(($q11_5 == '3')?"checked":"");?> onclick="return false;" />不滿意<br />
			<?
				}
			?>
		</td>
	</tr>
	<tr>
		<td class="bg_content3">
			十二、對本計畫補助「整修學校社區化活動場所」的看法：<br />
			<?
				if($a7_s_total_money == 0)
				{
					echo "<font color='blue'>※貴校未申請此項補助，無需填寫問題「十二」。</font><p>";
				}
				else
				{
				
			?>
			1、您認為辦理「整修學校社區化活動場所」對下列哪一項指標對象最有幫助?<br />
			<input type="radio" name="q12_1"  value="1" <?=(($q12_1 == '1')?"checked":"");?> onclick="return false;" />原住民學生比例偏高之學校<br />
			<input type="radio" name="q12_1"  value="2" <?=(($q12_1 == '2')?"checked":"");?> onclick="return false;" />低收入戶、隔代教養、單（寄）親家庭、親子年齡差距過大之學生比例偏高之學校<br />
			<input type="radio" name="q12_1"  value="3" <?=(($q12_1 == '3')?"checked":"");?> onclick="return false;" />中途輟學率偏高之學校<br />
			<p>
			2、您認為貴校辦理「整修學校社區化活動場所」最大的效益是什麼?<br />
			<input type="radio" name="q12_2"  value="1" <?=(($q12_2 == '1')?"checked":"");?> onclick="return false;" />活絡學校教育活動<br />
			<input type="radio" name="q12_2"  value="2" <?=(($q12_2 == '2')?"checked":"");?> onclick="return false;" />提高學生學習成效<br />
			<input type="radio" name="q12_2"  value="3" <?=(($q12_2 == '3')?"checked":"");?> onclick="return false;" />增進學校社區化的活動效益<br />
			<input type="radio" name="q12_2"  value="4" <?=(($q12_2 == '4')?"checked":"");?> onclick="return false;" />提供多元化的學習空間<br />
			<input type="radio" name="q12_2"  value="5" <?=(($q12_2 == '5')?"checked":"");?> onclick="return false;" />其他：<input type="text" readonly size="12" name="q12_2_other" value="<?=$q12_2_other;?>"><br />
			<p>            
			3、您認為貴校辦理「整修學校社區化活動場所」遭遇的問題困境是什麼?<br />
			<input type="radio" name="q12_3"  value="1" <?=(($q12_3 == '1')?"checked":"");?> onclick="return false;" />補助之經費不足<br />
			<input type="radio" name="q12_3"  value="2" <?=(($q12_3 == '2')?"checked":"");?> onclick="return false;" />整建之學校社區化活動場所不實用<br />
			<input type="radio" name="q12_3"  value="3" <?=(($q12_3 == '3')?"checked":"");?> onclick="return false;" />缺乏專任管理人員<br />
			<input type="radio" name="q12_3"  value="4" <?=(($q12_3 == '4')?"checked":"");?> onclick="return false;" />社區租用太頻繁<br />
			<input type="radio" name="q12_3"  value="5" <?=(($q12_3 == '5')?"checked":"");?> onclick="return false;" />其他：<input type="text" readonly size="12" name="q12_3_other" value="<?=$q12_3_other;?>"><br />
			<?
				}
			?>
		</td>
	</tr>
	<tr>
		<td class="bg_content2">
			十三、您對於貴校103年度本項計畫的執行成效，看法如何?<br />
			<input type="radio" name="q13_1"  value="1" <?=(($q13_1 == '1')?"checked":"");?> onclick="return false;" />滿意<br />
			<input type="radio" name="q13_1"  value="2" <?=(($q13_1 == '2')?"checked":"");?> onclick="return false;" />普通<br />
			<input type="radio" name="q13_1"  value="3" <?=(($q13_1 == '3')?"checked":"");?> onclick="return false;" />不滿意<br />
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content3">
			十四、您對於本計畫縣市初審及教育部複審之審查流程，看法如何？<br />
			<input type="radio" name="q14_1"  value="1" <?=(($q14_1 == '1')?"checked":"");?> onclick="return false;" />滿意<br />
			<input type="radio" name="q14_1"  value="2" <?=(($q14_1 == '2')?"checked":"");?> onclick="return false;" />普通<br />
			<input type="radio" name="q14_1"  value="3" <?=(($q14_1 == '3')?"checked":"");?> onclick="return false;" />不滿意<br />
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content2">
			十五、您對於本計畫整體的建議？（例如指標界定、補助項目、行政流程等）<br />
			<textarea readonly name="q15_1" cols="75" rows="10"><?=$q15_1;?></textarea>
			<p>
		</td>
	</tr>
	<tr>
		<td>
			感謝您寶貴的意見！
			<p>
		</td>
	</tr>
</table>
<INPUT TYPE="button" VALUE="回上一頁" onclick="history.go(-1)">
<!--結束 -->
<script language="JavaScript">

	function toCheck() 
	{
		var i;
		var flag = 1;
		var errmsg = "";
		
		var a1_money = <?=$a1_s_total_money;?>;
		var a2_money = <?=$a2_s_total_money;?>;
		var a3_money = <?=$a3_s_total_money;?>;
		var a4_money = <?=$a4_s_total_money;?>;
		var a5_money = <?=$a5_s_total_money;?>;
		var a6_money = <?=$a6_s_total_money;?>;
		var a7_money = <?=$a7_s_total_money;?>;
		
		if(chk_radio('q1_1') == 0)
		{
			errmsg += "問題「一」尚未選擇\n";
			flag = 0;
		}
		if(chk_radio('q2_1') == 0)
		{
			errmsg += "問題「二」尚未選擇\n";
			flag = 0;
		}
		if(chk_radio('q3_1') == 0)
		{
			errmsg += "問題「三」尚未選擇\n";
			flag = 0;
		}
		if(chk_radio('q4_1') == 0)
		{
			errmsg += "問題「四」尚未選擇\n";
			flag = 0;
		}
			
		//5
		var cnt_5 = 0;
		for(i = 1;i <= 7;i++)
		{
			if(document.getElementsByName("q5_" + i)[0].checked == true)
				cnt_5++;
		}
		if(cnt_5 < 1 || cnt_5 > 4)
		{
			errmsg += "問題「五」只能選擇1~4個項目\n";
			flag = 0;
		}
			
		//6
		if(a1_money > 0)
		{
			if(chk_radio('q6_2') == 0)
			{
				errmsg += "問題「六-2」尚未選擇\n";
				flag = 0;
			}
			if(chk_radio('q6_3') == 0)
			{
				errmsg += "問題「六-3」尚未選擇\n";
				flag = 0;
			}
			if(chk_radio('q6_4') == 0)
			{
				errmsg += "問題「六-4」尚未選擇\n";
				flag = 0;
			}
			if(chk_radio('q6_5') == 0)
			{
				errmsg += "問題「六-5」尚未選擇\n";
				flag = 0;
			}
		}
			
		//7
		if(a2_money > 0)
		{
			if(chk_radio('q7_1') == 0)
			{
				errmsg += "問題「七-1」尚未選擇\n";
				flag = 0;
			}
			if(chk_radio('q7_2') == 0)
			{
				errmsg += "問題「七-2」尚未選擇\n";
				flag = 0;
			}
			if(chk_radio('q7_3') == 0)
			{
				errmsg += "問題「七-3」尚未選擇\n";
				flag = 0;
			}
			if(chk_radio('q7_4') == 0)
			{
				errmsg += "問題「七-4」尚未選擇\n";
				flag = 0;
			}
		}
		
		//8
		if(a3_money > 0)
		{
			if(chk_radio('q8_1') == 0)
			{
				errmsg += "問題「八-1」尚未選擇\n";
				flag = 0;
			}
			if(chk_radio('q8_2') == 0)
			{
				errmsg += "問題「八-2」尚未選擇\n";
				flag = 0;
			}
			if(chk_radio('q8_3') == 0)
			{
				errmsg += "問題「八-3」尚未選擇\n";
				flag = 0;
			}
			if(chk_radio('q8_4') == 0)
			{
				errmsg += "問題「八-4」尚未選擇\n";
				flag = 0;
			}
		}
		
		//9
		if(a4_money > 0)
		{
			if(chk_radio('q9_1') == 0)
			{
				errmsg += "問題「九-1」尚未選擇\n";
				flag = 0;
			}
			if(chk_radio('q9_2') == 0)
			{
				errmsg += "問題「九-2」尚未選擇\n";
				flag = 0;
			}
			if(chk_radio('q9_3') == 0)
			{
				errmsg += "問題「九-3」尚未選擇\n";
				flag = 0;
			}
			if(chk_radio('q9_4') == 0)
			{
				errmsg += "問題「九-4」尚未選擇\n";
				flag = 0;
			}
		}
			
		//10
		if(a5_money > 0)
		{
			if(chk_radio('q10_1') == 0)
			{
				errmsg += "問題「十-1」尚未選擇\n";
				flag = 0;
			}
			if(chk_radio('q10_2') == 0)
			{
				errmsg += "問題「十-2」尚未選擇\n";
				flag = 0;
			}
			if(chk_radio('q10_3') == 0)
			{
				errmsg += "問題「十-3」尚未選擇\n";
				flag = 0;
			}
			if(chk_radio('q10_4') == 0)
			{
				errmsg += "問題「十-4」尚未選擇\n";
				flag = 0;
			}
		}
			
		//11
		if(a6_money > 0)
		{
			if(chk_radio('q11_2') == 0)
			{
				errmsg += "問題「十一-2」尚未選擇\n";
				flag = 0;
			}
			if(chk_radio('q11_3') == 0)
			{
				errmsg += "問題「十一-3」尚未選擇\n";
				flag = 0;
			}
			if(chk_radio('q11_4') == 0)
			{
				errmsg += "問題「十一-4」尚未選擇\n";
				flag = 0;
			}
			if(chk_radio('q11_5') == 0)
			{
				errmsg += "問題「十一-5」尚未選擇\n";
				flag = 0;
			}
		}
			
		//12
		if(a7_money > 0)
		{
			if(chk_radio('q12_1') == 0)
			{
				errmsg += "問題「十二-1」尚未選擇\n";
				flag = 0;
			}
			if(chk_radio('q12_2') == 0)
			{
				errmsg += "問題「十二-2」尚未選擇\n";
				flag = 0;
			}
			if(chk_radio('q12_3') == 0)
			{
				errmsg += "問題「十二-3」尚未選擇\n";
				flag = 0;
			}
		}
				
		if(chk_radio('q13_1') == 0)
		{
			errmsg += "問題「十三」尚未選擇\n";
			flag = 0;
		}
					
		if(chk_radio('q14_1') == 0)
		{
			errmsg += "問題「十四」尚未選擇\n";
			flag = 0;
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
	
	function chk_radio(radioName)
	{
		var x = 0;
		var cnt = 0;
		
		while(1)
		{
			obj = document.getElementsByName(radioName)[x];
			
			if(obj != null)
			{
				if(obj.checked == true)
					cnt++;
			}
			else
			{
				return cnt;
			}
				
			x++;
		}
	
	}
		
	//在textarea按Enter才有作用，其他方無用避免按了之後網頁直接送出
	function add_crlf()
	{
		var obj_text = document.getElementsByName('q15_1')[0];
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
	
</script> 
</form>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>