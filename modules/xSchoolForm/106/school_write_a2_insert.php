<?
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "checkdate.php";

	include "../../function/config_for_105.php";  // 要將去年資料新增到今年資料，故使用去年度基本設定

	$keyClasses = '13';  // 設定可申請特色二的最少班級數

	$table_name = "alc_education_features";
	$table_name_item = "alc_education_features_item";

	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".

		   "      , a2_item.* ".
		   "      , a2.* ".

		   // 補二資料
		   "      , a2.p1_name, a2.p2_name ".
		   "      , a2.s_p1_student, a2.s_p2_student ".
		   "      , a2.s_p1_target, a2.s_p2_target ".
		   "      , a2.s_total_money ".
		   "      , a2.s_p1_money, a2.s_p2_money ".
		   "      , a2.s_p1_current_cnt, a2.s_p1_current_money ".
		   "      , a2.s_p1_capital_cnt, a2.s_p1_capital_money ".
		   "      , a2.s_p2_current_cnt, a2.s_p2_current_money ".
		   "      , a2.s_p2_capital_cnt, a2.s_p2_capital_money ".
		   "      , a2.p1_IsContinue, a2.p2_IsContinue, a2.p_num ".
		   "      , a2.p1_ContinueYear, a2.p2_ContinueYear ".

		   "      , a2.s_total_money_ny1 ".
		   "      , a2.s_p1_money_ny1, a2.s_p2_money_ny1 ".
		   "      , a2.s_p1_current_cnt_ny1, a2.s_p1_current_money_ny1 ".
		   "      , a2.s_p1_capital_cnt_ny1, a2.s_p1_capital_money_ny1 ".
		   "      , a2.s_p2_current_cnt_ny1, a2.s_p2_current_money_ny1 ".
		   "      , a2.s_p2_capital_cnt_ny1, a2.s_p2_capital_money_ny1 ".

		   "      , a2.s_total_money_ny2 ".
		   "      , a2.s_p1_money_ny2, a2.s_p2_money_ny2 ".
		   "      , a2.s_p1_current_cnt_ny2, a2.s_p1_current_money_ny2 ".
		   "      , a2.s_p1_capital_cnt_ny2, a2.s_p1_capital_money_ny2 ".
		   "      , a2.s_p2_current_cnt_ny2, a2.s_p2_current_money_ny2 ".
		   "      , a2.s_p2_capital_cnt_ny2, a2.s_p2_capital_money_ny2 ".

		   "      , sy_ny.seq_no as seq_no_ny ".
		   "      , a2_item_ny.main_seq as main_seq_ny ".

		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join alc_education_features as a2 on sy.seq_no = a2.sy_seq ".
		   "                       left join alc_education_features_item as a2_item on sy.seq_no = a2_item.main_seq ".

		   "                       left join schooldata_year as sy_ny on sd.account = sy_ny.account and sy_ny.school_year = '".($school_year + 1)."' ".
		   "                       left join alc_education_features_item as a2_item_ny on sy_ny.seq_no = a2_item_ny.main_seq ".

		   " where sy.school_year = '".($school_year)."'".  // SELECT去年的資料，用來匯入今年
		   "   and sd.account = '$username' ";

	$result = mysql_query($sql);

	while($row = mysql_fetch_array($result))
	{
		$main_seq = $row['seq_no'];  // school_year的seq_no
		$p1_name = $row['p1_name'];
		$p2_name = $row['p2_name'];
		$p1_IsContinue = $row['p1_IsContinue'];
		$p2_IsContinue = $row['p2_IsContinue'];
		$p1_ContinueYear = $row['p1_ContinueYear'];
		$p2_ContinueYear = $row['p2_ContinueYear'];
		$s_p1_student = $row['s_p1_student'];
		$s_p2_student = $row['s_p2_student'];
		$s_p1_target = $row['s_p1_target'];
		$s_p2_target = $row['s_p2_target'];
		$p_num = $row['p_num'];

		$s_total_money = ($row['s_total_money'] == '')?0:$row['s_total_money'];  // NULL則填入0
		$s_p1_money = ($row['s_p1_money'] == '')?0:$row['s_p1_money'];           // NULL則填入0
		$s_p1_current_cnt = ($row['s_p1_current_cnt'] == '')?0:$row['s_p1_current_cnt'];
		$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
		$s_p1_capital_cnt = ($row['s_p1_capital_cnt'] == '')?0:$row['s_p1_capital_cnt'];
		$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];
		$s_p2_money = ($row['s_p2_money'] == '')?0:$row['s_p2_money'];
		$s_p2_current_cnt = ($row['s_p2_current_cnt'] == '')?0:$row['s_p2_current_cnt'];
		$s_p2_current_money = ($row['s_p2_current_money'] == '')?0:$row['s_p2_current_money'];
		$s_p2_capital_cnt = ($row['s_p2_capital_cnt'] == '')?0:$row['s_p2_capital_cnt'];
		$s_p2_capital_money = ($row['s_p2_capital_money'] == '')?0:$row['s_p2_capital_money'];

		$s_total_money_ny1 = ($row['s_total_money_ny1'] == '')?0:$row['s_total_money_ny1'];  // NULL則填入0
		$s_p1_money_ny1 = ($row['s_p1_money_ny1'] == '')?0:$row['s_p1_money_ny1'];           // NULL則填入0
		$s_p1_current_cnt_ny1 = ($row['s_p1_current_cnt_ny1'] == '')?0:$row['s_p1_current_cnt_ny1'];
		$s_p1_current_money_ny1 = ($row['s_p1_current_money_ny1'] == '')?0:$row['s_p1_current_money_ny1'];
		$s_p1_capital_cnt_ny1 = ($row['s_p1_capital_cnt_ny1'] == '')?0:$row['s_p1_capital_cnt_ny1'];
		$s_p1_capital_money_ny1 = ($row['s_p1_capital_money_ny1'] == '')?0:$row['s_p1_capital_money_ny1'];
		$s_p2_money_ny1 = ($row['s_p2_money_ny1'] == '')?0:$row['s_p2_money_ny1'];
		$s_p2_current_cnt_ny1 = ($row['s_p2_current_cnt_ny1'] == '')?0:$row['s_p2_current_cnt_ny1'];
		$s_p2_current_money_ny1 = ($row['s_p2_current_money_ny1'] == '')?0:$row['s_p2_current_money_ny1'];
		$s_p2_capital_cnt_ny1 = ($row['s_p2_capital_cnt_ny1'] == '')?0:$row['s_p2_capital_cnt_ny1'];
		$s_p2_capital_money_ny1 = ($row['s_p2_capital_money_ny1'] == '')?0:$row['s_p2_capital_money_ny1'];

		$s_total_money_ny2 = ($row['s_total_money_ny2'] == '')?0:$row['s_total_money_ny2'];  // NULL則填入0
		$s_p1_money_ny2 = ($row['s_p1_money_ny2'] == '')?0:$row['s_p1_money_ny2'];           // NULL則填入0
		$s_p1_current_cnt_ny2 = ($row['s_p1_current_cnt_ny2'] == '')?0:$row['s_p1_current_cnt_ny2'];
		$s_p1_current_money_ny2 = ($row['s_p1_current_money_ny2'] == '')?0:$row['s_p1_current_money_ny2'];
		$s_p1_capital_cnt_ny2 = ($row['s_p1_capital_cnt_ny2'] == '')?0:$row['s_p1_capital_cnt_ny2'];
		$s_p1_capital_money_ny2 = ($row['s_p1_capital_money_ny2'] == '')?0:$row['s_p1_capital_money_ny2'];
		$s_p2_money_ny2 = ($row['s_p2_money_ny2'] == '')?0:$row['s_p2_money_ny2'];
		$s_p2_current_cnt_ny2 = ($row['s_p2_current_cnt_ny2'] == '')?0:$row['s_p2_current_cnt_ny2'];
		$s_p2_current_money_ny2 = ($row['s_p2_current_money_ny2'] == '')?0:$row['s_p2_current_money_ny2'];
		$s_p2_capital_cnt_ny2 = ($row['s_p2_capital_cnt_ny2'] == '')?0:$row['s_p2_capital_cnt_ny2'];
		$s_p2_capital_money_ny2 = ($row['s_p2_capital_money_ny2'] == '')?0:$row['s_p2_capital_money_ny2'];

		// 沿用年的初複審金額及意見

        $city_total_money = $row['city_total_money'];
        $city_desc = $row['city_desc'];
        $city_desc_ny1 = $row['city_desc_ny1'];
        $city_desc_ny2 = $row['city_desc_ny2'];
        $city_desc_p2 = $row['city_desc_p2'];
        $city_desc_ny1_p2 = $row['city_desc_ny1_p2'];
        $city_desc_ny2_p2 = $row['city_desc_ny2_p2'];

        $city_p1_money = $row['city_p1_money'];
        $city_p1_current_cnt = $row['city_p1_current_cnt'];
        $city_p1_current_money = $row['city_p1_current_money'];
        $city_p1_capital_cnt = $row['city_p1_capital_cnt'];
        $city_p1_capital_money = $row['city_p1_capital_money'];
        $city_p2_money = $row['city_p2_money'];
        $city_p2_current_cnt = $row['city_p2_current_cnt'];
        $city_p2_current_money = $row['city_p2_current_money'];
        $city_p2_capital_cnt = $row['city_p2_capital_cnt'];
        $city_p2_capital_money = $row['city_p2_capital_money'];

        $city_total_money_ny1 = $row['city_total_money_ny1'];
        $city_p1_money_ny1 = $row['city_p1_money_ny1'];
        $city_p1_current_cnt_ny1 = $row['city_p1_current_cnt_ny1'];
        $city_p1_current_money_ny1 = $row['city_p1_current_money_ny1'];
        $city_p1_capital_cnt_ny1 = $row['city_p1_capital_cnt_ny1'];
        $city_p1_capital_money_ny1 = $row['city_p1_capital_money_ny1'];
        $city_p2_money_ny1 = $row['city_p2_money_ny1'];
        $city_p2_current_cnt_ny1 = $row['city_p2_current_cnt_ny1'];
        $city_p2_current_money_ny1 = $row['city_p2_current_money_ny1'];
        $city_p2_capital_cnt_ny1 = $row['city_p2_capital_cnt_ny1'];
        $city_p2_capital_money_ny1 = $row['city_p2_capital_money_ny1'];
        $city_total_money_ny2 = $row['city_total_money_ny2'];

        $city_p1_money_ny2 = $row['city_p1_money_ny2'];
        $city_p1_current_cnt_ny2 = $row['city_p1_current_cnt_ny2'];
        $city_p1_current_money_ny2 = $row['city_p1_current_money_ny2'];
        $city_p1_capital_cnt_ny2 = $row['city_p1_capital_cnt_ny2'];
        $city_p1_capital_money_ny2 = $row['city_p1_capital_money_ny2'];
        $city_p2_money_ny2 = $row['city_p2_money_ny2'];
        $city_p2_current_cnt_ny2 = $row['city_p2_current_cnt_ny2'];
        $city_p2_current_money_ny2 = $row['city_p2_current_money_ny2'];
        $city_p2_capital_cnt_ny2 = $row['city_p2_capital_cnt_ny2'];
        $city_p2_capital_money_ny2 = $row['city_p2_capital_money_ny2'];
        $city_approved = $row['city_approved'];
        $city_approved_id = $row['city_approved_id'];

        $edu_total_money = $row['edu_total_money'];
        $edu_desc = $row['edu_desc'];
        $edu_desc_ny1 = $row['edu_desc_ny1'];
        $edu_desc_ny2 = $row['edu_desc_ny2'];
        $edu_desc_p2 = $row['edu_desc_p2'];
        $edu_desc_ny1_p2 = $row['edu_desc_ny1_p2'];
        $edu_desc_ny2_p2 = $row['edu_desc_ny2_p2'];

        $edu_p1_money = $row['edu_p1_money'];
        $edu_p1_current_cnt = $row['edu_p1_current_cnt'];
        $edu_p1_current_money = $row['edu_p1_current_money'];
        $edu_p1_capital_cnt = $row['edu_p1_capital_cnt'];
        $edu_p1_capital_money = $row['edu_p1_capital_money'];
        $edu_p2_money = $row['edu_p2_money'];
        $edu_p2_current_cnt = $row['edu_p2_current_cnt'];
        $edu_p2_current_money = $row['edu_p2_current_money'];
        $edu_p2_capital_cnt = $row['edu_p2_capital_cnt'];
        $edu_p2_capital_money = $row['edu_p2_capital_money'];

        $edu_total_money_ny1 = $row['edu_total_money_ny1'];
        $edu_p1_money_ny1 = $row['edu_p1_money_ny1'];
        $edu_p1_current_cnt_ny1 = $row['edu_p1_current_cnt_ny1'];
        $edu_p1_current_money_ny1 = $row['edu_p1_current_money_ny1'];
        $edu_p1_capital_cnt_ny1 = $row['edu_p1_capital_cnt_ny1'];
        $edu_p1_capital_money_ny1 = $row['edu_p1_capital_money_ny1'];
        $edu_p2_money_ny1 = $row['edu_p2_money_ny1'];
        $edu_p2_current_cnt_ny1 = $row['edu_p2_current_cnt_ny1'];
        $edu_p2_current_money_ny1 = $row['edu_p2_current_money_ny1'];
        $edu_p2_capital_cnt_ny1 = $row['edu_p2_capital_cnt_ny1'];
        $edu_p2_capital_money_ny1 = $row['edu_p2_capital_money_ny1'];

        $edu_total_money_ny2 = $row['edu_total_money_ny2'];
        $edu_p1_money_ny2 = $row['edu_p1_money_ny2'];
        $edu_p1_current_cnt_ny2 = $row['edu_p1_current_cnt_ny2'];
        $edu_p1_current_money_ny2 = $row['edu_p1_current_money_ny2'];
        $edu_p1_capital_cnt_ny2 = $row['edu_p1_capital_cnt_ny2'];
        $edu_p1_capital_money_ny2 = $row['edu_p1_capital_money_ny2'];
        $edu_p2_money_ny2 = $row['edu_p2_money_ny2'];
        $edu_p2_current_cnt_ny2 = $row['edu_p2_current_cnt_ny2'];
        $edu_p2_current_money_ny2 = $row['edu_p2_current_money_ny2'];
        $edu_p2_capital_cnt_ny2 = $row['edu_p2_capital_cnt_ny2'];
        $edu_p2_capital_money_ny2 = $row['edu_p2_capital_money_ny2'];
        $edu_approved = $row['edu_approved'];
        $edu_approved_id = $row['edu_approved_id'];

		// a2
		$sy_seq = $row['sy_seq'];
		$account = $row['account'];
		$school_year = $row['school_year'];
		$inherit_year = $row['inherit_year'];

		// a2_item的資料
		$seq_no = $row['seq_no'];
		$main_seq = $row['main_seq'];
		$section = $row['section'];
		$subject = $row['subject'];
		$category = $row['category'];
		$item = $row['item'];
		$unit = $row['unit'];
		$price = $row['price'];
		$amount = $row['amount'];
		$s_money = $row['s_money'];
		$s_desc = $row['s_desc'];
		$city_money = $row['city_money'];
		$city_delete = $row['city_delete'];

		$edu_delete = $row['edu_delete'];
        $edu_money = $row['edu_money'];

        $seq_no_ny = $row['seq_no_ny'];
        $main_seq_ny = $row['main_seq_ny'];

        // 插入延續1~2年計畫

		if($main_seq = $main_seq_ny)  // 若$main_seq = $main_seq_ny，則更新，否則插入新資料
		{
			$sql = " update $table_name_item set subject='$subject' ".
			"                                      , category='$category' ".
			"                                      , item='$item' ".
			"                                      , unit='$unit' ".
			"                                      , price='$price' ".
			"                                      , amount='$amount' ".
			"                                      , s_money='$s_money' ".
			"                                      , s_desc='$s_desc' ".
			" where seq_no = '$seq_no'; ";
			mysql_query($sql);
		}
		else
		{
			$k = $section;
			for($i = 1; $i <= 2; $i++)  // 特色1或2
			{
				for($j = $school_year+1; $j <= $school_year+2; $j++)  // 延續1~2年
				{
					if ($k == "p".$i."_".$j)
					{
						$sql_insert = " insert into $table_name_item ( main_seq, section, subject, category, item, unit, price, amount, s_money, s_desc, city_money, city_delete, edu_money ,edu_delete) ".
						"                             values ( '$seq_no_ny' ".  // j-10407,將main_seq換成新的
						"                                    , '$section' ".
						"                                    , '$subject' ".
						"                                    , '$category' ".
						"                                    , '$item' ".
						"                                    , '$unit' ".
						"                                    , '$price' ".
						"                                    , '$amount' ".
						"                                    , '$s_money' ".
						"                                    , '$s_desc' ".

						"                                    , '$city_money' ".
						"                                    , '$city_delete' ".

						"                                    , '$edu_money' ".
						"                                    , '$edu_delete' ".
						"                                     ); ";
						mysql_query($sql_insert);
					}
				}
			}
		}
	}

	$insert_sql = "insert into alc_education_features (sy_seq, account, school_year) ".
				  "     values ('$seq_no_ny', '$username', '".($school_year + 1)."'); ";  // 寫入時要寫今年的資料，所以要+1
	mysql_query($insert_sql);

	$set_inherit_year = "";  // 這個變數用來決定今年是繼承哪年的計畫
	
		if($inherit_year != null)
		{
			$set_inherit_year = substr($inherit_year, 0, 3);  // 取年度就好，不管有無修正計畫
		}
		else
		{
			$set_inherit_year = $school_year;
		}
 
	$sql_update =  " update $table_name set  ".
				   "                      	s_total_money='$s_total_money_ny1' 	".
				   "                      , s_total_money_ny1='$s_total_money_ny2' ".
				   "                      , p_num='$p_num' ".
				   "                      , p1_name='$p1_name' ".
				   "                      , s_p1_student='$s_p1_student' ".
				   "                      , s_p1_target='$s_p1_target' ".
				   "                      , p1_IsContinue='$p1_IsContinue' ".
				   "                      , p1_ContinueYear='".($p1_ContinueYear+1)."' ".  // 延續辦理直接多加1年				   
				   "                      , s_p1_money='$s_p1_money_ny1' ".
				   "                      , s_p1_current_money='$s_p1_current_money_ny1' ".
				   "                      , s_p1_capital_money='$s_p1_capital_money_ny1' ".
				   "                      , s_p1_money_ny1='$s_p1_money_ny2' ".
				   "                      , s_p1_current_money_ny1='$s_p1_current_money_ny2' ".
				   "                      , s_p1_capital_money_ny1='$s_p1_capital_money_ny2' ".
				   "                      , p2_name='$p2_name' ".
				   "                      , s_p2_student='$s_p2_student' ".
				   "                      , s_p2_target='$s_p2_target' ".
				   "                      , p2_IsContinue='$p2_IsContinue' ".
				   "                      , p2_ContinueYear='".($p2_ContinueYear+1)."' ".  // 延續辦理直接多加1年				   
				   "                      , s_p2_money='$s_p2_money_ny1' ".
				   "                      , s_p2_current_money='$s_p2_current_money_ny1' ".
				   "                      , s_p2_capital_money='$s_p2_capital_money_ny1' ".
				   "                      , s_p2_money_ny1='$s_p2_money_ny2' ".
				   "                      , s_p2_current_money_ny1='$s_p2_current_money_ny2' ".
				   "                      , s_p2_capital_money_ny1='$s_p2_capital_money_ny2' ".

				   // 代入初複審金額及意見

				   "                      , city_total_money  = '$city_total_money_ny1' ".
				   "                      , city_desc = '$city_desc_ny1' ".
				   "                      , city_desc_ny1 = '$city_desc_ny2' ".
				   "                      , city_desc_p2 = '$city_desc_ny1_p2' ".
				   "                      , city_desc_ny1_p2 = '$city_desc_ny2_p2' ".
				   "                      , city_p1_money = '$city_p1_money_ny1' ".
				   "                      , city_p1_current_cnt = '$city_p1_current_cnt_ny1' ".
				   "                      , city_p1_current_money = '$city_p1_current_money_ny1' ".
				   "                      , city_p1_capital_cnt = '$city_p1_capital_cnt_ny1' ".
				   "                      , city_p1_capital_money = '$city_p1_capital_money_ny1' ".
				   "                      , city_p2_money = '$city_p2_money_ny1' ".
				   "                      , city_p2_current_cnt = '$city_p2_current_cnt_ny1' ".
				   "                      , city_p2_current_money = '$city_p2_current_money_ny1' ".
				   "                      , city_p2_capital_cnt = '$city_p2_capital_cnt_ny1' ".
				   "                      , city_p2_capital_money = '$city_p2_capital_money_ny1' ".
				   "                      , city_total_money_ny1 = '$city_total_money_ny2' ".
				   "                      , city_p1_money_ny1 = '$city_p1_money_ny2' ".
				   "                      , city_p1_current_cnt_ny1 = '$city_p1_current_cnt_ny2' ".
				   "                      , city_p1_current_money_ny1 = '$city_p1_current_money_ny2' ".
				   "                      , city_p1_capital_cnt_ny1 = '$city_p1_capital_cnt_ny2' ".
				   "                      , city_p1_capital_money_ny1 = '$city_p1_capital_money_ny2' ".
				   "                      , city_p2_money_ny1 = '$city_p2_money_ny2' ".
				   "                      , city_p2_current_cnt_ny1 = '$city_p2_current_cnt_ny2' ".
				   "                      , city_p2_current_money_ny1 = '$city_p2_current_money_ny2' ".
				   "                      , city_p2_capital_cnt_ny1 = '$city_p2_capital_cnt_ny2' ".
				   "                      , city_p2_capital_money_ny1 = '$city_p2_capital_money_ny2' ".
				   "                      , city_approved = '$city_approved' ".
				   "                      , city_approved_id = '$city_approved_id' ".
				   "                      , edu_total_money = '$edu_total_money_ny1' ".
				   "                      , edu_desc = '$edu_desc_ny1' ".
				   "                      , edu_desc_ny1 = '$edu_desc_ny2' ".
				   "                      , edu_desc_p2 = '$edu_desc_ny1_p2' ".
				   "                      , edu_desc_ny1_p2 = '$edu_desc_ny2_p2' ".
				   "                      , edu_p1_money = '$edu_p1_money_ny1' ".
				   "                      , edu_p1_current_cnt = '$edu_p1_current_cnt_ny1' ".
				   "                      , edu_p1_current_money = '$edu_p1_current_money_ny1' ".
				   "                      , edu_p1_capital_cnt = '$edu_p1_capital_cnt_ny1' ".
				   "                      , edu_p1_capital_money = '$edu_p1_capital_money_ny1' ".
				   "                      , edu_p2_money = '$edu_p2_money_ny1' ".
				   "                      , edu_p2_current_cnt = '$edu_p2_current_cnt_ny1' ".
				   "                      , edu_p2_current_money = '$edu_p2_current_money_ny1' ".
				   "                      , edu_p2_capital_cnt = '$edu_p2_capital_cnt_ny1' ".
				   "                      , edu_p2_capital_money = '$edu_p2_capital_money_ny1' ".
				   "                      , edu_total_money_ny1 = '$edu_total_money_ny2' ".
				   "                      , edu_p1_money_ny1 = '$edu_p1_money_ny2' ".
				   "                      , edu_p1_current_cnt_ny1 = '$edu_p1_current_cnt_ny2' ".
				   "                      , edu_p1_current_money_ny1 = '$edu_p1_current_money_ny2' ".
				   "                      , edu_p1_capital_cnt_ny1 = '$edu_p1_capital_cnt_ny2' ".
				   "                      , edu_p1_capital_money_ny1 = '$edu_p1_capital_money_ny2' ".
				   "                      , edu_p2_money_ny1 = '$edu_p2_money_ny2' ".
				   "                      , edu_p2_current_cnt_ny1 = '$edu_p2_current_cnt_ny2' ".
				   "                      , edu_p2_current_money_ny1 = '$edu_p2_current_money_ny2' ".
				   "                      , edu_p2_capital_cnt_ny1 = '$edu_p2_capital_cnt_ny2' ".
				   "                      , edu_p2_capital_money_ny1 = '$edu_p2_capital_money_ny2' ".
				   "                      , edu_approved = '$edu_approved' ".
				   "                      , edu_approved_id = '$edu_approved_id' ".
				   "                      , inherit_year = '$set_inherit_year' ".

				   " where sy_seq = '$seq_no_ny'; ";
	mysql_query($sql_update);

	// 新增資料進資料庫語法
	if(mysql_query($sql))
	{
		echo '新增成功!';
		echo "<script>";
		echo "</script>";
		echo '<meta http-equiv=REFRESH CONTENT=0;url=school_write_a2_conti.php>';
	}
	else
	{
		echo '新增失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=school_write_allowance.php>';
		echo (mysql_errno() != 0)?"5 : ".$sql."<br />".mysql_errno().mysql_error()."<br />----<br />":"";
	}
?>