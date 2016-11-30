<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "checkdate.php";
	
	include "../../function/config_for_104.php"; //本年度基本設定

	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   //補六資料
		   "      , a6.s_total_money ".
		   "      , a6.item, a6.s_people, a6.s_money ".
		   "      , a6.s_boarders, a6.s_no_boarders ". 
		   "      , a6.s_boarders_money, a6.s_no_boarders_money ". 
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join alc_transport_car as a6 on sy.seq_no = a6.sy_seq ".
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
		
		$s_money = $row['s_money'];
		$item = $row['item'];
		$s_people = $row['s_people'];
		$s_boarders = $row['s_boarders'];
		$s_no_boarders = $row['s_no_boarders'];
		$s_boarders_money = $row['s_boarders_money'];
		$s_no_boarders_money = $row['s_no_boarders_money'];
	}
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body onload="set_default()"> 
<form name="form" method="post" action="school_write_a6_finish.php"  onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><b>補助項目六：補助交通不便地區學校交通車</b>　<a href="allowance-06.htm" target="_blank">(補助項目說明)</a>
<p>
<font color=blue>※補助交通不便地區學校交通車-申請補助經費：<input type="text" size="6" name="s_total_money" value="<?=$s_total_money;?>" style="border:0px; text-align: right;" readonly >
元 (本列自動計算)</font><br />
說明：以下三項僅能擇一補助<br />
<p>
<table border="0">
	<tr>
		<td nowrap="nowrap" colspan="2">
			<input id="r1" type="radio" name="rdo_item" onclick="js:Count();" value="租車費" <?=($item == '租車費')?'checked':'';?> >&nbsp;1. 補助租車費：
			搭車人數<input type="text" size="6" name="s_people_1" value="<?=($item == '租車費')?$s_people:'';?>"/>人，
			申請租車經費<input type="text" size="6" name="s_money_1" value="<?=($item == '租車費')?$s_money:'';?>" onchange='js:Count();' />元。
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" style="width:40px;">&nbsp;</td>
		<td nowrap="nowrap">
			•搭車人數 9 人以下最高核列 7 萬元<br />
			•搭車人數 10至25 人以下最高核列 21 萬元<br />
			•搭車人數 26 人以上最高核列 40 萬元
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" colspan="2">
			<input id="r2" type="radio" name="rdo_item" onclick="js:Count();" value="交通費" <?=($item == '交通費')?'checked':'';?> >&nbsp;2. 補助交通費：<br />
			　　&nbsp;&nbsp;住宿生<input type="text" size="6" name="s_boarders" value="<?=$s_boarders;?>" onchange='js:Count_r2();' />人，
			申請經費<input type="text" size="6" name="s_boarders_money" value="<?=($item == '交通費')?$s_boarders_money:'';?>" onchange='js:Count_r2_money();' />元；<br />
			　　&nbsp;&nbsp;非住宿生<input type="text" size="6" name="s_no_boarders" value="<?=$s_no_boarders;?>" onchange='js:Count_r2();' />人，
			申請經費<input type="text" size="6" name="s_no_boarders_money" value="<?=($item == '交通費')?$s_no_boarders_money:'';?>" onchange='js:Count_r2_money();' />元；<br />
			　　&nbsp;&nbsp;<font color=blue>共<input type="text" size="6" name="s_people_2" value="<?=($item == '交通費')?$s_people:'';?>" style="border:0px; text-align: right;" readonly />人
			，總申請經費<input type="text" size="6" name="s_money_2" value="<?=($item == '交通費')?$s_money:'';?>" onchange='js:Count();' style="border:0px; text-align: right;" readonly />元(本列自動計算)</font>。
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap">&nbsp;</td>
		<td nowrap="nowrap">
			•住宿生每生每年補助 2400 元，最高依租車費標準為限。<br />
			•非住宿生每生每年補助 12000 元，最高依租車費標準為限。
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" colspan="2">
			<input id="r3" type="radio" name="rdo_item" onclick="js:Count();" value="購置交通車" <?=($item == '購置交通車')?'checked':'';?> >&nbsp;3. 補助購置交通車：
			<input type="text" size="6" name="s_people_3" value="<?=($item == '購置交通車')?$s_people:'';?>"/>人座，
			申請經費<input type="text" size="6" name="s_money_3" value="<?=($item == '購置交通車')?$s_money:'';?>" onchange="js:Count();" />元。
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap">&nbsp;</td>
		<td nowrap="nowrap">
			•座位 11 人以下最高核列 100 萬元<br />
			•座位 12至21 人最高核列 272 萬元<br />
			•座位 22 人以上最高核列 415 萬元
		</td>
	</tr>
