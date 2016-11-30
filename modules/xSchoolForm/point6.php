<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
include "./checkdate.php";
?>
<? $datetime = date ("Y" , mktime(date('Y'))) ; ?>
<?
if($class == '1' ){			
$sql = "select  *  from  100element_point6 where account like '$username'";
}
else{
$sql = "select  *  from  100junior_point6 where account like '$username'";
}

$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
        {
			$a = $row[1];
			$b = $row[2];
			$c = $row[3];
			$d = $row[4];
			$e = $row[5];
			$f = $row[6];
			$g = $row[7];
			$h = $row[8];
			$i = $row[9];
			$j = $row[10];
			$k = $row[11];
			$l = $row[12];
        }
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<a href="school_index.php">返回申請首頁</a>
<form name="form" method="post" action="point6_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><font color="blue"><strong>指標六</strong></font>
<p>
<font color=brown>
※教師編制人數：含校長、主任、普通班及特殊班教師數【不含幼稚園(班)教師】。<br />
※調入教師：(1)指由他校調入及新派教師、主任、校長(原校升任者除外)。<br />
　　　　　　(2)包括暑假及寒假異(調)動人數。<br />
※實缺教師：含調出未補、退休、資遣、辭職、兵役、借調(長期)、代實缺...等。<br />
※其他教師：係指重病、育嬰假、公假、進修、受訓、借調(短期)...等六個月以上之代理教師。<br />
</font>

<p>
<font color=blue>※三學年度教師編制人數合計<input type="text" size="3" name="total" value=<? echo $a+$b+$c;?> style="border:0px" readonly>人</font><br>
<!--1=今年，2=去年，3=前年-->
　-98學年度全校教師人數<input type="text" size="3" name="tnumber3" onChange="change3()" value="<? if($c == '') echo ''; else echo $c;?>"/> 人<br>
　-99學年度全校教師人數<input type="text" size="3" name="tnumber2" onChange="change2()" value="<? if($b == '') echo ''; else echo $b;?>"/> 人<br>
　-100學年度全校教師人數<input type="text" size="3" name="tnumber1" onChange="change1()" value="<? if($a == '') echo ''; else echo $a;?>"/> 人<br>
<br>
<font color=blue>※教師異動人數<input type="text" size="2" name="different" value=<? echo $d+$e+$f+$g+$h+$i ?> style="border:0px" readonly>人，代理人數<input type="text" size="2" name="different2" value=<? echo $g+$h+$i+$j+$k+$l ?> style="border:0px" readonly>人，教師流動率<input type="text" size="3" name="per" value=<? echo number_format(($d+$e+$f+$g+$h+$i)/($a+$b+$c)*100,2); ?> style="border:0px" readonly>%，實缺教師代理率<input type="text" size="3" name="per2" value=<? echo number_format(($g+$h+$i+$j+$k+$l)/($a+$b+$c)*100,2); ?> style="border:0px" readonly>%</font><br>
　-98學年度教師異動人數：<br />　　調入教師
<input type="text" size="3" name="ltnumber3" onChange="change6()" value="<? if($f == '') echo ''; else echo $f;?>"/>
人；實缺教師
<input type="text" size="3" name="ltnumber6" onchange="change9()" value="<? if($i == '') echo ''; else echo $i;?>"/>
人；其他教師
<input type="text" size="3" name="ltnumber9" onchange="change12()" value="<? if($l == '') echo ''; else echo $l;?>"/>人<br>
　-99學年度教師異動人數：<br />　　調入教師
<input type="text" size="3" name="ltnumber2" onChange="change5()" value="<? if($e == '') echo ''; else echo $e;?>"/>
人；實缺教師
<input type="text" size="3" name="ltnumber5" onchange="change8()" value="<? if($h == '') echo ''; else echo $h;?>"/>
人；其他教師
<input type="text" size="3" name="ltnumber8" onchange="change11()" value="<? if($k == '') echo ''; else echo $k;?>"/>人<br />
　-100學年度教師異動人數：<br />　　調入教師
<input type="text" size="3" name="ltnumber1" onChange="change4()" value="<? if($d == '') echo ''; else echo $d;?>"/>
人；實缺教師
<input type="text" size="3" name="ltnumber4" onchange="change7()" value="<? if($g == '') echo ''; else echo $g;?>"/>
人；其他教師
<input type="text" size="3" name="ltnumber7" onchange="change10()" value="<? if($j == '') echo ''; else echo $j;?>"/>人<br>

