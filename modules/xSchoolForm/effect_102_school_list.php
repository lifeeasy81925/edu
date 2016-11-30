<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
//include "./checkdate.php";
?>

<?
//學校名稱 
/*$sql_school = "select  *  from 102school_basedata where account like '$username'";
$result_school = mysql_query($sql_school);
while($row = mysql_fetch_row($result_school)){
	$school_name = $row[2].$row[4].$row[5];//學校全名
}*/
?>
<?  //教育部核定金額
	$sql = "SELECT a1.a192 AS '補一', a2.a192 AS '補二', a3.a192 AS '補三', a4.a192 AS '補四', a5.a192 AS '補五', a6.a192 AS '補六', a7.a192 AS '補七'". 
			" FROM 102allowance1 AS a1, 102allowance2 AS a2, 102allowance3 AS a3, 102allowance4 AS a4, 102allowance5 AS a5, 102allowance6 AS a6, 102allowance7 AS a7".
			" WHERE a1.account LIKE '$username'".
			"   AND a1.account = a2.account".
			"   AND a1.account = a3.account".
			"   AND a1.account = a4.account".
			"   AND a1.account = a5.account".
			"   AND a1.account = a6.account".
			"   AND a1.account = a7.account";
		
	$result = mysql_query($sql);
	
	while($row = mysql_fetch_row($result))
	{
		$fn_a1 = $row[0];
		$fn_a2 = $row[1];
		$fn_a3 = $row[2];
		$fn_a4 = $row[3];
		$fn_a5 = $row[4];
		$fn_a6 = $row[5];
		$fn_a7 = $row[6];
		$fn_total = $fn_a1 + $fn_a2 + $fn_a3 + $fn_a4 + $fn_a5 + $fn_a6 + $fn_a7;
	}
	
	
	//舊程式，確定沒用後殺殺殺
	/*$sql = "select  *  from 102school_final where account like '$username'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_row($result)){
		$fn_a1 = $row[15];
		$fn_a2 = $row[25];
		$fn_a3 = $row[28];
		$fn_a4 = $row[39];
		$fn_a5 = $row[42];
		$fn_a6 = $row[47];
		$fn_a7 = $row[54];
		$fn_total = $fn_a1 + $fn_a2 + $fn_a3 + $fn_a4 + $fn_a5 + $fn_a6 + $fn_a7;*/
?>
<? //學校執行金額
	$sql = "select  *  from 102school_effect where account like '$username'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_row($result)){
		$last = $row[7];
		$ef_a1 = $row[11];
		$ef_a2 = $row[26];
		$ef_a3 = $row[41];
		$ef_a4 = $row[56];
		$ef_a5 = $row[71];
		$ef_a6 = $row[86];
		$ef_a7 = $row[101];
		$ef_total = $ef_a1 + $ef_a2 + $ef_a3 + $ef_a4 + $ef_a5 + $ef_a6 + $ef_a7;
	
	
}?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="返回學校功能選單" onClick="location='school_index.php'"><br />
<form name="form" method="post" action="basedata_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><font color="blue"><strong>教育部推動教育優先區計畫102年度 貴校審核通過補助項目執行及成果列表</strong></font>
<? if($fn_total < 1) {echo "<!---";} ?>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="170" height="50" align="center" bgcolor="#99CCCC">補助項目</td>
    <td height="40" align="center" bgcolor="#99CCCC">核定金額</td>
    <td height="40" align="center" bgcolor="#99CCCC"><p>執行金額</p></td>
    <td height="40" align="center" bgcolor="#99CCCC">剩餘金額</td>
    <td height="40" align="center" bgcolor="#99CCCC">執行進度</td>
    <td align="center" bgcolor="#99CCCC"><font color=red>執行情形<br />(必填)</font></td>
    <td height="40" align="center" bgcolor="#99CCCC"><font color=red>檔案上傳</font><br />修正後計畫<br />(必填)</td>
  </tr>
