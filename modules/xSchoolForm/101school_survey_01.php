<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
//include "./checkdate.php";
//$date = date ("Y-m-d" , mktime(date('Y-m-d')));
$date = date("Y-m-d");
echo "【今天日期：";
echo $date."】";
?>
<INPUT TYPE="button" VALUE="回前頁" onClick="history.go(-1)">
<? //教育部核定金額
$sql = "select  *  from 101school_survey_01 where account like '$username'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$account = $row[0];
	$type = $row[1];
	$city = $row[2];
	$district = $row[3];
	$name = $row[4];
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
<p><a href="../../doc/101school_survey.doc"><img src="/edu/modules/xCityForm/images/download_02.gif" width="20" height="20" alt="下載" align="absmiddle" /> 101年度推動教育優先區計畫調查問卷--學校 電子檔下載</a>
<p><strong>　101年度推動教育優先區計畫調查問卷--<? echo $city.$district.$name; ?></strong>
<table width="650" border="3" cellspacing="0" cellpadding="0">
  <tr>
    <td><table border="0" cellspacing="0" cellpadding="0" width="650">
      <tr>
        <td colspan="3" valign="top">敬愛的主任：您好 <br />
　本問卷之主要目的，在於瞭解您對教育部推動教育優先區計畫的看法，調查結果將作為教育部推動教育優先區計畫之重要參考，敬請由您撥冗詳實填寫。謝謝您的合作。耑此<br />
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
<form name="form" method="post" action="101school_survey_01_finish.php" >
<table border="0" cellspacing="0" cellpadding="0" width="650">
      <tr>
        <td valign="top">
【填答說明】<br />
本問卷分為對推動教育優先區計畫補助項目、執行過程及成效評估的看法，包含單選題、複選題及開放性問題。單選題及複選題請就題意在選項□處打勾，開放性問題請以文字敘述方式填寫您的寶貴意見。<br /><br />
		</td>
      </tr>
      <tr>
        <td valign="top">
1.您是否同意補助項目一推展親職教育活動，由目前每年審查一次改為多年期補助？<br />
<label><input type="radio" name="s01"  value="1" id="1" <? if ($s01 == '1') echo 'checked';?>/>是</label><br />
<label><input type="radio" name="s01"  value="2" id="2" <? if ($s01 == '2') echo 'checked';?>/>否</label>，請說明原因：<input name="s02" type="text" size="40" value="<? echo $s02;?>"><br /><br />
		</td>
      </tr>
      <tr>
        <td valign="top">
2.您是否同意補助項目三補助學校發展教育特色（包含發展原住民教育文化特色），由目前每年審查一次改為多年期補助？<br />
<label><input type="radio" name="s03"  value="1" id="1" <? if ($s03 == '1') echo 'checked';?>/>是</label><br />
<label><input type="radio" name="s03"  value="2" id="2" <? if ($s03 == '2') echo 'checked';?>/>否</label>，請說明原因：<input name="s04" type="text" size="40" value="<? echo $s04;?>"><br /><br />
        </td>
      </tr>
      <tr>
        <td valign="top">
3.推動教育優先區計畫從過去書面申請改以網路方式申請，較為簡便：<br />
<label><input type="radio" name="s05"  value="1" id="1" <? if ($s05 == '1') echo 'checked';?>/>是</label><br />
<label><input type="radio" name="s05"  value="2" id="2" <? if ($s05 == '2') echo 'checked';?>/>否</label>，請說明原因：<input name="s06" type="text" size="40" value="<? echo $s06;?>"><br /><br />
        </td>
      </tr>
      <tr>
        <td valign="top">
4.推動教育優先區計畫從過去書面申請改以網路方式申請，較為省時：<br />
<label><input type="radio" name="s07"  value="1" id="1" <? if ($s07 == '1') echo 'checked';?>/>是</label><br />
<label><input type="radio" name="s07"  value="2" id="2" <? if ($s07 == '2') echo 'checked';?>/>否</label>，請說明原因：<input name="s08" type="text" size="40" value="<? echo $s08;?>"><br /><br />
        </td>
      </tr>
      <tr>
        <td valign="top">
5.推動教育優先區計畫從過去書面審查改以網路方式審查，較為簡便：<br />
<label><input type="radio" name="s09"  value="1" id="1" <? if ($s09 == '1') echo 'checked';?>/>是</label><br />
<label><input type="radio" name="s09"  value="2" id="2" <? if ($s09 == '2') echo 'checked';?>/>否</label>，請說明原因：<input name="s10" type="text" size="40" value="<? echo $s10;?>"><br /><br />
        </td>
      </tr>
      <tr>
        <td valign="top">
6.推動教育優先區計畫從過去書面審查改以網路方式審查，較為省時：<br />
<label><input type="radio" name="s11"  value="1" id="1" <? if ($s11 == '1') echo 'checked';?>/>是</label><br />
<label><input type="radio" name="s11"  value="2" id="2" <? if ($s11 == '2') echo 'checked';?>/>否</label>，請說明原因：<input name="s12" type="text" size="40" value="<? echo $s12;?>"><br /><br />
        </td>
      </tr>
      <tr>
        <td valign="top">
7.推動教育優先區計畫若提供優良學校申請範例，做為學校申請之參考，是否有幫助：<br />
<label><input type="radio" name="s13"  value="1" id="1" <? if ($s13 == '1') echo 'checked';?>/>是</label><br />
<label><input type="radio" name="s13"  value="2" id="2" <? if ($s13 == '2') echo 'checked';?>/>否</label>，請說明原因：<input name="s14" type="text" size="40" value="<? echo $s14;?>"><br /><br />
        </td>
      </tr>
      <tr>
        <td valign="top">
