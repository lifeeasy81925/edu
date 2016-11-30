<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "../../function/checkdate.php";
	
	$school_year = 103; //為學年度

	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   //補一資料
		   "      , a1.s_total_money ".
		   "      , a1.s_p1_times, a1.s_p1_people, a1.s_p1_money ".
		   "      , a1.s_p2_people, a1.s_p2_money ".
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join alc_parenting_education as a1 on sy.seq_no = a1.sy_seq ".
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
		$s_p1_times = $row['s_p1_times'];
		$s_p1_people = $row['s_p1_people'];
		$s_p1_money = ($row['s_p1_money'] == '')?0:$row['s_p1_money'];
		$s_p2_people = $row['s_p2_people'];
		$s_p2_money = ($row['s_p2_money'] == '')?0:$row['s_p2_money'];
			
	}
	
	//顯示填寫的資料
	//allowance_table_name => 各補助細項的 table name ex.alc_education_features_item
	//p => 特色 ex.p1 p2
	//main_seq => 各補助的 sy_seq.alc_education_features 的 sy_seq (注意!!不是 _item 的 seq_no)
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

			$s1 = array("","經常門");
			$s3 = array(""=>array("")
					 , "經常門"=>array("","鐘點費","鐘點費(含補充保費)","場地費","誤餐費","講義文件費","加班費","其他")
					 , "資本門"=>array("") //補一沒資本門
						);
									
			if($category != '雜支')
			{
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
			else
			{
				$has_outlay = 1;
				
				$outlay_seq_no = $row['seq_no'];
				$outlay_subject = $row['subject'];
				$outlay_category = $row['category'];
				$outlay_item = $row['item'];
				$outlay_s_money = $row['s_money'];
				$outlay_s_desc = $row['s_desc'];
			}
		}
		
		//補滿9項
		for($i = ($num_rows+1-$has_outlay);$i < 10;$i++)
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
		
		if($has_outlay != 1) //如果沒有雜支，把項目清空
		{
			$outlay_seq_no = '';
			$outlay_subject = '經常門';
			$outlay_category = '雜支';
			$outlay_item = '';
			$outlay_s_money = '';
			$outlay_s_desc = '';
		}
		
		//顯示雜支
		echo "<tr>";
		echo "<td width='10' align='center' nowrap='nowrap'>10.<input type='hidden' name='".$p."_seq_no_10' value='$outlay_seq_no'></td>";
		echo "<td align='left'>"; //科目
		echo "<select name='".$p."_subject_10' id='".$p."_opt_subject_10' size='1' >";
		echo "	<option selected>$outlay_subject</option>";
		echo "</select></td>";
		echo "<td align='left'>"; //類別
		echo "<select name='".$p."_category_10' id='".$p."_opt_category_10' size='1' >";
		echo "	<option selected>$outlay_category</option>";
		echo "</select></td>";
		echo "<td align='left'><input type='checkbox' name='".$p."_item_10' value='Y' onclick='js:chkbox(this);' ".(($outlay_item == 'Y')?"checked":"")." >申請雜支</td>";
		echo "<td align='left'><input type='text' size='2' name='".$p."_unit_10' value='' style='border:0px; text-align: left;' readonly ></td>";
		echo "<td align='left'><input type='text' size='4' name='".$p."_price_10' value='' style='border:0px; text-align: left;' readonly ></td>";
		echo "<td align='left'><input type='text' size='2' name='".$p."_amount_10' value='' style='border:0px; text-align: left;' readonly ></td>";
		echo "<td align='left'><input type='text' size='4' name='".$p."_s_money_10' value='$outlay_s_money' style='border:0px; text-align: left;' readonly ></td>";
		echo "<td align='left'><input type='text' size='6' name='".$p."_s_desc_10' value='$outlay_s_desc' ></td>";
		echo "</tr>";
	}

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body onload="set_default()"> 
<form name="form" method="post" action="school_write_a1_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><b>補助項目一：推展親職教育活動</b>　<a href="/edu/modules/xSchoolForm/download/allowance-01.htm" target="_blank">(補助項目說明)</a>
<p>
<font color=blue>※親職教育-申請補助經費：<input type="text" size="6" name="s_total_money" value="<?=$s_total_money;?>" style="border:0px; text-align: right;" readonly >元。(本列自動產生)</font><br />
說明：本項目最高補助7萬元<br />
親職講座：最高補助2萬元(每場最高補助1萬元)，並以目標學生家長為主要對象；<br />
家庭訪視：補助經費為每人次200元，以目標學生中有學習適應困難或特殊行為<br />
　　　　　之者為主要對象，且應擬具個案家庭輔導方案，每學期需輔導1~2次。
<p>
<strong>※親職講座</strong><br />
•預計辦理親職講座<input type="text" size="2" name="s_p1_times" value="<?=$s_p1_times;?>"/>
場，參加人數<input type="text" size="3" name="s_p1_people" value="<?=$s_p1_people;?>"/>人，<font color=blue>申請補助經費<input type="text" size="5" name="s_p1_money" value="<?=$s_p1_money;?>" style="border:0px; text-align: right;" readonly >元</font>。
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
  <tr>
    <td colspan="9" align="left" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;">親職講座經費概算：</td>
    </tr>
  <tr>
    <td width="10" align="left" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">科目</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">類別</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">項目</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">金額<br />
      (自動產生)</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">說明</td>
  </tr>
