<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_edu.php";
	include "checkdate_edu.php";

	include "../../function/config_for_106.php"; //本年度基本設定

	$account = ($_POST['account'] == '')?$_GET['id']:$_POST['account']; //取回傳遞來的學校編號，get為測試用
	$audit_city = $_POST['city']; //若為空值不會怎樣，但是儲存後無法正確回到上一頁
	$table_name = 'alc_transport_car';
	$table_name_item = $table_name.'_item';
	$a_num = 'a5';
	$a = $_GET['a'];

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

		$edu_total_money = ($row['edu_total_money'] == '')?$city_total_money:$row['edu_total_money']; //NULL則填入0
		$edu_money = ($row['edu_money'] == '')?$city_money:$row['edu_money'];
		$edu_boarders_money = ($row['edu_boarders_money'] == '')?$city_boarders_money:$row['edu_boarders_money'];
		$edu_no_boarders_money = ($row['edu_no_boarders_money'] == '')?$city_no_boarders_money:$row['edu_no_boarders_money'];

		$persent = number_format($edu_total_money/$city_total_money*100,2);

		$edu_desc = $row['edu_desc'];
		$edu_approved = $row['edu_approved'];

		$page1_warning = $row['page1_warning'];
		$page1_desc = $row['page1_desc'];
		$page2_warning = $row['page2_warning'];
		$page2_desc = $row['page2_desc'];
		$page3_warning = $row['page3_warning'];
		$page3_desc = $row['page3_desc'];

		$accord_point = $row['accord_point']; //符合的指標
		$accord_point_ary = explode(",",$accord_point);

		$keep = $row['keep'];
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
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><p>

<a href="javascript:history.back()"><?//這邊回上一頁，考慮到變數處理問題，就不指定頁面，真的讓它回上一頁?>
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

<form name="form" method="post" action="examine_allowance_a5_finish.php?a=<?=$a;?>" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return add_crlf();">

● <a href="/edu_dl/<?=$school_year;?>/allowance-05.pdf" target="_blank"><b><u>補助項目說明</u></b></a><p>

● 學校名稱：<font color=blue><?=($account.' '.$cityname.$district.$schoolname);?></font>（<a href="print_point_page.php?id=<?=$account;?>" target="_blank">指標界定調查紀錄表</a>）<p>

<b>● 經費合計</b><p>
<table>
	<tr>
		<td width="20%" align="right" nowrap="nowrap">
			● 學校申請金額：
		</td>
		<td>
			<input type="text" size="3" name="s_total_money" value="<?=$s_total_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元
		</td>
	</tr>
	<tr height="30px">
		<td width="20%" align="right" nowrap="nowrap">
			● 縣市初審金額：
		</td>
		<td>
			<input type="text" size="3" name="city_total_money" value="<?=$city_total_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元
		</td>
	</tr>
	<tr height="30px">
		<td width="20%" align="right" nowrap="nowrap">
			<img src="/edu/images/calculator.png" align="absmiddle" /><font color=blue>	教育部複審金額</font>：
		</td>
		<td>
			<input type="text" size="3" name="edu_total_money" value="<?=$edu_total_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元（複審/初審百分比：
			<input type="text" size="3" name="persent"         value="<?=$persent;?>"         style="border:0px; text-align:right; background-color:aliceblue;" readonly> %）
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
			● 申請：補助租車費<p>

			　　搭車人數
			<input type="text" size="1" name="s_people"     value="<?=$s_people;?>"   style="border:0px; text-align:center; background-color:aliceblue;" readonly> 人。<p>
			
			　　學校申請
			<input type="text" size="3" name="s_money"      value="<?=$s_money;?>"    style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，縣市初審
			<input type="text" size="3" name="city_money_1" value="<?=$city_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，教育部複審
			<input type="text" size="3" name="edu_money_1"  value="<?=$edu_money;?>"  style="text-align:right;" onchange='js:Count(this,1);' onkeyup="value=value.replace(/[^\d]/g,'')"> 元。<p>
<?
			break;

		case "交通費":