<script>
//全校教師合計更新
function numsum() { 
	var f = document.forms[0]; 
	f.total.value = (f.tnumber1.value==""?0:parseFloat(f.tnumber1.value)) + (f.tnumber2.value==""?0:parseFloat(f.tnumber2.value))+ (f.tnumber3.value==""?0:parseFloat(f.tnumber3.value)); 
}
//教師異動人數合計更新
function numsumdifferent1() { 
	var f = document.forms[0]; 
	f.different.value = (f.ltnumber1.value==""?0:parseFloat(f.ltnumber1.value)) + (f.ltnumber2.value==""?0:parseFloat(f.ltnumber2.value)) + (f.ltnumber3.value==""?0:parseFloat(f.ltnumber3.value)) + (f.ltnumber4.value==""?0:parseFloat(f.ltnumber4.value)) + (f.ltnumber5.value==""?0:parseFloat(f.ltnumber5.value)) + (f.ltnumber6.value==""?0:parseFloat(f.ltnumber6.value)); 
}
//代理教師人數合計更新
function numsumdifferent2() { 
	var f = document.forms[0]; 
	f.different2.value = (f.ltnumber4.value==""?0:parseFloat(f.ltnumber4.value)) + (f.ltnumber5.value==""?0:parseFloat(f.ltnumber5.value)) + (f.ltnumber6.value==""?0:parseFloat(f.ltnumber6.value)) + (f.ltnumber7.value==""?0:parseFloat(f.ltnumber7.value)) + (f.ltnumber8.value==""?0:parseFloat(f.ltnumber8.value)) + (f.ltnumber9.value==""?0:parseFloat(f.ltnumber9.value)); 
}
//流動率更新
function average() { 
	var f = document.forms[0]; 
	f.per.value = (((f.ltnumber1.value ==""?0:parseFloat(f.ltnumber1.value)) + (f.ltnumber2.value==""?0:parseFloat(f.ltnumber2.value)) + (f.ltnumber3.value==""?0:parseFloat(f.ltnumber3.value)) + (f.ltnumber4.value==""?0:parseFloat(f.ltnumber4.value)) + (f.ltnumber5.value==""?0:parseFloat(f.ltnumber5.value)) + (f.ltnumber6.value==""?0:parseFloat(f.ltnumber6.value))) / ((f.tnumber1.value==""?0:parseFloat(f.tnumber1.value)) + (f.tnumber2.value==""?0:parseFloat(f.tnumber2.value)) + (f.tnumber3.value==""?0:parseFloat(f.tnumber3.value))))*100;  
}
//代理率更新
function average2() { 
	var f = document.forms[0];
	f.per2.value = (((f.ltnumber4.value==""?0:parseFloat(f.ltnumber4.value)) + (f.ltnumber5.value==""?0:parseFloat(f.ltnumber5.value)) + (f.ltnumber6.value==""?0:parseFloat(f.ltnumber6.value)) + (f.ltnumber7.value==""?0:parseFloat(f.ltnumber7.value)) + (f.ltnumber8.value==""?0:parseFloat(f.ltnumber8.value)) + (f.ltnumber9.value==""?0:parseFloat(f.ltnumber9.value))) / ((f.tnumber1.value==""?0:parseFloat(f.tnumber1.value)) + (f.tnumber2.value==""?0:parseFloat(f.tnumber2.value)) + (f.tnumber3.value==""?0:parseFloat(f.tnumber3.value))))*100;
}
//教師編制人數更新
function change1() { 
	var f = document.forms[0]; 
	//f.tnumber1.value = f.tnumber1.value;  
	numsum();
	numsumdifferent1();
	numsumdifferent2();
	average();
	average2();	
}
function change2() { 
	var f = document.forms[0]; 
	//f.tnumber2.value = f.tnumber2.value; 
	numsum();
	numsumdifferent1();
	numsumdifferent2();
	average();
	average2();
}
function change3() { 
	var f = document.forms[0]; 
	//f.tnumber3.value = f.tnumber3.value; 
	numsum();
	numsumdifferent1();
	numsumdifferent2();
	average();
	average2();
} 
//調入更新
function change4() { 
	var f = document.forms[0]; 
	//f.tnumber1.value = f.tnumber1.value; 
	numsumdifferent1();
	average();
	average2();
}
function change5() { 
	var f = document.forms[0]; 
	//f.tnumber2.value = f.tnumber2.value; 
	numsumdifferent1();
	average();
	average2();
}
function change6() { 
	var f = document.forms[0]; 
	//f.tnumber3.value = f.tnumber3.value; 
	numsumdifferent1();
	average();
	average2();
}
//實缺更新
function change7() { 
	var f = document.forms[0]; 
	//f.tnumber4.value = f.tnumber4.value; 
	numsumdifferent1();
	numsumdifferent2();
	average();
	average2();
}
function change8() { 
	var f = document.forms[0]; 
	//f.tnumber5.value = f.tnumber5.value; 
	numsumdifferent1();
	numsumdifferent2();
	average();
	average2();
}
function change9() { 
	var f = document.forms[0]; 
	//f.tnumber6.value = f.tnumber6.value; 
	numsumdifferent1();
	numsumdifferent2();
	average();
	average2();
}
//其他更新
function change10() { 
	var f = document.forms[0]; 
	//f.tnumber4.value = f.tnumber4.value; 
	numsumdifferent2();
	average();
	average2();
}
function change11() { 
	var f = document.forms[0]; 
	//f.tnumber5.value = f.tnumber5.value; 
	numsumdifferent2();
	average();
	average2();
}
function change12() { 
	var f = document.forms[0]; 
	//f.tnumber6.value = f.tnumber6.value; 
	numsumdifferent2();
	average();
	average2();
}
</script>
<br>
--指標界定六-1：學校最近三學年度教師(含實缺代理)流動率，平均在30％以上<br>
--指標界定六-2：學校最近三學年度實缺教師代理比率，平均在30％以上<br><br />
  <INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
  <input type="submit" name="button" value="儲存並到下一頁" >

