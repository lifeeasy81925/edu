<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_insert.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
$last = date("Y-m-d H:i:s");
$s01=$_POST['s01'];
$s02=$_POST['s02'];
$s03=$_POST['s03'];
$s04=$_POST['s04'];
$s05=$_POST['s05'];
$s06=$_POST['s06'];
$s07=$_POST['s07'];
$s08=$_POST['s08'];
$s09=$_POST['s09'];
$s10=$_POST['s10'];
$s11=$_POST['s11'];
$s12=$_POST['s12'];
$s13=$_POST['s13'];
$s14=$_POST['s14'];
$s15=$_POST['s15'];
$s16=$_POST['s16'];
$s17=$_POST['s17'];
$s18=$_POST['s18'];
$s19=$_POST['s19'];
$s20=$_POST['s20'];
$s21=$_POST['s21'];
$s22=$_POST['s22'];
$s23=$_POST['s23'];
$s24=$_POST['s24'];
$s25=$_POST['s25'];
$s26=$_POST['s26'];
$s27=$_POST['s27'];
$s28=$_POST['s28'];
$s29=$_POST['s29'];
$s30=$_POST['s30'];
$s31=$_POST['s31'];
$s32=$_POST['s32'];
$s33=$_POST['s33'];
$s34=$_POST['s34'];
$s35=$_POST['s35'];
$s36=$_POST['s36'];
$s37=$_POST['s37'];
$s38=$_POST['s38'];
$s39=$_POST['s39'];
$s40=$_POST['s40'];
$s41=$_POST['s41'];
$s42=$_POST['s42'];
$s43=$_POST['s43'];
$s44=$_POST['s44'];
$s45=$_POST['s45'];
$s46=$_POST['s46'];
$s47=$_POST['s47'];
$s48=$_POST['s48'];
$s49=$_POST['s49'];
$s50=$_POST['s50'];

$sql = "update 101school_survey_01 set s01='$s01', s02='$s02', s03='$s03', s04='$s04', s05='$s05', s06='$s06', s07='$s07', s08='$s08', s09='$s09', s10='$s10', s11='$s11', s12='$s12', s13='$s13', s14='$s14', s15='$s15', s16='$s16', s17='$s17', s18='$s18', s19='$s19', s20='$s20', s21='$s21', s22='$s22', s23='$s23', s24='$s24', s25='$s25', s26='$s26', s27='$s27', s28='$s28', s29='$s29', s30='$s30', s31='$s31', s32='$s32', s33='$s33', s34='$s34', s35='$s35', s36='$s36', s37='$s37', s38='$s38', s39='$s39', s40='$s40', s41='$s41', s42='$s42', s43='$s43', s44='$s44', s45='$s45', s46='$s46', s47='$s47', s48='$s48', s49='$s49', s50='$s50', last = '$last' where account='$username'";
if(mysql_query($sql)){
	echo '新增成功！<br>';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=school_index.php>';
}else{
	echo '新增失敗！<br>';
	//echo '<meta http-equiv=REFRESH CONTENT=2;url=../../user.php?op=logout>';
}

include "../../footer.php";
?>