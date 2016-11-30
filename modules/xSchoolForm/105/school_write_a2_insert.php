<?
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "checkdate.php";
	
	include "../../function/config_for_104.php"; //本年度基本設定
	
	$keyClasses = '13'; // 設定可申請特色二的最少班級數
	
	$table_name = "alc_education_features";
	$table_name_item = "alc_education_features_item";

	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   
		   //j-10407
		   "      , a2_item.* ".               
		   "      , a2.* ".               
		   
		   //補二資料
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
		   
		   //
		   
		   //j-10407
		   "      , sy_ny.seq_no as seq_no_ny ".		   
		   "      , a2_item_ny.main_seq as main_seq_ny ".	
		   
		   //--
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join alc_education_features as a2 on sy.seq_no = a2.sy_seq ".
		   "                       left join alc_education_features_item as a2_item on sy.seq_no = a2_item.main_seq ".		   
		   
		   //j-10407,新增
		   "                       left join schooldata_year as sy_ny on sd.account = sy_ny.account and sy_ny.school_year = '".($school_year + 1)."' ". 
		   "                       left join alc_education_features_item as a2_item_ny on sy_ny.seq_no = a2_item_ny.main_seq ".				   
		   //--
		   
		   " where sy.school_year = '$school_year' ".
		   "   and sd.account = '$username' ";
	//echo "<br />".$sql."<br />";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		
		$main_seq = $row['seq_no']; //school_year的seq_no		
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
		$s_p1_current_cnt = ($row['s_p1_current_cnt'] == '')?0:$row['s_p1_current_cnt'];
		$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
		$s_p1_capital_cnt = ($row['s_p1_capital_cnt'] == '')?0:$row['s_p1_capital_cnt'];
		$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];
		$s_p2_money = ($row['s_p2_money'] == '')?0:$row['s_p2_money'];
		$s_p2_current_cnt = ($row['s_p2_current_cnt'] == '')?0:$row['s_p2_current_cnt'];
		$s_p2_current_money = ($row['s_p2_current_money'] == '')?0:$row['s_p2_current_money'];
		$s_p2_capital_cnt = ($row['s_p2_capital_cnt'] == '')?0:$row['s_p2_capital_cnt'];
		$s_p2_capital_money = ($row['s_p2_capital_money'] == '')?0:$row['s_p2_capital_money'];
			
		$s_total_money_ny1 = ($row['s_total_money_ny1'] == '')?0:$row['s_total_money_ny1']; //NULL則填入0
		$s_p1_money_ny1 = ($row['s_p1_money_ny1'] == '')?0:$row['s_p1_money_ny1']; //NULL則填入0
		$s_p1_current_cnt_ny1 = ($row['s_p1_current_cnt_ny1'] == '')?0:$row['s_p1_current_cnt_ny1'];
		$s_p1_current_money_ny1 = ($row['s_p1_current_money_ny1'] == '')?0:$row['s_p1_current_money_ny1'];
		$s_p1_capital_cnt_ny1 = ($row['s_p1_capital_cnt_ny1'] == '')?0:$row['s_p1_capital_cnt_ny1'];
		$s_p1_capital_money_ny1 = ($row['s_p1_capital_money_ny1'] == '')?0:$row['s_p1_capital_money_ny1'];
		$s_p2_money_ny1 = ($row['s_p2_money_ny1'] == '')?0:$row['s_p2_money_ny1'];
		$s_p2_current_cnt_ny1 = ($row['s_p2_current_cnt_ny1'] == '')?0:$row['s_p2_current_cnt_ny1'];
		$s_p2_current_money_ny1 = ($row['s_p2_current_money_ny1'] == '')?0:$row['s_p2_current_money_ny1'];
		$s_p2_capital_cnt_ny1 = ($row['s_p2_capital_cnt_ny1'] == '')?0:$row['s_p2_capital_cnt_ny1'];
		$s_p2_capital_money_ny1 = ($row['s_p2_capital_money_ny1'] == '')?0:$row['s_p2_capital_money_ny1'];
		
		$s_total_money_ny2 = ($row['s_total_money_ny2'] == '')?0:$row['s_total_money_ny2']; //NULL則填入0
		$s_p1_money_ny2 = ($row['s_p1_money_ny2'] == '')?0:$row['s_p1_money_ny2']; //NULL則填入0
		$s_p1_current_cnt_ny2 = ($row['s_p1_current_cnt_ny2'] == '')?0:$row['s_p1_current_cnt_ny2'];
		$s_p1_current_money_ny2 = ($row['s_p1_current_money_ny2'] == '')?0:$row['s_p1_current_money_ny2'];
		$s_p1_capital_cnt_ny2 = ($row['s_p1_capital_cnt_ny2'] == '')?0:$row['s_p1_capital_cnt_ny2'];
		$s_p1_capital_money_ny2 = ($row['s_p1_capital_money_ny2'] == '')?0:$row['s_p1_capital_money_ny2'];
		$s_p2_money_ny2 = ($row['s_p2_money_ny2'] == '')?0:$row['s_p2_money_ny2'];
		$s_p2_current_cnt_ny2 = ($row['s_p2_current_cnt_ny2'] == '')?0:$row['s_p2_current_cnt_ny2'];
		$s_p2_current_money_ny2 = ($row['s_p2_current_money_ny2'] == '')?0:$row['s_p2_current_money_ny2'];
		$s_p2_capital_cnt_ny2 = ($row['s_p2_capital_cnt_ny2'] == '')?0:$row['s_p2_capital_cnt_ny2'];
		$s_p2_capital_money_ny2 = ($row['s_p2_capital_money_ny2'] == '')?0:$row['s_p2_capital_money_ny2'];
		
		//j-10407，新增，帶入104年初複審金額及意見

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
		
		//----
		
		//a2
		$sy_seq = $row['sy_seq'];
		$account = $row['account'];
		$school_year = $row['school_year'];
		$inherit_year = $row['inherit_year'];
		
		
		//a2_item的資料
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
//	    $city_desc = $row['city_desc'];	
		$edu_delete = $row['edu_delete'];		
        $edu_money = $row['edu_money'];
