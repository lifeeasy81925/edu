<INPUT TYPE="button" VALUE="關閉視窗" onClick="window.close()">
<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_edu.php";
$cityname = $_GET['cityname'];
echo $username."_";
echo $edu."_";
echo $eduman."您好！";
$serial = 0;
?>
您查詢的資料為 101年度 "<? echo $cityname; ?>"<br>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td height="60" colspan="15" align="center"><strong><font color=blue>教育部101年度推動教育優先區計畫直轄市、縣(市)政府各補助項目執行成果一覽表<br />縣市別：<? echo $cityname;?>　　　　　　　　補助項目：一、推展親職教育活動</font></strong></td>
  </tr>
  <tr>
    <td rowspan="3" align="center" bgcolor="#FFFFCC">縣市</td>
    <td rowspan="3" align="center" bgcolor="#FFFFCC">學校編號</td>
    <td rowspan="3" align="center" bgcolor="#FFFFCC">學校名稱</td>
    <td colspan="4" align="center" bgcolor="#FFFFCC">教育部核定項目、數量及金額</td>
    <td colspan="4" align="center" bgcolor="#FFFFCC">學校執行成果</td>
    <td colspan="4" align="center" bgcolor="#FFFFCC">執行成效百分比 (%)</td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#FFFFCC">推展親職教育活動</td>
    <td colspan="2" align="center" bgcolor="#FFFFCC">學習適應困難或特殊行為之目標學生個案家庭輔導</td>
    <td colspan="2" align="center" bgcolor="#FFFFCC">推展親職教育活動</td>
    <td colspan="2" align="center" bgcolor="#FFFFCC">學習適應困難或特殊行為之目標學生個案家庭輔導</td>
    <td colspan="2" align="center" bgcolor="#FFFFCC">推展親職教育活動</td>
    <td colspan="2" align="center" bgcolor="#FFFFCC">學習適應困難或特殊行為之目標學生個案家庭輔導</td>
  </tr>
  <tr>
    <td width="40" align="center" bgcolor="#FFFFCC">場次</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">次</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">場次</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">次</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">場次</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">次</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
  </tr>

