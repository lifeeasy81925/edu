<?php
include "../../mainfile.php";
include "../../header.php";
include "../xSchoolForm/button_close.php";
include "../xSchoolForm/button_print02.php";
session_start(); 
$username = $xoopsUser->getVar('uname');
global $xoopsDB;
$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
$result_city = $xoopsDB -> query($sql) or die($sql);
while($row = mysql_fetch_row($result_city)) {
	$city = $row[1];
	$cityname = $row[1];
	$cityman = $row[2];
	$cityno = $row[4];
}
if($city == '') $city = '全國';
echo $username."--";
echo $city."--";
echo $cityman." ";
$serial = 0;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p>
<div id="print_content">
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td height="60" colspan="18" align="center"><strong><font color=blue>教育部102年度推動教育優先區計畫直轄市、縣(市)政府各補助項目執行成果一覽表<br />
    縣市別：<? echo $city;?>　　　　　　　　補助項目：六、補助原補助交通不便地區學校交通車</font></strong></td>
  </tr>
  <tr>
    <td rowspan="3" align="center" bgcolor="#FFFFCC">縣市</td>
    <td rowspan="3" align="center" bgcolor="#FFFFCC">學校編號</td>
    <td rowspan="3" align="center" bgcolor="#FFFFCC">學校名稱</td>
    <td colspan="7" align="center" bgcolor="#FFFFCC">教育部核定項目、數量及金額</td>
    <td colspan="7" align="center" bgcolor="#FFFFCC">學校執行成果</td>
    <td rowspan="2" align="center" bgcolor="#FFFFCC">執行成效百分比 (%)</td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#FFFFCC">臨時性租車</td>
    <td colspan="2" align="center" bgcolor="#FFFFCC">補助交通費</td>
    <td colspan="2" align="center" bgcolor="#FFFFCC">購置交通車</td>
    <td width="100" rowspan="2" align="center" bgcolor="#FFFFCC">經費合計</td>
    <td colspan="2" align="center" bgcolor="#FFFFCC">臨時性租車</td>
    <td colspan="2" align="center" bgcolor="#FFFFCC">補助交通費</td>
    <td colspan="2" align="center" bgcolor="#FFFFCC">購置交通車</td>
    <td width="100" rowspan="2" align="center" bgcolor="#FFFFCC">經費合計</td>
  </tr>
  <tr>
    <td width="40" align="center" bgcolor="#FFFFCC">輛</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">人</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">輛</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">輛</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">人</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">輛</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">金額</td>
  </tr>
