<?php
//待加入項目
//1.經費表 單價x數量=金額
//2.特色一經費表內經常門與資本門分別加總，套入特色一經、資門欄位。特色二亦同。
//3.雜支(經常門的6%)自動計算
//4.檢核項目：資本門單價必須一萬以上
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
include "./checkdate.php";
$datetime = date ("Y" , mktime(date('Y'))) ; 
$keyClasses = '13'; // 設定可申請特色二的最少班級數


$sql = "select * from 102schooldata where account like '$username' ";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$id = $row[0]; //帳號
	$type = $row[1]; //學校型態
	$city = $row[2]; //縣市
	$district = $row[4]; //區
	$school = $row[5]; //學校名稱
	$classes = $row[101];	//學校班級數

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
	
	$s1=array("","經常門","資本門");
	$s2=array("","鐘點費","器材購置","器材維護","教材","道具","硬體設備","其他");
}

	
//a010 學校申請總額
$sql = "select * from 102allowance2 where account like '$username' ";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$a010 = $row[10]; //本項目學校申請總額
	$a011 = $row[11]; //
	$a012 = $row[12]; //
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
	
	//補二設定
	$a030 = "經常門";
	$a031 = "鐘點費";
	//$a032 = "內聘講師鐘點費";
	$a033 = "節";
	//$a034 = 400;
	
	//$a100 = "經常門";
	//$a101 = "其他";

	//$a090 = "經常門";
	//$a111 = "其他";
	
	$a120 = "經常門";
	$a121 = "雜支";
	if($a013<1) $a122 = "1"; //若尚未填寫金額，內定為申請雜支

}
//第二個經費表
$sql = "select * from 102allowance2_2 where account like '$username' ";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$b030 = $row[30]; //經費表1-1
	$b031 = $row[31]; //
	$b032 = $row[32]; //
	$b033 = $row[33]; //
	$b034 = $row[34]; //
	$b035 = $row[35]; //
	$b036 = $row[36]; //
	$b037 = $row[37]; //
	$b038 = $row[38]; //
	$b039 = $row[39]; //
	$b040 = $row[40]; //2-1
	$b041 = $row[41]; //
	$b042 = $row[42]; //
	$b043 = $row[43]; //
	$b044 = $row[44]; //
	$b045 = $row[45]; //
	$b046 = $row[46]; //
	$b047 = $row[47]; //
	$b048 = $row[48]; //
	$b049 = $row[49]; //
	$b050 = $row[50]; //3-1
	$b051 = $row[51]; //
	$b052 = $row[52]; //
	$b053 = $row[53]; //
	$b054 = $row[54]; //
	$b055 = $row[55]; //
	$b056 = $row[56]; //
	$b057 = $row[57]; //
	$b058 = $row[58]; //
	$b059 = $row[59]; //
	$b060 = $row[60]; //4-1
	$b061 = $row[61]; //
	$b062 = $row[62]; //
	$b063 = $row[63]; //
	$b064 = $row[64]; //
	$b065 = $row[65]; //
	$b066 = $row[66]; //
	$b067 = $row[67]; //
	$b068 = $row[68]; //
	$b069 = $row[69]; //
	$b070 = $row[70]; //5-1
	$b071 = $row[71]; //
	$b072 = $row[72]; //
	$b073 = $row[73]; //
	$b074 = $row[74]; //
	$b075 = $row[75]; //
	$b076 = $row[76]; //
	$b077 = $row[77]; //
	$b078 = $row[78]; //
	$b079 = $row[79]; //
	$b080 = $row[80]; //6-1
	$b081 = $row[81]; //
	$b082 = $row[82]; //
	$b083 = $row[83]; //
	$b084 = $row[84]; //
	$b085 = $row[85]; //
	$b086 = $row[86]; //
	$b087 = $row[87]; //
	$b088 = $row[88]; //
	$b089 = $row[89]; //
	$b090 = $row[90]; //7-1
	$b091 = $row[91]; //
	$b092 = $row[92]; //
	$b093 = $row[93]; //
	$b094 = $row[94]; //
	$b095 = $row[95]; //
	$b096 = $row[96]; //
	$b097 = $row[97]; //
	$b098 = $row[98]; //
	$b099 = $row[99]; //
	$b100 = $row[100]; //8-1
	$b101 = $row[101]; //
	$b102 = $row[102]; //
	$b103 = $row[103]; //
	$b104 = $row[104]; //
	$b105 = $row[105]; //
	$b106 = $row[106]; //
	$b107 = $row[107]; //
	$b108 = $row[108]; //
	$b109 = $row[109]; //
	$b110 = $row[110]; //9-1
	$b111 = $row[111]; //
	$b112 = $row[112]; //
	$b113 = $row[113]; //
	$b114 = $row[114]; //
	$b115 = $row[115]; //
	$b116 = $row[116]; //
	$b117 = $row[117]; //
	$b118 = $row[118]; //
	$b119 = $row[119]; //
	$b120 = $row[120]; //10-1
	$b121 = $row[121]; //
	$b122 = $row[122]; //
	$b123 = $row[123]; //
	$b124 = $row[124]; //
	$b125 = $row[125]; //
	$b126 = $row[126]; //
	$b127 = $row[127]; //
	$b128 = $row[128]; //
	$b129 = $row[129]; //
	
	//補二設定
	$b030 = "經常門";
	$b031 = "鐘點費";
	//$b032 = "內聘講師鐘點費";
	$b033 = "節";
	//$b034 = 400;
	
	//$b100 = "經常門";
	//$b101 = "其他";

	//$b090 = "經常門";
	//$b111 = "其他";
	
	$b120 = "經常門";
	$b121 = "雜支";
	if($a016<1) $b122 = "1"; //若尚未填寫金額，內定為申請雜支

}
//測試用
//echo "<br>".$a040."_".$a041;
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="102school_write_a2_finish.php"  onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><b>補助項目二：補助學校發展教育特色</b>　<a href="/edu/modules/xSchoolForm/download/allowance-02.htm" target="_blank">(補助項目說明)</a></p>
<p>
<font color=blue>※補助學校申請發展特色-申請補助經費：<input type="text" size="6" name="afterMon" value="<? if($a010 =='') echo ''; else echo $a010;?>" style="border:0px; text-align: right;" readonly >
元 (本列自動計算)</font><br />
說明：分校分班最高核列6萬元，12班以下最高核列8萬元，13班以上最高核列2項特色，每項最高8萬元。
<p>
※貴校班級數為 <? echo $classes; ?> 班，您最多可以申請 <? 
  if($classes < $keyClasses ){
	  echo "1";
	}
	else{
		echo "2";
	}
  ?> 項特色補助。<br />
※申請<input type="text" size="6" name="develop" value="<? if($a019=='') echo ''; else echo $a019;?>"/>項特色
<p>
※特色一：<input type="text" size="20" name="char1" value="<? if($a020=='') echo ''; else echo $a020;?>"/>(特色名稱)，<input type="checkbox" name="a021" value="1" <? if($a021=='1') echo 'checked';?>/>本項目為延續性辦理。<br />
<font color=blue>　經費<input type="text" size="6" name="char1Mon" onChange="change1()" value="<? if($a013=='') echo ''; else echo $a013;?>" style="border:0px; text-align: right;" readonly>元(含經常門經費<input type="text" size="6" name="char1a" onChange="change3()" value="<? if($a014=='') echo ''; else echo $a014;?>" style="border:0px; text-align: right;" readonly >元，資本門經費<input type="text" size="6" name="char1b" onChange="change4()" value="<? if($a015=='') echo ''; else echo $a015;?>" style="border:0px; text-align: right;" readonly >元)</font>