<? if($fn_total < 1) {echo "--->";} ?>
  <? if($fn_a1 < 1) {echo "<!---";}?>
  <tr>
    <td width="170" height="50">1.推展親職教育活動</td>
    <td align="right"><? echo number_format($fn_a1); ?></td>
    <td align="right"><? if($ef_a1 > 0){echo number_format($ef_a1);}else{echo 0;} ?></td>
    <td align="right"><? echo number_format($fn_a1-$ef_a1); ?></td>
    <td align="center"><? if($ef_a1==0) {echo "0%";} else {echo number_format($ef_a1 * 100 / $fn_a1,2)."%";} ?></td>
    <td align="center"><input type="button" value="進入" onclick="location='effect_102_school_01.php'" /></td>
    <td align="center"><INPUT TYPE="button" VALUE="進入" onClick="location='effect_102_school_up_01.php'"></td>
  </tr>
  <? if($fn_a1 < 1) {echo "--->";}?>
  <? if($fn_a2 < 1) {echo "<!---";}?>
  <tr>
    <td width="170" height="50">2.學校發展教育特色</td>
    <td align="right"><? echo number_format($fn_a2); ?></td>
    <td align="right"><? echo number_format($ef_a2); ?></td>
    <td align="right"><? echo number_format($fn_a2-$ef_a2); ?></td>
    <td align="center"><? if($ef_a2==0) {echo "0%";} else {echo number_format($ef_a2 * 100 / $fn_a2,2)."%";} ?></td>
    <td align="center"><input type="button" value="進入" onclick="location='effect_102_school_02.php'" /></td>
    <td align="center"><INPUT TYPE="button" VALUE="進入" onClick="location='effect_102_school_up_02.php'"></td>
  </tr>
  <? if($fn_a2 < 1) {echo "--->";}?>
  <? if($fn_a3 < 1) {echo "<!---";}?>
  <tr>
    <td width="170" height="50">3.修繕離島或偏遠地區師生宿舍</td>
    <td align="right"><? echo number_format($fn_a3); ?></td>
    <td align="right"><? echo number_format($ef_a3); ?></td>
    <td align="right"><? echo number_format($fn_a3-$ef_a3); ?></td>
    <td align="center"><? if($ef_a3==0) {echo "0%";} else {echo number_format($ef_a3 * 100 / $fn_a3,2)."%";} ?></td>
    <td align="center"><input type="button" value="進入" onclick="location='effect_102_school_03.php'" /></td>
    <td align="center"><INPUT TYPE="button" VALUE="進入" onClick="location='effect_102_school_up_03.php'"></td>
  </tr>
  <? if($fn_a3 < 1) {echo "--->";}?>
  <? if($fn_a4 < 1) {echo "<!---";}?>
  <tr>
    <td width="170" height="50">4.充實學校基本教學設備</td>
    <td align="right"><? echo number_format($fn_a4); ?></td>
    <td align="right"><? echo number_format($ef_a4); ?></td>
    <td align="right"><? echo number_format($fn_a4-$ef_a4); ?></td>
    <td align="center"><? if($ef_a4==0) {echo "0%";} else {echo number_format($ef_a4 * 100 / $fn_a4,2)."%";} ?></td>
    <td align="center"><input type="button" value="進入" onclick="location='effect_102_school_04.php'" /></td>
    <td align="center"><INPUT TYPE="button" VALUE="進入" onClick="location='effect_102_school_up_04.php'"></td>
  </tr>
  <? if($fn_a4 < 1) {echo "--->";}?>
  <? if($fn_a5 < 1) {echo "<!---";}?>
  <tr>
    <td width="170" height="50">5.發展原住民教育文化特色及充實設備器材</td>
    <td align="right"><? echo number_format($fn_a5); ?></td>
    <td align="right"><? echo number_format($ef_a5); ?></td>
    <td align="right"><? echo number_format($fn_a5-$ef_a5); ?></td>
    <td align="center"><? if($ef_a5==0) {echo "0%";} else {echo number_format($ef_a5 * 100 / $fn_a5,2)."%";} ?></td>
    <td align="center"><input type="button" value="進入" onclick="location='effect_102_school_05.php'" /></td>
    <td align="center"><INPUT TYPE="button" VALUE="進入" onClick="location='effect_102_school_up_05.php'"></td>
  </tr>
  <? if($fn_a5 < 1) {echo "--->";}?>
  <? if($fn_a6 < 1) {echo "<!---";}?>
  <tr>
    <td width="170" height="50">6.補助交通不便地區學校交通車</td>
    <td align="right"><? echo number_format($fn_a6); ?></td>
    <td align="right"><? echo number_format($ef_a6); ?></td>
    <td align="right"><? echo number_format($fn_a6-$ef_a6); ?></td>
    <td align="center"><? if($ef_a6==0) {echo "0%";} else {echo number_format($ef_a6 * 100 / $fn_a6,2)."%";} ?></td>
    <td align="center"><input type="button" value="進入" onclick="location='effect_102_school_06.php'" /></td>
    <td align="center"><INPUT TYPE="button" VALUE="進入" onClick="location='effect_102_school_up_06.php'"></td>
  </tr>
  <? if($fn_a6 < 1) {echo "--->";}?>
  <? if($fn_a7 < 1) {echo "<!---";}?>
  <tr>
    <td width="170" height="50">7.整修學校社區化活動場所</td>
    <td align="right"><? echo number_format($fn_a7); ?></td>
    <td align="right"><? echo number_format($ef_a7); ?></td>
    <td align="right"><? echo number_format($fn_a7-$ef_a7); ?></td>
    <td align="center"><? if($ef_a7==0) {echo "0%";} else {echo number_format($ef_a7 * 100 / $fn_a7,2)."%";} ?></td>
    <td align="center"><input type="button" value="進入" onclick="location='effect_102_school_07.php'" /></td>
    <td align="center"><INPUT TYPE="button" VALUE="進入" onClick="location='effect_102_school_up_07.php'"></td>
  </tr>
  <? if($fn_a7 < 1) {echo "--->";}?>
<? if($fn_total < 1) {echo "<!---";} ?>
  <tr>
    <td width="170" height="40" align="center" bgcolor="#FFFF99">合計</td>
    <td height="40" align="right" bgcolor="#FFFF99"><? echo number_format($fn_total); ?></td>
    <td height="40" align="right" bgcolor="#FFFF99"><? echo number_format($ef_total); ?></td>
    <td height="40" align="right" bgcolor="#FFFF99"><? echo number_format($fn_total-$ef_total); ?></td>
    <td height="40" align="center" bgcolor="#FFFF99"><? if($ef_total==0) {echo "0%";} else {echo number_format($ef_total * 100 / $fn_total,2)."%";} ?></td>
    <td align="center" bgcolor="#FFFF99">&nbsp;</td>
    <td height="40" align="center" bgcolor="#FFFF99">&nbsp;</td>
  </tr>
</table>
<? echo "執行情形最後更新時間：".$last;?>
<? if($fn_total < 1) {
	echo "--->";
	echo "<p><font color=red>貴校無核定補助項目，不須填寫執行成效。</font><p>";
}?>
<p><font color="blue"><strong>注意事項：</strong></font><br />
1. 各補助項目請分別進入「<font color=red>執行情形</font>」及「<font color=red>檔案上傳</font>」，輸入或上傳應填入項目。<br />
2. 系統閒置安全保護十分鐘，若需長時間輸入資料，請由其他文件複製貼上。<br />
</form>
<?php
include "../../footer.php";
?>