<?
	//顯示特色一 細項
	print_item('alc_parenting_education_item', 'p1', $main_seq);
	
?>
</table>
<br />
<strong>※家庭訪視</strong><br />
•預計申請個別家庭訪視<input type="text" size="3" name="s_p2_people" onchange="js:Count_family(this);" value="<?=$s_p2_people;?>"/>人次，
<font color=blue>申請輔助經費<input type="text" size="5" name="s_p2_money" value="<?=$s_p2_money;?>" style="border:0px; text-align: right;" readonly >元(200元/人)</font>。<br />
<p>
下載：<a href="/edu/modules/xSchoolForm/download/A0-1空白計畫範本.doc" target="_new">空白計畫範本</a><br />
說明：確認送出後，請於學校入口「上傳檔案專區」上傳「推展親職教育活動實施計畫」與「家庭訪視實施計畫」檔案。
<p>
<input type="hidden" name="main_seq" value="<?=$main_seq;?>">
<input type="hidden" name="school_year" value="<?=$school_year;?>">
<INPUT TYPE="button" VALUE="上一頁(不儲存)" onClick="history.go(-1)">
<input type="submit" name="button" value="儲存並回上一頁" />

<!-- 檢查空值 與 數值檢核-->
<script language="JavaScript">
	function toCheck() 
	{
		if ( document.form.s_p1_times.value == "" ) 
		{
			alert("請填寫「親職講座預計辦理場次」！");
			document.form.s_p1_times.focus();
			return false;
		}
		if ( document.form.s_p1_people.value == "" ) 
		{
			alert("請填寫「親職講座預計參加人數」！");
			document.form.s_p1_people.focus();
			return false;
		}
		if ( document.form.s_p2_people.value == "" ) 
		{
			alert("請填寫「家庭訪視預計訪視人次」！");
			document.form.s_p2_people.focus();
			return false;
		}
		//數值檢核
		if ( document.form.s_p1_money.value > 20000 ) 
		{
			alert("親職講座最高補助金額2萬元！");
			return false;
		}
		if ( document.form.s_p1_times.value == "1" && document.form.s_p1_money.value > 10000 ) 
		{
			alert("親職講座最高補助金額為每場1萬元！");
			return false;
		} 
		if ( document.form.s_p2_money.value > document.form.s_p2_people.value * 200 ) 
		{
			alert("家庭訪視最高補助金額每人200元！");
			return false;
		}
		if ( (document.form.s_p1_money.value * 1 + document.form.s_p2_money.value * 1) > 70000 ) 
		{
			alert("本項目最高補助金額7萬元！");
			return false;
		}
		
		//加班費不能超過 親職講座 的金額 10%
		var s_p1_money = document.getElementsByName('s_p1_money')[0];
		var overtime = 0; //計算加班費			
		for(j = 1;j <= 10;j++) //計算各特色經常 & 資本，
		{
			var s_money = document.getElementsByName('p1_s_money_' + j)[0]; //金額
			var opt_category = document.getElementById('p1_opt_category_' + j); //類別
			
			if(opt_category.value == '加班費' && s_money.value != '')
				overtime = parseInt(overtime) + parseInt(s_money.value);
		}
		
		var diff = parseInt(s_p1_money.value) - parseInt(overtime);
		if(overtime > 0 && overtime * 10 > diff)
		{
			var x = parseInt(diff * 0.1);
			alert("加班費不能超過親職講座金額(不含加班費)的10%\n親職講座金額(不含加班費)為 " + diff + "元\n固加班費不能超過 " + x + "元");
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
		{
			s_money.value = parseInt(price.value) * parseInt(amount.value); //單價 * 數量
			
			if(opt_category.value == '鐘點費(含補充保費)')
				s_money.value = Math.ceil(parseInt(s_money.value) * 1.02) //無條件進位
		}
		
		//計算雜支
		chkbox(document.getElementsByName(p + '_item_10')[0]);
		
	}
	
	//計算雜支
	function chkbox(obj)
	{
		var p = left(obj.name, 2);
		var s_money_10 = document.getElementsByName(p + '_s_money_10')[0]; //第10項的金額控制項
		
		if (obj.checked == false)
		{
			s_money_10.value = ""; //沒選就清空金額
		}
		else
		{
			var opt_subject, s_money;
			var i;
			var total = 0;
			
			//把1~9項金額加總
			for(i = 1;i < 10;i++)
			{
				opt_subject = document.getElementById(p + '_opt_subject_' + i); //科目
				opt_category = document.getElementById(p + '_opt_category_' + i); //類別
				s_money = document.getElementsByName(p + '_s_money_' + i)[0]; //金額
				
				//雜支
				if(opt_subject.value == '經常門' && s_money.value != '')
					total += parseInt(s_money.value);
		
			}
			
			s_money_10.value = parseInt(total * 0.06);
			
		}
		
		count_all();
	}
	
	//計算家庭訪視金額
	function Count_family(obj)
	{
		var s_p2_people = document.getElementsByName("s_p2_people")[0];
		//驗證輸入的資料是否為數字 
		var regex = /^[0-9]*$/;
		if (!(regex.test(s_p2_people.value)))
		{
			alert('「家庭訪視人次」必須為數字');
			s_p2_people.value = "";
			s_p2_people.focus();
		}
		else
		{
			if (s_p2_people.value == "")
				s_p2_people.value = 0;
				
			document.getElementsByName("s_p2_money")[0].value = parseInt(s_p2_people.value) * 200;
			
			count_all();
		}
		
	}
	
	//計算總金額
	function count_all()
	{
		var s_total_money = document.getElementsByName('s_total_money')[0]; //總金額
		var i;
		
		//補一只有特色一的部分要計算細項
		var s_p1_money = document.getElementsByName('s_p1_money')[0];
		s_p1_money.value = 0;
		for(j = 1;j <= 10;j++) //計算各特色經常 & 資本，
		{
			var s_money = document.getElementsByName('p1_s_money_' + j)[0]; //金額
			
			if(s_money.value != '')
				s_p1_money.value = parseInt(s_p1_money.value) + parseInt(s_money.value);
				
		}
		
		var s_p2_money = document.getElementsByName('s_p2_money')[0]; 
		
		s_total_money.value = parseInt(s_p1_money.value) + parseInt(s_p2_money.value);
	}
	
	//設定預設值
	function set_default() 
	{
		//alert('onload');
		var i;
		for(i = 1;i < 10;i++)
		{
			var obj_subject = document.getElementById('p1_opt_subject_' + i); //科目
			var obj_category = document.getElementById('p1_opt_category_' + i); //類別
			var obj_item = document.getElementsByName('p1_item_' + i)[0]; //項目
			var obj_unit = document.getElementsByName('p1_unit_' + i)[0]; //單位
			var obj_price = document.getElementsByName('p1_price_' + i)[0]; //單價

			if(document.getElementsByName("p1_seq_no_" + i)[0].value == '')
			{
				//設定科目，補一預設都是經常門
				obj_subject.options[1].selected = true; //[1] = 經常門
				//產生 科目對應的類別下拉選單
				change_subject(obj_subject, i, 0);
				
				switch(i)
				{
					case 1:
						obj_category.options[1].selected = true; //設定類別=鐘點費
						obj_item.value = '內聘講師';
						obj_unit.value = '時';
						obj_price.value = '800';
						break;
					case 2:
						obj_category.options[1].selected = true; //設定類別=鐘點費
						obj_item.value = '外聘講師';
						obj_unit.value = '時';
						obj_price.value = '1200';
						break;
					case 3:
						obj_category.options[1].selected = true; //設定類別=鐘點費
						obj_item.value = '外聘講師';
						obj_unit.value = '時';
						obj_price.value = '1600';
						break;
					case 4:
						obj_category.options[3].selected = true; //設定類別=場地費
						obj_item.value = '活動場地費';
						obj_unit.value = '次';
						break;
					case 5:
						obj_category.options[4].selected = true; //設定類別=誤餐費
						obj_item.value = '誤餐費';
						obj_unit.value = '人';
						break;
					case 6:
						obj_category.options[5].selected = true; //設定類別=講義文件費
						break;
					case 7:
						obj_category.options[7].selected = true; //設定類別=其他
						break;
					case 8:
						obj_category.options[7].selected = true; //設定類別=其他
						break
					case 9:
						obj_category.options[7].selected = true; //設定類別=其他
						break;
						
				}
			}
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
			NewOpt[1] = new Option("鐘點費");
			NewOpt[2] = new Option("鐘點費(含補充保費)");
			NewOpt[3] = new Option("場地費");
			NewOpt[4] = new Option("誤餐費");
			NewOpt[5] = new Option("講義文件費");
			NewOpt[6] = new Option("加班費");
			NewOpt[7] = new Option("其他");
		}

		if (selectName == "資本門") //補一沒資本門
		{
			NewOpt[0] = new Option("");
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
<!--(今年執行沒有建資料庫)-->