<?
if ($cityname== "全國"){
$sql_school = "SELECT * from 101school_effect order by type;"; //搜尋縣市相符學校
}else{  
$sql_school = "SELECT * from 101school_effect where city like '$cityname' order by type;"; //搜尋縣市相符學校
}
$result_school = mysql_query($sql_school);
while($row = mysql_fetch_row($result_school)){
	$school = $row[0];
	$schoolname = $row[2].$row[3].$row[4];
	$schoolcity = $row[2];
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
	if($row[11] <> ''){$ef_1 = $row[11];}else{$ef_1 = 0;} //該校填報欄位1
	if($row[12] <> ''){$ef_2 = $row[12];}else{$ef_2 = 0;}
	if($row[13] <> ''){$ef_3 = $row[13];}else{$ef_3 = 0;}
	if($row[14] <> ''){$ef_4 = $row[14];}else{$ef_4 = 0;}
	if($row[15] <> ''){$ef_5 = $row[15];}else{$ef_5 = 0;}
	if($row[16] <> ''){$ef_6 = $row[16];}else{$ef_6 = 0;}
	if($row[17] <> ''){$ef_7 = $row[17];}else{$ef_7 = 0;}
	if($row[18] <> ''){$ef_8 = $row[18];}else{$ef_8 = 0;}
	if($row[19] <> ''){$ef_9 = $row[19];}else{$ef_9 = 0;}
	if($row[20] <> ''){$ef_10 = $row[20];}else{$ef_10 = 0;}
	if($row[21] <> ''){$ef_11 = $row[21];}else{$ef_11 = 0;}
	if($row[22] <> ''){$ef_12 = $row[22];}else{$ef_12 = 0;}
	if($row[23] <> ''){$ef_13 = $row[23];}else{$ef_13 = 0;}
	$ef_14 = $row[24];
	$ef_15 = $row[25];
	$all_ef_1 = $all_ef_1 + $ef_1; //欄位1合計
	$all_ef_2 = $all_ef_2 + $ef_2;
	$all_ef_3 = $all_ef_3 + $ef_3;
	$all_ef_4 = $all_ef_4 + $ef_4;
	$all_ef_5 = $all_ef_5 + $ef_5;
	$all_ef_6 = $all_ef_6 + $ef_6;
	$all_ef_7 = $all_ef_7 + $ef_7;
	$all_ef_8 = $all_ef_8 + $ef_8;
	$all_ef_9 = $all_ef_9 + $ef_9;
	$all_ef_10 = $all_ef_10 + $ef_10;
	$all_ef_11 = $all_ef_11 + $ef_11;
	$all_ef_12 = $all_ef_12 + $ef_12;
	$all_ef_13 = $all_ef_13 + $ef_13;
	$ef_total = $ef_a1 + $ef_a2 + $ef_a3 + $ef_a4 + $ef_a5 + $ef_a6 + $ef_a7 + $ef_a8; //該校填報各補助項目合計
	$all_ef_a1 = $all_ef_a1 + $ef_al; //列表補助項目總和
	$all_ef_a2 = $all_ef_a2 + $ef_a2;
	$all_ef_a3 = $all_ef_a3 + $ef_a3;
	$all_ef_a4 = $all_ef_a4 + $ef_a4;
	$all_ef_a5 = $all_ef_a5 + $ef_a5;
	$all_ef_a6 = $all_ef_a6 + $ef_a6;
	$all_ef_a7 = $all_ef_a7 + $ef_a7;
	$all_ef_a8 = $all_ef_a8 + $ef_a8;
	$all_ef_total = $all_ef_total + $ef_total; //列表各補助項目總合
	//教育部核定金額
	$sql_fn = "select  *  from 101school_final where account like '$school'";
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
		$fn_1 = $row_fn[11]; //核定欄位1
		$fn_2 = $row_fn[12];
		$fn_3 = $row_fn[13];
		$fn_4 = $row_fn[14];
		$fn_5 = $row_fn[15];
		$all_fn_1 = $all_fn_1 + $fn_1;
		$all_fn_2 = $all_fn_2 + $fn_2;
		$all_fn_3 = $all_fn_3 + $fn_3;
		$all_fn_4 = $all_fn_4 + $fn_4;
		$all_fn_5 = $all_fn_5 + $fn_5;
		$fn_total = $fn_a1 + $fn_a2 + $fn_a3 + $fn_a4 + $fn_a5 + $fn_a6 + $fn_a7 + $fn_a8; //該校核定各補助項目總合
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
	/*
	if($fn_total > 0){
		$serial = $serial + 1;
		echo '<tr><td colspan="7" bgcolor="#DDDD99">';
		//echo "序號：".$serial." / 代號名稱：".$school."  ".$schoolname." / 最後更新：".$last;
		//echo "序號：".$serial." -- ".$school."  ".$schoolname." -- ".$last;
		if($last == ""){
			echo "序號：".$serial." -- ".$school."  ".$schoolname." -- <font color=blue>尚未填寫</font>";
		}else{
			echo "序號：".$serial." -- ".$school."  ".$schoolname." -- ".$last;
		}
		echo '</td></tr>';
	}
	*/
	//補一
	if($fn_a1 > 0){ 
		echo '<tr>';
		echo '<td height="30" align="center">'.$schoolcity.'</td>';
		echo '<td height="30" align="left">'.$school.'</td>';
		echo '<td height="30" align="left">'.$schoolname.'</td>';
		echo '<td align="right">'.number_format($fn_1).'</td>';
		echo '<td align="right">'.number_format($fn_2).'</td>';
		echo '<td align="right">'.number_format($fn_3).'</td>';
		echo '<td align="right">'.number_format($fn_4).'</td>';
		echo '<td align="right">'.number_format($ef_2).'</td>';
		echo '<td align="right">'.number_format($ef_3).'</td>';
		echo '<td align="right">'.number_format($ef_6).'</td>';
		echo '<td align="right">'.number_format($ef_7).'</td>';
		if($ef_2==0){
			$temp = "0%";
		}else{
			$temp = number_format($ef_2 * 100 / $fn_1,2)."%";
		}
		echo '<td align="center">'.$temp.'</td>';
		if($ef_3==0){
			$temp = "0%";
		}else{
			$temp = number_format($ef_3 * 100 / $fn_2,2)."%";
		}
		echo '<td align="center">'.$temp.'</td>';
		if($ef_6==0){
			$temp = "0%";
		}else{
			$temp = number_format($ef_6 * 100 / $fn_3,2)."%";
		}
		echo '<td align="center">'.$temp.'</td>';
		if($ef_7==0){
			$temp = "0%";
		}else{
			$temp = number_format($ef_7 * 100 / $fn_4,2)."%";
		}
		echo '<td align="center">'.$temp.'</td>';
		
		echo '</tr>';
	}

	//單校合計
	/*
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
	*/
}
	//該縣市合計
	if($all_fn_total > 1){ 
		echo '<tr>';
		echo '<td height="30" colspan="3" align="center" bgcolor="#FFFFCC">合計</td>';
		//echo '<td width="170" height="30" align="center" bgcolor="#FFFFCC">縣市合計</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($all_fn_1).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($all_fn_2).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($all_fn_3).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($all_fn_4).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($all_ef_2).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($all_ef_3).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($all_ef_6).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($all_ef_7).'</td>';
		if($all_ef_2==0){
			$temp = "0%";
		}else{
			$temp = number_format($all_ef_2 * 100 / $all_fn_1,2)."%";
		}
		echo '<td align="center" bgcolor="#FFFFCC">'.$temp.'</td>';
		if($all_ef_3==0){
			$temp = "0%";
		}else{
			$temp = number_format($all_ef_3 * 100 / $all_fn_2,2)."%";
		}
		echo '<td align="center" bgcolor="#FFFFCC">'.$temp.'</td>';
		if($all_ef_6==0){
			$temp = "0%";
		}else{
			$temp = number_format($all_ef_6 * 100 / $all_fn_3,2)."%";
		}
		echo '<td align="center" bgcolor="#FFFFCC">'.$temp.'</td>';
		if($all_ef_7==0){
			$temp = "0%";
		}else{
			$temp = number_format($all_ef_7 * 100 / $all_fn_4,2)."%";
		}
		echo '<td align="center" bgcolor="#FFFFCC">'.$temp.'</td>';
		echo '</tr>';
	}
?>
 
</table>


<?php 
include "../xSchoolForm/button_close.php";
include "../xSchoolForm/button_print.php";
echo "<br>若要列印本表，建議複製到Excel列印，可彈性調整頁面並縮短電腦列印準備時間。<br>";
echo "操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)";
?>