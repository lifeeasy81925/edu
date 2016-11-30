<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	include "checkdate_city.php";

	include "../../function/config_for_106.php"; //本年度基本設定

	$account = ($_POST['account'] == '')?$_GET['id']:$_POST['account']; //取回傳遞來的學校編號，get為測試用

	$table_name = 'alc_transport_car';
	$table_name_item = $table_name.'_item';
	$a_num = 'a5';

	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   //補五資料
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
		$item = $row['item'];

		$s_total_money = ($row['s_total_money'] == '')?0:$row['s_total_money']; //NULL則填入0
		$s_money = $row['s_money'];
		$s_people = $row['s_people'];
		$s_boarders = $row['s_boarders'];
		$s_no_boarders = $row['s_no_boarders'];
		$s_boarders_money = $row['s_boarders_money'];
		$s_no_boarders_money = $row['s_no_boarders_money'];

		$city_total_money = ($row['city_total_money'] == '')?$s_total_money:$row['city_total_money']; //NULL則填入0
		$city_money = ($row['city_money'] == '')?$s_money:$row['city_money'];
		$city_boarders_money = ($row['city_boarders_money'] == '')?$s_boarders_money:$row['city_boarders_money'];
		$city_no_boarders_money = ($row['city_no_boarders_money'] == '')?$s_no_boarders_money:$row['city_no_boarders_money'];

		$city_desc = $row['city_desc'];
		$city_approved = $row['city_approved'];

		$accord_point = $row['accord_point']; //符合的指標
		$accord_point_ary = explode(",",$accord_point);
	}

	$sql = "select * from school_upload_name where sy_seq = '$main_seq' ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$point2 = $row['point2'];
		$a5_1 = $row['a5_1'];
		$a5_2 = $row['a5_2'];
		$a5_3 = $row['a5_3'];
	}

	$file_path = '/epa_uploads/'.$school_year.'/pub/'.$account.'/';
	$file_path2 = '/epa_uploads/'.$school_year.'/pri/'.$account.'/';
?><p>

<a href="a5_examine_table.php">
	<img src="/edu/images/button/b_back1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_back1.png'"
		 onmouseover="this.src='/edu/images/button/b_back1_on.png'">
</a>

<p>
<hr>
<p>

審核補助項目 / 補助項目五：補助交通不便地區學校交通車 / <b>審核</b>

