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
echo $username;
echo $city;

$show_j = 0; // 判斷國中資料是否已開始輸出，作為分隔列用。
include "../xSchoolForm/button_print02.php";
$serial = 0;
?>
<input type="button" value="關閉本頁" onClick="window.close()">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="print_content">
<?echo "【".$city."政府辦理教育部102年度推動教育優先區計畫指標界定調查結果彙整表 (表Ⅱ-3) 】";?>
<table border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td rowspan="3" nowrap="nowrap">學校編號</td>
    <td rowspan="3" nowrap="nowrap">　　學　校　名　稱　　</td>
    <td rowspan="3" align='center'>班級數</td>
    <td rowspan="3" align='center'>全校學生總數</td>
    <td colspan="3" rowspan="2" align="left">教師編制人數</td>
    <td colspan="4" rowspan="2" align="left">學校所處地區</td>
    <td colspan="6" align="left">指標一：原住民學生比例偏高之學校</td>
    <td colspan="10" align="left">指標二：低收入戶、隔代教養、單(寄)親家庭、親子年齡差距過大、新移民子女學生比例偏高之學校</td>
    <td colspan="4" align="left">指標三：國中學習弱勢學生比例偏高之學校</td>
    <td colspan="4" align="left">指標四：中途輟學率偏高之學校</td>
    <td colspan="6" align="left">指標五：離島或偏遠交通不便之學校</td>
    <td colspan="13" align="left">指標六：教師流動率及代理教師比例偏高之學校</td>
    <td rowspan="3" align="center">符合指標條件總數</td>
  </tr>
  <tr>
    <td rowspan="2" align="center">原住民學生數</td>
    <td rowspan="2" align="center">佔全校學生比例 %</td>
    <td colspan="4" align="center">指標界定</td>
    <td colspan="6" align="center">目標學生人數</td>
    <td rowspan="2" align="center">佔全校學生比例</td>
    <td colspan="3" align="center">指標界定</td>
    <td rowspan="2" align="center">100學年畢業生人數</td>
    <td rowspan="2" align="center">100 學年第一次學測PR ≦ 25 人數</td>
    <td rowspan="2" align="center">PR ≦ 25 人數佔畢業生人數之比例 (%)</td>
    <td align="center">指標界定</td>
    <td rowspan="2" align="center">100/9/1 - 101/6/30 中輟學生人數</td>
    <td rowspan="2" align="center">100/9/30 在籍學生人數</td>
    <td rowspan="2" align="center">中輟學生佔全校學生之百分比</td>
    <td align="center">指標界定</td>
    <!-- <td colspan="4">離島</td> -->
    <td colspan="1" rowspan="2" align="center">離島</td>
    <td colspan="4" align="center">特偏、偏遠地區</td>
    <td rowspan="2" align="center">91學年前因裁倂校學區遼闊需交通車接送</td>
    <td rowspan="2" align="center">教師編制總人數 99 + 100 + 101 年</td>
    <td colspan="4" align="center">教師異動人數</td>
    <td rowspan="2" align="center">最近三學年教師流動率</td>
    <td colspan="4" align="center">代理教師人數</td>
    <td rowspan="2" align="center"> 最近三學年代理教師比例</td>
    <td colspan="2" align="center">指標界定</td>
  </tr>
  <tr>
    <td align="center">99 學年</td>
    <td align="center">100 學年</td>
    <td align="center">101 學年</td>
    <td align="center">離島</td>
    <td align="center">特偏偏遠</td>
    <td align="center">一般地區</td>
    <td align="center">都會地區</td>
    <td align="center">一 ~ (一) 40% 以上</td>
    <td align="center">一 ~ (二) 20% 以上</td>
    <td align="center">一 ~ (三) 15% 以上</td>
    <td align="center">一~ (四) 35 人以上</td>
    <td align="center">低收入戶子女</td>
    <td align="center">隔代教養</td>
    <td align="center">親子年齡差距45歲以上</td>
    <td align="center">新移民子女</td>
    <td align="center">單寄親家庭</td>
    <td align="center">目標學生合計人數</td>
    <td align="center">二 ~ (一) 20% 以上</td>
    <td align="center">二 ~ (二) 60 人以上</td>
    <td align="center">二 ~ (三) 含原住民學生30%以上</td>
    <td align="center">PR ≦ 25 之人數比例 ≧ 40%</td>
    <td align="center">指標四( 3% 以上)</td>
    <!--<td>一級</td> -->
    <!--<td>二級</td> -->
    <!--<td>三級</td> -->
    <!--<td>四級</td> -->
    <td align="center">無公共交通工具可達</td>
    <td align="center">學校距站牌 5 km 以上</td>
    <td align="center">距社區 5 km 無公車</td>
    <td align="center">公共交通工具每天少於 4 班</td>
    <td align="center">99 學年</td>
    <td align="center">100 學年</td>
    <td align="center">101 學年</td>
    <td align="center">教師異動總人數 99 + 100 + 101 年=</td>
    <td align="center">99 學年</td>
    <td align="center">100 學年</td>
    <td align="center">101 學年</td>
    <td align="center">代理教師總人數 99 + 100 + 101 年=</td>
    <td align="center">六 - (一)教師流動率平均 ≧ 30%</td>
    <td align="center">六 - (二) 代理教師比例平均 ≧ 30%</td>
  </tr>
