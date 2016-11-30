<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "checkdate.php";
		
	include "../../function/config_for_105.php"; //本年度基本設定

	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   //補四資料
		   "      , a4.s_total_money ".
		   "      , a4.apply_last3year ". //過去3年有無申請過 Y=有
		   "      , a4.s_p1_money ".
		   "      , a4.s_p1_current_cnt, a4.s_p1_current_money ".
		   "      , a4.s_p1_capital_cnt, a4.s_p1_capital_money ".
		   
		   "      , sf101.a5 ". //101補助5 金額(101的補助5=現在的補助4)
		   "      , sd102.a169 ". //102補助4 金額
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join alc_teaching_equipment as a4 on sy.seq_no = a4.sy_seq ".
		  
          //j10407，新增去(104)及前(103)年		  
		  //"                       left join alc_teaching_equipment as a4_ly on sy_ly.seq_no = a4_ly.sy_seq  and sy_ly.school_year = '".($school_year - 1)."' ".        //j10407
		  // "                       left join alc_teaching_equipment as a4_l2y on sy_l2y.seq_no = a4_l2y.sy_seq and sy_l2y.school_year = '".($school_year - 2)."' " .	    //j10407	   
		  
		   "                       left join 102schooldata as sd102 on sd.account = sd102.account ".    //102
		   "                       left join 101school_final as sf101 on sd.account = sf101.account ".  //101school_final
		   " where sy.school_year = '$school_year' ".
		   "   and sd.account = '$username' ";
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
		
		$student = $row['student'];
		$target_aboriginal = $row['target_aboriginal'];
		$target_no_aboriginal = $row['target_no_aboriginal'];
		$class_total = $row['class_total'];

		$main_seq = $row['seq_no']; //school_year的seq_no
		$s_total_money = ($row['s_total_money'] == '')?0:$row['s_total_money']; //NULL則填入0
		
		//$edu_p1_money; 
		
		$apply_last3year = $row['apply_last3year'];
		$s_p1_money = ($row['s_p1_money'] == '')?0:$row['s_p1_money']; //NULL則填入0
		$s_p1_current_cnt = ($row['s_p1_current_cnt'] == '')?0:$row['s_p1_current_cnt'];
		$s_p1_current_money = ($row['s_p1_current_money'] == '')?0:$row['s_p1_current_money'];
		$s_p1_capital_cnt = ($row['s_p1_capital_cnt'] == '')?0:$row['s_p1_capital_cnt'];
		$s_p1_capital_money = ($row['s_p1_capital_money'] == '')?0:$row['s_p1_capital_money'];
		
		//前三年補助金額，注意不是申請金額，是複審補助金額
		$money_last3 = ($row['a169'] == '')?0:$row['a169'];     //j10407，換成102資料，拿掉101年資料($row['a5'] == '')?0:$row['a5'];
		$money_last2 =                                          //j10407，換成103
		$money_last =                                           //j10407，換成104
		
		//三年內接受補助過補助的不能再申請
		$disable_radio = "";
		$strmsg = "";
		//echo "<br />".$money_last3 . "/" . $money_last2 . "/" .$money_last."<br />";
		if($money_last > 0 || $money_last2 > 0 || $money_last3 > 0) 
		{
			$apply_last3year = 'Y';
			$disable_radio = "js:return false;"; //用javascript停用，如果用disabled會無法POST
			
			$strmsg = "貴校曾於 ";
			$strmsg .= ($money_last > 0)?($school_year - 1)." 年度獲得補助 <font color='red'>".$money_last."</font> 元。":"";
			$strmsg .= ($money_last2 > 0)?($school_year - 2)." 年度獲得補助 <font color='red'>".$money_last2."</font> 元。":"";
			$strmsg .= ($money_last3 > 0)?($school_year - 3)." 年度獲得補助 <font color='red'>".$money_last3."</font> 元。":"";
			
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
		//echo "<br />".$sql."<br />";
		$result = mysql_query($sql);
		$num_rows = mysql_num_rows($result); //列數
	
		$has_outlay = 0; //有無雜支項目
		$idx = 0;
		
		//順序：顯示已填資料 -> 補滿9項(未滿9時補上空值) -> 顯示雜支
		//補四沒有雜支選項!!
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

			$s1 = array("","經常門","資本門");
			$s3 = array(""=>array("")
					 , "經常門"=>array("","電腦及周邊器材","攝影及音訊器材","音樂及美術器材","行政事務用品","教學用品","運動器材","其他")
					 , "資本門"=>array("","電腦及周邊器材","攝影及音訊器材","音樂及美術器材","行政事務用品","教學用品","運動器材","其他")
						);

			$idx++;
			
			//name 或 id 最後格式為 p1_xxx_1, p1=特色一(p2為二), xxx=名稱(ex.subject=科目、category=類別), 最後一位數字表示項次，每個特色有1~10
			echo "<tr>";
			echo "<td width='10' align='center' nowrap='nowrap'>$idx.<input type='hidden' name='".$p."_seq_no_$idx' value='$seq_no'></td>";
			echo "<td align='left'>"; //科目
			echo "<select name='".$p."_subject_$idx' id='".$p."_opt_subject_$idx' size='1' onChange='js:change_subject(this,$idx,1);'>";
			for($j = 0;$j < count($s1);$j++)
			{
				echo "	<option ".($subject == $s1[$j]?"selected":"")." >".$s1[$j]."</option>";
			}
			echo "</select></td>";
			echo "<td align='left'>"; //類別
			echo "<select name='".$p."_category_$idx' id='".$p."_opt_category_$idx' size='1' onChange='js:Count(this,$idx);' >";
			for($j = 0;$j < count($s3[$subject]);$j++)
			{
				echo "	<option ".($category == $s3[$subject][$j]?"selected":"")." >".$s3[$subject][$j]."</option>";
			}
			echo "</select></td>";
			echo "<td align='left'><input type='text' size='10' name='".$p."_item_$idx' value='$item' onchange='js:Count(this,$idx);' ></td>";
			echo "<td align='left'><input type='text' size='2' name='".$p."_unit_$idx' value='$unit' onchange='js:Count(this,$idx);' ></td>";
			echo "<td align='left'><input type='text' size='4' name='".$p."_price_$idx' value='$price' onchange='js:Count(this,$idx);' ></td>";
			echo "<td align='left'><input type='text' size='2' name='".$p."_amount_$idx' value='$amount' onchange='js:Count(this,$idx);' ></td>";
			echo "<td align='left'><input type='text' size='4' name='".$p."_s_money_$idx' value='$s_money' style='border:0px; text-align: left;' readonly ></td>";
			echo "<td align='left'><input type='text' size='6' name='".$p."_s_desc_$idx' value='$s_desc' ></td>";
			echo "</tr>";
		
		}
		
		//補滿10項
		for($i = $num_rows+1;$i <= 10;$i++)
		{		
			echo "<tr>";
			echo "<td width='10' align='center' nowrap='nowrap'>$i.<input type='hidden' name='".$p."_seq_no_$i' value=''></td>";
			echo "<td align='left'>"; //科目
			echo "<select name='".$p."_subject_$i' id='".$p."_opt_subject_$i' size='1' onChange='js:change_subject(this,$i,1);'>";
			echo "	<option selected></option>";
			echo "	<option>經常門</option>";
			echo "	<option>資本門</option>";
			echo "</select></td>";
			echo "<td align='left'>"; //類別
			echo "<select name='".$p."_category_$i' id='".$p."_opt_category_$i' size='1' onChange='js:Count(this,$i);' >";
			echo "	<option selected></option>";
			echo "</select></td>";
			echo "<td align='left'><input type='text' size='10' name='".$p."_item_$i' value='' onchange='js:Count(this,$i);' ></td>";
			echo "<td align='left'><input type='text' size='2' name='".$p."_unit_$i' value='' onchange='js:Count(this,$i);' ></td>";
			echo "<td align='left'><input type='text' size='4' name='".$p."_price_$i' value='' onchange='js:Count(this,$i);' ></td>";
			echo "<td align='left'><input type='text' size='2' name='".$p."_amount_$i' value='' onchange='js:Count(this,$i);' ></td>";
			echo "<td align='left'><input type='text' size='4' name='".$p."_s_money_$i' value='' style='border:0px; text-align: left;' readonly ></td>";
			echo "<td align='left'><input type='text' size='6' name='".$p."_s_desc_$i' value='' ></td>";
			echo "</tr>";
		}
		
	}
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body onload="set_default()"> 
<form name="form" method="post" action="school_write_a4_finish.php"  onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><b>補助項目四：充實學校基本教學設備</b>　<a href="allowance-04.htm" target="_blank">(補助項目說明)</a>
<p>
<font color=blue>※補助充實學校基本設備-申請補助經費：<input type="text" size="6" name="s_total_money" value="<?=$s_total_money;?>" style="border:0px; text-align: right;" readonly >
元 (本列自動計算)</font><br />
說明：6班以下最高補助10萬元，7至12班最高補助15萬元，13班以上最高補助20萬元。<br />
貴校班級數：<?=$class_total;?>班
<p>
<!--
※最近三年是否曾獲本項補助：<font color="blue"><?=$strmsg;?></font><br />
　<label><input type="radio" name="rdo_last3year" value="Y" id="rdo_last3year_0" onclick="<?=$disable_radio;?>" <?=($apply_last3year == 'Y')?'checked':'';?> />是</label>(102、103、104年度已接受本項補助者，不得再提出申請)<br />
　<label><input type="radio" name="rdo_last3year" value="N" id="rdo_last3year_1" onclick="<?=$disable_radio;?>" <?=($apply_last3year == 'N')?'checked':'';?> />否</label>
-->
<p>
<table border="0">
	<tr>
		<td nowrap="nowrap" colspan="2"><font color=blue>※申請補助經費
		，共計<input type="text" size="6" name="s_p1_money" value="<?=$s_p1_money;?>" style="border:0px; text-align: right;" readonly >元。</font></td>
	</tr>
	<tr>
		<td nowrap="nowrap" colspan="2">
			　其中包含經常門經費<input type="text" size="6" name="s_p1_current_money" value="<?=$s_p1_current_money;?>" style="border:0px; text-align: right;" readonly >元，
			資本門經費<input type="text" size="6" name="s_p1_capital_money" value="<?=$s_p1_capital_money;?>" style="border:0px; text-align: right;" readonly >元。
		</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
	<tr>
		<td colspan="9" align="left" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;">補助充實學校基本設備經費概算：</td>
		</tr>
	<tr>
		<td width="10px" align="center" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
		<td align="center" nowrap="nowrap" bgcolor="#99CCCC">科目</td>
		<td align="center" nowrap="nowrap" bgcolor="#99CCCC">類別</td>
		<td align="center" nowrap="nowrap" bgcolor="#99CCCC">項目</td>
		<td align="center" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
		<td align="center" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
		<td align="center" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
		<td align="center" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
		<td align="center" nowrap="nowrap" bgcolor="#99CCCC">說明</td>
	</tr>
