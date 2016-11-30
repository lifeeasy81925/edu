<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
include "./checkdate.php";
?>
<?
if($class == '1' ){			
	$sql = "select  *  from  100element_point12 where account like '$username'"; //載入指標1,2資料用
	$basedata="100element_basedata"; //載入學校基本資料用
}
else{
	$sql = "select  *  from  100junior_point12 where account like '$username'"; //載入指標1,2資料用
	$basedata="100junior_basedata";  //載入學校基本資料用  
}
//載入指標1,2資料用
$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
        {
			$a = $row[1]; 		 
        }
// 載入學校基本資料
$sqlbasedata = "select  *  from ".$basedata." where account like '$username'";
$result = mysql_query($sqlbasedata);
while($row = mysql_fetch_row($result)){
	$db_allstudent = $row[2]; //讀allstudent
}			
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<a href="school_index.php">返回申請首頁</a>
<form name="form" method="post" action="point1_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><font color="blue"><strong>指標一</strong></font>
<p>
※原住民學生數<input type="text" size="6" name="aborigine" value="<? if( $a=='') echo ''; else echo $a;?>"/> 人<p>
--指標界定一-1：一般地區、都會地區、特偏及偏遠地區學校，原住民學生合計佔全校學生總數≧ 40%。<br>
--指標界定一-2：一般地區，原住民學生合計佔全校學生總數≧ 20%。<br>
--指標界定一-3：都會地區學校，原住民學生合計佔全校學生總數≧ 15%。<br> 
--指標界定一-4：全校學生中，原住民學生人數≧ 35人。<br><br />
    <INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
    <input type="submit" name="button" value="儲存並到下一頁" />
<!-- 檢查空值 -->
<script language="JavaScript">
function toCheck() {
	if ( document.form.aborigine.value == "" ) {
    	alert("請填寫「原住民學生數」！");
		document.form.aborigine.focus();
		return false;
    }
    
	if ( document.form.aborigine.value > <? echo $db_allstudent;?> ) {
		alert('「原住民學生數」不得大於學生總數！\n'+'學生總數：'+<? echo $db_allstudent;?>);
		document.form.aborigine.focus();
		return false;
    }
	
    return true;
}
</script>    
<?php include "../xSchoolForm/print_button.php"; ?>
</form>
<a href="./download/指標1_原住民調查表.xls">下載：原住民學生名冊空白表格</a>
<div>
 (若有多頁文件，請合併為一份檔案後上傳)
<?
//讀取上傳檔案資料
if($class == '1' ){			
	$sql = "select  *  from   100element_upload_name where account like '$username'";
}else{
	$sql = "select  *  from   100junior_upload_name where account like '$username'";
}
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$file_1 = $row[1];
}
?>
  <form action="file_ok.php" method="post" enctype="multipart/form-data" target="_self">
    <input type="hidden" name="max_file_size" value="102400000">
    <input type="hidden" name="table" value="p_1">
    <input type="file" name="myfile">
    <input type="submit" value="上傳原住民學生名冊">
<br /><? if ($file_1 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_1.'" target="_new">'.$file_1.'</a>';}?>
</form>
<br>※無論上傳檔名為何，系統會自動將檔名編碼為：年度_學校代號_文件編號.副檔名
<br>　例如：彰化縣民生國小代碼：074602
<br>　上傳後的檔案名稱為：101_074602_p1.xls(或.doc)
</div>
<?php
include "../../footer.php";
?>
	