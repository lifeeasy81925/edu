<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
include "./checkdate.php";
$datetime = date ("Y" , mktime(date('Y'))) ; 
?>
<?
if($class == '1' ){			
	$sql = "select  *  from   100element_allowance4 where account like '$username'";
}else{
	$sql = "select  *  from   100junior_allowance4 where account like '$username'";
}
//讀取補助四資料
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$a1 = $row[1];
	$a2 = $row[2];
	$a3 = $row[3];
	$b1 = $row[4];
	$b2 = $row[5];
	$b3 = $row[6];
	$c1 = $row[7];
	$c2 = $row[8];
	$c3 = $row[9];
	$c4 = $row[20];
	$c5 = $row[21];
	$d1 = $row[10];
	$d2 = $row[11];
	$d3 = $row[12];	
	$allowance = $row[13];	
	$e1 = $row[14];
	$e2 = $row[15];
	$e3 = $row[16];
	$e4 = $row[22];
	$e5 = $row[23];
	$f1 = $row[17];
	$f2 = $row[18];
	$f3 = $row[19];			
}
//讀取指標
$sql_school = "select  *  from ".$basedata." where account like '$username'";
$result_school = mysql_query($sql_school);
while($row = mysql_fetch_row($result_school)){
	$p1_1 = $row[1];
	$p1_2 = $row[2];
	$p1_3 = $row[3];
	$p1_4 = $row[4];
	$p2_1 = $row[5];
	$p2_2 = $row[6];
	$p3 = $row[7];
	$p4 = $row[8];
	$p5 = $row[11];
	$p6 = $row[9];
	$p2_3 = $row[10];
	$p6_2 = $row[12];			
}
//echo "<br>檢測用，測完刪除：(p1-1:".$p1_1.", p1-2:".$p1_2.", p1-3:".$p1_3.", p5:".$p5.", p6-1:".$p6_1.", p6-2:".$p6_2.")";
//連接point table 取出所有的符合指標 
if($class == '1' ){
	$basedata="100element_point";
}else{
	$basedata="100junior_point";
}			
$sql = "select  *  from ".$basedata." where account like '$username'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$a = $row[1];			//1-1
	$b = $row[2];			//1-2
	$c = $row[3];			//1-3
	$d = $row[4];			//1-4
	$e = $row[5];			//2-1
	$f = $row[6];			//2-2
	$g = $row[7];			//3
	$h = $row[8];			//4
	$i = $row[9];			//6-1
	$j = $row[10];			//2-3
	$k = $row[11];			//5-1
	$l = $row[12];			//6-2
	$m = $row[13];			//5-2
	$n = $row[14];			//5-3		
}
$a_4_1 = ($a==1 || $b==1 || $c==1 || $k==1 || $m==1);
$a_4_2 = ($k==1 || $m==1 || $i==1 || $l==1);
	
if ($a_4_1 == 1) {
	$a4key = 1;
	$a4item = "學生宿舍";	
}
if ($a_4_2 == 1) {
	$a4key = 2;
	$a4item = "教師宿舍";	
}
if ($a_4_1 == 1 && $a_4_2 == 1) {
	$a4key = 3;
	$a4item = "學生宿舍及教師宿舍";
}

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="allowance4_finish.php"  onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><font color="blue"><strong>補助項目四 </strong></font><a href="/edu/modules/xSchoolForm/download/allowance-04.htm" target="_blank">(補助項目說明)</a>
<p>
※補助師生宿舍</p>
　--本項目最高補助140萬元。<br /><br />
※最近五年曾獲本項補助<br />
<label>
      <input type="radio" name="RadioGroup1" value="1" id="RadioGroup1_0" <? if ($allowance=='1') echo 'checked';?>/>
      是</label>
    (96、97、98、99、100年度已接受本項補助之宿舍，不得再提出申請)<br />
    <label>
      <input type="radio" name="RadioGroup1" value="0" id="RadioGroup1_1" <? if ($allowance=='0') echo 'checked';?>/>
      否</label>
    <br />
    <br />
