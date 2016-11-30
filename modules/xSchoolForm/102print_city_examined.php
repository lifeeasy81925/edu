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

	$a1_130 = $row[130]; //本項目初審狀態
	$a1_131 = $row[131]; //本項目初審意見
	$a1_132 = $row[132]; //本項目初審總額
	$a1_133 = $row[133]; //
	$a1_134 = $row[134]; //
	$a1_135 = $row[135]; //
	$a1_136 = $row[136]; //
	$a1_137 = $row[137]; //
	$a1_138 = $row[138]; //
	$a1_139 = $row[139]; //
	$a1_140 = $row[140]; //
	
	$a1_190 = $row[190]; //本項目複審狀態
	$a1_191 = $row[191]; //本項目複審意見
	$a1_192 = $row[192]; //本項目複審總額
	$a1_193 = $row[193]; //
	$a1_194 = $row[194]; //
	$a1_195 = $row[195]; //
	$a1_196 = $row[196]; //
	$a1_197 = $row[197]; //
	$a1_198 = $row[198]; //
	$a1_199 = $row[199]; //
	$a1_200 = $row[200]; //
}
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

	$a2_130 = $row[130]; //本項目初審狀態
	$a2_131 = $row[131]; //本項目初審意見
	$a2_132 = $row[132]; //本項目初審總額
	$a2_133 = $row[133]; //
	$a2_134 = $row[134]; //
	$a2_135 = $row[135]; //
	$a2_136 = $row[136]; //
	$a2_137 = $row[137]; //
	$a2_138 = $row[138]; //
	$a2_139 = $row[139]; //
	$a2_140 = $row[140]; //
	
	$a2_190 = $row[190]; //本項目複審狀態
	$a2_191 = $row[191]; //本項目複審意見
	$a2_192 = $row[192]; //本項目複審總額
	$a2_193 = $row[193]; //
	$a2_194 = $row[194]; //
	$a2_195 = $row[195]; //
	$a2_196 = $row[196]; //
	$a2_197 = $row[197]; //
	$a2_198 = $row[198]; //
	$a2_199 = $row[199]; //
	$a2_200 = $row[200]; //
}
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

	$a3_130 = $row[130]; //本項目初審狀態
	$a3_131 = $row[131]; //本項目初審意見
	$a3_132 = $row[132]; //本項目初審總額
	$a3_133 = $row[133]; //
	$a3_134 = $row[134]; //
	$a3_135 = $row[135]; //
	$a3_136 = $row[136]; //
	$a3_137 = $row[137]; //
	$a3_138 = $row[138]; //
	$a3_139 = $row[139]; //
	$a3_140 = $row[140]; //
	
	$a3_190 = $row[190]; //本項目複審狀態
	$a3_191 = $row[191]; //本項目複審意見
	$a3_192 = $row[192]; //本項目複審總額
	$a3_193 = $row[193]; //
	$a3_194 = $row[194]; //
	$a3_195 = $row[195]; //
	$a3_196 = $row[196]; //
	$a3_197 = $row[197]; //
	$a3_198 = $row[198]; //
	$a3_199 = $row[199]; //
	$a3_200 = $row[200]; //
}
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

	$a4_130 = $row[130]; //本項目初審狀態
	$a4_131 = $row[131]; //本項目初審意見
	$a4_132 = $row[132]; //本項目初審總額
	$a4_133 = $row[133]; //
	$a4_134 = $row[134]; //
	$a4_135 = $row[135]; //
	$a4_136 = $row[136]; //
	$a4_137 = $row[137]; //
	$a4_138 = $row[138]; //
	$a4_139 = $row[139]; //
	$a4_140 = $row[140]; //
	
	$a4_190 = $row[190]; //本項目複審狀態
	$a4_191 = $row[191]; //本項目複審意見
	$a4_192 = $row[192]; //本項目複審總額
	$a4_193 = $row[193]; //
	$a4_194 = $row[194]; //
	$a4_195 = $row[195]; //
	$a4_196 = $row[196]; //
	$a4_197 = $row[197]; //
	$a4_198 = $row[198]; //
	$a4_199 = $row[199]; //
	$a4_200 = $row[200]; //
}
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

	$a5_130 = $row[130]; //本項目初審狀態
	$a5_131 = $row[131]; //本項目初審意見
	$a5_132 = $row[132]; //本項目初審總額
	$a5_133 = $row[133]; //
	$a5_134 = $row[134]; //
	$a5_135 = $row[135]; //
	$a5_136 = $row[136]; //
	$a5_137 = $row[137]; //
	$a5_138 = $row[138]; //
	$a5_139 = $row[139]; //
	$a5_140 = $row[140]; //
	
	$a5_190 = $row[190]; //本項目複審狀態
	$a5_191 = $row[191]; //本項目複審意見
	$a5_192 = $row[192]; //本項目複審總額
	$a5_193 = $row[193]; //
	$a5_194 = $row[194]; //
	$a5_195 = $row[195]; //
	$a5_196 = $row[196]; //
	$a5_197 = $row[197]; //
	$a5_198 = $row[198]; //
	$a5_199 = $row[199]; //
	$a5_200 = $row[200]; //
}
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

	$a6_130 = $row[130]; //本項目初審狀態
	$a6_131 = $row[131]; //本項目初審意見
	$a6_132 = $row[132]; //本項目初審總額
	$a6_133 = $row[133]; //
	$a6_134 = $row[134]; //
	$a6_135 = $row[135]; //
	$a6_136 = $row[136]; //
	$a6_137 = $row[137]; //
	$a6_138 = $row[138]; //
	$a6_139 = $row[139]; //
	$a6_140 = $row[140]; //
	
	$a6_190 = $row[190]; //本項目複審狀態
	$a6_191 = $row[191]; //本項目複審意見
	$a6_192 = $row[192]; //本項目複審總額
	$a6_193 = $row[193]; //
	$a6_194 = $row[194]; //
	$a6_195 = $row[195]; //
	$a6_196 = $row[196]; //
	$a6_197 = $row[197]; //
	$a6_198 = $row[198]; //
	$a6_199 = $row[199]; //
	$a6_200 = $row[200]; //
}
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

	$a7_130 = $row[130]; //本項目初審狀態
	$a7_131 = $row[131]; //本項目初審意見
	$a7_132 = $row[132]; //本項目初審總額
	$a7_133 = $row[133]; //
	$a7_134 = $row[134]; //
	$a7_135 = $row[135]; //
	$a7_136 = $row[136]; //
	$a7_137 = $row[137]; //
	$a7_138 = $row[138]; //
	$a7_139 = $row[139]; //
	$a7_140 = $row[140]; //
	
	$a7_190 = $row[190]; //本項目複審狀態
	$a7_191 = $row[191]; //本項目複審意見
	$a7_192 = $row[192]; //本項目複審總額
	$a7_193 = $row[193]; //
	$a7_194 = $row[194]; //
	$a7_195 = $row[195]; //
	$a7_196 = $row[196]; //
	$a7_197 = $row[197]; //
	$a7_198 = $row[198]; //
	$a7_199 = $row[199]; //
	$a7_200 = $row[200]; //
}
}
?>
<style type="text/css">
.style1 {
	font-family: "標楷體";
	font-size: 30px;
}
.style3 {font-family: "標楷體"}
.style4 {
	font-size: 22px;
	font-family: "標楷體";
}
.style7 {font-size: 36}
.style8 {font-family: "標楷體"; font-size: 36; }
</style>