<?
	//顯示教師宿舍	細項
	print_item('alc_teaching_equipment_item', 'p1', $main_seq);
	
?>
</table>
<p>
說明：確認送出後，請於學校入口「上傳檔案專區」上傳「實施計畫」與「領域小組會議紀錄」檔案。
<p>
<input type="hidden" name="main_seq" value="<?=$main_seq;?>">
<input type="hidden" name="school_year" value="<?=$school_year;?>">
<input type="button" value="上一頁(不儲存)" onClick="history.go(-1)" />
<input type="submit" name="button" value="儲存並回上一頁" />
  
<!-- 檢查空值 -->
<script language="JavaScript">
	//檢查輸入值
	function toCheck() 
	{
		//檢查是否勾選補助	  
		if ( document.form.rdo_last3year[0].checked ) 
		{
			var allowance = 1;
		} 
		else if ( document.form.rdo_last3year[1].checked )
		{
			var allowance = 0;
		} 
		else 
		{
			alert("請填寫「是否曾獲本項補助」！");
			return false;
		}
		
		//數值檢核
		if (<?=$class_total;?> < 7 && document.form.s_total_money.value > 100000) 
		{
			alert('6班以下申請經費不得大於10萬元！\n'+'貴校班數：'+<?=$class_total;?>);
			return false;
		} 
		else if (<?=$class_total;?> < 13 && document.form.s_total_money.value > 150000) 
		{
			alert('7-12班申請經費不得大於15萬元！\n'+'貴校班數：'+<?=$class_total;?>);
			
		} 
		else if ( document.form.s_total_money.value > 200000) 
		{
			alert('13班以上申請經費不得大於20萬元！\n'+'貴校班數：'+<?=$class_total;?>);
			return false;
		}

		return true;
	}
	
	//計算單一項目的金額
	function Count(obj, item_idx) 
	{
		//alert(obj.name);
		//取得控制項
		var p = left(obj.name, 2);
		var opt_subject = document.getElementById(p + '_opt_subject_' + item_idx); //科目
		var opt_category = document.getElementById(p + '_opt_category_' + item_idx); //類別
		var item = document.getElementsByName(p + '_item_' + item_idx)[0]; //項目
		var unit = document.getElementsByName(p + '_unit_' + item_idx)[0]; //單位
		var price = document.getElementsByName(p + '_price_' + item_idx)[0]; //單價
		var amount = document.getElementsByName(p + '_amount_' + item_idx)[0]; //數量
		var s_money = document.getElementsByName(p + '_s_money_' + item_idx)[0]; //金額
			
		//驗證輸入的資料是否為數字 
		var regex = /^[0-9]*$/;
		var flag = 1;
		
		//驗證分成兩部分
		//1.填寫 科目 類別 項目 單位
		//2.填寫 單價 數量
		switch (obj.name)
		{
			case opt_subject.name: //資本門時才需驗證
				if(opt_subject.value == '資本門' && regex.test(price.value) && price.value < 10000 && price.value != '')
				{
					alert('資本門的「單價」需為一萬元以上。'); 
					price.value = '';
					s_money.value = '';
					flag = 0;
				}
			case opt_category.name:
			case item.name:
			case unit.name:
				//6個欄位有一個為空值就不計算
				if(opt_subject.value == '' || opt_category.value == '' || item.value == '' || unit.value == '' || amount.value == '' || price.value == '')
				{
					s_money.value = ''; //清空金額欄位
					flag = 0;
				}
				
				break;
				
			case price.name:
			case amount.name:
				if (!(regex.test(price.value)))
				{
					alert('「單價」請輸入整數。');
					price.value = '';
					s_money.value = '';
					price.focus();
					flag = 0;
				}
				if(opt_subject.value == '資本門' && regex.test(price.value) && price.value < 10000 && price.value != '')
				{
					alert('資本門的「單價」需為一萬元以上。'); 
					price.value = "";
					s_money.value = '';
					flag = 0;
				}
			
				if (!(regex.test(amount.value)))
				{
					alert('「數量」請輸入整數。');
					amount.value = '';
					s_money.value = '';
					amount.focus();
					flag = 0;
				}				
				if(amount.value == '' || price.value == '') //空白時不計算 不顯訊息
				{
					s_money.value = '';
					flag = 0;
				}
				if(opt_subject.value == '' || opt_category.value == '' || item.value == '' || unit.value == '')
				{
					s_money.value = ''; //清空金額欄位
					flag = 0;
				
					if(price.value != '' && amount.value != '') //單價 數量 都有填才顯示警告訊息
						alert('「科目」、「類別」、「項目」、「單位」不能為空白。');
				}
				
				break;
		}
		
		if(flag == 1)
			s_money.value = parseInt(price.value) * parseInt(amount.value); //單價 * 數量
		
		//計算總金額
		count_all()
		
	}
	
	//計算總金額
	function count_all()
	{
		var s_total_money = document.getElementsByName('s_total_money')[0]; //總金額
		var i;
		
		s_total_money.value = 0;
		
		for(i = 1;i < 10;i++)
		{
			var s_p_money = document.getElementsByName('s_p' + i + '_money')[0]; //ex.s_p1_money ,s_p2_money
			var s_p_current_money = document.getElementsByName('s_p' + i + '_current_money')[0]; //ex.s_p1_current_money
			var s_p_capital_money = document.getElementsByName('s_p' + i + '_capital_money')[0]; //ex.s_p1_capital_money
			//alert(s_p_money.name);
			if(s_p_money != null)
			{
				var current_money = 0;
				var capital_money = 0;
				
				for(j = 1;j <= 10;j++) //計算各特色經常 & 資本
				{
					var opt_subject = document.getElementById('p' + i + '_opt_subject_' + j); //科目
					var s_money = document.getElementsByName('p' + i + '_s_money_' + j)[0]; //金額
					
					if(s_money.value != '' && opt_subject.value == '經常門')
					{
						current_money += parseInt(s_money.value);
					}
					
					if(s_money.value != '' && opt_subject.value == '資本門')
					{
						capital_money += parseInt(s_money.value);
					}
				}
				
				s_p_money.value = parseInt(current_money) + parseInt(capital_money); //各特色的經常 + 資本
				s_p_current_money.value = current_money; //各特色的經常門金額
				s_p_capital_money.value = capital_money; //各特色的資本門金額
				
				s_total_money.value = parseInt(s_total_money.value) + parseInt(s_p_money.value); //所有特色的總和
			}
		}
		
	}
	
	//設定預設值
	function set_default() 
	{
		//補四沒預設
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
			NewOpt[1] = new Option("電腦及周邊器材");
			NewOpt[2] = new Option("攝影及音訊器材");
			NewOpt[3] = new Option("音樂及美術器材");
			NewOpt[4] = new Option("行政事務用品");
			NewOpt[5] = new Option("教學用品");
			NewOpt[6] = new Option("運動器材");
			NewOpt[7] = new Option("其他");
		}

		if (selectName == "資本門"){
			NewOpt[0] = new Option("");
			NewOpt[1] = new Option("電腦及周邊器材");
			NewOpt[2] = new Option("攝影及音訊器材");
			NewOpt[3] = new Option("音樂及美術器材");
			NewOpt[4] = new Option("行政事務用品");
			NewOpt[5] = new Option("教學用品");
			NewOpt[6] = new Option("運動器材");
			NewOpt[7] = new Option("其他");
		}

		newnum = NewOpt.length;
		
		var p = left(obj.id,3); //取得p1_ or p2_
		
		var opt_category = document.getElementById(p + 'opt_category_' + idx)

		// 清除之前下拉選單中的項目
		opt_category.options.length = 0;
		
		// 加入新選類別的項目
		for (i = 0; i < newnum; i++) opt_category.options[i] = NewOpt[i];

		opt_category.options[0].selected = true;
		
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