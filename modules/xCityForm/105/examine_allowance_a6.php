<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	include "checkdate_city.php";
	
	include "../../function/config_for_105.php"; //本年度基本設定
	
	$account = ($_POST['account'] == '')?$_GET['id']:$_POST['account']; //取回傳遞來的學校編號，get為測試用
	
	$table_name = 'alc_transport_car';
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
		$a6_1 = $row['a6_1'];
		$a6_2 = $row['a6_2'];
		$a6_3 = $row['a6_3'];
	}
	
	$file_path = '/epa_uploads/'.$school_year.'/pub/'.$account.'/';
	$file_path2 = '/epa_uploads/'.$school_year.'/pri/'.$account.'/';
	//echo $file_path;

?> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p><b>補助項目六：補助交通不便地區學校交通車</b>　<a href="/edu/modules/xSchoolForm/<?=$school_year;?>/allowance-06.htm" target="_blank">(補助項目說明)</a><br />
說明：僅能選擇一項補助
</p>
<form name="form" method="post" action="examine_allowance_a6_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
●學校：<?=($account.' '.$schoolname);?>
<p>
<b>※符合指標：</b><a href="print_point_page.php?id=<?=$account;?>" target="_blank">點此查看詳細資料</a><br />
<? 
	//符合指標
	for($i = 0;$i < count($accord_point_ary);$i++)
	{
		switch($accord_point_ary[$i])
		{
			/*case "p1_1":
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
			case "p3_1":
				echo  '　　　'.'指標三～（一）'.'<br />';
				break;*/
			case "p4_1":
				echo  '　　　'.'指標四～（一）'.'<br />';
				break;
			case "p5_1":
				echo  '　　　'.'指標五～（一）'.'<br />';
				break;
			case "p5_2":
				echo  '　　　'.'指標五～（二）'.'<br />';
				break;
			case "p5_3":
				echo  '　　　'.'指標五～（三）'.'<br />';
				break;
			/*case "p6_1":
				echo  '　　　'.'指標六～（一）'.'<br />';
				break;
			case "p6_2":
				echo  '　　　'.'指標六～（二）'.'<br />';
				break;*/
		}
	}
?>
<p>
<table border="0">
	<tr>
		<td nowrap="nowrap" ><b>※歷史資料：</b></td>
	</tr>
	<tr>
		<td nowrap="nowrap" >
			<?=($school_year-1);?>年度 <a href="../104/effect_view_school_up_06.php?id=<?=$account;?>" target="_blank">執行計畫與經費</a>
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" >
			<?=($school_year-2);?>年度 <a href="../103/effect_school_06.php?id=<?=$account;?>" target="_blank">執行成果</a>
		</td>
	</tr>
