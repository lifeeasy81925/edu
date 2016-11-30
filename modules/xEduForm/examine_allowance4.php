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
	$basedata="100element_allowance4";
}else{
	$basedata="100junior_allowance4";
}			
$sql = "select  *  from ".$basedata." where account like '$id'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$a = $row[7];	//學生宿舍經常門
	$b = $row[8];	//學生宿舍資本門
	$c = $row[9];	//學生宿舍申請總額
	$d = $row[14];	//教師宿舍經常門
	$e = $row[15];	//教師宿舍資本門
	$f = $row[16];	//教師宿舍申請總額
}
//如果使用者為 education 就進來帶入縣市審核金額
//if($examine == '2'){
if($class == '1' ){
	$basedata="100element_examine_money";
}else{
	$basedata="100junior_examine_money";
}			
$sql = "select  *  from ".$basedata." where account like '$username'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$city_examine_1 = $row[7];//縣市審核學生宿舍經常門
	$city_examine_2 = $row[8];//縣市審核學生宿舍資本門
	$city_examine_3 = $row[30];//縣市審核教師宿舍經常門
	$city_examine_4 = $row[31];//縣市審核教師宿舍資本門
	$city_total_1 = $city_examine_1 + $city_examine_2;//縣市審核學生合計
	$city_total_2 = $city_examine_3 + $city_examine_4;//縣市審核教師合計
	$city_total = $city_examine_1 + $city_examine_2 + $city_examine_3 + $city_examine_4;
}
?> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p>補助項目四：修繕離島或偏遠地區宿舍</p>
<form name="form" method="post" action="examine_allowance4_finish.php?id=<? echo $id;?>">
●學校：<? echo $school.' '.$school_name;?>
<p>
※符合指標：<br>
<? 
//符合指標
if($class == '1' ){
			$basedata="100element_point";
	}
	else{
			$basedata="100junior_point";
		}			
$sql = "select  *  from ".$basedata." where account like '$id'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$p1_1 = $row[1];	//指標1-1
	$p1_2 = $row[2];	//指標1-2
	$p1_3 = $row[3];	//指標1-3
	$p5_1 = $row[11];	//指標5-1
	$p5_2 = $row[13];	//指標5-2
	$p6_1 = $row[9];	//指標6-1
	$p6_2 = $row[9];	//指標6-2
}
if($p1_1 == 1){
	echo  '　　　'.'指標1-1'.'<br>';
}
if($p1_2 == 1){
	echo  '　　　'.'指標1-2'.'<br>';
}
if($p1_3 == 1){
	echo  '　　　'.'指標1-3'.'<br>';
}
if($p5_1 == 1){
	echo  '　　　'.'指標5-1'.'<br>';
}
if($p5_2 == 1){
	echo  '　　　'.'指標5-2'.'<br>';
}
if($p6_1 == 1){
	echo  '　　　'.'指標6-1'.'<br>';
}
if($p6_2 == 1){
	echo  '　　　'.'指標6-2'.'<br>';
}
?>
<br>
<?
//意見審核
	if($class == '1' ){
			$basedata="100element_examine_a4";
	}
	else{
			$basedata="100junior_examine_a4";
		}			