<p>
<hr>
<p>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<form name="form" method="post" action="examine_allowance_a5_finish.php" onSubmit="return toCheck();">

	● <a href="/edu_dl/<?=$school_year;?>/allowance-05.pdf" target="_blank"><b><u>補助項目說明</u></b></a><p>

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

	<?
		switch($item)
		{
			case "租車費":
	?>
				● 申請補助租車費<p>

				　　　搭車人數
				<input type="text" size="1" name="s_people"     value="<?=$s_people;?>"   style="border:0px; text-align:center; background-color:aliceblue;" readonly> 人，學校申請
				<input type="text" size="5" name="s_money"      value="<?=$s_money;?>"    style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，縣市初審
				<input type="text" size="5" name="city_money_1" value="<?=$city_money;?>" style="text-align:right;" onchange='js:Count(this,1);' onkeyup="value=value.replace(/[^\d]/g,'')"> 元。<p>
	<?
				break;

			case "交通費":
	?>
				● 申請補助交通費<p>

				　　住宿生
				<input type="text" size="1" name="s_boarders"          value="<?=$s_boarders;?>"          style="border:0px; text-align:center; background-color:aliceblue;" readonly> 人，學校申請
				<input type="text" size="5" name="s_boarders_money"    value="<?=$s_boarders_money;?>"    style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，縣市初審
				<input type="text" size="5" name="city_boarders_money" value="<?=$city_boarders_money;?>" style="text-align:right;" onchange='js:Count_r2_money();' onkeyup="value=value.replace(/[^\d]/g,'')"> 元。<p>

				　非住宿生
				<input type="text" size="1" name="s_no_boarders"          value="<?=$s_no_boarders;?>"          style="border:0px; text-align:center; background-color:aliceblue;" readonly> 人，學校申請
				<input type="text" size="5" name="s_no_boarders_money"    value="<?=$s_no_boarders_money;?>"    style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，縣市初審
				<input type="text" size="5" name="city_no_boarders_money" value="<?=$city_no_boarders_money;?>" style="text-align:right;" onchange='js:Count_r2_money();' onkeyup="value=value.replace(/[^\d]/g,'')"> 元。<p>

				　　　合計
				<input type="text" size="1" name="s_people"     value="<?=$s_people;?>"   style="border:0px; text-align:center; background-color:aliceblue;" readonly> 人，學校申請
				<input type="text" size="5" name="s_money"      value="<?=$s_money;?>"    style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，縣市初審
				<input type="text" size="5" name="city_money_2" value="<?=$city_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" onchange='js:Count_r2_money();' readonly> 元。<p>
	<?
				break;

			case "購置交通車":
	?>
				● 申請補助購置交通車<p>

				　　　購置
				<input type="text" size="1" name="s_people"     value="<?=$s_people;?>"   style="border:0px; text-align:center; background-color:aliceblue;" readonly> 人座交通車，學校申請
				<input type="text" size="5" name="s_money"      value="<?=$s_money;?>"    style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，縣市初審
				<input type="text" size="5" name="city_money_3" value="<?=$city_money;?>" style="text-align:right;" onchange='js:Count(this,3);' onkeyup="value=value.replace(/[^\d]/g,'')"> 元。<p>
	<?
				break;

			default:
				break;
		}
	?>

		<p>
	<hr>
	<p>

	● 初審意見：<p>
	　　<textarea name="city_desc" cols="55" rows="4"><?=$city_desc;?></textarea><p>

	<p>
	<hr>
	<p>

	● 學校相關資料<p>

	　● <a href="print_point_page.php?id=<?=$account;?>" target="_blank">指標界定調查紀錄表</a><p>

	　● 應上傳檔案<p>
	　　<? echo ($a5_1 == '' ? "<font color=red>[未上傳]</font> 實施計畫"             : "<font color=blue>[已上傳]</font> <a href='".$file_path.$a5_1."' target='_new'>實施計畫</a>             <img src='/edu/images/yes.png' align='absmiddle'>"); ?><p>
	　　<? echo ($a5_2 == '' ? "<font color=red>[未上傳]</font> 各搭車路線學生名冊"   : "<font color=blue>[已上傳]</font> <a href='".$file_path2.$a5_2."' target='_new'>各搭車路線學生名冊</a>   <img src='/edu/images/yes.png' align='absmiddle'>"); ?><p><?//記得學生名冊是放在pri唷！所以要選file_path2?>
	　　<? echo ($a5_3 == '' ? "<font color=red>[未上傳]</font> 學校現有交通車調查表" : "<font color=blue>[已上傳]</font> <a href='".$file_path.$a5_3."' target='_new'>學校現有交通車調查表</a> <img src='/edu/images/yes.png' align='absmiddle'>"); ?><p>

	　● 歷史資料<p>  <?  // 106年的補助五 = 105、104年的補助六 ?>
	　　<a href="../105/effect_view_school_up_06.php?id=<?=$account;?>" target="_blank"><?=($school_year-1);?>年度 核定後資料與執行成果</a><p>
	　　<a href="../104/effect_view_school_up_06.php?id=<?=$account;?>" target="_blank"><?=($school_year-2);?>年度 核定後資料與執行成果</a><p>

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
			var isChecked = 0;
			var i;

			var city_money = document.getElementsByName("city_total_money")[0];
			var s_money = <?=$s_total_money;?>;
			if(city_money.value != '' && parseInt(city_money.value) > parseInt(s_money))
			{
				alert('初審金額不能超過學校的申請金額。');
				return false;
			}

			if(document.getElementsByName("city_approved")[1].checked == true && document.form.city_desc.value == "")
			{
				alert('若審核不通過，請在審核意見說明原因。');
				return false;
			}

			return true;
		}

		function Count_r2_money()
		{
			var m1 = document.getElementsByName("city_boarders_money")[0];
			var m2 = document.getElementsByName("city_no_boarders_money")[0];
			var city_money_2 = document.getElementsByName("city_money_2")[0];
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
				city_money_2.value = "";
				return false;
			}

			if(m1.value != '' && m2.value != '')
			{
				city_money_2.value = parseInt(m1.value) + parseInt(m2.value);
				Count(city_money_2,2);
			}
			else
			{
				city_money_2.value = "";
				Count(city_money_2,2);
			}

		}

		function Count(obj, idx)
		{
			document.getElementsByName('city_total_money')[0].value = obj.value;
		}

		//設定預設值
		function set_default()
		{
			//補五沒預設
		}

	</script>
</form>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>

<?
/*
<b>※符合指標：</b><a href="print_point_page.php?id=<?=$account;?>" target="_blank">點此查看詳細資料</a><p>
<?
	// 符合指標
	for($i = 0;$i < count($accord_point_ary);$i++)
	{
		switch($accord_point_ary[$i])
		{
			case "p4_1":
				echo  '　　　'.'指標四～（一）'.'<p>';
				break;
			case "p5_1":
				echo  '　　　'.'指標五～（一）'.'<p>';
				break;
			case "p5_2":
				echo  '　　　'.'指標五～（二）'.'<p>';
				break;
			case "p5_3":
				echo  '　　　'.'指標五～（三）'.'<p>';
				break;
		}
	}
?>
*/
?>