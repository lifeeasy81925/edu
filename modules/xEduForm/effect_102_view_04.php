<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
//include "./checkdate.php";
//$date = date ("Y-m-d" , mktime(date('Y-m-d')));
$date = date("Y-m-d");
echo "【今天日期：";
echo $date."】";
$school = $_GET['school'];
?>
<? 
	//教育部核定金額
	$sql = "select a192, a193, a194 from 102allowance4 where account like '$school'";
	
	$result = mysql_query($sql);
	while($row = mysql_fetch_row($result))
	{
		$fn_a4 = $row[0]; //總金額
		$fn_a4_1 = $row[1]; //經常門
		$fn_a4_2 = $row[2]; //資本門
	}

	//學校執行金額
	$sql = "select  *  from 102school_effect where account like '$school'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_row($result)){
		$ef_a1_1 = $row[11];
		$ef_a2_1 = $row[26];
		$ef_a3_1 = $row[41];
		$ef_a4_1 = $row[56];
		$ef_a5_1 = $row[71];
		$ef_a6_1 = $row[86];
		$ef_a7_1 = $row[101];
		$ef_total = $ef_a1_1 + $ef_a2_1 + $ef_a3_1 + $ef_a4_1 + $ef_a5_1 + $ef_a6_1 + $ef_a7_1;
		$i = 56; //i = 補助4的第一個項目，共15個
		$ef_1 = $row[$i];
		$ef_2 = $row[$i+1];
		$ef_3 = $row[$i+2];
		$ef_4 = $row[$i+3];
		$ef_5 = $row[$i+4];
		$ef_6 = $row[$i+5];
		$ef_7 = $row[$i+6];
		$ef_8 = $row[$i+7];
		$ef_9 = $row[$i+8];
		$ef_10 = $row[$i+9];
		$ef_11 = $row[$i+10];
		$ef_12 = $row[$i+11];
		$ef_13 = $row[$i+12];
		$ef_14 = $row[$i+13];
		$ef_15 = $row[$i+14];
	}
	
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="effect_102_school_04_finish.php" onSubmit="return toCheck();">
<p>
<font color="blue"><strong>102年度執行成果填報  <? echo $schoolname; ?></strong></font><br />
<strong>項目：四、充實學校基本教學設備  </strong><a href="/edu/modules/xSchoolForm/download/allowance-04.htm" target="_blank">(補助項目說明)</a>
<p>
<font color=blue>核定經費：<input type="text" size="5" name="fn_a4" value="<? echo number_format($fn_a4);?>" style="border:0px; text-align: right;" readonly >
元。<br />
(經常門：<input type="text" size="5" name="fn_a4_1" value=<? echo number_format($fn_a4_1);?> style="border:0px; text-align: right;" readonly >元，資本門：
<input type="text" size="5" name="fn_a4_2" value=<? echo number_format($fn_a4_2);?> style="border:0px; text-align: right;" readonly >
元。)<br /><br />
<strong>※執行金額：</strong>
<input type="text" size="5" name="ef_1" value="<? echo ($ef_1);?>" style="border:0px; text-align: right;" readonly >元。</font>(自動加總產生，執行進度依據)<br />
(經常門：<input type="text" size="5" name="ef_2" value="<? echo ($ef_2);?>"  onChange="change1()">元，資本門：<input type="text" size="5" name="ef_3" value="<? echo ($ef_3);?>"  onChange="change2()">元。)<br />
<p>
<strong>※成效或執行成果說明</strong> (目前為執行期間，若無免填)：<br />
<textarea name="ef_14" cols="70" rows="3" id="ef_14"><? echo $ef_14;?></textarea>
<p>
<strong>※困難或建議事項</strong> (若無免填)：請於其他文件編輯完成後，再複製貼上。<br />
<textarea name="ef_15" cols="70" rows="3" id="ef_15"><? echo $ef_15;?></textarea>
<p>
<input type="button" value="返回上一頁" onClick="history.go(-1)">
</form>

<?php
include "../../footer.php";
?>