<?
	$sql_school = "SELECT sd.account, sd.cityname, sd.district, sd.school ". // index 0~3
				"   , a6.a196, a6.a198, a6.a200, sd.a171 as '補6總計' ". // index 4~7
				"   , se.a6_1, se.a6_2, se.a6_3, se.a6_4, se.a6_5, se.a6_6, se.a6_7, se.a6_8, se.a6_9, se.a6_10, se.a6_11, se.a6_12, se.a6_13, se.a6_14, se.a6_15 ".
				" FROM 102schooldata AS sd ".
				"			  left join 102allowance6 AS a6 on sd.account = a6.account ".
				"             left join 102school_effect AS se on sd.account = se.account ";
					
	//$sql_school = $sql_school." order by sd.type;"; //搜尋全部學校 測試用
	//echo "<br /><br />".$sql_school."<br /><br />";
	if ($cityname == "全國")
	{
		$sql_school = $sql_school." order by sd.type;"; //搜尋全部學校
	}else
	{  
		$sql_school = $sql_school." where sd.cityname like '$city' order by sd.type;"; //搜尋縣市相符學校
	}
	
	$result_school = mysql_query($sql_school);
	while($row = mysql_fetch_array($result_school))
	{
		$school = $row[0]; //帳號
		$schoolcity = $row[1];
		$schoolname = $row[1].$row[2].$row[3]; //縣市+區+校名
		
		//↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓教育部審核資料↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
		//教育部審核金額
		$fn_a6 = $row['補6總計'];
		
		$all_fn_total += $fn_a6;
		
		//補6資料 a6.a196, a6.a198, a6.a200 # index 27~29
		$fn6_1 = $row[4]; //租車費
		$fn6_2 = $row[5]; //交通費
		$fn6_3 = $row[6]; //交通車
		$fn6_cnt_1 = 0; //補6 數量都0 (不確定
		$fn6_cnt_2 = 0;
		$fn6_cnt_3 = 0;
		$fn6_total_1 += $fn6_1; //總金額
		$fn6_total_2 += $fn6_2;
		$fn6_total_3 += $fn6_3;
		
		//↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑教育部審核資料↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
	
		
		//↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓學校填報資料↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
		//學校填報金額(總計)
		$e_a6 = $row['a6_1'];
		
		$all_e_total += $e_a6;
		
		//補6資料 a6_4, a6_6, a6_9
		$e6_1 = $row['a6_4']; //租車費
		$e6_2 = $row['a6_6']; //交通費
		$e6_3 = $row['a6_9']; //交通車
		$e6_cnt_1 += $row['a6_3'];
		$e6_cnt_2 += $row['a6_5'];
		$e6_cnt_3 += $row['a6_8'];
		$e6_total_1 += $e6_1; //總金額
		$e6_total_2 += $e6_2;
		$e6_total_3 += $e6_3;
		
		//↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑學校填報資料↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
		//補七
		if($fn_a6 > 0){ 
			echo '<tr>';
			echo '<td height="30" align="center">'.$schoolcity.'</td>';
			echo '<td height="30" align="left">'.$school.'</td>';
			echo '<td height="30" align="left">'.$schoolname.'</td>';
			
			echo '<td align="right">'.number_format($fn6_cnt_1).'</td>';
			echo '<td align="right">'.number_format($fn6_1).'</td>';
			echo '<td align="right">'.number_format($fn6_cnt_2).'</td>';
			echo '<td align="right">'.number_format($fn6_2).'</td>';
			echo '<td align="right">'.number_format($fn6_cnt_3).'</td>';
			echo '<td align="right">'.number_format($fn6_3).'</td>';
			echo '<td align="right">'.number_format($fn_a6).'</td>';
			
			echo '<td align="right">'.number_format($row['a6_3']).'</td>';
			echo '<td align="right">'.number_format($e6_1).'</td>';
			echo '<td align="right">'.number_format($row['a6_5']).'</td>';
			echo '<td align="right">'.number_format($e6_2).'</td>';
			echo '<td align="right">'.number_format($row['a6_8']).'</td>';
			echo '<td align="right">'.number_format($e6_3).'</td>';
			echo '<td align="right">'.number_format($e_a6).'</td>';

			if($e_a6==0){
				$temp = "0%";
			}else{
				$temp = number_format($e_a6 * 100 / $fn_a6,2)."%";
			}
			echo '<td align="right">'.$temp.'</td>';
			
			echo '</tr>';
		}
	}
	
	//該縣市合計
	if($all_fn_total > 1){ 
		echo '<tr>';
		echo '<td height="30" colspan="3" align="center" bgcolor="#FFFFCC">合計</td>';
		//echo '<td width="170" height="30" align="center" bgcolor="#FFFFCC">縣市合計</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'."0".'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($fn6_total_1).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'."0".'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($fn6_total_2).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'."0".'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($fn6_total_3).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($all_fn_total).'</td>';
		
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e6_cnt_1).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e6_total_1).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e6_cnt_2).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e6_total_2).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e6_cnt_3).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e6_total_3).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($all_e_total).'</td>';

		if($all_e_total==0){
			$temp = "0%";
		}else{
			$temp = number_format($all_e_total * 100 / $all_fn_total,2)."%";
		}
		echo '<td align="right" bgcolor="#FFFFCC">'.$temp.'</td>';

		echo '</tr>';
	}
?> 
  <tr>
    <td height="40" colspan="18">承辦人：　　　　　　　　　　　　　　　　　　　　主管科長：　　　　　　　　　　　　　　　　　　　　局 (處) 長：</td>
  </tr>
</table>
</div>
<?php 
include "../xSchoolForm/button_close.php";
include "../xSchoolForm/button_print02.php";
echo "<br>若要列印本表，建議複製到Excel列印，可彈性調整頁面並縮短電腦列印準備時間。<br>";
echo "操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)";
?>
