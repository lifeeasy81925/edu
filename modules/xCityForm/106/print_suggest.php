<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";

	include "../../function/config_for_106.php"; //本年度基本設定
	$table_name_ary = array("", "alc_parenting_education" , "alc_education_features", "alc_teaching_equipment"
							  , "alc_aboriginal_education", "alc_transport_car"     , "alc_school_activity"   );

	$num = $_GET["id"]; //補助1~6
	$table_name = $table_name_ary[$num];
	$table_name_item = $table_name.'_item';
	$a_num = "a".$num;

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<input type="button" value="關閉本頁" onClick="window.close()">

<?
	include "../../function/button_print.php";
	include "../../function/button_excel.php";

	switch($a_num)
	{
		case "a1": $a_chinese = "補助項目一：推展親職教育活動";                     break;
		case "a2": $a_chinese = "補助項目二：補助學校發展教育特色";                 break;
		case "a3": $a_chinese = "補助項目三：充實學校基本教學設備";                 break;
		case "a4": $a_chinese = "補助項目四：發展原住民教育文化特色及充實設備器材"; break;
		case "a5": $a_chinese = "補助項目五：補助交通不便地區學校交通車";           break;
		case "a6": $a_chinese = "補助項目六：整修學校社區化活動場所";               break;
		default  : $a_chinese = "";                                                 break;
	}
?>

<p>
<table align="center">
	<tr>
		<td width="100%" align="center">
			<font face="標楷體" size="+2">
			<?=$cityname;?>政府辦理教育部<?=$school_year;?>年度推動教育優先區計畫<p>
			<?=$a_chinese;?> 經費申請與審核意見表<p>
			</font>
		</td>
	</tr>
</table>
<p>