//        $edu_desc = $row['edu_desc'];

        $seq_no_ny = $row['seq_no_ny'];
        $main_seq_ny = $row['main_seq_ny'];

//		    echo "<br />".$seq_no_ny."/";
//			echo $seq_no."/".$main_seq."/".$section."/".$subject."/".$category."/".$item."/".$unit."/".$price."/".$amount."/".$s_money."/".$s_desc."/".$edu_money."/".$edu_desc."/"."<br />";
		
		
		//$main_seq = $seq_no_ny;
	    //$school_year = '".($school_year + 1)."';  // '".($school_year + 1)."'
		
//		echo "<br />".$school_year."/";



           //插入105-106年資料
//		echo "<br>"."main_seq:".$main_seq."--main_seq_ny:".$main_seq_ny."--seq_no_ny:".$seq_no_ny."-----s_money:".$s_money."<br>";
           //if($seq_no != '' && $s_money != 0 && $s_money != '') //更新項目,原本的
           if($main_seq = $main_seq_ny) //j-10407，新增	,若$main_seq = $main_seq_ny，則更新，否則插入新資料   
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
						//echo (mysql_errno() != 0)?"2 : ".$sql."<br />".mysql_errno().mysql_error()."<br />----<br />":""; 
				    }else{		   
		                   $k = $section;		
	    	               for($i = 1;$i <= 2;$i++)              //特色1或2
	                      { 
                            for($j = 105;$j <= 106;$j++)         //105到106
	        	            {
	    	    	          if ($k == "p".$i."_".$j)
	                 	       {
	    	                     $sql_insert = " insert into $table_name_item ( main_seq, section, subject, category, item, unit, price, amount, s_money, s_desc, city_money, city_delete, edu_money ,edu_delete) ".
					                           "                             values ( '$seq_no_ny' ".   //j-10407,將main_seq換成新的
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
	//						  		           "                                    , '$city_desc' ".
	
	    					  		           "                                    , '$edu_money' ".
							  		           "                                    , '$edu_delete' ".											   
	//						  		           "                                    , '$edu_desc' ".
							  		           "                                     ); ";
				  		           mysql_query($sql_insert);
						    	}
				             }								   
			         	  }
					  }
		
	}
	
	/*$cnt_sql = " SELECT sy_seq FROM alc_education_features where sy_seq = '$main_seq' ";
	$result = mysql_query($cnt_sql);
	$num_rows = mysql_num_rows($result);  
	          if($num_rows == 0) //沒資料 $num_rows
	         { */
	        	  $insert_sql = "insert into alc_education_features (sy_seq, account, school_year) ".
					  "                     values ('$seq_no_ny', '$username', '".($school_year + 1)."'); ";         //$school_year
					  mysql_query($insert_sql);
					  
				  $sql_update = " update $table_name set  ".
		   "                      	s_total_money='$s_total_money_ny1' 	".		  
		   "                      , s_total_money_ny1='$s_total_money_ny2' ".
