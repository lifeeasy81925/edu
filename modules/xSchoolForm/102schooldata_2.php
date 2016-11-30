<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
include "./checkdate.php";
include "./checkmail.php";

$datetime = date ("Y" , mktime(date('Y'))) ; 
		
$sql = "select  *  from 102schooldata where account like '$username'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$id = $row[0]; //帳號
	$type = $row[1]; //學校型態
	$city = $row[2]; //縣市
	$district = $row[4]; //區
	$school = $row[5]; //學校名稱
	$area = $row[109]; //學校所在區域
	$laststudent = $row[26];
	$allstudent = $row[100];
	$class = $row[101];
	$c1 = $row[102];
	$c2 = $row[103];
	$c3 = $row[104];			
	$c4 = $row[105];
	$c5 = $row[106];
	$c6 = $row[107];
	$c7 = $row[108];
	$lastgrad = $row[122];

	$a = $row[135]; //101編制
	$b = $row[60]; //100編制
	$c = $row[59]; //99編制
	$d = $row[138]; //101調入
	$e = $row[137]; //100調入
	$f = $row[62]; //99調入
	$g = $row[141]; //101實缺
	$h = $row[140]; //100實缺
	$i = $row[65]; //99實缺
	$j = $row[144]; //101其他
	$k = $row[143]; //100其他
	$l = $row[68]; //99其他
	
	$a147 = $row[147]; //學校資料頁面一檢核說明
	$a148 = $row[148]; //學校資料頁面二檢核說明
	$a149 = $row[149]; //學校資料頁面三檢核說明
	$a189 = $row[189]; //學校資料頁面一檢核項目
	$a190 = $row[190]; //學校資料頁面二檢核項目
	$a191 = $row[191]; //學校資料頁面三檢核項目
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="回上一頁" onclick="history.go(-1)">

<form name="form" method="post" action="102schooldata_2_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><font color="blue"><strong>學校教師資料</strong></font>
<font color=brown>
<p style="margin-left: 2em; text-indent: -1em">
※教師編制人數：含校長、主任、普通班及特殊班教師數【不含幼稚園(班)教師】。</p>
<p style="margin-left: 2em; text-indent: -1em">
※調入教師：<br />
(1)指由他校調入及新派教師、主任、校長(原校升任者除外)。<br />
(2)包括暑假及寒假異(調)動人數。<br />
<p style="margin-left: 2em; text-indent: -1em">
※實缺教師：含調出未補、退休、資遣、辭職、兵役、借調(長期)、代實缺...等。</p>
<p style="margin-left: 2em; text-indent: -1em">
※其他教師：係指重病、育嬰假、公假、進修、受訓、借調(短期)...等六個月以上之代理教師。<b>不含鐘點代課教師。</b></p>
</font>
<p>
<font color=blue>
一、最近三學年度教師編制合計：<input type="text" size="3" name="total" value=<? echo $a+$b+$c;?> style="border:0px" readonly>人</font><br>
※ 99學年度全校教師編制人數：<input type="text" size="3" name="tnumber3" onChange="change3()" value="<? if($c == '') echo ''; else echo $c;?>" style="border:0px" readonly> 人 <em><sup>(註2)</sup></em><br>
※100學年度全校教師編制人數：<input type="text" size="3" name="tnumber2" onChange="change2()" value="<? if($b == '') echo ''; else echo $b;?>" style="border:0px" readonly> 人 <em><sup>(註2)</sup></em><br>
※101學年度全校教師編制人數：<input type="text" size="3" name="tnumber1" onChange="change1()" value="<? if($a == '') echo ''; else echo $a;?>"> 人<br><br>
<font color=blue>二、教師異動人數：<input type="text" size="2" name="different" value=<? echo $d+$e+$f+$g+$h+$i ?> style="border:0px" readonly>人，代理教師人數：<input type="text" size="2" name="different2" value=<? echo $g+$h+$i+$j+$k+$l ?> style="border:0px" readonly>人<br />
　　教師流動率：<input type="text" size="2" name="per" value=<? echo number_format(($d+$e+$f+$g+$h+$i)/($a+$b+$c)*100,2); ?> style="border:0px" readonly>%，實缺教師代理率：<input type="text" size="2" name="per2" value=<? echo number_format(($g+$h+$i+$j+$k+$l)/($a+$b+$c)*100,2); ?> style="border:0px" readonly>%</font><br>
※ 99學年度教師異動人數：<br />　　調入教師<input type="text" size="3" name="ltnumber3" onChange="change6()" value="<? if($f == '') echo ''; else echo $f;?>"  style="border:0px" readonly>人；實缺教師<input type="text" size="3" name="ltnumber6" onchange="change9()" value="<? if($i == '') echo ''; else echo $i;?>"  style="border:0px" readonly>人；其他教師<input type="text" size="3" name="ltnumber9" onchange="change12()" value="<? if($l == '') echo ''; else echo $l;?>"  style="border:0px" readonly>人 <em><sup>(註2)</sup></em><br>
※100學年度教師異動人數：<br />　　調入教師<input type="text" size="3" name="ltnumber2" onChange="change5()" value="<? if($e == '') echo ''; else echo $e;?>"/>人；實缺教師<input type="text" size="3" name="ltnumber5" onchange="change8()" value="<? if($h == '') echo ''; else echo $h;?>"/>人；其他教師<input type="text" size="3" name="ltnumber8" onchange="change11()" value="<? if($k == '') echo ''; else echo $k;?>"/>人<br />
※101學年度教師異動人數：<br />　　調入教師<input type="text" size="3" name="ltnumber1" onChange="change4()" value="<? if($d == '') echo ''; else echo $d;?>"/>人；實缺教師<input type="text" size="3" name="ltnumber4" onchange="change7()" value="<? if($g == '') echo ''; else echo $g;?>"/>人；其他教師<input type="text" size="3" name="ltnumber7" onchange="change10()" value="<? if($j == '') echo ''; else echo $j;?>"/>人<br>
<br />
<sup><em>註1：資料為縣市政府提供</em></sup><br />
<sup><em>註2：資料為貴校去年填報</em></sup>
<!--檢核警示訊息-->
<div id="alert" style="display:<? if($a148=="") echo 'none';?>;">
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" style="background-color:#FC9">資料檢核警示訊息視窗</td>
  </tr>
  <tr>
    <td>