</table>
<p>
※補助交通不便地區學校交通車-申請補助經費： <?=$s_total_money;?> 元<br />
<font color=blue>※補助交通不便地區學校交通車-初審金額：<input type="text" size="6" name="city_total_money" value="<?=$city_total_money;?>" style="border:0px; text-align: right;" readonly >
元 (本列自動計算)</font>
<p>
<table border="0">
	<tr style="display:<?=($item == '租車費')?'':'none';?>;">
		<td nowrap="nowrap" colspan="2">
			<b>補助租車費：</b>
			搭車人數 <?=($item == '租車費')?$s_people:'';?> 人，
			申請租車經費 <?=($item == '租車費')?$s_money:'';?> 元，
			審核金額<input type="text" size="6" name="city_money_1" value="<?=($item == '租車費')?$city_money:'';?>" onchange='js:Count(this,1);' />元。
		</td>
	</tr>
	<tr style="display:<?=($item == '租車費')?'':'none';?>;">
		<td nowrap="nowrap" style="width:40px;">&nbsp;</td>
		<td nowrap="nowrap">
			•搭車人數 9 人以下最高核列 7 萬元<br />
			•搭車人數 10至25 人以下最高核列 21 萬元<br />
			•搭車人數 26 人以上最高核列 40 萬元
		</td>
	</tr>
	<tr style="display:<?=($item == '交通費')?'':'none';?>;">
		<td nowrap="nowrap" colspan="2">
			<b>補助交通費：</b><br />
			　　&nbsp;&nbsp;住宿生 <?=$s_boarders;?> 人，申請經費 <?=($item == '交通費')?$s_boarders_money:'';?> 元，
			審核經費<input type="text" size="6" name="city_boarders_money" value="<?=($item == '交通費')?$city_boarders_money:'';?>" onchange='js:Count_r2_money();' />元；<br />
			　　&nbsp;&nbsp;非住宿生 <?=$s_no_boarders;?> 人，申請經費 <?=($item == '交通費')?$s_no_boarders_money:'';?> 元，
			審核經費<input type="text" size="6" name="city_no_boarders_money" value="<?=($item == '交通費')?$city_no_boarders_money:'';?>" onchange='js:Count_r2_money();' />元；<br />
			　　&nbsp;&nbsp;共 <?=($item == '交通費')?$s_people:'';?> 人，	總申請經費 <?=($item == '交通費')?$s_money:'';?> 元，
			<font color=blue>審核金額<input type="text" size="6" name="city_money_2" value="<?=($item == '交通費')?$city_money:'';?>" style="border:0px; text-align: right;" readonly />元(本列自動計算)</font>。
		</td>
	</tr>
	<tr style="display:<?=($item == '交通費')?'':'none';?>;">
		<td nowrap="nowrap">&nbsp;</td>
		<td nowrap="nowrap">
			•住宿生每生每年補助 2400 元，最高依租車費標準為限。<br />
			•非住宿生每生每年補助 12000 元，最高依租車費標準為限。</td>
	</tr>
	<tr style="display:<?=($item == '購置交通車')?'':'none';?>;">
		<td nowrap="nowrap" colspan="2">
			<b>補助購置交通車：</b>
			 <?=($item == '購置交通車')?$s_people:'';?> 人座，
			申請經費 <?=($item == '購置交通車')?$s_money:'';?> 元，
			審核金額<input type="text" size="6" name="city_money_3" value="<?=($item == '購置交通車')?$city_money:'';?>" onchange='js:Count(this,3);' />元。
		</td>
	</tr>
	<tr style="display:<?=($item == '購置交通車')?'':'none';?>;">
		<td nowrap="nowrap">&nbsp;</td>
		<td nowrap="nowrap">
			•座位 11 人以下最高核列 100 萬元<br />
			•座位 12至21 人最高核列 276 萬元<br />            <!--  j10407，修改為276萬、422萬       -->
			•座位 22 人以上最高核列 422 萬元
		</td>
	</tr>
</table>
<p>
<table border="0" style="width:750px;table-layout:fixed;word-break:break-all">
	<tr>
		<td nowrap="nowrap" style="width:120px; text-align:right; vertical-align:top;"><b>※初審意見：</b>
		</td>
		<td nowrap="nowrap"><textarea name="city_desc" cols="55" rows="4"><?=$city_desc;?></textarea><p>
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" style="text-align:right; vertical-align:top;"><b>※應上傳檔案：</b>
		</td>
		<td nowrap="nowrap">
			實施計畫：<? echo ($a6_1 == ''?"<font color=red>未上傳</font>":"<font color=blue>已上傳</font>，檔名：<a href='".$file_path.$a6_1."' target='_new'>$a6_1</a>");?><br />
			各搭車路線學生名冊：<? echo ($a6_2 == ''?"<font color=red>未上傳</font>":"<font color=blue>已上傳</font>，檔名：<a href='".$file_path2.$a6_2."' target='_new'>$a6_2</a>");?><br />
			學校現有交通車調查表：<? echo ($a6_3 == ''?"<font color=red>未上傳</font>":"<font color=blue>已上傳</font>，檔名：<a href='".$file_path.$a6_3."' target='_new'>$a6_3</a>");?><br />
			<div style="display:<?=($page3_warning == '')?'none':''; //空白就不顯示?>;">
			目標學生名冊：<? echo ($point2 == ''?"<font color=red>未上傳</font>":"<font color=blue>已上傳</font>，檔名：<a href='".$file_path.$point2."' target='_new'>$point2</a>");?><br />
			</div>
			<p>
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" style="text-align:right; vertical-align:top;"><b>※初審結果：</b>
		</td>
		<td nowrap="nowrap">
			<input type="radio" name="city_approved" value="Y" id="city_approved_1" <?=(($city_approved == 'Y')?'checked':"");?>/>審核通過<br />
			<input type="radio" name="city_approved" value="N" id="city_approved_2" <?=(($city_approved == 'N')?'checked':"");?>/>審核不通過且列入退件名單<p>
		</td>
	</tr>
</table>
<input type="hidden" name="item" value="<?=$item;?>">
<input type="hidden" name="main_seq" value="<?=$main_seq;?>">
<input type="hidden" name="school_year" value="<?=$school_year;?>">
<input type="button" value="　取消(不儲存)　" onClick="history.go(-1)">
<input type="submit" name="button" value="　確認(儲存送出)　" />
<!--結束 -->
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
		//補六沒預設
	}
	
</script>
</form>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?> 
