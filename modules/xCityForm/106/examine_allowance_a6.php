<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	include "checkdate_city.php";

	include "../../function/config_for_106.php";  // 本年度基本設定
	
	$account = ($_POST['account'] == '')?$_GET['id']:$_POST['account'];  // 取回傳遞來的學校編號，get為測試用
	
	$table_name = 'alc_school_activity';
	$table_name_item = $table_name.'_item';
	$a_num = 'a6';

	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   //補六資料
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
		$area = $row['area'];
		
		$student = $row['student'];
		$target_aboriginal = $row['target_aboriginal'];
		$target_no_aboriginal = $row['target_no_aboriginal'];
		$class_total = $row['class_total'];
		
		$main_seq = $row['seq_no']; //school_year的seq_no
		$p_num = $row['p_num'];
		
		$s_total_money = ($row['s_total_money'] == '')?0:$row['s_total_money']; //NULL則填入0
		$s_p1_money = ($row['s_p1_money'] == '')?0:$row['s_p1_money']; //NULL則填入0
		$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
		$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];
		
		$city_total_money = ($row['city_total_money'] == '')?$s_total_money:$row['city_total_money']; //NULL則填入學校資料
		$city_p1_money = ($row['city_p1_money'] == '')?$s_p1_money:$row['city_p1_money']; 
		$city_p1_current_money = ($row['city_p1_current_money'] == '')?$s_p1_current_money:$row['city_p1_current_money'];
		$city_p1_capital_money = ($row['city_p1_capital_money'] == '')?$s_p1_capital_money:$row['city_p1_capital_money'];
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

		$idx = 0;

		//沒有雜支選項!!
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
			$city_money = ($row['city_money'] == '')?$s_money:$row['city_money'];

			//修正加總錯誤
			if($city_money > $s_money)
				$city_money = $s_money;
			$city_delete = $s_money - $city_money;

			//補六沒有經常門
			$s1 = array("","資本門");
			$s3 = array(""=>array("")
					 , "資本門"=>array("","設備購置","場地修繕","工程管理","學校管理","其他")
						);
			

			$idx++;

			echo "<tr height='30px' style='font-size:13px;'>";

				// 序號、類別、項目、單位、單價、數量、金額、說明
				echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>$idx      <input type='hidden' name='".$p."_seq_no_$idx'   value='$seq_no'>  </td>";
				echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>          <input type='text'   name='".$p."_subject_$idx'  value='$subject' size='2' style='border:0px; text-align:right; background-color:aliceblue;' readonly></td>";
				echo "<td nowrap='nowrap'                bgcolor='aliceblue'>$category <input type='hidden' name='".$p."_category_$idx' value='$category'></td>";
				echo "<td nowrap='nowrap'                bgcolor='aliceblue'>$item     <input type='hidden' name='".$p."_item_$idx'     value='$item'>    </td>";
				echo "<td nowrap='nowrap' align='center' bgcolor='aliceblue'>$unit     <input type='hidden' name='".$p."_unit_$idx'     value='$unit'>    </td>";
				echo "<td nowrap='nowrap' align='right'  bgcolor='aliceblue'>$price    <input type='hidden' name='".$p."_price_$idx'    value='$price'>   </td>";
				echo "<td nowrap='nowrap' align='right'  bgcolor='aliceblue'>$amount   <input type='hidden' name='".$p."_amount_$idx'   value='$amount'>  </td>";
				echo "<td nowrap='nowrap' align='right'  bgcolor='aliceblue'>$s_money  <input type='hidden' name='".$p."_s_money_$idx'  value='$s_money'> </td>";
				echo "<td nowrap='nowrap'                bgcolor='aliceblue'>$s_desc                                                                      </td>";

				// 初審金額、刪減金額
				echo "<td nowrap='nowrap' align='center' bgcolor='cornsilk'><input type='text' size='3' name='".$p."_city_money_$idx'  value='$city_money'  style='text-align:right;' onkeyup=value=value.replace(/[^\d]/g,'') onChange='js:Count(this,$idx);'></td>";
				echo "<td nowrap='nowrap' align='center' bgcolor='cornsilk'><input type='text' size='3' name='".$p."_city_delete_$idx' value='$city_delete' style='border:0px; text-align:right; background-color:cornsilk;' readonly></td>";
			echo "</tr>";
		}
	}
	
	$sql = "select * from school_upload_name where sy_seq = '$main_seq' ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$point2 = $row['point2'];
		$lastyear_leaving_file = $row['lastyear_leaving_file'];
		$a6_1 = $row['a6_1'];
	}

	$file_path = '/epa_uploads/'.$school_year.'/pub/'.$account.'/';
	$file_path2 = '/epa_uploads/'.$school_year.'/pri/'.$account.'/';
