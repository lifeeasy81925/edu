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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
您查詢的資料為 102年度 "<? echo $cityname; ?>"<br>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td height="60" colspan="13" align="center"><strong><font color=blue>教育部102年度推動教育優先區計畫直轄市、縣(市)政府各補助項目執行成果一覽表<br />縣市別：<? echo $city;?>　　　　　　　　補助項目：七、整修學校社區化活動場所</font></strong></td>
  </tr>
  <tr>
    <td rowspan="3" align="center" bgcolor="#FFFFCC">縣市</td>
    <td rowspan="3" align="center" bgcolor="#FFFFCC">學校編號</td>
    <td rowspan="3" align="center" bgcolor="#FFFFCC">學校名稱</td>
    <td colspan="4" align="center" bgcolor="#FFFFCC">教育部核定項目、數量及金額</td>
    <td colspan="4" align="center" bgcolor="#FFFFCC">學校執行成果</td>
    <td colspan="2" rowspan="2" align="center" bgcolor="#FFFFCC">執行成效百分比 (%)</td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#FFFFCC">經常門</td>
    <td colspan="2" align="center" bgcolor="#FFFFCC">資本門</td>
    <td colspan="2" align="center" bgcolor="#FFFFCC">經常門</td>
    <td colspan="2" align="center" bgcolor="#FFFFCC">資本門</td>
  </tr>
  <tr>
    <td width="40" align="center" bgcolor="#FFFFCC">座</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">式</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">座</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">式</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">數量</td>
    <td width="40" align="center" bgcolor="#FFFFCC">金額</td>
  </tr>
<?
	$sql_school = "SELECT sd.account, sd.cityname, sd.district, sd.school ". // index 0~3
				"   , a7.a193, a7.a194, sd.a172 as '補7總計' ". // index 4~6
				"   , se.a7_1, se.a7_2, se.a7_3, se.a7_4, se.a7_5, se.a7_6, se.a7_7, se.a7_8, se.a7_9, se.a7_10, se.a7_11, se.a7_12, se.a7_13, se.a7_14, se.a7_15 ".
				" FROM 102schooldata AS sd  ".
				"			  left join 102allowance7 AS a7 on sd.account = a7.account ".
				"             left join 102school_effect AS se on sd.account = se.account ";
					
	//$sql_school = $sql_school." order by sd.type;"; //搜尋全部學校 測試用
	//echo "<br /><br />".$sql_school."<br /><br />";
	if ($cityname == "全國")
	{
		$sql_school = $sql_school." order by sd.type;"; //搜尋全部學校
	}else
	{  
		$sql_school = $sql_school." where sd.cityname like '$cityname' order by sd.type;"; //搜尋縣市相符學校
	}
	
	$result_school = mysql_query($sql_school);
	while($row = mysql_fetch_array($result_school))
	{
		$school = $row[0]; //帳號
		$schoolcity = $row[1];
		$schoolname = $row[1].$row[2].$row[3]; //縣市+區+校名
		
		//↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓教育部審核資料↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
		//教育部審核金額
		$fn_a7 = $row['補7總計'];
		
		$all_fn_total += $fn_a7;
		
		//補7資料 a7.a193, a7.a194 # index 31~32
		$fn7_1 = $row[4]; //修建
		$fn7_2 = $row[5]; //設備
		$fn7_cnt_1 = 0; //補7 數量都0 (不確定
		$fn7_cnt_2 = 0; 
		$fn7_total_1 += $fn7_1; //總金額
		$fn7_total_2 += $fn7_2;
		
		//↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑教育部審核資料↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
	
		
		//↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓學校填報資料↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
		//學校填報金額(總計)
		$ef_a7 = $row['a7_1'];
		
		//補7資料 a7_3, a7_4
		$e7_1 = $row['a7_3']; //修建
		$e7_2 = $row['a7_4']; //設備
		if($e7_1 > 0) $e7_cnt_1 += $row['a7_2']; //補8 兩個數量相同
		$e7_total_1 += $e7_1; //總金額
		$e7_total_2 += $e7_2;
		
		//↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑學校填報資料↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
		//補七
		if($fn_a7 > 0)
		{ 
			echo '<tr>';
			echo '<td height="30" align="center">'.$schoolcity.'</td>';
			echo '<td height="30" align="left">'.$school.'</td>';
			echo '<td height="30" align="left">'.$schoolname.'</td>';
			
			echo '<td align="right">'."0".'</td>';
			echo '<td align="right">'.number_format($fn7_1).'</td>';
			echo '<td align="right">'."0".'</td>';
			echo '<td align="right">'.number_format($fn7_2).'</td>';
			
			echo '<td align="right">'.number_format($row['a7_2']).'</td>';
			echo '<td align="right">'.number_format($e7_1).'</td>';
			echo '<td align="right">'."0".'</td>';
			echo '<td align="right">'.number_format($e7_2).'</td>';

			//該校成效比數值
			//a核定
			$t_a1 = 0;
			$t_a2 = $fn7_1 + $fn7_2;
			//b填報
			$t_b1 = $row['a7_2'];
			$t_b2 = $e7_1 + $e7_2;
			//1
			if($t_b1==0){
				$temp = "0%";
			}else{
				$temp = number_format($t_b1 * 100 / $t_a1,2)."%";
			}
			echo '<td align="center">'.$temp.'</td>';
			//2
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
	if($all_fn_total > 1){ 
		echo '<tr>';
		echo '<td height="30" colspan="3" align="center" bgcolor="#FFFFCC">合計</td>';
		//echo '<td width="170" height="30" align="center" bgcolor="#FFFFCC">縣市合計</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'."0".'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($fn7_total_1).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'."0".'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($fn7_total_2).'</td>';
		
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e7_cnt_1).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e7_total_1).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'."0".'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e7_total_2).'</td>';

		//縣市用成效比數值
		//a核定
		$t_a1 = 0;
		$t_a2 = $fn7_total_1 + $fn7_total_2;
		//b填報
		$t_b1 = $e7_cnt_1;
		$t_b2 = $e7_total_1 + $e7_total_2;
		//1
		if($t_b1==0){
			$temp = "0%";
		}else{
			$temp = number_format($t_b1 * 100 / $t_a1,2)."%";
		}
		echo '<td align="center" bgcolor="#FFFFCC">'.$temp.'</td>';
		//2
		if($t_b2==0){
			$temp = "0%";
		}else{
			$temp = number_format($t_b2 * 100 / $t_a2,2)."%";
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
