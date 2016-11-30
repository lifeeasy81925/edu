<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_city_ex.php";
$id = $_GET["id"]; //取回傳遞來的學校編號
include "./checkdate.php";
//include "./checkmail.php";

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
	
	$s1=array("","經常門","資本門");
	$s2=array("","鐘點費","器材購置","器材維護","道具","教材","旅運費","其他");
	

}

//補助項目資料	
$sql_allowance = "select * from 102allowance5 where account like '$id'";
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
	
	//補五設定
	$a120 = "經常門";
	$a121 = "雜支";
	
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
}


//第二個經費表
$sql = "select * from 102allowance5_2 where account like '$id' ";
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
	
	//補五設定
	$b030 = "經常門";
	$b031 = "講師鐘點費";
	//$b032 = "內聘講師鐘點費";
	$b033 = "節";
	//$b034 = 400;
	
	//$b100 = "經常門";
	//$b101 = "其他";

	//$b090 = "經常門";
	//$b111 = "其他";
	
	$b120 = "經常門";
	$b121 = "雜支";

	$b150 = $row[150]; //1-1
	$b151 = $row[151]; //1-2
	$b152 = $row[152]; //1-3
	$b153 = $row[153]; //1-4
	$b154 = $row[154]; //2-1
	$b155 = $row[155]; //2-2
	$b156 = $row[156]; //2-3
	$b157 = $row[157]; //2-4
	$b158 = $row[158]; //3-1
	$b159 = $row[159]; //3-2
	$b160 = $row[160]; //3-3
	$b161 = $row[161]; //3-4
	$b162 = $row[162]; //4-1
	$b163 = $row[163]; //4-2
	$b164 = $row[164]; //4-3
	$b165 = $row[165]; //4-4
	$b166 = $row[166]; //5-1
	$b167 = $row[167]; //5-2
	$b168 = $row[168]; //5-3
	$b169 = $row[169]; //5-4
	$b170 = $row[170]; //6-1
	$b171 = $row[171]; //6-2
	$b172 = $row[172]; //6-3
	$b173 = $row[173]; //6-4
	$b174 = $row[174]; //7-1
	$b175 = $row[175]; //7-2
	$b176 = $row[176]; //7-3
	$b177 = $row[177]; //7-4
	$b178 = $row[178]; //8-1
	$b179 = $row[179]; //8-2
	$b180 = $row[180]; //8-3
	$b181 = $row[181]; //8-4
	$b182 = $row[182]; //9-1
	$b183 = $row[183]; //9-2
	$b184 = $row[184]; //9-3
	$b185 = $row[185]; //9-4
	$b186 = $row[186]; //10-1
	$b187 = $row[187]; //10-2
	$b188 = $row[188]; //10-3
	$b189 = $row[189]; //10-4
	
	if($b150=='') $b150=$b036; //1初審金額內定為學校申請金額
	if($b154=='') $b154=$b046; //2初審金額內定為學校申請金額
	if($b158=='') $b158=$b056; //3初審金額內定為學校申請金額
	if($b162=='') $b162=$b066; //4初審金額內定為學校申請金額
	if($b166=='') $b166=$b076; //5初審金額內定為學校申請金額
	if($b170=='') $b170=$b086; //6初審金額內定為學校申請金額
	if($b174=='') $b174=$b096; //7初審金額內定為學校申請金額
	if($b178=='') $b178=$b106; //8初審金額內定為學校申請金額
	if($b182=='') $b182=$b116; //9初審金額內定為學校申請金額
	if($b186=='') $b186=$b126; //10初審金額內定為學校申請金額
	
	$b151=intval($b036)-intval($b150);	//1刪減金額計算
	$b155=$b046-$b154;	//2刪減金額計算
	$b159=$b056-$b158;	//3刪減金額計算
	$b163=$b066-$b162;	//4刪減金額計算
	$b167=$b076-$b166;	//5刪減金額計算
	$b171=$b086-$b170;	//6刪減金額計算
	$b175=$b096-$b174;	//7刪減金額計算
	$b179=$b106-$b178;	//8刪減金額計算
	$b183=$b116-$b182;	//9刪減金額計算
	$b187=$b126-$b186;	//10刪減金額計算
}
?> 

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p><b>補助項目五：發展原住民教育文化特色及充實設備器材</b>　<a href="/edu/modules/xSchoolForm/download/allowance-05.htm" target="_blank">(補助項目說明)</a><br />
說明：學生100人(含)以下最高補助12萬元，學生超過100人最高補助25萬元，分校分班最高補助8萬元。
</p>
<form name="form" method="post" action="102_examine_allowance5_finish.php?id=<? echo $id;?>" onKeyDown="if(event.keyCode == 13) return false;">
●學校：<? echo $school.' '.$school_name;?>
<p>
<b>※符合指標：</b><br>
<? 
//符合指標
if($p1_1 == 1){	echo  '　　　'.'指標一～（一）：'.'<br>';}
if($p1_2 == 1){	echo  '　　　'.'指標一～（二）：'.'<br>';}
if($p1_3 == 1){	echo  '　　　'.'指標一～（三）：'.'<br>';}
if($p1_4 == 1){	echo  '　　　'.'指標一～（四）：'.'<br>';}
//if($p2_1 == 1){	echo  '　　　'.'指標二～（一）：'.'<br>';}
//if($p2_2 == 1){	echo  '　　　'.'指標二～（二）：'.'<br>';}
//if($p2_3 == 1){	echo  '　　　'.'指標二～（三）：'.'<br>';}
//if($p3_1 == 1){	echo  '　　　'.'指標三：'.'<br>';}
//if($p4_1 == 1){	echo  '　　　'.'指標四：'.'<br>';}
//if($p5_1 == 1){	echo  '　　　'.'指標五～（一）：'.'<br>';}
//if($p5_2 == 1){	echo  '　　　'.'指標五～（二）：'.'<br>';}
//if($p5_3 == 1){	echo  '　　　'.'指標五～（三）：'.'<br>';}
//if($p6_1 == 1){	echo  '　　　'.'指標六～（一）：'.'<br>';}
//if($p6_2 == 1){	echo  '　　　'.'指標六～（二）：'.'<br>';}
?>
<br>
<b>※申請資料與審核：</b><br>
●全校學生人數：<font face="Arial, Helvetica, sans-serif" color=red size="+1"><? echo $p100; ?></font>人
<p>
<b>※本項目學校申請：<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($a010);?></font>元。
<? //if($examine == '2') echo '縣市審核'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.$city_examine_1.'</font>元。'?>
<font color=blue>審核金額：<input type="text" size="5" name="a132" value= "<? if($a132 =='') echo $a135+$a138; else echo $a132;?>" style="border:0px; text-align: right;" readonly >元。</font></b>
<p>
●特色一：<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo $a020;?></font><? if($a021=='1') echo "　(本項目為延續性辦理)"; ?><br />
學校申請：<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($a013);?></font>元 
(經常門<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($a014);?></font>元，資本門<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($a015);?></font>元)<br />
<? //if($examine == '2') echo '縣市審核'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.$city2.'</font>元。'?>
<b><font color=blue>初審金額：<input type="text" size="5" name="a135" onChange="change1()" value="<? if($a135 =='') echo $a013; else echo $a135;?>" style="border:0px; text-align: right;" readonly >元 (經常門<input type="text" size="5" name="a136" onChange="change1_1()" value="<? if($a136 =='') echo $a014; else echo $a136;?>" style="border:0px; text-align: right;" readonly >元，資本門<input type="text" size="5" name="a137" onChange="change1_2()" value="<? if($a137 =='') echo $a015; else echo $a137;?>" style="border:0px; text-align: right;" readonly >
元)</font></b>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
  <tr>
    <td colspan="9" align="center" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;">特色一經費概算：學校申請</td>
    <td colspan="2" align="center" nowrap="nowrap" bgcolor="#FFCC66"  style="font-size:14px;">縣市初審</td>
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
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">說　　明</td>
    <td align="left" nowrap="nowrap" bgcolor="#FFDD66">初審金額</td>
    <td align="left" nowrap="nowrap" bgcolor="#FFDD66">刪減金額<br />自動產生</td>
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
    <td align="left"><input type="text" size="4" name="a150" onchange="js:diffMoney(this);" value="<? if($a150 =='') echo ''; else echo $a150;?>"/></td>
    <td align="left"><input type="text" size="4" name="a151" value="<? if($a151 =='') echo ''; else echo $a151;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="a042" value="<? if($a042 =='') echo ''; else echo $a042;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a043" value="<? if($a043 =='') echo ''; else echo $a043;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a044" value="<? if($a044 =='') echo ''; else echo $a044;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a045" value="<? if($a045 =='') echo ''; else echo $a045;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a046" value="<? if($a046 =='') echo ''; else echo $a046;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a047;?></td>
    <td align="left"><input type="text" size="4" name="a154" onchange="js:diffMoney(this);" value="<? if($a154 =='') echo ''; else echo $a154;?>"/></td>
    <td align="left"><input type="text" size="4" name="a155" value="<? if($a155 =='') echo ''; else echo $a155;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="a052" value="<? if($a052 =='') echo ''; else echo $a052;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a053" value="<? if($a053 =='') echo ''; else echo $a053;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a054" value="<? if($a054 =='') echo ''; else echo $a054;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a055" value="<? if($a055 =='') echo ''; else echo $a055;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a056" value="<? if($a056 =='') echo ''; else echo $a056;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a057;?></td>
    <td align="left"><input type="text" size="4" name="a158" onchange="js:diffMoney(this);" value="<? if($a158 =='') echo ''; else echo $a158;?>"/></td>
    <td align="left"><input type="text" size="4" name="a159" value="<? if($a159 =='') echo ''; else echo $a159;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="a062" value="<? if($a062 =='') echo ''; else echo $a062;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a063" value="<? if($a063 =='') echo ''; else echo $a063;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a064" value="<? if($a064 =='') echo ''; else echo $a064;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a065" value="<? if($a065 =='') echo ''; else echo $a065;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a066" value="<? if($a066 =='') echo ''; else echo $a066;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a067;?></td>
    <td align="left"><input type="text" size="4" name="a162" onchange="js:diffMoney(this);" value="<? if($a162 =='') echo ''; else echo $a162;?>"/></td>
    <td align="left"><input type="text" size="4" name="a163" value="<? if($a163 =='') echo ''; else echo $a163;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="a072" value="<? if($a072 =='') echo ''; else echo $a072;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a073" value="<? if($a073 =='') echo ''; else echo $a073;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a074" value="<? if($a074 =='') echo ''; else echo $a074;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a075" value="<? if($a075 =='') echo ''; else echo $a075;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a076" value="<? if($a076 =='') echo ''; else echo $a076;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a077;?></td>
    <td align="left"><input type="text" size="4" name="a166" onchange="js:diffMoney(this);" value="<? if($a166 =='') echo ''; else echo $a166;?>"/></td>
    <td align="left"><input type="text" size="4" name="a167" value="<? if($a167 =='') echo ''; else echo $a167;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="a082" value="<? if($a082 =='') echo ''; else echo $a082;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a083" value="<? if($a083 =='') echo ''; else echo $a083;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a084" value="<? if($a084 =='') echo ''; else echo $a084;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a085" value="<? if($a085 =='') echo ''; else echo $a085;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a086" value="<? if($a086 =='') echo ''; else echo $a086;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a087;?></td>
    <td align="left"><input type="text" size="4" name="a170" onchange="js:diffMoney(this);" value="<? if($a170 =='') echo ''; else echo $a170;?>"/></td>
    <td align="left"><input type="text" size="4" name="a171" value="<? if($a171 =='') echo ''; else echo $a171;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="a092" value="<? if($a092 =='') echo ''; else echo $a092;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a093" value="<? if($a093 =='') echo ''; else echo $a093;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a094" value="<? if($a094 =='') echo ''; else echo $a094;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a095" value="<? if($a095 =='') echo ''; else echo $a095;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a096" value="<? if($a096 =='') echo ''; else echo $a096;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a097;?></td>
    <td align="left"><input type="text" size="4" name="a174" onchange="js:diffMoney(this);" value="<? if($a174 =='') echo ''; else echo $a174;?>"/></td>
    <td align="left"><input type="text" size="4" name="a175" value="<? if($a175 =='') echo ''; else echo $a175;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="a102" value="<? if($a102 =='') echo ''; else echo $a102;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a103" value="<? if($a103 =='') echo ''; else echo $a103;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a104" value="<? if($a104 =='') echo ''; else echo $a104;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a105" value="<? if($a105 =='') echo ''; else echo $a105;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a106" value="<? if($a106 =='') echo ''; else echo $a106;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a107;?></td>
    <td align="left"><input type="text" size="4" name="a178" onchange="js:diffMoney(this);" value="<? if($a178 =='') echo ''; else echo $a178;?>"/></td>
    <td align="left"><input type="text" size="4" name="a179" value="<? if($a179 =='') echo ''; else echo $a179;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="a112" value="<? if($a112 =='') echo ''; else echo $a112;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a113" value="<? if($a113 =='') echo ''; else echo $a113;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a114" value="<? if($a114 =='') echo ''; else echo $a114;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a115" value="<? if($a115 =='') echo ''; else echo $a115;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a116" value="<? if($a116 =='') echo ''; else echo $a116;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a117;?></td>
    <td align="left"><input type="text" size="4" name="a182" onchange="js:diffMoney(this);" value="<? if($a182 =='') echo ''; else echo $a182;?>"/></td>
    <td align="left"><input type="text" size="4" name="a183" value="<? if($a183 =='') echo ''; else echo $a183;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">10.</td>
    <td align="left"><input type="text" size="3" name="a120" value="<? if($a120 =='') echo ''; else echo $a120;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a121" value="<? if($a121 =='') echo ''; else echo $a121;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left" valign="middle"><input type="checkbox" name="a122" onclick="js:return false;" value="1" <? if($a122 =='1') echo 'checked';?>/>申請雜支</td>
    <td align="left"><input type="text" size="2" name="a123" value="<? if($a123 =='') echo ''; else echo $a123;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a124" value="<? if($a124 =='') echo ''; else echo $a124;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a125" value="<? if($a125 =='') echo ''; else echo $a125;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a126" value="<? if($a126 =='') echo ''; else echo $a126;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $a127;?></td>
    <td align="left"><input type="text" size="4" name="a186" onchange="js:diffMoney(this);" value="<? if($a186 =='') echo ''; else echo $a186;?>"/></td>
    <td align="left"><input type="text" size="4" name="a187" value="<? if($a187 =='') echo ''; else echo $a187;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    </tr>
