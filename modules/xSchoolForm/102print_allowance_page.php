<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
$sql = "select * from 102schooldata where account like '$username' ";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$id = $row[0]; //帳號
	$type = $row[1]; //學校型態
	$city = $row[2]; //縣市
	$district = $row[4]; //區
	$school = $row[5]; //學校名稱
	$p026 = $row[26];  //前一年度全校學生數
	$p100 = $row[100]; //全校學生數
	$p101 = $row[101]; //全校班級數
	$p102 = $row[102]; //一年級班數
	$p103 = $row[103]; //二年級班數
	$p104 = $row[104]; //三年級班數
	$p105 = $row[105]; //四年級班數
	$p106 = $row[106]; //五年級班數
	$p107 = $row[107]; //六年級班數
	$p108 = $row[108]; //特殊班班數
	$p109 = $row[109]; //學校所在區域
	$p110 = $row[110]; //85-91曾受補助興建社區化活動場所
	
	$p113 = $row[113]; //原住民學生數
	$p114 = $row[114];//低收
	$p115 = $row[115];//隔代
	$p116 = $row[116];//親子差距
	$p117 = $row[117];//新移民
	$p118 = $row[118];//單寄親
	$pbcde = $row[119];//abcde
	$pbcdef = $row[120];//abcdef

	$p122 = $row[122]; //去年國三畢業生人數
	$p123 = $row[123]; //PR值≦25學生數 
	$p124 = $row[124]; //輟學

	$p126 = $row[126]; //離島
	$p127 = $row[127]; //無公共交通工具
	$p128 = $row[128]; //站牌五公里
	$p129 = $row[129]; //離社區五公里且無站牌
	$p130 = $row[130]; //少於4班
	$p131 = $row[131]; //因裁併校須交通車
	$p132 = $row[132]; //無上述狀況

	$p133 = $row[133]; //99編制
	$p134 = $row[134]; //100編制
	$p135 = $row[135]; //101編制
	$p136 = $row[136]; //99調入
	$p137 = $row[137]; //100調入
	$p138 = $row[138]; //101調入
	$p139 = $row[139]; //99實缺
	$p140 = $row[140]; //100實缺
	$p141 = $row[141]; //101實缺
	$p142 = $row[142]; //99其他
	$p143 = $row[143]; //100其他
	$p144 = $row[144]; //101其他
	$p145 = $row[145]; //教師流動率
	$p146 = $row[146]; //教師代理率

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
}
//補一
if($p158==1){
$sql_allowance = "select * from 102allowance1 where account like '$username'";
$result_allowance = mysql_query($sql_allowance);
while($row = mysql_fetch_row($result_allowance)){
	$a1_010 = $row[10]; //本項目學校申請總額
	$a1_011 = $row[11]; //本項目學校申請經常門
	$a1_012 = $row[12]; //本項目學校申請資本門
	$a1_013 = $row[13]; //
	$a1_014 = $row[14]; //
	$a1_015 = $row[15]; //
	$a1_016 = $row[16]; //
	$a1_017 = $row[17]; //
	$a1_018 = $row[18]; //
	$a1_019 = $row[19]; //
	$a1_020 = $row[20]; //
	$a1_021 = $row[21]; //
	$a1_022 = $row[22]; //
	$a1_023 = $row[23]; //
	$a1_024 = $row[24]; //
	$a1_025 = $row[25]; //
	$a1_026 = $row[26]; //
	$a1_027 = $row[27]; //
	$a1_028 = $row[28]; //
	$a1_029 = $row[29]; //
}
}else{
	$sql = "update 102allowance1 set a010='', a011='', a012='', a013='', a014='', a015='', a016='', a017='', a018='', a019='', a020='', a021='', a022='', a023='', a024='', a025='', a026='', a027='', a028='', a029='', a030='', a031='', a032='', a033='', a034='', a035='', a036='', a037='', a038='', a039='', a040='', a041='', a042='', a043='', a044='', a045='', a046='', a047='', a048='', a049='', a050='', a051='', a052='', a053='', a054='', a055='', a056='', a057='', a058='', a059='', a060='', a061='', a062='', a063='', a064='', a065='', a066='', a067='', a068='', a069='', a070='', a071='', a072='', a073='', a074='', a075='', a076='', a077='', a078='', a079='', a080='', a081='', a082='', a083='', a084='', a085='', a086='', a087='', a088='', a089='', a090='', a091='', a092='', a093='', a094='', a095='', a096='', a097='', a098='', a099='', a100='', a101='', a102='', a103='', a104='', a105='', a106='', a107='', a108='', a109='', a110='', a111='', a112='', a113='', a114='', a115='', a116='', a117='', a118='', a119='', a120='', a121='', a122='', a123='', a124='', a125='', a126='', a127='', a128='', a129='' where account='$username'";
	mysql_query($sql);
}
//補二
if($p159==1){
$sql_allowance = "select * from 102allowance2 where account like '$username'";
$result_allowance = mysql_query($sql_allowance);
while($row = mysql_fetch_row($result_allowance)){
	$a2_010 = $row[10]; //本項目學校申請總額
	$a2_011 = $row[11]; //本項目學校申請經常門
	$a2_012 = $row[12]; //本項目學校申請資本門
	$a2_013 = $row[13]; //
	$a2_014 = $row[14]; //
	$a2_015 = $row[15]; //
	$a2_016 = $row[16]; //
	$a2_017 = $row[17]; //
	$a2_018 = $row[18]; //
	$a2_019 = $row[19]; //
	$a2_020 = $row[20]; //
	$a2_021 = $row[21]; //
	$a2_022 = $row[22]; //
	$a2_023 = $row[23]; //
	$a2_024 = $row[24]; //
	$a2_025 = $row[25]; //
	$a2_026 = $row[26]; //
	$a2_027 = $row[27]; //
	$a2_028 = $row[28]; //
	$a2_029 = $row[29]; //
}
}else{
	$sql = "update 102allowance2 set a010='', a011='', a012='', a013='', a014='', a015='', a016='', a017='', a018='', a019='', a020='', a021='', a022='', a023='', a024='', a025='', a026='', a027='', a028='', a029='', a030='', a031='', a032='', a033='', a034='', a035='', a036='', a037='', a038='', a039='', a040='', a041='', a042='', a043='', a044='', a045='', a046='', a047='', a048='', a049='', a050='', a051='', a052='', a053='', a054='', a055='', a056='', a057='', a058='', a059='', a060='', a061='', a062='', a063='', a064='', a065='', a066='', a067='', a068='', a069='', a070='', a071='', a072='', a073='', a074='', a075='', a076='', a077='', a078='', a079='', a080='', a081='', a082='', a083='', a084='', a085='', a086='', a087='', a088='', a089='', a090='', a091='', a092='', a093='', a094='', a095='', a096='', a097='', a098='', a099='', a100='', a101='', a102='', a103='', a104='', a105='', a106='', a107='', a108='', a109='', a110='', a111='', a112='', a113='', a114='', a115='', a116='', a117='', a118='', a119='', a120='', a121='', a122='', a123='', a124='', a125='', a126='', a127='', a128='', a129='' where account='$username'";
	mysql_query($sql);
}
//補三
if($p160==1 || $p161==1){
$sql_allowance = "select * from 102allowance3 where account like '$username'";
$result_allowance = mysql_query($sql_allowance);
while($row = mysql_fetch_row($result_allowance)){
	$a3_010 = $row[10]; //本項目學校申請總額
	$a3_011 = $row[11]; //本項目學校申請經常門
	$a3_012 = $row[12]; //本項目學校申請資本門
	$a3_013 = $row[13]; //
	$a3_014 = $row[14]; //
	$a3_015 = $row[15]; //
	$a3_016 = $row[16]; //
	$a3_017 = $row[17]; //
	$a3_018 = $row[18]; //
	$a3_019 = $row[19]; //
	$a3_020 = $row[20]; //
	$a3_021 = $row[21]; //
	$a3_022 = $row[22]; //
	$a3_023 = $row[23]; //
	$a3_024 = $row[24]; //
	$a3_025 = $row[25]; //
	$a3_026 = $row[26]; //
	$a3_027 = $row[27]; //
	$a3_028 = $row[28]; //
	$a3_029 = $row[29]; //
}
}else{
	$sql = "update 102allowance3 set a010='', a011='', a012='', a013='', a014='', a015='', a016='', a017='', a018='', a019='', a020='', a021='', a022='', a023='', a024='', a025='', a026='', a027='', a028='', a029='', a030='', a031='', a032='', a033='', a034='', a035='', a036='', a037='', a038='', a039='', a040='', a041='', a042='', a043='', a044='', a045='', a046='', a047='', a048='', a049='', a050='', a051='', a052='', a053='', a054='', a055='', a056='', a057='', a058='', a059='', a060='', a061='', a062='', a063='', a064='', a065='', a066='', a067='', a068='', a069='', a070='', a071='', a072='', a073='', a074='', a075='', a076='', a077='', a078='', a079='', a080='', a081='', a082='', a083='', a084='', a085='', a086='', a087='', a088='', a089='', a090='', a091='', a092='', a093='', a094='', a095='', a096='', a097='', a098='', a099='', a100='', a101='', a102='', a103='', a104='', a105='', a106='', a107='', a108='', a109='', a110='', a111='', a112='', a113='', a114='', a115='', a116='', a117='', a118='', a119='', a120='', a121='', a122='', a123='', a124='', a125='', a126='', a127='', a128='', a129='' where account='$username'";
	mysql_query($sql);
}
//補四
if($p162==1){
$sql_allowance = "select * from 102allowance4 where account like '$username'";
$result_allowance = mysql_query($sql_allowance);
while($row = mysql_fetch_row($result_allowance)){
	$a4_010 = $row[10]; //本項目學校申請總額
	$a4_011 = $row[11]; //本項目學校申請經常門
	$a4_012 = $row[12]; //本項目學校申請資本門
	$a4_013 = $row[13]; //
	$a4_014 = $row[14]; //
	$a4_015 = $row[15]; //
	$a4_016 = $row[16]; //
	$a4_017 = $row[17]; //
	$a4_018 = $row[18]; //
	$a4_019 = $row[19]; //
	$a4_020 = $row[20]; //
	$a4_021 = $row[21]; //
	$a4_022 = $row[22]; //
	$a4_023 = $row[23]; //
	$a4_024 = $row[24]; //
	$a4_025 = $row[25]; //
	$a4_026 = $row[26]; //
	$a4_027 = $row[27]; //
	$a4_028 = $row[28]; //
	$a4_029 = $row[29]; //
}
}else{
	$sql = "update 102allowance4 set a010='', a011='', a012='', a013='', a014='', a015='', a016='', a017='', a018='', a019='', a020='', a021='', a022='', a023='', a024='', a025='', a026='', a027='', a028='', a029='', a030='', a031='', a032='', a033='', a034='', a035='', a036='', a037='', a038='', a039='', a040='', a041='', a042='', a043='', a044='', a045='', a046='', a047='', a048='', a049='', a050='', a051='', a052='', a053='', a054='', a055='', a056='', a057='', a058='', a059='', a060='', a061='', a062='', a063='', a064='', a065='', a066='', a067='', a068='', a069='', a070='', a071='', a072='', a073='', a074='', a075='', a076='', a077='', a078='', a079='', a080='', a081='', a082='', a083='', a084='', a085='', a086='', a087='', a088='', a089='', a090='', a091='', a092='', a093='', a094='', a095='', a096='', a097='', a098='', a099='', a100='', a101='', a102='', a103='', a104='', a105='', a106='', a107='', a108='', a109='', a110='', a111='', a112='', a113='', a114='', a115='', a116='', a117='', a118='', a119='', a120='', a121='', a122='', a123='', a124='', a125='', a126='', a127='', a128='', a129='' where account='$username'";
	mysql_query($sql);
}
//補五
if($p163==1){
$sql_allowance = "select * from 102allowance5 where account like '$username'";
$result_allowance = mysql_query($sql_allowance);
while($row = mysql_fetch_row($result_allowance)){
	$a5_010 = $row[10]; //本項目學校申請總額
	$a5_011 = $row[11]; //本項目學校申請經常門
	$a5_012 = $row[12]; //本項目學校申請資本門
	$a5_013 = $row[13]; //
	$a5_014 = $row[14]; //
	$a5_015 = $row[15]; //
	$a5_016 = $row[16]; //
	$a5_017 = $row[17]; //
	$a5_018 = $row[18]; //
	$a5_019 = $row[19]; //
	$a5_020 = $row[20]; //
	$a5_021 = $row[21]; //
	$a5_022 = $row[22]; //
	$a5_023 = $row[23]; //
	$a5_024 = $row[24]; //
	$a5_025 = $row[25]; //
	$a5_026 = $row[26]; //
	$a5_027 = $row[27]; //
	$a5_028 = $row[28]; //
	$a5_029 = $row[29]; //
}
}else{
	$sql = "update 102allowance5 set a010='', a011='', a012='', a013='', a014='', a015='', a016='', a017='', a018='', a019='', a020='', a021='', a022='', a023='', a024='', a025='', a026='', a027='', a028='', a029='', a030='', a031='', a032='', a033='', a034='', a035='', a036='', a037='', a038='', a039='', a040='', a041='', a042='', a043='', a044='', a045='', a046='', a047='', a048='', a049='', a050='', a051='', a052='', a053='', a054='', a055='', a056='', a057='', a058='', a059='', a060='', a061='', a062='', a063='', a064='', a065='', a066='', a067='', a068='', a069='', a070='', a071='', a072='', a073='', a074='', a075='', a076='', a077='', a078='', a079='', a080='', a081='', a082='', a083='', a084='', a085='', a086='', a087='', a088='', a089='', a090='', a091='', a092='', a093='', a094='', a095='', a096='', a097='', a098='', a099='', a100='', a101='', a102='', a103='', a104='', a105='', a106='', a107='', a108='', a109='', a110='', a111='', a112='', a113='', a114='', a115='', a116='', a117='', a118='', a119='', a120='', a121='', a122='', a123='', a124='', a125='', a126='', a127='', a128='', a129='' where account='$username'";
	mysql_query($sql);
}
//補六
if($p164==1){
$sql_allowance = "select * from 102allowance6 where account like '$username'";
$result_allowance = mysql_query($sql_allowance);
while($row = mysql_fetch_row($result_allowance)){
	$a6_010 = $row[10]; //本項目學校申請總額
	$a6_011 = $row[11]; //本項目學校申請經常門
	$a6_012 = $row[12]; //本項目學校申請資本門
	$a6_013 = $row[13]; //
	$a6_014 = $row[14]; //
	$a6_015 = $row[15]; //
	$a6_016 = $row[16]; //
	$a6_017 = $row[17]; //
	$a6_018 = $row[18]; //
	$a6_019 = $row[19]; //
	$a6_020 = $row[20]; //
	$a6_021 = $row[21]; //
	$a6_022 = $row[22]; //
	$a6_023 = $row[23]; //
	$a6_024 = $row[24]; //
	$a6_025 = $row[25]; //
	$a6_026 = $row[26]; //
	$a6_027 = $row[27]; //
	$a6_028 = $row[28]; //
	$a6_029 = $row[29]; //
}
}else{
	$sql = "update 102allowance6 set a010='', a011='', a012='', a013='', a014='', a015='', a016='', a017='', a018='', a019='', a020='', a021='', a022='', a023='', a024='', a025='', a026='', a027='', a028='', a029='', a030='', a031='', a032='', a033='', a034='', a035='', a036='', a037='', a038='', a039='', a040='', a041='', a042='', a043='', a044='', a045='', a046='', a047='', a048='', a049='', a050='', a051='', a052='', a053='', a054='', a055='', a056='', a057='', a058='', a059='', a060='', a061='', a062='', a063='', a064='', a065='', a066='', a067='', a068='', a069='', a070='', a071='', a072='', a073='', a074='', a075='', a076='', a077='', a078='', a079='', a080='', a081='', a082='', a083='', a084='', a085='', a086='', a087='', a088='', a089='', a090='', a091='', a092='', a093='', a094='', a095='', a096='', a097='', a098='', a099='', a100='', a101='', a102='', a103='', a104='', a105='', a106='', a107='', a108='', a109='', a110='', a111='', a112='', a113='', a114='', a115='', a116='', a117='', a118='', a119='', a120='', a121='', a122='', a123='', a124='', a125='', a126='', a127='', a128='', a129='' where account='$username'";
	mysql_query($sql);
}
//補七
if($p165==1){
$sql_allowance = "select * from 102allowance7 where account like '$username'";
$result_allowance = mysql_query($sql_allowance);
while($row = mysql_fetch_row($result_allowance)){
	$a7_010 = $row[10]; //本項目學校申請總額
	$a7_011 = $row[11]; //本項目學校申請經常門
	$a7_012 = $row[12]; //本項目學校申請資本門
	$a7_013 = $row[13]; //
	$a7_014 = $row[14]; //
	$a7_015 = $row[15]; //
	$a7_016 = $row[16]; //
	$a7_017 = $row[17]; //
	$a7_018 = $row[18]; //
	$a7_019 = $row[19]; //
	$a7_020 = $row[20]; //
	$a7_021 = $row[21]; //
	$a7_022 = $row[22]; //
	$a7_023 = $row[23]; //
	$a7_024 = $row[24]; //
	$a7_025 = $row[25]; //
	$a7_026 = $row[26]; //
	$a7_027 = $row[27]; //
	$a7_028 = $row[28]; //
	$a7_029 = $row[29]; //
}
}else{
	$sql = "update 102allowance7 set a010='', a011='', a012='', a013='', a014='', a015='', a016='', a017='', a018='', a019='', a020='', a021='', a022='', a023='', a024='', a025='', a026='', a027='', a028='', a029='', a030='', a031='', a032='', a033='', a034='', a035='', a036='', a037='', a038='', a039='', a040='', a041='', a042='', a043='', a044='', a045='', a046='', a047='', a048='', a049='', a050='', a051='', a052='', a053='', a054='', a055='', a056='', a057='', a058='', a059='', a060='', a061='', a062='', a063='', a064='', a065='', a066='', a067='', a068='', a069='', a070='', a071='', a072='', a073='', a074='', a075='', a076='', a077='', a078='', a079='', a080='', a081='', a082='', a083='', a084='', a085='', a086='', a087='', a088='', a089='', a090='', a091='', a092='', a093='', a094='', a095='', a096='', a097='', a098='', a099='', a100='', a101='', a102='', a103='', a104='', a105='', a106='', a107='', a108='', a109='', a110='', a111='', a112='', a113='', a114='', a115='', a116='', a117='', a118='', a119='', a120='', a121='', a122='', a123='', a124='', a125='', a126='', a127='', a128='', a129='' where account='$username'";
	mysql_query($sql);
}
?>

