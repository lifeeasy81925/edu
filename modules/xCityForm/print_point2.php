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

$sql_school = "select  account, school, class  from edu_school where account like '$school'";
$result_school = mysql_query($sql_school);
  while($row = mysql_fetch_row($result_school)) {
            $school_name = $row[1];
			$class = $row[2];
			}
if($class == '1' ){			
	$sql = "select  *  from  100element_point12 where account like '$school'";
	$basedata="100element_basedata"; //載入學校基本資料用
}
else{
	$sql = "select  *  from  100junior_point12 where account like '$school'";
	$basedata="100junior_basedata"; //載入學校基本資料用
}

$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
        {
			$a = $row[2];//低收 
			$b = $row[3];//隔代
			$c = $row[4];//親子差距
			$d = $row[5];//新移民
			$e = $row[6];//abcde
			$f = $row[7];//abcde原住民
			$g = $row[8];//單親 		 
        }
// 載入學校基本資料
$sqlbasedata = "select  *  from ".$basedata." where account like '$school'";
$result = mysql_query($sqlbasedata);
while($row = mysql_fetch_row($result)){
	$db_allstudent = $row[2]; //讀allstudent
}		
	echo '<br>審查學校代號：';
	echo $school.'--';
	echo '<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.$school_name.'</font>';
	echo '<br>全校學生數為<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.$db_allstudent.'</font>人'.'<br>';
		
//記錄輸入過的資料
	if($class == '1' ){
			$basedata="100element_point";
	}
	else{
			$basedata="100junior_point";
		}			
$sql_examine = "select  *  from ".$basedata." where account like '$school'";
$result_examine = mysql_query($sql_examine);
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="point_examined.php" onSubmit="return toCheck();">
<p><font color="blue"><strong>指標二</strong></font>
<p>
  &nbsp;•A.低收入學生數&nbsp;
<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $a; ?></font> 人
    <br>
&nbsp;•B.隔代教養學生數
&nbsp;&nbsp;
<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $b; ?></font> 人
<br>
&nbsp;•C.親子年齡差距45歲以上學生數
&nbsp;&nbsp;&nbsp;<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $c; ?></font> 人
<br>
&nbsp;•D.新移民子女學生數
&nbsp;
<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $d; ?></font> 人
<br>
&nbsp;•E.單親家庭學生數&nbsp;
<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $g; ?></font> 人
<br>
<br>
&nbsp;•A + B + C + D + E ,學生數合計<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $e; ?></font> 人<br>
　占全校學生數比率為<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">
<?echo number_format($e/$db_allstudent*100,2);?>%</font>
<br><br>

&nbsp;•A + B + C + D + 原住民學生數   ,合計<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $f; ?></font> 人<br>
　占全校學生數比率為<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">
<?echo number_format($f/$db_allstudent*100,2);?>%</font>
<br><br>
　　-指標界定二-1 A+B+C+D+E 學生合計人數佔全校學生總數達20%以上<br>
　　-指標界定二-2 A+B+C+D+E 學生人數合計達60人以上 <br>
　　-指標界定二-3 原住民學生人數未符合指標1-1、1-2、1-3，但 A+B+C+D+E+原住民學生 合計人數佔全校學生總數30%以上者
<p>
<?
//讀取上傳檔案資料
if($class == '1' ){			
	$sql = "select  *  from   100element_upload_name where account like '$school'";
}else{
	$sql = "select  *  from   100junior_upload_name where account like '$school'";
}
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$file_1 = $row[2];
	$file_1_name = ' (各類學生名冊)';
}
//列出狀態訊息
if ($file_1 == ''){echo "檔案狀態：<font color=red>未上傳".$file_1_name."</font>";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/101/'.$school.'/'.$file_1.'" target="_new">'.$file_1.$file_1_name.'</a>';}
?>
<p>
<?
while($row = mysql_fetch_row($result_examine))
        {		$pass = $row[16];
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
<input type="hidden" name="point2"  value="<? echo "point2"; ?>">
<label>
	<input type="radio" name="point2_pass"  value="1" id="1" <? if ($pass == '1') echo 'checked';?>/>
    審核通過</label>
<label>
    <input type="radio" name="point2_pass"  value="2" id="2" <? if ($pass == '2') echo 'checked';?>/>
    審核不通過且列入退件名單</label>

<br><br>
    <INPUT TYPE="button" VALUE="返回(取消)" onClick="history.go(-1)">
	<input type="submit" name="button" value="　　確認　　" />

<!-- 檢查空值 -->
<script language="JavaScript">
  function toCheck() {
    if ( document.form.lowincome.value == "" ) {
      alert("請填寫「低收入學生數」！");
      document.form.lowincome.focus();
      return false;
    }
    if ( document.form.noparent.value == "" ) {
      alert("請填寫「隔代教養學生數」！");
      document.form.noparent.focus();
      return false;
    }
    if ( document.form.difference.value == "" ) {
      alert("請填寫「親子年齡差距45歲以上學生數」！");
      document.form.difference.focus();
      return false;
    }
    if ( document.form.immigrant.value == "" ) {
      alert("請填寫「新移民子女學生數」！");
      document.form.immigrant.focus();
      return false;
    }
    if ( document.form.single.value == "" ) {
      alert("請填寫「單親家庭學生數」！");
      document.form.single.focus();
      return false;
    }
    if ( document.form.abcd.value == "" ) {
      alert("請填寫「A + B + C + D + E 學生數」！");
      document.form.abcd.focus();
      return false;
    }
    if ( document.form.abcde.value == "" ) {
      alert("請填寫「A + B + C + D + 原住民學生數」！");
      document.form.abcde.focus();
      return false;
    }
    if ( document.form.abcd.value > <? echo $db_allstudent;?> ) {
      alert('「A + B + C + D + E 學生數」不得大於學生總數！\n'+'學生總數：'+<? echo $db_allstudent;?>);
      document.form.abcd.focus();
      return false;
    }
    if ( document.form.abcde.value > <? echo $db_allstudent;?> ) {
      alert('請填寫「A + B + C + D + 原住民學生」不得大於學生總數！\n'+'學生總數：'+<? echo $db_allstudent;?>);
      document.form.abcde.focus();
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