</table>
<p>
<a href="/edu/modules/xSchoolForm/download/16.表(六)~1補助項目六申請表.xls" target="_new">下載：實施計畫(含經費申請表)(空白)</a><br />
<a href="/edu_dl/104/104_各搭車路線學生名冊.xls" target="_new">下載：各搭車路線學生名冊(空白)</a><br />
<a href="/edu/modules/xSchoolForm/download/17.表(六)~1~1學校現有交通車調查表.xls" target="_new">下載：學校現有交通車調查表(空白)</a><br />
說明：確認送出後，請於學校入口「上傳檔案專區」上傳「實施計畫(含經費申請表)」、「各搭車路線學生名冊」、「學校現有交通車調查表」。
<p>
<input type="hidden" name="main_seq" value="<?=$main_seq;?>">
<input type="hidden" name="school_year" value="<?=$school_year;?>">
<input type="button" value="上一頁(不儲存)" onClick="history.go(-1)" />
<input type="submit" name="button" value="儲存並回上一頁" />

<!-- 檢查空值 -->
<script language="JavaScript">

	function toCheck() 
	{
		var student = '<?=$student;?>';
		var isChecked = 0;
		var i;
		
		for(i = 1;i <= 3;i++)
		{
			var rdo = document.getElementById("r" + i);
			var people = document.getElementsByName("s_people_" + i)[0];
			var money = document.getElementsByName("s_money_" + i)[0];
			var student = <?=$student;?>;
			
			if(rdo.checked == true)
			{
				isChecked = 1;
				
				switch(i)
				{
					case 1:
						if(people.value == '')
						{
							alert('您選擇1.\n請填寫「補助租車費搭車人數」！');
							people.focus();
							return false;
						}
						if(people.value > student)
						{
							alert('「補助租車費搭車人數」不可超過全校學生數！\n全校學生共' + student + '人');
							people.focus();
							return false;
						}
						if(money.value == '')
						{
							alert('您選擇1.\n請填寫「補助租車費，租車經費」！');
							money.focus();
							return false;
						}
						//檢查r1金額
						if (people.value <= 9 && money.value > 70000) 
						{
							alert("搭車人數 9 人以下最高核列 7 萬元！");
							return false;
						} 
						else if (people.value >= 10 && people.value <= 25 && money.value > 210000) 
						{
							alert("搭車人數 10-25 人以下最高核列 27 萬元！");
							return false;
						} 
						else if (people.value >= 26 && money.value > 400000) 
						{
							alert("搭車人數 26 人以上最高核列 40 萬元！");
							return false;
						}
						break;
					
					case 2:
						if(people.value == '')
						{
							alert('您選擇2.\n請填寫「補助交通費人數」！');
							people.focus();
							return false;
						}
						
						if(people.value > student)
						{
							alert('「補助交通費人數」不可超過全校學生數！\n全校學生共' + student + '人');
							people.focus();
							return false;
						}
						if(money.value == '')
						{
							alert('您選擇2.\n請填寫「補助交通費申請經費」！');
							money.focus();
							return false;
						}
						if (money.value > people.value * 12000) 
						{
							alert("補助交通費金額錯誤，每生每年補助上限 12000 元！");
							return false;
						}
						if (people.value <= 9 && money.value > 70000) 
						{
							alert("搭車人數 9 人以下最高核列 7 萬元！");
							return false;
						} 
						else if (people.value >= 10 && people.value <= 25 && money.value > 210000) 
						{
							alert("搭車人數 10-25 人以下最高核列 21 萬元！");
							return false;
						} 
						else if (people.value >= 26 && money.value > 400000) 
						{
							alert("搭車人數 26 人以上最高核列 40 萬元！");
							return false;
						}
						break;
						
					case 3:
						if(people.value == '')
						{
							alert('您選擇3.\n請填寫「交通車人數」！');
							people.focus();
							return false;
						}
						if(money.value == '')
						{
							alert('您選擇3.\n請填寫「交通車申請經費」！');
							money.focus();
							return false;
						}
						//檢查r3金額
						if (people.value <= 11 && money.value > 1000000) 
						{
							alert("座位 11 人以下最高核列 100 萬元！");
							return false;
						} 
						else if (people.value >= 12 && people.value <= 21 && money.value > 2720000) 
						{
							alert("座位 12-21 人以下最高核列 272 萬元！");
							return false;
						} 
						else if (people.value >= 22 && money.value > 4150000) 
						{
							alert("座位 22 人以上最高核列 415 萬元！");
							return false;
						}
						break;
				}
			}
		}
		
		//三個都沒選
		if(isChecked == 0)
		{
			alert("請核選您要申請的項目，3選1。");
			return false;
		}

		return true;
	}
	
	function Count_r2()
	{	
		var s1 = document.getElementsByName("s_boarders")[0];
		var s2 = document.getElementsByName("s_no_boarders")[0];
		var s_people_2 = document.getElementsByName("s_people_2")[0];
		var regex = /^[0-9]*$/;
		
		var flag = 1;
		var errmsg = "";
		
		if (!(regex.test(s1.value)))
		{
			errmsg += '補助交通費的「住宿生人數」須為正整數\n';
			s1.value = "";
			flag = 0;
		}
		if (!(regex.test(s2.value)))
		{
			errmsg += '補助交通費的「非住宿生人數」須為正整數\n';
			s2.value = "";
			flag = 0;
		}
		if (flag == 0)
		{
			alert(errmsg);
			s_people_2.value = "";
			return false;
		}
		
		if(s1.value != '' && s2.value != '')
		{	
			s_people_2.value = parseInt(s1.value) + parseInt(s2.value);
		}
		else
		{
			s_people_2.value = "";
		}
	
	}
	
	function Count_r2_money()
	{	
		var m1 = document.getElementsByName("s_boarders_money")[0];
		var m2 = document.getElementsByName("s_no_boarders_money")[0];
		var s_money_2 = document.getElementsByName("s_money_2")[0];
		var regex = /^[0-9]*$/;
		
		var flag = 1;
		var errmsg = "";
		
		if (!(regex.test(m1.value)))
		{
			errmsg += '補助交通費的「住宿生申請經費」須為正整數\n';
			m1.value = "";
			flag = 0;
		}
		if (!(regex.test(m2.value)))
		{
			errmsg += '補助交通費的「非住宿生申請經費」須為正整數\n';
			m2.value = "";
			flag = 0;
		}
		if (flag == 0)
		{
			alert(errmsg);
			s_money_2.value = "";
			return false;
		}
		
		if(m1.value != '' && m2.value != '')
		{	
			s_money_2.value = parseInt(m1.value) + parseInt(m2.value);
			Count();
		}
		else
		{
			s_money_2.value = "";
			Count();
		}
	
	}
		
	function Count() 
	{
		var i;
		for(i = 1;i <= 3;i++)
		{
			var money = document.getElementsByName("s_money_" + i)[0];
			
			if(document.getElementById("r" + i).checked == true)
				document.getElementsByName('s_total_money')[0].value = money.value;
		}
	}
	
	//設定預設值
	function set_default() 
	{
		//補六沒預設
	}
	
</script>
</form>
</body>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>
