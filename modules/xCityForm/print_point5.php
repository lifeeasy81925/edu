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
$sql = "select  *  from  100element_point345 where account like '$school'";
}
else{
$sql = "select  *  from  100junior_point345 where account like '$school'";
}

$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
        {
			$school_area_0 = $row[4];// 
			$school_area_1 = $row[5];//
			$school_area_2 = $row[6];//
			$school_area_3 = $row[7];//
			$school_area_4 = $row[8];//
			$school_area_5 = $row[9];//
			$school_area_6 = $row[10];//
        }
	echo '<br>審查學校代號：';
	echo $school.'--';
	echo '<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.$school_name.'</font>';
	
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
<p><font color="blue"><strong>指標五</strong></font>
<p>
※ 學校所在地區
<p><font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? if ($school_area_0=='1') echo '離島';?></font><br>
  <font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? if ($school_area_1=='1') echo '學校所在地區，無公共交通工具到達者';?></font><br>
  <font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? if ($school_area_2=='1') echo '學校距離公共交通工具站牌，達五公里以上者';?></font><br>
  <font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? if ($school_area_3=='1') echo '學區內之社區距離學校5公里以上，且無公共交通工具可抵達學校者';?></font><br>
  <font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? if ($school_area_4=='1') echo '公共交通工具到學校所在地區每天少於4班次者';?></font><br>
  <font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? if ($school_area_5=='1') echo '91學年度(91年8月1日)以前，因裁併校後，學區幅員遼闊須交通車接送學生上下學之學校';?></font><br>
  <font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? if ($school_area_6=='1') echo '本校完全不符合偏鄉之各項條件';?></font><br>
<?
while($row = mysql_fetch_row($result_examine))
        {		$pass = $row[19];
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
  <input type="hidden" name="point5"  value="<? echo 'point5'; ?>">
  <label>
    <input type="radio" name="point5_pass"  value="1" id="1" <? if ($pass == '1') echo 'checked';?>/>
    審核通過</label>
  <label>
    <input type="radio" name="point5_pass"  value="2" id="2" <? if ($pass == '2') echo 'checked';?>/>
    審核不通過且列入退件名單</label>
  
  <br><br>
  <INPUT TYPE="button" VALUE="返回(取消)" onClick="history.go(-1)">
  <input type="submit" name="button" value="　　確認　　" />
  
  <!-- 檢查空值 -->
  <script language="JavaScript">
function toCheck() {
	//檢驗是否核選
	var check01 = (document.form.school_area_0.checked || document.form.school_area_1.checked || document.form.school_area_2.checked ||document.form.school_area_3.checked || document.form.school_area_4.checked || document.form.school_area_5.checked || document.form.school_area_6.checked);
//	alert(check01);
	if ( !check01 ) {
		alert('請勾選「學校所在地區」！\n若無請勾選「以上皆沒有」。');
		document.form.school_area_6.focus();
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

</form>

<?php
include "../../footer.php";
?>