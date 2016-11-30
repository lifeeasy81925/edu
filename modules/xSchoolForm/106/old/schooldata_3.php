<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "checkdate.php";

	include "../../function/config_for_106.php"; //本年度基本設定
	
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname ".
		   "      , sy.target_aboriginal, sy.target_no_aboriginal, sy.low_income, sy.grandparenting ".
		   "      , sy.over45years, sy.immigrant, sy.single_parent, sy.aboriginal ".
		   "      , sy.lastyear_leaving, sy.lastyear_graduate, sy.lastyear_pr25, sy.lastyear_test ".
		   "      , sy.page3_warning, sy.page3_desc ".
		   "      , sy.student, sd102.a113, sd102.a119, sd102.a120, sd102.a100 ".
		   		   
		   "	  , sy_ly.student as student_ly ". //去年資料
		   "	  , sy_ly.aboriginal as aboriginal_ly ".
		   "	  , sy_ly.target_aboriginal as target_aboriginal_ly ".
		   "	  , sy_ly.target_no_aboriginal as target_no_aboriginal_ly ".
		  
		  //j10407,新增，前年資料
		   "	  , sy_l2y.student as student_l2y ". 
		   "	  , sy_l2y.aboriginal as aboriginal_l2y ".
		   "	  , sy_l2y.target_aboriginal as target_aboriginal_l2y ".
		   "	  , sy_l2y.target_no_aboriginal as target_no_aboriginal_l2y ".
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   
		   //去年資料的資料表
		   "                       left join schooldata_year as sy_ly on sd.account = sy_ly.account and sy_ly.school_year = '".($school_year - 1)."' ". 
		   //j10407,新增，前年資料的資料表
		   "                       left join schooldata_year as sy_l2y on sd.account = sy_l2y.account and sy_l2y.school_year = '".($school_year - 2)."' ". 		   
		   
		   "                       left join 102schooldata as sd102 on sd.account = sd102.account ".
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
				
		$student = $row['student'];
		$target_aboriginal = $row['target_aboriginal'];
		$target_no_aboriginal = $row['target_no_aboriginal'];
		$low_income = $row['low_income'];
		$grandparenting = $row['grandparenting'];
		$over45years = $row['over45years'];
		$immigrant = $row['immigrant'];
		$single_parent = $row['single_parent'];
		$aboriginal = $row['aboriginal'];
		$lastyear_leaving = $row['lastyear_leaving'];
		$lastyear_graduate = $row['lastyear_graduate'];
		$lastyear_test = $row['lastyear_test'];
		$lastyear_pr25 = $row['lastyear_pr25'];
		
		$laststudent = ($row['student_ly'] == "")?0:$row['student_ly']; //去年學生數
		$last2student = ($row['student_l2y'] == "")?0:$row['student_l2y']; //j10407,新增，前年學生數
		
		$aboriginal_last = ($row['aboriginal_ly'] == "")?0:$row['aboriginal_ly']; //去年原住民
		$target_aboriginal_last = ($row['target_aboriginal_ly'] == "")?0:$row['target_aboriginal_ly']; //去年目標學生 含僅原住民
		$target_no_aboriginal_last = ($row['target_no_aboriginal_ly'] == "")?0:$row['target_no_aboriginal_ly']; //去年目標學生 不含僅原住民
		
		$aboriginal_last2 = ($row['aboriginal_l2y'] == "")?0:$row['aboriginal_l2y']; //j10407,新增，前年原住民
		$target_aboriginal_last2 = ($row['target_aboriginal_l2y'] == "")?0:$row['target_aboriginal_l2y']; //j10407,新增，前年目標學生 含僅原住民
		$target_no_aboriginal_last2 = ($row['target_no_aboriginal_l2y'] == "")?0:$row['target_no_aboriginal_l2y']; //j10407,新增，前年目標學生 不含僅原住民
 
		$page3_warning = $row['page3_warning'];
		$page3_desc = $row['page3_desc'];
		/*= $row[''];*/
		
		if($username == "014558")
		{
			$aboriginal_last = 48;
			$target_aboriginal_last = 224;
			$target_no_aboriginal_last = 193;
		}
		
	}
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="回上一頁" onclick="history.go(-1)">

