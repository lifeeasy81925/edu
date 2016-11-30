<?php
include "../../mainfile.php";
include "../../header.php";
session_start();
?>
<INPUT TYPE="button" VALUE="回前頁" onClick="history.go(-1)">
<?
$username = $xoopsUser->getVar('uname');
global $xoopsDB;
$sql_city = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
$result_city = $xoopsDB -> query($sql_city) or die($sql_city);
while($row = mysql_fetch_row($result_city)) {
	$city = $row[1];
	$cityman = $row[2];
	$examine = $row[3];
	$cityno = $row[4];
}
echo $username;
echo $city;
echo $cityman;
include "./checkdate.php";
$school = $_GET["id"];
//$datetime = date ("Y" , mktime(date('Y'))) ;

$sql_school = "select  account, school, class  from edu_school where account like '$school'";
$result_school = mysql_query($sql_school);
while($row = mysql_fetch_row($result_school)){
	$school_name = $row[1];
	$class = $row[2];
}
if($class == '1' ){			
	$sql = "select  *  from  100element_point6 where account like '$school'";
}else{
	$sql = "select  *  from  100junior_point6 where account like '$school'";
}

$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$a = $row[1];	//100年教師
	$b = $row[2];	//99教師
	$c = $row[3];	//98教師
	$d = $row[4];	//100調入
	$e = $row[5];	//99調入
	$f = $row[6];	//98調入
	$g = $row[7];	//100實缺
	$h = $row[8];	//99實缺
	$i = $row[9];	//98實缺
	$j = $row[10];	//100其他
	$k = $row[11];	//99其他
	$l = $row[12];	//98其他
}
echo '<br>審查學校代號：';
echo $school.'--';
echo '<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.$school_name.'</font>';
	
//記錄輸入過的資料
if($class == '1' ){
	$basedata="100element_point";
}else{
	$basedata="100junior_point";
}			
$sql_examine = "select  *  from ".$basedata." where account like '$school'";
$result_examine = mysql_query($sql_examine);
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="point_examined.php" onSubmit="return toCheck();">
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
※ 三年度全校教師人數合計<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $a+$b+$c;?></font>人<br>
<!--1=今年，2=去年，3=前年-->
　-98學年度全校教師人數<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $c; ?></font> 人<br>
　-99學年度全校教師人數<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $b; ?></font> 人<br>
　-100學年度全校教師人數<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $a; ?></font> 人<br><br>
※教師異動人數<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $d+$e+$f+$g+$h+$i ?></font>人，代理人數<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $g+$h+$i+$j+$k+$l ?></font>人，<font color=blue>流動率<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format(($d+$e+$f+$g+$h+$i)/($a+$b+$c)*100,2); ?>%</font>，代理率<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format(($g+$h+$i+$j+$k+$l)/($a+$b+$c)*100,2); ?>%</font></font><br>
　-98學年度教師異動人數：調入教師<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $f; ?></font>人；實缺教師<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $i; ?></font>人；其他教師<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $l; ?></font>人<br />
　-99學年度教師異動人數：調入教師<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $e; ?></font>人；實缺教師<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $h; ?></font>人；其他教師<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $k; ?></font>人<br />
　-100學年度教師異動人數：調入教師<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $d; ?></font>人；實缺教師<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $g; ?></font>人；其他教師<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $j; ?></font>人<br />
  <script>
//全校教師合計更新
function numsum() { 
	var f = document.forms[0]; 
	f.total.value = (f.tnumber1.value==""?0:parseFloat(f.tnumber1.value)) + (f.tnumber2.value==""?0:parseFloat(f.tnumber2.value))+ (f.tnumber3.value==""?0:parseFloat(f.tnumber3.value)); 
}
//教師異動人數合計更新
function numsumdifferent() { 
	var f = document.forms[0]; 
	f.different.value = (f.ltnumber1.value==""?0:parseFloat(f.ltnumber1.value)) + (f.ltnumber2.value==""?0:parseFloat(f.ltnumber2.value))+ (f.ltnumber3.value==""?0:parseFloat(f.ltnumber3.value))+ (f.ltnumber4.value==""?0:parseFloat(f.ltnumber4.value))+ (f.ltnumber5.value==""?0:parseFloat(f.ltnumber5.value))+ (f.ltnumber6.value==""?0:parseFloat(f.ltnumber6.value)); 
}
//流動率更新
function average() { 
	var f = document.forms[0]; 
	f.per.value = parseInt((((f.ltnumber1.value==""?0:parseFloat(f.ltnumber1.value)) + (f.ltnumber2.value==""?0:parseFloat(f.ltnumber2.value))+ (f.ltnumber3.value==""?0:parseFloat(f.ltnumber3.value))+ (f.ltnumber4.value==""?0:parseFloat(f.ltnumber4.value))+ (f.ltnumber5.value==""?0:parseFloat(f.ltnumber5.value))+ (f.ltnumber6.value==""?0:parseFloat(f.ltnumber6.value)))/((f.tnumber1.value==""?0:parseFloat(f.tnumber1.value)) + (f.tnumber2.value==""?0:parseFloat(f.tnumber2.value))+ (f.tnumber3.value==""?0:parseFloat(f.tnumber3.value))))*100);  
}
//代理率更新
function average2() { 
	var f = document.forms[0]; 
	f.per2.value = parseInt((((f.ltnumber4.value==""?0:parseFloat(f.ltnumber4.value))+ (f.ltnumber5.value==""?0:parseFloat(f.ltnumber5.value))+ (f.ltnumber6.value==""?0:parseFloat(f.ltnumber6.value)))/((f.tnumber1.value==""?0:parseFloat(f.tnumber1.value)) + (f.tnumber2.value==""?0:parseFloat(f.tnumber2.value))+ (f.tnumber3.value==""?0:parseFloat(f.tnumber3.value))))*100);  
}

