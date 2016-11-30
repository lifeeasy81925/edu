<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	include "checkdate.php";

	include "../../function/config_for_104.php"; //本年度基本設定
	
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sy.student ".
		   "      , sy.teacher_3years_total, sy.teacher, sy.teacher_change_total, sy.teacher_agent_total ".
		   "      , sy.teacher_change_rate, sy.teacher_agent_rate ".
		   "      , sy.teacher_change_in, sy.teacher_change_lack, sy.teacher_change_other ".
		   "      , sy.teacher_change_in_last, sy.teacher_change_lack_last, sy.teacher_change_other_last ".
		   "      , sy.page2_warning, sy.page2_desc ".
		   
		   "	  , sy_ly.teacher as teacher_ly ". //去年編制、調入、實缺、其他
		   "	  , sy_ly.teacher_change_in as teacher_change_in_ly ".
		   "	  , sy_ly.teacher_change_lack as teacher_change_lack_ly ".
		   "	  , sy_ly.teacher_change_other as teacher_change_other_ly ".
		   
		   "      , sd102.a135, sd102.a138, sd102.a141, sd102.a144 ". //前年編制、調入、實缺、其他
   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   
		   //去年資料的資料表
		   "                       left join schooldata_year as sy_ly on sd.account = sy_ly.account and sy_ly.school_year = '".($school_year - 1)."' ". 
		   
		   "                       left join 102schooldata as sd102 on sd.account = sd102.account ".
		   " where sy.school_year = '$school_year' ". 
		   "   and sd.account = '$username' ";	
	//echo $sql;
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$account = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];
		
		$student = $row['student'];
		$teacher_3years_total = $row['teacher_3years_total'];
		$teacher = $row['teacher'];
		$teacher_change_total = $row['teacher_change_total']; 
		$teacher_agent_total = $row['teacher_agent_total'];
		$teacher_change_rate = $row['teacher_change_rate'];
		$teacher_agent_rate = $row['teacher_agent_rate'];
		$teacher_change_in = $row['teacher_change_in'];
		$teacher_change_lack = $row['teacher_change_lack'];
		$teacher_change_other = $row['teacher_change_other']; 
		
		$teacher_last = ($row['teacher_ly'] == "")?"0":$row['teacher_ly']; //去年教師編制
		//若無資料則代入去年的 
		$teacher_change_in_last = ($row['teacher_change_in_last'] == "")?$row['teacher_change_in_ly']:$row['teacher_change_in_last'];
		$teacher_change_lack_last = ($row['teacher_change_lack_last'] == "")?$row['teacher_change_lack_ly']:$row['teacher_change_lack_last'];
		$teacher_change_other_last = ($row['teacher_change_other_last'] == "")?$row['teacher_change_other_ly']:$row['teacher_change_other_last'];
		//還是沒資料補0
		$teacher_change_in_last = ($teacher_change_in_last == "")?"0":$teacher_change_in_last;
		$teacher_change_lack_last = ($teacher_change_lack_last == "")?"0":$teacher_change_lack_last;
		$teacher_change_other_last = ($teacher_change_other_last == "")?"0":$teacher_change_other_last;
		
		$teacher_last2 = ($row['a135'] == "")?"0":$row['a135']; //前年教師編制
		$teacher_change_in_last2 = ($row['a138'] == "")?"0":$row['a138'];
		$teacher_change_lack_last2 = ($row['a141'] == "")?"0":$row['a141'];
		$teacher_change_other_last2 = ($row['a144'] == "")?"0":$row['a144'];
		if($username == "014578")
		{
			$teacher_last2 = 16; //前年教師編制
			$teacher_change_in_last2 = 2;
			$teacher_change_lack_last2 = 2;
			$teacher_change_other_last2 = 0;
		}
		if($username == "014558")
		{
			$teacher_last = 144; //去年教師編制
			$teacher_change_in_last = 0;
			$teacher_change_lack_last = 32;
			$teacher_change_other_last = 32;
		}
		
		$page2_warning = $row['page2_warning'];
		$page2_desc = $row['page2_desc'];
		/*= $row[''];*/
				
		//三年度教師編制合計 第一次為空值須先計算
		if($teacher_3years_total == '')
		{
			$teacher_3years_total = $teacher + $teacher_last + $teacher_last2;
		}
		
		//教師異動人數 三年調入+三年實缺 第一次為空值須先計算
		if($teacher_change_total == '')
		{
			$teacher_change_total = $teacher_change_in + $teacher_change_in_last + $teacher_change_in_last2
									+ $teacher_change_lack + $teacher_change_lack_last + $teacher_change_lack_last2;
		}
		
		//代理教師人數 三年實缺+三年其他 第一次為空值須先計算
		if($teacher_agent_total == '')
		{
			$teacher_agent_total = $teacher_change_other + $teacher_change_other_last + $teacher_change_other_last2
									+ $teacher_change_lack + $teacher_change_lack_last + $teacher_change_lack_last2;
		}
		
		//教師流動率 第一次為空值須先計算
		if($teacher_change_rate == '')
		{
			$teacher_change_rate = number_format($teacher_change_total / $teacher_3years_total * 100, 2);
		}
		
		//實缺教師代理率 第一次為空值須先計算
		if($teacher_agent_rate == '')
		{
			$teacher_agent_rate = number_format($teacher_agent_total / $teacher_3years_total * 100, 2);
		}
	}

