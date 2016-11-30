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
    <td height="60" colspan="21" align="center"><strong><font color=blue>教育部102年度推動教育優先區計畫直轄市、縣(市)政府各補助項目執行成果一覽表<br />縣市別：<? echo $city;?>　　　　　　　　補助項目：三、修繕偏遠或離島地區師生宿舍</font></strong></td>
  </tr>
  <tr>
    <td rowspan="4" align="center" bgcolor="#FFFFCC">縣市</td>
    <td rowspan="4" align="center" bgcolor="#FFFFCC">學校編號</td>
    <td rowspan="4" align="center" bgcolor="#FFFFCC">學校名稱</td>
    <td colspan="8" align="center" bgcolor="#FFFFCC">教育部核定項目、數量及金額</td>
    <td colspan="8" align="center" bgcolor="#FFFFCC">學校執行成果</td>
    <td colspan="2" rowspan="3" align="center" bgcolor="#FFFFCC">執行成效百分比 (%)</td>
  </tr>
  <tr>
    <td colspan="4" align="center" bgcolor="#FFFFCC">教師宿舍</td>
    <td colspan="4" align="center" bgcolor="#FFFFCC">學生宿舍</td>
    <td colspan="4" align="center" bgcolor="#FFFFCC">教師宿舍</td>
    <td colspan="4" align="center" bgcolor="#FFFFCC">學生宿舍</td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#FFFFCC">經常門</td>
    <td colspan="2" align="center" bgcolor="#FFFFCC">資本門</td>
    <td colspan="2" align="center" bgcolor="#FFFFCC">經常門</td>
    <td colspan="2" align="center" bgcolor="#FFFFCC">資本門</td>
    <td colspan="2" align="center" bgcolor="#FFFFCC">經常門</td>
    <td colspan="2" align="center" bgcolor="#FFFFCC">資本門</td>
    <td colspan="2" align="center" bgcolor="#FFFFCC">經常門</td>
    <td colspan="2" align="center" bgcolor="#FFFFCC">資本門</td>
  </tr>
  <tr>
    <td width="40" align="center" bgcolor="#FFFFCC">棟</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">式</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">棟</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">式</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">棟</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">式</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">棟</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">式</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">數量</td>
    <td width="40" align="center" bgcolor="#FFFFCC">金額</td>
  </tr>