<INPUT TYPE="button" VALUE="回上一頁" onClick="history.go(-1)">
<? include "../xSchoolForm/button_print02.php"; ?>
<br />
<div id="print_content">
<div style="font-family:標楷體;font-size:20px;text-align:center"><strong>教育部102年度教育優先區計畫補助項目經費需求審查現況<br /></strong></div>
<table width="100%" bordercolor="#000000"  border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td height="50" colspan="4" class="style3">學校名稱</td>
    <td colspan="3" class="style3"><div align="center"><span class="style7"></span><? echo $username.'　'.$city.$district.$school;?></div></td>
  </tr>
  <tr>
    <td height="35" colspan="4" class="style3">補助項目、金額</td>
    <td bgcolor="#FFFFCC" class="style3"><div align="center" class="style3">學校申請金額</div></td>
    <td bgcolor="#CCFFCC" class="style3"><div align="center">縣市初審金額</div></td>
    <td bgcolor="#CCFFCC" class="style3">縣市初審說明</td>
  </tr>
  <tr>
    <td height="30" rowspan="2" class="style3"><div align="center">1.</div></td>
    <td height="30" rowspan="2" class="style3">推展親職教育活動</td>
    <td height="30" colspan="2" class="style3">親職教育活動</td>
    <td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><span class="style7"></span><? echo number_format($a1_013);?></div></td>
    <td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><? echo number_format($a1_135);?></div></td>
    <td height="30" rowspan="2" bgcolor="#CCFFCC" class="style3"><? echo $a1_131;?></td>
  </tr>
  <tr>
    <td height="30" colspan="2" class="style3">目標學生家庭訪視輔導</td>
    <td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><span class="style7"></span><? echo number_format($a1_016);?></div></td>
    <td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><? echo number_format($a1_138);?></div></td>
  </tr>
  <tr>
    <td height="30" rowspan="4" class="style3"><div align="center">2.</div>      <div align="center"></div></td>
    <td height="30" rowspan="4" class="style3">補助學校發展教育特色</td>
    <td height="30" rowspan="2" class="style3">發展特色一：<br /><? echo $a2_020;?></td>
    <td height="30" nowrap="nowrap" class="style3">經常門</td>
    <td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><span class="style7"></span><? echo number_format($a2_014);?></div></td>
    <td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><? echo number_format($a2_136);?></div></td>
    <td height="30" rowspan="4" bgcolor="#CCFFCC" class="style3"><? echo $a2_131;?></td>
  </tr>
  <tr>
    <td height="30" nowrap="nowrap" class="style3">資本門</td>
    <td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><span class="style7"></span><? echo number_format($a2_015);?></div></td>
    <td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><? echo number_format($a2_137);?></div></td>
  </tr>
  <tr>
    <td height="30" rowspan="2" class="style3">發展特色二：<br /><? echo $a2_022;?></td>
    <td height="30" nowrap="nowrap" class="style3">經常門</td>
    <td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><span class="style7"></span><? echo number_format($a2_017);?></div></td>
    <td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><? echo number_format($a2_139);?></div></td>
  </tr>
  <tr>
    <td height="30" nowrap="nowrap" class="style3">資本門</td>
    <td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><span class="style7"></span><? echo number_format($a2_018);?></div></td>
    <td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><? echo number_format($a2_140);?></div></td>
  </tr>
