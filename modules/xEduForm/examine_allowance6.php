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
	$basedata="100element_allowance6";
}else{
	$basedata="100junior_allowance6";
}			
$sql = "select  *  from ".$basedata." where account like '$id'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$a = $row[9];//申請經費
	$a1 = $row[10];//經常門
	$a2 = $row[11];//資本門
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
		$city_examine_1 = $row[10];//縣市審核金額合計
		$city_examine_1_1 = $row[28];//縣市審核經常門
		$city_examine_1_2 = $row[29];//縣市審核資本門
	}	
}		
?> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p>補助項目六：發展原住民教育文化特色及充實設備器材</p>
<form name="form" method="post" action="examine_allowance6_finish.php?id=<? echo $id;?>" onKeyDown="if(event.keyCode == 13) return false;">
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
	$p1_1 = $row[1];	//指標1-1
	$p1_2 = $row[2];	//指標1-2
	$p1_3 = $row[3];	//指標1-3
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
?>
<br>
<?
//審核意見
if($class == '1' ){
	$basedata="100element_examine_a6";
}else{
	$basedata="100junior_examine_a6";
}			
$sql = "select  *  from ".$basedata." where account like '$id'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$city1 = $row[1];	//縣市審核金額
	$city1_1 = $row[7];	//縣市審核經常門
	$city1_2 = $row[8];	//縣市審核資本門
	$edu1 = $row[3];	//教育部審核金額
	$edu1_1 = $row[9];	//教育部審核經常門
	$edu1_2 = $row[10];	//教育部審核資本門
	$suggestion1 = $row[2];//縣市意見
	$suggestion2 = $row[4];//教育部意見
	$pass = $row[6];	//教育部審核通過
}
?>
※申請資料與審核：<br>
●申請經費<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($a);?></font>元。經常門<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($a1);?></font>元，資本門<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($a2);?></font>元。<br />
<? if($examine == '2') echo '●縣市審核'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($city1).'</font>元。經常門<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($city1_1).'</font>元，資本門<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($city1_2).'</font>元。'?><br />
<b>--<font color=blue>複核金額<input type="text" size="5" name="money" value= "<?
if($examine == '1' ){
	if($city1 != 0){
		if($a != $city1){
			echo $city1;
		}else{
			echo $a;
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
經常門<input type="text" size="5" name="money1" onChange="change1()" value= "<?
if($examine == '1' ){
	if($city1_1 != 0){
		if($a1 != $city1_1){
			echo $city1_1;
		}else{
			echo $a1;
		}
	}else{
		echo $city1_1;
	}
}
if($examine == '2' ){
	if($edu1_1 != 0){
		if($city1_1 != $edu1_1){
			echo $edu1_1;
		}else{
			echo $city1_1;
		}
	}else{
		echo $edu1_1;
	}
}
?>"/>元，資本門<input type="text" size="5" name="money2" onChange="change2()" value= "<?
if($examine == '1' ){
	if($city1_2 != 0){
		if($a2 != $city1_2){
			echo $city1_2;
		}else{
			echo $a2;
		}
	}else{
		echo $city1_2;
	}
}
if($examine == '2' ){
	if($edu1_2 != 0){
		if($city1_2 != $edu1_2){
			echo $edu1_2;
		}else{
			echo $city1_2;
		}
	}else{
		echo $edu1_2;
	}
}
?>"/>元。</b>
<p>
<? if($examine == '2') echo '●縣市審核意見：'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.$suggestion1.'</font><br>'?>
●審核意見說明：<textarea name="other" cols="40" rows="2"><? if($examine == '1'){echo $suggestion1;}else{echo $suggestion2;}?></textarea>
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
	$file_1 = $row[26];
	$file_1_name = ' (計畫)';
	$file_2 = $row[27];
	$file_2_name = ' (經費概算表)';
}
//列出狀態訊息
if ($file_1 == ''){echo "檔案狀態：<font color=red>未上傳".$file_1_name."</font><br>";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/101/'.$school.'/'.$file_1.'" target="_new">'.$file_1.$file_1_name.'</a><br>';}
if ($file_2 == ''){echo "檔案狀態：<font color=red>未上傳".$file_2_name."</font><br>";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/101/'.$school.'/'.$file_2.'" target="_new">'.$file_2.$file_2_name.'</a><br>';}
?>
<p>
<!--審查退件功能  -->
	<input type="hidden" name="sid"  value="<? echo $school; ?>">
	<input type="hidden" name="allowance6"  value="<? echo "allowance6"; ?>">
<label>
	<input type="radio" name="allowance6_pass"  value="1" id="1" <? if ($pass == '1') echo 'checked';?>/>
    審核通過</label>
<label>
    <input type="radio" name="allowance6_pass"  value="2" id="2" <? if ($pass == '2') echo 'checked';?>/>
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