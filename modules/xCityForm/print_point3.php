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

if($class == '1'){
$sql_school = "select  * from edu_school, 100element_basedata where edu_school.account=100element_basedata.account and edu_school.account like '$school'";
}
else{
$sql_school = "select  * from edu_school, 100junior_basedata where edu_school.account=100junior_basedata.account and edu_school.account like '$school'";
}
$result_school = mysql_query($sql_school);
  while($row = mysql_fetch_row($result_school)) {
            $school_name = $row[2];
			$class = $row[3];
			$db_allstudent = $row[7];
			}
if($class == '1' ){			
$sql = "select  *  from  100element_point345 where account like '$school'";
}
else{
$sql = "select  *  from  100junior_point345 where account like '$school'";
}
$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
        {
			$a = $row[1]; //
			$b = $row[2]; // 
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
<p><font color="#0000FF"><strong>指標三</strong></font>
<p>
  	•去(99)學年度國三畢業生人數
    <font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $a; ?></font> 人<br><br />
	•第一次學測成績PR值≦25學生數
    <font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $b; ?></font> 人<br><br />
　-指標界定三 第一次基本學力測驗總成績百分等級(PR值)在25以下之學生人數佔畢業生總數達40％以上<br><br>

<?
while($row = mysql_fetch_row($result_examine))
        {		$pass = $row[17];
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
<input type="hidden" name="point3"  value="<? echo 'point3'; ?>">
<label>
	<input type="radio" name="point3_pass"  value="1" id="1" <? if ($pass == '1') echo 'checked';?>/>
    審核通過</label>
<label>
    <input type="radio" name="point3_pass"  value="2" id="2" <? if ($pass == '2') echo 'checked';?>/>
    審核不通過且列入退件名單</label>

<br><br>
    <INPUT TYPE="button" VALUE="返回(取消)" onClick="history.go(-1)">
	<input type="submit" name="button" value="　　確認　　" />

<!-- 檢查空值 -->
<script language="JavaScript">
  function toCheck() {
    if ( document.form.graduate.value == "" ) {
      alert("請填寫「去年畢業學生數」！");
      document.form.graduate.focus();
      return false;
    }
    if ( document.form.pr.value == "" ) {
      alert("請填寫「第一次學測成績PR值≦25學生數」！");
      document.form.pr.focus();
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