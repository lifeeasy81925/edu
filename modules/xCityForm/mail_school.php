<?php
include "../../mainfile.php";
include "../../header.php";
session_start();
$date = date("Y-m-d");
$username = $xoopsUser->getVar('uname');
$exname = $xoopsUser->getVar('user_from');
$email = $xoopsUser->getVar('email');
  global $xoopsDB;
  $sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
  $result_city = $xoopsDB -> query($sql) or die($sql);
  
  while($row = mysql_fetch_row($result_city)) {
            $city = $row[1];
			$cityman = $row[2];
			$examine = $row[3];
			}
  echo "管理者：".$exname.'--'.$city.$cityman;
  $id = $_GET["id"];
  //$p1= $_GET["p1"];
  //$p2= $_GET["p2"];
  //$p3= $_GET["p3"];
  //$p4= $_GET["p4"];
  //$p5= $_GET["p5"];
  //$p6= $_GET["p6"];
  $a1= $_GET["a1"];
  $a2= $_GET["a2"];
  $a3= $_GET["a3"];
  $a4= $_GET["a4"];
  $a5= $_GET["a5"];
  $a6= $_GET["a6"];
  $a7= $_GET["a7"];
  
  //取回縣市使用者資料
	$sql = "select edu_users.uname,edu_users.name,edu_users.email,edu_users.user_from,edu_users.user_occ,edu_users.user_aim,edu_users.user_yim,
			school_checkdate.end_date  
			from edu_users INNER JOIN school_checkdate ON edu_users.uname=school_checkdate.account where uname like '$id'";	
	
	$result = mysql_query($sql);
	while($row = mysql_fetch_row($result))
	{
	$name = $row[1]; //單位
	$mail = $row[2]; //mail
	$man = $row[3]; //承辦人姓名
	$work = $row[4]; //職稱
	$tel = $row[5]; //承辦人電話
	$fax = $row[6]; //傳真
	$enddate = $row[7];//結束日期
	}
?>
<script type="text/javascript" src="./datepicker/jquery.js"></script>
 <link rel="stylesheet" href="./datepicker/ui.datepicker.css" type="text/css" media="screen"/>
 <script src="./datepicker/jquery.js"></script>
 <script src="./datepicker/ui.datepicker.js" type="text/javascript" charset="utf-8"></script>	
 <script type="text/javascript" charset="utf-8">
	jQuery(function($){
      	$('#enddate').datepicker({dateFormat: 'yy-mm-dd', showOn: 'both', 
      		buttonImageOnly: true, buttonImage: './datepicker/calendar.gif'});
			});
 </script>
 <hr>
 <form action="mail_send.php" method="post" name="form" onSubmit="return toCheck();">
 <table width="500" border="1">
 審核學校：<? echo $id.$name; ?><br>
 收 件 者：<? echo $man; ?><br>
 職　　稱：<? echo $work; ?><br>
 電子信箱：<? echo $mail; ?><br>
 電　　話：<? echo $tel; ?><br>
 傳　　真：<? echo $fax; ?><br>
 原填報截止日期：<? echo $enddate ?> <br>
 延長填報日期：<input name="enddate" type="text" size="12" maxlegth="12" id="enddate" value="<? echo $enddate;?>"><font color=blue>【縣市自選日期】</font>(限2012-11-20前)
  </table>
<p>
E-Mail通知內容：(內容可自行修改，如加列審核結果或聯繫方式...等；編輯時請按Enter鍵換行)<br>
<textarea name="content" wrap="physical" cols="80" rows="15">
貴校申請教育優先區補助資料初審未通過，請於期限內至教育優先區填報網站修正申請文件。

