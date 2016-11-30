<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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



}

//指標計算
//判斷是否符合指標一～（一）
$per = $a113/$a100;
//判斷是否符合指標一-1
if($per >= 0.4){
	//echo '符合指標一～（一）'.'<br>';
	$p1_1 = '1';
	$sql = "update 102schooldata set a174 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$p1_1 = '0';
	$sql = "update 102schooldata set a174 = '0' where account = '$username' ";
	mysql_query($sql);
}
//判斷是否符合指標一-2
if($a109 == '3' && $per >= 0.2){
	//echo '符合指標一～（二）'.'<br>';
	$p1_2 = '1';
	$sql = "update 102schooldata set a175 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$p1_2 = '0';
	$sql = "update 102schooldata set a175 = '0' where account = '$username' ";
	mysql_query($sql);
}
//判斷是否符合指標一-3
if($a109 == '4' && $per >= 0.15){
	//echo '符合指標一～（三）'.'<br>';
	$p1_3 = '1';
	$sql = "update 102schooldata set a176 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$p1_3 = '0';
	$sql = "update 102schooldata set a176 = '0' where account = '$username' ";
	mysql_query($sql);
}
//判斷是否符合指標一-4
if($a113 >= 35){
	//echo '符合指標一～（四）'.'<br>';
	$p1_4 = '1';
	$sql = "update 102schooldata set a177 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$p1_4 = '0';
	$sql = "update 102schooldata set a177 = '0' where account = '$username' ";
	mysql_query($sql);
}	

//判斷是否符合指標二	
//判斷是否符合指標二-1	
$per = $abcde/$a100;
if($per >= 0.2){
	//echo '符合指標二－１'.'<br>';
	$p2_1 = '1';
	$sql = "update 102schooldata set a178 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$p2_1 = '0';
	$sql = "update 102schooldata set a178 = '0' where account = '$username' ";
	mysql_query($sql);
}
//判斷是否符合指標二-2
if($abcde >= 60 ){
	//echo '符合指標二－２'.'<br>';
	$p2_2 = '1';
	$sql = "update 102schooldata set a179 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$p2_2 = '0';
	$sql = "update 102schooldata set a179 = '0' where account = '$username' ";
	mysql_query($sql);
}
//判斷是否符合指標二-3
if(($abcdef/$a100 >= 0.3) && !( $p1_1 == '1' || $p1_2 == '1' || $p1_3 == '1')){
	//echo '符合指標二－３'.'<br>';
	$p2_3 = '1';
	$sql = "update 102schooldata set a180 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$p2_3 = '0';
	$sql = "update 102schooldata set a180 = '0' where account = '$username' ";
	mysql_query($sql);
}

//判斷是否符合指標三
$per = $a123/$a122;
if($per >= 0.4){
	//echo '符合指標三'.'<br>';
	$p3_1 = '1';
	$sql = "update 102schooldata set a181 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$p3_1 = '0';
	$sql = "update 102schooldata set a181 = '0' where account = '$username' ";
	mysql_query($sql);
}

//判斷是否符合指標四
$per = $a124/$a100;
if($per >= 0.03){
	//echo '符合指標四'.'<br>';
	$p4_1 = '1';
	$sql = "update 102schooldata set a182 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$p4_1 = '0';
	$sql = "update 102schooldata set a182 = '0' where account = '$username' ";
	mysql_query($sql);
}

//判斷是否符合指標五
$p5_1 = ($a126 == 1);
$p5_2 = ($a127 == 1 || $a128 == 1 || $a129 == 1 || $a130 == 1);
$p5_3 = ($a131 == 1);
if($p5_1 ){
	//echo '<br><br>符合指標 五－１<br>';
	$sql = "update 102schooldata set a183 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$sql = "update 102schooldata set a183 = '0' where account = '$username' ";
	mysql_query($sql);
}
if($p5_2 ){
	//echo '<br><br>符合指標 五－２<br>';
	$sql = "update 102schooldata set a184 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$sql = "update 102schooldata set a184 = '0' where account = '$username' ";
	mysql_query($sql);
}
if($p5_3 ){
	//echo '<br><br>符合指標 五－３<br>';
	$sql = "update 102schooldata set a185 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$sql = "update 102schooldata set a185 = '0' where account = '$username' ";
	mysql_query($sql);
}

