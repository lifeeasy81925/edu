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
    <td height="50" colspan="30" align="center"><p><strong><font color=blue><? echo $cityname;?> 102年度各校各補助項目執行成果列表</font></td>
  </tr>
  <tr>
    <td rowspan="2" align="center" bgcolor="#FFCC99">序號</td>
    <td rowspan="2" align="center" bgcolor="#FFCC99">學校編號</td>
    <td rowspan="2" align="center" bgcolor="#FFCC99">校名</td>
    <td colspan="3" align="center" bgcolor="#FFFFCC">補助項目一<br />
    推展親職教育活動</td>
    <td colspan="3" align="center" bgcolor="#CCFFFF">補助項目二<br />
    原住民及離島地區學校辦理學習輔導</td>
    <td colspan="3" align="center" bgcolor="#FFFFCC">補助項目三<br />
    補助學校發展教育特色</td>
    <td colspan="3" align="center" bgcolor="#CCFFFF">補助項目四<br />
    修繕離島或偏遠地區師生宿舍</td>
    <td colspan="3" align="center" bgcolor="#FFFFCC">補助項目五<br />
    充實學校基本教學設備</td>
    <td colspan="3" align="center" bgcolor="#CCFFFF">補助項目六<br />
    發展原住民教育文化特色及充實設備器材</td>
    <td colspan="3" align="center" bgcolor="#FFFFCC">補助項目七<br />
    補助交通不便地區學校交通車</td>
    <td colspan="3" align="center" bgcolor="#FFCC99">學校合計</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFCC">核定金額</td>
    <td align="center" bgcolor="#FFFFCC">執行金額</td>
    <td align="center" bgcolor="#FFFFCC">執行成效(%)</td>
    <td align="center" bgcolor="#CCFFFF">核定金額</td>
    <td align="center" bgcolor="#CCFFFF">執行金額</td>
    <td align="center" bgcolor="#CCFFFF">執行成效(%)</td>
    <td align="center" bgcolor="#FFFFCC">核定金額</td>
    <td align="center" bgcolor="#FFFFCC">執行金額</td>
    <td align="center" bgcolor="#FFFFCC">執行成效(%)</td>
    <td align="center" bgcolor="#CCFFFF">核定金額</td>
    <td align="center" bgcolor="#CCFFFF">執行金額</td>
    <td align="center" bgcolor="#CCFFFF">執行成效(%)</td>
    <td align="center" bgcolor="#FFFFCC">核定金額</td>
    <td align="center" bgcolor="#FFFFCC">執行金額</td>
    <td align="center" bgcolor="#FFFFCC">執行成效(%)</td>
    <td align="center" bgcolor="#CCFFFF">核定金額</td>
    <td align="center" bgcolor="#CCFFFF">執行金額</td>
    <td align="center" bgcolor="#CCFFFF">執行成效(%)</td>
    <td align="center" bgcolor="#FFFFCC">核定金額</td>
    <td align="center" bgcolor="#FFFFCC">執行金額</td>
    <td align="center" bgcolor="#FFFFCC">執行成效(%)</td>
    <td align="center" bgcolor="#CCFFFF">核定金額</td>
    <td align="center" bgcolor="#CCFFFF">執行金額</td>
    <td align="center" bgcolor="#CCFFFF">執行成效(%)</td>
  </tr>
