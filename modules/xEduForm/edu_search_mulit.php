<?php
include "../../mainfile.php";
include "../../header.php";
?>
<INPUT TYPE="button" VALUE="回前頁" onClick="location='education_index.php'">
<script language="JavaScript">
function CheckAll_city()
{
 for (var i=0;i < document.form.elements.length;i++)
 {
    var e = document.form.elements[i];
    if (e.name != 'allbox' && e.name != 'allbox2' && e.name != 'allbox3' && e.name != 'checkbox24' && e.name != 'checkbox25' && e.name != 'checkbox26' 
	&& e.name != 'checkbox27' && e.name != 'checkbox28' 
	&& e.name != 'checkbox29' && e.name != 'checkbox32' && e.name != 'checkbox33' && e.name != 'checkbox34' && e.name != 'checkbox35' && e.name != 'checkbox36' 
	&& e.name != 'checkbox37' && e.name != 'checkbox38' && e.name != 'checkbox39' && e.name != 'checkbox40' && e.name != 'checkbox41' && e.name != 'checkbox42' 
	&& e.name != 'checkbox43' && e.name != 'checkbox44' && e.name != 'checkbox45' && e.name != 'checkbox46' && e.name != 'checkbox47' && e.name != 'checkbox48' 
	&& e.name != 'checkbox49' && e.name != 'checkbox50' && e.name != 'checkbox51' && e.name != 'checkbox52') e.checked = !e.checked;
 }
}
function CheckAll_m1()
{
 for (var i=0;i < document.form.elements.length;i++)
 {
    var e = document.form.elements[i];
    if (e.name != 'allbox' && e.name != 'allbox2' && e.name != 'allbox3' && e.name != 'checkbox24' && e.name != 'checkbox25' && e.name != 'checkbox26' 
	&& e.name != 'checkbox27' && e.name != 'checkbox28' 
	&& e.name != 'checkbox29' && e.name != 'checkbox2' && e.name != 'checkbox3' && e.name != 'checkbox4' && e.name != 'checkbox5' && e.name != 'checkbox6' 
	&& e.name != 'checkbox7' && e.name != 'checkbox8' && e.name != 'checkbox9' && e.name != 'checkbox10' && e.name != 'checkbox11' && e.name != 'checkbox12' 
	&& e.name != 'checkbox13' && e.name != 'checkbox14' && e.name != 'checkbox15' && e.name != 'checkbox16' && e.name != 'checkbox17' && e.name != 'checkbox18' 
	&& e.name != 'checkbox19' && e.name != 'checkbox20' && e.name != 'checkbox21' && e.name != 'checkbox22' && e.name != 'checkbox23' && e.name != 'checkbox48' 
	&& e.name != 'checkbox49' && e.name != 'checkbox50' && e.name != 'checkbox51' && e.name != 'checkbox52') e.checked = !e.checked;
 }
}
function CheckAll_m2()
{
 for (var i=0;i < document.form.elements.length;i++)
 {
    var e = document.form.elements[i];
    if (e.name != 'allbox' && e.name != 'allbox2' && e.name != 'allbox3' && e.name != 'checkbox24' && e.name != 'checkbox25' && e.name != 'checkbox26' 
	&& e.name != 'checkbox27' && e.name != 'checkbox28' && e.name != 'checkbox29' && e.name != 'checkbox2' && e.name != 'checkbox3' && e.name != 'checkbox4' 
	&& e.name != 'checkbox5' && e.name != 'checkbox6' && e.name != 'checkbox7' && e.name != 'checkbox8' && e.name != 'checkbox9' && e.name != 'checkbox10' 
	&& e.name != 'checkbox11' && e.name != 'checkbox12' && e.name != 'checkbox13' && e.name != 'checkbox14' && e.name != 'checkbox15' && e.name != 'checkbox16' 
	&& e.name != 'checkbox17' && e.name != 'checkbox18' && e.name != 'checkbox19' && e.name != 'checkbox20' && e.name != 'checkbox21' && e.name != 'checkbox22' 
	&& e.name != 'checkbox23' && e.name != 'checkbox32' && e.name != 'checkbox33' && e.name != 'checkbox34' && e.name != 'checkbox35' && e.name != 'checkbox36' 
	&& e.name != 'checkbox37' && e.name != 'checkbox38' && e.name != 'checkbox39' && e.name != 'checkbox40' && e.name != 'checkbox41' && e.name != 'checkbox42' 
	&& e.name != 'checkbox43' && e.name != 'checkbox44' && e.name != 'checkbox45' && e.name != 'checkbox46' && e.name != 'checkbox47') e.checked = !e.checked;
 }
}
</script> 
教育部核定經費多條件式綜合查詢<br /><input name="allbox" type="checkbox" onClick="CheckAll_city();" checked />選擇全部縣市<br>
<form name="form" method="post" action="edu_search_finish.php"  target="_blank" onSubmit="return toCheck();">
 <table width="758" border="1">
   <tr>
     <td align="center" style="width: 176px">學校及縣市</td>
     <td align="center" style="width: 151px">指標</td>
     <td align="center" style="width: 153px">補助項目核定經費</td>
     <td align="center" style="width: 443px">補助經費</td>
   </tr>
   <tr>
     <td valign="top" style="width: 176px">
	    <input type="radio" name="class"  value="1" checked />國小<br />
		<input type="radio" name="class"  value="2" />國中
