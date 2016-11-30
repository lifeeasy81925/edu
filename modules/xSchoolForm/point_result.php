<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
include "./checkdate.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<?
include "allowance_set.php";
include "allowance_clear.php";
?>
<?
//讀取上傳檔案資料
if($class == '1' ){			
	$sql = "select  *  from   100element_upload_name where account like '$username'";
}else{
	$sql = "select  *  from   100junior_upload_name where account like '$username'";
}
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$file_p1 = $row[1];
	$file_p1_name = ' (原住民學生名冊)';
	$file_p1_show = '1';
	$file_p2 = $row[2];
	$file_p2_name = ' (各類學生名冊)';
	$file_p2_show = '1';
	$file_p4 = $row[3];
	$file_p4_name = ' (中途輟學學生名冊)';
	$file_p4_show = '1';
	$file_p6 = $row[5];
	$file_p6_name = ' (近三年教師異動名冊)';
	$file_p6_show = '1';
}
?>
<form name="form" method="post" action="print_point.php">
<br />根據您的填答，系統整理貴校符合之指標項目為：<br>
<p>
※符合指標項目：<br>
<? 
if($a ==1){
	echo '<br>指標一-1'.'　';
	if ($file_p1 == '' && $file_p1_show == '1'){
		echo "指標一檔案：<font color=red>未上傳".$file_p1_name."</font>";
		$file_p1_show = '0';
	} elseif ( $file_p1_show == '1') {
		echo '指標一檔案：<font color=blue>已上傳</font>，'.'<a href="./upload/101/'.$username.'/'.$file_p1.'" target="_new">'.$file_p1.$file_p1_name.'</a>';
		$file_p1_show = '0';
	}
}
?>
<?
if($b ==1){
	echo '<br>指標一-2'.'　';
	if ($file_p1 == '' && $file_p1_show == '1'){
		echo "指標一檔案：<font color=red>未上傳".$file_p1_name."</font>";
		$file_p1_show = '0';
	} elseif ( $file_p1_show == '1') {
		echo '指標一檔案：<font color=blue>已上傳</font>，'.'<a href="./upload/101/'.$username.'/'.$file_p1.'" target="_new">'.$file_p1.$file_p1_name.'</a>';
		$file_p1_show = '0';
	}
}
?>
<?
if($c ==1){
	echo '<br>指標一-3'.'　';
	if ($file_p1 == '' && $file_p1_show == '1'){
		echo "指標一檔案：<font color=red>未上傳".$file_p1_name."</font>";
		$file_p1_show = '0';
	} elseif ( $file_p1_show == '1') {
		echo '指標一檔案：<font color=blue>已上傳</font>，'.'<a href="./upload/101/'.$username.'/'.$file_p1.'" target="_new">'.$file_p1.$file_p1_name.'</a>';
		$file_p1_show = '0';
	}
}
?>
<?
if($d ==1){
	echo '<br>指標一-4'.'　';
	if ($file_p1 == '' && $file_p1_show == '1'){
		echo "指標一檔案：<font color=red>未上傳".$file_p1_name."</font>";
		$file_p1_show = '0';
	} elseif ( $file_p1_show == '1') {
		echo '指標一檔案：<font color=blue>已上傳</font>，'.'<a href="./upload/101/'.$username.'/'.$file_p1.'" target="_new">'.$file_p1.$file_p1_name.'</a>';
		$file_p1_show = '0';
	}
}
?>
<?
if($e ==1){
	echo '<br>指標二-1'.'　';
	if ($file_p2 == '' && $file_p2_show == '1'){
		echo "指標二檔案：<font color=red>未上傳".$file_p2_name."</font>";
		$file_p2_show = '0';
	} elseif ( $file_p2_show == '1') {
		echo '指標二檔案：<font color=blue>已上傳</font>，'.'<a href="./upload/101/'.$username.'/'.$file_p2.'" target="_new">'.$file_p2.$file_p2_name.'</a>';
		$file_p2_show = '0';
	}
}
?>
<?
if($f ==1){
	echo '<br>指標二-2'.'　';
	if ($file_p2 == '' && $file_p2_show == '1'){
		echo "指標二檔案：<font color=red>未上傳".$file_p2_name."</font>";
		$file_p2_show = '0';
	} elseif ( $file_p2_show == '1') {
		echo '指標二檔案：<font color=blue>已上傳</font>，'.'<a href="./upload/101/'.$username.'/'.$file_p2.'" target="_new">'.$file_p2.$file_p2_name.'</a>';
		$file_p2_show = '0';
	}
}
?>
<?
if($j ==1){
	echo '<br>指標二-3'.'　';
	if ($file_p2 == '' && $file_p2_show == '1'){
		echo "指標二檔案：<font color=red>未上傳".$file_p2_name."</font>";
		$file_p2_show = '0';
	} elseif ( $file_p2_show == '1') {
		echo '指標二檔案：<font color=blue>已上傳</font>，'.'<a href="./upload/101/'.$username.'/'.$file_p2.'" target="_new">'.$file_p2.$file_p2_name.'</a>';
		$file_p2_show = '0';
	}
}
?>
<? if($g ==1){echo '<br>指標三';} ?>    
<?
if($h ==1){
	echo '<br>指標四'.'　　';
	if ($file_p4 == '' && $file_p4_show == '1'){
		echo "指標四檔案：<font color=red>未上傳".$file_p4_name."</font>";
		$file_p4_show = '0';
	} elseif ( $file_p4_show == '1') {
		echo '指標四檔案：<font color=blue>已上傳</font>，'.'<a href="./upload/101/'.$username.'/'.$file_p4.'" target="_new">'.$file_p4.$file_p4_name.'</a>';
		$file_p4_show = '0';
	}
}
?>     
<? if($k ==1){echo '<br>指標五-1';} ?>
<? if($m ==1){echo '<br>指標五-2';} ?>
<? if($n ==1){echo '<br>指標五-3';} ?>
<?
if($i ==1){
	echo '<br>指標六-1'.'　';
/*	if ($file_p6 == '' && $file_p6_show == '1'){
		echo "指標六檔案：<font color=red>未上傳".$file_p6_name."</font>";
		$file_p6_show = '0';
	} elseif ( $file_p6_show == '1') {
		echo '指標六檔案：<font color=blue>已上傳</font>，'.'<a href="./upload/101/'.$username.'/'.$file_p6.'" target="_new">'.$file_p6.$file_p6_name.'</a>';
		$file_p6_show = '0';
	}
*/
}
?>
<?
if($l ==1){
	echo '<br>指標六-2'.'　';
/*	if ($file_p6 == '' && $file_p6_show == '1'){
		echo "指標六檔案：<font color=red>未上傳".$file_p6_name."</font>";
		$file_p6_show = '0';
	} elseif ( $file_p6_show == '1') {
		echo '指標六檔案：<font color=blue>已上傳</font>，'.'<a href="./upload/101/'.$username.'/'.$file_p6.'" target="_new">'.$file_p6.$file_p6_name.'</a>';
		$file_p6_show = '0';
	}
*/
}
?>
<br><br />
※得申請補助項目：<br />
<? $item = 0; ?>
<? //補助項目一
 if($a_1 == 1){
	echo '<a href="allowance1.php" target="_self">一、推展親職教育活動</a><br>';
	$item = 1;
}?>
<? //補助項目二 
 if($a_2 == 1 ){
 	echo '<a href="allowance2.php" target="_self">二、補助原住民及離島地區學校辦理學生學習輔導</a><br>';
	$item = 1;
 }
