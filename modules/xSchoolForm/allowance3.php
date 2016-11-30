<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
include "./checkdate.php";
$datetime = date ("Y" , mktime(date('Y'))) ; 
$keyClasses = '13'; // 設定可申請特色二的最少班級數
?>
<?
if($class == '1' ){			
$sql = "select  *  from   100element_allowance3 where account like '$username'";
}
else{
$sql = "select  *  from   100junior_allowance3 where account like '$username'";
}

$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
        {
			$a1 = $row[1];
			$a2 = $row[2];
			$a3 = $row[3];
			$a4 = $row[4];
			$b1 = $row[5];
			$b2 = $row[6];
			$b3 = $row[7];
			$b4 = $row[8];
			$c = $row[9];
			$d = $row[10];
			$e1 = $row[11];
			$e2 = $row[12];
			$e3 = $row[13];
			$e4 = $row[14];
			$f1 = $row[15];
			$f2 = $row[16];
			$f3 = $row[17];
			$f4 = $row[18];			 		 
        }
?>
<?
if($class == '1' ){			
$sql_class = "select  *  from   100element_basedata where account like '$username'";
}
else{
$sql_class = "select  *  from   100junior_basedata where account like '$username'";
}
$result_class = mysql_query($sql_class);
while($row = mysql_fetch_row($result_class))
		 {
			$classes = $row[3];
		 }
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
.font {
	font-weight: bold;
}
-->
</style>
<form name="form" method="post" action="allowance3_finish.php"  onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><font color="blue"><strong>補助項目三 </strong></font><a href="/edu/modules/xSchoolForm/download/allowance-03.htm" target="_blank">(補助項目說明)</a>
<p>
<font color=blue>※補助學校申請發展特色-申請補助經費：<input type="text" size="6" name="afterMon" value="<? if($c =='') echo ''; else echo $c;?>" style="border:0px; text-align: right;" readonly>元 (本列自動產生)</font><br /><br />
<span class="font">班級數為 <? echo $classes; ?> 班，您最多可以申請 <? 
  if($classes < $keyClasses ){
	  echo "1";
	}
	else{
		echo "2";
	}
  ?> 項特色補助。</span><br /><br>

　　-申請<input type="text" size="6" name="develop" value="<? if($d =='') echo ''; else echo $d;?>"/>項特色<br>
　　-優先申請特色一：<input type="text" size="40" name="char1" value="<? if($e1 =='') echo ''; else echo $e1;?>"/>(項目名稱)，<br /><font color=blue>　　　經費<input type="text" size="6" name="char1Mon" onChange="change1()" value="<? if($e2 =='') echo ''; else echo $e2;?>" style="border:0px; text-align: right;" readonly>元</font>
    (含資本門經費<input type="text" size="6" name="char1b" onChange="change3()" value="<? if($e4 =='') echo ''; else echo $e4;?>"/>元，經常門經費<input type="text" size="6" name="char1a" onChange="change4()" value="<? if($e3 =='') echo ''; else echo $e3;?>"/>元)<br />
<span style="display : <? if($classes < '13') {echo "none";} else {echo "visable";} ?>">
　　-　　　　特色二：<input type="text" size="40" name="char2" value="<? if($f1 =='') echo ''; else echo $f1;?>"/>(項目名稱)，<br /><font color=blue>　　　經費<input type="text" size="6" name="char2Mon" onChange="change2()" value="<? if($f2 =='') echo ''; else echo $f2;?>" style="border:0px; text-align: right;" readonly>元</font>
    (含資本門經費<input type="text" size="6" name="char2b" onChange="change5()" value="<? if($f4 =='') echo ''; else echo $f4;?>"/>元，經常門經費<input type="text" size="6" name="char2a" onChange="change6()" value="<? if($f3 =='') echo ''; else echo $f3;?>"/>元)<br />
</span>
　　　　•分校分班最高核列6萬元<br>
　　　　•12班以下最高核列8萬元<br>
　　　　•13班以上最高核列2項特色,每項最高8萬元<br>
<br>
  <INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
  <input type="submit" name="button" value="儲存並到下一頁" />

