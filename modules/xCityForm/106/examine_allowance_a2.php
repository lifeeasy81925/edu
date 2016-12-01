<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	include "checkdate_city.php";

	include "../../function/config_for_106.php"; //本年度基本設定

	$account 						= ($_POST['account'] == '')?					$_GET['id']					:	$_POST['account']; //取回傳遞來的學校編號，get為測試用

	$table_name 					= $a2_table_name;
	$table_name_item 				= $table_name.'_item';
	$a_num 							= 'a2';

	$keyClasses 					= '13'; // 設定可申請特色二的最少班級數

	$sql = " select sd.account,
					sd.schooltype,
					sd.cityname,
					sd.district, 
					sd.schoolname, 
					sd.area, 
					sd.getmoney_85to91, 
					sd.traffic_status ".
		   "      , sy.* ".
		   //補二資料
		   "      , $a_num.* ".

		   " from 	schooldata as sd	left join	 schooldata_year 	as	 sy 		on 	sd.account 	=	 sy.account ".
		   "                      		left join	 $table_name 		as 	 $a_num 	on 	sy.seq_no 	= 	 $a_num.sy_seq ".
		   " where 	sy.school_year 	= 	'$school_year' ".
		   "   and  sd.account 		= 	'$account' ";

	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$account 			 		 =  $row['account'];
		$schooltype 				 = ($row['schooltype'] == 1)?					"國小"						:	"國中";
		$cityname 					 =  $row['cityname'];
		$district 					 =  $row['district'];
		$schoolname					 =  $row['schoolname'];
		$area 						 =  $row['area'];

		$student 					 =  $row['student'];
		$target_aboriginal 			 =  $row['target_aboriginal'];
		$target_no_aboriginal		 =  $row['target_no_aboriginal'];
		$class_total 				 =  $row['class_total'];

		$main_seq					 =  $row['seq_no']; //school_year的seq_no
		$p1_name					 =  $row['p1_name'];
		$p2_name 					 =  $row['p2_name'];
		$p1_IsContinue				 =  $row['p1_IsContinue'];
		$p2_IsContinue 				 =  $row['p2_IsContinue'];
		$p1_ContinueYear 			 =  $row['p1_ContinueYear'];
		$p2_ContinueYear			 =  $row['p2_ContinueYear'];
		$s_p1_student				 =  $row['s_p1_student'];
		$s_p2_student				 =  $row['s_p2_student'];
		$s_p1_target 				 =  $row['s_p1_target'];
		$s_p2_target 				 =  $row['s_p2_target'];
		$p_num	  					 =  $row['p_num'];

		//學校今年經費  			載入到本地變數
		$s_total_money 				 = ($row['s_total_money'] == '')?				0							:	$row['s_total_money']; 			//NULL則填入0
		$s_p1_money					 = ($row['s_p1_money'] == '')?					0							:	$row['s_p1_money']; 			//NULL則填入0
		$s_p1_current_money			 = ($row['s_p1_current_money'] == '')?			0							:	$row['s_p1_current_money'];
		$s_p1_capital_money			 = ($row['s_p1_capital_money'] == '')?			0							:	$row['s_p1_capital_money'];
		$s_p2_money					 = ($row['s_p2_money'] == '')?					0							:	$row['s_p2_money'];
		$s_p2_current_money			 = ($row['s_p2_current_money'] == '')?			0							:	$row['s_p2_current_money'];
		$s_p2_capital_money			 = ($row['s_p2_capital_money'] == '')?			0							:	$row['s_p2_capital_money'];

		//學校有申請三年計畫，下一、下二年經費才有值
		//學校下一學年經費			載入到本地變數
		$s_total_money_ny1			 = ($row['s_total_money_ny1'] == '')?			0							:	$row['s_total_money_ny1']; 		//NULL則填入0
		$s_p1_money_ny1				 = ($row['s_p1_money_ny1'] == '')?				0							:	$row['s_p1_money_ny1']; 		//NULL則填入0
		$s_p1_current_money_ny1		 = ($row['s_p1_current_money_ny1'] == '')?		0							:	$row['s_p1_current_money_ny1'];
		$s_p1_capital_money_ny1		 = ($row['s_p1_capital_money_ny1'] == '')?		0							:	$row['s_p1_capital_money_ny1'];
		$s_p2_money_ny1				 = ($row['s_p2_money_ny1'] == '')?				0							:	$row['s_p2_money_ny1'];
		$s_p2_current_money_ny1		 = ($row['s_p2_current_money_ny1'] == '')?		0							:	$row['s_p2_current_money_ny1'];
		$s_p2_capital_money_ny1		 = ($row['s_p2_capital_money_ny1'] == '')?		0							:	$row['s_p2_capital_money_ny1'];

		//學校下二學年經費			載入到本地變數
		$s_total_money_ny2			 = ($row['s_total_money_ny2'] == '')?			0							:	$row['s_total_money_ny2']; 		//NULL則填入0
		$s_p1_money_ny2				 = ($row['s_p1_money_ny2'] == '')?				0							:	$row['s_p1_money_ny2']; 		//NULL則填入0
		$s_p1_current_money_ny2		 = ($row['s_p1_current_money_ny2'] == '')?		0							:	$row['s_p1_current_money_ny2'];
		$s_p1_capital_money_ny2		 = ($row['s_p1_capital_money_ny2'] == '')?		0							:	$row['s_p1_capital_money_ny2'];
		$s_p2_money_ny2				 = ($row['s_p2_money_ny2'] == '')?				0							:	$row['s_p2_money_ny2'];
		$s_p2_current_money_ny2		 = ($row['s_p2_current_money_ny2'] == '')?		0							:	$row['s_p2_current_money_ny2'];
		$s_p2_capital_money_ny2		 = ($row['s_p2_capital_money_ny2'] == '')?		0							:	$row['s_p2_capital_money_ny2'];

		//縣市今年經費				載入到本地變數
		$city_total_money 			 = ($row['city_total_money'] == '')?			$s_total_money				:	$row['city_total_money']; 		//若縣市今年經費待審(NULL)		則預設帶入學校今年經費
		$city_p1_money 				 = ($row['city_p1_money'] == '')?				$s_p1_money					:	$row['city_p1_money'];
		$city_p1_current_money 		 = ($row['city_p1_current_money'] == '')?		$s_p1_current_money			:	$row['city_p1_current_money'];
		$city_p1_capital_money 		 = ($row['city_p1_capital_money'] == '')?		$s_p1_capital_money			:	$row['city_p1_capital_money'];
		$city_p2_money 				 = ($row['city_p2_money'] == '')?				$s_p2_money					:	$row['city_p2_money'];
		$city_p2_current_money 		 = ($row['city_p2_current_money'] == '')?		$s_p2_current_money			:	$row['city_p2_current_money'];
		$city_p2_capital_money		 = ($row['city_p2_capital_money'] == '')?		$s_p2_capital_money			:	$row['city_p2_capital_money'];

		//縣市下一年經費			載入到本地變數
		$city_total_money_ny1		 = ($row['city_total_money_ny1'] == '')?		$s_total_money_ny1			:	$row['city_total_money_ny1'];	//若縣市下一年經費待審(NULL)	則預設帶入學校下一年經費
		$city_p1_money_ny1 			 = ($row['city_p1_money_ny1'] == '')?			$s_p1_money_ny1				:	$row['city_p1_money_ny1'];
		$city_p1_current_money_ny1   = ($row['city_p1_current_money_ny1'] == '')?	$s_p1_current_money_ny1		:	$row['city_p1_current_money_ny1'];
		$city_p1_capital_money_ny1   = ($row['city_p1_capital_money_ny1'] == '')?	$s_p1_capital_money_ny1		:	$row['city_p1_capital_money_ny1'];
		$city_p2_money_ny1 			 = ($row['city_p2_money_ny1'] == '')?			$s_p2_money_ny1				:	$row['city_p2_money_ny1'];
		$city_p2_current_money_ny1   = ($row['city_p2_current_money_ny1'] == '')?	$s_p2_current_money_ny1		:	$row['city_p2_current_money_ny1'];
		$city_p2_capital_money_ny1   = ($row['city_p2_capital_money_ny1'] == '')?	$s_p2_capital_money_ny1		:	$row['city_p2_capital_money_ny1'];

		//縣市下二年經費			載入到本地變數
		$city_total_money_ny2		 = ($row['city_total_money_ny2'] == '')?		$s_total_money_ny2			:	$row['city_total_money_ny2']; 	//若縣市下二年經費待審(NULL)	則預設帶入學校下二年經費
		$city_p1_money_ny2			 = ($row['city_p1_money_ny2'] == '')?			$s_p1_money_ny2				:	$row['city_p1_money_ny2'];
		$city_p1_current_money_ny2	 = ($row['city_p1_current_money_ny2'] == '')?	$s_p1_current_money_ny2		:	$row['city_p1_current_money_ny2'];
		$city_p1_capital_money_ny2	 = ($row['city_p1_capital_money_ny2'] == '')?	$s_p1_capital_money_ny2		:	$row['city_p1_capital_money_ny2'];
		$city_p2_money_ny2 			 = ($row['city_p2_money_ny2'] == '')?			$s_p2_money_ny2				:	$row['city_p2_money_ny2'];
		$city_p2_current_money_ny2   = ($row['city_p2_current_money_ny2'] == '')?	$s_p2_current_money_ny2		:	$row['city_p2_current_money_ny2'];
		$city_p2_capital_money_ny2   = ($row['city_p2_capital_money_ny2'] == '')?	$s_p2_capital_money_ny2		:	$row['city_p2_capital_money_ny2'];

		//縣市今+下+下二年意見		載入到本地變數
		$city_desc 					 =  $row['city_desc'];
		$city_desc_ny1 				 =  $row['city_desc_ny1'];
		$city_desc_ny2 			 	 =  $row['city_desc_ny2'];
		$city_desc_p2 				 =  $row['city_desc_p2'];
		$city_desc_ny1_p2 			 =  $row['city_desc_ny1_p2'];
		$city_desc_ny2_p2 			 =  $row['city_desc_ny2_p2'];
		$city_approved 				 =  $row['city_approved'];

		//縣市今+下+下二年意見		載入到本地變數
		$lastyear_leaving 			 = ($row['lastyear_leaving'] == '')?			0							:	$row['lastyear_leaving'];
		$page1_warning				 =	$row['page1_warning'];
		$page1_desc					 =  $row['page1_desc'];
		$page2_warning 				 =  $row['page2_warning'];
		$page2_desc 				 =  $row['page2_desc'];
		$page3_warning 				 =  $row['page3_warning'];
		$page3_desc 				 =  $row['page3_desc'];

		//抓出儲存符合指標欄位		載入到本地變數
		//儲存符合指標欄位以","分隔
		$accord_point 				=	$row['accord_point']; 
		$accord_point_ary 			= 	explode(",",$accord_point);

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

		$result				 = mysql_query($sql);
		$num_rows 			 = mysql_num_rows($result); //列數

		$has_outlay 		 = 0; //有無雜支項目
		$idx 				 = 0;

		//順序：顯示已填資料 -> 補滿9項(未滿9時補上空值) -> 顯示雜支
		while($row = mysql_fetch_array($result))
		{
			$seq_no			 =  $row['seq_no'];
			$subject 	 	 =  $row['subject'];
			$category 	     =  $row['category'];
			$item			 =  $row['item'];
			$unit			 =  $row['unit'];
			$price			 =  $row['price'];
			$amount			 =  $row['amount'];
			$s_money		 =  $row['s_money'];
			$s_desc 		 =  $row['s_desc'];
			$city_money 	 = ($row['city_money'] == '')?				$s_money	:	$row['city_money'];

			if($city_money > $s_money)
				$city_money  = $s_money;
			$city_delete = $s_money - $city_money;

			$s1 = array("","經常門","資本門");
			$s3 = array(""=>array("")
					 , "經常門"=>array("","鐘點費","鐘點費(含補充保費)","器材購置","器材維護","教材","道具","硬體設備","加班費","其他")
					 , "資本門"=>array("","器材購置","器材維護","硬體設備","其他")
						);

			if($category != '雜支')
			{
				$idx++;

				// name 或 id 最後格式為 p1_xxx_1, p1=特色一(p2為二), xxx=名稱(ex.subject=科目、category=類別), 最後一位數字表示項次，每個特色有1~10

				echo "<tr height='30px' style='font-size:13px;'>";

					// 序號、類別、項目、單位、單價、數量、金額、說明
					echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>$idx      <input type='hidden' 	   		name='".$p."_seq_no_$idx'   	  value='$seq_no'>  </td>";
					echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>          <input type='text'   size='2'    name='".$p."_subject_$idx'  	  value='$subject'  style='border:0px; text-align:right; background-color:aliceblue;' readonly></td>";
					echo "<td nowrap='nowrap'                bgcolor='aliceblue'>$category <input type='hidden' 	   		name='".$p."_category_$idx' 	  value='$category'></td>";
					echo "<td nowrap='nowrap'                bgcolor='aliceblue'>$item     <input type='hidden' 			name='".$p."_item_$idx'     	  value='$item'>    </td>";
					echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>$unit     <input type='hidden' 			name='".$p."_unit_$idx'     	  value='$unit'>    </td>";
					echo "<td nowrap='nowrap' align='right'  bgcolor='aliceblue'>$price    <input type='hidden' 			name='".$p."_price_$idx'    	  value='$price'>   </td>";
					echo "<td nowrap='nowrap' align='right'  bgcolor='aliceblue'>$amount   <input type='hidden' 			name='".$p."_amount_$idx'		  value='$amount'>  </td>";
					echo "<td nowrap='nowrap' align='right'  bgcolor='aliceblue'>$s_money  <input type='hidden'				name='".$p."_s_money_$idx' 		  value='$s_money'> </td>";
					echo "<td nowrap='nowrap'                bgcolor='aliceblue'>$s_desc                                                                  					    </td>";

					// 初審金額、刪減金額
					echo "<td nowrap='nowrap' align='center' bgcolor='cornsilk'>".		  "<input type='text' 	size='3'	name='".$p."_city_money_$idx'  value='$city_money'  style='text-align:right;' onkeyup=value=value.replace(/[^\d]/g,'') onChange='js:Count(this,$idx);'></td>";
					echo "<td nowrap='nowrap' align='center' bgcolor='cornsilk'>". 		  "<input type='text' 	size='3'	name='".$p."_city_delete_$idx' value='$city_delete' style='border:0px; text-align:right; background-color:cornsilk;' readonly></td>";
				echo "</tr>";
			}
			else
			{
				$has_outlay = 1;

				$outlay_seq_no      =  $seq_no;
				$outlay_subject     =  $subject;
				$outlay_category    =  $category;
				$outlay_item        =  $item;
				$outlay_s_money     =  $s_money;
				$outlay_s_desc      =  $s_desc;
				$outlay_city_money  = ($city_money  == '')? $s_money:$city_money;
				$outlay_city_delete = ($city_delete == '')?        0:$city_delete;
			}
		}

		if($has_outlay == 1) //有雜支才顯示
		{
			$idx++;

			echo "<tr height='30px' style='font-size:13px;'>";
			echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>$idx             <input type='hidden' name='".$p."_seq_no_$idx'   value='$seq_no'></td>";
			echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>                 <input type='text'   name='".$p."_subject_$idx'  value='$outlay_subject' size='2' style='border:0px; text-align:right; background-color:aliceblue;' readonly></td>";
			echo "<td nowrap='nowrap'                bgcolor='aliceblue'>$outlay_category <input type='hidden' name='".$p."_category_$idx' value='$outlay_category'></td>";
			echo "<td nowrap='nowrap'                bgcolor='aliceblue'></td>";
			echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'></td>";
			echo "<td nowrap='nowrap' align='right'  bgcolor='aliceblue'></td>";
			echo "<td nowrap='nowrap' align='right'  bgcolor='aliceblue'></td>";
			echo "<td nowrap='nowrap' align='right'  bgcolor='aliceblue'>$outlay_s_money  <input type='hidden' name='".$p."_s_money_$idx' value='$outlay_s_money'></td>";
			echo "<td nowrap='nowrap'                bgcolor='aliceblue'>$outlay_s_desc</td>";
			echo "<td nowrap='nowrap' align='center' bgcolor='cornsilk'> <input type='text' size='3' name='".$p."_city_money_$idx'  value='$outlay_city_money'  style='border:0px; text-align:right; background-color:cornsilk;' readonly></td>";
			echo "<td nowrap='nowrap' align='center' bgcolor='cornsilk'> <input type='text' size='3' name='".$p."_city_delete_$idx' value='$outlay_city_delete' style='border:0px; text-align:right; background-color:cornsilk;' readonly></td>";
			echo "</tr>";
		}
	}

	$sql = "select * from school_upload_name where sy_seq = '$main_seq' ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$point2 = $row['point2'];
		$lastyear_leaving_file = $row['lastyear_leaving_file'];
		$a2_1 = $row['a2_1'];
		$a2_2 = $row['a2_2'];
	}

	$file_path = '/epa_uploads/'.$school_year.'/pub/'.$account.'/';
	$file_path2 = '/epa_uploads/'.$school_year.'/pri/'.$account.'/';
