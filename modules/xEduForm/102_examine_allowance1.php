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
}

//補助項目資料	
$sql_allowance = "select  *  from 102allowance1 where account like '$id'";
$result_allowance = mysql_query($sql_allowance);
while($row = mysql_fetch_row($result_allowance)){
	$a010 = $row[10]; //本項目學校申請總額
	$a011 = $row[11]; //本項目學校申請經常門
	$a012 = $row[12]; //本項目學校申請資本門
	$a013 = $row[13]; //親職講座總和
	$a014 = $row[14]; //親職講座場次
	$a015 = $row[15]; //親職講座人數
	$a016 = $row[16]; //家庭訪視總和
	$a017 = $row[17]; //家庭訪視人次
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
	
	//補一設定
	$a030 = "經常門";
	$a031 = "鐘點費";
	$a032 = "內聘講師";
	$a033 = "時";
	$a034 = 800;
	
	$a040 = "經常門";
	$a041 = "鐘點費";
	$a042 = "外聘講師";
	$a043 = "時";
	$a044 = 1200;
	
	$a050 = "經常門";
	$a051 = "鐘點費";
	$a052 = "外聘講師";
	$a053 = "時";
	$a054 = 1600;

	$a060 = "經常門";
	$a061 = "場地費";
	$a062 = "活動場地費";
	$a063 = "次";
	
	$a070 = "經常門";
	$a071 = "誤餐費";
	$a072 = "誤餐費";
	$a073 = "人";
	$a074 = 80;

	$a080 = "經常門";
	$a081 = "講義文件費";
	//$a072 = "講義文件費";
	$a083 = "人";

	$a090 = "經常門";
	$a091 = "其他";

	$a100 = "經常門";
	$a101 = "其他";
	
	$a110 = "經常門";
	$a111 = "其他";
	
	$a120 = "經常門";
	$a121 = "雜支";
	if($a013<1) $a122 = "1"; //若尚未填寫金額，內定為申請雜支
	
	//縣市資料
	$a130 = $row[130];	//本項目縣市審核狀態
	$a131 = $row[131];	//本項目縣市審核意見
	
	$a132 = $row[132];	//本項目縣市初審總額
	$a133 = $row[133];	//本項目縣市初審經常門
	$a134 = $row[134];	//本項目縣市初審資本門
	$a135 = $row[135];	//親職講座總和
	$a136 = $row[136];	//親職講座場次
	$a137 = $row[137];	//親職講座人數
	$a138 = $row[138];	//家庭訪視總和
	$a139 = $row[139];	//家庭訪視人次
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
	
	if($a150=='') $a150=$a036; //初審金額內定為學校申請金額
	if($a154=='') $a154=$a046; //初審金額內定為學校申請金額
	if($a158=='') $a158=$a056; //初審金額內定為學校申請金額
	if($a162=='') $a162=$a066; //初審金額內定為學校申請金額
	if($a166=='') $a166=$a076; //初審金額內定為學校申請金額
	if($a170=='') $a170=$a086; //初審金額內定為學校申請金額
	if($a174=='') $a174=$a096; //初審金額內定為學校申請金額
	if($a178=='') $a178=$a106; //初審金額內定為學校申請金額
	if($a182=='') $a182=$a116; //初審金額內定為學校申請金額
	
	$a151=intval($a036)-intval($a150);	//刪減金額計算
	$a155=$a046-$a154;	//刪減金額計算
	$a159=$a056-$a158;	//刪減金額計算
	$a163=$a066-$a162;	//刪減金額計算
	$a167=$a076-$a166;	//刪減金額計算
	$a171=$a086-$a170;	//刪減金額計算
	$a175=$a096-$a174;	//刪減金額計算
	$a179=$a106-$a178;	//刪減金額計算
	$a183=$a116-$a182;	//刪減金額計算

	
	//教育部資料
	$a190 = $row[190];	//本項目教育部審核狀態
	$a191 = $row[191];	//本項目教育部審核意見
	
	$a192 = $row[192];	//本項目教育部複審總額
	$a193 = $row[193];	//本項目教育部複審經常門
	$a194 = $row[194];	//本項目教育部複審資本門
	
	$a195 = $row[195];	//親職講座總和
	$a196 = $row[196];	//親職講座場次
	$a197 = $row[197];	//親職講座人數
	$a198 = $row[198];	//家庭訪視總和
	$a199 = $row[199];	//家庭訪視人次
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
	if($a242=='') $a242=$a182; //複審金額內定為初審金額
	if($a246=='') $a246=$a186; //複審金額內定為初審金額
	
	$a211=$a150-$a210;	//刪減金額計算
	$a215=$a154-$a214;	//刪減金額計算
	$a219=$a158-$a218;	//刪減金額計算
	$a223=$a162-$a222;	//刪減金額計算
	$a227=$a166-$a226;	//刪減金額計算
	$a231=$a170-$a230;	//刪減金額計算
	$a235=$a174-$a234;	//刪減金額計算
	$a239=$a178-$a238;	//刪減金額計算
	$a243=$a182-$a242;	//刪減金額計算
	$a247=$a186-$a246;
	
}
?> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p><b>補助項目一：推展親職教育活動</b>　<a href="/edu/modules/xSchoolForm/download/allowance-01.htm" target="_blank">(補助項目說明)</a><br />
說明：本項目最高補助7萬元，其中辦理親職教育活動最高補助2萬元，家庭訪視申請補助經費標準最高為每人次200元。
</p>
<form name="form" method="post" action="102_examine_allowance1_finish.php?id=<? echo $id;?>">
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
if($p5_1 == 1){	echo  '　　　'.'指標五～（一）：'.'<br>';}
if($p5_2 == 1){	echo  '　　　'.'指標五～（二）：'.'<br>';}
if($p5_3 == 1){	echo  '　　　'.'指標五～（三）：'.'<br>';}
//if($p6_1 == 1){	echo  '　　　'.'指標六～（一）：'.'<br>';}
//if($p6_2 == 1){	echo  '　　　'.'指標六～（二）：'.'<br>';}

