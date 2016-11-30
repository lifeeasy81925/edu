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
    <td height="60" colspan="15" align="center"><strong><font color=blue>教育部102年度推動教育優先區計畫直轄市、縣(市)政府各補助項目執行成果一覽表<br />縣市別：<? echo $city;?>　　　　　　　　補助項目：一、推展親職教育活動</font></strong></td>
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
	$sql_school = "SELECT sd.account, sd.cityname, sd.district, sd.school ". // index 0~3
				"   , a1.a196, a1.a195, a1.a199, a1.a198, sd.a166 as '補1總計' ". // index 4~8
				"   , se.a1_1, se.a1_2, se.a1_3, se.a1_4, se.a1_5, se.a1_6, se.a1_7, se.a1_8, se.a1_9, se.a1_10, se.a1_11, se.a1_12, se.a1_13, se.a1_14, se.a1_15 ".
				" FROM 102schooldata AS sd left join 102allowance1 AS a1 on sd.account = a1.account ".
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
		$fn_a1 = $row['補1總計'];
		
		$all_fn_total += $fn_a1;
		
		//補1資料 a1.a196, a1.a195, a1.a199, a1.a198 # index 4~7，因為欄名稱重覆所以用indx
		$fn1_1 = $row[4]; //親職教育(場)
		$fn1_2 = $row[5]; //親職教育(元)
		$fn1_3 = $row[6]; //家庭訪視(人)
		$fn1_4 = $row[7]; //家庭訪視(元)
				
		if($fn1_1 > 0) $fn_cnt_1 += $fn1_1; //數量
		if($fn1_3 > 0) $fn_cnt_2 += $fn1_3;
		$fn_total_1 += $fn1_2; //總金額
		$fn_total_2 += $fn1_4;
		
		//↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑教育部審核資料↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
			
		//↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓學校填報資料↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
		//補1資料 a1_2, a1_3, a1_6, a1_7
		$e1_1 = $row['a1_2']; //親職教育(場)
		$e1_2 = $row['a1_3']; //親職教育(元)
		$e1_3 = $row['a1_6']; //家庭訪視(人)
		$e1_4 = $row['a1_7']; //家庭訪視(元)

		if($e1_1 > 0) $e_cnt_1 += $e1_1; //數量
		if($e1_3 > 0) $e_cnt_2 += $e1_3;
		$e_total_1 += $e1_2; //總金額
		$e_total_2 += $e1_4;
		
		//↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑學校填報資料↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
		
		//補一
		if($fn_a1 > 0)
		{ 
			echo '<tr>';
			echo '<td height="30" align="center">'.$schoolcity.'</td>';
			echo '<td height="30" align="left">'.$school.'</td>';
			echo '<td height="30" align="left">'.$schoolname.'</td>';
			echo '<td align="right">'.number_format($fn1_1).'</td>';
			echo '<td align="right">'.number_format($fn1_2).'</td>';
			echo '<td align="right">'.number_format($fn1_3).'</td>';
			echo '<td align="right">'.number_format($fn1_4).'</td>';
			echo '<td align="right">'.number_format($e1_1).'</td>';
			echo '<td align="right">'.number_format($e1_2).'</td>';
			echo '<td align="right">'.number_format($e1_3).'</td>';
			echo '<td align="right">'.number_format($e1_4).'</td>';
			if($e1_1==0){
				$temp = "0%";
			}else{
				$temp = number_format($e1_1 * 100 / $fn1_1,2)."%";
			}
			echo '<td align="center">'.$temp.'</td>';
			if($e1_2==0){
				$temp = "0%";
			}else{
				$temp = number_format($e1_2 * 100 / $fn1_2,2)."%";
			}
			echo '<td align="center">'.$temp.'</td>';
			if($e1_3==0){
				$temp = "0%";
			}else{
				$temp = number_format($e1_3 * 100 / $fn1_3,2)."%";
			}
			echo '<td align="center">'.$temp.'</td>';
			if($e1_4==0){
				$temp = "0%";
			}else{
				$temp = number_format($e1_4 * 100 / $fn1_4,2)."%";
			}
			echo '<td align="center">'.$temp.'</td>';
			
			echo '</tr>';
		}
	}
	
	//該縣市合計
	if($all_fn_total > 1)
	{ 
		echo '<tr>';
		echo '<td height="30" colspan="3" align="center" bgcolor="#FFFFCC">合計</td>';
		//echo '<td width="170" height="30" align="center" bgcolor="#FFFFCC">縣市合計</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($fn_cnt_1).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($fn_total_1).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($fn_cnt_2).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($fn_total_2).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e_cnt_1).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e_total_1).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e_cnt_2).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e_total_2).'</td>';
		if($e_cnt_1==0){
			$temp = "0%";
		}else{
			$temp = number_format($e_cnt_1 * 100 / $fn_cnt_1,2)."%";
		}
		echo '<td align="center" bgcolor="#FFFFCC">'.$temp.'</td>';
		if($e_total_1==0){
			$temp = "0%";
		}else{
			$temp = number_format($e_total_1 * 100 / $fn_total_1,2)."%";
		}
		echo '<td align="center" bgcolor="#FFFFCC">'.$temp.'</td>';
		if($e_cnt_2==0){
			$temp = "0%";
		}else{
			$temp = number_format($e_cnt_2 * 100 / $fn_cnt_2,2)."%";
		}
		echo '<td align="center" bgcolor="#FFFFCC">'.$temp.'</td>';
		if($e_total_2==0){
			$temp = "0%";
		}else{
			$temp = number_format($e_total_2 * 100 / $fn_total_2,2)."%";
		}
		echo '<td align="center" bgcolor="#FFFFCC">'.$temp.'</td>';
		echo '</tr>';
	}
?> 
  <tr>
    <td height="40" colspan="15">承辦人：　　　　　　　　　　　　　　　　　　　　主管科長：　　　　　　　　　　　　　　　　　　　　局 (處) 長：</td>
  </tr>
</table>
</div>
<?php 
include "../xSchoolForm/button_close.php";
include "../xSchoolForm/button_print02.php";
echo "<br>若要列印本表，建議複製到Excel列印，可彈性調整頁面並縮短電腦列印準備時間。<br>";
echo "操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)";
?>
