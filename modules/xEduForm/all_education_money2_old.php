<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
$username = $xoopsUser->getVar('uname');
  global $xoopsDB;
  $sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
  $result_city = $xoopsDB -> query($sql) or die($sql);
  while($row = mysql_fetch_row($result_city)) {
            $edu = $row[1];
			$eduman = $row[2];
			$examine = $row[3];
			$eduno = $row[4];
			}
  echo $username;
  echo $edu;
  echo $eduman;	
  echo "<br>";
?>
<?
	$school[0] = '新北市%';
	$school[1] = '臺北市%';
	$school[2] = '臺中市%';
	$school[3] = '臺南市%';
	$school[4] = '高雄市%';
	$school[5] = '宜蘭縣%';
	$school[6] = '桃園縣%';
	$school[7] = '新竹縣%';
	$school[8] = '苗栗縣%';
	$school[9] = '彰化縣%';
	$school[10] = '南投縣%';
	$school[11] = '雲林縣%';
	$school[12] = '嘉義縣%';
	$school[13] = '屏東縣%';
	$school[14] = '臺東縣%';
	$school[15] = '花蓮縣%';
	$school[16] = '澎湖縣%';
	$school[17] = '基隆市%';
	$school[18] = '新竹市%';
	$school[19] = '嘉義市%';
	$school[20] = '金門縣%';
	$school[21] = '連江縣%';

//1.推展親職教育活動	
//$a1_school_total = 0;
$sql = "select distinct city  from edu_school ;";
$result = mysql_query($sql);
while($row_all = mysql_fetch_row($result)){
		$city_name =$row_all[0];	
		$a1_1_school = 0;		//親職教育活動-校
		$a1_1_space = 0;		//親職教育活動-場
		$a1_1_person = 0;		//親職教育活動-人
		$a1_1_money = 0;		//親職教育活動-經常門
		
		$a1_2_school = 0;		//個案家庭輔導-校
		$a1_2_person = 0;		//個案家庭輔導-人
		$a1_2_money = 0;		//個案家庭輔導-經常門
		$a1_school_total = 0;
	
		//親職教育活動-國小 其他資料
		$sql_allowance = "select  *  from edu_school,100element_allowance1 where edu_school.account = 100element_allowance1.account and edu_school.city like '%$city_name%'";
		$result_allowance = mysql_query($sql_allowance);
		while($row = mysql_fetch_row($result_allowance))
        {
                 $a = $row[17];//親子講座幾場
				 $b = $row[18];//預計參加人數
				 $d = $row[28];//個別家庭訪視
				 $a1_1_space = $a1_1_space + $a;
				 $a1_1_person = $a1_1_person + $b;
				 $a1_2_person = $a1_2_person + $d;
				
        }
		//親職教育活動-國中 其他資料
		$sql_allowance = "select  *  from edu_school,100junior_allowance1 where edu_school.account = 100junior_allowance1.account and edu_school.city like '%$city_name%'";
		$result_allowance = mysql_query($sql_allowance);
		while($row = mysql_fetch_row($result_allowance))
        {
                 $a = $row[17];//親子講座幾場
				 $b = $row[18];//預計參加人數
				 $d = $row[28];//個別家庭訪視
				 $a1_1_space = $a1_1_space + $a;
				 $a1_1_person = $a1_1_person + $b;
				 $a1_2_person = $a1_2_person + $d;
				
        }
		// 親職教育活動-國小 申請經費
		$sql_allowance = "select  *  from edu_school,100element_examine_a1 where edu_school.account = 100element_examine_a1.account and edu_school.city like '%$city_name%'";
		$result_allowance = mysql_query($sql_allowance);
		while($row = mysql_fetch_row($result_allowance))
        {		 
				 if($row[6] > 0){
				 	$a1_1_school++;
				 }
				 if($row[7] > 0){
				 	$a1_2_school++;
				 }
				 $a1_1_money = $a1_1_money + $row[9];//申請經費
				 $a1_2_money = $a1_2_money + $row[10];//申請經費
				
        }
		//親職教育活動-國中 申請經費
		$sql_allowance = "select  *  from edu_school,100junior_examine_a1 where edu_school.account = 100junior_examine_a1.account and edu_school.city like '%$city_name%'";
		$result_allowance = mysql_query($sql_allowance);
		while($row = mysql_fetch_row($result_allowance))
        {
				 if($row[6] > 0){
				 	$a1_1_school++;
				 }
				 if($row[7] > 0){
				 	$a1_2_school++;
				 }
				 $a1_1_money = $a1_1_money + $row[9];//申請經費
				 $a1_2_money = $a1_2_money + $row[10];//申請經費
			
        }
		
	$sql = "update 100education_money_2 set  a1_1_school = '$a1_1_school',a1_1_space = '$a1_1_space', a1_1_person = '$a1_1_person',a1_1_money = '$a1_1_money', a1_2_school = '$a1_2_school', a1_2_person = '$a1_2_person', a1_2_money = '$a1_2_money' where city like '$city_name'";
	mysql_query($sql);
	
}//while
//2.原住民及離島地區學校辦理學習輔導	
$sql = "select distinct city  from edu_school ;";
$result = mysql_query($sql);
while($row_all = mysql_fetch_row($result)){
		$city_name =$row_all[0];
		$a2_1_school = 0;
		$a2_1_class = 0;
		$a2_1_person = 0;
		$a2_1_money = 0;		
		
		$a2_2_school = 0;
		$a2_2_class = 0;
		$a2_2_person = 0;
		$a2_2_money = 0;
		
		$a2_3_school = 0;
		$a2_3_class = 0;
		$a2_3_person = 0;
		$a2_3_money = 0;

		
		//原住民及離島地區學校辦理學習輔導-國小 其他資料
		$sql_allowance = "select  *  from edu_school,100element_allowance2 where edu_school.account = 100element_allowance2.account and edu_school.city like '%$city_name%'";
		$result_allowance = mysql_query($sql_allowance);
		while($row = mysql_fetch_row($result_allowance))
        {
                 $a = $row[18];//課後學習班數
				 $c = $row[19];//寒暑假學習班數
				 $e = $row[21];//夜間學習班數
				 
				 $a2_1_class = $a2_1_class + $a;
				 $a2_2_class = $a2_2_class + $c;
				 $a2_3class = $a2_3_class + $e;
        }
		//原住民及離島地區學校辦理學習輔導-國中 其他資料
		$sql_allowance = "select  *  from edu_school,100junior_allowance2 where edu_school.account = 100junior_allowance2.account and edu_school.city like '%$city_name%'";
		$result_allowance = mysql_query($sql_allowance);
		while($row = mysql_fetch_row($result_allowance))
        {
                 $a = $row[18];//課後學習班數
				 $c = $row[19];//寒暑假學習班數
				 $e = $row[21];//夜間學習班數
				 
				 $a2_1_class = $a2_1_class + $a;
				 $a2_2_class = $a2_2_class + $c;
				 $a2_3class = $a2_3_class + $e;
        }
		
		//原住民及離島地區學校辦理學習輔導-國小 其他資料
		$sql_allowance = "select  *  from edu_school,100element_examine_a2 where edu_school.account = 100element_examine_a2.account and edu_school.city like '%$city_name%'";
		$result_allowance = mysql_query($sql_allowance);
		while($row = mysql_fetch_row($result_allowance))
        {		 
				 if($row[6] > 0){
				 	$a2_1_school++;
				 }
				 if($row[7] > 0){
				 	$a2_2_school++;
				 }
				 if($row[8] > 0){
				 	$a2_3_school++;
				 }
				 
				 $a2_1_money = $a2_1_money + $row[10];	//課後學習輔導金額		
				 $a2_2_money = $a2_2_money + $row[11];	//寒暑假學習輔導金額			
				 $a2_3_money = $a2_3_money + $row[12];	//住校生夜間學校輔導金額
        }
		//原住民及離島地區學校辦理學習輔導-國中 其他資料
		$sql_allowance = "select  *  from edu_school,100junior_examine_a2 where edu_school.account = 100junior_examine_a2.account and edu_school.city like '%$city_name%'";
		$result_allowance = mysql_query($sql_allowance);
		while($row = mysql_fetch_row($result_allowance))
        {
				 if($row[6] > 0){
				 	$a2_1_school++;
				 }
				 if($row[7] > 0){
				 	$a2_2_school++;
				 }
				 if($row[8] > 0){
				 	$a2_3_school++;
				 }
				 $a2_1_money = $a2_1_money + $row[10];	//課後學習輔導金額		
				 $a2_2_money = $a2_2_money + $row[11];	//寒暑假學習輔導金額			
				 $a2_3_money = $a2_3_money + $row[12];	//住校生夜間學校輔導金額
        }
		$sql = "update 100education_money_2 set  a2_1_school = '$a2_1_school',a2_1_class = '$a2_1_class',a2_1_money = '$a2_1_money', a2_2_school = '$a2_2_school',a2_2_class = '$a2_2_class',a2_2_money = '$a2_2_money', a2_3_school = '$a2_3_school', a2_3_class= '$a2_3_class',a2_3_money = '$a2_3_money' where city like '$city_name'";
	mysql_query($sql);
	}//for	
	
	
	