<br /></td>
	 <td valign="top" rowspan="9" style="width: 151px"> <p><br></p>
	<input type="checkbox" name="checkbox24"  value="1" checked />指標一<br />
	<input type="checkbox" name="checkbox25"  value="1" checked />指標二<br />
	<input type="checkbox" name="checkbox26"  value="1" checked />指標三<br />
	<input type="checkbox" name="checkbox27"  value="1" checked />指標四<br />
	<input type="checkbox" name="checkbox28"  value="1" checked />指標五<br />
	<input type="checkbox" name="checkbox29"  value="1" checked />指標六</td>
     <td rowspan="8" valign="top" style="width: 153px">	 <br />
    <input name="allbox2" type="checkbox" onClick="CheckAll_m1();" checked />經常門<br>(全選)
	 </td>
     <td valign="top" style="height: 21px; width: 443px">
	 <input type="checkbox" name="checkbox32"  value="1" checked />	1-1【親職教育活動】<br />
     <input type="checkbox" name="checkbox33"  value="1" checked />	1-2【目標學生家庭訪視輔導】</td>
   </tr>
   <tr>
    <td rowspan="8" valign="top" style="width: 176px">
	<input type="checkbox" name="checkbox2"  value="新北市" checked />新北市<br />
    <input type="checkbox" name="checkbox3"  value="臺北市" checked />臺北市<br />
    <input type="checkbox" name="checkbox4"  value="桃園縣" checked />桃園縣<br />
    <input type="checkbox" name="checkbox5"  value="新竹縣" checked />新竹縣<br />
    <input type="checkbox" name="checkbox6"  value="新竹市" checked />新竹市<br />
    <input type="checkbox" name="checkbox7"  value="苗栗縣" checked />苗栗縣<br />
    <input type="checkbox" name="checkbox8"  value="臺中市" checked />臺中市<br />
    <input type="checkbox" name="checkbox9"  value="南投縣" checked />南投縣<br />
    <input type="checkbox" name="checkbox10"  value="彰化縣" checked />彰化縣<br />
    <input type="checkbox" name="checkbox11"  value="雲林縣" checked />雲林縣<br />
    <input type="checkbox" name="checkbox12"  value="嘉義縣" checked />嘉義縣<br />
	<input type="checkbox" name="checkbox13"  value="嘉義市" checked />	嘉義市<br>
	<input type="checkbox" name="checkbox14"  value="臺南市" checked />	臺南市<br />
	<input type="checkbox" name="checkbox15"  value="高雄市" checked />	高雄市<br />
	<input type="checkbox" name="checkbox16"  value="屏東縣" checked />	屏東縣<br />
	<input type="checkbox" name="checkbox17"  value="臺東縣" checked />	臺東縣<br />
	<input type="checkbox" name="checkbox18"  value="花蓮縣" checked />	花蓮縣<br />
	<input type="checkbox" name="checkbox19"  value="宜蘭縣" checked />	宜蘭縣<br />
	<input type="checkbox" name="checkbox20"  value="基隆市" checked >	基隆市<br />
	<input type="checkbox" name="checkbox21"  value="澎湖縣" checked />	澎湖縣<br />
	<input type="checkbox" name="checkbox22"  value="金門縣" checked />	金門縣<br />
	<input type="checkbox" name="checkbox23"  value="連江縣" checked />	連江縣</td>
     <td valign="top" style="height: 60px; width: 443px">
     <input type="checkbox" name="checkbox34"  value="1" checked />2-1【課後學習輔導】<br>
     <input type="checkbox" name="checkbox35"  value="1" checked />2-2【寒暑假學習輔導】<br />
     <input type="checkbox" name="checkbox36"  value="1" checked />2-3【住校生夜間學校輔導】</td>
   </tr>
   <tr>
     <td valign="top" style="height: 10px; width: 443px">
	<input type="checkbox" name="checkbox37"  value="1" checked />3-1【學校發展教育特色】</td>
   </tr>
   <tr>
     <td valign="top" style="height: 21px; width: 443px">
     <input type="checkbox" name="checkbox38"  value="1" checked />4-1【修繕學生宿舍】<br />
     <input type="checkbox" name="checkbox39"  value="1" checked />4-3【修繕教師宿舍】</td>
   </tr>
   <tr>
     <td valign="top" style="height: 10px; width: 443px">
     <input type="checkbox" name="checkbox40"  value="1" checked />5-1【充實學校基本教學設備】</td>
   </tr>
   <tr>
     <td valign="top" style="height: 10px; width: 443px">
     <input type="checkbox" name="checkbox41"  value="1" checked />6-1【發展原住民特色及充實設備】</td>
   </tr>
   <tr>
     <td valign="top" style="height: 61px; width: 443px">
     <input type="checkbox" name="checkbox42"  value="1" checked />7-1【交通不便學校-租車費】<br />
     <input type="checkbox" name="checkbox43"  value="1" checked />7-2【交通不便學校-交通費】<br />    
     <input type="checkbox" name="checkbox44"  value="1" checked />7-3【交通不便學校-購交通車費】</td>
   </tr>
   <tr>
     <td valign="top" style="height: 39px; width: 443px">
	      <input type="checkbox" name="checkbox45"  value="1" checked />8-1【整修綜合球場】<br />
          <input type="checkbox" name="checkbox46"  value="1" checked />8-2【整修小型集會風雨教室】<br />
          <input type="checkbox" name="checkbox47"  value="1" checked />8-3【整修運動場】</td>
   </tr>
   <tr>
     <td valign="top" style="width: 153px">
       <input name="allbox3" type="checkbox" onClick="CheckAll_m2();" checked />資本門<br>(全選)</td>
     <td valign="top" style="width: 443px">
       <input type="checkbox" name="checkbox48"  value="1" checked />3-2【學校發展教育特色】<br>
     <input type="checkbox" name="checkbox49"  value="1" checked />4-2【修繕學生宿舍】<br>
     <input type="checkbox" name="checkbox50"  value="1" checked />4-4【修繕教師宿舍】<br>
     <input type="checkbox" name="checkbox51"  value="1" checked />5-2【充實學校基本教學設備】<br>
     <input type="checkbox" name="checkbox52"  value="1" checked />6-2【發展原住民特色及充實設備】</td>
   </tr>
   </table>
 <input type="submit" name="button" value="查詢" />
 </form>
<p></p>

<?php
include "../../footer.php";
?>