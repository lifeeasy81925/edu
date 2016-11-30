<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	
	$school_year = 103; //為學年度
	
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   //補一資料
		   "      , a1.s_total_money as a1_money, a1.s_p1_money as a1_p1_money, a1.s_p2_money as a1_p2_money ".
		   //補二資料
		   "      , a2.s_total_money as a2_money ".
		   //補三資料
		   "      , a3.s_total_money as a3_money ".
		   //補四資料
		   "      , a4.s_total_money as a4_money ".
		   //補五資料
		   "      , a5.s_total_money as a5_money ".
		   //補六資料
		   "      , a6.s_total_money as a6_money ".
		   //補七資料
		   "      , a7.s_total_money as a7_money ".
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join alc_parenting_education as a1 on sy.seq_no = a1.sy_seq ".
		   "                       left join alc_education_features as a2 on sy.seq_no = a2.sy_seq ".
		   "                       left join alc_repair_dormitory as a3 on sy.seq_no = a3.sy_seq ".
		   "                       left join alc_teaching_equipment as a4 on sy.seq_no = a4.sy_seq ".
		   "                       left join alc_aboriginal_education as a5 on sy.seq_no = a5.sy_seq ".
		   "                       left join alc_transport_car as a6 on sy.seq_no = a6.sy_seq ".
		   "                       left join alc_school_activity as a7 on sy.seq_no = a7.sy_seq ".
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
		
		$lastyear_leaving = ($row['lastyear_leaving'] == '')?0:$row['lastyear_leaving']; 
		$page3_warning = $row['page3_warning'];
		
		$sy_seq = $row['seq_no']; //school_year 的 seq_no
		
		$a1_money = ($row['a1_money'] == '')?0:$row['a1_money']; //NULL則填入0
		$a2_money = ($row['a2_money'] == '')?0:$row['a2_money'];
		$a3_money = ($row['a3_money'] == '')?0:$row['a3_money'];
		$a4_money = ($row['a4_money'] == '')?0:$row['a4_money'];
		$a5_money = ($row['a5_money'] == '')?0:$row['a5_money'];
		$a6_money = ($row['a6_money'] == '')?0:$row['a6_money'];
		$a7_money = ($row['a7_money'] == '')?0:$row['a7_money'];
		
		$a1_p1_money = ($row['a1_p1_money'] == '')?0:$row['a1_p1_money']; 
		$a1_p2_money = ($row['a1_p2_money'] == '')?0:$row['a1_p2_money']; 
		
		$applied = $row['applied']; //已申請
		$applied_ary = explode(",", $applied); //已申請的補助
	}
	
	$sql = "select * from school_upload_name where sy_seq = '$sy_seq' ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$point2 = $row['point2'];
		$lastyear_leaving_file = $row['lastyear_leaving_file'];
		$a1_1 = $row['a1_1'];
		$a1_2 = $row['a1_2'];
		$a2_1 = $row['a2_1'];
		$a3_1 = $row['a3_1'];
		$a3_2 = $row['a3_2'];
		$a4_1 = $row['a4_1'];
		$a4_2 = $row['a4_2'];
		$a5_1 = $row['a5_1'];
		$a6_1 = $row['a6_1'];
		$a6_2 = $row['a6_2'];
		$a6_3 = $row['a6_3'];
		$a7_1 = $row['a7_1'];
		$final_1 = $row['final_1'];
		$final_2 = $row['final_2'];
	}
	
	$checkfinish = 1;	//是否已上傳應上傳檔案
	$file_path  = '/epa_uploads/'.$school_year.'/pub/'.$username.'/';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<a href="/edu/modules/xSchoolForm/106/history_data.php">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

<img src="/edu/images/history.png" align="absmiddle" height="20px"> 歷史資料查詢區 / <b>103年度 填報申請狀態</b>

<p>
<hr>
<p>

<div id="print_content">
<div style="background-color:#F96"><b>※各校皆須上傳以下兩個檔案才算填報完成</b>：(須經校長核章)</div>
<div style="background-color:#CFC">
<p style='margin-left: 1em; text-indent: -1em'>
<b>1.教育部<?=$school_year;?>年度推動教育優先區指標界定調查紀錄表─學校</b><br />
<? 
	if($final_1 == '')
	{
		echo "指標界定調查表：<font color=red>未上傳</font>"; 
		$checkfinish = 0;
	} 
	else 
	{
		echo '指標界定調查表：<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$final_1.'" target="_new">'.$final_1.'</a>';
	}
?>
</p>
</div>
<div style="background-color:#CFC">
<p style='margin-left: 1em; text-indent: -1em'>
<b>2.教育部<?=$school_year;?>年度推動教育優先區補助項目經費需求彙整表─學校</b><br />
<? 
	if($final_2 == '')
	{
		echo "經費需求彙整表：<font color=red>未上傳</font>"; 
		$checkfinish = 0;
	} 
	else 
	{
		echo '經費需求彙整表：<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$final_2.'" target="_new">'.$final_2.'</a>';
	}