<?
	$sql_school = "SELECT sd.account, sd.cityname, sd.district, sd.school ". // index 0~3
				"   , a3.a201, a3.a196, a3.a202, a3.a197, a3.a203, a3.a199, a3.a204, a3.a200, sd.a168 as '補3總計' ". // index 4~12
				"   , se.a3_1, se.a3_2, se.a3_3, se.a3_4, se.a3_5, se.a3_6, se.a3_7, se.a3_8, se.a3_9, se.a3_10, se.a3_11, se.a3_12, se.a3_13, se.a3_14, se.a3_15 ".
				" FROM 102schooldata AS sd left join 102allowance3 AS a3 on sd.account = a3.account ".
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
		$fn_a3 = $row['補3總計'];
		
		$all_fn_total += $fn_a3;
	
		//補3資料 a3.a201, a3.a196, a3.a202, a3.a197, a3.a203, a3.a199, a3.a204, a3.a200 # index 12~19
		$fn3_1 = $row[4]; //教師-經常門-項
		$fn3_2 = $row[5]; //經常門-元
		$fn3_3 = $row[6]; //資本門-項
		$fn3_4 = $row[7]; //資本門-元
		$fn3_5 = $row[8]; //學生-經常門-項
		$fn3_6 = $row[9]; //經常門-元
		$fn3_7 = $row[10]; //資本門-項
		$fn3_8 = $row[11]; //資本門-元
		if($fn3_1 > 0) $fn3_cnt_1 += $fn3_1; //數量
		if($fn3_3 > 0) $fn3_cnt_2 += $fn3_3;
		if($fn3_5 > 0) $fn3_cnt_3 += $fn3_5;
		if($fn3_7 > 0) $fn3_cnt_4 += $fn3_7;
		$fn3_total_1 += $fn3_2; //總金額
		$fn3_total_2 += $fn3_4;
		$fn3_total_3 += $fn3_6;
		$fn3_total_4 += $fn3_8;
		
		//↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑教育部審核資料↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
	
		
		//↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓學校填報資料↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
		//補3資料 a3_6, a3_7, a3_8, a3_9, a3_10, a3_11, a3_12, a3_13
		$e3_1 = $row['a3_6']; //教師-經常門-項
		$e3_2 = $row['a3_7']; //經常門-元
		$e3_3 = $row['a3_8']; //資本門-項
		$e3_4 = $row['a3_9']; //資本門-元
		$e3_5 = $row['a3_10']; //學生-經常門-項
		$e3_6 = $row['a3_11']; //經常門-元
		$e3_7 = $row['a3_12']; //資本門-項
		$e3_8 = $row['a3_13']; //資本門-元
		if($e3_1 > 0) $e3_cnt_1 += $e3_1; //數量
		if($e3_3 > 0) $e3_cnt_2 += $e3_3;
		if($e3_5 > 0) $e3_cnt_3 += $e3_5;
		if($e3_7 > 0) $e3_cnt_4 += $e3_7;
		$e3_total_1 += $e3_2; //總金額
		$e3_total_2 += $e3_4;
		$e3_total_3 += $e3_6;
		$e3_total_4 += $e3_8;
		
		//↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑學校填報資料↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
		
		//補三
		if($fn_a3 > 0){ 
			echo '<tr>';
			echo '<td height="30" align="center">'.$schoolcity.'</td>';
			echo '<td height="30" align="left">'.$school.'</td>';
			echo '<td height="30" align="left">'.$schoolname.'</td>';
			
			echo '<td align="right">'.number_format($fn3_1).'</td>';
			echo '<td align="right">'.number_format($fn3_2).'</td>';
			echo '<td align="right">'.number_format($fn3_3).'</td>';
			echo '<td align="right">'.number_format($fn3_4).'</td>';
			echo '<td align="right">'.number_format($fn3_5).'</td>';
			echo '<td align="right">'.number_format($fn3_6).'</td>';
			echo '<td align="right">'.number_format($fn3_7).'</td>';
			echo '<td align="right">'.number_format($fn3_8).'</td>';
			
			echo '<td align="right">'.number_format($e3_1).'</td>';
			echo '<td align="right">'.number_format($e3_2).'</td>';
			echo '<td align="right">'.number_format($e3_3).'</td>';
			echo '<td align="right">'.number_format($e3_4).'</td>';
			echo '<td align="right">'.number_format($e3_5).'</td>';
			echo '<td align="right">'.number_format($e3_6).'</td>';
			echo '<td align="right">'.number_format($e3_7).'</td>';
			echo '<td align="right">'.number_format($e3_8).'</td>';

			//該校成效比用數值
			$t_a1 = $fn3_1 + $fn3_3 + $fn3_5 + $fn3_7;
			$t_a2 = $fn3_2 + $fn3_4 + $fn3_6 + $fn3_8;
			$t_b1 = $e3_1 + $e3_3 + $e3_5 + $e3_7;
			$t_b2 = $e3_2 + $e3_4 + $e3_6 + $e3_8;
			//a
			if($t_b1==0){
				$temp = "0%";
			}else{
				$temp = number_format($t_b1 * 100 / $t_a1,2)."%";
			}
			echo '<td align="center">'.$temp.'</td>';
			//b
			if($t_b2==0){
				$temp = "0%";
			}else{
				$temp = number_format($t_b2 * 100 / $t_a2,2)."%";
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
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($fn3_cnt_1).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($fn3_total_1).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($fn3_cnt_2).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($fn3_total_2).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($fn3_cnt_3).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($fn3_total_3).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($fn3_cnt_4).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($fn3_total_4).'</td>';
		
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e3_cnt_1).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e3_total_1).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e3_cnt_2).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e3_total_2).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e3_cnt_3).'</td>';		
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e3_total_3).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e3_cnt_4).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e3_total_4).'</td>';

		//縣市總和用的成效比數值
		$t_a1 = $fn3_cnt_1 + $fn3_cnt_2 + $fn3_cnt_3 + $fn3_cnt_4;
		$t_a2 = $fn3_total_1 + $fn3_total_2 + $fn3_total_3 + $fn3_total_4;
		$t_b1 = $e3_cnt_1 + $e3_cnt_2 + $e3_cnt_3 + $e3_cnt_4;
		$t_b2 = $e3_total_1 + $e3_total_2 + $e3_total_3 + $e3_total_4;
		//a
		if($t_b1==0){
			$temp = "0%";
		}else{
			$temp = number_format($t_b1 * 100 / $t_a1,2)."%";
		}
		echo '<td align="center" bgcolor="#FFFFCC">'.$temp.'</td>';
		//b
		if($t_b2==0){
			$temp = "0%";
		}else{
			$temp = number_format($t_b2 * 100 / $t_a2,2)."%";
		}
		echo '<td align="center" bgcolor="#FFFFCC">'.$temp.'</td>';


		echo '</tr>';
	}
?>
  <tr>
    <td height="40" colspan="21">承辦人：　　　　　　　　　　　　　　　　　　　　主管科長：　　　　　　　　　　　　　　　　　　　　局 (處) 長：</td>
  </tr>
</table>
</div>
<?php 
include "../xSchoolForm/button_close.php";
include "../xSchoolForm/button_print02.php";
echo "<br>若要列印本表，建議複製到Excel列印，可彈性調整頁面並縮短電腦列印準備時間。<br>";
echo "操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)";
?>
