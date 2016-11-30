<?php
sleep(2);
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
include "./checkdate.php";

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
}


//首行學校全名
echo " -- ".$city.$district.$school;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="回主選單" onclick="location.href='../xSchoolForm/school_index.php'">
<? include "../xSchoolForm/button_print.php"; 

if ($a100=="" or $a135=="" or $abcdef==""){
	echo '<br><br><font color=red size="+5">請先填寫學校資料。</font><br><br>';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=school_index.php>';
}
?>
<p style='margin-left: 1em; text-indent: -1em'>
<b>※貴校符合指標：</b><br>
<?
//
//指標計算
//
//判斷是否符合指標一-1
$per = $a113/$a100;
//判斷是否符合指標一-1
if($per >= 0.4){
	echo '<b>指標一～（一）</b>：一般地區、都會地區、特偏及偏遠地區學校，原住民學生合計佔全校學生總數40％以上者。'.'<br>';
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
	echo '<b>指標一～（二）</b>：一般地區學校，原住民學生合計佔全校學生總數20％以上者。'.'<br>';
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
	echo '<b>指標一～（三）</b>：都會地區學校，原住民學生合計佔全校學生總數15％以上者。'.'<br>';
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
	echo '<b>指標一～（四）</b>：全校學生中，原住民學生合計達35人以上者。'.'<br>';
	$p1_4 = '1';
	$sql = "update 102schooldata set a177 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$p1_4 = '0';
	$sql = "update 102schooldata set a177 = '0' where account = '$username' ";
	mysql_query($sql);
}	

//判斷是否符合指標二-1	
$per = $abcde/$a100;
if($per >= 0.2){
	echo '<b>指標二～（一）</b>：低收入戶、隔代教養、單(寄)親家庭、親子年齡差距過大、新移民子女等之學生合計人數，佔全校學生總數20％以上之學校。'.'<br>';
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
	echo '<b>指標二～（二）</b>：低收入戶、隔代教養、單(寄)親家庭、親子年齡差距過大、新移民子女等學生人數合計達60人以上之學校。'.'<br>';
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
	echo '<b>指標二～（三）</b>：原住民學生人數未符合指標一～(一)、一～(二)、一～(三)，但併入指標二之目標學生人數後，合計人數佔全校學生總數30%以上者。'.'<br>';
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
	echo '<b>指標三</b>：該校前一學年基本學力測驗總成績百分等級(PR值)在25以下之學生人數佔畢業生總數達40％以上者。'.'<br>';
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
	echo '<b>指標四</b>：該學年度經通報有案之中途輟學學生人數，佔當學年度在籍學生人數之3%以上者'.'<br>';
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
	echo '<b>指標五～（一）</b>：離島以政府核定有案之各級離島為準【臺灣省政府80.6.21(80)府人四字第72694號函頒布】。<br>';
	$sql = "update 102schooldata set a183 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$sql = "update 102schooldata set a183 = '0' where account = '$username' ";
	mysql_query($sql);
}
if($p5_2 ){
	echo '<b>指標五～（二）</b>：偏遠交通不便學校係指經地方政府核定有案特偏、偏遠地區學校，且符合指標界定五～（二）子項目任一條件者。<br>';
	$sql = "update 102schooldata set a184 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$sql = "update 102schooldata set a184 = '0' where account = '$username' ";
	mysql_query($sql);
}
if($p5_3 ){
	echo '<b>指標五～（三）</b>：91學年度(91年8月1日)以前，因裁併校後，學區幅員遼闊須交通車接送學生上下學之學校。<br>';
	$sql = "update 102schooldata set a185 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$sql = "update 102schooldata set a185 = '0' where account = '$username' ";
	mysql_query($sql);
}

//判斷是否符合指標六
//流動率指標寫入
if($a145 >= 0.3){
	echo '<b>指標六～（一）</b>：學校最近三學年度教師(含實缺代理)流動率，平均在30％以上。'.'<br>';
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
	echo '<b>指標六～（二）</b>：學校最近三學年度實缺教師代理比率平均在30％以上者。'.'<br>';
	$p6_2 = '1';
	$sql = "update 102schooldata set a187 = '1' where account = '$username' ";
	mysql_query($sql);
}else{
	$p6_2 = '0';
	$sql = "update 102schooldata set a187 = '0' where account = '$username' ";
	mysql_query($sql);
}

