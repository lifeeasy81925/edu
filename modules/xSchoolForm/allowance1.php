<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
include "./checkdate.php";
$datetime = date ("Y" , mktime(date('Y'))) ; 
?>
<?
if($class == '1' ){			
	$sql = "select  *  from   100element_allowance1 where account like '$username'";
}else{
	$sql = "select  *  from   100junior_allowance1 where account like '$username'";
}
//讀取補助項目一資料
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$c1 = $row[11];
	$c2 = $row[12];
	$c3 = $row[13];
	$f1 = $row[22];
	$f2 = $row[23];		 
}

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="allowance1_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><font color="blue"><strong>補助項目一 </strong></font><a href="/edu/modules/xSchoolForm/download/allowance-01.htm" target="_blank">(補助項目說明)</a>
<p>
<font color=blue>※親職教育-申請補助經費：<input type="text" size="6" name="familysum" value=<? echo $c1+$f1;?> style="border:0px; text-align: right;" readonly >元。(本列自動產生)</font>
<p>
--本項目最高補助7萬元，其中辦理親職教育活動最高補助2萬元，家庭訪視申請補助經費標準最高為每人次200元。
<p>
※親職講座<br>
　•申請補助經費
    <input type="text" size="5" name="afterMon" onChange="change1()" value="<? if($c1 =='') echo ''; else echo $c1;?>"/>元,
    預計辦理親職講座<input type="text" size="2" name="afterLec" value="<? if($c2 =='') echo ''; else echo $c2;?>"/>場,
    預計參加人數<input type="text" size="3" name="afterNum" value="<? if($c3 =='') echo ''; else echo $c3;?>"/>人。
<br /><br>
※家庭訪視<br>
　•申請輔助經費
    <input type="text" size="5" name="afterFamMon" onChange="change2()" value="<? if($f1 =='') echo ''; else echo $f1;?>"/>元,
    預計個別家庭訪視<input type="text" size="3" name="afterFamMonLec" value="<? if($f2 =='') echo ''; else echo $f2;?>"/>人次。<br />
    <br>
    <INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
	<input type="submit" name="button" value="儲存並到下一頁" />

<script>
//申請補助經費更新
function numsum() { 
	var f = document.forms[0]; 
	f.familysum.value = (f.afterMon.value==""?0:parseFloat(f.afterMon.value)) + (f.afterFamMon.value==""?0:parseFloat(f.afterFamMon.value)); 
}

function change1() { 
	var f = document.forms[0]; 
	numsum();
}
function change2() { 
	var f = document.forms[0]; 
	numsum();
}

</script>

<!-- 檢查空值 與 數值檢核-->
<script language="JavaScript">
  function toCheck() {
    if ( document.form.afterMon.value == "" ) {
      alert("請填寫「親職講座申請補助經費」！");
      document.form.afterMon.focus();
      return false;
    }
    if ( document.form.afterLec.value == "" ) {
      alert("請填寫「親職講座預計辦理場次」！");
      document.form.afterLec.focus();
      return false;
    }
    if ( document.form.afterNum.value == "" ) {
      alert("請填寫「親職講座預計參加人數」！");
      document.form.afterNum.focus();
      return false;
    }		
    if ( document.form.afterFamMon.value == "" ) {
      alert("請填寫「家庭訪視申請補助經費」！");
      document.form.afterFamMon.focus();
      return false;
    }
    if ( document.form.afterFamMonLec.value == "" ) {
      alert("請填寫「家庭訪視預計訪視人次」！");
      document.form.afterFamMonLec.focus();
      return false;
    }
	//數值檢核
	if ( document.form.afterMon.value > 20000 ) {
      alert("親職講座最高補助金額2萬元！");
      document.form.afterMon.focus();
      return false;
    } else if ( document.form.afterFamMon.value > document.form.afterFamMonLec.value * 200 ) {
      alert("家庭訪視最高補助金額每人200元！");
      document.form.afterFamMon.focus();
      return false;
	} else if ( (document.form.afterMon.value * 1 + document.form.afterFamMon.value * 1) > 70000 ) {
      alert("本項目最高補助金額7萬元！");
      document.form.afterFamMon.focus();
      return false;
	}
			
    return true;
  }
</script>     
  
</form>

<a href="/edu/modules/xSchoolForm/download/A1-1.推展親職教育活動實施計畫範本.doc" target="_new">下載：推展親職教育活動實施計畫範本</a><br />
<a href="/edu/modules/xSchoolForm/download/A1-2.推展親職教育活動概算表.xls" target="_new">下載：推展親職教育活動經費概算表</a>

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
	$file_1 = $row[6];
	$file_2 = $row[7];
}
?>
  <form action="file_ok.php" method="post" enctype="multipart/form-data" target="_self">
    <input type="hidden" name="max_file_size" value="102400000">
    <input type="hidden" name="table" value="a_1_1">
    <input type="file" name="myfile">
    <input type="submit" value="上傳計畫">
    (若有多份資料請存為同一檔案上傳)<br /><? if ($file_1 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_1.'" target="_new">'.$file_1.'</a>';}?>
  </form>
  <form action="file_ok.php" method="post" enctype="multipart/form-data" target="_self">
    <input type="hidden" name="max_file_size" value="102400000">
    <input type="hidden" name="table" value="a_1_2">
    <input type="file" name="myfile">
    <input type="submit" value="上傳經費概算表(申請表)">
<br /><? if ($file_2 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_2.'" target="_new">'.$file_2.'</a>';}?>
</form>
<br>※無論上傳檔名為何，系統會自動將檔名編碼為：年度_學校代號_文件編號.副檔名
<br>　例如：彰化縣民生國小代碼：074602
<br>　上傳後的檔案名稱為：101_074602_p1.xls(或.doc)
</div>
<!--(今年執行沒有建資料庫)-->
<?php
include "../../footer.php";
?>