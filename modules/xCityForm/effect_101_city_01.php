<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
//$_SESSION['ary']=$a;
?>
<INPUT TYPE="button" VALUE="回前頁" onClick="history.go(-1)">
<?
$username = $xoopsUser->getVar('uname');
global $xoopsDB;
$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
$result_city = $xoopsDB -> query($sql) or die($sql);
while($row = mysql_fetch_row($result_city)){
	$city = $row[1];
	$cityman = $row[2];
	$examine = $row[3];
	$cityno = $row[4];
}
$id = $_GET["id"]; //取回傳遞來的學校編號
echo $username."_";
echo $city."_";
echo $cityman;
//include "./checkdate.php";

//讀出縣市自評資料表
$sql_city = "select  *  from 101city_effect where city like '$city'";
$result_city = mysql_query($sql_city);
while($row = mysql_fetch_row($result_city)){
	$id   = $row[0]; //縣市編號
	$city = $row[1]; //縣市名稱
	$a1   = $row[2];
	$a2   = $row[3];
	$a3   = $row[4];
	$a4   = $row[5];
	$a5   = $row[6];
	$a6   = $row[7];
	$a7   = $row[8];
	$a8   = $row[9];
	$a9   = $row[10];
	$a10  = $row[11];
	$a11  = $row[12];
	$a12  = $row[13];
	$a13  = $row[14];
	$a14  = $row[15];
	$a15  = $row[16];
	$a16  = $row[17];
	$a17  = $row[18];
	$a18  = $row[19];
	$a19  = $row[20];
	$a20  = $row[21];
	$a21  = $row[22];
	$a22  = $row[23];
	$a23  = $row[24];
	$a24  = $row[25];
	$a25  = $row[26];
	$a26  = $row[27];
	$a27  = $row[28];
	$a28  = $row[29];
	$a29  = $row[30];
	$a30  = $row[31];
	$a31  = $row[32];
	$a32  = $row[33];
	$a33  = $row[34];
	$a34  = $row[35];
	$a35  = $row[36];
	$a36  = $row[37];
	$a37  = $row[38];
	$start  = $row[39];
	$end  = $row[40];
	$last  = $row[41];
//	$a = $row;
//	foreach($a as $value){
//		echo $value;
//	}
}
?> 
<p><a href="../../doc/101年度「推動教育優先區計畫」縣市自評表.doc"><img src="/edu/modules/xCityForm/images/download_02.gif" width="20" height="20" alt="下載" align="absmiddle" /> 縣市自評表電子檔下載</a> (建議從電子檔填妥後複製貼上)
<p>
<strong>101年度<? echo $city; ?>「推動教育優先區計畫」縣市自評表</strong><br />
<div align="center" style="background-color:#CCC">
<form name="form" method="post" action="effect_101_city_01_finish.php?city=<? echo $city;?>" >
  <table border="3" cellspacing="0" cellpadding="0">
    <tr align="center" valign="middle">
      <td width="100" height="40">自評項目</td>
      <td width="300" height="40">內 容</td>
      <td height="40">說  明</td>
    </tr>
    <tr>
      <td width="100" rowspan="3">說明會辦理情形</td>
      <td width="300" align="left" valign="top">