?>
			● 申請：補助交通費<p>

			<table>
				<tr height="30px">
					<td nowrap="nowrap">
						　住宿生
						<input type="text" size="1" name="s_boarders"          value="<?=$s_boarders;?>"          style="border:0px; text-align:center; background-color:aliceblue;" readonly> 人，學校申請
						<input type="text" size="3" name="s_boarders_money"    value="<?=$s_boarders_money;?>"    style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，縣市初審
						<input type="text" size="3" name="city_boarders_money" value="<?=$city_boarders_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，教育部複審
						<input type="text" size="3" name="edu_boarders_money"  value="<?=$edu_boarders_money;?>"  style="text-align:right;" onchange='js:Count_r2_money();' onkeyup="value=value.replace(/[^\d]/g,'')"> 元。<p>
					</td>
				</tr>
				<tr height="30px">
					<td nowrap="nowrap">			
						非住宿生
						<input type="text" size="1" name="s_no_boarders"          value="<?=$s_no_boarders;?>"          style="border:0px; text-align:center; background-color:aliceblue;" readonly> 人，學校申請
						<input type="text" size="3" name="s_no_boarders_money"    value="<?=$s_no_boarders_money;?>"    style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，縣市初審
						<input type="text" size="3" name="city_no_boarders_money" value="<?=$city_no_boarders_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，教育部複審
						<input type="text" size="3" name="edu_no_boarders_money"  value="<?=$edu_no_boarders_money;?>"  style="text-align:right;" onchange='js:Count_r2_money();' onkeyup="value=value.replace(/[^\d]/g,'')"> 元。<p>
					</td>
				</tr>
				<tr height="30px">
					<td nowrap="nowrap">
						　　合計
						<input type="text" size="1" name="s_people"     value="<?=$s_people;?>"   style="border:0px; text-align:center; background-color:aliceblue;" readonly> 人，學校申請
						<input type="text" size="3" name="s_money"      value="<?=$s_money;?>"    style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，縣市初審
						<input type="text" size="3" name="city_money_2" value="<?=$city_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，教育部複審
						<input type="text" size="3" name="edu_money_2"  value="<?=$edu_money;?>"  style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元。<p>
					</td>
				</tr>
			</table>
<?
			break;

		case "購置交通車":
?>
			● 申請：補助購置交通車<p>

			　　購置
			<input type="text" size="1" name="s_people"     value="<?=$s_people;?>"   style="border:0px; text-align:center; background-color:aliceblue;" readonly> 人座交通車。<p>
			
			　　學校申請
			<input type="text" size="3" name="s_money"      value="<?=$s_money;?>"    style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，縣市初審
			<input type="text" size="3" name="city_money_3" value="<?=$city_money;?>" style="border:0px; text-align:right; background-color:aliceblue;" readonly> 元，教育部複審
			<input type="text" size="3" name="edu_money_3"  value="<?=$edu_money;?>"  style="text-align:right;" onchange='js:Count(this,3);' onkeyup="value=value.replace(/[^\d]/g,'')"> 元。<p>
<?
			break;

		default:
			break;
	}
?>

● 初審意見：<p>
　　<textarea name="city_desc" cols="55" rows="4" style="border:0px; background-color:aliceblue;" readonly><?=$city_desc;?></textarea><p>
<img src="/edu/images/pencil.png" /> <b>複審意見</b>：<p>
　　<textarea name="edu_desc" cols="55" rows="4"><?=$edu_desc;?></textarea><p>

<p>
<hr>
<p>

<b>● 相關資料</b><p>

　● 歷史資料：<p>
　　<a href="../105/effect_view_school_up_06.php?id=<?=$account;?>" target="_blank"><?=($school_year-1);?>年度 核定後資料與執行成果</a><p>
　　<a href="../104/effect_view_school_up_06.php?id=<?=$account;?>" target="_blank"><?=($school_year-2);?>年度 核定後資料與執行成果</a><p>

　● 應上傳檔案：<p>
　　實施計畫：<? echo ($a5_1 == ''?"<font color=red>未上傳</font>":"<font color=blue>已上傳</font>，檔名：<a href='".$file_path.$a5_1."' target='_new'>$a5_1</a>");?><p>
　　各搭車路線學生名冊：<? echo ($a5_2 == ''?"<font color=red>未上傳</font>":"<font color=blue>已上傳</font>，檔名：<a href='".$file_path2.$a5_2."' target='_new'>$a5_2</a>");?><p>
　　學校現有交通車調查表：<? echo ($a5_3 == ''?"<font color=red>未上傳</font>":"<font color=blue>已上傳</font>，檔名：<a href='".$file_path.$a5_3."' target='_new'>$a5_3</a>");?><p>

	<? if($page2_warning == ''){echo "<!-- ";} ?>