<!-- 檢查空值 -->
<script language="JavaScript">
  function toCheck() {
    if ( document.form.afterMon.value == "" ) {
      alert("請填寫「發展特色申請補助經費」！");
      document.form.afterMon.focus();
      return false;
    }
    if ( document.form.develop.value == "" ) {
      alert("請填寫「發展特色申請項目數量」！");
      document.form.develop.focus();
      return false;
    }
    if ( document.form.char1.value == "" ) {
      alert("班級數 <? echo $classes;?>\n請填寫「優先申請特色一申請項目名稱」！");
      document.form.char1.focus();
      return false;
    }
    if ( document.form.char1Mon.value == "" ) {
      alert("請填寫「優先申請特色一申請經費」！");
      document.form.char1Mon.focus();
      return false;
    }
    if ( document.form.char1a.value == "" ) {
      alert("請填寫「優先申請特色一經常門」！");
      document.form.char1a.focus();
      return false;
    }
    if ( document.form.char1b.value == "" ) {
      alert("請填寫「優先申請特色一資本門」！");
      document.form.char1b.focus();
      return false;
    }
    if ( <? echo $classes;?> >= <? echo $keyClasses;?> && document.form.char2.value == "" ) {
      alert("班級數 <? echo $classes;?>\n請填寫「特色二申請項目名稱」！\n若無請填「無」");
      document.form.char2.focus();
      return false;
    }
    if ( <? echo $classes;?> >= <? echo $keyClasses;?> && document.form.char2Mon.value == "" ) {
      alert("請填寫「特色二申請經費」！\n若無請填0");
      document.form.char2Mon.focus();
      return false;
    }
    if ( <? echo $classes;?> >= <? echo $keyClasses;?> && document.form.char2a.value == "" ) {
      alert("請填寫「特色二經常門」！\n若無請填0");
      document.form.char2a.focus();
      return false;
    }
    if ( <? echo $classes;?> >= <? echo $keyClasses;?> && document.form.char2b.value == "" ) {
      alert("請填寫「特色二資本門」！\n若無請填0");
      document.form.char2b.focus();
      return false;
    }
	//金額檢核
	if(<? echo $classes;?> < <? echo $keyClasses;?> ){var maxMon = 80000; }else{var maxMon = 160000;}
	//alert(maxMon);
    if ( document.form.afterMon.value > maxMon) {
      alert('申請金額超過可申請上限！');
      document.form.afterMon.focus();
      return false;
    }
    if ( document.form.char1Mon.value > 80000) {
		alert('特色一申請金額超過可申請上限！');
		//document.form.char1Mon.focus();
		return false;
    }
    if ( document.form.char2Mon.value > 80000) {
		alert('特色二申請金額超過可申請上限！');
		//document.form.char1Mon.focus();
		return false;
    }
	//申請項目數檢核
	if(<? echo $classes;?> < <? echo $keyClasses;?> ){
		if(document.form.develop.value > 1 ){
			alert('申請項目超過可申請上限！'); 
			document.form.develop.focus();
			return false;
		}
	}else{
		if(document.form.develop.value > 2 ){
			alert('申請項目超過可申請上限！'); 
			document.form.develop.focus();
			return false;
		}
	}
	
			
    return true;
  }
</script>     
  
</form>

<a href="/edu/modules/xSchoolForm/download/A3-2.補助學校發展教育特色經費概算表.xls" target="_new">下載：補助學校發展教育特色經費概算表</a><br />
(若可申請兩項特色，請合併於同一檔案分頁上傳)
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
	$file_1 = $row[14];
	$file_2 = $row[15];
}
?>
<form action="file_ok.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="a_3_1">
	<input type="file" name="myfile">
	<input type="submit" value="上傳特色計畫">
<br /><? if ($file_1 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_1.'" target="_new">'.$file_1.'</a>';}?>
</form>
<form action="file_ok.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="a_3_2">
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
	f.afterMon.value = (f.char1Mon.value==""?0:parseFloat(f.char1Mon.value)) + (f.char2Mon.value==""?0:parseFloat(f.char2Mon.value)); 
}
function numsum1() { 
	var f = document.forms[0]; 
	f.char1Mon.value = (f.char1b.value==""?0:parseFloat(f.char1b.value)) + (f.char1a.value==""?0:parseFloat(f.char1a.value)); 
}
function numsum2() { 
	var f = document.forms[0]; 
	f.char2Mon.value = (f.char2b.value==""?0:parseFloat(f.char2b.value)) + (f.char2a.value==""?0:parseFloat(f.char2a.value)); 
}
function change1() { 
	var f = document.forms[0]; 
	numsum();
	average();
}
function change2() { 
	var f = document.forms[0]; 
	numsum();
	average();
}
function change3() { 
	var f = document.forms[0]; 
	numsum1();
	change1();	
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
	numsum2();
	change2();	
	average();
}
</script>
<?php
include "../../footer.php";
?>