?>
</p>
</div>
<div style="display:<?=($page3_warning == '')?'none':''; //空白就不顯示?>;">
	<div style="background-color:#F96"><b>※目標學生名冊</b></div>
	<div style="background-color:#CFC">
		<? 
			if($point2 == '' && $page3_warning != '')
			{
				echo "目標學生名冊：<font color=red>未上傳</font>"; 
				$checkfinish = 0;
			} 
			else 
			{
				echo '目標學生名冊：<font color=blue>已上傳</font>，檔名：'.$point2.'<br>';
				echo '<font size="-2">（因資安考量，上傳後即可，不提供下載。）</font>';
			}
		?>
	</div>
	<p>
</div>
<div style="display:<?=($lastyear_leaving == 0)?'none':''; //0就不顯示?>;">
	<div style="background-color:#F96"><b>※去學年度中途輟學學生名冊</b></div>
	<div style="background-color:#CFC">
		<? 
			if($lastyear_leaving_file == '' && $lastyear_leaving != 0)
			{
				echo "去學年度中途輟學學生名冊：<font color=red>未上傳</font>"; 
				$checkfinish = 0;
			} 
			else 
			{
				echo '去學年度中途輟學學生名冊：<font color=blue>已上傳</font>，檔名：'.$lastyear_leaving_file.'<br>';
				echo '<font size="-2">（因資安考量，上傳後即可，不提供下載。）</font>';
			}
		?>
	</div>
	<p>
