<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";

	include "../../function/config_for_106.php"; //本年度基本設定

	$op = $_GET["op"];

	$get_id = $_GET['acc'];

	if($get_id != "")
		$username = $get_id;

	$title = array("", "補助項目一：推展親職教育活動",           "補助項目二：補助學校發展教育特色"
					 , "補助項目三：充實學校基本教學設備",       "補助項目四：發展原住民教育文化特色及充實設備器材"
					 , "補助項目五：補助交通不便地區學校交通車", "補助項目六：整修學校社區化活動場所" );

	$table_name = array("","alc_parenting_education" , "alc_education_features", "alc_teaching_equipment"
						  ,"alc_aboriginal_education", "alc_transport_car"     , "alc_school_activity");

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

				$a5_p1 = "show";
				break;

			case 6:
				$p_num = $row['p_num'];
				/*
				補七沒有經常門，但是資本門分 修建 和 設備
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
				echo "</tr>";
			}
			else
			{
				$has_outlay = 1;

				$outlay_subject = $row['subject'];
				$outlay_category = $row['category'];
				$outlay_s_money = $row['s_money'];
				$outlay_s_desc = $row['s_desc'];
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

<font color=blue>
	<b>● 本項目申請經費 <?=$s_total_money;?> 元</b><p>
</font>

<?
	if($a1_p1 == 'show')
	{
?>
		<hr>
		<table border="0">
			<tr>
				<td nowrap="nowrap" colspan="2">
					● 親職講座<p>
					　● 預計辦理親職講座
					<b><?=$s_p1_times;?></b> 場，參加人數
					<b><?=$s_p1_people;?></b> 人，申請補助經費
					<b><?=$s_p1_money;?></b> 元。
				</td>
			</tr>
		</table>
<?
	;}
?>

<?
	if($a2_p1 == 'show')
	{
?>
		<hr>
		● 申請 <b><?=$p_num;?></b> 項特色<p>
		<table border="0">
			<tr>
				<td nowrap="nowrap" colspan="2">
					● 特色一：<b><?=$p1_name;?></b><?=($p1_IsContinue == "Y")?"（本年度為第 ".$p1_ContinueYear." 年辦理）":"";?><p>
					　參加學生人數
					<b><?=$s_p1_student;?></b> 人，其中含目標學生
					<b><?=$s_p1_target;?></b> 人。
				</td>
			</tr>
		</table>
		<p>
		<table border="0">
			<tr>
				<td nowrap="nowrap" colspan="2">
					<b><?=$school_year;?></b>年度：經費
					<b><?=$s_p1_money;?></b> 元（含經常門經費
					<b><?=$s_p1_current_money;?></b> 元，資本門經費
					<b><?=$s_p1_capital_money;?></b> 元）
				</td>
			</tr>
		</table>
<?
	;}
?>

<?
	if($a3_p1 == 'show')
	{
?>
		<hr>
		<table border="0">
			<tr>
				<td nowrap="nowrap" colspan="2">
					經常門經費
					<b><?=$s_p1_current_money;?></b> 元，資本門經費
					<b><?=$s_p1_capital_money;?></b> 元。
				</td>
			</tr>
		</table>
<?
	;}
?>

<? 	if($a4_p1 == 'show')
	{
?>
		<hr>
		● 申請 <b><?=$p_num;?></b> 項特色<p>
		<table border="0">
			<tr>
				<td nowrap="nowrap" colspan="2">
					● 特色一：<b><?=$p1_name;?></b><?=($p1_IsContinue == "Y")?"（本年度為第 ".$p1_ContinueYear." 年辦理）":"";?><p>
					　參加學生人數
					<b><?=$s_p1_student;?></b> 人，其中含目標學生
					<b><?=$s_p1_target;?></b> 人。
				</td>
			</tr>
		</table>
		<p>
		<table border="0">
			<tr>
				<td nowrap="nowrap" colspan="2">
					<b><?=$school_year;?></b>年度：經費
					<b><?=$s_p1_money;?></b> 元（含經常門經費
					<b><?=$s_p1_current_money;?></b> 元，資本門經費
					<b><?=$s_p1_capital_money;?></b> 元）
				</td>
			</tr>
		</table>
<?
	;}
?>

<? 	if($a5_p1 == 'show')
	{
?>
		<hr>
		<table border="0">
			<tr style="display:<?=($item == '租車費')?'':'none';?>;">
				<td nowrap="nowrap" colspan="2">
					補助租車費：搭車人數
					<b><?=($item == '租車費')?$s_people:'';?></b> 人，申請租車經費
					<b><?=($item == '租車費')?$s_money:'';?></b> 元。
				</td>
			</tr>
			<tr style="display:<?=($item == '交通費')?'':'none';?>;">
				<td nowrap="nowrap" colspan="2">
					補助交通費：<p>
					　住宿生
					<b><?=($item == '交通費')?$s_boarders:'';?></b> 人，申請經費
					<b><?=($item == '交通費')?$s_boarders_money:'';?></b> 元。<p>
					　非住宿生
					<b><?=($item == '交通費')?$s_no_boarders:'';?></b> 人，申請經費
					<b><?=($item == '交通費')?$s_no_boarders_money:'';?></b> 元。<p>
					　共計
					<b><?=($item == '交通費')?$s_people:'';?></b> 人，申請經費
					<b><?=($item == '交通費')?$s_money:'';?></b> 元。
				</td>
			</tr>
			<tr style="display:<?=($item == '購置交通車')?'':'none';?>;">
				<td nowrap="nowrap" colspan="2">
					補助購置交通車：
					<b><?=($item == '購置交通車')?$s_people:'';?></b> 人座交通車，申請經費
					<b><?=($item == '購置交通車')?$s_money:'';?></b> 元。
				</td>
			</tr>
		</table>
<?
	;}
?>

<? 	if($a6_p1 == 'show')
	{
?>
		<hr>
		<table border="0">
			<tr>
				<td nowrap="nowrap" colspan="2">
				修建經費
				<b><?=$s_p1_current_money;?></b> 元，設備經費
				<b><?=$s_p1_capital_money;?></b> 元。
				</td>
			</tr>
		</table>
<?
	;}
?>

<? 	if($table_1 == 'show')
	{
?>
		<p>
		<table width="800px" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC">
			<tr height="25px">
				<td colspan="9" nowrap="nowrap" bgcolor="#99CC66" style="font-size:16px;"><?=$title_a;?></td>
			</tr>
			<tr height="25px">
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">科目</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">類別</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">項目</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">單位</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">單價</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">數量</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">金額</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">說明</td>
			</tr>
			<?
				if($op == 2 || $op == 4)
					$p = 'p1_'.$school_year;
				else
					$p = 'p1';

				print_item($table_name_item, $p, $main_seq);  // 顯示細項
			?>
		</table>
		<p>
<?
	;}
?>

<?
	if($table_1_ny1 == 'show')
	{
?>
		<p>
		<table border="0">
			<tr>
				<td nowrap="nowrap">
					<b><?=($school_year+1);?></b>年度：經費
					<b><?=$s_p1_money_ny1;?></b> 元（含經常門經費
					<b><?=$s_p1_current_money_ny1;?></b> 元，資本門經費
					<b><?=$s_p1_capital_money_ny1;?></b> 元）
				</td>
			</tr>
		</table>
		<p>
		<table width="800px" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC">
			<tr height="25px">
				<td colspan="9" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:16px;"><?=$title_a;?></td>
			</tr>
			<tr height="25px">
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">科目</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">類別</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">項目</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">單位</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">單價</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">數量</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">金額</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">說明</td>
			</tr>
			<?
				if($op == 2 || $op == 4)
					$p = 'p1_'.($school_year+1);
				else
					$p = 'p1';

				print_item($table_name_item, $p, $main_seq);  // 顯示特色一 細項
			?>
		</table>
		<p>
<?
	;}
?>

<?
	if($table_1_ny2 == 'show')
	{
?>
		<table border="0">
			<tr>
				<td nowrap="nowrap">
					<b><?=($school_year+2);?></b>年度：經費
					<b><?=$s_p1_money_ny2;?></b> 元（含經常門經費
					<b><?=$s_p1_current_money_ny2;?></b> 元，資本門經費
					<b><?=$s_p1_capital_money_ny2;?></b> 元）
				</td>
			</tr>
		</table>
		<p>
		<table width="800px" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC">
			<tr height="25px">
				<td colspan="9" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:16px;"><?=$title_a;?></td>
			</tr>
			<tr height="25px">
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">科目</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">類別</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">項目</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">單位</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">單價</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">數量</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">金額</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">說明</td>
			</tr>
			<?
				if($op == 2 || $op == 4)
					$p = 'p1_'.($school_year+2);
				else
					$p = 'p1';

				print_item($table_name_item, $p, $main_seq);  // 顯示特色一 細項
			?>
		</table>
		<p>
<?
	;}
?>

<?
	if($a1_p1 == 'show')
	{
?>
		<hr>
		<table border="0">
			<tr>
				<td nowrap="nowrap" colspan="2">
					● 家庭訪視<p>
					　● 預計申請個別家庭訪視
					<b><?=$s_p2_student;?></b> 人，共
					<b><?=$s_p2_people;?></b> 人次，申請補助經費
					<b><?=$s_p2_money;?></b> 元。
				</td>
			</tr>
		</table>
<?
	;}
?>

<?
	if($a2_p2 == 'show')
	{
?>
		<hr>
		<table border="0">
			<tr>
				<td nowrap="nowrap" colspan="2">
					● 特色二：<b><?=$p2_name;?></b><?=($p2_IsContinue == "Y")?"（本年度為第 ".$p2_ContinueYear." 年辦理）":"";?><p>
					　參加學生人數
					<b><?=$s_p2_student;?></b> 人，其中含目標學生
					<b><?=$s_p2_target;?></b> 人。
				</td>
			</tr>
		</table>
		<p>
		<table border="0">
			<tr>
				<td nowrap="nowrap" colspan="2">
					<b><?=$school_year;?></b>年度：經費
					<b><?=$s_p2_money;?></b> 元（含經常門經費
					<b><?=$s_p2_current_money;?></b> 元，資本門經費
					<b><?=$s_p2_capital_money;?></b> 元）
				</td>
			</tr>
		</table>
<?
	;}
?>

<?
	if($a4_p2 == 'show')
	{
?>
		<hr>
		<table border="0">
			<tr>
				<td nowrap="nowrap" colspan="2">
					● 特色二：<b><?=$p2_name;?></b><?=($p2_IsContinue == "Y")?"（本年度為第 ".$p2_ContinueYear." 年辦理）":"";?><p>
					　參加學生人數
					<b><?=$s_p2_student;?></b> 人，其中含目標學生
					<b><?=$s_p2_target;?></b> 人。
				</td>
			</tr>
		</table>
		<p>
		<table border="0">
			<tr>
				<td nowrap="nowrap" colspan="2">
					<b><?=$school_year;?></b>年度：經費
					<b><?=$s_p2_money;?></b> 元（含經常門經費
					<b><?=$s_p2_current_money;?></b> 元，資本門經費
					<b><?=$s_p2_capital_money;?></b> 元）
				</td>
			</tr>
		</table>
<?
	;}
?>

<?
	if($table_2 == 'show')
	{
?>
		<p>
		<table width="800px" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC">
			<tr height="25px">
				<td colspan="9" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:16px;"><? echo $title_a;?></td>
			</tr>
			<tr height="25px">
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">科目</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">類別</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">項目</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">單位</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">單價</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">數量</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">金額</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">說明</td>
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
<?
	;}
?>

<?
	if($table_2_ny1 == 'show')
	{
?>
		<p>
		<table border="0">
			<tr>
				<td nowrap="nowrap">
					<b><?=($school_year+1);?></b>年度：經費
					<b><?=$s_p2_money_ny1;?></b> 元（含經常門經費
					<b><?=$s_p2_current_money_ny1;?></b> 元，資本門經費
					<b><?=$s_p2_capital_money_ny1;?></b> 元）
				</td>
			</tr>
		</table>
		<p>
		<table width="800px" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC">
			<tr height="25px">
				<td colspan="9" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:16px;"><?=$title_a;?></td>
			</tr>
			<tr height="25px">
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">科目</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">類別</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">項目</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">單位</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">單價</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">數量</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">金額</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">說明</td>
			</tr>
			<?
				if($op == 2 || $op == 4)
					$p = 'p2_'.($school_year+1);
				else
					$p = 'p2';

				print_item($table_name_item, $p, $main_seq);  // 顯示特色二細項

			?>
		</table>
		<p>
<?
	;}
?>

<?
	if($table_2_ny2 == 'show')
	{
?>
		<p>
		<table border="0">
			<tr>
				<td nowrap="nowrap">
					<b><?=($school_year+2);?></b>年度：經費
					<b><?=$s_p2_money_ny2;?></b> 元（含經常門經費
					<b><?=$s_p2_current_money_ny2;?></b> 元，資本門經費
					<b><?=$s_p2_capital_money_ny2;?></b> 元）
				</td>
			</tr>
		</table>
		<p>
		<table width="800px" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC">
			<tr height="25px">
				<td colspan="9" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:16px;"><?=$title_a;?></td>
			</tr>
			<tr height="25px">
				<td align="center" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">科目</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">類別</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">項目</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">單位</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">單價</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">數量</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">金額</td>
				<td nowrap="nowrap" bgcolor="#99CCCC">說明</td>
			</tr>
			<?
				if($op == 2 || $op == 4)
					$p = 'p2_'.($school_year+2);
				else
					$p = 'p2';

				print_item($table_name_item, $p, $main_seq);  // 顯示特色二 細項
			?>
		</table>
		<p>
<?
	;}
?>

</div>

<p>

<?
	if($get_id != "")
		$strLink = "&acc=$get_id";
?>

<hr>

<b>前往其他頁面：</b>

<a href="school_funds.php?op=1<?=$strLink;?>">補助一</a>&nbsp;
<a href="school_funds.php?op=2<?=$strLink;?>">補助二</a>&nbsp;
<a href="school_funds.php?op=3<?=$strLink;?>">補助三</a>&nbsp;
<a href="school_funds.php?op=4<?=$strLink;?>">補助四</a>&nbsp;
<a href="school_funds.php?op=5<?=$strLink;?>">補助五</a>&nbsp;
<a href="school_funds.php?op=6<?=$strLink;?>">補助六</a>&nbsp;

<p>

<input type="button" value="關閉本頁" onClick="window.close()">

<?
	include "../../function/button_print.php";  // 列印本頁
?>

<!-- 說明：若要進行文書格式編修，建議複製到Excel編輯。<p> -->
<!-- 操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上) -->