<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
include "./checkdate.php";
$datetime = date ("Y" , mktime(date('Y'))); 
?>
<?
$sql = "select * from 102schooldata where account like '$username' ";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$id = $row[0]; //帳號
	$type = $row[1]; //學校型態
	$city = $row[2]; //縣市
	$district = $row[4]; //區
	$school = $row[5]; //學校名稱
	$classes = $row[101];	//全校班級數

	$p1_1 = $row[174]; //指標1-1值
    $p1_2 = $row[175]; //指標1-2值
    $p1_3 = $row[176]; //指標1-3值	
    $p1_4 = $row[177]; //指標1-4值
	$p2_1 = $row[178]; //指標2-1值
    $p2_2 = $row[179]; //指標2-2值
    $p2_3 = $row[180]; //指標2-3值	
	$p3_1 = $row[181]; //指標3-1值
	$p4_1 = $row[182]; //指標4-1值
	$p5_1 = $row[183]; //指標5-1值
    $p5_2 = $row[184]; //指標5-2值
    $p5_3 = $row[185]; //指標5-3值	
	$p6_1 = $row[186]; //指標6-1值
    $p6_2 = $row[187]; //指標6-2值

	$p150 = $row[150]; //符合補一
	$p151 = $row[151]; //符合補二
	$p152 = $row[152]; //符合補三教師
	$p153 = $row[153]; //符合補三學生
	$p154 = $row[154]; //符合補四
	$p155 = $row[155]; //符合補五
	$p156 = $row[156]; //符合補六
	$p157 = $row[157]; //符合補七

	$p158 = $row[158]; //申請補一
	$p159 = $row[159]; //申請補二
	$p160 = $row[160]; //申請補三教師
	$p161 = $row[161]; //申請補三學生
	$p162 = $row[162]; //申請補四
	$p163 = $row[163]; //申請補五
	$p164 = $row[164]; //申請補六
	$p165 = $row[165]; //申請補七
	
	$p014 = $row[14]; //100年補助充實學校基本教學設備金額
	$p076 = $row[76]; //101年補助充實學校基本教學設備金額
}
?>
<?	
//a010 學校申請總額
$sql = "select * from 102allowance6 where account like '$username' ";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$a010 = $row[10]; //本項目學校申請總額
	$a011 = $row[11]; //本項目學校申請經常門
	$a012 = $row[12]; //本項目學校申請資本門
	$a013 = $row[13]; //
	$a014 = $row[14]; //
	$a015 = $row[15]; //
	$a016 = $row[16]; //
	$a017 = $row[17]; //
	$a018 = $row[18]; //
	$a019 = $row[19]; //
	$a020 = $row[20]; //
	$a021 = $row[21]; //
	$a022 = $row[22]; //
	$a023 = $row[23]; //
	$a024 = $row[24]; //
	$a025 = $row[25]; //
	$a026 = $row[26]; //
	$a027 = $row[27]; //
	$a028 = $row[28]; //
	$a029 = $row[29]; //
	
	$a030 = $row[30]; //經費表1-1
	$a031 = $row[31]; //
	$a032 = $row[32]; //
	$a033 = $row[33]; //
	$a034 = $row[34]; //
	$a035 = $row[35]; //
	$a036 = $row[36]; //
	$a037 = $row[37]; //
	$a038 = $row[38]; //
	$a039 = $row[39]; //
	$a040 = $row[40]; //2-1
	$a041 = $row[41]; //
	$a042 = $row[42]; //
	$a043 = $row[43]; //
	$a044 = $row[44]; //
	$a045 = $row[45]; //
	$a046 = $row[46]; //
	$a047 = $row[47]; //
	$a048 = $row[48]; //
	$a049 = $row[49]; //
	$a050 = $row[50]; //3-1
	$a051 = $row[51]; //
	$a052 = $row[52]; //
	$a053 = $row[53]; //
	$a054 = $row[54]; //
	$a055 = $row[55]; //
	$a056 = $row[56]; //
	$a057 = $row[57]; //
	$a058 = $row[58]; //
	$a059 = $row[59]; //
	$a060 = $row[60]; //4-1
	$a061 = $row[61]; //
	$a062 = $row[62]; //
	$a063 = $row[63]; //
	$a064 = $row[64]; //
	$a065 = $row[65]; //
	$a066 = $row[66]; //
	$a067 = $row[67]; //
	$a068 = $row[68]; //
	$a069 = $row[69]; //
	$a070 = $row[70]; //5-1
	$a071 = $row[71]; //
	$a072 = $row[72]; //
	$a073 = $row[73]; //
	$a074 = $row[74]; //
	$a075 = $row[75]; //
	$a076 = $row[76]; //
	$a077 = $row[77]; //
	$a078 = $row[78]; //
	$a079 = $row[79]; //
	$a080 = $row[80]; //6-1
	$a081 = $row[81]; //
	$a082 = $row[82]; //
	$a083 = $row[83]; //
	$a084 = $row[84]; //
	$a085 = $row[85]; //
	$a086 = $row[86]; //
	$a087 = $row[87]; //
	$a088 = $row[88]; //
	$a089 = $row[89]; //
	$a090 = $row[90]; //7-1
	$a091 = $row[91]; //
	$a092 = $row[92]; //
	$a093 = $row[93]; //
	$a094 = $row[94]; //
	$a095 = $row[95]; //
	$a096 = $row[96]; //
	$a097 = $row[97]; //
	$a098 = $row[98]; //
	$a099 = $row[99]; //
	$a100 = $row[100]; //8-1
	$a101 = $row[101]; //
	$a102 = $row[102]; //
	$a103 = $row[103]; //
	$a104 = $row[104]; //
	$a105 = $row[105]; //
	$a106 = $row[106]; //
	$a107 = $row[107]; //
	$a108 = $row[108]; //
	$a109 = $row[109]; //
	$a110 = $row[110]; //9-1
	$a111 = $row[111]; //
	$a112 = $row[112]; //
	$a113 = $row[113]; //
	$a114 = $row[114]; //
	$a115 = $row[115]; //
	$a116 = $row[116]; //
	$a117 = $row[117]; //
	$a118 = $row[118]; //
	$a119 = $row[119]; //
	$a120 = $row[120]; //10-1
	$a121 = $row[121]; //
	$a122 = $row[122]; //
	$a123 = $row[123]; //
	$a124 = $row[124]; //
	$a125 = $row[125]; //
	$a126 = $row[126]; //
	$a127 = $row[127]; //
	$a128 = $row[128]; //
	$a129 = $row[129]; //
	
	//補六設定(補六不使用經費表)
	//$a030 = "經常門";
	//$a031 = "充實設備";
	//$a032 = "內聘講師鐘點費";
	
	//$a100 = "經常門";
	//$a101 = "其他";

	//$a090 = "經常門";
	//$a111 = "其他";
	
	$a120 = "經常門";
	$a121 = "雜支";
	if($a010<1) $a122 = "1"; //若尚未填寫金額，內定為申請雜支
}
		
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="102school_write_a6_finish.php"  onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><b>補助項目六：補助交通不便地區學校交通車</b>　<a href="/edu/modules/xSchoolForm/download/allowance-06.htm" target="_blank">(補助項目說明)</a></p>
<p>
<font color=blue>※補助交通不便地區學校交通車</font><br />
說明：以下三項僅能擇一補助
<p>
※<font color=blue>預計申請經費<input type="text" size="6" name="aftertotal" value="<? if($a010=='') echo ''; else echo $a010;?>" style="border:0px; text-align: right;" readonly>
元</font>。
<p>
<input id="r1" type="radio" name="point" value="1" <? if ($a029=='1') echo 'checked';?>>1. 補助租車費：搭車人數
<input type="text" size="6" name="afterNum" value="<? if($a013=='') echo ''; else echo $a013;?>"/>人，申請租車經費<input type="text" size="6" name="afterMon" onChange="change1()" value="<? if($a014=='') echo ''; else echo $a014;?>"/>元。<br>
　　　•搭車人數 9 人以下最高核列 7 萬元<br>
　　　•搭車人數 10至25 人以下最高核列 21 萬元<br>
　　　•搭車人數 26 人以上最高核列 40 萬元<br>
<input id="r2" type="radio" name="point" value="2" <? if ($a029=='2') echo 'checked';?>>2. 補助交通費：<input type="text" size="6" name="traffic" value="<? if($a015=='') echo ''; else echo $a015;?>"/>人，申請經費<input type="text" size="6" name="trafficMon" onChange="change2()" value="<? if($a016=='') echo ''; else echo $a016;?>"/>元。<br>
　　　•每生每年補助 12000 元，最高依租車費標準為限。<br>
<input id="r3" type="radio" name="point" value="3" <? if ($a029=='3') echo 'checked';?>>3. 補助購置交通車：<input type="text" size="6" name="seat" value="<? if($a017=='') echo ''; else echo $a017;?>"/>人座，申請經費<input type="text" size="6" name="seatMon" onChange="change3()" value="<? if($a018=='') echo ''; else echo $a018;?>"/>元。<br>
　　　•座位 11 人以下最高核列 100 萬元<br>
　　　•座位 12至21 人最高核列 272 萬元<br>
　　　•座位 22 人以上最高核列 415 萬元<br>
<p>
<input type="button" value="上一頁(不儲存)" onClick="history.go(-1)" />
<input type="submit" name="button" value="儲存並回上一頁" />

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
		alert("請核選您要申請的項目，3選1。");
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

<a href="/edu/modules/xSchoolForm/download/16.表(六)~1補助項目六申請表.xls" target="_new">下載：實施計畫(含經費申請表)(空白)</a><br />
<a href="/edu/modules/xSchoolForm/download/102_各搭車路線學生名冊.xls" target="_new">下載：各搭車路線學生名冊(空白)</a><br />
<a href="/edu/modules/xSchoolForm/download/17.表(六)~1~1學校現有交通車調查表.xls" target="_new">下載：學校現有交通車調查表(空白)</a><br />
說明：確認送出後，請於學校入口「上傳檔案專區」上傳「實施計畫(含經費申請表)」、「各搭車路線學生名冊」、「學校現有交通車調查表」。
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
