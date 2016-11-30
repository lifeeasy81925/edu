<?php

	$school_year = 104; //為學年度
		
	function printLink($file_path, $file_name)
	{
		if ($file_name == '')
			echo "<font color='red'>無</font>";
		else 
			echo '<a href="'.$file_path.$file_name.'" target="_new">下載</a>';
	}
	
	//路徑, 檔案名稱, 顯示方式
	function modPrintLink($file_path, $file_name, $mod)
	{
		switch($mod)
		{
			case 1:
				if ($file_name == '')
					echo "<font color=red>未上傳</font>";
				else 
					echo '<font color=blue>已上傳</font>，檔名：'.'<a href="'.$file_path.$file_name.'" target="_new">'.$file_name.'</a>';
				break;
			
			case 2:
				break;
		}
		
	}
	
	//補一
	$a1_title = "推展親職教育活動";
	$a1_table_name = "alc_parenting_education";
	$a1_table_name_item = $a1_table_name."_item";
	$a1_table_name_effect = $a1_table_name."_effect";
	
	//補二
	$a2_title = "補助學校發展教育特色";
	$a2_table_name = "alc_education_features";
	$a2_table_name_item = $a2_table_name."_item";
	$a2_table_name_effect = $a2_table_name."_effect";
	
	//補三
	$a3_title = "修繕離島或偏遠地區師生宿舍";
	$a3_table_name = "alc_repair_dormitory";
	$a3_table_name_item = $a3_table_name."_item";
	$a3_table_name_effect = $a3_table_name."_effect";
	
	//補四
	$a4_title = "充實學校基本教學設備";
	$a4_table_name = "alc_teaching_equipment";
	$a4_table_name_item = $a4_table_name."_item";
	$a4_table_name_effect = $a4_table_name."_effect";
	
	//補五
	$a5_title = "發展原住民教育文化特色及充實設備器材";
	$a5_table_name = "alc_aboriginal_education";
	$a5_table_name_item = $a5_table_name."_item";
	$a5_table_name_effect = $a5_table_name."_effect";
	
	//補六
	$a6_title = "補助交通不便地區學校交通車";
	$a6_table_name = "alc_transport_car";
	$a6_table_name_effect = $a6_table_name."_effect";
	
	//補七
	$a7_title = "整修學校社區化活動場所";
	$a7_table_name = "alc_school_activity";
	$a7_table_name_item = $a7_table_name."_item";
	$a7_table_name_effect = $a7_table_name."_effect";
	
	//成功專案學校，不可申請教優區
	$success_project_ary = array("044523", "044524", "044666", "044667", "044668"
						  , "044669", "044670", "044675", "044676", "044677"
						  , "044667A1", "044677A1", "084524", "084529", "084696"
						  , "084700", "084704", "084716", "084725", "084719"
						  , "084726", "084732", "084729"
						);
	/*
	account	cityname	district	schoolname	
	044523	新竹縣	五峰鄉	五峰國中	1
	044524	新竹縣	尖石鄉	尖石國中	2
	044666	新竹縣	尖石鄉	尖石國小	3
	044667	新竹縣	尖石鄉	嘉興國小	4
	044668	新竹縣	尖石鄉	新樂國小	5
	044669	新竹縣	尖石鄉	梅花國小	6
	044670	新竹縣	尖石鄉	錦屏國小	7
	044675	新竹縣	五峰鄉	五峰國小	8
	044676	新竹縣	五峰鄉	桃山國小	9
	044677	新竹縣	五峰鄉	花園國小	10
	044667A1	新竹縣	尖石鄉	嘉興國小義興分校	11
	044677A1	新竹縣	五峰鄉	花園國小竹林分校	12
	084524	南投縣	南投縣	國姓國中	13
	084529	南投縣	南投縣	信義國中	14
	084696	南投縣	南投縣	國姓國小	15
	084700	南投縣	南投縣	長流國小	16
	084704	南投縣	南投縣	長福國小	17
	084716	南投縣	南投縣	信義國小	18
	084719	南投縣	南投縣	愛國國小	19
	084725	南投縣	南投縣	信義國小忠信分校	20
	084726	南投縣	南投縣	愛國國小自強分校	21
	084729	南投縣	南投縣	新鄉國小	22
	084732	南投縣	南投縣	豐丘國小	23
	
	'044523'	
	,'044524'	
	,'044666'	
	,'044667'	
	,'044668'	
	,'044669'	
	,'044670'	
	,'044675'	
	,'044676'	
	,'044677'	
	,'044667A1'
	,'044677A1'
	,'084524'	
	,'084529'	
	,'084696'	
	,'084700'	
	,'084704'	
	,'084716'	
	,'084719'	
	,'084725'	
	,'084726'	
	,'084729'	
	,'084732'
	*/
	
?>

