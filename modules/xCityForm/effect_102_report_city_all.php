<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
$username = $xoopsUser->getVar('uname');
global $xoopsDB;
$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
$result_city = $xoopsDB -> query($sql) or die($sql);
while($row = mysql_fetch_row($result_city)) {
	$city = $row[1];
	$cityman = $row[2];
	$cityno = $row[4];
}
echo $username."--";
echo $city."--";
echo $cityman." ";
$serial = 0;
?>

<?

	$sql_school = "SELECT sd.account, sd.cityname, sd.district, sd.school ". // index 0~3
				"   , a1.a196, a1.a195, a1.a199, a1.a198, sd.a166 as '補1總計' ". // index 4~8
				"   , a2.a193, a2.a194, sd.a167 as '補2總計' ". // index 9~11
				"   , a3.a201, a3.a196, a3.a202, a3.a197, a3.a203, a3.a199, a3.a204, a3.a200, sd.a168 as '補3總計' ". // index 12~20
				"   , a4.a193, a4.a194, sd.a169 as '補4總計' ". // index 21~23
				"   , a5.a193, a5.a194, sd.a170 as '補5總計' ". // index 24~26
				"   , a6.a196, a6.a198, a6.a200, sd.a171 as '補6總計' ". // index 27~30
				"   , a7.a193, a7.a194, sd.a172 as '補7總計' ". // index 31~33
				"   , se.a1_1, se.a1_2, se.a1_3, se.a1_4, se.a1_5, se.a1_6, se.a1_7, se.a1_8, se.a1_9, se.a1_10, se.a1_11, se.a1_12, se.a1_13, se.a1_14, se.a1_15 ".
				"   , se.a2_1, se.a2_2, se.a2_3, se.a2_4, se.a2_5, se.a2_6, se.a2_7, se.a2_8, se.a2_9, se.a2_10, se.a2_11, se.a2_12, se.a2_13, se.a2_14, se.a2_15 ".
				"   , se.a3_1, se.a3_2, se.a3_3, se.a3_4, se.a3_5, se.a3_6, se.a3_7, se.a3_8, se.a3_9, se.a3_10, se.a3_11, se.a3_12, se.a3_13, se.a3_14, se.a3_15 ".
				"   , se.a4_1, se.a4_2, se.a4_3, se.a4_4, se.a4_5, se.a4_6, se.a4_7, se.a4_8, se.a4_9, se.a4_10, se.a4_11, se.a4_12, se.a4_13, se.a4_14, se.a4_15 ".
				"   , se.a5_1, se.a5_2, se.a5_3, se.a5_4, se.a5_5, se.a5_6, se.a5_7, se.a5_8, se.a5_9, se.a5_10, se.a5_11, se.a5_12, se.a5_13, se.a5_14, se.a5_15 ".
				"   , se.a6_1, se.a6_2, se.a6_3, se.a6_4, se.a6_5, se.a6_6, se.a6_7, se.a6_8, se.a6_9, se.a6_10, se.a6_11, se.a6_12, se.a6_13, se.a6_14, se.a6_15 ".
				"   , se.a7_1, se.a7_2, se.a7_3, se.a7_4, se.a7_5, se.a7_6, se.a7_7, se.a7_8, se.a7_9, se.a7_10, se.a7_11, se.a7_12, se.a7_13, se.a7_14, se.a7_15 ".
				" FROM 102schooldata AS sd left join 102allowance1 AS a1 on sd.account = a1.account ".
				"             left join 102allowance2 AS a2 on sd.account = a2.account ".
				"			  left join 102allowance3 AS a3 on sd.account = a3.account ".
				"             left join 102allowance4 AS a4 on sd.account = a4.account ".
				"			  left join 102allowance5 AS a5 on sd.account = a5.account ".
				"			  left join 102allowance6 AS a6 on sd.account = a6.account ".
				"			  left join 102allowance7 AS a7 on sd.account = a7.account ".
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
		$schoolname = $row[1].$row[2].$row[3]; //縣市+區+校名
		
		//↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓教育部審核資料↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
		//教育部審核金額 *修改後沒用到
		$fn_a1 = $row['補1總計'];
		$fn_a2 = $row['補2總計'];
		$fn_a3 = $row['補3總計'];
		$fn_a4 = $row['補4總計'];
		$fn_a5 = $row['補5總計'];
		$fn_a6 = $row['補6總計'];
		$fn_a7 = $row['補7總計'];
		
		//補1資料 a1.a196, a1.a195, a1.a199, a1.a198 # index 4~7，因為欄名稱重覆所以用indx
		$fn1_1 = $row[4]; //親職教育(場)
		$fn1_2 = $row[5]; //親職教育(元)
		$fn1_3 = $row[6]; //家庭訪視(人)
		$fn1_4 = $row[7]; //家庭訪視(元)
		if($fn1_2 > 0) $fn1_school_cnt_1++; //親職教育 學校數，有金額就算
		if($fn1_4 > 0) $fn1_school_cnt_2++; //家庭訪視
		if($fn1_1 > 0) $fn1_cnt_1 += $fn1_1; //數量
		if($fn1_3 > 0) $fn1_cnt_2 += $fn1_3;
		$fn1_total_1 += $fn1_2; //總金額
		$fn1_total_2 += $fn1_4;
		
		//補2資料 a2.a193, a2.a194 # index 9~10
		$fn2_1 = $row[9]; //經常門加總
		$fn2_2 = $row[10]; //資本門加總
		if($fn2_1 > 0) $fn2_school_cnt_1++; //經常門 學校數，有金額就算
		if($fn2_2 > 0) $fn2_school_cnt_2++; //資本門
		$fn2_cnt_1 = $fn2_school_cnt_1; //經常門 數量同校數
		$fn2_cnt_2 = $fn2_school_cnt_2; //資本門
		$fn2_total_1 += $fn2_1; //總金額
		$fn2_total_2 += $fn2_2;
		
		//補3資料 a3.a201, a3.a196, a3.a202, a3.a197, a3.a203, a3.a199, a3.a204, a3.a200 # index 12~19
		$fn3_1 = $row[12]; //教師-經常門-項
		$fn3_2 = $row[13]; //經常門-元
		$fn3_3 = $row[14]; //資本門-項
		$fn3_4 = $row[15]; //資本門-元
		$fn3_5 = $row[16]; //學生-經常門-項
		$fn3_6 = $row[17]; //經常門-元
		$fn3_7 = $row[18]; //資本門-項
		$fn3_8 = $row[19]; //資本門-元
		if($fn3_2 > 0) $fn3_school_cnt_1++; //學校數 教師-經常門 
		if($fn3_4 > 0) $fn3_school_cnt_2++; //       教師-資本門 
		if($fn3_6 > 0) $fn3_school_cnt_3++; //       學生-經常門 
		if($fn3_8 > 0) $fn3_school_cnt_4++; //       學生-資本門 
		if($fn3_1 > 0) $fn3_cnt_1 += $fn3_1; //數量
		if($fn3_3 > 0) $fn3_cnt_2 += $fn3_3;
		if($fn3_5 > 0) $fn3_cnt_3 += $fn3_5;
		if($fn3_7 > 0) $fn3_cnt_4 += $fn3_7;
		$fn3_total_1 += $fn3_2; //總金額
		$fn3_total_2 += $fn3_4;
		$fn3_total_3 += $fn3_6;
		$fn3_total_4 += $fn3_8;

		//補4資料 a4.a193, a4.a194 # index 21~22
		$fn4_1 = $row[21]; //經常門
		$fn4_2 = $row[22]; //資本門
		if($fn4_1 > 0) $fn4_school_cnt_1++; //經常門 學校數，有金額就算
		if($fn4_2 > 0) $fn4_school_cnt_2++; //資本門
		$fn4_cnt_1 = $fn4_school_cnt_1; //經常門 數量同校數
		$fn4_cnt_2 = $fn4_school_cnt_2; //資本門
		$fn4_total_1 += $fn4_1; //總金額
		$fn4_total_2 += $fn4_2;
		
		//補5資料 a5.a193, a5.a194 # index 24~25
		$fn5_1 = $row[24]; //經常門
		$fn5_2 = $row[25]; //資本門
		if($fn5_1 > 0) $fn5_school_cnt_1++; //經常門 學校數，有金額就算
		if($fn5_2 > 0) $fn5_school_cnt_2++; //資本門
		$fn5_cnt_1 = 0; //補5 數量都0 (不確定
		$fn5_cnt_2 = 0;
		$fn5_total_1 += $fn5_1; //總金額
		$fn5_total_2 += $fn5_2;
		
		//補6資料 a6.a196, a6.a198, a6.a200 # index 27~29
		$fn6_1 = $row[27]; //租車費
		$fn6_2 = $row[28]; //交通費
		$fn6_3 = $row[29]; //交通車
		if($fn6_1 > 0) $fn6_school_cnt_1++; //租車費 學校數，有金額就算
		if($fn6_2 > 0) $fn6_school_cnt_2++; //交通費
		if($fn6_3 > 0) $fn6_school_cnt_3++; //交通車
		$fn6_cnt_1 = 0; //補6 數量都0 (不確定
		$fn6_cnt_2 = 0;
		$fn6_cnt_3 = 0;
		$fn6_total_1 += $fn6_1; //總金額
		$fn6_total_2 += $fn6_2;
		$fn6_total_3 += $fn6_3;
		
		//補7資料 a7.a193, a7.a194 # index 31~32
		$fn7_1 = $row[31]; //修建
		$fn7_2 = $row[32]; //設備
		if($fn7_1 > 0) $fn7_school_cnt_1++; //修建 學校數，有金額就算
		if($fn7_2 > 0) $fn7_school_cnt_2++; //設備 學校數，有金額就算
		$fn7_cnt_1 = 0; //補7 數量都0 (不確定
		$fn7_cnt_2 = 0; 
		$fn7_total_1 += $fn7_1; //總金額
		$fn7_total_2 += $fn7_2;
		
		//↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑教育部審核資料↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
	
		
		//↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓學校填報資料↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
		//學校填報金額(總計) *修改後沒用到
		$ef_a1 = $row['a1_1'];
		$ef_a2 = $row['a2_1'];
		$ef_a3 = $row['a3_1'];
		$ef_a4 = $row['a4_1'];
		$ef_a5 = $row['a5_1'];
		$ef_a6 = $row['a6_1'];
		$ef_a7 = $row['a7_1'];
		
		//補1資料 a1_2, a1_3, a1_6, a1_7
		$e1_1 = $row['a1_2']; //親職教育(場)
		$e1_2 = $row['a1_3']; //親職教育(元)
		$e1_3 = $row['a1_6']; //家庭訪視(人)
		$e1_4 = $row['a1_7']; //家庭訪視(元)
		if($e1_2 > 0) $e1_school_cnt_1++; //親職教育 學校數，有金額就算
		if($e1_4 > 0) $e1_school_cnt_2++; //家庭訪視
		if($e1_1 > 0) $e1_cnt_1 += $e1_1; //數量
		if($e1_3 > 0) $e1_cnt_2 += $e1_3;
		$e1_total_1 += $e1_2; //總金額
		$e1_total_2 += $e1_4;
		
		//補2資料 a2_2, a2_3
		$e2_1 = $row['a2_2']; //經常門加總
		$e2_2 = $row['a2_3']; //資本門加總
		if($e2_1 > 0) $e2_school_cnt_1++; //經常門 學校數，有金額就算
		if($e2_2 > 0) $e2_school_cnt_2++; //資本門
		if($row['a2_5'] > 0) $e2_cnt_1++; //特色1-經常門 數量，有金額就算
		if($row['a2_10'] > 0) $e2_cnt_1++; //特色2-經常門
		if($row['a2_6'] > 0) $e2_cnt_2++; //特色1-資本門
		if($row['a2_11'] > 0) $e2_cnt_2++; //特色1-資本門
		$e2_total_1 += $e2_1; //總金額
		$e2_total_2 += $e2_2;
				
		//補3資料 a3_6, a3_7, a3_8, a3_9, a3_10, a3_11, a3_12, a3_13
		$e3_1 = $row['a3_6']; //教師-經常門-項
		$e3_2 = $row['a3_7']; //經常門-元
		$e3_3 = $row['a3_8']; //資本門-項
		$e3_4 = $row['a3_9']; //資本門-元
		$e3_5 = $row['a3_10']; //學生-經常門-項
		$e3_6 = $row['a3_11']; //經常門-元
		$e3_7 = $row['a3_12']; //資本門-項
		$e3_8 = $row['a3_13']; //資本門-元
		if($e3_2 > 0) $e3_school_cnt_1++; //學校數 教師-經常門 
		if($e3_4 > 0) $e3_school_cnt_2++; //       教師-資本門 
		if($e3_6 > 0) $e3_school_cnt_3++; //       學生-經常門 
		if($e3_8 > 0) $e3_school_cnt_4++; //       學生-資本門 
		if($e3_1 > 0) $e3_cnt_1 += $e3_1; //數量
		if($e3_3 > 0) $e3_cnt_2 += $e3_3;
		if($e3_5 > 0) $e3_cnt_3 += $e3_5;
		if($e3_7 > 0) $e3_cnt_4 += $e3_7;
		$e3_total_1 += $e3_2; //總金額
		$e3_total_2 += $e3_4;
		$e3_total_3 += $e3_6;
		$e3_total_4 += $e3_8;
		
		//補4資料 a4_2,a4_3
		$e4_1 = $row['a4_2']; //經常門
		$e4_2 = $row['a4_3']; //資本門
		if($e4_1 > 0) $e4_school_cnt_1++; //經常門 學校數，有金額就算
		if($e4_2 > 0) $e4_school_cnt_2++; //資本門
		$e4_cnt_1 = $e4_school_cnt_1; //補4數量同校數
		$e4_cnt_2 = $e4_school_cnt_2;
		$e4_total_1 += $e4_1; //總金額
		$e4_total_2 += $e4_2;
		
		//補5資料 a5_2, a5_3
		$e5_1 = $row['a5_2']; //經常門
		$e5_2 = $row['a5_3']; //資本門
		if($e5_1 > 0) $e5_school_cnt_1++; //經常門 學校數，有金額就算
		if($e5_2 > 0) $e5_school_cnt_2++; //資本門
		if($e5_1 > 0) $e5_cnt_1 += $row['a5_4']; //補5 兩個數量相同
		if($e5_2 > 0) $e5_cnt_2 += $row['a5_4'];
		$e5_total_1 += $e5_1; //總金額
		$e5_total_2 += $e5_2;
		
		//補6資料 a6_4, a6_6, a6_9
		$e6_1 = $row['a6_4']; //租車費
		$e6_2 = $row['a6_6']; //交通費
		$e6_3 = $row['a6_9']; //交通車
		if($e6_1 > 0) $e6_school_cnt_1++; //租車費 學校數，有金額就算
		if($e6_2 > 0) $e6_school_cnt_2++; //交通費
		if($e6_3 > 0) $e6_school_cnt_3++; //交通車
		$e6_cnt_1 += $row['a6_3'];
		$e6_cnt_2 += $row['a6_5'];
		$e6_cnt_3 += $row['a6_8'];
		$e6_total_1 += $e6_1; //總金額
		$e6_total_2 += $e6_2;
		$e6_total_3 += $e6_3;
		
		//補7資料 a7_3, a7_4
		$e7_1 = $row['a7_3']; //修建
		$e7_2 = $row['a7_4']; //設備
		if($e7_1 > 0) $e7_school_cnt_1++; //修建 學校數，有金額就算
		if($e7_2 > 0) $e7_school_cnt_2++; //設備 學校數，有金額就算
		if($e7_1 > 0) $e7_cnt_1 += $row['a7_2']; //補8 兩個數量相同
		if($e7_2 > 0) $e7_cnt_2 += $row['a7_2'];
		$e7_total_1 += $e7_1; //總金額
		$e7_total_2 += $e7_2;
		
		//↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑學校填報資料↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
		
		$fn_total_money = $fn1_total_1 + $fn1_total_2 + $fn2_total_1 + $fn2_total_2 + $fn3_total_1 + $fn3_total_2 + $fn3_total_3 + $fn3_total_4 
						+ $fn4_total_1 + $fn4_total_2 + $fn5_total_1 + $fn5_total_2 + $fn6_total_1 + $fn6_total_2 + $fn6_total_3
						+ $fn7_total_1 + $fn7_total_2;
						
		$e_total_money = $e1_total_1 + $e1_total_2 + $e2_total_1 + $e2_total_2 + $e3_total_1 + $e3_total_2 + $e3_total_3 + $e3_total_4 
						+ $e4_total_1 + $e4_total_2 + $e5_total_1 + $e5_total_2 + $e6_total_1 + $e6_total_2 + $e6_total_3
						+ $e7_total_1 + $e7_total_2;
	}
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<P>
<div id="print_content">
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td height="50" colspan="13" align="center"><strong><font color=blue><? echo $city;?>政府 執行教育部102年度推動教育優先區計畫成果一覽表</font></strong></td>
  </tr>
  <tr>
    <td rowspan="2" align="center">項次</td>
    <td colspan="3" rowspan="2" align="center">補助項目</td>
    <td colspan="3" align="center" bgcolor="#FF99CC">教育部核定數量及金額</td>
    <td colspan="3" align="center" bgcolor="#99FFCC">全縣國中小執行成果</td>
    <td colspan="3" align="center" bgcolor="#FFFF99">執行成效百分比 (%)</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FF99CC">校數</td>
    <td align="center" bgcolor="#FF99CC">數量</td>
    <td align="center" bgcolor="#FF99CC">金額 (元)</td>
    <td align="center" bgcolor="#99FFCC">校數</td>
    <td align="center" bgcolor="#99FFCC">數量</td>
    <td align="center" bgcolor="#99FFCC">金額 (元)</td>
    <td align="center" bgcolor="#FFFF99">校數</td>
    <td align="center" bgcolor="#FFFF99">數量</td>
    <td align="center" bgcolor="#FFFF99">金額</td>
  </tr>
  <tr>
    <td rowspan="2" align="center">一</td>
    <td rowspan="2">推展親職教育活動</td>
    <td colspan="2">親職教育活動(場)</td>
    <td height="30" align="right" bgcolor="#FF99CC"><? echo number_format($fn1_school_cnt_1); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn1_cnt_1); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn1_total_1); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e1_school_cnt_1); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e1_cnt_1); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e1_total_1); ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e1_school_cnt_1 / $fn1_school_cnt_1 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e1_cnt_1 / $fn1_cnt_1 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e1_total_1 / $fn1_total_1 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td colspan="2">目標學生家庭訪視輔導(人)</td>
    <td height="30" align="right" bgcolor="#FF99CC"><? echo number_format($fn1_school_cnt_2); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn1_cnt_2); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn1_total_2); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e1_school_cnt_2); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e1_cnt_2); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e1_total_2); ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e1_school_cnt_2 / $fn1_school_cnt_2 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e1_cnt_2 / $fn1_cnt_2 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e1_total_2 / $fn1_total_2 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td rowspan="2" align="center">二</td>
    <td colspan="2" rowspan="2">補助學校發展教育特色(項)</td>
    <td>經常門</td>
    <td height="30" align="right" bgcolor="#FF99CC"><? echo number_format($fn2_school_cnt_1); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn2_cnt_1); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn2_total_1); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e2_school_cnt_1); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e2_cnt_1); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e2_total_1); ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e2_school_cnt_1 / $fn2_school_cnt_1 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e2_cnt_2 / $fn2_cnt_1 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e2_total_1 / $fn2_total_1 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td>資本門</td>
    <td height="30" align="right" bgcolor="#FF99CC"><? echo number_format($fn2_school_cnt_2); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn2_cnt_2); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn2_total_2); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e2_school_cnt_2); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e2_cnt_2); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e2_total_2); ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e2_school_cnt_2 / $fn2_school_cnt_2 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e2_cnt_2 / $fn2_cnt_2 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e2_total_2 / $fn2_total_2 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td width="35" rowspan="4" align="center">三</td>
    <td width="100" rowspan="4">修繕離島或偏遠地區師生宿舍</td>
    <td width="80" rowspan="2">教師宿舍</td>
    <td width="100">經常門(棟)</td>
    <td height="30" align="right" bgcolor="#FF99CC"><? echo number_format($fn3_school_cnt_1); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn3_cnt_1); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn3_total_1); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e3_school_cnt_1); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e3_cnt_1); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e3_total_1); ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e3_school_cnt_1 / $fn3_school_cnt_1 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e3_cnt_1 / $fn3_cnt_1 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e3_total_1 / $fn3_total_1 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td width="100">資本門(式)</td>
    <td height="30" align="right" bgcolor="#FF99CC"><? echo number_format($fn3_school_cnt_2); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn3_cnt_2); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn3_total_2); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e3_school_cnt_2); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e3_cnt_2); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e3_total_2); ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e3_school_cnt_2 / $fn3_school_cnt_2 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e3_cnt_2 / $fn3_cnt_2 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e3_total_2 / $fn3_total_2 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td width="80" rowspan="2">學生宿舍</td>
    <td width="100">經常門(棟)</td>
    <td height="30" align="right" bgcolor="#FF99CC"><? echo number_format($fn3_school_cnt_3); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn3_cnt_3); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn3_total_3); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e3_school_cnt_3); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e3_cnt_3); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e3_total_3); ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e3_school_cnt_3 / $fn3_school_cnt_3 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e3_cnt_3 / $fn3_cnt_3 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e3_total_3 / $fn3_total_3 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td width="100">資本門(式)</td>
    <td height="30" align="right" bgcolor="#FF99CC"><? echo number_format($fn3_school_cnt_4); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn3_cnt_4); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn3_total_4); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e3_school_cnt_4); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e3_cnt_4); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e3_total_4); ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e3_school_cnt_4 / $fn3_school_cnt_4 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e3_cnt_4 / $fn3_cnt_4 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e3_total_4 / $fn3_total_4 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td rowspan="2" align="center">四</td>
    <td colspan="2" rowspan="2">充實學校基本教學設備</td>
    <td>經常門</td>
    <td height="30" align="right" bgcolor="#FF99CC"><? echo number_format($fn4_school_cnt_1); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn4_cnt_1); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn4_total_1); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e4_school_cnt_1); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e4_cnt_1); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e4_total_1); ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e4_school_cnt_1 / $fn4_school_cnt_1 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e4_cnt_1 / $fn4_cnt_1 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e4_total_1 / $fn4_total_1 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td>資本門</td>
    <td height="30" align="right" bgcolor="#FF99CC"><? echo number_format($fn4_school_cnt_2); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn4_cnt_2); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn4_total_2); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e4_school_cnt_2); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e4_cnt_2); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e4_total_2); ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e4_school_cnt_2 / $fn4_school_cnt_2 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e4_cnt_2 / $fn4_cnt_2 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e4_total_2 / $fn4_total_2 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td rowspan="2" align="center">五</td>
    <td colspan="2" rowspan="2">發展原住民教育文化特色及充實設備器材</td>
    <td>經常門(項)</td>
    <td height="30" align="right" bgcolor="#FF99CC"><? echo number_format($fn5_school_cnt_1); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn5_cnt_1); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn5_total_1); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e5_school_cnt_1); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e5_cnt_1); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e5_total_1); ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e5_school_cnt_1 / $fn5_school_cnt_1 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e5_cnt_1 / $fn5_cnt_1 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e5_total_1 / $fn5_total_1 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td>資本門(式)</td>
    <td height="30" align="right" bgcolor="#FF99CC"><? echo number_format($fn5_school_cnt_2); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn5_cnt_2); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn5_total_2); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e5_school_cnt_2); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e5_cnt_2); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e5_total_2); ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e5_school_cnt_2 / $fn5_school_cnt_2 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e5_cnt_2 / $fn5_cnt_2 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e5_total_2 / $fn5_total_2 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td rowspan="3" align="center">六</td>
    <td rowspan="3">補助交通不便地區學校交通車</td>
    <td colspan="2">補助租車費(輛)</td>
    <td height="30" align="right" bgcolor="#FF99CC"><? echo number_format($fn6_school_cnt_1); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn6_cnt_1); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn6_total_1); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e6_school_cnt_1); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e6_cnt_1); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e6_total_1); ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e6_school_cnt_1 / $fn6_school_cnt_1 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e6_cnt_1 / $fn6_cnt_1 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e6_total_1 / $fn6_total_1 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td colspan="2">補助交通費(人)</td>
    <td height="30" align="right" bgcolor="#FF99CC"><? echo number_format($fn6_school_cnt_2); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn6_cnt_2); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn6_total_2); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e6_school_cnt_2); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e6_cnt_2); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e6_total_2); ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e6_school_cnt_2 / $fn6_school_cnt_2 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e6_cnt_2 / $fn6_cnt_2 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e6_total_2 / $fn6_total_2 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td colspan="2">補助購買交通車(輛)</td>
    <td height="30" align="right" bgcolor="#FF99CC"><? echo number_format($fn6_school_cnt_3); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn6_cnt_3); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn6_total_3); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e6_school_cnt_3); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e6_cnt_3); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e6_total_3); ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e6_school_cnt_3 / $fn6_school_cnt_3 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e6_cnt_3 / $fn6_cnt_3 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e6_total_3 / $fn6_total_3 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td rowspan="2" align="center">七</td>
    <td rowspan="2">整修學校社區化活動場所</td>
    <td rowspan="2">綜合球場</td>
    <td>修建</td>
    <td height="30" align="right" bgcolor="#FF99CC"><? echo number_format($fn7_school_cnt_1); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn7_cnt_1); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn7_total_1); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e7_school_cnt_1); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e7_cnt_1); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e7_total_1); ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e7_school_cnt_1 / $fn7_school_cnt_1 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e7_cnt_1 / $fn7_cnt_1 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e7_total_1 / $fn7_total_1 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td>設備</td>
    <td height="30" align="right" bgcolor="#FF99CC"><? echo number_format($fn7_school_cnt_2); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn7_cnt_2); ?></td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn7_total_2); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e7_school_cnt_2); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e7_cnt_2); ?></td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e7_total_2); ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e7_school_cnt_2 / $fn7_school_cnt_2 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e7_cnt_2 / $fn7_cnt_2 * 100,2).'%'; ?></td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e7_total_2 / $fn7_total_2 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td colspan="4" align="center">總計</td>
    <td height="30" align="right" bgcolor="#FF99CC">&nbsp;</td>
    <td align="right" bgcolor="#FF99CC">&nbsp;</td>
    <td align="right" bgcolor="#FF99CC"><? echo number_format($fn_total_money); ?></td>
    <td align="right" bgcolor="#99FFCC">&nbsp;</td>
    <td align="right" bgcolor="#99FFCC">&nbsp;</td>
    <td align="right" bgcolor="#99FFCC"><? echo number_format($e_total_money); ?></td>
    <td align="right" bgcolor="#FFFF99">&nbsp;</td>
    <td align="right" bgcolor="#FFFF99">&nbsp;</td>
    <td align="right" bgcolor="#FFFF99"><? echo number_format($e_total_money / $fn_total_money * 100 , 2).'%'; ?></td>
  </tr>
  <tr>
    <td height="40" colspan="13">承辦人：　　　　　　　　　　　　　　　科長：　　　　　　　　　　　　　　　局 (處) 長：</td>
  </tr>
</table>
<br />
<? 
	echo '核定總金額：'.number_format($fn_total_money).'<br>';
	echo '執行總金額：'.number_format($e_total_money).'<br>';
	echo '　　執行率：'.number_format($e_total_money / $fn_total_money * 100 , 2).'%'.'<br><br>';
?>
</div>
<?php 
include "../xSchoolForm/button_close.php";
include "../xSchoolForm/button_print02.php";
echo "<br>若要列印本表，建議複製到Excel列印，可彈性調整頁面並縮短電腦列印準備時間。<br>";
echo "操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)";
?>