function change1() { 
	var f = document.forms[0]; 
	//f.tnumber1.value = f.tnumber1.value;  
	numsum();
	average();
	average2();	
}
function change2() { 
	var f = document.forms[0]; 
	//f.tnumber2.value = f.tnumber2.value; 
	numsum();
	average();
	average2();
}
function change3() { 
	var f = document.forms[0]; 
	//f.tnumber3.value = f.tnumber3.value; 
	numsum();
	average();
	average2();
} 


function change4() { 
	var f = document.forms[0]; 
	//f.tnumber1.value = f.tnumber1.value; 
	numsumdifferent();
	average();
	average2();
}
function change5() { 
	var f = document.forms[0]; 
	//f.tnumber2.value = f.tnumber2.value; 
	numsumdifferent();
	average();
	average2();
}
function change6() { 
	var f = document.forms[0]; 
	//f.tnumber3.value = f.tnumber3.value; 
	numsumdifferent();
	average();
	average2();
}
function change7() { 
	var f = document.forms[0]; 
	//f.tnumber4.value = f.tnumber4.value; 
	numsumdifferent();
	average();
	average2();
}
function change8() { 
	var f = document.forms[0]; 
	//f.tnumber5.value = f.tnumber5.value; 
	numsumdifferent();
	average();
	average2();
}
function change9() { 
	var f = document.forms[0]; 
	//f.tnumber6.value = f.tnumber6.value; 
	numsumdifferent();
	average();
	average2();
}
</script>
<br>
--指標界定六-1：學校最近三學年度教師(含實缺代理)流動率，平均在30％以上<br>
--指標界定六-2：學校最近三學年度實缺教師代理比率，平均在30％以上
<p>
<!--
<?
//讀取上傳檔案資料
if($class == '1' ){			
	$sql = "select  *  from   100element_upload_name where account like '$school'";
}else{
	$sql = "select  *  from   100junior_upload_name where account like '$school'";
}
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$file_1 = $row[5];
	$file_1_name = ' (近三年教師異動名冊)';
}
//列出狀態訊息
if ($file_1 == ''){echo "檔案狀態：<font color=red>未上傳".$file_1_name."</font>";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/101/'.$school.'/'.$file_1.'" target="_new">'.$file_1.$file_1_name.'</a>';}
?>
-->
<p>
<?
while($row = mysql_fetch_row($result_examine))
        {		$pass = $row[20];
				$suggestion1 = $row[21];//教育局
				$suggestion2 = $row[22];//教育部	
}
 if($examine == '2') {
 echo '•縣市審核意見說明:'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.$suggestion1.'</font><br>';
 }
 ?>
•不通過理由:<textarea name="other" cols="30" rows="2">
<? if($examine == '1'){ echo $suggestion1;}
else {
	echo $suggestion2;
	}
?>
</textarea> <br><br>
<input type="hidden" name="sid"  value="<? echo $school; ?>">
<input type="hidden" name="point6"  value="<? echo 'point6'; ?>">
<label>
	<input type="radio" name="point6_pass"  value="1" id="1" <? if ($pass == '1') echo 'checked';?>/>
    審核通過</label>
<label>
    <input type="radio" name="point6_pass"  value="2" id="2" <? if ($pass == '2') echo 'checked';?>/>
    審核不通過且列入退件名單</label>

<br><br>
    <INPUT TYPE="button" VALUE="返回(取消)" onClick="history.go(-1)">
	<input type="submit" name="button" value="　　確認　　" />

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


<!--SCRIPT開始--> <!--webbot bot="HTMLMarkup" StartSpan --> 
<SCRIPT Language="Javascript"> 
/* 
This script is written by Eric (Webcrawl@usa.net) 
For full source code, installation instructions, 
100's more DHTML scripts, and Terms Of 
Use, visit dynamicdrive.com 
*/ 

function printit(){ 
if (NS) { 
window.print() ; 
} else { 
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>'; 
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); 
WebBrowser1.ExecWB(6, 2);//Use a 1 vs. a 2 for a prompting dialog box WebBrowser1.outerHTML = ""; 
} 
} 
      </script> 
      <SCRIPT Language="Javascript"> 
var NS = (navigator.appName == "Netscape"); 
var VERSION = parseInt(navigator.appVersion); 
if (VERSION > 3) { 
document.write('<form><input type=button value="列印本頁" name="Print" onClick="printit()"></form>'); 
} 
      </script> 
  <!--webbot BOT="HTMLMarkup" endspan --> <!--SCRIPT結束-->
  </p>
</form>

<?php
include "../../footer.php";
?>