<?

	$sql_school = "SELECT sd.account, sd.cityname, sd.district, sd.school ". // index 0~3
				"   , sd.a166 as '補1總計', sd.a167 as '補2總計', sd.a168 as '補3總計', sd.a169 as '補4總計' ". // index a~7
				"   , sd.a170 as '補5總計', sd.a171 as '補6總計', sd.a172 as '補7總計' ". // index 8~10
				"   , se.a1_1, se.a2_1, se.a3_1, se.a4_1, se.a5_1, se.a6_1, se.a7_1 ".
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
		$sql_school = $sql_school." where sd.cityname like '$cityname' order by sd.type;"; //搜尋縣市相符學校
	}
	
	$result_school = mysql_query($sql_school);
	while($row = mysql_fetch_array($result_school))
	{
		$school = $row[0]; //帳號
		$schoolname = $row[1].$row[2].$row[3]; //縣市+區+校名
		$serial++;
		//↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓教育部審核資料↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
		//教育部審核金額
		$fn_a1 = $row['補1總計'];
		$fn_a2 = $row['補2總計'];
		$fn_a3 = $row['補3總計'];
		$fn_a4 = $row['補4總計'];
		$fn_a5 = $row['補5總計'];
		$fn_a6 = $row['補6總計'];
		$fn_a7 = $row['補7總計'];
		
		$fn_total = $fn_a1 + $fn_a2 + $fn_a3 + $fn_a4 + $fn_a5 + $fn_a6 + $fn_a7; //單校教育部審核金額合計
		
		$all_fn_a1 += $fn_a1; //補1金額合計
		$all_fn_a2 += $fn_a2;
		$all_fn_a3 += $fn_a3;
		$all_fn_a4 += $fn_a4;
		$all_fn_a5 += $fn_a5;
		$all_fn_a6 += $fn_a6;
		$all_fn_a7 += $fn_a7;
		$all_fn_total += $fn_total;
		//↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑教育部審核資料↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
	
		
		//↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓學校填報資料↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
		//學校填報金額(總計)
		$ef_a1 = $row['a1_1'];
		$ef_a2 = $row['a2_1'];
		$ef_a3 = $row['a3_1'];
		$ef_a4 = $row['a4_1'];
		$ef_a5 = $row['a5_1'];
		$ef_a6 = $row['a6_1'];
		$ef_a7 = $row['a7_1'];
		
		$ef_total = $ef_a1 + $ef_a2 + $ef_a3 + $ef_a4 + $ef_a5 + $ef_a6 + $ef_a7; //單效執行金額合計
		
		$all_ef_a1 += $ef_a1; //補1金額合計
		$all_ef_a2 += $ef_a2;
		$all_ef_a3 += $ef_a3;
		$all_ef_a4 += $ef_a4;
		$all_ef_a5 += $ef_a5;
		$all_ef_a6 += $ef_a6;
		$all_ef_a7 += $ef_a7;
		$all_ef_total += $ef_total;
		//↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑學校填報資料↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
				
		echo "<tr>";
		echo "<td>".$serial."</td>";
		echo "<td>".$school."</td>";
		echo "<td>".$schoolname."</td>";
		echo "<td align='right'>".number_format($fn_a1)."</td>";
		echo "<td align='right'>".number_format($ef_a1)."</td>";
		if($ef_a1 > 0){echo "<td align='right'>".number_format($ef_a1 / $fn_a1 * 100, 2)."%</td>";} else {echo "<td>&nbsp;</td>";}
		echo "<td align='right'>".number_format($fn_a2)."</td>";
		echo "<td align='right'>".number_format($ef_a2)."</td>";
		if($ef_a2 > 0){echo "<td align='right'>".number_format($ef_a2 / $fn_a2 * 100, 2)."%</td>";} else {echo "<td>&nbsp;</td>";}
		echo "<td align='right'>".number_format($fn_a3)."</td>";
		echo "<td align='right'>".number_format($ef_a3)."</td>";
		if($ef_a3 > 0){echo "<td align='right'>".number_format($ef_a3 / $fn_a3 * 100, 2)."%</td>";} else {echo "<td>&nbsp;</td>";}
		echo "<td align='right'>".number_format($fn_a4)."</td>";
		echo "<td align='right'>".number_format($ef_a4)."</td>";
		if($ef_a4 > 0){echo "<td align='right'>".number_format($ef_a4 / $fn_a4 * 100, 2)."%</td>";} else {echo "<td>&nbsp;</td>";}
		echo "<td align='right'>".number_format($fn_a5)."</td>";
		echo "<td align='right'>".number_format($ef_a5)."</td>";
		if($ef_a5 > 0){echo "<td align='right'>".number_format($ef_a5 / $fn_a5 * 100, 2)."%</td>";} else {echo "<td>&nbsp;</td>";}
		echo "<td align='right'>".number_format($fn_a6)."</td>";
		echo "<td align='right'>".number_format($ef_a6)."</td>";
		if($ef_a6 > 0){echo "<td align='right'>".number_format($ef_a6 / $fn_a6 * 100, 2)."%</td>";} else {echo "<td>&nbsp;</td>";}
		echo "<td align='right'>".number_format($fn_a7)."</td>";
		echo "<td align='right'>".number_format($ef_a7)."</td>";
		if($ef_a7 > 0){echo "<td align='right'>".number_format($ef_a7 / $fn_a7 * 100, 2)."%</td>";} else {echo "<td>&nbsp;</td>";}
		echo "<td align='right'>".number_format($fn_total)."</td>";
		echo "<td align='right'>".number_format($ef_total)."</td>";
		if($ef_total > 0){echo "<td align='right'>".number_format($ef_total / $fn_total * 100, 2)."%</td>";} else {echo "<td>&nbsp;</td>";}
		echo "</tr>";

	}
	
