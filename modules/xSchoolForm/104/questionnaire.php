<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "../../function/config_for_104.php"; //本年度基本設定
	
	//$school_year = 104; //為學年度
		
	$get_id = $_GET['acc'];
	
	if($get_id != "")
		$username = $get_id;
		
	//如果沒資料，先新增
	$cnt_sql = " SELECT seq_no FROM questionnaire_104 where account = '$username' ";
	$result = mysql_query($cnt_sql);
	$num_rows = mysql_num_rows($result);
	if($num_rows == 0) //沒資料
	{
		$insert_sql = "insert into questionnaire_104 (account) ".
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
		   
		   "      , q104.* ".
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join alc_parenting_education as a1 on sy.seq_no = a1.sy_seq ".
		   "                       left join alc_education_features as a2 on sy.seq_no = a2.sy_seq ".
		   "                       left join alc_repair_dormitory as a3 on sy.seq_no = a3.sy_seq ".
		   "                       left join alc_teaching_equipment as a4 on sy.seq_no = a4.sy_seq ".
		   "                       left join alc_aboriginal_education as a5 on sy.seq_no = a5.sy_seq ".
		   "                       left join alc_transport_car as a6 on sy.seq_no = a6.sy_seq ".
		   "                       left join alc_school_activity as a7 on sy.seq_no = a7.sy_seq ".
		   "                       left join questionnaire_104 as q104 on q104.account = sd.account ".
		   
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
		$q1_1_other = $row['q1_1_other'];
		
		$q1_2 = $row['q1_2'];
		$q1_2_2 = $row['q1_2_2'];
		$q1_2_other = $row['q1_2_other'];
		
		$q1_3 = $row['q1_3'];
		$q1_3_other = $row['q1_3_other'];
		
		$q1_4 = $row['q1_4'];
		$q1_4_other = $row['q1_4_other'];
		
		$q1_5 = $row['q1_5'];
		$q1_5_other = $row['q1_5_other'];
		
		$q1_6 = $row['q1_6'];
		
		$q1_7 = $row['q1_7'];
		$q1_7_other = $row['q1_7_other'];
		
		$q2_1 = $row['q2_1'];
		
		$q2_2 = $row['q2_2'];
		$q2_2_other = $row['q2_2_other'];
		
		$q2_3 = $row['q2_3'];
		$q2_3_other = $row['q2_3_other'];
		
		$q2_4 = $row['q2_4'];
		$q2_4_other = $row['q2_4_other'];
		
		$q2_5 = $row['q2_5'];
		$q2_5_other = $row['q2_5_other'];
		
		$q2_6 = $row['q2_6'];
		$q2_6_other = $row['q2_6_other'];
			
		$q3_1 = $row['q3_1'];
		$q3_1_r1 = $row['q3_1_r1'];
		$q3_1_r2 = $row['q3_1_r2'];
		$q3_1_r3 = $row['q3_1_r3'];
		
		$q3_2 = $row['q3_2'];
		$q3_2_r1 = $row['q3_2_r1'];
		$q3_2_r2 = $row['q3_2_r2'];
		$q3_2_r3 = $row['q3_2_r3'];
		
        $q3_3 = $row['q3_3'];
		$q3_3_other = $row['q3_3_other'];

        $q3_4 = $row['q3_4'];
		$q3_4_r1 = $row['q3_4_r1'];
		$q3_4_r2 = $row['q3_4_r2'];
		$q3_4_r3 = $row['q3_4_r3'];	

		$q3_5 = $row['q3_5'];
		$q3_5_r1 = $row['q3_5_r1'];
		$q3_5_r2 = $row['q3_5_r2'];
		$q3_5_r3 = $row['q3_5_r3'];			
		
		$q3_6 = $row['q3_6'];
		$q3_6_other = $row['q3_6_other'];
		
		$q3_7 = $row['q3_7'];
		$q3_7_r1 = $row['q3_7_r1'];
		$q3_7_r2 = $row['q3_7_r2'];
		$q3_7_r3 = $row['q3_7_r3'];	
		
		$q3_8 = $row['q3_8'];
		$q3_8_r1 = $row['q3_8_r1'];
		$q3_8_r2 = $row['q3_8_r2'];
		$q3_8_r3 = $row['q3_8_r3'];
		
		$q3_9 = $row['q3_9'];
		$q3_9_r1 = $row['q3_9_r1'];
		$q3_9_r2 = $row['q3_9_r2'];
		$q3_9_r3 = $row['q3_9_r3'];	

        $q3_10_1 = $row['q3_10_1'];
		$q3_10_1a = $row['q3_10_1a'];
				
		$q3_10_2 = $row['q3_10_2'];
		$q3_10_2a = $row['q3_10_2a'];
				
		$q3_10_3 = $row['q3_10_3'];
		$q3_10_3a = $row['q3_10_3a'];
				
		$q3_10_4 = $row['q3_10_4'];
		$q3_10_4a = $row['q3_10_4a'];
		
		$q3_11_1 = $row['q3_11_1'];
		$q3_11_1a = $row['q3_11_1a'];
				
		$q3_11_2 = $row['q3_11_2'];
		$q3_11_2a = $row['q3_11_2a'];
				
		$q3_11_3 = $row['q3_11_3'];
		$q3_11_3a = $row['q3_11_3a'];
				
		$q3_11_4 = $row['q3_11_4'];
		$q3_11_4a = $row['q3_11_4a'];		
							
		$fill_date = $row['fill_date'];
		

		//把字串分割成array
		$q2_3_ary = explode(",", $q2_3);
		$q2_5_ary = explode(",", $q2_5);
		$q2_6_ary = explode(",", $q2_6);
		$q3_3_ary = explode(",", $q3_3);
		$q3_6_ary = explode(",", $q3_6);

				
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
<p align='center'><font color="blue" face="DFKai-sb" size='5'><strong>教育部教育優先區計畫評估研究專案調查問卷</strong></font>
<form name="form" method="post" action="questionnaire_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return add_crlf();">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<!-- 
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
	-->
	<tr>
		<td>
		     <table width="100%" border="1" cellspacing="0" cellpadding="0">
			     <tr>
			        <td>
					  <font>
					   敬愛的教育先進:<p>
					     &nbsp;&nbsp;&nbsp;&nbsp;您好!本問卷旨於瞭解當前教育人員對教育優先區計畫實施現況以及未來執行方向之意見，請您針對本問卷之內容，根據  貴校執行狀況或您的意見逐題回答。本問卷僅為研究之用，個人意見絕對保密，敬請安心作答。您的意見相當寶貴，對於教育部執行教育優先區計畫深具助益與貢獻，懇請您撥空賜答。承蒙您的慨允協助，無任感荷。敬祝 <br />
                         教安
						 <p align='right'>
						教育部教育優先區計畫評估研究團隊<br />
                        計畫主持人：黃淑玲 教授 敬啟<br />
                        中 華 民 國 104 年 6 月
						</font>
					 </td>
			     </tr>
		     </table>         			 
		</td>
	</tr>
		<tr>
		<td><p><font>&nbsp;&nbsp;&nbsp;&nbsp;教育部教育優先區計畫聚焦於「照顧學習弱勢族群學生」之議題，追求卓越、公平及正義，透過本計畫的推動，致力縮短城鄉教育差距，達成「教育機會均等」與「社會公平正義」的理想。本研究問卷分為三部分，第一部分為「指標、補助項目以及指標與補助項目對照表」；第二部分「教育優先區計畫執行現況與問題」及第三部分「教育優先區計畫未來規劃方向」。請根據您的意見勾選最符合之選項。</font><p></td>
	</tr>
	<tr>
		<td><font><b>第一部分<p></font></td>
	</tr>
		<tr>
		<td class="bg_content3">
			1. 您認為「指標三：國中學習弱勢學生比率偏高之學校」，界定為「該校前一學年參加國中教育會考任兩科成績列『待加強』之學生人數占全校參加國中教育會考總人數比率達50%以上者。」是否適當? (單選題)<br />
			<input type="radio" name="q1_1"  value="Y" <?=(($q1_1 == 'Y')?"checked":"");?>/>是<br />
			<input type="radio" name="q1_1"  value="N" <?=(($q1_1 == 'N')?"checked":"");?>/>否，建議修正為<input type="text" size="50" name="q1_1_other" value="<?=$q1_1_other;?>"><br />
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content2">
			2.「指標六、教師流動率及代理教師比率偏高之學校」，且代理教師比率高低可能與各縣市教育局(處)控管教師缺額比率有關，以教師流動情形做為補助之依據，您認為此項指標是否適當：(單選題)<br />
			<input type="radio" name="q1_2"  value="1" <?=(($q1_2 == '1')?"checked":"");?>/>指標適當，繼續使用<br />
			<input type="radio" name="q1_2"  value="2" <?=(($q1_2 == '2')?"checked":"");?>/>修改後使用，建議修正為<input type="text" size="50" name="q1_2_2" value="<?=$q1_2_2;?>"><br />
			<input type="radio" name="q1_2"  value="3" <?=(($q1_2 == '3')?"checked":"");?>/>暫時停用或捨棄不用<br />
			<input type="radio" name="q1_2"  value="4" <?=(($q1_2 == '4')?"checked":"");?>/>其他(請說明)：<input type="text" size="50" name="q1_2_other" value="<?=$q1_2_other;?>">
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content3">
			3.「補助項目一、推展親職教育活動」，內涵包括：(1) 親職教育講座與(2)目標學生之個案家庭輔導。惟親職教育講座另有其他機構提供經費補助，為避免資源浪費，您認為此項補助項目是否適當：(單選題)<br />
			<input type="radio" name="q1_3"  value="1" <?=(($q1_3 == '1')?"checked":"");?>/>維持現行規定<br />
			<input type="radio" name="q1_3"  value="2" <?=(($q1_3 == '2')?"checked":"");?>/>僅保留目標學生之個案家庭輔導<br />
			<input type="radio" name="q1_3"  value="3" <?=(($q1_3 == '3')?"checked":"");?>/>僅保留親職教育講座<br />
			<input type="radio" name="q1_3"  value="4" <?=(($q1_3 == '4')?"checked":"");?>/>其他(請說明)：<input type="text" size="50" name="q1_3_other" value="<?=$q1_3_other;?>">
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content2">
			4.「補助項目二、補助學校發展教育特色」及「補助項目五、發展原住民教育文化特色及充實設備器材」，於104年度改為一次申請三年期計畫，您認為是否適當：(單選題)<br />
			<input type="radio" name="q1_4"  value="1" <?=(($q1_4 == '1')?"checked":"");?>/>維持一次申請三年期計畫<br />
			<input type="radio" name="q1_4"  value="2" <?=(($q1_4 == '2')?"checked":"");?>/>恢復僅可申請一年期計畫<br />
			<input type="radio" name="q1_4"  value="3" <?=(($q1_4 == '3')?"checked":"");?>/>其他(請說明)：<input type="text" size="50" name="q1_4_other" value="<?=$q1_4_other;?>">
			<p>
		</td>
	</tr>
		<tr>
		<td class="bg_content3">
			5.在指標界定方面，目前兼採比率(例如:…20%以上)及人數(例如:…35人以上)，只需符合其中一項即符合指標，您認為是否適當:<br />
			<input type="radio" name="q1_5"  value="1" <?=(($q1_5 == '1')?"checked":"");?>/>維持現行規定<br />
			<input type="radio" name="q1_5"  value="2" <?=(($q1_5 == '2')?"checked":"");?>/>只採用比率即可<br />
			<input type="radio" name="q1_5"  value="3" <?=(($q1_5 == '3')?"checked":"");?>/>只採用人數即可<br />
			<input type="radio" name="q1_5"  value="4" <?=(($q1_5 == '4')?"checked":"");?>/>其他(請說明)：<input type="text" size="50" name="q1_5_other" value="<?=$q1_5_other;?>">
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content2">
			6.現行教育優先區計畫以當年度的教師與學生人數作為指標審核依據，您認為是否適當?<br />
			<input type="radio" name="q1_7"  value="1" <?=(($q1_7 == '1')?"checked":"");?>/>維持現行規定<br />
			<input type="radio" name="q1_7"  value="2" <?=(($q1_7 == '2')?"checked":"");?>/>以去年度資料為準，學校無需再填寫基本資料<br />
			<input type="radio" name="q1_7"  value="3" <?=(($q1_7 == '3')?"checked":"");?>/>其他(請說明)：<input type="text" size="50" name="q1_7_other" value="<?=$q1_7_other;?>">
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content2">
			7.您對教育優先區計畫之指標、補助項目以及指標與補助項目對照表之想法與意見為何? 請詳加說明：<br />
			<textarea name="q1_6" cols="75" rows="10"><?=$q1_6;?></textarea>
			<p><p>
		</td>
	</tr>
	<tr>
		<td><font size='4'><b>第二部分<p></font></td>
	</tr>
	<tr>
		<td class="bg_content3">
			1.法國第三波優先區(1997-2005)涵蓋全法20%的學童在內，稀釋了有限的教育資源，難以達成政策目標;第四波政策(2006迄今)遂修正為以5%的涵蓋率為依據劃分優先區，將資源投入到最弱勢地區，回歸到「對資源缺乏者提供較多的資源」的精神，同時兼顧效率與公平。您是否同意此做法：(單選題)<br />
			<input type="radio" name="q2_1"  value="Y" <?=(($q2_1 == 'Y')?"checked":"");?>/>同意<br />
			<input type="radio" name="q2_1"  value="N" <?=(($q2_1 == 'N')?"checked":"");?>/>不同意
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content2">
			2.我國目前中小學共有3515所，符合教育優先區任一指標的校數為3012所，獲得補助的校數為2829所。對於目前教育優先區的補助校數，您的看法為何？(單選題)<br />
			<input type="radio" name="q2_2"  value="1" <?=(($q2_2 == '1')?"checked":"");?>/>為避免教育資源分散，有必要縮減受補助校數<br />
			<input type="radio" name="q2_2"  value="2" <?=(($q2_2 == '2')?"checked":"");?>/>補助校數適中，無需縮減<br />
			<input type="radio" name="q2_2"  value="3" <?=(($q2_2 == '3')?"checked":"");?>/>其他(請說明)：<input type="text" size="50" name="q2_2_other" value="<?=$q2_2_other;?>">
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content3">
			3.對於學校執行現況，您認為應如何改善才能發揮教育優先區計畫的最大效果？(可複選)<br />
			<input type="checkbox" name="q2_3_1"  value="1" <?=(in_array('1',$q2_3_ary)?'checked':'');?>/>學校於申請計畫前先召開相關會議，使團隊成員具執行共識<br />
			<input type="checkbox" name="q2_3_2"  value="2" <?=(in_array('2',$q2_3_ary)?'checked':'');?>/>學校於申請計畫前先進行分析，針對實際教學需求提出申請<br />
			<input type="checkbox" name="q2_3_3"  value="3" <?=(in_array('3',$q2_3_ary)?'checked':'');?>/>學校應針對計畫進行中長程之規劃<br />
			<input type="checkbox" name="q2_3_4"  value="4" <?=(in_array('4',$q2_3_ary)?'checked':'');?>/>學校應強化學校人員對於教育優先區計畫精神與目標的了解<br />
			<input type="checkbox" name="q2_3_5"  value="5" <?=(in_array('5',$q2_3_ary)?'checked':'');?>/>學校申請教育優先區計畫應以目標學生之需求為主要考量<br />
			<input type="checkbox" name="q2_3_6"  value="6" <?=(in_array('6',$q2_3_ary)?'checked':'');?>/>學校應定期追蹤目標學生，了解其學習表現是否有良好改變<br />
			<input type="checkbox" name="q2_3_7"  value="7" <?=(in_array('7',$q2_3_ary)?'checked':'');?>/>避免承辦人員異動，以利辦理經驗之延續<br />
			<input type="checkbox" name="q2_3_8"  value="8" <?=(in_array('8',$q2_3_ary)?'checked':'');?>/>學校可結合企業或社會資源投入教育優先區計畫<br />
			<input type="checkbox" name="q2_3_9"  value="9" <?=(in_array('9',$q2_3_ary)?'checked':'');?>/>其它(請說明)：<input type="text" size="50" name="q2_3_other" value="<?=$q2_3_other;?>">
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content2">
			4.教育優先區計畫目前採用審核計畫核定經費，您認為是否適當?<br />
			<input type="radio" name="q2_4"  value="1" <?=(($q2_4 == '1')?"checked":"");?>/>維持現行審核計畫方式，據以核定經費<br />
			<input type="radio" name="q2_4"  value="2" <?=(($q2_4 == '2')?"checked":"");?>/>審核前一年度計畫執行成效，據以核定經費<br />
			<input type="radio" name="q2_4"  value="3" <?=(($q2_4 == '3')?"checked":"");?>/>審查本年度計畫及前一年度計畫執行成效，據以核定經費<br />
			<input type="radio" name="q2_4"  value="4" <?=(($q2_4 == '4')?"checked":"");?>/>其他(請說明)：<input type="text" size="50" name="q2_4_other" value="<?=$q2_4_other;?>">
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content3">
			5.對於教育優先區計畫成效評估機制，您認為應如何進行？(可複選)<br />
			<input type="checkbox" name="q2_5_1"  value="1" <?=(in_array('1',$q2_5_ary)?'checked':'');?>/>由學校至線上填報執行成效<br />
			<input type="checkbox" name="q2_5_2"  value="2" <?=(in_array('2',$q2_5_ary)?'checked':'');?>/>由學校自評執行成效<br />
			<input type="checkbox" name="q2_5_3"  value="3" <?=(in_array('3',$q2_5_ary)?'checked':'');?>/>由縣市政府組成訪視小組進行輔導訪視<br />
			<input type="checkbox" name="q2_5_4"  value="4" <?=(in_array('4',$q2_5_ary)?'checked':'');?>/>由教育部組成訪視小組進行輔導訪視<br />
			<input type="checkbox" name="q2_5_5"  value="5" <?=(in_array('5',$q2_5_ary)?'checked':'');?>/>納入教育部統合視導<br />
			<input type="checkbox" name="q2_5_6"  value="6" <?=(in_array('6',$q2_5_ary)?'checked':'');?>/>由駐區督學視導<br />
			<input type="checkbox" name="q2_5_7"  value="7" <?=(in_array('7',$q2_5_ary)?'checked':'');?>/>其它(請說明)：<input type="text" size="50" name="q2_5_other" value="<?=$q2_5_other;?>">
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content2">
			6.對於教育優先區計畫執行之配套措施，您有何具體建議與改進措施？(可複選)<br />
			<input type="checkbox" name="q2_6_1"  value="1" <?=(in_array('1',$q2_6_ary)?'checked':'');?>/>建立完善管考制度，檢驗執行成效<br />
			<input type="checkbox" name="q2_6_2"  value="2" <?=(in_array('2',$q2_6_ary)?'checked':'');?>/>建立計畫執行輔導之人才資料庫（如專家學者等）<br />
			<input type="checkbox" name="q2_6_3"  value="3" <?=(in_array('3',$q2_6_ary)?'checked':'');?>/>給予承辦有功之人員或學校敘獎或獎勵<br />
			<input type="checkbox" name="q2_6_4"  value="4" <?=(in_array('4',$q2_6_ary)?'checked':'');?>/>辦理績優學校經驗傳承與分享<br />
			<input type="checkbox" name="q2_6_5"  value="5" <?=(in_array('5',$q2_6_ary)?'checked':'');?>/>其它(請說明)：<input type="text" size="50" name="q2_6_other" value="<?=$q2_6_other;?>">
			<p><p>
		</td>
	</tr>
	<tr>
		<td><font size='4'><b>第三部分<p></font></td>
	</tr>
	<tr>
		<td class="bg_content3">
			1.有鑑於單一學校的人力與資源有限，法國教育優先區以「區」為概念，整合區內中小學、政府部門、社區、企業或師培大學等資源與人力，共同解決弱勢學生問題，您的看法為何？(單選題)<br />
			<input type="radio" name="q3_1"  value="1" <?=(($q3_1 == '1')?"checked":"");?>/>同意，原因為<input type="text" size="50" name="q3_1_r1" value="<?=$q3_1_r1;?>"><br />
			<input type="radio" name="q3_1"  value="2" <?=(($q3_1 == '2')?"checked":"");?>/>不同意，原因為<input type="text" size="50" name="q3_1_r2" value="<?=$q3_1_r2;?>"><br />
			<input type="radio" name="q3_1"  value="3" <?=(($q3_1 == '3')?"checked":"");?>/>其他(請說明)：<input type="text" size="50" name="q3_1_r3" value="<?=$q3_1_r3;?>">
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content2">
			2.「教育優先區─成功專案」由一所國中與四-五所國小合作，共同討論並申請計畫。如果教育優先區計畫匡列一筆經費，由數所學校共同提出計畫並執行，您的意見為何? (單選題)<br />
			<input type="radio" name="q3_2"  value="1" <?=(($q3_2 == '1')?"checked":"");?>/>同意，原因為<input type="text" size="50" name="q3_2_r1" value="<?=$q3_2_r1;?>"><br />
			<input type="radio" name="q3_2"  value="2" <?=(($q3_2 == '2')?"checked":"");?>/>不同意，原因為<input type="text" size="50" name="q3_2_r2" value="<?=$q3_2_r2;?>"><br />
			<input type="radio" name="q3_2"  value="3" <?=(($q3_2 == '3')?"checked":"");?>/>其他(請說明)：<input type="text" size="50" name="q3_2_r3" value="<?=$q3_2_r3;?>">
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content3">
			3.承上題，以「區」為概念整合數所學校資源，您認為可能會面臨哪些問題? (可複選)<br />
			<input type="checkbox" name="q3_3_1"  value="1" <?=(in_array('1',$q3_3_ary)?'checked':'');?>/>由哪個學校負責整合<br />
			<input type="checkbox" name="q3_3_2"  value="2" <?=(in_array('2',$q3_3_ary)?'checked':'');?>/>人力如何調配<br />
			<input type="checkbox" name="q3_3_3"  value="3" <?=(in_array('3',$q3_3_ary)?'checked':'');?>/>經費如何分配<br />
			<input type="checkbox" name="q3_3_4"  value="4" <?=(in_array('4',$q3_3_ary)?'checked':'');?>/>工作項目如何分配<br />
			<input type="checkbox" name="q3_3_5"  value="5" <?=(in_array('5',$q3_3_ary)?'checked':'');?>/>參與學校如何互動<br />
			<input type="checkbox" name="q3_3_6"  value="6" <?=(in_array('6',$q3_3_ary)?'checked':'');?>/>其它(請說明)：<input type="text" size="50" name="q3_3_other" value="<?=$q3_3_other;?>">
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content2">
			4.您是否同意教育優先區計畫匡列一筆經費，由師資培育大學與國中小發展長期夥伴協作關係，讓師資培育之大學師資生進行駐校實習、協助偏鄉學生學習? (單選題)<br />
			<input type="radio" name="q3_4"  value="1" <?=(($q3_4 == '1')?"checked":"");?>/>同意，原因為<input type="text" size="50" name="q3_4_r1" value="<?=$q3_4_r1;?>"><br />
			<input type="radio" name="q3_4"  value="2" <?=(($q3_4 == '2')?"checked":"");?>/>不同意，原因為<input type="text" size="50" name="q3_4_r2" value="<?=$q3_4_r2;?>"><br />
			<input type="radio" name="q3_4"  value="3" <?=(($q3_4 == '3')?"checked":"");?>/>其他(請說明)：<input type="text" size="50" name="q3_4_r3" value="<?=$q3_4_r3;?>">
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content3">
			5.為提升教育優先區之政策成效，您是否同意增加補助項目－補助教育優先區偏鄉學校辦理城鄉交流活動? (單選題)<br />
			<input type="radio" name="q3_5"  value="1" <?=(($q3_5 == '1')?"checked":"");?>/>同意，原因為<input type="text" size="50" name="q3_5_r1" value="<?=$q3_5_r1;?>"><br />
			<input type="radio" name="q3_5"  value="2" <?=(($q3_5 == '2')?"checked":"");?>/>不同意，原因為<input type="text" size="50" name="q3_5_r2" value="<?=$q3_5_r2;?>"><br />
			<input type="radio" name="q3_5"  value="3" <?=(($q3_5 == '3')?"checked":"");?>/>其他(請說明)：<input type="text" size="50" name="q3_5_r3" value="<?=$q3_5_r3;?>">
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content2">
			6.承上題，辦理城鄉交流活動，您認為需要規劃那些配套措施？ (可複選)<br />
			<input type="checkbox" name="q3_6_1"  value="1" <?=(in_array('1',$q3_6_ary)?'checked':'');?>/>寬籌進行交流之經費<br />
			<input type="checkbox" name="q3_6_2"  value="2" <?=(in_array('2',$q3_6_ary)?'checked':'');?>/>由進行交流雙方共同研討與擬訂計畫<br />
			<input type="checkbox" name="q3_6_3"  value="3" <?=(in_array('3',$q3_6_ary)?'checked':'');?>/>交流活動應具有教育意義，非僅是參訪或玩樂<br />
			<input type="checkbox" name="q3_6_4"  value="4" <?=(in_array('4',$q3_6_ary)?'checked':'');?>/>交流雙方應有雙向之互動，非僅是單方面參訪<br />
			<input type="checkbox" name="q3_6_5"  value="5" <?=(in_array('5',$q3_6_ary)?'checked':'');?>/>城鄉交流學校應認知到雙方為平等互惠關係<br />
			<input type="checkbox" name="q3_6_6"  value="6" <?=(in_array('6',$q3_6_ary)?'checked':'');?>/>城鄉交流事前需詳盡規畫人力、住宿以及時間配置<br />
			<input type="checkbox" name="q3_6_7"  value="7" <?=(in_array('7',$q3_6_ary)?'checked':'');?>/>其它(請說明)：<input type="text" size="50" name="q3_6_other" value="<?=$q3_6_other;?>">
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content3">
			7.為使教育優先區計畫更具前瞻性，您是否同意增加補助項目－辦理教師增能研習(例如翻轉教育、學習共同體等)，俾強化偏鄉學校教師能具有教育專業新知，精進教學能力，提升學生學習成效? (單選題) <br />
			<input type="radio" name="q3_7"  value="1" <?=(($q3_7 == '1')?"checked":"");?>/>同意，原因為<input type="text" size="50" name="q3_7_r1" value="<?=$q3_7_r1;?>"><br />
			<input type="radio" name="q3_7"  value="2" <?=(($q3_7 == '2')?"checked":"");?>/>不同意，原因為<input type="text" size="50" name="q3_7_r2" value="<?=$q3_7_r2;?>"><br />
			<input type="radio" name="q3_7"  value="3" <?=(($q3_7 == '3')?"checked":"");?>/>其他(請說明)：<input type="text" size="50" name="q3_7_r3" value="<?=$q3_7_r3;?>">
			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content2">
			8.教育優先區計畫如匡列一筆經費，由學校依照特殊需求，申請原有七項補助項目之外的項目？(單選題) <br />
			<input type="radio" name="q3_8"  value="1" <?=(($q3_8 == '1')?"checked":"");?>/>同意，原因為<input type="text" size="50" name="q3_8_r1" value="<?=$q3_8_r1;?>"><br />
			<input type="radio" name="q3_8"  value="2" <?=(($q3_8 == '2')?"checked":"");?>/>不同意，原因為<input type="text" size="50" name="q3_8_r2" value="<?=$q3_8_r2;?>"><br />
			<input type="radio" name="q3_8"  value="3" <?=(($q3_8 == '3')?"checked":"");?>/>其他(請說明)：<input type="text" size="50" name="q3_8_r3" value="<?=$q3_8_r3;?>">			<p>
		</td>
	</tr>
	<tr>
		<td class="bg_content3">
			9.您是否贊成政府應挹注更多的財政資源推動教育優先區計畫? (單選題)<br />
			<input type="radio" name="q3_9"  value="1" <?=(($q3_9 == '1')?"checked":"");?>/>同意，原因為<input type="text" size="50" name="q3_9_r1" value="<?=$q3_9_r1;?>"><br />
			<input type="radio" name="q3_9"  value="2" <?=(($q3_9 == '2')?"checked":"");?>/>不同意，原因為<input type="text" size="50" name="q3_9_r2" value="<?=$q3_9_r2;?>"><br />
			<input type="radio" name="q3_9"  value="3" <?=(($q3_9 == '3')?"checked":"");?>/>其他(請說明)：<input type="text" size="50" name="q3_9_r3" value="<?=$q3_9_r3;?>">
			<p>
		</td>
	</tr>
	<tr>
		<td>
			10.本年度有哪些企業、團體或基金會，長期提供貴校人力、物資或經費等資源，請填寫於下方選單：<br />
		</td>
	</tr>
	<tr>
	    <td>
	        <table width="100%" border="1" cellspacing="0" cellpadding="0">
	           <tr>
			   	<td align='center' valign='center' COLSPAN=1 height='30'>
                   <b>所提供物資
				  </td>
		          <td align='center' valign='center' COLSPAN=4 height='30'>
                   <b>企業、團體或基金會名稱
				  </td>
				</tr>
	           <tr align='center'>
		         <td>
			           <select name="q3_10_1">
					   <option value="1" <?=(($q3_10_1 == '1')?"selected":"");?>></option>
			           <option value="2" <?=(($q3_10_1 == '2')?"selected":"");?>>人力(志工)</option>
　                     <option value="3" <?=(($q3_10_1 == '3')?"selected":"");?>>物資(設備)</option>
                       <option value="4" <?=(($q3_10_1 == '4')?"selected":"");?>>經費</option>
                       <option value="5" <?=(($q3_10_1 == '5')?"selected":"");?>>其他</option>
                       </select>
		          </td>
		          <td>
		              <input type="text" size="67" name="q3_10_1a" value="<?=$q3_10_1a;?>">
		          </td>
		        <p>
		     </tr>
			 <tr align='center'>
		         <td>
			           <select name="q3_10_2">
					   <option value="1" <?=(($q3_10_2 == '1')?"selected":"");?>></option>
			           <option value="2" <?=(($q3_10_2 == '2')?"selected":"");?>>人力(志工)</option>
　                     <option value="3" <?=(($q3_10_2 == '3')?"selected":"");?>>物資(設備)</option>
                       <option value="4" <?=(($q3_10_2 == '4')?"selected":"");?>>經費</option>
                       <option value="5" <?=(($q3_10_2 == '5')?"selected":"");?>>其他</option>
                       </select>
		          </td>
		          <td>
		              <input type="text" size="67" name="q3_10_2a" value="<?=$q3_10_2a;?>">
		          </td>
		        <p>
		     </tr>
			 <tr align='center'>
		         <td>
			           <select name="q3_10_3">
					   <option value="1" <?=(($q3_10_3 == '1')?"selected":"");?>></option>
			           <option value="2" <?=(($q3_10_3 == '2')?"selected":"");?>>人力(志工)</option>
　                     <option value="3" <?=(($q3_10_3 == '3')?"selected":"");?>>物資(設備)</option>
                       <option value="4" <?=(($q3_10_3 == '4')?"selected":"");?>>經費</option>
                       <option value="5" <?=(($q3_10_3 == '5')?"selected":"");?>>其他</option>
                       </select>
		          </td>
		          <td>
		              <input type="text" size="67" name="q3_10_3a" value="<?=$q3_10_3a;?>">
		          </td>
		          <p>
		     </tr>
			 <tr align='center'>
		         <td>
			           <select name="q3_10_4">
					   <option value="1" <?=(($q3_10_4 == '1')?"selected":"");?>></option>
			           <option value="2" <?=(($q3_10_4 == '2')?"selected":"");?>>人力(志工)</option>
　                     <option value="3" <?=(($q3_10_4 == '3')?"selected":"");?>>物資(設備)</option>
                       <option value="4" <?=(($q3_10_4 == '4')?"selected":"");?>>經費</option>
                       <option value="5" <?=(($q3_10_4 == '5')?"selected":"");?>>其他</option>
                       </select>
		          </td>
		          <td>
		              <input type="text" size="67" name="q3_10_4a" value="<?=$q3_10_4a;?>">
		          </td>
		         <p>
		     </tr>
		</table><p>
		</td>
	</tr>
    <tr>
		<td>
			11.貴校目前最需要的資源為哪些？
		</td>
	</tr>
	<tr>
	    <td>
	        <table width="100%" border="1" cellspacing="0" cellpadding="0">
	           <tr>
			   	<td align='center' valign='center' COLSPAN=1 height='30'>
                   <b>所需要資源
				  </td>
		          <td align='center' valign='center' COLSPAN=4 height='30'>
                   <b>細項說明
				  </td>
				</tr>
	           <tr align='center'>
		         <td>
			           <select name="q3_11_1">
					   <option value="1" <?=(($q3_11_1 == '1')?"selected":"");?>></option>
			           <option value="2" <?=(($q3_11_1 == '2')?"selected":"");?>>人力(志工)</option>
　                     <option value="3" <?=(($q3_11_1 == '3')?"selected":"");?>>物資(設備)</option>
                       <option value="4" <?=(($q3_11_1 == '4')?"selected":"");?>>經費</option>
                       <option value="5" <?=(($q3_11_1 == '5')?"selected":"");?>>其他</option>
                       </select>
		          </td>
		          <td>
		              <input type="text" size="67" name="q3_11_1a" value="<?=$q3_11_1a;?>">
		          </td>
		        <p>
		     </tr>
			 <tr align='center'>
		         <td>
			           <select name="q3_11_2">
					   <option value="1" <?=(($q3_11_2 == '1')?"selected":"");?>></option>
			           <option value="2" <?=(($q3_11_2 == '2')?"selected":"");?>>人力(志工)</option>
　                     <option value="3" <?=(($q3_11_2 == '3')?"selected":"");?>>物資(設備)</option>
                       <option value="4" <?=(($q3_11_2 == '4')?"selected":"");?>>經費</option>
                       <option value="5" <?=(($q3_11_2 == '5')?"selected":"");?>>其他</option>
                       </select>
		          </td>
		          <td>
		              <input type="text" size="67" name="q3_11_2a" value="<?=$q3_11_2a;?>">
		          </td>
		        <p>
		     </tr>
			 <tr align='center'>
		         <td>
			           <select name="q3_11_3">
					   <option value="1" <?=(($q3_11_3 == '1')?"selected":"");?>></option>
			           <option value="2" <?=(($q3_11_3 == '2')?"selected":"");?>>人力(志工)</option>
　                     <option value="3" <?=(($q3_11_3 == '3')?"selected":"");?>>物資(設備)</option>
                       <option value="4" <?=(($q3_11_3 == '4')?"selected":"");?>>經費</option>
                       <option value="5" <?=(($q3_11_3 == '5')?"selected":"");?>>其他</option>
                       </select>
		          </td>
		          <td>
		              <input type="text" size="67" name="q3_11_3a" value="<?=$q3_11_3a;?>">
		          </td>
		          <p>
		     </tr>
			 <tr align='center'>
		         <td>
			           <select name="q3_11_4">
					   <option value="1" <?=(($q3_11_4 == '1')?"selected":"");?>></option>
			           <option value="2" <?=(($q3_11_4 == '2')?"selected":"");?>>人力(志工)</option>
　                     <option value="3" <?=(($q3_11_4 == '3')?"selected":"");?>>物資(設備)</option>
                       <option value="4" <?=(($q3_11_4 == '4')?"selected":"");?>>經費</option>
                       <option value="5" <?=(($q3_11_4 == '5')?"selected":"");?>>其他</option>
                       </select>
		          </td>
		          <td>
		              <input type="text" size="67" name="q3_11_4a" value="<?=$q3_11_4a;?>">
		          </td>
		         <p>
		     </tr>
		</table>
		</td>
	</tr>	
	
	<tr>
		<td>
		    <p>
			問卷到此結束，感謝您寶貴的意見！
			<p>
		</td>
	</tr>
	</font>
</table>
<input type="hidden" name="school_year" value="<?=$school_year;?>">
<!--<INPUT TYPE="button" VALUE="　取消(不儲存)　" onclick="history.go(-1)"> -->
<input type="submit" name="button" value="　確認(儲存送出)　" />
<!--結束 -->
<!--
<script language="JavaScript">

	function toCheck() 
	{
		var i;
		var flag = 1;
		var errmsg = "";
		
		//第一部分
		if(chk_radio('q1_1') == 0)
		{
			errmsg += "問題「1-1」尚未選擇\n";
			flag = 0;
		}
		if(chk_radio('q1_2') == 0)
		{
			errmsg += "問題「1-2」尚未選擇\n";
			flag = 0;
		}
		if(chk_radio('q1_3') == 0)
		{
			errmsg += "問題「1-3」尚未選擇\n";
			flag = 0;
		}
		if(chk_radio('q1_4') == 0)
		{
			errmsg += "問題「1-4」尚未選擇\n";
			flag = 0;
		}
		
      //第二部分	  
	  if(chk_radio('q2_1') == 0)
		{
			errmsg += "問題「2-1」尚未選擇\n";
			flag = 0;
		}
		if(chk_radio('q2_2') == 0)
		{
			errmsg += "問題「2-2」尚未選擇\n";
			flag = 0;
		}
		if(chk_radio('q2_3') == 0)
		{
			errmsg += "問題「2-3」尚未選擇\n";
			flag = 0;
		}
		if(chk_radio('q2_4') == 0)
		{
			errmsg += "問題「2-4」尚未選擇\n";
			flag = 0;
		}
		if(chk_radio('q2_5') == 0)
		{
			errmsg += "問題「2-5」尚未選擇\n";
			flag = 0;
		}
		if(chk_radio('q2_6') == 0)
		{
			errmsg += "問題「2-6」尚未選擇\n";
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
		

		
			//設定預設值
	function set_default() 
	{
		
	}
	
</script> 
-->

<!--
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

-->
</form>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>