※貴校得申請修繕(含設備)：<font color=red><? echo $a4item; ?></font><br />
<? if ($a4key == 2) { echo "<!--"; } ?>
　預計申請<font color=blue>學生宿舍</font>：經常門經費<input type="text" size="2" name="afterMonNum" value="<? if($c4 =='') echo ''; else echo $c4;?>"/>項<input type="text" size="6" name="afterMon" onChange="change3()" value="<? if($c1 =='') echo ''; else echo $c1;?>"/>
元，資本門經費<input type="text" size="2" name="afterEquipNum" value="<? if($c5 =='') echo ''; else echo $c5;?>"/>式<input type="text" size="6" name="afterEquip" onChange="change4()" value="<? if($c2 =='') echo ''; else echo $c2;?>"/>元，<font color=blue><br />　　　　　　　　　　經費共計<input type="text" size="6" name="afterEquipMon" value="<? if($c3 =='') echo ''; else echo $c3;?>" style="border:0px; text-align: right;" readonly>元。</font><br>
<? if ($a4key == 2) { echo "-->"; } ?>
<? if ($a4key == 1) { echo "<!--"; } ?>
　預計申請<font color=blue>教師宿舍</font>：經常門經費<input type="text" size="2" name="TafterMonNum" value="<? if($e4 =='') echo ''; else echo $e4;?>"/>項<input type="text" size="6" name="TafterMon" onChange="change5()" value="<? if($e1 =='') echo ''; else echo $e1;?>"/>
元，資本門經費<input type="text" size="2" name="TafterEquipNum" value="<? if($e5 =='') echo ''; else echo $e5;?>"/>式<input type="text" size="6" name="TafterEquip" onChange="change6()" value="<? if($e2 =='') echo ''; else echo $e2;?>"/>元，<font color=blue><br />　　　　　　　　　　經費共計<input type="text" size="6" name="TafterEquipMon" value="<? if($e3 =='') echo ''; else echo $e3;?>" style="border:0px; text-align: right;" readonly>元。</font><br>
<? if ($a4key == 1) { echo "-->"; } ?>
<br />
※最近三年住宿情形<br>
<? if ($a4key == 2) { echo "<!--"; } ?>
　--<strong>學生宿舍</strong><br />
　　-今(<? echo $datetime-1912;?>)學年度學生宿舍住宿人數<input type="text" size="6" name="thisDorm" value="<? if($d1 =='') echo ''; else echo $d1;?>"/>人<br>
　　-去(<? echo $datetime-1913;?>)學年度學生宿舍住宿人數<input type="text" size="6" name="lastDorm" value="<? if($d2 =='') echo ''; else echo $d2;?>"/>人<br>
　　-前(<? echo $datetime-1914;?>)學年度學生宿舍住宿人數<input type="text" size="6" name="beforeDorm" value="<? if($d3 =='') echo ''; else echo $d3;?>"/>人<br>
<? if ($a4key == 2) { echo "-->"; } ?>
<? if ($a4key == 1) { echo "<!--"; } ?>
　--<strong>教師宿舍</strong><br />
　　-今(<? echo $datetime-1912;?>)學年度教師宿舍住宿人數<input type="text" size="6" name="TthisDorm" value="<? if($f1 =='') echo ''; else echo $f1;?>"/>人<br>
　　-去(<? echo $datetime-1913;?>)學年度教師宿舍住宿人數<input type="text" size="6" name="TlastDorm" value="<? if($f2 =='') echo ''; else echo $f2;?>"/>人<br>
　　-前(<? echo $datetime-1914;?>)學年度教師宿舍住宿人數<input type="text" size="6" name="TbeforeDorm" value="<? if($f3 =='') echo ''; else echo $f3;?>"/>人<br>
<? if ($a4key == 1) { echo "-->"; } ?>

<br>
    <INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
	<input type="submit" name="button" value="儲存並到下一頁" />
  </p>