<?
//學校列表
$sql = "select * from 102schooldata where cityname like '%$city%' order by account;";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$serial++;
	$school_id=$row[0];
	$city = $row[2];		//縣市
	$district = $row[4];	//區
	$school = $row[5];		//學校名稱
	$school_full_name = $row[2].$row[4].$row[5];
	$school_class=$row[1];

	if($school_class == '1' ){
		$sql_basedata = "select * from 102schooldata where account like '$school_id';";
		$result_basedata = mysql_query($sql_basedata);
		while($row_basedata = mysql_fetch_row($result_basedata)){
			$school_allstudent = $row_basedata[100];//學生總數
			$school_classes = $row_basedata[101];//學校班級數
			$school_area = $row_basedata[109];//學校地區
			$area_0 = ' ';
			$area_1 = ' ';
			$area_2 = ' ';
			$area_3 = ' ';
			switch ($school_area){
				case '1':
					$area_0 = "1";
					break;
				case '2':
					$area_1 = "1";
					break;
				case '3':
					$area_2 = "1";
					break;
				case '4':
					$area_3 = "1";
					break;
			}
			echo "<tr>";
			echo "<td>".$school_id."</td>"; ////////////////////////////////學校編號 , 後續輸出共53欄
			echo "<td>"."<div align='left'>".$school_full_name."</td>";//學校名稱
			$sum_e ++;
			echo "<td>"."<div align='right'>".$school_classes."</td>";//全校班級數
			$sum_e_1 = $sum_e_1 + $school_classes;
			echo "<td>"."<div align='right'>".$school_allstudent."</td>";//全校學生人數
			$sum_e_2 = $sum_e_2 + $school_allstudent;

		

			$t99 = $row_basedata[133];//99年編制教師數
			$t100 = $row_basedata[134];//100年編制教師數
			$t101 = $row_basedata[135];//101年編制教師數
			echo "<td>"."<div align='right'>".$t99."</td>";//99年編制教師數
			$sum_e_3 = $sum_e_3 + $t99;
			echo "<td>"."<div align='right'>".$t100."</td>";//100年編制教師數
			$sum_e_4 = $sum_e_4 + $t100;
			echo "<td>"."<div align='right'>".$t101."</td>";//101年編制教師數
			$sum_e_5 = $sum_e_5 + $t101;
			echo "<td>"."<div align='center'>".$area_0."</td>";//學校區域0 離島
			if($area_0 > 0){$sum_e_6 ++;};
			echo "<td>"."<div align='center'>".$area_1."</td>";//學校區域1 偏遠特偏
			if($area_1 > 0){$sum_e_7 ++;};
			echo "<td>"."<div align='center'>".$area_2."</td>";//學校區域2 一般地區
			if($area_2 > 0){$sum_e_8 ++;};
			echo "<td>"."<div align='center'>".$area_3."</td>";//學校區域3 都會地區
			if($area_3 > 0){$sum_e_9 ++;};

		

			echo "<td>"."<div align='right'>".$row_basedata[113]."</td>";//原住民學生數
			$sum_e_10 = $sum_e_10 + $row_basedata[113];
			echo "<td>"."<div align='right'>".number_format($row_basedata[113]/$school_allstudent*100,2)."</td>";//原住民學生數百分比(%)
			$sum_e_11 = '';

		

			$p1_1=' ';
			$p1_2=' ';
			$p1_3=' ';
			$p1_4=' ';
			$p2_1=' ';
			$p2_2=' ';
			$p2_3=' ';
			$p3=' ';
			$p4=' ';
			$p5_1=' ';
			$p5_2=' ';
			$p5_3=' ';
			$p6_1=' ';
			$p6_2=' ';
			if($row_basedata[174]==1)$p1_1="1";
			if($row_basedata[175]==1)$p1_2="1";
			if($row_basedata[176]==1)$p1_3="1";
			if($row_basedata[177]==1)$p1_4="1";
			if($row_basedata[178]==1)$p2_1="1";
			if($row_basedata[179]==1)$p2_2="1";
			if($row_basedata[180]==1)$p2_3="1";
			if($row_basedata[181]==1)$p3="1";
			if($row_basedata[182]==1)$p4="1";
			if($row_basedata[183]==1)$p5_1="1";
			if($row_basedata[184]==1)$p5_2="1";
			if($row_basedata[185]==1)$p5_3="1";
			if($row_basedata[186]==1)$p6_1="1";
			if($row_basedata[187]==1)$p6_2="1";
			echo "<td>"."<div align='center'>".$p1_1."</td>";//指標1-1
			if($p1_1 > 0){$sum_e_12 ++;};
			echo "<td>"."<div align='center'>".$p1_2."</td>";//指標1-2
			if($p1_2 > 0){$sum_e_13 ++;};
			echo "<td>"."<div align='center'>".$p1_3."</td>";//指標1-3
			if($p1_3 > 0){$sum_e_14 ++;};
			echo "<td>"."<div align='center'>".$p1_4."</td>";//指標1-4
			if($p1_4 > 0){$sum_e_15 ++;};

		

			echo "<td>"."<div align='right'>".$row_basedata[114]."</td>";//低收入戶
			$sum_e_16 = $sum_e_16 + $row_basedata[114];
			echo "<td>"."<div align='right'>".$row_basedata[115]."</td>";//隔代教養
			$sum_e_17 = $sum_e_17 + $row_basedata[115];
			echo "<td>"."<div align='right'>".$row_basedata[116]."</td>";//親子年齡差距45歲以上
			$sum_e_18 = $sum_e_18 + $row_basedata[116];
			echo "<td>"."<div align='right'>".$row_basedata[117]."</td>";//新移民子女
			$sum_e_19 = $sum_e_19 + $row_basedata[117];
			echo "<td>"."<div align='right'>".$row_basedata[118]."</td>";//單寄親家庭
			$sum_e_19B = $sum_e_19B + $row_basedata[118];
			echo "<td>"."<div align='right'>".$row_basedata[119]."</td>";//目標學生合計人數
			$sum_e_20 = $sum_e_20 + $row_basedata[119];
			echo "<td>"."<div align='right'>".number_format($row_basedata[119]/$school_allstudent*100,2)."</td>";//目標學生佔全校學生比例
			$sum_e_21 = '';
			echo "<td>"."<div align='center'>".$p2_1."</td>";//指標2-1
			if($p2_1 > 0){$sum_e_22 ++;};
			echo "<td>"."<div align='center'>".$p2_2."</td>";//指標2-2
			if($p2_2 > 0){$sum_e_23 ++;};
			echo "<td>"."<div align='center'>".$p2_3."</td>";//指標2-3
			if($p2_3 > 0){$sum_e_24 ++;};



			echo "<td>"."<div align='right'>".$row_basedata[122]."</td>";//國中前學年度畢業生人數
			$sum_e_25 = $sum_e_25 + $row_basedata[122];
			echo "<td>"."<div align='right'>".$row_basedata[123]."</td>";//國中第一次學測PR<=25人數
			$sum_e_26 = $sum_e_26 + $row_basedata[123];
			echo "<td>"."<div align='right'>".number_format($row_basedata[123]/$row_basedata[122]*100,2)."</td>";//國中第一次學測PR<=25人數比例
			$sum_e_27 = '';
			echo "<td>"."<div align='center'>".$p3."</td>";//指標3
			if($p3 > 0){$sum_e_28 ++;};
			echo "<td>"."<div align='right'>".$row_basedata[124]."</td>";//中輟學生人數 (指標4)
			$sum_e_29 = $sum_e_29 + $row_basedata[124];
			echo "<td>"."<div align='right'>".$row_basedata[26]."</td>";//在籍學生人數 (指標4)
			$sum_e_30 = $sum_e_30 + $row_basedata[26];
			echo "<td>"."<div align='right'>".number_format($row_basedata[124]/$row_basedata[26]*100,2)."</td>";//中輟學生佔在籍學生人數比例
			$sum_e_31 = '';
			echo "<td>"."<div align='center'>".$p4."</td>";//指標4
			if($p4 > 0){$sum_e_32 ++;};
			//echo "<td colspan=4>"."<div align='right'>".$row_basedata[4]."</td>";//離島 (指標5)
			if($row_basedata[126] > 0){
				$sum_e_33 ++;
				echo "<td>"."<div align='right'>".$row_basedata[126]."</td>";//離島 (指標5)
			}else{
				echo "<td>"."<div align='right'></td>";//離島 (指標5)
			}

			if($row_basedata[127] > 0){
				$sum_e_34 ++;
				echo "<td>"."<div align='right'>".$row_basedata[127]."</td>";//無公共交通工具 (指標5)
			}else{
				echo "<td>"."<div align='right'></td>";//無公共交通工具 (指標5)
			}
			
			if($row_basedata[128] > 0){
				$sum_e_35 ++;
				echo "<td>"."<div align='right'>".$row_basedata[128]."</td>";//學校距站牌5km以上 (指標5)
			}else{
				echo "<td>"."<div align='right'></td>";//學校距站牌5km以上 (指標5)
			}
			
			if($row_basedata[129] > 0){
				$sum_e_36 ++;
				echo "<td>"."<div align='right'>".$row_basedata[129]."</td>";//社區5km無公車 (指標5)
			}else{
				echo "<td>"."<div align='right'></td>";//社區5km無公車 (指標5)
			}
			
			if($row_basedata[130] > 0){
				$sum_e_37 ++;
				echo "<td>"."<div align='right'>".$row_basedata[130]."</td>";//每天少於4班 (指標5)
			}else{
				echo "<td>"."<div align='right'></td>";//每天少於4班 (指標5)
			}
			
			if($row_basedata[131] > 0){
				$sum_e_38 ++;
				echo "<td>"."<div align='right'>".$row_basedata[131]."</td>";//因裁併校需交通車 (指標5)
			}else{
				echo "<td>"."<div align='right'></td>";//因裁併校需交通車 (指標5)
			}



			$t_sum = $row_basedata[133]+$row_basedata[134]+$row_basedata[135];//99+100+101年編制教師數
			echo "<td>"."<div align='right'>".$t_sum."</td>";//99+100+101年編制教師數
			$sum_e_39 = $sum_e_39 + $t_sum;
			echo "<td>"."<div align='right'>".($row_basedata[136]+$row_basedata[139])."</td>";//99教師異動人數
			$sum_e_40 = $sum_e_40 + ($row_basedata[136]+$row_basedata[139]);
			echo "<td>"."<div align='right'>".($row_basedata[137]+$row_basedata[140])."</td>";//100教師異動人數
			$sum_e_41 = $sum_e_41 + ($row_basedata[137]+$row_basedata[140]);
			echo "<td>"."<div align='right'>".($row_basedata[138]+$row_basedata[141])."</td>";//101教師異動人數
			$sum_e_42 = $sum_e_42 + ($row_basedata[138]+$row_basedata[141]);
			$t_sum_1 = $row_basedata[136]+$row_basedata[137]+$row_basedata[138]+$row_basedata[139]+$row_basedata[140]+$row_basedata[141];//異動總人數
			echo "<td>"."<div align='right'>".$t_sum_1."</td>";//最近三年教師流動人數
			$sum_e_43 = $sum_e_43 + $t_sum_1;
			echo "<td>"."<div align='right'>".number_format($t_sum_1/$t_sum*100,2)."</td>";//最近三年教師流動率
			$sum_e_44 = '';
			
			echo "<td>"."<div align='right'>".($row_basedata[139]+$row_basedata[142])."</td>";//99教師代理人數
			$sum_e_45 = $sum_e_45 + ($row_basedata[139]+$row_basedata[142]);
			echo "<td>"."<div align='right'>".($row_basedata[140]+$row_basedata[143])."</td>";//100教師代理人數
			$sum_e_46 = $sum_e_46 + ($row_basedata[140]+$row_basedata[143]);
			echo "<td>"."<div align='right'>".($row_basedata[141]+$row_basedata[144])."</td>";//101教師代理人數
			$sum_e_47 = $sum_e_47 + ($row_basedata[141]+$row_basedata[144]);
			$t_sum_2 = $row_basedata[139]+$row_basedata[140]+$row_basedata[141]+$row_basedata[142]+$row_basedata[143]+$row_basedata[144];//異動總人數
			echo "<td>"."<div align='right'>".$t_sum_2."</td>";//最近三年教師代理人數
			$sum_e_48 = $sum_e_48 + $t_sum_2;
			echo "<td>"."<div align='right'>".number_format($t_sum_2/$t_sum*100,2)."</td>";//最近三年教師代理率
			$sum_e_49 = '';
			echo "<td>"."<div align='center'>".$p6_1."</td>";//指標6_1
			if($p6_1 > 0){$sum_e_50 ++;};
			echo "<td>"."<div align='center'>".$p6_2."</td>";//指標6_2
			if($p6_2 > 0){$sum_e_51 ++;};
			/*指標一~指標六的符合指標總數不能超過 6 
			就算符合指標下的多個小項目也只能算一個*/
			$p1 = trim($p1_1) || trim($p1_2) || trim($p1_3) || trim($p1_4); //用 or 做，只要其中一個符合就會回傳1
			$p2 = trim($p2_1) || trim($p2_2) || trim($p2_3);                 //用trim是因為前面宣告的時候預設一格空白
			$p5 = trim($p5_1) || trim($p5_2) || trim($p5_3);
			$p6 = trim($p6_1) || trim($p6_2);
			$p_sum_school = $p1+$p2+$p3+$p4+$p5+$p6; 
			echo "<td>"."<div align='right'>".$p_sum_school."</td>";//該校符合指標總數
			$sum_e_52 = $sum_e_52 + $p_sum_school;



		echo "</tr>";
		}
		
	}elseif($school_class == '2' ){
		
		$sql_basedata = "select * from 102schooldata where account like '$school_id';";
		$result_basedata = mysql_query($sql_basedata);
		while($row_basedata = mysql_fetch_row($result_basedata)){
			$school_allstudent = $row_basedata[100];//學生總數
			$school_classes = $row_basedata[101];//學校班級數
			$school_area = $row_basedata[109];//學校地區
			$area_0 = ' ';
			$area_1 = ' ';
			$area_2 = ' ';
			$area_3 = ' ';
			switch ($school_area){
				case '1':
					$area_0 = "1";
					break;
				case '2':
					$area_1 = "1";
					break;
				case '3':
					$area_2 = "1";
					break;
				case '4':
					$area_3 = "1";
					break;
			}
			echo "<tr>";
			echo "<td>".$school_id."</td>"; ////////////////////////////////學校編號 , 後續輸出共53欄
			echo "<td>"."<div align='left'>".$school_full_name."</td>";//學校名稱
			$sum_j ++;
			echo "<td>"."<div align='right'>".$school_classes."</td>";//全校班級數
			$sum_j_1 = $sum_j_1 + $school_classes;
			echo "<td>"."<div align='right'>".$school_allstudent."</td>";//全校學生人數
			$sum_j_2 = $sum_j_2 + $school_allstudent;

		

			$t99 = $row_basedata[133];//99年編制教師數
			$t100 = $row_basedata[134];//100年編制教師數
			$t101 = $row_basedata[135];//101年編制教師數
			echo "<td>"."<div align='right'>".$t99."</td>";//99年編制教師數
			$sum_j_3 = $sum_j_3 + $t99;
			echo "<td>"."<div align='right'>".$t100."</td>";//100年編制教師數
			$sum_j_4 = $sum_j_4 + $t100;
			echo "<td>"."<div align='right'>".$t101."</td>";//101年編制教師數
			$sum_j_5 = $sum_j_5 + $t101;
			echo "<td>"."<div align='center'>".$area_0."</td>";//學校區域0 離島
			if($area_0 > 0){$sum_j_6 ++;};
			echo "<td>"."<div align='center'>".$area_1."</td>";//學校區域1 偏遠特偏
			if($area_1 > 0){$sum_j_7 ++;};
			echo "<td>"."<div align='center'>".$area_2."</td>";//學校區域2 一般地區
			if($area_2 > 0){$sum_j_8 ++;};
			echo "<td>"."<div align='center'>".$area_3."</td>";//學校區域3 都會地區
			if($area_3 > 0){$sum_j_9 ++;};

		

			echo "<td>"."<div align='right'>".$row_basedata[113]."</td>";//原住民學生數
			$sum_j_10 = $sum_j_10 + $row_basedata[113];
			echo "<td>"."<div align='right'>".number_format($row_basedata[113]/$school_allstudent*100,2)."</td>";//原住民學生數百分比(%)
			$sum_j_11 = '';

		

			$p1_1=' ';
			$p1_2=' ';
			$p1_3=' ';
			$p1_4=' ';
			$p2_1=' ';
			$p2_2=' ';
			$p2_3=' ';
			$p3=' ';
			$p4=' ';
			$p5_1=' ';
			$p5_2=' ';
			$p5_3=' ';
			$p6_1=' ';
			$p6_2=' ';
			if($row_basedata[174]==1)$p1_1="1";
			if($row_basedata[175]==1)$p1_2="1";
			if($row_basedata[176]==1)$p1_3="1";
			if($row_basedata[177]==1)$p1_4="1";
			if($row_basedata[178]==1)$p2_1="1";
			if($row_basedata[179]==1)$p2_2="1";
			if($row_basedata[180]==1)$p2_3="1";
			if($row_basedata[181]==1)$p3="1";
			if($row_basedata[182]==1)$p4="1";
			if($row_basedata[183]==1)$p5_1="1";
			if($row_basedata[184]==1)$p5_2="1";
			if($row_basedata[185]==1)$p5_3="1";
			if($row_basedata[186]==1)$p6_1="1";
			if($row_basedata[187]==1)$p6_2="1";
			echo "<td>"."<div align='center'>".$p1_1."</td>";//指標1-1
			if($p1_1 > 0){$sum_j_12 ++;};
			echo "<td>"."<div align='center'>".$p1_2."</td>";//指標1-2
			if($p1_2 > 0){$sum_j_13 ++;};
			echo "<td>"."<div align='center'>".$p1_3."</td>";//指標1-3
			if($p1_3 > 0){$sum_j_14 ++;};
			echo "<td>"."<div align='center'>".$p1_4."</td>";//指標1-4
			if($p1_4 > 0){$sum_j_15 ++;};

		

			echo "<td>"."<div align='right'>".$row_basedata[114]."</td>";//低收入戶
			$sum_j_16 = $sum_j_16 + $row_basedata[114];
			echo "<td>"."<div align='right'>".$row_basedata[115]."</td>";//隔代教養
			$sum_j_17 = $sum_j_17 + $row_basedata[115];
			echo "<td>"."<div align='right'>".$row_basedata[116]."</td>";//親子年齡差距45歲以上
			$sum_j_18 = $sum_j_18 + $row_basedata[116];
			echo "<td>"."<div align='right'>".$row_basedata[117]."</td>";//新移民子女
			$sum_j_19 = $sum_j_19 + $row_basedata[117];
			echo "<td>"."<div align='right'>".$row_basedata[118]."</td>";//單寄親家庭
			$sum_j_19B = $sum_j_19B + $row_basedata[118];
			echo "<td>"."<div align='right'>".$row_basedata[119]."</td>";//目標學生合計人數
			$sum_j_20 = $sum_j_20 + $row_basedata[119];
			echo "<td>"."<div align='right'>".number_format($row_basedata[119]/$school_allstudent*100,2)."</td>";//目標學生佔全校學生比例
			$sum_j_21 = '';
			echo "<td>"."<div align='center'>".$p2_1."</td>";//指標2-1
			if($p2_1 > 0){$sum_j_22 ++;};
			echo "<td>"."<div align='center'>".$p2_2."</td>";//指標2-2
			if($p2_2 > 0){$sum_j_23 ++;};
			echo "<td>"."<div align='center'>".$p2_3."</td>";//指標2-3
			if($p2_3 > 0){$sum_j_24 ++;};



			echo "<td>"."<div align='right'>".$row_basedata[122]."</td>";//國中前學年度畢業生人數
			$sum_j_25 = $sum_j_25 + $row_basedata[122];
			echo "<td>"."<div align='right'>".$row_basedata[123]."</td>";//國中第一次學測PR<=25人數
			$sum_j_26 = $sum_j_26 + $row_basedata[123];
			echo "<td>"."<div align='right'>".number_format($row_basedata[123]/$row_basedata[122]*100,2)."</td>";//國中第一次學測PR<=25人數比例
			$sum_j_27 = '';
			echo "<td>"."<div align='center'>".$p3."</td>";//指標3
			if($p3 > 0){$sum_j_28 ++;};
			echo "<td>"."<div align='right'>".$row_basedata[124]."</td>";//中輟學生人數 (指標4)
			$sum_j_29 = $sum_j_29 + $row_basedata[124];
			echo "<td>"."<div align='right'>".$row_basedata[26]."</td>";//在籍學生人數 (指標4)
			$sum_j_30 = $sum_j_30 + $row_basedata[26];
			echo "<td>"."<div align='right'>".number_format($row_basedata[124]/$row_basedata[26]*100,2)."</td>";//中輟學生佔在籍學生人數比例
			$sum_j_31 = '';
			echo "<td>"."<div align='center'>".$p4."</td>";//指標4
			if($p4 > 0){$sum_j_32 ++;};
			//echo "<td colspan=4>"."<div align='right'>".$row_basedata[4]."</td>";//離島 (指標5)
			if($row_basedata[126] > 0){
				$sum_j_33 ++;
				echo "<td>"."<div align='right'>".$row_basedata[126]."</td>";//離島 (指標5)
			}else{
				echo "<td>"."<div align='right'></td>";//離島 (指標5)
			}

			if($row_basedata[127] > 0){
				$sum_j_34 ++;
				echo "<td>"."<div align='right'>".$row_basedata[127]."</td>";//無公共交通工具 (指標5)
			}else{
				echo "<td>"."<div align='right'></td>";//無公共交通工具 (指標5)
			}
			
			if($row_basedata[128] > 0){
				$sum_j_35 ++;
				echo "<td>"."<div align='right'>".$row_basedata[128]."</td>";//學校距站牌5km以上 (指標5)
			}else{
				echo "<td>"."<div align='right'></td>";//學校距站牌5km以上 (指標5)
			}
			
			if($row_basedata[129] > 0){
				$sum_j_36 ++;
				echo "<td>"."<div align='right'>".$row_basedata[129]."</td>";//社區5km無公車 (指標5)
			}else{
				echo "<td>"."<div align='right'></td>";//社區5km無公車 (指標5)
			}
			
			if($row_basedata[130] > 0){
				$sum_j_37 ++;
				echo "<td>"."<div align='right'>".$row_basedata[130]."</td>";//每天少於4班 (指標5)
			}else{
				echo "<td>"."<div align='right'></td>";//每天少於4班 (指標5)
			}
			
			if($row_basedata[131] > 0){
				$sum_j_38 ++;
				echo "<td>"."<div align='right'>".$row_basedata[131]."</td>";//因裁併校需交通車 (指標5)
			}else{
				echo "<td>"."<div align='right'></td>";//因裁併校需交通車 (指標5)
			}


			$t_sum = $row_basedata[133]+$row_basedata[134]+$row_basedata[135];//99+100+101年編制教師數
			echo "<td>"."<div align='right'>".$t_sum."</td>";//99+100+101年編制教師數
			$sum_j_39 = $sum_j_39 + $t_sum;
			echo "<td>"."<div align='right'>".($row_basedata[136]+$row_basedata[139])."</td>";//99教師異動人數
			$sum_j_40 = $sum_j_40 + ($row_basedata[136]+$row_basedata[139]);
			echo "<td>"."<div align='right'>".($row_basedata[137]+$row_basedata[140])."</td>";//100教師異動人數
			$sum_j_41 = $sum_j_41 + ($row_basedata[137]+$row_basedata[140]);
			echo "<td>"."<div align='right'>".($row_basedata[138]+$row_basedata[141])."</td>";//101教師異動人數
			$sum_j_42 = $sum_j_42 + ($row_basedata[138]+$row_basedata[141]);
			$t_sum_1 = $row_basedata[136]+$row_basedata[137]+$row_basedata[138]+$row_basedata[139]+$row_basedata[140]+$row_basedata[141];//異動總人數
			echo "<td>"."<div align='right'>".$t_sum_1."</td>";//最近三年教師流動人數
			$sum_j_43 = $sum_j_43 + $t_sum_1;
			echo "<td>"."<div align='right'>".number_format($t_sum_1/$t_sum*100,2)."</td>";//最近三年教師流動率
			$sum_j_44 = '';
			
			echo "<td>"."<div align='right'>".($row_basedata[139]+$row_basedata[142])."</td>";//99教師代理人數
			$sum_j_45 = $sum_j_45 + ($row_basedata[139]+$row_basedata[142]);
			echo "<td>"."<div align='right'>".($row_basedata[140]+$row_basedata[143])."</td>";//100教師代理人數
			$sum_j_46 = $sum_j_46 + ($row_basedata[140]+$row_basedata[143]);
			echo "<td>"."<div align='right'>".($row_basedata[141]+$row_basedata[144])."</td>";//101教師代理人數
			$sum_j_47 = $sum_j_47 + ($row_basedata[141]+$row_basedata[144]);
			$t_sum_2 = $row_basedata[139]+$row_basedata[140]+$row_basedata[141]+$row_basedata[142]+$row_basedata[143]+$row_basedata[144];//異動總人數
			echo "<td>"."<div align='right'>".$t_sum_2."</td>";//最近三年教師代理人數
			$sum_j_48 = $sum_j_48 + $t_sum_2;
			echo "<td>"."<div align='right'>".number_format($t_sum_2/$t_sum*100,2)."</td>";//最近三年教師代理率
			$sum_j_49 = '';
			echo "<td>"."<div align='center'>".$p6_1."</td>";//指標6_1
			if($p6_1 > 0){$sum_j_50 ++;};
			echo "<td>"."<div align='center'>".$p6_2."</td>";//指標6_2
			if($p6_2 > 0){$sum_j_51 ++;};
			/*指標一~指標六的符合指標總數不能超過 6 
			就算符合指標下的多個小項目也只能算一個*/
			$p1 = trim($p1_1) || trim($p1_2) || trim($p1_3) || trim($p1_4); //用 or 做，只要其中一個符合就會回傳1
			$p2 = trim($p2_1) || trim($p2_2) || trim($p2_3);                 //用trim是因為前面宣告的時候預設一格空白
			$p5 = trim($p5_1) || trim($p5_2) || trim($p5_3);
			$p6 = trim($p6_1) || trim($p6_2);
			$p_sum_school = $p1+$p2+$p3+$p4+$p5+$p6; 
			echo "<td>"."<div align='right'>".$p_sum_school."</td>";//該校符合指標總數
			$sum_j_52 = $sum_j_52 + $p_sum_school;



		echo "</tr>";
		}
	}


}