<form name="form" method="post" action="schooldata_3_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<div id="print_content">
<p><font color="blue"><strong>目標學生資料</strong></font> 
<p>
<b>一、<?=$school_year-1;?>年目標學生數</b>
<input type="button" name="Submit" value="下載目標學生名冊範例檔案" onclick="location.href='/edu_dl/105/目標學生名冊_模擬範例.xls'"> 
<input type="button" name="Submit" value="下載目標學生空白名冊" onclick="location.href='/edu_dl/105/目標學生名冊_空白.xls'">
<p>
說明：例如學生甲，同時具備A、B、C三種身分，統計A~C項目時，學生甲皆需計入統計；但在本校目標學生加總時，學生甲僅計算1人。
<p>
<table border="0">
	<tr>
		<td nowrap="nowrap">
			<?=$school_year-2;?>年目標學生數(不含僅具原住民身分者)：<?=$target_no_aboriginal_last2?>
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" >
			<?=$school_year-2;?>年目標學生數(含僅原住民身分者)：<?=$target_aboriginal_last2?>
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" >
			<?=$school_year-2;?>年原住民學生數：<?=$aboriginal_last2?>
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" >
			<p>
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" >
			※其中具備下列身分者<font color=blue>（同一學生，不限定一種身分）</font>：<br />
			A.低收入學生數：<input type="text" size="6" name="low_income" value="<?=$low_income;?>"/>人<br />
			B.隔代教養學生數：<input type="text" size="6" name="grandparenting" value="<?=$grandparenting;?>"/>人<br />
			C.親子年齡差距45歲以上學生數：<input type="text" size="6" name="over45years" value="<?=$over45years;?>"/>人<br />
			D.新移民子女學生數：<input type="text" size="6" name="immigrant" value="<?=$immigrant;?>"/>人<br />
			E.單(寄)親家庭學生數：<input type="text" size="6" name="single_parent" value="<?=$single_parent;?>"/>人<br />
			F.原住民學生數：<input type="text" size="6" name="aboriginal" value="<?=$aboriginal;?>"/>人
			<p>
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" >
			※本校<?=$school_year-1;?>年目標學生數（不含僅具原住民身分者）共：<input type="text" size="6" name="target_no_aboriginal" value="<?=$target_no_aboriginal;?>"/>人<br />
			<font color=blue>　（各類目標學生若同時符合原住民與其他身分，應計入統計，但不含僅具原住民身分者）</font><br />
			※本校<?=$school_year-1;?>年目標學生數（含僅原住民身分者）共：<input type="text" size="6" name="target_aboriginal" value="<?=$target_aboriginal;?>"/>人<br />
			<font color=blue>　（各類目標學生總人數，若同一學生具備多種身分，僅算一人）</font>
			<p>
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" >
			<b>二、學習弱勢及中途輟學學生</b>
			<p>
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" >
			※<?=$school_year-3;?>學年度中途輟學學生數：<input type="text" size="6" name="lastyear_leaving" value="<?=$lastyear_leaving;?>"/>人<br />
			<font color=blue>　（從<?=$school_year-3;?>年9月1日至<?=$school_year-2;?>年6月30日之中輟學生數）</font>
			<p>
		</td>
	</tr>
</table>
<p>

<!--檢核警示訊息-->
<div id="alert" style="display:<? if($page3_desc=="") echo 'none';?>;">
	<table width="100%" border="1" cellspacing="0" cellpadding="0">
		<tr>
			<td align="center" style="background-color:#FC9">資料檢核警示訊息視窗</td>
		</tr>
		<tr>
			<td>
				<font color="#FF0000">警示訊息：<INPUT type="text" name="page3_warning" value="<?=$page3_warning;?>" style="width:70%; border:0px; text-align: left;" readonly /></font><p>
				※若確定填寫無誤，請說明異動過大原因：(若未填寫，無法「儲存並到下一頁」)<br />
				<textarea name="page3_desc" cols="70%" rows="3"><?=$page3_desc;?></textarea>
				<br /><font color=blue>※目標學生資料出現警訊，「上傳檔案區」應上傳檔案將加入「目標學生名冊」。</font>
			</td>
		</tr>
	</table>
</div>
</div>
<input type="hidden" name="school_year" value="<?=$school_year;?>">
<INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
<input type="submit" name="button" value="儲存並到下一頁" />

