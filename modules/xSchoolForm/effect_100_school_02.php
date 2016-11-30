<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
//include "./checkdate.php";
//$date = date ("Y-m-d" , mktime(date('Y-m-d')));
$date = date("Y-m-d");
echo "【今天日期：";
echo $date."】";
?>
<? //教育部核定金額
$sql = "select  *  from 100school_final where account like '$username'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$fn_a1 = $row[15];
	$fn_a1_1 = $row[12];
	$fn_a1_2 = $row[14];
	$fn_a2 = $row[25];
	$fn_a2_1 = $row[18];
	$fn_a2_2 = $row[21];
	$fn_a2_3 = $row[24];
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
$sql = "select  *  from 100school_effect where account like '$username'";
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
	$ef_1 = $row[26];
	$ef_2 = $row[27];
	$ef_3 = $row[28];
	$ef_4 = $row[29];
	$ef_5 = $row[30];
	$ef_6 = $row[31];
	$ef_7 = $row[32];
	$ef_8 = $row[33];
	$ef_9 = $row[34];
	$ef_10 = $row[35];
	$ef_11 = $row[36];
	$ef_12 = $row[37];
	$ef_13 = $row[38];
	$ef_14 = $row[39];
	$ef_15 = $row[40];
}?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="effect_100_school_02_finish.php" onSubmit="return toCheck();">
<p>
<font color="blue"><strong>100年度執行成果填報</strong></font><br />
<strong>項目：二、原住民及離島地區學校辦理學習輔導  </strong><a href="/edu/modules/xSchoolForm/download/allowance-02.htm" target="_blank">(補助項目說明)</a>
<p>
<font color=blue>※核定經費：<input type="text" size="6" name="fn_a2" value="<? echo ($fn_a2);?>" style="border:0px; text-align: right;" readonly >元。<br />　課後輔導：<input type="text" size="6" name="fn_a2_1" value="<? echo ($fn_a2_1);?>" style="border:0px; text-align: right;" readonly >元，寒暑輔導：<input type="text" size="6" name="fn_a2_2" value="<? echo ($fn_a2_2);?>" style="border:0px; text-align: right;" readonly >元，夜間輔導：<input type="text" size="6" name="fn_a2_3" value="<? echo ($fn_a2_3);?>" style="border:0px; text-align: right;" readonly >元。</font><br /><br />
<font color=blue><strong>※執行金額：</strong>
<input size="6" name="ef_1" type="text" id="ef_1" value="<? echo $ef_1;?>" style="border:0px; text-align: right;" readonly >元。</font>(執行進度依據，由下方資料自動加總)<br /><br />
<strong>※課後學習輔導：</strong><br />
　輔導學生數<input type="text" size="4" name="ef_2" value="<? echo $ef_2;?>">人，已辦理班次<input type="text" size="4" name="ef_3" value="<? echo $ef_3;?>">班，已使用經費<input type="text" size="6" name="ef_4" value="<? echo $ef_4;?>" onChange="change1()">元。<br /><br />
<strong>※寒暑假學習輔導：</strong><br />
　輔導學生數<input type="text" size="4" name="ef_5" value="<? echo $ef_5;?>">人，已辦理班次<input type="text" size="4" name="ef_6" value="<? echo $ef_6;?>">班，已使用經費<input type="text" size="6" name="ef_7" value="<? echo $ef_7;?>" onChange="change2()">元。<br /><br />
<strong>※住校生夜間學習輔導：</strong><br />
　輔導學生數<input type="text" size="4" name="ef_8" value="<? echo $ef_8;?>">人，已辦理班次<input type="text" size="4" name="ef_9" value="<? echo $ef_9;?>">班，已使用經費<input type="text" size="6" name="ef_10" value="<? echo $ef_10;?>" onChange="change3()">元。
<p>
<strong>※成效或執行成果說明</strong> <font color=red>(必填)</font>：請於其他文件編輯完成後，再複製貼上。<br />
<textarea name="ef_14" cols="70" rows="3" id="ef_14"><? echo $ef_14;?></textarea>
<p>
<strong>※困難或建議事項</strong> (若無免填)：請於其他文件編輯完成後，再複製貼上。<br />
<textarea name="ef_15" cols="70" rows="3" id="ef_15"><? echo $ef_15;?></textarea>
<p>
<input type="submit" name="button" value="儲存送出 (Enter)" />
<input type="button" value="返回補助項目列表" onClick="location='effect_100_school_list.php'">
<!-- 數值計算 -->
<script language="JavaScript">
//自動加總
function numsum() { 
	var f = document.forms[0]; 
	f.ef_1.value = (f.ef_4.value==""?0:parseFloat(f.ef_4.value)) + (f.ef_7.value==""?0:parseFloat(f.ef_7.value))  + (f.ef_10.value==""?0:parseFloat(f.ef_10.value)); 
}

function change1() { 
	var f = document.forms[0]; 
	numsum();
}
function change2() { 
	var f = document.forms[0]; 
	numsum();
}
function change3() { 
	var f = document.forms[0]; 
	numsum();
}
</script>  

<!-- 檢查空值 與 數值檢核-->
<script language="JavaScript">
  function toCheck() {
	if ( parseInt(document.form.ef_1.value) > parseInt(document.form.fn_a2.value) ) {
      alert("「執行金額」不得大於「核定金額」！");
      document.form.ef_1.focus();
      return false;
    }
    if ( document.form.afterLec.value == "" ) {
      alert("請填寫「親職講座預計辦理場次」！");
      document.form.afterLec.focus();
      return false;
    }
			
    return true;
  }
</script>

</form>

<?php
include "../../footer.php";
?>