//3.補助學校發展教育特色
$sql = "select distinct city  from edu_school ;";
$result = mysql_query($sql);
while($row_all = mysql_fetch_row($result)){
		$city_name =$row_all[0];
		$a3_school = 0;
		$a3_item = 0;
		$a3_ordinary = 0;
		$a3_principle = 0;
				
		
		//補助學校發展教育特色-國小 申請經費
		$sql_allowance = "select  *  from edu_school,100element_examine_a3 where edu_school.account = 100element_examine_a3.account and edu_school.city like '%$city_name%'";
		$result_allowance = mysql_query($sql_allowance);
		while($row = mysql_fetch_row($result_allowance))
        {
				 $cityT1 = $row[16];	//縣市審核特色一經常門
				 $cityT2 = $row[17];	//縣市審核特色一資本門
				 $cityT3 = $row[18];	//縣市審核特色二經常門
				 $cityT4 = $row[19];	//縣市審核特色二資本門
				 $city1 = $cityT1 + $cityT3; //縣市審核經常門
				 $city2 = $cityT2 + $cityT4; //縣市審核資本門
				 $total_city = $city1 + $city2;
				 if($total_city > 0){
				 	$a3_school++;
				
				 }
				 
				 if($row[7] > 0){ //三、補助學校發展教育特色 項的數量
				 	$a3_item++;
				 }
				 if($row[8] > 0){
				 	$a3_item++;
				 }
				 
				 $c = $row[20] + $row[22];//經常門總合
				 $d = $row[21] + $row[23];//資本門總合
				 $a3_ordinary = $a3_ordinary + $c;			
				 $a3_principle = $a3_principle + $d;				
        }
		//補助學校發展教育特色-國中 申請經費
		$sql_allowance = "select  *  from edu_school,100junior_examine_a3 where edu_school.account = 100junior_examine_a3.account and edu_school.city like '%$city_name%'";
		$result_allowance = mysql_query($sql_allowance);
		while($row = mysql_fetch_row($result_allowance))
        {
		
				 $cityT1 = $row[16];	//縣市審核特色一經常門
				 $cityT2 = $row[17];	//縣市審核特色一資本門
				 $cityT3 = $row[18];	//縣市審核特色二經常門
				 $cityT4 = $row[19];	//縣市審核特色二資本門
				 $city1 = $cityT1 + $cityT3; //縣市審核經常門
				 $city2 = $cityT2 + $cityT4; //縣市審核資本門
				 $total_city = $city1 + $city2;
				 if($total_city > 0){
				 	$a3_school++;
				 }
				 if($row[7] > 0){	//三、補助學校發展教育特色 項的數量
				 	$a3_item++;
				 }
				 if($row[8] > 0){
				 	$a3_item++;
				 }
				 
				 $c = $row[20] + $row[22];//經常門總合
				 $d = $row[21] + $row[23];//資本門總合
				 $a3_ordinary = $a3_ordinary + $c;			
				 $a3_principle = $a3_principle + $d;	
        }
		$sql = "update 100education_money_2 set  a3_school = '$a3_school',a3_item = '$a3_item',  a3_ordinary = '$a3_ordinary', a3_principle = '$a3_principle' where city like '$city_name'";
	mysql_query($sql);
	}//for
	
