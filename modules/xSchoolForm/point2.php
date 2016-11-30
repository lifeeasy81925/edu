<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
include "./checkdate.php";
?>
<?
if($class == '1' ){			
	$sql = "select  *  from  100element_point12 where account like '$username'";
	$basedata="100element_basedata"; //載入學校基本資料用
}
else{
	$sql = "select  *  from  100junior_point12 where account like '$username'";
	$basedata="100junior_basedata"; //載入學校基本資料用
}

$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
        {
			$aborigine = $row[1]; //原住民
			$a = $row[2];//低收 
			$b = $row[3];//隔代
			$c = $row[4];//親子差距
			$d = $row[5];//新移民
			$e = $row[6];//abcde
			$f = $row[7];//abcdef
			$g = $row[8];//單寄親 		 
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
<form name="form" method="post" action="point2_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><font color="blue"><strong>指標二</strong></font>
<p>
•A.低收入學生數：<input type="text" size="6" name="lowincome" value="<? if( $a=='') echo ''; else echo $a;?>"/>人<br>
•B.隔代教養學生數：<input type="text" size="6" name="single" value="<? if( $b=='') echo ''; else echo $b;?>"/>人<br>
•C.親子年齡差距45歲以上學生數：<input type="text" size="6" name="difference" value="<? if( $c=='') echo ''; else echo $c;?>"/>人<br>
•D.新移民子女學生數：<input type="text" size="6" name="immigrant" value="<? if( $d=='') echo ''; else echo $d;?>"/>人<br>
•E.單(寄)親家庭學生數：
<input type="text" size="6" name="noparent" value="<? if( $g=='') echo ''; else echo $g;?>"/>人<br>
•F.原住民學生數：<? echo $aborigine; ?>人
<br>
<br>
•A + B + C + D + E，學生數合計<input type="text" size="6" name="abcd" value="<? if( $e=='') echo ''; else echo $e;?>"/>人<br>
　(同一學生多種身分，請勿重複計算)
<br><br>
•A + B + C + D + E + F，學生數合計<input type="text" size="6" name="abcde" value="<? if( $f=='') echo ''; else echo $f;?>"/>人<br>
　(同一學生多種身分，請勿重複計算)
<br><br>
--指標界定二-1：A+B+C+D+E 學生合計人數佔全校學生總數達20%以上<br>
--指標界定二-2：A+B+C+D+E 學生人數合計達60人以上 <br>
--指標界定二-3：原住民學生人數未符合指標1-1、1-2、1-3，但 A+B+C+D+E+F 合計人數佔全校學生總數30%以上者<br><br>
<INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
<input type="submit" name="button" value="儲存並到下一頁" />

<!-- 檢查空值 -->
<script language="JavaScript">
  function toCheck() {
    if ( document.form.lowincome.value == "" ) {
      alert("請填寫「低收入學生數」！");
      document.form.lowincome.focus();
      return false;
    }
    if ( document.form.noparent.value == "" ) {
      alert("請填寫「隔代教養學生數」！");
      document.form.noparent.focus();
      return false;
    }
    if ( document.form.difference.value == "" ) {
      alert("請填寫「親子年齡差距45歲以上學生數」！");
      document.form.difference.focus();
      return false;
    }
    if ( document.form.immigrant.value == "" ) {
      alert("請填寫「新移民子女學生數」！");
      document.form.immigrant.focus();
      return false;
    }
    if ( document.form.single.value == "" ) {
      alert("請填寫「單親家庭學生數」！");
      document.form.single.focus();
      return false;
    }
    if ( document.form.abcd.value == "" ) {
      alert("請填寫「A + B + C + D + E 學生數」！");
      document.form.abcd.focus();
      return false;
    }
    if ( document.form.abcde.value == "" ) {
      alert("請填寫「A + B + C + D + E + F」！");
      document.form.abcde.focus();
      return false;
    }
    if ( document.form.abcd.value*1 > <? echo $db_allstudent;?>*1 ) {
      alert('「A + B + C + D + E 」不得大於學生總數！\n'+'學生總數：'+<? echo $db_allstudent;?>);
      document.form.abcd.focus();
      return false;
    }	
    if ( document.form.abcde.value*1 > <? echo $db_allstudent;?>*1 ) {
      alert('「A + B + C + D + E + F」不得大於學生總數！\n'+'學生總數：'+<? echo $db_allstudent;?>);
      document.form.abcde.focus();
      return false;
    }
    if ((document.form.noparent.value*1 > document.form.abcd.value*1)) {
      alert('「A、B、C、D、E 」任一數字不得大於「A+B+C+D+E」！\n A:_'+document.form.lowincome.value+'_\n B:_'+document.form.single.value+'_\n C:_'+document.form.difference.value+'_\n D:_'+document.form.immigrant.value+'_\n E:_'+document.form.noparent.value+'_\n ABCDE:_'+document.form.abcd.value+'_\n ABCDEF:_'+document.form.abcde.value+'_');
      return false;
    }
    if ((document.form.lowincome.value*1 > document.form.abcd.value*1) || (document.form.noparent.value*1 > document.form.abcd.value*1) || (document.form.difference.value*1 > document.form.abcd.value*1) || (document.form.immigrant.value*1 > document.form.abcd.value*1) || (document.form.single.value*1 > document.form.abcd.value*1)) {
      alert('「A、B、C、D、E 」任一數字不得大於「A+B+C+D+E」！\n A:_'+document.form.lowincome.value+'_\n B:_'+document.form.single.value+'_\n C:_'+document.form.difference.value+'_\n D:_'+document.form.immigrant.value+'_\n E:_'+document.form.noparent.value+'_\n ABCDE:_'+document.form.abcd.value+'_\n ABCDEF:_'+document.form.abcde.value+'_');
      return false;
    }
    if ( document.form.abcd.value*1 > document.form.abcde.value*1 ) {
      alert('「A+B+C+D+E」不得大於「A+B+C+D+E+F」！');
      return false;
    }


    return true;
  }
</script>   
<?php include "../xSchoolForm/print_button.php"; ?>
</form>
<a href="./download/指標2_低收入戶隔代教養等學生名冊.xls">下載：低收入戶隔代教養等學生名冊空白表格下載</a>
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
	$file_1 = $row[2];
}
?>
<form action="file_ok.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="p_2">
	<input type="file" name="myfile">
	<input type="submit" value="上傳各類學生名冊">
<br /><? if ($file_1 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_1.'" target="_new">'.$file_1.'</a>';}?>
</form>
<br>※無論上傳檔名為何，系統會自動將檔名編碼為：年度_學校代號_文件編號.副檔名
<br>　例如：彰化縣民生國小代碼：074602
<br>　上傳後的檔案名稱為：101_074602_p2.xls(或.doc)
</div>
<?php
include "../../footer.php";
?>