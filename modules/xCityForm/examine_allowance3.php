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
while($row = mysql_fetch_row($result_city)){
	$city = $row[1];
	$cityman = $row[2];
	$examine = $row[3];
	$cityno = $row[4];
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
	$basedata="100element_allowance3";
}else{
	$basedata="100junior_allowance3";
}			
$sql = "select  *  from ".$basedata." where account like '$id'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$a = $row[9];//總金額
	$b = $row[11];//特色一名稱
	$c = $row[12];//特色一金額
	$c_1 = $row[13];//特色一經常門
	$c_2 = $row[14];//特色一資本門
	$d = $row[15];//特色二名稱
	$e = $row[16];//特色二金額
	$e_1 = $row[17];//特色二經常門
	$e_2 = $row[18];//特色二資本門
}

//如果使用者為 education 就進來帶入縣市審核金額
if($examine == '2'){
	if($class == '1' ){
		$basedata="100element_examine_money";
	}else{
		$basedata="100junior_examine_money";
	}			
	$sql = "select  *  from ".$basedata." where account like '$id'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_row($result)){
		$city_examine = $row[6];//縣市審核金額
		$city_examine_1 = $row[26];//特色一縣市審核金額
		$city_examine_2 = $row[27];//特色二縣市審核金額
	}
}
if($examine == '2'){
	if($class == '1' ){
		$basedata="100element_examine_a3";
	}else{
		$basedata="100junior_examine_a3";
	}			
	$sql = "select  *  from ".$basedata." where account like '$id'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_row($result)){
		$city_examine = $row[1];//縣市審核金額
		$city_examine_1 = $row[2];//特色一縣市審核金額
		$city_examine_1_1 = $row[11];//特色一經常門縣市審核金額
		$city_examine_1_2 = $row[12];//特色一資本門縣市審核金額
		$city_examine_2 = $row[3];//特色二縣市審核金額
		$city_examine_2_1 = $row[13];//特色二經常門縣市審核金額
		$city_examine_2_2 = $row[14];//特色二資本門縣市審核金額
	}
}

?> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p>補助項目三：補助學校發展教育特色</p>
<form name="form" method="post" action="examine_allowance3_finish.php?id=<? echo $id;?>">
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
	$p2_3 = $row[10];	//指標2-3
	$p4 = $row[8];		//指標4
	$p5_1 = $row[11];	//指標5-1
	$p5_2 = $row[13];	//指標5-2
}
if($p2_3 == '1'){
	echo  '　　　'.'指標2-3'.'<br>';
}
if($p4 == '1'){
	echo  '　　　'.'指標4'.'<br>';
}
if($p5_1 == '1'){
	echo  '　　　'.'指標5-1'.'<br>';
}
if($p5_2 == '1'){
	echo  '　　　'.'指標5-2'.'<br>';
}
?>
<br>
<?
//意見審核
if($class == '1' ){
	$basedata="100element_examine_a3";
}else{
	$basedata="100junior_examine_a3";
}			
$sql = "select  *  from ".$basedata." where account like '$id'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$city1 = $row[1];		//縣市審核總金額
	$city2 = $row[2];		//縣市審核特色一金額
	$city2_1 = $row[11];	//縣市審核特色一經常門
	$city2_2 = $row[12];	//縣市審核特色一資本門
	$city3 = $row[3];		//縣市審核特色二金額
	$city3_1 = $row[13];	//縣市審核特色二經常門
	$city3_2 = $row[14];	//縣市審核特色二資本門
	$edu1 = $row[5];		//教育部審核總金額
	$edu2 = $row[6];		//教育部審核特色一金額
	$edu2_1 = $row[15];		//教育部審核特色一經常門
	$edu2_2 = $row[16];		//教育部審核特色一資本門
	$edu3 = $row[7];		//教育部審核特色二金額
	$edu3_1 = $row[17];		//教育部審核特色二經常門
	$edu3_2 = $row[18];		//教育部審核特色二資本門
	$suggestion1 = $row[4];//縣市審核意見
	$suggestion2 = $row[8];//教育部審核意見
	$pass = $row[9];//縣市審核通過
}
?>
※申請資料與審核：<br>  
●申請總經費<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($a);?></font>元。<? if($examine == '2') echo '縣市審核'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.$city_examine_1.'</font>元。'?>
<font color=blue>審核金額<input type="text" size="5" name="money" value= "<? 
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
?>" style="border:0px; text-align: right;" readonly >元。</font><p>
●特色一：<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $b;?></font>，申請經費<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($c);?></font>元 
(經常門<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($c_1);?></font>元，
資本門<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($c_2);?></font>元)<br /><? if($examine == '2') echo '縣市審核'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.$city2.'</font>元。'?>
●　　　　<font color=blue>特色一審核金額<input type="text" size="5" name="money1" onChange="change1()" value= "<?
if($examine == '1' ){
	if($city2 != 0 ){
		if($c!= $city2){
			echo $city2;
		}else{
			echo $c;
		}
	}else{
		echo $city2;
	}
}
if($examine == '2' ){ 
	if($edu2 != 0){
		if($city2 != $edu2){
			echo $edu2;
		}else{
			echo $city2;
		}
	}else{
		echo $edu2;
	}
}
?>" style="border:0px; text-align: right;" readonly >
元</font> (經常門<input type="text" size="5" name="money1_1" onChange="change1_1()" value= "<?
if($examine == '1' ){
	if($city2_1 != 0 ){
		if($c_1 != $city2_1){
			echo $city2_1;
		}else{
			echo $c_1;
		}
	}else{
		echo $city2_1;
	}
}
if($examine == '2' ){ 
	if($edu2_1 != 0){
		if($city2_1 != $edu2_1){
			echo $edu2_1;
		}else{
			echo $city2_1;
		}
	}else{
		echo $edu2_1;
	}
}
?>">
元，資本門<input type="text" size="5" name="money1_2" onChange="change1_2()" value= "<?
if($examine == '1' ){
	if($city2_2 != 0 ){
		if($c_2!= $city2_2){
			echo $city2_2;
		}else{
			echo $c_2;
		}
	}else{
		echo $city2_2;
	}
}
if($examine == '2' ){ 
	if($edu2_2 != 0){
		if($city2_2 != $edu2_2){
			echo $edu2_2;
		}else{
			echo $city2_2;
		}
	}else{
		echo $edu2_2;
	}
}
?>">
元)<p>
●特色二：<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? if ($d == ''){echo '無';}else{echo $d;}?></font>，申請經費<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($e);?></font>元 
(經常門<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($e_1);?></font>元，
資本門<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($e_2);?></font>元)<br /><? if($examine == '2') echo '縣市審核'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.$city3.'</font>元。'?>
●　　　　<font color=blue>特色二審核金額<input type="text" size="5" name="money2" onChange="change2()" value= "<?
if($examine == '1' ){
	if($city3 != 0){
		if($e != $city3){
			echo $city3;
		}else{
			echo $e;
		}
	}else{
		echo $city3;
	}
}
if($examine == '2' ){
	if($edu3 != 0){
		if($city3 != $edu3){
			echo $edu3;
		}else{
			echo $city3;
		}
	}else{
		echo $edu3;
	}
}
?>" style="border:0px; text-align: right;" readonly >
元</font> (經常門<input type="text" size="5" name="money2_1" onChange="change2_1()" value= "<?
if($examine == '1' ){
	if($city3_1 != 0 ){
		if($e_1 != $city3_1){
			echo $city3_1;
		}else{
			echo $e_1;
		}
	}else{
		echo $city3_1;
	}
}
if($examine == '2' ){ 
	if($edu3_1 != 0){
		if($city3_1 != $edu3_1){
			echo $edu3_1;
		}else{
			echo $city3_1;
		}
	}else{
		echo $edu3_1;
	}
}
?>">
元，資本門<input type="text" size="5" name="money2_2" onChange="change2_2()" value= "<?
if($examine == '1' ){
	if($city3_2 != 0 ){
		if($e_2!= $city3_2){
			echo $city3_2;
		}else{
			echo $e_2;
		}
	}else{
		echo $city3_2;
	}
}
if($examine == '2' ){ 
	if($edu3_2 != 0){
		if($city3_2 != $edu3_2){
			echo $edu3_2;
		}else{
			echo $city3_2;
		}
	}else{
		echo $edu3_2;
	}
}
?>">
元)
<p>
<? if($examine == '2') echo '●縣市審核意見：'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.$suggestion1.'</font><br>'?>
●審核意見說明：<textarea name="other" cols="40" rows="2"><? if($examine == '1'){ echo $suggestion1;}else{ echo $suggestion2;}?></textarea>
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
	$file_1 = $row[14];
	$file_1_name = ' (計畫)';
	$file_2 = $row[15];
	$file_2_name = ' (經費概算表)';
}
//列出狀態訊息
if ($file_1 == ''){echo "檔案狀態：<font color=red>未上傳".$file_1_name."</font><br>";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/101/'.$school.'/'.$file_1.'" target="_new">'.$file_1.$file_1_name.'</a><br>';}
if ($file_2 == ''){echo "檔案狀態：<font color=red>未上傳".$file_2_name."</font><br>";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/101/'.$school.'/'.$file_2.'" target="_new">'.$file_2.$file_2_name.'</a><br>';}
?>
<p>
<!--審查退件功能  -->
	<input type="hidden" name="sid"  value="<? echo $school; ?>">
	<input type="hidden" name="allowance3"  value="<? echo "allowance3"; ?>">
<label>
	<input type="radio" name="allowance3_pass"  value="1" id="1" <? if ($pass == '1') echo 'checked';?>/>
    審核通過</label>
<label>
    <input type="radio" name="allowance3_pass"  value="2" id="2" <? if ($pass == '2') echo 'checked';?>/>
    審核不通過且列入退件名單</label>
<br><br>
    <INPUT TYPE="button" VALUE="返回(取消)" onClick="history.go(-1)">
	<input type="submit" name="button" value="　　確認　　" />
<!--結束 -->
<script language="JavaScript">
//審核金額更新
function numsum() { 
	var f = document.forms[0]; 
	f.money.value = (f.money1.value==""?0:parseFloat(f.money1.value)) + (f.money2.value==""?0:parseFloat(f.money2.value)); 
}
function numsum1() { 
	var f = document.forms[0]; 
	f.money1.value = (f.money1_1.value==""?0:parseFloat(f.money1_1.value)) + (f.money1_2.value==""?0:parseFloat(f.money1_2.value)); 
}
function numsum2() { 
	var f = document.forms[0]; 
	f.money2.value = (f.money2_1.value==""?0:parseFloat(f.money2_1.value)) + (f.money2_2.value==""?0:parseFloat(f.money2_2.value)); 
}
function change1() { 
	var f = document.forms[0]; 
	numsum();
}
function change2() { 
	var f = document.forms[0]; 
	numsum();
}
function change1_1() { 
	var f = document.forms[0]; 
	numsum1();
	change1();	
	average();
} 
function change1_2() { 
	var f = document.forms[0]; 
	numsum1();
	change1();	
	average();
}
function change2_1() { 
	var f = document.forms[0]; 
	numsum2();
	change2();	
	average();
}
function change2_2() { 
	var f = document.forms[0]; 
	numsum2();
	change2();	
	average();
}
</script>
</form>
<?php
include "../../footer.php";
?>