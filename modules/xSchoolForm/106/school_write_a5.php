<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "checkdate.php";
	include "../../function/config_for_106.php";  // 本年度基本設定

	$sql = 	"     SELECT sd.account                                        ".
			"          , sd.schooltype                                     ".
			"          , sd.cityname                                       ".
			"          , sd.district                                       ".
			"          , sd.schoolname                                     ".
			"          , sy.*                                              ".
			"          , a5.s_total_money                                  ".
			"          , a5.item                                           ".
			"	       , a5.s_people                                       ".
			"          , a5.s_money                                        ".
			"          , a5.s_boarders                                     ".
			"          , a5.s_no_boarders                                  ".
			"          , a5.s_boarders_money                               ".
			"          , a5.s_no_boarders_money                            ".
			"      FROM schooldata        AS sd                            ".
			" LEFT JOIN schooldata_year   AS sy ON sd.account = sy.account ".
			" LEFT JOIN alc_transport_car AS a5 ON sy.seq_no  = a5.sy_seq  ".
			"     WHERE sy.school_year = '$school_year'                    ".
			"       AND sd.account     = '$username'                       ";

	$result = mysql_query($sql);

	while($row = mysql_fetch_array($result))
	{
		$account    = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname   = $row['cityname'];
		$district   = $row['district'];
		$schoolname = $row['schoolname'];

		$student              = $row['student'];
		$target_aboriginal    = $row['target_aboriginal'];
		$target_no_aboriginal = $row['target_no_aboriginal'];
		$class_total          = $row['class_total'];

		$main_seq      = $row['seq_no'];  // school_year的seq_no
		$s_total_money = ($row['s_total_money'] == '')?0:$row['s_total_money'];  // NULL則填入0

		$s_money             = $row['s_money'];
		$item                = $row['item'];
		$s_people            = $row['s_people'];
		$s_boarders          = $row['s_boarders'];
		$s_no_boarders       = $row['s_no_boarders'];
		$s_boarders_money    = $row['s_boarders_money'];
		$s_no_boarders_money = $row['s_no_boarders_money'];
		
		$applied = $row['applied'];  // 已申請補助
	}
	
	$applied_ary = explode(",", $applied);  // 已申請的補助(分割成陣列)
	$is_a3_a6_applied = "N";
	$note = "補助三、五 (購置交通車)、六，若同時符合資格，最多可申請其中二項。";
	
	for($i = 0; $i < count($applied_ary); $i++)
	{
		switch($applied_ary[$i])
		{
			case "a3":
				$is_a3_a6_applied = "Y";
				break;

			case "a6":
				$is_a3_a6_applied = "Y";
				break;

			default:
				break;
		}
	}
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<a href="school_write_allowance.php">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

申請補助經費 / 填寫經費 / <b>補助項目五：補助交通不便地區學校交通車</b>

<p>
<hr>
<p>

