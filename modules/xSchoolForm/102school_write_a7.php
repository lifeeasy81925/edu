<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
include "./checkdate.php";
$datetime = date ("Y" , mktime(date('Y'))) ; 
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
	
	$s1=array("","資本門");
	$s2=array("","設備購置修繕","場地修繕","工程管理","學校管理","其他");
}
?>
<?	
//a010 學校申請總額
$sql = "select * from 102allowance7 where account like '$username' ";
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
	
	//補七設定
	//$a030 = "經常門";
	//$a031 = "充實設備";
	//$a032 = "內聘講師鐘點費";
	
	//$a100 = "經常門";
	//$a101 = "其他";

	//$a090 = "經常門";
	//$a111 = "其他";
	
	//$a120 = "經常門";
	//$a121 = "雜支";
	//if($a010<1) $a122 = "1"; //若尚未填寫金額，內定為申請雜支
}
		
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="102school_write_a7_finish.php"  onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><b>補助項目七：整修學校社區化活動場所</b>　<a href="/edu/modules/xSchoolForm/download/allowance-07.htm" target="_blank">(補助項目說明)</a></p>
<font color=blue>※補助整修學校社區化活動場所</font><br />
說明：<b><font color=red>本年度限申請補助綜合球場</font></b>，補助上限：修建40萬元，設備20萬元。
<!-- 本年度刪除後面兩項
(2)運動場：修建200公尺以上最高150萬元;未滿200公尺最高100萬元，設備器材30萬元。<br />
(3)修建小型集會風雨教室：2間教室面積最高80萬元，設備40萬元；3間教室面積最高120萬元，設備60萬元；4間教室面積最高160萬元，設備80萬元
-->
<p>
<font color=blue>※申請補助經費<input type="text" size="6" name="money" value="<? if($a010=='') echo ''; else echo $a010;?>"  style="border:0px; text-align: right;" readonly>元</font><p>
※申請補助綜合球場<input type="text" size="6" name="afterGym" /value="<? if($a013=='') echo ''; else echo $a013;?>">座，<font color=blue>修建<input type="text" size="6" name="aftergymMon" onChange="change1()" value="<? if($a011=='') echo ''; else echo $a011;?>" style="border:0px; text-align: right;" readonly >元，設備<input type="text" size="6" name="aftergymExe" onChange="change2()" value="<? if($a012=='') echo ''; else echo $a012;?>" style="border:0px; text-align: right;" readonly >元</font>
<!--    執行<input type="text" size="1" name="aftergymExe" />元,
	執行率<input type="text" size="1" name="aftergymPer" />%<br>-->

<!--　　-申請補助小型集會風雨教室
    <input type="text" size="6" name="afterclass" value="<? if($i1 =='') echo ''; else echo $i1;?>">間,
    經費<input type="text" size="6" name="afterclassMon" value="<? if($i2 =='') echo ''; else echo $i2;?>"/>元<br> 
-->
   <!-- 執行<input type="text" size="1" name="afterclassExe" />元,
	執行率<input type="text" size="1" name="afterclassPer" />%<br>-->

<!--　　-申請補助修建<input type="text" size="6" name="aftergroundsize" value="<? if($j3 =='') echo ''; else echo $j3;?>"/>公尺運動場
    <input type="text" size="6" name="afterground" value="<? if($j1 =='') echo ''; else echo $j1;?>"/>座，經費<input type="text" size="6" name="aftergroundMon" value="<? if($j2 =='') echo ''; else echo $j2;?>"/>元
-->

<!--    執行<input type="text" size="1" name="aftergroundExe" />元,
	執行率<input type="text" size="1" name="aftergroundPer" />%-->