<tr>
  <td height="30" rowspan="4" class="style3"><div align="center">3.</div>      <div align="center"></div>      <div align="center"></div>      <div align="center"></div></td>
  <td height="30" rowspan="4" class="style3">修繕離島或偏遠地區師生宿舍</td>
  <td height="30" rowspan="2" class="style3">教師宿舍</td>
  <td height="30" nowrap="nowrap" class="style3">經常門</td>
  <td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><span class="style7"></span><? echo number_format($a3_014);?></div></td>
  <td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><? echo number_format($a3_136);?></div></td>
  <td height="30" rowspan="4" bgcolor="#CCFFCC" class="style3"><? echo $a3_131;?></td>
  </tr>
<tr>
  <td height="30" nowrap="nowrap" class="style3">資本門</td>
  <td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><span class="style7"></span><? echo number_format($a3_015);?></div></td>
  <td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><? echo number_format($a3_137);?></div></td>
  </tr>
<tr>
  <td height="30" rowspan="2" class="style3">學生宿舍</td>
    <td height="30" nowrap="nowrap" class="style3">經常門</td>
    <td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><span class="style7"></span><? echo number_format($a3_017);?></div></td>
    <td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><? echo number_format($a3_139);?></div></td>
  </tr>
  
<tr>
  <td height="30" nowrap="nowrap" class="style3">資本門</td>
    <td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><span class="style7"></span><? echo number_format($a3_018);?></div></td>
    <td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><? echo number_format($a3_140);?></div></td>
  </tr>
  <tr>
    <td height="30" rowspan="2" class="style3"><div align="center">4.</div></td>
    <td height="30" rowspan="2" class="style3">充實學校基本教學設備</td>
    <td height="30" colspan="2" class="style3">經常門</td>
    <td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><span class="style7"></span><? echo number_format($a4_011);?></div></td>
    <td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><? echo number_format($a4_133);?></div></td>
    <td height="30" rowspan="2" bgcolor="#CCFFCC" class="style3"><? echo $a4_131;?></td>
  </tr>
  <tr>
    <td height="30" colspan="2" class="style3">資本門</td>
    <td height="30" align="right" bgcolor="#FFFFCC" class="style3"><? echo number_format($a4_012);?></td>
    <td height="30" align="right" bgcolor="#CCFFCC" class="style3"><? echo number_format($a4_134);?></td>
  </tr>
  <tr>
    <td height="30" rowspan="4" class="style3"><div align="center">5.</div>      <div align="center"></div></td>
    <td height="30" rowspan="4" class="style3">發展原住民教育文化特色及充實設備器材</td>
    <td height="30" rowspan="2" class="style3">發展特色一：<br /><? echo $a5_020;?></td>
    <td height="30" nowrap="nowrap" class="style3">經常門</td>
    <td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><span class="style7"></span><? echo number_format($a5_014);?></div></td>
    <td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><? echo number_format($a5_136);?></div></td>
    <td height="30" rowspan="4" bgcolor="#CCFFCC" class="style3"><? echo $a5_131;?></td>
  </tr>
  <tr>
    <td height="30" nowrap="nowrap" class="style3">資本門</td>
    <td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><span class="style7"></span><? echo number_format($a5_015);?></div></td>
    <td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><? echo number_format($a5_137);?></div></td>
  </tr>
  <tr>
    <td height="30" rowspan="2" class="style3">發展特色二：<br /><? echo $a5_022;?></td>
    <td height="30" nowrap="nowrap" class="style3">經常門</td>
    <td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><span class="style7"></span><? echo number_format($a5_017);?></div></td>
    <td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><? echo number_format($a5_139);?></div></td>
  </tr>
  <tr>
    <td height="30" nowrap="nowrap" class="style3">資本門</td>
    <td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><span class="style7"></span><? echo number_format($a5_018);?></div></td>
    <td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><? echo number_format($a5_140);?></div></td>
  </tr>
  <tr>
    <td height="30" rowspan="3" class="style3"><div align="center">6.</div>      <div align="center"></div>      <div align="center"></div></td>
    <td height="30" rowspan="3" class="style3">補助交通不便學校交通車</td>
    <td height="30" colspan="2" class="style3">補助租車費</td>
    <td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><span class="style7"></span><? echo number_format($a6_014);?></div></td>
    <td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><? echo number_format($a6_136);?></div></td>
    <td height="30" rowspan="3" bgcolor="#CCFFCC" class="style3"><? echo $a6_131;?></td>
  </tr>
  <tr>
    <td height="30" colspan="2" class="style3">補助交通費</td>
    <td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><span class="style7"></span><? echo number_format($a6_016);?></div></td>
    <td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><? echo number_format($a6_138);?></div></td>
  </tr>
  <tr>
    <td height="30" colspan="2" class="style3">購置交通車</td>
    <td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><span class="style7"></span><? echo number_format($a6_018);?></div></td>
    <td height="30" bgcolor="#CCFFCC" class="style3"><div align="right"><? echo number_format($a6_140);?></div></td>
  </tr>
  <tr>
    <td height="30" rowspan="2" class="style3"><div align="center">7.</div>      <div align="center"></div>      <div align="center"></div></td>
    <td height="30" rowspan="2" class="style3">整修學校社區化活動場所</td>
    <td height="30" rowspan="2" class="style3">綜合球場</td>
    <td height="30" nowrap="nowrap" class="style3">修建</td>
    <td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><span class="style7"></span><? echo number_format($a7_011);?></div></td>
    <td height="30" bgcolor="#CCFFCC" class="style3"><div align="right">
      <div align="right"><span class="style7"></span><? echo number_format($a7_133);?></div>
    </div></td>
    <td height="30" rowspan="2" bgcolor="#CCFFCC" class="style3"><? echo $a7_131;?></td>
  </tr>
  <tr>
    <td height="30" nowrap="nowrap" class="style3">設備</td>
    <td height="30" bgcolor="#FFFFCC" class="style3"><div align="right"><span class="style7"></span><? echo number_format($a7_012);?></div></td>
    <td height="30" bgcolor="#CCFFCC" class="style3"><div align="right">
      <div align="right"><span class="style7"></span><? echo number_format($a7_134);?></div>
    </div></td>
  </tr>
  <tr>
    <td height="43" colspan="4" class="style3"><div align="center">總計</div></td>
    <td bgcolor="#FFFFCC" class="style3"><div align="right"><span class="style7"></span><? echo number_format($a1_010+$a2_013+$a2_016+$a3_013+$a3_016+$a4_010+$a5_010+$a6_010+$a7_010);?></div></td>
    <td bgcolor="#CCFFCC" class="style3"><div align="right"><? echo number_format($a1_135+$a1_138+$a2_136+$a2_137+$a2_139+$a2_140+$a3_136+$a3_137+$a3_139+$a3_140+$a4_133+$a4_134+$a5_136+$a5_137+$a5_139+$a5_140+$a6_136+$a6_138+$a6_140+$a7_133+$a7_134);?></div></td>
    <td bgcolor="#CCFFCC" class="style3">&nbsp;</td>
  </tr>
</table>
</div>
<br>

<?php
//include "../../footer.php";
?>

