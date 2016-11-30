<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
$username = $xoopsUser->getVar('uname');
global $xoopsDB;
$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
$result_city = $xoopsDB -> query($sql) or die($sql);
while($row = mysql_fetch_row($result_city)) {
	$city = $row[1];
	$cityman = $row[2];
	$cityno = $row[4];
}
echo $username."--";
echo $city."--";
echo $cityman." ";
$serial = 0;
?>

<?
if ($cityname == "全國"){
$sql_school = "SELECT * from 100school_effect order by type;"; //搜尋全部學校
}else{  
$sql_school = "SELECT * from 100school_effect where city like '$city' order by type;"; //搜尋縣市相符學校
}
$result_school = mysql_query($sql_school);
while($row = mysql_fetch_row($result_school)){
	$school = $row[0];
	$schoolname = $row[2].$row[3].$row[4];
	//$serial++;
	//echo $serial.'<br>';
	//echo $school." ".$schoolname;
	//學校填報金額
	$ef_a1 = $row[11];
	$ef_a2 = $row[26];
	$ef_a3 = $row[41];
	$ef_a4 = $row[56];
	$ef_a5 = $row[71];
	$ef_a6 = $row[86];
	$ef_a7 = $row[101];
	$ef_a8 = $row[116];
	$ef_total = $ef_a1 + $ef_a2 + $ef_a3 + $ef_a4 + $ef_a5 + $ef_a6 + $ef_a7 + $ef_a8; //該校填報各補助項目合計
	$all_ef_a1 = $all_ef_a1 + $ef_al; //列表補助項目總和
	$all_ef_a2 = $all_ef_a2 + $ef_a2;
	$all_ef_a3 = $all_ef_a3 + $ef_a3;
	$all_ef_a4 = $all_ef_a4 + $ef_a4;
	$all_ef_a5 = $all_ef_a5 + $ef_a5;
	$all_ef_a6 = $all_ef_a6 + $ef_a6;
	$all_ef_a7 = $all_ef_a7 + $ef_a7;
	$all_ef_a8 = $all_ef_a8 + $ef_a8;
	$all_ef_total = $all_ef_total + $ef_total; //列表各補助項目總合

	//填報_各補助項目數據
	//補一
	if( $row[13] > 0) {$e1_1_1 = 1;}else{$e1_1_1 = 0;} //親職活動校數
	$e1_1_2 = $row[12];
	$e1_1_3 = $row[13];
	if( $row[17] > 0) {$e1_2_1 = 1;}else{$e1_2_1 = 0;} //家庭訪視校數
	$e1_2_2 = $row[16];
	$e1_2_3 = $row[17];
	//補二
	if( $row[29] > 0) {$e2_1_1 = 1;}else{$e2_1_1 = 0;} //課後輔導校數
	$e2_1_2 = $row[28];
	$e2_1_3 = $row[29];
	if( $row[32] > 0) {$e2_2_1 = 1;}else{$e2_2_1 = 0;} //寒暑輔導校數
	$e2_2_2 = $row[31];
	$e2_2_3 = $row[32];
	if( $row[35] > 0) {$e2_3_1 = 1;}else{$e2_3_1 = 0;} //夜間輔導校數
	$e2_3_2 = $row[34];
	$e2_3_3 = $row[35];
	//補三
	if( $row[42] > 0) {$e3_1_1 = 1;}else{$e3_1_1 = 0;} //經常門校數
	if( $row[50] > 0) {$e3_1_2 = 2;}elseif( $row[45] > 0){$e3_1_2 = 1;}else{$e3_1_2 = 0;}
	$e3_1_3 = $row[42];
	if( $row[43] > 0) {$e3_2_1 = 1;}else{$e3_2_1 = 0;}//資本門校數
	if( $row[51] > 0) {$e3_2_2 = 2;}elseif( $row[46] > 0){$e3_2_2 = 1;}else{$e3_2_2 = 0;}
	$e3_2_3 = $row[43];
	//補四
	if( $row[62] > 0) {$e4_1_1 = 1;}else{$e4_1_1 = 0;} //教師經常門校數
	$e4_1_2 = $row[61];
	$e4_1_3 = $row[62];
	if( $row[64] > 0) {$e4_2_1 = 1;}else{$e4_2_1 = 0;} //教師資本門校數
	$e4_2_2 = $row[63];
	$e4_2_3 = $row[64];
	if( $row[66] > 0) {$e4_3_1 = 1;}else{$e4_3_1 = 0;} //學生經常門校數
	$e4_3_2 = $row[65];
	$e4_3_3 = $row[66];
	if( $row[68] > 0) {$e4_4_1 = 1;}else{$e4_4_1 = 0;} //學生資本門校數
	$e4_4_2 = $row[67];
	$e4_4_3 = $row[68];
	//補五
	if( $row[71] > 0) {$e5_1_1 = 1;}else{$e5_1_1 = 0;} //充實教學設備校數
	$e5_1_2 = $e5_1_1;
	$e5_1_3 = $row[71];
	//補六
	if( $row[87] > 0) {$e6_1_1 = 1;}else{$e6_1_1 = 0;} //原民教育特色經常門
	$e6_1_2 = $row[89];
	$e6_1_3 = $row[87];
	if( $row[88] > 0) {$e6_2_1 = 1;}else{$e6_2_1 = 0;} //原民教育特色資本門
	$e6_2_2 = $row[89];
	$e6_2_3 = $row[88];
	//補七
	if( $row[104] > 0) {$e7_1_1 = 1;}else{$e7_1_1 = 0;} //補助租車費
	$e7_1_2 = $row[103];
	$e7_1_3 = $row[104];
	if( $row[106] > 0) {$e7_2_1 = 1;}else{$e7_2_1 = 0;} //補助交通費
	$e7_2_2 = $row[105];
	$e7_2_3 = $row[106];
	if( $row[109] > 0) {$e7_3_1 = 1;}else{$e7_3_1 = 0;} //補助購買交通費
	$e7_3_2 = $row[108];
	$e7_3_3 = $row[109];
	//補八
	if( $row[118] > 0) {$e8_1_1 = 1;}else{$e8_1_1 = 0;} //綜合球場經常門
	$e8_1_2 = $row[117];
	$e8_1_3 = $row[118];
	if( $row[120] > 0) {$e8_2_1 = 1;}else{$e8_2_1 = 0;} //綜合球場資本門
	$e8_2_2 = $row[119];
	$e8_2_3 = $row[120];

	//各欄位累計
	$all_e1_1_1 = $all_e1_1_1 + $e1_1_1;
	$all_e1_1_2 = $all_e1_1_2 + $e1_1_2;
	$all_e1_1_3 = $all_e1_1_3 + $e1_1_3;
	$all_e1_2_1 = $all_e1_2_1 + $e1_2_1;
	$all_e1_2_2 = $all_e1_2_2 + $e1_2_2;
	$all_e1_2_3 = $all_e1_2_3 + $e1_2_3;
	
	$all_e2_1_1 = $all_e2_1_1 + $e2_1_1;
	$all_e2_1_2 = $all_e2_1_2 + $e2_1_2;
	$all_e2_1_3 = $all_e2_1_3 + $e2_1_3;
	$all_e2_2_1 = $all_e2_2_1 + $e2_2_1;
	$all_e2_2_2 = $all_e2_2_2 + $e2_2_2;
	$all_e2_2_3 = $all_e2_2_3 + $e2_2_3;
	$all_e2_3_1 = $all_e2_3_1 + $e2_3_1;
	$all_e2_3_2 = $all_e2_3_2 + $e2_3_2;
	$all_e2_3_3 = $all_e2_3_3 + $e2_3_3;
	
	$all_e3_1_1 = $all_e3_1_1 + $e3_1_1;
	$all_e3_1_2 = $all_e3_1_2 + $e3_1_2;
	$all_e3_1_3 = $all_e3_1_3 + $e3_1_3;
	$all_e3_2_1 = $all_e3_2_1 + $e3_2_1;
	$all_e3_2_2 = $all_e3_2_2 + $e3_2_2;
	$all_e3_2_3 = $all_e3_2_3 + $e3_2_3;
	
	$all_e4_1_1 = $all_e4_1_1 + $e4_1_1;
	$all_e4_1_2 = $all_e4_1_2 + $e4_1_2;
	$all_e4_1_3 = $all_e4_1_3 + $e4_1_3;
	$all_e4_2_1 = $all_e4_2_1 + $e4_2_1;
	$all_e4_2_2 = $all_e4_2_2 + $e4_2_2;
	$all_e4_2_3 = $all_e4_2_3 + $e4_2_3;
	$all_e4_3_1 = $all_e4_3_1 + $e4_3_1;
	$all_e4_3_2 = $all_e4_3_2 + $e4_3_2;
	$all_e4_3_3 = $all_e4_3_3 + $e4_3_3;
	$all_e4_4_1 = $all_e4_4_1 + $e4_4_1;
	$all_e4_4_2 = $all_e4_4_2 + $e4_4_2;
	$all_e4_4_3 = $all_e4_4_3 + $e4_4_3;
	
	$all_e5_1_1 = $all_e5_1_1 + $e5_1_1;
	$all_e5_1_2 = $all_e5_1_2 + $e5_1_2;
	$all_e5_1_3 = $all_e5_1_3 + $e5_1_3;
	
	$all_e6_1_1 = $all_e6_1_1 + $e6_1_1;
	$all_e6_1_2 = $all_e6_1_2 + $e6_1_2;
	$all_e6_1_3 = $all_e6_1_3 + $e6_1_3;
	$all_e6_2_1 = $all_e6_2_1 + $e6_2_1;
	$all_e6_2_2 = $all_e6_2_2 + $e6_2_2;
	$all_e6_2_3 = $all_e6_2_3 + $e6_2_3;
	
	$all_e7_1_1 = $all_e7_1_1 + $e7_1_1;
	$all_e7_1_2 = $all_e7_1_2 + $e7_1_2;
	$all_e7_1_3 = $all_e7_1_3 + $e7_1_3;
	$all_e7_2_1 = $all_e7_2_1 + $e7_2_1;
	$all_e7_2_2 = $all_e7_2_2 + $e7_2_2;
	$all_e7_2_3 = $all_e7_2_3 + $e7_2_3;
	$all_e7_3_1 = $all_e7_3_1 + $e7_3_1;
	$all_e7_3_2 = $all_e7_3_2 + $e7_3_2;
	$all_e7_3_3 = $all_e7_3_3 + $e7_3_3;
	
	$all_e8_1_1 = $all_e8_1_1 + $e8_1_1;
	$all_e8_1_2 = $all_e8_1_2 + $e8_1_2;
	$all_e8_1_3 = $all_e8_1_3 + $e8_1_3;
	$all_e8_2_1 = $all_e8_2_1 + $e8_2_1;
	$all_e8_2_2 = $all_e8_2_2 + $e8_2_2;
	$all_e8_2_3 = $all_e8_2_3 + $e8_2_3;
	
	
	//教育部核定金額
	$sql_fn = "select  *  from 100school_final where account like '$school'";
	$result_fn = mysql_query($sql_fn);
	while($row_fn = mysql_fetch_row($result_fn)){
		//$serial++;
		//echo $serial.'<br>';
		$last = $row[7]; //最後更新時間
		$fn_a1 = $row_fn[15];
		$fn_a2 = $row_fn[25];
		$fn_a3 = $row_fn[28];
		$fn_a4 = $row_fn[39];
		$fn_a5 = $row_fn[42];
		$fn_a6 = $row_fn[47];
		$fn_a7 = $row_fn[54];
		$fn_a8 = $row_fn[67];
		$fn_total = $fn_a1 + $fn_a2 + $fn_a3 + $fn_a4 + $fn_a5 + $fn_a6 + $fn_a7 + $fn_a8; //該校核定各補助項目總合
		$all_fn_a1 = $all_fn_a1 + $fn_al;
		$all_fn_a2 = $all_fn_a2 + $fn_a2;
		$all_fn_a3 = $all_fn_a3 + $fn_a3;
		$all_fn_a4 = $all_fn_a4 + $fn_a4;
		$all_fn_a5 = $all_fn_a5 + $fn_a5;
		$all_fn_a6 = $all_fn_a6 + $fn_a6;
		$all_fn_a7 = $all_fn_a7 + $fn_a7;
		$all_fn_a8 = $all_fn_a8 + $fn_a8;
		$all_fn_total = $all_fn_total + $fn_total;
		
		//核定_各補助項目數據
		//補一
		if( $row_fn[12] > 0) {$a1_1_1 = 1;}else{$a1_1_1 = 0;} //親職活動校數
		$a1_1_2 = $row_fn[11];
		$a1_1_3 = $row_fn[12];
		if( $row_fn[14] > 0) {$a1_2_1 = 1;}else{$a1_2_1 = 0;} //家庭訪視校數
		$a1_2_2 = $row_fn[13];
		$a1_2_3 = $row_fn[14];
		//補二
		if( $row_fn[18] > 0) {$a2_1_1 = 1;}else{$a2_1_1 = 0;} //課後輔導校數
		$a2_1_2 = $row_fn[17];
		$a2_1_3 = $row_fn[18];
		if( $row_fn[21] > 0) {$a2_2_1 = 1;}else{$a2_2_1 = 0;} //寒暑輔導校數
		$a2_2_2 = $row_fn[20];
		$a2_2_3 = $row_fn[21];
		if( $row_fn[24] > 0) {$a2_3_1 = 1;}else{$a2_3_1 = 0;} //夜間輔導校數
		$a2_3_2 = $row_fn[23];
		$a2_3_3 = $row_fn[24];
		//補三
		if( $row_fn[26] > 0) {$a3_1_1 = 1;}else{$a3_1_1 = 0;} //經常門校數
		$a3_1_2 = $a3_1_1;
		$a3_1_3 = $row_fn[26];
		if( $row_fn[27] > 0) {$a3_2_1 = 1;}else{$a3_2_1 = 0;}
		$a3_2_2 = $a3_2_1 = 0;
		$a3_2_3 = $row_fn[27];
		//補四
		if( $row_fn[30] > 0) {$a4_1_1 = 1;}else{$a4_1_1 = 0;} //教師經常門校數
		$a4_1_2 = $row_fn[29];
		$a4_1_3 = $row_fn[30];
		if( $row_fn[32] > 0) {$a4_2_1 = 1;}else{$a4_2_1 = 0;} //教師資本門校數
		$a4_2_2 = $row_fn[31];
		$a4_2_3 = $row_fn[32];
		if( $row_fn[35] > 0) {$a4_3_1 = 1;}else{$a4_3_1 = 0;} //學生經常門校數
		$a4_3_2 = $row_fn[34];
		$a4_3_3 = $row_fn[35];
		if( $row_fn[37] > 0) {$a4_4_1 = 1;}else{$a4_4_1 = 0;} //學生資本門校數
		$a4_4_2 = $row_fn[36];
		$a4_4_3 = $row_fn[37];
		//補五
		if( $row_fn[42] > 0) {$a5_1_1 = 1;}else{$a5_1_1 = 0;} //充實教學設備校數
		$a5_1_2 = $a5_1_1;
		$a5_1_3 = $row_fn[42];
		//補六
		if( $row_fn[44] > 0) {$a6_1_1 = 1;}else{$a6_1_1 = 0;} //原民教育特色經常門
		$a6_1_2 = $row_fn[43];
		$a6_1_3 = $row_fn[44];
		if( $row_fn[46] > 0) {$a6_2_1 = 1;}else{$a6_2_1 = 0;} //原民教育特色資本門
		$a6_2_2 = $row_fn[45];
		$a6_2_3 = $row_fn[46];
		//補七
		if( $row_fn[49] > 0) {$a7_1_1 = 1;}else{$a7_1_1 = 0;} //補助租車費
		$a7_1_2 = $row_fn[48];
		$a7_1_3 = $row_fn[49];
		if( $row_fn[51] > 0) {$a7_2_1 = 1;}else{$a7_2_1 = 0;} //補助交通費
		$a7_2_2 = $row_fn[50];
		$a7_2_3 = $row_fn[51];
		if( $row_fn[53] > 0) {$a7_3_1 = 1;}else{$a7_3_1 = 0;} //補助購買交通費
		$a7_3_2 = $row_fn[52];
		$a7_3_3 = $row_fn[53];
		//補八
		if( $row_fn[56] > 0) {$a8_1_1 = 1;}else{$a8_1_1 = 0;} //綜合球場經常門
		$a8_1_2 = $row_fn[55];
		$a8_1_3 = $row_fn[56];
		if( $row_fn[58] > 0) {$a8_2_1 = 1;}else{$a8_2_1 = 0;} //綜合球場資本門
		$a8_2_2 = $row_fn[57];
		$a8_2_3 = $row_fn[58];

	//各欄位累計
		$all_a1_1_1 = $all_a1_1_1 + $a1_1_1;
		$all_a1_1_2 = $all_a1_1_2 + $a1_1_2;
		$all_a1_1_3 = $all_a1_1_3 + $a1_1_3;
		$all_a1_2_1 = $all_a1_2_1 + $a1_2_1;
		$all_a1_2_2 = $all_a1_2_2 + $a1_2_2;
		$all_a1_2_3 = $all_a1_2_3 + $a1_2_3;
	
		$all_a2_1_1 = $all_a2_1_1 + $a2_1_1;
		$all_a2_1_2 = $all_a2_1_2 + $a2_1_2;
		$all_a2_1_3 = $all_a2_1_3 + $a2_1_3;
		$all_a2_2_1 = $all_a2_2_1 + $a2_2_1;
		$all_a2_2_2 = $all_a2_2_2 + $a2_2_2;
		$all_a2_2_3 = $all_a2_2_3 + $a2_2_3;
		$all_a2_3_1 = $all_a2_3_1 + $a2_3_1;
		$all_a2_3_2 = $all_a2_3_2 + $a2_3_2;
		$all_a2_3_3 = $all_a2_3_3 + $a2_3_3;
	
		$all_a3_1_1 = $all_a3_1_1 + $a3_1_1;
		$all_a3_1_2 = $all_a3_1_2 + $a3_1_2;
		$all_a3_1_3 = $all_a3_1_3 + $a3_1_3;
		$all_a3_2_1 = $all_a3_2_1 + $a3_2_1;
		$all_a3_2_2 = $all_a3_2_2 + $a3_2_2;
		$all_a3_2_3 = $all_a3_2_3 + $a3_2_3;
	
		$all_a4_1_1 = $all_a4_1_1 + $a4_1_1;
		$all_a4_1_2 = $all_a4_1_2 + $a4_1_2;
		$all_a4_1_3 = $all_a4_1_3 + $a4_1_3;
		$all_a4_2_1 = $all_a4_2_1 + $a4_2_1;
		$all_a4_2_2 = $all_a4_2_2 + $a4_2_2;
		$all_a4_2_3 = $all_a4_2_3 + $a4_2_3;
		$all_a4_3_1 = $all_a4_3_1 + $a4_3_1;
		$all_a4_3_2 = $all_a4_3_2 + $a4_3_2;
		$all_a4_3_3 = $all_a4_3_3 + $a4_3_3;
		$all_a4_4_1 = $all_a4_4_1 + $a4_4_1;
		$all_a4_4_2 = $all_a4_4_2 + $a4_4_2;
		$all_a4_4_3 = $all_a4_4_3 + $a4_4_3;
	
		$all_a5_1_1 = $all_a5_1_1 + $a5_1_1;
		$all_a5_1_2 = $all_a5_1_2 + $a5_1_2;
		$all_a5_1_3 = $all_a5_1_3 + $a5_1_3;
	
		$all_a6_1_1 = $all_a6_1_1 + $a6_1_1;
		$all_a6_1_2 = $all_a6_1_2 + $a6_1_2;
		$all_a6_1_3 = $all_a6_1_3 + $a6_1_3;
		$all_a6_2_1 = $all_a6_2_1 + $a6_2_1;
		$all_a6_2_2 = $all_a6_2_2 + $a6_2_2;
		$all_a6_2_3 = $all_a6_2_3 + $a6_2_3;
	
		$all_a7_1_1 = $all_a7_1_1 + $a7_1_1;
		$all_a7_1_2 = $all_a7_1_2 + $a7_1_2;
		$all_a7_1_3 = $all_a7_1_3 + $a7_1_3;
		$all_a7_2_1 = $all_a7_2_1 + $a7_2_1;
		$all_a7_2_2 = $all_a7_2_2 + $a7_2_2;
		$all_a7_2_3 = $all_a7_2_3 + $a7_2_3;
		$all_a7_3_1 = $all_a7_3_1 + $a7_3_1;
		$all_a7_3_2 = $all_a7_3_2 + $a7_3_2;
		$all_a7_3_3 = $all_a7_3_3 + $a7_3_3;
	
		$all_a8_1_1 = $all_a8_1_1 + $a8_1_1;
		$all_a8_1_2 = $all_a8_1_2 + $a8_1_2;
		$all_a8_1_3 = $all_a8_1_3 + $a8_1_3;
		$all_a8_2_1 = $all_a8_2_1 + $a8_2_1;
		$all_a8_2_2 = $all_a8_2_2 + $a8_2_2;
		$all_a8_2_3 = $all_a8_2_3 + $a8_2_3;

	}
}

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td height="50" colspan="13" align="center"><strong><font color=blue><? echo $city;?>政府 執行教育部100年度推動教育優先區計畫成果一覽表</font></strong></td>
  </tr>
  <tr>
    <td rowspan="2" align="center">項次</td>
    <td colspan="3" rowspan="2" align="center">補助項目</td>
    <td colspan="3" align="center">教育部核定數量及金額</td>
    <td colspan="3" align="center">全縣國中小執行成果</td>
    <td colspan="3" align="center">執行成效百分比 (%)</td>
  </tr>
  <tr>
    <td align="center">校數</td>
    <td align="center">數量</td>
    <td align="center">金額 (元)</td>
    <td align="center">校數</td>
    <td align="center">數量</td>
    <td align="center">金額 (元)</td>
    <td align="center">校數</td>
    <td align="center">數量</td>
    <td align="center">金額</td>
  </tr>
  <tr>
    <td rowspan="2" align="center">一</td>
    <td rowspan="2">推展親職教育活動</td>
    <td colspan="2">親職教育活動(場)</td>
    <td height="30" align="right"><? echo number_format($all_a1_1_1); ?></td>
    <td align="right"><? echo number_format($all_a1_1_2); ?></td>
    <td align="right"><? echo number_format($all_a1_1_3); ?></td>
    <td align="right"><? echo number_format($all_e1_1_1); ?></td>
    <td align="right"><? echo number_format($all_e1_1_2); ?></td>
    <td align="right"><? echo number_format($all_e1_1_3); ?></td>
    <td align="right"><? echo number_format($all_e1_1_1 / $all_a1_1_1 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e1_1_2 / $all_a1_1_2 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e1_1_3 / $all_a1_1_3 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td colspan="2">目標學生家庭訪視輔導(人)</td>
    <td height="30" align="right"><? echo number_format($all_a1_2_1); ?></td>
    <td align="right"><? echo number_format($all_a1_2_2); ?></td>
    <td align="right"><? echo number_format($all_a1_2_3); ?></td>
    <td align="right"><? echo number_format($all_e1_2_1); ?></td>
    <td align="right"><? echo number_format($all_e1_2_2); ?></td>
    <td align="right"><? echo number_format($all_e1_2_3); ?></td>
    <td align="right"><? echo number_format($all_e1_2_1 / $all_a1_2_1 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e1_2_2 / $all_a1_2_2 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e1_2_3 / $all_a1_2_3 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td rowspan="3" align="center">二</td>
    <td rowspan="3">原住民及離島地區學校辦理學習輔導</td>
    <td colspan="2">課後學習輔導(班)</td>
    <td height="30" align="right"><? echo number_format($all_a2_1_1); ?></td>
    <td align="right"><? echo number_format($all_a2_1_2); ?></td>
    <td align="right"><? echo number_format($all_a2_1_3); ?></td>
    <td align="right"><? echo number_format($all_e2_1_1); ?></td>
    <td align="right"><? echo number_format($all_e2_1_2); ?></td>
    <td align="right"><? echo number_format($all_e2_1_3); ?></td>
    <td align="right"><? echo number_format($all_e2_1_1 / $all_a2_1_1 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e2_1_2 / $all_a2_1_2 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e2_1_3 / $all_a2_1_3 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td colspan="2">寒暑假學習輔導(班)</td>
    <td height="30" align="right"><? echo number_format($all_a2_2_1); ?></td>
    <td align="right"><? echo number_format($all_a2_2_2); ?></td>
    <td align="right"><? echo number_format($all_a2_2_3); ?></td>
    <td align="right"><? echo number_format($all_e2_2_1); ?></td>
    <td align="right"><? echo number_format($all_e2_2_2); ?></td>
    <td align="right"><? echo number_format($all_e2_2_3); ?></td>
    <td align="right"><? echo number_format($all_e2_2_1 / $all_a2_2_1 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e2_2_2 / $all_a2_2_2 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e2_2_3 / $all_a2_2_3 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td colspan="2">住校生夜間學習輔導(班)</td>
    <td height="30" align="right"><? echo number_format($all_a2_3_1); ?></td>
    <td align="right"><? echo number_format($all_a2_3_2); ?></td>
    <td align="right"><? echo number_format($all_a2_3_3); ?></td>
    <td align="right"><? echo number_format($all_e2_3_1); ?></td>
    <td align="right"><? echo number_format($all_e2_3_2); ?></td>
    <td align="right"><? echo number_format($all_e2_3_3); ?></td>
    <td align="right"><? echo number_format($all_e2_3_1 / $all_a2_3_1 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e2_3_2 / $all_a2_3_2 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e2_3_3 / $all_a2_3_3 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td rowspan="2" align="center">三</td>
    <td colspan="2" rowspan="2">補助學校發展教育特色(項)</td>
    <td>其餘經費</td>
    <td height="30" align="right"><? echo number_format($all_a3_1_1); ?></td>
    <td align="right"><? echo number_format($all_a3_1_2); ?></td>
    <td align="right"><? echo number_format($all_a3_1_3); ?></td>
    <td align="right"><? echo number_format($all_e3_1_1); ?></td>
    <td align="right"><? echo number_format($all_e3_1_2); ?></td>
    <td align="right"><? echo number_format($all_e3_1_3); ?></td>
    <td align="right"><? echo number_format($all_e3_1_1 / $all_a3_1_1 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e3_1_2 / $all_a3_1_2 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e3_1_3 / $all_a3_1_3 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td>設備器材</td>
    <td height="30" align="right"><? echo number_format($all_a3_2_1); ?></td>
    <td align="right"><? echo number_format($all_a3_2_2); ?></td>
    <td align="right"><? echo number_format($all_a3_2_3); ?></td>
    <td align="right"><? echo number_format($all_e3_2_1); ?></td>
    <td align="right"><? echo number_format($all_e3_2_2); ?></td>
    <td align="right"><? echo number_format($all_e3_2_3); ?></td>
    <td align="right"><? echo number_format($all_e3_2_1 / $all_a3_2_1 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e3_2_2 / $all_a3_2_2 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e3_2_3 / $all_a3_2_3 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td width="35" rowspan="4" align="center">四</td>
    <td width="100" rowspan="4">修繕離島或偏遠地區師生宿舍</td>
    <td width="80" rowspan="2">教師宿舍</td>
    <td width="100">修繕(棟)</td>
    <td height="30" align="right"><? echo number_format($all_a4_1_1); ?></td>
    <td align="right"><? echo number_format($all_a4_1_2); ?></td>
    <td align="right"><? echo number_format($all_a4_1_3); ?></td>
    <td align="right"><? echo number_format($all_e4_1_1); ?></td>
    <td align="right"><? echo number_format($all_e4_1_2); ?></td>
    <td align="right"><? echo number_format($all_e4_1_3); ?></td>
    <td align="right"><? echo number_format($all_e4_1_1 / $all_a4_1_1 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e4_1_2 / $all_a4_1_2 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e4_1_3 / $all_a4_1_3 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td width="80">充實設備(式)</td>
    <td height="30" align="right"><? echo number_format($all_a4_2_1); ?></td>
    <td align="right"><? echo number_format($all_a4_2_2); ?></td>
    <td align="right"><? echo number_format($all_a4_2_3); ?></td>
    <td align="right"><? echo number_format($all_e4_2_1); ?></td>
    <td align="right"><? echo number_format($all_e4_2_2); ?></td>
    <td align="right"><? echo number_format($all_e4_2_3); ?></td>
    <td align="right"><? echo number_format($all_e4_2_1 / $all_a4_2_1 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e4_2_2 / $all_a4_2_2 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e4_2_3 / $all_a4_2_3 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td width="80" rowspan="2">學生宿舍</td>
    <td width="80">修繕(棟)</td>
    <td height="30" align="right"><? echo number_format($all_a4_3_1); ?></td>
    <td align="right"><? echo number_format($all_a4_3_2); ?></td>
    <td align="right"><? echo number_format($all_a4_3_3); ?></td>
    <td align="right"><? echo number_format($all_e4_3_1); ?></td>
    <td align="right"><? echo number_format($all_e4_3_2); ?></td>
    <td align="right"><? echo number_format($all_e4_3_3); ?></td>
    <td align="right"><? echo number_format($all_e4_3_1 / $all_a4_3_1 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e4_3_2 / $all_a4_3_2 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e4_3_3 / $all_a4_3_3 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td width="80">充實設備(式)</td>
    <td height="30" align="right"><? echo number_format($all_a4_4_1); ?></td>
    <td align="right"><? echo number_format($all_a4_4_2); ?></td>
    <td align="right"><? echo number_format($all_a4_4_3); ?></td>
    <td align="right"><? echo number_format($all_e4_4_1); ?></td>
    <td align="right"><? echo number_format($all_e4_4_2); ?></td>
    <td align="right"><? echo number_format($all_e4_4_3); ?></td>
    <td align="right"><? echo number_format($all_e4_4_1 / $all_a4_4_1 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e4_4_2 / $all_a4_4_2 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e4_4_3 / $all_a4_4_3 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td align="center">五</td>
    <td colspan="3">充實學校基本教學設備</td>
    <td height="30" align="right"><? echo number_format($all_a5_1_1); ?></td>
    <td align="right"><? echo number_format($all_a5_1_2); ?></td>
    <td align="right"><? echo number_format($all_a5_1_3); ?></td>
    <td align="right"><? echo number_format($all_e5_1_1); ?></td>
    <td align="right"><? echo number_format($all_e5_1_2); ?></td>
    <td align="right"><? echo number_format($all_e5_1_3); ?></td>
    <td align="right"><? echo number_format($all_e5_1_1 / $all_a5_1_1 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e5_1_2 / $all_a5_1_2 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e5_1_3 / $all_a5_1_3 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td rowspan="2" align="center">六</td>
    <td colspan="2" rowspan="2">發展原住民教育文化特色及充實設備器材</td>
    <td>其餘經費(項)</td>
    <td height="30" align="right"><? echo number_format($all_a6_1_1); ?></td>
    <td align="right"><? echo number_format($all_a6_1_2); ?></td>
    <td align="right"><? echo number_format($all_a6_1_3); ?></td>
    <td align="right"><? echo number_format($all_e6_1_1); ?></td>
    <td align="right"><? echo number_format($all_e6_1_2); ?></td>
    <td align="right"><? echo number_format($all_e6_1_3); ?></td>
    <td align="right"><? echo number_format($all_e6_1_1 / $all_a6_1_1 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e6_1_2 / $all_a6_1_2 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e6_1_3 / $all_a6_1_3 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td>設備器材(式)</td>
    <td height="30" align="right"><? echo number_format($all_a6_2_1); ?></td>
    <td align="right"><? echo number_format($all_a6_2_2); ?></td>
    <td align="right"><? echo number_format($all_a6_2_3); ?></td>
    <td align="right"><? echo number_format($all_e6_2_1); ?></td>
    <td align="right"><? echo number_format($all_e6_2_2); ?></td>
    <td align="right"><? echo number_format($all_e6_2_3); ?></td>
    <td align="right"><? echo number_format($all_e6_2_1 / $all_a6_2_1 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e6_2_2 / $all_a6_2_2 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e6_2_3 / $all_a6_2_3 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td rowspan="3" align="center">七</td>
    <td rowspan="3">補助交通不便地區學校交通車</td>
    <td colspan="2">補助租車費(輛)</td>
    <td height="30" align="right"><? echo number_format($all_a7_1_1); ?></td>
    <td align="right"><? echo number_format($all_a7_1_2); ?></td>
    <td align="right"><? echo number_format($all_a7_1_3); ?></td>
    <td align="right"><? echo number_format($all_e7_1_1); ?></td>
    <td align="right"><? echo number_format($all_e7_1_2); ?></td>
    <td align="right"><? echo number_format($all_e7_1_3); ?></td>
    <td align="right"><? echo number_format($all_e7_1_1 / $all_a7_1_1 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e7_1_2 / $all_a7_1_2 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e7_1_3 / $all_a7_1_3 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td colspan="2">補助交通費(人)</td>
    <td height="30" align="right"><? echo number_format($all_a7_2_1); ?></td>
    <td align="right"><? echo number_format($all_a7_2_2); ?></td>
    <td align="right"><? echo number_format($all_a7_2_3); ?></td>
    <td align="right"><? echo number_format($all_e7_2_1); ?></td>
    <td align="right"><? echo number_format($all_e7_2_2); ?></td>
    <td align="right"><? echo number_format($all_e7_2_3); ?></td>
    <td align="right"><? echo number_format($all_e7_2_1 / $all_a7_2_1 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e7_2_2 / $all_a7_2_2 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e7_2_3 / $all_a7_2_3 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td colspan="2">補助購買交通車(輛)</td>
    <td height="30" align="right"><? echo number_format($all_a7_3_1); ?></td>
    <td align="right"><? echo number_format($all_a7_3_2); ?></td>
    <td align="right"><? echo number_format($all_a7_3_3); ?></td>
    <td align="right"><? echo number_format($all_e7_3_1); ?></td>
    <td align="right"><? echo number_format($all_e7_3_2); ?></td>
    <td align="right"><? echo number_format($all_e7_3_3); ?></td>
    <td align="right"><? echo number_format($all_e7_3_1 / $all_a7_3_1 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e7_3_2 / $all_a7_3_2 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e7_3_3 / $all_a7_3_3 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td rowspan="6" align="center">八</td>
    <td rowspan="6">整修學校社區化活動場所</td>
    <td rowspan="2">綜合球場</td>
    <td>修建(座)</td>
    <td height="30" align="right"><? echo number_format($all_a8_1_1); ?></td>
    <td align="right"><? echo number_format($all_a8_1_2); ?></td>
    <td align="right"><? echo number_format($all_a8_1_3); ?></td>
    <td align="right"><? echo number_format($all_e8_1_1); ?></td>
    <td align="right"><? echo number_format($all_e8_1_2); ?></td>
    <td align="right"><? echo number_format($all_e8_1_3); ?></td>
    <td align="right"><? echo number_format($all_e8_1_1 / $all_a8_1_1 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e8_1_2 / $all_a8_1_2 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e8_1_3 / $all_a8_1_3 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td>設備器材(式)</td>
    <td height="30" align="right"><? echo number_format($all_a8_2_1); ?></td>
    <td align="right"><? echo number_format($all_a8_2_2); ?></td>
    <td align="right"><? echo number_format($all_a8_2_3); ?></td>
    <td align="right"><? echo number_format($all_e8_2_1); ?></td>
    <td align="right"><? echo number_format($all_e8_2_2); ?></td>
    <td align="right"><? echo number_format($all_e8_2_3); ?></td>
    <td align="right"><? echo number_format($all_e8_2_1 / $all_a8_2_1 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e8_2_2 / $all_a8_2_2 * 100,2).'%'; ?></td>
    <td align="right"><? echo number_format($all_e8_2_3 / $all_a8_2_3 * 100,2).'%'; ?></td>
  </tr>
  <tr>
    <td rowspan="2">風雨教室</td>
    <td>修建(棟)</td>
    <td height="30" align="right">0</td>
    <td align="right">0</td>
    <td align="right">0</td>
    <td align="right">0</td>
    <td align="right">0</td>
    <td align="right">0</td>
    <td align="right">0.00%</td>
    <td align="right">0.00%</td>
    <td align="right">0.00%</td>
  </tr>
  <tr>
    <td>設備器材(式)</td>
    <td height="30" align="right">0</td>
    <td align="right">0</td>
    <td align="right">0</td>
    <td align="right">0</td>
    <td align="right">0</td>
    <td align="right">0</td>
    <td align="right">0.00%</td>
    <td align="right">0.00%</td>
    <td align="right">0.00%</td>
  </tr>
  <tr>
    <td rowspan="2">運動場</td>
    <td>修建(座)</td>
    <td height="30" align="right">0</td>
    <td align="right">0</td>
    <td align="right">0</td>
    <td align="right">0</td>
    <td align="right">0</td>
    <td align="right">0</td>
    <td align="right">0.00%</td>
    <td align="right">0.00%</td>
    <td align="right">0.00%</td>
  </tr>
  <tr>
    <td>設備器材(式)</td>
    <td height="30" align="right">0</td>
    <td align="right">0</td>
    <td align="right">0</td>
    <td align="right">0</td>
    <td align="right">0</td>
    <td align="right">0</td>
    <td align="right">0.00%</td>
    <td align="right">0.00%</td>
    <td align="right">0.00%</td>
  </tr>
  <tr>
    <td colspan="4" align="center">總計</td>
    <td height="30" align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right"><? echo number_format($all_a1_1_3 + $all_a1_2_3 + $all_a2_1_3 + $all_a2_2_3  + $all_a2_3_3 + $all_a3_1_3 + $all_a3_2_3 + $all_a4_1_3 + $all_a4_2_3 + $all_a4_3_3 + $all_a4_4_3 + $all_a5_1_3 + $all_a6_1_3 + $all_a6_2_3 + $all_a7_1_3 + $all_a7_2_3 + $all_a7_3_3 + $all_a8_1_3 + $all_a8_2_3); ?></td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right"><? echo number_format($all_e1_1_3 + $all_e1_2_3 + $all_e2_1_3 + $all_e2_2_3  + $all_e2_3_3 + $all_e3_1_3 + $all_e3_2_3 + $all_e4_1_3 + $all_e4_2_3 + $all_e4_3_3 + $all_e4_4_3 + $all_e5_1_3 + $all_e6_1_3 + $all_e6_2_3 + $all_e7_1_3 + $all_e7_2_3 + $all_e7_3_3 + $all_e8_1_3 + $all_e8_2_3); ?></td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right"><? echo number_format(($all_e1_1_3 + $all_e1_2_3 + $all_e2_1_3 + $all_e2_2_3  + $all_e2_3_3 + $all_e3_1_3 + $all_e3_2_3 + $all_e4_1_3 + $all_e4_2_3 + $all_e4_3_3 + $all_e4_4_3 + $all_e5_1_3 + $all_e6_1_3 + $all_e6_2_3 + $all_e7_1_3 + $all_e7_2_3 + $all_e7_3_3 + $all_e8_1_3 + $all_e8_2_3) / ($all_a1_1_3 + $all_a1_2_3 + $all_a2_1_3 + $all_a2_2_3  + $all_a2_3_3 + $all_a3_1_3 + $all_a3_2_3 + $all_a4_1_3 + $all_a4_2_3 + $all_a4_3_3 + $all_a4_4_3 + $all_a5_1_3 + $all_a6_1_3 + $all_a6_2_3 + $all_a7_1_3 + $all_a7_2_3 + $all_a7_3_3 + $all_a8_1_3 + $all_a8_2_3) * 100 , 2).'%'; ?></td>
  </tr>
  <tr>
    <td height="40" colspan="13">承辦人：　　　　　　　　　　　　　　　科長：　　　　　　　　　　　　　　　局 (處) 長：</td>
  </tr>
</table>
<table>
</table>
<br />
<? echo '核定總金額：'.number_format($all_fn_total).'<br>';?>
<? echo '執行總金額：'.number_format($all_ef_total).'<br>';?>
<? echo '　　執行率：'.number_format(($all_e1_1_3 + $all_e1_2_3 + $all_e2_1_3 + $all_e2_2_3  + $all_e2_3_3 + $all_e3_1_3 + $all_e3_2_3 + $all_e4_1_3 + $all_e4_2_3 + $all_e4_3_3 + $all_e4_4_3 + $all_e5_1_3 + $all_e6_1_3 + $all_e6_2_3 + $all_e7_1_3 + $all_e7_2_3 + $all_e7_3_3 + $all_e8_1_3 + $all_e8_2_3) / ($all_a1_1_3 + $all_a1_2_3 + $all_a2_1_3 + $all_a2_2_3  + $all_a2_3_3 + $all_a3_1_3 + $all_a3_2_3 + $all_a4_1_3 + $all_a4_2_3 + $all_a4_3_3 + $all_a4_4_3 + $all_a5_1_3 + $all_a6_1_3 + $all_a6_2_3 + $all_a7_1_3 + $all_a7_2_3 + $all_a7_3_3 + $all_a8_1_3 + $all_a8_2_3) * 100 , 2).'%'.'<br><br>';?>
<?php 
include "../xSchoolForm/button_close.php";
include "../xSchoolForm/button_print.php";
echo "<br>若要列印本表，建議複製到Excel列印，可彈性調整頁面並縮短電腦列印準備時間。<br>";
echo "操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)";
?>