?>
	<tr>
	<td>國小合計</td>
<? echo "<td>"."<div align='right'>".number_format($sum_e)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_1)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_2)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_3)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_4)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_5)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_6)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_7)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_8)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_9)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_10)."</td>"; ?>

<? 
$sum_e_11 = ($sum_e_10/$sum_e_2*100);
echo "<td>"."<div align='right'>".number_format($sum_e_11,2)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_12)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_13)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_14)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_15)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_16)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_17)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_18)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_19)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_19B)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_20)."</td>"; ?>
<?
$sum_e_21 = ($sum_e_20/$sum_e_2*100);
echo "<td>"."<div align='right'>".number_format($sum_e_21,2)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_22)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_23)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_24)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_25)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_26)."</td>"; ?>
<?
$sum_e_27 = ($sum_e_26/$sum_e_25*100);
echo "<td>"."<div align='right'>".number_format($sum_e_27,2)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_28)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_29)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_30)."</td>"; ?>
<?
$sum_e_31 = ($sum_e_29/$sum_e_30*100);
echo "<td>"."<div align='right'>".number_format($sum_e_31,2)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_32)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_33)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_34)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_35)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_36)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_37)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_38)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_39)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_40)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_41)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_42)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_43)."</td>"; ?>
<?
$sum_e_44 = ($sum_e_43/$sum_e_39*100);
echo "<td>"."<div align='right'>".number_format($sum_e_44,2)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_45)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_46)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_47)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_48)."</td>"; ?>
<?
$sum_e_49 = ($sum_e_48/$sum_e_39*100);
echo "<td>"."<div align='right'>".number_format($sum_e_49,2)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_50)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_51)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_52)."</td>"; ?>
  </tr>
	<tr>
	<td>國中合計</td>