$sql = "select  *  from ".$basedata." where account like '$id'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){		
	$city1 = $row[1];	//縣市審核學生宿舍經常門
	$city2 = $row[2];	//縣市審核學生宿舍資本門
	$city3 = $row[7];	//縣市審核教師宿舍經常門
	$city4 = $row[8];	//縣市審核教師宿舍資本門
	$edu1 = $row[4];	//教育部審學生宿舍經常門
	$edu2 = $row[5];	//教育部審學生宿舍資本門
	$edu3 = $row[9];	//教育部審教師宿舍經常門
	$edu4 = $row[10];	//教育部審教師宿舍資本門
	$suggestion1 = $row[3];//縣市意見
	$suggestion2 = $row[6];//教育部意見
	$pass = $row[12];	//教育部審核通過
}
?>
※申請資料與審核：<br>
●學生宿舍申請經費<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($c);?></font>元。
<? if($examine == '2') echo '縣市審核'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($city1+$city2).'</font>元。'?><br>
&nbsp;&nbsp;&nbsp;&nbsp;
●申請經常門<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($a);?></font>元，<? if($examine == '2') echo '縣市審核'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($city1).'</font>元。'?>複核金額<input type="text" size="6" name="money_1" value= "<? 
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
		if($city_examine_1 != $edu1){
			echo $edu1;
		}else{
			echo $city_examine_1;
		}
	}else{
		echo $edu1;
	}
}
?>"/>元。<br>
&nbsp;&nbsp;&nbsp;&nbsp;
●申請資本門<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($b);?></font>元，<? if($examine == '2') echo '縣市審核'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($city2).'</font>元。'?>複核金額<input type="text" size="6" name="money_2" value= "<? 
if($examine == '1' ){
	if($city2 != 0 ){
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
		if($city2 != $edu2){
			echo $edu2;
		}else{
			echo $city2;
		}
	}else{
		echo $edu2;
	}
}?>"/>元。<br>
●教師宿舍申請經費<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($f);?></font>元。
<? if($examine == '2') echo '縣市審核'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($city3+$city4).'</font>元。'?><br>
&nbsp;&nbsp;&nbsp;&nbsp;
●申請經常門<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($d);?></font>元，<? if($examine == '2') echo '縣市審核'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($city3).'</font>元。'?>複核金額<input type="text" size="6" name="money_3" value= "<? 
if($examine == '1' ){
	if($city1 != 0){
		if($d != $city3){
			echo $city3;
		}else{
			echo $d;
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
?>"/>元。<br>
&nbsp;&nbsp;&nbsp;&nbsp;
●申請資本門<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($e);?></font>元，<? if($examine == '2') echo '縣市審核'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($city4).'</font>元。'?>複核金額<input type="text" size="6" name="money_4" value= "<? 
if($examine == '1' ){
	if($city4 != 0 ){
		if($b != $city4){
			echo $city4;
		}else{
			echo $e;
		}
	}else{
		echo $city4;
	}
}
if($examine == '2' ){
	if($edu4 != 0){
		if($city_examine_4 != $edu4){
			echo $edu4;
		}else{
			echo $city_examine_4;
		}
	}else{
		echo $edu4;
	}
}?>"/>元。
<p>
<? if($examine == '2') echo '●縣市審核意見：'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.$suggestion1.'</font><br>'?>
●審核意見說明：<textarea name="other" cols="40" rows="2"><? if($examine == '1'){ echo $suggestion1;}
														else echo $suggestion2;?></textarea>
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
	$file_1 = $row[18];
	$file_1_name = ' (申請表)';
	$file_2 = $row[19];
	$file_2_name = ' (計畫)';
}
//列出狀態訊息
if ($file_1 == ''){echo "檔案狀態：<font color=red>未上傳".$file_1_name."</font><br>";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/101/'.$school.'/'.$file_1.'" target="_new">'.$file_1.$file_1_name.'</a><br>';}
if ($file_2 == ''){echo "檔案狀態：<font color=red>未上傳".$file_2_name."</font><br>";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/101/'.$school.'/'.$file_2.'" target="_new">'.$file_2.$file_2_name.'</a><br>';}
?>
<p>
<!--審查退件功能  -->
	<input type="hidden" name="sid"  value="<? echo $school; ?>">
	<input type="hidden" name="allowance4"  value="<? echo "allowance4"; ?>">
<label>
	<input type="radio" name="allowance4_pass"  value="1" id="1" <? if ($pass == '1') echo 'checked';?>/>
    審核通過</label>
<label>
    <input type="radio" name="allowance4_pass"  value="2" id="2" <? if ($pass == '2') echo 'checked';?>/>
    審核不通過且列入退件名單</label>
<br><br>
    <INPUT TYPE="button" VALUE="返回(取消)" onClick="history.go(-1)">
	<input type="submit" name="button" value="　　確認　　" />
<!--結束 -->
</form>
<?php
include "../../footer.php";
?>
