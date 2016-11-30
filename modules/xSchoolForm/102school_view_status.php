<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<?
$sql = "select * from 102schooldata where account like '$username' ";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$id = $row[0]; //帳號
	$type = $row[1]; //學校型態
	$city = $row[2]; //縣市
	$district = $row[4]; //區
	$school = $row[5]; //學校名稱
	$a026 = $row[26];  //前一年度全校學生數
	$a100 = $row[100]; //全校學生數
	$a101 = $row[101]; //全校班級數
	$a102 = $row[102]; //一年級班數
	$a103 = $row[103]; //二年級班數
	$a104 = $row[104]; //三年級班數
	$a105 = $row[105]; //四年級班數
	$a106 = $row[106]; //五年級班數
	$a107 = $row[107]; //六年級班數
	$a108 = $row[108]; //特殊班班數
	$a109 = $row[109]; //學校所在區域
	$a110 = $row[110]; //85-91曾受補助興建社區化活動場所
	
	$a113 = $row[113]; //原住民學生數
	$a114 = $row[114];//低收
	$a115 = $row[115];//隔代
	$a116 = $row[116];//親子差距
	$a117 = $row[117];//新移民
	$a118 = $row[118];//單寄親
	$abcde = $row[119];//abcde
	$abcdef = $row[120];//abcdef

	$a122 = $row[122]; //去年國三畢業生人數
	$a123 = $row[123]; //PR值≦25學生數 
	$a124 = $row[124]; //輟學

	$a126 = $row[126]; //離島
	$a127 = $row[127]; //無公共交通工具
	$a128 = $row[128]; //站牌五公里
	$a129 = $row[129]; //離社區五公里且無站牌
	$a130 = $row[130]; //少於4班
	$a131 = $row[131]; //因裁併校須交通車
	$a132 = $row[132]; //無上述狀況

	$a133 = $row[133]; //99編制
	$a134 = $row[134]; //100編制
	$a135 = $row[135]; //101編制
	$a136 = $row[136]; //99調入
	$a137 = $row[137]; //100調入
	$a138 = $row[138]; //101調入
	$a139 = $row[139]; //99實缺
	$a140 = $row[140]; //100實缺
	$a141 = $row[141]; //101實缺
	$a142 = $row[142]; //99其他
	$a143 = $row[143]; //100其他
	$a144 = $row[144]; //101其他
	$a145 = $row[145]; //教師流動率
	$a146 = $row[146]; //教師代理率

	$a150 = $row[150]; //符合補一
	$a151 = $row[151]; //符合補二
	$a152 = $row[152]; //符合補三教師
	$a153 = $row[153]; //符合補三學生
	$a154 = $row[154]; //符合補四
	$a155 = $row[155]; //符合補五
	$a156 = $row[156]; //符合補六
	$a157 = $row[157]; //符合補七

	$a158 = $row[158]; //申請補一
	$a159 = $row[159]; //申請補二
	$a160 = $row[160]; //申請補三教師
	$a161 = $row[161]; //申請補三學生
	$a162 = $row[162]; //申請補四
	$a163 = $row[163]; //申請補五
	$a164 = $row[164]; //申請補六
	$a165 = $row[165]; //申請補七

	$p1_1 = $row[174]; //指標1-1值
    $p1_2 = $row[175]; //指標1-2值
    $p1_3 = $row[176]; //指標1-3值	
    $p1_4 = $row[177]; //指標1-4值
	$p2_1 = $row[178]; //指標2-1值
    $p2_2 = $row[179]; //指標2-2值
    $p2_3 = $row[180]; //指標2-3值	
	$p3_1 = $row[181]; //指標3-1值
	$p4_1 = $row[182]; //指標4-1值
	$p5_1 = $row[183]; //指標5-1值
    $p5_2 = $row[184]; //指標5-2值
    $p5_3 = $row[185]; //指標5-3值	
	$p6_1 = $row[186]; //指標6-1值
    $p6_2 = $row[187]; //指標6-2值
	
	$checkfinish = 1;	//是否已上傳應上傳檔案
}
//首行學校全名
echo " -- ".$city.$district.$school;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="回上一頁" onclick="history.go(-1)">
<? include "../xSchoolForm/button_print.php"; ?>
<input type="button" name="Submit" value="回主選單" onclick="location.href='../xSchoolForm/school_index.php'">
<?
//讀取上傳檔案資料
$sql = "select  *  from   102school_upload_name where account like '$username'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$file_1 = $row[38];
	$file_2 = $row[39];
}
?>
<!--各校應核章上傳檔案-->
<p style='margin-left: 1em; text-indent: -1em'>
<div style="background-color:#F96"><b>※各校皆須上傳以下兩個檔案才算填報完成</b>：(須經校長核章)</div>
<div style="background-color:#CFC">
<p style='margin-left: 1em; text-indent: -1em'>
<b>1.教育部102年度推動教育優先區指標界定調查紀錄表─學校</b><br />
<? if ($file_1 == ''){echo "指標界定調查表：<font color=red>未上傳</font>"; $checkfinish = 0;} else {echo '指標界定調查表：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/102/'.$username.'/'.$file_1.'" target="_new">'.$file_1.'</a>';}?>
</p>
</div>
<div style="background-color:#CFC">
<p style='margin-left: 1em; text-indent: -1em'>
<b>2.教育部102年度推動教育優先區補助項目經費需求彙整表─學校</b><br />
<? if ($file_2 == ''){echo "經費需求彙整表：<font color=red>未上傳</font>"; $checkfinish = 0;} else {echo '經費需求彙整表：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/102/'.$username.'/'.$file_2.'" target="_new">'.$file_2.'</a>';}?>
</p>
</div>

