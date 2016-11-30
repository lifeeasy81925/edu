<?
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "checkdate.php";

	include "../../function/config_for_105.php";  // 要將去年資料新增到今年資料，故使用去年度基本設定

	$keyClasses = '13';  // 設定可申請特色二的最少班級數

	$table_name      = "alc_education_features";
	$table_name_item = "alc_education_features_item";

	$sql = 	"    SELECT sd.account                                                                                                                 ".
			"         , sd.schooltype                                                                                                              ".
			"         , sd.cityname                                                                                                                ".
			"         , sd.district                                                                                                                ".
			"         , sd.schoolname                                                                                                              ".
			"         , sy.*                                                                                                                       ".
			"         , a2.*                                                                                                                       ".
			"         , a2_item.*                                                                                                                  ".
			"         , sy_ny.seq_no                AS seq_no_ny                                                                                   ".
			"         , a2_ny.inherit_year          AS a2_ny_inherit_year                                                                          ".
			"         , a2_item_ny.seq_no           AS a2_item_seq_no_ny                                                                           ".
			"         , a2_item_ny.main_seq         AS main_seq_ny                                                                                 ".
			"         , a2_item_ny.city_money       AS city_money_ny                                                                               ".
			"         , a2_item_ny.city_delete      AS city_delete_ny                                                                              ".
			"         , a2_item_ny.edu_money        AS edu_money_ny                                                                                ".
			"         , a2_item_ny.edu_delete       AS edu_delete_ny                                                                               ".
			"      FROM schooldata                  AS sd                                                                                          ".
			" LEFT JOIN schooldata_year             AS sy         ON sd.account   = sy.account                                                     ".
			" LEFT JOIN alc_education_features      AS a2         ON sy.seq_no    = a2.sy_seq                                                      ".
			" LEFT JOIN alc_education_features_item AS a2_item    ON sy.seq_no    = a2_item.main_seq                                               ".
			" LEFT JOIN schooldata_year             AS sy_ny      ON sd.account   = sy_ny.account and sy_ny.school_year = '".($school_year + 1)."' ".  // include去年，+1年就是今年
			" LEFT JOIN alc_education_features      AS a2_ny      ON sy_ny.seq_no = a2_ny.sy_seq                                                   ".
			" LEFT JOIN alc_education_features_item AS a2_item_ny ON sy_ny.seq_no = a2_item_ny.main_seq                                            ".
			"     WHERE sy.school_year = '$school_year'                                                                                            ".
			"       AND sd.account     = '$username'                                                                                               ";

	$result = mysql_query($sql);

	while($row = mysql_fetch_array($result))
	{
		$main_seq        = $row['seq_no'];  // school_year的seq_no
		$p1_name         = $row['p1_name'];
		$p2_name         = $row['p2_name'];
		$p1_IsContinue   = $row['p1_IsContinue'];
		$p2_IsContinue   = $row['p2_IsContinue'];
		$p1_ContinueYear = $row['p1_ContinueYear'];
		$p2_ContinueYear = $row['p2_ContinueYear'];
		$s_p1_student    = $row['s_p1_student'];
		$s_p2_student    = $row['s_p2_student'];
		$s_p1_target     = $row['s_p1_target'];
		$s_p2_target     = $row['s_p2_target'];
		$p_num           = $row['p_num'];

		$s_total_money      = ($row['s_total_money']      == '')?0:$row['s_total_money'];  // NULL則填入0
		$s_p1_money         = ($row['s_p1_money']         == '')?0:$row['s_p1_money'];
		$s_p1_current_cnt   = ($row['s_p1_current_cnt']   == '')?0:$row['s_p1_current_cnt'];
		$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
		$s_p1_capital_cnt   = ($row['s_p1_capital_cnt']   == '')?0:$row['s_p1_capital_cnt'];
		$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];
		$s_p2_money         = ($row['s_p2_money']         == '')?0:$row['s_p2_money'];
		$s_p2_current_cnt   = ($row['s_p2_current_cnt']   == '')?0:$row['s_p2_current_cnt'];
		$s_p2_current_money = ($row['s_p2_current_money'] == '')?0:$row['s_p2_current_money'];
		$s_p2_capital_cnt   = ($row['s_p2_capital_cnt']   == '')?0:$row['s_p2_capital_cnt'];
		$s_p2_capital_money = ($row['s_p2_capital_money'] == '')?0:$row['s_p2_capital_money'];

		$s_total_money_ny1      = ($row['s_total_money_ny1']      == '')?0:$row['s_total_money_ny1'];  // NULL則填入0
		$s_p1_money_ny1         = ($row['s_p1_money_ny1']         == '')?0:$row['s_p1_money_ny1'];
		$s_p1_current_cnt_ny1   = ($row['s_p1_current_cnt_ny1']   == '')?0:$row['s_p1_current_cnt_ny1'];
		$s_p1_current_money_ny1 = ($row['s_p1_current_money_ny1'] == '')?0:$row['s_p1_current_money_ny1'];
		$s_p1_capital_cnt_ny1   = ($row['s_p1_capital_cnt_ny1']   == '')?0:$row['s_p1_capital_cnt_ny1'];
		$s_p1_capital_money_ny1 = ($row['s_p1_capital_money_ny1'] == '')?0:$row['s_p1_capital_money_ny1'];
		$s_p2_money_ny1         = ($row['s_p2_money_ny1']         == '')?0:$row['s_p2_money_ny1'];
		$s_p2_current_cnt_ny1   = ($row['s_p2_current_cnt_ny1']   == '')?0:$row['s_p2_current_cnt_ny1'];
		$s_p2_current_money_ny1 = ($row['s_p2_current_money_ny1'] == '')?0:$row['s_p2_current_money_ny1'];
		$s_p2_capital_cnt_ny1   = ($row['s_p2_capital_cnt_ny1']   == '')?0:$row['s_p2_capital_cnt_ny1'];
		$s_p2_capital_money_ny1 = ($row['s_p2_capital_money_ny1'] == '')?0:$row['s_p2_capital_money_ny1'];

		$s_total_money_ny2      = ($row['s_total_money_ny2']      == '')?0:$row['s_total_money_ny2'];  // NULL則填入0
		$s_p1_money_ny2         = ($row['s_p1_money_ny2']         == '')?0:$row['s_p1_money_ny2'];
		$s_p1_current_cnt_ny2   = ($row['s_p1_current_cnt_ny2']   == '')?0:$row['s_p1_current_cnt_ny2'];
		$s_p1_current_money_ny2 = ($row['s_p1_current_money_ny2'] == '')?0:$row['s_p1_current_money_ny2'];
		$s_p1_capital_cnt_ny2   = ($row['s_p1_capital_cnt_ny2']   == '')?0:$row['s_p1_capital_cnt_ny2'];
		$s_p1_capital_money_ny2 = ($row['s_p1_capital_money_ny2'] == '')?0:$row['s_p1_capital_money_ny2'];
		$s_p2_money_ny2         = ($row['s_p2_money_ny2']         == '')?0:$row['s_p2_money_ny2'];
		$s_p2_current_cnt_ny2   = ($row['s_p2_current_cnt_ny2']   == '')?0:$row['s_p2_current_cnt_ny2'];
		$s_p2_current_money_ny2 = ($row['s_p2_current_money_ny2'] == '')?0:$row['s_p2_current_money_ny2'];
		$s_p2_capital_cnt_ny2   = ($row['s_p2_capital_cnt_ny2']   == '')?0:$row['s_p2_capital_cnt_ny2'];
		$s_p2_capital_money_ny2 = ($row['s_p2_capital_money_ny2'] == '')?0:$row['s_p2_capital_money_ny2'];

		// 加入初複審金額及意見

        $city_total_money = $row['city_total_money'];
        $city_desc        = $row['city_desc'];
        $city_desc_ny1    = $row['city_desc_ny1'];
        $city_desc_ny2    = $row['city_desc_ny2'];
        $city_desc_p2     = $row['city_desc_p2'];
        $city_desc_ny1_p2 = $row['city_desc_ny1_p2'];
        $city_desc_ny2_p2 = $row['city_desc_ny2_p2'];

        $city_p1_money         = $row['city_p1_money'];
        $city_p1_current_cnt   = $row['city_p1_current_cnt'];
        $city_p1_current_money = $row['city_p1_current_money'];
        $city_p1_capital_cnt   = $row['city_p1_capital_cnt'];
        $city_p1_capital_money = $row['city_p1_capital_money'];
        $city_p2_money         = $row['city_p2_money'];
        $city_p2_current_cnt   = $row['city_p2_current_cnt'];
        $city_p2_current_money = $row['city_p2_current_money'];
        $city_p2_capital_cnt   = $row['city_p2_capital_cnt'];
        $city_p2_capital_money = $row['city_p2_capital_money'];

        $city_total_money_ny1      = $row['city_total_money_ny1'];
        $city_p1_money_ny1         = $row['city_p1_money_ny1'];
        $city_p1_current_cnt_ny1   = $row['city_p1_current_cnt_ny1'];
        $city_p1_current_money_ny1 = $row['city_p1_current_money_ny1'];
        $city_p1_capital_cnt_ny1   = $row['city_p1_capital_cnt_ny1'];
        $city_p1_capital_money_ny1 = $row['city_p1_capital_money_ny1'];
        $city_p2_money_ny1         = $row['city_p2_money_ny1'];
        $city_p2_current_cnt_ny1   = $row['city_p2_current_cnt_ny1'];
        $city_p2_current_money_ny1 = $row['city_p2_current_money_ny1'];
        $city_p2_capital_cnt_ny1   = $row['city_p2_capital_cnt_ny1'];
        $city_p2_capital_money_ny1 = $row['city_p2_capital_money_ny1'];
        $city_total_money_ny2      = $row['city_total_money_ny2'];

        $city_p1_money_ny2         = $row['city_p1_money_ny2'];
        $city_p1_current_cnt_ny2   = $row['city_p1_current_cnt_ny2'];
        $city_p1_current_money_ny2 = $row['city_p1_current_money_ny2'];
        $city_p1_capital_cnt_ny2   = $row['city_p1_capital_cnt_ny2'];
        $city_p1_capital_money_ny2 = $row['city_p1_capital_money_ny2'];
        $city_p2_money_ny2         = $row['city_p2_money_ny2'];
        $city_p2_current_cnt_ny2   = $row['city_p2_current_cnt_ny2'];
        $city_p2_current_money_ny2 = $row['city_p2_current_money_ny2'];
        $city_p2_capital_cnt_ny2   = $row['city_p2_capital_cnt_ny2'];
        $city_p2_capital_money_ny2 = $row['city_p2_capital_money_ny2'];
        $city_approved             = $row['city_approved'];
        $city_approved_id          = $row['city_approved_id'];

        $edu_total_money = $row['edu_total_money'];
        $edu_desc        = $row['edu_desc'];
        $edu_desc_ny1    = $row['edu_desc_ny1'];
        $edu_desc_ny2    = $row['edu_desc_ny2'];
        $edu_desc_p2     = $row['edu_desc_p2'];
        $edu_desc_ny1_p2 = $row['edu_desc_ny1_p2'];
        $edu_desc_ny2_p2 = $row['edu_desc_ny2_p2'];

        $edu_p1_money         = $row['edu_p1_money'];
        $edu_p1_current_cnt   = $row['edu_p1_current_cnt'];
        $edu_p1_current_money = $row['edu_p1_current_money'];
        $edu_p1_capital_cnt   = $row['edu_p1_capital_cnt'];
        $edu_p1_capital_money = $row['edu_p1_capital_money'];
        $edu_p2_money         = $row['edu_p2_money'];
        $edu_p2_current_cnt   = $row['edu_p2_current_cnt'];
        $edu_p2_current_money = $row['edu_p2_current_money'];
        $edu_p2_capital_cnt   = $row['edu_p2_capital_cnt'];
        $edu_p2_capital_money = $row['edu_p2_capital_money'];

        $edu_total_money_ny1      = $row['edu_total_money_ny1'];
        $edu_p1_money_ny1         = $row['edu_p1_money_ny1'];
        $edu_p1_current_cnt_ny1   = $row['edu_p1_current_cnt_ny1'];
        $edu_p1_current_money_ny1 = $row['edu_p1_current_money_ny1'];
        $edu_p1_capital_cnt_ny1   = $row['edu_p1_capital_cnt_ny1'];
        $edu_p1_capital_money_ny1 = $row['edu_p1_capital_money_ny1'];
        $edu_p2_money_ny1         = $row['edu_p2_money_ny1'];
        $edu_p2_current_cnt_ny1   = $row['edu_p2_current_cnt_ny1'];
        $edu_p2_current_money_ny1 = $row['edu_p2_current_money_ny1'];
        $edu_p2_capital_cnt_ny1   = $row['edu_p2_capital_cnt_ny1'];
        $edu_p2_capital_money_ny1 = $row['edu_p2_capital_money_ny1'];

        $edu_total_money_ny2      = $row['edu_total_money_ny2'];
        $edu_p1_money_ny2         = $row['edu_p1_money_ny2'];
        $edu_p1_current_cnt_ny2   = $row['edu_p1_current_cnt_ny2'];
        $edu_p1_current_money_ny2 = $row['edu_p1_current_money_ny2'];
        $edu_p1_capital_cnt_ny2   = $row['edu_p1_capital_cnt_ny2'];
        $edu_p1_capital_money_ny2 = $row['edu_p1_capital_money_ny2'];
        $edu_p2_money_ny2         = $row['edu_p2_money_ny2'];
        $edu_p2_current_cnt_ny2   = $row['edu_p2_current_cnt_ny2'];
        $edu_p2_current_money_ny2 = $row['edu_p2_current_money_ny2'];
        $edu_p2_capital_cnt_ny2   = $row['edu_p2_capital_cnt_ny2'];
        $edu_p2_capital_money_ny2 = $row['edu_p2_capital_money_ny2'];
        $edu_approved             = $row['edu_approved'];
        $edu_approved_id          = $row['edu_approved_id'];

		// a2
		$sy_seq      = $row['sy_seq'];
		$account     = $row['account'];
		$school_year = $row['school_year'];

		// a2_item 的資料
		$seq_no      = $row['seq_no'];
		$main_seq    = $row['main_seq'];
		$section     = $row['section'];
		$subject     = $row['subject'];
		$category    = $row['category'];
		$item        = $row['item'];
		$unit        = $row['unit'];
		$price       = $row['price'];
		$amount      = $row['amount'];
		$s_money     = $row['s_money'];
		$s_desc      = $row['s_desc'];
		$city_money  = $row['city_money'];
		$city_delete = $row['city_delete'];

		$edu_delete = $row['edu_delete'];
        $edu_money  = $row['edu_money'];

        $seq_no_ny = $row['seq_no_ny'];  // schooldata_year 的 seq_no

        $main_seq_ny       = $row['main_seq_ny'];
		$a2_item_seq_no_ny = $row['a2_item_seq_no_ny'];  // a2_item 的 seq_no
		$city_money_ny     = $row['city_money_ny'];
		$city_delete_ny    = $row['city_delete_ny'];
		$edu_delete_ny     = $row['edu_delete_ny'];
        $edu_money_ny      = $row['edu_money_ny'];

		$a2_ny_inherit_year = $row['a2_ny_inherit_year'];

		$sql_update_item = 	" UPDATE $table_name_item                   ".
							"    SET city_money  = NULL                 ".
							"      , city_delete = NULL                 ".
							"      , edu_money   = NULL                 ".
							"      , edu_delete  = NULL                 ".
							"  WHERE seq_no      = '$a2_item_seq_no_ny' ".
							"    AND main_seq    = '$seq_no_ny';        ";

		mysql_query($sql_update_item );
	}

	$insert_sql =	" INSERT INTO alc_education_features        ".
					"             ( sy_seq                      ".
					"             , account                     ".
					"             , school_year )               ".
					"      VALUES ( '$seq_no_ny'                ".
					"             , '$username'                 ".
					"             , '".($school_year + 1)."' ); ";  // 寫入時要寫今年的資料，所以要+1

	mysql_query($insert_sql);

	$this_inherit_year = substr($a2_ny_inherit_year, 0, 3);  // 這個變數是要取計畫繼承的年度就好，不要取到change

	$sql_update =	" UPDATE $table_name                                                   ".
					"    SET s_total_money             = '$s_total_money_ny1' 	           ".
					"      , s_total_money_ny1         = '$s_total_money_ny2'              ".
					"      , p_num                     = '$p_num'                          ".
					"      , p1_name                   = '$p1_name'                        ".
					"      , s_p1_student              = '$s_p1_student'                   ".
					"      , s_p1_target               = '$s_p1_target'                    ".
					"      , p1_IsContinue             = '$p1_IsContinue'                  ".
					"      , p1_ContinueYear           = '".($p1_ContinueYear + 1)."'      ".  // 延續辦理直接多加1年
					"      , s_p1_money                = '$s_p1_money_ny1'                 ".
					"      , s_p1_current_money        = '$s_p1_current_money_ny1'         ".
					"      , s_p1_capital_money        = '$s_p1_capital_money_ny1'         ".
					"      , s_p1_money_ny1            = '$s_p1_money_ny2'                 ".
					"      , s_p1_current_money_ny1    = '$s_p1_current_money_ny2'         ".
					"      , s_p1_capital_money_ny1    = '$s_p1_capital_money_ny2'         ".
					"      , p2_name                   = '$p2_name'                        ".
					"      , s_p2_student              = '$s_p2_student'                   ".
					"      , s_p2_target               = '$s_p2_target'                    ".
					"      , p2_IsContinue             = '$p2_IsContinue'                  ".
					"      , p2_ContinueYear           = '".($p2_ContinueYear + 1)."'      ".  // 延續辦理直接多加1年
					"      , s_p2_money                = '$s_p2_money_ny1'                 ".
					"      , s_p2_current_money        = '$s_p2_current_money_ny1'         ".
					"      , s_p2_capital_money        = '$s_p2_capital_money_ny1'         ".
					"      , s_p2_money_ny1            = '$s_p2_money_ny2'                 ".
					"      , s_p2_current_money_ny1    = '$s_p2_current_money_ny2'         ".
					"      , s_p2_capital_money_ny1    = '$s_p2_capital_money_ny2'         ".
					"      , city_total_money          = NULL                              ".  // 初複審金額及意見
					"      , city_desc                 = NULL                              ".  // 初審意見
					"      , city_desc_ny1             = NULL                              ".
					"      , city_desc_p2              = NULL                              ".
					"      , city_desc_ny1_p2          = NULL                              ".
					"      , city_p1_money             = NULL                              ".
					"      , city_p1_current_cnt       = NULL                              ".
					"      , city_p1_current_money     = NULL                              ".
					"      , city_p1_capital_cnt       = NULL                              ".
					"      , city_p1_capital_money     = NULL                              ".
					"      , city_p2_money             = NULL                              ".
					"      , city_p2_current_cnt       = NULL                              ".
					"      , city_p2_current_money     = NULL                              ".
					"      , city_p2_capital_cnt       = NULL                              ".
					"      , city_p2_capital_money     = NULL                              ".
					"      , city_total_money_ny1      = NULL                              ".
					"      , city_p1_money_ny1         = NULL                              ".
					"      , city_p1_current_cnt_ny1   = NULL                              ".
					"      , city_p1_current_money_ny1 = NULL                              ".
					"      , city_p1_capital_cnt_ny1   = NULL                              ".
					"      , city_p1_capital_money_ny1 = NULL                              ".
					"      , city_p2_money_ny1         = NULL                              ".
					"      , city_p2_current_cnt_ny1   = NULL                              ".
					"      , city_p2_current_money_ny1 = NULL                              ".
					"      , city_p2_capital_cnt_ny1   = NULL                              ".
					"      , city_p2_capital_money_ny1 = NULL                              ".
					"      , city_approved             = NULL                              ".
					"      , city_approved_id          = NULL                              ".
					"      , edu_total_money           = NULL                              ".
					"      , edu_desc                  = NULL                              ".  // 複審意見
					"      , edu_desc_ny1              = NULL                              ".
					"      , edu_desc_p2               = NULL                              ".
					"      , edu_desc_ny1_p2           = NULL                              ".
					"      , edu_p1_money              = NULL                              ".
					"      , edu_p1_current_cnt        = NULL                              ".
					"      , edu_p1_current_money      = NULL                              ".
					"      , edu_p1_capital_cnt        = NULL                              ".
					"      , edu_p1_capital_money      = NULL                              ".
					"      , edu_p2_money              = NULL                              ".
					"      , edu_p2_current_cnt        = NULL                              ".
					"      , edu_p2_current_money      = NULL                              ".
					"      , edu_p2_capital_cnt        = NULL                              ".
					"      , edu_p2_capital_money      = NULL                              ".
					"      , edu_total_money_ny1       = NULL                              ".
					"      , edu_p1_money_ny1          = NULL                              ".
					"      , edu_p1_current_cnt_ny1    = NULL                              ".
					"      , edu_p1_current_money_ny1  = NULL                              ".
					"      , edu_p1_capital_cnt_ny1    = NULL                              ".
					"      , edu_p1_capital_money_ny1  = NULL                              ".
					"      , edu_p2_money_ny1          = NULL                              ".
					"      , edu_p2_current_cnt_ny1    = NULL                              ".
					"      , edu_p2_current_money_ny1  = NULL                              ".
					"      , edu_p2_capital_cnt_ny1    = NULL                              ".
					"      , edu_p2_capital_money_ny1  = NULL                              ".
					"      , edu_approved              = NULL                              ".
					"      , edu_approved_id           = NULL                              ".
					"      , inherit_year              = '"."$this_inherit_year"."_change' ".  // 字尾加 change
					"  WHERE sy_seq                    = '$seq_no_ny';                     ";

	mysql_query($sql_update);

	if(mysql_query($sql))  // 新增資料進資料庫語法
	{
		echo '新增成功!';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=school_write_a2_conti_3.php>';
	}
	else
	{
		echo '新增失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=school_write_allowance.php>';
		echo (mysql_errno() != 0)?"5 : ".$sql."<br />".mysql_errno().mysql_error()."<br />----<br />":"";
	}
?>