//判斷是否符合指標六
//流動率指標寫入
if($a145 >= 0.3){
	//echo '符合指標六－１ 教師流動率'.'<br>';
	$p6_1 = '1';
	$sql = "update 102schooldata set a186 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$p6_1 = '0';
	$sql = "update 102schooldata set a186 = '0' where account = '$username' ";
	mysql_query($sql);
}

//代理率指標寫入
if($a146 >= 0.3){
	//echo '符合指標六－２ 教師代理率'.'<br>';
	$p6_2 = '1';
	$sql = "update 102schooldata set a187 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$p6_2 = '0';
	$sql = "update 102schooldata set a187 = '0' where account = '$username' ";
	mysql_query($sql);
}

//
//補助項目計算
//
$a150 = ($p1_1==1 || $p1_2==1 || $p1_3==1 || $p1_4==1 || $p2_1==1 || $p2_2==1 || $p4_1==1 || $p5_1==1 || $p5_2==1);
$a151 = ($p2_3==1 || $p4_1==1 || $p5_1==1 || $p5_2==1);
$a152 = ($p5_1==1 || $p5_2==1 || $p6_1==1 || $p6_2==1);
$a153 = ($p1_1==1 || $p1_2==1 || $p1_3==1 || $p5_1==1 || $p5_2==1);
$a154 = ($p1_1==1 || $p1_2==1 || $p1_3==1 || $p3_1==1 || $p5_1==1 || $p5_2==1);
$a155 = ($p1_1==1 || $p1_2==1 || $p1_3==1);
$a156 = ($p5_1==1 || $p5_2==1 || $p5_3==1);
$a157 = ($p1_1==1 || $p1_2==1 || $p1_3==1 || $p2_1==1 || $p4_1==1 );
// 設定：若符合補助項目五可申請，則補助項目二不符合
if ($a155 == 1){
	$a151 = 0;
}
// 設定：符合指標六者僅可申請教師宿舍
//if (i==1 || $l==1){
//	$a_4_1 = 0;
//}
// 設定：學校所在區域非離島、偏遠或特偏，不得申請補助項目四
//if (!($area == "area_0" || $area == "area_1")){
//	$a_4_1 = 0;
//	$a_4_2 = 0;
//}

// 設定：若未曾於85-91年度獲補助興建學校社區化活動場所，不得申請修繕經費
// echo "<br>for_a8r1_1: ".$for_a8r1_1."<br>";
if ($a110==1){
	$a157 = 0;
}

$sql = "update 102schooldata set a150='$a150', a151='$a151', a152='$a152', a153='$a153', a154='$a154', a155='$a155', a156='$a156', a157='$a157' where account = '$username'";
mysql_query($sql);

