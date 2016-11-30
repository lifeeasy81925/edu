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
	
	//$s1=array("","經常門","資本門");
	//$s2=array("","鐘點費","旅運費","材料費","器材購置","器材維修","修繕","其他");
	

}

//補助項目資料	
$sql_allowance = "select * from 102allowance6 where account like '$id'";
$result_allowance = mysql_query($sql_allowance);
while($row = mysql_fetch_row($result_allowance)){
	$a010 = $row[10]; //本項目學校申請總額
	$a011 = $row[11]; //本項目學校申請經常門
	$a012 = $row[12]; //本項目學校申請資本門
	$a013 = $row[13]; //租車費搭車人數
	$a014 = $row[14]; //租車費搭車金額
	$a015 = $row[15]; //交通費補助人數
	$a016 = $row[16]; //交通費補助金額
	$a017 = $row[17]; //交通車人座
	$a018 = $row[18]; //交通車金額
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
	
	//補六設定
	//$a120 = "經常門";
	//$a121 = "雜支";
	
	//縣市資料
	$a130 = $row[130];	//本項目縣市審核狀態
	$a131 = $row[131];	//本項目縣市審核意見
	
	$a132 = $row[132];	//本項目縣市申請總額
	$a133 = $row[133];	//本項目縣市申請經常門
	$a134 = $row[134];	//本項目縣市申請資本門
	$a135 = $row[135];	//縣市租車費搭車人數
	$a136 = $row[136];	//縣市租車費搭車金額
	$a137 = $row[137];	//縣市交通費補助人數
	$a138 = $row[138];	//縣市交通費補助金額
	$a139 = $row[139];	//縣市交通車人座
	$a140 = $row[140];	//縣市交通車金額
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
	
	if($a150=='') $a150=$a036; //初審金額內定為學校申請金額
	if($a154=='') $a154=$a046; //初審金額內定為學校申請金額
	if($a158=='') $a158=$a056; //初審金額內定為學校申請金額
	if($a162=='') $a162=$a066; //初審金額內定為學校申請金額
	if($a166=='') $a166=$a076; //初審金額內定為學校申請金額
	if($a170=='') $a170=$a086; //初審金額內定為學校申請金額
	if($a174=='') $a174=$a096; //初審金額內定為學校申請金額
	if($a178=='') $a178=$a106; //初審金額內定為學校申請金額
	if($a182=='') $a182=$a116; //初審金額內定為學校申請金額
	if($a186=='') $a186=$a126; //初審金額內定為學校申請金額
	
	$a151=intval($a036)-intval($a150);	//刪減金額計算
	$a155=$a046-$a154;	//刪減金額計算
	$a159=$a056-$a158;	//刪減金額計算
	$a163=$a066-$a162;	//刪減金額計算
	$a167=$a076-$a166;	//刪減金額計算
	$a171=$a086-$a170;	//刪減金額計算
	$a175=$a096-$a174;	//刪減金額計算
	$a179=$a106-$a178;	//刪減金額計算
	$a183=$a116-$a182;	//刪減金額計算
	$a187=$a126-$a186;	//刪減金額計算

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
	
	if($a210=='') $a210=$a150; //複審金額內定為初審金額
	if($a214=='') $a214=$a154; //複審金額內定為初審金額
	if($a218=='') $a218=$a158; //複審金額內定為初審金額
	if($a222=='') $a222=$a162; //複審金額內定為初審金額
	if($a226=='') $a226=$a166; //複審金額內定為初審金額
	if($a230=='') $a230=$a170; //複審金額內定為初審金額
	if($a234=='') $a234=$a174; //複審金額內定為初審金額
	if($a238=='') $a238=$a178; //複審金額內定為初審金額
	
	$a211=$a150-$a210;	//刪減金額計算
	$a215=$a154-$a214;	//刪減金額計算
	$a219=$a158-$a218;	//刪減金額計算
	$a223=$a162-$a222;	//刪減金額計算
	$a227=$a166-$a226;	//刪減金額計算
	$a231=$a170-$a230;	//刪減金額計算
	$a235=$a174-$a234;	//刪減金額計算
	$a239=$a178-$a238;	//刪減金額計算
}