<!-- 檢查空值 -->
<script language="JavaScript">
	
	function toCheck() 
	{
		var flag = 1;
		var errmsg = "";
		
		if ( document.form.low_income.value == "" ) 
		{
			errmsg += "請填寫「低收入學生數」！\n";
			document.form.low_income.focus();
			flag = 0;
		}
		if ( document.form.grandparenting.value == "" ) 
		{
			errmsg += "請填寫「隔代教養學生數」！\n";
			document.form.grandparenting.focus();
			flag = 0;
		}
		if ( document.form.over45years.value == "" ) 
		{
			errmsg += "請填寫「親子年齡差距45歲以上學生數」！\n";
			document.form.over45years.focus();
			flag = 0;
		}
		if ( document.form.immigrant.value == "" ) 
		{
			errmsg += "請填寫「新移民子女學生數」！\n";
			document.form.immigrant.focus();
			flag = 0;
		}
		if ( document.form.single_parent.value == "" ) 
		{
			errmsg += "請填寫「單親家庭學生數」！\n";
			document.form.single_parent.focus();
			flag = 0;
		}
		if ( document.form.aboriginal.value == "" ) 
		{
			errmsg += "請填寫「原住民學生數」！\n";
			document.form.aboriginal.focus();
			flag = 0;
		}
		if ( document.form.target_no_aboriginal.value == "" ) 
		{
			errmsg += "請填寫「本校目標學生數（不含僅具原住民身分者）」！\n";
			document.form.target_no_aboriginal.focus();
			flag = 0;
		}
		if ( document.form.target_aboriginal.value == "" ) 
		{
			errmsg += "請填寫「本校目標學生數（含僅原住民身分者）」！\n";
			document.form.target_aboriginal.focus();
			flag = 0;
		}

		//驗證輸入的資料是否為數字
		var regex = /^[0-9]*$/;
		if (!(regex.test(document.form.target_no_aboriginal.value)))
		{
			errmsg += '「目標學生數（不含僅具原住民身分者）」須為正整數\n';
			document.form.target_no_aboriginal.focus();
			flag = 0;
		}
		if (!(regex.test(document.form.target_aboriginal.value)))
		{
			errmsg += '「目標學生數（含僅原住民身分者）」須為正整數\n';
			document.form.target_aboriginal.focus();
			flag = 0;
		}
		if (!(regex.test(document.form.low_income.value)))
		{
			errmsg += '「低收入學生數」須為正整數\n';
			document.form.low_income.focus();
			flag = 0;
		}
		if (!(regex.test(document.form.grandparenting.value)))
		{
			errmsg += '「隔代教養學生數」須為正整數\n';
			document.form.grandparenting.focus();
			flag = 0;
		}
		if (!(regex.test(document.form.over45years.value)))
		{
			errmsg += '「親子年齡差距45歲以上學生數」須為正整數\n';
			document.form.over45years.focus();
			flag = 0;
		}
		if (!(regex.test(document.form.immigrant.value)))
		{
			errmsg += '「新移民子女學生數」須為正整數\n';
			document.form.immigrant.focus();
			flag = 0;
		}
		if (!(regex.test(document.form.single_parent.value)))
		{
			errmsg += '「單(寄)親家庭學生數」須為正整數\n';
			document.form.single_parent.focus();
			flag = 0;
		}
		if (!(regex.test(document.form.aboriginal.value)))
		{
			errmsg += '「原住民學生數」須為正整數\n';
			document.form.aboriginal.focus();
			flag = 0;
		}
		
		var show_errmsg = 0; //警告欄位控制 1=顯示 0=隱藏

		//「原住民學生數」與去年比較超過±20% (原住民學生數佔全校學生總數15%以上或達到35人以上才檢核)
		var allstudent = <?=(($student == "")?0:$student);?>; //全校總學生數
		
		
		if ( document.form.aboriginal.value >= 35 || document.form.aboriginal.value >= (parseInt(allstudent) * 0.15) ) 
		{
			var lastaborigine = <?=(($aboriginal_last == "")?0:$aboriginal_last);?>; //去年原住民學生數
			var lastaborigine_min;
			var lastaborigine_max;
			lastaborigine_min = parseInt(parseInt(lastaborigine,10) * 0.8,10);
			lastaborigine_max = parseInt(parseInt(lastaborigine,10) * 1.2,10);

			if (document.form.aboriginal.value < lastaborigine_min || document.form.aboriginal.value > lastaborigine_max)
			{
				show_errmsg = 1;
				document.form.page3_warning.value = "「去年今年原住民學生數比」超過±20%，請填寫異動過大說明\n";
				
				if	(document.form.page3_desc.value == "" )
				{
					errmsg += '您填寫今年「原住民學生數」:'+document.form.aboriginal.value+'人\n'
						   +'與資料庫去年「原住民學生數」:'+lastaborigine+'人 比較超過±20%\n'+'(原住民學生數佔全校學生總數15%以上或達到35人以上才檢核)\n';
					flag = 0;
				}
			}
		}

		var lastabcd = <?=(($target_no_aboriginal_last == "")?0:$target_no_aboriginal_last);?>; //去年目標學生數(不含僅原住民)
		var lastabcd_min;
		var lastabcd_max;
		lastabcd_min = parseInt(parseInt(lastabcd,10) * 0.8,10);
		lastabcd_max = parseInt(parseInt(lastabcd,10) * 1.2,10);
					
		//「本校目標學生數(不含僅原住民)」與去年比較超過±20%(佔全校學生總數20%以上或60人以上才檢核)。
		if ( (document.form.target_no_aboriginal.value >= 60 || document.form.target_no_aboriginal.value >= (parseInt(allstudent) * 0.2)) && (document.form.target_no_aboriginal.value < lastabcd_min || document.form.target_no_aboriginal.value > lastabcd_max)) 
		{
			show_errmsg = 1;
			document.form.page3_warning.value = "「目標學生數(不含僅具原住民身分者)欄與去年」比超過±20%，請填寫異動過大說明";
						
			if	(document.form.page3_desc.value == "" )
			{   
				errmsg += '「目標學生數(不含僅具原住民身分者)」欄與去年('+lastabcd+'人)比較超過±20%\n';
				flag = 0;
			}

		}
		
		//「本校目標學生數(含原住民)」與去年比較超過±20%(佔全校學生總數30%以上才檢核)。
		var lastabcde = <?=(($target_aboriginal_last == "")?0:$target_aboriginal_last);?>; //去年目標學生數(含原住民)
		var lastabcde_min;
		var lastabcde_max;
		lastabcde_min = parseInt(parseInt(lastabcde,10) * 0.8,10);
		lastabcde_max = parseInt(parseInt(lastabcde,10) * 1.2,10);
		
		if (document.form.target_aboriginal.value >= (parseInt(allstudent) * 0.3) && (document.form.target_aboriginal.value < lastabcde_min || document.form.target_aboriginal.value > lastabcde_max)) 
		{
			show_errmsg = 1;
			document.form.page3_warning.value = "「目標學生數(含僅原住民身分者)欄與去年」比超過±20%，請填寫異動過大說明";
			
			if	(document.form.page3_desc.value == "" )
			{	
				errmsg += '「目標學生數(含僅原住民身分者)」欄與去年('+lastabcde+'人)比較超過±20%\n';
				flag = 0;
			}
		}
		
		if ( document.form.target_no_aboriginal.value*1 > document.form.target_aboriginal.value*1 ) {
			errmsg += '「目標學生數(不含僅具原住民身分者)」不得大於「目標學生數(含僅原住民身分者)」！\n';
			flag = 0;
		}

		if ( document.form.lastyear_leaving.value == "" ) 
		{
			errmsg += "請填寫「中途輟學學生數」！\n";
			document.form.lastyear_leaving.focus();
			flag = 0;
		}
		if (!(regex.test(document.form.lastyear_leaving.value)))
		{
			errmsg += '「中途輟學學生數」須為正整數\n';
			document.form.lastyear_leaving.focus();
			flag = 0;
		}

		//「A、B、C、D、E 」任一身分學生數不得大於「目標學生數(含原住民)」
		if ((document.form.low_income.value*1 > document.form.target_aboriginal.value*1) 
				|| (document.form.grandparenting.value*1 > document.form.target_aboriginal.value*1) 
				|| (document.form.over45years.value*1 > document.form.target_aboriginal.value*1) 
				|| (document.form.immigrant.value*1 > document.form.target_aboriginal.value*1) 
				|| (document.form.single_parent.value*1 > document.form.target_aboriginal.value*1)
				|| (document.form.aboriginal.value*1 > document.form.target_aboriginal.value*1)) 
		{
				errmsg += '「A、B、C、D、E、F」任一身分學生數不得大於「目標學生數(不含僅具原住民身分者)」！\n';
				flag = 0;		
		}
		
		//下方警告欄位控制
		if(show_errmsg == 1)
		{
			document.getElementById("alert").style.display="";//顯示
		}
		else
		{
			document.getElementById("alert").style.display="none";//隱藏
			document.form.page3_warning.value = "";
			document.form.page3_desc.value = "";	
		}
		
		if (flag == 0)
		{
			alert(errmsg);
			return false;
		}
		else
		{
			return true;
		}
		
	}
</script>   
<?php include "../../function/button_print.php"; ?>
</form>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>