?>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<INPUT TYPE="button" VALUE="回上一頁" onclick="history.go(-1)">

<form name="form" method="post" action="schooldata_2_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<div id="print_content">
<p><font color="blue"><strong>學校教師資料</strong></font>
<table border="0" style="color:brown;">
	<tr>
		<td width="120px" nowrap="nowrap" style="vertical-align:top; text-align:right;">
			教師編制人數：
		</td>
		<td>
			含校長、主任、普通班及特殊班教師數【不含幼稚園(班)教師】。<p>
		</td>
	</tr>
	<tr>
		<td width="120px" nowrap="nowrap" style="vertical-align:top; text-align:right;">
			調入教師：
		</td>
		<td>
			(1)指由他校調入及新派教師、主任、校長(原校升任者除外)。<br />
			(2)包括暑假及寒假異(調)動人數。<p>
		</td>
	</tr>
	<tr>
		<td width="120px" nowrap="nowrap" style="vertical-align:top; text-align:right;">
			實缺教師：
		</td>
		<td>
			含調出未補、退休、資遣、辭職、兵役、借調(長期)、代實缺...等。<p>
		</td>
	</tr>
	<tr>
		<td width="120px" nowrap="nowrap" style="vertical-align:top; text-align:right;">
			其他教師：
		</td>
		<td>
			係指重病、育嬰假、公假、進修、受訓、借調(短期)...等三個月以上之代理教師。<b>不含鐘點代課教師。</b><p>
		</td>
	</tr>
</table>

<font color=blue>
一、最近三學年度教師編制合計：<input type="text" size="3" name="total" value="<?=$teacher_3years_total;?>" style="border:0px" readonly>人</font><br />
※<?=($school_year-3);?>學年度全校教師編制人數：
<input type="text" size="3" name="tnumber3" value="<?=$teacher_last2;?>" style="border:0px" readonly> 人 <em><sup>(註2)</sup></em><br />
※<?=($school_year-2);?>學年度全校教師編制人數：
<input type="text" size="3" name="tnumber2" value="<?=$teacher_last;?>" style="border:0px" readonly> 人 <em><sup>(註2)</sup></em><br />
※<?=($school_year-1);?>學年度全校教師編制人數：
<input type="text" size="3" name="tnumber1" onChange="change_teacher()" value="<?=$teacher;?>"> 人<br /><br />
<font color=blue>
二、教師異動人數：<input type="text" size="2" name="different" value="<?=$teacher_change_total;?>" style="border:0px" readonly>人，
	代理教師人數：<input type="text" size="2" name="different2" value="<?=$teacher_agent_total;?>" style="border:0px" readonly>人<br />
　　教師流動率：<input type="text" size="2" name="per" value="<?=$teacher_change_rate;?>" style="border:0px" readonly>%，
	實缺教師代理率：<input type="text" size="2" name="per2" value="<?=$teacher_agent_rate;?>" style="border:0px" readonly>%</font><br />
