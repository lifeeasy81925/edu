<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
include "./checkdate.php";
?>

<?
//學校名稱 
if($class == '1' ){
			$basedata="100element_basedata";
	}
	else{
			$basedata="100junior_basedata";
		}			
$sql_school = "select  *  from ".$basedata." where account like '$username'";
$result_school = mysql_query($sql_school);
while($row = mysql_fetch_row($result_school))
        {
                 $school = $row[1];//學校名稱
        }
?>
<?
//審核金錢
//意見審核			
$sql = "select  *  from 100junior_basedata where account = '$username'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
        {		
			$allstudent = $row[2];
			$class = $row[3];
			$c1 = $row[4];
			$c2 = $row[5];
			$c3 = $row[6];			
			$c4 = $row[7]; 
			$area = $row[8];
			$for_a8r1_1 = $row[11];
			$for_a8r1_2 = $row[12];
			$for_a8r1_3 = $row[13];
        }
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<a href="school_index.php">返回申請首頁</a>
<form name="form" method="post" action="basedata_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><font color="blue"><strong>學校班級學生資料</strong></font>
<p>
※全校學生人數
    <input type="text" size="6" name="allstudent" value="<? if( $allstudent=='') echo ''; else echo $allstudent;?>"/>
    人 <font color=blue>(以9月30日在籍學生數為準)</font><br><br>
　　全校班級數
    <input type="text" size="6" name="classes" value="<? if( $class=='') echo ''; else echo $class;?>"/> 
    班<br><br>
　　　　一年級
    <input type="text" size="6" name="FirstGrade" value="<? if( $c1=='') echo ''; else echo $c1;?>"/> 
    班<br>
　　　　二年級
    <input type="text" size="6" name="TwoGrade" value="<? if( $c2=='') echo ''; else echo $c2;?>"/> 
    班<br>
　　　　三年級
    <input type="text" size="6" name="ThirdGrade" value="<? if( $c3=='') echo ''; else echo $c3;?>"/> 
    班<br>
　　　　特殊班
    <input type="text" size="6" name="special" value="<? if( $c4=='') echo ''; else echo $c4;?>"/> 
    班
<p>※學校區域（單選）<br />
    <label>
　　<input type="radio" name="area" value="area_0" id="area_0" <? if($area =='area_0') echo 'checked';?>/>
離島</label><br>
    <label>
　　<input type="radio" name="area" value="area_1" id="area_1" <? if($area =='area_1') echo 'checked';?>/>
偏遠及特偏</label><br>
    <label>
　　<input type="radio" name="area" value="area_2" id="area_2" <? if($area =='area_2') echo 'checked';?>/>
一般地區</label><br>
    <label>
　　<input type="radio" name="area" value="area_3" id="area_3" <? if($area =='area_3') echo 'checked';?>/>
都會地區</label>
</p>
<p>※85-91年度是否曾獲本計畫補助興建學校社區化活動場所經費（單選）<br />
<label><input type="radio" name="for_a8r1_1" value="1" id="1" <? if($for_a8r1_1 == '1') echo 'checked';?>/>否：<font color=blue>85-91年度未曾獲上述項目補助者不得申請該項目維修經費（補助項目八）</font></label>
<br>
<label><input type="radio" name="for_a8r1_1" value="2" id="2" <? if($for_a8r1_1 == '2') echo 'checked';?>/>是：<input type="text" size="2" name="for_a8r1_2" value="<? if( $for_a8r1_2 == '') echo ''; else echo $for_a8r1_2;?>">年度曾獲補助<font color=blue>綜合球場</font>經費<input type="text" size="6" name="for_a8r1_3" value="<? if( $for_a8r1_3 == '') echo ''; else echo $for_a8r1_3;?>">元<!--<font color=blue>（擇最近年度填寫）</font>-->
</label><br>
</p>
<INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
<input type="submit" name="button" value="儲存並到下一頁" />
    
<!-- 檢查空值 及 資料驗證 -->
<script language="JavaScript">
  function toCheck() {
    if ( document.form.allstudent.value == "" ) {
      alert("請填寫「全校學生人數」！");
      document.form.allstudent.focus();
      return false;
    }
    if ( document.form.classes.value == "" ) {
      alert("請填寫「全校班級數」！");
      document.form.classes.focus();
      return false;
    }
    if ( document.form.FirstGrade.value == "" ) {
      alert("請填寫「一年級」班數！");
      document.form.FirstGrade.focus();
      return false;
    }
    if ( document.form.TwoGrade.value == "" ) {
      alert("請填寫「二年級」班數！");
      document.form.TwoGrade.focus();
      return false;
    }
    if ( document.form.ThirdGrade.value == "" ) {
      alert("請填寫「三年級」班數！");
      document.form.ThirdGrade.focus();
      return false;
    }
    if ( document.form.special.value == "" ) {
      alert("請填寫「特殊班」班數！");
      document.form.special.focus();
      return false;
    }
	// 驗證全校班級數與班級加總
    if ( parseInt(document.form.classes.value,10) != parseInt(parseInt(document.form.FirstGrade.value,10) + parseInt(document.form.TwoGrade.value,10) + parseInt(document.form.ThirdGrade.value,10) + parseInt(document.form.special.value,10),10)) {
      alert('「全校班級數」與加總不符！\n'+'全校班級數：'+parseInt(document.form.classes.value,10)+'\n'+'加總班級數：'+parseInt(parseInt(document.form.FirstGrade.value,10) + parseInt(document.form.TwoGrade.value,10) + parseInt(document.form.ThirdGrade.value,10) + parseInt(document.form.special.value,10),10));
      document.form.classes.focus();
      return false;
    }	
	// 檢查是否勾選area	  
	if ( document.form.area[0].checked ) {
		var area = 'area_0';
	} else if ( document.form.area[1].checked ){
		var area = 'area_1';
	} else if ( document.form.area[2].checked ){
		var area = 'area_2';
	} else if ( document.form.area[3].checked ){
		var area = 'area_3';
	} else {
		alert("請點選「學校區域」！");
    	document.form.area[2].focus();
    	return false;
	}
	// 檢查是否勾選a8r1	  
	if ( document.form.for_a8r1_1[0].checked ) {
		var for_a8r1_1 = 1;
	} else if ( document.form.for_a8r1_1[1].checked ){
		var for_a8r1_1 = 2;
	} else {
		alert("請點選「是否曾獲該項補助」！");
    	document.form.for_a8r1_1[0].focus();
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
    <br />
  </p>
</form>
<?php
include "../../footer.php";
?>