//		   "                      , s_total_money_ny2='$s_total_money_ny2' ".
		   
		   "                      , p_num='$p_num' ".
		   "                      , p1_name='$p1_name' ".
		   "                      , s_p1_student='$s_p1_student' ".
		   "                      , s_p1_target='$s_p1_target' ".
		   "                      , p1_IsContinue='$p1_IsContinue' ".
		   "                      , p1_ContinueYear='".($p1_ContinueYear+1)."' ".        //j-10407,延續辦理直接多加1年
		   "                      , s_p1_money='$s_p1_money_ny1' ".
		   "                      , s_p1_current_money='$s_p1_current_money_ny1' ".
		   "                      , s_p1_capital_money='$s_p1_capital_money_ny1' ".
		   
		   "                      , s_p1_money_ny1='$s_p1_money_ny2' ".
		   "                      , s_p1_current_money_ny1='$s_p1_current_money_ny2' ".
		   "                      , s_p1_capital_money_ny1='$s_p1_capital_money_ny2' ".
/*		   
		   "                      , s_p1_money_ny2='$s_p1_money_ny2' ".
		   "                      , s_p1_current_money_ny2='$s_p1_current_money_ny2' ".
		   "                      , s_p1_capital_money_ny2='$s_p1_capital_money_ny2' ".
*/		   
		   
		   "                      , p2_name='$p2_name' ".
		   "                      , s_p2_student='$s_p2_student' ".
		   "                      , s_p2_target='$s_p2_target' ".
		   "                      , p2_IsContinue='$p2_IsContinue' ".
		   "                      , p2_ContinueYear='".($p2_ContinueYear+1)."' ".         //j-10407,延續辦理直接多加1年

		   "                      , s_p2_money='$s_p2_money_ny1' ".
		   "                      , s_p2_current_money='$s_p2_current_money_ny1' ".
		   "                      , s_p2_capital_money='$s_p2_capital_money_ny1' ".
		   
		   "                      , s_p2_money_ny1='$s_p2_money_ny2' ".
		   "                      , s_p2_current_money_ny1='$s_p2_current_money_ny2' ".
		   "                      , s_p2_capital_money_ny1='$s_p2_capital_money_ny2' ".
/*		   
		   "                      , s_p2_money_ny2='$s_p2_money_ny2' ".
		   "                      , s_p2_current_money_ny2='$s_p2_current_money_ny2' ".
		   "                      , s_p2_capital_money_ny2='$s_p2_capital_money_ny2' ".
*/

//j-10407，新增，帶入104年初複審金額及意見

           "                      , city_total_money  = '$city_total_money_ny1' ".
		   
           "                      , city_desc = '$city_desc_ny1' ".            // j-10407帶入105度初審意見
           "                      , city_desc_ny1 = '$city_desc_ny2' ".        //j-10407帶入106度初審意見
//           "                      , city_desc_ny2 = '$city_desc_ny2' ".
           "                      , city_desc_p2 = '$city_desc_ny1_p2' ".      //帶入105度初審意見
           "                      , city_desc_ny1_p2 = '$city_desc_ny2_p2' ".  //帶入105度初審意見