1.於<input name="a1" type="text" id="a1" value="<? echo $a1;?>" size="2" />年<input name="a2" type="text" id="a2" value="<? echo $a2;?>" size="2" />月<input name="a3" type="text" id="a3" value="<? echo $a3;?>" size="2" />日辦理說明會。<br />
參加校數<input name="a4" type="text" id="a4" onChange="change1()" value="<? echo number_format($a4);?>" size="4">所 / 總校數<input name="a5" type="text" id="a5" onChange="change2()" value="<? echo number_format($a5);?>" size="4">所，出席比例<input name="a6" type="text" id="a6" value="<? echo number_format($a6,2);?>" size="4">%。</td>
      <td rowspan="3" valign="top"><textarea name="a7" cols="30" rows="5" id="a7"><? echo $a7;?></textarea></td>
    </tr>
    <tr>
      <td width="300" align="left" valign="top">2.未出席說明會之學校處理情形。</td>
    </tr>
    <tr>
      <td width="300" align="left" valign="top">3.其他。</td>
    </tr>
    <tr>
      <td width="100" rowspan="4">協助學校申請情形</td>
      <td width="300" align="left" valign="top">1.提供範例供學校參考。</td>
      <td rowspan="4" valign="top"><textarea name="a8" cols="30" rows="5" id="a8"><? echo $a8;?></textarea></td>
    </tr>
    <tr>
      <td width="300" align="left" valign="top">2.提供專線協助學校立即處理問題。</td>
    </tr>
    <tr>
      <td width="300" align="left" valign="top">3.設置教育優先區輔導人員協助學校辦理申請事宜。</td>
    </tr>
    <tr>
      <td width="300" align="left" valign="top">4.其他</td>
    </tr>
    <tr>
      <td width="100" rowspan="5">縣市初審過程</td>
      <td width="300" align="left" valign="top">1.初審前召開審查說明會。</td>
      <td rowspan="5" valign="top"><textarea name="a9" cols="30" rows="5" id="a9"><? echo $a9;?></textarea></td>
    </tr>
    <tr>
      <td width="300" align="left" valign="top">2.初審委員留任比例達1/3以上。</td>
    </tr>
    <tr>
      <td width="300" align="left" valign="top">3.提供學校與初審委員溝通管道(如:電話、e-mail)。</td>
    </tr>
    <tr>
      <td width="300" align="left" valign="top">4.訂定審查原則，標準一致。</td>
    </tr>
    <tr>
      <td align="left" valign="top">5.其他</td>
    </tr>
    <tr>
      <td width="100" rowspan="4">縣市輔導機制</td>
      <td width="300" align="left" valign="top">1.經費收支與核結過程。</td>
      <td rowspan="4" valign="top"><textarea name="a10" cols="30" rows="5" id="a10"><? echo $a10;?></textarea></td>
    </tr>
    <tr>
      <td align="left" valign="top">2.縣市針對弱勢學生額外投入之經費。</td>
    </tr>
    <tr>
      <td align="left" valign="top">3.引進其他外部資源協助弱勢學生獲得更多資源之方式。</td>
    </tr>
    <tr>
      <td align="left" valign="top">4.其他</td>
    </tr>
    <tr>
      <td width="100" rowspan="5">縣市管考情形</td>
      <td width="300" align="left" valign="top">1.轉知學校教育部複核結果。</td>
      <td valign="top">
<label><input type="radio" name="a11"  value="1" id="1" <? if ($a11 == '1') echo 'checked';?>/>已正式發文</label>
        <br />
        　時間：
        <input name="a12" type="text" size="2" value="<? echo $a12;?>" />
        年
        <input name="a13" type="text" size="2" value="<? echo $a13;?>" />
        月
        <input name="a14" type="text" size="2" value="<? echo $a14;?>" />
        日<br />
        　發文文號：<input name="a15" type="text" size="20" value="<? echo $a15;?>" />
        <br />
<label><input type="radio" name="a11"  value="2" id="2" <? if ($a11 == '2') echo 'checked';?>/>未發出正式公文</label>
        <br />
        　原因：<input name="a16" type="text" size="25" value="<? echo $a16;?>" /></td>
    </tr>
    <tr>
      <td width="300" align="left" valign="top">2.組成管考小組督導各校執行情形。</td>
      <td rowspan="4" valign="top"><textarea name="a17" cols="30" rows="5"><? echo $a17;?></textarea></td>
    </tr>
    <tr>
      <td width="300" align="left" valign="top">3.追蹤需改進學校。</td>
    </tr>
    <tr>
      <td width="300" align="left" valign="top">4.101年度補助經費於102年2月底前完成核結。</td>
    </tr>
    <tr>
      <td width="300" align="left" valign="top">5.其他</td>
    </tr>
    <tr>
      <td width="100">其 他</td>
      <td colspan="2" align="left" valign="top"><textarea name="a18" cols="50" rows="5"><? echo $a18;?></textarea></td>
    </tr>
    <tr>
      <td width="100">實施困難或建議事項</td>
      <td colspan="2"><textarea name="a19" cols="50" rows="5"><? echo $a19;?></textarea></td>
    </tr>
  </table>
</div>
    <INPUT TYPE="button" VALUE=" 返回(取消) " onClick="history.go(-1)">
	<input type="submit" name="button" value=" 確認(Enter) " />
    　　　　　　　　　　　　最後更新：<? echo $last; ?>
<!-- 數值計算 -->
<script language="JavaScript">
//自動加總
function numsum() { 
	var f = document.forms[0]; 
	f.a6.value = (f.a4.value==""?0:parseFloat(f.a4.value)) / (f.a5.value==""?0:parseFloat(f.a5.value)) * 100; 
}

function change1() { 
	var f = document.forms[0]; 
	numsum();
}
function change2() { 
	var f = document.forms[0]; 
	numsum();
}
</script> 
</form>
<?php
//$_SESSION['ary']=$a;
include "../../footer.php";
?>