//4.修繕離島或偏遠地區師生宿舍
$sql = "select distinct city  from edu_school ;";
$result = mysql_query($sql);
while($row_all = mysql_fetch_row($result)){
		$city_name =$row_all[0];
		
		$a4_1_school = 0;
		$a4_1_item = 0;
		$a4_1_ordinary = 0;
		$a4_1_mode=0;
		$a4_1_principle=0;;
		$a4_1_money=0;
		
		$a4_2_school=0;
        $a4_2_item=0;
		$a4_2_ordinary=0;
		$a4_2_mode=0;
		$a4_2_principle=0;
		$a4_2_money=0;
		
		
		//修繕離島或偏遠地區師生宿舍-國小 申請經費
		$sql_allowance = "select  *  from edu_school,100element_examine_a4 where edu_school.account = 100element_examine_a4.account and edu_school.city like '%$city_name%'";
		$result_allowance = mysql_query($sql_allowance);
		while($row = mysql_fetch_row($result_allowance))
        {
				$cityT1 = $row[6];	//縣市審核金額一(學生宿舍經常門)
				$cityT2 = $row[7];	//縣市審核金額二(學生宿舍資本門)
				$cityT3 = $row[12];	//縣市審核金額三(教師宿舍經常門)
				$cityT4 = $row[13];	//縣市審核金額四(教師宿舍資本門)
				$city1 = $cityT1 + $cityT2; //縣市審核經常門+資料門
				$city2 = $cityT3 + $cityT4; //縣市審核經常門+資本門
				$total_city = $city1 + $city2;
				if($city1 > 0){
					$a4_1_school++;
				}
				if($city2 > 0){
					$a4_2_school++;
				}
				if($cityT1 > 0 ){
					$a4_1_item++;
				}
				if($cityT2 > 0){
					$a4_1_mode++;
				}
				if($cityT3 > 0 ){
					$a4_2_item++;
				}
				if($cityT4 > 0){
					$a4_2_mode++;
				}				
				$a4_1_ordinary =$a4_1_ordinary+ $row[9];		//學生宿舍 經常門
				$a4_1_principle =$a4_1_principle+$row[10];		//資本門
				$a4_1_money = $a4_1_ordinary+ $a4_1_principle; 
				$a4_2_ordinary =$a4_2_ordinary+$row[14];		//教師宿舍 經常門
				$a4_2_principle =$a4_2_principle+$row[15];		//資本門
				$a4_2_money = $a4_2_ordinary+ $a4_2_principle;
							
        }
		//修繕離島或偏遠地區師生宿舍-國中 申請經費
		$sql_allowance = "select  *  from edu_school,100junior_examine_a4 where edu_school.account = 100junior_examine_a4.account and edu_school.city like '%$city_name%'";
		$result_allowance = mysql_query($sql_allowance);
		while($row = mysql_fetch_row($result_allowance))
        {
				$cityT1 = $row[6];	//縣市審核金額一(學生宿舍經常門)
				$cityT2 = $row[7];	//縣市審核金額二(學生宿舍資本門)
				$cityT3 = $row[12];	//縣市審核金額三(教師宿舍經常門)
				$cityT4 = $row[13];	//縣市審核金額四(教師宿舍資本
				$city1 = $cityT1 + $cityT2; //縣市審核經常門+資料門
				$city2 = $cityT3 + $cityT4; //縣市審核經常門+資本門
				$total_city = $city1 + $city2;
				if($city1 > 0){
					$a4_1_school++;
				}
				if($city2 > 0){
					$a4_2_school++;
				}
				if($cityT1 > 0 ){
					$a4_1_item++;
				}
				if($cityT2 > 0){
					$a4_1_mode++;
				}
				if($cityT3 > 0 ){
					$a4_2_item++;
				}
				if($cityT4 > 0){
					$a4_2_mode++;
				}
						
				$a4_1_ordinary =$a4_1_ordinary+ $row[9];		//學生宿舍 經常門
				$a4_1_principle =$a4_1_principle+$row[10];		//資本門
				$a4_1_money = $a4_1_ordinary+ $a4_1_principle; 
				$a4_2_ordinary =$a4_2_ordinary+$row[14];		//教師宿舍 經常門
				$a4_2_principle =$a4_2_principle+$row[15];		//資本門
				$a4_2_money = $a4_2_ordinary+ $a4_2_principle;
        }
		$sql = "update 100education_money_2 set a4_1_school = '$a4_1_school', a4_1_item = '$a4_1_item' ,a4_1_mode = '$a4_1_mode' ,  a4_1_ordinary = '$a4_1_ordinary', a4_1_principle = '$a4_1_principle',a4_1_money = '$a4_1_money', a4_2_school = '$a4_2_school', a4_2_item = '$a4_2_item' ,a4_2_mode = '$a4_2_mode' , a4_2_ordinary = '$a4_2_ordinary', a4_2_principle = '$a4_2_principle', a4_2_money = '$a4_2_money' where city like '$city_name'";
	mysql_query($sql);
	}//for				

//5.充實學校基本教學設備
$sql = "select distinct city  from edu_school ;";
$result = mysql_query($sql);
while($row_all = mysql_fetch_row($result)){
		$city_name =$row_all[0];
			$a5_school=0;
			$a5_item=0;
			$a5_ordinary=0;
			$a5_principle=0;

		//充實學校基本教學設備-國小 申請經費
		$sql_allowance = "select  *  from edu_school,100element_examine_a5 where edu_school.account = 100element_examine_a5.account and edu_school.city like '%$city_name%'";
		$result_allowance = mysql_query($sql_allowance);
		while($row = mysql_fetch_row($result_allowance))
        {
				if($a5_ordinary+$a5_principle > 0){
					$a5_school++;
				}
				if($a5_ordinary+$a5_principle > 0){
					$a5_item++;
				}
				$a5_ordinary =$a5_ordinary+ $row[14];
				$a5_principle =$a5_principle+$row[15];		
        }
		//充實學校基本教學設備-國中 申請經費
		$sql_allowance = "select  *  from edu_school,100junior_examine_a5 where edu_school.account = 100junior_examine_a5.account and edu_school.city like '%$city_name%'";
		$result_allowance = mysql_query($sql_allowance);
		while($row = mysql_fetch_row($result_allowance))
        {
				if($a5_ordinary+$a5_principle > 0){
					$a5_school++;
				}
				if($a5_ordinary +$a5_principle> 0){
					$a5_item++;
				}
				$a5_ordinary =$a5_ordinary+ $row[14];
				$a5_principle =$a5_principle+$row[15];			
        }
		$sql = "update 100education_money_2 set  a5_school = '$a5_school', a5_item = '$a5_item',a5_ordinary = '$a5_ordinary', a5_principle = '$a5_principle' where city like '$city_name'";
	mysql_query($sql);
	}//for
	
