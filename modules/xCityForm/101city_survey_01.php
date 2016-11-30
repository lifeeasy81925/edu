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

//讀出縣市問卷資料
$sql = "select  *  from 101city_survey_01 where city like '$city'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$id   = $row[0]; //縣市編號
	$city = $row[1]; //縣市名稱
	$start = $row[8];
	$end = $row[9];
	$last = $row[10];
// 問卷資料
	$s01 = $row[11];
	$s02 = $row[12];
	$s03 = $row[13];
	$s04 = $row[14];
	$s05 = $row[15];
	$s06 = $row[16];
	$s07 = $row[17];
	$s08 = $row[18];
	$s09 = $row[19];
	$s10 = $row[20];
	$s11 = $row[21];
	$s12 = $row[22];
	$s13 = $row[23];
	$s14 = $row[24];
	$s15 = $row[25];
	$s16 = $row[26];
	$s17 = $row[27];
	$s18 = $row[28];
	$s19 = $row[29];
	$s20 = $row[30];
	$s21 = $row[31];
	$s22 = $row[32];
	$s23 = $row[33];
	$s24 = $row[34];
	$s25 = $row[35];
	$s26 = $row[36];
	$s27 = $row[37];
	$s28 = $row[38];
	$s29 = $row[39];
	$s30 = $row[40];
	$s31 = $row[41];
	$s32 = $row[42];
	$s33 = $row[43];
	$s34 = $row[44];
	$s35 = $row[45];
	$s36 = $row[46];
	$s37 = $row[47];
	$s38 = $row[48];
	$s39 = $row[49];
	$s40 = $row[50];
	$s41 = $row[51];
	$s42 = $row[52];
	$s43 = $row[53];
	$s44 = $row[54];
	$s45 = $row[55];
	$s46 = $row[56];
	$s47 = $row[57];
	$s48 = $row[58];
	$s49 = $row[59];
	$s50 = $row[60];

}
?>
<p><a href="../../doc/101city_survey.doc"><img src="/edu/modules/xCityForm/images/download_02.gif" width="20" height="20" alt="下載" align="absmiddle" /> 101年度推動教育優先區計畫調查問卷--縣市 電子檔下載</a>
<p><strong>　101年度推動教育優先區計畫調查問卷--<? echo $city.$district.$name; ?></strong>
<table width="650" border="3" cellspacing="0" cellpadding="0">
  <tr>
    <td><table border="0" cellspacing="0" cellpadding="0" width="650">
      <tr>
        <td colspan="3" valign="top">敬愛的縣（市）承辦科長：您好<br />
　本問卷之主要目的，在於瞭解　貴縣（市）101年度執行推動教育優先區計畫的情形，敬請撥冗填寫，惠賜卓見。謝謝您的協助。耑此<br />
　敬祝 平安快樂！<br /></td>
      </tr>
      <tr>
        <td width="130" valign="top"><p><br />
        </p></td>
        <td width="380" valign="top">計畫主持人  國立臺中教育大學教育學系副教授  　<br />
          協同主持人  國立臺中教育大學教育學系副教授  　<br />
          協同主持人  臺北市內湖區東湖國小主任　　　　</td>
        <td width="110" valign="top">侯世昌<br />
          楊銀興<br />
          官聖政　敬啟</td>
      </tr>
    </table></td>
  </tr>
</table>
<p>
<form name="form" method="post" action="101city_survey_01_finish.php" >
<table border="0" cellspacing="0" cellpadding="0" width="650">
      <tr>
        <td valign="top">
【填答說明】<br />
　本問卷為瞭解　貴縣（市）101年度執行推動教育優先區計畫的情形，包含單選題、複選題及開放性問題。單選題及複選題請就題意在選項□處打勾，開放性問題請以文字敘述方式填寫您的寶貴意見。<br /><br />
		</td>
      </tr>
      <tr>
        <td valign="top">
【第一部分：基本資料】<br /><br />
		</td>
      </tr>
      <tr>
        <td>