</div>
<!--各已申請補助項目應上傳檔案-->
<div style="background-color:#F96"><b>※各申請補助項目填報及上傳檔案狀態：</b>(僅列出貴校勾選申請項目)<br></div>
<table width="90%" border="1" cellspacing="0" cellpadding="0">
<?
	for($i = 0;$i < count($applied_ary);$i++)
	{
		switch($applied_ary[$i])
		{
			case "a1":
				echo '<tr>';
				echo '<td><b>※補助項目一：推展親職教育活動</b>';
				if($a1_p1_money > 0) //沒申請親職教育的不需上傳
				{
					echo "<br />　‧親職教育講座實施計畫：";
					if($a1_1 == '')
					{
						echo "<font color=red>未上傳</font>"; 
						$checkfinish = 0;
					}
					else
					{
						echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a1_1.'" target="_new">'.$a1_1.'</a>';
					}
				}
				
				if($a1_p2_money > 0) //沒申請家庭訪視的不需上傳
				{
					echo "<br />　‧家庭訪視實施計畫："; 
					if($a1_2 == '')
					{
						echo "<font color=red>未上傳</font>"; 
						$checkfinish = 0;
					}
					else
					{
						echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a1_2.'" target="_new">'.$a1_2.'</a>';
					}
				}
				echo '</td>';
				echo '<td nowrap="nowrap">'.(($a1_money > 0)?"已申請":"<font color=red>未申請</font>").'</td>';
				echo '<td align="center" nowrap="nowrap">'.(($a1_money > 0)?"<a href='school_funds.php?op=1' target='_blank'>列印<br />經費表</a>":"").'</td>';
				echo '</tr>';
				if($a1_money == 0)
					$checkfinish = 0;
				break;
			
			case "a2":
				echo '<tr>';
				echo '<td><b>※補助項目二：學校發展教育特色</b>';
				echo "<br />　‧實施計畫：";
				if($a2_1 == '')
				{
					echo "<font color=red>未上傳</font>"; 
					$checkfinish = 0;
				}
				else
				{
					echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a2_1.'" target="_new">'.$a2_1.'</a>';
				}
				echo '</td>';
				echo '<td nowrap="nowrap">'.(($a2_money > 0)?"已申請":"<font color=red>未申請</font>").'</td>';
				echo '<td align="center" nowrap="nowrap">'.(($a2_money > 0)?"<a href='school_funds.php?op=2' target='_blank'>列印<br />經費表</a>":"").'</td>';
				echo '</tr>';
				if($a2_money == 0)
					$checkfinish = 0;
				break;
							
			case "a3_1":
			case "a3_2":
				echo '<tr>';
				echo '<td><b>※補助項目三：修繕離島或偏遠地區教師宿舍</b>';
				echo "<br />　‧實施計畫：";
				if($a3_1 == '')
				{
					echo "<font color=red>未上傳</font>"; 
					$checkfinish = 0;
				}
				else
				{
					echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a3_1.'" target="_new">'.$a3_1.'</a>';
				}
				echo "<br />　‧近三年住宿人員資料：";
				if($a3_2 == '')
				{
					echo "<font color=red>未上傳</font>"; 
					$checkfinish = 0;
				}
				else
				{
					echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a3_2.'" target="_new">'.$a3_2.'</a>';
				}
				echo '</td>';
				echo '<td nowrap="nowrap">'.(($a3_money > 0)?"已申請":"<font color=red>未申請</font>").'</td>';
				echo '<td align="center" nowrap="nowrap">'.(($a3_money > 0)?"<a href='school_funds.php?op=3' target='_blank'>列印<br />經費表</a>":"").'</td>';
				echo '</tr>';
				if($a3_money == 0)
					$checkfinish = 0;
				break;
							
			case "a4":
				echo '<tr>';
				echo '<td><b>※補助項目四：充實學校基本教學設備</b>';
				echo "<br />　‧實施計畫：";
				if($a4_1 == '')
				{
					echo "<font color=red>未上傳</font>"; 
					$checkfinish = 0;
				}
				else
				{
					echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a4_1.'" target="_new">'.$a4_1.'</a>';
				}
				echo "<br />　‧領域小組會議紀錄：";
				if($a4_2 == '')
				{
					echo "<font color=red>未上傳</font>"; 
					$checkfinish = 0;
				}
				else
				{
					echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a4_2.'" target="_new">'.$a4_2.'</a>';
				}
				echo '</td>';
				echo '<td nowrap="nowrap">'.(($a4_money > 0)?"已申請":"<font color=red>未申請</font>").'</td>';
				echo '<td align="center" nowrap="nowrap">'.(($a4_money > 0)?"<a href='school_funds.php?op=4' target='_blank'>列印<br />經費表</a>":"").'</td>';
				echo '</tr>';
				if($a4_money == 0)
					$checkfinish = 0;
				break;
			
			case "a5":
				echo '<tr>';
				echo '<td><b>※補助項目五：發展原住民教育文化特色及充實設備器材</b>';
				echo "<br />　‧實施計畫：";
				if($a5_1 == '')
				{
					echo "<font color=red>未上傳</font>"; 
					$checkfinish = 0;
				}
				else
				{
					echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a5_1.'" target="_new">'.$a5_1.'</a>';
				}
				echo '</td>';
				echo '<td nowrap="nowrap">'.(($a5_money > 0)?"已申請":"<font color=red>未申請</font>").'</td>';
				echo '<td align="center" nowrap="nowrap">'.(($a5_money > 0)?"<a href='school_funds.php?op=5' target='_blank'>列印<br />經費表</a>":"").'</td>';
				echo '</tr>';
				if($a5_money == 0)
					$checkfinish = 0;
				break;
							
			case "a6":
				echo '<tr>';
				echo '<td><b>※補助項目六：交通不便地區學校交通車</b>';
				echo "<br />　‧實施計畫：";
				if($a6_1 == '')
				{
					echo "<font color=red>未上傳</font>"; 
					$checkfinish = 0;
				}
				else
				{
					echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a6_1.'" target="_new">'.$a6_1.'</a>';
				}
				echo "<br />　‧各搭車路線學生名冊：";
				if($a6_2 == '')
				{
					echo "<font color=red>未上傳</font>"; 
					$checkfinish = 0;
				}
				else
				{
					echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a6_2.'" target="_new">'.$a6_2.'</a>';
				}
				echo "<br />　‧學校現有交通車調查表：";
				if($a6_3 == '')
				{
					echo "<font color=red>未上傳</font>"; 
					$checkfinish = 0;
				}
				else
				{
					echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a6_3.'" target="_new">'.$a6_3.'</a>';
				}
				echo '</td>';
				echo '<td nowrap="nowrap">'.(($a6_money > 0)?"已申請":"<font color=red>未申請</font>").'</td>';
				echo '<td align="center" nowrap="nowrap">'.(($a6_money > 0)?"<a href='school_funds.php?op=6' target='_blank'>列印<br />經費表</a>":"").'</td>';
				echo '</tr>';
				if($a6_money == 0)
					$checkfinish = 0;
				break;
			
			case "a7":
				echo '<tr>';
				echo '<td><b>※補助項目七：整修學校社區化活動場所</b>';
				echo "<br />　‧實施計畫：";
				if($a7_1 == '')
				{
					echo "<font color=red>未上傳</font>"; 
					$checkfinish = 0;
				}
				else
				{
					echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$a7_1.'" target="_new">'.$a7_1.'</a>';
				}
				echo '</td>';
				echo '<td nowrap="nowrap">'.(($a7_money > 0)?"已申請":"<font color=red>未申請</font>").'</td>';
				echo '<td align="center" nowrap="nowrap">'.(($a7_money > 0)?"<a href='school_funds.php?op=7' target='_blank'>列印<br />經費表</a>":"").'</td>';
				echo '</tr>';
				if($a7_money == 0)
					$checkfinish = 0;
				break;
				
			default:
				echo "";
		}
	}
?>
</table>

<p>
<font color=red>
<? 
	if($checkfinish == 1)
		echo "※ 貴校已完成填報。";
	else
		echo "※ 貴校尚未完成填報，請檢視是否有未上傳檔案。";

?>
</font>
</div>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

