<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_city_ex2.php";
//$id = $_SESSION['id'];
$id = $_GET["id"];
$sid = $_POST["sid"];

$a130 = $_POST["pass"];	//縣市審核狀態
$a131 = $_POST['a131'];	//縣市審核意見

$a132 = $_POST['a132'];	//本項目總額
$a133 = $_POST['a133'];	//本項目經常門
$a134 = $_POST['a134'];	//本項目資本門
if($a130=='2'){
	$a132=0;
	$a133=0;
	$a134=0;
	$a135=0;
	$a136=0;
	$a137=0;
	$a138=0;
	$a139=0;
	$a140=0;
	$a141=0;
	$a142=0;
	$a143=0;
	$a144=0;
	$a145=0;
	$a146=0;
	$a147=0;
	$a148=0;
	$a149=0;
}

//$allowance=$_POST["allowance"];

$a030 = $_POST['a030'];	//科目
$a031 = $_POST['a031'];	//類別

$a040 = $_POST['a040'];
$a041 = $_POST['a041'];

$a050 = $_POST['a050'];
$a051 = $_POST['a051'];

$a060 = $_POST['a060'];
$a061 = $_POST['a061'];

$a070 = $_POST['a070'];
$a071 = $_POST['a071'];

$a080 = $_POST['a080'];
$a081 = $_POST['a081'];

$a090 = $_POST['a090'];
$a091 = $_POST['a091'];

$a100 = $_POST['a100'];
$a101 = $_POST['a101'];

$a110 = $_POST['a110'];
$a111 = $_POST['a111'];

$a120 = $_POST['a120'];
$a121 = $_POST['a121'];
$a122 = $_POST['a122'];

$a150 = $_POST['a150'];	//縣市經費表資料
$a151 = $_POST['a151'];
$a152 = $_POST['a152'];
$a153 = $_POST['a153'];
$a154 = $_POST['a154'];
$a155 = $_POST['a155'];
$a156 = $_POST['a156'];
$a157 = $_POST['a157'];
$a158 = $_POST['a158'];
$a159 = $_POST['a159'];
$a160 = $_POST['a160'];
$a161 = $_POST['a161'];
$a162 = $_POST['a162'];
$a163 = $_POST['a163'];
$a164 = $_POST['a164'];
$a165 = $_POST['a165'];
$a166 = $_POST['a166'];
$a167 = $_POST['a167'];
$a168 = $_POST['a168'];
$a169 = $_POST['a169'];
$a170 = $_POST['a170'];
$a171 = $_POST['a171'];
$a172 = $_POST['a172'];
$a173 = $_POST['a173'];
$a174 = $_POST['a174'];
$a175 = $_POST['a175'];
$a176 = $_POST['a176'];
$a177 = $_POST['a177'];
$a178 = $_POST['a178'];
$a179 = $_POST['a179'];
$a180 = $_POST['a180'];
$a181 = $_POST['a181'];
$a182 = $_POST['a182'];
$a183 = $_POST['a183'];
$a184 = $_POST['a184'];
$a185 = $_POST['a185'];
$a186 = $_POST['a186'];
$a187 = $_POST['a187'];
$a188 = $_POST['a188'];
$a189 = $_POST['a189'];

if($a130=='2'){
	$a150=0;
	$a154=0;
	$a158=0;
	$a162=0;
	$a166=0;
	$a170=0;
	$a174=0;
	$a178=0;
	$a182=0;
	$a186=0;
}

$sql = "update 102allowance4 set 
a130='$a130', 
a131='$a131', 
a132='$a132', 
a133='$a133', 
a134='$a134', 
a135='$a135', 
a136='$a136', 
a137='$a137', 
a138='$a138', 
a139='$a139', 
a140='$a140', 
a141='$a141', 
a142='$a142', 
a143='$a143', 
a144='$a144', 
a145='$a145', 
a146='$a146', 
a147='$a147', 
a148='$a148', 
a149='$a149', 

a030='$a030', 
a031='$a031', 
a040='$a040', 
a041='$a041', 
a050='$a050', 
a051='$a051', 
a060='$a060', 
a061='$a061', 
a070='$a070', 
a071='$a071', 
a080='$a080', 
a081='$a081', 
a090='$a090', 
a091='$a091', 
a100='$a100', 
a101='$a101', 
a110='$a110', 
a111='$a111', 
a120='$a120', 
a121='$a121', 
a122='$a122', 

a150='$a150', 
a151='$a151', 
a152='$a152', 
a153='$a153', 
a154='$a154', 
a155='$a155', 
a156='$a156', 
a157='$a157', 
a158='$a158', 
a159='$a159', 
a160='$a160', 
a161='$a161', 
a162='$a162', 
a163='$a163', 
a164='$a164', 
a165='$a165', 
a166='$a166', 
a167='$a167', 
a168='$a168', 
a169='$a169', 
a170='$a170', 
a171='$a171', 
a172='$a172', 
a173='$a173', 
a174='$a174', 
a175='$a175', 
a176='$a176', 
a177='$a177', 
a178='$a178', 
a179='$a179', 
a180='$a180', 
a181='$a181', 
a182='$a182', 
a183='$a183', 
a184='$a184', 
a185='$a185', 
a186='$a186', 
a187='$a187', 
a188='$a188', 
a189='$a189',
a250='$email',
a251='$username' 
where account='$id'";
mysql_query($sql);
//↑a190 ='$email' 刪除，補助項目的a190是複審狀態專用(email資料先移到a250)

//寫入是否審核通過
	$sql = "update 102schooldata set a195 = '$a130' where account='$id'";
	mysql_query($sql);

//寫入審查委員代號
  $sql = "update school_checkdate set  money_ex4 = '$username' where account='$id'";
	
//更新資料庫
if(mysql_query($sql)){
	echo '新增成功!';
	//echo '<meta http-equiv=REFRESH CONTENT=2;url=a1_examine_table.php>';
	//改由最後面的JavaScript關閉此視窗
}else{
	echo '新增失敗';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=../../user.php?op=logout>';
}

include "../../footer.php";
?>
<script language="JavaScript">
setTimeout( "window.close();", 1000 );
</script>