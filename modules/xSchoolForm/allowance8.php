<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
include "./checkdate.php";
$datetime = date ("Y" , mktime(date('Y'))) ; 
?>
<?
if($class == '1' ){		
$sql = "select  *  from   100element_allowance8 where account like '$username'";
}
else{
$sql = "select  *  from   100junior_allowance8 where account like '$username'";
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
			$b4 = $row[7];			
			$c1 = $row[8];
			$c2 = $row[9];
			$c3 = $row[10];
			$c4 = $row[11];	 
			$d1 = $row[12];
			$d2 = $row[13];
			$d3 = $row[14];
			$d4 = $row[15];
			$e1 = $row[16];
			$e2 = $row[17];
			$e3 = $row[18];
			$e4 = $row[19];
			$e5 = $row[20];
			$f1 = $row[21];
			$f2 = $row[22];
			$f3 = $row[23];
			$f4 = $row[24];
			$g1 = $row[25];
			$g2 = $row[26];
			$g3 = $row[27];
			$g4 = $row[28];
			// 下面有用到，上面變數不知用途 
			$h1 = $row[29];
			$h2 = $row[30];
			$h3 = $row[31];
			$h4 = $row[32];
			$i1 = $row[34];	
			$i2 = $row[35];
			$j1 = $row[38];
			$j2 = $row[39];	
			$j3 = $row[42];	
        }
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="allowance8_finish.php"  onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><font color="blue"><strong>補助項目八 </strong></font><a href="/edu/modules/xSchoolForm/download/allowance-08.htm" target="_blank">(補助項目說明)</a>
<p>
※ 補助整修學校社區化活動場所
<p>
本項補助經費上限如下：(本年度限申請補助綜合球場)<br />
(1)綜合球場：修建40萬元，設備20萬元。<br />
<!-- 本年度刪除後面兩項
(2)運動場：修建200公尺以上最高150萬元;未滿200公尺最高100萬元，設備器材30萬元。<br />
(3)修建小型集會風雨教室：2間教室面積最高80萬元，設備40萬元；3間教室面積最高120萬元，設備60萬元；4間教室面積最高160萬元，設備80萬元
-->
<p>
　•<font color=blue>申請補助經費<input type="text" size="6" name="money" value="<? if($h1 =='') echo ''; else echo $h1;?>"  style="border:0px; text-align: right;" readonly>元</font><br><br />
　　-申請補助綜合球場
    <input type="text" size="6" name="afterGym" /value="<? if($h2 =='') echo ''; else echo $h2;?>">座，修建<input type="text" size="6" name="aftergymMon" onChange="change1()" value="<? if($h3 =='') echo ''; else echo $h3;?>"/>元，設備<input type="text" size="6" name="aftergymExe" onChange="change2()" value="<? if($h4 =='') echo ''; else echo $h4;?>"/>元<br>	
<!--    執行<input type="text" size="1" name="aftergymExe" />元,
	執行率<input type="text" size="1" name="aftergymPer" />%<br>-->

<!--　　-申請補助小型集會風雨教室
    <input type="text" size="6" name="afterclass" value="<? if($i1 =='') echo ''; else echo $i1;?>">間,
    經費<input type="text" size="6" name="afterclassMon" value="<? if($i2 =='') echo ''; else echo $i2;?>"/>元<br> 
-->
   <!-- 執行<input type="text" size="1" name="afterclassExe" />元,
	執行率<input type="text" size="1" name="afterclassPer" />%<br>-->

<!--　　-申請補助修建<input type="text" size="6" name="aftergroundsize" value="<? if($j3 =='') echo ''; else echo $j3;?>"/>公尺運動場
    <input type="text" size="6" name="afterground" value="<? if($j1 =='') echo ''; else echo $j1;?>"/>座，經費<input type="text" size="6" name="aftergroundMon" value="<? if($j2 =='') echo ''; else echo $j2;?>"/>元
-->