<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
  <tr>
    <td colspan="9" align="left" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;">特色一經費概算：</td>
    </tr>
  <tr>
    <td width="10" align="left" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">科目</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">類別</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">項目</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">說明</td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">1.</td>
    <td align="left"><input type="text" size="3" name="a030" value="<? if($a030 =='') echo ''; else echo $a030;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a031" value="<? if($a031 =='') echo ''; else echo $a031;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a032" value="<? if($a032 =='') echo ''; else echo $a032;?>"/></td>
    <td align="left"><input type="text" size="2" name="a033" value="<? if($a033 =='') echo ''; else echo $a033;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a034" onchange="js:Count(this);" value="<? if($a034 =='') echo ''; else echo $a034;?>"/></td>
    <td align="left"><input type="text" size="2" name="a035" onchange="js:Count(this);" value="<? if($a035 =='') echo ''; else echo $a035;?>"/></td>
    <td align="left"><input type="text" size="4" name="a036" value="<? if($a036 =='') echo ''; else echo $a036;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="a037" value="<? if($a037 =='') echo ''; else echo $a037;?>"/></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">2.</td>
    <td align="left">
    <select name="a040" id="s2_1" size="1" onChange="combo_s2_1()" value="<? echo $a040;?>">
      <option <? if($a040==$s1[0]) echo "selected"; ?>><? echo $s1[0]; ?></option>
      <option <? if($a040==$s1[1]) echo "selected"; ?>><? echo $s1[1]; ?></option>
      <option <? if($a040==$s1[2]) echo "selected"; ?>><? echo $s1[2]; ?></option>
    </select>
    <script> 
  		//document.form.s2_1.value='<? echo $a040; ?>';
		/*var i, j;
		j=document.form.s2_1.options.length;
		alert("ABC %i %j\n");
		for(i=0; i<=j-1; i++){
			if(document.form.s2_1.options[i].value==<? echo $a040;?>){
				document.form.s2_1.options[i].selected = true;
				return;
			}else{
				document.form.s2_1.options[i].selected = false;
			}
		}*/
	</script>
    </td>
    <td align="left">
    <select name="a041" id="s2_2" size="1">
      <option <? if($a041==$s2[0]) echo "selected"; ?>><? echo $s2[0]; ?></option>
      <option <? if($a041==$s2[1]) echo "selected"; ?>><? echo $s2[1]; ?></option>
      <option <? if($a041==$s2[2]) echo "selected"; ?>><? echo $s2[2]; ?></option>
      <option <? if($a041==$s2[3]) echo "selected"; ?>><? echo $s2[3]; ?></option>
      <option <? if($a041==$s2[4]) echo "selected"; ?>><? echo $s2[4]; ?></option>
      <option <? if($a041==$s2[5]) echo "selected"; ?>><? echo $s2[5]; ?></option>
      <option <? if($a041==$s2[6]) echo "selected"; ?>><? echo $s2[6]; ?></option>
      <option <? if($a041==$s2[7]) echo "selected"; ?>><? echo $s2[7]; ?></option>
      <option <? if($a041==$s2[8]) echo "selected"; ?>><? echo $s2[8]; ?></option>
    </select>
    <script> 
  		//document.form.s2_2.value="<? echo $a041;?>";
	</script>
    </td>
    <td align="left"><input type="text" size="10" name="a042" value="<? if($a042 =='') echo ''; else echo $a042;?>"/></td>
    <td align="left"><input type="text" size="2" name="a043" value="<? if($a043 =='') echo ''; else echo $a043;?>"/></td>
    <td align="left"><input type="text" size="4" name="a044" onchange="js:Count(this);" value="<? if($a044 =='') echo ''; else echo $a044;?>"/></td>
    <td align="left"><input type="text" size="2" name="a045" onchange="js:Count(this);" value="<? if($a045 =='') echo ''; else echo $a045;?>"/></td>
    <td align="left"><input type="text" size="4" name="a046" value="<? if($a046 =='') echo ''; else echo $a046;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="a047" value="<? if($a047 =='') echo ''; else echo $a047;?>"/></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">3.</td>
    <td align="left">
    <select name="a050" id="s3_1" size="1" onChange="combo_s3_1()">
      <option <? if($a050==$s1[0]) echo "selected"; ?>><? echo $s1[0]; ?></option>
      <option <? if($a050==$s1[1]) echo "selected"; ?>><? echo $s1[1]; ?></option>
      <option <? if($a050==$s1[2]) echo "selected"; ?>><? echo $s1[2]; ?></option>
    </select>
    </td>
    <td align="left">
    <select name="a051" id="s3_2" size="1">
      <option <? if($a051==$s2[0]) echo "selected"; ?>><? echo $s2[0]; ?></option>
      <option <? if($a051==$s2[1]) echo "selected"; ?>><? echo $s2[1]; ?></option>
      <option <? if($a051==$s2[2]) echo "selected"; ?>><? echo $s2[2]; ?></option>
      <option <? if($a051==$s2[3]) echo "selected"; ?>><? echo $s2[3]; ?></option>
      <option <? if($a051==$s2[4]) echo "selected"; ?>><? echo $s2[4]; ?></option>
      <option <? if($a051==$s2[5]) echo "selected"; ?>><? echo $s2[5]; ?></option>
      <option <? if($a051==$s2[6]) echo "selected"; ?>><? echo $s2[6]; ?></option>
      <option <? if($a051==$s2[7]) echo "selected"; ?>><? echo $s2[7]; ?></option>
      <option <? if($a051==$s2[8]) echo "selected"; ?>><? echo $s2[8]; ?></option>
    </select>
    </td>
    <td align="left"><input type="text" size="10" name="a052" value="<? if($a052 =='') echo ''; else echo $a052;?>"/></td>
    <td align="left"><input type="text" size="2" name="a053" value="<? if($a053 =='') echo ''; else echo $a053;?>"/></td>
    <td align="left"><input type="text" size="4" name="a054" onchange="js:Count(this);" value="<? if($a054 =='') echo ''; else echo $a054;?>"/></td>
    <td align="left"><input type="text" size="2" name="a055" onchange="js:Count(this);" value="<? if($a055 =='') echo ''; else echo $a055;?>"/></td>
    <td align="left"><input type="text" size="4" name="a056" value="<? if($a056 =='') echo ''; else echo $a056;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="a057" value="<? if($a057 =='') echo ''; else echo $a057;?>"/></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">4.</td>
    <td align="left">
    <select name="a060" id="s4_1" size="1" onChange="combo_s4_1()">
      <option <? if($a060==$s1[0]) echo "selected"; ?>><? echo $s1[0]; ?></option>
      <option <? if($a060==$s1[1]) echo "selected"; ?>><? echo $s1[1]; ?></option>
      <option <? if($a060==$s1[2]) echo "selected"; ?>><? echo $s1[2]; ?></option>
    </select>
    </td>
    <td align="left">
    <select name="a061" id="s4_2" size="1">
      <option <? if($a061==$s2[0]) echo "selected"; ?>><? echo $s2[0]; ?></option>
      <option <? if($a061==$s2[1]) echo "selected"; ?>><? echo $s2[1]; ?></option>
      <option <? if($a061==$s2[2]) echo "selected"; ?>><? echo $s2[2]; ?></option>
      <option <? if($a061==$s2[3]) echo "selected"; ?>><? echo $s2[3]; ?></option>
      <option <? if($a061==$s2[4]) echo "selected"; ?>><? echo $s2[4]; ?></option>
      <option <? if($a061==$s2[5]) echo "selected"; ?>><? echo $s2[5]; ?></option>
      <option <? if($a061==$s2[6]) echo "selected"; ?>><? echo $s2[6]; ?></option>
      <option <? if($a061==$s2[7]) echo "selected"; ?>><? echo $s2[7]; ?></option>
      <option <? if($a061==$s2[8]) echo "selected"; ?>><? echo $s2[8]; ?></option>
    </select>
    </td>
    <td align="left"><input type="text" size="10" name="a062" value="<? if($a062 =='') echo ''; else echo $a062;?>"/></td>
    <td align="left"><input type="text" size="2" name="a063" value="<? if($a063 =='') echo ''; else echo $a063;?>"/></td>
    <td align="left"><input type="text" size="4" name="a064" onchange="js:Count(this);" value="<? if($a064 =='') echo ''; else echo $a064;?>"/></td>
    <td align="left"><input type="text" size="2" name="a065" onchange="js:Count(this);" value="<? if($a065 =='') echo ''; else echo $a065;?>"/></td>
    <td align="left"><input type="text" size="4" name="a066" value="<? if($a066 =='') echo ''; else echo $a066;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="a067" value="<? if($a067 =='') echo ''; else echo $a067;?>"/></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">5.</td>
    <td align="left">
    <select name="a070" id="s5_1" size="1" onChange="combo_s5_1()">
      <option <? if($a070==$s1[0]) echo "selected"; ?>><? echo $s1[0]; ?></option>
      <option <? if($a070==$s1[1]) echo "selected"; ?>><? echo $s1[1]; ?></option>
      <option <? if($a070==$s1[2]) echo "selected"; ?>><? echo $s1[2]; ?></option>
    </select>
    </td>
    <td align="left">
    <select name="a071" id="s5_2" size="1">
      <option <? if($a071==$s2[0]) echo "selected"; ?>><? echo $s2[0]; ?></option>
      <option <? if($a071==$s2[1]) echo "selected"; ?>><? echo $s2[1]; ?></option>
      <option <? if($a071==$s2[2]) echo "selected"; ?>><? echo $s2[2]; ?></option>
      <option <? if($a071==$s2[3]) echo "selected"; ?>><? echo $s2[3]; ?></option>
      <option <? if($a071==$s2[4]) echo "selected"; ?>><? echo $s2[4]; ?></option>
      <option <? if($a071==$s2[5]) echo "selected"; ?>><? echo $s2[5]; ?></option>
      <option <? if($a071==$s2[6]) echo "selected"; ?>><? echo $s2[6]; ?></option>
      <option <? if($a071==$s2[7]) echo "selected"; ?>><? echo $s2[7]; ?></option>
      <option <? if($a071==$s2[8]) echo "selected"; ?>><? echo $s2[8]; ?></option>
    </select>
    </td>
    <td align="left"><input type="text" size="10" name="a072" value="<? if($a072 =='') echo ''; else echo $a072;?>"/></td>
    <td align="left"><input type="text" size="2" name="a073" value="<? if($a073 =='') echo ''; else echo $a073;?>"/></td>
    <td align="left"><input type="text" size="4" name="a074" onchange="js:Count(this);" value="<? if($a074 =='') echo ''; else echo $a074;?>"/></td>
    <td align="left"><input type="text" size="2" name="a075" onchange="js:Count(this);" value="<? if($a075 =='') echo ''; else echo $a075;?>"/></td>
    <td align="left"><input type="text" size="4" name="a076" value="<? if($a076 =='') echo ''; else echo $a076;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="a077" value="<? if($a077 =='') echo ''; else echo $a077;?>"/></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">6.</td>
    <td align="left">
    <select name="a080" id="s6_1" size="1" onChange="combo_s6_1()">
      <option <? if($a080==$s1[0]) echo "selected"; ?>><? echo $s1[0]; ?></option>
      <option <? if($a080==$s1[1]) echo "selected"; ?>><? echo $s1[1]; ?></option>
      <option <? if($a080==$s1[2]) echo "selected"; ?>><? echo $s1[2]; ?></option>
    </select>
    </td>
    <td align="left">
    <select name="a081" id="s6_2" size="1">
      <option <? if($a081==$s2[0]) echo "selected"; ?>><? echo $s2[0]; ?></option>
      <option <? if($a081==$s2[1]) echo "selected"; ?>><? echo $s2[1]; ?></option>
      <option <? if($a081==$s2[2]) echo "selected"; ?>><? echo $s2[2]; ?></option>
      <option <? if($a081==$s2[3]) echo "selected"; ?>><? echo $s2[3]; ?></option>
      <option <? if($a081==$s2[4]) echo "selected"; ?>><? echo $s2[4]; ?></option>
      <option <? if($a081==$s2[5]) echo "selected"; ?>><? echo $s2[5]; ?></option>
      <option <? if($a081==$s2[6]) echo "selected"; ?>><? echo $s2[6]; ?></option>
      <option <? if($a081==$s2[7]) echo "selected"; ?>><? echo $s2[7]; ?></option>
      <option <? if($a081==$s2[8]) echo "selected"; ?>><? echo $s2[8]; ?></option>
    </select>
    </td>
    <td align="left"><input type="text" size="10" name="a082" value="<? if($a082 =='') echo ''; else echo $a082;?>"/></td>
    <td align="left"><input type="text" size="2" name="a083" value="<? if($a083 =='') echo ''; else echo $a083;?>"/></td>
    <td align="left"><input type="text" size="4" name="a084" onchange="js:Count(this);" value="<? if($a084 =='') echo ''; else echo $a084;?>"/></td>
    <td align="left"><input type="text" size="2" name="a085" onchange="js:Count(this);" value="<? if($a085 =='') echo ''; else echo $a085;?>"/></td>
    <td align="left"><input type="text" size="4" name="a086" value="<? if($a086 =='') echo ''; else echo $a086;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="a087" value="<? if($a087 =='') echo ''; else echo $a087;?>"/></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">7.</td>
    <td align="left">
    <select name="a090" id="s7_1" size="1" onChange="combo_s7_1()">
      <option <? if($a090==$s1[0]) echo "selected"; ?>><? echo $s1[0]; ?></option>
      <option <? if($a090==$s1[1]) echo "selected"; ?>><? echo $s1[1]; ?></option>
      <option <? if($a090==$s1[2]) echo "selected"; ?>><? echo $s1[2]; ?></option>
    </select>
    </td>
    <td align="left">
    <select name="a091" id="s7_2" size="1">
      <option <? if($a091==$s2[0]) echo "selected"; ?>><? echo $s2[0]; ?></option>
      <option <? if($a091==$s2[1]) echo "selected"; ?>><? echo $s2[1]; ?></option>
      <option <? if($a091==$s2[2]) echo "selected"; ?>><? echo $s2[2]; ?></option>
      <option <? if($a091==$s2[3]) echo "selected"; ?>><? echo $s2[3]; ?></option>
      <option <? if($a091==$s2[4]) echo "selected"; ?>><? echo $s2[4]; ?></option>
      <option <? if($a091==$s2[5]) echo "selected"; ?>><? echo $s2[5]; ?></option>
      <option <? if($a091==$s2[6]) echo "selected"; ?>><? echo $s2[6]; ?></option>
      <option <? if($a091==$s2[7]) echo "selected"; ?>><? echo $s2[7]; ?></option>
      <option <? if($a091==$s2[8]) echo "selected"; ?>><? echo $s2[8]; ?></option>
    </select>
    </td>
    <td align="left"><input type="text" size="10" name="a092" value="<? if($a092 =='') echo ''; else echo $a092;?>"/></td>
    <td align="left"><input type="text" size="2" name="a093" value="<? if($a093 =='') echo ''; else echo $a093;?>"/></td>
    <td align="left"><input type="text" size="4" name="a094" onchange="js:Count(this);" value="<? if($a094 =='') echo ''; else echo $a094;?>"/></td>
    <td align="left"><input type="text" size="2" name="a095" onchange="js:Count(this);" value="<? if($a095 =='') echo ''; else echo $a095;?>"/></td>
    <td align="left"><input type="text" size="4" name="a096" value="<? if($a096 =='') echo ''; else echo $a096;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="a097" value="<? if($a097 =='') echo ''; else echo $a097;?>"/></td>
  </tr>
  <tr>
    <td align="center" nowrap="nowrap">8.</td>
    <td align="left">
    <select name="a100" id="s8_1" size="1" onChange="combo_s8_1()">
      <option <? if($a100==$s1[0]) echo "selected"; ?>><? echo $s1[0]; ?></option>
      <option <? if($a100==$s1[1]) echo "selected"; ?>><? echo $s1[1]; ?></option>
      <option <? if($a100==$s1[2]) echo "selected"; ?>><? echo $s1[2]; ?></option>
    </select>
    </td>
    <td align="left">
    <select name="a101" id="s8_2" size="1">
      <option <? if($a101==$s2[0]) echo "selected"; ?>><? echo $s2[0]; ?></option>
      <option <? if($a101==$s2[1]) echo "selected"; ?>><? echo $s2[1]; ?></option>
      <option <? if($a101==$s2[2]) echo "selected"; ?>><? echo $s2[2]; ?></option>
      <option <? if($a101==$s2[3]) echo "selected"; ?>><? echo $s2[3]; ?></option>
      <option <? if($a101==$s2[4]) echo "selected"; ?>><? echo $s2[4]; ?></option>
      <option <? if($a101==$s2[5]) echo "selected"; ?>><? echo $s2[5]; ?></option>
      <option <? if($a101==$s2[6]) echo "selected"; ?>><? echo $s2[6]; ?></option>
      <option <? if($a101==$s2[7]) echo "selected"; ?>><? echo $s2[7]; ?></option>
      <option <? if($a101==$s2[8]) echo "selected"; ?>><? echo $s2[8]; ?></option>
    </select>
    </td>
    <td align="left"><input type="text" size="10" name="a102" value="<? if($a102 =='') echo ''; else echo $a102;?>"/></td>
    <td align="left"><input type="text" size="2" name="a103" value="<? if($a103 =='') echo ''; else echo $a103;?>"/></td>
    <td align="left"><input type="text" size="4" name="a104" onchange="js:Count(this);" value="<? if($a104 =='') echo ''; else echo $a104;?>"/></td>
    <td align="left"><input type="text" size="2" name="a105" onchange="js:Count(this);" value="<? if($a105 =='') echo ''; else echo $a105;?>"/></td>
    <td align="left"><input type="text" size="4" name="a106" value="<? if($a106 =='') echo ''; else echo $a106;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="a107" value="<? if($a107 =='') echo ''; else echo $a107;?>"/></td>
  </tr>
  <tr>
    <td align="center" nowrap="nowrap">9.</td>
    <td align="left">
    <select name="a110" id="s9_1" size="1" onChange="combo_s9_1()">
      <option <? if($a110==$s1[0]) echo "selected"; ?>><? echo $s1[0]; ?></option>
      <option <? if($a110==$s1[1]) echo "selected"; ?>><? echo $s1[1]; ?></option>
      <option <? if($a110==$s1[2]) echo "selected"; ?>><? echo $s1[2]; ?></option>
    </select>
    </td>
    <td align="left">
    <select name="a111" id="s9_2" size="1">
      <option <? if($a111==$s2[0]) echo "selected"; ?>><? echo $s2[0]; ?></option>
      <option <? if($a111==$s2[1]) echo "selected"; ?>><? echo $s2[1]; ?></option>
      <option <? if($a111==$s2[2]) echo "selected"; ?>><? echo $s2[2]; ?></option>
      <option <? if($a111==$s2[3]) echo "selected"; ?>><? echo $s2[3]; ?></option>
      <option <? if($a111==$s2[4]) echo "selected"; ?>><? echo $s2[4]; ?></option>
      <option <? if($a111==$s2[5]) echo "selected"; ?>><? echo $s2[5]; ?></option>
      <option <? if($a111==$s2[6]) echo "selected"; ?>><? echo $s2[6]; ?></option>
      <option <? if($a111==$s2[7]) echo "selected"; ?>><? echo $s2[7]; ?></option>
      <option <? if($a111==$s2[8]) echo "selected"; ?>><? echo $s2[8]; ?></option>
    </select>
    </td>
    <td align="left"><input type="text" size="10" name="a112" value="<? if($a112 =='') echo ''; else echo $a112;?>"/></td>
    <td align="left"><input type="text" size="2" name="a113" value="<? if($a113 =='') echo ''; else echo $a113;?>"/></td>
    <td align="left"><input type="text" size="4" name="a114" onchange="js:Count(this);" value="<? if($a114 =='') echo ''; else echo $a114;?>"/></td>
    <td align="left"><input type="text" size="2" name="a115" onchange="js:Count(this);" value="<? if($a115 =='') echo ''; else echo $a115;?>"/></td>
    <td align="left"><input type="text" size="4" name="a116" value="<? if($a116 =='') echo ''; else echo $a116;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="a117" value="<? if($a117 =='') echo ''; else echo $a117;?>"/></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">10.</td>
    <td align="left"><input type="text" size="3" name="a120" value="<? if($a120 =='') echo ''; else echo $a120;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a121" value="<? if($a121 =='') echo ''; else echo $a121;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left" valign="middle"><input type="checkbox" name="a122" onclick="js:chkbox(this);" value="1" <? if($a122 =='1') echo 'checked';?>/>申請雜支</td>
    <td align="left"><input type="text" size="2" name="a123" value="<? if($a123 =='') echo ''; else echo $a123;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a124" value="<? if($a124 =='') echo ''; else echo $a124;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a125" value="<? if($a125 =='') echo ''; else echo $a125;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a126" value="<? if($a126 =='') echo ''; else echo $a126;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="a127" value="<? if($a127 =='') echo ''; else echo $a127;?>"/></td>
  </tr>