<body>

	<form name="form" method="post" action="school_write_a5_finish.php"  onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">

		● <a href="/edu_dl/106/allowance-05.pdf" target="_blank"><b><u>補助項目說明</u></b></a><p>

		<font color=blue>
			<img src='/edu/images/calculator.png' align="absmiddle"> 申請補助經費：
			<input type="text" size="5" name="s_total_money" value="<?=$s_total_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元<p>
		</font>

		<p>
		● 貴校學生人數 <b><?=$student;?></b> 人。<p>

		<p>
		<hr>
		<p>

		● 以下三項僅能擇一補助：<p>

		　<input id="r1" type="radio" name="rdo_item" onclick="js:Count();" value="租車費" <?=($item == '租車費')?'checked':'';?>>
		1. 補助租車費：<p>
		　　　搭車人數
		<input type="text" size="1" name="s_people_1" value="<?=($item == '租車費')?$s_people:'';?>" style="text-align:center;" onkeyup="value=value.replace(/[^\d]/g,'')"> 人，申請租車經費
		<input type="text" size="5" name="s_money_1"  value="<?=($item == '租車費')?$s_money:'';?>" onchange='js:Count();' style="text-align:right;" onkeyup="value=value.replace(/[^\d]/g,'')"> 元。<p>

		　<input id="r2" type="radio" name="rdo_item" onclick="js:Count();" value="交通費" <?=($item == '交通費')?'checked':'';?>>
		2. 補助交通費：<p>
		　　　　住宿生
		<input type="text" size="1" name="s_boarders"       value="<?=$s_boarders;?>"                              onchange='js:Count_r2();'       style="text-align:center;" onkeyup="value=value.replace(/[^\d]/g,'')"> 人，申請經費
		<input type="text" size="5" name="s_boarders_money" value="<?=($item == '交通費')?$s_boarders_money:'';?>" onchange='js:Count_r2_money();' style="text-align:right;"  onkeyup="value=value.replace(/[^\d]/g,'')"> 元。<p>
		　　　非住宿生
		<input type="text" size="1" name="s_no_boarders"       value="<?=$s_no_boarders;?>"                              onchange='js:Count_r2();'       style="text-align:center;" onkeyup="value=value.replace(/[^\d]/g,'')"> 人，申請經費
		<input type="text" size="5" name="s_no_boarders_money" value="<?=($item == '交通費')?$s_no_boarders_money:'';?>" onchange='js:Count_r2_money();' style="text-align:right;"  onkeyup="value=value.replace(/[^\d]/g,'')"> 元。<p>
		　　　　　共計
		<input type="text" size="1" name="s_people_2" value="<?=($item == '交通費')?$s_people:'';?>" style="border:0px; text-align:center; background-color:aliceblue;" readonly> 人，申請經費
		<input type="text" size="5" name="s_money_2"  value="<?=($item == '交通費')?$s_money:'';?>"  style="border:0px; text-align:right; background-color:aliceblue;" onchange='js:Count();' readonly> 元。<p>

		　<input id="r3" type="radio" name="rdo_item" onclick="js: if('<?=$is_a3_a6_applied;?>' == 'Y'){alert('<?=$note;?>'); return false;} else{Count();}" value="購置交通車" <?=($item == '購置交通車')?'checked':'';?>>
		3. 補助購置交通車：<p>
		　　　購置
		<input type="text" size="1" name="s_people_3" value="<?=($item == '購置交通車')?$s_people:'';?>" style="text-align:center;" onkeyup="value=value.replace(/[^\d]/g,'')"> 人座交通車，申請經費
		<input type="text" size="5" name="s_money_3"  value="<?=($item == '購置交通車')?$s_money:'';?>"  style="text-align:right;" onchange="js:Count();" onkeyup="value=value.replace(/[^\d]/g,'')"> 元。<p>

		<p>
		<hr>
		<p>

		<input type="hidden" name="main_seq"    value="<?=$main_seq;?>">
		<input type="hidden" name="school_year" value="<?=$school_year;?>">
		<input type="submit" name="button"      value="　儲 存　" >

		<script language="JavaScript">
			function toCheck()
			{
				var student = '<?=$student;?>';
				var isChecked = 0;
				var i;

				for(i = 1; i <= 3; i++)
				{
					var rdo    = document.getElementById("r" + i);
					var people = document.getElementsByName("s_people_" + i)[0];
					var money  = document.getElementsByName("s_money_" + i)[0];
					var student = <?=$student;?>;

					if(rdo.checked == true)
					{
						isChecked = 1;

						switch(i)
						{
							case 1:
							{
								if(people.value == '')
								{
									alert('請填寫補助租車費搭車人數。');
									people.focus();
									return false;
								}
								if(people.value > student)
								{
									alert('搭車人數不可超過全校學生數。');
									people.focus();
									people.focus();
									return false;
								}
								if(money.value == '')
								{
									alert('請填寫補助租車費金額。');
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
									alert("搭車人數 10-25 人以下最高核列 21 萬元！");
									return false;
								}
								else if (people.value >= 26 && money.value > 400000)
								{
									alert("搭車人數 26 人以上最高核列 40 萬元！");
									return false;
								}
								break;
							}

							case 2:
							{
								var b        = document.form.s_boarders.value;           // 住宿生
 								var nb       = document.form.s_no_boarders.value;        // 非住宿生
								var b_money  = document.form.s_boarders_money.value;     // 住宿生金額
								var nb_money = document.form.s_no_boarders_money.value;  // 非住宿生金額

								if(people.value == '')
								{
									alert('請填寫補助交通費人數。');
									people.focus();
									return false;
								}
								if(people.value > student)
								{
									alert('補助交通費人數不可超過全校學生數。');
									people.focus();
									return false;
								}
								if(money.value == '')
								{
									alert('請填寫補助交通費申請經費。');
									money.focus();
									return false;
								}
								if (b_money > b * 2400)
								{
									alert("住宿生每生每年最高補助 2,400 元。");
									return false;
								}
								if (nb_money > nb * 12000)
								{
									alert("非住宿生每生每年最高補助 1 萬 2,000 元。");
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
							}

							case 3:
							{
								if(people.value == '')
								{
									alert('請填寫幾人座交通車。');
									people.focus();
									return false;
								}
								if(money.value == '')
								{
									alert('請填寫交通車申請經費。');
									money.focus();
									return false;
								}
								//檢查r3金額
								if (people.value <= 11 && money.value > 1000000)
								{
									alert("座位 11 人以下最高核列 100 萬元！");
									return false;
								}
								else if (people.value >= 12 && people.value <= 21 && money.value > 2760000)
								{
									alert("座位 12-21 人以下最高核列 276 萬元！");
									return false;
								}
								else if (people.value >= 22 && money.value > 4220000)
								{
									alert("座位 22 人以上最高核列 422 萬元！");
									return false;
								}
								break;
							}
						}
					}
				}

				if(isChecked == 0)  // 三個都沒選
				{
					alert("請核選您要申請的項目，3 選 1。");
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
				for(i = 1; i <= 3; i++)
				{
					var money = document.getElementsByName("s_money_" + i)[0];

					if(document.getElementById("r" + i).checked == true)
					{
						document.getElementsByName('s_total_money')[0].value = money.value;
					}
				}
			}
		</script>
	</form>
</body>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>
