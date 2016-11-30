<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
include "./checkdate.php";
?>
<?
if($class == '1' ){			
$sql = "select  *  from  100element_point345 where account like '$username'";
}
else{
$sql = "select  *  from  100junior_point345 where account like '$username'";
}

$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
        {
			$school_area_0 = $row[4];// 
			$school_area_1 = $row[5];//
			$school_area_2 = $row[6];//
			$school_area_3 = $row[7];//
			$school_area_4 = $row[8];//
			$school_area_5 = $row[9];//
			$school_area_6 = $row[10];//
		 
        }
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<a href="school_index.php">返回申請首頁</a>
<form name="form" method="post" action="point5_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><font color="blue"><strong>指標五</strong></font>
<p>
※ 學校所在地區<br>
五－１：<label><input type="checkbox" name="school_area_0" value="1" id="school_area_0" <? if ($school_area_0=='1') echo 'checked';?>>離島</label><br>
五－２：<label><input type="checkbox" name="school_area_1" value="1" id="school_area_1" <? if ($school_area_1=='1') echo 'checked';?>>學校所在地區，無公共交通工具到達者</label><br>
　　　　<label><input type="checkbox" name="school_area_2" value="1" id="school_area_2" <? if ($school_area_2=='1') echo 'checked';?>>學校距離公共交通工具站牌，達五公里以上者</label><br>
　　　　<label><input type="checkbox" name="school_area_3" value="1" id="school_area_3" <? if ($school_area_3=='1') echo 'checked';?>>學區內之社區距離學校5公里以上，且無公共交通工具可抵達學校者</label><br>
　　　　<label><input type="checkbox" name="school_area_4" value="1" id="school_area_4" <? if ($school_area_4=='1') echo 'checked';?>>公共交通工具到學校所在地區每天少於4班次者</label><br>
五－３：<label><input type="checkbox" name="school_area_5" value="1" id="school_area_5" <? if ($school_area_5=='1') echo 'checked';?>>91學年度(91年8月1日)以前，因裁併校後，學區幅員遼闊須交通車<br />　　　　　接送學生上下學之學校</label><br>
　　無：<label><input type="checkbox" name="school_area_6" value="1" id="school_area_6" <? if ($school_area_6=='1') echo 'checked';?>>本校完全不符合上述各項條件</label>
    <br><br>
    <INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
    <input type="submit" name="button" value="儲存並到下一頁" />

<!-- 檢查空值 -->
<script language="JavaScript">
function toCheck() {
	//檢驗是否核選
	var check00 = (document.form.school_area_0.checked || document.form.school_area_1.checked || document.form.school_area_2.checked ||document.form.school_area_3.checked || document.form.school_area_4.checked || document.form.school_area_5.checked || document.form.school_area_6.checked);
	var check01 = document.form.school_area_0.checked && (document.form.school_area_1.checked || document.form.school_area_2.checked ||document.form.school_area_3.checked || document.form.school_area_4.checked || document.form.school_area_5.checked || document.form.school_area_6.checked);
	var check02 = document.form.school_area_1.checked && (document.form.school_area_0.checked || document.form.school_area_2.checked ||document.form.school_area_3.checked || document.form.school_area_4.checked || document.form.school_area_5.checked || document.form.school_area_6.checked);
	var check03 = document.form.school_area_2.checked && (document.form.school_area_0.checked || document.form.school_area_1.checked || document.form.school_area_3.checked || document.form.school_area_4.checked || document.form.school_area_5.checked || document.form.school_area_6.checked);
	var check04 = document.form.school_area_3.checked && (document.form.school_area_0.checked || document.form.school_area_1.checked || document.form.school_area_2.checked || document.form.school_area_4.checked || document.form.school_area_5.checked || document.form.school_area_6.checked);
	var check05 = document.form.school_area_4.checked && (document.form.school_area_0.checked || document.form.school_area_1.checked || document.form.school_area_2.checked ||document.form.school_area_3.checked ||  document.form.school_area_5.checked || document.form.school_area_6.checked);
	var check06 = document.form.school_area_5.checked && (document.form.school_area_0.checked || document.form.school_area_1.checked || document.form.school_area_2.checked ||document.form.school_area_3.checked || document.form.school_area_4.checked || document.form.school_area_6.checked);
// 未勾選
	if ( !check00 ) {
		alert('請勾選「學校所在地區」！\n若無請勾選「本校完全不符合上述各項條件」。');
		document.form.school_area_6.focus();
		return false;
	}
// 勾選1，且有重複
	if ( check01 ) {
		alert('請勿重複勾選。');
		document.form.school_area_0.focus();
		return false;
	}
// 勾選2，且有重複
	if ( check02 ) {
		alert('請勿重複勾選。');
		document.form.school_area_1.focus();
		return false;
	}	
// 勾選3，且有重複
	if ( check03 ) {
		alert('請勿重複勾選。');
		document.form.school_area_2.focus();
		return false;
	}
// 勾選4，且有重複
	if ( check04 ) {
		alert('請勿重複勾選。');
		document.form.school_area_3.focus();
		return false;
	}
// 勾選5，且有重複
	if ( check05 ) {
		alert('請勿重複勾選。');
		document.form.school_area_4.focus();
		return false;
	}	
// 勾選6，且有重複
	if ( check06 ) {
		alert('請勿重複勾選。');
		document.form.school_area_5.focus();
		return false;
	}
	
	
	
	return true;
}
</script>   
<?php include "../xSchoolForm/print_button.php"; ?>
</form>

<!-- 隱藏指標五檔案下載與上傳
<a href="./download/指標5_交通狀況調查表.xls">下載：交通狀況調查表</a>

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
	$file_1 = $row[4];
}
?>
  <form action="file_ok.php" method="post" enctype="multipart/form-data" target="_self">
    <input type="hidden" name="max_file_size" value="102400000">
    <input type="hidden" name="table" value="p_5">
    <input type="file" name="myfile">
    <input type="submit" value="上傳現在交通車狀況"> (學校無交通車者免上傳)
<br /><? if ($file_1 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_1.'" target="_new">'.$file_1.'</a>';}?>

  </form>
  <br>※ 無論上傳檔名為何，系統會自動將檔名編碼為：年度_學校代號_文件項目.副檔名
  <br>　 例如：彰化縣民生國小代碼：074602
  <br>　 上傳後的檔案名稱為：101_074602_p5.xls(或.doc)
</div>
隱藏結束 -->
<?php
include "../../footer.php";
?>