1.100年度<br />
　(1) 100年度縣市政府決算數額<input name="s01" type="text" size="20" value="<? echo $s01;?>">元。<br />
　(2) 100年度縣市政府教育經費決算數額<input name="s02" type="text" size="20" value="<? echo $s02;?>">元。<br />
　(3) 100年度縣市政府教育經費之人事費<input name="s03" type="text" size="20" value="<? echo $s03;?>">元。<br /><br />
		</td>
      </tr>
      <tr>
        <td>
2.101年度<br />
　(1) 101年度縣市政府總預算<input name="s04" type="text" size="20" value="<? echo $s04;?>">元。<br />
　(2) 101年度縣市政府教育經費預算<input name="s05" type="text" size="20" value="<? echo $s05;?>">元。<br />
　(3) 101年度縣市政府教育經費之人事費<input name="s06" type="text" size="20" value="<? echo $s06;?>">元。<br />
        </td>
      </tr>
      <tr>
        <td>
<br />【第二部分：執行情形與建議】<br /><br />
		</td>
      </tr>
      <tr>
        <td>
1.推動教育優先區計畫從過去書面申請改以網路方式申請，較為簡便：<br />
<label><input type="radio" name="s07"  value="1" id="1" <? if ($s07 == '1') echo 'checked';?>/>是</label><br />
<label><input type="radio" name="s07"  value="2" id="2" <? if ($s07 == '2') echo 'checked';?>/>否</label>，請說明原因：<input name="s08" type="text" size="40" value="<? echo $s08;?>"><br /><br />
		</td>
      </tr>
      <tr>
        <td>
2.推動教育優先區計畫從過去書面申請改以網路方式申請，較為省時：<br />
<label><input type="radio" name="s09"  value="1" id="1" <? if ($s09 == '1') echo 'checked';?>/>是</label><br />
<label><input type="radio" name="s09"  value="2" id="2" <? if ($s09 == '2') echo 'checked';?>/>否</label>，請說明原因：<input name="s10" type="text" size="40" value="<? echo $s10;?>"><br /><br />
        </td>
      </tr>
      <tr>
        <td>
3.推動教育優先區計畫從過去書面審查改以網路方式審查，較為簡便：<br />
<label><input type="radio" name="s11"  value="1" id="1" <? if ($s11 == '1') echo 'checked';?>/>是</label><br />
<label><input type="radio" name="s11"  value="2" id="2" <? if ($s11 == '2') echo 'checked';?>/>否</label>，請說明原因：<input name="s12" type="text" size="40" value="<? echo $s12;?>"><br /><br />
        </td>
      </tr>
      <tr>
        <td>
4.推動教育優先區計畫從過去書面審查改以網路方式審查，較為省時：<br />
<label><input type="radio" name="s13"  value="1" id="1" <? if ($s13 == '1') echo 'checked';?>/>是</label><br />
<label><input type="radio" name="s13"  value="2" id="2" <? if ($s13 == '2') echo 'checked';?>/>否</label>，請說明原因：<input name="s14" type="text" size="40" value="<? echo $s14;?>"><br /><br />
        </td>
      </tr>
      <tr>
        <td>
5.推動教育優先區計畫填報審查網站使資料查詢更加便利：<br />
<label><input type="radio" name="s15"  value="1" id="1" <? if ($s15 == '1') echo 'checked';?>/>是</label><br />
<label><input type="radio" name="s15"  value="2" id="2" <? if ($s15 == '2') echo 'checked';?>/>否</label>，請說明原因：<input name="s16" type="text" size="40" value="<? echo $s16;?>"><br /><br />
        </td>
      </tr>
      <tr>
        <td>
6.推動教育優先區計畫填報審查網站使資料彙整更加便利：<br />
<label><input type="radio" name="s17"  value="1" id="1" <? if ($s17 == '1') echo 'checked';?>/>是</label><br />
<label><input type="radio" name="s17"  value="2" id="2" <? if ($s17 == '2') echo 'checked';?>/>否</label>，請說明原因：<input name="s18" type="text" size="40" value="<? echo $s18;?>"><br /><br />
        </td>
      </tr>
      <tr>
        <td>
7.推動教育優先區計畫若提供優良學校申請範例，做為學校申請之參考，是否有幫助：<br />
<label><input type="radio" name="s19"  value="1" id="1" <? if ($s19 == '1') echo 'checked';?>/>是</label><br />
<label><input type="radio" name="s19"  value="2" id="2" <? if ($s19 == '2') echo 'checked';?>/>否</label>，請說明原因：<input name="s20" type="text" size="40" value="<? echo $s20;?>"><br /><br />
        </td>
      </tr>
      <tr>
        <td>