<? echo "<td>"."<div align='right'>".number_format($sum_j)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_1)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_2)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_3)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_4)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_5)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_6)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_7)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_8)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_9)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_10)."</td>"; ?>

<? 
$sum_j_11 = ($sum_j_10/$sum_j_2*100);
echo "<td>"."<div align='right'>".number_format($sum_j_11,2)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_12)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_13)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_14)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_15)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_16)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_17)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_18)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_19)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_19B)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_20)."</td>"; ?>
<?
$sum_j_21 = ($sum_j_20/$sum_j_2*100);
echo "<td>"."<div align='right'>".number_format($sum_j_21,2)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_22)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_23)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_24)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_25)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_26)."</td>"; ?>
<?
$sum_j_27 = ($sum_j_26/$sum_j_25*100);
echo "<td>"."<div align='right'>".number_format($sum_j_27,2)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_28)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_29)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_30)."</td>"; ?>
<?
$sum_j_31 = ($sum_j_29/$sum_j_30*100);
echo "<td>"."<div align='right'>".number_format($sum_j_31,2)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_32)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_33)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_34)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_35)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_36)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_37)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_38)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_39)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_40)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_41)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_42)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_43)."</td>"; ?>
<?
$sum_j_44 = ($sum_j_43/$sum_j_39*100);
echo "<td>"."<div align='right'>".number_format($sum_j_44,2)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_45)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_46)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_47)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_48)."</td>"; ?>
<?
$sum_j_49 = ($sum_j_48/$sum_j_39*100);
echo "<td>"."<div align='right'>".number_format($sum_j_49,2)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_50)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_51)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_j_52)."</td>"; ?>
  </tr>
  <tr>
    <td>全部合計</td>
