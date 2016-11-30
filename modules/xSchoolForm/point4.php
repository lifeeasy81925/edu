<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
include "./checkdate.php";
?>
<?
if($class == '1' ){			
	$sql = "select  *  from  100element_point345 where account like '$username'";
	$basedata="100element_basedata"; //載入學校基本資料用
}
else{
	$sql = "select  *  from  100junior_point345 where account like '$username'";
	$basedata="100junior_basedata"; //載入學校基本資料用	
}

$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$a = $row[3]; //輟學 
	$b = $row[11]; //在籍學生	 
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

<form name="form" method="post" action="point4_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><font color="blue"><strong>指標四</strong></font>
<p>
•上一個學年度中途輟學學生數
    <input type="text" size="6" name="leaving" value="<? if($a =='') echo ''; else echo $a;?>"/> 人<br>
(去年9月1日至今年6月30日) <br><br />

•今年6月1日在籍學生人數
    <input type="text" size="6" name="enrollment" value="<? if($b =='') echo ''; else echo $b;?>"/> 人<br><br />

--指標界定四：中途輟學學生人數，佔當學年度在籍學生人數之3%以上
<br><br />
	<INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
    <input type="submit" name="button" value="儲存並到下一頁" />

<!-- 檢查空值 -->
<script language="JavaScript">
function toCheck() {
	if ( document.form.leaving.value == "" ) {
    	alert("請填寫「中途輟學學生數」！");
		document.form.leaving.focus();
		return false;
    }
    if ( document.form.enrollment.value == "" ) {
		alert("請填寫「在籍學生數」！");
		document.form.enrollment.focus();
		return false;
	}
/*
    if ( document.form.enrollment.value > <? echo $db_allstudent;?> ) {
      alert('「在籍學生數」不得大於學生總數！\n'+'學生總數：'+<? echo $db_allstudent;?>);
      document.form.enrollment.focus();
      return false;
    }
*/
		
    return true;
  }
</script>   
<?php include "../xSchoolForm/print_button.php"; ?>
</form>
<a href="./download/指標4_中途輟學學生名冊.xls">下載：中途輟學學生名冊空白表格</a><br>
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
	$file_1 = $row[3];
}
?>
<form action="file_ok.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="p_4">
	<input type="file" name="myfile">
	<input type="submit" value="上傳中途輟學學生名冊">
<br /><? if ($file_1 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_1.'" target="_new">'.$file_1.'</a>';}?>
</form>
<br>※無論上傳檔名為何，系統會自動將檔名編碼為：年度_學校代號_文件編號.副檔名
<br>　例如：彰化縣民生國小代碼：074602
<br>　上傳後的檔案名稱為：101_074602_p4.xls(或.doc)
</div>
<?php
include "../../footer.php";
?>
