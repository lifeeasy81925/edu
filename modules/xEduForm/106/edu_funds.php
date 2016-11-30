<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";

	include "../../function/config_for_106.php"; //本年度基本設定

	$op = $_GET["op"];

	$get_id = $_GET['acc'];

	if($get_id != "")
		$username = $get_id;

	$title = array  ( ""
					, "補助項目一：推展親職教育活動"
					, "補助項目二：補助學校發展教育特色"	
					, "補助項目三：充實學校基本教學設備"
					, "補助項目四：發展原住民教育文化特色及充實設備器材"
					, "補助項目五：補助交通不便地區學校交通車"
					, "補助項目六：整修學校社區化活動場所" );

	$table_name = array ( ""
						, "alc_parenting_education"
						, "alc_education_features"
						, "alc_teaching_equipment"
						, "alc_aboriginal_education"
						, "alc_transport_car"
						, "alc_school_activity");

	$title_a = $title[$op]; //申請項目名稱
	$table_name_item = $table_name[$op]."_item"; //資料表名稱

	//顯示控制 show=顯示 空白=不顯示
	$a1_p1 = "";
	$a2_p1 = "";
	$a2_p2 = "";
	$a3_p1 = "";
	$a4_p1 = "";
	$a4_p2 = "";
	$a5_p1 = "";
	$a6_p1 = "";
	$table_1 = "";
	$table_2 = "";

	$sql = "select * from $table_name[$op] where account = '$username' and school_year = '$school_year' ";

	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$main_seq = $row['sy_seq'];

		switch($op)
		{
			case 1:
				$s_total_money = ($row['s_total_money'] == '')?0:$row['s_total_money']; //NULL則填入0
				$s_p1_times = ($row['s_p1_times'] == '')?0:$row['s_p1_times'];
				$s_p1_people = ($row['s_p1_people'] == '')?0:$row['s_p1_people'];
				$s_p1_money = ($row['s_p1_money'] == '')?0:$row['s_p1_money'];
				$s_p2_people = ($row['s_p2_people'] == '')?0:$row['s_p2_people'];
				$s_p2_money = ($row['s_p2_money'] == '')?0:$row['s_p2_money'];
				$s_p2_student = ($row['s_p2_student'] == '')?0:$row['s_p2_student'];

				$city_total_money = ($row['city_total_money'] == '')?0:$row['city_total_money'];
				$city_p1_money = ($row['city_p1_money'] == '')?0:$row['city_p1_money'];
				$city_p1_times = ($row['city_p1_times'] == '')?0:$row['city_p1_times'];
				$city_p2_money = ($row['city_p2_money'] == '')?0:$row['city_p2_money'];
				$city_p2_people = ($row['city_p2_people'] == '')?0:$row['city_p2_people'];

				$edu_total_money = ($row['edu_total_money'] == '')?0:$row['edu_total_money'];
				$edu_p1_money = ($row['edu_p1_money'] == '')?0:$row['edu_p1_money'];
				$edu_p1_times = ($row['edu_p1_times'] == '')?0:$row['edu_p1_times'];
				$edu_p2_money = ($row['edu_p2_money'] == '')?0:$row['edu_p2_money'];
				$edu_p2_people = ($row['edu_p2_people'] == '')?0:$row['edu_p2_people'];

				$city_desc = $row['city_desc'];
				$edu_desc = $row['edu_desc'];

				$a1_p1 = "show";
				$table_1 = "show";
				break;

			case 2:
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

				$s_total_money = ($row['s_total_money'] == '')?0:$row['s_total_money']; //NULL則填入0
				$s_p1_money = ($row['s_p1_money'] == '')?0:$row['s_p1_money']; //NULL則填入0
				$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
				$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];
				$s_p2_money = ($row['s_p2_money'] == '')?0:$row['s_p2_money'];
				$s_p2_current_money = ($row['s_p2_current_money'] == '')?0:$row['s_p2_current_money'];
				$s_p2_capital_money = ($row['s_p2_capital_money'] == '')?0:$row['s_p2_capital_money'];

				$s_total_money_ny1 = ($row['s_total_money_ny1'] == '')?0:$row['s_total_money_ny1']; //NULL則填入0
				$s_p1_money_ny1 = ($row['s_p1_money_ny1'] == '')?0:$row['s_p1_money_ny1']; //NULL則填入0
				$s_p1_current_money_ny1 = ($row['s_p1_current_money_ny1'] == '')?0:$row['s_p1_current_money_ny1'];
				$s_p1_capital_money_ny1 = ($row['s_p1_capital_money_ny1'] == '')?0:$row['s_p1_capital_money_ny1'];
				$s_p2_money_ny1 = ($row['s_p2_money_ny1'] == '')?0:$row['s_p2_money_ny1'];
				$s_p2_current_money_ny1 = ($row['s_p2_current_money_ny1'] == '')?0:$row['s_p2_current_money_ny1'];
				$s_p2_capital_money_ny1 = ($row['s_p2_capital_money_ny1'] == '')?0:$row['s_p2_capital_money_ny1'];

				$s_total_money_ny2 = ($row['s_total_money_ny2'] == '')?0:$row['s_total_money_ny2']; //NULL則填入0
				$s_p1_money_ny2 = ($row['s_p1_money_ny2'] == '')?0:$row['s_p1_money_ny2']; //NULL則填入0
				$s_p1_current_money_ny2 = ($row['s_p1_current_money_ny2'] == '')?0:$row['s_p1_current_money_ny2'];
				$s_p1_capital_money_ny2 = ($row['s_p1_capital_money_ny2'] == '')?0:$row['s_p1_capital_money_ny2'];
				$s_p2_money_ny2 = ($row['s_p2_money_ny2'] == '')?0:$row['s_p2_money_ny2'];
				$s_p2_current_money_ny2 = ($row['s_p2_current_money_ny2'] == '')?0:$row['s_p2_current_money_ny2'];
				$s_p2_capital_money_ny2 = ($row['s_p2_capital_money_ny2'] == '')?0:$row['s_p2_capital_money_ny2'];

				$city_total_money = ($row['city_total_money'] == '')?0:$row['city_total_money']; //NULL則填入學校資料
				$city_p1_money = ($row['city_p1_money'] == '')?0:$row['city_p1_money'];
				$city_p1_current_money = ($row['city_p1_current_money'] == '')?0:$row['city_p1_current_money'];
				$city_p1_capital_money = ($row['city_p1_capital_money'] == '')?0:$row['city_p1_capital_money'];
				$city_p2_money = ($row['city_p2_money'] == '')?0:$row['city_p2_money'];
				$city_p2_current_money = ($row['city_p2_current_money'] == '')?0:$row['city_p2_current_money'];
				$city_p2_capital_money = ($row['city_p2_capital_money'] == '')?0:$row['city_p2_capital_money'];

				$city_total_money_ny1 = ($row['city_total_money_ny1'] == '')?0:$row['city_total_money_ny1']; //NULL則填入學校資料
				$city_p1_money_ny1 = ($row['city_p1_money_ny1'] == '')?0:$row['city_p1_money_ny1'];
				$city_p1_current_money_ny1 = ($row['city_p1_current_money_ny1'] == '')?0:$row['city_p1_current_money_ny1'];
				$city_p1_capital_money_ny1 = ($row['city_p1_capital_money_ny1'] == '')?0:$row['city_p1_capital_money_ny1'];
				$city_p2_money_ny1 = ($row['city_p2_money_ny1'] == '')?0:$row['city_p2_money_ny1'];
				$city_p2_current_money_ny1 = ($row['city_p2_current_money_ny1'] == '')?0:$row['city_p2_current_money_ny1'];
				$city_p2_capital_money_ny1 = ($row['city_p2_capital_money_ny1'] == '')?0:$row['city_p2_capital_money_ny1'];

				$city_total_money_ny2 = ($row['city_total_money_ny2'] == '')?0:$row['city_total_money_ny2']; //NULL則填入學校資料
				$city_p1_money_ny2 = ($row['city_p1_money_ny2'] == '')?0:$row['city_p1_money_ny2'];
				$city_p1_current_money_ny2 = ($row['city_p1_current_money_ny2'] == '')?0:$row['city_p1_current_money_ny2'];
				$city_p1_capital_money_ny2 = ($row['city_p1_capital_money_ny2'] == '')?0:$row['city_p1_capital_money_ny2'];
				$city_p2_money_ny2 = ($row['city_p2_money_ny2'] == '')?0:$row['city_p2_money_ny2'];
				$city_p2_current_money_ny2 = ($row['city_p2_current_money_ny2'] == '')?0:$row['city_p2_current_money_ny2'];
				$city_p2_capital_money_ny2 = ($row['city_p2_capital_money_ny2'] == '')?0:$row['city_p2_capital_money_ny2'];

				$city_desc = $row['city_desc'];
				$city_desc_ny1 = $row['city_desc_ny1'];
				$city_desc_ny2 = $row['city_desc_ny2'];
				$city_desc_p2 = $row['city_desc_p2'];
				$city_desc_ny1_p2 = $row['city_desc_ny1_p2'];
				$city_desc_ny2_p2 = $row['city_desc_ny2_p2'];
				$city_approved = $row['city_approved'];

				$edu_total_money = ($row['edu_total_money'] == '')?0:$row['edu_total_money']; //NULL則填入學校資料
				$edu_p1_money = ($row['edu_p1_money'] == '')?0:$row['edu_p1_money'];
				$edu_p1_current_money = ($row['edu_p1_current_money'] == '')?0:$row['edu_p1_current_money'];
				$edu_p1_capital_money = ($row['edu_p1_capital_money'] == '')?0:$row['edu_p1_capital_money'];
				$edu_p2_money = ($row['edu_p2_money'] == '')?0:$row['edu_p2_money'];
				$edu_p2_current_money = ($row['edu_p2_current_money'] == '')?0:$row['edu_p2_current_money'];
				$edu_p2_capital_money = ($row['edu_p2_capital_money'] == '')?0:$row['edu_p2_capital_money'];

				$edu_total_money_ny1 = ($row['edu_total_money_ny1'] == '')?0:$row['edu_total_money_ny1']; //NULL則填入學校資料
				$edu_p1_money_ny1 = ($row['edu_p1_money_ny1'] == '')?0:$row['edu_p1_money_ny1'];
				$edu_p1_current_money_ny1 = ($row['edu_p1_current_money_ny1'] == '')?0:$row['edu_p1_current_money_ny1'];
				$edu_p1_capital_money_ny1 = ($row['edu_p1_capital_money_ny1'] == '')?0:$row['edu_p1_capital_money_ny1'];
				$edu_p2_money_ny1 = ($row['edu_p2_money_ny1'] == '')?0:$row['edu_p2_money_ny1'];
				$edu_p2_current_money_ny1 = ($row['edu_p2_current_money_ny1'] == '')?0:$row['edu_p2_current_money_ny1'];
				$edu_p2_capital_money_ny1 = ($row['edu_p2_capital_money_ny1'] == '')?0:$row['edu_p2_capital_money_ny1'];

				$edu_total_money_ny2 = ($row['edu_total_money_ny2'] == '')?0:$row['edu_total_money_ny2']; //NULL則填入學校資料
				$edu_p1_money_ny2 = ($row['edu_p1_money_ny2'] == '')?0:$row['edu_p1_money_ny2'];
				$edu_p1_current_money_ny2 = ($row['edu_p1_current_money_ny2'] == '')?0:$row['edu_p1_current_money_ny2'];
				$edu_p1_capital_money_ny2 = ($row['edu_p1_capital_money_ny2'] == '')?0:$row['edu_p1_capital_money_ny2'];
				$edu_p2_money_ny2 = ($row['edu_p2_money_ny2'] == '')?0:$row['edu_p2_money_ny2'];
				$edu_p2_current_money_ny2 = ($row['edu_p2_current_money_ny2'] == '')?0:$row['edu_p2_current_money_ny2'];
				$edu_p2_capital_money_ny2 = ($row['edu_p2_capital_money_ny2'] == '')?0:$row['edu_p2_capital_money_ny2'];

				$edu_desc = $row['edu_desc'];
				$edu_desc_ny1 = $row['edu_desc_ny1'];
				$edu_desc_ny2 = $row['edu_desc_ny2'];
				$edu_desc_p2 = $row['edu_desc_p2'];
				$edu_desc_ny1_p2 = $row['edu_desc_ny1_p2'];
				$edu_desc_ny2_p2 = $row['edu_desc_ny2_p2'];
				$edu_approved = $row['edu_approved'];

				$a2_p1 = "show";
				$a2_p1_ny1 = ($s_p1_money_ny1 > 0)?"show":"";
				$a2_p1_ny2 = ($s_p1_money_ny2 > 0)?"show":"";

				$a2_p2 = ($s_p2_money > 0)?"show":"";
				$a2_p2_ny1 = ($s_p2_money_ny1 > 0)?"show":"";
				$a2_p2_ny2 = ($s_p2_money_ny2 > 0)?"show":"";

				$table_1 = "show";
				$table_1_ny1 = ($s_p1_money_ny1 > 0)?"show":"";
				$table_1_ny2 = ($s_p1_money_ny2 > 0)?"show":"";

				$table_2 = ($s_p2_money > 0)?"show":"";
				$table_2_ny1 = ($s_p2_money_ny1 > 0)?"show":"";
				$table_2_ny2 = ($s_p2_money_ny2 > 0)?"show":"";
				break;

			case 3:
				$apply_last3year = $row['apply_last3year'];
				$s_total_money = ($row['s_total_money'] == '')?0:$row['s_total_money']; //NULL則填入0
				$s_p1_money = ($row['s_p1_money'] == '')?0:$row['s_p1_money']; //NULL則填入0
				$s_p1_current_cnt = ($row['s_p1_current_cnt'] == '')?0:$row['s_p1_current_cnt'];
				$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
				$s_p1_capital_cnt = ($row['s_p1_capital_cnt'] == '')?0:$row['s_p1_capital_cnt'];
				$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];

				$city_total_money = ($row['city_total_money'] == '')?0:$row['city_total_money'];
				$city_p1_money = ($row['city_p1_money'] == '')?0:$row['city_p1_money'];
				$city_p1_current_money = ($row['city_p1_current_money'] == '')?0:$row['city_p1_current_money'];
				$city_p1_capital_money = ($row['city_p1_capital_money'] == '')?0:$row['city_p1_capital_money'];

				$edu_total_money = ($row['edu_total_money'] == '')?0:$row['edu_total_money'];
				$edu_p1_money = ($row['edu_p1_money'] == '')?0:$row['edu_p1_money'];
				$edu_p1_current_money = ($row['edu_p1_current_money'] == '')?0:$row['edu_p1_current_money'];
				$edu_p1_capital_money = ($row['edu_p1_capital_money'] == '')?0:$row['edu_p1_capital_money'];

				$city_desc = $row['city_desc'];
				$edu_desc = $row['edu_desc'];

				$a3_p1 = "show";
				$table_1 = "show";
				break;

			case 4:
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

				$s_total_money = ($row['s_total_money'] == '')?0:$row['s_total_money']; //NULL則填入0
				$s_p1_money = ($row['s_p1_money'] == '')?0:$row['s_p1_money']; //NULL則填入0
				$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
				$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];
				$s_p2_money = ($row['s_p2_money'] == '')?0:$row['s_p2_money'];
				$s_p2_current_money = ($row['s_p2_current_money'] == '')?0:$row['s_p2_current_money'];
				$s_p2_capital_money = ($row['s_p2_capital_money'] == '')?0:$row['s_p2_capital_money'];

				$s_total_money_ny1 = ($row['s_total_money_ny1'] == '')?0:$row['s_total_money_ny1']; //NULL則填入0
				$s_p1_money_ny1 = ($row['s_p1_money_ny1'] == '')?0:$row['s_p1_money_ny1']; //NULL則填入0
				$s_p1_current_money_ny1 = ($row['s_p1_current_money_ny1'] == '')?0:$row['s_p1_current_money_ny1'];
				$s_p1_capital_money_ny1 = ($row['s_p1_capital_money_ny1'] == '')?0:$row['s_p1_capital_money_ny1'];
				$s_p2_money_ny1 = ($row['s_p2_money_ny1'] == '')?0:$row['s_p2_money_ny1'];
				$s_p2_current_money_ny1 = ($row['s_p2_current_money_ny1'] == '')?0:$row['s_p2_current_money_ny1'];
				$s_p2_capital_money_ny1 = ($row['s_p2_capital_money_ny1'] == '')?0:$row['s_p2_capital_money_ny1'];

				$s_total_money_ny2 = ($row['s_total_money_ny2'] == '')?0:$row['s_total_money_ny2']; //NULL則填入0
				$s_p1_money_ny2 = ($row['s_p1_money_ny2'] == '')?0:$row['s_p1_money_ny2']; //NULL則填入0
				$s_p1_current_money_ny2 = ($row['s_p1_current_money_ny2'] == '')?0:$row['s_p1_current_money_ny2'];
				$s_p1_capital_money_ny2 = ($row['s_p1_capital_money_ny2'] == '')?0:$row['s_p1_capital_money_ny2'];
				$s_p2_money_ny2 = ($row['s_p2_money_ny2'] == '')?0:$row['s_p2_money_ny2'];
				$s_p2_current_money_ny2 = ($row['s_p2_current_money_ny2'] == '')?0:$row['s_p2_current_money_ny2'];
				$s_p2_capital_money_ny2 = ($row['s_p2_capital_money_ny2'] == '')?0:$row['s_p2_capital_money_ny2'];

				$city_total_money = ($row['city_total_money'] == '')?0:$row['city_total_money']; //NULL則填入學校資料
				$city_p1_money = ($row['city_p1_money'] == '')?0:$row['city_p1_money'];
				$city_p1_current_money = ($row['city_p1_current_money'] == '')?0:$row['city_p1_current_money'];
				$city_p1_capital_money = ($row['city_p1_capital_money'] == '')?0:$row['city_p1_capital_money'];
				$city_p2_money = ($row['city_p2_money'] == '')?0:$row['city_p2_money'];
				$city_p2_current_money = ($row['city_p2_current_money'] == '')?0:$row['city_p2_current_money'];
				$city_p2_capital_money = ($row['city_p2_capital_money'] == '')?0:$row['city_p2_capital_money'];

				$city_total_money_ny1 = ($row['city_total_money_ny1'] == '')?0:$row['city_total_money_ny1']; //NULL則填入學校資料
				$city_p1_money_ny1 = ($row['city_p1_money_ny1'] == '')?0:$row['city_p1_money_ny1'];
				$city_p1_current_money_ny1 = ($row['city_p1_current_money_ny1'] == '')?0:$row['city_p1_current_money_ny1'];
				$city_p1_capital_money_ny1 = ($row['city_p1_capital_money_ny1'] == '')?0:$row['city_p1_capital_money_ny1'];
				$city_p2_money_ny1 = ($row['city_p2_money_ny1'] == '')?0:$row['city_p2_money_ny1'];
				$city_p2_current_money_ny1 = ($row['city_p2_current_money_ny1'] == '')?0:$row['city_p2_current_money_ny1'];
				$city_p2_capital_money_ny1 = ($row['city_p2_capital_money_ny1'] == '')?0:$row['city_p2_capital_money_ny1'];

				$city_total_money_ny2 = ($row['city_total_money_ny2'] == '')?0:$row['city_total_money_ny2']; //NULL則填入學校資料
				$city_p1_money_ny2 = ($row['city_p1_money_ny2'] == '')?0:$row['city_p1_money_ny2'];
				$city_p1_current_money_ny2 = ($row['city_p1_current_money_ny2'] == '')?0:$row['city_p1_current_money_ny2'];
				$city_p1_capital_money_ny2 = ($row['city_p1_capital_money_ny2'] == '')?0:$row['city_p1_capital_money_ny2'];
				$city_p2_money_ny2 = ($row['city_p2_money_ny2'] == '')?0:$row['city_p2_money_ny2'];
				$city_p2_current_money_ny2 = ($row['city_p2_current_money_ny2'] == '')?0:$row['city_p2_current_money_ny2'];
				$city_p2_capital_money_ny2 = ($row['city_p2_capital_money_ny2'] == '')?0:$row['city_p2_capital_money_ny2'];

				$city_desc = $row['city_desc'];
				$city_desc_ny1 = $row['city_desc_ny1'];
				$city_desc_ny2 = $row['city_desc_ny2'];
				$city_desc_p2 = $row['city_desc_p2'];
				$city_desc_ny1_p2 = $row['city_desc_ny1_p2'];
				$city_desc_ny2_p2 = $row['city_desc_ny2_p2'];
				$city_approved = $row['city_approved'];

				$edu_total_money = ($row['edu_total_money'] == '')?0:$row['edu_total_money']; //NULL則填入學校資料
				$edu_p1_money = ($row['edu_p1_money'] == '')?0:$row['edu_p1_money'];
				$edu_p1_current_money = ($row['edu_p1_current_money'] == '')?0:$row['edu_p1_current_money'];
				$edu_p1_capital_money = ($row['edu_p1_capital_money'] == '')?0:$row['edu_p1_capital_money'];
				$edu_p2_money = ($row['edu_p2_money'] == '')?0:$row['edu_p2_money'];
				$edu_p2_current_money = ($row['edu_p2_current_money'] == '')?0:$row['edu_p2_current_money'];
				$edu_p2_capital_money = ($row['edu_p2_capital_money'] == '')?0:$row['edu_p2_capital_money'];

				$edu_total_money_ny1 = ($row['edu_total_money_ny1'] == '')?0:$row['edu_total_money_ny1']; //NULL則填入學校資料
				$edu_p1_money_ny1 = ($row['edu_p1_money_ny1'] == '')?0:$row['edu_p1_money_ny1'];
				$edu_p1_current_money_ny1 = ($row['edu_p1_current_money_ny1'] == '')?0:$row['edu_p1_current_money_ny1'];
				$edu_p1_capital_money_ny1 = ($row['edu_p1_capital_money_ny1'] == '')?0:$row['edu_p1_capital_money_ny1'];
				$edu_p2_money_ny1 = ($row['edu_p2_money_ny1'] == '')?0:$row['edu_p2_money_ny1'];
				$edu_p2_current_money_ny1 = ($row['edu_p2_current_money_ny1'] == '')?0:$row['edu_p2_current_money_ny1'];
				$edu_p2_capital_money_ny1 = ($row['edu_p2_capital_money_ny1'] == '')?0:$row['edu_p2_capital_money_ny1'];

				$edu_total_money_ny2 = ($row['edu_total_money_ny2'] == '')?0:$row['edu_total_money_ny2']; //NULL則填入學校資料
				$edu_p1_money_ny2 = ($row['edu_p1_money_ny2'] == '')?0:$row['edu_p1_money_ny2'];
				$edu_p1_current_money_ny2 = ($row['edu_p1_current_money_ny2'] == '')?0:$row['edu_p1_current_money_ny2'];
				$edu_p1_capital_money_ny2 = ($row['edu_p1_capital_money_ny2'] == '')?0:$row['edu_p1_capital_money_ny2'];
				$edu_p2_money_ny2 = ($row['edu_p2_money_ny2'] == '')?0:$row['edu_p2_money_ny2'];
				$edu_p2_current_money_ny2 = ($row['edu_p2_current_money_ny2'] == '')?0:$row['edu_p2_current_money_ny2'];
				$edu_p2_capital_money_ny2 = ($row['edu_p2_capital_money_ny2'] == '')?0:$row['edu_p2_capital_money_ny2'];

				$edu_desc = $row['edu_desc'];
				$edu_desc_ny1 = $row['edu_desc_ny1'];
				$edu_desc_ny2 = $row['edu_desc_ny2'];
				$edu_desc_p2 = $row['edu_desc_p2'];
				$edu_desc_ny1_p2 = $row['edu_desc_ny1_p2'];
				$edu_desc_ny2_p2 = $row['edu_desc_ny2_p2'];
				$edu_approved = $row['edu_approved'];

				$a4_p1 = "show";
				$a4_p1_ny1 = ($s_p1_money_ny1 > 0)?"show":"";
				$a4_p1_ny2 = ($s_p1_money_ny2 > 0)?"show":"";

				$a4_p2 = ($s_p2_money > 0)?"show":"";
				$a4_p2_ny1 = ($s_p2_money_ny1 > 0)?"show":"";
				$a4_p2_ny2 = ($s_p2_money_ny2 > 0)?"show":"";

				$table_1 = "show";
				$table_1_ny1 = ($s_p1_money_ny1 > 0)?"show":"";
				$table_1_ny2 = ($s_p1_money_ny2 > 0)?"show":"";

				$table_2 = ($s_p2_money > 0)?"show":"";
				$table_2_ny1 = ($s_p2_money_ny1 > 0)?"show":"";
				$table_2_ny2 = ($s_p2_money_ny2 > 0)?"show":"";
				break;

			case 5:
				$s_total_money = ($row['s_total_money'] == '')?0:$row['s_total_money']; //NULL則填入0
				$s_money = $row['s_money'];
				$item = $row['item'];
				$s_people = $row['s_people'];

				$s_boarders = ($row['s_boarders'] == '')?0:$row['s_boarders'];
				$s_no_boarders = ($row['s_no_boarders'] == '')?0:$row['s_no_boarders'];
				$s_boarders_money = ($row['s_boarders_money'] == '')?0:$row['s_boarders_money'];
				$s_no_boarders_money = ($row['s_no_boarders_money'] == '')?0:$row['s_no_boarders_money'];

				$city_total_money = ($row['city_total_money'] == '')?0:$row['city_total_money'];
				$city_money = ($row['city_money'] == '')?0:$row['city_money'];
				$city_boarders_money = ($row['city_boarders_money'] == '')?0:$row['city_boarders_money'];
				$city_no_boarders_money = ($row['city_no_boarders_money'] == '')?0:$row['city_no_boarders_money'];

				$edu_total_money = ($row['edu_total_money'] == '')?0:$row['edu_total_money'];
				$edu_money = ($row['edu_money'] == '')?0:$row['edu_money'];
				$edu_boarders_money = ($row['edu_boarders_money'] == '')?0:$row['edu_boarders_money'];
				$edu_no_boarders_money = ($row['edu_no_boarders_money'] == '')?0:$row['edu_no_boarders_money'];

				$city_desc = $row['city_desc'];
				$edu_desc = $row['edu_desc'];

				$a5_p1 = "show";
				break;

			case 6:
				$p_num = $row['p_num'];
				/*
				補六沒有經常門，但是資本門分 修建 和 設備
				所以資料庫欄位
				原本的 經常門總合 = 修建總合
					   資本門     = 設備總合
				*/
				$s_total_money = ($row['s_total_money'] == '')?0:$row['s_total_money']; //NULL則填入0
				$s_p1_money = ($row['s_p1_money'] == '')?0:$row['s_p1_money']; //NULL則填入0
				$s_p1_current_cnt = ($row['s_p1_current_cnt'] == '')?0:$row['s_p1_current_cnt'];
				$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
				$s_p1_capital_cnt = ($row['s_p1_capital_cnt'] == '')?0:$row['s_p1_capital_cnt'];
				$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];

				$city_total_money = ($row['city_total_money'] == '')?0:$row['city_total_money'];
				$city_p1_money = ($row['city_p1_money'] == '')?0:$row['city_p1_money'];
				$city_p1_current_money = ($row['city_p1_current_money'] == '')?0:$row['city_p1_current_money'];
				$city_p1_capital_money = ($row['city_p1_capital_money'] == '')?0:$row['city_p1_capital_money'];

				$edu_total_money = ($row['edu_total_money'] == '')?0:$row['edu_total_money'];
				$edu_p1_money = ($row['edu_p1_money'] == '')?0:$row['edu_p1_money'];
				$edu_p1_current_money = ($row['edu_p1_current_money'] == '')?0:$row['edu_p1_current_money'];
				$edu_p1_capital_money = ($row['edu_p1_capital_money'] == '')?0:$row['edu_p1_capital_money'];

				$city_desc = $row['city_desc'];
				$edu_desc = $row['edu_desc'];

				$a6_p1 = "show";
				$table_1 = "show";
				break;
		}
	}

	//顯示填寫的資料
	//allowance_table_name => 各補助細項的 table name ex.alc_education_features_item
	//p => 特色 ex.p1 p2
	//main_seq => 各補助的 seq_no，ex.alc_education_features 的 seq_no (注意!!不是 _item 的 seq_no)
	function print_item($allowance_table_name, $p, $main_seq)
	{
		$sql = " select * ".
		   " from $allowance_table_name ".
		   " where main_seq = '$main_seq' ".
		   "   and section = '$p' ". //特色1
		   " order by seq_no asc ";

		$result = mysql_query($sql);
		$num_rows = mysql_num_rows($result); //列數

		$has_outlay = 0; //有無雜支項目
		$idx = 0;

		//順序：顯示已填資料 -> 補滿9項(未滿9時補上空值) -> 顯示雜支
		while($row = mysql_fetch_array($result))
		{
			$seq_no = $row['seq_no'];
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
			$edu_money = $row['edu_money'];
			$edu_delete = $row['edu_delete'];

			if($category != '雜支')
			{
				$idx++;

				echo "<tr>";
				echo "<td width='10' align='center' nowrap='nowrap'>$idx.</td>";
				echo "<td align='left'>$subject</td>"; //科目
				echo "<td align='left'>$category</td>"; //類別
				echo "<td align='left'>$item</td>";
				echo "<td align='center'>$unit</td>";
				echo "<td align='center'>$price</td>";
				echo "<td align='center'>$amount</td>";
				echo "<td align='center'>$s_money</td>";
				echo "<td align='left'>$s_desc</td>";
				echo "<td align='center'>$city_money</td>";
				echo "<td align='center'>$city_delete</td>";
				echo "<td align='center'>$edu_money</td>";
				echo "<td align='center'>$edu_delete</td>";
				echo "</tr>";
			}
			else
			{
				$has_outlay = 1;

				$outlay_subject = $row['subject'];
				$outlay_category = $row['category'];
				$outlay_s_money = $row['s_money'];
				$outlay_s_desc = $row['s_desc'];
				$outlay_city_money = $row['city_money'];
				$outlay_city_delete = $row['city_delete'];
				$outlay_edu_money = $row['edu_money'];
				$outlay_edu_delete = $row['edu_delete'];
			}
		}
		$idx++;
		if($has_outlay == 1) //顯示雜支
		{
			echo "<tr>";
			echo "<td width='10' align='center' nowrap='nowrap'>$idx.</td>";
			echo "<td align='left'>$outlay_subject</td>"; //科目
			echo "<td align='left'>$outlay_category</td>"; //類別
			echo "<td align='left'></td>";
			echo "<td align='left'></td>";
			echo "<td align='left'></td>";
			echo "<td align='left'></td>";
			echo "<td align='center'>$outlay_s_money</td>";
			echo "<td align='left'>$outlay_s_desc</td>";
			echo "<td align='center'>$outlay_city_money</td>";
			echo "<td align='center'>$outlay_city_delete</td>";
			echo "<td align='center'>$outlay_edu_money</td>";
			echo "<td align='center'>$outlay_edu_delete</td>";
			echo "</tr>";
		}
	}
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="print_content">

	<p>
	<font size="+1">
		<b><?=$title_a;?> 經費表</b>
	</font>
	<p>
	
	<?
		$sql =	" SELECT *                     ".
				" FROM   schooldata            ".
				" WHERE  account = '$username' ";
				
		$result = mysql_query($sql);
		
		while($row = mysql_fetch_array($result))
		{
			$cityname   = $row['cityname'];
			$district   = $row['district'];
			$schoolname = $row['schoolname'];
		}
	?>

	學校名稱：<font color="blue"><?=$username." ".$cityname.$district.$schoolname;?></font><p>

	● 本項目申請經費： <?=$s_total_money;?> 元<p>
	● 本項目初審金額： <?=$city_total_money;?> 元<p>
	● 本項目複審金額： <font color=blue><b><?=$edu_total_money;?></b></font> 元<p>
	<p>

	<? if($a1_p1 == 'show') { ?>
		<hr>
		● 親職講座<p>
		　學校申請：經費共計
		<?=$s_p1_money;?> 元，預計辦理親職講座
		<?=$s_p1_times;?> 場，預計參加人數
		<?=$s_p1_people;?> 人。<p>
		　初審金額：經費共計
		<?=$city_p1_money;?> 元，預計辦理親職講座
		<?=$city_p1_times;?> 場。<p>
		　複審金額：經費共計
		<b><?=$edu_p1_money;?></b> 元，預計辦理親職講座
		<b><?=$edu_p1_times;?></b> 場。
	<? } ?>

	<? if($a2_p1 == 'show') { ?>
		<hr>
		● 申請 <?=$p_num;?> 項特色<p>
		● 特色一：<?=$p1_name;?><?=($p1_IsContinue == "Y")?"(本年度為第 ".$p1_ContinueYear." 年辦理)":"";?><p>
		　參加學生人數
		<?=$s_p1_student;?> 人，其中含目標學生
		<?=$s_p1_target;?> 人。<p>
		<?=$school_year;?> 年度<p>
		　學校申請：經費共計
		<?=$s_p1_money;?> 元，其中包含經常門經費
		<?=$s_p1_current_money;?> 元，資本門經費
		<?=$s_p1_capital_money;?> 元。<p>
		　初審金額：經費共計
		<?=$city_p1_money;?> 元，其中包含經常門經費
		<?=$city_p1_current_money;?> 元，資本門經費
		<?=$city_p1_capital_money;?> 元。<p>
		　複審金額：經費共計
		<b><?=$edu_p1_money;?></b> 元，其中包含經常門經費
		<b><?=$edu_p1_current_money;?></b> 元，資本門經費
		<b><?=$edu_p1_capital_money;?></b> 元。
	<? } ?>

	<? if($a3_p1 == 'show') { ?>
		<hr>
		學校申請：經費共計
		<?=$s_p1_money;?> 元，其中包含經常門經費
		<?=$s_p1_current_money;?> 元，資本門經費
		<?=$s_p1_capital_money;?> 元。<p>
		初審金額：經費共計
		<?=$city_p1_money;?> 元，其中包含經常門經費
		<?=$city_p1_current_money;?> 元，資本門經費
		<?=$city_p1_capital_money;?> 元。<p>
		複審金額：經費共計
		<b><?=$edu_p1_money;?></b> 元，其中包含經常門經費
		<b><?=$edu_p1_current_money;?></b> 元，資本門經費
		<b><?=$edu_p1_capital_money;?></b> 元。
	<? } ?>

	<? if($a4_p1 == 'show') { ?>	
		<hr>
		● 申請 <?=$p_num;?> 項特色<p>
		● 特色一：<?=$p1_name;?><?=($p1_IsContinue == "Y")?"(本年度為第 ".$p1_ContinueYear." 年辦理)":"";?><p>
		　參加學生人數
		<?=$s_p1_student;?> 人，其中含目標學生
		<?=$s_p1_target;?> 人。<p>
		<?=$school_year;?> 年度<p>
		　學校申請：經費共計
		<?=$s_p1_money;?> 元，其中包含經常門經費
		<?=$s_p1_current_money;?> 元，資本門經費
		<?=$s_p1_capital_money;?> 元。<p>
		　初審金額：經費共計
		<?=$city_p1_money;?> 元，其中包含經常門經費
		<?=$city_p1_current_money;?> 元，資本門經費
		<?=$city_p1_capital_money;?> 元。<p>
		　複審金額：經費共計
		<b><?=$edu_p1_money;?></b> 元，其中包含經常門經費
		<b><?=$edu_p1_current_money;?></b> 元，資本門經費
		<b><?=$edu_p1_capital_money;?></b> 元。
	<? } ?>

	<? if($a5_p1 == 'show') { ?>
		<hr>
		<table border="0">
			<tr style="display:<?=($item == '租車費')?'':'none';?>;">
				<td>
					補助租車費：<p>
					　搭車人數 <?=($item == '租車費')?$s_people:'';?> 人。<p>
					　　申請經費 <?=($item == '租車費')?$s_money:'';?> 元。<p>
					　　初審金額 <?=($item == '租車費')?$city_money:'';?> 元。<p>
					　　複審金額 <b><?=($item == '租車費')?$edu_money:'';?></b> 元。
				</td>
			</tr>
			<tr style="display:<?=($item == '交通費')?'':'none';?>;">
				<td>
					補助交通費：<p>
					　住宿生
					<?=($item == '交通費')?$s_boarders:'';?> 人：申請經費
					<?=($item == '交通費')?$s_boarders_money:'';?> 元，審核金額
					<?=($item == '交通費')?$city_boarders_money:'';?> 元，複審金額
					<?=($item == '交通費')?$edu_boarders_money:'';?> 元。<p>
					　非住宿生
					<?=($item == '交通費')?$s_no_boarders:'';?> 人：申請經費
					<?=($item == '交通費')?$s_no_boarders_money:'';?> 元，審核金額
					<?=($item == '交通費')?$city_no_boarders_money:'';?> 元，複審金額
					<?=($item == '交通費')?$edu_no_boarders_money:'';?> 元。<p>
					　共計
					<b><?=($item == '交通費')?$s_people:'';?></b> 人：申請經費
					<b><?=($item == '交通費')?$s_money:'';?></b> 元，審核金額
					<b><?=($item == '交通費')?$city_money:'';?></b> 元，複審金額
					<b><?=($item == '交通費')?$edu_money:'';?></b> 元。
				</td>
			</tr>
			<tr style="display:<?=($item == '購置交通車')?'':'none';?>;">
				<td>
					補助購置交通車：<p>
					　 <?=($item == '購置交通車')?$s_people:'';?> 人座交通車。<p>
					　　申請經費 <?=($item == '購置交通車')?$s_money:'';?> 元。<p>
					　　審核金額 <?=($item == '購置交通車')?$city_money:'';?> 元。<p>
					　　複審金額 <b><?=($item == '購置交通車')?$edu_money:'';?></b> 元。<p>
				</td>
			</tr>
		</table>
	<? } ?>

	<? if($a6_p1 == 'show') { ?>
		<hr>
		學校申請：經費共計
		<?=$s_p1_money;?> 元，其中包含修建
		<?=$s_p1_current_money;?> 元，設備
		<?=$s_p1_capital_money;?> 元。<p>
		初審金額：經費共計
		<?=$city_p1_money;?> 元，其中包含修建
		<?=$city_p1_current_money;?> 元，設備
		<?=$city_p1_capital_money;?> 元。<p>
		複審金額：經費共計
		<b><?=$edu_p1_money;?></b> 元，其中包含修建
		<b><?=$edu_p1_current_money;?></b> 元，設備
		<b><?=$edu_p1_capital_money;?></b> 元。
	<? } ?>

	<? if($table_1 == 'show') { ?>
		<p>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC">
			<tr height="25px">
				<td colspan="9" nowrap="nowrap" bgcolor="#99CC66"><?=$title_a;?></td>
				<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FFCC66">縣市初審</td>
				<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FF9966">教育部複審</td>
			</tr>
			<tr height="25px">
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">科目</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">類別</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">項目</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">說明</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFDD66">初審金額</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFDD66">刪減金額</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFCCCC">複審金額</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFCCCC">刪減金額</td>
			</tr>
			<?
				if($op == 2 || $op == 4)
					$p = 'p1_'.$school_year;
				else
					$p = 'p1';

				//顯示特色一 細項
				print_item($table_name_item, $p, $main_seq);
			?>
		</table>
		<p>
	<? } ?>

	<? if($table_1_ny1 == 'show') { ?>
		<?=$school_year+1;?> 年度<p>
		　學校申請：經費共計
		<?=$s_p1_money_ny1;?> 元，其中包含經常門經費
		<?=$s_p1_current_money_ny1;?> 元，資本門經費
		<?=$s_p1_capital_money_ny1;?> 元。<p>
		　初審金額：經費共計
		<?=$city_p1_money_ny1;?> 元，其中包含經常門經費
		<?=$city_p1_current_money_ny1;?> 元，資本門經費
		<?=$city_p1_capital_money_ny1;?> 元。<p>
		　複審金額：經費共計
		<b><?=$edu_p1_money_ny1;?></b> 元，其中包含經常門經費
		<b><?=$edu_p1_current_money_ny1;?></b> 元，資本門經費
		<b><?=$edu_p1_capital_money_ny1;?></b> 元。
		<p>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC">
			<tr height="25px">
				<td colspan="9" align="left" nowrap="nowrap" bgcolor="#99CC66"><?=$title_a;?></td>
				<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FFCC66">縣市初審</td>
				<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FF9966">教育部複審</td>
			</tr>
			<tr height="25px">
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">科目</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">類別</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">項目</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">說明</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFDD66">初審金額</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFDD66">刪減金額</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFCCCC">複審金額</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFCCCC">刪減金額</td>
			</tr>
			<?
				if($op == 2 || $op == 4)
					$p = 'p1_'.($school_year+1);
				else
					$p = 'p1';

				//顯示特色一 細項
				print_item($table_name_item, $p, $main_seq);

			?>
		</table>
		<p>
	<? } ?>

	<? if($table_1_ny2 == 'show') { ?>
		<?=$school_year+2;?> 年度<p>
		　學校申請：經費共計
		<?=$s_p1_money_ny2;?> 元，其中包含經常門經費
		<?=$s_p1_current_money_ny2;?> 元，資本門經費
		<?=$s_p1_capital_money_ny2;?> 元。<p>
		　初審金額：經費共計
		<?=$city_p1_money_ny2;?> 元，其中包含經常門經費
		<?=$city_p1_current_money_ny2;?> 元，資本門經費
		<?=$city_p1_capital_money_ny2;?> 元。<p>
		　複審金額：經費共計
		<b><?=$edu_p1_money_ny2;?></b> 元，其中包含經常門經費
		<b><?=$edu_p1_current_money_ny2;?></b> 元，資本門經費
		<b><?=$edu_p1_capital_money_ny2;?></b> 元。
		<p>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC">
			<tr height="25px">
				<td colspan="9" align="left" nowrap="nowrap" bgcolor="#99CC66"><?=$title_a;?></td>
				<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FFCC66" >縣市初審</td>
				<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FF9966" >教育部複審</td>
			</tr>
			<tr height="25px">
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">科目</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">類別</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">項目</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">說明</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFDD66">初審金額</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFDD66">刪減金額</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFCCCC">複審金額</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFCCCC">刪減金額</td>
			</tr>
			<?
				if($op == 2 || $op == 4)
					$p = 'p1_'.($school_year+2);  
				else
					$p = 'p1';

				//顯示特色一 細項
				print_item($table_name_item, $p, $main_seq);

			?>
		</table>
		<p>
	<? } ?>

	<? if($a1_p1 == 'show') { ?>
		<hr>
		● 家庭訪視<p>
		　學校申請：個別家庭訪視
		<?=$s_p2_student;?> 人，共
		<?=$s_p2_people;?> 人次，申請補助經費
		<?=$s_p2_money;?> 元。<p>
		　初審金額：個別家庭訪視
		<?=$s_p2_student;?> 人，共
		<?=$city_p2_people;?> 人次，申請補助經費
		<?=$city_p2_money;?> 元。<p>
		　複審金額：個別家庭訪視
		<b><?=$s_p2_student;?></b> 人，共
		<b><?=$edu_p2_people;?></b> 人次，申請補助經費
		<b><?=$edu_p2_money;?></b> 元。
	<? } ?>

	<? if($a2_p2 == 'show') { ?>
		<hr>
		● 特色二：<?=$p2_name;?><?=($p2_IsContinue == "Y")?"（本年度為第 ".$p2_ContinueYear." 年辦理）":"";?><p>
		　參加學生人數
		<?=$s_p2_student;?> 人，其中含目標學生
		<?=$s_p2_target;?> 人。<p>
		<?=$school_year;?>年度<p>
		　學校申請：經費共計
		<?=$s_p2_money;?> 元，其中包含經常門經費
		<?=$s_p2_current_money;?> 元，資本門經費
		<?=$s_p2_capital_money;?> 元。	<p>
		　初審金額：經費共計
		<?=$city_p2_money;?> 元，其中包含經常門經費
		<?=$city_p2_current_money;?> 元，資本門經費
		<?=$city_p2_capital_money;?> 元。<p>
		　複審金額：經費共計
		<b><?=$edu_p2_money;?></b> 元，其中包含經常門經費
		<b><?=$edu_p2_current_money;?></b> 元，資本門經費
		<b><?=$edu_p2_capital_money;?></b> 元。
	<? } ?>

	<? if($a4_p2 == 'show') { ?>
		<hr>
		● 特色二：<?=$p2_name;?><?=($p2_IsContinue == "Y")?"（本年度為第 ".$p2_ContinueYear." 年辦理）":"";?><p>
		　參加學生人數
		<?=$s_p2_student;?> 人，其中含目標學生
		<?=$s_p2_target;?> 人。<p>
		<?=$school_year;?>年度<p>
		　學校申請：經費共計
		<?=$s_p2_money;?> 元，其中包含經常門經費
		<?=$s_p2_current_money;?> 元，資本門經費
		<?=$s_p2_capital_money;?> 元。	<p>
		　初審金額：經費共計
		<?=$city_p2_money;?> 元，其中包含經常門經費
		<?=$city_p2_current_money;?> 元，資本門經費
		<?=$city_p2_capital_money;?> 元。<p>
		　複審金額：經費共計
		<b><?=$edu_p2_money;?></b> 元，其中包含經常門經費
		<b><?=$edu_p2_current_money;?></b> 元，資本門經費
		<b><?=$edu_p2_capital_money;?></b> 元。
	<? } ?>

	<? if($table_2 == 'show') { ?>
		<p>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC">
			<tr height="25px">
				<td colspan="9" align="left" nowrap="nowrap" bgcolor="#99CC66"><? echo $title_a;?></td>
				<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FFCC66">縣市初審</td>
				<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FF9966">教育部複審</td>
			</tr>
			<tr height="25px">
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">科目</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">類別</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">項目</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">說明</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFDD66">初審金額</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFDD66">刪減金額</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFCCCC">複審金額</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFCCCC">刪減金額</td>
			</tr>
			<?
				if($op == 2 || $op == 4)
					$p = 'p2_'.$school_year;
				else
					$p = 'p2';

				//顯示特色二 細項
				print_item($table_name_item, $p, $main_seq);
			?>
		</table>
		<p>
	<? } ?>

	<? if($table_2_ny1 == 'show') { ?>
		<?=$school_year+1;?>年度<p>
		　學校申請：經費共計
		<?=$s_p2_money_ny1;?> 元，其中包含經常門經費
		<?=$s_p2_current_money_ny1;?> 元，資本門經費
		<?=$s_p2_capital_money_ny1;?> 元。	<p>
		　初審金額：經費共計
		<?=$city_p2_money_ny1;?> 元，其中包含經常門經費
		<?=$city_p2_current_money_ny1;?> 元，資本門經費
		<?=$city_p2_capital_money_ny1;?> 元。<p>
		　複審金額：經費共計
		<b><?=$edu_p2_money_ny1;?></b> 元，其中包含經常門經費
		<b><?=$edu_p2_current_money_ny1;?></b> 元，資本門經費
		<b><?=$edu_p2_capital_money_ny1;?></b> 元。
		<p>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC">
			<tr height="25px">
				<td colspan="9" align="left" nowrap="nowrap" bgcolor="#99CC66"><?=$title_a;?></td>
				<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FFCC66">縣市初審</td>
				<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FF9966">教育部複審</td>
			</tr>
			<tr height="25px">
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">科目</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">類別</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">項目</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">說明</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFDD66">初審金額</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFDD66">刪減金額</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFCCCC">複審金額</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFCCCC">刪減金額</td>
			</tr>
			<?
				if($op == 2 || $op == 4)
					$p = 'p2_'.($school_year+1);
				else
					$p = 'p2';

				//顯示特色二 細項
				print_item($table_name_item, $p, $main_seq);
			?>
		</table>
		<p>
	<? } ?>

	<? if($table_2_ny2 == 'show') { ?>
		<?=$school_year+2;?>年度<p>
		　學校申請：經費共計
		<?=$s_p2_money_ny2;?> 元，其中包含經常門經費
		<?=$s_p2_current_money_ny2;?> 元，資本門經費
		<?=$s_p2_capital_money_ny2;?> 元。	<p>
		　初審金額：經費共計
		<?=$city_p2_money_ny2;?> 元，其中包含經常門經費
		<?=$city_p2_current_money_ny2;?> 元，資本門經費
		<?=$city_p2_capital_money_ny2;?> 元。<p>
		　複審金額：經費共計
		<b><?=$edu_p2_money_ny2;?></b> 元，其中包含經常門經費
		<b><?=$edu_p2_current_money_ny2;?></b> 元，資本門經費
		<b><?=$edu_p2_capital_money_ny2;?></b> 元。
		<p>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC">
			<tr height="25px">
				<td colspan="9" align="left" nowrap="nowrap" bgcolor="#99CC66"><?=$title_a;?></td>
				<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FFCC66">縣市初審</td>
				<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FF9966">教育部複審</td>
			</tr>
			<tr height="25px">
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">科目</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">類別</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">項目</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
				<td align="left"   nowrap="nowrap" bgcolor="#99CCCC">說明</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFDD66">初審金額</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFDD66">刪減金額</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFCCCC">複審金額</td>
				<td align="center" nowrap="nowrap" bgcolor="#FFCCCC">刪減金額</td>
			</tr>
			<?
				if($op == 2 || $op == 4)
					$p = 'p2_'.($school_year+2) ;  
				else
					$p = 'p2';

				//顯示特色二 細項
				print_item($table_name_item, $p, $main_seq);
			?>
		</table>
		<p>
	<? } ?>
</div>
<p>

<?
	if($get_id != "")
		$strLink = "&acc=$get_id";
?>

<hr>

<b>前往其他頁面：</b>
<a href="edu_funds.php?op=1<?=$strLink;?>">補助一</a>&nbsp;
<a href="edu_funds.php?op=2<?=$strLink;?>">補助二</a>&nbsp;
<a href="edu_funds.php?op=3<?=$strLink;?>">補助三</a>&nbsp;
<a href="edu_funds.php?op=4<?=$strLink;?>">補助四</a>&nbsp;
<a href="edu_funds.php?op=5<?=$strLink;?>">補助五</a>&nbsp;
<a href="edu_funds.php?op=6<?=$strLink;?>">補助六</a>&nbsp;

<p>

<input type="button" value="關閉本頁" onClick="window.close()">
<? include "../../function/button_print.php"; ?>