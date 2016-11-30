<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_edu.php";
include "../xSchoolForm/button_close.php";
include "../xSchoolForm/button_print02.php";
$cityname = $_GET['cityname'];
echo $username."_";
echo $edu."_";
echo $eduman."您好！";
$serial = 0;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
您查詢的資料為 102年度 "<? echo $cityname; ?>"<br>
<div id="print_content">
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td height="60" colspan="13" align="center"><strong><font color=blue>教育部102年度推動教育優先區計畫直轄市、縣(市)政府各補助項目執行成果一覽表<br />縣市別：<? echo $city;?>　　　　　　　　補助項目：五、發展原住民教育文化特色及充實設備器材</font></strong></td>
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
    <td width="40" align="center" bgcolor="#FFFFCC">項</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">式</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">項</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">式</td>
    <td width="100" align="center" bgcolor="#FFFFCC">金額</td>
    <td width="40" align="center" bgcolor="#FFFFCC">項</td>
    <td width="40" align="center" bgcolor="#FFFFCC">金額</td>
  </tr>
 <?
	$sql_school = "SELECT sd.account, sd.cityname, sd.district, sd.school ". // index 0~3
				"   , a5.a193, a5.a194, sd.a170 as '補5總計' ". // index 4~6
				"   , se.a5_1, se.a5_2, se.a5_3, se.a5_4, se.a5_5, se.a5_6, se.a5_7, se.a5_8, se.a5_9, se.a5_10, se.a5_11, se.a5_12, se.a5_13, se.a5_14, se.a5_15 ".
				" FROM 102schooldata AS sd ".
				"			  left join 102allowance5 AS a5 on sd.account = a5.account ".
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
		$fn_a5 = $row['補5總計'];
		
		$all_fn_total += $fn_a5;
		
		//補5資料 a5.a193, a5.a194 # index 24~25
		$fn5_1 = $row[4]; //經常門
		$fn5_2 = $row[5]; //資本門
		$fn5_cnt_1 = 0; //補5 數量都0 (不確定 資本門沒有這項
		$fn5_total_1 += $fn5_1; //總金額
		$fn5_total_2 += $fn5_2;
		
		//↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑教育部審核資料↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
	
		
		//↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓學校填報資料↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
		//學校填報金額(總計)
		$e_a5 = $row['a5_1'];
				
		//補5資料 a5_2, a5_3
		$e5_1 = $row['a5_2']; //經常門
		$e5_2 = $row['a5_3']; //資本門
		$e5_cnt = $row['a5_4'];
		if($e5_1 > 0) $e5_cnt_1 += $row['a5_4']; //補5 資本門沒有這項

		$e5_total_1 += $e5_1; //總金額
		$e5_total_2 += $e5_2;
		
		//↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑學校填報資料↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
		//補五
		if($fn_a5 > 0){ 
			echo '<tr>';
			echo '<td height="30" align="center">'.$schoolcity.'</td>';
			echo '<td height="30" align="left">'.$school.'</td>';
			echo '<td height="30" align="left">'.$schoolname.'</td>';
			
			echo '<td align="right">'.number_format($fn5_cnt_1).'</td>';
			echo '<td align="right">'.number_format($fn5_1).'</td>';
			echo '<td align="right">'.' - '.'</td>';
			echo '<td align="right">'.number_format($fn5_2).'</td>';
			
			echo '<td align="right">'.number_format($e5_cnt).'</td>';
			echo '<td align="right">'.number_format($e5_1).'</td>';
			echo '<td align="right">'.' - '.'</td>';
			echo '<td align="right">'.number_format($e5_2).'</td>';

			//該校成效比數值
			$t_a1 = $fn5_cnt_1;
			$t_a2 = $fn5_1 + $fn5_2;
			$t_b1 = $e5_cnt;
			$t_b2 = $e5_1 + $e5_2;
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
	if($all_fn_total > 1){ 
		echo '<tr>';
		echo '<td height="30" colspan="3" align="center" bgcolor="#FFFFCC">合計</td>';
		//echo '<td width="170" height="30" align="center" bgcolor="#FFFFCC">縣市合計</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($fn5_cnt_1).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($fn5_total_1).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.' - '.'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($fn5_total_2).'</td>';
		
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e5_cnt_1).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e5_total_1).'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.' - '.'</td>';
		echo '<td align="right" bgcolor="#FFFFCC">'.number_format($e5_total_2).'</td>';

		//縣市用成效比數值
		$t_a1 = $fn5_cnt_1;
		$t_a2 = $fn5_total_1 + $fn5_total_2;
		$t_b1 = $e5_cnt_1;
		$t_b2 = $e5_total_1 + $e5_total_2;
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
</table>
</div>
<?php 
include "../xSchoolForm/button_close.php";
include "../xSchoolForm/button_print02.php";
echo "<br>若要列印本表，建議複製到Excel列印，可彈性調整頁面並縮短電腦列印準備時間。<br>";
echo "操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)";
?>