?>
<br />
<b>※親職講座：</b><br />
學校申請：申請補助經費<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($a013);?></font>元，預計辦理親職講座<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $a014; ?></font>場，預計參加人數<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $a015;?></font>人。<br />
<? if($examine == '2') echo '縣市初審：'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a135).'</font>元，'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a136).'</font>場。<br>' ?>

<b><font color=blue>複審金額：<input type="text" size="5" name="a195" value= "<? if($a195 =='') echo $a135; else echo $a195;?>" style="border:0px; text-align: right;" readonly >元</font>，辦理親職講座<input type="text" size="5" name="a196" value= "<? if($a196 =='') echo $a014; else echo $a196;?>"/>場。<br></b>

<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFCC" style="font-size:12px;">
  <tr>
    <td colspan="9" align="center" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;">親職講座經費概算：學校申請</td>
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
    <td align="left"><input type="text" size="3" name="a030" value="<? if($a030 =='') echo ''; else echo $a030;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a031" value="<? if($a031 =='') echo ''; else echo $a031;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a032" value="<? if($a032 =='') echo ''; else echo $a032;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a033" value="<? if($a033 =='') echo ''; else echo $a033;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a034" value="<? if($a034 =='') echo ''; else echo $a034;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a035" value="<? if($a035 =='') echo ''; else echo $a035;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a036" value="<? if($a036 =='') echo ''; else echo $a036;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a037;?></td>
    <td align="left"><input type="text" size="4" name="a150" value="<? if($a150 =='') echo ''; else echo $a150;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a151" value="<? if($a151 =='') echo ''; else echo $a151;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a210" onchange="js:diffMoney(this);" value="<? if($a210 =='') echo ''; else echo $a210;?>"/></td>
    <td align="left"><input type="text" size="4" name="a211" value="<? if($a211 =='') echo ''; else echo $a211;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">2.</td>
    <td align="left"><input type="text" size="3" name="a040" value="<? if($a040 =='') echo ''; else echo $a040;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a041" value="<? if($a041 =='') echo ''; else echo $a041;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a042" value="<? if($a042 =='') echo ''; else echo $a042;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a043" value="<? if($a043 =='') echo ''; else echo $a043;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a044" value="<? if($a044 =='') echo ''; else echo $a044;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a045" value="<? if($a045 =='') echo ''; else echo $a045;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a046" value="<? if($a046 =='') echo ''; else echo $a046;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a047;?></td>
    <td align="left"><input type="text" size="4" name="a154" value="<? if($a154 =='') echo ''; else echo $a154;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a155" value="<? if($a155 =='') echo ''; else echo $a155;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a214" onchange="js:diffMoney(this);" value="<? if($a214 =='') echo ''; else echo $a214;?>"/></td>
    <td align="left"><input type="text" size="4" name="a215" value="<? if($a215 =='') echo ''; else echo $a215;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">3.</td>
    <td align="left"><input type="text" size="3" name="a050" value="<? if($a050 =='') echo ''; else echo $a050;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a051" value="<? if($a051 =='') echo ''; else echo $a051;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a052" value="<? if($a052 =='') echo ''; else echo $a052;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a053" value="<? if($a053 =='') echo ''; else echo $a053;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a054" value="<? if($a054 =='') echo ''; else echo $a054;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a055" value="<? if($a055 =='') echo ''; else echo $a055;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a056" value="<? if($a056 =='') echo ''; else echo $a056;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a057;?></td>
    <td align="left"><input type="text" size="4" name="a158" value="<? if($a158 =='') echo ''; else echo $a158;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a159" value="<? if($a159 =='') echo ''; else echo $a159;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a218" onchange="js:diffMoney(this);" value="<? if($a218 =='') echo ''; else echo $a218;?>"/></td>
    <td align="left"><input type="text" size="4" name="a219" value="<? if($a219 =='') echo ''; else echo $a219;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">4.</td>
    <td align="left"><input type="text" size="3" name="a060" value="<? if($a060 =='') echo ''; else echo $a060;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a061" value="<? if($a061 =='') echo ''; else echo $a061;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a062" value="<? if($a062 =='') echo ''; else echo $a062;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a063" value="<? if($a063 =='') echo ''; else echo $a063;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a064" value="<? if($a064 =='') echo ''; else echo $a064;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a065" value="<? if($a065 =='') echo ''; else echo $a065;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a066" value="<? if($a066 =='') echo ''; else echo $a066;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a067;?></td>
    <td align="left"><input type="text" size="4" name="a162" value="<? if($a162 =='') echo ''; else echo $a162;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a163" value="<? if($a163 =='') echo ''; else echo $a163;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a222" onchange="js:diffMoney(this);" value="<? if($a222 =='') echo ''; else echo $a222;?>"/></td>
    <td align="left"><input type="text" size="4" name="a223" value="<? if($a223 =='') echo ''; else echo $a223;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">5.</td>
    <td align="left"><input type="text" size="3" name="a070" value="<? if($a070 =='') echo ''; else echo $a070;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a071" value="<? if($a071 =='') echo ''; else echo $a071;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a072" value="<? if($a072 =='') echo ''; else echo $a072;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a073" value="<? if($a073 =='') echo ''; else echo $a073;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a074" value="<? if($a074 =='') echo ''; else echo $a074;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a075" value="<? if($a075 =='') echo ''; else echo $a075;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a076" value="<? if($a076 =='') echo ''; else echo $a076;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a077;?></td>
    <td align="left"><input type="text" size="4" name="a166" value="<? if($a166 =='') echo ''; else echo $a166;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a167" value="<? if($a167 =='') echo ''; else echo $a167;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a226" onchange="js:diffMoney(this);" value="<? if($a226 =='') echo ''; else echo $a226;?>"/></td>
    <td align="left"><input type="text" size="4" name="a227" value="<? if($a227 =='') echo ''; else echo $a227;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">6.</td>
    <td align="left"><input type="text" size="3" name="a080" value="<? if($a080 =='') echo ''; else echo $a080;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a081" value="<? if($a081 =='') echo ''; else echo $a081;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a082" value="<? if($a082 =='') echo ''; else echo $a082;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a083" value="<? if($a083 =='') echo ''; else echo $a083;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a084" value="<? if($a084 =='') echo ''; else echo $a084;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a085" value="<? if($a085 =='') echo ''; else echo $a085;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a086" value="<? if($a086 =='') echo ''; else echo $a086;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a087;?></td>
    <td align="left"><input type="text" size="4" name="a170" value="<? if($a170 =='') echo ''; else echo $a170;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a171" value="<? if($a171 =='') echo ''; else echo $a171;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a230" onchange="js:diffMoney(this);" value="<? if($a230 =='') echo ''; else echo $a230;?>"/></td>
    <td align="left"><input type="text" size="4" name="a231" value="<? if($a231 =='') echo ''; else echo $a231;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">7.</td>
    <td align="left"><input type="text" size="3" name="a090" value="<? if($a090 =='') echo ''; else echo $a090;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a091" value="<? if($a091 =='') echo ''; else echo $a091;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a092" value="<? if($a092 =='') echo ''; else echo $a092;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a093" value="<? if($a093 =='') echo ''; else echo $a093;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a094" value="<? if($a094 =='') echo ''; else echo $a094;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a095" value="<? if($a095 =='') echo ''; else echo $a095;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a096" value="<? if($a096 =='') echo ''; else echo $a096;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a097;?></td>
    <td align="left"><input type="text" size="4" name="a174" value="<? if($a174 =='') echo ''; else echo $a174;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a175" value="<? if($a175 =='') echo ''; else echo $a175;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a234" onchange="js:diffMoney(this);" value="<? if($a234 =='') echo ''; else echo $a234;?>"/></td>
    <td align="left"><input type="text" size="4" name="a235" value="<? if($a235 =='') echo ''; else echo $a235;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">8.</td>
    <td align="left"><input type="text" size="3" name="a100" value="<? if($a100 =='') echo ''; else echo $a100;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a101" value="<? if($a101 =='') echo ''; else echo $a101;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left" valign="middle"><input type="text" size="10" name="a102" value="<? if($a102 =='') echo ''; else echo $a102;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="2" name="a103" value="<? if($a103 =='') echo ''; else echo $a103;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a104" value="<? if($a104 =='') echo ''; else echo $a104;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a105" value="<? if($a105 =='') echo ''; else echo $a105;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a106" value="<? if($a106 =='') echo ''; else echo $a106;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a107;?></td>
    <td align="left"><input type="text" size="4" name="a178" value="<? if($a178 =='') echo ''; else echo $a178;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a179" value="<? if($a179 =='') echo ''; else echo $a179;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a238" onchange="js:diffMoney(this);" value="<? if($a238 =='') echo ''; else echo $a238;?>"/></td>
    <td align="left"><input type="text" size="4" name="a239" value="<? if($a239 =='') echo ''; else echo $a239;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    </tr>
  <tr>
    <td align="center" nowrap="nowrap">9.</td>
    <td align="left"><input type="text" size="3" name="a110" value="<? if($a110 =='') echo ''; else echo $a110;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="10" name="a111" value="<? if($a111 =='') echo ''; else echo $a111;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="10" name="a112" value="<? if($a112 =='') echo ''; else echo $a112;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="2" name="a113" value="<? if($a113 =='') echo ''; else echo $a113;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a114" value="<? if($a114 =='') echo ''; else echo $a114;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="2" name="a115" value="<? if($a115 =='') echo ''; else echo $a115;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a116" value="<? if($a116 =='') echo ''; else echo $a116;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><? echo $a117;?></td>
    <td align="left"><input type="text" size="4" name="a182" value="<? if($a182 =='') echo ''; else echo $a182;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a183" value="<? if($a183 =='') echo ''; else echo $a183;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a242" onchange="js:diffMoney(this);" value="<? if($a242 =='') echo ''; else echo $a242;?>"/></td>
    <td align="left"><input type="text" size="4" name="a243" value="<? if($a243 =='') echo ''; else echo $a243;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">10</td>
    <td align="left"><input type="text" size="3" name="a120" value="<? if($a120 =='') echo ''; else echo $a120;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="10" name="a121" value="<? if($a121 =='') echo ''; else echo $a121;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="checkbox" name="a122" onclick="return false;" value="1" <? if($a122 =='1') echo 'checked';?>/>申請雜支</td>
    <td align="left"><input type="text" size="2" name="a123" value="<? if($a123 =='') echo ''; else echo $a123;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a124" value="<? if($a124 =='') echo ''; else echo $a124;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="2" name="a125" value="<? if($a125 =='') echo ''; else echo $a125;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a126" value="<? if($a126 =='') echo ''; else echo $a126;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><? echo $a127;?></td>
    <td align="left"><input type="text" size="4" name="a186" value="<? if($a186 =='') echo ''; else echo $a186;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a187" value="<? if($a187 =='') echo ''; else echo $a187;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a246" onchange="js:diffMoney(this);" value="<? if($a246 =='') echo ''; else echo $a246;?>"/></td>
    <td align="left"><input type="text" size="4" name="a247" value="<? if($a247 =='') echo ''; else echo $a247;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    </tr>
