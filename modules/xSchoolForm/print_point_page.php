<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<?
//學校名稱  
if($class == '1' ){
			$basedata="100element_basedata";
	}
	else{
			$basedata="100junior_basedata";
		}			
$sql_school = "select  *  from ".$basedata." where account like '$username'";
$result_school = mysql_query($sql_school);
while($row = mysql_fetch_row($result_school))        {
			$school = $row[1];//學校名稱
			//$schoolfullname = $row[13].str_replace("市立","",str_replace("縣立","",$row[1]));//學校全名
}
echo "指標彙整表";
?>
<?
//符合指標的打勾
if($class == '1' ){
			$basedata="100element_point";
	}
	else{
			$basedata="100junior_point";
		}			
$sql_school = "select  *  from ".$basedata." where account like '$username'";
$result_school = mysql_query($sql_school);
while($row = mysql_fetch_row($result_school))
        {
			$p1_1 = $row[1];
			$p1_2 = $row[2];
			$p1_3 = $row[3];
			$p1_4 = $row[4];
			$p2_1 = $row[5];
			$p2_2 = $row[6];
			$p3 = $row[7];
			$p4 = $row[8];
			$p5 = $row[11];
			$p6 = $row[9];
			$p2_3 = $row[10];
			$p6_2 = $row[12];			
        }
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
.style1 {
	font-size: 10px
}
.style3 {font-family: "標楷體"}
.style5 {
	font-family: "標楷體";
	font-size: 18px;
}
.style7 {font-weight: bold; font-size: 10px; }
.style8 {
	font-family: "標楷體";
	font-weight: bold;
	font-size: 36px;
}
.style9 {
	font-family: "標楷體";
	font-size: 30px;
	text-align: center;
	width: 1200px;
}
-->
</style>
<div align="center" class="style9">
教育部101年度推動教育優先區計畫學校指標界定調查紀錄表
</div>
<table width="1200" border="3" bordercolor="#000000">
  <tr>
    <td width="137" height="54" class="style3"><div align="center" class="style3">學校序號</div></td>
    <td width="1023" class="style3"><div align="center" class="style3">學校名稱</div></td>
  </tr>
  <tr>
    <td height="46" class="style3"><div align="center" class="style5"><? echo $username;?></div></td>
    <td class="style3"><div align="center" class="style5"><? echo $school;?></div></td>
  </tr>
</table>
<span class="style3"><br>
</span>
<table width="1200" border="3" bordercolor="#000000">
  <tr>
    <td height="49" colspan="4" class="style3"><div align="center">一、原住民學生比率偏高之學校</div></td>
    <td colspan="3" class="style3"><p align="center">二、低收入戶、隔代教養、單(寄)親家庭、親子年齡差距過大及新移民子女學生比率偏高之學校</p>    </td>
    <td width="327" class="style3"><div align="center">三、國中學習弱勢學生比率偏高之學校</div></td>
  </tr>
    <tr>
    <td height="38" colspan="4" class="style3"><div align="center">指標界定</div></td>
    <td colspan="3" class="style3"><div align="center">指標界定</div></td>
    <td class="style3"><div align="center">指標界定</div></td>
  </tr>
  <tr>
    <td width="100" height="49" class="style3"><div align="center">1~(一)<br>
    40%以上</div></td>
    <td width="100" class="style3"><div align="center">1~(二)<br>
    20%以上</div></td>
    <td width="100" class="style3"><div align="center">1~(三)<br>
    15%以上</div></td>
    <td width="100" class="style3"><div align="center">1~(四)<br>
    35人以上</div></td>
    <td width="" class="style3"><div align="center">二~(一)<br>
    20%以上</div></td>
    <td width="106" class="style3"><div align="center">二~(二)<br>
    60人以上</div></td>
    <td width="107" class="style3"><div align="center">二~(三)<br />
    30%以上</div></td>
    <td class="style3"><div align="center">PR<=25之人數比例>=40%</div></td>
  </tr>
  <tr>
    <td height="33" class="style3"><div align="center"><? if($p1_1 == 1) echo 'ˇ'?></div></td>
    <td class="style3"><div align="center"><? if($p1_2 == 1) echo 'ˇ'?></div></td>
    <td class="style3"><div align="center"><? if($p1_3 == 1) echo 'ˇ'?></div></td>
    <td class="style3"><div align="center"><? if($p1_4 == 1) echo 'ˇ'?></div></td>
    <td class="style3"><div align="center"><? if($p2_1 == 1) echo 'ˇ'?></div></td>
    <td class="style3"><div align="center"><? if($p2_2 == 1) echo 'ˇ'?></div></td>
    <td class="style3"><div align="center"><? if($p2_3 == 1) echo 'ˇ'?></div></td>
    <td class="style3"><div align="center"><? if($p3 == 1) echo 'ˇ'?></div></td>
  </tr>