<? echo "<td>"."<div align='right'>".number_format($sum_e + $sum_j )  ."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_1 + $sum_j_1)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_2 + $sum_j_2 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_3 + $sum_j_3 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_4 + $sum_j_4 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_5 + $sum_j_5 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_6 + $sum_j_6 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_7 + $sum_j_7 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_8 + $sum_j_8 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_9 + $sum_j_9 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_10 + $sum_j_10 )."</td>"; ?>
<?
echo "<td>"."<div align='right'>".number_format(($sum_e_10 + $sum_j_10)/($sum_e_2 + $sum_j_2)*100,2)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_12 + $sum_j_12 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_13 + $sum_j_13 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_14 + $sum_j_14 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_15 + $sum_j_15 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_16 + $sum_j_16 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_17 + $sum_j_17 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_18 + $sum_j_18 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_19 + $sum_j_19 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_19B + $sum_j_19B )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_20 + $sum_j_20 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format(($sum_e_20 + $sum_j_20)/($sum_e_2 + $sum_j_2)*100,2)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_22 + $sum_j_22 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_23 + $sum_j_23 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_24 + $sum_j_24 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_25 + $sum_j_25 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_26 + $sum_j_26 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format(($sum_e_26 + $sum_j_26)/($sum_e_25 + $sum_j_25)*100,2)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_28 + $sum_j_28 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_29 + $sum_j_29 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_30 + $sum_j_30 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format(($sum_e_29 + $sum_j_29)/($sum_e_30 + $sum_j_30)*100,2)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_32 + $sum_j_32 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_33 + $sum_j_33 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_34 + $sum_j_34 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_35 + $sum_j_35 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_36 + $sum_j_36 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_37 + $sum_j_37 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_38 + $sum_j_38 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_39 + $sum_j_39 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_40 + $sum_j_40 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_41 + $sum_j_41 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_42 + $sum_j_42 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_43 + $sum_j_43 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format(($sum_e_43 + $sum_j_43)/($sum_e_39 + $sum_j_39)*100,2)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_45 + $sum_j_45 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_46 + $sum_j_46 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_47 + $sum_j_47 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_48 + $sum_j_48 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format(($sum_e_48 + $sum_j_48)/($sum_e_39 + $sum_j_39)*100,2)."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_50 + $sum_j_50 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_51 + $sum_j_51 )."</td>"; ?>
<? echo "<td>"."<div align='right'>".number_format($sum_e_52 + $sum_j_52 )."</td>"; ?>
  </tr>
</table>
</div>
<br>
※若要進行文書格式編修，建議複製到Excel編輯。<br>
※操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)