※<?=($school_year-3);?>學年度教師異動人數：<br />
　　調入教師<input type="text" size="3" name="ltnumber3" onChange="change_teacher()" value="<?=$teacher_change_in_last2;?>" style="border:0px" readonly>人；
實缺教師<input type="text" size="3" name="ltnumber6" onchange="change_teacher()" value="<?=$teacher_change_lack_last2;?>" style="border:0px" readonly>人；
其他教師<input type="text" size="3" name="ltnumber9" onchange="change_teacher()" value="<?=$teacher_change_other_last2;?>" style="border:0px" readonly>人 <em><sup>(註2)</sup></em><br />
※<?=($school_year-2);?>學年度教師異動人數：<br />
　　調入教師<input type="text" size="3" name="ltnumber2" onChange="change_teacher()" value="<?=$teacher_change_in_last;?>" />人；
實缺教師<input type="text" size="3" name="ltnumber5" onchange="change_teacher()" value="<?=$teacher_change_lack_last;?>" />人；
其他教師<input type="text" size="3" name="ltnumber8" onchange="change_teacher()" value="<?=$teacher_change_other_last;?>" />人<br />
※<?=($school_year-1);?>學年度教師異動人數：<br />
　　調入教師<input type="text" size="3" name="ltnumber1" onChange="change_teacher()" value="<?=$teacher_change_in;?>">人；
實缺教師<input type="text" size="3" name="ltnumber4" onchange="change_teacher()" value="<?=$teacher_change_lack;?>">人；
其他教師<input type="text" size="3" name="ltnumber7" onchange="change_teacher()" value="<?=$teacher_change_other;?>">人
<p>
<sup><em>註1：資料為縣市政府提供</em></sup><br />
<sup><em>註2：資料為貴校去年填報</em></sup>
<!--檢核警示訊息-->
<div id="alert" style="display:<? if($page2_desc=="") echo 'none';?>;">
	<table width="100%" border="1" cellspacing="0" cellpadding="0">
		<tr>
			<td align="center" style="background-color:#FC9">資料檢核警示訊息視窗</td>
		</tr>
		<tr>
			<td>
				<font color="#FF0000">警示訊息：<INPUT type="text" name="page2_warning" value="<?=$page2_warning;?>" style="width:70%; border:0px; text-align: left;" readonly /></font><p>
				※若確定填寫無誤，請說明異動過大原因：(若未填寫，無法「儲存並到下一頁」)<br />
				<textarea name="page2_desc" cols="70%" rows="3"><?=$page2_desc;?></textarea>
			</td>
		</tr>
	</table>
</div>
</div>
<input type="hidden" name="school_year" value="<?=$school_year;?>">
<INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
<input type="submit" name="button" value="儲存並到下一頁" >

<script>
//全校教師合計更新
	function numsum() { 
		var f = document.forms[0]; 
		f.total.value = (f.tnumber1.value==""?0:parseFloat(f.tnumber1.value)) + (f.tnumber2.value==""?0:parseFloat(f.tnumber2.value))+ (f.tnumber3.value==""?0:parseFloat(f.tnumber3.value)); 
	}
	//教師異動人數合計更新
	function numsumdifferent1() { 
		var f = document.forms[0]; 
		f.different.value = (f.ltnumber1.value==""?0:parseFloat(f.ltnumber1.value)) + (f.ltnumber2.value==""?0:parseFloat(f.ltnumber2.value)) + (f.ltnumber3.value==""?0:parseFloat(f.ltnumber3.value)) + (f.ltnumber4.value==""?0:parseFloat(f.ltnumber4.value)) + (f.ltnumber5.value==""?0:parseFloat(f.ltnumber5.value)) + (f.ltnumber6.value==""?0:parseFloat(f.ltnumber6.value)); 
	}
	//代理教師人數合計更新
	function numsumdifferent2() { 
		var f = document.forms[0]; 
		f.different2.value = (f.ltnumber4.value==""?0:parseFloat(f.ltnumber4.value)) + (f.ltnumber5.value==""?0:parseFloat(f.ltnumber5.value)) + (f.ltnumber6.value==""?0:parseFloat(f.ltnumber6.value)) + (f.ltnumber7.value==""?0:parseFloat(f.ltnumber7.value)) + (f.ltnumber8.value==""?0:parseFloat(f.ltnumber8.value)) + (f.ltnumber9.value==""?0:parseFloat(f.ltnumber9.value)); 
	}
	//流動率更新
	function average() { 
		var f = document.forms[0]; 
		f.per.value = (((f.ltnumber1.value ==""?0:parseFloat(f.ltnumber1.value)) + (f.ltnumber2.value==""?0:parseFloat(f.ltnumber2.value)) + (f.ltnumber3.value==""?0:parseFloat(f.ltnumber3.value)) + (f.ltnumber4.value==""?0:parseFloat(f.ltnumber4.value)) + (f.ltnumber5.value==""?0:parseFloat(f.ltnumber5.value)) + (f.ltnumber6.value==""?0:parseFloat(f.ltnumber6.value))) / ((f.tnumber1.value==""?0:parseFloat(f.tnumber1.value)) + (f.tnumber2.value==""?0:parseFloat(f.tnumber2.value)) + (f.tnumber3.value==""?0:parseFloat(f.tnumber3.value))))*100;  
	}
	//代理率更新
	function average2() { 
		var f = document.forms[0];
		f.per2.value = (((f.ltnumber4.value==""?0:parseFloat(f.ltnumber4.value)) + (f.ltnumber5.value==""?0:parseFloat(f.ltnumber5.value)) + (f.ltnumber6.value==""?0:parseFloat(f.ltnumber6.value)) + (f.ltnumber7.value==""?0:parseFloat(f.ltnumber7.value)) + (f.ltnumber8.value==""?0:parseFloat(f.ltnumber8.value)) + (f.ltnumber9.value==""?0:parseFloat(f.ltnumber9.value))) / ((f.tnumber1.value==""?0:parseFloat(f.tnumber1.value)) + (f.tnumber2.value==""?0:parseFloat(f.tnumber2.value)) + (f.tnumber3.value==""?0:parseFloat(f.tnumber3.value))))*100;
	}
	//教師編制人數更新
	function change_teacher() { 
		var f = document.forms[0]; 
		//f.tnumber1.value = f.tnumber1.value;  
		numsum();
		numsumdifferent1();
		numsumdifferent2();
		average();
		average2();	
		
		var x ;
		x = parseFloat(f.per.value);
		f.per.value = x.toFixed(1);
		
		x = parseFloat(f.per2.value);
		f.per2.value = x.toFixed(1);
	}