?>
表Ｉ～１ 指標彙整表
<INPUT TYPE="button" VALUE="回上一頁" onclick="history.go(-1)">
<? include "../xSchoolForm/button_print02.php"; ?>
<input type="button" name="Submit" value="列印完畢回主選單" onclick="location.href='../xSchoolForm/school_index.php'">
<input type="button" name="Submit" value="列印完畢前往申請補助項目" onclick="location.href='../xSchoolForm/102school_select_allowance.php'">
<br />
<div id="print_content">
<div style="font-family:標楷體;font-size:20px;text-align:center"><strong>教育部102年度教育優先區指標界定調查紀錄表─<? echo $city.$district.$school; ?></strong></div>
<table border="1" cellspacing="0" cellpadding="0" align="center" style="font-family:標楷體">
  <tr>
    <td width="50" height="30" nowrap="nowrap"><p align="center">項次 </p></td>
    <td height="30" colspan="3" nowrap="nowrap"><p align="center">指標界定學校相關資料 </p></td>
    <td width="100" height="30" nowrap="nowrap"><p align="center">數量／內容 </p></td>
    <td width="100%" height="30" nowrap="nowrap"><p align="center">符合指標 </p></td>
  </tr>
  <tr>
    <td height="30" rowspan="7"><p align="center">一 </p></td>
    <td width="150" height="30" rowspan="7" nowrap="nowrap"><p>學校基本資料 </p></td>
    <td height="30" colspan="2"><p>學校所處地區 </p></td>
    <td height="30" nowrap="nowrap"><? if($a109=="1") echo "離島"; elseif($a109=="2") echo "偏遠或特偏"; elseif($a109=="3") echo "一般地區"; elseif($a109=="4") echo "都會地區"; else echo "無貴校資料"; ?></td>
    <td height="30" rowspan="7" align="left" nowrap="nowrap"><p align="left">&nbsp;</p></td>
  </tr>
  <tr>
    <td height="30" colspan="2"><p>全校班級數 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo $a101; ?>(班)</p></td>
  </tr>
  <tr>
    <td height="30" colspan="2"><p>全校學生總人數 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo $a100; ?>(人)</p></td>
  </tr>
  <tr>
    <td height="30" colspan="2"><p>教師編制人數99學年 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo $a133; ?>(人)</p></td>
  </tr>
  <tr>
    <td height="30" colspan="2"><p>教師編制人數100學年 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo $a134; ?>(人)</p></td>
  </tr>
  <tr>
    <td height="30" colspan="2">教師編制人數101學年</td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo $a135; ?>(人)</p></td>
  </tr>
  <tr>
    <td height="30" colspan="2"><p align="left">85~91年度是否曾獲本計畫補助興建學校社區化活動場所經費</p></td>
    <td height="30" nowrap="nowrap"><? if($a110=="1") echo "未受補助"; else echo "曾受補助";?></td>
  </tr>
  <tr>
    <td height="30" rowspan="2" nowrap="nowrap"><p align="center">二 </p></td>
    <td height="30" rowspan="2" nowrap="nowrap"><p>指標一：<br />原住民學生比例偏高之學校</p></td>
    <td height="30" colspan="2"><p>原住民學生人數 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo $a113; ?>(人)</p></td>
    <td height="30" rowspan="2" align="left" nowrap="nowrap">
    	<p align="left">
        <? if($a113/$a100 >= 0.4) echo '符合指標一～（一）'.'<br>'; ?>
        <? if($a109 == '3' && $a113/$a100 >= 0.2) echo '符合指標一～（二）'.'<br>'; ?>
    	<? if($a109 == '4' && $a113/$a100 >= 0.15) echo '符合指標一～（三）'.'<br>'; ?>
        <? if($a113 >= 35) echo '符合指標一～（四）'.'<br>'; ?>
        </p>
    </td>
  </tr>
  <tr>
    <td height="30" colspan="2"><p>佔全校學生比率 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo number_format($a113/$a100*100,2); ?>(％)</p></td>
  </tr>
  <tr>
    <td height="30" rowspan="9" nowrap="nowrap"><p align="center">三 </p></td>
    <td height="30" rowspan="9" nowrap="nowrap"><p>指標二：<br />目標學生比例偏高之學校</p></td>
    <td height="30" colspan="2"><p>低收入戶子女學生人數 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo $a114; ?>(人)</p></td>
    <td height="30" rowspan="9" align="left" nowrap="nowrap">
    <p align="left">
    <? if($abcde/$a100 >= 0.2) echo '符合指標二～（一）'.'<br>'; ?>
    <? if($abcde >= 60 ) echo '符合指標二～（二）'.'<br>';?>
    <? if(($abcdef/$a100 >= 0.3) && !( $p1_1 == '1' || $p1_2 == '1' || $p1_3 == '1')) echo '符合指標二～（三）'.'<br>';?>
    </p></td>
  </tr>
  <tr>
    <td height="30" colspan="2"><p>隔代教養學生人數 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo $a115; ?>(人)</p></td>
  </tr>
  <tr>
    <td height="30" colspan="2"><p>親子年齡差距45歲以上學生人數 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo $a116; ?>(人)</p></td>
  </tr>
  <tr>
    <td height="30" colspan="2"><p>新移民子女學生人數 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo $a117; ?>(人)</p></td>
  </tr>
  <tr>
    <td height="30" colspan="2"><p>單(寄)親家庭學生人數 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo $a118; ?>(人)</p></td>
  </tr>
  <tr>
    <td height="30" colspan="2">目標學生人數 (不含僅原住民)</td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo $abcde; ?>(人)</p></td>
  </tr>
  <tr>
    <td height="30" colspan="2"><p>目標學生人數 (含原住民)</p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo $abcdef; ?>(人)</p></td>
  </tr>
  <tr>
    <td height="30" colspan="2">目標學生(不含僅原住民)佔全校學生比率 </td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo number_format($abcde/$a100*100,2); ?>(％)</p></td>
  </tr>
  <tr>
    <td height="30" colspan="2"><p>目標學生(含原住民)佔全校學生比率 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo number_format($abcdef/$a100*100,2); ?>(％)</p></td>
  </tr>
  <tr>
    <td height="30" rowspan="3" nowrap="nowrap"><p align="center">四 </p></td>
    <td height="30" rowspan="3" nowrap="nowrap"><p>指標三：<br />國中學習弱勢學生比例偏高之學校</p></td>
    <td height="30" colspan="2"><p>100學年度國中畢業生人數 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo $a122; ?>(人)</p></td>
    <td height="30" rowspan="3" align="left" nowrap="nowrap">
    <p align="left">
    <? if($a123/$a122 >= 0.4) echo '符合指標三'.'<br>'; ?>
    </p></td>
  </tr>
  <tr>
    <td height="30" colspan="2"><p>第一次國中學測成績PR值≦25人數 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo $a123; ?>(人)</p></td>
  </tr>
  <tr>
    <td height="30" colspan="2"><p>第一次學測成績PR值≦25人數佔全校學生人數比例 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo number_format($a123/$a122*100,2); ?>(％)</p></td>
  </tr>
  <tr>
    <td height="30" rowspan="3" nowrap="nowrap"><p align="center">五 </p></td>
    <td height="30" rowspan="3" nowrap="nowrap"><p>指標四：<br />中途輟學率偏高之學校</p></td>
    <td height="30" colspan="2"><p>100學年(100/9/1至101/6/30)中途輟學學生人數 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo $a124; ?>(人)</p></td>
    <td height="30" rowspan="3" align="left" nowrap="nowrap">
    <p align="left">
    <? if($a124/$a100 >= 0.03) echo '符合指標四'.'<br>';?>
    </p></td>
  </tr>
  <tr>
    <td height="30" colspan="2"><p>100學年在籍學生人數 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo $a026; ?>(人)</p></td>
  </tr>
  <tr>
    <td height="30" colspan="2"><p>中輟生佔全校學生百分比 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo number_format($a124/$a026*100,2); ?>(％)</p></td>
  </tr>
  <tr>
    <td height="30" nowrap="nowrap"><p align="center">六 </p></td>
    <td height="30" nowrap="nowrap"><p>指標五：<br />離島或偏遠交通不便之學校</p></td>
    <td height="30" colspan="2"><p>學校所在地區交通狀況</p></td>
    <td height="30">
    <p align="left">
    <? if($a126 == "1") echo '離島'.'<br>'; ?>
	<? if($a127 == "1") echo '學校所在地區無公共交通工具到達'.'<br>'; ?>
	<? if($a128 == "1") echo '學校距離站牌達5公里以上'.'<br>'; ?>
    <? if($a129 == "1") echo '學區內之社區距離學校5公里以上，且無公共交通工具可以達學校'.'<br>'; ?>
    <? if($a130 == "1") echo '公共交通工具到學校所在地區每天少於4班次'.'<br>'; ?>
    <? if($a131 == "1") echo '91學年度以前，因裁併校後學區幅員遼闊須交通車接送學生上下學'.'<br>'; ?>
	<? if($a126 == "0" && $a127 == "0" && $a128 == "0" && $a129 == "0" && $a130 == "0" && $a131 == "0") echo '無特殊交通狀況'.'<br>'; ?>
    </p></td>
    <td height="30" align="left" nowrap="nowrap">
    <p>
	<? if($p5_1 ) echo '符合指標 五～（一）<br>';?>
	<? if($p5_2 ) echo '符合指標 五～（二）<br>';?>
	<? if($p5_3 ) echo '符合指標 五～（三）<br>';?>
    </p>
    </td>
  </tr>
  <tr>
    <td height="30" rowspan="9" nowrap="nowrap"><p align="center">七 </p></td>
    <td height="30" rowspan="9" nowrap="nowrap"><p>指標六：<br />教師流動率及代理比例偏高之學校</p></td>
    <td height="30" colspan="2"><p>99至101學年教師編制人數 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo ($a133+$a134+$a135); ?>(人)</p></td>
    <td height="30" rowspan="9" align="left" nowrap="nowrap">
    <p align="left">
    <? if($a145 >= 0.3) echo '符合指標六～（一）'.'<br>';?>
    <? if($a146 >= 0.3) echo '符合指標六～（二）'.'<br>';?>
    </p></td>
  </tr>
  <tr>
    <td height="30" rowspan="4" nowrap="nowrap"><p align="center">教師異動人數 </p></td>
    <td height="30" nowrap="nowrap"><p>教師異動人數99學年度 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo ($a136+$a139); ?>(人)</p></td>
  </tr>
  <tr>
    <td height="30" nowrap="nowrap"><p>教師異動人數100學年度 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo ($a137+$a140); ?>(人)</p></td>
  </tr>
  <tr>
    <td height="30" nowrap="nowrap"><p>教師異動人數101學年度 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo ($a138+$a141); ?>(人)</p></td>
  </tr>
  <tr>
    <td height="30" nowrap="nowrap"><p>教師異動人數99至101學年合計 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo ($a136+$a137+$a138+$a139+$a140+$a141); ?>(人)</p></td>
  </tr>
  <tr>
    <td height="30" rowspan="4" nowrap="nowrap"><p align="center">代理教師人數 </p></td>
    <td height="30" nowrap="nowrap"><p>教師代理人數99學年度 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo ($a139+$a142); ?>(人)</p></td>
  </tr>
  <tr>
    <td height="30" nowrap="nowrap"><p>教師代理人數100學年度 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo ($a140+$a143); ?>(人)</p></td>
  </tr>
  <tr>
    <td height="30" nowrap="nowrap"><p>教師代理人數101學年度 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo ($a141+$a144); ?>(人)</p></td>
  </tr>
  <tr>
    <td height="30" nowrap="nowrap"><p>教師代理人數99至101學年合計 </p></td>
    <td height="30" nowrap="nowrap"><p align="right"><? echo ($a139+$a140+$a141+$a142+$a143+$a144); ?>(人)</p></td>
  </tr>
  <tr>
    <td height="50" colspan="6" nowrap="nowrap"><p style="font-size:18px">承辦人：　　　　　　　　　　主任：　　　　　　　　　　校長： </p></td>
  </tr>
</table>
</div>

