<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
?>
<!--<INPUT TYPE="button" VALUE="回前頁" onClick="history.go(-1)">-->
<?
$username = $xoopsUser->getVar('uname');
global $xoopsDB;
$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
$result_city = $xoopsDB -> query($sql) or die($sql);
while($row = mysql_fetch_row($result_city)){
	$city = $row[1];
	$cityman = $row[2];
	$examine = $row[3];
	$cityno = $row[4];
}
$id = $_GET["id"]; //取回傳遞來的學校編號
echo $username."--";
echo $city."--";
echo $cityman;
include "./checkdate.php";

//學校基本資料
$sql_school = "select * from 102schooldata where account like '$id'";
$result_school = mysql_query($sql_school);
while($row = mysql_fetch_row($result_school)){
	$school = $row[0];	//學校編號
	$class = $row[1];	//國中小別
	$school_name = $row[2].$row[4].$row[5];	//學校全名
	$p100 = $row[100];		//全校學生數
	$classes = $row[101];	//全校班級數
	$datetime = date ("Y" , mktime(date('Y')));
	
	$p147 = $row[147];	//學校填寫資料頁1說明
	$p148 = $row[148];	//學校填寫資料頁2說明
	$p149 = $row[149];	//學校填寫資料頁3說明
	$p189 = $row[189];	//學校填寫資料頁1原因
	$p190 = $row[190];	//學校填寫資料頁2原因
	$p191 = $row[191];	//學校填寫資料頁3原因
	
	$p1_1 = $row[174];	//指標1-1值
    $p1_2 = $row[175];	//指標1-2值
    $p1_3 = $row[176];	//指標1-3值	
    $p1_4 = $row[177];	//指標1-4值
	$p2_1 = $row[178];	//指標2-1值
    $p2_2 = $row[179];	//指標2-2值
    $p2_3 = $row[180];	//指標2-3值	
	$p3_1 = $row[181];	//指標3-1值
	$p4_1 = $row[182];	//指標4-1值
	$p5_1 = $row[183];	//指標5-1值
    $p5_2 = $row[184];	//指標5-2值
    $p5_3 = $row[185];	//指標5-3值	
	$p6_1 = $row[186];	//指標6-1值
    $p6_2 = $row[187];	//指標6-2值
	
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

//補助項目資料	
$sql_allowance = "select * from 102allowance7 where account like '$id'";
$result_allowance = mysql_query($sql_allowance);
while($row = mysql_fetch_row($result_allowance)){
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
	$a029 = $row[29]; //近三年是否補助
	
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
	
	
	
	//縣市資料
	$a130 = $row[130];	//本項目縣市審核狀態
	$a131 = $row[131];	//本項目縣市審核意見
	
	$a132 = $row[132];	//本項目縣市申請總額
	$a133 = $row[133];	//本項目縣市申請經常門
	$a134 = $row[134];	//本項目縣市申請資本門
	$a135 = $row[135];	//
	$a136 = $row[136];	//
	$a137 = $row[137];	//
	$a138 = $row[138];	//
	$a139 = $row[139];	//
	$a140 = $row[140];	//
	$a141 = $row[141];	//
	$a142 = $row[142];	//
	$a143 = $row[143];	//
	$a144 = $row[144];	//
	$a145 = $row[145];	//
	$a146 = $row[146];	//
	$a147 = $row[147];	//
	$a148 = $row[148];	//
	$a149 = $row[149];	//
	
	$a150 = $row[150]; //1-1
	$a151 = $row[151]; //1-2
	$a152 = $row[152]; //1-3
	$a153 = $row[153]; //1-4
	$a154 = $row[154]; //2-1
	$a155 = $row[155]; //2-2
	$a156 = $row[156]; //2-3
	$a157 = $row[157]; //2-4
	$a158 = $row[158]; //3-1
	$a159 = $row[159]; //3-2
	$a160 = $row[160]; //3-3
	$a161 = $row[161]; //3-4
	$a162 = $row[162]; //4-1
	$a163 = $row[163]; //4-2
	$a164 = $row[164]; //4-3
	$a165 = $row[165]; //4-4
	$a166 = $row[166]; //5-1
	$a167 = $row[167]; //5-2
	$a168 = $row[168]; //5-3
	$a169 = $row[169]; //5-4
	$a170 = $row[170]; //6-1
	$a171 = $row[171]; //6-2
	$a172 = $row[172]; //6-3
	$a173 = $row[173]; //6-4
	$a174 = $row[174]; //7-1
	$a175 = $row[175]; //7-2
	$a176 = $row[176]; //7-3
	$a177 = $row[177]; //7-4
	$a178 = $row[178]; //8-1
	$a179 = $row[179]; //8-2
	$a180 = $row[180]; //8-3
	$a181 = $row[181]; //8-4
	$a182 = $row[182]; //9-1
	$a183 = $row[183]; //9-2
	$a184 = $row[184]; //9-3
	$a185 = $row[185]; //9-4
	$a186 = $row[186]; //10-1
	$a187 = $row[187]; //10-2
	$a188 = $row[188]; //10-3
	$a189 = $row[189]; //10-4
	
	if($a150=='') $a150=$a036; //1初審金額內定為學校申請金額
	if($a154=='') $a154=$a046; //2初審金額內定為學校申請金額
	if($a158=='') $a158=$a056; //3初審金額內定為學校申請金額
	if($a162=='') $a162=$a066; //4初審金額內定為學校申請金額
	if($a166=='') $a166=$a076; //5初審金額內定為學校申請金額
	if($a170=='') $a170=$a086; //6初審金額內定為學校申請金額
	if($a174=='') $a174=$a096; //7初審金額內定為學校申請金額
	if($a178=='') $a178=$a106; //8初審金額內定為學校申請金額
	if($a182=='') $a182=$a116; //9初審金額內定為學校申請金額
	if($a186=='') $a186=$a126; //10初審金額內定為學校申請金額
	
	$a151=intval($a036)-intval($a150);	//1刪減金額計算
	$a155=$a046-$a154;	//2刪減金額計算
	$a159=$a056-$a158;	//3刪減金額計算
	$a163=$a066-$a162;	//4刪減金額計算
	$a167=$a076-$a166;	//5刪減金額計算
	$a171=$a086-$a170;	//6刪減金額計算
	$a175=$a096-$a174;	//7刪減金額計算
	$a179=$a106-$a178;	//8刪減金額計算
	$a183=$a116-$a182;	//9刪減金額計算
	$a187=$a126-$a186;	//10刪減金額計算

	//教育部資料
	$a190 = $row[190];	//本項目教育部審核狀態
	$a191 = $row[191];	//本項目教育部審核意見
	
	$a192 = $row[192];	//本項目教育部複審總額
	$a193 = $row[193];	//本項目教育部複審經常門
	$a194 = $row[194];	//本項目教育部複審資本門
	
	$a195 = $row[195];	//
	$a196 = $row[196];	//
	$a197 = $row[197];	//
	$a198 = $row[198];	//
	$a199 = $row[199];	//
	$a200 = $row[200];	//
	$a201 = $row[201];	//
	$a202 = $row[202];	//
	$a203 = $row[203];	//
	$a204 = $row[204];	//
	$a205 = $row[205];	//
	$a206 = $row[206];	//
	$a207 = $row[207];	//
	$a208 = $row[208];	//
	$a209 = $row[209];	//
	
	$a210 = $row[210];	//1-1
	$a211 = $row[211];	//1-2
	$a212 = $row[212];	//1-3
	$a213 = $row[213];	//1-4
	$a214 = $row[214];	//2-1
	$a215 = $row[215];	//2-2
	$a216 = $row[216];	//2-3
	$a217 = $row[217];	//2-4
	$a218 = $row[218];	//3-1
	$a219 = $row[219];	//3-2
	$a220 = $row[220];	//3-3
	$a221 = $row[221];	//3-4
	$a222 = $row[222];	//4-1
	$a223 = $row[223];	//4-2
	$a224 = $row[224];	//4-3
	$a225 = $row[225];	//4-4
	$a226 = $row[226];	//5-1
	$a227 = $row[227];	//5-2
	$a228 = $row[228];	//5-3
	$a229 = $row[229];	//5-4
	$a230 = $row[230];	//6-1
	$a231 = $row[231];	//6-2
	$a232 = $row[232];	//6-3
	$a233 = $row[233];	//6-4
	$a234 = $row[234];	//7-1
	$a235 = $row[235];	//7-2
	$a236 = $row[236];	//7-3
	$a237 = $row[237];	//7-4
	$a238 = $row[238];	//8-1
	$a239 = $row[239];	//8-2
	$a240 = $row[240];	//8-3
	$a241 = $row[241];	//8-4
	$a242 = $row[242];	//9-1
	$a243 = $row[243];	//9-2
	$a244 = $row[244];	//9-3
	$a245 = $row[245];	//9-4
	$a246 = $row[246];	//10-1
	$a247 = $row[247];	//10-2
	$a248 = $row[248];	//10-3
	$a249 = $row[249];	//10-4
	
	if($a210=='') $a210=$a150; //1複審金額內定為初審金額
	if($a214=='') $a214=$a154; //2複審金額內定為初審金額
	if($a218=='') $a218=$a158; //3複審金額內定為初審金額
	if($a222=='') $a222=$a162; //4複審金額內定為初審金額
	if($a226=='') $a226=$a166; //5複審金額內定為初審金額
	if($a230=='') $a230=$a170; //6複審金額內定為初審金額
	if($a234=='') $a234=$a174; //7複審金額內定為初審金額
	if($a238=='') $a238=$a178; //8複審金額內定為初審金額
	if($a242=='') $a242=$a182; //9複審金額內定為初審金額
	if($a246=='') $a246=$a186; //10複審金額內定為初審金額
	
	$a211=$a150-$a210;	//1刪減金額計算
	$a215=$a154-$a214;	//2刪減金額計算
	$a219=$a158-$a218;	//3刪減金額計算
	$a223=$a162-$a222;	//4刪減金額計算
	$a227=$a166-$a226;	//5刪減金額計算
	$a231=$a170-$a230;	//6刪減金額計算
	$a235=$a174-$a234;	//7刪減金額計算
	$a239=$a178-$a238;	//8刪減金額計算
	$a243=$a182-$a242;	//9刪減金額計算
	$a251=$a186-$a246;	//10刪減金額計算
	
}

?> 

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p><b>補助項目七：整修學校社區化活動場所</b>　<a href="/edu/modules/xSchoolForm/download/allowance-07.htm" target="_blank">(補助項目說明)</a><br />
說明：限申請補助綜合球場，補助上限：修建40萬元，設備20萬元。
</p>
<form name="form" method="post" action="102_examine_allowance7_finish.php?id=<? echo $id;?>" onKeyDown="if(event.keyCode == 13) return false;">
●學校：<? echo $school.' '.$school_name;?>
<p>
<b>※符合指標：</b><br>
<? 
//符合指標
if($p1_1 == 1){	echo  '　　　'.'指標一～（一）：'.'<br>';}
if($p1_2 == 1){	echo  '　　　'.'指標一～（二）：'.'<br>';}
if($p1_3 == 1){	echo  '　　　'.'指標一～（三）：'.'<br>';}
if($p1_4 == 1){	echo  '　　　'.'指標一～（四）：'.'<br>';}
if($p2_1 == 1){	echo  '　　　'.'指標二～（一）：'.'<br>';}
if($p2_2 == 1){	echo  '　　　'.'指標二～（二）：'.'<br>';}
if($p2_3 == 1){	echo  '　　　'.'指標二～（三）：'.'<br>';}
//if($p3_1 == 1){	echo  '　　　'.'指標三：'.'<br>';}
if($p4_1 == 1){	echo  '　　　'.'指標四：'.'<br>';}
//if($p5_1 == 1){	echo  '　　　'.'指標五～（一）：'.'<br>';}
//if($p5_2 == 1){	echo  '　　　'.'指標五～（二）：'.'<br>';}
//if($p5_3 == 1){	echo  '　　　'.'指標五～（三）：'.'<br>';}
//if($p6_1 == 1){	echo  '　　　'.'指標六～（一）：'.'<br>';}
//if($p6_2 == 1){	echo  '　　　'.'指標六～（二）：'.'<br>';}
?>
<br>
<b>※申請資料與審核：</b><br>
學校申請：補助綜合球場<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($a013);?></font>座，經費<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($a010);?></font>元，其中包含修建<font face="Arial, Helvetica, sans-serif" color=red size="+1"><? echo number_format($a011);?></font>元，設備<font face="Arial, Helvetica, sans-serif" color=red size="+1"><? echo number_format($a012);?></font>元。<br />
縣市初審：經費共計<font face="Arial, Helvetica, sans-serif" color=red size="+1"><? echo number_format($a132); ?></font>元，其中包含修建<font face="Arial, Helvetica, sans-serif" color=red size="+1"><? echo number_format($a133); ?></font>元，設備<font face="Arial, Helvetica, sans-serif" color=red size="+1"><? echo number_format($a134); ?></font>元。<br />
<b>複審金額：<font color=blue>經費共計<input type="text" size="6" name="a192" value="<? if($a192=='') echo $a132; else echo $a192;?>" style="border:0px; text-align: right;" readonly >元，其中包含修建<input type="text" size="6" name="a193" onChange="change1()" value="<? if($a193=='') echo $a133; else echo $a193;?>" style="border:0px; text-align: right;" readonly >元，設備<input type="text" size="6" name="a194" onChange="change2()" value="<? if($a194=='') echo $a134; else echo $a194;?>" style="border:0px; text-align: right;" readonly >元。</font></b>
<? //經費表 補助項目七 ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
  <tr>
    <td colspan="9" align="center" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;">補助項目七：學校申請</td>
    <td colspan="2" align="center" nowrap="nowrap" bgcolor="#FFCC66"  style="font-size:14px;">縣市初審</td>
    <td colspan="2" align="center" nowrap="nowrap" bgcolor="#FF9966"  style="font-size:14px;">教育部複審</td>
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
    <td align="left" nowrap="nowrap" bgcolor="#FFDD66">初審金額</td>
    <td align="left" nowrap="nowrap" bgcolor="#FFDD66">刪減金額</td>
    <td align="left" nowrap="nowrap" bgcolor="#FFCCCC">複審金額</td>
    <td align="left" nowrap="nowrap" bgcolor="#FFCCCC">刪減金額<br />
      自動產生</td>
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
    <td align="left"><input type="text" size="10" name="a032" value="<? if($a032 =='') echo ''; else echo $a032;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a033" value="<? if($a033 =='') echo ''; else echo $a033;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a034" value="<? if($a034 =='') echo ''; else echo $a034;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a035" value="<? if($a035 =='') echo ''; else echo $a035;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a036" value="<? if($a036 =='') echo ''; else echo $a036;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a037;?></td>
    <td align="left"><input type="text" size="4" name="a150" value="<? if($a150 =='') echo ''; else echo $a150;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a151" value="<? if($a151 =='') echo ''; else echo $a151;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a210" onchange="js:diffMoney(this);" value="<? if($a210 =='') echo ''; else echo $a210;?>"/></td>
    <td align="left"><input type="text" size="4" name="a211" value="<? if($a211 =='') echo ''; else echo $a211;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">2.</td>
    <td align="left">
    <select name="a040" id="s2_1" size="1" onChange="combo_s2_1()" value="<? echo $a040;?>">
      <option <? if($a040==$s1[0]) echo "selected"; ?>><? echo $s1[0]; ?></option>
      <option <? if($a040==$s1[1]) echo "selected"; ?>><? echo $s1[1]; ?></option>
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
    </select>
    <script> 
  		//document.form.s2_2.value="<? echo $a041;?>";
	</script>
    </td>
    <td align="left"><input type="text" size="10" name="a042" value="<? if($a042 =='') echo ''; else echo $a042;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a043" value="<? if($a043 =='') echo ''; else echo $a043;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a044" value="<? if($a044 =='') echo ''; else echo $a044;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a045" value="<? if($a045 =='') echo ''; else echo $a045;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a046" value="<? if($a046 =='') echo ''; else echo $a046;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a047;?></td>
    <td align="left"><input type="text" size="4" name="a154" value="<? if($a154 =='') echo ''; else echo $a154;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a155" value="<? if($a155 =='') echo ''; else echo $a155;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a214" onchange="js:diffMoney(this);" value="<? if($a214 =='') echo ''; else echo $a214;?>"/></td>
    <td align="left"><input type="text" size="4" name="a215" value="<? if($a215 =='') echo ''; else echo $a215;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="a052" value="<? if($a052 =='') echo ''; else echo $a052;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a053" value="<? if($a053 =='') echo ''; else echo $a053;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a054" value="<? if($a054 =='') echo ''; else echo $a054;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a055" value="<? if($a055 =='') echo ''; else echo $a055;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a056" value="<? if($a056 =='') echo ''; else echo $a056;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a057;?></td>
    <td align="left"><input type="text" size="4" name="a158" value="<? if($a158 =='') echo ''; else echo $a158;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a159" value="<? if($a159 =='') echo ''; else echo $a159;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a218" onchange="js:diffMoney(this);" value="<? if($a218 =='') echo ''; else echo $a218;?>"/></td>
    <td align="left"><input type="text" size="4" name="a219" value="<? if($a219 =='') echo ''; else echo $a219;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="a062" value="<? if($a062 =='') echo ''; else echo $a062;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a063" value="<? if($a063 =='') echo ''; else echo $a063;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a064" value="<? if($a064 =='') echo ''; else echo $a064;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a065" value="<? if($a065 =='') echo ''; else echo $a065;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a066" value="<? if($a066 =='') echo ''; else echo $a066;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a067;?></td>
    <td align="left"><input type="text" size="4" name="a162" value="<? if($a162 =='') echo ''; else echo $a162;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a163" value="<? if($a163 =='') echo ''; else echo $a163;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a222" onchange="js:diffMoney(this);" value="<? if($a222 =='') echo ''; else echo $a222;?>"/></td>
    <td align="left"><input type="text" size="4" name="a223" value="<? if($a223 =='') echo ''; else echo $a223;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="a072" value="<? if($a072 =='') echo ''; else echo $a072;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a073" value="<? if($a073 =='') echo ''; else echo $a073;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a074" value="<? if($a074 =='') echo ''; else echo $a074;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a075" value="<? if($a075 =='') echo ''; else echo $a075;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a076" value="<? if($a076 =='') echo ''; else echo $a076;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a077;?></td>
    <td align="left"><input type="text" size="4" name="a166" value="<? if($a166 =='') echo ''; else echo $a166;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a167" value="<? if($a167 =='') echo ''; else echo $a167;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a226" onchange="js:diffMoney(this);" value="<? if($a226 =='') echo ''; else echo $a226;?>"/></td>
    <td align="left"><input type="text" size="4" name="a227" value="<? if($a227 =='') echo ''; else echo $a227;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="a082" value="<? if($a082 =='') echo ''; else echo $a082;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a083" value="<? if($a083 =='') echo ''; else echo $a083;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a084" value="<? if($a084 =='') echo ''; else echo $a084;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a085" value="<? if($a085 =='') echo ''; else echo $a085;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a086" value="<? if($a086 =='') echo ''; else echo $a086;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a087;?></td>
    <td align="left"><input type="text" size="4" name="a170" value="<? if($a170 =='') echo ''; else echo $a170;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a171" value="<? if($a171 =='') echo ''; else echo $a171;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a230" onchange="js:diffMoney(this);" value="<? if($a230 =='') echo ''; else echo $a230;?>"/></td>
    <td align="left"><input type="text" size="4" name="a231" value="<? if($a231 =='') echo ''; else echo $a231;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="a092" value="<? if($a092 =='') echo ''; else echo $a092;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a093" value="<? if($a093 =='') echo ''; else echo $a093;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a094" value="<? if($a094 =='') echo ''; else echo $a094;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a095" value="<? if($a095 =='') echo ''; else echo $a095;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a096" value="<? if($a096 =='') echo ''; else echo $a096;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a097;?></td>
    <td align="left"><input type="text" size="4" name="a174" value="<? if($a174 =='') echo ''; else echo $a174;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a175" value="<? if($a175 =='') echo ''; else echo $a175;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a234" onchange="js:diffMoney(this);" value="<? if($a234 =='') echo ''; else echo $a234;?>"/></td>
    <td align="left"><input type="text" size="4" name="a235" value="<? if($a235 =='') echo ''; else echo $a235;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="a102" value="<? if($a102 =='') echo ''; else echo $a102;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a103" value="<? if($a103 =='') echo ''; else echo $a103;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a104" value="<? if($a104 =='') echo ''; else echo $a104;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a105" value="<? if($a105 =='') echo ''; else echo $a105;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a106" value="<? if($a106 =='') echo ''; else echo $a106;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a107;?></td>
    <td align="left"><input type="text" size="4" name="a178" value="<? if($a178 =='') echo ''; else echo $a178;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a179" value="<? if($a179 =='') echo ''; else echo $a179;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a238" onchange="js:diffMoney(this);" value="<? if($a238 =='') echo ''; else echo $a238;?>"/></td>
    <td align="left"><input type="text" size="4" name="a239" value="<? if($a239 =='') echo ''; else echo $a239;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="a112" value="<? if($a112 =='') echo ''; else echo $a112;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a113" value="<? if($a113 =='') echo ''; else echo $a113;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a114" value="<? if($a114 =='') echo ''; else echo $a114;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a115" value="<? if($a115 =='') echo ''; else echo $a115;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a116" value="<? if($a116 =='') echo ''; else echo $a116;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a117;?></td>
    <td align="left"><input type="text" size="4" name="a182" value="<? if($a182 =='') echo ''; else echo $a182;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a183" value="<? if($a183 =='') echo ''; else echo $a183;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a242" onchange="js:diffMoney(this);" value="<? if($a242 =='') echo ''; else echo $a242;?>"/></td>
    <td align="left"><input type="text" size="4" name="a243" value="<? if($a243 =='') echo ''; else echo $a243;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="a122" value="<? if($a122 =='') echo ''; else echo $a122;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a123" value="<? if($a123 =='') echo ''; else echo $a123;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a124" value="<? if($a124 =='') echo ''; else echo $a124;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a125" value="<? if($a125 =='') echo ''; else echo $a125;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a126" value="<? if($a126 =='') echo ''; else echo $a126;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a127;?></td>
    <td align="left"><input type="text" size="4" name="a186" value="<? if($a186 =='') echo ''; else echo $a186;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a187" value="<? if($a187 =='') echo ''; else echo $a187;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a246" onchange="js:diffMoney(this);" value="<? if($a246 =='') echo ''; else echo $a246;?>"/></td>
    <td align="left"><input type="text" size="4" name="a247" value="<? if($a247 =='') echo ''; else echo $a247;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    </tr>
</table>
<p>
<? if($examine == '2') echo '※初審意見：'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.$a131.'</font><br>'?>
<b>※複審意見：</b><textarea name="a191" cols="60" rows="2"><? echo $a191;?></textarea>
<p>
<?
//讀取學校檔案資料
$sql = "select * from 102school_upload_name where account like '$school'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$p2 = $row[02];
	$a1_1 = $row[06];
	$a1_2 = $row[07];
	$a1_3 = $row[08];
	$a1_4 = $row[09];
	$a2_1 = $row[10];
	$a2_2 = $row[11];
	$a2_3 = $row[12];
	$a2_4 = $row[13];
	$a3_1 = $row[14];
	$a3_2 = $row[15];
	$a3_3 = $row[16];
	$a3_4 = $row[17];
	$a4_1 = $row[18];
	$a4_2 = $row[19];
	$a4_3 = $row[20];
	$a4_4 = $row[21];
	$a5_1 = $row[22];
	$a5_2 = $row[23];
	$a5_3 = $row[24];
	$a5_4 = $row[25];
	$a6_1 = $row[26];
	$a6_2 = $row[27];
	$a6_3 = $row[28];
	$a6_4 = $row[29];
	$a7_1 = $row[30];
	$a7_2 = $row[31];
	$a7_3 = $row[32];
	$a7_4 = $row[33];
	$a8_1 = $row[34];
	$a8_2 = $row[35];
	$a8_3 = $row[36];
	$a8_4 = $row[37];
}
//列出狀態訊息
echo "<b>※應上傳檔案：</b><br>";
if ($a7_1 == ''){echo "‧實施計畫：<font color=red>未上傳</font>";} else {echo '‧實施計畫：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/102/'.$school.'/'.$a7_1.'" style="text-decoration:none" target="_new">'.$a7_1.'</a>';}
?>
<? if($p149=="") echo "<!--"; ?>
<br /><? if ($p2 == ''){echo "‧目標學生名冊：<font color=red>未上傳</font>";} else {echo '‧目標學生名冊：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/102/'.$school.'/'.$p2.'" style="text-decoration:none" target="_new">'.$p2.'</a>';}?><br />
<? echo "‧警示原因_目標學生：<font color=red>".$p191."</font><br>"; ?>
<? echo "‧學校說明_目標學生：".$p149; ?>
<? if($p149=="") echo "-->"; ?>
<? if($p147=="") echo "<!--"; ?><br />
<? echo "‧警示原因_學校資料：<font color=red>".$p189."</font><br>"; ?>
<? echo "‧學校說明_學校資料：".$p147; ?>
<? if($p147=="") echo "-->"; ?>
<? if($p148=="") echo "<!--"; ?><br />
<? echo "‧警示原因_教師資料：<font color=red>".$p190."</font><br>"; ?>
<? echo "‧學校說明_教師資料：".$p148; ?>
<? if($p148=="") echo "-->"; ?>
<p>
<b>※審核結果：</b>
<input type="hidden" name="sid"  value="<? echo $school; ?>" >
<input type="hidden" name="allowance"  value="<? echo "allowance7"; ?>" >
<label>
	<input type="radio" name="pass" value="1" id="1" <? if ($a190=='1') echo 'checked';?>/>審核通過
