<?php
include "../../mainfile.php";
include "../../header.php";
session_start();
?>
<INPUT TYPE="button" VALUE="回前頁" onClick="history.go(-1)">
<?
$username = $xoopsUser->getVar('uname');
global $xoopsDB;
$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
$result_city = $xoopsDB -> query($sql) or die($sql);
while($row = mysql_fetch_row($result_city)) {
	$city = $row[1];	//單位
	$cityman = $row[2];	//承辦人
	$examine = $row[3];	//審核權限
	$cityno = $row[4];	//縣市代碼
}
$id = $_GET["id"];
echo $username;
echo $city;
echo $cityman;
include "./checkdate.php";

//叫出學校資料庫,區分國小或國中資料表
$sql_school = "select  *  from edu_school where account like '$id'";
$result_school = mysql_query($sql_school);
while($row = mysql_fetch_row($result_school)){
	$school = $row[0];		//學校編號
	$school_name = $row[2];	//學校名稱
	$class = $row[3];		//國中小別
}
//其他資料	
if($class == '1' ){
	$basedata="100element_allowance8";
}else{
	$basedata="100junior_allowance8";
}			
$sql = "select  *  from ".$basedata." where account like '$id'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$a = $row[30];//申請球場數量
	$b = $row[31];//修建申請金額
	$c = $row[32];//設備申請金額
	$d = $row[29];//申請金額合計
}
//如果使用者為教育部就進來帶入縣市審核金額
if($examine == '2'){
	if($class == '1' ){
		$basedata="100element_examine_money";
	}else{
		$basedata="100junior_examine_money";
	}			
	$sql = "select  *  from ".$basedata." where account like '$id'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_row($result)){
		$city_examine_1 = $row[14];//縣市審核金額合計
		$city_examine_2 = $row[42];//縣市審核修建金額
		$city_examine_3 = $row[43];//縣市審核設備金額
	}
}		
?> 	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p>補助項目八：整修學校社區化活動場所</p>
<form name="form" method="post" action="examine_allowance8_finish.php?id=<? echo $id;?>" onKeyDown="if(event.keyCode == 13) return false;">
●學校：<? echo $school.' '.$school_name;?>
<p>
※符合指標：<br>
<? 
//符合指標
if($class == '1' ){
	$basedata="100element_point";
}else{
	$basedata="100junior_point";
}			
$sql = "select  *  from ".$basedata." where account like '$id'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$p1_1 = $row[1];//指標1-1
	$p1_2 = $row[2];//指標1-2
	$p1_3 = $row[3];//指標1-3
	$p2_1 = $row[5];//指標2-1
	$p4 = $row[8];	//指標4
}
if($p1_1 == 1){
	echo '　　　'.'指標1-1'.'<br>';
}
if($p1_2 == 1){
	echo '　　　'.'指標1-2'.'<br>';
}
if($p1_3 == 1){
	echo '　　　'.'指標1-3'.'<br>';
}
if($p2_1 == 1){
	echo '　　　'.'指標2-1'.'<br>';
}
if($p4 == 1){
	echo '　　　'.'指標4'.'<br>';
}
?>
<br>
<?
//審核意見
if($class == '1' ){
	$basedata="100element_examine_a8";
}else{
	$basedata="100junior_examine_a8";
}			
$sql = "select  *  from ".$basedata." where account like '$id'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$city1 = $row[1];		//縣市審核金額合計
	$city2 = $row[11];		//縣市審核修建金額
	$city3 = $row[12];		//縣市審核設備金額
	$edu1 = $row[5];		//教育部審核金額合計
	$edu2 = $row[13];		//教育部審核修建金額
	$edu3 = $row[14];		//教育部審核設備金額
	$suggestion1 = $row[4];	//縣市審核意見
	$suggestion2 = $row[8];	//教育部審核意見
	$pass = $row[10];		//教育部審核通過
}
?>
※申請資料與審核：<br>
●補助綜合球場申請經費<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($d);?></font>元。<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $a;?></font>座，修建<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($b);?></font>元，設備<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($c);?></font>元。<br />
<? if($examine == '2') echo '●縣市審核'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($city1).'</font>元。修建金額<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($city2).'</font>元，設備金額<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($city3).'</font>元。'?><br />
<b>--<font color=blue>複核金額<input type="text" size="6" name="money" value= "<?
if($examine == '1' ){
	if($city1 != 0){
		if($a != $city1){
			echo $city1;
		}else{
			echo $d;
		}
	}else{
		echo $city1;
	}
}
if($examine == '2' ){
	if($edu1 != 0){
		if($city1 != $edu1){
			echo $edu1;
		}else{
			echo $city1;
		}
	}else{
		echo $edu1;
	}
}
?>"  style="border:0px; text-align: right;" readonly >元。</font>
修建金額<input type="text" size="5" name="money1" onChange="change1()" value= "<?
if($examine == '1' ){
	if($city2 != 0){
		if($b != $city2){
			echo $city2;
		}else{
			echo $b;
		}
	}else{
		echo $city2;
	}
}
if($examine == '2' ){
	if($edu2 != 0){
		if($city_examine_2 != $edu2){
			echo $edu2;
		}else{
			echo $city_examine_2;
		}
	}else{
		echo $edu2;
	}
}
?>"/>元，設備金額<input type="text" size="5" name="money2" onChange="change2()" value= "<?
if($examine == '1' ){
	if($city3 != 0){
		if($c != $city3){
			echo $city3;
		}else{
			echo $c;
		}
	}else{
		echo $city3;
	}
}
if($examine == '2' ){
	if($edu3 != 0){
		if($city_examine_3 != $edu3){
			echo $edu3;
		}else{
			echo $city_examine_3;
		}
	}else{
		echo $edu3;
	}
}
?>"/>元。</b>
<p>