</table>
<p>
<span style="display : <? if($classes < '13') {echo "none";} else {echo "visable";} ?>">
※特色二：<input type="text" size="20" name="char2" value="<? if($a022=='') echo ''; else echo $a022;?>"/>(特色名稱)，<input type="checkbox" name="a023" value="1" <? if($a023=='1') echo 'checked';?>/>本項目為延續性辦理。<br />
<font color=blue>　經費<input type="text" size="6" name="char2Mon" onChange="change2()" value="<? if($a016=='') echo ''; else echo $a016;?>" style="border:0px; text-align: right;" readonly>元(含經常門經費<input type="text" size="6" name="char2a" onChange="change5()" value="<? if($a017=='') echo ''; else echo $a017;?>" style="border:0px; text-align: right;" readonly >元，資本門經費<input type="text" size="6" name="char2b" onChange="change6()" value="<? if($a018=='') echo ''; else echo $a018;?>" style="border:0px; text-align: right;" readonly >元)</font><br />
<? if($classes < '13') echo "<!--"; ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
  <tr>
    <td colspan="9" align="left" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;">特色二經費概算：</td>
    </tr>
  <tr>
    <td width="10" align="left" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">科目</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">類別</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">項目</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">說明</td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">1.</td>
    <td align="left"><input type="text" size="3" name="b030" value="<? if($b030 =='') echo ''; else echo $b030;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="b031" value="<? if($b031 =='') echo ''; else echo $b031;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="b032" value="<? if($b032 =='') echo ''; else echo $b032;?>"/></td>
    <td align="left"><input type="text" size="2" name="b033" value="<? if($b033 =='') echo ''; else echo $b033;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="b034" onchange="js:Count(this);" value="<? if($b034 =='') echo ''; else echo $b034;?>"/></td>
    <td align="left"><input type="text" size="2" name="b035" onchange="js:Count(this);" value="<? if($b035 =='') echo ''; else echo $b035;?>"/></td>
    <td align="left"><input type="text" size="4" name="b036" value="<? if($b036 =='') echo ''; else echo $b036;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="b037" value="<? if($b037 =='') echo ''; else echo $b037;?>"/></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">2.</td>
    <td align="left">
    <select name="b040" id="b2_1" size="1" onChange="combo_b2_1()">
      <option <? if($b040==$s1[0]) echo "selected"; ?>><? echo $s1[0]; ?></option>
      <option <? if($b040==$s1[1]) echo "selected"; ?>><? echo $s1[1]; ?></option>
      <option <? if($b040==$s1[2]) echo "selected"; ?>><? echo $s1[2]; ?></option>
    </select>
    </td>
    <td align="left">
    <select name="b041" id="b2_2" size="1">
      <option <? if($b041==$s2[0]) echo "selected"; ?>><? echo $s2[0]; ?></option>
      <option <? if($b041==$s2[1]) echo "selected"; ?>><? echo $s2[1]; ?></option>
      <option <? if($b041==$s2[2]) echo "selected"; ?>><? echo $s2[2]; ?></option>
      <option <? if($b041==$s2[3]) echo "selected"; ?>><? echo $s2[3]; ?></option>
      <option <? if($b041==$s2[4]) echo "selected"; ?>><? echo $s2[4]; ?></option>
      <option <? if($b041==$s2[5]) echo "selected"; ?>><? echo $s2[5]; ?></option>
      <option <? if($b041==$s2[6]) echo "selected"; ?>><? echo $s2[6]; ?></option>
      <option <? if($b041==$s2[7]) echo "selected"; ?>><? echo $s2[7]; ?></option>
      <option <? if($b041==$s2[8]) echo "selected"; ?>><? echo $s2[8]; ?></option>
    </select>
    </td>
    <td align="left"><input type="text" size="10" name="b042" value="<? if($b042 =='') echo ''; else echo $b042;?>"/></td>
    <td align="left"><input type="text" size="2" name="b043" value="<? if($b043 =='') echo ''; else echo $b043;?>"/></td>
    <td align="left"><input type="text" size="4" name="b044" onchange="js:Count(this);" value="<? if($b044 =='') echo ''; else echo $b044;?>"/></td>
    <td align="left"><input type="text" size="2" name="b045" onchange="js:Count(this);" value="<? if($b045 =='') echo ''; else echo $b045;?>"/></td>
    <td align="left"><input type="text" size="4" name="b046" value="<? if($b046 =='') echo ''; else echo $b046;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="b047" value="<? if($b047 =='') echo ''; else echo $b047;?>"/></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">3.</td>
    <td align="left">
    <select name="b050" id="b3_1" size="1" onChange="combo_b3_1()">
      <option <? if($b050==$s1[0]) echo "selected"; ?>><? echo $s1[0]; ?></option>
      <option <? if($b050==$s1[1]) echo "selected"; ?>><? echo $s1[1]; ?></option>
      <option <? if($b050==$s1[2]) echo "selected"; ?>><? echo $s1[2]; ?></option>
    </select>
    </td>
    <td align="left">
    <select name="b051" id="b3_2" size="1">
      <option <? if($b051==$s2[0]) echo "selected"; ?>><? echo $s2[0]; ?></option>
      <option <? if($b051==$s2[1]) echo "selected"; ?>><? echo $s2[1]; ?></option>
      <option <? if($b051==$s2[2]) echo "selected"; ?>><? echo $s2[2]; ?></option>
      <option <? if($b051==$s2[3]) echo "selected"; ?>><? echo $s2[3]; ?></option>
      <option <? if($b051==$s2[4]) echo "selected"; ?>><? echo $s2[4]; ?></option>
      <option <? if($b051==$s2[5]) echo "selected"; ?>><? echo $s2[5]; ?></option>
      <option <? if($b051==$s2[6]) echo "selected"; ?>><? echo $s2[6]; ?></option>
      <option <? if($b051==$s2[7]) echo "selected"; ?>><? echo $s2[7]; ?></option>
      <option <? if($b051==$s2[8]) echo "selected"; ?>><? echo $s2[8]; ?></option>
    </select>
    </td>
    <td align="left"><input type="text" size="10" name="b052" value="<? if($b052 =='') echo ''; else echo $b052;?>"/></td>
    <td align="left"><input type="text" size="2" name="b053" value="<? if($b053 =='') echo ''; else echo $b053;?>"/></td>
    <td align="left"><input type="text" size="4" name="b054" onchange="js:Count(this);" value="<? if($b054 =='') echo ''; else echo $b054;?>"/></td>
    <td align="left"><input type="text" size="2" name="b055" onchange="js:Count(this);" value="<? if($b055 =='') echo ''; else echo $b055;?>"/></td>
    <td align="left"><input type="text" size="4" name="b056" value="<? if($b056 =='') echo ''; else echo $b056;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="b057" value="<? if($b057 =='') echo ''; else echo $b057;?>"/></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">4.</td>
    <td align="left">
    <select name="b060" id="b4_1" size="1" onChange="combo_b4_1()">
      <option <? if($b060==$s1[0]) echo "selected"; ?>><? echo $s1[0]; ?></option>
      <option <? if($b060==$s1[1]) echo "selected"; ?>><? echo $s1[1]; ?></option>
      <option <? if($b060==$s1[2]) echo "selected"; ?>><? echo $s1[2]; ?></option>
    </select>
    </td>
    <td align="left">
    <select name="b061" id="b4_2" size="1">
      <option <? if($b061==$s2[0]) echo "selected"; ?>><? echo $s2[0]; ?></option>
      <option <? if($b061==$s2[1]) echo "selected"; ?>><? echo $s2[1]; ?></option>
      <option <? if($b061==$s2[2]) echo "selected"; ?>><? echo $s2[2]; ?></option>
      <option <? if($b061==$s2[3]) echo "selected"; ?>><? echo $s2[3]; ?></option>
      <option <? if($b061==$s2[4]) echo "selected"; ?>><? echo $s2[4]; ?></option>
      <option <? if($b061==$s2[5]) echo "selected"; ?>><? echo $s2[5]; ?></option>
      <option <? if($b061==$s2[6]) echo "selected"; ?>><? echo $s2[6]; ?></option>
      <option <? if($b061==$s2[7]) echo "selected"; ?>><? echo $s2[7]; ?></option>
      <option <? if($b061==$s2[8]) echo "selected"; ?>><? echo $s2[8]; ?></option>
    </select>
    </td>
    <td align="left"><input type="text" size="10" name="b062" value="<? if($b062 =='') echo ''; else echo $b062;?>"/></td>
    <td align="left"><input type="text" size="2" name="b063" value="<? if($b063 =='') echo ''; else echo $b063;?>"/></td>
    <td align="left"><input type="text" size="4" name="b064" onchange="js:Count(this);" value="<? if($b064 =='') echo ''; else echo $b064;?>"/></td>
    <td align="left"><input type="text" size="2" name="b065" onchange="js:Count(this);" value="<? if($b065 =='') echo ''; else echo $b065;?>"/></td>
    <td align="left"><input type="text" size="4" name="b066" value="<? if($b066 =='') echo ''; else echo $b066;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="b067" value="<? if($b067 =='') echo ''; else echo $b067;?>"/></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">5.</td>
    <td align="left">
    <select name="b070" id="b5_1" size="1" onChange="combo_b5_1()">
      <option <? if($b070==$s1[0]) echo "selected"; ?>><? echo $s1[0]; ?></option>
      <option <? if($b070==$s1[1]) echo "selected"; ?>><? echo $s1[1]; ?></option>
      <option <? if($b070==$s1[2]) echo "selected"; ?>><? echo $s1[2]; ?></option>
    </select>
    </td>
    <td align="left">
    <select name="b071" id="b5_2" size="1">
      <option <? if($b071==$s2[0]) echo "selected"; ?>><? echo $s2[0]; ?></option>
      <option <? if($b071==$s2[1]) echo "selected"; ?>><? echo $s2[1]; ?></option>
      <option <? if($b071==$s2[2]) echo "selected"; ?>><? echo $s2[2]; ?></option>
      <option <? if($b071==$s2[3]) echo "selected"; ?>><? echo $s2[3]; ?></option>
      <option <? if($b071==$s2[4]) echo "selected"; ?>><? echo $s2[4]; ?></option>
      <option <? if($b071==$s2[5]) echo "selected"; ?>><? echo $s2[5]; ?></option>
      <option <? if($b071==$s2[6]) echo "selected"; ?>><? echo $s2[6]; ?></option>
      <option <? if($b071==$s2[7]) echo "selected"; ?>><? echo $s2[7]; ?></option>
      <option <? if($b071==$s2[8]) echo "selected"; ?>><? echo $s2[8]; ?></option>
    </select>
    </td>
    <td align="left"><input type="text" size="10" name="b072" value="<? if($b072 =='') echo ''; else echo $b072;?>"/></td>
    <td align="left"><input type="text" size="2" name="b073" value="<? if($b073 =='') echo ''; else echo $b073;?>"/></td>
    <td align="left"><input type="text" size="4" name="b074" onchange="js:Count(this);" value="<? if($b074 =='') echo ''; else echo $b074;?>"/></td>
    <td align="left"><input type="text" size="2" name="b075" onchange="js:Count(this);" value="<? if($b075 =='') echo ''; else echo $b075;?>"/></td>
    <td align="left"><input type="text" size="4" name="b076" value="<? if($b076 =='') echo ''; else echo $b076;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="b077" value="<? if($b077 =='') echo ''; else echo $b077;?>"/></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">6.</td>
    <td align="left">
    <select name="b080" id="b6_1" size="1" onChange="combo_b6_1()">
      <option <? if($b080==$s1[0]) echo "selected"; ?>><? echo $s1[0]; ?></option>
      <option <? if($b080==$s1[1]) echo "selected"; ?>><? echo $s1[1]; ?></option>
      <option <? if($b080==$s1[2]) echo "selected"; ?>><? echo $s1[2]; ?></option>
    </select>
    </td>
    <td align="left">
    <select name="b081" id="b6_2" size="1">
      <option <? if($b081==$s2[0]) echo "selected"; ?>><? echo $s2[0]; ?></option>
      <option <? if($b081==$s2[1]) echo "selected"; ?>><? echo $s2[1]; ?></option>
      <option <? if($b081==$s2[2]) echo "selected"; ?>><? echo $s2[2]; ?></option>
      <option <? if($b081==$s2[3]) echo "selected"; ?>><? echo $s2[3]; ?></option>
      <option <? if($b081==$s2[4]) echo "selected"; ?>><? echo $s2[4]; ?></option>
      <option <? if($b081==$s2[5]) echo "selected"; ?>><? echo $s2[5]; ?></option>
      <option <? if($b081==$s2[6]) echo "selected"; ?>><? echo $s2[6]; ?></option>
      <option <? if($b081==$s2[7]) echo "selected"; ?>><? echo $s2[7]; ?></option>
      <option <? if($b081==$s2[8]) echo "selected"; ?>><? echo $s2[8]; ?></option>
    </select>
    </td>
    <td align="left"><input type="text" size="10" name="b082" value="<? if($b082 =='') echo ''; else echo $b082;?>"/></td>
    <td align="left"><input type="text" size="2" name="b083" value="<? if($b083 =='') echo ''; else echo $b083;?>"/></td>
    <td align="left"><input type="text" size="4" name="b084" onchange="js:Count(this);" value="<? if($b084 =='') echo ''; else echo $b084;?>"/></td>
    <td align="left"><input type="text" size="2" name="b085" onchange="js:Count(this);" value="<? if($b085 =='') echo ''; else echo $b085;?>"/></td>
    <td align="left"><input type="text" size="4" name="b086" value="<? if($b086 =='') echo ''; else echo $b086;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="b087" value="<? if($b087 =='') echo ''; else echo $b087;?>"/></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">7.</td>
    <td align="left">
    <select name="b090" id="b7_1" size="1" onChange="combo_b7_1()">
      <option <? if($b090==$s1[0]) echo "selected"; ?>><? echo $s1[0]; ?></option>
      <option <? if($b090==$s1[1]) echo "selected"; ?>><? echo $s1[1]; ?></option>
      <option <? if($b090==$s1[2]) echo "selected"; ?>><? echo $s1[2]; ?></option>
    </select>
    </td>
    <td align="left">
    <select name="b091" id="b7_2" size="1">
      <option <? if($b091==$s2[0]) echo "selected"; ?>><? echo $s2[0]; ?></option>
      <option <? if($b091==$s2[1]) echo "selected"; ?>><? echo $s2[1]; ?></option>
      <option <? if($b091==$s2[2]) echo "selected"; ?>><? echo $s2[2]; ?></option>
      <option <? if($b091==$s2[3]) echo "selected"; ?>><? echo $s2[3]; ?></option>
      <option <? if($b091==$s2[4]) echo "selected"; ?>><? echo $s2[4]; ?></option>
      <option <? if($b091==$s2[5]) echo "selected"; ?>><? echo $s2[5]; ?></option>
      <option <? if($b091==$s2[6]) echo "selected"; ?>><? echo $s2[6]; ?></option>
      <option <? if($b091==$s2[7]) echo "selected"; ?>><? echo $s2[7]; ?></option>
      <option <? if($b091==$s2[8]) echo "selected"; ?>><? echo $s2[8]; ?></option>
    </select>
    </td>
    <td align="left"><input type="text" size="10" name="b092" value="<? if($b092 =='') echo ''; else echo $b092;?>"/></td>
    <td align="left"><input type="text" size="2" name="b093" value="<? if($b093 =='') echo ''; else echo $b093;?>"/></td>
    <td align="left"><input type="text" size="4" name="b094" onchange="js:Count(this);" value="<? if($b094 =='') echo ''; else echo $b094;?>"/></td>
    <td align="left"><input type="text" size="2" name="b095" onchange="js:Count(this);" value="<? if($b095 =='') echo ''; else echo $b095;?>"/></td>
    <td align="left"><input type="text" size="4" name="b096" value="<? if($b096 =='') echo ''; else echo $b096;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="b097" value="<? if($b097 =='') echo ''; else echo $b097;?>"/></td>
  </tr>
  <tr>
    <td align="center" nowrap="nowrap">8.</td>
    <td align="left">
    <select name="b100" id="b8_1" size="1" onChange="combo_b8_1()">
      <option <? if($b100==$s1[0]) echo "selected"; ?>><? echo $s1[0]; ?></option>
      <option <? if($b100==$s1[1]) echo "selected"; ?>><? echo $s1[1]; ?></option>
      <option <? if($b100==$s1[2]) echo "selected"; ?>><? echo $s1[2]; ?></option>
    </select>
    </td>
    <td align="left">
    <select name="b101" id="b8_2" size="1">
      <option <? if($b101==$s2[0]) echo "selected"; ?>><? echo $s2[0]; ?></option>
      <option <? if($b101==$s2[1]) echo "selected"; ?>><? echo $s2[1]; ?></option>
      <option <? if($b101==$s2[2]) echo "selected"; ?>><? echo $s2[2]; ?></option>
      <option <? if($b101==$s2[3]) echo "selected"; ?>><? echo $s2[3]; ?></option>
      <option <? if($b101==$s2[4]) echo "selected"; ?>><? echo $s2[4]; ?></option>
      <option <? if($b101==$s2[5]) echo "selected"; ?>><? echo $s2[5]; ?></option>
      <option <? if($b101==$s2[6]) echo "selected"; ?>><? echo $s2[6]; ?></option>
      <option <? if($b101==$s2[7]) echo "selected"; ?>><? echo $s2[7]; ?></option>
      <option <? if($b101==$s2[8]) echo "selected"; ?>><? echo $s2[8]; ?></option>
    </select>
    </td>
    <td align="left"><input type="text" size="10" name="b102" value="<? if($b102 =='') echo ''; else echo $b102;?>"/></td>
    <td align="left"><input type="text" size="2" name="b103" value="<? if($b103 =='') echo ''; else echo $b103;?>"/></td>
    <td align="left"><input type="text" size="4" name="b104" onchange="js:Count(this);" value="<? if($b104 =='') echo ''; else echo $b104;?>"/></td>
    <td align="left"><input type="text" size="2" name="b105" onchange="js:Count(this);" value="<? if($b105 =='') echo ''; else echo $b105;?>"/></td>
    <td align="left"><input type="text" size="4" name="b106" value="<? if($b106 =='') echo ''; else echo $b106;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="b107" value="<? if($b107 =='') echo ''; else echo $b107;?>"/></td>
  </tr>
  <tr>
    <td align="center" nowrap="nowrap">9.</td>
    <td align="left">
    <select name="b110" id="b9_1" size="1" onChange="combo_b9_1()">
      <option <? if($b110==$s1[0]) echo "selected"; ?>><? echo $s1[0]; ?></option>
      <option <? if($b110==$s1[1]) echo "selected"; ?>><? echo $s1[1]; ?></option>
      <option <? if($b110==$s1[2]) echo "selected"; ?>><? echo $s1[2]; ?></option>
    </select>
    </td>
    <td align="left">
    <select name="b111" id="b9_2" size="1">
      <option <? if($b111==$s2[0]) echo "selected"; ?>><? echo $s2[0]; ?></option>
      <option <? if($b111==$s2[1]) echo "selected"; ?>><? echo $s2[1]; ?></option>
      <option <? if($b111==$s2[2]) echo "selected"; ?>><? echo $s2[2]; ?></option>
      <option <? if($b111==$s2[3]) echo "selected"; ?>><? echo $s2[3]; ?></option>
      <option <? if($b111==$s2[4]) echo "selected"; ?>><? echo $s2[4]; ?></option>
      <option <? if($b111==$s2[5]) echo "selected"; ?>><? echo $s2[5]; ?></option>
      <option <? if($b111==$s2[6]) echo "selected"; ?>><? echo $s2[6]; ?></option>
      <option <? if($b111==$s2[7]) echo "selected"; ?>><? echo $s2[7]; ?></option>
      <option <? if($b111==$s2[8]) echo "selected"; ?>><? echo $s2[8]; ?></option>
    </select>
    </td>
    <td align="left"><input type="text" size="10" name="b112" value="<? if($b112 =='') echo ''; else echo $b112;?>"/></td>
    <td align="left"><input type="text" size="2" name="b113" value="<? if($b113 =='') echo ''; else echo $b113;?>"/></td>
    <td align="left"><input type="text" size="4" name="b114" onchange="js:Count(this);" value="<? if($b114 =='') echo ''; else echo $b114;?>"/></td>
    <td align="left"><input type="text" size="2" name="b115" onchange="js:Count(this);" value="<? if($b115 =='') echo ''; else echo $b115;?>"/></td>
    <td align="left"><input type="text" size="4" name="b116" value="<? if($b116 =='') echo ''; else echo $b116;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="b117" value="<? if($b117 =='') echo ''; else echo $b117;?>"/></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">10.</td>
    <td align="left"><input type="text" size="3" name="b120" value="<? if($b120 =='') echo ''; else echo $b120;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="b121" value="<? if($b121 =='') echo ''; else echo $b121;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left" valign="middle"><input type="checkbox" name="b122" onclick="js:chkbox(this);" value="1" <? if($b122 =='1') echo 'checked';?>/>申請雜支</td>
    <td align="left"><input type="text" size="2" name="b123" value="<? if($b123 =='') echo ''; else echo $b123;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="b124" value="<? if($b124 =='') echo ''; else echo $b124;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="b125" value="<? if($b125 =='') echo ''; else echo $b125;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="b126" value="<? if($b126 =='') echo ''; else echo $b126;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="b127" value="<? if($b127 =='') echo ''; else echo $b127;?>"/></td>
  </tr>