<!-- 檢查空值 -->
<script language="JavaScript">
  function toCheck() {
//	if (event.keyCode == 13) return false; //取得Enter Code
// onkeypress="if (event.keyCode == 13) return false;" //這段放在 input type="text" 之後
    if ( document.form.tnumber1.value == "" ) {
      alert("請填寫「今年全校教師人數」！");
      document.form.tnumber1.focus();
      return false;
    }
    if ( document.form.tnumber2.value == "" ) {
      alert("請填寫「去年全校教師人數」！");
      document.form.tnumber2.focus();
      return false;
    }
    if ( document.form.tnumber3.value == "" ) {
      alert("請填寫「前年全校教師人數」！");
      document.form.tnumber3.focus();
      return false;
    }
    if ( document.form.ltnumber1.value == "" ) {
      alert("請填寫「今年教師異動人數：調入」！");
      document.form.ltnumber1.focus();
      return false;
    }
    if ( document.form.ltnumber2.value == "" ) {
      alert("請填寫「去年教師異動人數：調入」！");
      document.form.ltnumber2.focus();
      return false;
    }
    if ( document.form.ltnumber3.value == "" ) {
      alert("請填寫「前年教師異動人數：調入」！");
      document.form.ltnumber3.focus();
      return false;
    }
    if ( document.form.ltnumber4.value == "" ) {
      alert("請填寫「今年教師異動人數：代理教師」！");
      document.form.ltnumber4.focus();
      return false;
    }
    if ( document.form.ltnumber5.value == "" ) {
      alert("請填寫「去年教師異動人數：代理教師」！");
      document.form.ltnumber5.focus();
      return false;
    }
    if ( document.form.ltnumber6.value == "" ) {
      alert("請填寫「前年教師異動人數：代理教師」！");
      document.form.ltnumber6.focus();
      return false;
    }
		
    return true;
  }
</script>   
<?php include "../xSchoolForm/print_button.php"; ?>
</form>

<!--<a href="./download/指標6_教師流動率調查表.xls">下載：教師流動率調查表空白表格</a>

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
	$file_1 = $row[5];
}
?>
  <form action="file_ok.php" method="post" enctype="multipart/form-data" target="_self">
    <input type="hidden" name="max_file_size" value="102400000">
    <input type="hidden" name="table" value="p_6">
    <input type="file" name="myfile">
    <input type="submit" value="上傳近三年教師異動名冊">
<br /><? if ($file_1 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_1.'" target="_new">'.$file_1.'</a>';}?>
</form>
<br>※無論上傳檔名為何，系統會自動將檔名編碼為：年度_學校代號_文件編號.副檔名
<br>　例如：彰化縣民生國小代碼：074602
<br>　上傳後的檔案名稱為：101_074602_p1.xls(或.doc)
</div>
-->
<?php
include "../../footer.php";
?>