<? //經費表 補助整修學校社區化活動場所 ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
  <tr>
    <td colspan="9" align="left" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;">補助整修學校社區化活動場所經費概算：</td>
    </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
    <td align="center" nowrap="nowrap" bgcolor="#99CCCC">科目</td>
    <td align="center" nowrap="nowrap" bgcolor="#99CCCC">類別</td>
    <td align="center" nowrap="nowrap" bgcolor="#99CCCC">項目</td>
    <td align="center" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
    <td align="center" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
    <td align="center" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
    <td align="center" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
    <td align="center" nowrap="nowrap" bgcolor="#99CCCC">說明</td>
  </tr>
 <tr>
    <td width="10" align="center" nowrap="nowrap">1.</td>
    <td align="left">
    <select name="a030" id="s1_1" size="1" onChange="combo_s1_1()">
      <option <? if($a030==$s1[0]) echo "selected"; ?>><? echo $s1[0]; ?></option>
      <option <? if($a030==$s1[1]) echo "selected"; ?>><? echo $s1[1]; ?></option>
    </select>
    </td>
    <td align="left">
    <select name="a031" id="s1_2" size="1">
      <option <? if($a031==$s2[0]) echo "selected"; ?>><? echo $s2[0]; ?></option>
      <option <? if($a031==$s2[1]) echo "selected"; ?>><? echo $s2[1]; ?></option>
      <option <? if($a031==$s2[2]) echo "selected"; ?>><? echo $s2[2]; ?></option>
      <option <? if($a031==$s2[3]) echo "selected"; ?>><? echo $s2[3]; ?></option>
      <option <? if($a031==$s2[4]) echo "selected"; ?>><? echo $s2[4]; ?></option>
      <option <? if($a031==$s2[5]) echo "selected"; ?>><? echo $s2[5]; ?></option>
    </select>
    </td>
    <td align="left"><input type="text" size="10" name="a032" value="<? if($a032 =='') echo ''; else echo $a032;?>"/></td>
    <td align="left"><input type="text" size="2" name="a033" value="<? if($a033 =='') echo ''; else echo $a033;?>"/></td>
    <td align="left"><input type="text" size="4" name="a034" onchange="js:Count(this);" value="<? if($a034 =='') echo ''; else echo $a034;?>"/></td>
    <td align="left"><input type="text" size="2" name="a035" onchange="js:Count(this);" value="<? if($a035 =='') echo ''; else echo $a035;?>"/></td>
    <td align="left"><input type="text" size="4" name="a036" value="<? if($a036 =='') echo ''; else echo $a036;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="a037" value="<? if($a037 =='') echo ''; else echo $a037;?>"/></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">2.</td>
    <td align="left">
    <select name="a040" id="s2_1" size="1" onChange="combo_s2_1()">
      <option <? if($a040==$s1[0]) echo "selected"; ?>><? echo $s1[0]; ?></option>
      <option <? if($a040==$s1[1]) echo "selected"; ?>><? echo $s1[1]; ?></option>
    </select>
    </td>
    <td align="left">
    <select name="a041" id="s2_2" size="1">
      <option <? if($a041==$s2[0]) echo "selected"; ?>><? echo $s2[0]; ?></option>
      <option <? if($a041==$s2[1]) echo "selected"; ?>><? echo $s2[1]; ?></option>
      <option <? if($a041==$s2[2]) echo "selected"; ?>><? echo $s2[2]; ?></option>
      <option <? if($a041==$s2[3]) echo "selected"; ?>><? echo $s2[3]; ?></option>
      <option <? if($a041==$s2[4]) echo "selected"; ?>><? echo $s2[4]; ?></option>
      <option <? if($a041==$s2[5]) echo "selected"; ?>><? echo $s2[5]; ?></option>
    </select>
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
    <td align="left">
    <select name="a120" id="s10_1" size="1" onChange="combo_s10_1()">
      <option <? if($a120==$s1[0]) echo "selected"; ?>><? echo $s1[0]; ?></option>
      <option <? if($a120==$s1[1]) echo "selected"; ?>><? echo $s1[1]; ?></option>
    </select>
    </td>
    <td align="left">
    <select name="a121" id="s10_2" size="1">
      <option <? if($a121==$s2[0]) echo "selected"; ?>><? echo $s2[0]; ?></option>
      <option <? if($a121==$s2[1]) echo "selected"; ?>><? echo $s2[1]; ?></option>
      <option <? if($a121==$s2[2]) echo "selected"; ?>><? echo $s2[2]; ?></option>
      <option <? if($a121==$s2[3]) echo "selected"; ?>><? echo $s2[3]; ?></option>
      <option <? if($a121==$s2[4]) echo "selected"; ?>><? echo $s2[4]; ?></option>
      <option <? if($a121==$s2[5]) echo "selected"; ?>><? echo $s2[5]; ?></option>
    </select>
    </td>
    <td align="left"><input type="text" size="10" name="a122" value="<? if($a122 =='') echo ''; else echo $a122;?>"/></td>
    <td align="left"><input type="text" size="2" name="a123" value="<? if($a123 =='') echo ''; else echo $a123;?>"/></td>
    <td align="left"><input type="text" size="4" name="a124" onchange="js:Count(this);" value="<? if($a124 =='') echo ''; else echo $a124;?>"/></td>
    <td align="left"><input type="text" size="2" name="a125" onchange="js:Count(this);" value="<? if($a125 =='') echo ''; else echo $a125;?>"/></td>
    <td align="left"><input type="text" size="4" name="a126" value="<? if($a126 =='') echo ''; else echo $a126;?>"/></td>
    <td align="left"><input type="text" size="6" name="a127" value="<? if($a127 =='') echo ''; else echo $a127;?>"/></td>
  </tr>