<!-- 檢查空值 與 資料驗證 -->
<script language="JavaScript">
function toCheck() {
	//檢查是否勾選補助	  
	if ( document.form.RadioGroup1[0].checked ) {
		var allowance = 1;
	} else if ( document.form.RadioGroup1[1].checked ){
		var allowance = 0;
	} else {
		alert("請填寫「是否曾獲本項補助」！");
    	document.form.RadioGroup1[1].focus();
    	return false;
	}
	//alert(document.form.TafterMon.value);	
	//alert( allowance );
	
	//金額檢核
	if ( document.form.afterMon.value == "" ) {
      alert("請填寫「預計申請修繕費用」！");
      document.form.afterMon.focus();
      return false;
    }
    if ( document.form.afterEquip.value == "" ) {
      alert("請填寫「預計申請設備費用」！");
      document.form.afterEquip.focus();
      return false;
    }
    if ( document.form.afterEquipMon.value == "" ) {
      alert("請填寫「預計申請經費共計」！");
      document.form.afterEquipMon.focus();
      return false;
    }
    if ( document.form.thisDorm.value == "" ) {
      alert("請填寫「今年宿舍住宿人數」！");
      document.form.thisDorm.focus();
      return false;
    }
    if ( document.form.lastDorm.value == "" ) {
      alert("請填寫「去年宿舍住宿人數」！");
      document.form.lastDorm.focus();
      return false;
    }
    if ( document.form.beforeDorm.value == "" ) {
      alert("請填寫「前年宿舍住宿人數」！");
      document.form.beforeDor.focus();
      return false;
    }

	//加總檢核
	if ( ((document.form.afterMon.value*1) + (document.form.afterEquip.value*1)) != (document.form.afterEquipMon.value*1) ) {
      alert("學生宿舍金額加總錯誤！");
      document.form.afterEquipMon.focus();
      return false;
    }
	if ( ((document.form.TafterMon.value*1) + (document.form.TafterEquip.value*1)) != (document.form.TafterEquipMon.value*1) ) {
      alert("教師宿舍金額加總錯誤！");
      document.form.TafterEquipMon.focus();
      return false;
    }
/*	//修繕加總檢核，不得大於100萬元
	if ( ((document.form.afterMon.value*1) + (document.form.TafterMon.value*1)) > 1000000 ) {
      alert('修繕金額錯誤！\n修繕補助不得大於100萬元。');
      //document.form.TafterEquipMon.focus();
      return false;
    }
	//設備加總檢核，不得大於40萬元
	if ( ((document.form.afterEquip.value*1) + (document.form.TafterEquip.value*1)) > 400000 ) {
      alert('設備金額錯誤！\n設備補助不得大於40萬元。');
      //document.form.TafterEquipMon.focus();
      return false;
    }
*/
	//加總檢核，不得大於140萬元
	if ( ((document.form.afterMon.value*1) + (document.form.TafterMon.value*1) + (document.form.afterEquip.value*1) + (document.form.TafterEquip.value*1)) > 1400000 ) {
      alert('申請總額錯誤！\n申請總額不得大於140萬元。');
      //document.form.TafterEquipMon.focus();
      return false;
    }


    return true;
}
</script>    

</form>

<a href="/edu/modules/xSchoolForm/download/A4-1.修繕離島或偏遠地區師生宿舍經費概算表.xls" target="_new">下載：修繕離島或偏遠地區師生宿舍經費概算表</a><br />
<a href="/edu/modules/xSchoolForm/download/表(四)~2修繕離島或偏遠地區師生宿舍計畫及近三年住宿情形.doc" target="_new">下載：修繕離島或偏遠地區師生宿舍計畫及近三年住宿情形(參考表格)</a>
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
	$file_1 = $row[18];
	$file_2 = $row[19];
}
?>
<form action="file_ok.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="a_4_1">
	<input type="file" name="myfile">
	<input type="submit" value="上傳修繕師生宿舍經費概算表(申請表)">
<br /><? if ($file_1 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_1.'" target="_new">'.$file_1.'</a>';}?>
</form>
<form action="file_ok.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="a_4_2">
	<input type="file" name="myfile">
	<input type="submit" value="上傳計畫及最近3年住宿人員基本資料">
<br /><? if ($file_2 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_2.'" target="_new">'.$file_2.'</a>';}?>
</form>
<br>※無論上傳檔名為何，系統會自動將檔名編碼為：年度_學校代號_文件編號.副檔名
<br>　例如：彰化縣民生國小代碼：074602
<br>　上傳後的檔案名稱為：101_074602_p1.xls(或.doc)
</div>
<script>
function numsum1() { 
	var f = document.forms[0]; 
	f.afterEquipMon.value = (f.afterMon.value==""?0:parseFloat(f.afterMon.value)) + (f.afterEquip.value==""?0:parseFloat(f.afterEquip.value)); 
}
function numsum2() { 
	var f = document.forms[0]; 
	f.TafterEquipMon.value = (f.TafterMon.value==""?0:parseFloat(f.TafterMon.value)) + (f.TafterEquip.value==""?0:parseFloat(f.TafterEquip.value)); 
}
function change3() { 
	var f = document.forms[0]; 
	numsum1();
	average();
} 
function change4() { 
	var f = document.forms[0]; 
	numsum1();
	average();
}
function change5() { 
	var f = document.forms[0]; 
	numsum2();
	average();
}
function change6() { 
	var f = document.forms[0]; 
	numsum2();
	average();
}
</script>
<?php
include "../../footer.php";
?>