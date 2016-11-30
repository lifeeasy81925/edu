<?
//連接point table 取出所有的符合指標 
if($class == '1' ){
	$basedata="100element_point";
}else{
	$basedata="100junior_point";
}			
$sql = "select  *  from ".$basedata." where account like '$username'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$a = $row[1];			//1-1
	$b = $row[2];			//1-2
	$c = $row[3];			//1-3
	$d = $row[4];			//1-4
	$e = $row[5];			//2-1
	$f = $row[6];			//2-2
	$g = $row[7];			//3
	$h = $row[8];			//4
	$i = $row[9];			//6-1
	$j = $row[10];			//2-3
	$k = $row[11];			//5-1
	$l = $row[12];			//6-2
	$m = $row[13];			//5-2
	$n = $row[14];			//5-3		
}
//連接basedata取出for_a8r1_1是否符合申請補助項目8 (1=不允許, 2=允許)
if($class == '1' ){
	$basedata="100element_basedata";
}else{
	$basedata="100junior_basedata";
}			
$sql = "select  *  from ".$basedata." where account like '$username'";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	if($class == '1' ){	  // 國小
		$area = $row[11]; // 學校所在地區
		$for_a8r1_1 = $row[14]; // 是否曾經申請補助興建學校社區化活動場所
		$for_a8r1_2 = $row[15];
		$for_a8r1_3 = $row[16];	
	}else{				 // 非國小
		$area = $row[8]; // 學校所在地區
		$for_a8r1_1 = $row[11]; // 是否曾經申請補助興建學校社區化活動場所
		$for_a8r1_2 = $row[12];
		$for_a8r1_3 = $row[13];	
	}	
}
//計算補助項目
$a_1 = ($a==1 || $b==1 || $c==1 || $d==1 || $e==1 || $f==1 || $h==1 || $k==1 || $m==1);
$a_2 = ($a==1 || $k==1 );
$a_3 = ($j==1 || $h==1 || $k==1 || $m==1);
$a_4_1 = ($a==1 || $b==1 || $c==1 || $k==1 || $m==1);
$a_4_2 = ($i==1 || $l==1 || $k==1 || $m==1);
$a_5 = ($a==1 || $b==1 || $c==1 || $g==1 || $k==1 || $m==1);
$a_6 = ($a==1 || $b==1 || $c==1);
$a_7 = ($k ==1 || $m==1 || $n==1);
$a_8 = ($a==1 || $b==1 || $c==1 || $e==1 || $h==1 );
// 設定：若符合補助項目六可申請，則補助項目三不符合
if ($a_6 == 1){
	$a_3 = 0;
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
if ($for_a8r1_1 == 1){
	$a_8 = 0;
}
?>
