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
    <td height="60" colspan="12" align="center"><strong><font color=blue>教育部102年度推動教育優先區計畫直轄市、縣(市)政府各補助項目執行成果一覽表<br />縣市別：<? echo $city;?>　　　　　　　　補助項目：二、補助學校發展教育特色</font></strong></td>
  </tr>
  <tr>
    <td rowspan="4" align="center" bgcolor="#FFFFCC">縣市</td>
    <td rowspan="4" align="center" bgcolor="#FFFFCC">學校編號</td>
    <td rowspan="4" align="center" bgcolor="#FFFFCC">學校名稱</td>
    <td colspan="3" align="center" bgcolor="#FFFFCC">教育部核定項目、數量及金額</td>
    <td colspan="3" align="center" bgcolor="#FFFFCC">學校執行成果</td>
    <td colspan="3" align="center" bgcolor="#FFFFCC">執行成效百分比</td>
  </tr>
  <tr>
    <td colspan="3" align="center" bgcolor="#FFFFCC">發展教育特色</td>
    <td colspan="3" align="center" bgcolor="#FFFFCC">發展教育特色</td>
    <td colspan="3" align="center" bgcolor="#FFFFCC">發展教育特色</td>
  </tr>
  <tr>
    <td colspan="3" align="center" bgcolor="#FFFFCC">金額</td>
    <td colspan="3" align="center" bgcolor="#FFFFCC">金額</td>
    <td colspan="3" align="center" bgcolor="#FFFFCC">金額</td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="#FFFFCC">經常門</td>
    <td width="100" align="center" bgcolor="#FFFFCC">資本門</td>
    <td width="100" align="center" bgcolor="#FFFFCC">合計</td>
    <td width="100" align="center" bgcolor="#FFFFCC">經常門</td>
    <td width="100" align="center" bgcolor="#FFFFCC">資本門</td>
    <td width="100" align="center" bgcolor="#FFFFCC">合計</td>
    <td width="40" align="center" bgcolor="#FFFFCC">經常門</td>
    <td width="40" align="center" bgcolor="#FFFFCC">資本門</td>
    <td width="40" align="center" bgcolor="#FFFFCC">合計</td>
  </tr>
<?
	$sql_school = "SELECT sd.account, sd.cityname, sd.district, sd.school ". // index 0~3
				"   , a2.a193, a2.a194, sd.a167 as '補2總計' ". // index 4~6
				"   , se.a2_1, se.a2_2, se.a2_3, se.a2_4, se.a2_5, se.a2_6, se.a2_7, se.a2_8, se.a2_9, se.a2_10, se.a2_11, se.a2_12, se.a2_13, se.a2_14, se.a2_15 ".
				" FROM 102schooldata AS sd left join 102allowance2 AS a2 on sd.account = a2.account ".
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
		$fn_a2 = $row['補2總計'];
		
		$all_fn_total += $fn_a2;
		
		//補2資料 a2.a193, a2.a194 # index 9~10
		$fn2_1 = $row[4]; //經常門加總
		$fn2_2 = $row[5]; //資本門加總
		
		$fn2_total_1 += $fn2_1; //總金額
		$fn2_total_2 += $fn2_2;
		
		//↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑教育部審核資料↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
	
		
		//↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓學校填報資料↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
		//補2資料 a2_2, a2_3
		$e_a2 = $row['a2_1']; //經常門 + 資本門
		
		$all_e_total += $e_a2;
		
		$e2_1 = $row['a2_2']; //經常門加總
		$e2_2 = $row['a2_3']; //資本門加總
		
		$e2_total_1 += $e2_1; //總金額
		$e2_total_2 += $e2_2;
				
		//↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑學校填報資料↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
		
		//補二
		if($fn_a2 > 0){ 
			echo '<tr>';
			echo '<td height="30" align="center">'.$schoolcity.'</td>';
			echo '<td height="30" align="left">'.$school.'</td>';
			echo '<td height="30" align="left">'.$schoolname.'</td>';
			echo '<td align="right">'.number_format($fn2_1).'</td>';
			echo '<td align="right">'.number_format($fn2_2).'</td>';
			echo '<td align="right">'.number_format($fn_a2).'</td>';

			echo '<td align="right">'.number_format($e2_1).'</td>';
			echo '<td align="right">'.number_format($e2_2).'</td>';
			echo '<td align="right">'.number_format($e_a2).'</td>';
			
			if($e2_1==0){
				$temp = "0%";
			}else{
				$temp = number_format($e2_1 * 100 / $fn2_1,2)."%";
			}
			echo '<td align="center">'.$temp.'</td>';
			
			if($e2_2==0){
				$temp = "0%";
			}else{
				$temp = number_format($e2_2 * 100 / $fn2_2,2)."%";
			}
			echo '<td align="center">'.$temp.'</td>';
			
			if($e_a2==0){
				$temp = "0%";
			}else{
				$temp = number_format($e_a2 * 100 / $fn_a2,2)."%";
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
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($fn2_total_1).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($fn2_total_2).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($all_fn_total).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e2_total_1).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e2_total_2).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($all_e_total).'</td>';

		if($e2_total_1==0){
			$temp = "0%";
		}else{
			$temp = number_format($e2_total_1 * 100 / $fn2_total_1,2)."%";
		}
		echo '<td align="center" bgcolor="#FFFFCC">'.$temp.'</td>';
		if($e2_total_2==0){
			$temp = "0%";
		}else{
			$temp = number_format($e2_total_2 * 100 / $fn2_total_2,2)."%";
		}
		echo '<td align="center" bgcolor="#FFFFCC">'.$temp.'</td>';
		if($all_e_total==0){
			$temp = "0%";
		}else{
			$temp = number_format($all_e_total * 100 / $all_fn_total,2)."%";
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
