<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";

	$op = $_GET["op"];
	$school_year = 103; //為學年度
	
	$title = array("", "補助項目一：推展親職教育活動", "補助項目二：補助學校發展教育特色", "補助項目三：修繕離島或偏遠地區師生宿舍"
					    , "補助項目四：充實學校基本教學設備", "補助項目五：發展原住民教育文化特色及充實設備器材"
						, "補助項目六：補助交通不便地區學校交通車", "補助項目七：整修學校社區化活動場所" );
						
	$table_name = array("","alc_parenting_education", "alc_education_features", "alc_repair_dormitory", "alc_teaching_equipment"
						, "alc_aboriginal_education", "alc_transport_car", "alc_school_activity");
	
	$title_a = $title[$op]; //申請項目名稱
	$table_name_item = $table_name[$op]."_item"; //資料表名稱
	
	//顯示控制 show=顯示 空白=不顯示
	$a1_p1 = "";
	$a2_p1 = "";
	$a2_p2 = "";
	$a3_p1 = "";
	$a3_p2 = "";
	$a4_p1 = "";
	$a5_p1 = "";
	$a5_p2 = "";
	$a6_p1 = "";
	$a7_p1 = "";
	$table_1 = "";
	$table_2 = "";
	
	$sql = "select * from $table_name[$op] where account = '$username' and school_year = '$school_year' ";
	//echo "<br />".$sql."<br />";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$main_seq = $row['sy_seq'];
		$s_total_money = ($row['s_total_money'] == '')?0:$row['s_total_money']; //NULL則填入0
		$city_total_money = ($row['city_total_money'] == '')?0:$row['city_total_money'];
		$edu_total_money = ($row['edu_total_money'] == '')?0:$row['edu_total_money'];
		
		$city_desc = $row['city_desc'];
		$edu_desc = $row['edu_desc'];
		
		switch($op)
		{
			case 1:
				$s_p1_times = ($row['s_p1_times'] == '')?0:$row['s_p1_times'];
				$s_p1_people = ($row['s_p1_people'] == '')?0:$row['s_p1_people'];
				$s_p1_money = ($row['s_p1_money'] == '')?0:$row['s_p1_money'];
				$s_p2_people = ($row['s_p2_people'] == '')?0:$row['s_p2_people'];
				$s_p2_money = ($row['s_p2_money'] == '')?0:$row['s_p2_money'];
				
				$city_p1_money = ($row['city_p1_money'] == '')?0:$row['city_p1_money']; 
				$city_p1_times = ($row['city_p1_times'] == '')?0:$row['city_p1_times'];
				$city_p2_money = ($row['city_p2_money'] == '')?0:$row['city_p2_money'];
				$city_p2_people = ($row['city_p2_people'] == '')?0:$row['city_p2_people'];
				
				$edu_p1_money = ($row['edu_p1_money'] == '')?0:$row['edu_p1_money']; 
				$edu_p1_times = ($row['edu_p1_times'] == '')?0:$row['edu_p1_times'];
				$edu_p2_money = ($row['edu_p2_money'] == '')?0:$row['edu_p2_money'];
				$edu_p2_people = ($row['edu_p2_people'] == '')?0:$row['edu_p2_people'];
				
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
				$p_num = $row['p_num'];
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
				
				$city_p1_money = ($row['city_p1_money'] == '')?0:$row['city_p1_money']; 
				$city_p1_current_money = ($row['city_p1_current_money'] == '')?0:$row['city_p1_current_money'];
				$city_p1_capital_money = ($row['city_p1_capital_money'] == '')?0:$row['city_p1_capital_money'];
				$city_p2_money = ($row['city_p2_money'] == '')?0:$row['city_p2_money'];
				$city_p2_current_money = ($row['city_p2_current_money'] == '')?0:$row['city_p2_current_money'];
				$city_p2_capital_money = ($row['city_p2_capital_money'] == '')?0:$row['city_p2_capital_money'];
				
				$edu_p1_money = ($row['edu_p1_money'] == '')?0:$row['edu_p1_money']; 
				$edu_p1_current_money = ($row['edu_p1_current_money'] == '')?0:$row['edu_p1_current_money'];
				$edu_p1_capital_money = ($row['edu_p1_capital_money'] == '')?0:$row['edu_p1_capital_money'];
				$edu_p2_money = ($row['edu_p2_money'] == '')?0:$row['edu_p2_money'];
				$edu_p2_current_money = ($row['edu_p2_current_money'] == '')?0:$row['edu_p2_current_money'];
				$edu_p2_capital_money = ($row['edu_p2_capital_money'] == '')?0:$row['edu_p2_capital_money'];
				
				$a2_p1 = "show";
				$a2_p2 = ($s_p2_money > 0)?"show":"";
				$table_1 = "show";
				$table_2 = ($s_p2_money > 0)?"show":"";
				break;
			
			case 3:
				$apply_last5year = $row['apply_last5year'];
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
				
				$city_p1_money = ($row['city_p1_money'] == '')?0:$row['city_p1_money']; 
				$city_p1_current_cnt = ($row['city_p1_current_cnt'] == '')?0:$row['city_p1_current_cnt'];
				$city_p1_current_money = ($row['city_p1_current_money'] == '')?0:$row['city_p1_current_money'];
				$city_p1_capital_cnt = ($row['city_p1_capital_cnt'] == '')?0:$row['city_p1_capital_cnt'];
				$city_p1_capital_money = ($row['city_p1_capital_money'] == '')?0:$row['city_p1_capital_money'];
				$city_p2_money = ($row['city_p2_money'] == '')?0:$row['city_p2_money'];
				$city_p2_current_cnt = ($row['city_p2_current_cnt'] == '')?0:$row['city_p2_current_cnt'];
				$city_p2_current_money = ($row['city_p2_current_money'] == '')?0:$row['city_p2_current_money'];
				$city_p2_capital_cnt = ($row['city_p2_capital_cnt'] == '')?0:$row['city_p2_capital_cnt'];
				$city_p2_capital_money = ($row['city_p2_capital_money'] == '')?0:$row['city_p2_capital_money'];
				
				$edu_p1_money = ($row['edu_p1_money'] == '')?0:$row['edu_p1_money']; 
				$edu_p1_current_cnt = ($row['edu_p1_current_cnt'] == '')?0:$row['edu_p1_current_cnt'];
				$edu_p1_current_money = ($row['edu_p1_current_money'] == '')?0:$row['edu_p1_current_money'];
				$edu_p1_capital_cnt = ($row['edu_p1_capital_cnt'] == '')?0:$row['edu_p1_capital_cnt'];
				$edu_p1_capital_money = ($row['edu_p1_capital_money'] == '')?0:$row['edu_p1_capital_money'];
				$edu_p2_money = ($row['edu_p2_money'] == '')?0:$row['edu_p2_money'];
				$edu_p2_current_cnt = ($row['edu_p2_current_cnt'] == '')?0:$row['edu_p2_current_cnt'];
				$edu_p2_current_money = ($row['edu_p2_current_money'] == '')?0:$row['edu_p2_current_money'];
				$edu_p2_capital_cnt = ($row['edu_p2_capital_cnt'] == '')?0:$row['edu_p2_capital_cnt'];
				$edu_p2_capital_money = ($row['edu_p2_capital_money'] == '')?0:$row['edu_p2_capital_money'];

				$apply_name_t = ($s_p1_money > 0)?"教師宿舍":"";
				$apply_name_s = ($s_p2_money > 0)?"學生宿舍":"";
				
				$apply_name = ($apply_name_t != '' && $apply_name_s != '')?"教師及學生宿舍":$apply_name_t.$apply_name_s;
				$a3_p1 = ($s_p1_money > 0)?"show":"";
				$a3_p2 = ($s_p2_money > 0)?"show":"";
				$table_1 = ($s_p1_money > 0)?"show":"";
				$table_2 = ($s_p2_money > 0)?"show":"";
				break;
				
			case 4:
				$apply_last3year = $row['apply_last3year'];
				$s_p1_money = ($row['s_p1_money'] == '')?0:$row['s_p1_money']; //NULL則填入0
				$s_p1_current_cnt = ($row['s_p1_current_cnt'] == '')?0:$row['s_p1_current_cnt'];
				$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
				$s_p1_capital_cnt = ($row['s_p1_capital_cnt'] == '')?0:$row['s_p1_capital_cnt'];
				$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];
				
				$city_p1_money = ($row['city_p1_money'] == '')?0:$row['city_p1_money']; 
				$city_p1_current_money = ($row['city_p1_current_money'] == '')?0:$row['city_p1_current_money'];
				$city_p1_capital_money = ($row['city_p1_capital_money'] == '')?0:$row['city_p1_capital_money'];
				
				$edu_p1_money = ($row['edu_p1_money'] == '')?0:$row['edu_p1_money']; 
				$edu_p1_current_money = ($row['edu_p1_current_money'] == '')?0:$row['edu_p1_current_money'];
				$edu_p1_capital_money = ($row['edu_p1_capital_money'] == '')?0:$row['edu_p1_capital_money'];
				
				$a4_p1 = "show";
				$table_1 = "show";
				break;
				
			case 5:
				$p_num = $row['p_num'];
				$p1_name = $row['p1_name'];
				$p2_name = $row['p2_name'];
				$p1_IsContinue = $row['p1_IsContinue'];
				$p2_IsContinue = $row['p2_IsContinue'];
				$p1_ContinueYear = $row['p1_ContinueYear'];
				$p2_ContinueYear = $row['p2_ContinueYear'];
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
				
				$city_p1_money = ($row['city_p1_money'] == '')?0:$row['city_p1_money']; 
				$city_p1_current_money = ($row['city_p1_current_money'] == '')?0:$row['city_p1_current_money'];
				$city_p1_capital_money = ($row['city_p1_capital_money'] == '')?0:$row['city_p1_capital_money'];
				$city_p2_money = ($row['city_p2_money'] == '')?0:$row['city_p2_money'];
				$city_p2_current_money = ($row['city_p2_current_money'] == '')?0:$row['city_p2_current_money'];
				$city_p2_capital_money = ($row['city_p2_capital_money'] == '')?0:$row['city_p2_capital_money'];
				
				$edu_p1_money = ($row['edu_p1_money'] == '')?0:$row['edu_p1_money']; 
				$edu_p1_current_money = ($row['edu_p1_current_money'] == '')?0:$row['edu_p1_current_money'];
				$edu_p1_capital_money = ($row['edu_p1_capital_money'] == '')?0:$row['edu_p1_capital_money'];
				$edu_p2_money = ($row['edu_p2_money'] == '')?0:$row['edu_p2_money'];
				$edu_p2_current_money = ($row['edu_p2_current_money'] == '')?0:$row['edu_p2_current_money'];
				$edu_p2_capital_money = ($row['edu_p2_capital_money'] == '')?0:$row['edu_p2_capital_money'];
				
				$a5_p1 = "show";
				$a5_p2 = ($s_p2_money > 0)?"show":"";
				$table_1 = "show";
				$table_2 = ($s_p2_money > 0)?"show":"";
				break;
				
			case 6:
				$s_money = $row['s_money'];
				$item = $row['item'];
				$s_people = $row['s_people'];
				
				$city_money = ($row['city_money'] == '')?0:$row['city_money'];

				$edu_money = ($row['edu_money'] == '')?0:$row['edu_money'];
				
				$a6_p1 = "show";
				break;
				
			case 7:
				$p_num = $row['p_num'];
				/*
				補七沒有經常門，但是資本門分 修建 和 設備
				所以資料庫欄位
				原本的 經常門總合 = 修建總合
					   資本門     = 設備總合
				*/
				$s_p1_money = ($row['s_p1_money'] == '')?0:$row['s_p1_money']; //NULL則填入0
				$s_p1_current_cnt = ($row['s_p1_current_cnt'] == '')?0:$row['s_p1_current_cnt'];
				$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
				$s_p1_capital_cnt = ($row['s_p1_capital_cnt'] == '')?0:$row['s_p1_capital_cnt'];
				$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];
				
				$city_p1_money = ($row['city_p1_money'] == '')?0:$row['city_p1_money']; 
				$city_p1_current_money = ($row['city_p1_current_money'] == '')?0:$row['city_p1_current_money'];
				$city_p1_capital_money = ($row['city_p1_capital_money'] == '')?0:$row['city_p1_capital_money'];
				
				$edu_p1_money = ($row['edu_p1_money'] == '')?0:$row['edu_p1_money']; 
				$edu_p1_current_money = ($row['edu_p1_current_money'] == '')?0:$row['edu_p1_current_money'];
				$edu_p1_capital_money = ($row['edu_p1_capital_money'] == '')?0:$row['edu_p1_capital_money'];
				
				$a7_p1 = "show";
				$table_1 = "show";
				break;
				
		}
	
	}
	
	/*//觀察有無顯示用
	echo "<br />a1_p1=".$a1_p1;
	echo "<br />a2_p1=".$a2_p1;
	echo "<br />a2_p2=".$a2_p2;
	echo "<br />a3_p1=".$a3_p1;
	echo "<br />a3_p2=".$a3_p2;
	echo "<br />a4_p1=".$a4_p1;
	echo "<br />a5_p1=".$a5_p1;
	echo "<br />a5_p2=".$a5_p2;
	echo "<br />a6_p1=".$a6_p1;
	echo "<br />a7_p1=".$a7_p1;
	echo "<br />table_1=".$table_1;
	echo "<br />table_2=".$table_2."<br />";*/
	
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
		//echo "<br />".$sql."<br />";
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
			$city_desc = $row['city_desc'];
			$edu_money = $row['edu_money'];
			$edu_desc = $row['edu_desc'];

			if($category != '雜支')
			{
				$idx++;
				
				echo "<tr>";
				echo "<td width='10' align='center' nowrap='nowrap'>$idx.</td>";
				echo "<td align='left'>$subject</td>"; //科目
				echo "<td align='left'>$category</td>"; //類別
				echo "<td align='left'>$item</td>";
				echo "<td align='left'>$unit</td>";
				echo "<td align='left'>$price</td>";
				echo "<td align='left'>$amount</td>";
				echo "<td align='left'>$s_money</td>";
				echo "<td align='left'>$s_desc</td>";
				echo "<td align='left'>$city_money</td>";
				echo "<td align='left'>$city_desc</td>";
				echo "<td align='left'>$edu_money</td>";
				echo "<td align='left'>$edu_desc</td>";
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
				$outlay_city_desc = $row['city_desc'];
				$outlay_edu_money = $row['edu_money'];
				$outlay_edu_desc = $row['edu_desc'];
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
			echo "<td align='left'>$outlay_s_money</td>";
			echo "<td align='left'>$outlay_s_desc</td>";
			echo "<td align='left'>$outlay_city_money</td>";
			echo "<td align='left'>$outlay_city_desc</td>";
			echo "<td align='left'>$outlay_edu_money</td>";
			echo "<td align='left'>$outlay_edu_desc</td>";
			echo "</tr>";
		}
	
	}
	
	//測試用
	/*
	$a1_p1 = "show";
	$a2_p1 = "show";
	$a2_p2 = "show";
	$a3_p1 = "show";
	$a3_p2 = "show";
	$a4_p1 = "show";
	$a5_p1 = "show";
	$a5_p2 = "show";
	$a6_p1 = "show";
	$a7_p1 = "show";
	$table_1 = "show";
	$table_2 = "show";
	*/
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="print_content">
	<p><b><?=$title_a;?> 經費表</b><p>
	※本項目申請經費： <?=$s_total_money;?> 元<br />
	※本項目初審金額： <?=$city_total_money;?> 元<br />
	※本項目複審金額： <b><?=$edu_total_money;?> 元</b><br /><p>
	<div style="display:<?=($a1_p1 == 'show')?'':'none';?>;">
		<table border="0">
			<tr>
				<td nowrap="nowrap" colspan="2"><b>※親職講座</b></td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">學校申請：經費共計 <?=$s_p1_money;?> 元，預計辦理親職講座 <?=$s_p1_times;?> 場，預計參加人數 <?=$s_p1_people;?> 人。
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">初審金額：經費共計 <?=$city_p1_money;?> 元，預計辦理親職講座 <?=$city_p1_times;?> 場。
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">複審金額：經費共計 <?=$edu_p1_money;?> 元，預計辦理親職講座 <?=$edu_p1_times;?> 場。
				</td>
			</tr>
		</table>
	</div>
	<div style="display:<?=($a2_p1 == 'show')?'':'none';?>;">
		※申請 <?=$p_num;?> 項特色<p>
		<table border="0">
			<tr>
				<td nowrap="nowrap" colspan="2"><b>※特色一：</b><?=$p1_name;?> &nbsp; <?=($p1_IsContinue == "Y")?"(本年度為第 ".$p1_ContinueYear." 年辦理)":"";?></td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">學校申請：經費共計 <?=$s_p1_money;?> 元，其中包含經常門經費 <?=$s_p1_current_money;?> 元，
				資本門經費 <?=$s_p1_capital_money;?> 元。
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">初審金額：經費共計 <?=$city_p1_money;?> 元，其中包含經常門經費 <?=$city_p1_current_money;?> 元，
				資本門經費 <?=$city_p1_capital_money;?> 元。
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">複審金額：經費共計 <?=$edu_p1_money;?> 元，其中包含經常門經費 <?=$edu_p1_current_money;?> 元，
				資本門經費 <?=$edu_p1_capital_money;?> 元。
				</td>
			</tr>
		</table>
	</div>
	<div style="display:<?=($a3_p1 == 'show')?'':'none';?>;">
		※貴校申請修繕(含設備)：<?=$apply_name;?><p>
		<table border="0">
			<tr>
				<td nowrap="nowrap" colspan="2"><b>※教師宿舍</b></td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">學校申請：經費共計 <?=$s_p1_money;?> 元，
				其中包含經常門經費 <?=$s_p1_current_cnt;?> 項 <?=$s_p1_current_money;?> 元，
				資本門經費 <?=$s_p1_capital_cnt;?> 式 <?=$s_p1_capital_money;?> 元。
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">初審金額：經費共計 <?=$city_p1_money;?> 元，
				其中包含經常門經費 <?=$city_p1_current_cnt;?> 項 <?=$city_p1_current_money;?> 元，
				資本門經費 <?=$city_p1_capital_cnt;?> 式 <?=$city_p1_capital_money;?> 元。
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">複審金額：經費共計 <?=$edu_p1_money;?> 元，
				其中包含經常門經費 <?=$edu_p1_current_cnt;?> 項 <?=$edu_p1_current_money;?> 元，
				資本門經費 <?=$edu_p1_capital_cnt;?> 式 <?=$edu_p1_capital_money;?> 元。
				</td>
			</tr>
		</table>
	</div>
	<div style="display:<?=($a4_p1 == 'show')?'':'none';?>;">
		<table border="0">
			<tr>
				<td nowrap="nowrap" colspan="2">學校申請：經費共計 <?=$s_p1_money;?> 元，
				其中包含經常門經費 <?=$s_p1_current_money;?> 元，
				資本門經費 <?=$s_p1_capital_money;?> 元。
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">初審金額：經費共計 <?=$city_p1_money;?> 元，
				其中包含經常門經費 <?=$city_p1_current_money;?> 元，
				資本門經費 <?=$city_p1_capital_money;?> 元。
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">複審金額：經費共計 <?=$edu_p1_money;?> 元，
				其中包含經常門經費 <?=$edu_p1_current_money;?> 元，
				資本門經費 <?=$edu_p1_capital_money;?> 元。
				</td>
			</tr>
		</table>
	</div>
	<div style="display:<?=($a5_p1 == 'show')?'':'none';?>;">
		※申請 <?=$p_num;?> 項特色<p>
		<table border="0">
			<tr>
				<td nowrap="nowrap" colspan="2"><b>※特色一：</b><?=$p1_name;?> &nbsp; <?=($p1_IsContinue == "Y")?"(本年度為第 ".$p1_ContinueYear." 年辦理)":"";?></td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">學校申請：經費共計 <?=$s_p1_money;?> 元，其中包含經常門經費 <?=$s_p1_current_money;?> 元，
				資本門經費 <?=$s_p1_capital_money;?> 元。
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">初審金額：經費共計 <?=$city_p1_money;?> 元，其中包含經常門經費 <?=$city_p1_current_money;?> 元，
				資本門經費 <?=$city_p1_capital_money;?> 元。
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">複審金額：經費共計 <?=$edu_p1_money;?> 元，其中包含經常門經費 <?=$edu_p1_current_money;?> 元，
				資本門經費 <?=$edu_p1_capital_money;?> 元。
				</td>
			</tr>
		</table>
	</div>
	<div style="display:<?=($a6_p1 == 'show')?'':'none';?>;">
		<table border="0">
			<tr style="display:<?=($item == '租車費')?'':'none';?>;">
				<td nowrap="nowrap" colspan="2">
					補助租車費：
					搭車人數 <?=($item == '租車費')?$s_people:'';?> 人，
					申請租車經費 <?=($item == '租車費')?$s_money:'';?> 元，
					審核金額 <?=($item == '租車費')?$city_money:'';?> 元，
					複審金額 <?=($item == '租車費')?$edu_money:'';?> 元。
				</td>
			</tr>
			<tr style="display:<?=($item == '交通費')?'':'none';?>;">
				<td nowrap="nowrap" colspan="2">
					補助交通費：
					 <?=($item == '交通費')?$s_people:'';?> 人，
					申請經費 <?=($item == '交通費')?$s_money:'';?> 元，
					審核金額 <?=($item == '交通費')?$city_money:'';?> 元，
					複審金額 <?=($item == '交通費')?$edu_money:'';?> 元。
				</td>
			</tr>
			<tr style="display:<?=($item == '購置交通車')?'':'none';?>;">
				<td nowrap="nowrap" colspan="2">
					補助購置交通車：
					 <?=($item == '購置交通車')?$s_people:'';?> 人座，
					申請經費 <?=($item == '購置交通車')?$s_money:'';?> 元，
					審核金額 <?=($item == '購置交通車')?$city_money:'';?> 元，
					複審金額 <?=($item == '購置交通車')?$edu_money:'';?> 元。
				</td>
			</tr>
		</table>
	</div>
	<div style="display:<?=($a7_p1 == 'show')?'':'none';?>;">
		<table border="0">
			<tr>
				<td nowrap="nowrap" colspan="2">學校申請：經費共計 <?=$s_p1_money;?> 元，
				其中包含修建 <?=$s_p1_current_money;?> 元，設備 <?=$s_p1_capital_money;?> 元。
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">初審金額：經費共計 <?=$city_p1_money;?> 元，
				其中包含修建 <?=$city_p1_current_money;?> 元，設備 <?=$city_p1_capital_money;?> 元。
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">複審金額：經費共計 <?=$edu_p1_money;?> 元，
				其中包含修建 <?=$edu_p1_current_money;?> 元，設備 <?=$edu_p1_capital_money;?> 元。
				</td>
			</tr>
		</table>
	</div>
	<div style="display:<?=($table_1 == 'show')?'':'none';?>;">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:14px;">
			<tr>
				<td colspan="9" align="left" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;"><?=$title_a;?><?=($a3_p1 == "show")?"　教師宿舍":"";?></td>
				<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FFCC66"  style="font-size:14px;">縣市初審</td>
				<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FF9966"  style="font-size:14px;">教育部複審</td>
			</tr>
			<tr>
				<td width="10" align="center" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
				<td align="left" nowrap="nowrap" bgcolor="#99CCCC">科目</td>
				<td align="left" nowrap="nowrap" bgcolor="#99CCCC">類別</td>
				<td align="left" nowrap="nowrap" bgcolor="#99CCCC">項目</td>
				<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
				<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
				<td align="left" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
				<td align="left" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
				<td align="left" nowrap="nowrap" bgcolor="#99CCCC">說明</td>
				<td align="left" nowrap="nowrap" bgcolor="#FFDD66">初審金額</td>
				<td align="left" nowrap="nowrap" bgcolor="#FFDD66">刪減金額</td>
				<td align="left" nowrap="nowrap" bgcolor="#FFCCCC">複審金額</td>
				<td align="left" nowrap="nowrap" bgcolor="#FFCCCC">刪減金額</td>
			</tr>
			<?
				//顯示特色一 細項
				print_item($table_name_item, 'p1', $main_seq);
				
			?>
						<tr>
				<td width="10" align="center" nowrap="nowrap">&nbsp;</td>
				<td align="left">&nbsp;</td>
				<td align="left">&nbsp;</td>
				<td align="left">&nbsp;</td>
				<td align="left">&nbsp;</td>
				<td align="left">&nbsp;</td>
				<td align="left">合計</td>
				<td align="left"><?=number_format($s_p1_money);?></td>
				<td align="left">&nbsp;</td>
				<td align="left"><?=number_format($city_p1_money);?></td>
				<td align="left">&nbsp;</td>
				<td align="left"><?=number_format($edu_p1_money);?></td>
				<td align="left">&nbsp;</td>
			</tr>
		</table>
		<p>
	</div>
	<div style="display:<?=($a1_p1 == 'show')?'':'none';?>;">
		<table border="0">
			<tr>
				<td nowrap="nowrap" colspan="2"><b>※個別家庭訪視</b></td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">學校申請：個別家庭訪視 <?=$s_p2_people;?> 人次，申請補助經費 <?=$s_p2_money;?> 元(200元/人)。
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">初審金額：個別家庭訪視 <?=$city_p2_people;?> 人次，申請補助經費 <?=$city_p2_money;?> 元(200元/人)。
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">複審金額：個別家庭訪視 <?=$edu_p2_people;?> 人次，申請補助經費 <?=$edu_p2_money;?> 元(200元/人)。
				</td>
			</tr>
		</table>
	</div>
	<div style="display:<?=($a2_p2 == 'show')?'':'none';?>;">
		<table border="0">
			<tr>
				<td nowrap="nowrap" colspan="2"><b>※特色二：</b><?=$p2_name;?> &nbsp; <?=($p2_IsContinue == "Y")?"(本年度為第 ".$p2_ContinueYear." 年辦理)":"";?></td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">學校申請：經費共計 <?=$s_p2_money;?> 元，
				其中包含經常門經費 <?=$s_p2_current_money;?> 元，資本門經費 <?=$s_p2_capital_money;?> 元。
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">初審金額：經費共計 <?=$city_p2_money;?> 元，
				其中包含經常門經費 <?=$city_p2_current_money;?> 元，資本門經費 <?=$city_p2_capital_money;?> 元。
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">複審金額：經費共計 <?=$edu_p2_money;?> 元，
				其中包含經常門經費 <?=$edu_p2_current_money;?> 元，資本門經費 <?=$edu_p2_capital_money;?> 元。
				</td>
			</tr>
		</table>
	</div>
	<div style="display:<?=($a3_p2 == 'show')?'':'none';?>;">
		<div style="display:<?=($a3_p1 != 'show')?'':'none'; //沒申請教師宿舍才顯示?>;">※貴校申請修繕(含設備)：<?=$apply_name;?><p></div>
		<table border="0">
			<tr>
				<td nowrap="nowrap" colspan="2"><b>※學生宿舍</b></td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">學校申請：經費共計 <?=$s_p2_money;?> 元，
				其中包含經常門經費 <?=$s_p2_current_cnt;?> 項 <?=$s_p2_current_money;?> 元，資本門經費 <?=$s_p2_capital_cnt;?> 式 <?=$s_p2_capital_money;?> 元。
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">初審金額：經費共計 <?=$city_p2_money;?> 元，
				其中包含經常門經費 <?=$city_p2_current_cnt;?> 項 <?=$city_p2_current_money;?> 元，資本門經費 <?=$city_p2_capital_cnt;?> 式 <?=$city_p2_capital_money;?> 元。
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">複審金額：經費共計 <?=$edu_p2_money;?> 元，
				其中包含經常門經費 <?=$edu_p2_current_cnt;?> 項 <?=$edu_p2_current_money;?> 元，資本門經費 <?=$edu_p2_capital_cnt;?> 式 <?=$edu_p2_capital_money;?> 元。
				</td>
			</tr>
		</table>
	</div>
	<div style="display:<?=($a5_p2 == 'show')?'':'none';?>;">
		<table border="0">
			<tr>
				<td nowrap="nowrap" colspan="2"><b>※特色二：</b><?=$p2_name;?> &nbsp; <?=($p2_IsContinue == "Y")?"(本年度為第 ".$p2_ContinueYear." 年辦理)":"";?></td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">學校申請：經費共計 <?=$s_p2_money;?> 元，
				其中包含經常門經費 <?=$s_p2_current_money;?> 元，資本門經費 <?=$s_p2_capital_money;?> 元。
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">初審金額：經費共計 <?=$city_p2_money;?> 元，
				其中包含經常門經費 <?=$city_p2_current_money;?> 元，資本門經費 <?=$city_p2_capital_money;?> 元。
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap" colspan="2">複審金額：經費共計 <?=$edu_p2_money;?> 元，
				其中包含經常門經費 <?=$edu_p2_current_money;?> 元，資本門經費 <?=$edu_p2_capital_money;?> 元。
				</td>
			</tr>
			</tr>
		</table>
	</div>
	<div style="display:<?=($table_2 == 'show')?'':'none';?>;">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:14px;">
			<tr>
				<td colspan="9" align="left" nowrap="nowrap" bgcolor="#FFCC66"  style="font-size:14px;"><? echo $title_a;?><?=($a3_p2 == "show")?"　學生宿舍":"";?></td>
				<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FFCC66"  style="font-size:14px;">縣市初審</td>
				<td colspan="2" align="center" nowrap="nowrap" bgcolor="#FF9966"  style="font-size:14px;">教育部複審</td>
			</tr>
			<tr>
				<td width="10" align="center" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
				<td align="left" nowrap="nowrap" bgcolor="#99CCCC">科目</td>
				<td align="left" nowrap="nowrap" bgcolor="#99CCCC">類別</td>
				<td align="left" nowrap="nowrap" bgcolor="#99CCCC">項目</td>
				<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
				<td align="left" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
				<td align="left" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
				<td align="left" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
				<td align="left" nowrap="nowrap" bgcolor="#99CCCC">說明</td>
				<td align="left" nowrap="nowrap" bgcolor="#FFDD66">初審金額</td>
				<td align="left" nowrap="nowrap" bgcolor="#FFDD66">刪減金額</td>
				<td align="left" nowrap="nowrap" bgcolor="#FFCCCC">複審金額</td>
				<td align="left" nowrap="nowrap" bgcolor="#FFCCCC">刪減金額</td>
			</tr>
			<?
				//顯示特色二 細項
				print_item($table_name_item, 'p2', $main_seq);
				
			?>
						<tr>
				<td width="10" align="center" nowrap="nowrap">&nbsp;</td>
				<td align="left">&nbsp;</td>
				<td align="left">&nbsp;</td>
				<td align="left">&nbsp;</td>
				<td align="left">&nbsp;</td>
				<td align="left">&nbsp;</td>
				<td align="left">合計</td>
				<td align="left"><?=number_format($s_p2_money);?></td>
				<td align="left">&nbsp;</td>
				<td align="left"><?=number_format($city_p2_money);?></td>
				<td align="left">&nbsp;</td>
				<td align="left"><?=number_format($edu_p2_money);?></td>
				<td align="left">&nbsp;</td>
			</tr>
		</table>
		<p>
	</div>
</div>
<p>
<input type="button" value="關閉本頁" onClick="window.close()">
<?php 
	include "../../function/button_print.php";
	echo "<br>若要進行文書格式編修，建議複製到Excel編輯。<br>";
	echo "操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)";
	//include "../../footer.php"; 
?>
<p>
<b>前往其他頁面：</b>
<a href="edu_funds.php?op=1">補助一</a>&nbsp;
<a href="edu_funds.php?op=2">補助二</a>&nbsp;
<a href="edu_funds.php?op=3">補助三</a>&nbsp;
<a href="edu_funds.php?op=4">補助四</a>&nbsp;
<a href="edu_funds.php?op=5">補助五</a>&nbsp;
<a href="edu_funds.php?op=6">補助六</a>&nbsp;
<a href="edu_funds.php?op=7">補助七</a>&nbsp;