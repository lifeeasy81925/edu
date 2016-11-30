<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
include "./checkdate.php";
$datetime = date ("Y" , mktime(date('Y'))) ; 
?>
<?
if($class == '1' ){			
	$sql = "select  *  from   100element_allowance2 where account like '$username'";
	$section1 = 280; // 國小課後輔導每節費用
	$section2 = 380; // 國小寒暑輔導每節費用
	$section3 = 280; // 國小夜間輔導每節費用
}
else{
	$sql = "select  *  from   100junior_allowance2 where account like '$username'";
	$section1 = 380; // 國中課後輔導每節費用
	$section2 = 420; // 國中寒暑輔導每節費用
	$section3 = 380; // 國中夜間輔導每節費用	
}

$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
			$a1 = $row[1];
			$a2 = $row[2];
			$a3 = $row[3];
			$a4 = $row[4];
			$a5 = $row[5];
			$b1 = $row[6];
			$b2 = $row[7];
			$b3 = $row[8];
			$b4 = $row[9];
			$b5 = $row[10];
			$c = $row[11];
			$d1 = $row[13];
			$d2 = $row[12];
			$e1 = $row[14];
			$e2 = $row[15];			
			$f1 = $row[16];
			$f2 = $row[17];	
			$d3 = $row[18];
			$e3 = $row[19];
			$f3 = $row[20];	
			$d4 = $row[21];
			$e4 = $row[22];
			$f4 = $row[23];	
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="allowance2_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><font color="blue"><strong>補助項目二 </strong></font><a href="/edu/modules/xSchoolForm/download/allowance-02.htm" target="_blank">(補助項目說明)</a>
<p>
<font color=blue>※學生學習輔導-申請補助經費：<input type="text" size="6" name="afterLearnMon"  value="<? if($c =='') echo ''; else echo $c;?>" style="border:0px; text-align: right;" readonly>元。(本列自動產生)</font><br><br />
•申請課後學習輔導<input type="text" size="3" name="assistclass" value="<? if($d1 =='') echo ''; else echo $d1;?>"/>班，<input type="text" size="3" name="assiststudents" value="<? if($d4 =='') echo ''; else echo $d4;?>"/>人，<input type="text" size="3" name="assistsection" onChange="change4()" value="<? if($d3 =='') echo ''; else echo $d3;?>"/>節，<font color=blue>金額<input type="text" size="5" name="assist" onChange="change1()" value="<? if($d2 =='') echo ''; else echo $d2;?>" style="border:0px; text-align: right;" readonly>元<br />　　-(金額 = 節 * <? echo $section1?>)</font><br>
<? if ($class == '1') {
	echo "　　-小學- 最高補助[(1-5年級班級數x128節)+(6年級班級數x112節)]x(鐘點費單節260+行政費單節20)<br>";
} else {
	echo "　　-國中- 最高補助[(7-8年級班級數x128節)+(9年級班級數x112節)]x(鐘點費單節360+行政費單節20)<br>";
} ?>
    <br>
•申請寒暑假學習輔導<input type="text" size="3" name="holidayclass" value="<? if($e1 =='') echo ''; else echo $e1;?>"/>班，<input type="text" size="3" name="holidaystudents" value="<? if($e4 =='') echo ''; else echo $e4;?>"/>人，<input type="text" size="3" name="holidaysection" onChange="change5()" value="<? if($e3 =='') echo ''; else echo $e3;?>">節，<font color=blue>金額<input type="text" size="5" name="holidayassist" onChange="change2()" value="<? if($e2 =='') echo ''; else echo $e2;?>" style="border:0px; text-align: right;" readonly>元<br />　　-(金額 = 節 * <? echo $section2?>)</font><br>
<? if ($class == '1') {
	echo "　　-小學- 最高補助[(2-5年級班級數x100節)+(6年級班級數x20節)]x(鐘點費單節360+行政費單節20)<br>";
} else {
	echo "　　-國中- 最高補助[(7-8年級班級數x100節)+(9年級班級數x20節)]x(鐘點費單節400+行政費單節20)<br>";
} ?>
	<br>
•申請住校生夜間學習輔導<input type="text" size="3" name="nightclass" value="<? if($f1 =='') echo ''; else echo $f1;?>"/>班，<input type="text" size="3" name="nightstudents" value="<? if($f4 =='') echo ''; else echo $f4;?>"/>人，<input type="text" size="3" name="nightsection" onChange="change6()" value="<? if($f3 =='') echo ''; else echo $f3;?>"/>節，<font color=blue>金額<input type="text" size="5" name="nightassist" onChange="change3()" value="<? if($f2 =='') echo ''; else echo $f2;?>" style="border:0px; text-align: right;" readonly>元<br />　　-(金額 = 節 * <? echo $section3?>)</font><br>
<? if ($class == '1') {
	echo "　　-小學- 最高補助[(2-5年級班級數x256節)+(6年級班級數x224節)]x(鐘點費單節260+行政費單節20)<br>";
} else {
	echo "　　-國中- 最高補助[(1-2年級班級數x256節)+(9年級班級數x224節)]x(鐘點費單節360+行政費單節20)<br>";
} ?>
<br>
<INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
<input type="submit" name="button" value="儲存並到下一頁" />

