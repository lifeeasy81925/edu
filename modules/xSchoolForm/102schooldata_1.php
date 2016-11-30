<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
include "./checkdate.php";
include "./checkmail.php";

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
	$lastclass = $row[27];
	$c1 = $row[102];
	$c2 = $row[103];
	$c3 = $row[104];			
	$c4 = $row[105];
	$c5 = $row[106];
	$c6 = $row[107];
	$c7 = $row[108];
	$a110 = $row[110]; //85-91曾受補助興建社區化活動場所//0827修
	$lastgrad = $row[122];
	                   //0827修
	$a126 = $row[126]; //離島
	$a127 = $row[127]; //無公共交通工具
	$a128 = $row[128]; //站牌五公里
	$a129 = $row[129]; //離社區五公里且無站牌
	$a130 = $row[130]; //少於4班
	$a131 = $row[131]; //因裁併校須交通車
	$a132 = $row[132]; //無上述狀況
	
	$a147 = $row[147]; //學校資料頁面一檢核說明
	$a148 = $row[148]; //學校資料頁面二檢核說明
	$a149 = $row[149]; //學校資料頁面三檢核說明
	$a189 = $row[189]; //學校資料頁面一檢核項目
	$a190 = $row[190]; //學校資料頁面二檢核項目
	$a191 = $row[191]; //學校資料頁面三檢核項目
}
	//echo "<br>Test: ".$id."_".$type."_".$city."_".$district."_".$school."_".$area."_".$laststudent."_".$allstudent."_".$class."_".$c1."_".$c2."_".$c3."_".$c4."_".$c5."_".$c6."_".$c7."_".$lastgrad."<br>";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="回上一頁" onclick="location.href='school_index.php'">

<form name="form" method="post" action="102schooldata_1_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">

<p><font color="blue"><strong>學校基本資料</strong></font>
<p>
※學校所在區域：<font color=blue>
<? 
switch($area) { 
case "1":
	echo "離島";
	break;
case "2":
	echo "偏遠及特偏";
	break;
case "3":
	echo "一般地區";
	break;
case "4":
	echo "都會地區";
	break;
default:
	echo "無貴校所在區域資料，請聯繫教育局(處)承辦人更新資料，謝謝。";
}
?>
<!-- 0827新增以下9行 -->
</font> <em><sub>(註1)</sub></em><br>
※學校所在地區交通狀況：<font color=blue>
<?
if($a126 == "1") echo '離島'.'。';
if($a127 == "1") echo '學校所在地區無公共交通工具到達'.'。';
if($a128 == "1") echo '學校距離站牌達5公里以上'.'。';
if($a129 == "1") echo '學區內之社區距離學校5公里以上，且無公共交通工具可以達學校'.'。';
if($a130 == "1") echo '公共交通工具到學校所在地區每天少於4班次'.'。';
if($a131 == "1") echo '91學年度以前，因裁併校後學區幅員遼闊須交通車接送學生上下學'.'。';
if($a126 == "0" && $a127 == "0" && $a128 == "0" && $a129 == "0" && $a130 == "0" && $a131 == "0") echo '無特殊交通狀況'.'。';
?>
</font> <em><sub>(註1)</sub></em><br>
※100學年度全校學生人數：<font color=blue><? if( $laststudent=='') echo ''; else echo $laststudent;?>人</font> <em><sup>(註2)</sup></em><br>
※101學年度全校學生人數：<input type="text" size="6" name="allstudent" value="<? if( $allstudent=='') echo ''; else echo $allstudent;?>"/> 
    人 <font color=blue>(101年9月30日在籍學生數為準)</font><br><br>
※全校班級數<input type="text" size="6" name="class" value="<? if( $class=='') echo ''; else echo $class;?>">班<br><br>
　　　一年級<input type="text" size="6" name="c1" value="<? if( $c1=='') echo ''; else echo $c1;?>">班<br>
　　　二年級<input type="text" size="6" name="c2" value="<? if( $c2=='') echo ''; else echo $c2;?>">班<br>
　　　三年級<input type="text" size="6" name="c3" value="<? if( $c3=='') echo ''; else echo $c3;?>">班<br>
<? if ($type == "2") echo "<!--"; ?>
　　　四年級<input type="text" size="6" name="c4" value="<? if( $c4=='') echo ''; else echo $c4;?>">班<br>
　　　五年級<input type="text" size="6" name="c5" value="<? if( $c5=='') echo ''; else echo $c5;?>">班<br>
　　　六年級<input type="text" size="6" name="c6" value="<? if( $c6=='') echo ''; else echo $c6;?>">班<br>
<? if ($type == "2") echo "-->"; ?>
　　　特殊班<input type="text" size="6" name="c7" value="<? if( $c7=='') echo ''; else echo $c7;?>">班(不含資源班)
<? if ($type == "1") echo "<!--"; ?>
<p>※100學年度國中三年級畢業生人數：<input type="text" size="6" name="lastgrad" value="<? if( $lastgrad=='') echo ''; else echo $lastgrad;?>">人</font><br>
<? if ($type == "1") echo "-->"; ?>
<!--0827新增以下二行-->
<p>
※85~91年度是否曾獲本計畫補助興建學校社區化活動場所經費：<font color=blue><? if($a110=="1") echo "未受補助"; else echo "曾受補助";?></font> <em><sup>(註2)</sup></em>
<p>
<sup><em>註1：資料為縣市政府提供</em></sup><br />
<sup><em>註2：資料為貴校去年填報</em></sup>
<!--
※div style display 屬性選項：none隱藏、空白顯示
javascript呼叫:
　　document.getElementById("alert").style.display="none";//隱藏
　　document.getElementById("alert").style.display="";//顯示
※當按下「儲存並到下一頁」按鈕，若a189有內容，但a147無內容，「警示：請填寫異動過大說明」
-->
<div id="alert" style="display:<? if($a147=="") echo 'none';?>;">
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" style="background-color:#FC9">資料檢核警示訊息視窗</td>
  </tr>
  <tr>
    <td>
