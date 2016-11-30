<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	include "checkdate_city.php";

	include "../../function/config_for_106.php"; //本年度基本設定

	$account = ($_POST['account'] == '')?$_GET['id']:$_POST['account']; //取回傳遞來的學校編號，get為測試用

	$table_name = $a1_table_name;
	$table_name_item = $table_name.'_item';
	$a_num = 'a1';

	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname ".
		   "      , sy.* ".
		   //補一資料
		   "      , $a_num.* ".

		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join $table_name as $a_num on sy.seq_no = $a_num.sy_seq ".
		   " where sy.school_year = '$school_year' ".
		   "   and sd.account = '$account' ";

	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$account = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];

		$student = $row['student'];
		$target_aboriginal = $row['target_aboriginal'];
		$target_no_aboriginal = $row['target_no_aboriginal'];
		$class_total = $row['class_total'];

		$main_seq = $row['seq_no']; //school_year的seq_no

		$s_total_money = ($row['s_total_money'] == '')?0:$row['s_total_money']; //NULL則填入0
		$s_p1_times = $row['s_p1_times'];
		$s_p1_people = $row['s_p1_people'];
		$s_p1_money = ($row['s_p1_money'] == '')?0:$row['s_p1_money'];
		$s_p2_people = $row['s_p2_people'];
		$s_p2_money = ($row['s_p2_money'] == '')?0:$row['s_p2_money'];
		$s_p2_student = $row['s_p2_student'];

		$city_total_money = ($row['city_total_money'] == '')?$s_total_money:$row['city_total_money']; //NULL則填入學校資料
		$city_p1_money = ($row['city_p1_money'] == '')?$s_p1_money:$row['city_p1_money'];
		$city_p1_times = ($row['city_p1_times'] == '')?$s_p1_times:$row['city_p1_times'];
		$city_p2_money = ($row['city_p2_money'] == '')?$s_p2_money:$row['city_p2_money'];
		$city_p2_people = ($row['city_p2_people'] == '')?$s_p2_people:$row['city_p2_people'];
		$city_desc = $row['city_desc'];
		$city_approved = $row['city_approved'];

		$lastyear_leaving = ($row['lastyear_leaving'] == '')?0:$row['lastyear_leaving'];
		$page1_warning = $row['page1_warning'];
		$page1_desc = $row['page1_desc'];
		$page2_warning = $row['page2_warning'];
		$page2_desc = $row['page2_desc'];
		$page3_warning = $row['page3_warning'];
		$page3_desc = $row['page3_desc'];

		$accord_point = $row['accord_point']; //符合的指標
		$accord_point_ary = explode(",",$accord_point);
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
			$seq_no     =  $row['seq_no'];
			$subject    =  $row['subject'];
			$category   =  $row['category'];
			$item       =  $row['item'];
			$unit       =  $row['unit'];
			$price      =  $row['price'];
			$amount     =  $row['amount'];
			$s_money    =  $row['s_money'];
			$s_desc     =  $row['s_desc'];
			$city_money = ($row['city_money'] == '')?$s_money:$row['city_money'];

			//修正加總錯誤
			if($city_money > $s_money)
			{
				$city_money = $s_money;
			}
			$city_delete = $s_money - $city_money;

			if($category != '雜支')
			{
				$idx++;

				// name 或 id 最後格式為 p1_xxx_1, p1=特色一(p2為二), xxx=名稱(ex.subject=科目、category=類別), 最後一位數字表示項次，每個特色有1~10

				echo "<tr height='30px' style='font-size:13px;'>";

					// 序號、類別、項目、單位、單價、數量、金額、說明
					echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>$idx      <input type='hidden' name='".$p."_seq_no_$idx'   value='$seq_no'></td>";
					echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>$subject  <input type='hidden' name='".$p."_subject_$idx'  value='$subject'></td>";
					echo "<td nowrap='nowrap'                bgcolor='aliceblue'>$category <input type='hidden' name='".$p."_category_$idx' value='$category'></td>";
					echo "<td nowrap='nowrap'                bgcolor='aliceblue'>$item</td>";
					echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>$unit</td>";
					echo "<td nowrap='nowrap' align='right'  bgcolor='aliceblue'>$price</td>";
					echo "<td nowrap='nowrap' align='right'  bgcolor='aliceblue'>$amount</td>";
					echo "<td nowrap='nowrap' align='right'  bgcolor='aliceblue'>$s_money  <input type='hidden' name='".$p."_s_money_$idx' value='$s_money'></td>";
					echo "<td nowrap='nowrap'                bgcolor='aliceblue'>$s_desc</td>";

					// 初審金額、刪減金額
					echo "<td nowrap='nowrap' align='center' bgcolor='cornsilk'><input type='text' size='3' name='".$p."_city_money_$idx'  value='$city_money'  style='text-align:right;' onkeyup=value=value.replace(/[^\d]/g,'') onChange='js:Count(this,$idx);'></td>";
					echo "<td nowrap='nowrap' align='center' bgcolor='cornsilk'><input type='text' size='3' name='".$p."_city_delete_$idx' value='$city_delete' style='border:0px; text-align:right; background-color:cornsilk;' readonly></td>";
				echo "</tr>";
			}
			else
			{
				$has_outlay = 1;

				$outlay_seq_no      = $seq_no;
				$outlay_subject     = $subject;
				$outlay_category    = $category;
				$outlay_item        = $item;
				$outlay_s_money     = $s_money;
				$outlay_s_desc      = $s_desc;
				$outlay_city_money  = ($city_money  == '')? $s_money:$city_money;
				$outlay_city_delete = ($city_delete == '')?        0:$city_delete;
			}
		}

		if($has_outlay == 1) //有雜支才顯示
		{
			$idx++;

			echo "<tr height='30px' style='font-size:13px;'>";
			echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>$idx             <input type='hidden' name='".$p."_seq_no_$idx'   value='$seq_no'></td>";
			echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>$outlay_subject  <input type='hidden' name='".$p."_subject_$idx'  value='$outlay_subject'></td>";
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
		$a1_1 = $row['a1_1'];
		$a1_2 = $row['a1_2'];
	}

	$file_path = '/epa_uploads/'.$school_year.'/pub/'.$account.'/';
	$file_path2 = '/epa_uploads/'.$school_year.'/pri/'.$account.'/';