?>
<p>

<a href="a2_examine_table.php">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

審核補助項目 / 補助項目二：補助學校發展教育特色 / <b>審核</b>

<p>
<hr>
<p>

<body onload="set_default()">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<form name="form" method="post" action="examine_allowance_a2_finish.php" onSubmit="return toCheck();">

		● <a href="/edu_dl/<?=$school_year;?>/allowance-02.pdf" target="_blank"><b><u>補助項目說明</u></b></a><p>

		● 學校名稱：<font color=blue><?=($account.' '.$district.$schoolname);?></font><p>

		● 經費合計<p>
		<table>
			<tr height="40px">
				<td width="45%" align=right>
					● <?=$school_year;?>年度 學校申請金額：
					<input type="text" size="3" name="s_total_money" value="<?=$s_total_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元
				</td>
				<td>
					　　<img src="/edu/images/calculator.png" align="absmiddle" /><font color=blue>	<?=$school_year;?>年度 縣市初審金額</font>：
					<input type="text" size="3" name="city_total_money" value="<?=$city_total_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元
				</td>
			</tr>
			
			<?	//如果學校沒有三年計畫 下一年度經費 則此欄位不顯示  ?>
			<tr height="40px" style="display:<?=($s_total_money_ny1 == 0 || $s_total_money_ny1 == '')?	"none"	:	"";?>;">
				<td  width="45%" align=right>
					● <?=$school_year+1;?>年度 學校申請金額：
					<input type="text" size="3" name="s_total_money_ny1" value="<?=$s_total_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元
				</td>
				<td>
					　　<img src="/edu/images/calculator.png" align="absmiddle" /><font color=blue>	<?=$school_year+1;?>年度 縣市初審金額</font>：
					<input type="text" size="3" name="city_total_money_ny1" value="<?=$city_total_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元
				</td>
			</tr>
			
			<?	//如果學校沒有三年計畫的下二年度經費 則此欄位不顯示  ?>
			<tr height="40px" style="display:<?=($s_total_money_ny2 == 0 || $s_total_money_ny2 == '')?"none":"";?>;">
				<td  width="45%" align=right>
					● <?=$school_year+2;?>年度 學校申請金額：
					<input type="text" size="3" name="s_total_money_ny2" value="<?=$s_total_money_ny2;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元
				</td>
				<td>
					　　<img src="/edu/images/calculator.png" align="absmiddle" /><font color=blue>	<?=$school_year+2;?>年度 縣市初審金額</font>：
					<input type="text" size="3" name="city_total_money_ny2" value="<?=$city_total_money_ny2;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元
				</td>
			</tr>
		</table><p>

		● 全校班級數：<?=$class_total;?> 班，申請 <?=$p_num;?> 項特色。<p>

		<p>
		<hr>
		<p>

		<? // 以下為特色一 ================================================================================================ ?>

		● 特色一<p>

		　特色名稱：<?=$p1_name;?><?=($p1_IsContinue == "Y")?"（本年度為第 ".$p1_ContinueYear." 年辦理）":"";?><p>
		　參加學生人數<?=$s_p1_student. "人，其中含目標學生" . $s_p1_target . "人，目標學生佔參加學生" . $s_p1_per ."%。<p>" ;?>

		<font color="blue"><?=$school_year;?>年度：</font><p>
			學校申請：共計
		<input type="text" size="3" name="s_p1_money"         	 value="<?=$s_p1_money;?>"        	  style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元
		（經常門<input type="text" size="3" name="s_p1_current_money"    value="<?=$s_p1_current_money;?>" 	  style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元
		，資本門<input type="text" size="3" name="s_p1_capital_money"    value="<?=$s_p1_capital_money;?>" 	  style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

		　　縣市初審：共計
		<input type="text" size="3" name="city_p1_money"         value="<?=$city_p1_money;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元
		（經常門<input type="text" size="3" name="city_p1_current_money" value="<?=$city_p1_current_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元
		，資本門<input type="text" size="3" name="city_p1_capital_money" value="<?=$city_p1_capital_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

		　　經費概算表：<p>
		<table border="2" rules="rows" cellspacing="0" cellpadding="5">
			<tr height="30px" align="center">
				<td colspan="9" nowrap="nowrap" bgcolor="#BDE1FF">學校申請</td>
				<td colspan="2" nowrap="nowrap" bgcolor="#FFD37A">縣市初審</td>
			</tr>
			<tr height="30px" align="center">
				<td nowrap="nowrap" bgcolor="DAEEFF">項次</td>
				<td nowrap="nowrap" bgcolor="DAEEFF">科目</td>
				<td nowrap="nowrap" bgcolor="DAEEFF">類別</td>
				<td nowrap="nowrap" bgcolor="DAEEFF">項目</td>
				<td nowrap="nowrap" bgcolor="DAEEFF">單位</td>
				<td nowrap="nowrap" bgcolor="DAEEFF">單價</td>
				<td nowrap="nowrap" bgcolor="DAEEFF">數量</td>
				<td nowrap="nowrap" bgcolor="DAEEFF">金額</td>
				<td nowrap="nowrap" bgcolor="DAEEFF">說明</td>
				<td nowrap="nowrap" bgcolor="FFE1A4">初審</td>
				<td nowrap="nowrap" bgcolor="FFE1A4">刪減</td>
			</tr>
			<? print_item($table_name_item, 'p1_'.$school_year, $main_seq);  // 顯示細項 ?>
		</table><p>

		　　<?=$school_year;?>年度 縣市初審意見：<p>
		　　<textarea name="city_desc" cols="55" rows="4"><?=$city_desc;?></textarea><p>

		<? if($s_p1_money_ny1 == 0 || $s_p1_money_ny1 == '') echo "<!-- "; ?>

			　<font color="blue"><?=($school_year+1);?>年度：</font><p>

			　　學校申請：共計
			<input type="text" size="3" name="s_p1_money_ny1"         value="<?=$s_p1_money_ny1;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（經常門
			<input type="text" size="3" name="s_p1_current_money_ny1" value="<?=$s_p1_current_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門
			<input type="text" size="3" name="s_p1_capital_money_ny1" value="<?=$s_p1_capital_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

			　　縣市初審：共計
			<input type="text" size="3" name="city_p1_money_ny1"         value="<?=$city_p1_money_ny1;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（經常門
			<input type="text" size="3" name="city_p1_current_money_ny1" value="<?=$city_p1_current_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門
			<input type="text" size="3" name="city_p1_capital_money_ny1" value="<?=$city_p1_capital_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

			　　經費概算表：<p>

			<table border="2" rules="rows" cellspacing="0" cellpadding="5">
				<tr height="30px" align="center">
					<td colspan="9" nowrap="nowrap" bgcolor="#BDE1FF">學校申請</td>
					<td colspan="2" nowrap="nowrap" bgcolor="#FFD37A">縣市初審</td>
				</tr>
				<tr height="30px" align="center">
					<td nowrap="nowrap" bgcolor="DAEEFF">項次</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">科目</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">類別</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">項目</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">單位</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">單價</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">數量</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">金額</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">說明</td>
					<td nowrap="nowrap" bgcolor="FFE1A4">初審</td>
					<td nowrap="nowrap" bgcolor="FFE1A4">刪減</td>
				</tr>
				<? print_item($table_name_item, 'p1_'.($school_year+1), $main_seq);  // 顯示細項 ?>
			</table><p>

			　　<?=$school_year+1;?>年度 縣市初審意見：<p>
			　　<textarea name="city_desc_ny1" cols="55" rows="4"><?=$city_desc_ny1;?></textarea><p>

		<? if($s_p1_money_ny1 == 0 || $s_p1_money_ny1 == '') echo " -->"; ?>

		<? if($s_p1_money_ny2 == 0 || $s_p1_money_ny2 == '') echo "<!-- "; ?>

			　<font color="blue"><?=($school_year+2);?>年度：</font><p>

			　　學校申請：共計
			<input type="text" size="3" name="s_p1_money_ny2"         value="<?=$s_p1_money_ny2;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（經常門
			<input type="text" size="3" name="s_p1_current_money_ny2" value="<?=$s_p1_current_money_ny2;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門
			<input type="text" size="3" name="s_p1_capital_money_ny2" value="<?=$s_p1_capital_money_ny2;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

			　　縣市初審：共計
			<input type="text" size="3" name="city_p1_money_ny2"         value="<?=$city_p1_money_ny2;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（經常門
			<input type="text" size="3" name="city_p1_current_money_ny2" value="<?=$city_p1_current_money_ny2;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門
			<input type="text" size="3" name="city_p1_capital_money_ny2" value="<?=$city_p1_capital_money_ny2;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

			　　經費概算表：<p>

			<table border="2" rules="rows" cellspacing="0" cellpadding="5">
				<tr height="30px" align="center">
					<td colspan="9" nowrap="nowrap" bgcolor="#BDE1FF">學校申請</td>
					<td colspan="2" nowrap="nowrap" bgcolor="#FFD37A">縣市初審</td>
				</tr>
				<tr height="30px" align="center">
					<td nowrap="nowrap" bgcolor="DAEEFF">項次</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">科目</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">類別</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">項目</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">單位</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">單價</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">數量</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">金額</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">說明</td>
					<td nowrap="nowrap" bgcolor="FFE1A4">初審</td>
					<td nowrap="nowrap" bgcolor="FFE1A4">刪減</td>
				</tr>
				<? print_item($table_name_item, 'p1_'.($school_year+2), $main_seq);  // 顯示細項 ?>
			</table><p>

			　　<?=$school_year+2;?>年度 縣市初審意見：<p>
			　　<textarea name="city_desc_ny2" cols="55" rows="4"><?=$city_desc_ny2;?></textarea><p>
			<p>
			<hr>
			<p>

		<? if($s_p1_money_ny2 == 0 || $s_p1_money_ny2 == '') echo " -->"; ?>

		<? // 特色二 ================================================================================================ ?>

		<? if($s_p2_money == 0) echo "<div style='display:none'>"; ?>

			● 特色二<p>

			　特色名稱：<?=$p2_name;?><?=($p2_IsContinue == "Y")?"（本年度為第 ".$p2_ContinueYear." 年辦理）":"";?><p>

			　參加學生人數
			<?=$s_p2_student;?> 人，其中含目標學生
			<?=$s_p2_target;?> 人，目標學生佔參加學生
			<?=$s_p2_per;?>%。<p>

			　<font color="blue"><?=$school_year;?>年度：</font><p>

			　　學校申請：共計
			<input type="text" size="3" name="s_p2_money"         value="<?=$s_p2_money;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（經常門
			<input type="text" size="3" name="s_p2_current_money" value="<?=$s_p2_current_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門
			<input type="text" size="3" name="s_p2_capital_money" value="<?=$s_p2_capital_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

			　　縣市初審：共計
			<input type="text" size="3" name="city_p2_money"         value="<?=$city_p2_money;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（經常門
			<input type="text" size="3" name="city_p2_current_money" value="<?=$city_p2_current_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門
			<input type="text" size="3" name="city_p2_capital_money" value="<?=$city_p2_capital_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

			　　經費概算表：<p>

			<table border="2" rules="rows" cellspacing="0" cellpadding="5">
				<tr height="30px" align="center">
					<td colspan="9" nowrap="nowrap" bgcolor="#BDE1FF">學校申請</td>
					<td colspan="2" nowrap="nowrap" bgcolor="#FFD37A">縣市初審</td>
				</tr>
				<tr height="30px" align="center">
					<td nowrap="nowrap" bgcolor="DAEEFF">項次</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">科目</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">類別</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">項目</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">單位</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">單價</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">數量</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">金額</td>
					<td nowrap="nowrap" bgcolor="DAEEFF">說明</td>
					<td nowrap="nowrap" bgcolor="FFE1A4">初審</td>
					<td nowrap="nowrap" bgcolor="FFE1A4">刪減</td>
				</tr>
				<? print_item($table_name_item, 'p2_'.$school_year, $main_seq);  // 顯示細項 ?>
			</table><p>

			　　<?=$school_year;?>年度 縣市初審意見：<p>
			　　<textarea name="city_desc_p2" cols="55" rows="4"><?=$city_desc_p2;?></textarea><p>

			<? //學校沒有下一年度經費表 則上下夾註解掉
				if($s_p2_money_ny1 == 0 || $s_p2_money_ny1 == '') echo "<!-- "; ?>

				　　<font color="blue"><?=($school_year+1);?>年度：</font><p>

				　　學校申請：共計
				<input type="text" size="3" name="s_p2_money_ny1"         value="<?=$s_p2_money_ny1;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（經常門
				<input type="text" size="3" name="s_p2_current_money_ny1" value="<?=$s_p2_current_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門
				<input type="text" size="3" name="s_p2_capital_money_ny1" value="<?=$s_p2_capital_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

				　　縣市初審：共計
				<input type="text" size="3" name="city_p2_money_ny1"         value="<?=$city_p2_money_ny1;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（經常門
				<input type="text" size="3" name="city_p2_current_money_ny1" value="<?=$city_p2_current_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門
				<input type="text" size="3" name="city_p2_capital_money_ny1" value="<?=$city_p2_capital_money_ny1;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

				　　經費概算表：<p>

				<table border="2" rules="rows" cellspacing="0" cellpadding="5">
					<tr height="30px" align="center">
						<td colspan="9" nowrap="nowrap" bgcolor="#BDE1FF">學校申請</td>
						<td colspan="2" nowrap="nowrap" bgcolor="#FFD37A">縣市初審</td>
					</tr>
					<tr height="30px" align="center">
						<td nowrap="nowrap" bgcolor="DAEEFF">項次</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">科目</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">類別</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">項目</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">單位</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">單價</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">數量</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">金額</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">說明</td>
						<td nowrap="nowrap" bgcolor="FFE1A4">初審</td>
						<td nowrap="nowrap" bgcolor="FFE1A4">刪減</td>
					</tr>
					<? print_item($table_name_item, 'p2_'.($school_year+1), $main_seq);  // 顯示細項 ?>
				</table><p>

				　　<?=$school_year+1;?>年度 縣市初審意見：<p>
				　　<textarea name="city_desc_ny1_p2" cols="55" rows="4"><?=$city_desc_ny1_p2;?></textarea><p>

			<? if($s_p2_money_ny1 == 0 || $s_p2_money_ny1 == '') echo " -->"; ?>

			<? //學校沒有下一年度經費表 則上下夾註解掉
				if($s_p2_money_ny2 == 0 || $s_p2_money_ny2 == '') echo "<!-- "; ?>

				　　<font color="blue"><?=($school_year+2);?>年度：</font><p>

				　　學校申請：共計
				<input type="text" size="3" name="s_p2_money_ny2"         value="<?=$s_p2_money_ny2;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（經常門
				<input type="text" size="3" name="s_p2_current_money_ny2" value="<?=$s_p2_current_money_ny2;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門
				<input type="text" size="3" name="s_p2_capital_money_ny2" value="<?=$s_p2_capital_money_ny2;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

				　　縣市初審：共計
				<input type="text" size="3" name="city_p2_money_ny2"         value="<?=$city_p2_money_ny2;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（經常門
				<input type="text" size="3" name="city_p2_current_money_ny2" value="<?=$city_p2_current_money_ny2;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，資本門
				<input type="text" size="3" name="city_p2_capital_money_ny2" value="<?=$city_p2_capital_money_ny2;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。<p>

				　　經費概算表：<p>

				<table border="2" rules="rows" cellspacing="0" cellpadding="5">
					<tr height="30px" align="center">
						<td colspan="9" nowrap="nowrap" bgcolor="#BDE1FF">學校申請</td>
						<td colspan="2" nowrap="nowrap" bgcolor="#FFD37A">縣市初審</td>
					</tr>
					<tr height="30px" align="center">
						<td nowrap="nowrap" bgcolor="DAEEFF">項次</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">科目</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">類別</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">項目</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">單位</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">單價</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">數量</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">金額</td>
						<td nowrap="nowrap" bgcolor="DAEEFF">說明</td>
						<td nowrap="nowrap" bgcolor="FFE1A4">初審</td>
						<td nowrap="nowrap" bgcolor="FFE1A4">刪減</td>
					</tr>
					<? print_item($table_name_item, 'p2_'.($school_year+2), $main_seq);  // 顯示細項 ?>
				</table><p>

				　　<?=$school_year+2;?>年度 縣市初審意見：<p>
				　　<textarea name="city_desc_ny2_p2" cols="55" rows="4"><?=$city_desc_ny2_p2;?></textarea><p>
			<p>
			<hr>
			<p>

			<? if($s_p2_money_ny2 == 0 || $s_p2_money_ny2 == '') echo " -->"; ?>

		<? if($s_p2_money == 0) echo "</div>"; ?>

		<b>● 相關資料</b><p>

		　● <a href="print_point_page.php?id=<?=$account;?>" target="_blank">指標界定調查紀錄表</a><p>

		　● 歷史資料：<p>
		　　<a href="../105/effect_view_school_up_02.php?id=<?=$account;?>" target="_blank"><?=($school_year-1);?>年度 核定後資料與執行成果</a><p>
		　　<a href="../104/effect_view_school_up_02.php?id=<?=$account;?>" target="_blank"><?=($school_year-2);?>年度 核定後資料與執行成果</a><p>

		　● 應上傳檔案：<p>

		　　特色一實施計畫：<? echo ($a2_1 == ''?"<font color=red>未上傳</font>":"<font color=blue>已上傳</font>，檔名：<a href='".$file_path.$a2_1."' target='_new'>$a2_1</a>");?><p>

			<div style="display:<?=($a2_2 == '')?'none':''; //空白就不顯示?>;">
		　　特色二實施計畫：<? echo ($a2_2 == ''?"<font color=red>未上傳</font>":"<font color=blue>已上傳</font>，檔名：<a href='".$file_path.$a2_2."' target='_new'>$a2_2</a>");?><p>
			</div>

			<div style="display:<?=($page3_warning == '')?'none':''; //空白就不顯示?>;">
		　　目標學生名冊：<? echo ($point2 == ''?"<font color=red>未上傳</font>":"<font color=blue>已上傳</font>，檔名：<a href='".$file_path2.$point2."' target='_new'>$point2</a>");?><p>
			</div>

		<table>
			<? if($page1_warning == '') {echo "<!-- ";} ?>
				<tr>
					<td nowrap="nowrap">● 學校資料警示原因：</td>
					<td><?=$page1_warning;?></td>
				</tr>
				<tr>
					<td nowrap="nowrap">● 學校資料學校說明：</td>
					<td><?=$page1_desc;?></td>
				</tr>
			<? if($page1_warning == '') {echo " -->";} ?>

			<? if($page2_warning == '') {echo "<!-- ";} ?>
				<tr>
					<td nowrap="nowrap">● 目標學生警示原因：</td>
					<td><?=$page2_warning;?></td>
				</tr>
				<tr>
					<td nowrap="nowrap">● 目標學生學校說明：</td>
					<td><?=$page2_desc;?></td>
				</tr>
			<? if($page2_warning == '') {echo " -->";} ?>
		</table>

		<p>
		<hr>
		<p>

		<b>● 初審結果：</b><p>
		　<input type="radio" name="city_approved" value="Y" id="city_approved_1" <?=(($city_approved == 'Y')?'checked':"");?>> <img src="/edu/images/yes.png" align="absmiddle"/> 審核通過<p>
		　<input type="radio" name="city_approved" value="N" id="city_approved_2" <?=(($city_approved == 'N')?'checked':"");?>> <img src="/edu/images/no.png" align="absmiddle"/> 審核不通過且列入退件名單<p>

		<p>
		<hr>
		<p>

		<input type="hidden" name="main_seq"    value="<?=$main_seq;?>">
		<input type="hidden" name="school_year" value="<?=$school_year;?>">
		<input type="submit" name="button"      value="　確認送出　">

		<script language="JavaScript">

			//系統自動檢查縣市初審 審核不通過或金額異常	攔截送出
			function toCheck()
			{
				/* 逐項檢查 */
				var i, j, k;

				for(i = 1; i <= 2; i++)  // 特色(p1、p2)
				{
					for(j = 1; j <= 20; j++)  // 項目
					{
						for(k = 106; k <= 108; k++)  // 項目
						{
							if(document.getElementsByName('p' + i + '_' + k + '_s_money_'    + j)[0] != null && document.getElementsByName('p' + i + '_' + k + '_city_money_' + j)[0] != null) 
							// 除錯：檢查物件存在才繼續，不然程式會功能失效。
							{
								var s_money    = document.getElementsByName('p' + i + '_' + k + '_s_money_'    + j)[0];  // 學校申請金額
								var city_money = document.getElementsByName('p' + i + '_' + k + '_city_money_' + j)[0];  // 縣市初審金額

								if(city_money.value != '' && parseInt(city_money.value) > parseInt(s_money.value))
								{
									alert('特色 ' +i+ '：' +k+ ' 年度經費，第 ' +j+ ' 項的初審金額不得超過學校申請金額。');
									return false;
								}
							}
						}
					}
				}

				if(document.getElementsByName("city_approved")[1].checked == true && document.form.city_desc.value == "")
				{
					alert('若審核不通過，請在審核意見說明原因。');
					return false;
				}

				return true;
			}

			//計算單一項目的金額
			function Count(obj, item_idx)
			{
				var flag = 1;

				// 取得控制項
				var p = left(obj.name, 6);
				var subject     = document.getElementsByName(p + '_subject_'     + item_idx)[0]; // 科目
				var price       = document.getElementsByName(p + '_price_'       + item_idx)[0]; // 單價
				var s_money     = document.getElementsByName(p + '_s_money_'     + item_idx)[0]; // 學校申請
				var city_money  = document.getElementsByName(p + '_city_money_'  + item_idx)[0]; // 縣市初審
				var city_delete = document.getElementsByName(p + '_city_delete_' + item_idx)[0]; // 縣市刪減

				switch (obj.name)
				{
					case city_money.name:
					{
						/* 申請資本門被刪減成經常門處理 */
						if(parseInt(price.value) >= 10000)
						{
							if(parseInt(city_money.value) < 10000)
							{
								subject.value = "經常門";
							}
							else
							{
								subject.value = "資本門";
							}
						}

						/* 未填資料自動回復 */
						if(city_money.value == '')
						{
							city_money.value = s_money.value;
							city_delete.value = 0;
							flag = 0;
						}
						break;
					}
				}

				if(flag == 1) // 計算縣市刪減金額
				{
					city_delete.value = parseInt(s_money.value) - parseInt(city_money.value);
				}

				chkbox(obj);  // 計算雜支
			}

			function chkbox(obj)  // 計算雜支
			{
				var p = left(obj.name, 6);
				var i;
				var total = 0;

				for(i = 1; i <= 20; i++)
				{
					var subject     = document.getElementsByName(p + '_subject_'     + i)[0]; // 科目
					var category    = document.getElementsByName(p + '_category_'    + i)[0]; // 類別
					var s_money     = document.getElementsByName(p + '_s_money_'     + i)[0]; // 學校申請
					var city_money  = document.getElementsByName(p + '_city_money_'  + i)[0]; // 縣市初審
					var city_delete = document.getElementsByName(p + '_city_delete_' + i)[0]; // 縣市刪減

					if(subject != null)
					{
						if(subject.value == '經常門' && category.value != '雜支' && city_money.value != '' )
						{
							total += parseInt(city_money.value);
						}

						if(category.value == '雜支')
						{
							var new_outlay = parseInt(Math.round(total * 0.06));  // 四捨五入（105年03月21日 開會決議）

							if(parseInt(new_outlay) <= parseInt(s_money.value))  // 避免經資門變動造成雜支增加
							{
								city_money.value  = new_outlay;
								city_delete.value = parseInt(s_money.value) - parseInt(city_money.value);
							}
						}
					}
				}

				count_all();
			}

			//計算總金額
			function count_all()
			{
				var city_total_money     = document.getElementsByName('city_total_money')[0];      // 總金額
				var city_total_money_ny1 = document.getElementsByName('city_total_money_ny1')[0];  // 總金額
				var city_total_money_ny2 = document.getElementsByName('city_total_money_ny2')[0];  // 總金額

				city_total_money.value = 0;
				city_total_money_ny1.value = 0;
				city_total_money_ny2.value = 0;

				var i, j, k;
				var school_year = <?=$school_year;?>;

				for(i = 1; i <= 20; i++)
				{
					for(k = school_year; k <= school_year + 2; k++)
					{
						if(k == 106)  // 年代要每年手動新增
						{
							var city_p_money         = document.getElementsByName('city_p' + i + '_money')[0];          //ex.city_p1_money ,city_p2_money
							var city_p_current_money = document.getElementsByName('city_p' + i + '_current_money')[0];  //ex.city_p1_current_money
							var city_p_capital_money = document.getElementsByName('city_p' + i + '_capital_money')[0];  //ex.city_p1_capital_money
						}
						else if(k == 107)
						{
							var city_p_money         = document.getElementsByName('city_p' + i + '_money_ny1')[0];         //ex.city_p1_money ,city_p2_money
							var city_p_current_money = document.getElementsByName('city_p' + i + '_current_money_ny1')[0]; //ex.city_p1_current_money
							var city_p_capital_money = document.getElementsByName('city_p' + i + '_capital_money_ny1')[0]; //ex.city_p1_capital_money
						}
						else if(k == 108)
						{
							var city_p_money         = document.getElementsByName('city_p' + i + '_money_ny2')[0];         //ex.city_p1_money ,city_p2_money
							var city_p_current_money = document.getElementsByName('city_p' + i + '_current_money_ny2')[0]; //ex.city_p1_current_money
							var city_p_capital_money = document.getElementsByName('city_p' + i + '_capital_money_ny2')[0]; //ex.city_p1_capital_money
						}

						if(city_p_money != null)
						{
							var current_money = 0;
							var capital_money = 0;

							for(j = 1; j <= 20; j++) //計算各特色經常 & 資本
							{
								var subject    = document.getElementsByName('p' + i + '_' + k + '_subject_' + j)[0];     // 科目
								var city_money = document.getElementsByName('p' + i + '_' + k + '_city_money_' + j)[0];  // 金額

								if(subject != null)
								{
									if(city_money.value != '' && subject.value == '經常門')
									{
										current_money += parseInt(city_money.value);
									}

									if(city_money.value != '' && subject.value == '資本門')
									{
										capital_money += parseInt(city_money.value);
									}
								}
							}

							city_p_money.value = parseInt(current_money) + parseInt(capital_money); //各特色的經常 + 資本
							city_p_current_money.value = current_money; //各特色的經常門金額
							city_p_capital_money.value = capital_money; //各特色的資本門金額

							if(k == 106)  // 年代要每年手動新增
							{
								city_total_money.value = parseInt(city_total_money.value) + parseInt(city_p_money.value); //所有特色的總和
							}
							else if(k == 107)
							{
								city_total_money_ny1.value = parseInt(city_total_money_ny1.value) + parseInt(city_p_money.value); //所有特色的總和
							}
							else if(k == 108)
							{
								city_total_money_ny2.value = parseInt(city_total_money_ny2.value) + parseInt(city_p_money.value); //所有特色的總和
							}
						}
					}
				}
			}

			//設定預設值
			function set_default()
			{
				var city_p1_money = document.getElementsByName('city_p1_money')[0];
				if (city_p1_money != null)
				{
					chkbox(city_p1_money);
				}

				var city_p1_money_ny1 = document.getElementsByName('city_p1_money_ny1')[0];
				if (city_p1_money_ny1 != null)
				{
					chkbox(city_p1_money_ny1);
				}

				var city_p1_money_ny2 = document.getElementsByName('city_p1_money_ny2')[0];
				if (city_p1_money_ny2 != null)
				{
					chkbox(city_p1_money_ny2);
				}

				var city_p2_money = document.getElementsByName('city_p2_money')[0];
				if (city_p2_money != null)
				{
					chkbox(city_p2_money);
				}

				var city_p2_money_ny1 = document.getElementsByName('city_p2_money_ny1')[0];
				if (city_p2_money_ny1 != null)
				{
					chkbox(city_p2_money_ny1);
				}

				var city_p2_money_ny2 = document.getElementsByName('city_p2_money_ny2')[0];
				if (city_p2_money_ny2 != null)
				{
					chkbox(city_p2_money_ny2);
				}
			}

			// 取得左N位
			function left(mainStr,n)
			{
				return mainStr.substring(0,n);
			}
		</script>
	</form>
</body>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

<?