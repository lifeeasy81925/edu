<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
include "./checkdate.php";
$datetime = date ("Y" , mktime(date('Y'))); 
?>
<?
if($class == '1' ){		
$sql = "select  *  from   100element_allowance7 where account like '$username'";
}
else{
$sql = "select  *  from   100junior_allowance7 where account like '$username'";
}

$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
        {
			$a1 = $row[1];
			$a2 = $row[2];
			$a3 = $row[3];
			$a4 = $row[4];
			$b1 = $row[5];
			$b2 = $row[6];
			$b3 = $row[7];
			$b4 = $row[8];
			$c = $row[9];
			$d1 = $row[10];
			$d2 = $row[11];
			$e1 = $row[12];
			$e2 = $row[13];
			$f1 = $row[14];	
			$f2 = $row[15];	
			$allowance = $row[16];						
        }
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="allowance7_finish.php"  onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><font color="blue"><strong>補助項目七 </strong></font><a href="/edu/modules/xSchoolForm/download/allowance-07.htm" target="_blank">(補助項目說明)</a>
<p>
※補助交通不便地區學校交通車<br /><br />
※<font color=blue>預計申請經費<input type="text" size="6" name="aftertotal" value="<? if($c =='') echo ''; else echo $c;?>" style="border:0px; text-align: right;" readonly>
元</font>。<br />
<strong>(以下三項僅能擇一補助，若不申請，請選擇4.不申請本項目)</strong><br><br />
<input id="r1" type="radio" name="point" value="1" <? if ($allowance=='1') echo 'checked';?>>1. 補助租車費：搭車人數
<input type="text" size="6" name="afterNum" value="<? if($d1 =='') echo ''; else echo $d1;?>"/>人，申請租車經費<input type="text" size="6" name="afterMon" onChange="change1()" value="<? if($d2 =='') echo ''; else echo $d2;?>"/>元。<br>
　　　•搭車人數 9 人以下最高核列 10 萬元<br>
　　　•搭車人數 10-25 人以下最高核列 27 萬元<br>
　　　•搭車人數 26 人以上最高核列 40 萬元<br>
<input id="r2" type="radio" name="point" value="2" <? if ($allowance=='2') echo 'checked';?>>2. 補助交通費：<input type="text" size="6" name="traffic" value="<? if($e1 =='') echo ''; else echo $e1;?>"/>人，申請經費<input type="text" size="6" name="trafficMon" onChange="change2()" value="<? if($e2 =='') echo ''; else echo $e2;?>"/>元。<br>
　　　•每生每年補助 12000 元，最高依租車費標準為限。<br>
<input id="r3" type="radio" name="point" value="3" <? if ($allowance=='3') echo 'checked';?>>3. 補助購置交通車：<input type="text" size="6" name="seat" value="<? if($f1 =='') echo ''; else echo $f1;?>"/>人座，申請經費<input type="text" size="6" name="seatMon" onChange="change3()" value="<? if($f2 =='') echo ''; else echo $f2;?>"/>元。<br>
　　　•座位 9 人以下最高核列 100 萬元<br>
　　　•座位 12-21 人最高核列 272 萬元<br>
　　　•座位 22 人以上最高核列 415 萬元<br>
<input id="r4" type="radio" name="point" value="4" <? if ($allowance=='4') echo 'checked';?>>4. 不申請本項目
<p>
    <INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
&nbsp;<input type="submit" name="button" value="儲存並到下一頁" />