<font color="#FF0000">警示訊息：<input type="text" name="a189" value="<? if( $a189=='') echo ''; else echo $a189;?>" style="border:0px; text-align: right;" readonly/></font><p>
※若確定填寫無誤，請說明異動過大原因：(若未填寫，無法「儲存並到下一頁」)
<textarea name="a147" cols=70% rows="2"><? if( $a147=="") echo ""; else echo $a147;?></textarea>
    </td>
  </tr>
</table>
</div>
<br />
<INPUT TYPE="button" VALUE="回上一頁" onClick="history.go(-1)">
<input type="submit" name="button" value="儲存並到下一頁" />

<!-- 檢查空值 -->
<script language="JavaScript">

function toCheck() 
{
	var flag = 1;
	var errmsg = "";

	if ( document.form.allstudent.value == "" ) 
	{
		errmsg += "請填寫「全校學生人數」！\n";
		document.form.allstudent.focus();
		flag = 0;
	}
	if ( document.getElementsByName("class")[0].value == "" ) 
	{
		errmsg += "請填寫「全校班級數」！\n";
		document.getElementsByName("class")[0].focus();
		flag = 0;
	}
	if ( document.form.c1.value == "" ) 
	{
		errmsg += "請填寫「一年級」班數！\n";
		document.form.c1.focus();
		flag = 0;
	}
	if ( document.form.c2.value == "" ) 
	{
		errmsg += "請填寫「二年級」班數！\n";
		document.form.c2.focus();
		flag = 0;
	}
	if ( document.form.c3.value == "" ) 
	{
		errmsg += "請填寫「三年級」班數！\n";
		document.form.c3.focus();
		flag = 0;
	}
	if ( document.form.c4.value == "" ) 
	{
		errmsg += "請填寫「四年級」班數！\n";
		document.form.c4.focus();
		flag = 0;
	}
	if ( document.form.c5.value == "" ) 
	{
		errmsg += "請填寫「五年級」班數！\n";
		document.form.c5.focus();
		flag = 0;
	}
	if ( document.form.c6.value == "" ) 
	{
		errmsg += "請填寫「六年級」班數！\n";
		document.form.c6.focus();
		flag = 0;
	}			
	if ( document.form.c7.value == "" ) 
	{
		errmsg += "請填寫「特殊班」班數！\n";
		document.form.c7.focus();
		flag = 0;
	}	

	<? if ($type == "1") echo "/*"; ?>
	//登入者為國中才判斷
	if ( document.form.lastgrad.value == "" ) 
	{
		errmsg += "請填寫「100學年度國中三年級畢業生」人數\n";
		document.form.lastgrad.focus();
		flag = 0;
	}	
	<? if ($type == "1") echo "*/"; ?>

	//驗證輸入的資料是否為數字
	var regex = /^[0-9]*$/;
	if (!(regex.test(document.form.allstudent.value)))
	{
		errmsg += '「全校學生人數」班數須為正整數\n';
		document.form.allstudent.focus();
		flag = 0;
	}
	if (!(regex.test(document.getElementsByName("class")[0].value)))
	{
		errmsg += '「全校班級數」班數須為正整數\n';
		document.getElementsByName("class")[0].focus();
		flag = 0;
	}
	if (!(regex.test(document.form.c1.value)))
	{
		errmsg += '「一年級」班數須為正整數\n';
		document.form.c1.focus();
		flag = 0;
	}
	if (!(regex.test(document.form.c2.value)))
	{
		errmsg += '「二年級」班數須為正整數\n';
		document.form.c2.focus();
		flag = 0;
	}
	if (!(regex.test(document.form.c3.value)))
	{
		errmsg += '「三年級」班數須為正整數\n';
		document.form.c3.focus();
		flag = 0;
	}
	if (!(regex.test(document.form.c4.value)))
	{
		errmsg += '「四年級」班數須為正整數\n';
		document.form.c4.focus();
		flag = 0;
	}
	if (!(regex.test(document.form.c5.value)))
	{
		errmsg += '「五年級」班數須為正整數\n';
		document.form.c5.focus();
		flag = 0;
	}
	if (!(regex.test(document.form.c6.value)))
	{
		errmsg += '「六年級」班數須為正整數\n';
		document.form.c6.focus();
		flag = 0;
	}
	if (!(regex.test(document.form.c7.value)))
	{
		errmsg += '「特殊班」班數須為正整數\n';
		document.form.c7.focus();
		flag = 0;
	}
	
	<? if ($type == "1") echo "/*"; ?>
	//登入者為國中才判斷
	if (!(regex.test(document.form.lastgrad.value)))
	{
		errmsg += '「100學年度國中三年級畢業生」數須為正整數\n';
		document.form.lastgrad.focus();
		flag = 0;
	}
	//國中三年級畢業生人數不得大於全校學生數
	if (document.form.lastgrad.value > document.form.allstudent.value)
	{
		errmsg += '「國中三年級畢業生人數」不得大於「全校學生數」\n';
		flag = 0;
	}
	<? if ($type == "1") echo "*/"; ?>
	
	// 驗證今年總人數與去年總人數誤差(±20%)
	var laststudent = <?=$laststudent;?>;
	//document.form.allstudent.value
	var laststudent_min;
	var laststudent_max;
	laststudent_min = parseInt(parseInt(laststudent,10) * 0.8,10);
	laststudent_max = parseInt(parseInt(laststudent,10) * 1.2,10);
	if (document.form.allstudent.value < laststudent_min || document.form.allstudent.value > laststudent_max)
	{
		if	(document.form.a147.value == "")
		{
			document.getElementById("alert").style.display="";//顯示
			document.form.a189.value = "學生數比誤差超過±20%。"
			errmsg += '今年去年學生數比誤差超過±20%。\n';
			flag = 0;
		}
	}
	else
	{
		document.getElementById("alert").style.display="none";//隱藏
		
	}

	// 驗證全校班級數與班級加總
	if ( parseInt(document.getElementsByName("class")[0].value,10) != parseInt(parseInt(document.form.c1.value,10) + parseInt(document.form.c2.value,10) + parseInt(document.form.c3.value,10) + parseInt(document.form.c4.value,10) + parseInt(document.form.c5.value,10) + parseInt(document.form.c6.value,10) + parseInt(document.form.c7.value,10),10)) 
	{
		errmsg += '「全校班級數」與加總不符！\n' 
		errmsg += '全校班級數：' + parseInt(document.getElementsByName("class")[0].value,10)+'\n'
		errmsg += '加總班級數：' + parseInt(parseInt(document.form.c1.value,10)
										 + parseInt(document.form.c2.value,10) 
										 + parseInt(document.form.c3.value,10) 
										 + parseInt(document.form.c4.value,10) 
										 + parseInt(document.form.c5.value,10) 
										 + parseInt(document.form.c6.value,10) 
										 + parseInt(document.form.c7.value,10),10) + '\n';
		//errmsg += 'wrong');
		document.getElementsByName("class")[0].focus();
		flag = 0;
	}

/*
	// 驗證全校班級(a101)數與去年班級數(a027)比較超過±30%
	var lastclass = <?=$lastclass;?>;
	var lastclass_min;
	var lastclass_max;
	lastclass_min = parseInt(parseInt(lastclass,10) * 0.7,10);
	lastclass_max = parseInt(parseInt(lastclass,10) * 1.3,10);
	if (document.getElementsByName("class")[0].value < lastclass_min || document.getElementsByName("class")[0].value > lastclass_max)
	{
		errmsg += '「全校班級數」與「去年班級數」誤差超過±30%\n';
		document.getElementsByName("class")[0].focus();
		flag = 0;
	}
*/
	/*
	// 檢查是否勾選area	  
	if ( document.form.area[0].checked ) 
	{
		var area = 'area_0';
	} 
	else if ( document.form.area[1].checked )
	{
		var area = 'area_1';
	} 
	else if ( document.form.area[2].checked )
	{
		var area = 'area_2';
	} 
	else if ( document.form.area[3].checked )
	{
		var area = 'area_3';
	} 
	else 
	{
		errmsg += "請點選「學校區域」！\n";
		document.form.area[2].focus();
		flag = 0;
	}
	
	// 檢查是否勾選a8r1	  
	if ( document.form.for_a8r1_1[0].checked ) 
	{
		var for_a8r1_1 = 1;
	} 
	else if ( document.form.for_a8r1_1[1].checked )
	{
		var for_a8r1_1 = 2;
	} 
	else 
	{
		errmsg += "請點選「是否曾獲該項補助」！\n";
		document.form.for_a8r1_1[0].focus();
		flag = 0;
	}
*/
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
<?php include "../xSchoolForm/button_print.php"; ?>
</form>
<?php include "../../footer.php"; ?>