</table>
<? if($classes < '13') echo "-->"; ?>
</span>
<p>
下載：<a href="/edu/modules/xSchoolForm/download/A0-1.空白計畫範本.doc" target="_new">空白計畫範本</a><br />
說明：確認送出後，請於學校入口「上傳檔案專區」上傳「補助學校發展教育特色計畫」檔案。
<p>
<input type="button" value="上一頁(不儲存)" onClick="history.go(-1)" />
<input type="submit" name="button" value="儲存並回上一頁" />

<!-- 檢查空值 -->
<script language="JavaScript">
  function toCheck() {
    if ( document.form.afterMon.value == "" ) {
      alert("請由經費表填寫「發展特色申請補助經費」！");
      document.form.afterMon.focus();
      return false;
    }
    if ( document.form.develop.value == "" ) {
      alert("請填寫「發展特色申請項目數量」！");
      document.form.develop.focus();
      return false;
    }
    if ( document.form.char1.value == "" ) {
      alert("班級數 <? echo $classes;?>\n請填寫「優先申請特色一申請項目名稱」！");
      document.form.char1.focus();
      return false;
    }
    if ( document.form.char1Mon.value == "" ) {
      alert("請填寫「優先申請特色一申請經費」！");
      document.form.char1Mon.focus();
      return false;
    }
    if ( document.form.char1a.value == "" ) {
      alert("請填寫「優先申請特色一經常門」！");
      document.form.char1a.focus();
      return false;
    }
    if ( document.form.char1b.value == "" ) {
      alert("請填寫「優先申請特色一資本門」！");
      document.form.char1b.focus();
      return false;
    }
    if ( <? echo $classes;?> >= <? echo $keyClasses;?> && document.form.char2.value == "" ) {
      alert("班級數 <? echo $classes;?>\n請填寫「特色二申請項目名稱」！\n若無請填「無」");
      document.form.char2.focus();
      return false;
    }
    if ( <? echo $classes;?> >= <? echo $keyClasses;?> && document.form.char2Mon.value == "" ) {
      alert("請填寫「特色二申請經費」！\n若無請填0");
      document.form.char2Mon.focus();
      return false;
    }
    if ( <? echo $classes;?> >= <? echo $keyClasses;?> && document.form.char2a.value == "" ) {
      alert("請填寫「特色二經常門」！\n若無請填0");
      document.form.char2a.focus();
      return false;
    }
    if ( <? echo $classes;?> >= <? echo $keyClasses;?> && document.form.char2b.value == "" ) {
      alert("請填寫「特色二資本門」！\n若無請填0");
      document.form.char2b.focus();
      return false;
    }
	//金額檢核
	if(<? echo $classes;?> < <? echo $keyClasses;?> ){var maxMon = 80000; }else{var maxMon = 160000;}
	//alert(maxMon);
    if ( document.form.afterMon.value > maxMon) {
      alert('申請金額超過可申請上限！');
      document.form.afterMon.focus();
      return false;
    }
    if ( document.form.char1Mon.value > 80000) {
		alert('特色一申請金額超過可申請上限！');
		//document.form.char1Mon.focus();
		return false;
    }
    if ( document.form.char2Mon.value > 80000) {
		alert('特色二申請金額超過可申請上限！');
		//document.form.char1Mon.focus();
		return false;
    }
	//申請項目數檢核
	if(<? echo $classes;?> < <? echo $keyClasses;?> ){
		if(document.form.develop.value > 1 ){
			alert('申請項目超過可申請上限！'); 
			document.form.develop.focus();
			return false;
		}
	}else{
		if(document.form.develop.value > 2 ){
			alert('申請項目超過可申請上限！'); 
			document.form.develop.focus();
			return false;
		}
	}
	
			
    return true;
  }