?>
  <tr>
    <td height='50' colspan="3" align='center' bgcolor="#FFCC99">總計</td>
    <td align='right' bgcolor="#FFFFCC"><? echo number_format($all_fn_a1); ?></td>
    <td align='right' bgcolor="#FFFFCC"><? echo number_format($all_ef_a1); ?></td>
    <td align='right' bgcolor="#FFFFCC"><? if($all_ef_a1 > 0){echo number_format($all_ef_a1 / $all_fn_a1 * 100, 2)."%";} else {echo "&nbsp;";} ?></td>
    <td align='right' bgcolor="#CCFFFF"><? echo number_format($all_fn_a2); ?></td>
    <td align='right' bgcolor="#CCFFFF"><? echo number_format($all_ef_a2); ?></td>
    <td align='right' bgcolor="#CCFFFF"><? if($all_ef_a2 > 0){echo number_format($all_ef_a2 / $all_fn_a2 * 100, 2)."%";} else {echo "&nbsp;";} ?></td>
    <td align='right' bgcolor="#FFFFCC"><? echo number_format($all_fn_a3); ?></td>
    <td align='right' bgcolor="#FFFFCC"><? echo number_format($all_ef_a3); ?></td>
    <td align='right' bgcolor="#FFFFCC"><? if($all_ef_a3 > 0){echo number_format($all_ef_a3 / $all_fn_a3 * 100, 2)."%";} else {echo "&nbsp;";} ?></td>
    <td align='right' bgcolor="#CCFFFF"><? echo number_format($all_fn_a4); ?></td>
    <td align='right' bgcolor="#CCFFFF"><? echo number_format($all_ef_a4); ?></td>
    <td align='right' bgcolor="#CCFFFF"><? if($all_ef_a4 > 0){echo number_format($all_ef_a4 / $all_fn_a4 * 100, 2)."%";} else {echo "&nbsp;";} ?></td>
    <td align='right' bgcolor="#FFFFCC"><? echo number_format($all_fn_a5); ?></td>
    <td align='right' bgcolor="#FFFFCC"><? echo number_format($all_ef_a5); ?></td>
    <td align='right' bgcolor="#FFFFCC"><? if($all_ef_a5 > 0){echo number_format($all_ef_a5 / $all_fn_a5 * 100, 2)."%";} else {echo "&nbsp;";} ?></td>
    <td align='right' bgcolor="#CCFFFF"><? echo number_format($all_fn_a6); ?></td>
    <td align='right' bgcolor="#CCFFFF"><? echo number_format($all_ef_a6); ?></td>
    <td align='right' bgcolor="#CCFFFF"><? if($all_ef_a6 > 0){echo number_format($all_ef_a6 / $all_fn_a6 * 100, 2)."%";} else {echo "&nbsp;";} ?></td>
    <td align='right' bgcolor="#FFFFCC"><? echo number_format($all_fn_a7); ?></td>
    <td align='right' bgcolor="#FFFFCC"><? echo number_format($all_ef_a7); ?></td>
    <td align='right' bgcolor="#FFFFCC"><? if($all_ef_a7 > 0){echo number_format($all_ef_a7 / $all_fn_a7 * 100, 2)."%";} else {echo "&nbsp;";} ?></td>
    <td align='right' bgcolor="#FFCC99"><? echo number_format($all_fn_total); ?></td>
    <td align='right' bgcolor="#FFCC99"><? echo number_format($all_ef_total); ?></td>
    <td align='right' bgcolor="#FFCC99"><? if($all_ef_total > 0){echo number_format($all_ef_total / $all_fn_total * 100, 2)."%";} else {echo "&nbsp;";} ?></td>
  </tr>
</table>
<br />
<!---
<? echo '核定總金額：'.number_format($all_fn_total).'<br>';?>
<? echo '執行總金額：'.number_format($all_ef_total).'<br>';?>
<? echo '　　執行率：'.number_format($all_ef_total / $all_fn_total * 100 , 2).'%'.'<br><br>';?>
--->
<?php 
include "../xSchoolForm/button_close.php";
include "../xSchoolForm/button_print.php";
echo "<br>若要列印本表，建議複製到Excel列印，可彈性調整頁面並縮短電腦列印準備時間。<br>";
echo "操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)";
?>