</label>
<label>
	<input type="radio" name="pass" value="2" id="2" <? if ($a190=='2') echo 'checked';?>/>審核不通過
</label>
<p>
<input type="button" value="　取消(不儲存)　" onClick="window.close()">
<input type="submit" name="button" value="　確認(儲存送出)　" />
<!--結束 -->
</form>
<script language="JavaScript">
//申請補助經費更新
function numsum() { 
	var f = document.forms[0]; 
	f.a192.value = (f.a193.value==""?0:parseFloat(f.a193.value)) + (f.a194.value==""?0:parseFloat(f.a194.value)); 
}

function change1() { 
	var f = document.forms[0]; 
	numsum();
}
function change2() { 
	var f = document.forms[0]; 
	numsum();
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
  
	function diffMoney(obj)
	{	
		//1 = a， 2 = b
		var group_ab = obj.name.substring(0,1);
		
		//取得縣市申請金額欄位名稱，規則a210->a150, a214->a154, a218->a158
		var oldMoneyName = group_ab + (right(obj.name) - 60);
				
		//刪減金額欄位名稱
		var diffMoneyName = group_ab + (parseInt(right(obj.name))+1);
		
		//驗證輸入的資料是否為數字 
		var regex = /^[0-9]*$/;
		var flag = 1;
		var idx = ((parseInt(right(obj.name)) - 210) / 4) + 1 ; //計算項次
		
		if (!(regex.test(obj.value)) || obj.value == "")
		{
			alert('項次 ' + idx + ' 請輸入數字');
			obj.value = "";
			obj.focus();
			flag = 0;
		}

		if (flag == 1 && document.getElementsByName(oldMoneyName)[0].value != "")//
		{
			document.getElementsByName(diffMoneyName)[0].value = parseInt(document.getElementsByName(oldMoneyName)[0].value) - parseInt(obj.value);
			count_all(group_ab);
		}

	}
	
	//雜支未選則清空
	function chkbox(obj)
	{
		//特色一 或 二，1 = a， 2 = b
		var group_ab = obj.name.substring(0,1);
		
		if (obj.checked == false)
		{
			document.getElementsByName(group_ab + "246")[0].value = "";
			document.getElementsByName(group_ab + "247")[0].value = "";
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
						
			//審核金額欄位名稱
			var newMoneyName = group_ab + (210 + ((i - 3) * 4));
			
			if(idx > 0 && parseInt(document.getElementsByName(newMoneyName)[0].value) != "")
			{
				if (idx == 1)
				{
					var o_2 = document.getElementsByName(group_ab + padLeft(i.toString(), 2) + "1")[0];
					var idx_2 = o_2.selectedIndex;
					
					if (idx_2 == 1)
					{
						//設備
						Equipment += parseInt(document.getElementsByName(newMoneyName)[0].value);
					}
					else
					{
						fix += parseInt(document.getElementsByName(newMoneyName)[0].value);
					}
					
				}
				
				total += parseInt(document.getElementsByName(newMoneyName)[0].value);
			}
		}
				
		if(group_ab == "a")
		{
			//
			document.getElementsByName("a192")[0].value = total;	
			document.getElementsByName("a193")[0].value = fix;	
			document.getElementsByName("a194")[0].value = Equipment;	
		}
		
	}

	//取得群組名稱
	function left(mainStr) 
	{ 
		return mainStr.substring(0,3);
	}
	
	//取得控制項數字
	function right(mainStr) 
	{ 
		var iLen = String(mainStr).length;
		return mainStr.substring(iLen,iLen - 3);
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
//include "../../footer.php";
?>