<font color="#FF0000">警示訊息：<textarea name="a190" cols=70% rows="2" style="border:0px; text-align: left;" readonly><? if( $a190=="") echo ""; else echo $a190;?></textarea>

※若確定填寫無誤，請說明異動過大原因：(若未填寫，無法「儲存並到下一頁」)<br />
<textarea name="a148" cols=70% rows="2"><? if( $a148=="") echo ""; else echo $a148;?></textarea>
    </td>
  </tr>
</table>
</div>
<br />
  <INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
  <input type="submit" name="button" value="儲存並到下一頁" >

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
<!-- 檢查空值 -->
<script language="JavaScript">
function toCheck() 
{
//	if (event.keyCode == 13) return false; //取得Enter Code
// onkeypress="if (event.keyCode == 13) return false;" //這段放在 input type="text" 之後
	var flag = 1;
	var errmsg = "";
	
	if ( document.form.tnumber1.value == "" ) 
	{
		errmsg += "請填寫「今年全校教師人數」！\n";
		document.form.tnumber1.focus();
		flag = 0;
	}
	if ( document.form.tnumber2.value == "" ) 
	{
		errmsg += "請填寫「去年全校教師人數」！\n";
		document.form.tnumber2.focus();
		flag = 0;
	}
	if ( document.form.tnumber3.value == "" ) 
	{
		errmsg += "請填寫「前年全校教師人數」！\n";
		document.form.tnumber3.focus();
		flag = 0;
	}
	if ( document.form.ltnumber1.value == "" ) 
	{
		errmsg += "請填寫「今年教師異動人數：調入」！\n";
		document.form.ltnumber1.focus();
		flag = 0;
	}
	if ( document.form.ltnumber2.value == "" ) 
	{
		errmsg += "請填寫「去年教師異動人數：調入」！\n";
		document.form.ltnumber2.focus();
		flag = 0;
	}
	if ( document.form.ltnumber3.value == "" ) 
	{
		errmsg += "請填寫「前年教師異動人數：調入」！\n";
		document.form.ltnumber3.focus();
		flag = 0;
	}
	if ( document.form.ltnumber4.value == "" ) 
	{
		errmsg += "請填寫「今年教師異動人數：代理教師」！\n";
		document.form.ltnumber4.focus();
		flag = 0;
	}
	if ( document.form.ltnumber5.value == "" ) 
	{
		errmsg += "請填寫「去年教師異動人數：代理教師」！\n";
		document.form.ltnumber5.focus();
		flag = 0;
	}
	if ( document.form.ltnumber6.value == "" ) 
	{
		errmsg += "請填寫「前年教師異動人數：代理教師」！\n";
		document.form.ltnumber6.focus();
		flag = 0;
	}

	//驗證輸入的資料是否為數字
	var regex = /^[0-9]*$/;
	if (!(regex.test(document.form.tnumber1.value)))
	{
		errmsg += '「今年全校教師人數」須為正整數\n';
		document.form.tnumber1.focus();
		flag = 0;
	}
	if (!(regex.test(document.form.ltnumber1.value)))
	{
		errmsg += '「今年教師異動人數：調入」須為正整數\n';
		document.form.ltnumber1.focus();
		flag = 0;
	}
	if (!(regex.test(document.form.ltnumber2.value)))
	{
		errmsg += '「去年教師異動人數：調入」須為正整數\n';
		document.form.ltnumber2.focus();
		flag = 0;
	}
	if (!(regex.test(document.form.ltnumber4.value)))
	{
		errmsg += '「今年教師異動人數：代理教師」須為正整數\n';
		document.form.ltnumber4.focus();
		flag = 0;
	}
	if (!(regex.test(document.form.ltnumber5.value)))
	{
		errmsg += '「去年教師異動人數：代理教師」須為正整數\n';
		document.form.ltnumber5.focus();
		flag = 0;
	}
	if (!(regex.test(document.form.ltnumber7.value)))
	{
		errmsg += '「今年教師異動人數：其他教師」須為正整數\n';
		document.form.ltnumber7.focus();
		flag = 0;
	}
	if (!(regex.test(document.form.ltnumber8.value)))
	{
		errmsg += '「去年教師異動人數：其他教師」須為正整數\n';
		document.form.ltnumber8.focus();
		flag = 0;
	}

	//教師編制人數不為0
	if ( document.form.tnumber1.value == 0 ) 
	{
		errmsg += "「今年全校教師人數」不能為0！\n";
		document.form.tnumber1.focus();
		flag = 0;
	}
	
		//「101學年度全校教師編制人數」與「100學年度全校教師編制人數」不超過±10%﹙101年 40人以上才檢核﹚。
	var lastteacher = document.form.tnumber2.value;
	var lastteacher_min;
	var lastteacher_max;
	lastteacher_min = parseInt(parseInt(lastteacher,10) * 0.9,10);
	lastteacher_max = parseInt(parseInt(lastteacher,10) * 1.1,10);
	if ( document.form.tnumber1.value >= 40 ) 
	{
		if (document.form.tnumber1.value < lastteacher_min || document.form.tnumber1.value > lastteacher_max)
		{
			if	(document.form.a148.value == "" )
			{
				document.getElementById("alert").style.display="";//顯示
				document.form.a190.value = "「101年全校教師編制人數與去年」比超過±10%，請填寫異動過大說明"
				errmsg += '「101學年度全校教師編制人數」與「100學年度全校教師編制人數」不得超過±10%'+'﹙101年度全校教師40人以上才檢核﹚\n';
				flag = 0;
			}
		}
		else
		{
			document.getElementById("alert").style.display="none";//隱藏
			
		}
	}


	//全校學生數：全校學生數：101學年度全校教師編制人數，比值不可＞20 或 ＜6﹙學生數100人以上才檢核﹚。
	var allstudent = <?=$allstudent;?>; //全校學生數
	var proportion;
	
	proportion = parseInt(allstudent / document.form.tnumber1.value,10);
		
	if (allstudent >= 100 && (proportion > 20 || proportion < 6))
	{	
		if	(document.form.a148.value == "" )
		{	
			document.getElementById("alert").style.display="";//顯示
			document.form.a190.value = "「全學生數比教師編制數」比值＞20或＜6，請填寫異動過大說明"
			errmsg += '全校學生數：101學年度全校教師編制人數，比值不可＞20 或 ＜6 ﹙學生數100人以上才檢核﹚\n';
			document.form.tnumber1.focus();
			flag = 0;
		}
	}
	/*
	else
	{
		document.getElementById("alert").style.display="none";//隱藏
		
	}
	*/		
	
	//「教師異動人數」：「三學年度教師編制合計」不得＞0.5。
	var differentteacher = document.form.different.value;//教師異動人數
	var totalteacher = document.form.total.value; //合計教師
	if ((differentteacher / totalteacher > 0.5))
	{	
		if	(document.form.a148.value == "" )
		{	
			document.getElementById("alert").style.display="";//顯示
			document.form.a190.value = "請填寫「教師流動率」＞50%，請異動過大說明"
		errmsg += '「教師流動率」不得＞50%\n';
		flag = 0;
		}
	}

	//「代理教師人數」：「三學年度教師編制合計」不得＞0.5。
	var different2teacher = document.form.different2.value;//教師異動人數,變數名稱差個2
	if ((different2teacher / totalteacher > 0.5))
	{	
		if	(document.form.a148.value == "" )
		{	
			document.getElementById("alert").style.display="";//顯示
			document.form.a190.value = "請填寫「實缺教師代理率」＞50%，請異動過大說明"
		errmsg += '「實缺教師代理率」不得＞50%\n';
		flag = 0;
		}
	}

	if (flag == 0)
	{
		alert(errmsg);
		return false;
	}
	else
	{
		return true;
	}
}
</script>   
<? include "../xSchoolForm/button_print.php"; ?>
</form>

<!--101年度免上傳教師名冊
<a href="./download/指標6_教師流動率調查表.xls">下載：教師流動率調查表空白表格</a>
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
<?php include "../../footer.php"; ?>