<!--各已申請補助項目應上傳檔案-->
<div style="background-color:#F96"><b>※各申請補助項目填報及上傳檔案狀態：</b>(僅列出貴校勾選申請項目)<br></div>
<?
	//a1 學校申請總額
	$sql_a1 = "select * from 102allowance1 where account like '$username' ";
	$result = mysql_query($sql_a1);
	while($row_a1 = mysql_fetch_row($result)){
		$a1 = $row_a1[10]; //本項目學校申請總額
	}
    //a2 學校申請總額
	$sql_a2 = "select * from 102allowance2 where account like '$username' ";
	$result = mysql_query($sql_a2);
	while($row_a2 = mysql_fetch_row($result)){
		$a2 = $row_a2[10]; //本項目學校申請總額
	}
    //a3 學校申請總額
	$sql_a3 = "select * from 102allowance3 where account like '$username' ";
	$result = mysql_query($sql_a3);
	while($row_a3 = mysql_fetch_row($result)){
		$a3 = $row_a3[10]; //本項目學校申請總額
	}
    //a4 學校申請總額
	$sql_a4 = "select * from 102allowance4 where account like '$username' ";
	$result = mysql_query($sql_a4);
	while($row_a4 = mysql_fetch_row($result)){
		$a4 = $row_a4[10]; //本項目學校申請總額
	}
    //a5 學校申請總額
	$sql_a5 = "select * from 102allowance5 where account like '$username' ";
	$result = mysql_query($sql_a5);
	while($row_a5 = mysql_fetch_row($result)){
		$a5 = $row_a5[10]; //本項目學校申請總額
	}
    //a6 學校申請總額
	$sql_a6 = "select * from 102allowance6 where account like '$username' ";
	$result = mysql_query($sql_a6);
	while($row_a6 = mysql_fetch_row($result)){
		$a6 = $row_a6[10]; //本項目學校申請總額
	}
    //a7 學校申請總額
	$sql_a7 = "select * from 102allowance7 where account like '$username' ";
	$result = mysql_query($sql_a7);
	while($row_a7 = mysql_fetch_row($result)){
		$a7 = $row_a7[10]; //本項目學校申請總額
	}
