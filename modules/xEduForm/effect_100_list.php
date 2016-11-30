<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
$cityname = $_GET['cityname'];
?>
<INPUT TYPE="button" VALUE="關閉視窗" onClick="window.close()">
您搜尋的縣市為"<? echo $cityname; ?>"<br>

<font color="blue"><strong>教育部推動教育優先區計畫100年度 <? echo $cityname; ?> 成效評估填報狀況一覽表</strong></font>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td height="50" align="center" bgcolor="#99CCCC">補助項目</td>
    <td height="40" align="center" bgcolor="#99CCCC">核定金額</td>
    <td height="40" align="center" bgcolor="#99CCCC">執行金額</td>
    <td height="40" align="center" bgcolor="#99CCCC">剩餘金額</td>
    <td height="40" align="center" bgcolor="#99CCCC">執行進度</td>
    <td align="center" bgcolor="#99CCCC">執行情形<br /><font color="red">(必填)</font></td>
    <td height="40" align="center" bgcolor="#99CCCC">成果案例<br />(選填)</td>
  </tr>
<?
if ($cityname == "全國"){
$sql_school = "SELECT * from 100school_effect order by type;"; //搜尋縣市相符學校
}else{  
$sql_school = "SELECT * from 100school_effect where city like '$cityname' order by type;"; //搜尋縣市相符學校
}
$result_school = mysql_query($sql_school);
while($row = mysql_fetch_row($result_school)){
	$school = $row[0];
	$schoolname = $row[2].$row[3].$row[4];
	//echo $school." ".$schoolname;
	//學校填報金額
	$ef_a1 = $row[11];
	$ef_a2 = $row[26];
	$ef_a3 = $row[41];
	$ef_a4 = $row[56];
	$ef_a5 = $row[71];
	$ef_a6 = $row[86];
	$ef_a7 = $row[101];
	$ef_a8 = $row[116];
	$ef_total = $ef_a1 + $ef_a2 + $ef_a3 + $ef_a4 + $ef_a5 + $ef_a6 + $ef_a7 + $ef_a8;
	$all_ef_a1 = $all_ef_a1 + $ef_al;
	$all_ef_a2 = $all_ef_a2 + $ef_a2;
	$all_ef_a3 = $all_ef_a3 + $ef_a3;
	$all_ef_a4 = $all_ef_a4 + $ef_a4;
	$all_ef_a5 = $all_ef_a5 + $ef_a5;
	$all_ef_a6 = $all_ef_a6 + $ef_a6;
	$all_ef_a7 = $all_ef_a7 + $ef_a7;
	$all_ef_a8 = $all_ef_a8 + $ef_a8;
	$all_ef_total = $all_ef_total + $ef_total;
	//教育部核定金額
	$sql_fn = "select  *  from 100school_final where account like '$school'";
	$result_fn = mysql_query($sql_fn);
	while($row_fn = mysql_fetch_row($result_fn)){
		$last = $row[7]; //最後更新時間
		$fn_a1 = $row_fn[15];
		$fn_a2 = $row_fn[25];
		$fn_a3 = $row_fn[28];
		$fn_a4 = $row_fn[39];
		$fn_a5 = $row_fn[42];
		$fn_a6 = $row_fn[47];
		$fn_a7 = $row_fn[54];
		$fn_a8 = $row_fn[67];
		$fn_total = $fn_a1 + $fn_a2 + $fn_a3 + $fn_a4 + $fn_a5 + $fn_a6 + $fn_a7 + $fn_a8;
		$all_fn_a1 = $all_fn_a1 + $fn_al;
		$all_fn_a2 = $all_fn_a2 + $fn_a2;
		$all_fn_a3 = $all_fn_a3 + $fn_a3;
		$all_fn_a4 = $all_fn_a4 + $fn_a4;
		$all_fn_a5 = $all_fn_a5 + $fn_a5;
		$all_fn_a6 = $all_fn_a6 + $fn_a6;
		$all_fn_a7 = $all_fn_a7 + $fn_a7;
		$all_fn_a8 = $all_fn_a8 + $fn_a8;
		$all_fn_total = $all_fn_total + $fn_total;
	}
	//若該校有補助顯示學校代號及名稱
	if($fn_total > 0){
		$serial = $serial + 1;
		echo '<tr><td colspan="7" bgcolor="#DDDD99">';
		//echo "序號：".$serial." / 代號名稱：".$school."  ".$schoolname." / 最後更新：".$last;
		//echo "序號：".$serial." -- ".$school."  ".$schoolname." -- ".$last;
		if($last == ""){
			echo "序號：".$serial." -- ".$school."  ".$schoolname." -- <font color=red>尚未填寫</font>";
		}else{
			echo "序號：".$serial." -- ".$school."  ".$schoolname." -- ".$last;
		}
		echo '</td></tr>';
	}
	//補一
	if($fn_a1 > 1){ 
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
		echo '<td align="center"><input type="button" value="進入" onclick="location='.'\'effect_100_view_01.php?school='.$school.'\'" /></td>';
		echo '<td align="center"><INPUT TYPE="button" VALUE="進入" onClick="location='.'\'effect_100_view_up_01.php?school='.$school.'\'"></td>';
		echo '</tr>';
	}
	//補二
	if($fn_a2 > 1){ 
		echo '<tr>';
		echo '<td width="170" height="30">2.原住民及離島地區學校辦理學習輔導</td>';
		echo '<td align="right">'.number_format($fn_a2).'</td>';
		echo '<td align="right">'.number_format($ef_a2).'</td>';
		echo '<td align="right">'.number_format($fn_a2-$ef_a2).'</td>';
		if($ef_a2==0){
			$temp = "0%";
		}else{
			$temp = number_format($ef_a2 * 100 / $fn_a2,2)."%";
		}
		echo '<td align="center">'.$temp.'</td>';
		echo '<td align="center"><input type="button" value="進入" onclick="location='.'\'effect_100_view_02.php?school='.$school.'\'" /></td>';
		echo '<td align="center"><INPUT TYPE="button" VALUE="進入" onClick="location='.'\'effect_100_view_up_02.php?school='.$school.'\'"></td>';
		echo '</tr>';
	}	
	//補三
	if($fn_a3 > 1){ 
		echo '<tr>';
		echo '<td width="170" height="30">3.補助學校發展教育特色</td>';
		echo '<td align="right">'.number_format($fn_a3).'</td>';
		echo '<td align="right">'.number_format($ef_a3).'</td>';
		echo '<td align="right">'.number_format($fn_a3-$ef_a3).'</td>';
		if($ef_a3==0){
			$temp = "0%";
		}else{
			$temp = number_format($ef_a3 * 100 / $fn_a3,2)."%";
		}
		echo '<td align="center">'.$temp.'</td>';
		echo '<td align="center"><input type="button" value="進入" onclick="location='.'\'effect_100_view_03.php?school='.$school.'\'" /></td>';
		echo '<td align="center"><INPUT TYPE="button" VALUE="進入" onClick="location='.'\'effect_100_view_up_03.php?school='.$school.'\'"></td>';
		echo '</tr>';
	}	
	//補四
	if($fn_a4 > 1){ 
		echo '<tr>';
		echo '<td width="170" height="30">4.修繕離島或偏遠地區師生宿舍</td>';
		echo '<td align="right">'.number_format($fn_a4).'</td>';
		echo '<td align="right">'.number_format($ef_a4).'</td>';
		echo '<td align="right">'.number_format($fn_a4-$ef_a4).'</td>';
		if($ef_a4==0){
			$temp = "0%";
		}else{
			$temp = number_format($ef_a4 * 100 / $fn_a4,2)."%";
		}
		echo '<td align="center">'.$temp.'</td>';
		echo '<td align="center"><input type="button" value="進入" onclick="location='.'\'effect_100_view_04.php?school='.$school.'\'" /></td>';
		echo '<td align="center"><INPUT TYPE="button" VALUE="進入" onClick="location='.'\'effect_100_view_up_04.php?school='.$school.'\'"></td>';
		echo '</tr>';
	}
	//補五
	if($fn_a5 > 1){ 
		echo '<tr>';
		echo '<td width="170" height="30">5.充實學校基本教學設備</td>';
		echo '<td align="right">'.number_format($fn_a5).'</td>';
		echo '<td align="right">'.number_format($ef_a5).'</td>';
		echo '<td align="right">'.number_format($fn_a5-$ef_a5).'</td>';
		if($ef_a5==0){
			$temp = "0%";
		}else{
			$temp = number_format($ef_a5 * 100 / $fn_a5,2)."%";
		}
		echo '<td align="center">'.$temp.'</td>';
		echo '<td align="center"><input type="button" value="進入" onclick="location='.'\'effect_100_view_05.php?school='.$school.'\'" /></td>';
		echo '<td align="center"><INPUT TYPE="button" VALUE="進入" onClick="location='.'\'effect_100_view_up_05.php?school='.$school.'\'"></td>';
		echo '</tr>';
	}
	//補六
	if($fn_a6 > 1){ 
		echo '<tr>';
		echo '<td width="170" height="30">6.發展原住民教育文化特色及充實設備器材</td>';
		echo '<td align="right">'.number_format($fn_a6).'</td>';
		echo '<td align="right">'.number_format($ef_a6).'</td>';
		echo '<td align="right">'.number_format($fn_a6-$ef_a6).'</td>';
		if($ef_a6==0){
			$temp = "0%";
		}else{
			$temp = number_format($ef_a6 * 100 / $fn_a6,2)."%";
		}
		echo '<td align="center">'.$temp.'</td>';
		echo '<td align="center"><input type="button" value="進入" onclick="location='.'\'effect_100_view_06.php?school='.$school.'\'" /></td>';
		echo '<td align="center"><INPUT TYPE="button" VALUE="進入" onClick="location='.'\'effect_100_view_up_06.php?school='.$school.'\'"></td>';
		echo '</tr>';
	}
	//補七
	if($fn_a7 > 1){ 
		echo '<tr>';
		echo '<td width="170" height="30">7.補助交通不便地區學校交通車</td>';
		echo '<td align="right">'.number_format($fn_a7).'</td>';
		echo '<td align="right">'.number_format($ef_a7).'</td>';
		echo '<td align="right">'.number_format($fn_a7-$ef_a7).'</td>';
		if($ef_a7==0){
			$temp = "0%";
		}else{
			$temp = number_format($ef_a7 * 100 / $fn_a7,2)."%";
		}
		echo '<td align="center">'.$temp.'</td>';
		echo '<td align="center"><input type="button" value="進入" onclick="location='.'\'effect_100_view_07.php?school='.$school.'\'" /></td>';
		echo '<td align="center"><INPUT TYPE="button" VALUE="進入" onClick="location='.'\'effect_100_view_up_07.php?school='.$school.'\'"></td>';
		echo '</tr>';
	}
	//補八
	if($fn_a8 > 1){ 
		echo '<tr>';
		echo '<td width="170" height="30">8.整修學校社區化活動場所</td>';
		echo '<td align="right">'.number_format($fn_a8).'</td>';
		echo '<td align="right">'.number_format($ef_a8).'</td>';
		echo '<td align="right">'.number_format($fn_a8-$ef_a8).'</td>';
		if($ef_a1==0){
			$temp = "0%";
		}else{
			$temp = number_format($ef_a8 * 100 / $fn_a8,2)."%";
		}
		echo '<td align="center">'.$temp.'</td>';
		echo '<td align="center"><input type="button" value="進入" onclick="location='.'\'effect_100_view_08.php?school='.$school.'\'" /></td>';
		echo '<td align="center"><INPUT TYPE="button" VALUE="進入" onClick="location='.'\'effect_100_view_up_08.php?school='.$school.'\'"></td>';
		echo '</tr>';
	}
	//單校合計
	if($fn_total > 1){ 
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
	if($all_fn_total > 1){ 
		echo '<tr>';
		echo '<td width="170" height="30" align="center" bgcolor="#99CCCC">合計</td>';
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


<?php
include "../../footer.php";
?>