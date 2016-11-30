<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
include "./checkdate.php";
include "./checkmail.php";

$sql = "select  *  from 102schooldata where account like '$username'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$id = $row[0]; //帳號
	$type = $row[1]; //學校型態
	$city = $row[2]; //縣市
	$district = $row[4]; //區
	$school = $row[5]; //學校名稱
	$area = $row[109]; //學校所在區域
	$allstudent = $row[100]; //allstudent
	
	$aborigine = $row[113]; //原住民
	$a = $row[114];//低收
	$b = $row[115];//隔代
	$c = $row[116];//親子差距
	$d = $row[117];//新移民
	$e = $row[119];//abcde
	$f = $row[120];//abcdef
	$g = $row[118];//單寄親
	$h = $row[124]; //輟學
	$i = $row[100]; //在籍學生
	$j = $row[122]; //去年國三畢業生人數
	$k = $row[123]; //PR值≦25學生數 
	$a045 = $row[45]; //去年不含原住民
	$a046 = $row[46]; //去年含原住民
	$a147 = $row[147]; //學校資料頁面一檢核說明
	$a148 = $row[148]; //學校資料頁面二檢核說明
	$a149 = $row[149]; //學校資料頁面三檢核說明
	$a189 = $row[189]; //學校資料頁面一檢核項目
	$a190 = $row[190]; //學校資料頁面二檢核項目
	$a191 = $row[191]; //學校資料頁面三檢核項目
	
	$a039 = $row[39]; //去年原住民學生數
}		
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="回上一頁" onclick="history.go(-1)">

<form name="form" method="post" action="102schooldata_3_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><font color="blue"><strong>目標學生資料</strong></font>
<p>
<b>一、目標學生數</b>  <input type="button" name="Submit" value="下載目標學生名冊範例檔案" onclick="location.href='./download/目標學生名冊_模擬範例.xls'"> <input type="button" name="Submit" value="下載目標學生空白名冊" onclick="location.href='./download/目標學生名冊_空白.xls'">
<p>
※本校目標學生數（不含僅符合原住民身分學生）共：
  <input type="text" size="6" name="abcd" value="<? if( $e=='') echo ''; else echo $e;?>"/>人<br />
<font color=blue>　（各類目標學生若同時符合原住民與其他身分，應計入統計，但不含僅符合原住民身分學生）</font><br>
※本校目標學生數（含原住民）共：<input type="text" size="6" name="abcde" value="<? if( $f=='') echo ''; else echo $f;?>"/>人<br />
<font color=blue>　（各類目標學生總人數，若具備多種身分，僅計算一人）</font>
<p style="margin-left: 3em; text-indent: -3em">
說明：例如學生甲，同時具備A、B、C三種身分，統計A~C項目時，學生甲皆需計入統計；但在本校目標學生加總時，學生甲僅計算1人。</p>
<p style="margin-left: 1em; text-indent: -1em">
※其中具備下列身分者<font color=blue>（同一學生，不限定一種身分）</font>：<br />
A.低收入學生數：<input type="text" size="6" name="lowincome" value="<? if( $a=='') echo ''; else echo $a;?>"/>人<br>
B.隔代教養學生數：<input type="text" size="6" name="single" value="<? if( $b=='') echo ''; else echo $b;?>"/>人<br>
C.親子年齡差距45歲以上學生數：<input type="text" size="6" name="difference" value="<? if( $c=='') echo ''; else echo $c;?>"/>人<br>
D.新移民子女學生數：<input type="text" size="6" name="immigrant" value="<? if( $d=='') echo ''; else echo $d;?>"/>人<br>
E.單(寄)親家庭學生數：
                 <input type="text" size="6" name="noparent" value="<? if( $g=='') echo ''; else echo $g;?>"/>人<br>
F.原住民學生數：<input type="text" size="6" name="aborigine" value="<? if( $aborigine=='') echo ''; else echo $aborigine;?>"/>人
</p>
<p>
<b>二、學習弱勢及中途輟學學生</b>
<p>
※去(100)學年度中途輟學學生數：<input type="text" size="6" name="leaving" value="<? if( $h=='') echo ''; else echo $h;?>"/>人
<p>
<? if ($type == "1") echo "<!--"; ?>
※去(100)學年度國三畢業生人數：<input type="text" size="6" name="graduate" value="<? if( $j=='') echo ''; else echo $j;?>" style="border:0px; text-align: right;" readonly />人<br />
※去(100)學年度第一次學測成績PR值≦25學生數：<input type="text" size="6" name="pr" value="<? if( $k=='') echo ''; else echo $k;?>"/>人<br />
<font color=blue>　（因多元入學方案取得高中職入學資格，而未參加第一次基測學生除外）</font>