//           "                      , city_desc_ny2_p2 = '$city_desc_ny2_p2' ".
		   
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
/*
           "                      , city_total_money_ny2 = '$city_total_money_ny2' ".
           "                      , city_p1_money_ny2 = '$city_p1_money_ny2' ".
           "                      , city_p1_current_cnt_ny2 = '$city_p1_current_cnt_ny2' ".
           "                      , city_p1_current_money_ny2 = '$city_p1_current_money_ny2' ".
           "                      , city_p1_capital_cnt_ny2 = '$city_p1_capital_cnt_ny2' ".
           "                      , city_p1_capital_money_ny2 = '$city_p1_capital_money_ny2' ".
           "                      , city_p2_money_ny2 = '$city_p2_money_ny2' ".
           "                      , city_p2_current_cnt_ny2 = '$city_p2_current_cnt_ny2' ".
           "                      , city_p2_current_money_ny2 = '$city_p2_current_money_ny2' ".
           "                      , city_p2_capital_cnt_ny2 = '$city_p2_capital_cnt_ny2' ".
           "                      , city_p2_capital_money_ny2 = '$city_p2_capital_money_ny2' ".
*/		   
         "                      , city_approved = '$city_approved' ".
         "                      , city_approved_id = '$city_approved_id' ".

           "                      , edu_total_money = '$edu_total_money_ny1' ".
		   
           "                      , edu_desc = '$edu_desc_ny1' ".               //帶入105度複審意見
           "                      , edu_desc_ny1 = '$edu_desc_ny2' ".           //帶入106度複審意見
//           "                      , edu_desc_ny2 = '$edu_desc_ny2' ".
           "                      , edu_desc_p2 = '$edu_desc_ny1_p2' ".
           "                      , edu_desc_ny1_p2 = '$edu_desc_ny2_p2' ".
//           "                      , edu_desc_ny2_p2 = '$edu_desc_ny2_p2' ".
		   
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
/*
           "                      , edu_total_money_ny2 = '$edu_total_money_ny2' ".
           "                      , edu_p1_money_ny2 = '$edu_p1_money_ny2' ".
           "                      , edu_p1_current_cnt_ny2 = '$edu_p1_current_cnt_ny2' ".
           "                      , edu_p1_current_money_ny2 = '$edu_p1_current_money_ny2' ".
           "                      , edu_p1_capital_cnt_ny2 = '$edu_p1_capital_cnt_ny2' ".
           "                      , edu_p1_capital_money_ny2 = '$edu_p1_capital_money_ny2' ".

           "                      , edu_p2_money_ny2 = '$edu_p2_money_ny2' ".
		   
           "                      , edu_p2_current_cnt_ny2 = '$edu_p2_current_cnt_ny2' ".
           "                      , edu_p2_current_money_ny2 = '$edu_p2_current_money_ny2' ".
           "                      , edu_p2_capital_cnt_ny2 = '$edu_p2_capital_cnt_ny2' ".
		   
           "                      , edu_p2_capital_money_ny2 = '$edu_p2_capital_money_ny2' ".
*/		   
           "                      , edu_approved = '$edu_approved' ".
           "                      , edu_approved_id = '$edu_approved_id' ".
           "                      , inherit_year = '104' ".	   