8.推動教育優先區計畫若提供辦理績優學校案例，做為學校申請之參考，是否有幫助：<br />
<label><input type="radio" name="s15"  value="1" id="1" <? if ($s15 == '1') echo 'checked';?>/>是</label><br />
<label><input type="radio" name="s15"  value="2" id="2" <? if ($s15 == '2') echo 'checked';?>/>否</label>，請說明原因：<input name="s16" type="text" size="40" value="<? echo $s16;?>"><br /><br />
        </td>
      </tr>
      <tr>
        <td valign="top">
9.推動教育優先區計畫補助項目中，對於改善學童文化刺激不足問題，請依幫助程度由大到小依序排列（1為第一重要，2為第二重要，以下類推）：<br />
<input name="s17" type="text" size="3" value="<? echo $s17;?>">‧推展親職教育活動<br />
<input name="s18" type="text" size="3" value="<? echo $s18;?>">‧補助原住民及離島地區學校辦理學生學習輔導<br />
<input name="s19" type="text" size="3" value="<? echo $s19;?>">‧補助學校發展教育特色<br />
<input name="s20" type="text" size="3" value="<? echo $s20;?>">‧修繕離島或偏遠地區師生宿舍<br />
<input name="s21" type="text" size="3" value="<? echo $s21;?>">‧充實學校基本教學設備<br />
<input name="s22" type="text" size="3" value="<? echo $s22;?>">‧發展原住民教育文化特色及充實設備器材<br />
<input name="s23" type="text" size="3" value="<? echo $s23;?>">‧補助交通不便地區學校交通車<br />
<input name="s24" type="text" size="3" value="<? echo $s24;?>">‧整修學校社區化之活動場所<br /><br />
        </td>
      </tr>
      <tr>
        <td valign="top">
10.在縣市召開計畫說明會時，您認為哪些措施有助於學校了解推動教育優先區計畫內容及申請審查程序（可複選）:<br />
<label><input type="checkbox" name="s25"  value="1" <? if ($s25 == '1') echo 'checked';?>/>請教育部複審委員列席說明</label><br />
<label><input type="checkbox" name="s26"  value="1" <? if ($s26 == '1') echo 'checked';?>/>請縣市初審委員出席說明</label><br />
<label><input type="checkbox" name="s27"  value="1" <? if ($s27 == '1') echo 'checked';?>/>請網站規劃人員出席</label><br />
<label><input type="checkbox" name="s28"  value="1" <? if ($s28 == '1') echo 'checked';?>/>辦理績優學校校長申請經驗分享</label><br />
<label><input type="checkbox" name="s29"  value="1" <? if ($s29 == '1') echo 'checked';?>/>提供優良申請計畫範例</label><br />
<label><input type="checkbox" name="s30"  value="1" <? if ($s30 == '1') echo 'checked';?>/>其他，</label><input name="s31" type="text" size="40" value="<? echo $s31;?>"><br /><br />
        </td>
      </tr>
      <tr>
        <td valign="top">
11.目前教育部推動教育優先區計畫入口網站包含：最新消息、常見問題、問卷調查、系統或操作問題反應、相關網站、填報系統、審查系統、查詢系統及成效評估等內容，您認為未來尚須增加哪些項目（可複選）：<br />
<label><input type="checkbox" name="s32"  value="1" <? if ($s32 == '1') echo 'checked';?>/>成果案例分享</label><br />
<label><input type="checkbox" name="s33"  value="1" <? if ($s33 == '1') echo 'checked';?>/>學校申請歷史區</label><br />
<label><input type="checkbox" name="s34"  value="1" <? if ($s34 == '1') echo 'checked';?>/>教育部歷年度推動教育優先區計畫</label><br />
<label><input type="checkbox" name="s35"  value="1" <? if ($s35 == '1') echo 'checked';?>/>其他，</label><input name="s36" type="text" size="40" value="<? echo $s36;?>"><br /><br />
        </td>
      </tr>
      <tr>
        <td valign="top">
12.推動教育優先區計畫成效評估，應包含哪些項目（可複選）：<br />
<label><input type="checkbox" name="s37"  value="1" <? if ($s37 == '1') echo 'checked';?>/>核定經費執行情形</label><br />
<label><input type="checkbox" name="s38"  value="1" <? if ($s38 == '1') echo 'checked';?>/>計畫執行成效</label><br />
<label><input type="checkbox" name="s39"  value="1" <? if ($s39 == '1') echo 'checked';?>/>具體成果案例分享</label><br />
<label><input type="checkbox" name="s40"  value="1" <? if ($s40 == '1') echo 'checked';?>/>目標學生參與人次</label><br />
<label><input type="checkbox" name="s41"  value="1" <? if ($s41 == '1') echo 'checked';?>/>其它，</label><input name="s42" type="text" size="40" value="<? echo $s42;?>"><br /><br />
        </td>
      </tr>
      <tr>
        <td valign="top">
13.目前教育部推動教育優先區計畫網站查詢系統，您認為學校入口應有哪些查詢項目？<br />
<textarea name="s43" cols="70" rows="2" ><? echo $s43;?></textarea><br /><br />
        </td>
      </tr>
      <tr>
        <td valign="top">
14.貴校對教育部推動教育優先區計畫內容及執行方式之建議事項？<br />
<textarea name="s44" cols="70" rows="3" ><? echo $s44;?></textarea><br /><br />
        </td>
      </tr>
      <tr>
        <td align="center" valign="top">
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