?> 

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p><b>補助項目六：補助交通不便地區學校交通車</b>　<a href="/edu/modules/xSchoolForm/download/allowance-06.htm" target="_blank">(補助項目說明)</a><br />
說明：僅能選擇一項補助
</p>
<form name="form" method="post" action="102_examine_allowance6_finish.php?id=<? echo $id;?>" onKeyDown="if(event.keyCode == 13) return false;">
●學校：<? echo $school.' '.$school_name;?>
<p>
<b>※符合指標：</b><br>
<? 
//符合指標
//if($p1_1 == 1){	echo  '　　　'.'指標一～（一）：'.'<br>';}
//if($p1_2 == 1){	echo  '　　　'.'指標一～（二）：'.'<br>';}
//if($p1_3 == 1){	echo  '　　　'.'指標一～（三）：'.'<br>';}
//if($p1_4 == 1){	echo  '　　　'.'指標一～（四）：'.'<br>';}
//if($p2_1 == 1){	echo  '　　　'.'指標二～（一）：'.'<br>';}
//if($p2_2 == 1){	echo  '　　　'.'指標二～（二）：'.'<br>';}
//if($p2_3 == 1){	echo  '　　　'.'指標二～（三）：'.'<br>';}
//if($p3_1 == 1){	echo  '　　　'.'指標三：'.'<br>';}
//if($p4_1 == 1){	echo  '　　　'.'指標四：'.'<br>';}
if($p5_1 == 1){	echo  '　　　'.'指標五～（一）：'.'<br>';}
if($p5_2 == 1){	echo  '　　　'.'指標五～（二）：'.'<br>';}
if($p5_3 == 1){	echo  '　　　'.'指標五～（三）：'.'<br>';}
//if($p6_1 == 1){	echo  '　　　'.'指標六～（一）：'.'<br>';}
//if($p6_2 == 1){	echo  '　　　'.'指標六～（二）：'.'<br>';}
?>
<br>
<b>※申請資料與審核：</b><br>
<? if($a136 < 1) echo '<!--'; ?>
●補助租車費：補助人數<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($a013);?></font>人，學校申請經費<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($a014);?></font>元。
<? if($examine == '2') echo '縣市初審'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a136).'</font>元。'?>
<b>審核金額<input type="text" size="6" name="a196" value="<? if($a196=='') echo ''; else echo $a196;?>" >元</b>。<br>
　　　•搭車人數 9 人以下最高核列 7 萬元<br>
　　　•搭車人數 10至25 人以下最高核列 21 萬元<br>
　　　•搭車人數 26 人以上最高核列 40 萬元
<p>
<? if($a136 < 1) echo '-->'; ?>
<? if($a138 < 1) echo '<!--'; ?>
●補助交通費：補助人數<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($a015);?></font>人，學校申請經費<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($a016);?></font>元。
<? if($examine == '2') echo '縣市初審'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a138).'</font>元。'?>
<b>審核金額<input type="text" size="6" name="a198" value="<? if($a198=='') echo ''; else echo $a198;?>" >元</b>。<br>
　　　•每生每年補助 12000 元，最高依租車費標準為限。
<p>
<? if($a138 < 1) echo '-->'; ?>
<? if($a140 < 1) echo '<!--'; ?>
●補助交通車：補助車輛<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($a017);?></font>人座，學校申請經費<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($a018);?></font>元。
<? if($examine == '2') echo '縣市初審'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a140).'</font>元。'?>
<b>審核金額<input type="text" size="6" name="a200" value="<? if($a200=='') echo ''; else echo $a200;?>" >元</b>。<br>
　　　•座位 11 人以下最高核列 100 萬元<br>
　　　•座位 12至21 人最高核列 272 萬元<br>
　　　•座位 22 人以上最高核列 415 萬元
<p>
<? if($a140 < 1) echo '-->'; ?>
<? if($examine == '2') echo '※初審意見：'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.$a131.'</font><br>'?>
<b>※審核意見：</b><textarea name="a191" cols="60" rows="2"><? echo $a191;?></textarea>
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
if ($a6_1 == ''){echo "‧實施計畫：<font color=red>未上傳</font>";} else {echo '‧實施計畫：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/102/'.$school.'/'.$a6_1.'" style="text-decoration:none" target="_new">'.$a6_1.'</a>';}
echo "<br />";
if ($a6_2 == ''){echo "‧各搭車路線學生名冊：<font color=red>未上傳</font>";} else {echo '‧各搭車路線學生名冊：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/102/'.$school.'/'.$a6_2.'" style="text-decoration:none" target="_new">'.$a6_2.'</a>';}
echo "<br />";
if ($a6_3 == ''){echo "‧學校現有交通車調查表：<font color=red>未上傳</font>";} else {echo '‧學校現有交通車調查表：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/102/'.$school.'/'.$a6_3.'" style="text-decoration:none" target="_new">'.$a6_3.'</a>';}
echo "<br />";
?>

<p>
<b>※審核結果：</b>
<input type="hidden" name="sid"  value="<? echo $school; ?>" >
<input type="hidden" name="allowance"  value="<? echo "allowance6"; ?>" >
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

<?php
//include "../../footer.php";
?>