貴校須補件或修正項目:
<?
/*	if($p1=='2') {echo "指標一,"."審查意見:"."審查委員:".$point_examman;}
	if($p2=='2') {echo "指標二,"."審查意見:"."審查委員:".$point_examman;}
	if($p3=='2') {echo "指標三,"."審查意見:"."審查委員:".$point_examman;}
	if($p4=='2') {echo "指標四,"."審查意見:"."審查委員:".$point_examman;}
	if($p5=='2') {echo "指標五,"."審查意見:"."審查委員:".$point_examman;}
	if($p6=='2') {echo "指標六,"."審查意見:"."審查委員:".$point_examman;}
*/	
if($a1=='2') {
	echo "＊補助項目一：";
	$sql_a1 = "select  a131,a250,a251  from 102allowance1 where account like '$id'";
	$result_a1 = mysql_query($sql_a1);
	while($row = mysql_fetch_row($result_a1)){
		echo $row[0];
		echo "(審查委員：".$row[2]."  聯絡信箱：".$row[1].")      ";
	}
}
if($a2=='2') {
	echo "＊補助項目二：";
	$sql_a2 = "select  a131,a250,a251  from 102allowance2 where account like '$id'";
	$result_a2 = mysql_query($sql_a2);
	while($row = mysql_fetch_row($result_a2)){
		echo $row[0];
		echo "(審查委員：".$row[2]."  聯絡信箱：".$row[1].")      ";
	}
}
if($a3=='2') {
	echo "＊補助項目三：";
	$sql_a3 = "select  a131,a250,a251  from 102allowance3 where account like '$id'";
	$result_a3 = mysql_query($sql_a3);
	while($row = mysql_fetch_row($result_a3)){
		echo $row[0];
		echo "(審查委員：".$row[2]."  聯絡信箱：".$row[1].")      ";
	}
}
if($a4=='2') {
	echo "＊補助項目四：";
	$sql_a4 = "select  a131,a250,a251  from 102allowance4 where account like '$id'";
	$result_a4 = mysql_query($sql_a4);
	while($row = mysql_fetch_row($result_a4)){
		echo $row[0];
		echo "(審查委員：".$row[2]."  聯絡信箱：".$row[1].")      ";
	}
}
if($a5=='2') {
	echo "＊補助項目五：";
	$sql_a5 = "select  a131,a250,a251  from 102allowance5 where account like '$id'";
	$result_a5 = mysql_query($sql_a5);
	while($row = mysql_fetch_row($result_a5)){
		echo $row[0];
		echo "(審查委員：".$row[2]."  聯絡信箱：".$row[1].")      ";
	}
}
if($a6=='2') {
	echo "＊補助項目六：";
	$sql_a6 = "select  a131,a250,a251  from 102allowance6 where account like '$id'";
	$result_a6 = mysql_query($sql_a6);
	while($row = mysql_fetch_row($result_a6)){
		echo $row[0];
		echo "(審查委員：".$row[2]."  聯絡信箱：".$row[1].")      ";
	}
}
if($a7=='2') {
	echo "＊補助項目七：";
	$sql_a7 = "select  a131,a250,a251  from 102allowance7 where account like '$id'";
	$result_a7 = mysql_query($sql_a7);
	while($row = mysql_fetch_row($result_a7)){
		echo $row[0];
		echo "(審查委員：".$row[2]."  聯絡信箱：".$row[1].")      ";
	}
}
	echo ''; 
?>


	<?echo $city;?>政府教育局教育優先區初審小組
	聯絡人:<? echo $exname.'('.$cityman.')'; ?>
	
	信箱:<? echo $email; ?>
	
	教育優先區填報網站：http://210.240.190.99
	退件日期:<? echo $date; ?>
  </textarea><br>
  	<input type="submit" value="送出" name="submit">
	<input type="reset" value="清除" name="reset">
	<input name="id" type="hidden"  value="<? echo $id;?>">
	<input name="email" type="hidden"  value="<? echo $mail;?>">
	<input name="ap" type="hidden"  value="<? if($p1=='2' ||$p2=='2' || $p3=='2'||$p4=='2'||$p5=='2' ||$p6=='2'){ echo "p";}
	else{echo "a";}	?>">

<script language="JavaScript">
  function toCheck() {
    if ( document.form.textfield.value > "2012-11-20" ) {
      alert("填報期限不得晚於2012-11-20");
      document.form.textfield.focus();
      return false;
    }
	return true;
  }
</script>   
	</form>
<?
 include "../../footer.php";
 ?>