</table>
<p>
<input type="button" value="上一頁(不儲存)" onClick="history.go(-1)" />
<input type="submit" name="button" value="儲存並回上一頁" />

<!-- 檢查空值 -->
<script language="JavaScript">
  function toCheck() {
    if ( document.form.money.value == "" ) {
      alert("請填寫「預計補助經費」！");
      document.form.money.focus();
      return false;
    }
    if ( document.form.afterGym.value == "" ) {
      alert("請填寫「申請補助綜合球場數量」！");
      document.form.afterGym.focus();
      return false;
    }
    if ( document.form.aftergymMon.value == "" ) {
      alert("請填寫「申請補助綜合球場經費」！");
      document.form.aftergymMon.focus();
      return false;
    }
/*    if ( document.form.afterclass.value == "" ) {
      alert("請填寫「申請補助小型集會風雨教室數量」！");
      document.form.afterclass.focus();
      return false;
    }		
    if ( document.form.afterclassMon.value == "" ) {
      alert("請填寫「申請補助小型集會風雨教室經費」！");
      document.form.afterclassMon.focus();
      return false;
    }		
    if ( document.form.aftergroundsize.value == "" ) {
      alert("請填寫「申請補助運動場長度」！");
      document.form.aftergroundsize.focus();
      return false;
    }
    if ( document.form.afterground.value == "" ) {
      alert("請填寫「申請補助運動場數量」！");
      document.form.afterground.focus();
      return false;
    }	
    if ( document.form.aftergroundMon.value == "" ) {
      alert("請填寫「申請補助運動場金額」！");
      document.form.aftergroundMon.focus();
      return false;
    }	
*/	
	//數值檢核
	if ( document.form.aftergymMon.value > 400000 ) {
      alert("綜合球場補助申請「修建」不得超過40萬元！");
      document.form.aftergymMon.focus();
      return false;
	}
	if ( document.form.aftergymExe.value > 200000 ) {
      alert("綜合球場補助申請「設備」不得超過20萬元！");
      document.form.aftergymExe.focus();
      return false;
	}

    return true;
  }
</script>

</form>

<a href="/edu/modules/xSchoolForm/download/A1-1.推展親職教育活動實施計畫範本.doc" target="_new">下載：修整學校社區化活動場所計畫範本(供參考，可修改標題使用)</a><br />
說明：確認送出後，請於學校入口「上傳檔案專區」上傳「修整學校社區化活動場所計畫」。

