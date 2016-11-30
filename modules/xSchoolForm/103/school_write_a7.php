<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "../../function/checkdate.php";
		
	$school_year = 103; //為學年度

	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   //補七資料
		   "      , a7.p_num ".
		   "      , a7.s_total_money ".
		   "      , a7.s_p1_money ".
		   "      , a7.s_p1_current_cnt, a7.s_p1_current_money ".
		   "      , a7.s_p1_capital_cnt, a7.s_p1_capital_money ".
		   
		   "      , a7.year_85to91, a7.money_85to91 ".
		  		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join alc_school_activity as a7 on sy.seq_no = a7.sy_seq ".
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

		$main_seq = $row['seq_no'];  //school_year的seq_no
		$s_total_money = ($row['s_total_money'] == '')?0:$row['s_total_money']; //NULL則填入0
		
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
		
		
		$year_85to91 = $row['year_85to91']; //85~91的哪一年獲得補助，填寫年分，可不填
		$money_85to91 = $row['money_85to91']; //補助多少錢，可不填
			
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
		//補七沒有雜支選項!!
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

			//補七沒有經常門
			$s1 = array("","資本門");
			$s3 = array(""=>array("")
					 , "資本門"=>array("","設備購置","場地修繕","工程管理","學校管理","其他")
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
<form name="form" method="post" action="school_write_a7_finish.php"  onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><b>補助項目七：整修學校社區化活動場所</b>　<a href="/edu/modules/xSchoolForm/download/allowance-07.htm" target="_blank">(補助項目說明)</a>
<p>
<font color=blue>※補助整修學校社區化活動場所-申請補助經費：<input type="text" size="6" name="s_total_money" value="<?=$s_total_money;?>" style="border:0px; text-align: right;" readonly >
元 (本列自動計算)</font><br />
說明：<b><font color=red>本年度限申請補助綜合球場</font></b>，補助上限：修建40萬元，設備20萬元。<br />
<p>
※貴校曾於<input type="text" size="6" name="year_85to91" value="<?=$year_85to91;?>" >年度獲得本項補助<input type="text" size="6" name="money_85to91" value="<?=$money_85to91;?>" >元。
<p>
※申請補助綜合球場<input type="text" size="6" name="p_num" value="<?=$p_num;?>" >座
<p>
<table border="0">
	<tr>
		<td nowrap="nowrap" colspan="2"><font color=blue>※申請補助經費
		，計<input type="text" size="6" name="s_p1_money" value="<?=$s_p1_money;?>" style="border:0px; text-align: right;" readonly >元。</font></td>
	</tr>
	<tr>
		<td nowrap="nowrap" colspan="2">
		　其中包含<font color=blue>修建</font>經費<input type="text" size="6" name="s_p1_current_money" value="<?=$s_p1_current_money;?>" style="border:0px; text-align: right;" readonly >元，
		<font color=blue>設備</font>經費<input type="text" size="6" name="s_p1_capital_money" value="<?=$s_p1_capital_money;?>" style="border:0px; text-align: right;" readonly >元。
		</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
	<tr>
		<td colspan="9" align="left" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;">補助整修學校社區化活動場所經費概算：</td>
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
	//顯示 細項
	print_item('alc_school_activity_item', 'p1', $main_seq);
	
?>
</table>
<p>
<a href="/edu/modules/xSchoolForm/download/A1-1.推展親職教育活動實施計畫範本.doc" target="_new">下載：修整學校社區化活動場所計畫範本(供參考，可修改標題使用)</a><br />
說明：確認送出後，請於學校入口「上傳檔案專區」上傳「修整學校社區化活動場所計畫」。
<p>
<input type="hidden" name="main_seq" value="<?=$main_seq;?>">
<input type="hidden" name="school_year" value="<?=$school_year;?>">
<input type="button" value="上一頁(不儲存)" onClick="history.go(-1)" />
<input type="submit" name="button" value="儲存並回上一頁" />

<!-- 檢查空值 -->
<script language="JavaScript">
	function toCheck() 
	{
		
		if ( document.form.p_num.value == "" ) {
		alert("請填寫「申請補助綜合球場數量」！");
		document.form.p_num.focus();
		return false;
		}

		//數值檢核
		if ( document.form.s_p1_current_money.value > 400000 ) 
		{
			alert("綜合球場補助申請「修建」不得超過40萬元！");
			document.form.s_p1_current_money.focus();
			return false;
		}
		if ( document.form.s_p1_capital_money.value > 200000 ) 
		{
			alert("綜合球場補助申請「設備」不得超過20萬元！");
			document.form.s_p1_capital_money.focus();
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
					var opt_category = document.getElementById('p' + i + '_opt_category_' + j); //類別
					var s_money = document.getElementsByName('p' + i + '_s_money_' + j)[0]; //金額
					
					if(s_money.value != '' && opt_category.value != '設備購置') //修建 = current = 其他補助的經常門欄位
					{
						current_money += parseInt(s_money.value);
					}
					
					if(s_money.value != '' && opt_category.value == '設備購置') //設備 = capital = 其他補助的資本門欄位
					{
						capital_money += parseInt(s_money.value);
					}
				}
				
				s_p_money.value = parseInt(current_money) + parseInt(capital_money); //修建 + 設備
				s_p_current_money.value = current_money; //各特色的修建
				s_p_capital_money.value = capital_money; //各特色的設備
				
				s_total_money.value = parseInt(s_total_money.value) + parseInt(s_p_money.value); //所有特色的總和
			}
		}
		
	}
	
	//設定預設值
	function set_default() 
	{
		//補七沒預設
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