<!-- 檢查空值 -->
<script language="JavaScript">
  function toCheck() {
    if ( document.form.assistclass.value == "" ) {
      alert("請填寫「申請課後學習輔導班數」！");
      document.form.assistclass.focus();
      return false;
    }
    if ( document.form.assist.value == "" ) {
      alert("請填寫「申請課後學習輔導金額」！");
      document.form.assist.focus();
      return false;
    }
    if ( document.form.holidayclass.value == "" ) {
      alert("請填寫「申請寒暑假學習輔導班數」！");
      document.form.holidayclass.focus();
      return false;
    }
    if ( document.form.holidayassist.value == "" ) {
      alert("請填寫「申請寒暑假學習輔導金額」！");
      document.form.holidayassist.focus();
      return false;
    }
    if ( document.form.nightclass.value == "" ) {
      alert("請填寫「申請住校生夜間學習輔導班數」！");
      document.form.nightclass.focus();
      return false;
    }
    if ( document.form.nightassist.value == "" ) {
      alert("請填寫「申請住校生夜間學習輔導金額」！");
      document.form.nightassist.focus();
      return false;
    }

    return true;
  }
</script>   

</form>
<? if ($class == '1') {
	echo "<a href='/edu/modules/xSchoolForm/download/02.表(二)~1_補助項目二_補助辦理學習輔導申請表-國小.xls' target='_new'>下載：表(二)~1_補助項目二_補助辦理學習輔導申請表-國小(經費概算表)</a>";
} else {
	echo "<a href='/edu/modules/xSchoolForm/download/02.表(二)~1_補助項目二_補助辦理學習輔導申請表-國中.xls' target='_new'>下載：表(二)~1_補助項目二_補助辦理學習輔導申請表-國中(經費概算表)</a>";
} ?>
<!--<a href="/edu/modules/xSchoolForm/download/A2-2.補助原住民及離島地區學校辦理學生學習輔導經費概算表.xls" target="_new">下載：補助原住民及離島地區學校辦理學生學習輔導經費概算表</a> -->
<div>
<?
//讀取上傳檔案資料
if($class == '1' ){			
	$sql = "select  *  from   100element_upload_name where account like '$username'";
}else{
	$sql = "select  *  from   100junior_upload_name where account like '$username'";
}
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$file_1 = $row[10];
	$file_2 = $row[11];
}
?>
<form action="file_ok.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="a_2_1">
	<input type="file" name="myfile">
	<input type="submit" value="上傳計畫">
(若有多份資料請存為同一檔案上傳)<br /><? if ($file_1 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_1.'" target="_new">'.$file_1.'</a>';}?>
</form>
<form action="file_ok.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="a_2_2">
	<input type="file" name="myfile">
	<input type="submit" value="上傳經費概算表(申請表)">
<br /><? if ($file_2 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_2.'" target="_new">'.$file_2.'</a>';}?>
</form>
<br>※無論上傳檔名為何，系統會自動將檔名編碼為：年度_學校代號_文件編號.副檔名
<br>　例如：彰化縣民生國小代碼：074602
<br>　上傳後的檔案名稱為：101_074602_p1.xls(或.doc)
</div>
<script>
function numsum() { 
	var f = document.forms[0]; 
	f.afterLearnMon.value = (f.assist.value==""?0:parseFloat(f.assist.value)) + (f.holidayassist.value==""?0:parseFloat(f.holidayassist.value))+ (f.nightassist.value==""?0:parseFloat(f.nightassist.value)); 
}
function numsum1() { 
	var f = document.forms[0]; 
	f.assist.value = (f.assistsection.value * <? echo $section1;?>); 
}
function numsum2() { 
	var f = document.forms[0]; 
	f.holidayassist.value = (f.holidaysection.value * <? echo $section2;?>); 
}
function numsum3() { 
	var f = document.forms[0]; 
	f.nightassist.value = (f.nightsection.value * <? echo $section3;?>); 
}
function change1() { 
	var f = document.forms[0]; 
	//f.tnumber1.value = f.tnumber1.value; 
	numsum();
	average();
}
function change2() { 
	var f = document.forms[0]; 
	//f.tnumber2.value = f.tnumber2.value; 
	numsum();
	average();
}
function change3() { 
	var f = document.forms[0]; 
	//f.tnumber3.value = f.tnumber3.value; 
	numsum();
	average();
} 
function change4() { 
	var f = document.forms[0]; 
	numsum1();
	change1();	
	average();
}
function change5() { 
	var f = document.forms[0]; 
	numsum2();
	change2();	
	average();
}
function change6() { 
	var f = document.forms[0]; 
	numsum3();
	change3();	
	average();
}
</script>
<?php
include "../../footer.php";
?>