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
	$basedata="100element_allowance1";
}else{
	$basedata="100junior_allowance1";
}			
$sql_allowance = "select  *  from ".$basedata." where account like '$id'";
$result_allowance = mysql_query($sql_allowance);
while($row = mysql_fetch_row($result_allowance)){
	$a = $row[12];	//親子講座幾場
	$b = $row[13];	//預計參加人數
	$c = $row[11];	//申請經費
	$d = $row[23];	//個別家庭訪視
	$e = $row[22];	//申請經費
}
		
//如果使用者為 education 就進來帶入縣市審核金額
if($examine == '2'){
	if($class == '1' ){
		$basedata="100element_examine_money";
	}else{
		$basedata="100junior_examine_money";
	}			
	$sql_money = "select  *  from ".$basedata." where account like '$id'";
	$result_money = mysql_query($sql_money);
	while($row = mysql_fetch_row($result_money)){
		$city_examine_1 = $row[1];//縣市審核金額1
		$city_examine_2 = $row[2];//縣市審核金額2
	}	
}
?> 
<p>補助項目一：推展親職教育活動</p>
<form name="form" method="post" action="examine_allowance1_finish.php?id=<? echo $id;?>">
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
$sql_point = "select  *  from ".$basedata." where account like '$id'";
$result_point = mysql_query($sql_point);
while($row = mysql_fetch_row($result_point)){
	$p1_1 = $row[1];	//指標1-1
	$p1_2 = $row[2];	//指標1-2
	$p1_3 = $row[3];	//指標1-3
	$p1_4 = $row[4];	//指標1-4
	$p2_1 = $row[5];	//指標2-1
	$p2_2 = $row[6];	//指標2-2
	$p4 = $row[7];		//指標4
	$p5_1 = $row[11];	//指標5-1
	$p5_2 = $row[13];	//指標5-2
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
if($p1_4 == 1){
	echo  '　　　'.'指標1-4'.'<br>';
}
if($p2_1 == 1){
	echo  '　　　'.'指標2-1'.'<br>';
}
if($p2_2 == 1){
	echo  '　　　'.'指標2-2'.'<br>';
}
if($p4 == 1){
	echo  '　　　'.'指標4'.'<br>';
}
if($p5_1 == 1){
	echo  '　　　'.'指標5-1'.'<br>';
}
if($p5_2 == 1){
	echo  '　　　'.'指標5-2'.'<br>';
}

//記錄輸入過的資料
if($class == '1' ){
	$basedata="100element_examine_a1";
}else{
	$basedata="100junior_examine_a1";
}			
$sql_examine = "select  *  from ".$basedata." where account like '$id'";
$result_examine = mysql_query($sql_examine);
while($row = mysql_fetch_row($result_examine)){
	$city1 = $row[1];
	$city2 = $row[2];
	$edu1 = $row[4];
	$edu2 = $row[5];
	$suggestion1 = $row[3];//教育局意見
	$suggestion2 = $row[6];//教育部意見
	$pass = $row[8];//教育部審核通過
}
?>
<br />
※申請資料與審核：<br>
●親職講座<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $a; ?></font>場，預計參加人數<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $b;?></font>人，申請經費<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($c);?></font>元。<? if($examine == '2') echo '縣市審核'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($city_examine_1).'</font>元。'?>
<br /><b>--複核金額</b><input type="text" size="5" name="lec_money" value= "<? 
																if($examine == '1' ) {//if1
																	if($city1 !=0){//if2
																		if($c!= $city1 ) 
																				echo $city1;
																 		else echo $c;
																		}//if2
																	else echo $city1;
																 }//if1
																 if($examine == '2' ) {//if1
																	if($edu1 !=0){//if2
																		if($city_examine_1 != $edu1 ) 
																				echo $edu1;
																 		else echo $city_examine_1;
																		}//if2
																	else echo $edu1;
																 }//if1
																 ?>"/>元。<br>
●個別家庭訪視<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $d;?></font>人次，申請經費<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($e);?></font>元。
<? if($examine == '2') echo '縣市審核'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($city_examine_2).'</font>元。'?>
<br /><b>--複核金額</b><input type="text" size="5" name="fam_money" value= "<?  if($examine == '1' ) {
																	if($city2 !=0){
																		if($e != $city2) echo $city2;
																 			else echo $e;
																	}
																	else echo $city2;
																 }
																 if($examine == '2' ){
																 	if($edu2 !=0 ){
																		if($city_examine_2 != $edu2) echo $edu2;
																 			else echo $city_examine_2;
																	} 
																 	else echo $edu2;
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
	$file_1 = $row[6];
	$file_1_name = ' (計畫)';
	$file_2 = $row[7];
	$file_2_name = ' (經費概算表)';
}
//列出狀態訊息
if ($file_1 == ''){echo "檔案狀態：<font color=red>未上傳".$file_1_name."</font><br>";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/101/'.$school.'/'.$file_1.'" target="_new">'.$file_1.$file_1_name.'</a><br>';}
if ($file_2 == ''){echo "檔案狀態：<font color=red>未上傳".$file_2_name."</font><br>";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/101/'.$school.'/'.$file_2.'" target="_new">'.$file_2.$file_2_name.'</a><br>';}
?>
<p>
<!--審查退件功能  -->
	<input type="hidden" name="sid"  value="<? echo $school; ?>">
	<input type="hidden" name="allowance1"  value="<? echo "allowance1"; ?>">
<label>
	<input type="radio" name="allowance1_pass"  value="1" id="1" <? if ($pass == '1') echo 'checked';?>/>
    審核通過</label>
<label>
    <input type="radio" name="allowance1_pass"  value="2" id="2" <? if ($pass == '2') echo 'checked';?>/>
    審核不通過且列入退件名單</label>
<br><br>
    <INPUT TYPE="button" VALUE="返回(取消)" onClick="history.go(-1)">
	<input type="submit" name="button" value="　　確認　　" />
<!--結束 -->
</form>
<?php
include "../../footer.php";
?>