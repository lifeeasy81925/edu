<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
include "./checkdate.php";
$datetime = date ("Y" , mktime(date('Y'))) ; 
?>
<?
if($class == '1' ){		
	$sql = "select  *  from   100element_allowance5 where account like '$username'";
	$basedata="100element_basedata"; //載入學校基本資料用	
}
else{
	$sql = "select  *  from   100junior_allowance5 where account like '$username'";
	$basedata="100junior_basedata";  //載入學校基本資料用
}

$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
        {
			$a1 = $row[1];
			$a2 = $row[2];
			$a3 = $row[3];
			$b1 = $row[4];
			$b2 = $row[5];
			$b3 = $row[6];
			$c = $row[7];
			$a = $row[8];
			$b = $row[9];
        }
// 載入學校基本資料
$sqlbasedata = "select  *  from ".$basedata." where account like '$username'";
$result = mysql_query($sqlbasedata);
while($row = mysql_fetch_row($result)){
	$db_classes = $row[3]; //讀全校班級數classes
}			
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>補助項目五</title>
<form name="form" method="post" action="allowance5_finish.php"  onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><font color="blue"><strong>補助項目五 </strong></font><a href="/edu/modules/xSchoolForm/download/allowance-05.htm" target="_blank">(補助項目說明)</a>
<p>
<font color=blue>※補助充實學校基本設備-申請補助經費<input type="text" size="6" name="afterMon" value=<? echo $a+$b;?> style="border:0px; text-align: right;" readonly >元。(本列自動產生)</font>
<p>
--6班以下最高補助10萬元，7-12班最高補助15萬元，13班以上最高補助20萬元。
<p>
　•申請經常門經費<input type="text" size="5" name="afterMonA" onChange="change1()" value="<? if($a =='') echo ''; else echo $a;?>"/>元。<br />
　•申請資本門經費<input type="text" size="5" name="afterMonB" onChange="change2()" value="<? if($b =='') echo ''; else echo $b;?>"/>元。
<p>
<INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
<input type="submit" name="button" value="儲存並到下一頁" />
  
<!-- 檢查空值 -->
<script language="JavaScript">
//申請補助經費更新
function numsum() { 
	var f = document.forms[0]; 
	f.afterMon.value = (f.afterMonA.value==""?0:parseFloat(f.afterMonA.value)) + (f.afterMonB.value==""?0:parseFloat(f.afterMonB.value)); 
}

function change1() { 
	var f = document.forms[0]; 
	numsum();
}
function change2() { 
	var f = document.forms[0]; 
	numsum();
}
//檢查輸入值
function toCheck() {
	//檢查空值
	if ( document.form.afterMonA.value == "" ) {
		alert('請填寫「申請經常門經費」！\n不申請請填「0」');
		document.form.afterMonA.focus();
		return false;
	}
	if ( document.form.afterMonB.value == "" ) {
		alert('請填寫「申請資本門經費」！\n不申請請填「0」');
		document.form.afterMonB.focus();
		return false;
	}
	//數值檢核
	if (<? echo $db_classes;?> < 7 && document.form.afterMon.value > 100000) {
		alert('6班以下申請經費不得大於10萬元！\n'+'貴校班數：'+<? echo $db_classes;?>);
		document.form.afterMon.focus();
		return false;
    } else if (<? echo $db_classes;?> < 13 && document.form.afterMon.value > 150000) {
		alert('7-12班申請經費不得大於15萬元！\n'+'貴校班數：'+<? echo $db_classes;?>);
		document.form.afterMon.focus();
		return false;
    } else if ( document.form.afterMon.value > 200000) {
		alert('13班以上申請經費不得大於20萬元！\n'+'貴校班數：'+<? echo $db_classes;?>);
		document.form.afterMon.focus();
		return false;
    }
	
    return true;
  }
</script>      
  
</form>

<a href="/edu/modules/xSchoolForm/download/A5-2.充實學校基本教學設備經費概算表.xls" target="_new">下載：充實學校基本教學設備經費概算表</a>

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
	$file_1 = $row[22];
	$file_2 = $row[23];
}
?>
<form action="file_ok.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="a_5_1">
	<input type="file" name="myfile">
	<input type="submit" value="上傳計畫">
<br /><? if ($file_1 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_1.'" target="_new">'.$file_1.'</a>';}?>
</form>
<form action="file_ok.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="a_5_2">
	<input type="file" name="myfile">
	<input type="submit" value="上傳經費概算表(申請表)">
<br /><? if ($file_2 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_2.'" target="_new">'.$file_2.'</a>';}?>
</form>
<br>※無論上傳檔名為何，系統會自動將檔名編碼為：年度_學校代號_文件編號.副檔名
<br>　例如：彰化縣民生國小代碼：074602
<br>　上傳後的檔案名稱為：101_074602_p1.xls(或.doc)
</div>
<?php
include "../../footer.php";
?>