<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
•預計補助小型集會風雨教室<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $d;?></font>棟,
申請經費<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($d);?></font>元。
<? if($examine == '2') echo '縣市審核結果'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.$city_examine_2.'</font>元。'?>
複核金額費<input type="text" size="5" name="money_2" value= "<?  if($examine == '1' ) {													
																	if($city2 != 0 ){
																		if($d!= $city2) echo $city2;
																 		else echo $d;
																	}
																	else echo $city2;
																 }
																 if($examine == '2' ){ 
																 if($edu2 != 0){
																 	if($city_examine_2 != $edu2) echo $edu2;
																 		else echo $city_examine_2;
																 }
																 else echo $edu2;
																 }?>"/>元。<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
•預計補助運動場<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $e;?></font>座,
申請經費<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($f);?></font>元。
<? if($examine == '2') echo '縣市審核結果'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.$city_examine_3.'</font>元。'?>
複核金額費<input type="text" size="5" name="money_3" value= "<?  if($examine == '1' ) {
																	if($city3 != 0){
																		if($f != $city3) echo $city3;
																 		else echo $f;
																	}
																	else echo $city3;
																 }
																 if($examine == '2' ){																  
																	if($edu3 != 0){
																	if($city_examine_3 != $edu3) echo $edu3;
																 		else echo $city_examine_3;
																	}
																 	else echo $edu3;
																 }?>"/>元。<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br />
-->
<? if($examine == '2') echo '●縣市審核意見：'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.$suggestion1.'</font><br>'?>
●審核意見說明：<textarea name="other" cols="30" rows="2"><? if($examine == '1'){ echo $suggestion1;}else{echo $suggestion2;}?></textarea>
<p>
<?
//讀取學校檔案資料
if($class == '1' ){			
	$sql = "select  *  from   100element_upload_name where account like '$school'";
}else{
	$sql = "select  *  from   100junior_upload_name where account like '$school'";
}
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$file_1 = $row[35];
	$file_1_name = ' (計畫)';
	$file_2 = $row[34];
	$file_2_name = ' (經費概算表)';
}
//列出狀態訊息
if ($file_1 == ''){echo "檔案狀態：<font color=red>未上傳".$file_1_name."</font><br>";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/101/'.$school.'/'.$file_1.'" target="_new">'.$file_1.$file_1_name.'</a><br>';}
if ($file_2 == ''){echo "檔案狀態：<font color=red>未上傳".$file_2_name."</font><br>";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/101/'.$school.'/'.$file_2.'" target="_new">'.$file_2.$file_2_name.'</a><br>';}
?>
<p>
<!--審查退件功能  -->
	<input type="hidden" name="sid"  value="<? echo $school; ?>">
	<input type="hidden" name="allowance8"  value="<? echo "allowance8"; ?>">
<label>
	<input type="radio" name="allowance8_pass"  value="1" id="1" <? if ($pass == '1') echo 'checked';?>/>
    審核通過</label>
<label>
    <input type="radio" name="allowance8_pass"  value="2" id="2" <? if ($pass == '2') echo 'checked';?>/>
    審核不通過且列入退件名單</label>
<br><br>
    <INPUT TYPE="button" VALUE="返回(取消)" onClick="history.go(-1)">
	<input type="submit" name="button" value="　　確認　　" />
<!--結束 -->
<script language="JavaScript">
//申請補助經費更新
function numsum() { 
	var f = document.forms[0]; 
	f.money.value = (f.money1.value==""?0:parseFloat(f.money1.value)) + (f.money2.value==""?0:parseFloat(f.money2.value)); 
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
</form>
<?php
include "../../footer.php";
?>