</table>
<p>
●特色二：<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? if ($a022==''){echo '無';}else{echo $a022;}?></font><? if($a023=='1') echo "　(本項目為延續性辦理)"; ?><br />
學校申請：<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($a016);?></font>元 
(經常門<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($a017);?></font>元，資本門<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1"><? echo number_format($a018);?></font>元)<br />
<? //if($examine == '2') echo '縣市審核'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.$city3.'</font>元。'?>
<b><font color=blue>初審金額：<input type="text" size="5" name="a138" onChange="change2()" value= "<? if($a138=='') echo $a016; else echo $a138;?>" style="border:0px; text-align: right;" readonly >元 (經常門<input type="text" size="5" name="a139" onChange="change2_1()" value= "<? if($a139=='') echo $a017; else echo $a139;?>" style="border:0px; text-align: right;" readonly >元，資本門<input type="text" size="5" name="a140" onChange="change2_2()" value= "<? if($a140=='') echo $a018; else echo $a140;?>" style="border:0px; text-align: right;" readonly >元)</font><b>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
  <tr>
    <td colspan="9" align="center" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;">特色二經費概算：學校申請</td>
    <td colspan="2" align="center" nowrap="nowrap" bgcolor="#FFCC66"  style="font-size:14px;">縣市初審</td>
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
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">說　　明</td>
    <td align="left" nowrap="nowrap" bgcolor="#FFDD66">初審金額</td>
    <td align="left" nowrap="nowrap" bgcolor="#FFDD66">刪減金額<br />
      自動產生</td>
    </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">1.</td>
    <td align="left"><input type="text" size="3" name="b030" value="<? if($b030 =='') echo ''; else echo $b030;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="b031" value="<? if($b031 =='') echo ''; else echo $b031;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="b032" value="<? if($b032 =='') echo ''; else echo $b032;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="b033" value="<? if($b033 =='') echo ''; else echo $b033;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="b034" value="<? if($b034 =='') echo ''; else echo $b034;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="b035" value="<? if($b035 =='') echo ''; else echo $b035;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="b036" value="<? if($b036 =='') echo ''; else echo $b036;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $b037;?></td>
    <td align="left"><input type="text" size="4" name="b150" onchange="js:diffMoney(this);" value="<? if($b150 =='') echo ''; else echo $b150;?>"/></td>
    <td align="left"><input type="text" size="4" name="b151" value="<? if($b151 =='') echo ''; else echo $b151;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="b042" value="<? if($b042 =='') echo ''; else echo $b042;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="b043" value="<? if($b043 =='') echo ''; else echo $b043;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="b044" value="<? if($b044 =='') echo ''; else echo $b044;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="b045" value="<? if($b045 =='') echo ''; else echo $b045;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="b046" value="<? if($b046 =='') echo ''; else echo $b046;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $b047;?></td>
    <td align="left"><input type="text" size="4" name="b154" onchange="js:diffMoney(this);" value="<? if($b154 =='') echo ''; else echo $b154;?>"/></td>
    <td align="left"><input type="text" size="4" name="b155" value="<? if($b155 =='') echo ''; else echo $b155;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="b052" value="<? if($b052 =='') echo ''; else echo $b052;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="b053" value="<? if($b053 =='') echo ''; else echo $b053;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="b054" value="<? if($b054 =='') echo ''; else echo $b054;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="b055" value="<? if($b055 =='') echo ''; else echo $b055;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="b056" value="<? if($b056 =='') echo ''; else echo $b056;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $b057;?></td>
    <td align="left"><input type="text" size="4" name="b158" onchange="js:diffMoney(this);" value="<? if($b158 =='') echo ''; else echo $b158;?>"/></td>
    <td align="left"><input type="text" size="4" name="b159" value="<? if($b159 =='') echo ''; else echo $b159;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="b062" value="<? if($b062 =='') echo ''; else echo $b062;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="b063" value="<? if($b063 =='') echo ''; else echo $b063;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="b064" value="<? if($b064 =='') echo ''; else echo $b064;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="b065" value="<? if($b065 =='') echo ''; else echo $b065;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="b066" value="<? if($b066 =='') echo ''; else echo $b066;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $b067;?></td>
    <td align="left"><input type="text" size="4" name="b162" onchange="js:diffMoney(this);" value="<? if($b162 =='') echo ''; else echo $b162;?>"/></td>
    <td align="left"><input type="text" size="4" name="b163" value="<? if($b163 =='') echo ''; else echo $b163;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="b072" value="<? if($b072 =='') echo ''; else echo $b072;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="b073" value="<? if($b073 =='') echo ''; else echo $b073;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="b074" value="<? if($b074 =='') echo ''; else echo $b074;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="b075" value="<? if($b075 =='') echo ''; else echo $b075;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="b076" value="<? if($b076 =='') echo ''; else echo $b076;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $b077;?></td>
    <td align="left"><input type="text" size="4" name="b166" onchange="js:diffMoney(this);" value="<? if($b166 =='') echo ''; else echo $b166;?>"/></td>
    <td align="left"><input type="text" size="4" name="b167" value="<? if($b167 =='') echo ''; else echo $b167;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="b082" value="<? if($b082 =='') echo ''; else echo $b082;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="b083" value="<? if($b083 =='') echo ''; else echo $b083;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="b084" value="<? if($b084 =='') echo ''; else echo $b084;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="b085" value="<? if($b085 =='') echo ''; else echo $b085;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="b086" value="<? if($b086 =='') echo ''; else echo $b086;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $b087;?></td>
    <td align="left"><input type="text" size="4" name="b170" onchange="js:diffMoney(this);" value="<? if($b170 =='') echo ''; else echo $b170;?>"/></td>
    <td align="left"><input type="text" size="4" name="b171" value="<? if($b171 =='') echo ''; else echo $b171;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="b092" value="<? if($b092 =='') echo ''; else echo $b092;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="b093" value="<? if($b093 =='') echo ''; else echo $b093;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="b094" value="<? if($b094 =='') echo ''; else echo $b094;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="b095" value="<? if($b095 =='') echo ''; else echo $b095;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="b096" value="<? if($b096 =='') echo ''; else echo $b096;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $b097;?></td>
    <td align="left"><input type="text" size="4" name="b174" onchange="js:diffMoney(this);" value="<? if($b174 =='') echo ''; else echo $b174;?>"/></td>
    <td align="left"><input type="text" size="4" name="b175" value="<? if($b175 =='') echo ''; else echo $b175;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="b102" value="<? if($b102 =='') echo ''; else echo $b102;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="b103" value="<? if($b103 =='') echo ''; else echo $b103;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="b104" value="<? if($b104 =='') echo ''; else echo $b104;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="b105" value="<? if($b105 =='') echo ''; else echo $b105;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="b106" value="<? if($b106 =='') echo ''; else echo $b106;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $b107;?></td>
    <td align="left"><input type="text" size="4" name="b178" onchange="js:diffMoney(this);" value="<? if($b178 =='') echo ''; else echo $b178;?>"/></td>
    <td align="left"><input type="text" size="4" name="b179" value="<? if($b179 =='') echo ''; else echo $b179;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
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
    <td align="left"><input type="text" size="10" name="b112" value="<? if($b112 =='') echo ''; else echo $b112;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="b113" value="<? if($b113 =='') echo ''; else echo $b113;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="b114" value="<? if($b114 =='') echo ''; else echo $b114;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="b115" value="<? if($b115 =='') echo ''; else echo $b115;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="b116" value="<? if($b116 =='') echo ''; else echo $b116;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $b117;?></td>
    <td align="left"><input type="text" size="4" name="b182" onchange="js:diffMoney(this);" value="<? if($b182 =='') echo ''; else echo $b182;?>"/></td>
    <td align="left"><input type="text" size="4" name="b183" value="<? if($b183 =='') echo ''; else echo $b183;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">10.</td>
    <td align="left"><input type="text" size="3" name="b120" value="<? if($b120 =='') echo ''; else echo $b120;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="b121" value="<? if($b121 =='') echo ''; else echo $b121;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left" valign="middle"><input type="checkbox" name="b122" onclick="js:return false;" value="1" <? if($b122 =='1') echo 'checked';?>/>申請雜支</td>
    <td align="left"><input type="text" size="2" name="b123" value="<? if($b123 =='') echo ''; else echo $b123;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="b124" value="<? if($b124 =='') echo ''; else echo $b124;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="b125" value="<? if($b125 =='') echo ''; else echo $b125;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="b126" value="<? if($b126 =='') echo ''; else echo $b126;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><? echo $b127;?></td>
    <td align="left"><input type="text" size="4" name="b186" onchange="js:diffMoney(this);" value="<? if($b186 =='') echo ''; else echo $b186;?>"/></td>
    <td align="left"><input type="text" size="4" name="b187" value="<? if($b187 =='') echo ''; else echo $b187;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    </tr>
</table>
<? if($examine == '2') echo '※初審意見：'.'<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="+1">'.$a131.'</font><br>'?>
<b>※初審意見：</b><textarea name="a131" cols="60" rows="2"><? if($examine == '1'){ echo $a131;} else echo $a191;?></textarea>
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
if ($a5_1 == ''){echo "‧實施計畫：<font color=red>未上傳</font>";} else {echo '‧實施計畫：<font color=blue>已上傳</font>，檔名：'.'<a href="../xSchoolForm/upload/102/'.$school.'/'.$a5_1.'" style="text-decoration:none" target="_new">'.$a5_1.'</a>';}
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
<input type="hidden" name="allowance"  value="<? echo "allowance5"; ?>" >
<label>
	<input type="radio" name="pass" value="1" id="1" <? if ($a130=='1') echo 'checked';?>/>審核通過
</label>
<label>
	<input type="radio" name="pass" value="2" id="2" <? if ($a130=='2') echo 'checked';?>/>審核不通過且列入退件名單
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
	f.a132.value = (f.a133.value==""?0:parseFloat(f.a133.value)) + (f.a134.value==""?0:parseFloat(f.a134.value)); 
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
		NewOpt[1] = new Option("鐘點費");
		NewOpt[2] = new Option("旅運費");
		NewOpt[3] = new Option("材料費");
		NewOpt[4] = new Option("器材購置");
		NewOpt[5] = new Option("器材維修");
		NewOpt[6] = new Option("修繕");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維修");
		NewOpt[3] = new Option("修繕");
		NewOpt[4] = new Option("其他");
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
		NewOpt[1] = new Option("鐘點費");
		NewOpt[2] = new Option("旅運費");
		NewOpt[3] = new Option("材料費");
		NewOpt[4] = new Option("器材購置");
		NewOpt[5] = new Option("器材維修");
		NewOpt[6] = new Option("修繕");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維修");
		NewOpt[3] = new Option("修繕");
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
		NewOpt[2] = new Option("旅運費");
		NewOpt[3] = new Option("材料費");
		NewOpt[4] = new Option("器材購置");
		NewOpt[5] = new Option("器材維修");
		NewOpt[6] = new Option("修繕");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維修");
		NewOpt[3] = new Option("修繕");
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
		NewOpt[2] = new Option("旅運費");
		NewOpt[3] = new Option("材料費");
		NewOpt[4] = new Option("器材購置");
		NewOpt[5] = new Option("器材維修");
		NewOpt[6] = new Option("修繕");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維修");
		NewOpt[3] = new Option("修繕");
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
		NewOpt[2] = new Option("旅運費");
		NewOpt[3] = new Option("材料費");
		NewOpt[4] = new Option("器材購置");
		NewOpt[5] = new Option("器材維修");
		NewOpt[6] = new Option("修繕");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維修");
		NewOpt[3] = new Option("修繕");
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
		NewOpt[2] = new Option("旅運費");
		NewOpt[3] = new Option("材料費");
		NewOpt[4] = new Option("器材購置");
		NewOpt[5] = new Option("器材維修");
		NewOpt[6] = new Option("修繕");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維修");
		NewOpt[3] = new Option("修繕");
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
		NewOpt[2] = new Option("旅運費");
		NewOpt[3] = new Option("材料費");
		NewOpt[4] = new Option("器材購置");
		NewOpt[5] = new Option("器材維修");
		NewOpt[6] = new Option("修繕");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維修");
		NewOpt[3] = new Option("修繕");
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
		NewOpt[2] = new Option("旅運費");
		NewOpt[3] = new Option("材料費");
		NewOpt[4] = new Option("器材購置");
		NewOpt[5] = new Option("器材維修");
		NewOpt[6] = new Option("修繕");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維修");
		NewOpt[3] = new Option("修繕");
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
		NewOpt[2] = new Option("旅運費");
		NewOpt[3] = new Option("材料費");
		NewOpt[4] = new Option("器材購置");
		NewOpt[5] = new Option("器材維修");
		NewOpt[6] = new Option("修繕");
		NewOpt[7] = new Option("其他");
	}

	if (selectName == "資本門"){
		NewOpt[0] = new Option("");
		NewOpt[1] = new Option("器材購置");
		NewOpt[2] = new Option("器材維修");
		NewOpt[3] = new Option("修繕");
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
<script language="JavaScript">
  
	function diffMoney(obj)
	{	
		//1 = a， 2 = b
		var group_ab = obj.name.substring(0,1);
		
		//取得原申請金額欄位名稱，規則a150->a036, a154->a046, a158->056
		// ex. (150 - 150) / 4 + 3 = 3, 3前面補0加上"a", 後面補上6
		var oldMoneyName = group_ab + padLeft((((parseInt(right(obj.name)) - 150) / 4) + 3).toString(),2) + "6";
				
		//刪減金額欄位名稱
		var diffMoneyName = group_ab + (parseInt(right(obj.name))+1);
		
		//驗證輸入的資料是否為數字 
		var regex = /^[0-9]*$/;
		var flag = 1;
		var idx = ((parseInt(right(obj.name)) - 150) / 4) + 1 ; //計算項次
		
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
			if(!(document.getElementsByName(group_ab + "122")[0].checked == false && idx == "10"))		
			{
				document.getElementsByName(diffMoneyName)[0].value = parseInt(document.getElementsByName(oldMoneyName)[0].value) - parseInt(obj.value);
				chkbox(document.getElementsByName(group_ab + "122")[0]);
			}
		}

	}
	
	//雜支未選則清空
	function chkbox(obj)
	{
		//特色一 或 二，1 = a， 2 = b
		var group_ab = obj.name.substring(0,1);
		
		if (obj.checked == false)
		{
			document.getElementsByName(group_ab + "186")[0].value = "";
			document.getElementsByName(group_ab + "187")[0].value = "";
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
		if(document.getElementsByName(group_ab + "150")[0].value != "")
		{
			if(document.getElementsByName(group_ab + "030")[0].value == "經常門")
			{
				money_1 += parseInt(document.getElementsByName(group_ab + "150")[0].value);
			}			
			else
			{
				money_2 += parseInt(document.getElementsByName(group_ab + "150")[0].value);
			}
			
			total += parseInt(document.getElementsByName(group_ab + "150")[0].value);
		}
		
		//判斷下拉選單是否空白，不是才相加			
		for(var i = 4 ; i < 12 ; i++)
		{
			//o = 下拉選單
			var o = document.getElementsByName(group_ab + padLeft(i.toString(), 2) + "0")[0];
			var idx = o.selectedIndex;
			
			//審核金額欄位名稱
			var newMoneyName = group_ab + (150 + ((i - 3) * 4));
						
			if(idx > 0 && document.getElementsByName(newMoneyName)[0].value != "")
			{
				if (idx == 1)
				{	
					//經常門
					money_1 += parseInt(document.getElementsByName(newMoneyName)[0].value);
				}
				else
				{	
					//資本門
					money_2 += parseInt(document.getElementsByName(newMoneyName)[0].value);
				}
				
				total += parseInt(document.getElementsByName(newMoneyName)[0].value);
			}
		}
		
		//項次12不是下拉是選單，另外算(雜支一定是經常門)
		if(document.getElementsByName(group_ab + "186")[0].value != "")
		{
			money_1 += parseInt(document.getElementsByName(group_ab + "186")[0].value);
			total += parseInt(document.getElementsByName(group_ab + "186")[0].value);
		}
		
		if(group_ab == "a")
		{
			//
			document.getElementsByName("a135")[0].value = total;	
			document.getElementsByName("a136")[0].value = money_1;	
			document.getElementsByName("a137")[0].value = money_2;	
		}
		else
		{
			document.getElementsByName("a138")[0].value = total;	
			document.getElementsByName("a139")[0].value = money_1;	
			document.getElementsByName("a140")[0].value = money_2;	
		}
		
		if (document.getElementsByName("a135")[0].value != "")
			document.getElementsByName("a132")[0].value = parseInt(document.getElementsByName("a135")[0].value);
		
		if (document.getElementsByName("a138")[0].value != "")
			document.getElementsByName("a132")[0].value = parseInt(document.getElementsByName("a132")[0].value) + parseInt(document.getElementsByName("a138")[0].value);
		
		
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
include "../../footer.php";
?>