</script>
<!-- 檢查空值 -->
<script language="JavaScript">
	
	function toCheck() 
	{
		var flag = 1;
		var errmsg = "";
		
		if ( document.form.tnumber1.value == "" ) 
		{
			errmsg += "請填寫「今年全校教師人數」！\n";
			document.form.tnumber1.focus();
			flag = 0;
		}
		if ( document.form.tnumber2.value == "" ) 
		{
			errmsg += "請填寫「去年全校教師人數」！\n";
			document.form.tnumber2.focus();
			flag = 0;
		}
		if ( document.form.tnumber3.value == "" ) 
		{
			errmsg += "請填寫「前年全校教師人數」！\n";
			document.form.tnumber3.focus();
			flag = 0;
		}
		if ( document.form.ltnumber1.value == "" ) 
		{
			errmsg += "請填寫「今年教師異動人數：調入」！\n";
			document.form.ltnumber1.focus();
			flag = 0;
		}
		if ( document.form.ltnumber2.value == "" ) 
		{
			errmsg += "請填寫「去年教師異動人數：調入」！\n";
			document.form.ltnumber2.focus();
			flag = 0;
		}
		if ( document.form.ltnumber3.value == "" ) 
		{
			errmsg += "請填寫「前年教師異動人數：調入」！\n";
			document.form.ltnumber3.focus();
			flag = 0;
		}
		if ( document.form.ltnumber4.value == "" ) 
		{
			errmsg += "請填寫「今年教師異動人數：代理教師」！\n";
			document.form.ltnumber4.focus();
			flag = 0;
		}
		if ( document.form.ltnumber5.value == "" ) 
		{
			errmsg += "請填寫「去年教師異動人數：代理教師」！\n";
			document.form.ltnumber5.focus();
			flag = 0;
		}
		if ( document.form.ltnumber6.value == "" ) 
		{
			errmsg += "請填寫「前年教師異動人數：代理教師」！\n";
			document.form.ltnumber6.focus();
			flag = 0;
		}

		//驗證輸入的資料是否為數字
		var regex = /^[0-9]*$/;
		if (!(regex.test(document.form.tnumber1.value)))
		{
			errmsg += '「今年全校教師人數」須為正整數\n';
			document.form.tnumber1.focus();
			flag = 0;
		}
		if (!(regex.test(document.form.ltnumber1.value)))
		{
			errmsg += '「今年教師異動人數：調入」須為正整數\n';
			document.form.ltnumber1.focus();
			flag = 0;
		}
		if (!(regex.test(document.form.ltnumber2.value)))
		{
			errmsg += '「去年教師異動人數：調入」須為正整數\n';
			document.form.ltnumber2.focus();
			flag = 0;
		}
		if (!(regex.test(document.form.ltnumber4.value)))
		{
			errmsg += '「今年教師異動人數：代理教師」須為正整數\n';
			document.form.ltnumber4.focus();
			flag = 0;
		}
		if (!(regex.test(document.form.ltnumber5.value)))
		{
			errmsg += '「去年教師異動人數：代理教師」須為正整數\n';
			document.form.ltnumber5.focus();
			flag = 0;
		}
		if (!(regex.test(document.form.ltnumber7.value)))
		{
			errmsg += '「今年教師異動人數：其他教師」須為正整數\n';
			document.form.ltnumber7.focus();
			flag = 0;
		}
		if (!(regex.test(document.form.ltnumber8.value)))
		{
			errmsg += '「去年教師異動人數：其他教師」須為正整數\n';
			document.form.ltnumber8.focus();
			flag = 0;
		}
		
		/*
		//教師編制人數不為0
		if ( document.form.tnumber1.value == 0 ) 
		{
			errmsg += "「今年全校教師人數」不能為0！\n";
			document.form.tnumber1.focus();
			flag = 0;
		}*/
		
		var show_errmsg = 0; //警告欄位控制 1=顯示 0=隱藏
		//「本 學年度全校教師編制人數」與「去年 學年度全校教師編制人數」不超過±10%﹙40人以上才檢核﹚。
		var lastteacher = document.form.tnumber2.value;
		var lastteacher_min;
		var lastteacher_max;
		lastteacher_min = parseInt(parseInt(lastteacher,10) * 0.9,10);
		lastteacher_max = parseInt(parseInt(lastteacher,10) * 1.1,10);
		if ( document.form.tnumber1.value >= 40 ) 
		{
			if (document.form.tnumber1.value < lastteacher_min || document.form.tnumber1.value > lastteacher_max)
			{	
				show_errmsg = 1;
				document.form.page2_warning.value = "「103年全校教師編制人數與去年」比超過±10%，請填寫異動過大說明"
				
				if(document.form.page2_desc.value == "" ) //未填原因才顯示訊息
				{
					errmsg += '「103學年度全校教師編制人數」與「102學年度全校教師編制人數」不得超過±10%'+'﹙102年度全校教師40人以上才檢核﹚\n';
					flag = 0;
				}
			}
		}
		
		//全校學生數：本 學年度全校教師編制人數，比值不可＞20 或 ＜6﹙學生數100人以上才檢核﹚。
		var allstudent = <?=(($student == "")?0:$student);?>; //全校學生數
		var proportion;
		
		proportion = parseInt(allstudent / document.form.tnumber1.value,10);
			
		if (allstudent >= 100 && (proportion > 20 || proportion < 6))
		{	
			show_errmsg = 1;
			document.form.page2_warning.value = "「全學生數比教師編制數」比值＞20或＜6，請填寫異動過大說明"
			
			if(document.form.page2_desc.value == "" ) //未填原因才顯示訊息
			{	
				errmsg += '全校學生數：103學年度全校教師編制人數，比值不可＞20 或 ＜6 ﹙學生數100人以上才檢核﹚\n';
				flag = 0;
			}
		}
		
		//「教師異動人數」：「三學年度教師編制合計」不得＞0.5。
		var differentteacher = document.form.different.value;//教師異動人數
		var totalteacher = document.form.total.value; //合計教師
		if ((differentteacher / totalteacher > 0.5))
		{	
			show_errmsg = 1;
			document.form.page2_warning.value = "請填寫「教師流動率」＞50%，請異動過大說明"
			
			if(document.form.page2_desc.value == "" ) //未填原因才顯示訊息
			{	
				errmsg += '「教師流動率」不得＞50%\n';
				flag = 0;
			}
		}

		//「代理教師人數」：「三學年度教師編制合計」不得＞0.5。
		var different2teacher = document.form.different2.value;//教師異動人數,變數名稱差個2
		if ((different2teacher / totalteacher > 0.5))
		{	
			show_errmsg = 1;
			document.form.page2_warning.value = "請填寫「實缺教師代理率」＞50%，請異動過大說明"
			
			if(document.form.page2_desc.value == "" ) //未填原因才顯示訊息
			{	
				errmsg += '「實缺教師代理率」不得＞50%\n';
				flag = 0;
			}
		}
		
		//下方警告欄位控制
		if(show_errmsg == 1)
		{
			document.getElementById("alert").style.display="";//顯示
		}
		else
		{
			document.getElementById("alert").style.display="none";//隱藏
			document.form.page2_warning.value = "";
			document.form.page2_desc.value = "";	
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