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
	$city = $row[1];
	$cityman = $row[2];
	$examine = $row[3];
	$cityno = $row[4];
}
$id = $_GET["id"];
echo $username;
echo $city;
echo $cityman;
//include "./checkdate.php";

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
	$basedata="100element_allowance2";
}else{
	$basedata="100junior_allowance2";
}			
$sql = "select  *  from ".$basedata." where account like '$id'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$a = $row[13];//課後學習
	$b = $row[12];//金額
	$c = $row[14];//寒暑假學習
	$d = $row[15];//金額
	$e = $row[16];//夜間學習
	$f = $row[17];//金額
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
		$city_examine_1 = $row[3];//縣市審核金額1
		$city_examine_2 = $row[4];//縣市審核金額2
		$city_examine_3 = $row[5];//縣市審核金額3
	}
}
?> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p>補助項目二：學生學習輔導</p>
<form name="form" method="post" action="examine_allowance2_finish.php?id=<? echo $id;?>">
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
	$p5_1 = $row[11];	//指標5-1
}
if($p1_1 == '1'){
	echo  '　　　'.'指標1-1'.'<br>';
}
if($p5_1 == '1'){
	echo  '　　　'.'指標5-1'.'<br>';
}

?>
<br>
<?
//意見審核
if($class == '1' ){
	$basedata="100element_examine_a2";
}else{
	$basedata="100junior_examine_a2";
}			
$sql = "select  *  from ".$basedata." where account like '$id'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$city1 = $row[1];
	$city2 = $row[3];
	$city3 = $row[2];
	$edu1 = $row[5];
	$edu2 = $row[7];
	$edu3 = $row[6];												
	$suggestion1 = $row[4];//教育局
	$suggestion2 = $row[8];//教育部
	$pass = $row[10];//教育部審核通過				
}
?>
※申請資料與審核：<br>  
●申請總經費<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($b+$d+$f);?></font>元。<br>
●申請課後學習輔導<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $a;?></font>班，申請經費<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($b);?></font>元。<? if($examine == '2') echo '縣市審核'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.$city_examine_1.'</font>元。'?>
<br /><b>--複核金額</b><input type="text" size="5" name="assist" value= "<? if($examine == '1' ) {
																if($city1 != 0){
																if($b= $city1) echo $city1;
																 		else echo $b;
																}
																	else echo $city1;	
																 }
																 if($examine == '2' ){
																 if($edu1 != 0){
																  	if($city_examine_1 != $edu1) echo $edu1;
																 		else echo $city_examine_1;
																 } 
																	else echo $edu1;
																 }
																 ?>"/>元。<br>
●寒暑假學習輔導<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $c;?></font>班，申請經費<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($d);?></font>元。<? if($examine == '2') echo '縣市審核'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.$city_examine_2.'</font>元。'?>
<br /><b>--複核金額</b><input type="text" size="5" name="holidayassist" value= "<?   
																 if($examine == '1' ) {
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
●住校生夜間學習輔導<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $e;?></font>班，申請經費<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($f);?></font>元。<? if($examine == '2') echo '縣市審核'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.$city_examine_3.'</font>元。'?>
<br /><b>--複核金額</b><input type="text" size="5" name="nightassist" value= "<?  if($examine == '1' ) {
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
	$file_1 = $row[10];
	$file_1_name = ' (計畫)';
	$file_2 = $row[11];
	$file_2_name = ' (經費概算表)';
}
//列出狀態訊息
if ($file_1 == ''){echo "檔案狀態：<font color=red>未上傳".$file_1_name."</font><br>";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/101/'.$school.'/'.$file_1.'" target="_new">'.$file_1.$file_1_name.'</a><br>';}
if ($file_2 == ''){echo "檔案狀態：<font color=red>未上傳".$file_2_name."</font><br>";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/101/'.$school.'/'.$file_2.'" target="_new">'.$file_2.$file_2_name.'</a><br>';}
?>
<p>
<!--審查退件功能  -->
	<input type="hidden" name="sid"  value="<? echo $school; ?>">
	<input type="hidden" name="allowance2"  value="<? echo "allowance2"; ?>">
<label>
	<input type="radio" name="allowance2_pass"  value="1" id="1" <? if ($pass == '1') echo 'checked';?>/>
    審核通過</label>
<label>
    <input type="radio" name="allowance2_pass"  value="2" id="2" <? if ($pass == '2') echo 'checked';?>/>
    審核不通過且列入退件名單</label>
<br><br>
    <INPUT TYPE="button" VALUE="返回(取消)" onClick="history.go(-1)">
	<input type="submit" name="button" value="　　確認　　" />
<!--結束 -->
</form>
<?php
include "../../footer.php";
?>