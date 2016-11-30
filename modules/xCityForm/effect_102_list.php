<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
$cityname = $_GET['cityname'];
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
您搜尋的縣市為"<? echo $cityname; ?>"<br>

<font color="blue"><strong>教育部推動教育優先區計畫102年度 <? echo $cityname; ?> 成效評估填報狀況一覽表</strong></font>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td height="50" align="center" bgcolor="#99CCCC">補助項目</td>
    <td height="40" align="center" bgcolor="#99CCCC">核定金額</td>
    <td height="40" align="center" bgcolor="#99CCCC">執行金額</td>
    <td height="40" align="center" bgcolor="#99CCCC">剩餘金額</td>
    <td height="40" align="center" bgcolor="#99CCCC">執行進度</td>
    <td align="center" bgcolor="#99CCCC">執行情形</td>
    <td height="40" align="center" bgcolor="#99CCCC"><font color=red>檔案上傳</font><br />修正後計畫<br />(必填)</td>
  </tr>
<?
	/*##############################################################################
	# 先在 102schooldata 找到全部的學校資料，再到 102school_effect 找成果填報資料，
	# 因為102年 102school_effect 是在學校填寫後才將資料INSERT進資料庫，而101年的做
	# 法是先把學校資料手動匯入 101school_effect，所以不需回 schooldata找資料
	*/##############################################################################
		
	//搜尋縣市相符學校
	//a166 ~ a172 為補1~補7教育部審核金額，a173為總金額
	$edu_school = " SELECT sd.account, sd.cityname, sd.district, sd.school, se.last ".
				  "      , sd.a166, sd.a167, sd.a168, sd.a169, sd.a170, sd.a171, sd.a172, sd.a173 ". 
			      " FROM `102schooldata` as sd left join 102school_effect AS se on sd.account = se.account".
				  " where sd.cityname like '$cityname' order by sd.type, sd.account ;"; // and sd.account = '014632'測試用
	
	$result_school = mysql_query($edu_school);
	$not_filled = 0; //尚未填寫
	while($row = mysql_fetch_row($result_school))
	{
		$school = $row[0];
		$schoolname = $row[1].$row[2].$row[3]; //縣市+區+校名
		//echo $school." ".$schoolname;
		$last = $row[4]; //最後更新時間
		
		//教育部核定金額
		$fn_a1 = $row[5];
		$fn_a2 = $row[6];
		$fn_a3 = $row[7];
		$fn_a4 = $row[8];
		$fn_a5 = $row[9];
		$fn_a6 = $row[10];
		$fn_a7 = $row[11];
		$fn_total = $row[12];
		$all_fn_total += $fn_total;
		
		//學校填報金額
		//$sql = "SELECT a1_1, a2_1, a3_1, a4_1, a5_1, a6_1, a7_1 from 102school_effect where account like '$school' ;";
		$sql = " SELECT ifNull(a1_1,0), ifNull(a2_1,0), ifNull(a3_1,0), ifNull(a4_1,0), ifNull(a5_1,0), ifNull(a6_1,0), ifNull(a7_1,0) ".
			   " FROM 102schooldata AS sd LEFT JOIN 102school_effect AS se ON se.account = sd.account ".
			   " WHERE sd.account LIKE '$school' ";
		
		$result = mysql_query($sql);
		
		while($row_ef = mysql_fetch_row($result))
		{
			$ef_a1 = $row_ef[0];
			$ef_a2 = $row_ef[1];
			$ef_a3 = $row_ef[2];
			$ef_a4 = $row_ef[3];
			$ef_a5 = $row_ef[4];
			$ef_a6 = $row_ef[5];
			$ef_a7 = $row_ef[6];
			$ef_total = $ef_a1 + $ef_a2 + $ef_a3 + $ef_a4 + $ef_a5 + $ef_a6 + $ef_a7;
			$all_ef_total += $ef_total;

		}
		
		//讀取上傳檔案資料
		$sql = "select  *  from   102school_upload_name where account like '$school'";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result))
		{
			$effect_a1_1 = $row['effect_a1_1'];
			$effect_a1_2 = $row['effect_a1_2'];
			$effect_a1_3 = $row['effect_a1_3'];
			$effect_a1_4 = $row['effect_a1_4'];
			
			$effect_a2_1 = $row['effect_a2_1'];
			$effect_a2_2 = $row['effect_a2_2'];
			$effect_a2_3 = $row['effect_a2_3'];
			$effect_a2_4 = $row['effect_a2_4'];
			
			$effect_a3_1 = $row['effect_a3_1'];
			$effect_a3_2 = $row['effect_a3_2'];
			$effect_a3_3 = $row['effect_a3_3'];
			$effect_a3_4 = $row['effect_a3_4'];
			
			$effect_a4_1 = $row['effect_a4_1'];
			$effect_a4_2 = $row['effect_a4_2'];
			$effect_a4_3 = $row['effect_a4_3'];
			$effect_a4_4 = $row['effect_a4_4'];
			
			$effect_a5_1 = $row['effect_a5_1'];
			$effect_a5_2 = $row['effect_a5_2'];
			$effect_a5_3 = $row['effect_a5_3'];
			$effect_a5_4 = $row['effect_a5_4'];
			
			$effect_a6_1 = $row['effect_a6_1'];
			$effect_a6_2 = $row['effect_a6_2'];
			$effect_a6_3 = $row['effect_a6_3'];
			$effect_a6_4 = $row['effect_a6_4'];
			
			$effect_a7_1 = $row['effect_a7_1'];
			$effect_a7_2 = $row['effect_a7_2'];
			$effect_a7_3 = $row['effect_a7_3'];
			$effect_a7_4 = $row['effect_a7_4'];
		}
		
		//$file_path = "../xSchoolForm/upload/102/$school/";
		
		//1040427修改，區分公開路徑$file_path及可能含個資$file_path2
	     $file_path = '/epa_uploads/102/pub/'.$school.'/';
	     $file_path2 = '/epa_uploads/102/pri/'.$school.'/';
				
		//若該校有補助顯示學校代號及名稱
		if($fn_total > 0)
		{
			$serial = $serial + 1;
			echo '<tr><td colspan="8" bgcolor="#DDDD99">';
			//echo "序號".$serial." / 學校代號名稱：".$school."  ".$schoolname."<br>";
			//echo "序號：".$serial." -- ".$school."  ".$schoolname." -- ".$last;
			if($last == ""){
				echo "序號：".$serial." -- ".$school."  ".$schoolname." -- <font color=red>尚未填寫</font>";
				$not_filled++;
			}else{
				echo "序號：".$serial." -- ".$school."  ".$schoolname." -- ".$last;
			}
			echo '</td></tr>';
		}
		//補一
		if($fn_a1 > 1)
		{ 
			echo '<tr>';
			echo '<td width="170" height="30">1.推展親職教育活動</td>';
			echo '<td align="right">'.number_format($fn_a1).'</td>';
			echo '<td align="right">'.number_format($ef_a1).'</td>';
			echo '<td align="right">'.number_format($fn_a1-$ef_a1).'</td>';
			if($ef_a1==0){
				$temp = "0%";
			}else{
				$temp = number_format($ef_a1 * 100 / $fn_a1,2)."%";
			}
			echo '<td align="center">'.$temp.'</td>';
			echo '<td align="center"><input type="button" value="進入" onclick="location='.'\'effect_102_view_01.php?school='.$school.'\'" /></td>';
			echo "<td align='left'>";
			echo "核定後執行計畫：".(($effect_a1_1 == "")?"<font color='red'>未上傳</font>":"<font color='blue'>已上傳</font>")."<br />";//"<a href='".$file_path.$effect_a1_1."' target='_new'>".$effect_a1_1."</a>")."<br />";
			echo "核定後執行經費概算表：".(($effect_a1_2 == "")?"<font color='red'>未上傳</font>":"<font color='blue'>已上傳</font>")."<br />";//"<a href='".$file_path.$effect_a1_2."' target='_new'>".$effect_a1_2."</a>")."<br />";
			echo "執行成果照片：".(($effect_a1_3 == "")?"<font color='red'>未上傳</font>":"<font color='blue'>已上傳</font>")."<br />";//"<a href='".$file_path.$effect_a1_3."' target='_new'>".$effect_a1_3."</a>")."<br />";
			echo "</td>";
			//echo '<td align="center"><INPUT TYPE="button" VALUE="進入" onClick="location='.'\'effect_102_view_up_01.php?school='.$school.'\'"></td>';
			echo '</tr>';
		}
		//補二
		if($fn_a2 > 1)
		{ 
			echo '<tr>';
			echo '<td width="170" height="30">2.補助學校發展教育特色</td>';
			echo '<td align="right">'.number_format($fn_a2).'</td>';
			echo '<td align="right">'.number_format($ef_a2).'</td>';
			echo '<td align="right">'.number_format($fn_a2-$ef_a2).'</td>';
			if($ef_a2==0){
				$temp = "0%";
			}else{
				$temp = number_format($ef_a2 * 100 / $fn_a2,2)."%";
			}
			echo '<td align="center">'.$temp.'</td>';
			echo '<td align="center"><input type="button" value="進入" onclick="location='.'\'effect_102_view_02.php?school='.$school.'\'" /></td>';
			echo "<td align='left'>";
			echo "核定後執行計畫：".(($effect_a2_1 == "")?"<font color='red'>未上傳</font>":"<font color='blue'>已上傳</font>")."<br />";//"<a href='".$file_path.$effect_a2_1."' target='_new'>".$effect_a2_1."</a>")."<br />";
			echo "核定後執行經費概算表：".(($effect_a2_2 == "")?"<font color='red'>未上傳</font>":"<font color='blue'>已上傳</font>")."<br />";//"<a href='".$file_path.$effect_a2_2."' target='_new'>".$effect_a2_2."</a>")."<br />";
			echo "執行成果照片：".(($effect_a2_3 == "")?"<font color='red'>未上傳</font>":"<font color='blue'>已上傳</font>")."<br />";//"<a href='".$file_path.$effect_a2_3."' target='_new'>".$effect_a2_3."</a>")."<br />";
			echo "</td>";
			//echo '<td align="center"><INPUT TYPE="button" VALUE="進入" onClick="location='.'\'effect_102_view_up_02.php?school='.$school.'\'"></td>';
			echo '</tr>';
		}	
		//補三
		if($fn_a3 > 1)
		{ 
			echo '<tr>';
			echo '<td width="170" height="30">3.修繕離島或偏遠地區師生宿舍</td>';
			echo '<td align="right">'.number_format($fn_a3).'</td>';
			echo '<td align="right">'.number_format($ef_a3).'</td>';
			echo '<td align="right">'.number_format($fn_a3-$ef_a3).'</td>';
			if($ef_a3==0){
				$temp = "0%";
			}else{
				$temp = number_format($ef_a3 * 100 / $fn_a3,2)."%";
			}
			echo '<td align="center">'.$temp.'</td>';
			echo '<td align="center"><input type="button" value="進入" onclick="location='.'\'effect_102_view_03.php?school='.$school.'\'" /></td>';
			echo "<td align='left'>";
			echo "核定後執行計畫：".(($effect_a3_1 == "")?"<font color='red'>未上傳</font>":"<font color='blue'>已上傳</font>")."<br />";//"<a href='".$file_path.$effect_a3_1."' target='_new'>".$effect_a3_1."</a>")."<br />";
			echo "核定後執行經費概算表：".(($effect_a3_2 == "")?"<font color='red'>未上傳</font>":"<font color='blue'>已上傳</font>")."<br />";//"<a href='".$file_path.$effect_a3_2."' target='_new'>".$effect_a3_2."</a>")."<br />";
			echo "執行成果照片：".(($effect_a3_3 == "")?"<font color='red'>未上傳</font>":"<font color='blue'>已上傳</font>")."<br />";//"<a href='".$file_path.$effect_a3_3."' target='_new'>".$effect_a3_3."</a>")."<br />";
			echo "</td>";
			//echo '<td align="center"><INPUT TYPE="button" VALUE="進入" onClick="location='.'\'effect_102_view_up_03.php?school='.$school.'\'"></td>';
			echo '</tr>';
		}	
		//補四
		if($fn_a4 > 1)
		{ 
			echo '<tr>';
			echo '<td width="170" height="30">4.充實學校基本教學設備</td>';
			echo '<td align="right">'.number_format($fn_a4).'</td>';
			echo '<td align="right">'.number_format($ef_a4).'</td>';
			echo '<td align="right">'.number_format($fn_a4-$ef_a4).'</td>';
			if($ef_a4==0){
				$temp = "0%";
			}else{
				$temp = number_format($ef_a4 * 100 / $fn_a4,2)."%";
			}
			echo '<td align="center">'.$temp.'</td>';
			echo '<td align="center"><input type="button" value="進入" onclick="location='.'\'effect_102_view_04.php?school='.$school.'\'" /></td>';
			echo "<td align='left'>";
			echo "核定後執行計畫：".(($effect_a4_1 == "")?"<font color='red'>未上傳</font>":"<font color='blue'>已上傳</font>")."<br />";//"<a href='".$file_path.$effect_a4_1."' target='_new'>".$effect_a4_1."</a>")."<br />";
			echo "核定後執行經費概算表：".(($effect_a4_2 == "")?"<font color='red'>未上傳</font>":"<font color='blue'>已上傳</font>")."<br />";//"<a href='".$file_path.$effect_a4_2."' target='_new'>".$effect_a4_2."</a>")."<br />";
			echo "執行成果照片：".(($effect_a4_3 == "")?"<font color='red'>未上傳</font>":"<font color='blue'>已上傳</font>")."<br />";//"<a href='".$file_path.$effect_a4_3."' target='_new'>".$effect_a4_3."</a>")."<br />";
			echo "</td>";
			//echo '<td align="center"><INPUT TYPE="button" VALUE="進入" onClick="location='.'\'effect_102_view_up_04.php?school='.$school.'\'"></td>';
			echo '</tr>';
		}
		//補五
		if($fn_a5 > 1)
		{ 
			echo '<tr>';
			echo '<td width="170" height="30">5.發展原住民教育文化特色及充實設備器材</td>';
			echo '<td align="right">'.number_format($fn_a5).'</td>';
			echo '<td align="right">'.number_format($ef_a5).'</td>';
			echo '<td align="right">'.number_format($fn_a5-$ef_a5).'</td>';
			if($ef_a5==0){
				$temp = "0%";
			}else{
				$temp = number_format($ef_a5 * 100 / $fn_a5,2)."%";
			}
			echo '<td align="center">'.$temp.'</td>';
			echo '<td align="center"><input type="button" value="進入" onclick="location='.'\'effect_102_view_05.php?school='.$school.'\'" /></td>';
			echo "<td align='left'>";
			echo "核定後執行計畫：".(($effect_a5_1 == "")?"<font color='red'>未上傳</font>":"<font color='blue'>已上傳</font>")."<br />";//"<a href='".$file_path.$effect_a5_1."' target='_new'>".$effect_a5_1."</a>")."<br />";
			echo "核定後執行經費概算表：".(($effect_a5_2 == "")?"<font color='red'>未上傳</font>":"<font color='blue'>已上傳</font>")."<br />";//"<a href='".$file_path.$effect_a5_2."' target='_new'>".$effect_a5_2."</a>")."<br />";
			echo "執行成果照片：".(($effect_a5_3 == "")?"<font color='red'>未上傳</font>":"<font color='blue'>已上傳</font>")."<br />";//"<a href='".$file_path.$effect_a5_3."' target='_new'>".$effect_a5_3."</a>")."<br />";
			echo "</td>";
			//echo '<td align="center"><INPUT TYPE="button" VALUE="進入" onClick="location='.'\'effect_102_view_up_05.php?school='.$school.'\'"></td>';
			echo '</tr>';
		}
		//補六
		if($fn_a6 > 1)
		{ 
			echo '<tr>';
			echo '<td width="170" height="30">6.補助交通不便地區學校交通車</td>';
			echo '<td align="right">'.number_format($fn_a6).'</td>';
			echo '<td align="right">'.number_format($ef_a6).'</td>';
			echo '<td align="right">'.number_format($fn_a6-$ef_a6).'</td>';
			if($ef_a6==0){
				$temp = "0%";
			}else{
				$temp = number_format($ef_a6 * 100 / $fn_a6,2)."%";
			}
			echo '<td align="center">'.$temp.'</td>';
			echo '<td align="center"><input type="button" value="進入" onclick="location='.'\'effect_102_view_06.php?school='.$school.'\'" /></td>';
			echo "<td align='left'>";
			echo "核定後執行計畫：".(($effect_a6_1 == "")?"<font color='red'>未上傳</font>":"<font color='blue'>已上傳</font>")."<br />";//"<a href='".$file_path.$effect_a6_1."' target='_new'>".$effect_a6_1."</a>")."<br />";
			echo "核定後執行經費概算表：".(($effect_a6_2 == "")?"<font color='red'>未上傳</font>":"<font color='blue'>已上傳</font>")."<br />";//"<a href='".$file_path.$effect_a6_2."' target='_new'>".$effect_a6_2."</a>")."<br />";
			echo "執行成果照片：".(($effect_a6_3 == "")?"<font color='red'>未上傳</font>":"<font color='blue'>已上傳</font>")."<br />";//"<a href='".$file_path.$effect_a6_3."' target='_new'>".$effect_a6_3."</a>")."<br />";
			echo "</td>";
			//echo '<td align="center"><INPUT TYPE="button" VALUE="進入" onClick="location='.'\'effect_102_view_up_06.php?school='.$school.'\'"></td>';
			echo '</tr>';
		}
		//補七
		if($fn_a7 > 1)
		{ 
			echo '<tr>';
			echo '<td width="170" height="30">7.整修學校社區化活動場所</td>';
			echo '<td align="right">'.number_format($fn_a7).'</td>';
			echo '<td align="right">'.number_format($ef_a7).'</td>';
			echo '<td align="right">'.number_format($fn_a7-$ef_a7).'</td>';
			if($ef_a7==0){
				$temp = "0%";
			}else{
				$temp = number_format($ef_a7 * 100 / $fn_a7,2)."%";
			}
			echo '<td align="center">'.$temp.'</td>';
			echo '<td align="center"><input type="button" value="進入" onclick="location='.'\'effect_102_view_07.php?school='.$school.'\'" /></td>';
			echo "<td align='left'>";
			echo "核定後執行計畫：".(($effect_a7_1 == "")?"<font color='red'>未上傳</font>":"<font color='blue'>已上傳</font>")."<br />";//"<a href='".$file_path.$effect_a7_1."' target='_new'>".$effect_a7_1."</a>")."<br />";
			echo "核定後執行經費概算表：".(($effect_a7_2 == "")?"<font color='red'>未上傳</font>":"<font color='blue'>已上傳</font>")."<br />";//"<a href='".$file_path.$effect_a7_2."' target='_new'>".$effect_a7_2."</a>")."<br />";
			echo "執行成果照片：".(($effect_a7_3 == "")?"<font color='red'>未上傳</font>":"<font color='blue'>已上傳</font>")."<br />";//"<a href='".$file_path.$effect_a7_3."' target='_new'>".$effect_a7_3."</a>")."<br />";
			echo "</td>";
			//echo '<td align="center"><INPUT TYPE="button" VALUE="進入" onClick="location='.'\'effect_102_view_up_07.php?school='.$school.'\'"></td>';
			echo '</tr>';
		}
		//單校合計
		if($fn_total > 1)
		{ 
			echo '<tr>';
			echo '<td width="170" height="30" align="center">學校合計</td>';
			echo '<td align="right">'.number_format($fn_total).'</td>';
			echo '<td align="right">'.number_format($ef_total).'</td>';
			echo '<td align="right">'.number_format($fn_total-$ef_total).'</td>';
			if($ef_total==0){
				$temp = "0%";
			}else{
				$temp = number_format($ef_total * 100 / $fn_total,2)."%";
			}
			echo '<td align="center">'.$temp.'</td>';
			echo '<td align="center"></td>';
			echo '<td align="center"></td>';
			echo '</tr>';
		}
	}
	//該縣市合計
	if($all_fn_total > 1)
	{ 
		echo '<tr>';
		echo '<td width="170" height="30" align="center" bgcolor="#99CCCC">縣市合計</td>';
		echo '<td align="right" bgcolor="#99CCCC">'.number_format($all_fn_total).'</td>';
		echo '<td align="right" bgcolor="#99CCCC">'.number_format($all_ef_total).'</td>';
		echo '<td align="right" bgcolor="#99CCCC">'.number_format($all_fn_total-$all_ef_total).'</td>';
		if($all_ef_total==0){
			$temp = "0%";
		}else{
			$temp = number_format($all_ef_total * 100 / $all_fn_total,2)."%";
		}
		echo '<td align="center" bgcolor="#99CCCC">'.$temp.'</td>';
		echo '<td align="center" bgcolor="#99CCCC"> </td>';
		echo '<td align="center" bgcolor="#99CCCC"> </td>';
		echo '</tr>';
	}
?>
</table>
已填寫：<?=($serial-$not_filled);?><br />
未填寫：<?=$not_filled;?><br />
總校數：<?=$serial;?><br />
填報率：<?=number_format(($serial-$not_filled) / $serial * 100,2);?>%<br />

<?php
include "../../footer.php";
?>