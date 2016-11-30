<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
//include "./checkdate.php";
//$date = date ("Y-m-d" , mktime(date('Y-m-d')));
$date = date("Y-m-d");
echo "【今天日期：";
echo $date."】";
$school = $_GET['school'];

//教育部核定金額
$sql = "select  *  from 101school_final where account like '$school'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
{
	$schoolname = $row[0]." ".$row[2].$row[4].$row[5];
}

?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p>
<font color="blue"><strong>102年度執行成果填報  <? echo $schoolname; ?></strong></font><br />
<strong>項目：三、修繕離島或偏遠地區師生宿舍  </strong><a href="/edu/modules/xSchoolForm/download/allowance-03.htm" target="_blank">(補助項目說明)</a>

<div>
<?
//讀取上傳檔案資料
$sql = "select  effect_a3_1, effect_a3_2, effect_a3_3, effect_a3_4  from   102school_upload_name where account like '$school'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$file_1 = $row[0];
	$file_2 = $row[1];
	$file_3 = $row[2];
	$file_4 = $row[3];
}
?>
<strong>※上傳核定後執行計畫</strong> <font color=red>(必填)</font>：請彙整於於Excel檔，若各縣市政府教育局處若有特殊檔案格式要求，請以各縣市要求檔案格式為準。
<form action="file_up_102.php" method="post" enctype="multipart/form-data" target="_self">
    <input type="hidden" name="max_file_size" value="102400000">
    <input type="hidden" name="table" value="e_3_1">
    <input type="file" name="myfile">
<!---    <input type="submit" value="上傳核定後執行計畫">--->
<br /><? if ($file_1 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/102/'.$school.'/'.$file_1.'" target="_new">'.$file_1.'</a>';}?>
  </form>
<br />
<strong>※上傳核定後執行經費概算表</strong> <font color=red>(必填)</font>：請彙整於Word檔
<form action="file_up_102.php" method="post" enctype="multipart/form-data" target="_self">
    <input type="hidden" name="max_file_size" value="102400000">
    <input type="hidden" name="table" value="e_3_2">
    <input type="file" name="myfile">
<br /><? if ($file_2 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/102/'.$school.'/'.$file_2.'" target="_new">'.$file_2.'</a>';}?>
</form>
<strong>※上傳執行成果照片</strong> (若無免填)：請彙整於Word檔，並填寫圖片說明後上傳，勿超過10MB。<br />
<form action="file_up_102.php" method="post" enctype="multipart/form-data" target="_self">
    <input type="hidden" name="max_file_size" value="102400000">
    <input type="hidden" name="table" value="e_3_3">
    <input type="file" name="myfile">
<br /><? if ($file_3 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/102/'.$school.'/'.$file_3.'" target="_new">'.$file_3.'</a>';}?>
  </form>

</div>
<p>
<input type="button" value="返回上一頁" onClick="history.go(-1)">
<p>
<font color="blue"><strong>※ 注意事項：</strong></font><br />
1. <strong>每個上傳檔案請勿超過10MB。</strong>請適當壓縮圖片適合於螢幕呈現即可。<br />
<?php
include "../../footer.php";
?>