<div id="print_content">
<?
	//====================================================================================================
	//顯示補助項目的表格表頭
	switch($a_num)
	{
		case "a1":
			?>
				<table border="1" cellpadding="5" cellspacing="0" width="100%">
					<tr height="30px" align="center">
						<td nowrap="nowrap" rowspan="2" bgcolor="#F5F5F5">序號</td>
						<td nowrap="nowrap" rowspan="2" bgcolor="#F5F5F5">學校編號</td>
						<td nowrap="nowrap" rowspan="2" bgcolor="#F5F5F5">學校名稱</td>
						<td nowrap="nowrap" colspan="3" bgcolor="#DAEEFF">學校申請</td>
						<td nowrap="nowrap" colspan="4" bgcolor="#FFE1A4">縣市初審</td>
						<td nowrap="nowrap" colspan="4" bgcolor="#FFCCCC">教育部複審</td>
					</tr>
					<tr height="30px" align="center">
						<td nowrap="nowrap" bgcolor="#DAEEFF">親職講座</td>
						<td nowrap="nowrap" bgcolor="#DAEEFF">家庭訪視</td>
						<td nowrap="nowrap" bgcolor="#DAEEFF">合計</td>
						<td nowrap="nowrap" bgcolor="#FFE1A4">親職講座</td>
						<td nowrap="nowrap" bgcolor="#FFE1A4">家庭訪視</td>
						<td nowrap="nowrap" bgcolor="#FFE1A4">合計</td>
						<td nowrap="nowrap" bgcolor="#FFE1A4">初審意見</td>
						<td nowrap="nowrap" bgcolor="#FFCCCC">親職講座</td>
						<td nowrap="nowrap" bgcolor="#FFCCCC">家庭訪視</td>
						<td nowrap="nowrap" bgcolor="#FFCCCC">合計</td>
						<td nowrap="nowrap" bgcolor="#FFCCCC">複審意見</td>
					</tr>
			<?
			break;

		// a2, a3, a4 共用case
		case "a2":
		case "a3":
		case "a4":
			?>
				<table border="1" cellpadding="5" cellspacing="0" width="100%">
					<tr height="30px" align="center">
						<td nowrap="nowrap" rowspan="2" bgcolor="#F5F5F5">序號</td>
						<td nowrap="nowrap" rowspan="2" bgcolor="#F5F5F5">學校編號</td>
						<td nowrap="nowrap" rowspan="2" bgcolor="#F5F5F5">學校名稱</td>
						<td nowrap="nowrap" colspan="3" bgcolor="#DAEEFF">學校申請</td>
						<td nowrap="nowrap" colspan="4" bgcolor="#FFE1A4">縣市初審</td>
						<td nowrap="nowrap" colspan="4" bgcolor="#FFCCCC">教育部複審</td>
					</tr>
					<tr height="30px" align="center">
						<td nowrap="nowrap" bgcolor="#DAEEFF">經常門</td>
						<td nowrap="nowrap" bgcolor="#DAEEFF">資本門</td>
						<td nowrap="nowrap" bgcolor="#DAEEFF">合計</td>
						<td nowrap="nowrap" bgcolor="#FFE1A4">經常門</td>
						<td nowrap="nowrap" bgcolor="#FFE1A4">資本門</td>
						<td nowrap="nowrap" bgcolor="#FFE1A4">合計</td>
						<td nowrap="nowrap" bgcolor="#FFE1A4">初審意見</td>
						<td nowrap="nowrap" bgcolor="#FFCCCC">經常門</td>
						<td nowrap="nowrap" bgcolor="#FFCCCC">資本門</td>
						<td nowrap="nowrap" bgcolor="#FFCCCC">合計</td>
						<td nowrap="nowrap" bgcolor="#FFCCCC">複審意見</td>
					</tr>
			<?
			break;

		case "a5":
			?>
				<table border="1" cellpadding="5" cellspacing="0" width="100%">
					<tr height="30px" align="center">
						<td nowrap="nowrap" rowspan="2" bgcolor="#F5F5F5">序號</td>
						<td nowrap="nowrap" rowspan="2" bgcolor="#F5F5F5">學校編號</td>
						<td nowrap="nowrap" rowspan="2" bgcolor="#F5F5F5">學校名稱</td>
						<td nowrap="nowrap" colspan="4" bgcolor="#DAEEFF">學校申請</td>
						<td nowrap="nowrap" colspan="5" bgcolor="#FFE1A4">縣市初審</td>
						<td nowrap="nowrap" colspan="5" bgcolor="#FFCCCC">教育部複審</td>
					</tr>
					<tr height="30px" align="center">
						<td nowrap="nowrap" bgcolor="#DAEEFF">租車費</td>
						<td nowrap="nowrap" bgcolor="#DAEEFF">交通費</td>
						<td nowrap="nowrap" bgcolor="#DAEEFF">交通車</td>
						<td nowrap="nowrap" bgcolor="#DAEEFF">合計</td>
						<td nowrap="nowrap" bgcolor="#FFE1A4">租車費</td>
						<td nowrap="nowrap" bgcolor="#FFE1A4">交通費</td>
						<td nowrap="nowrap" bgcolor="#FFE1A4">交通車</td>
						<td nowrap="nowrap" bgcolor="#FFE1A4">合計</td>
						<td nowrap="nowrap" bgcolor="#FFE1A4" width="200px" >初審意見</td>
						<td nowrap="nowrap" bgcolor="#FFCCCC">租車費</td>
						<td nowrap="nowrap" bgcolor="#FFCCCC">交通費</td>
						<td nowrap="nowrap" bgcolor="#FFCCCC">交通車</td>
						<td nowrap="nowrap" bgcolor="#FFCCCC">合計</td>
						<td nowrap="nowrap" bgcolor="#FFCCCC" width="200px" >複審意見</td>
					</tr>
			<?
			break;

		case "a6":
			?>
				<table border="1" cellpadding="5" cellspacing="0" width="100%">
					<tr height="30px" align="center">
						<td nowrap="nowrap" rowspan="2" bgcolor="#F5F5F5">序號</td>
						<td nowrap="nowrap" rowspan="2" bgcolor="#F5F5F5">學校編號</td>
						<td nowrap="nowrap" rowspan="2" bgcolor="#F5F5F5">學校名稱</td>
						<td nowrap="nowrap" colspan="3" bgcolor="#DAEEFF">學校申請</td>
						<td nowrap="nowrap" colspan="4" bgcolor="#FFE1A4">縣市初審</td>
						<td nowrap="nowrap" colspan="4" bgcolor="#FFCCCC">教育部複審</td>
					</tr>
					<tr height="30px" align="center">
						<td nowrap="nowrap" bgcolor="#DAEEFF">修建</td>
						<td nowrap="nowrap" bgcolor="#DAEEFF">設備</td>
						<td nowrap="nowrap" bgcolor="#DAEEFF">合計</td>
						<td nowrap="nowrap" bgcolor="#FFE1A4">修建</td>
						<td nowrap="nowrap" bgcolor="#FFE1A4">設備</td>
						<td nowrap="nowrap" bgcolor="#FFE1A4">合計</td>
						<td nowrap="nowrap" bgcolor="#FFE1A4">初審意見</td>
						<td nowrap="nowrap" bgcolor="#FFCCCC">修建</td>
						<td nowrap="nowrap" bgcolor="#FFCCCC">設備</td>
						<td nowrap="nowrap" bgcolor="#FFCCCC">合計</td>
						<td nowrap="nowrap" bgcolor="#FFCCCC">複審意見</td>
					</tr>
			<?
			break;

		default:
			echo "複審結果列表：查無所選項目";
	}

	//====================================================================================================
	//顯示學校資料
	$sql = 	"    SELECT    sd.account                                                                               ".
			"         ,    sd.schooltype                                                                            ".
			"         ,    sd.cityname                                                                              ".
			"         ,    sd.district                                                                              ".
			"         ,    sd.schoolname                                                                            ".
			"         ,    sy.*                                                                                     ".
			"         ,    $a_num.*                                                                                 ".  // 補助資料
			"      FROM    schooldata      AS sd                                                                    ".
			" LEFT JOIN    schooldata_year AS sy     ON sd.account = sy.account AND sy.school_year = '$school_year' ".
			" LEFT JOIN    $table_name     AS $a_num ON sy.seq_no  = $a_num.sy_seq                                  ".
			"     WHERE (( sd.enabled      = 'Y'                                                                    ".
			"       AND    sd.create_year <= $school_year )                                                         ".
			"        OR  ( sd.enabled      = 'N'                                                                    ".
			"       AND    sd.create_year <= $school_year                                                           ".
			"       AND    sd.delete_year >= $school_year ))                                                        ".
			"       AND    sd.cityname     = '$cityname'                                                            ".
			"  ORDER BY    sd.cityname                                                                              ".
			"         ,    sd.account                                                                               ";

	$result = mysql_query($sql);
	$serial = 0;
	while($row = mysql_fetch_array($result))
	{
		$account = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];

		$student = $row['student'];

		//總金額
		$s_total_money    = ($row['s_total_money']    == '')?0:$row['s_total_money'];
		$city_total_money = ($row['city_total_money'] == '')?0:$row['city_total_money'];
		$edu_total_money  = ($row['edu_total_money']  == '')?0:$row['edu_total_money'];

		//縣市審核意見
		$city_desc = $row['city_desc'];
		$city_desc_p2 = $row['city_desc_p2'];
		$city_desc_ny1 = $row['city_desc_ny1'];
		$city_desc_ny2 = $row['city_desc_ny2'];
		$city_desc_ny1_p2 = $row['city_desc_ny1_p2'];
		$city_desc_ny2_p2 = $row['city_desc_ny2_p2'];

		//教育部審核意見
		$edu_desc = $row['edu_desc'];
		$edu_desc_p2 = $row['edu_desc_p2'];
		$edu_desc_ny1 = $row['edu_desc_ny1'];
		$edu_desc_ny2 = $row['edu_desc_ny2'];
		$edu_desc_ny1_p2 = $row['edu_desc_ny1_p2'];
		$edu_desc_ny2_p2 = $row['edu_desc_ny2_p2'];

		switch($a_num)
		{
			case "a1":

				$s_p1_money = ($row['s_p1_money'] == '')?0:$row['s_p1_money'];
				$s_p2_money = ($row['s_p2_money'] == '')?0:$row['s_p2_money'];

				$city_p1_money = ($row['city_p1_money'] == '')?0:$row['city_p1_money'];
				$city_p2_money = ($row['city_p2_money'] == '')?0:$row['city_p2_money'];

				$edu_p1_money = ($row['edu_p1_money'] == '')?0:$row['edu_p1_money'];
				$edu_p2_money = ($row['edu_p2_money'] == '')?0:$row['edu_p2_money'];

				// 總計
				$sum_s_p1_money += $s_p1_money;
				$sum_s_p2_money += $s_p2_money;

				$sum_city_p1_money += $city_p1_money;
				$sum_city_p2_money += $city_p2_money;

				$sum_edu_p1_money += $edu_p1_money;
				$sum_edu_p2_money += $edu_p2_money;

				$sum_s_total_money    += $s_total_money;
				$sum_city_total_money += $city_total_money;
				$sum_edu_total_money  += $edu_total_money;

				if($s_total_money > 0)
				{
					$serial++;
					?>
						<tr height="30px">
							<td nowrap="nowrap" align='center'><?=$serial;?></td>
							<td nowrap="nowrap" align='center'><?=$account;?></td>
							<td nowrap="nowrap" align='center'><?=$district.$schoolname;?></td>

							<td nowrap="nowrap" align='right'><?=number_format($s_p1_money);?></td>
							<td nowrap="nowrap" align='right'><?=number_format($s_p2_money);?></td>
							<td nowrap="nowrap" align='right' bgcolor="aliceblue"><?=number_format($s_total_money);?></td>

							<td nowrap="nowrap" align='right'><?=number_format($city_p1_money);?></td>
							<td nowrap="nowrap" align='right'><?=number_format($city_p2_money);?></td>
							<td nowrap="nowrap" align='right' bgcolor="cornsilk"><?=number_format($city_total_money);?></td>
							<td><?=$city_desc;?></td>

							<td nowrap="nowrap" align='right'><?=number_format($edu_p1_money);?></td>
							<td nowrap="nowrap" align='right'><?=number_format($edu_p2_money);?></td>
							<td nowrap="nowrap" align='right' bgcolor="mistyrose"><?=number_format($edu_total_money);?></td>
							<td><?=$edu_desc;?></td>
						</tr>
					<?
				}
				break;

			case "a2":
			case "a4":

				// 補二、補四共用資料
				$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
				$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];
				$s_p2_current_money = ($row['s_p2_current_money'] == '')?0:$row['s_p2_current_money'];
				$s_p2_capital_money = ($row['s_p2_capital_money'] == '')?0:$row['s_p2_capital_money'];

				$city_p1_current_money = ($row['city_p1_current_money'] == '')?0:$row['city_p1_current_money'];
				$city_p1_capital_money = ($row['city_p1_capital_money'] == '')?0:$row['city_p1_capital_money'];
				$city_p2_current_money = ($row['city_p2_current_money'] == '')?0:$row['city_p2_current_money'];
				$city_p2_capital_money = ($row['city_p2_capital_money'] == '')?0:$row['city_p2_capital_money'];

				$edu_p1_current_money = ($row['edu_p1_current_money'] == '')?0:$row['edu_p1_current_money'];
				$edu_p1_capital_money = ($row['edu_p1_capital_money'] == '')?0:$row['edu_p1_capital_money'];
				$edu_p2_current_money = ($row['edu_p2_current_money'] == '')?0:$row['edu_p2_current_money'];
				$edu_p2_capital_money = ($row['edu_p2_capital_money'] == '')?0:$row['edu_p2_capital_money'];

				// 資本經常，各自加總
				$s_current_money = $s_p1_current_money + $s_p2_current_money;
				$s_capital_money = $s_p1_capital_money + $s_p2_capital_money;

				$city_current_money = $city_p1_current_money + $city_p2_current_money;
				$city_capital_money = $city_p1_capital_money + $city_p2_capital_money;

				$edu_current_money = $edu_p1_current_money + $edu_p2_current_money;
				$edu_capital_money = $edu_p1_capital_money + $edu_p2_capital_money;

				// 總計
				$sum_s_total_money    += $s_total_money;
				$sum_city_total_money += $city_total_money;
				$sum_edu_total_money  += $edu_total_money;

				$sum_s_current_money += $s_current_money;
				$sum_s_capital_money += $s_capital_money;

				$sum_city_current_money += $city_current_money;
				$sum_city_capital_money += $city_capital_money;

				$sum_edu_current_money += $edu_current_money;
				$sum_edu_capital_money += $edu_capital_money;

				if($s_total_money > 0)
				{
					$serial++;
					?>
						<tr height="30px">
							<td nowrap="nowrap" align='center'><?=$serial;?></td>
							<td nowrap="nowrap" align='center'><?=$account;?></td>
							<td nowrap="nowrap" align='center'><?=$district.$schoolname;?></td>

							<td nowrap="nowrap" align='right'><?=number_format($s_current_money);?></td>
							<td nowrap="nowrap" align='right'><?=number_format($s_capital_money);?></td>
							<td nowrap="nowrap" align='right' bgcolor="aliceblue"><?=number_format($s_total_money);?></td>

							<td nowrap="nowrap" align='right'><?=number_format($city_current_money);?></td>
							<td nowrap="nowrap" align='right'><?=number_format($city_capital_money);?></td>
							<td nowrap="nowrap" align='right' bgcolor="cornsilk"><?=number_format($city_total_money);?></td>
							<td>
								<?
									echo ($city_desc        != '')? $school_year     ."年特色一：".$city_desc       ."<p>":"";
									echo ($city_desc_ny1    != '')?($school_year + 1)."年特色一：".$city_desc_ny1   ."<p>":"";
									echo ($city_desc_ny2    != '')?($school_year + 2)."年特色一：".$city_desc_ny2   ."<p>":"";
									echo ($city_desc_p2     != '')? $school_year     ."年特色二：".$city_desc_p2    ."<p>":"";
									echo ($city_desc_ny1_p2 != '')?($school_year + 1)."年特色二：".$city_desc_ny1_p2."<p>":"";
									echo ($city_desc_ny2_p2 != '')?($school_year + 2)."年特色二：".$city_desc_ny2_p2."<p>":"";
								?>
							</td>

							<td nowrap="nowrap" align='right'><?=number_format($edu_current_money);?></td>
							<td nowrap="nowrap" align='right'><?=number_format($edu_capital_money);?></td>
							<td nowrap="nowrap" align='right' bgcolor="mistyrose"><?=number_format($edu_total_money);?></td>
							<td>
								<?
									echo ($edu_desc        != '')? $school_year     ."年特色一：".$edu_desc       ."<p>":"";
									echo ($edu_desc_ny1    != '')?($school_year + 1)."年特色一：".$edu_desc_ny1   ."<p>":"";
									echo ($edu_desc_ny2    != '')?($school_year + 2)."年特色一：".$edu_desc_ny2   ."<p>":"";
									echo ($edu_desc_p2     != '')? $school_year     ."年特色二：".$edu_desc_p2    ."<p>":"";
									echo ($edu_desc_ny1_p2 != '')?($school_year + 1)."年特色二：".$edu_desc_ny1_p2."<p>":"";
									echo ($edu_desc_ny2_p2 != '')?($school_year + 2)."年特色二：".$edu_desc_ny2_p2."<p>":"";
								?>
							</td>
						</tr>
					<?
				}
				break;

			case "a3":
			case "a6":

				// 補三、補六共用資料
				$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
				$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];

				$city_p1_current_money = ($row['city_p1_current_money'] == '')?0:$row['city_p1_current_money'];
				$city_p1_capital_money = ($row['city_p1_capital_money'] == '')?0:$row['city_p1_capital_money'];

				$edu_p1_current_money = ($row['edu_p1_current_money'] == '')?0:$row['edu_p1_current_money'];
				$edu_p1_capital_money = ($row['edu_p1_capital_money'] == '')?0:$row['edu_p1_capital_money'];

				// 總計
				$sum_s_total_money    += $s_total_money;
				$sum_city_total_money += $city_total_money;
				$sum_edu_total_money  += $edu_total_money;

				$sum_s_current_money += $s_p1_current_money;
				$sum_s_capital_money += $s_p1_capital_money;

				$sum_city_current_money += $city_p1_current_money;
				$sum_city_capital_money += $city_p1_capital_money;

				$sum_edu_current_money += $edu_p1_current_money;
				$sum_edu_capital_money += $edu_p1_capital_money;

				if($s_total_money > 0)
				{
					$serial++;
					?>
						<tr height="30px">
							<td nowrap="nowrap" align='center'><?=$serial;?></td>
							<td nowrap="nowrap" align='center'><?=$account;?></td>
							<td nowrap="nowrap" align='center'><?=$district.$schoolname;?></td>

							<td nowrap="nowrap" align='right'><?=number_format($s_p1_current_money);?></td>
							<td nowrap="nowrap" align='right'><?=number_format($s_p1_capital_money);?></td>
							<td nowrap="nowrap" align='right' bgcolor="aliceblue"><?=number_format($s_total_money);?></td>

							<td nowrap="nowrap" align='right'><?=number_format($city_p1_current_money);?></td>
							<td nowrap="nowrap" align='right'><?=number_format($city_p1_capital_money);?></td>
							<td nowrap="nowrap" align='right' bgcolor="cornsilk"><?=number_format($city_total_money);?></td>
							<td><?=$city_desc;?></td>

							<td nowrap="nowrap" align='right'><?=number_format($edu_p1_current_money);?></td>
							<td nowrap="nowrap" align='right'><?=number_format($edu_p1_capital_money);?></td>
							<td nowrap="nowrap" align='right' bgcolor="mistyrose"><?=number_format($edu_total_money);?></td>
							<td><?=$edu_desc;?></td>
						</tr>
					<?
				}
				break;

			case "a5":

				$item = $row['item'];

				$s_money    = ($row['s_money']    == '')?0:$row['s_money'];
				$city_money = ($row['city_money'] == '')?0:$row['city_money'];
				$edu_money  = ($row['edu_money']  == '')?0:$row['edu_money'];

				// 總計
				$sum_s_total_money    += $s_total_money;
				$sum_city_total_money += $city_total_money;
				$sum_edu_total_money  += $edu_total_money;

				$sum_s_money_1 += ($item == '租車費')?$s_money:0;
				$sum_s_money_2 += ($item == '交通費')?$s_money:0;
				$sum_s_money_3 += ($item == '購置交通車')?$s_money:0;

				$sum_city_money_1 += ($item == '租車費')?$city_money:0;
				$sum_city_money_2 += ($item == '交通費')?$city_money:0;
				$sum_city_money_3 += ($item == '購置交通車')?$city_money:0;

				$sum_edu_money_1 += ($item == '租車費')?$edu_money:0;
				$sum_edu_money_2 += ($item == '交通費')?$edu_money:0;
				$sum_edu_money_3 += ($item == '購置交通車')?$edu_money:0;

				if($s_total_money > 0)
				{
					$serial++;
					?>
						<tr height="30px">
							<td align='center'><?=$serial;?></td>
							<td align='center'><?=$account;?></td>
							<td align='center'><?=$district.$schoolname;?></td>

							<td align='right'><?=($item == '租車費')?number_format($s_money):0;?></td>
							<td align='right'><?=($item == '交通費')?number_format($s_money):0;?></td>
							<td align='right'><?=($item == '購置交通車')?number_format($s_money):0;?></td>
							<td align='right' bgcolor="aliceblue"><?=number_format($s_total_money);?></td>

							<td align='right'><?=($item == '租車費')?number_format($city_money):0;?></td>
							<td align='right'><?=($item == '交通費')?number_format($city_money):0;?></td>
							<td align='right'><?=($item == '購置交通車')?number_format($city_money):0;?></td>
							<td align='right' bgcolor="cornsilk"><?=number_format($city_total_money);?></td>
							<td><?=$city_desc;?></td>

							<td align='right'><?=($item == '租車費')?number_format($edu_money):0;?></td>
							<td align='right'><?=($item == '交通費')?number_format($edu_money):0;?></td>
							<td align='right'><?=($item == '購置交通車')?number_format($edu_money):0;?></td>
							<td align='right' bgcolor="mistyrose"><?=number_format($edu_total_money);?></td>
							<td align='left'><?=$edu_desc;?></td>
						</tr>
					<?
				}
				break;

			default:
				break;
		}

	} // while的右括號

	//====================================================================================================
	//顯示表尾的總計
	switch($a_num)
	{
		case "a1":
			?>
					<tr height="30px">
						<td colspan="2" align="center" bgcolor="#F5F5F5">合計</td>
						<td align="center" bgcolor="#F5F5F5"><b><?=$serial;?></b> 校</td>
						<td align='right'  bgcolor="#DAEEFF"><b><?=number_format($sum_s_p1_money);?></b></td>
						<td align='right'  bgcolor="#DAEEFF"><b><?=number_format($sum_s_p2_money);?></b></td>
						<td align='right'  bgcolor="#DAEEFF"><b><?=number_format($sum_s_total_money);?></b></td>
						<td align='right'  bgcolor="#FFE1A4"><b><?=number_format($sum_city_p1_money);?></b></td>
						<td align='right'  bgcolor="#FFE1A4"><b><?=number_format($sum_city_p2_money);?></b></td>
						<td align='right'  bgcolor="#FFE1A4"><b><?=number_format($sum_city_total_money);?></b></td>
						<td align='center' bgcolor="#FFE1A4">-</td>
						<td align='right'  bgcolor="#FFCCCC"><b><?=number_format($sum_edu_p1_money);?></b></td>
						<td align='right'  bgcolor="#FFCCCC"><b><?=number_format($sum_edu_p2_money);?></b></td>
						<td align='right'  bgcolor="#FFCCCC"><b><?=number_format($sum_edu_total_money);?></b></td>
						<td align='center' bgcolor="#FFCCCC">-</td>
					</tr>
				</table>
			<?
			break;

		case "a2":
		case "a3":
		case "a4":
		case "a6":

			// a2, a3, a4, a6共用case
			?>
					<tr height="30px">
						<td colspan="2" align="center" bgcolor="#F5F5F5">合計</td>
						<td align="center" bgcolor="#F5F5F5"><b><?=$serial;?></b> 校</td>
						<td align="right"  bgcolor="#DAEEFF"><b><? echo number_format($sum_s_current_money); ?></b></td>
						<td align="right"  bgcolor="#DAEEFF"><b><? echo number_format($sum_s_capital_money); ?></b></td>
						<td align="right"  bgcolor="#DAEEFF"><b><? echo number_format($sum_s_total_money); ?></b></td>
						<td align="right"  bgcolor="#FFE1A4"><b><? echo number_format($sum_city_current_money); ?></b></td>
						<td align="right"  bgcolor="#FFE1A4"><b><? echo number_format($sum_city_capital_money); ?></b></td>
						<td align="right"  bgcolor="#FFE1A4"><b><? echo number_format($sum_city_total_money); ?></b></td>
						<td align='center' bgcolor="#FFE1A4">-</td>
						<td align="right"  bgcolor="#FFCCCC"><b><? echo number_format($sum_edu_current_money); ?></b></td>
						<td align="right"  bgcolor="#FFCCCC"><b><? echo number_format($sum_edu_capital_money); ?></b></td>
						<td align="right"  bgcolor="#FFCCCC"><b><? echo number_format($sum_edu_total_money); ?></b></td>
						<td align='center' bgcolor="#FFCCCC">-</td>
					</tr>
				</table>
			<?
			break;

		case "a5":
			?>
					<tr height="30px">
						<td colspan="2" align="center" bgcolor="#F5F5F5">合計</td>
						<td align="center" bgcolor="#F5F5F5"><b><?=$serial;?></b> 校</td>
						<td align='right'  bgcolor="#DAEEFF"><b><?=number_format($sum_s_money_1);?></b></td>
						<td align='right'  bgcolor="#DAEEFF"><b><?=number_format($sum_s_money_2);?></b></td>
						<td align='right'  bgcolor="#DAEEFF"><b><?=number_format($sum_s_money_3);?></b></td>
						<td align='right'  bgcolor="#DAEEFF"><b><?=number_format($sum_s_total_money);?></b></td>
						<td align='right'  bgcolor="#FFE1A4"><b><?=number_format($sum_city_money_1);?></b></td>
						<td align='right'  bgcolor="#FFE1A4"><b><?=number_format($sum_city_money_2);?></b></td>
						<td align='right'  bgcolor="#FFE1A4"><b><?=number_format($sum_city_money_3);?></b></td>
						<td align='right'  bgcolor="#FFE1A4"><b><?=number_format($sum_city_total_money);?></b></td>
						<td align='center' bgcolor="#FFE1A4">-</td>
						<td align='right'  bgcolor="#FFCCCC"><b><?=number_format($sum_edu_money_1);?></b></td>
						<td align='right'  bgcolor="#FFCCCC"><b><?=number_format($sum_edu_money_2);?></b></td>
						<td align='right'  bgcolor="#FFCCCC"><b><?=number_format($sum_edu_money_3);?></b></td>
						<td align='right'  bgcolor="#FFCCCC"><b><?=number_format($sum_edu_total_money);?></b></td>
						<td align='center' bgcolor="#FFCCCC">-</td>
					</tr>
				</table>
			<?
			break;

		default:
			break;
	}
?>
</div>
<p>
<p>
<b>前往其他頁面：</b>
<a href="print_suggest.php?id=1">補助一</a>&nbsp;
<a href="print_suggest.php?id=2">補助二</a>&nbsp;
<a href="print_suggest.php?id=3">補助三</a>&nbsp;
<a href="print_suggest.php?id=4">補助四</a>&nbsp;
<a href="print_suggest.php?id=5">補助五</a>&nbsp;
<a href="print_suggest.php?id=6">補助六</a>&nbsp;

<?
/*
若要列印本表，建議複製到Excel列印，可彈性調整頁面並縮短電腦列印準備時間。<br />
操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)
*/
?>