</table>



<p>
<b>※個別家庭訪視：</b><br />
學校申請：個別家庭訪視<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $a017;?></font>人次，申請補助經費<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($a016);?></font>元。<br />
<? if($examine == '2') echo '縣市初審：'.'個別家庭訪視<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a139).'</font>人次，'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.number_format($a138).'</font>元<br>' ?>
<b>複審金額：個別家庭訪視<input type="text" size="5" name="a199" onchange="js:Count_family(this);" value="<? echo $a199;?>"/>人次，<input type="text" size="5" name="a198" value="<? echo $a198;?>"/>元。</b>
<p>
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
if ($a1_1 == ''){echo "‧實施計畫：<font color=red>未上傳</font>";} else {echo '‧實施計畫：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/102/'.$school.'/'.$a1_1.'" style="text-decoration:none" target="_new">'.$a1_1.'</a>';}
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
<input type="hidden" name="allowance"  value="<? echo "allowance1"; ?>" >
<label>
	<input type="radio" name="pass" value="1" id="1" <? if ($a190 == '1') echo 'checked';?>/>審核通過
</label>
<label>
	<input type="radio" name="pass" value="2" id="2" <? if ($a190 == '2') echo 'checked';?>/>審核不通過
</label>
<p>
<input type="button" value="　取消(不儲存)　" onClick="window.close()">
<input type="submit" name="button" value="　確認(儲存送出)　" />
<!--結束 -->
</form>
<script language="JavaScript">
  
	function diffMoney(obj)
	{	
		//取得縣市申請金額欄位名稱，規則a210->a150, a214->a154, a218->a158
		var oldMoneyName = "a" + (right(obj.name) - 60);
				
		//刪減金額欄位名稱
		var diffMoneyName = "a" + (parseInt(right(obj.name))+1);
		
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
			//雜支沒打勾不計算
			//if(!(document.getElementsByName("a122")[0].checked == false && idx == "8"))
			{
				document.getElementsByName(diffMoneyName)[0].value = parseInt(document.getElementsByName(oldMoneyName)[0].value) - parseInt(obj.value);
				chkbox(document.getElementsByName("a122")[0]);
			}
		}

	}
	
	//雜支未選則清空
	function chkbox(obj)
	{
		//if (obj.checked == false)
		{
			//document.getElementsByName("a246")[0].value = "";
			//document.getElementsByName("a247")[0].value = "";
		}

		count_all();
	}

	//計算總金額
	function count_all()
	{
		var total = 0;

		//把a036 ~ a106加總，空值跳過
		for(var i = 210 ; i <= 246 ; i+=4)
		{
			if(document.getElementsByName("a" + i)[0].value != "")
			{
				if(!(i == 246 && document.getElementsByName("a122")[0].checked == false))
					total += parseInt(document.getElementsByName("a" + i)[0].value);
			}
		}
		
		document.getElementsByName("a195")[0].value = total;
		
	}
	
	//計算家庭訪視金額
	function Count_family(obj)
	{
		//驗證輸入的資料是否為數字 
		var regex = /^[0-9]*$/;
		if (!(regex.test(document.getElementsByName("a199")[0].value)))
		{
			alert('「家庭訪視人次」必須為數字');
			document.getElementsByName("a199")[0].value = "";
			document.getElementsByName("a199")[0].focus();
		}
		else
		{
			if (document.getElementsByName("a199")[0].value == "")
				document.getElementsByName("a199")[0].value = 0;
				
			document.getElementsByName("a198")[0].value = parseInt(document.getElementsByName("a199")[0].value) * 200;
			count_all();
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