表Ｉ～２ 經費需求彙整表
<INPUT TYPE="button" VALUE="回上一頁" onclick="history.go(-1)">
<? include "../xSchoolForm/button_print.php"; ?>
<input type="button" name="Submit" value="列印完畢回主選單" onclick="location.href='../xSchoolForm/school_index.php'">
<input type="button" name="Submit" value="列印完畢前往檔案上傳區" onclick="location.href='../xSchoolForm/102school_upload_file.php'">
<br />
<div style="font-family:標楷體;font-size:20px;text-align:center"><strong>教育部102年度教育優先區計畫補助項目經費需求彙整表<br /><? echo $city.$district.$school; ?></strong><br />
學校所在區域：<? 
switch($p109) { 
case "1":
	echo "離島";
	break;
case "2":
	echo "偏遠及特偏";
	break;
case "3":
	echo "一般地區";
	break;
case "4":
	echo "都會地區";
	break;
default:
	echo "無學校所在區域資料";
}
?>　　班級數：<? echo $p101;?>班　　在籍學生數：<? echo $p100;?>人</div>

<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="font-family:標楷體">

  <tr>
    <td width="40" rowspan="2" align="center" nowrap="nowrap">項次</td>
    <td colspan="3" rowspan="2" align="center" nowrap="nowrap">補        助        項        目</td>
    <td height="30" colspan="4" align="center" nowrap="nowrap">申   請   補   助   數   量   、   金   額</td>
  </tr>
  <tr>
    <td height="30" align="center" nowrap="nowrap">數    量</td>
    <td height="30" align="center" nowrap="nowrap"> 金額 (元)</td>
    <td height="30" align="center" nowrap="nowrap">小 計</td>
    <td height="30" align="center" nowrap="nowrap">合    計</td>
  </tr>
  <tr>
    <td rowspan="2" align="center" nowrap="nowrap">一</td>
    <td rowspan="2" nowrap="nowrap">推展親職教育活動</td>
    <td height="30" colspan="2" nowrap="nowrap">親職教育活動(場次)</td>
    <td height="30" align="center" nowrap="nowrap"><? echo number_format($a1_014);?></td>
    <td height="30" align="right" nowrap="nowrap"><? echo number_format($a1_013);?></td>
    <td rowspan="2" align="right" nowrap="nowrap"><? echo number_format($a1_010);?></td>
    <td rowspan="2" align="right" nowrap="nowrap"><? echo number_format($a1_010);?></td>
  </tr>
  <tr>
    <td height="30" colspan="2" nowrap="nowrap">目標學生個案家庭輔導(人次)</td>
    <td height="30" align="center" nowrap="nowrap"><? echo number_format($a1_017);?></td>
    <td height="30" align="right" nowrap="nowrap"><? echo number_format($a1_016);?></td>
  </tr>
  <tr>
    <td rowspan="4" align="center" nowrap="nowrap">二</td>
    <td rowspan="4" nowrap="nowrap">補助學校發展教育特色</td>
    <td rowspan="2">發展特色一：<br /><? echo $a2_020;?></td>
    <td height="30" nowrap="nowrap">經常門</td>
    <td height="30" align="center" nowrap="nowrap">&nbsp;</td>
    <td height="30" align="right" nowrap="nowrap"><? echo number_format($a2_014);?></td>
    <td rowspan="2" align="right" nowrap="nowrap"><? echo number_format($a2_013);?></td>
    <td rowspan="4" align="right" nowrap="nowrap"><? echo number_format($a2_010);?></td>
  </tr>
  <tr>
    <td height="30" nowrap="nowrap">資本門</td>
    <td height="30" align="center" nowrap="nowrap">&nbsp;</td>
    <td height="30" align="right" nowrap="nowrap"><? echo number_format($a2_015);?></td>
  </tr>
  <tr>
    <td rowspan="2">發展特色二：<br /><? echo $a2_022;?></td>
    <td height="30" nowrap="nowrap">經常門</td>
    <td height="30" align="center" nowrap="nowrap">&nbsp;</td>
    <td height="30" align="right" nowrap="nowrap"><? echo number_format($a2_017);?></td>
    <td rowspan="2" align="right" nowrap="nowrap"><? echo number_format($a2_016);?></td>
  </tr>
  <tr>
    <td height="30" nowrap="nowrap">資本門</td>
    <td height="30" align="center" nowrap="nowrap">&nbsp;</td>
    <td height="30" align="right" nowrap="nowrap"><? echo number_format($a2_018);?></td>
  </tr>
  <tr>
    <td rowspan="4" align="center" nowrap="nowrap">三</td>
    <td rowspan="4" nowrap="nowrap">修繕離島或偏遠地區師生宿舍</td>
    <td rowspan="2" nowrap="nowrap">教師宿舍</td>
    <td height="30" nowrap="nowrap">經常門(項)</td>
    <td height="30" align="center" nowrap="nowrap"><? echo number_format($a3_019);?></td>
    <td height="30" align="right" nowrap="nowrap"><? echo number_format($a3_014);?></td>
    <td rowspan="2" align="right" nowrap="nowrap"><? echo number_format($a3_013);?></td>
    <td rowspan="4" align="right" nowrap="nowrap"><? echo number_format($a3_010);?></td>
  </tr>
  <tr>
    <td height="30" nowrap="nowrap">資本門(項)</td>
    <td height="30" align="center" nowrap="nowrap"><? echo number_format($a3_020);?></td>
    <td height="30" align="right" nowrap="nowrap"><? echo number_format($a3_015);?></td>
  </tr>
  <tr>
    <td rowspan="2" nowrap="nowrap">學生宿舍</td>
    <td height="30" nowrap="nowrap">經常門(項)</td>
    <td height="30" align="center" nowrap="nowrap"><? echo number_format($a3_021);?></td>
    <td height="30" align="right" nowrap="nowrap"><? echo number_format($a3_017);?></td>
    <td rowspan="2" align="right" nowrap="nowrap"><? echo number_format($a3_016);?></td>
  </tr>
  <tr>
    <td height="30" nowrap="nowrap">資本門(項)</td>
    <td height="30" align="center" nowrap="nowrap"><? echo number_format($a3_022);?></td>
    <td height="30" align="right" nowrap="nowrap"><? echo number_format($a3_018);?></td>
  </tr>
  <tr>
    <td rowspan="2" align="center" nowrap="nowrap">四</td>
    <td colspan="2" rowspan="2" nowrap="nowrap">充實學校基本教學設備</td>
    <td height="30" nowrap="nowrap">經常門 </td>
    <td height="30" align="center" nowrap="nowrap">&nbsp;</td>
    <td height="30" align="right" nowrap="nowrap"><? echo number_format($a4_011);?></td>
    <td rowspan="2" align="right" nowrap="nowrap"><? echo number_format($a4_010);?></td>
    <td rowspan="2" align="right" nowrap="nowrap"><? echo number_format($a4_010);?></td>
  </tr>
  <tr>
    <td height="30" nowrap="nowrap">資本門</td>
    <td height="30" align="center" nowrap="nowrap">&nbsp;</td>
    <td height="30" align="right" nowrap="nowrap"><? echo number_format($a4_012);?></td>
  </tr>
  <tr>
    <td rowspan="4" align="center" nowrap="nowrap">五</td>
    <td rowspan="4" nowrap="nowrap">發展原住民教育文化特色及<br />充實設備器材</td>
    <td rowspan="2">發展特色一：<br /><? echo $a5_020;?></td>
    <td height="30" nowrap="nowrap">經常門</td>
    <td height="30" align="center" nowrap="nowrap">&nbsp;</td>
    <td height="30" align="right" nowrap="nowrap"><? echo number_format($a5_014);?></td>
    <td rowspan="2" align="right" nowrap="nowrap"><? echo number_format($a5_013);?></td>
    <td rowspan="4" align="right" nowrap="nowrap"><? echo number_format($a5_010);?></td>
  </tr>
  <tr>
    <td height="30" nowrap="nowrap">資本門</td>
    <td height="30" align="center" nowrap="nowrap">&nbsp;</td>
    <td height="30" align="right" nowrap="nowrap"><? echo number_format($a5_015);?></td>
  </tr>
  <tr>
    <td rowspan="2">發展特色二：<br /><? echo $a5_022;?></td>
    <td height="30" nowrap="nowrap">經常門</td>
    <td height="30" align="center" nowrap="nowrap">&nbsp;</td>
    <td height="30" align="right" nowrap="nowrap"><? echo number_format($a5_017);?></td>
    <td rowspan="2" align="right" nowrap="nowrap"><? echo number_format($a5_016);?></td>
  </tr>
  <tr>
    <td height="30" nowrap="nowrap">資本門</td>
    <td height="30" align="center" nowrap="nowrap">&nbsp;</td>
    <td height="30" align="right" nowrap="nowrap"><? echo number_format($a5_018);?></td>
  </tr>
  <tr>
    <td rowspan="3" align="center" nowrap="nowrap">六</td>
    <td colspan="2" rowspan="3" nowrap="nowrap">補助交通不便地區學校交通車</td>
    <td height="30" nowrap="nowrap">補助租車費(人)</td>
    <td height="30" align="center" nowrap="nowrap"><? echo number_format($a6_013);?></td>
    <td height="30" align="right" nowrap="nowrap"><? echo number_format($a6_014);?></td>
    <td rowspan="3" align="right" nowrap="nowrap"><? echo number_format($a6_010);?></td>
    <td rowspan="3" align="right" nowrap="nowrap"><? echo number_format($a6_010);?></td>
  </tr>
  <tr>
    <td height="30" nowrap="nowrap">補助交通費(人)</td>
    <td height="30" align="center" nowrap="nowrap"><? echo number_format($a6_015);?></td>
    <td height="30" align="right" nowrap="nowrap"><? echo number_format($a6_016);?></td>
  </tr>
  <tr>
    <td height="30" nowrap="nowrap">購置交通車(人座)</td>
    <td height="30" align="center" nowrap="nowrap"><? echo number_format($a6_017);?></td>
    <td height="30" align="right" nowrap="nowrap"><? echo number_format($a6_018);?></td>
  </tr>
  <tr>
    <td rowspan="2" align="center" nowrap="nowrap">七</td>
    <td rowspan="2" nowrap="nowrap">整修學校社區化活動場所</td>
    <td rowspan="2" nowrap="nowrap">綜合球場</td>
    <td height="30" nowrap="nowrap">修繕</td>
    <td height="30" align="center" nowrap="nowrap">&nbsp;</td>
    <td height="30" align="right" nowrap="nowrap"><? echo number_format($a7_011);?></td>
    <td rowspan="2" align="right" nowrap="nowrap"><? echo number_format($a7_010);?></td>
    <td rowspan="2" align="right" nowrap="nowrap"><? echo number_format($a7_010);?></td>
  </tr>
  <tr>
    <td height="30" nowrap="nowrap">設備</td>
    <td height="30" align="center" nowrap="nowrap">&nbsp;</td>
    <td height="30" align="right" nowrap="nowrap"><? echo number_format($a7_012);?></td>
  </tr>
  <tr>
    <td height="40" colspan="7" align="center" nowrap="nowrap"><p style="font-size:18px">總　　　　計</p></td>
    <td height="40" align="right" nowrap="nowrap"><? echo number_format($a1_010+$a2_013+$a2_016+$a3_013+$a3_016+$a4_010+$a5_010+$a6_010+$a7_010);?></td>
  </tr>
  <tr>
    <td height="50" colspan="8" nowrap="nowrap"><p style="font-size:18px">承辦人：　　　　　　　　　主任：　　　　　　　　　校長： </p></td>
  </tr>
</table>