<script>
//自動加總
function numsum1() { 
	var f = document.forms[0]; 
	f.money.value = (f.aftergymMon.value==""?0:parseFloat(f.aftergymMon.value)) + (f.aftergymExe.value==""?0:parseFloat(f.aftergymExe.value)); 
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
</script>
<script>
//
//經費表
//
//s1
function combo_s1_1(){
	var clsnum=0,newnum=0,i;
	clsnum=8;   // 清除下拉選單中的項目數目,取最大
	var selectName=document.form.s1_1.options[document.form.s1_1.selectedIndex].text;
	NewOpt = new Array;

	if (selectName == ""){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("");
		NewOpt[2] = new Option("");
		NewOpt[3] = new Option("");
	}

	if (selectName == "經常門")	{
		NewOpt[0] = new Option("");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("設備購置修繕");
		NewOpt[2] = new Option("場地修繕");
		NewOpt[3] = new Option("工程管理");
		NewOpt[4] = new Option("學校管理");
		NewOpt[5] = new Option("其他");
	}

	newnum = NewOpt.length;
	lst = document.form.s1_2.options.length;
	//alert("newnum=" + newnum + "\nlst=" + lst);
	// 清除之前下拉選單中的項目
	for (i = 0; i < clsnum; i++) document.form.s1_2.options[i] = null;
	
	// 加入新選類別的項目
	for (i = 0; i < newnum; i++) document.form.s1_2.options[i] = NewOpt[i];

	//document.form.s1_2.options[0].selected = true;
	document.form.s1_2.options[0].selected = true;
}
//2
function combo_s2_1(){
	var clsnum=0,newnum=0,i;
	clsnum=8;   // 清除下拉選單中的項目數目,取最大
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
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("設備購置修繕");
		NewOpt[2] = new Option("場地修繕");
		NewOpt[3] = new Option("工程管理");
		NewOpt[4] = new Option("學校管理");
		NewOpt[5] = new Option("其他");
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
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("設備購置修繕");
		NewOpt[2] = new Option("場地修繕");
		NewOpt[3] = new Option("工程管理");
		NewOpt[4] = new Option("學校管理");
		NewOpt[5] = new Option("其他");
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
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("設備購置修繕");
		NewOpt[2] = new Option("場地修繕");
		NewOpt[3] = new Option("工程管理");
		NewOpt[4] = new Option("學校管理");
		NewOpt[5] = new Option("其他");
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
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("設備購置修繕");
		NewOpt[2] = new Option("場地修繕");
		NewOpt[3] = new Option("工程管理");
		NewOpt[4] = new Option("學校管理");
		NewOpt[5] = new Option("其他");
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
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("設備購置修繕");
		NewOpt[2] = new Option("場地修繕");
		NewOpt[3] = new Option("工程管理");
		NewOpt[4] = new Option("學校管理");
		NewOpt[5] = new Option("其他");
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
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("設備購置修繕");
		NewOpt[2] = new Option("場地修繕");
		NewOpt[3] = new Option("工程管理");
		NewOpt[4] = new Option("學校管理");
		NewOpt[5] = new Option("其他");
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
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("設備購置修繕");
		NewOpt[2] = new Option("場地修繕");
		NewOpt[3] = new Option("工程管理");
		NewOpt[4] = new Option("學校管理");
		NewOpt[5] = new Option("其他");
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
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("設備購置修繕");
		NewOpt[2] = new Option("場地修繕");
		NewOpt[3] = new Option("工程管理");
		NewOpt[4] = new Option("學校管理");
		NewOpt[5] = new Option("其他");
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
//10
function combo_s10_1(){
	var clsnum=0,newnum=0,i;
	clsnum=8;   // 清除下拉選單中的項目數目,取最大
	var selectName=document.form.s10_1.options[document.form.s10_1.selectedIndex].text;
	NewOpt = new Array;

	if (selectName == ""){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("");
		NewOpt[2] = new Option("");
		NewOpt[3] = new Option("");
	}

	if (selectName == "經常門")	{
		NewOpt[0] = new Option("");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("設備購置修繕");
		NewOpt[2] = new Option("場地修繕");
		NewOpt[3] = new Option("工程管理");
		NewOpt[4] = new Option("學校管理");
		NewOpt[5] = new Option("其他");
	}

	newnum = NewOpt.length;
	lst = document.form.s10_2.options.length;
	//alert("newnum=" + newnum + "\nlst=" + lst);
	// 清除之前下拉選單中的項目
	for (i = 0; i < clsnum; i++) document.form.s10_2.options[i] = null;
	
	// 加入新選類別的項目
	for (i = 0; i < newnum; i++) document.form.s10_2.options[i] = NewOpt[i];

	//document.form.s10_2.options[0].selected = true;
	document.form.s10_2.options[0].selected = true;
}
</script>
<script language="JavaScript">
	function Count(obj) //
	{
		//控制項的名稱前半部 ex.a03 , a04
		var groupname = left(obj.name);
		//a or b
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
		else if(document.getElementsByName(groupname + 4)[0].value < 10000 && idx == 1 && document.getElementsByName(groupname + 4)[0].value != "")
		{
			//資本門單價檢驗
			alert('資本門單價需為一萬元以上');
			document.getElementsByName(groupname + 4)[0].value = "";
			document.getElementsByName(groupname + 4)[0].focus();
			flag = 0;
		}

		else if (!(regex.test(document.getElementsByName(groupname + 5)[0].value)))
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
			if (document.getElementsByName(groupname + 1)[0].value != "" && document.getElementsByName(groupname + 2)[0].value != "" && document.getElementsByName(groupname + 3)[0].value != "")
			{
				document.getElementsByName(groupname + 6)[0].value = document.getElementsByName(groupname + 4)[0].value * document.getElementsByName(groupname + 5)[0].value;
				
			}
			else
			{	/*
				alert('本項次之科目’類別’項目’單位為空白時，不做計算。\n'+
				      '(新增項次時請由左而右依序完整填入整列內容，若非請整列留白)\n');
				document.getElementsByName(groupname + 4)[0].value = "";
				document.getElementsByName(groupname + 5)[0].value = "";
				document.getElementsByName(groupname + 6)[0].value = "";
				*/
				document.getElementsByName(groupname + 6)[0].value = document.getElementsByName(groupname + 4)[0].value * document.getElementsByName(groupname + 5)[0].value;
				
			}
			
		}
		else if (document.getElementsByName(groupname + 4)[0].value == "" || document.getElementsByName(groupname + 5)[0].value == "")
		{
			document.getElementsByName(groupname + 6)[0].value = "";
			
		}
		
		count_all(group_ab);
		
	}
	
	//計算總金額
	function count_all(group_ab)
	{
		var total = 0; //總計
		var money_1 = 0; //經常門費用
		var money_2 = 0; //資本門
		var fix = 0; //修建費用
		var Equipment = 0; //設備費用
		
		//需判斷下拉選單是否空白，不是才相加			
		for(var i = 3 ; i <= 12 ; i++)
		{
			var o = document.getElementsByName(group_ab + padLeft(i.toString(), 2) + "0")[0];
			var idx = o.selectedIndex;
						
			if(idx > 0 && document.getElementsByName(group_ab + padLeft(i.toString(), 2) + "6")[0].value != "")
			{
				if (idx == 1)
				{
					var o_2 = document.getElementsByName(group_ab + padLeft(i.toString(), 2) + "1")[0];
					var idx_2 = o_2.selectedIndex;
					
					if (idx_2 == 1)
					{
						//設備
						Equipment += parseInt(document.getElementsByName(group_ab + padLeft(i.toString(), 2) + "6")[0].value);
					}
					else
					{
						fix += parseInt(document.getElementsByName(group_ab + padLeft(i.toString(), 2) + "6")[0].value);
					}
					
				}
				
				total += parseInt(document.getElementsByName(group_ab + padLeft(i.toString(), 2) + "6")[0].value);
			}
		}
				
		if(group_ab == "a")
		{
			//
			document.getElementsByName("money")[0].value = total;	
			document.getElementsByName("aftergymMon")[0].value = fix;	
			document.getElementsByName("aftergymExe")[0].value = Equipment;	
		}
				
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
include "../../footer.php";
?>