//6.發展原住民教育文化特色及充實設備器材
$sql = "select distinct city  from edu_school ;";
$result = mysql_query($sql);
while($row_all = mysql_fetch_row($result)){
		$city_name =$row_all[0];
			$a6_school=0;
			$a6_item=0;
			$a6_ordinary=0;
			$a6_principle=0;

		//發展原住民教育文化特色及充實設備器材-國小 申請經費
		$sql_allowance = "select  *  from edu_school,100element_examine_a6 where edu_school.account = 100element_examine_a6.account and edu_school.city like '%$city_name%'";
		$result_allowance = mysql_query($sql_allowance);
		while($row = mysql_fetch_row($result_allowance))
        {
				if($a6_ordinary+$a6_principle > 0){
					$a6_school++;
				}
				if($a6_ordinary+$a6_principle > 0){
					$a6_item++;
				}
				$a6_ordinary =$a6_ordinary+ $row[14];
				$a6_principle =$a6_principle+$row[15];		
        }
		//發展原住民教育文化特色及充實設備器材-國中 申請經費
		$sql_allowance = "select  *  from edu_school,100junior_examine_a6 where edu_school.account = 100junior_examine_a6.account and edu_school.city like '%$city_name%'";
		$result_allowance = mysql_query($sql_allowance);
		while($row = mysql_fetch_row($result_allowance))
        {
				if($a6_ordinary+$a6_principle > 0){
					$a6_school++;
				}
				if($a6_ordinary+$a6_principle > 0){
					$a6_item++;
				}
				$a6_ordinary =$a6_ordinary+ $row[14];
				$a6_principle =$a6_principle+$row[15];			
        }
		$sql = "update 100education_money_2 set  a6_school = '$a6_school', a6_item = '$a6_item',a6_ordinary = '$a6_ordinary', a6_principle = '$a6_principle' where city like '$city_name'";
	mysql_query($sql);
	}//for
	
//7.補助交通不便學校交通車
$sql = "select distinct city  from edu_school ;";
$result = mysql_query($sql);
while($row_all = mysql_fetch_row($result)){
		$city_name =$row_all[0];

			$a7_1_school= 0;
			$a7_1_person=0;
			$a7_1_money=0;
			$a7_2_school=0;
			$a7_2_person=0;
			$a7_2_money=0;
			$a7_3_school=0;
			$a7_3_person=0;
			$a7_3_money=0;
			
		//補助交通不便學校交通車-國小 其他資料
		$sql_allowance = "select  *  from edu_school,100element_allowance7 where edu_school.account = 100element_allowance7.account and edu_school.city like '%$city_name%'";
		$result_allowance = mysql_query($sql_allowance);
		while($row = mysql_fetch_row($result_allowance))
        {
                 $a7_1_person = $a7_1_person + $row[15];//搭車人數
				 $a7_2_person = $a7_2_person + $row[17];//交通費
				 $a7_3_person = $a7_3_person + $row[19];//交通車
				 //echo $row[0]."__".$row[15]."<br>";

        }
		//補助交通不便學校交通車-國中 其他資料
		$sql_allowance = "select  *  from edu_school,100junior_allowance7 where edu_school.account = 100junior_allowance7.account and edu_school.city like '%$city_name%'";
		$result_allowance = mysql_query($sql_allowance);
		while($row = mysql_fetch_row($result_allowance))
        {
                 $a7_1_person = $a7_1_person + $row[15];//搭車人數
				 $a7_2_person = $a7_2_person + $row[17];//交通費
				 $a7_3_person = $a7_3_person + $row[19];//交通車
				// echo $row[0]."__".$row[15]."<br>";
        }			
			
			
			//補助交通不便學校交通車-國小 校數、申請經費
		$sql_allowance = "select  *  from edu_school,100element_examine_a7 where edu_school.account = 100element_examine_a7.account and edu_school.city like '%$city_name%'";
		$result_allowance = mysql_query($sql_allowance);
		while($row = mysql_fetch_row($result_allowance))
        {
				if($row[6] > 0 ){
					$a7_1_school++;
				}
				if($row[7] > 0 ){
					$a7_2_school++;
				}
				if($row[8] > 0 ){
					$a7_3_school++;
				}
				$a7_1_money =$a7_1_money+ $row[10];
				$a7_2_money =$a7_2_money+$row[11];	
				$a7_3_money =$a7_3_money+$row[12];	
        }
		//補助交通不便學校交通車-國中 校數、申請經費
		$sql_allowance = "select  *  from edu_school,100junior_examine_a7 where edu_school.account = 100junior_examine_a7.account and edu_school.city like '%$city_name%'";
		$result_allowance = mysql_query($sql_allowance);
		while($row = mysql_fetch_row($result_allowance))
        {
				if($row[6] > 0 ){
					$a7_1_school++;
				}
				if($row[7] > 0 ){
					$a7_2_school++;
				}
				if($row[8] > 0 ){
					$a7_3_school++;
				}
				$a7_1_money =$a7_1_money+ $row[10];
				$a7_2_money =$a7_2_money+$row[11];	
				$a7_3_money =$a7_3_money+$row[12];		
        }
		
		$sql = "update 100education_money_2 set  a7_1_school = '$a7_1_school',a7_1_person = '$a7_1_person',a7_1_money = '$a7_1_money',a7_2_school = '$a7_2_school',a7_2_person = '$a7_2_person', a7_2_money = '$a7_2_money',a7_3_school = '$a7_3_school',a7_3_person = '$a7_3_person', a7_3_money = '$a7_3_money' where city like '$city_name'";
	mysql_query($sql);
	}//for
