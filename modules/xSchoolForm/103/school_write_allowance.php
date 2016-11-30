<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";

	$school_year = 103; //為學年度
	
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   "      , a1.s_total_money as a1_money ".
		   "      , a2.s_total_money as a2_money ".
		   "      , a3.s_total_money as a3_money, a3.s_p1_money as a3_1_money, a3.s_p2_money as a3_2_money ".
		   "      , a4.s_total_money as a4_money ".
		   "      , a5.s_total_money as a5_money ".
		   "      , a6.s_total_money as a6_money ".
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
		$applied = $row['applied'];
		$applied_ary = explode(",", $applied); //已申請的補助
		
		$a1_money = ($row['a1_money'] == '')?0:$row['a1_money']; //NULL則填入0
		$a2_money = ($row['a2_money'] == '')?0:$row['a2_money'];
		$a3_money = ($row['a3_money'] == '')?0:$row['a3_money'];
		$a3_1_money = ($row['a3_1_money'] = '')?0:$row['a3_1_money'];
		$a3_2_money = ($row['a3_2_money'] = '')?0:$row['a3_2_money'];
		$a4_money = ($row['a4_money'] == '')?0:$row['a4_money'];
		$a5_money = ($row['a5_money'] == '')?0:$row['a5_money'];
		$a6_money = ($row['a6_money'] == '')?0:$row['a6_money'];
		$a7_money = ($row['a7_money'] == '')?0:$row['a7_money'];
		
	}
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="回上一頁" onclick="location.href='school_select_allowance.php'">
<? include "../../function/button_print.php"; ?>
<input type="button" name="Submit" value="回主選單" onclick="location.href='../school_index.php'">
<p>
<div id="print_content">
<b>※貴校選擇申請補助項目如下：</b><br />
<font color="#0000FF">操作說明：請點選【已申請】或【未申請】進入補助項目填寫頁面</font><br />
<font color="#000000">　　　　　可按[F5]重新整理，更新【申請狀態】</font>
<table width="90%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" bgcolor="#CCCC66" style="width:70%;">項目名稱</td>
    <td align="center" bgcolor="#FF9900" style="width:30%;">申請狀態</td>
  </tr>
<?
	for($i = 0;$i < count($applied_ary);$i++)
	{
		switch($applied_ary[$i])
		{
			case "a1":
				echo '<tr><td>補助項目一：推展親職教育活動</td>';
				echo '<td>';
				echo ($a1_money > 0)?"<a href='school_write_a1.php' target='_self'>【已申請】</a><input type='button' value='經費表' onClick=window.open('school_funds.php?op=1')>":"<a href='school_write_a1.php' target='_self'>【未申請】</a>";
				echo '</td>';
				echo '</tr>';
				break;
				
			case "a2":
				echo '<tr><td>補助項目二：學校發展教育特色</td>';
				echo '<td>';
				echo ($a2_money > 0)?"<a href='school_write_a2.php' target='_self'>【已申請】</a><input type='button' value='經費表' onClick=window.open('school_funds.php?op=2')>":"<a href='school_write_a2.php' target='_self'>【未申請】</a>";
				echo '</td>';
				echo '</tr>';
				break;

			case "a3_1":
				echo '<tr><td>補助項目三：修繕離島或偏遠地區教師宿舍</td>';
				echo '<td>';
				echo ($a3_money > 0)?"<a href='school_write_a3.php' target='_self'>【已申請】</a><input type='button' value='經費表' onClick=window.open('school_funds.php?op=3')>":"<a href='school_write_a3.php' target='_self'>【未申請】</a>";
				echo '</td>';
				echo '</tr>';
				break;
				
			case "a3_2":
				echo '<tr><td>補助項目三：修繕離島或偏遠地區學生宿舍</td>';
				echo '<td>';
				echo ($a3_money > 0)?"<a href='school_write_a3.php' target='_self'>【已申請】</a><input type='button' value='經費表' onClick=window.open('school_funds.php?op=3')>":"<a href='school_write_a3.php' target='_self'>【未申請】</a>";
				echo '</td>';
				echo '</tr>';
				break;
				
			case "a4":
				echo '<tr><td>補助項目四：充實學校基本教學設備</td>';
				echo '<td>';
				echo ($a4_money > 0)?"<a href='school_write_a4.php' target='_self'>【已申請】</a><input type='button' value='經費表' onClick=window.open('school_funds.php?op=4')>":"<a href='school_write_a4.php' target='_self'>【未申請】</a>";
				echo '</td>';
				echo '</tr>';
				break;
				
			case "a5":
				echo '<tr><td>補助項目五：發展原住民教育文化特色及充實設備器材</td>';
				echo '<td>';
				echo ($a5_money > 0)?"<a href='school_write_a5.php' target='_self'>【已申請】</a><input type='button' value='經費表' onClick=window.open('school_funds.php?op=5')>":"<a href='school_write_a5.php' target='_self'>【未申請】</a>";
				echo '</td>';
				echo '</tr>';
				break;
				
			case "a6":
				echo '<tr><td>補助項目六：交通不便地區學校交通車</td>';
				echo '<td>';
				echo ($a6_money > 0)?"<a href='school_write_a6.php' target='_self'>【已申請】</a><input type='button' value='經費表' onClick=window.open('school_funds.php?op=6')>":"<a href='school_write_a6.php' target='_self'>【未申請】</a>";
				echo '</td>';
				echo '</tr>';
				break;
				
			case "a7":
				echo '<tr><td>補助項目七：整修學校社區化活動場所</td>';
				echo '<td>';
				echo ($a7_money > 0)?"<a href='school_write_a7.php' target='_self'>【已申請】</a><input type='button' value='經費表' onClick=window.open('school_funds.php?op=7')>":"<a href='school_write_a7.php' target='_self'>【未申請】</a>";
				echo '</td>';
				echo '</tr>';
				break;
				
			default:
				echo "";
		}
	}
?>
  
</table>
</div>
<br /><p>
<input type="hidden" name="school_year" value="<?=$school_year;?>">
<b>※申請填寫完畢：</b><input type="button" name="Submit" value="前往列印經費需求彙整表" onclick="location.href='print_allowance_page.php'"><p>
<b>※申請填寫完畢：</b><input type="button" name="Submit" value="前往上傳檔案專區" onclick="location.href='school_upload_file.php'"><p>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