?>
<?
//讀取上傳檔案資料
$sql = "select  *  from   102school_upload_name where account like '$username'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$a1_1 = $row[06];
	$a1_2 = $row[07];
	$a1_3 = $row[08];
	$a1_4 = $row[09];
	$a2_1 = $row[10];
	$a2_2 = $row[11];
	$a2_3 = $row[12];
	$a2_4 = $row[13];
	$a3_1 = $row[14];
	$a3_2 = $row[15];
	$a3_3 = $row[16];
	$a3_4 = $row[17];
	$a4_1 = $row[18];
	$a4_2 = $row[19];
	$a4_3 = $row[20];
	$a4_4 = $row[21];
	$a5_1 = $row[22];
	$a5_2 = $row[23];
	$a5_3 = $row[24];
	$a5_4 = $row[25];
	$a6_1 = $row[26];
	$a6_2 = $row[27];
	$a6_3 = $row[28];
	$a6_4 = $row[29];
	$a7_1 = $row[30];
	$a7_2 = $row[31];
	$a7_3 = $row[32];
	$a7_4 = $row[33];
	$a8_1 = $row[34];
	$a8_2 = $row[35];
	$a8_3 = $row[36];
	$a8_4 = $row[37];

}
?>
<table width="90%" border="1" cellspacing="0" cellpadding="0">
  <? if($a158==0) echo "<!--"; ?>
  <tr>
    <td><b>※補助項目一：推展親職教育活動</b>

        <br /><? if ($a158==1 && $a1_1 == ''){echo "　‧實施計畫：<font color=red>未上傳</font>"; $checkfinish = 0;} else {echo '　‧實施計畫：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/102/'.$username.'/'.$a1_1.'" target="_new">'.$a1_1.'</a>';}?>

    </td>
    <td nowrap="nowrap" >
		<? if($a1 >0) echo "已申請"; else echo "<font color=red>未申請</font>";?>
    </td>
    <td align="center" nowrap="nowrap">
		<? if($a1 >0) echo "<a href='102_school_funds.php?op=1' target='_blank'>列印<br />經費表</a>"; else echo " "; ?>
    </td>
  </tr>
  <? if($a158==0) echo "-->"; ?>
  
  <? if($a159==0) echo "<!--"; ?>
  <tr>
    <td><b>※補助項目二：學校發展教育特色</b>

<br /><? if ($a159==1 && $a2_1 == ''){echo "　‧實施計畫：<font color=red>未上傳</font>"; $checkfinish = 0;} else {echo '　‧實施計畫：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/102/'.$username.'/'.$a2_1.'" target="_new">'.$a2_1.'</a>';}?>

    </td>
    <td nowrap="nowrap" >
		<? if($a2 >0) echo "已申請"; else echo "<font color=red>未申請</font>";?>
    </td>
    <td align="center" nowrap="nowrap">
		<? if($a2 >0) echo "<a href='102_school_funds.php?op=2' target='_blank'>列印<br />經費表</a>"; else echo " "; ?>
    </td>
  </tr>
  <? if($a159==0) echo "-->"; ?>
  
  <? if($a160==0 && $a161==0) echo "<!--"; ?>
  <tr>
    <td><b>※補助項目三：修繕離島或偏遠地區師生宿舍</b><br />
<? if (($a160==1 || $a161==1 ) && $a3_1 == ''){echo "　‧實施計畫：<font color=red>未上傳</font>"; $checkfinish = 0;} else {echo '　‧實施計畫：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/102/'.$username.'/'.$a3_1.'" target="_new">'.$a3_1.'</a>';}?>
<br /><? if ($a3_2 == ''){echo "　‧近三年住宿人員資料：<font color=red>未上傳</font>";} else {echo '　‧近三年住宿人員資料：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/102/'.$username.'/'.$a3_2.'" target="_new">'.$a3_2.'</a>';}?>

    </td>
    <td nowrap="nowrap" >
		<? if($a3 >0) echo "已申請"; else echo "<font color=red>未申請</font>";?>
    </td>
    <td align="center" nowrap="nowrap">
		<? if($a3 >0) echo "<a href='102_school_funds.php?op=3' target='_blank'>列印<br />經費表</a>"; else echo " "; ?>
    </td> 
  </tr>
  <? if($a160==0 && $a161==0) echo "-->"; ?>
  
  <? if($a162==0) echo "<!--"; ?>
  <tr>
    <td><b>※補助項目四：充實學校基本教學設備</b>