//8.整修學校社區化活動場所
$sql = "select distinct city  from edu_school ;";
$result = mysql_query($sql);
while($row_all = mysql_fetch_row($result)){
		$city_name =$row_all[0];
			$a8_1_school=0;
			$a8_1_fix=0;
			$a8_1_equip=0;
			$a8_2_school=0;
			$a8_2_fix=0;
			$a8_2_equip=0;
			$a8_3_school=0;
			$a8_3_fix=0;
			$a8_3_equip=0;
			
		//整修學校社區化活動場所-國小 申請經費
		$sql_allowance = "select  *  from edu_school,100element_examine_a8 where edu_school.account = 100element_examine_a8.account and edu_school.city like '%$city_name%'";
		$result_allowance = mysql_query($sql_allowance);
		while($row = mysql_fetch_row($result_allowance))
        {
			$city1 = $row[16];	//縣市審核金額一
			$city2 = $row[17];	//縣市審核金額二
			$total_city = $city1 + $city2;
			$total_edu = $edu1 + $edu2;
			if ($total_city > 0){
				$a8_1_school++;
    	    }
			
			$a8_1_fix = $a8_1_fix + $row[18];
			$a8_1_equip = $a8_1_equip +$row[19];
		}	
		//整修學校社區化活動場所-國中 申請經費
		$sql_allowance = "select  *  from edu_school,100junior_examine_a8 where edu_school.account = 100junior_examine_a8.account and edu_school.city like '%$city_name%'";
		$result_allowance = mysql_query($sql_allowance);
		while($row = mysql_fetch_row($result_allowance))
        {
			$city1 = $row[16];	//縣市審核金額一
			$city2 = $row[17];	//縣市審核金額二
			$total_city = $city1 + $city2;
			$total_edu = $edu1 + $edu2;
			if ($total_city > 0){
				$a8_1_school++;
    	    }
			
			$a8_1_fix = $a8_1_fix + $row[18];
			$a8_1_equip = $a8_1_equip +$row[19];
        }
			

		$sql = "update 100education_money_2 set  a8_1_school= '$a8_1_school',a8_1_fix = '$a8_1_fix', a8_1_equip = '$a8_1_equip', a8_2_school = '$a8_2_school',  a8_2_fix= '$a8_2_fix', a8_2_equip = '$a8_2_equip', a8_3_school = '$a8_3_school', a8_3_fix = '$a8_3_fix', a8_3_equip = '$a8_3_equip'  where city like '$city_name'";
	mysql_query($sql);
	}//for						
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" cellpadding="0" cellspacing="0">
	<tr>
		
		<td rowspan="3" nowrap="nowrap" align="center">縣市名稱</td>
		<td colspan="7">1.推展親職教育活動</td>
		<td colspan="12">2.原住民及離島地區學校辦理學習輔導</td>
		<td colspan="4">3.補助學校發展教育特色</td>
		<td colspan="12">4.修繕離島或偏遠地區師生宿舍</td>
		<td colspan="4">5.充實學校基本教學設備</td>
		<td colspan="4">6.發展原住民教育文化特色及充實設備器材</td>
		<td colspan="9">7.補助交通不便學校交通車</td>
		<td colspan="9">8.整修學校社區化活動場所</td>
	</tr>
	<tr>
		<td colspan="4" align="center" bgcolor="#00CCCC">親職教育活動</td>
		<td colspan="3" align="center" bgcolor="#FFCC99">目標學生家庭訪視輔導</td>
		<td colspan="4" align="center" bgcolor="#00CCCC">課後學習輔導</td>
		<td colspan="4" align="center" bgcolor="#FFCC99">住校生夜間學校輔導</td>
		<td colspan="4" align="center" bgcolor="#66FF99"> 寒暑假學習輔導</td>
		<td rowspan="2" align="center">校</td>
		<td rowspan="2" align="center">項</td>
		<td rowspan="2" align="center" bgcolor="#FFFFCC">經常門</td>
		<td rowspan="2" align="center" bgcolor="#FFFFCC">資本門</td>
		<td colspan="6" align="center" bgcolor="#00CCCC">  學生宿舍</td>
		<td colspan="6" align="center" bgcolor="#FFCC99"> 教師宿舍 </td>
		<td rowspan="2" align="center">校</td>
		<td rowspan="2" align="center">項</td>
		<td rowspan="2" align="center" bgcolor="#FFFFCC">經常門</td>
		<td rowspan="2" align="center" bgcolor="#FFFFCC">資本門</td>
		<td rowspan="2" align="center">校</td>
		<td rowspan="2" align="center">項</td>
		<td rowspan="2" align="center" bgcolor="#FFFFCC">經常門</td>
		<td rowspan="2" align="center" bgcolor="#FFFFCC">資本門</td>
		<td colspan="3" align="center" bgcolor="#00CCCC">租車費</td>
		<td colspan="3" align="center" bgcolor="#FFCC99">交通費</td>
		<td colspan="3" align="center" bgcolor="#66FF99">交通車</td>
		<td colspan="3" align="center" bgcolor="#FFCC99">綜合球場</td>
		<td colspan="3" align="center" bgcolor="#FFCC99">小型集會風雨教室</td>
		<td colspan="3" align="center" bgcolor="#66FF99">運動場</td>
	</tr>
	<tr>
	  <td align="center">校</td>
		<td align="center">場</td>
		<td align="center">人</td>
		<td align="center" bgcolor="#FFFFCC">經常門</td>
		<td align="center">校</td>
		<td align="center">人</td>
		<td align="center" bgcolor="#FFFFCC">經常門</td>
		<td align="center">校</td>
		<td align="center">班</td>
		<td align="center">人</td>
		<td align="center" bgcolor="#FFFFCC">申請經費</td>
		<td align="center">校</td>
		<td align="center">班</td>
		<td align="center">人</td>
		<td align="center" bgcolor="#FFFFCC">申請經費</td>
		<td align="center">校</td>
		<td align="center">班</td>
		<td align="center">人</td>
		<td align="center" bgcolor="#FFFFCC">申請經費</td>
		<td align="center">校</td>
		<td align="center">項</td>
		<td align="center" bgcolor="#FFFFCC">經常門</td>
		<td align="center">式</td>
		<td align="center" bgcolor="#FFFFCC">資本門</td>
		<td align="center">小計</td>
		<td align="center">校</td>
		<td align="center">項</td>
		<td align="center" bgcolor="#FFFFCC">經常門</td>
		<td align="center">式</td>
	    <td align="center" bgcolor="#FFFFCC">資本門</td>
	    <td align="center">小計</td>
	    <td align="center">校</td>
	    <td align="center">人</td>
	    <td align="center" bgcolor="#FFFFCC">申請經費</td>
	    <td align="center">校</td>
	    <td align="center">人</td>
	    <td align="center" bgcolor="#FFFFCC">申請經費</td>
	    <td align="center">校</td>
	    <td align="center">輛</td>
	    <td align="center" bgcolor="#FFFFCC">申請經費</td>
	    <td align="center">校</td>
	    <td align="center" bgcolor="#FFFFCC">修建費</td>
	    <td align="center" bgcolor="#FFFFCC">設備費</td>
	    <td align="center">校</td>
	    <td align="center" bgcolor="#FFFFCC">修建費</td>
	    <td align="center" bgcolor="#FFFFCC">設備費</td>
	    <td align="center">校</td>
	    <td align="center" bgcolor="#FFFFCC">修建費</td>
	    <td align="center" bgcolor="#FFFFCC">設備費</td>
	</tr>
  <?
  //補助金額-國小			
	$sql = "select  *  from 100education_money_2 order by id asc";
	$result = mysql_query($sql);
	while($row = mysql_fetch_row($result))
        {
                 $a1_1_school = $row[2];
				 $a1_1_space = $row[3];
				 $a1_1_person = $row[4];
				 $a1_1_money = $row[5];
				 $a1_2_school = $row[6];
				 $a1_2_person = $row[7];
				 $a1_2_money = $row[8];
				 
				 $a2_1_school=$row[9];
				 $a2_1_class =$row[10];
				 $a2_1_person=$row[11];
				 $a2_1_money=$row[12];
				 $a2_2_school=$row[13];
				 $a2_2_class =$row[14];
				 $a2_2_person=$row[15];
				 $a2_2_money=$row[16];
				 $a2_3_school=$row[17];
				 $a2_3_class =$row[18];
				 $a2_3_person=$row[19];
				 $a2_3_money=$row[20];
				 
				 $a3_school=$row[21];
				 $a3_item=$row[22];					 				 
				 $a3_ordinary=$row[23];
				 $a3_principle=$row[24];
				 
				 $a4_1_school=$row[25];
				 $a4_1_item=$row[26];
				 $a4_1_ordinary=$row[27];
				 $a4_1_mode=$row[28];
				 $a4_1_principle=$row[29];
				 $a4_1_money=$row[30];
				 $a4_2_school=$row[31];
           		 $a4_2_item=$row[32];
				 $a4_2_ordinary=$row[33];
				 $a4_2_mode=$row[34];
				 $a4_2_principle=$row[35];
				 $a4_2_money=$row[36];
				 
				 $a5_school=$row[37];
				 $a5_item=$row[38];
				 $a5_ordinary=$row[39];
				 $a5_principle=$row[40];
				 
				 $a6_school=$row[41];
				 $a6_item=$row[42];
				 $a6_ordinary=$row[43];
				 $a6_principle=$row[44];
				 

				 $a7_1_school=$row[45];
				 $a7_1_person=$row[46];
				 $a7_1_money=$row[47];
				 $a7_2_school=$row[48];
				 $a7_2_person=$row[49];
				 $a7_2_money=$row[50];
				 $a7_3_school=$row[51];
				 $a7_3_person=$row[52];
				 $a7_3_money=$row[53];
				 
				 $a8_1_school=$row[54];
				 $a8_1_fix=$row[55];
				 $a8_1_equip=$row[56];
				 $a8_2_school=$row[57];
				 $a8_2_fix=$row[58];
				 $a8_2_equip=$row[59];
				 $a8_3_school=$row[60];
				 $a8_3_fix=$row[61];
				 $a8_3_equip=$row[62];
				 
				 $total = $row[18];
				// $a3_1=$row[19];
				// $a3_2=$row[20];
				 //$a6_1=$row[21];
				 //$a6_2=$row[22];
				 
				echo "<tr width='187' height='46'>";
				 		echo "<td>";
				echo "$row[1]";//縣市名稱
						echo "</td>";

	echo "<td>"."<div align='right'>";
	echo number_format($a1_1_school);//a1_1 校
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format( $a1_1_space);//a1_1 場
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a1_1_person);//a1_1 人
	echo "</td>";		
	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a1_1_money);//a1_1 經常門
	echo "</td>";
	
	echo "<td>"."<div align='right'>";
	echo number_format($a1_2_school);//a1_2 校
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a1_2_person);//a1_2 人
	echo "</td>";
	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a1_2_money);//a1_2 經常門
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a2_1_school);//a2_1 校
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a2_1_class);//a2_1 班
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a2_1_person);//a2_1 人
	echo "</td>";
	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a2_1_money);//a2_1 申請經費
	echo "</td>";			

	echo "<td>"."<div align='right'>";
	echo number_format($a2_2_school);//a2_2 校
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a2_2_class);//a2_2 班
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a2_2_person);//a2_2 人
	echo "</td>";
	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a2_2_money);//a2_2 申請經費
	echo "</td>";
				
	echo "<td>"."<div align='right'>";
	echo number_format($a2_3_school);//a2_3 校
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a2_3_class);//a2_3 班
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a2_3_person);//a2_3 人
	echo "</td>";
	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a2_3_money);//a2_3 申請經費
	echo "</td>";									
	echo "<td>"."<div align='right'>";
	echo number_format($a3_school);//a3 校
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a3_item);//a3 項
	echo "</td>";
	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a3_ordinary);//a3 經常門
	echo "</td>";
	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a3_principle);//a3 資本門
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo number_format($a4_1_school);//a4_1 校
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a4_1_item);//a4_1 項
	echo "</td>";

	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a4_1_ordinary);//a4_1 經常門
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a4_1_mode);//a4_1 式
	echo "</td>";
	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a4_1_principle);//a4_1 資本門
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a4_1_money);//a4_1 小計
	echo "</td>";
	
	echo "<td>"."<div align='right'>";
	echo number_format($a4_2_school);//a4_2 校
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a4_2_item);//a4_2 項
	echo "</td>";
	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a4_2_ordinary);//a4_2 經常門
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a4_2_mode);//a4_2 式
	echo "</td>";
	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a4_2_principle);//a4_2 資本門
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a4_2_money);//a4_2 小計
	echo "</td>";				

	echo "<td>"."<div align='right'>";
	echo number_format($a5_school);//a5 校
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a5_item);//a5 項
	echo "</td>";	
	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a5_ordinary);//a5_1 經常門
	echo "</td>";
	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a5_principle);//a5_2 資本門
	echo "</td>";
	
	echo "<td>"."<div align='right'>";
	echo number_format($a6_school);//a6 校
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a6_item);//a6 項
	echo "</td>";	
	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a6_ordinary);//a6_1 經常門
	echo "</td>";
	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a6_principle);//a6_2 資本門
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo number_format($a7_1_school);//a7_1 校
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a7_1_person);//a7_1 人
	echo "</td>";	
	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a7_1_money);//a7_1 申請經費
	echo "</td>";

	echo "<td>"."<div align='right'>";
	echo number_format($a7_2_school);//a7_2 校
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a7_2_person);//a7_2 人
	echo "</td>";	
	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a7_2_money);//a7_2 申請經費
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a7_3_school);//a7_3 校
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a7_3_person);//a7_3 人
	echo "</td>";	
	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a7_3_money);//a7_3 申請經費
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a8_1_school);//a8_1 校
	echo "</td>";
	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a8_1_fix);//a8_1 修建
	echo "</td>";	
	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a8_1_equip);//a8_1 設備
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a8_2_school);//a8_2 校
	echo "</td>";
	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a8_2_fix);//a8_2 修建
	echo "</td>";	
	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a8_2_equip);//a8_2 設備
	echo "</td>";
	echo "<td>"."<div align='right'>";
	echo number_format($a8_3_school);//a8_3 校
	echo "</td>";
	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a8_3_fix);//a8_3 修建
	echo "</td>";	
	echo "<td bgcolor='#FFFFCC'>"."<div align='right'>";
	echo number_format($a8_3_equip);//a8_3 設備
	echo "</td>";
		
				 $p1_1_school=$p1_1_school+$row[2];
				 $p1_1_space=$p1_1_space+$row[3];
				 $p1_1_person=$p1_1_person+$row[4];
				 $p1_1_money = $p1_1_money +$row[5];
				 $p1_2_school=$p1_2_school+$row[6];
				 $p1_2_person=$p1_2_person+$row[7];
				 $p1_2_money = $p1_2_money +$row[8];
				 $p2_1_school = $p2_1_school+$row[9];
				 $p2_1_class = $p2_1_class+$row[10];
				 $p2_1_person = $p2_1_person+$row[11];
				 $p2_1_money = $p2_1_money+$row[12];
				 $p2_2_school = $p2_2_school+$row[13];
				 $p2_2_class = $p2_2_class+$row[14];
				 $p2_2_person = $p2_2_person+$row[15];
				 $p2_2_money = $p2_2_money+$row[16];
				 $p2_3_school = $p2_3_school+$row[17];
 				 $p2_3_class = $p2_3_class+$row[18];
				 $p2_3_person = $p2_3_person+$row[19];
				 $p2_3_money = $p2_3_money+$row[20];
				 $p3_school=$p3_school+$row[21];
				 $p3_item=$p3_item+$row[22];
				 $p3_ordinary=$p3_ordinary+$row[23];
				 $p3_principle=$p3_principle+$row[24];
				 
				 $p4_1_school=$p4_1_school+$row[25];
				 $p4_1_item=$p4_1_item+$row[26];
				 $p4_1_ordinary=$p4_1_ordinary+$row[27];
				 $p4_1_mode=$p4_1_mode+$row[28];
				 $p4_1_principle=$p4_1_principle+$row[29];
				 $p4_1_money=$p4_1_money+$row[30];
				 $p4_2_school=$p4_2_school+$row[31];
           		 $p4_2_item=$p4_2_item+$row[32];
				 $p4_2_ordinary=$p4_2_ordinary+$row[33];
				 $p4_2_mode=$p4_2_mode+$row[34];
				 $p4_2_principle=$p4_2_principle+$row[35];
				 $p4_2_money=$p4_2_money+$row[36];
				 
				 $p5_school=$p5_school+$row[37];
				 $p5_item=$p5_item+$row[38];
				 $p5_ordinary=$p5_ordinary+$row[39];
				 $p5_principle=$p5_principle+$row[40];
				 
				 $p6_school=$p6_school+$row[41];
				 $p6_item=$p6_item+$row[42];
				 $p6_ordinary=$p6_ordinary+$row[43];
				 $p6_principle=$p6_principle+$row[44];
				 

				 $p7_1_school=$p7_1_school+$row[45];
				 $p7_1_person=$p7_1_person+$row[46];
				 $p7_1_money=$p7_1_money+$row[47];
				 $p7_2_school=$p7_2_school+$row[48];
				 $p7_2_person=$p7_2_person+$row[49];
				 $p7_2_money=$p7_2_money+$row[50];
				 $p7_3_school=$p7_3_school+$row[51];
				 $p7_3_person=$p7_3_person+$row[52];
				 $p7_3_money=$p7_3_money+$row[53];
				 
				 $p8_1_school=$p8_1_school+$row[54];
				 $p8_1_fix=$p8_1_fix+$row[55];
				 $p8_1_equip=$p8_1_equip+$row[56];
				 $p8_2_school=$p8_2_school+$row[57];
				 $p8_2_fix=$p8_2_fix+$row[58];
				 $p8_2_equip=$p8_2_equip+$row[59];
				 $p8_3_school=$p8_3_school+$row[60];
				 $p8_3_fix=$p8_3_fix+$row[61];
				 $p8_3_equip=$p8_3_equip+$row[62];												
	}
  ?>
  <tr>
    <td width="110" height="46">補助項目總合</td>
		<td ><div align="right"><? echo number_format($p1_1_school);?></div></td>
		<td><? echo number_format($p1_1_space);?></td>
		<td><? echo number_format($p1_1_person);?></td>
		<td bgcolor="#FFFFCC"><? echo number_format($p1_1_money);?></td>
		<td><div align="right"><? echo number_format( $p1_2_school);?></div></td>
		<td><? echo number_format($p1_2_person);?></td>
		<td bgcolor="#FFFFCC"><? echo number_format($p1_2_money);?></td>
		<td><div align="right"><? echo number_format($p2_1_school);?></div></td>
		<td><? echo number_format($p2_1_class);?></td>
		<td><? echo number_format($p2_1_person);?></td>
		<td bgcolor="#FFFFCC"><? echo number_format($p2_1_money);?></td>
		<td><div align="right"><? echo number_format($p2_2_school);?></div></td>
		<td><? echo number_format($p2_2_class);?></td>
		<td><? echo number_format($p2_2_person);?></td>
		<td bgcolor="#FFFFCC"><? echo number_format($p2_2_money);?></td>
		<td><div align="right"><? echo number_format($p2_3_school);?></div></td>
		<td><? echo number_format($p2_3_class);?></td>
		<td><? echo number_format($p2_3_person);?></td>
		<td bgcolor="#FFFFCC"><? echo number_format($p2_3_money);?></td>
		<td><div align="right"><? echo number_format($p3_school);?></div></td>
		<td><? echo number_format($p3_item);?></td>
		<td bgcolor="#FFFFCC"><? echo number_format($p3_ordinary);?></td>
		<td bgcolor="#FFFFCC"><div align="right"><? echo number_format($p3_principle);?></div></td>
		<td><div align="right"><? echo number_format($p4_1_school);?></div></td>
		<td><? echo number_format($p4_1_item);?></td>
		<td bgcolor="#FFFFCC"><? echo number_format($p4_1_ordinary);?></td>
		<td><div align="right"><? echo number_format($p4_1_mode);?></div></td>
        <td bgcolor="#FFFFCC"><? echo number_format($p4_1_principle);?></td>
        <td ><? echo number_format($p4_1_money);?></td>
        <td><div align="right"><? echo number_format($p4_2_school);?></div></td>
        <td><? echo number_format($p4_2_item);?></td>
        <td bgcolor="#FFFFCC"><? echo number_format($p4_2_ordinary);?></td>
        <td><div align="right"><? echo number_format($p4_2_mode);?></div></td>
		<td bgcolor="#FFFFCC"><? echo number_format($p4_2_principle);?></td>
		<td ><? echo number_format($p4_2_money);?></td>
		<td><div align="right"><? echo number_format($p5_school);?></div></td>
        <td><? echo number_format($p5_item);?></td>
        <td bgcolor="#FFFFCC"><? echo number_format($p5_ordinary);?></td>
        <td bgcolor="#FFFFCC"><div align="right"><? echo number_format($p5_principle);?></div></td>
		<td><div align="right"><? echo number_format($p6_school);?></div></td>
		<td><? echo number_format($p6_item);?></td>
		<td bgcolor="#FFFFCC"><? echo number_format($p6_ordinary);?></td>
		<td bgcolor="#FFFFCC"><div align="right"><? echo number_format($p6_principle);?></div></td>
		<td><div align="right"><? echo number_format($p7_1_school);?></div></td>
		<td><? echo number_format($p7_1_person);?></td>
		<td bgcolor="#FFFFCC"><? echo number_format($p7_1_money);?></td>
		<td><div align="right"><? echo number_format($p7_2_school);?></div></td>
		<td><? echo number_format($p7_2_person);?></td>
		<td bgcolor="#FFFFCC"><? echo number_format($p7_2_money);?></td>
		<td><div align="right"><? echo number_format($p7_3_school);?></div></td>
		<td><? echo number_format($p7_3_person);?></td>
		<td bgcolor="#FFFFCC"><? echo number_format($p7_3_money);?></td>
		<td><div align="right"><? echo number_format($p8_1_school);?></div></td>
		<td bgcolor="#FFFFCC"><? echo number_format($p8_1_fix);?></td>
		<td bgcolor="#FFFFCC"><? echo number_format($p8_1_equip);?></td>
		<td><div align="right"><? echo number_format($p8_2_school);?></div></td>
		<td bgcolor="#FFFFCC"><? echo number_format($p8_2_fix);?></td>
		<td bgcolor="#FFFFCC"><? echo number_format($p8_2_equip) ;?></td>
		<td><div align="right"><? echo number_format($p8_3_school);?></div></td>
        <td bgcolor="#FFFFCC"><? echo number_format($p8_3_fix);?></td>
        <td bgcolor="#FFFFCC"><? echo number_format($p8_3_equip);?></td>
  </tr>
</table>
<!--SCRIPT 開始--> <!--webbot bot="HTMLMarkup" StartSpan --> 
<SCRIPT Language="Javascript"> 
/* 
This script is written by Eric (Webcrawl@usa.net) 
For full source code, installation instructions, 
100's more DHTML scripts, and Terms Of 
Use, visit dynamicdrive.com 
*/ 

function printit(){ 
if (NS) { 
window.print() ; 
} else { 
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>'; 
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); 
WebBrowser1.ExecWB(6, 2);//Use a 1 vs. a 2 for a prompting dialog box WebBrowser1.outerHTML = ""; 
} 
} 
</script> 
<SCRIPT Language="Javascript"> 
var NS = (navigator.appName == "Netscape"); 
var VERSION = parseInt(navigator.appVersion); 
if (VERSION > 3) { 
document.write('<form><input type=button value="列印本頁" name="Print" onClick="printit()"></form>'); 
} 
</script> 
<!--webbot BOT="HTMLMarkup" endspan --> <!--SCRIPT結束-->