?>
<? //補助項目三
 if($a_3 == 1){
 	echo '<a href="allowance3.php" target="_self">三、補助學校發展教育特色</a><br>';
	$item = 1;
 }
?>
<? //補助項目四-1
 if($a_4_1 == 1){
 	echo '<a href="allowance4.php" target="_self">四-1、修繕離島或偏遠地區學生宿舍</a><br>';
	$item = 1;
 }
?>
<? //補助項目四-2
 if($a_4_2 == 1){
 	echo '<a href="allowance4.php" target="_self">四-2、修繕離島或偏遠地區教師宿舍</a><br>';
	$item = 1;
 }
?>
<? //補助項目五 
 if($a_5 == 1){
 	echo '<a href="allowance5.php" target="_self">五、充實學校基本教學設備</a><br>';
	$item = 1;
 }
?>
<? //補助項目六 
 if($a_6 == 1){
 	echo '<a href="allowance6.php" target="_self">六、發展原住民教育文化特色及充實設備器材</a><br>';
	$item = 1;
 }
?>
<? //補助項目七 
 if($a_7 == 1){
 	echo '<a href="allowance7.php" target="_self">七、補助交通不便地區學校交通車</a><br>';
	$item = 1;
 }
?>
<? //補助項目八 
 if($a_8 == 1){
	echo '<a href="allowance8.php" target="_self">八、整修學校社區化活動場所</a><br>';
	$item = 1;
 } else if($for_a8r1_1 == 1){
	//echo '八、貴校未曾於85-91年度獲補助興建學校社區化活動場所，故不得申請修繕經費<br><br>';
 }
?>
<? //無可申請補助項目
	if ($item == 0) {
		echo '<font color=blue>貴校無可申請項目</font><br>';
	}
?>
<br>
<font color=red>註1：</font><font color=red>硬體項目（補助項目四、五、七、八）最多以二項為原則。<br />
註2：不申請項目金額請填寫「0」。</font><br><br />
※點選「確認」進入「指標界定調查紀錄表」列印，並逐一填寫可申請補助項目。<br />
  <INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
  <input name="button" type="submit"  value = "　確認　" onClick="return toCheck();"/>
<!-- 檢查檔案是否已上傳(指標一、二、六) -->
<script language="JavaScript">
function toCheck() {
	if ((<? echo $a;?> == 1 || <? echo $b;?> == 1 || <? echo $c;?> == 1 || <? echo $d;?> == 1) && ('<? echo $file_p1;?>' == '')) {
    	alert('請回指標一填寫頁面，上傳「指標一檔案」！');
		return false;
    }

	if ((<? echo $e;?> == 1 || <? echo $f;?> == 1) && ('<? echo $file_p2;?>' == '')) {
    	alert('請回指標二填寫頁面，上傳「指標二檔案」！');
		return false;
    }

	if ((<? echo $h;?> == 1) && ('<? echo $file_p4;?>' == '')) {
    	alert('請回指標四填寫頁面，上傳「指標四檔案」！');
		return false;
    }

/*	if ((<? echo $i;?> == 1 || <? echo $l;?> == 1) && ('<? echo $file_p6;?>' == '')) {
    	alert('請回指標六填寫頁面，上傳「指標六檔案」！');
		return false;
    } */
    return true;
}
</script>    
<?php include "../xSchoolForm/print_button.php"; ?>
</form>
<?php
include "../../footer.php";
?>