<? if ($type == "1") echo "-->"; ?>
<!--檢核警示訊息-->
<!--去年原住民資料庫欄位為a039-->
<div id="alert" style="display:<? if($a149=="") echo 'none';?>;">
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" style="background-color:#FC9">資料檢核警示訊息視窗</td>
  </tr>
  <tr>
    <td>
<font color="#FF0000">警示訊息：<textarea name="a191" cols=70% rows="2" style="border:0px; text-align: left;" readonly><? if( $a191=="") echo ""; else echo $a191;?></textarea>

※若確定填寫無誤，請說明異動過大原因：(若未填寫，無法「儲存並到下一頁」)<br />
<textarea name="a149" cols=70% rows="2"><? if( $a149=="") echo ""; else echo $a149;?></textarea>
<font color=blue>※目標學生資料出現警訊，「上傳檔案區」應上傳檔案將加入「目標學生名冊」。</font>
    </td>
  </tr>
</table>
</div>


<br />
<INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
<input type="submit" name="button" value="儲存並到下一頁" />

<!-- 檢查空值 -->
<script language="JavaScript">
function toCheck() 
{
	var flag = 1;
	var errmsg = "";
	
	if ( document.form.lowincome.value == "" ) 
	{
		errmsg += "請填寫「低收入學生數」！\n";
		document.form.lowincome.focus();
		flag = 0;
	}
	if ( document.form.noparent.value == "" ) 
	{
		errmsg += "請填寫「隔代教養學生數」！\n";
		document.form.noparent.focus();
		flag = 0;
	}
	if ( document.form.difference.value == "" ) 
	{
		errmsg += "請填寫「親子年齡差距45歲以上學生數」！\n";
		document.form.difference.focus();
		flag = 0;
	}
	if ( document.form.immigrant.value == "" ) 
	{
		errmsg += "請填寫「新移民子女學生數」！\n";
		document.form.immigrant.focus();
		flag = 0;
	}
	if ( document.form.single.value == "" ) 
	{
		errmsg += "請填寫「單親家庭學生數」！\n";
		document.form.single.focus();
		flag = 0;
	}
	if ( document.form.aborigine.value == "" ) 
	{
		errmsg += "請填寫「原住民生數」！\n";
		document.form.aborigine.focus();
		flag = 0;
	}
	if ( document.form.abcd.value == "" ) 
	{
		errmsg += "請填寫「本校目標學生數（不含原住民）」！\n";
		document.form.abcd.focus();
		flag = 0;
	}
	if ( document.form.abcde.value == "" ) 
	{
		errmsg += "請填寫「本校目標學生數（含原住民）」！\n";
		document.form.abcde.focus();
		flag = 0;
	}

	//驗證輸入的資料是否為數字
	var regex = /^[0-9]*$/;
	if (!(regex.test(document.form.abcd.value)))
	{
		errmsg += '「目標學生數（不含原住民）」須為正整數\n';
		document.form.abcd.focus();
		flag = 0;
	}
	if (!(regex.test(document.form.abcde.value)))
	{
		errmsg += '「目標學生數（含原住民）」須為正整數\n';
		document.form.abcde.focus();
		flag = 0;
	}
	if (!(regex.test(document.form.lowincome.value)))
	{
		errmsg += '「低收入學生數」須為正整數\n';
		document.form.lowincome.focus();
		flag = 0;
	}
	if (!(regex.test(document.form.single.value)))
	{
		errmsg += '「隔代教養學生數」須為正整數\n';
		document.form.single.focus();
		flag = 0;
	}
	if (!(regex.test(document.form.difference.value)))
	{
		errmsg += '「親子年齡差距45歲以上學生數」須為正整數\n';
		document.form.difference.focus();
		flag = 0;
	}
	if (!(regex.test(document.form.immigrant.value)))
	{
		errmsg += '「新移民子女學生數」須為正整數\n';
		document.form.immigrant.focus();
		flag = 0;
	}
	if (!(regex.test(document.form.noparent.value)))
	{
		errmsg += '「單(寄)親家庭學生數」須為正整數\n';
		document.form.noparent.focus();
		flag = 0;
	}
	if (!(regex.test(document.form.aborigine.value)))
	{
		errmsg += '「原住民學生數」須為正整數\n';
		document.form.aborigine.focus();
		flag = 0;
	}

	//「原住民學生數」與去年比較超過±20% (原住民學生數佔全校學生總數15%以上或達到35人以上才檢核)
	var allstudent = <?=$allstudent;?>; //全校總學生數
	if ( document.form.aborigine.value >= 35 || document.form.aborigine.value >= (parseInt(allstudent) * 0.15) ) 
	{
		var lastaborigine = <?=$a039;?>; //去年原住民學生數
		var lastaborigine_min;
		var lastaborigine_max;
		lastaborigine_min = parseInt(parseInt(lastaborigine,10) * 0.8,10);
		lastaborigine_max = parseInt(parseInt(lastaborigine,10) * 1.2,10);

		if (document.form.aborigine.value < lastaborigine_min || document.form.aborigine.value > lastaborigine_max)
		{
			if	(document.form.a149.value == "" )
			{
				document.getElementById("alert").style.display="";//顯示
				document.form.a191.value = "「去年今年原住民學生數比」超過±20%，請填寫異動過大說明\n"
				errmsg += '您填寫今年「原住民學生數」:'+document.form.aborigine.value+'人\n'
					   +'與資料庫去年「原住民學生數」:'+lastaborigine+'人 比較超過±20%\n'+'(原住民學生數佔全校學生總數15%以上或達到35人以上才檢核)\n';
				flag = 0;
				
				
			}
		}
		

	}

	   
	var lastabcd = <?=$a045;?>; //去年目標學生數(不含原住民)
	var lastabcd_min;
	var lastabcd_max;
	lastabcd_min = parseInt(parseInt(lastabcd,10) * 0.8,10);
	lastabcd_max = parseInt(parseInt(lastabcd,10) * 1.2,10);
				
	//「本校目標學生數(不含原住民)」與去年比較超過±20%(佔全校學生總數20%以上或60人以上才檢核)。
	if ( (document.form.abcd.value >= 60 || document.form.abcd.value >= (parseInt(allstudent) * 0.2)) && (document.form.abcd.value < lastabcd_min || document.form.abcd.value > lastabcd_max)) 
	{
		if	(document.form.a149.value == "" )
		{   
			document.getElementById("alert").style.display="";//顯示
			document.form.a191.value = "「目標學生數(不含原住民)欄與去年」比超過±20%，請填寫異動過大說明"
			errmsg += '「目標學生數(不含原住民)」欄與去年('+lastabcd+'人)比較超過±20%\n';
			document.form.abcd.focus();
			flag = 0;
		}

	}
	/*else
	{
		document.getElementById("alert").style.display="none";//隱藏
		
	}*/
	//「本校目標學生數(含原住民)」與去年比較超過±20%(佔全校學生總數30%以上才檢核)。
	var lastabcde = <?=$a046;?>; //去年目標學生數(含原住民)
	var lastabcde_min;
	var lastabcde_max;
	lastabcde_min = parseInt(parseInt(lastabcde,10) * 0.8,10);
	lastabcde_max = parseInt(parseInt(lastabcde,10) * 1.2,10);
	
	if (document.form.abcde.value >= (parseInt(allstudent) * 0.3) && (document.form.abcde.value < lastabcde_min || document.form.abcde.value > lastabcde_max)) 
	{
		if	(document.form.a149.value == "" )
		{			
			document.getElementById("alert").style.display="";//顯示
			document.form.a191.value = "「目標學生數(含原住民)欄與去年」比超過±20%，請填寫異動過大說明"
			errmsg += '「目標學生數(含原住民)」欄與去年('+lastabcde+'人)比較超過±20%\n';
			document.form.abcde.focus();
			flag = 0;
		}
	}

	/*
	if ( document.form.abcd.value * 1 > <? echo $allstudent;?>*1 ) {
	errmsg += '「目標學生數(不含原住民)」不得大於學生總數！\n'+'全校學生總數：'+<? echo $allstudent;?>);
	document.form.abcd.focus();
	flag = 0;
	}	
	if ( document.form.abcde.value*1 > <? echo $allstudent;?>*1 ) {
	errmsg += '「目標學生數(含原住民)」不得大於學生總數！\n'+'全校學生總數：'+<? echo $allstudent;?>);
	document.form.abcde.focus();
	flag = 0;
	}
	*/
	
	
	
	if ( document.form.abcd.value*1 > document.form.abcde.value*1 ) {
		errmsg += '「目標學生數(不含原住民)」不得大於「目標學生數(含原住民)」！\n';
		flag = 0;
	}

	if ( document.form.leaving.value == "" ) 
	{
		errmsg += "請填寫「中途輟學學生數」！\n";
		document.form.leaving.focus();
		flag = 0;
	}
	if (!(regex.test(document.form.leaving.value)))
	{
		errmsg += '「中途輟學學生數」須為正整數\n';
		document.form.leaving.focus();
		flag = 0;
	}
//「A、B、C、D、E 」任一身分學生數不得大於「目標學生數(不含原住民)」
/*	if ((document.form.noparent.value*1 > document.form.abcd.value*1)) 
	{	
			if	(document.form.a149.value == "" )
			{			
				document.getElementById("alert").style.display="";//顯示
				document.form.a191.value = "請填寫異動過大說明"
				errmsg += '「A、B、C、D、E 」任一身分學生數不得大於「目標學生數(不含原住民)」！\n' 
				+ 'A:_' + document.form.lowincome.value + '_\n'
				+ 'B:_' + document.form.single.value + '_\n' 
				+ 'C:_' + document.form.difference.value + '_\n' 
				+ 'D:_' + document.form.immigrant.value + '_\n' 
				+ 'E:_' + document.form.noparent.value + '_\n' 
				+ 'ABCDE:_' + document.form.abcd.value + '_\n' 
				+ 'ABCDEF:_' + document.form.abcde.value + '_\n'
				+ '55555555555555555555555555555555555555\n';

				flag = 0;
			}
	}*/
/*	if ((document.form.lowincome.value*1 > document.form.abcd.value*1) || (document.form.noparent.value*1 > document.form.abcd.value*1) || (document.form.difference.value*1 > document.form.abcd.value*1) || (document.form.immigrant.value*1 > document.form.abcd.value*1) || (document.form.single.value*1 > document.form.abcd.value*1))
	{
	
			if	(document.form.a149.value == "" )
			{			
				document.getElementById("alert").style.display="";//顯示
				document.form.a191.value = "請填寫異動過大說明"
				errmsg += '「A、B、C、D、E 」任一身分學生數不得大於「目標學生數(不含原住民)」！\n'
				+'A:_'+document.form.lowincome.value+'_\n'
				+'B:_'+document.form.single.value+'_\n' 
				+'C:_'+document.form.difference.value+'_\n '
				+'D:_'+document.form.immigrant.value+'_\n'
				+'E:_'+document.form.noparent.value+'_\n '
				
				+'ABCDE:_'+document.form.abcd.value+'_\n '
				+'ABCDEF:_'+document.form.abcde.value+'_\n';
				flag = 0;
			}
	}
*/
	//「A、B、C、D、E 」任一身分學生數不得大於「目標學生數(含原住民)」
	if ((document.form.lowincome.value*1 > document.form.abcde.value*1) || (document.form.noparent.value*1 > document.form.abcde.value*1) || (document.form.difference.value*1 > document.form.abcde.value*1) || (document.form.immigrant.value*1 > document.form.abcde.value*1) || (document.form.single.value*1 > document.form.abcde.value*1)) 
	{
			if	(document.form.a149.value == "" )
			{			
				document.getElementById("alert").style.display="";//顯示
				document.form.a191.value = "請填寫異動過大說明"
		        errmsg += '「A、B、C、D、E、F」任一身分學生數不得大於「目標學生數(含原住民)」！\n';
		        flag = 0;		
	        }
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
<?php include "../xSchoolForm/print_button.php"; ?>
</form>
<?php include "../../footer.php"; ?>