<!-- 檢查空值 -->
<script language="JavaScript">
  function toCheck() {
    if ( document.form.aftertotal.value == "" ) {
      alert("請填寫「預計申請補助經費」！");
      document.form.aftertotal.focus();
      return false;
    }
	//三個都沒選
	if ( document.getElementById("r1").checked == false && document.getElementById("r2").checked == false && document.getElementById("r3").checked == false && document.getElementById("r4").checked == false) {
		alert("請核選您要申請的項目，4選1。");
		return false;
	}
	//選擇r1
	if ( document.getElementById("r1").checked ) {
		if ( document.form.afterNum.value == "" ) {
			alert('您選擇1.\n請填寫「租車，搭車人數」！');
			document.form.afterNum.focus();
			return false;
		}
		if ( document.form.afterMon.value == "" ) {
			alert('您選擇1.\n請填寫「租車，租車經費」！');
			document.form.afterMon.focus();
			return false;
		}		
		if ( document.form.traffic.value > 0 || document.form.trafficMon.value > 0 || document.form.seat.value > 0 || document.form.seatMon.value > 0) {
			alert('非選擇申請項目請勿填入內容！\n您申請項目1.\n請勿於項目2. 3.填入申請資料');
			return false;
		}
		//檢查r1金額
		if (document.form.afterNum.value <= 9) {
			if (document.form.afterMon.value > 100000) {
				alert("搭車人數 9 人以下最高核列 10 萬元！");
				return false;
			}
		} else if (document.form.afterNum.value <= 25) {
			if (document.form.afterMon.value > 270000) {
				alert("搭車人數 10-25 人以下最高核列 27 萬元！");
				return false;
			}
		} else if (document.form.afterNum.value >= 26) {
			if (document.form.afterMon.value > 400000) {
				alert("搭車人數 26 人以上最高核列 40 萬元！");
				return false;
			}
		}
	}
	//選擇r2
	if ( document.getElementById("r2").checked ) {
		if ( document.form.traffic.value == "" ) {
			alert('您選擇2.\n請填寫「補助交通費人數」！');
			document.form.traffic.focus();
			return false;
		}
		if ( document.form.trafficMon.value == "" ) {
			alert('您選擇2.\n請填寫「補助交通費申請經費」！');
			document.form.trafficMon.focus();
			return false;
		}		
		if ( document.form.afterNum.value > 0 || document.form.afterMon.value > 0 || document.form.seat.value > 0 || document.form.seatMon.value > 0) {
			alert("非選擇申請項目請勿填入內容！\n您申請項目2.\n請勿於項目1. 3.填入申請資料");
			return false;
		}
    }
		//檢查r2金額
		if (document.form.trafficMon.value > document.form.traffic.value * 12000 ) {
			alert("補助交通費金額錯誤，每生每年補助上限 12000 元！");
			return false;
		}
	//選擇r3
	if ( document.getElementById("r3").checked ) {
		if ( document.form.seat.value == "" ) {
			alert('您選擇3.\n請填寫「交通車人數」！');
			document.form.seat.focus();
			return false;
		}
		if ( document.form.seatMon.value == "" ) {
			alert('您選擇3.\n請填寫「交通車申請經費」！');
			document.form.seatMon.focus();
			return false;
		}			
		if ( document.form.traffic.value > 0 || document.form.trafficMon.value > 0 || document.form.afterNum.value > 0 || document.form.afterMon.value > 0) {
			alert("非選擇申請項目請勿填入內容！\n您申請項目3.\n請勿於項目1. 2.填入申請資料");
			return false;
		}
		//檢查r3金額
		if (document.form.seat.value <= 9) {
			if (document.form.seatMon.value > 1000000) {
				alert("座位 9 人以下最高核列 100 萬元！");
				return false;
			}
		} else if (document.form.seat.value <= 21) {
			if (document.form.seatMon.value > 2720000) {
				alert("座位 12-21 人以下最高核列 272 萬元！");
				return false;
			}
		} else if (document.form.seat.value >= 22) {
			if (document.form.seatMon.value > 4150000) {
				alert("座位 22 人以上最高核列 415 萬元！");
				return false;
			}
		}
    }
		
    return true;
  }
</script>      
</form>

<a href="/edu/modules/xSchoolForm/download/27.表(七)~1補助項目七申請表.xls" target="_new">下載：補助交通不便地區學校交通車經費概算表</a><br />
<a href="/edu/modules/xSchoolForm/download/28.表(七)~1~1學校現有交通車調查表.xls" target="_new">下載：學校現有交通車調查表</a>
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
	$file_1 = $row[30];
	$file_2 = $row[31];
}
?>
<form action="file_ok.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="a_7_1">
	<input type="file" name="myfile">
	<input type="submit" value="上傳經費概算表(申請表)">
<br /><? if ($file_1 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_1.'" target="_new">'.$file_1.'</a>';}?>
</form>
<form action="file_ok.php" method="post" enctype="multipart/form-data" target="_self">
	<input type="hidden" name="max_file_size" value="102400000">
	<input type="hidden" name="table" value="a_7_2">
	<input type="file" name="myfile">
	<input type="submit" value="上傳學校現有交通車調查表">
<br /><? if ($file_2 == ''){echo "檔案狀態：<font color=red>未上傳</font> (上傳後請按F5更新狀態)";} else {echo '檔案狀態：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/101/'.$username.'/'.$file_2.'" target="_new">'.$file_2.'</a>';}?>
</form>
<br>※無論上傳檔名為何，系統會自動將檔名編碼為：年度_學校代號_文件編號.副檔名
<br>　例如：彰化縣民生國小代碼：074602
<br>　上傳後的檔案名稱為：101_074602_p1.xls(或.doc)
</div>
<script>
function numsum1() { 
	var f = document.forms[0]; 
	f.aftertotal.value = (f.afterMon.value==""?0:parseFloat(f.afterMon.value)) + (f.trafficMon.value==""?0:parseFloat(f.trafficMon.value)) + (f.seatMon.value==""?0:parseFloat(f.seatMon.value)); 
}
function change1() { 
	var f = document.forms[0]; 
	numsum1();
	average();
} 
function change2() { 
	var f = document.forms[0]; 
	numsum1();
	average();
} 
function change3() { 
	var f = document.forms[0]; 
	numsum1();
	average();
}
</script>
<?php
include "../../footer.php";
?>