?><p>

<a href="a6_examine_table.php">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

審核補助項目 / 補助項目六：整修學校社區化活動場所 / <b>審核</b>

<p>
<hr>
<p>

<body onload="set_default()">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<form name="form" method="post" action="examine_allowance_a6_finish.php" onSubmit="return toCheck();">

		● <a href="/edu_dl/<?=$school_year;?>/allowance-06.pdf" target="_blank"><b><u>補助項目說明</u></b></a><p>

		● 學校名稱：<font color=blue><?=($account.' '.$district.$schoolname);?></font><p>

		<b>● 經費合計</b><p>

		　　● 學校申請金額：
		<input type="text" size="3" name="s_total_money" value="<?=$s_total_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（修建
		<input type="text" size="3" name="s_p1_current_money" value="<?=$s_p1_current_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，設備
		<input type="text" size="3" name="s_p1_capital_money" value="<?=$s_p1_capital_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。
		<p>
		
		　　<img src="/edu/images/calculator.png" align="absmiddle" /><font color=blue>	縣市初審金額</font>：
		<input type="text" size="3" name="city_total_money" value="<?=$city_total_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（修建
		<input type="text" size="3" name="city_p1_current_money" value="<?=$city_p1_current_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，設備
		<input type="text" size="3" name="city_p1_capital_money" value="<?=$city_p1_capital_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元）。
		<p>

		<input type="hidden" name="s_p1_money"    value=<?=$s_p1_money;?>>     <? // 學校申請總金額，只有一項p1即總金額 ?>
		<input type="hidden" name="city_p1_money" value=<?=$city_p1_money;?>>  <? // 縣市初審總金額，只有一項p1即總金額 ?>
		
		<p>
		<hr>
		<p>
		
		● 申請補助綜合球場 <?=$p_num;?> 座<p>

		　　充實學校基本教學設備概算表：<p>

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
			<? print_item($table_name_item, 'p1', $main_seq); //顯示細項 ?>
		</table><p>
		
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
		　　<? echo ($a6_1 == '' ? "<font color=red>[未上傳]</font> 實施計畫" : "<font color=blue>[已上傳]</font> <a href='".$file_path.$a6_1."' target='_new'>實施計畫</a> <img src='/edu/images/yes.png' align='absmiddle'>"); ?><p>

		　● 歷史資料<p> <?  // 106年的補助六 = 105、104年的補助七 ?>
		　　<a href="../105/effect_view_school_up_07.php?id=<?=$account;?>" target="_blank"><?=($school_year-1);?>年度 核定後資料與執行成果</a><p>
		　　<a href="../104/effect_view_school_up_07.php?id=<?=$account;?>" target="_blank"><?=($school_year-2);?>年度 核定後資料與執行成果</a><p>

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
				/* 逐項檢查 */

				for(j = 1; j <= 10; j++)
				{
					var subject    = document.getElementsByName('p1' + '_subject_'    + j)[0];  // 科目
					var category   = document.getElementsByName('p1' + '_category_'   + j)[0];  // 類別
					var city_money = document.getElementsByName('p1' + '_city_money_' + j)[0];  // 金額
					var s_money    = document.getElementsByName('p1' + '_s_money_'    + j)[0];  // 金額

					if(subject != null)
					{
						if(subject.value == '' || category.value == '' || city_money.value == '')
						{
							alert('項次「' + j + '」的資料未填寫完成！');
							return false;
						}

						if(city_money.value != '' && parseInt(city_money.value) > parseInt(s_money.value))
						{
							alert('項次「' + j + '」的初審金額不可大於學校申請金額！');
							return false;
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
				var p = left(obj.name, 2);
				var subject     = document.getElementsByName(p + '_subject_'     + item_idx)[0]; // 科目
				var price       = document.getElementsByName(p + '_price_'       + item_idx)[0]; // 單價
				var s_money     = document.getElementsByName(p + '_s_money_'     + item_idx)[0]; // 學校申請
				var city_money  = document.getElementsByName(p + '_city_money_'  + item_idx)[0]; // 縣市初審
				var city_delete = document.getElementsByName(p + '_city_delete_' + item_idx)[0]; // 縣市刪減

				switch (obj.name)
				{
					case city_money.name:
					{
						if(parseInt(city_money.value) < 10000)
						{
							alert("資本門經費不得低於1萬元。");
							city_money.value = s_money.value;
							city_delete.value = 0;
							flag = 0;
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

				count_all();				
			}
			
			
			function chkbox(obj)  // 計算雜支
			{
				// 空
			}
			
			//計算總金額
			function count_all()
			{
				var city_total_money = document.getElementsByName('city_total_money')[0]; //總金額
				var i;

				city_total_money.value = 0;

				for(i = 1; i < 10; i++)
				{
					var city_p_money         = document.getElementsByName('city_p' + i + '_money')[0];         //ex.city_p1_money ,city_p2_money
					var city_p_current_money = document.getElementsByName('city_p' + i + '_current_money')[0]; //ex.city_p1_current_money
					var city_p_capital_money = document.getElementsByName('city_p' + i + '_capital_money')[0]; //ex.city_p1_capital_money

					if(city_p_money != null)
					{
						var current_money = 0;
						var capital_money = 0;
						
						
						for(j = 1; j <= 10; j++)  // 計算各特色經常 & 資本
						{
							var subject    = document.getElementsByName('p' + i + '_subject_'    + j)[0];  // 科目
							var category   = document.getElementsByName('p' + i + '_category_'   + j)[0];  // 類別
							var city_money = document.getElementsByName('p' + i + '_city_money_' + j)[0];  // 金額

							if(subject != null)
							{
								if(city_money.value != '' && category.value != '設備購置') //修建(非設備購置) = current = 其他補助的經常門欄位
								{
									current_money += parseInt(city_money.value);
								}

								if(city_money.value != '' && category.value == '設備購置') //設備(是設備購置) = capital = 其他補助的資本門欄位
								{
									capital_money += parseInt(city_money.value);
								}
							}
						}

						city_p_money.value = parseInt(current_money) + parseInt(capital_money);  // 各特色的經常 + 資本
						city_p_current_money.value = current_money;  // 各特色的經常門金額
						city_p_capital_money.value = capital_money;  // 各特色的資本門金額
						city_total_money.value = parseInt(city_total_money.value) + parseInt(city_p_money.value);  // 所有特色的總和
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
				
				var city_p2_money = document.getElementsByName('city_p2_money')[0]; 
				if (city_p2_money != null)
				{
					chkbox(city_p2_money);
				}
			}
			
			//設定下拉選單
			function change_subject(obj, idx, YN)
			{
				var selectName=obj.options[obj.selectedIndex].text;
				NewOpt = new Array;

				if (selectName == ""){
					NewOpt[0] = new Option("");
				}

				if (selectName == "經常門")	{
					NewOpt[0] = new Option("");
				}

				if (selectName == "資本門"){
					NewOpt[0] = new Option("");
					NewOpt[1] = new Option("設備購置");
					NewOpt[2] = new Option("場地修繕");
					NewOpt[3] = new Option("工程管理");
					NewOpt[4] = new Option("學校管理");
					NewOpt[5] = new Option("其他");
				}

				newnum = NewOpt.length;
				
				var p = left(obj.id,3); //取得p1_ or p2_
				
				var category = document.getElementById(p + 'category_' + idx)

				// 清除之前下拉選單中的項目
				category.options.length = 0;
				
				// 加入新選類別的項目
				for (i = 0; i < newnum; i++) category.options[i] = NewOpt[i];

				category.options[0].selected = true;
				
				//page load 時不計算總金額
				if(YN == '1')
					Count(obj, idx); //變換項目後計算總金額
			}
				
			//取得左N位
			function left(mainStr,n) 
			{ 
				return mainStr.substring(0,n);
			} 
			
			// 左邊補0
			function padLeft(str,lenght)
			{
				if(str.length >= lenght)
					return str;
				else
					return padLeft("0" + str,lenght);
			}
			
		</script>
	</form>
</body>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?> 

<?
/*
<b>※符合指標：</b><a href="print_point_page.php?id=<?=$account;?>" target="_blank">點此查看詳細資料</a><br />
<? 
	//符合指標
	for($i = 0;$i < count($accord_point_ary);$i++)
	{
		switch($accord_point_ary[$i])
		{
			case "p1_1":
				echo  '　　　'.'指標一～（一）'.'<br />';
				break;
			case "p1_2":
				echo  '　　　'.'指標一～（二）'.'<br />';
				break;
			case "p1_3":
				echo  '　　　'.'指標一～（三）'.'<br />';
				break;
			case "p1_4":
				echo  '　　　'.'指標一～（四）'.'<br />';
				break;
			case "p2_1":
				echo  '　　　'.'指標二～（一）'.'<br />';
				break;
			case "p2_2":
				echo  '　　　'.'指標二～（二）'.'<br />';
				break;
			case "p2_3":
				echo  '　　　'.'指標二～（三）'.'<br />';
				break;
			case "p4_1":
				echo  '　　　'.'指標四～（一）'.'<br />';
				break;
		}
	}	
?>
*/
?>