echo "</p>";

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
<p style='margin-left: 1em; text-indent: -1em'>
<b>※貴校可申請補助項目如下：</b>（依據填報資料自動列出可申請項目）<br />

<form name="form" method="post" action="102school_select_allowance_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
請點選申請或不申請（必填、單選）<br />
申請　不申請<br />
<? if($a150==0) echo "<!--"; ?>
　<input type="radio" name="a158"  value=1 <? if ($a158 == 1) echo 'checked';?>/>　
<input type="radio" name="a158"  value=0 <? if ($a158 == 0) echo 'checked';?>/>　
補助項目一：推展親職教育活動<br />
<? if($a150==0) echo "-->"; ?>

<? if($a151==0) echo "<!--"; ?>
　<input type="radio" name="a159"  value=1 <? if ($a159 == 1) echo 'checked';?>/>　
<input type="radio" name="a159"  value=0 <? if ($a159 == 0) echo 'checked';?>/>　
補助項目二：學校發展教育特色<br />
<? if($a151==0) echo "-->"; ?>

<? if($a152==0) echo "<!--"; ?>
　<input type="radio" name="a160"  value=1 <? if ($a160 == 1) echo 'checked';?>/>　
<input type="radio" name="a160"  value=0 <? if ($a160 == 0) echo 'checked';?>/>　
補助項目三：修繕離島或偏遠地區教師宿舍<br />
<? if($a152==0) echo "-->"; ?>

<? if($a153==0) echo "<!--"; ?>
　<input type="radio" name="a161"  value=1 <? if ($a161 == 1) echo 'checked';?>/>　
<input type="radio" name="a161"  value=0 <? if ($a161 == 0) echo 'checked';?>/>　
補助項目三：修繕離島或偏遠地區學生宿舍<br />
<? if($a153==0) echo "-->"; ?>

<? if($a154==0) echo "<!--"; ?>
　<input type="radio" name="a162"  value=1 <? if ($a162 == 1) echo 'checked';?>/>　
<input type="radio" name="a162"  value=0 <? if ($a162 == 0) echo 'checked';?>/>　
補助項目四：充實學校基本教學設備<br />
<? if($a154==0) echo "-->"; ?>

<? if($a155==0) echo "<!--"; ?>
　<input type="radio" name="a163"  value=1 <? if ($a163 == '1') echo 'checked';?>/>　
<input type="radio" name="a163"  value=0 <? if ($a163 == '0') echo 'checked';?>/>　
補助項目五：發展原住民教育文化特色及充實設備器材<br />
<? if($a155==0) echo "-->"; ?>

<? if($a156==0) echo "<!--"; ?>
　<input type="radio" name="a164"  value=1 <? if ($a164 == '1') echo 'checked';?>/>　
<input type="radio" name="a164"  value=0 <? if ($a164 == '0') echo 'checked';?>/>　
補助項目六：交通不便地區學校交通車<br />
<? if($a156==0) echo "-->"; ?>

<? if($a157==0) echo "<!--"; ?>
　<input type="radio" name="a165"  value=1 <? if ($a165 == '1') echo 'checked';?>/>　
<input type="radio" name="a165"  value=0 <? if ($a165 == '0') echo 'checked';?>/>　
補助項目七：整修學校社區化活動場所<br />
<? if($a157==0) echo "-->"; ?>

<?
//檢查硬體項目不超過2項
$check3467=0;
if( ($a160+$a162+$a164+$a165)>2 || ($a161+$a162+$a164+$a165)>2 ) $check3467=1;
?>
<p>
<font color=blue>註：若同時符合補助項目三、四、六、七，最多可申請其中兩項</font>
<p>
<input type="button" value="上一頁" onClick="history.go(-1)">
<input type="submit" name="button" value="儲存並到下一頁" >


<script language="JavaScript">
function toCheck() {
//	if (event.keyCode == 13) return false; //取得Enter Code
// onkeypress="if (event.keyCode == 13) return false;" //這段放在 input type="text" 之後
	if ( <? echo $check3467;?> == 1  ) {
		//alert("硬體項目（補助項目三、四、六、七）最多可申請兩項！");
		//document.form.tnumber1.focus();
		//return false;
	}
	return true;
}
</script> 
</form>
<?php
include "../../footer.php";
?>