<!--    執行<input type="text" size="1" name="aftergroundExe" />元,
	執行率<input type="text" size="1" name="aftergroundPer" />%-->
    <br><br>
        <INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
<input type="submit" name="button" value="儲存並到下一頁" />

<!-- 檢查空值 -->
<script language="JavaScript">
  function toCheck() {
    if ( document.form.money.value == "" ) {
      alert("請填寫「預計補助經費」！");
      document.form.money.focus();
      return false;
    }
    if ( document.form.afterGym.value == "" ) {
      alert("請填寫「申請補助綜合球場數量」！");
      document.form.afterGym.focus();
      return false;
    }
    if ( document.form.aftergymMon.value == "" ) {
      alert("請填寫「申請補助綜合球場經費」！");
      document.form.aftergymMon.focus();
      return false;
    }
/*    if ( document.form.afterclass.value == "" ) {
      alert("請填寫「申請補助小型集會風雨教室數量」！");
      document.form.afterclass.focus();
      return false;
    }		
    if ( document.form.afterclassMon.value == "" ) {
      alert("請填寫「申請補助小型集會風雨教室經費」！");
      document.form.afterclassMon.focus();
      return false;
    }		
    if ( document.form.aftergroundsize.value == "" ) {
      alert("請填寫「申請補助運動場長度」！");
      document.form.aftergroundsize.focus();
      return false;
    }
    if ( document.form.afterground.value == "" ) {
      alert("請填寫「申請補助運動場數量」！");
      document.form.afterground.focus();
      return false;
    }	
    if ( document.form.aftergroundMon.value == "" ) {
      alert("請填寫「申請補助運動場金額」！");
      document.form.aftergroundMon.focus();
      return false;
    }	
*/	
	//數值檢核
	if ( document.form.aftergymMon.value > 400000 ) {
      alert("綜合球場補助申請「修建」不得超過40萬元！");
      document.form.aftergymMon.focus();
      return false;
	}
	if ( document.form.aftergymExe.value > 200000 ) {
      alert("綜合球場補助申請「設備」不得超過20萬元！");
      document.form.aftergymMon.focus();
      return false;
	}

    return true;
  }
</script>

</form>

<a href="/edu/modules/xSchoolForm/download/A1-1.推展親職教育活動實施計畫範本.doc" target="_new">下載：空白計畫範本 (供參考，可修改標題使用)</a><br />
<a href="/edu/modules/xSchoolForm/download/A8-1.整修學校社區化活動場所經費概算表.xls" target="_new">下載：整修學校社區化活動場所經費概算表</a>

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
	$file_1 = $row[34];
	$file_2 = $row[35];
}
?>
<form action="file_ok.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="a_8_2">
	<input type="file" name="myfile">
	<input type="submit" value="上傳計畫">
<br /><? if ($file_2 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_2.'" target="_new">'.$file_2.'</a>';}?>
</form>
<form action="file_ok.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="a_8_1">
	<input type="file" name="myfile">
	<input type="submit" value="上傳經費概算表(申請表)">
<br /><? if ($file_1 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_1.'" target="_new">'.$file_1.'</a>';}?>
</form>
<br>※無論上傳檔名為何，系統會自動將檔名編碼為：年度_學校代號_文件編號.副檔名
<br>　例如：彰化縣民生國小代碼：074602
<br>　上傳後的檔案名稱為：101_074602_p1.xls(或.doc)
</div>
<script>
function numsum1() { 
	var f = document.forms[0]; 
	f.money.value = (f.aftergymMon.value==""?0:parseFloat(f.aftergymMon.value)) + (f.aftergymExe.value==""?0:parseFloat(f.aftergymExe.value)); 
}
function change1() { 
	var f = document.forms[0]; 
	numsum1();
	average();
} 
function change2() { 
	var f = document.forms[0]; 
	numsum1();
	average();
}
</script>
<?php
include "../../footer.php";
?>