　　目標學生名冊：<? echo ($point2 == ''?"<font color=red>未上傳</font>":"<font color=blue>已上傳</font>，檔名：<a href='".$file_path.$point2."' target='_new'>$point2</a>");?><p>
	<? if($page2_warning == ''){echo " -->";} ?>
	
<table>
	<? if($page1_warning == '') {echo "<!-- ";} ?>
		<tr>
			<td nowrap="nowrap">● 學校資料警示原因：</td>
			<td nowrap="nowrap"><?=$page1_warning;?></td>
		<tr>
		</tr>
			<td nowrap="nowrap">● 學校資料學校說明：</td>
			<td nowrap="nowrap"><?=$page1_desc;?></td>
		</tr>
	<? if($page1_warning == '') {echo " -->";} ?>

	<? if($page2_warning == '') {echo "<!-- ";} ?>
		<tr>
			<td nowrap="nowrap">● 目標學生警示原因：</td>
			<td nowrap="nowrap"><?=$page2_warning;?></td>
		<tr>
		</tr>
			<td nowrap="nowrap">● 目標學生學校說明：</td>
			<td nowrap="nowrap"><?=$page2_desc;?></td>
		</tr>
	<? if($page2_warning == '') {echo " -->";} ?>
</table>

<p>
<hr>
<p>

<b>● 複審結果：</b><p>
　<input type="radio" name="edu_approved" value="Y" id="edu_approved_1" <?=(($edu_approved == 'Y')?'checked':"");?>> <img src="/edu/images/yes.png" align="absmiddle"/> 審核通過<p>
　<input type="radio" name="edu_approved" value="N" id="edu_approved_2" <?=(($edu_approved == 'N')?'checked':"");?>> <img src="/edu/images/no.png" align="absmiddle"/> 審核不通過且列入退件名單<p>

<p>
<hr>
<p>

<input type="hidden" name="item" value="<?=$item;?>">
<input type="hidden" name="main_seq" value="<?=$main_seq;?>">
<input type="hidden" name="school_year" value="<?=$school_year;?>">
<input type="hidden" name="city" value="<?=$audit_city;?>">
<input type="submit" name="button" value="　確認送出　">

<!--結束 -->

<script language="JavaScript">

	function toCheck()
	{
		var isChecked = 0;
		var i;

		var edu_money = document.getElementsByName("edu_total_money")[0];
		var s_money = <?=$s_total_money;?>;
		if(edu_money.value != '' && parseInt(edu_money.value) > parseInt(s_money))
		{
			alert('複審金額不能超過學校的申請金額。');
			return false;
		}

		if(document.getElementsByName("edu_approved")[1].checked == true && document.form.city_desc.value == "")
		{
			alert('若審核不通過，請在審核意見說明原因。');
			return false;
		}

		return true;
	}

	function Count_r2_money()
	{
		var m1 = document.getElementsByName("edu_boarders_money")[0];
		var m2 = document.getElementsByName("edu_no_boarders_money")[0];
		var edu_money_2 = document.getElementsByName("edu_money_2")[0];
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
			edu_money_2.value = "";
			return false;
		}

		if(m1.value != '' && m2.value != '')
		{
			edu_money_2.value = parseInt(m1.value) + parseInt(m2.value);
			Count(edu_money_2,2);
		}
		else
		{
			edu_money_2.value = "";
			Count(edu_money_2,2);
		}

	}

	function Count(obj, idx)
	{
		var edu_total_money = document.getElementsByName('edu_total_money')[0]; //總金額

		edu_total_money.value = obj.value;

		//計算百分比
		var persent = document.getElementsByName('persent')[0];
		var city_total_money = '<?=$city_total_money;?>';
		var x;

		x = parseInt(edu_total_money.value) * 100 / parseInt(city_total_money);
		persent.value = x.toFixed(2);
	}

	//在textarea按Enter才有作用，其他方無用避免按了之後網頁直接送出
	function add_crlf()
	{
		var obj_text = document.getElementsByName('edu_desc')[0];
		if(document.activeElement == obj_text)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	//設定預設值
	function set_default()
	{
		//補五沒預設
	}

</script>
</form>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>
