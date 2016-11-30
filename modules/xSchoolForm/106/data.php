<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?

$db_host="localhost";
$db_username="";
$db_password="";

$db_link = @mysql_connect($db_host, $db_username, $db_password );

if(!$db_link)  die("失敗!!");

	include "../../function/config_for_106.php"; //本年度基本設定

	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area ".
		   
		   " 	  , sy.student, sy.class_total, sy.class_grade1, sy.class_grade2, sy.class_grade3, sy.class_grade4 ".
		   " 	  , sy.class_grade5, sy.class_grade6, sy.class_special, sd.getmoney_85to91, sy.lastyear_graduate ".
		   " 	  , sd.traffic_status, sy.page1_warning, sy.page1_desc ".
		   
		   "      , sy_ly.student as student_ly ".
		   "      , sy_l2y.student as student_l2y ".            //j10407，新增，前年學生數
		   
		   //考試成績
		   "	  , se.student_exam, se.chinese, se.math, se.english, se.nature, se.social ".
		   "	  , se.chinese_missing, se.math_missing, se.english_missing, se.nature_missing, se.social_missing ".
		   
		   //補三歷史資料
		   "      , sf101.a4 ". //101補4 助金額(101的補助4=現在的補助3)
		   "      , sd102.a168 ". //102補助3 金額
		   "      , a3_ly.edu_total_money as a3_ly_money ".
		   
		   //補四歷史資料
		   "      , sf101.a5 ". //101補助5 金額(101的補助5=現在的補助4)
		   "      , sd102.a169 ". //102補助4 金額
		   "      , a4_ly.edu_total_money as a4_ly_money ".
		   "      , a4_l2y.edu_total_money as a4_l2y_money ".		                                                                 //j10407，新增，前年資料的資料表
		   
		   //補六歷史資料(只算購買交通車的金額)
		   "      , sf101.a7_3 ". //101補助6 購置交通車金額(101的補助7=現在的補助6)
		   "      , a6_102.a200 ". //102補助6 購置交通車金額
		   "      , case when a6_ly.item = '購置交通車' then a6_ly.edu_total_money else 0 end as a6_ly_money ".
		   
		   //學校區域資料
		   "      , sl.high, sl.bonus, sl.bonus_name, sl.bonus_money ".
		   "      , sl.cityhall, sl.localoffice, sl.localoffice_name ".
		   "      , sl.nearest_localoffice, sl.nearest_localoffice_name, sl.bus_stop ".
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join school_examdata as se on sd.account = se.account and se.school_year =  '$school_year' ". 
		   "                       left join school_location as sl on sd.account = sl.account ". 
		   
		   //去年資料的資料表
		   "                       left join schooldata_year as sy_ly on sd.account = sy_ly.account and sy_ly.school_year = '".($school_year - 1)."' ".  
		   "                       left join $a3_table_name as a3_ly on sy_ly.seq_no = a3_ly.sy_seq ".
		   "                       left join $a4_table_name as a4_ly on sy_ly.seq_no = a4_ly.sy_seq ".
		   "                       left join $a6_table_name as a6_ly on sy_ly.seq_no = a6_ly.sy_seq ".
		   
		  //j10407，新增，前年資料的資料表
		   "                       left join schooldata_year as sy_l2y on sd.account = sy_l2y.account and sy_l2y.school_year = '".($school_year - 2)."' ".  
		   "                       left join $a3_table_name as a3_l2y on sy_l2y.seq_no = a3_l2y.sy_seq ".
		   "                       left join $a4_table_name as a4_l2y on sy_l2y.seq_no = a4_l2y.sy_seq ".
		   "                       left join $a6_table_name as a6_l2y on sy_l2y.seq_no = a6_l2y.sy_seq ".
		   
		   "                       left join 102schooldata as sd102 on sd.account = sd102.account ".
		   "                       left join 101school_final as sf101 on sd.account = sf101.account ". //101school_final
		   "                       left join 102allowance6 as a6_102 on sd.account = a6_102.account ". //102allowance6 補六只有購置交通車才算所以不能從 102schooldata 抓
		   " where sy.school_year = '$school_year' ".
		//   "   and sd.account = '$username' ";
	
	//echo "<br />".$sql."<br />";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$account = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];
		$area = $row['area'];
		
		$high = $row['high'];
		$bonus = $row['bonus'];
		$bonus_name = $row['bonus_name'];
		$bonus_money = $row['bonus_money'];
		$cityhall = $row['cityhall'];
		$localoffice_name = $row['localoffice_name'];
		$localoffice = $row['localoffice'];
		$nearest_localoffice_name = $row['nearest_localoffice_name'];
		$nearest_localoffice = $row['nearest_localoffice'];
		$bus_stop = $row['bus_stop'];
		
		$student = $row['student'];
		$class_total = $row['class_total'];
		$c1 = $row['class_grade1'];
		$c2 = $row['class_grade2'];
		$c3 = $row['class_grade3'];
		$c4 = $row['class_grade4'];
		$c5 = $row['class_grade5'];
		$c6 = $row['class_grade6'];
		$cs = $row['class_special'];
		$getmoney_85to91 = ($row['getmoney_85to91'] == "N")?"未受補助":"曾受補助";
		$lastyear_graduate = $row['lastyear_graduate'];
		$traffic_status = $row['traffic_status'];
		$laststudent = ($row['student_ly'] == '')?0:$row['student_ly'];                //去年學生數
		$last2student = ($row['student_l2y'] == '')?0:$row['student_l2y'];             //j10407，新增，前年學生數
		
		$student_exam = $row['student_exam'];
		$chinese = $row['chinese'];
		$math = $row['math'];
		$english = $row['english'];
		$nature = $row['nature'];
		$social = $row['social'];		
		$chinese_missing = $row['chinese_missing'];
		$math_missing = $row['math_missing'];
		$english_missing = $row['english_missing'];
		$nature_missing = $row['nature_missing'];
		$social_missing = $row['social_missing'];		
		
		$a3_ly_money = ($row['a3_ly_money'] == '')?0:$row['a3_ly_money'];
		$a4_ly_money = ($row['a4_ly_money'] == '')?0:$row['a4_ly_money'];
		$a6_ly_money = ($row['a6_ly_money'] == '')?0:$row['a6_ly_money'];
		
				
		//j10407，新增，前年資料的資料表
		$a3_l2y_money = ($row['a3_l2y_money'] == '')?0:$row['a3_l2y_money'];
		$a4_l2y_money = ($row['a4_l2y_money'] == '')?0:$row['a4_l2y_money'];
		$a6_l2y_money = ($row['a6_l2y_money'] == '')?0:$row['a6_l2y_money'];
		
		$page1_warning = $row['page1_warning'];
		$page1_desc = $row['page1_desc'];
		/*= $row[''];*/
		
		//交通狀況有多個，用逗號分開
		$traffic = explode(",", $traffic_status);
				
		//補三，前五年補助金額，注意不是申請金額，是複審補助金額
		$money_last5 = 0; //目前沒資料
		$money_last4 = ($row['a4'] == '')?0:$row['a4'];;                //j10407,資料上移
		$money_last3 = ($row['a168'] == '')?0:$row['a168'];             //j10407,資料上移
		$money_last2 = $a3_l2y_money;                                   //j10407，新增，前年資料的資料表
		$money_last =  $a3_ly_money;
		
		$strmsg_a3 = "";
		//echo "<br />".$money_last5."/".$money_last4."/".$money_last3."/".$money_last2."/".$money_last."<br />";
		if($money_last > 0 || $money_last2 > 0 || $money_last3 > 0 || $money_last4 > 0 || $money_last5 > 0) 
		{
			$strmsg_a3 .= "※五年內曾獲本計畫補助修繕離島或偏遠地區師生宿舍：";
			$strmsg_a3 .= ($money_last > 0)?($school_year - 1)." 年度 <font color='red'>".$money_last."</font> 元。":"";
			$strmsg_a3 .= ($money_last2 > 0)?($school_year - 2)." 年度 <font color='red'>".$money_last2."</font> 元。":"";
			$strmsg_a3 .= ($money_last3 > 0)?($school_year - 3)." 年度 <font color='red'>".$money_last3."</font> 元。":"";
			$strmsg_a3 .= ($money_last4 > 0)?($school_year - 4)." 年度 <font color='red'>".$money_last4."</font> 元。":"";
			$strmsg_a3 .= ($money_last5 > 0)?($school_year - 5)." 年度 <font color='red'>".$money_last5."</font> 元。":"";
			$strmsg_a3 .= "<br />";
		}
		
		//補四，前三年補助金額，注意不是申請金額，是複審補助金額
		$money_last3 = ($row['a169'] == '')?0:$row['a169'];                   //j10407,資料上移，原本101($row['a5'] == '')?0:$row['a5'];
		$money_last2 = $a4_l2y_money;                                         //j10407，新增，前年資料的資料表
		$money_last = $a4_ly_money;

		$strmsg_a4 = "";
		//echo "<br />".$money_last3 . "/" . $money_last2 . "/" .$money_last."<br />";
		if($money_last > 0 || $money_last2 > 0 || $money_last3 > 0) 
		{
			$strmsg_a4 .= "※三年內曾獲本計畫補助充實學校基本教學設備：";
			$strmsg_a4 .= ($money_last > 0)?($school_year - 1)." 年度 <font color='red'>".$money_last."</font> 元。":"";
			$strmsg_a4 .= ($money_last2 > 0)?($school_year - 2)." 年度 <font color='red'>".$money_last2."</font> 元。":"";
			$strmsg_a4 .= ($money_last3 > 0)?($school_year - 3)." 年度 <font color='red'>".$money_last3."</font> 元。":"";
			$strmsg_a4 .= "<br />";
		}
		
		//補六，前十年補助金額，注意不是申請金額，是複審補助金額
		$money_last3 = ($row['a200'] == '')?0:$row['a200'];                  //j10407,資料上移，原本101($row['a7_3'] == '')?0:$row['a7_3'];
		$money_last2 = $a6_l2y_money;                                        //j10407，新增，前年資料的資料表
		$money_last =  $a6_ly_money;

		$strmsg_a6 = "";
		//echo "<br />".$money_last3 . "/" . $money_last2 . "/" .$money_last."<br />";
		if($money_last > 0 || $money_last2 > 0 || $money_last3 > 0) 
		{
			$strmsg_a6 .= "※十年內曾獲本計畫補助購置交通車：";
			$strmsg_a6 .= ($money_last > 0)?($school_year - 1)." 年度 <font color='red'>".$money_last."</font> 元。":"";
			$strmsg_a6 .= ($money_last2 > 0)?($school_year - 2)." 年度 <font color='red'>".$money_last2."</font> 元。":"";
			$strmsg_a6 .= ($money_last3 > 0)?($school_year - 3)." 年度 <font color='red'>".$money_last3."</font> 元。":"";
			$strmsg_a6 .= "<br />";
		}
		
		$isSurvey_1 = "Y";
		//不顯示海拔等調查選項
		//金門縣、連江縣、澎湖縣及台東縣的蘭嶼鄉、綠島鄉、屏東縣琉球鄉之學校
		if($cityname == '金門縣' || $cityname == '連江縣' || $cityname == '澎湖縣' 
			|| ($cityname == '臺東縣' && ($district = '蘭嶼鄉' || $district = '綠島鄉'))  
			|| ($cityname == '屏東縣' && $district = '琉球鄉')  
			)
		{
			$isSurvey_1 = "N";
		}
		
		$isSurvey_2 = "Y";
		//如學校所在地係為 合併後行政區-不含鄉)中之區、鎮市學校者，無需調查距離最近之區市鎮公所
		$cnt_sql2 = " SELECT localoffice_name FROM school_localoffice_list where cityname = '$cityname' and district = '$district' ";
		$result2 = mysql_query($cnt_sql2);
		$num_rows2 = mysql_num_rows($result2);
		if($num_rows2 != 0) //有資料
		{
			$isSurvey_2 = "N";
		}
		
		if($username == "014558")
		{
			$laststudent = 1656;
		}
		
	}
	
?>

<? echo $account; ?>