?>
<p>

<a href="a1_examine_table.php">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

審核補助項目 / 補助項目一：推展親職教育活動 / <b>審核</b>

<p>
<hr>
<p>

<body onload="set_default()">

	<form name="form" method="post" action="examine_allowance_a1_finish.php" onSubmit="return toCheck();">

		● <a href="/edu_dl/<?=$school_year;?>/allowance-01.pdf" target="_blank"><b><u>補助項目說明</u></b></a><p>

		● 學校名稱：<font color=blue><?=($account.' '.$district.$schoolname);?></font><p>

		● 經費合計<p>
		<table>
			<tr>
				<td width="24%" align=right>
					● 學校申請金額：
				</td>
				<td>
					<input type="text" size="3" name="s_total_money" value="<?=$s_total_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元
				</td>
			</tr>
			<tr height="40px">
				<td width="24%" align=right>
					<img src="/edu/images/calculator.png" align="absmiddle" /><font color=blue>	縣市初審金額</font>：
				</td>
				<td>
					<input type="text" size="3" name="city_total_money" value="<?=$city_total_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元
				</td>
			</tr>
		</table><p>

		<p>
		<hr>
		<p>

		一、親職教育活動<p>

		　　● 預計參加人數 <?=$s_p1_people;?> 人。<p>
		　　　學校申請：經費共計
		<input type="text" size="3" name="s_p1_money" value="<?=$s_p1_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，辦理親職教育活動
		<input type="text" size="1" name="s_p1_times" value="<?=$s_p1_times;?>" style="border:0px; text-align:center; background-color:aliceblue;" readonly> 場。<p>

		　　　縣市初審：經費共計
		<input type="text" size="3" name="city_p1_money" value="<?=$city_p1_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，辦理親職教育活動
		<input type="text" size="1" name="city_p1_times" value="<?=$city_p1_times;?>" style="text-align:center;" onkeyup="value=value.replace(/[^\d]/g,'')"> 場。<p>

		　　　親職教育活動經費概算表：<p>
		<table border="2" rules="rows" cellspacing="0" cellpadding="5">
			<tr height="30px" align="center">
				<td colspan="9" nowrap="nowrap" bgcolor="#DAEEFF">學校申請</td>
				<td colspan="2" nowrap="nowrap" bgcolor="#FFE1A4">縣市初審</td>
			</tr>
			<tr height="30px" align="center">
				<td nowrap="nowrap" bgcolor="aliceblue">項次</td>
				<td nowrap="nowrap" bgcolor="aliceblue">科目</td>
				<td nowrap="nowrap" bgcolor="aliceblue">類別</td>
				<td nowrap="nowrap" bgcolor="aliceblue">項目</td>
				<td nowrap="nowrap" bgcolor="aliceblue">單位</td>
				<td nowrap="nowrap" bgcolor="aliceblue">單價</td>
				<td nowrap="nowrap" bgcolor="aliceblue">數量</td>
				<td nowrap="nowrap" bgcolor="aliceblue">金額</td>
				<td nowrap="nowrap" bgcolor="aliceblue">說明</td>
				<td nowrap="nowrap" bgcolor="cornsilk">初審</td>
				<td nowrap="nowrap" bgcolor="cornsilk">刪減</td>
			</tr>
			<? print_item($table_name_item, 'p1', $main_seq);  // 顯示細項 ?>
		</table><p>

		<p>
		<hr>
		<p>

		二、個案家庭輔導<p>
		　　● 預計個案家庭輔導 <?=$s_p2_student;?> 人，每人訪視 2 至 4 次。<p>

		　　　學校申請：共
		<input type="text" size="1" name="s_p2_people" value="<?=$s_p2_people;?>" style="border:0px; text-align:center; background-color:aliceblue;" readonly> 人次，經費共計
		<input type="text" size="3" name="s_p2_money"  value="<?=$s_p2_money;?>"  style="border:0px; text-align:right;  background-color:aliceblue;" readonly> 元。<p>

		　　　縣市初審：共
		<input type="text" size="1" name="city_p2_people" value="<?=$city_p2_people;?>" style="text-align:center;" onChange="js:Count_family(this);" onkeyup="value=value.replace(/[^\d]/g,'')"> 人次，經費共計
		<input type="text" size="3" name="city_p2_money"  value="<?=$city_p2_money;?>"  style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元。<p>

		<p>
		<hr>
		<p>

		● 初審意見<p>
		　　<textarea name="city_desc" cols="55" rows="4"><?=$city_desc;?></textarea><p>

		<p>
		<hr>
		<p>

		● 學校相關資料<p>

		　● <a href="print_point_page.php?id=<?=$account;?>" target="_blank">指標界定調查紀錄表</a><p>

		　● 應上傳檔案<p>
		　　<? echo ($a1_1 == '' ? "<font color=red>[未上傳]</font> 親職教育講座實施計畫" : "<font color=blue>[已上傳]</font> <a href='".$file_path.$a1_1."' target='_new'>親職教育講座實施計畫</a> <img src='/edu/images/yes.png' align='absmiddle'>"); ?><p>
		　　<? echo ($a1_2 == '' ? "<font color=red>[未上傳]</font> 家庭訪視實施計畫"     : "<font color=blue>[已上傳]</font> <a href='".$file_path.$a1_2."' target='_new'>家庭訪視實施計畫</a> <img src='/edu/images/yes.png' align='absmiddle'>"); ?><p>

		　● 歷史資料<p>
		　　<a href="../105/effect_view_school_up_01.php?id=<?=$account;?>" target="_blank"><?=($school_year-1);?>年度 核定後資料與執行成果</a><p>
		　　<a href="../104/effect_view_school_up_01.php?id=<?=$account;?>" target="_blank"><?=($school_year-2);?>年度 核定後資料與執行成果</a><p>

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

		● 初審結果<p>
		　<input type="radio" name="city_approved" value="Y" id="city_approved_1" <?=(($city_approved == 'Y')?'checked':"");?>> <img src="/edu/images/yes.png" align="absmiddle"/> 審核通過<p>
		　<input type="radio" name="city_approved" value="N" id="city_approved_2" <?=(($city_approved == 'N')?'checked':"");?>> <img src="/edu/images/no.png" align="absmiddle"/> 審核不通過且列入退件名單<p>

		<p>
		<hr>
		<p>

		<input type="hidden" name="main_seq"    value="<?=$main_seq;?>">
		<input type="hidden" name="school_year" value="<?=$school_year;?>">
		<input type="submit" name="button"      value="　確認送出　">

		<script language="JavaScript">

			function toCheck()
			{
				/* 空值 */
				if ( document.form.city_p1_times.value == "" )
				{
					alert("請填寫縣市初審之親職教育活動場次。");
					document.form.city_p1_times.focus();
					return false;
				}
				if ( document.form.city_p2_people.value == "" )
				{
					alert("請填寫縣市初審之個案家庭輔導人次。");
					document.form.city_p2_people.focus();
					return false;
				}

				/* 逐項檢查 */
				var i;
				var j;
				for(i = 1; i <= 1 ; i++)  // 只有p1
				{
					for(j = 1; j < 10; j++)
					{
						var s_money    = document.getElementsByName('p' + i + '_s_money_'    + j)[0];  // 學校申請金額
						var city_money = document.getElementsByName('p' + i + '_city_money_' + j)[0];  // 縣市初審金額

						if(city_money.value != '' && parseInt(city_money.value) > parseInt(s_money.value))
						{
							alert('特色' + i + '項次 ' + j + ' 的初審金額不得超過學校申請金額。');
							return false;
						}
					}
				}

				/* 總額檢查 */

				var city_money = document.getElementsByName("city_total_money")[0];

				var s_money = <?=$s_total_money;?>;

				if(city_money.value != '' && parseInt(city_money.value) > parseInt(s_money))
				{
					alert('縣市初審金額不得超過學校申請金額。');
					return false;
				}

				if(document.getElementsByName("city_approved")[1].checked == true && document.form.city_desc.value == "")
				{
					alert('若審核不通過，請在審核意見說明原因。');
					return false;
				}

				return true;
			}

			/*
				1. 誤餐費、加班費應擇一編列
					(1) 誤餐費每場次最高補助 800 元
					(2) 加班費不能超過親職教育活動的金額 10%
				2. 講義文件費不超過【親職教育活動的金額 20%】或【參與人數每人 100 元】取其高

				其他：
				a. 金額只減不增，不必檢核總額
				b. 場地布置費學校端已檢查過了
			*/

			function Count(obj, item_idx)  // 逐項計算金額
			{						
				/* 取得控制項 */
				var p = left(obj.name, 2);
				var s_money     = document.getElementsByName(p + '_s_money_'     + item_idx)[0];
				var city_money  = document.getElementsByName(p + '_city_money_'  + item_idx)[0];
				var city_delete = document.getElementsByName(p + '_city_delete_' + item_idx)[0];

				var flag = 1;

				/* 未填資料自動回復 */
				switch (obj.name)
				{
					case city_money.name:
					{
						if(city_money.value == '')
						{
							city_money.value = s_money.value;
							city_delete.value = 0;
							flag = 0;
						}
						break;
					}
				}

				/* 計算刪減金額 */
				if(flag == 1)
				{
					city_delete.value = parseInt(s_money.value) - parseInt(city_money.value);
				}

				chkbox(obj);
			}

			function chkbox(obj)  // 計算雜支
			{				
				var p = left(obj.name, 2);
				var i;
				var total = 0;
				
				for(i = 1; i <= 10; i++)
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

			function Count_family(obj)  // 計算家庭訪視金額
			{
				var city_p2_people = document.getElementsByName("city_p2_people")[0];

				if (city_p2_people.value == "")  // 未填資料自動歸零
				{
					city_p2_people.value = 0;
				}

				document.getElementsByName("city_p2_money")[0].value = parseInt(city_p2_people.value) * 200;  // 每人次補助 200 元

				count_all();
			}

			function count_all()  // 計算總金額
			{
				
				var city_total_money = document.getElementsByName('city_total_money')[0]; //總金額

				city_total_money.value = 0;

				var city_p1_money = document.getElementsByName('city_p1_money')[0];  // 補一只有特色一的部分要計算細項

				city_p1_money.value = 0;

				for(j = 1; j <= 10; j++)  // 計算各特色細項
				{
					var city_money = document.getElementsByName('p1_city_money_' + j)[0];  // 金額

					if(city_money != null)
					{
						city_p1_money.value = parseInt(city_p1_money.value) + parseInt(city_money.value);
					}
				}

				var city_p2_money = document.getElementsByName('city_p2_money')[0];

				city_total_money.value = parseInt(city_p1_money.value) + parseInt(city_p2_money.value);
			}

			function left(mainStr,n)  // 取得左N位
			{
				return mainStr.substring(0, n);
			}
		</script>
	</form>
</body>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>


<?
/*
<?=($school_year-2);?>年度 <a href="../104/effect_school_01.php?id=<?=$account;?>" target="_blank">學校執行經費成果填報</a><p>
<?=($school_year-1);?>年度 <a href="../105/effect_school_01.php?id=<?=$account;?>" target="_blank">學校執行經費成果填報</a><p>
*/
?>
<?
/*
	// 符合指標
	for($i = 0;$i < count($accord_point_ary);$i++)
	{
		switch($accord_point_ary[$i])
		{
			case "p1_1":
				echo  '　'.'指標一～（一）'.'<p>';
				break;
			case "p1_2":
				echo  '　'.'指標一～（二）'.'<p>';
				break;
			case "p1_3":
				echo  '　'.'指標一～（三）'.'<p>';
				break;
			case "p1_4":
				echo  '　'.'指標一～（四）'.'<p>';
				break;
			case "p2_1":
				echo  '　'.'指標二～（一）'.'<p>';
				break;
			case "p2_2":
				echo  '　'.'指標二～（二）'.'<p>';
				break;
			case "p2_3":
				echo  '　'.'指標二～（三）'.'<p>';
				break;
 			case "p4_1":
				echo  '　'.'指標四～（一）'.'<p>';
				break;
			case "p5_1":
				echo  '　'.'指標五～（一）'.'<p>';
				break;
			case "p5_2":
				echo  '　'.'指標五～（二）'.'<p>';
				break;
			case "p5_3":
				echo  '　'.'指標五～（三）'.'<p>';
				break;
		}
	}
<div style="display:<?=($page3_warning == '')?'none':''; 　//　空白就不顯示?>;">
　　目標學生名冊：<? echo ($point2 == ''?"<font color=red>未上傳</font>":"<font color=blue>已上傳</font>，檔名：<a href='".$file_path2.$point2."' target='_new'>$point2</a>");?><p>
</div>
*/
?>