8.推動教育優先區計畫若提供辦理績優學校案例，做為學校申請之參考，是否有幫助：<br />
<label><input type="radio" name="s21"  value="1" id="1" <? if ($s21 == '1') echo 'checked';?>/>是</label><br />
<label><input type="radio" name="s21"  value="2" id="2" <? if ($s21 == '2') echo 'checked';?>/>否</label>，請說明原因：<input name="s22" type="text" size="40" value="<? echo $s22;?>"><br /><br />
        </td>
      </tr>
      <tr>
        <td>
9.推動教育優先區計畫分為指標審查及補助項目審查，您認為指標審查是否必要？<br />
<label><input type="radio" name="s23"  value="1" id="1" <? if ($s23 == '1') echo 'checked';?>/>是</label><br />
<label><input type="radio" name="s23"  value="2" id="2" <? if ($s23 == '2') echo 'checked';?>/>否</label>，請說明原因：<input name="s24" type="text" size="40" value="<? echo $s24;?>"><br /><br />
        </td>
      </tr>
      <tr>
        <td>
10.補助項目四修繕離島或偏遠地區師生宿舍，您認為申請對象應為：<br />
<label><input type="radio" name="s25"  value="1" id="1" <? if ($s25 == '1') echo 'checked';?>/>僅限離島或偏遠地區</label><br />
<label><input type="radio" name="s25"  value="2" id="2" <? if ($s25 == '2') echo 'checked';?>/>所有地區</label><br /><br />
        </td>
      </tr>
      <tr>
        <td>
11.目前教育部推動教育優先區計畫入口網站包含：最新消息、常見問題、問卷調查、系統或操作問題反應、相關網站、填報系統、審查系統、查詢系統及成效評估等內容，您認為未來尚須增加哪些項目（可複選）：<br />
<label><input type="checkbox" name="s26"  value="1" <? if ($s26 == '1') echo 'checked';?>/>成果案例分享</label><br />
<label><input type="checkbox" name="s27"  value="1" <? if ($s27 == '1') echo 'checked';?>/>學校申請歷史區</label><br />
<label><input type="checkbox" name="s28"  value="1" <? if ($s28 == '1') echo 'checked';?>/>教育部歷年度推動教育優先區計畫</label><br />
<label><input type="checkbox" name="s29"  value="1" <? if ($s29 == '1') echo 'checked';?>/>其他，</label><input name="s30" type="text" size="40" value="<? echo $s30;?>"><br /><br />
        </td>
      </tr>
      <tr>
        <td>
12.目前教育部推動教育優先區計畫網站查詢系統，您認為縣市入口應有哪些查詢項目？<br />
<textarea name="s31" cols="70" rows="3" ><? echo $s31;?></textarea><br /><br />
        </td>
      </tr>
      <tr>
        <td>
13.貴縣（市）在推動及執行教育優先區計畫上，主要問題及困難為何？<br />
<textarea name="s32" cols="70" rows="3" ><? echo $s32;?></textarea><br /><br />
        </td>
      </tr>
      <tr>
        <td>
14.貴縣（市）對教育部推動教育優先區計畫內容及執行方式之建議事項？<br />
<textarea name="s33" cols="70" rows="3" ><? echo $s33;?></textarea><br /><br />
        </td>
      </tr>
      <tr>
        <td align="center">
本問卷到此結束，非常感謝您的協助！<br /><br />
        </td>
  </tr>
</table>

<INPUT TYPE="button" VALUE=" 返回(取消) " onClick="history.go(-1)">
<input type="submit" name="button" value=" 確認(Enter) " />
    　　　　　　　　　　　　最後更新：<? echo $last; ?>

<!-- 數值計算 -->
<script language="JavaScript">
//自動加總
function numsum() { 
	var f = document.forms[0]; 
	f.a3.value = (f.a1.value==""?0:parseFloat(f.a1.value)) / (f.a2.value==""?0:parseFloat(f.a2.value)) * 100; 
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