<br /><? if ($a162==1 && $a4_1 == ''){echo "　‧實施計畫：<font color=red>未上傳</font>"; $checkfinish = 0;} else {echo '　‧實施計畫：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/102/'.$username.'/'.$a4_1.'" target="_new">'.$a4_1.'</a>';}?>

    </td>
    <td nowrap="nowrap" >
		<? if($a4 >0) echo "已申請"; else echo "<font color=red>未申請</font>";?>
    </td>
    <td align="center" nowrap="nowrap">
		<? if($a4 >0) echo "<a href='102_school_funds.php?op=4' target='_blank'>列印<br />經費表</a>"; else echo " "; ?>
    </td>
  </tr>
  <? if($a162==0) echo "-->"; ?>
  
  <? if($a163==0) echo "<!--"; ?>
  <tr>
    <td><b>※補助項目五：發展原住民教育文化特色及充實設備器材</b><br />
	<? if ($a163==1 && $a5_1 == ''){echo "　‧實施計畫：<font color=red>未上傳</font>"; $checkfinish = 0;} else {echo '　‧實施計畫：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/102/'.$username.'/'.$a5_1.'" target="_new">'.$a5_1.'</a>';}?>
 	    </td>
    <td nowrap="nowrap" >
		<? if($a5 >0) echo "已申請"; else echo "<font color=red>未申請</font>";?>
    </td>
    <td align="center" nowrap="nowrap">
		<? if($a5 >0) echo "<a href='102_school_funds.php?op=5' target='_blank'>列印<br />經費表</a>"; else echo " "; ?>
    </td>
  </tr>
  <? if($a163==0) echo "-->"; ?>
    
  <? if($a164==0) echo "<!--"; ?>
  <tr>
    <td><b>※補助項目六：交通不便地區學校交通車</b>

<br /><? if ($a164==1 && $a6_1 == ''){echo "　‧實施計畫：<font color=red>未上傳</font>"; $checkfinish = 0;} else {echo '　‧實施計畫：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/102/'.$username.'/'.$a6_1.'" target="_new">'.$a6_1.'</a>';}?>
<br /><? if ($a164==1 && $a6_2 == ''){echo "　‧各搭車路線學生名冊：<font color=red>未上傳</font>"; $checkfinish = 0;} else {echo '　‧各搭車路線學生名冊：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/102/'.$username.'/'.$a6_2.'" target="_new">'.$a6_2.'</a>';}?>
<br /><? if ($a164==1 && $a6_3 == ''){echo "　‧學校現有交通車調查表：<font color=red>未上傳</font>"; $checkfinish = 0;} else {echo '　‧學校現有交通車調查表：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/102/'.$username.'/'.$a6_3.'" target="_new">'.$a6_3.'</a>';}?>

    </td>
    <td nowrap="nowrap" >
		<? if($a6 >0) echo "已申請"; else echo "<font color=red>未申請</font>";?>
    </td>
  </tr>
  <? if($a164==0) echo "-->"; ?>
  
  <? if($a165==0) echo "<!--"; ?>
  <tr>
    <td><b>※補助項目七：整修學校社區化活動場所</b>

<br /><? if ($a165==1 && $a7_1 == ''){echo "　‧實施計畫：<font color=red>未上傳</font>"; $checkfinish = 0;} else {echo '　‧實施計畫：<font color=blue>已上傳</font>，檔名：'.'<a href="./upload/102/'.$username.'/'.$a7_1.'" target="_new">'.$a7_1.'</a>';}?>

    </td>
    <td nowrap="nowrap" >
		<? if($a7 >0) echo "已申請"; else echo "<font color=red>未申請</font>";?>
    </td>
    <td align="center" nowrap="nowrap">
		<? if($a7 >0) echo "<a href='102_school_funds.php?op=7' target='_blank'>列印<br />經費表</a>"; else echo " "; ?>
    </td>
  </tr>
  <? if($a165==0) echo "-->"; ?>
  
</table>
<p>
<font color=red>
<? 
if($checkfinish == 1){
	echo "※ 貴校已完成填報。";
}else{
	echo "※ 貴校尚未完成填報，請檢視是否有未上傳檔案。";
}
?>
</font>
<?php
include "../../footer.php";
?>

