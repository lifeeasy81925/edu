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
<? //教育部核定金額
$sql = "select  *  from 101school_final where account like '$school'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$schoolname = $row[0]." ".$row[2].$row[4].$row[5];
	$fn_a1 = $row[15];
	$fn_a2 = $row[25];
	$fn_a3 = $row[28];
	$fn_a3_1 = $row[26];
	$fn_a3_2 = $row[27];
	$fn_a4 = $row[39];
	$fn_a4_1 = $row[33];
	$fn_a4_1_1c1 = $row[29];
	$fn_a4_1_1 = $row[30];
	$fn_a4_1_2c1 = $row[31];
	$fn_a4_1_2 = $row[32];
	$fn_a4_2 = $row[38];
	$fn_a4_2_1c1 = $row[34];
	$fn_a4_2_1 = $row[35];
	$fn_a4_2_2c1 = $row[36];
	$fn_a4_2_2 = $row[37];
	$fn_a5 = $row[42];
	$fn_a5_1 = $row[40];
	$fn_a5_2 = $row[41];
	$fn_a6 = $row[47];
	$fn_a6_1c1 = $row[43]; //設備數
	$fn_a6_1 = $row[44]; //設備
	$fn_a6_2c1 = $row[45]; //其他數
	$fn_a6_2 = $row[46]; //其他
	$fn_a7_1c1 = $row[48]; //租車數
	$fn_a7_1 = $row[49]; //租車
	$fn_a7_2c1 = $row[50]; //交通費數
	$fn_a7_2 = $row[51]; //交通費
	$fn_a7_3c1 = $row[52]; //交通車數
	$fn_a7_3 = $row[53]; //交通車
	$fn_a7 = $row[54];
	$fn_a8_1_1c1 = $row[55]; //修建數
	$fn_a8_1_1 = $row[56]; //修建
	$fn_a8_1_2c1 = $row[57]; //設備數
	$fn_a8_1_2 = $row[58]; //設備
	$fn_a8 = $row[67];
	$fn_total = $fn_a1 + $fn_a2 + $fn_a3 + $fn_a4 + $fn_a5 + $fn_a6 + $fn_a7 + $fn_a8;
}?>
<? //學校執行金額
$sql = "select  *  from 101school_effect where account like '$school'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$ef_a1_1 = $row[11];
	$ef_a2_1 = $row[26];
	$ef_a3_1 = $row[41];
	$ef_a4_1 = $row[56];
	$ef_a5_1 = $row[71];
	$ef_a6_1 = $row[86];
	$ef_a7_1 = $row[101];
	$ef_a8_1 = $row[116];
	$ef_total = $ef_a1_1 + $ef_a2_1 + $ef_a3_1 + $ef_a4_1 + $ef_a5_1 + $ef_a6_1 + $ef_a7_1 + $ef_a8_1;
	$ef_1 = $row[71];
	$ef_2 = $row[72];
	$ef_3 = $row[73];
	$ef_4 = $row[74];
	$ef_5 = $row[75];
	$ef_6 = $row[76];
	$ef_7 = $row[77];
	$ef_8 = $row[78];
	$ef_9 = $row[79];
	$ef_10 = $row[80];
	$ef_11 = $row[81];
	$ef_12 = $row[82];
	$ef_13 = $row[83];
	$ef_14 = $row[84];
	$ef_15 = $row[85];
}?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="effect_100_school_05_finish.php" onSubmit="return toCheck();">
<p>
<font color="blue"><strong>101年度執行成果填報  <? echo $schoolname; ?></strong></font><br />
<strong>項目：五、充實學校基本教學設備  </strong><a href="/edu/modules/xSchoolForm/download/allowance-05.htm" target="_blank">(補助項目說明)</a>
<p>
<font color=blue>核定經費：<input type="text" size="5" name="fn_a5" value="<? echo ($fn_a5);?>" style="border:0px; text-align: right;" readonly >
元。<br />
(經常門：<input type="text" size="5" name="fn_a5_1" value=<? echo ($fn_a5_1);?> style="border:0px; text-align: right;" readonly >元，資本門：<input type="text" size="5" name="fn_a5_2" value=<? echo ($fn_a5_2);?> style="border:0px; text-align: right;" readonly >
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