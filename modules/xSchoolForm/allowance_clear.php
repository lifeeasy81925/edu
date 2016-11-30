<?
// 清理未符合申請項目資料庫內容
// 補助項目一
if ($a_1 == 0){
	//在money table記錄下來申請經費
	if($class == '1' ){
		$sql = "update 100element_money set  a1_1 = '', a1_2 = '' where account='$username'";
		mysql_query($sql);
	}else{
		$sql = "update 100junior_money set  a1_1 = '', a1_2 = '' where account='$username'";
		mysql_query($sql);
	}
	if($class == '1' ){
		$sql = "update 100element_allowance1 set afterMon ='',afterLec='',afterNum='',afterFamMon='',afterFamMonLec='' where account='$username'";
		mysql_query($sql);
	}else{
		$sql = "update 100junior_allowance1 set afterMon ='',afterLec='',afterNum='',afterFamMon='',afterFamMonLec='' where account='$username'";
		mysql_query($sql);
	}
	//echo '<br>補助項目一清除成功！';
}
// 補助項目二
if ($a_2 == 0){
	//在money table記錄下來申請經費
	if($class == '1' ){
		$sql = "update 100element_money set  a2_1 = '', a2_2 = '', a2_3 = '' where account='$username'";
		mysql_query($sql);
	}else{
		$sql = "update 100junior_money set  a2_1 = '', a2_2 = '', a2_3 = '' where account='$username'";
		mysql_query($sql);
	}
	if($class == '1' ){
		$sql = "update 100element_allowance2 set afterLearnMon='',assistclass='',assiststudents='',assist='',assistsection='',holidayassist='',holidayclass='',holidaystudents='',holidaysection='',nightclass='',nightstudents='',nightassist='',nightsection='' where account='$username'";
		mysql_query($sql);
	}else{
		$sql = "update 100junior_allowance2 set afterLearnMon='',assistclass='',assiststudents='',assist='',assistsection='',holidayassist='',holidayclass='',holidaystudents='',holidaysection='',nightclass='',nightstudents='',nightassist='',nightsection='' where account='$username'";
		mysql_query($sql);
	}
	//echo '<br>補助項目二清除成功！';
}
// 補助項目三
if ($a_3 == 0){
	//在money table記錄下來申請經費
	if($class == '1' ){
		$sql = "update 100element_money set  a3 = '',a3_1 = '',a3_2 = '' where account='$username'";
		mysql_query($sql);
	}else{
		$sql = "update 100junior_money set  a3 = '',a3_1 = '',a3_2 = '' where account='$username'";
		mysql_query($sql);
	}
	if($class == '1' ){
		$sql = "update 100element_allowance3 set afterMon='',develop='',char1='',char1Mon='',char1a='',char1b='',char2='',char2Mon='',char2a='',char2b=''  where account='$username'";
		mysql_query($sql);
	}else{
		$sql = "update 100junior_allowance3 set afterMon='',develop='',char1='',char1Mon='',char1a='',char1b='',char2='',char2Mon='',char2a='',char2b=''  where account='$username'";
		mysql_query($sql);
	}
	//echo '<br>補助項目三清除成功！';
}
// 補助項目四-1
if ($a_4_1 == 0){
	//在money table記錄下來申請經費
	if($class == '1' ){
		$sql = "update 100element_money set  a4_1 = '',a4_2 = '' where account='$username'";
		mysql_query($sql);
	}else{
		$sql = "update 100junior_money set  a4_1 = '',a4_2 = '' where account='$username'";
		mysql_query($sql);
	}
	if($class == '1' ){
		$sql = "update 100element_allowance4 set afterMon='',afterEquip='',afterEquipMon='',afterMonNum='',afterEquipNum='',thisDorm='',lastDorm='',beforeDorm='',allowance='' where account='$username'";
		mysql_query($sql);
	}else{
		$sql = "update 100junior_allowance4 set afterMon='',afterEquip='',afterEquipMon='',afterMonNum='',afterEquipNum='',thisDorm='',lastDorm='',beforeDorm='',allowance='' where account='$username'";
		mysql_query($sql);
	}
	//echo '<br>補助項目4-1清除成功！';
}
// 補助項目四-2
if ($a_4_2 == 0){
	//在money table記錄下來申請經費
	if($class == '1' ){
		$sql = "update 100element_money set a4_2_1 = '',a4_2_2 = '' where account='$username'";
		mysql_query($sql);
	}else{
		$sql = "update 100junior_money set a4_2_1 = '',a4_2_2 = '' where account='$username'";
		mysql_query($sql);
	}
	if($class == '1' ){
		$sql = "update 100element_allowance4 set TafterMon='',TafterEquip='',TafterMonNum='',TafterEquipNum='',TafterEquipMon='',TthisDorm='',TlastDorm='',TbeforeDorm='' where account='$username'";
		mysql_query($sql);
	}else{
		$sql = "update 100junior_allowance4 set TafterMon='',TafterEquip='',TafterMonNum='',TafterEquipNum='',TafterEquipMon='',TthisDorm='',TlastDorm='',TbeforeDorm='' where account='$username'";
		mysql_query($sql);
	}
	//echo '<br>補助項目4-2清除成功！';
}
// 補助項目五
if ($a_5 == 0){
	//在money table記錄下來申請經費
	if($class == '1' ){
		$sql = "update 100element_money set  a5 = '' where account='$username'";
		mysql_query($sql);
	}else{
		$sql = "update 100junior_money set  a5 = '' where account='$username'";
		mysql_query($sql);
	}
	if($class == '1' ){
		$sql = "update 100element_allowance5 set afterMon='' where account='$username'";
		mysql_query($sql);
	}else{
		$sql = "update 100junior_allowance5 set afterMon='' where account='$username'";
		mysql_query($sql);
	}
	//echo '<br>補助項目五清除成功！';
}
// 補助項目六
if ($a_6 == 0){
	//在money table記錄下來申請經費
	if($class == '1' ){
		$sql = "update 100element_money set a6 = '',a6_1 = '',a6_2 = '' where account='$username'";
		mysql_query($sql);
	}else{
		$sql = "update 100junior_money set a6 = '',a6_1 = '',a6_2 = '' where account='$username'";
		mysql_query($sql);
	}
	if($class == '1' ){
		$sql = "update 100element_allowance6 set afterMon='',afterMonA='',afterMonB='' where account='$username'";
		mysql_query($sql);
	}else{
		$sql = "update 100junior_allowance6 set afterMon='',afterMonA='',afterMonB='' where account='$username'";
		mysql_query($sql);
	}
	//echo '<br>補助項目六清除成功！';
}
// 補助項目七
if ($a_7 == 0){
	//在money table記錄下來申請經費
	if($class == '1' ){
		$sql = "update 100element_money set a7_1 = '',a7_2 = '',a7_3 = '' where account='$username'";
		mysql_query($sql);
	}else{
		$sql = "update 100junior_money set a7_1 = '',a7_2 = '',a7_3 = '' where account='$username'";
		mysql_query($sql);
	}
	if($class == '1' ){
		$sql = "update 100element_allowance7 set afterMon='',aftertotal='',afterNum='',traffic='',trafficMon='',seat='',seatMon='',allowance='' where account='$username'";
		mysql_query($sql);
	}else{
		$sql = "update 100junior_allowance7 set afterMon='',aftertotal='',afterNum='',traffic='',trafficMon='',seat='',seatMon='',allowance='' where account='$username'";
		mysql_query($sql);
	}
	//echo '<br>補助項目七清除成功！';
}
// 補助項目八
if ($a_8 == 0){
	//在money table記錄下來申請經費
	if($class == '1' ){
		$sql = "update 100element_money set a8_1 = '',a8_2 = '',a8_3 = '' where account='$username'";
		mysql_query($sql);
	}else{
		$sql = "update 100junior_money set a8_1 = '',a8_2 = '',a8_3 = '' where account='$username'";
		mysql_query($sql);
	}
	if($class == '1' ){
		$sql = "update 100element_allowance8 set money='',afterGym='',aftergymMon='',aftergymExe='',aftergymPer='',afterclass='',afterclassMon='',afterclassMon='',afterclassExe='',afterclassPer='',afterground='',aftergroundMon='',aftergroundMon='',aftergroundExe='',aftergroundPer='',aftergroundsize='' where account='$username'";
		mysql_query($sql);
	}else{
		$sql = "update 100junior_allowance8 set money='',afterGym='',aftergymMon='',aftergymExe='',aftergymPer='',afterclass='',afterclassMon='',afterclassMon='',afterclassExe='',afterclassPer='',afterground='',aftergroundMon='',aftergroundMon='',aftergroundExe='',aftergroundPer='',aftergroundsize='' where account='$username'";
		mysql_query($sql);
	}
	//echo '<br>補助項目八清除成功！';
}

?>