</script>     
  
</form>


<script>
function numsum() { 
	var f = document.forms[0]; 
	f.afterMon.value = (f.char1Mon.value==""?0:parseFloat(f.char1Mon.value)) + (f.char2Mon.value==""?0:parseFloat(f.char2Mon.value)); 
}
function numsum1() { 
	var f = document.forms[0]; 
	f.char1Mon.value = (f.char1b.value==""?0:parseFloat(f.char1b.value)) + (f.char1a.value==""?0:parseFloat(f.char1a.value)); 
}
function numsum2() { 
	var f = document.forms[0]; 
	f.char2Mon.value = (f.char2b.value==""?0:parseFloat(f.char2b.value)) + (f.char2a.value==""?0:parseFloat(f.char2a.value)); 
}
function change1() { 
	var f = document.forms[0]; 
	numsum();
	average();
}
function change2() { 
	var f = document.forms[0]; 
	numsum();
	average();
}
function change3() { 
	var f = document.forms[0]; 
	numsum1();
	change1();	
	average();
} 
function change4() { 
	var f = document.forms[0]; 
	numsum1();
	change1();	
	average();
}
function change5() { 
	var f = document.forms[0]; 
	numsum2();
	change2();	
	average();
}
function change6() { 
	var f = document.forms[0]; 
	numsum2();
	change2();	
	average();
}
</script>
<script>
//
//2
function combo_s2_1(){
	var clsnum=0,newnum=0,i=0;
	clsnum=12;   // 清除下拉選單中的項目數目,取最大
	var selectName=document.form.s2_1.options[document.form.s2_1.selectedIndex].text;
	NewOpt = new Array;

	if (selectName == ""){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("");
		NewOpt[2] = new Option("");
		NewOpt[3] = new Option("");
	}

	if (selectName == "經常門")	{
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("鐘點費");
		NewOpt[2] = new Option("器材購置");
		NewOpt[3] = new Option("器材維護");
		NewOpt[4] = new Option("教材");
		NewOpt[5] = new Option("道具");
		NewOpt[6] = new Option("硬體設備");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維護");
		NewOpt[3] = new Option("硬體設備");
		NewOpt[4] = new Option("其他");
	}

	newnum = NewOpt.length;
	lst = document.form.s2_2.options.length;
	//alert("newnum=" + newnum + "\nlst=" + lst);
	// 清除之前下拉選單中的項目
	for (i = 0; i < clsnum; i++) document.form.s2_2.options[i] = null;
	
	// 加入新選類別的項目
	for (i = 0; i < newnum; i++) document.form.s2_2.options[i] = NewOpt[i];

	//document.form.s2_2.options[0].selected = true;
	document.form.s2_2.options[0].selected = true;
}
//3
function combo_s3_1(){
	var clsnum=0,newnum=0,i;
	clsnum=8;   // 清除下拉選單中的項目數目,取最大
	var selectName=document.form.s3_1.options[document.form.s3_1.selectedIndex].text;
	NewOpt = new Array;

	if (selectName == ""){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("");
		NewOpt[2] = new Option("");
		NewOpt[3] = new Option("");
	}

	if (selectName == "經常門")	{
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("鐘點費");
		NewOpt[2] = new Option("器材購置");
		NewOpt[3] = new Option("器材維護");
		NewOpt[4] = new Option("教材");
		NewOpt[5] = new Option("道具");
		NewOpt[6] = new Option("硬體設備");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維護");
		NewOpt[3] = new Option("硬體設備");
		NewOpt[4] = new Option("其他");
	}

	newnum = NewOpt.length;
	lst = document.form.s3_2.options.length;
	//alert("newnum=" + newnum + "\nlst=" + lst);
	// 清除之前下拉選單中的項目
	for (i = 0; i < clsnum; i++) document.form.s3_2.options[i] = null;
	
	// 加入新選類別的項目
	for (i = 0; i < newnum; i++) document.form.s3_2.options[i] = NewOpt[i];

	//document.form.s3_2.options[0].selected = true;
	document.form.s3_2.options[0].selected = true;
}
//4
function combo_s4_1(){
	var clsnum=0,newnum=0,i;
	clsnum=8;   // 清除下拉選單中的項目數目,取最大
	var selectName=document.form.s4_1.options[document.form.s4_1.selectedIndex].text;
	NewOpt = new Array;

	if (selectName == ""){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("");
		NewOpt[2] = new Option("");
		NewOpt[3] = new Option("");
	}

	if (selectName == "經常門")	{
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("鐘點費");
		NewOpt[2] = new Option("器材購置");
		NewOpt[3] = new Option("器材維護");
		NewOpt[4] = new Option("教材");
		NewOpt[5] = new Option("道具");
		NewOpt[6] = new Option("硬體設備");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維護");
		NewOpt[3] = new Option("硬體設備");
		NewOpt[4] = new Option("其他");
	}

	newnum = NewOpt.length;
	lst = document.form.s4_2.options.length;
	//alert("newnum=" + newnum + "\nlst=" + lst);
	// 清除之前下拉選單中的項目
	for (i = 0; i < clsnum; i++) document.form.s4_2.options[i] = null;
	
	// 加入新選類別的項目
	for (i = 0; i < newnum; i++) document.form.s4_2.options[i] = NewOpt[i];

	//document.form.s4_2.options[0].selected = true;
	document.form.s4_2.options[0].selected = true;
}
//5
function combo_s5_1(){
	var clsnum=0,newnum=0,i;
	clsnum=8;   // 清除下拉選單中的項目數目,取最大
	var selectName=document.form.s5_1.options[document.form.s5_1.selectedIndex].text;
	NewOpt = new Array;

	if (selectName == ""){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("");
		NewOpt[2] = new Option("");
		NewOpt[3] = new Option("");
	}

	if (selectName == "經常門")	{
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("鐘點費");
		NewOpt[2] = new Option("器材購置");
		NewOpt[3] = new Option("器材維護");
		NewOpt[4] = new Option("教材");
		NewOpt[5] = new Option("道具");
		NewOpt[6] = new Option("硬體設備");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維護");
		NewOpt[3] = new Option("硬體設備");
		NewOpt[4] = new Option("其他");
	}

	newnum = NewOpt.length;
	lst = document.form.s5_2.options.length;
	//alert("newnum=" + newnum + "\nlst=" + lst);
	// 清除之前下拉選單中的項目
	for (i = 0; i < clsnum; i++) document.form.s5_2.options[i] = null;
	
	// 加入新選類別的項目
	for (i = 0; i < newnum; i++) document.form.s5_2.options[i] = NewOpt[i];

	//document.form.s5_2.options[0].selected = true;
	document.form.s5_2.options[0].selected = true;
}
//6
function combo_s6_1(){
	var clsnum=0,newnum=0,i;
	clsnum=8;   // 清除下拉選單中的項目數目,取最大
	var selectName=document.form.s6_1.options[document.form.s6_1.selectedIndex].text;
	NewOpt = new Array;

	if (selectName == ""){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("");
		NewOpt[2] = new Option("");
		NewOpt[3] = new Option("");
	}

	if (selectName == "經常門")	{
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("鐘點費");
		NewOpt[2] = new Option("器材購置");
		NewOpt[3] = new Option("器材維護");
		NewOpt[4] = new Option("教材");
		NewOpt[5] = new Option("道具");
		NewOpt[6] = new Option("硬體設備");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維護");
		NewOpt[3] = new Option("硬體設備");
		NewOpt[4] = new Option("其他");
	}

	newnum = NewOpt.length;
	lst = document.form.s6_2.options.length;
	//alert("newnum=" + newnum + "\nlst=" + lst);
	// 清除之前下拉選單中的項目
	for (i = 0; i < clsnum; i++) document.form.s6_2.options[i] = null;
	
	// 加入新選類別的項目
	for (i = 0; i < newnum; i++) document.form.s6_2.options[i] = NewOpt[i];

	//document.form.s6_2.options[0].selected = true;
	document.form.s6_2.options[0].selected = true;
}
//7
function combo_s7_1(){
	var clsnum=0,newnum=0,i;
	clsnum=8;   // 清除下拉選單中的項目數目,取最大
	var selectName=document.form.s7_1.options[document.form.s7_1.selectedIndex].text;
	NewOpt = new Array;

	if (selectName == ""){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("");
		NewOpt[2] = new Option("");
		NewOpt[3] = new Option("");
	}

	if (selectName == "經常門")	{
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("鐘點費");
		NewOpt[2] = new Option("器材購置");
		NewOpt[3] = new Option("器材維護");
		NewOpt[4] = new Option("教材");
		NewOpt[5] = new Option("道具");
		NewOpt[6] = new Option("硬體設備");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維護");
		NewOpt[3] = new Option("硬體設備");
		NewOpt[4] = new Option("其他");
	}

	newnum = NewOpt.length;
	lst = document.form.s7_2.options.length;
	//alert("newnum=" + newnum + "\nlst=" + lst);
	// 清除之前下拉選單中的項目
	for (i = 0; i < clsnum; i++) document.form.s7_2.options[i] = null;
	
	// 加入新選類別的項目
	for (i = 0; i < newnum; i++) document.form.s7_2.options[i] = NewOpt[i];

	//document.form.s7_2.options[0].selected = true;
	document.form.s7_2.options[0].selected = true;
}
//8
function combo_s8_1(){
	var clsnum=0,newnum=0,i;
	clsnum=8;   // 清除下拉選單中的項目數目,取最大
	var selectName=document.form.s8_1.options[document.form.s8_1.selectedIndex].text;
	NewOpt = new Array;

	if (selectName == ""){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("");
		NewOpt[2] = new Option("");
		NewOpt[3] = new Option("");
	}

	if (selectName == "經常門")	{
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("鐘點費");
		NewOpt[2] = new Option("器材購置");
		NewOpt[3] = new Option("器材維護");
		NewOpt[4] = new Option("教材");
		NewOpt[5] = new Option("道具");
		NewOpt[6] = new Option("硬體設備");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維護");
		NewOpt[3] = new Option("硬體設備");
		NewOpt[4] = new Option("其他");
	}

	newnum = NewOpt.length;
	lst = document.form.s8_2.options.length;
	//alert("newnum=" + newnum + "\nlst=" + lst);
	// 清除之前下拉選單中的項目
	for (i = 0; i < clsnum; i++) document.form.s8_2.options[i] = null;
	
	// 加入新選類別的項目
	for (i = 0; i < newnum; i++) document.form.s8_2.options[i] = NewOpt[i];

	//document.form.s8_2.options[0].selected = true;
	document.form.s8_2.options[0].selected = true;
}
//9
function combo_s9_1(){
	var clsnum=0,newnum=0,i;
	clsnum=8;   // 清除下拉選單中的項目數目,取最大
	var selectName=document.form.s9_1.options[document.form.s9_1.selectedIndex].text;
	NewOpt = new Array;

	if (selectName == ""){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("");
		NewOpt[2] = new Option("");
		NewOpt[3] = new Option("");
	}

	if (selectName == "經常門")	{
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("鐘點費");
		NewOpt[2] = new Option("器材購置");
		NewOpt[3] = new Option("器材維護");
		NewOpt[4] = new Option("教材");
		NewOpt[5] = new Option("道具");
		NewOpt[6] = new Option("硬體設備");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維護");
		NewOpt[3] = new Option("硬體設備");
		NewOpt[4] = new Option("其他");
	}

	newnum = NewOpt.length;
	lst = document.form.s9_2.options.length;
	//alert("newnum=" + newnum + "\nlst=" + lst);
	// 清除之前下拉選單中的項目
	for (i = 0; i < clsnum; i++) document.form.s9_2.options[i] = null;
	
	// 加入新選類別的項目
	for (i = 0; i < newnum; i++) document.form.s9_2.options[i] = NewOpt[i];

	//document.form.s9_2.options[0].selected = true;
	document.form.s9_2.options[0].selected = true;
}
</script>
<script>
//經費表二
//b2
function combo_b2_1(){
	var clsnum=0,newnum=0,i;
	clsnum=8;   // 清除下拉選單中的項目數目,取最大
	var selectName=document.form.b2_1.options[document.form.b2_1.selectedIndex].text;
	NewOpt = new Array;

	if (selectName == ""){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("");
		NewOpt[2] = new Option("");
		NewOpt[3] = new Option("");
	}

	if (selectName == "經常門")	{
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("鐘點費");
		NewOpt[2] = new Option("器材購置");
		NewOpt[3] = new Option("器材維護");
		NewOpt[4] = new Option("教材");
		NewOpt[5] = new Option("道具");
		NewOpt[6] = new Option("硬體設備");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維護");
		NewOpt[3] = new Option("硬體設備");
		NewOpt[4] = new Option("其他");
	}

	newnum = NewOpt.length;
	lst = document.form.b2_2.options.length;
	//alert("newnum=" + newnum + "\nlst=" + lst);
	// 清除之前下拉選單中的項目
	for (i = 0; i < clsnum; i++) document.form.b2_2.options[i] = null;
	
	// 加入新選類別的項目
	for (i = 0; i < newnum; i++) document.form.b2_2.options[i] = NewOpt[i];

	//document.form.b2_2.options[0].selected = true;
	document.form.b2_2.options[0].selected = true;
}
//b3
function combo_b3_1(){
	var clsnum=0,newnum=0,i;
	clsnum=8;   // 清除下拉選單中的項目數目,取最大
	var selectName=document.form.b3_1.options[document.form.b3_1.selectedIndex].text;
	NewOpt = new Array;

	if (selectName == ""){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("");
		NewOpt[2] = new Option("");
		NewOpt[3] = new Option("");
	}

	if (selectName == "經常門")	{
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("鐘點費");
		NewOpt[2] = new Option("器材購置");
		NewOpt[3] = new Option("器材維護");
		NewOpt[4] = new Option("教材");
		NewOpt[5] = new Option("道具");
		NewOpt[6] = new Option("硬體設備");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維護");
		NewOpt[3] = new Option("硬體設備");
		NewOpt[4] = new Option("其他");
	}

	newnum = NewOpt.length;
	lst = document.form.b3_2.options.length;
	//alert("newnum=" + newnum + "\nlst=" + lst);
	// 清除之前下拉選單中的項目
	for (i = 0; i < clsnum; i++) document.form.b3_2.options[i] = null;
	
	// 加入新選類別的項目
	for (i = 0; i < newnum; i++) document.form.b3_2.options[i] = NewOpt[i];

	//document.form.b3_2.options[0].selected = true;
	document.form.b3_2.options[0].selected = true;
}
//b4
function combo_b4_1(){
	var clsnum=0,newnum=0,i;
	clsnum=8;   // 清除下拉選單中的項目數目,取最大
	var selectName=document.form.b4_1.options[document.form.b4_1.selectedIndex].text;
	NewOpt = new Array;

	if (selectName == ""){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("");
		NewOpt[2] = new Option("");
		NewOpt[3] = new Option("");
	}

	if (selectName == "經常門")	{
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("鐘點費");
		NewOpt[2] = new Option("器材購置");
		NewOpt[3] = new Option("器材維護");
		NewOpt[4] = new Option("教材");
		NewOpt[5] = new Option("道具");
		NewOpt[6] = new Option("硬體設備");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維護");
		NewOpt[3] = new Option("硬體設備");
		NewOpt[4] = new Option("其他");
	}

	newnum = NewOpt.length;
	lst = document.form.b4_2.options.length;
	//alert("newnum=" + newnum + "\nlst=" + lst);
	// 清除之前下拉選單中的項目
	for (i = 0; i < clsnum; i++) document.form.b4_2.options[i] = null;
	
	// 加入新選類別的項目
	for (i = 0; i < newnum; i++) document.form.b4_2.options[i] = NewOpt[i];

	//document.form.b4_2.options[0].selected = true;
	document.form.b4_2.options[0].selected = true;
}
//b5
function combo_b5_1(){
	var clsnum=0,newnum=0,i;
	clsnum=8;   // 清除下拉選單中的項目數目,取最大
	var selectName=document.form.b5_1.options[document.form.b5_1.selectedIndex].text;
	NewOpt = new Array;

	if (selectName == ""){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("");
		NewOpt[2] = new Option("");
		NewOpt[3] = new Option("");
	}

	if (selectName == "經常門")	{
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("鐘點費");
		NewOpt[2] = new Option("器材購置");
		NewOpt[3] = new Option("器材維護");
		NewOpt[4] = new Option("教材");
		NewOpt[5] = new Option("道具");
		NewOpt[6] = new Option("硬體設備");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維護");
		NewOpt[3] = new Option("硬體設備");
		NewOpt[4] = new Option("其他");
	}

	newnum = NewOpt.length;
	lst = document.form.b5_2.options.length;
	//alert("newnum=" + newnum + "\nlst=" + lst);
	// 清除之前下拉選單中的項目
	for (i = 0; i < clsnum; i++) document.form.b5_2.options[i] = null;
	
	// 加入新選類別的項目
	for (i = 0; i < newnum; i++) document.form.b5_2.options[i] = NewOpt[i];

	//document.form.b5_2.options[0].selected = true;
	document.form.b5_2.options[0].selected = true;
}
//b6
function combo_b6_1(){
	var clsnum=0,newnum=0,i;
	clsnum=8;   // 清除下拉選單中的項目數目,取最大
	var selectName=document.form.b6_1.options[document.form.b6_1.selectedIndex].text;
	NewOpt = new Array;

	if (selectName == ""){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("");
		NewOpt[2] = new Option("");
		NewOpt[3] = new Option("");
	}

	if (selectName == "經常門")	{
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("鐘點費");
		NewOpt[2] = new Option("器材購置");
		NewOpt[3] = new Option("器材維護");
		NewOpt[4] = new Option("教材");
		NewOpt[5] = new Option("道具");
		NewOpt[6] = new Option("硬體設備");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維護");
		NewOpt[3] = new Option("硬體設備");
		NewOpt[4] = new Option("其他");
	}

	newnum = NewOpt.length;
	lst = document.form.b6_2.options.length;
	//alert("newnum=" + newnum + "\nlst=" + lst);
	// 清除之前下拉選單中的項目
	for (i = 0; i < clsnum; i++) document.form.b6_2.options[i] = null;
	
	// 加入新選類別的項目
	for (i = 0; i < newnum; i++) document.form.b6_2.options[i] = NewOpt[i];

	//document.form.b6_2.options[0].selected = true;
	document.form.b6_2.options[0].selected = true;
}
//b7
function combo_b7_1(){
	var clsnum=0,newnum=0,i;
	clsnum=8;   // 清除下拉選單中的項目數目,取最大
	var selectName=document.form.b7_1.options[document.form.b7_1.selectedIndex].text;
	NewOpt = new Array;

	if (selectName == ""){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("");
		NewOpt[2] = new Option("");
		NewOpt[3] = new Option("");
	}

	if (selectName == "經常門")	{
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("鐘點費");
		NewOpt[2] = new Option("器材購置");
		NewOpt[3] = new Option("器材維護");
		NewOpt[4] = new Option("教材");
		NewOpt[5] = new Option("道具");
		NewOpt[6] = new Option("硬體設備");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維護");
		NewOpt[3] = new Option("硬體設備");
		NewOpt[4] = new Option("其他");
	}

	newnum = NewOpt.length;
	lst = document.form.b7_2.options.length;
	//alert("newnum=" + newnum + "\nlst=" + lst);
	// 清除之前下拉選單中的項目
	for (i = 0; i < clsnum; i++) document.form.b7_2.options[i] = null;
	
	// 加入新選類別的項目
	for (i = 0; i < newnum; i++) document.form.b7_2.options[i] = NewOpt[i];

	//document.form.b7_2.options[0].selected = true;
	document.form.b7_2.options[0].selected = true;
}
//b8
function combo_b8_1(){
	var clsnum=0,newnum=0,i;
	clsnum=8;   // 清除下拉選單中的項目數目,取最大
	var selectName=document.form.b8_1.options[document.form.b8_1.selectedIndex].text;
	NewOpt = new Array;

	if (selectName == ""){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("");
		NewOpt[2] = new Option("");
		NewOpt[3] = new Option("");
	}

	if (selectName == "經常門")	{
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("鐘點費");
		NewOpt[2] = new Option("器材購置");
		NewOpt[3] = new Option("器材維護");
		NewOpt[4] = new Option("教材");
		NewOpt[5] = new Option("道具");
		NewOpt[6] = new Option("硬體設備");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維護");
		NewOpt[3] = new Option("硬體設備");
		NewOpt[4] = new Option("其他");
	}

	newnum = NewOpt.length;
	lst = document.form.b8_2.options.length;
	//alert("newnum=" + newnum + "\nlst=" + lst);
	// 清除之前下拉選單中的項目
	for (i = 0; i < clsnum; i++) document.form.b8_2.options[i] = null;
	
	// 加入新選類別的項目
	for (i = 0; i < newnum; i++) document.form.b8_2.options[i] = NewOpt[i];

	//document.form.b8_2.options[0].selected = true;
	document.form.b8_2.options[0].selected = true;
}
//b9
function combo_b9_1(){
	var clsnum=0,newnum=0,i;
	clsnum=8;   // 清除下拉選單中的項目數目,取最大
	var selectName=document.form.b9_1.options[document.form.b9_1.selectedIndex].text;
	NewOpt = new Array;

	if (selectName == ""){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("");
		NewOpt[2] = new Option("");
		NewOpt[3] = new Option("");
	}

	if (selectName == "經常門")	{
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("鐘點費");
		NewOpt[2] = new Option("器材購置");
		NewOpt[3] = new Option("器材維護");
		NewOpt[4] = new Option("教材");
		NewOpt[5] = new Option("道具");
		NewOpt[6] = new Option("硬體設備");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維護");
		NewOpt[3] = new Option("硬體設備");
		NewOpt[4] = new Option("其他");
	}

	newnum = NewOpt.length;
	lst = document.form.b9_2.options.length;
	//alert("newnum=" + newnum + "\nlst=" + lst);
	// 清除之前下拉選單中的項目
	for (i = 0; i < clsnum; i++) document.form.b9_2.options[i] = null;
	
	// 加入新選類別的項目
	for (i = 0; i < newnum; i++) document.form.b9_2.options[i] = NewOpt[i];

	//document.form.b9_2.options[0].selected = true;
	document.form.b9_2.options[0].selected = true;
}
</script>
<script language="JavaScript">
	function Count(obj) //特色一加總
	{
		//控制項的名稱前半部 ex.a03 , a04
		var groupname = left(obj.name);
		//特色一 或 二，1 = a， 2 = b
		var group_ab = groupname.substring(0,1);
		
		//經常 or 資本
		var o = document.getElementsByName(groupname + "0")[0];
		var idx = o.selectedIndex;
	
		//驗證輸入的資料是否為數字 
		var regex = /^[0-9]*$/;
		var flag = 1;
		if (!(regex.test(document.getElementsByName(groupname + 4)[0].value)))
		{
			alert('單價請輸入數字');
			document.getElementsByName(groupname + 4)[0].value = "";
			document.getElementsByName(groupname + 4)[0].focus();
			flag = 0;
		}
		else if(document.getElementsByName(groupname + 4)[0].value < 10000 && idx == 2 && document.getElementsByName(groupname + 4)[0].value != "")
		{
			//資本門單價檢驗
			alert('資本門單價需為一萬元以上');
			document.getElementsByName(groupname + 4)[0].value = "";
			document.getElementsByName(groupname + 4)[0].focus();
			flag = 0;
		}
		
		if (!(regex.test(document.getElementsByName(groupname + 5)[0].value)))
		{
			alert('數量請輸入數字');
			document.getElementsByName(groupname + 5)[0].value = "";
			document.getElementsByName(groupname + 5)[0].focus();
			flag = 0;
		}
	
		//相加,不為空白才執行
		if (flag == 1 && document.getElementsByName(groupname + 4)[0].value != "" && document.getElementsByName(groupname + 5)[0].value != "")
		{
			//類別&項目&單位，不為空白才相加
			var tmp = "";
			switch(groupname)
			{
				case "a03": //第一項不是下拉式選單
					tmp = document.getElementsByName(groupname + 1)[0].value;
					break;
				
				default: //下拉式選單 idx不為0表示不是空白
					var o = document.getElementsByName(groupname + 1)[0];
					var idx = o.selectedIndex;
					if (idx != 0)
						tmp = idx;
					break;
			}
			
			if (tmp != "" && document.getElementsByName(groupname + 2)[0].value != "" && document.getElementsByName(groupname + 3)[0].value != "")
			{
				document.getElementsByName(groupname + 6)[0].value = document.getElementsByName(groupname + 4)[0].value * document.getElementsByName(groupname + 5)[0].value;
				
			}
			
		}
		else if (document.getElementsByName(groupname + 4)[0].value == "" || document.getElementsByName(groupname + 5)[0].value == "")
		{
			document.getElementsByName(groupname + 6)[0].value = "";
			
		}
	
		chkbox(document.getElementsByName(group_ab + "122")[0]);
		
	}
	
	//雜支未選則清空
	function chkbox(obj)
	{
		//控制項的名稱前半部 ex.a03 , a04
		var groupname = left(obj.name);
		//特色一 或 二，1 = a， 2 = b
		var group_ab = groupname.substring(0,1);
	
		if (obj.checked == false)
		{
			document.getElementsByName(groupname + 6)[0].value = "";
		}
		else
		{
			var total = 0;
			
			//項次1不是下拉是選單，另外算
			if(document.getElementsByName(group_ab + "030")[0].value == "經常門" && document.getElementsByName(group_ab + "036")[0].value != "")
			{
				total += parseInt(document.getElementsByName(group_ab + "036")[0].value);
			}
	
			//項次2之後需判斷下拉選單是否為經常門，不是才相加
			for(var i = 4 ; i < 12 ; i++)
			{
				var o = document.getElementsByName(group_ab + padLeft(i.toString(), 2) + "0")[0];
				var idx = o.selectedIndex;
															
				if(idx > 0 && document.getElementsByName(group_ab + padLeft(i.toString(), 2) + "6")[0].value != "")
				{
					if (idx == 1)
					{	
						//經常門
						total += parseInt(document.getElementsByName(group_ab + padLeft(i.toString(), 2) + "6")[0].value);
					}					
				}
			}
	
			document.getElementsByName(groupname + 6)[0].value = parseInt(total * 0.06);
		}
	
		count_all(group_ab);
	}
	
	//計算總金額
	function count_all(group_ab)
	{
		var total = 0; //總計
		var money_1 = 0; //經常門費用
		var money_2 = 0; //資本門
		
		//項次1不是下拉是選單，另外算
		if(document.getElementsByName(group_ab + "036")[0].value != "")
		{
			if(document.getElementsByName(group_ab + "030")[0].value == "經常門")
			{
				money_1 += parseInt(document.getElementsByName(group_ab + "036")[0].value);
			}			
			else
			{
				money_2 += parseInt(document.getElementsByName(group_ab + "036")[0].value);
			}
			
			total += parseInt(document.getElementsByName(group_ab + "036")[0].value);
		}

		//項次2之後需判斷下拉選單是否空白，不是才相加			
		for(var i = 4 ; i < 12 ; i++)
		{
			var o = document.getElementsByName(group_ab + padLeft(i.toString(), 2) + "0")[0];
			var idx = o.selectedIndex;
						
			if(idx > 0 && document.getElementsByName(group_ab + padLeft(i.toString(), 2) + "6")[0].value != "")
			{
				if (idx == 1)
				{	
					//經常門
					money_1 += parseInt(document.getElementsByName(group_ab + padLeft(i.toString(), 2) + "6")[0].value);
				}
				else
				{	
					//資本門
					money_2 += parseInt(document.getElementsByName(group_ab + padLeft(i.toString(), 2) + "6")[0].value);
				}
				
				total += parseInt(document.getElementsByName(group_ab + padLeft(i.toString(), 2) + "6")[0].value);
			}
		}
		
		//項次12不是下拉是選單，另外算(雜支一定是經常門)
		if(document.getElementsByName(group_ab + "126")[0].value != "")
		{
			money_1 += parseInt(document.getElementsByName(group_ab + "126")[0].value);
			total += parseInt(document.getElementsByName(group_ab + "126")[0].value);
		}
		
		if(group_ab == "a")
		{
			//特色一
			document.getElementsByName("char1Mon")[0].value = total;	
			document.getElementsByName("char1a")[0].value = money_1;	
			document.getElementsByName("char1b")[0].value = money_2;	
		}
		else
		{
			//特色二
			document.getElementsByName("char2Mon")[0].value = total;	
			document.getElementsByName("char2a")[0].value = money_1;	
			document.getElementsByName("char2b")[0].value = money_2;	
		}
		
		if (document.getElementsByName("char1Mon")[0].value != "")
			document.getElementsByName("afterMon")[0].value = parseInt(document.getElementsByName("char1Mon")[0].value);
		
		if (document.getElementsByName("char2Mon")[0].value != "")
			document.getElementsByName("afterMon")[0].value = parseInt(document.getElementsByName("afterMon")[0].value) + parseInt(document.getElementsByName("char2Mon")[0].value);
		
	}
	
	//取得群組名稱
	function left(mainStr) 
	{ 
		return mainStr.substring(0,3);
	} 
	
	// 左邊補0
	function padLeft(str,lenght)
	{
		if(str.length >= lenght)
			return str;
		else
			return padLeft("0" + str,lenght);
	}
	
</script>
<?php
//include "combo_a2.php";
include "../../footer.php";
?>