</table>
<span class="style3"><br>
</span>
<table width="1200" border="3" bordercolor="#000000">
  <tr>
    <td width="203" height="34" class="style3"><div align="center">四、中途輟學率偏高之學校</div></td>
    <td colspan="6" class="style3"><div align="center">五、離島或偏遠交通不便之學校</div></td>
    <td colspan="2" class="style3"><div align="center">六、教師流動率及代理教師比率偏高之學校</div></td>
  </tr>
  
  <tr>
    <td height="35" class="style3"><div align="center" class="style5">指標界定</div></td>
    <td colspan="6" class="style3"><div align="center">指標界定</div></td>
    <td colspan="2" class="style3"><div align="center">指標界定</div></td>
  </tr>
   <tr>
     <td rowspan="2" class="style3"><div align="center">3%以上</div></td>
     <td height="56" align="center" class="style3">五~(一)</td>
     <td colspan="4" align="center" class="style3">五~(二)</td>
     <td align="center" class="style3">五~(三)</td>
     <td width="162" rowspan="2" class="style3"><div align="center">六~(一)教師流動率平均&gt;=30%</div></td>
     <td width="162" rowspan="2" class="style3"><div align="center">六~(二)教師代理率平均&gt;=30%</div></td>
   </tr>
   <tr>
    <td width="83" height="56" class="style3"><div align="center">離島</div></td>
    <td width="105" class="style3"><div align="center">無公共交通工具可達</div></td>
    <td width="91" class="style3"><div align="center">學校距站牌5km以上</div></td>
    <td width="107" class="style3"><div align="center">距社區5km以上且無公車可達</div></td>
    <td width="109" class="style3"><div align="center">公共交通工具每天少於4班</div></td>
    <td width="116" class="style3"><div align="center">91學年以前因併校需交通車接送</div></td>
    </tr>
 <?
 if($class == '1' ){
			$basedata="100element_point345";
	}
	else{
			$basedata="100junior_point345";
		}			
$sql_point5 = "select  *  from ".$basedata." where account like '$username'";
$result_point5 = mysql_query($sql_point5);
while($row = mysql_fetch_row($result_point5))
        {
			$school_area_0 = $row[4];
			$school_area_1 = $row[5];
			$school_area_2 = $row[6];
			$school_area_3 = $row[7];			
			$school_area_4 = $row[8];
			$school_area_5 = $row[9];			
        }
		
?> 
  <tr>
    <td height="36" class="style3"><div align="center"><? if($p4 == 1) echo 'ˇ'?></div></td>
    <td class="style3"><div align="center"><? if($school_area_0 == 1) echo 'ˇ'?></div></td>
    <td class="style3"><div align="center"><? if($school_area_1 == 1) echo 'ˇ'?></div></td>
    <td class="style3"><div align="center"><? if($school_area_2 == 1) echo 'ˇ'?></div></td>
    <td class="style3"><div align="center"><? if($school_area_3 == 1) echo 'ˇ'?></div></td>
    <td class="style3"><div align="center"><? if($school_area_4 == 1) echo 'ˇ'?></div></td>
    <td class="style3"><div align="center"><? if($school_area_5 == 1) echo 'ˇ'?></div></td>
    <td class="style3"><div align="center"><? if($p6 == 1) echo 'ˇ'?></div></td>
    <td class="style3"><div align="center"><? if($p6_2 == 1) echo 'ˇ'?>
    </div></td>
  </tr>
</table>
<span class="style3"><br>
</span>
<table width="1200" border="3" bordercolor="#000000">
  <tr>
    <td height="43" class="style3">承辦人：　　　　　　　　　　　　　　　　　　　　主任：　　　　　　　　　　　　　　　　　　　　校長：</td>
    </tr>
</table>