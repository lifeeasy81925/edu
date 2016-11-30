<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
include "./checkdate.php";
$datetime = date ("Y" , mktime(date('Y'))) ; 
?>
<?
if($class == '1' ){		
	$sql = "select  *  from   100element_allowance6 where account like '$username'";
	$basedata="100element_basedata"; //載入學校基本資料用
}
else{
	$sql = "select  *  from   100junior_allowance6 where account like '$username'";
	$basedata="100junior_basedata";  //載入學校基本資料用  
}

$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$a1 = $row[1];
	$a2 = $row[2];
	$a3 = $row[3];
	$a4 = $row[4];
	$b1 = $row[5];
	$b2 = $row[6];
	$b3 = $row[7];
	$b4 = $row[8];
	$c1= $row[9];
	$c2 = $row[10];
	$c3 = $row[11];
}
// 載入學校基本資料
$sqlbasedata = "select  *  from ".$basedata." where account like '$username'";
$result = mysql_query($sqlbasedata);
while($row = mysql_fetch_row($result)){
	$db_allstudent = $row[2]; //讀allstudent
}	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="allowance6_finish.php"  onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><font color="blue"><strong>補助項目六 </strong></font><a href="/edu/modules/xSchoolForm/download/allowance-06.htm" target="_blank">(補助項目說明)</a>
<p>
※ 補助發展原住民文化特色及充實設備器材
<p>
    •<font color=blue>申請補助經費<input type="text" size="6" name="afterMon" value="<? if($c1 =='') echo ''; else echo $c1;?>" style="border:0px; text-align: right;" readonly>
    元。</font>
    (含經常門經費<input type="text" size="6" name="afterMonA" onChange="change3()" value="<? if($c2 =='') echo ''; else echo $c2;?>"/>元，資本門經費<input type="text" size="6" name="afterMonB" onChange="change4()" value="<? if($c3 =='') echo ''; else echo $c3;?>"/>元)<br />
    <br>
　　-學生100人(含)以下最高核列 12 萬元<br>
　　-學生超過100人最高核列 25 萬元<br>
　　-分校分班最高補助 8 萬元<br><br />
    <INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
	<input type="submit" name="button" value="儲存並到下一頁" />

<!-- 檢查空值 -->
<script language="JavaScript">
  function toCheck() {
    if ( document.form.afterMon.value == "" ) {
      alert("請填寫「申請補助經費」！");
      document.form.afterMon.focus();
      return false;
    }
    if ( document.form.afterMonA.value == "" ) {
      alert("請填寫「申請補助經費經常門」！");
      document.form.afterMonA.focus();
      return false;
    }
    if ( document.form.afterMonB.value == "" ) {
      alert("請填寫「申請補助經費資本門」！");
      document.form.afterMonB.focus();
      return false;
    }
	//檢核金額
	if (<? echo $db_allstudent;?> <= 100 && document.form.afterMon.value > 120000) {
		alert('學生100人(含)以下最高核列12萬元！\n'+'貴校學生總數：'+<? echo $db_allstudent;?>);
		document.form.afterMon.focus();
		return false;
    } else if (<? echo $db_allstudent;?> > 100 && document.form.afterMon.value > 250000) {
		alert('學生超過100人最高核列25萬元！\n'+'貴校學生總數：'+<? echo $db_allstudent;?>);
		document.form.afterMon.focus();
		return false;
    }
	
    return true;
  }
</script>    
</form>

<a href="/edu/modules/xSchoolForm/download/A6-2.發展原住民教育文化特色及充實設備器材經費概算表.xls" target="_new">下載：發展原住民教育文化特色及充實設備器材經費概算表</a>

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
	$file_1 = $row[26];
	$file_2 = $row[27];
}
?>
<form action="file_ok.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="a_6_1">
	<input type="file" name="myfile">
	<input type="submit" value="上傳計畫">
<br /><? if ($file_1 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_1.'" target="_new">'.$file_1.'</a>';}?>
</form>
<form action="file_ok.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="a_6_2">
	<input type="file" name="myfile">
	<input type="submit" value="上傳經費概算表(申請表)">
<br /><? if ($file_2 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_2.'" target="_new">'.$file_2.'</a>';}?>
</form>
<br>※無論上傳檔名為何，系統會自動將檔名編碼為：年度_學校代號_文件編號.副檔名
<br>　例如：彰化縣民生國小代碼：074602
<br>　上傳後的檔案名稱為：101_074602_p1.xls(或.doc)
</div>
<script>
function numsum1() { 
	var f = document.forms[0]; 
	f.afterMon.value = (f.afterMonA.value==""?0:parseFloat(f.afterMonA.value)) + (f.afterMonB.value==""?0:parseFloat(f.afterMonB.value)); 
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
</script>
<?php
include "../../footer.php";
?>