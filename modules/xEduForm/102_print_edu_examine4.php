<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_edu.php";
echo $username."_";
echo $edu."_";
echo $eduman;
include "../xSchoolForm/button_print02.php";
$serial = 0;
?>
<input type="button" value="關閉本頁" onClick="window.close()">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="print_content">
【102年度教育優先區項目別補助金額統計表】
<?
	$count_school_a1 = 0; //補1校數
	$count_school_a2 = 0; 
	$count_school_a3 = 0; 
	$count_school_a4 = 0; 
	$count_school_a5 = 0; 
	$count_school_a6 = 0; 
	$count_school_a7 = 0; 
	$count_times_a1 = 0; //補1場次 
	$count_times_a2 = 0; 
	$count_times_a3 = 0; 
	$count_times_a4 = 0; 
	$count_times_a5 = 0; 
	$count_times_a6 = 0; 
	$count_times_a7 = 0;
	$count_money_a1 = 0; //補1金額
	$count_money_a2 = 0;
	$count_money_a3 = 0;
	$count_money_a4 = 0;
	$count_money_a5 = 0;
	$count_money_a6 = 0;
	$count_money_a7 = 0;
	
	$count_total = 0;
	
//學校列表
$sql = "select * from 102schooldata where cityname like '%$city%' order by account;";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
{
	$school_id = $row[0];	//帳號
	
	//讀取補一審核資料
	$sql_a1 = "select  *  from 102allowance1 where account like '".$row[0]."';";
	$result_a1 = mysql_query($sql_a1);
	while($row_a1 = mysql_fetch_row($result_a1)){
		$a1_010 = $row_a1[10];	//學校申請總額
		$a1_011 = $row_a1[11];	//學校申請經常門
		$a1_012 = $row_a1[12];	//學校申請資本門
		$a1_013 = $row_a1[13];	//親職講座總和
		$a1_014 = $row_a1[14];	//親職講座場次
		$a1_015 = $row_a1[15];	//親職講座人數
		$a1_016 = $row_a1[16];	//家庭訪視總和
		$a1_017 = $row_a1[17];	//家庭訪視人次
		$a1_018 = $row_a1[18];	//
		$a1_019 = $row_a1[19];	//
		$a1_020 = $row_a1[20];	//
		$a1_021 = $row_a1[21];	//
		$a1_022 = $row_a1[22];	//
		$a1_023 = $row_a1[23];	//
		$a1_024 = $row_a1[24];	//
		$a1_025 = $row_a1[25];	//
		$a1_026 = $row_a1[26];	//
		$a1_027 = $row_a1[27];	//
		$a1_028 = $row_a1[28];	//
		$a1_029 = $row_a1[29];	//
		
		$a1_130 = $row_a1[130]; //初審狀態
		$a1_131 = $row_a1[131]; //初審意見
		$a1_132 = $row_a1[132];	//初審總額
		$a1_133 = $row_a1[133];	//
		$a1_134 = $row_a1[134];	//
		$a1_135 = $row_a1[135];	//
		$a1_136 = $row_a1[136]; //
		$a1_137 = $row_a1[137]; //
		$a1_138 = $row_a1[138]; //
		$a1_139 = $row_a1[139]; //
		$a1_140 = $row_a1[140]; //
		
		$a1_190 = $row_a1[190]; //複審狀態
		$a1_191 = $row_a1[191]; //複審意見
		$a1_192 = $row_a1[192]; //複審總額
		$a1_193 = $row_a1[193]; //
		$a1_194 = $row_a1[194]; //
		$a1_195 = $row_a1[195]; //
		$a1_196 = $row_a1[196]; //
		$a1_197 = $row_a1[197]; //
		$a1_198 = $row_a1[198]; //
		$a1_199 = $row_a1[199]; //
		$a1_200 = $row_a1[200]; //
	}
	//讀取補二審核資料
	$sql_a2 = "select  *  from 102allowance2 where account like '".$row[0]."';";
	$result_a2 = mysql_query($sql_a2);
	while($row_a2 = mysql_fetch_row($result_a2)){
		$a2_010 = $row_a2[10];	//學校申請總額
		$a2_011 = $row_a2[11];	//學校申請經常門
		$a2_012 = $row_a2[12];	//學校申請資本門
		$a2_013 = $row_a2[13];	//
		$a2_014 = $row_a2[14];	//
		$a2_015 = $row_a2[15];	//
		$a2_016 = $row_a2[16];	//
		$a2_017 = $row_a2[17];	//
		$a2_018 = $row_a2[18];	//
		$a2_019 = $row_a2[19];	//申請幾項
		$a2_020 = $row_a2[20];	//
		$a2_021 = $row_a2[21];	//
		$a2_022 = $row_a2[22];	//
		$a2_023 = $row_a2[23];	//
		$a2_024 = $row_a2[24];	//
		$a2_025 = $row_a2[25];	//
		$a2_026 = $row_a2[26];	//
		$a2_027 = $row_a2[27];	//
		$a2_028 = $row_a2[28];	//
		$a2_029 = $row_a2[29];	//
		
		$a2_130 = $row_a2[130]; //初審狀態
		$a2_131 = $row_a2[131]; //初審意見
		$a2_132 = $row_a2[132];	//初審總額
		$a2_133 = $row_a2[133];	//
		$a2_134 = $row_a2[134];	//
		$a2_135 = $row_a2[135];	//
		$a2_136 = $row_a2[136]; //
		$a2_137 = $row_a2[137]; //
		$a2_138 = $row_a2[138]; //
		$a2_139 = $row_a2[139]; //
		$a2_140 = $row_a2[140]; //
		
		$a2_190 = $row_a2[190]; //複審狀態
		$a2_191 = $row_a2[191]; //複審意見
		$a2_192 = $row_a2[192]; //複審總額
		$a2_193 = $row_a2[193]; //
		$a2_194 = $row_a2[194]; //
		$a2_195 = $row_a2[195]; //
		$a2_196 = $row_a2[196]; //
		$a2_197 = $row_a2[197]; //
		$a2_198 = $row_a2[198]; //
		$a2_199 = $row_a2[199]; //
		$a2_200 = $row_a2[200]; //
	}
	//讀取補三審核資料
	$sql_a3 = "select  *  from 102allowance3 where account like '".$row[0]."';";
	$result_a3 = mysql_query($sql_a3);
	while($row_a3 = mysql_fetch_row($result_a3)){
		$a3_010 = $row_a3[10];	//學校申請總額
		$a3_011 = $row_a3[11];	//學校申請經常門
		$a3_012 = $row_a3[12];	//學校申請資本門
		$a3_013 = $row_a3[13];	//
		$a3_014 = $row_a3[14];	//
		$a3_015 = $row_a3[15];	//
		$a3_016 = $row_a3[16];	//
		$a3_017 = $row_a3[17];	//
		$a3_018 = $row_a3[18];	//
		$a3_019 = $row_a3[19];	//
		$a3_020 = $row_a3[20];	//
		$a3_021 = $row_a3[21];	//
		$a3_022 = $row_a3[22];	//
		$a3_023 = $row_a3[23];	//
		$a3_024 = $row_a3[24];	//
		$a3_025 = $row_a3[25];	//
		$a3_026 = $row_a3[26];	//
		$a3_027 = $row_a3[27];	//
		$a3_028 = $row_a3[28];	//
		$a3_029 = $row_a3[29];	//
		
		$a3_130 = $row_a3[130]; //初審狀態
		$a3_131 = $row_a3[131]; //初審意見
		$a3_132 = $row_a3[132];	//初審總額
		$a3_133 = $row_a3[133];	//
		$a3_134 = $row_a3[134];	//
		$a3_135 = $row_a3[135];	//
		$a3_136 = $row_a3[136]; //
		$a3_137 = $row_a3[137]; //
		$a3_138 = $row_a3[138]; //
		$a3_139 = $row_a3[139]; //
		$a3_140 = $row_a3[140]; //
		$a3_141 = $row_a3[141]; //
		$a3_142 = $row_a3[142];	//
		$a3_143 = $row_a3[143];	//
		$a3_144 = $row_a3[144];	//
		$a3_145 = $row_a3[145];	//
		$a3_146 = $row_a3[146]; //
		$a3_147 = $row_a3[147]; //
		$a3_148 = $row_a3[148]; //
		$a3_149 = $row_a3[149]; //
		
		$a3_190 = $row_a3[190]; //複審狀態
		$a3_191 = $row_a3[191]; //複審意見
		$a3_192 = $row_a3[192]; //複審總額
		$a3_193 = $row_a3[193]; //
		$a3_194 = $row_a3[194]; //
		$a3_195 = $row_a3[195]; //
		$a3_196 = $row_a3[196]; //
		$a3_197 = $row_a3[197]; //
		$a3_198 = $row_a3[198]; //
		$a3_199 = $row_a3[199]; //
		$a3_200 = $row_a3[200]; //
		$a3_201 = $row_a3[201]; //
		$a3_202 = $row_a3[202]; //
		$a3_203 = $row_a3[203]; //
		$a3_204 = $row_a3[204]; //
		$a3_205 = $row_a3[205]; //
		$a3_206 = $row_a3[206]; //
		$a3_207 = $row_a3[207]; //
		$a3_208 = $row_a3[208]; //
		$a3_209 = $row_a3[209]; //
	}
	//讀取補四審核資料
	$sql_a4 = "select  *  from 102allowance4 where account like '".$row[0]."';";
	$result_a4 = mysql_query($sql_a4);
	while($row_a4 = mysql_fetch_row($result_a4)){
		$a4_010 = $row_a4[10];	//學校申請總額
		$a4_011 = $row_a4[11];	//學校申請經常門
		$a4_012 = $row_a4[12];	//學校申請資本門
		$a4_013 = $row_a4[13];	//
		$a4_014 = $row_a4[14];	//
		$a4_015 = $row_a4[15];	//
		$a4_016 = $row_a4[16];	//
		$a4_017 = $row_a4[17];	//
		$a4_018 = $row_a4[18];	//
		$a4_019 = $row_a4[19];	//
		$a4_020 = $row_a4[20];	//
		$a4_021 = $row_a4[21];	//
		$a4_022 = $row_a4[22];	//
		$a4_023 = $row_a4[23];	//
		$a4_024 = $row_a4[24];	//
		$a4_025 = $row_a4[25];	//
		$a4_026 = $row_a4[26];	//
		$a4_027 = $row_a4[27];	//
		$a4_028 = $row_a4[28];	//
		$a4_029 = $row_a4[29];	//
		
		$a4_130 = $row_a4[130]; //初審狀態
		$a4_131 = $row_a4[131]; //初審意見
		$a4_132 = $row_a4[132];	//初審總額
		$a4_133 = $row_a4[133];	//
		$a4_134 = $row_a4[134];	//
		$a4_135 = $row_a4[135];	//
		$a4_136 = $row_a4[136]; //
		$a4_137 = $row_a4[137]; //
		$a4_138 = $row_a4[138]; //
		$a4_139 = $row_a4[139]; //
		$a4_140 = $row_a4[140]; //
		
		$a4_190 = $row_a4[190]; //複審狀態
		$a4_191 = $row_a4[191]; //複審意見
		$a4_192 = $row_a4[192]; //複審總額
		$a4_193 = $row_a4[193]; //
		$a4_194 = $row_a4[194]; //
		$a4_195 = $row_a4[195]; //
		$a4_196 = $row_a4[196]; //
		$a4_197 = $row_a4[197]; //
		$a4_198 = $row_a4[198]; //
		$a4_199 = $row_a4[199]; //
		$a4_200 = $row_a4[200]; //
	}
	//讀取補五審核資料
	$sql_a5 = "select  *  from 102allowance5 where account like '".$row[0]."';";
	$result_a5 = mysql_query($sql_a5);
	while($row_a5 = mysql_fetch_row($result_a5)){
		$a5_010 = $row_a5[10];	//學校申請總額
		$a5_011 = $row_a5[11];	//學校申請經常門
		$a5_012 = $row_a5[12];	//學校申請資本門
		$a5_013 = $row_a5[13];	//
		$a5_014 = $row_a5[14];	//
		$a5_015 = $row_a5[15];	//
		$a5_016 = $row_a5[16];	//
		$a5_017 = $row_a5[17];	//
		$a5_018 = $row_a5[18];	//
		$a5_019 = $row_a5[19];	//
		$a5_020 = $row_a5[20];	//
		$a5_021 = $row_a5[21];	//
		$a5_022 = $row_a5[22];	//
		$a5_023 = $row_a5[23];	//
		$a5_024 = $row_a5[24];	//
		$a5_025 = $row_a5[25];	//
		$a5_026 = $row_a5[26];	//
		$a5_027 = $row_a5[27];	//
		$a5_028 = $row_a5[28];	//
		$a5_029 = $row_a5[29];	//
		
		$a5_130 = $row_a5[130]; //初審狀態
		$a5_131 = $row_a5[131]; //初審意見
		$a5_132 = $row_a5[132];	//初審總額
		$a5_133 = $row_a5[133];	//
		$a5_134 = $row_a5[134];	//
		$a5_135 = $row_a5[135];	//
		$a5_136 = $row_a5[136]; //
		$a5_137 = $row_a5[137]; //
		$a5_138 = $row_a5[138]; //
		$a5_139 = $row_a5[139]; //
		$a5_140 = $row_a5[140]; //
		
		$a5_190 = $row_a5[190]; //複審狀態
		$a5_191 = $row_a5[191]; //複審意見
		$a5_192 = $row_a5[192]; //複審總額
		$a5_193 = $row_a5[193]; //
		$a5_194 = $row_a5[194]; //
		$a5_195 = $row_a5[195]; //
		$a5_196 = $row_a5[196]; //
		$a5_197 = $row_a5[197]; //
		$a5_198 = $row_a5[198]; //
		$a5_199 = $row_a5[199]; //
		$a5_200 = $row_a5[200]; //
	}
	//讀取補六審核資料
	$sql_a6 = "select  *  from 102allowance6 where account like '".$row[0]."';";
	$result_a6 = mysql_query($sql_a6);
	while($row_a6 = mysql_fetch_row($result_a6)){
		$a6_010 = $row_a6[10];	//學校申請總額
		$a6_011 = $row_a6[11];	//學校申請經常門
		$a6_012 = $row_a6[12];	//學校申請資本門
		$a6_013 = $row_a6[13];	//
		$a6_014 = $row_a6[14];	//
		$a6_015 = $row_a6[15];	//
		$a6_016 = $row_a6[16];	//
		$a6_017 = $row_a6[17];	//人座
		$a6_018 = $row_a6[18];	//
		$a6_019 = $row_a6[19];	//
		$a6_020 = $row_a6[20];	//
		$a6_021 = $row_a6[21];	//
		$a6_022 = $row_a6[22];	//
		$a6_023 = $row_a6[23];	//
		$a6_024 = $row_a6[24];	//
		$a6_025 = $row_a6[25];	//
		$a6_026 = $row_a6[26];	//
		$a6_027 = $row_a6[27];	//
		$a6_028 = $row_a6[28];	//
		$a6_029 = $row_a6[29];	//
		
		$a6_130 = $row_a6[130]; //初審狀態
		$a6_131 = $row_a6[131]; //初審意見
		$a6_132 = $row_a6[132];	//初審總額
		$a6_133 = $row_a6[133];	//
		$a6_134 = $row_a6[134];	//
		$a6_135 = $row_a6[135];	//
		$a6_136 = $row_a6[136]; //
		$a6_137 = $row_a6[137]; //
		$a6_138 = $row_a6[138]; //
		$a6_139 = $row_a6[139]; //
		$a6_140 = $row_a6[140]; //
		
		$a6_190 = $row_a6[190]; //複審狀態
		$a6_191 = $row_a6[191]; //複審意見
		$a6_192 = $row_a6[192]; //複審總額
		$a6_193 = $row_a6[193]; //
		$a6_194 = $row_a6[194]; //
		$a6_195 = $row_a6[195]; //
		$a6_196 = $row_a6[196]; //
		$a6_197 = $row_a6[197]; //
		$a6_198 = $row_a6[198]; //
		$a6_199 = $row_a6[199]; //
		$a6_200 = $row_a6[200]; //
	}
	//讀取補七審核資料
	$sql_a7 = "select  *  from 102allowance7 where account like '".$row[0]."';";
	$result_a7 = mysql_query($sql_a7);
	while($row_a7 = mysql_fetch_row($result_a7)){
		$a7_010 = $row_a7[10];	//學校申請總額
		$a7_011 = $row_a7[11];	//學校申請經常門
		$a7_012 = $row_a7[12];	//學校申請資本門
		$a7_013 = $row_a7[13];	//
		$a7_014 = $row_a7[14];	//
		$a7_015 = $row_a7[15];	//
		$a7_016 = $row_a7[16];	//
		$a7_017 = $row_a7[17];	//
		$a7_018 = $row_a7[18];	//
		$a7_019 = $row_a7[19];	//
		$a7_020 = $row_a7[20];	//
		$a7_021 = $row_a7[21];	//
		$a7_022 = $row_a7[22];	//
		$a7_023 = $row_a7[23];	//
		$a7_024 = $row_a7[24];	//
		$a7_025 = $row_a7[25];	//
		$a7_026 = $row_a7[26];	//
		$a7_027 = $row_a7[27];	//
		$a7_028 = $row_a7[28];	//
		$a7_029 = $row_a7[29];	//
		
		$a7_130 = $row_a7[130]; //初審狀態
		$a7_131 = $row_a7[131]; //初審意見
		$a7_132 = $row_a7[132];	//初審總額
		$a7_133 = $row_a7[133];	//
		$a7_134 = $row_a7[134];	//
		$a7_135 = $row_a7[135];	//
		$a7_136 = $row_a7[136]; //
		$a7_137 = $row_a7[137]; //
		$a7_138 = $row_a7[138]; //
		$a7_139 = $row_a7[139]; //
		$a7_140 = $row_a7[140]; //
		
		$a7_190 = $row_a7[190]; //複審狀態
		$a7_191 = $row_a7[191]; //複審意見
		$a7_192 = $row_a7[192]; //複審總額
		$a7_193 = $row_a7[193]; //
		$a7_194 = $row_a7[194]; //
		$a7_195 = $row_a7[195]; //
		$a7_196 = $row_a7[196]; //
		$a7_197 = $row_a7[197]; //
		$a7_198 = $row_a7[198]; //
		$a7_199 = $row_a7[199]; //
		$a7_200 = $row_a7[200]; //
	}
	
	$total = $a1_192+$a2_192+$a3_192+$a4_192+$a5_192+$a6_192+$a7_192;

	$count_total += $total;
	
	if($a1_192 > 0)
	{
		$count_school_a1++; //計算校數
		$count_times_a1 += $a1_196; //計算場次(親職教育才有)
		$count_money_a1 += $a1_192; //計算複審金額
	}
	if($a2_192 > 0)
	{
		$count_school_a2++; //計算校數
		$count_times_a2 += $a2_019; //計算申請幾項
		$count_money_a2 += $a2_192; //計算複審金額
	}
	if($a3_192 > 0)
	{
		$count_school_a3++; //計算校數
		
		//計算幾項(學生&教師宿舍經常門>0算一項)
		if($a3_196 > 0) //教師經常門金額
			$count_times_a3++;
			
		if($a3_199 > 0) //學生經常門金額
			$count_times_a3++;
		
		$count_money_a3 += $a3_192; //計算複審金額
	}
	if($a4_192 > 0)
	{
		$count_school_a4++; //計算校數
		$count_times_a4++; //計算幾項
		$count_money_a4 += $a4_192; //計算複審金額
	}
	if($a5_192 > 0)
	{
		$count_school_a5++; //計算校數
		$count_times_a5++; //計算幾項
		$count_money_a5 += $a5_192; //計算複審金額
	}
	if($a6_192 > 0)
	{
		$count_school_a6++; //計算校數
		$count_times_a6 += $a6_017; //計算幾項(購置交通車的「人座」欄位相加)
		$count_money_a6 += $a6_192; //計算複審金額
	}
	if($a7_192 > 0)
	{
		$count_school_a7++; //計算校數
		$count_times_a7 = 0; //補助7不需計算
		$count_money_a7 += $a7_192; //計算複審金額
	}
		
}
?>
<table border="1" cellpadding="0" cellspacing="0">
	<tr>
		<td nowrap="nowrap" align="center" width="450px">補助項目</td>
		<td nowrap="nowrap" align="center" width="100px">校次/人次</td>
		<td nowrap="nowrap" align="center" width="150px">數量</td>
		<td bgcolor="#FFFFCC" nowrap="nowrap" align="center" width="180px">補助經費</td>
	</tr>
	<tr>
		<td nowrap="nowrap" align="left">1.推展親職教育活動</td>
		<td nowrap="nowrap" align="center"><?=$count_school_a1;?>校</td>
		<td nowrap="nowrap" align="center"><?=$count_times_a1;?>場</td>
		<td bgcolor="#FFFFCC" nowrap="nowrap" align="right"><?=number_format($count_money_a1);?>元</td>
	</tr>
	<tr>
		<td nowrap="nowrap" align="left">2.補助學校發展教育特色</td>
		<td nowrap="nowrap" align="center"><?=$count_school_a2;?>校</td>
		<td nowrap="nowrap" align="center"><?=$count_times_a2;?>項</td>
		<td bgcolor="#FFFFCC" nowrap="nowrap" align="right"><?=number_format($count_money_a2);?>元</td>
	</tr>
	<tr>
		<td nowrap="nowrap" align="left">3.修繕離島或偏遠地區師生宿舍</td>
		<td nowrap="nowrap" align="center"><?=$count_school_a3;?>校</td>
		<td nowrap="nowrap" align="center"><?=$count_times_a3;?>項</td>
		<td bgcolor="#FFFFCC" nowrap="nowrap" align="right"><?=number_format($count_money_a3);?>元</td>
	</tr>
	<tr>
		<td nowrap="nowrap" align="left">4.充實學校基本教學設備</td>
		<td nowrap="nowrap" align="center"><?=$count_school_a4;?>校</td>
		<td nowrap="nowrap" align="center"><?=$count_times_a4;?>項</td>
		<td bgcolor="#FFFFCC" nowrap="nowrap" align="right"><?=number_format($count_money_a4);?>元</td>
	</tr>
	<tr>
		<td nowrap="nowrap" align="left">5.發展原住民教育文化特色及充實設備器材</td>
		<td nowrap="nowrap" align="center"><?=$count_school_a5;?>校</td>
		<td nowrap="nowrap" align="center"><?=$count_times_a5;?>項</td>
		<td bgcolor="#FFFFCC" nowrap="nowrap" align="right"><?=number_format($count_money_a5);?>元</td>
	</tr>
	<tr>
		<td nowrap="nowrap" align="left">6.補助交通不便地區學校交通車</td>
		<td nowrap="nowrap" align="center"><?=$count_school_a6;?>校</td>
		<td nowrap="nowrap" align="center"><?=$count_times_a6;?>座</td>
		<td bgcolor="#FFFFCC" nowrap="nowrap" align="right"><?=number_format($count_money_a6);?>元</td>
	</tr>
	<tr>
		<td nowrap="nowrap" align="left">7.整修學校社區化活動場所</td>
		<td nowrap="nowrap" align="center"><?=$count_school_a7;?>校</td>
		<td nowrap="nowrap" align="center">-</td>
		<td bgcolor="#FFFFCC" nowrap="nowrap" align="right"><?=number_format($count_money_a7);?>元</td>
	</tr>
	<tr>
		<td nowrap="nowrap" align="left"> </td>
		<td nowrap="nowrap" align="center"> </td>
		<td nowrap="nowrap" align="center"> </td>
		<td bgcolor="#FFFFCC" nowrap="nowrap" align="right"><?=number_format($count_total);?>元</td>
	</tr>
</table>
</div>
<br>
※若要進行文書格式編修，建議複製到Excel編輯。<br>
※操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)