//--		   
	   " where sy_seq = '$seq_no_ny'; ";
	     mysql_query($sql_update);
	           //}	
	//新增資料進資料庫語法  
	if(mysql_query($sql))
	{
		echo '新增成功!';
		echo "<script>";
		//echo "window.open('104_edu_funds.php?op=2','','width=900, height=1000 ,left=1000 ,location=no ,top=200');";   
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
<!--
	{
		$account = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];
		$area = $row['area'];
		
		$student = $row['student'];
		$target_aboriginal = $row['target_aboriginal'];
		$target_no_aboriginal = $row['target_no_aboriginal'];
		$class_total = $row['class_total'];
		
		$main_seq = $row['seq_no']; //school_year的seq_no		
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
		$s_p1_current_cnt = ($row['s_p1_current_cnt'] == '')?0:$row['s_p1_current_cnt'];
		$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
		$s_p1_capital_cnt = ($row['s_p1_capital_cnt'] == '')?0:$row['s_p1_capital_cnt'];
		$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];
		$s_p2_money = ($row['s_p2_money'] == '')?0:$row['s_p2_money'];
		$s_p2_current_cnt = ($row['s_p2_current_cnt'] == '')?0:$row['s_p2_current_cnt'];
		$s_p2_current_money = ($row['s_p2_current_money'] == '')?0:$row['s_p2_current_money'];
		$s_p2_capital_cnt = ($row['s_p2_capital_cnt'] == '')?0:$row['s_p2_capital_cnt'];
		$s_p2_capital_money = ($row['s_p2_capital_money'] == '')?0:$row['s_p2_capital_money'];
			
		$s_total_money_ny1 = ($row['s_total_money_ny1'] == '')?0:$row['s_total_money_ny1']; //NULL則填入0
		$s_p1_money_ny1 = ($row['s_p1_money_ny1'] == '')?0:$row['s_p1_money_ny1']; //NULL則填入0
		$s_p1_current_cnt_ny1 = ($row['s_p1_current_cnt_ny1'] == '')?0:$row['s_p1_current_cnt_ny1'];
		$s_p1_current_money_ny1 = ($row['s_p1_current_money_ny1'] == '')?0:$row['s_p1_current_money_ny1'];
		$s_p1_capital_cnt_ny1 = ($row['s_p1_capital_cnt_ny1'] == '')?0:$row['s_p1_capital_cnt_ny1'];
		$s_p1_capital_money_ny1 = ($row['s_p1_capital_money_ny1'] == '')?0:$row['s_p1_capital_money_ny1'];
		$s_p2_money_ny1 = ($row['s_p2_money_ny1'] == '')?0:$row['s_p2_money_ny1'];
		$s_p2_current_cnt_ny1 = ($row['s_p2_current_cnt_ny1'] == '')?0:$row['s_p2_current_cnt_ny1'];
		$s_p2_current_money_ny1 = ($row['s_p2_current_money_ny1'] == '')?0:$row['s_p2_current_money_ny1'];
		$s_p2_capital_cnt_ny1 = ($row['s_p2_capital_cnt_ny1'] == '')?0:$row['s_p2_capital_cnt_ny1'];
		$s_p2_capital_money_ny1 = ($row['s_p2_capital_money_ny1'] == '')?0:$row['s_p2_capital_money_ny1'];
		
		$s_total_money_ny2 = ($row['s_total_money_ny2'] == '')?0:$row['s_total_money_ny2']; //NULL則填入0
		$s_p1_money_ny2 = ($row['s_p1_money_ny2'] == '')?0:$row['s_p1_money_ny2']; //NULL則填入0
		$s_p1_current_cnt_ny2 = ($row['s_p1_current_cnt_ny2'] == '')?0:$row['s_p1_current_cnt_ny2'];
		$s_p1_current_money_ny2 = ($row['s_p1_current_money_ny2'] == '')?0:$row['s_p1_current_money_ny2'];
		$s_p1_capital_cnt_ny2 = ($row['s_p1_capital_cnt_ny2'] == '')?0:$row['s_p1_capital_cnt_ny2'];
		$s_p1_capital_money_ny2 = ($row['s_p1_capital_money_ny2'] == '')?0:$row['s_p1_capital_money_ny2'];
		$s_p2_money_ny2 = ($row['s_p2_money_ny2'] == '')?0:$row['s_p2_money_ny2'];
		$s_p2_current_cnt_ny2 = ($row['s_p2_current_cnt_ny2'] == '')?0:$row['s_p2_current_cnt_ny2'];
		$s_p2_current_money_ny2 = ($row['s_p2_current_money_ny2'] == '')?0:$row['s_p2_current_money_ny2'];
		$s_p2_capital_cnt_ny2 = ($row['s_p2_capital_cnt_ny2'] == '')?0:$row['s_p2_capital_cnt_ny2'];
		$s_p2_capital_money_ny2 = ($row['s_p2_capital_money_ny2'] == '')?0:$row['s_p2_capital_money_ny2'];
		
		$seq_no = $row['seq_no'];//         //[$p.'_seq_no_'.$j];
		$main_seq = $row['main_seq'];
		$section = $row['section'];
		$subject = $row['subject'];//       //[$p.'_subject_'.$j];
		$category = $row['category'];//          [$p.'_category_'.$j];
		$item = $row['item'];//                [$p.'_item_'.$j];
		$unit = $row['unit'];//               [$p.'_unit_'.$j];
		$price = $row['price'];//            [$p.'_price_'.$j];
		$amount = $row['amount'];//             [$p.'_amount_'.$j];
		$s_money = $row['s_money'];//               [$p.'_s_money_'.$j];
		$s_desc = $row['s_desc'];// 
        $edu_money = $row['edu_money'];
        $edu_desc = $row['edu_desc'];	
		
		//j-10407
		$seq_no_ny = $row['seq_no_ny'];
		
		//--
		
		//計算目標學生百分比
		if($s_p1_student != '' && $s_p1_target != '')
		{
			$s_p1_per = number_format($s_p1_target / $s_p1_student * 100, 2);
		}
		if($s_p2_student != '' && $s_p2_target != '')
		{
			$s_p2_per = number_format($s_p2_target / $s_p2_student * 100, 2);
		}
	}
    
	echo $j."/".$seq_no."/".$main_seq."/".$section."/".$subject."/".$category."/".$item."/".$unit."/".$price."/".$amount."/".$s_money."/".$s_desc."/"."<br />";
	
	
	//j-10407
    //補二table name
	$table_name = "alc_education_features";
	$table_name_item = "alc_education_features_item";
	
	//
	$main_seq = $seq_no_ny;
	$school_year = $school_year+1;
	
	$cnt_sql = " SELECT sy_seq FROM $table_name where sy_seq = '$main_seq' ";
	$result = mysql_query($cnt_sql);
	$num_rows = mysql_num_rows($result);
	if($num_rows == 0) //沒資料
	{
		$insert_sql = "insert into $table_name (sy_seq, account, school_year) ".
					  "                     values ('$main_seq', '$username', '$school_year'); ";
		mysql_query($insert_sql);
	}
	
	for($i = 1;$i <= 5;$i++)
	{
		for($k = 104;$k <= 106;$k++)
		{
			if($k == 104)
				$str = "";
			elseif($k == 105)
				$str = "_ny1";
			elseif($k == 106)
				$str = "_ny2";
			
			$p = "p".$i."_".$k;
			
			if($row['s_p'.$i.'_money'.$str] != '' && $row['s_p'.$i.'_money'.$str] != 0) //當申請金額不為0時才存資料庫
			{
				for($j = 1;$j <= 10;$j++) //細項填寫資料
				{
					$seq_no = $row['seq_no'];//         //[$p.'_seq_no_'.$j];
					$subject = $row['subject'];//       //[$p.'_subject_'.$j];
					$category = $row['category'];//          [$p.'_category_'.$j];
					$item = $row['item'];//                [$p.'_item_'.$j];
					$unit = $row['unit'];//               [$p.'_unit_'.$j];
					$price = $row['price'];//            [$p.'_price_'.$j];
					$amount = $row['amount'];//             [$p.'_amount_'.$j];
					$s_money = $row['s_money'];//               [$p.'_s_money_'.$j];
					$s_desc = $row['s_desc'];//                   [$p.'_s_desc_'.$j];*/
					
					echo $j."/".$seq_no."/".$section."/".$subject."/".$category."/".$item."/".$unit."/".$price."/".$amount."/".$s_money."/".$s_desc."/"."<br />";
					
					//if($seq_no == '' && $s_money != 0 && $s_money != '') //新增項目
                   // if($main_seq == '' && $s_money != 0 && $s_money != '') //新增項目
					//{
						$sql = " insert into $table_name_item ( main_seq, section, subject, category, item, unit, price, amount, s_money, s_desc) ".
							   "                             values ( '$main_seq' ".  
							   "                                    , '$section' ".
							   "                                    , '$subject' ".
							   "                                    , '$category' ".
							   "                                    , '$item' ".
							   "                                    , '$unit' ".
							   "                                    , '$price' ".
							   "                                    , '$amount' ".
							   "                                    , '$s_money' ".
							   "                                    , '$s_desc' ".
							   "                                     ); ";
						mysql_query($sql);
						//echo (mysql_errno() != 0)?"1 : ".$sql."<br />".mysql_errno().mysql_error()."<br />----<br />":""; 
					//}
					if($seq_no != '' && $s_money != 0 && $s_money != '') //更新項目
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
						//echo (mysql_errno() != 0)?"2 : ".$sql."<br />".mysql_errno().mysql_error()."<br />----<br />":""; 
					}
					if($seq_no != '' && ($s_money == 0 || $s_money == '')) //刪除項目，當金額=空白 or 0
					{
						$sql = " delete from $table_name_item ".
							   " where seq_no = '$seq_no'; ";
						mysql_query($sql);
						//echo (mysql_errno() != 0)?"3 : ".$sql."<br />".mysql_errno().mysql_error()."<br />----<br />":""; 
					}
					
				}
			}/*
			else //當申請金額=0時，刪除原本的資料
			{
				$sql = " delete from $table_name_item ".
					   " where main_seq = '$main_seq' and section = '$p'; ";
				mysql_query($sql);
				//echo (mysql_errno() != 0)?"4 : ".$sql."<br />".mysql_errno().mysql_error()."<br />----<br />":""; 
			}*/
		/*}*/
		
			$sql = " update $table_name set s_total_money='$s_total_money' ".
		   "                      , s_total_money_ny1='$s_total_money_ny1' ".
		   "                      , s_total_money_ny2='$s_total_money_ny2' ".
		   
		   "                      , p_num='$p_num' ".
		   "                      , p1_name='$p1_name' ".
		   "                      , s_p1_student='$s_p1_student' ".
		   "                      , s_p1_target='$s_p1_target' ".
		   "                      , p1_IsContinue='$p1_IsContinue' ".
		   "                      , p1_ContinueYear='$p1_ContinueYear' ".
		   "                      , s_p1_money='$s_p1_money' ".
		   "                      , s_p1_current_money='$s_p1_current_money' ".
		   "                      , s_p1_capital_money='$s_p1_capital_money' ".
		   
		   "                      , s_p1_money_ny1='$s_p1_money_ny1' ".
		   "                      , s_p1_current_money_ny1='$s_p1_current_money_ny1' ".
		   "                      , s_p1_capital_money_ny1='$s_p1_capital_money_ny1' ".
		   
		   "                      , s_p1_money_ny2='$s_p1_money_ny2' ".
		   "                      , s_p1_current_money_ny2='$s_p1_current_money_ny2' ".
		   "                      , s_p1_capital_money_ny2='$s_p1_capital_money_ny2' ".
		   
		   "                      , p2_name='$p2_name' ".
		   "                      , s_p2_student='$s_p2_student' ".
		   "                      , s_p2_target='$s_p2_target' ".
		   "                      , p2_IsContinue='$p2_IsContinue' ".
		   "                      , p2_ContinueYear='$p2_ContinueYear' ".
		   "                      , s_p2_money='$s_p2_money' ".
		   "                      , s_p2_current_money='$s_p2_current_money' ".
		   "                      , s_p2_capital_money='$s_p2_capital_money' ".
		   
		   "                      , s_p2_money_ny1='$s_p2_money_ny1' ".
		   "                      , s_p2_current_money_ny1='$s_p2_current_money_ny1' ".
		   "                      , s_p2_capital_money_ny1='$s_p2_capital_money_ny1' ".
		   
		   "                      , s_p2_money_ny2='$s_p2_money_ny2' ".
		   "                      , s_p2_current_money_ny2='$s_p2_current_money_ny2' ".
		   "                      , s_p2_capital_money_ny2='$s_p2_capital_money_ny2' ".
	   " where sy_seq = '$main_seq'; ";
	
	/*
	//新增資料進資料庫語法  
	if(mysql_query($sql))
	{
		echo '新增成功!';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=school_write_allowance.php>';
	}
	else
	{
		echo '新增失敗!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=school_write_a2.php>';
		//echo (mysql_errno() != 0)?"5 : ".$sql."<br />".mysql_errno().mysql_error()."<br />----<br />":""; 
	}

	/*}	*/
?>

-->