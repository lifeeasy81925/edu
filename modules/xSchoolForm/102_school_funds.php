<?php
// 
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
//include "./checkdate.php";
session_start();
$op = $_GET["op"];

$datetime = date ("Y" , mktime(date('Y'))) ; 

$sql = "select * from 102schooldata where account like '$username' ";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$id = $row[0]; //帳號
	$type = $row[1]; //學校型態
	$city = $row[2]; //縣市
	$district = $row[4]; //區
	$school = $row[5]; //學校名稱
	$classes = $row[101];

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

	$p150 = $row[150]; //符合補一
	$p151 = $row[151]; //符合補二
	$p152 = $row[152]; //符合補三教師
	$p153 = $row[153]; //符合補三學生
	$p154 = $row[154]; //符合補四
	$p155 = $row[155]; //符合補五
	$p156 = $row[156]; //符合補六
	$p157 = $row[157]; //符合補七

	$p158 = $row[158]; //申請補一
	$p159 = $row[159]; //申請補二
	$p160 = $row[160]; //申請補三教師
	$p161 = $row[161]; //申請補三學生
	$p162 = $row[162]; //申請補四
	$p163 = $row[163]; //申請補五
	$p164 = $row[164]; //申請補六
	$p165 = $row[165]; //申請補七
	
	//補二判斷用
	if ($classes < 13){
		$a2key = 1;
	}else{
		$a2key = 2;
	}
	
	//補三判斷用
	if ($p160 == 1) {
		$a3key = 2;
		$a3item = "教師宿舍";	
	}
	if ($p161 == 1) {
		$a3key = 1;
		$a3item = "學生宿舍";	
	}
	if ($p160 == 1 && $p161 == 1) {
		$a3key = 3;
		$a3item = "教師宿舍及學生宿舍";
	}
	
	//$s1=array("","經常門","資本門");
	//$s2=array("","充實設備","教師宿舍修繕","學生宿舍修繕","其他");
}

switch ($op)
{
	case "1":
		$sql = "select * from 102allowance1 where account like '$username' ";
		$title_a = "補助項目一：推展親職教育活動";
		break;
	case "2":
		$sql = "select * from 102allowance2 where account like '$username' ";
		if($a2key == 2) {
			$sql_2 = "select * from 102allowance2_2 where account like '$username' ";
		}
		$title_a = "補助項目二：補助學校發展教育特色";
		break;
	case "3":
		$sql = "select * from 102allowance3 where account like '$username' ";
		if($p161 == 1) {
			$sql_2 = "select * from 102allowance3_2 where account like '$username' ";
		}
		$title_a = "補助項目三：修繕離島或偏遠地區師生宿舍";
		break;
	case "4":
		$sql = "select * from 102allowance4 where account like '$username' ";
		$title_a = "補助項目四：充實學校基本教學設備";
		break;
	case "5":
		$sql = "select * from 102allowance5 where account like '$username' ";
		$sql_2 = "select * from 102allowance5_2 where account like '$username' ";
		$title_a = "補助項目五：發展原住民教育文化特色及充實設備器材";
		break;
	case "6":
		$sql = "select * from 102allowance6 where account like '$username' ";
		$title_a = "補助項目六：補助交通不便地區學校交通車";
		break;
	case "7":
		$sql = "select * from 102allowance7 where account like '$username' ";
		$title_a = "補助項目七：整修學校社區化活動場所";
		break;
	default:
	
}

//a010 學校申請總額
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$a010 = $row[10]; //本項目學校申請總額
	$a011 = $row[11]; //
	$a012 = $row[12]; //
	$a013 = $row[13]; //
	$a014 = $row[14]; //
	$a015 = $row[15]; //
	$a016 = $row[16]; //
	$a017 = $row[17]; //
	$a018 = $row[18]; //
	$a019 = $row[19]; //
	$a020 = $row[20]; //
	$a021 = $row[21]; //
	$a022 = $row[22]; //
	$a023 = $row[23]; //
	$a024 = $row[24]; //
	$a025 = $row[25]; //
	$a026 = $row[26]; //
	$a027 = $row[27]; //
	$a028 = $row[28]; //
	$a029 = $row[29]; //
	
	$a030 = $row[30]; //經費表1-1
	$a031 = $row[31]; //
	$a032 = $row[32]; //
	$a033 = $row[33]; //
	$a034 = $row[34]; //
	$a035 = $row[35]; //
	$a036 = $row[36]; //
	$a037 = $row[37]; //
	$a038 = $row[38]; //
	$a039 = $row[39]; //
	$a040 = $row[40]; //2-1
	$a041 = $row[41]; //
	$a042 = $row[42]; //
	$a043 = $row[43]; //
	$a044 = $row[44]; //
	$a045 = $row[45]; //
	$a046 = $row[46]; //
	$a047 = $row[47]; //
	$a048 = $row[48]; //
	$a049 = $row[49]; //
	$a050 = $row[50]; //3-1
	$a051 = $row[51]; //
	$a052 = $row[52]; //
	$a053 = $row[53]; //
	$a054 = $row[54]; //
	$a055 = $row[55]; //
	$a056 = $row[56]; //
	$a057 = $row[57]; //
	$a058 = $row[58]; //
	$a059 = $row[59]; //
	$a060 = $row[60]; //4-1
	$a061 = $row[61]; //
	$a062 = $row[62]; //
	$a063 = $row[63]; //
	$a064 = $row[64]; //
	$a065 = $row[65]; //
	$a066 = $row[66]; //
	$a067 = $row[67]; //
	$a068 = $row[68]; //
	$a069 = $row[69]; //
	$a070 = $row[70]; //5-1
	$a071 = $row[71]; //
	$a072 = $row[72]; //
	$a073 = $row[73]; //
	$a074 = $row[74]; //
	$a075 = $row[75]; //
	$a076 = $row[76]; //
	$a077 = $row[77]; //
	$a078 = $row[78]; //
	$a079 = $row[79]; //
	$a080 = $row[80]; //6-1
	$a081 = $row[81]; //
	$a082 = $row[82]; //
	$a083 = $row[83]; //
	$a084 = $row[84]; //
	$a085 = $row[85]; //
	$a086 = $row[86]; //
	$a087 = $row[87]; //
	$a088 = $row[88]; //
	$a089 = $row[89]; //
	$a090 = $row[90]; //7-1
	$a091 = $row[91]; //
	$a092 = $row[92]; //
	$a093 = $row[93]; //
	$a094 = $row[94]; //
	$a095 = $row[95]; //
	$a096 = $row[96]; //
	$a097 = $row[97]; //
	$a098 = $row[98]; //
	$a099 = $row[99]; //
	$a100 = $row[100]; //8-1
	$a101 = $row[101]; //
	$a102 = $row[102]; //
	$a103 = $row[103]; //
	$a104 = $row[104]; //
	$a105 = $row[105]; //
	$a106 = $row[106]; //
	$a107 = $row[107]; //
	$a108 = $row[108]; //
	$a109 = $row[109]; //
	$a110 = $row[110]; //9-1
	$a111 = $row[111]; //
	$a112 = $row[112]; //
	$a113 = $row[113]; //
	$a114 = $row[114]; //
	$a115 = $row[115]; //
	$a116 = $row[116]; //
	$a117 = $row[117]; //
	$a118 = $row[118]; //
	$a119 = $row[119]; //
	$a120 = $row[120]; //10-1
	$a121 = $row[121]; //
	$a122 = $row[122]; //
	$a123 = $row[123]; //
	$a124 = $row[124]; //
	$a125 = $row[125]; //
	$a126 = $row[126]; //
	$a127 = $row[127]; //
	$a128 = $row[128]; //
	$a129 = $row[129]; //
	
}


//第二個經費表
if( $sql_2 > "") {
	$result = mysql_query($sql_2);
	while($row = mysql_fetch_row($result)){
	$b030 = $row[30]; //經費表1-1
	$b031 = $row[31]; //
	$b032 = $row[32]; //
	$b033 = $row[33]; //
	$b034 = $row[34]; //
	$b035 = $row[35]; //
	$b036 = $row[36]; //
	$b037 = $row[37]; //
	$b038 = $row[38]; //
	$b039 = $row[39]; //
	$b040 = $row[40]; //2-1
	$b041 = $row[41]; //
	$b042 = $row[42]; //
	$b043 = $row[43]; //
	$b044 = $row[44]; //
	$b045 = $row[45]; //
	$b046 = $row[46]; //
	$b047 = $row[47]; //
	$b048 = $row[48]; //
	$b049 = $row[49]; //
	$b050 = $row[50]; //3-1
	$b051 = $row[51]; //
	$b052 = $row[52]; //
	$b053 = $row[53]; //
	$b054 = $row[54]; //
	$b055 = $row[55]; //
	$b056 = $row[56]; //
	$b057 = $row[57]; //
	$b058 = $row[58]; //
	$b059 = $row[59]; //
	$b060 = $row[60]; //4-1
	$b061 = $row[61]; //
	$b062 = $row[62]; //
	$b063 = $row[63]; //
	$b064 = $row[64]; //
	$b065 = $row[65]; //
	$b066 = $row[66]; //
	$b067 = $row[67]; //
	$b068 = $row[68]; //
	$b069 = $row[69]; //
	$b070 = $row[70]; //5-1
	$b071 = $row[71]; //
	$b072 = $row[72]; //
	$b073 = $row[73]; //
	$b074 = $row[74]; //
	$b075 = $row[75]; //
	$b076 = $row[76]; //
	$b077 = $row[77]; //
	$b078 = $row[78]; //
	$b079 = $row[79]; //
	$b080 = $row[80]; //6-1
	$b081 = $row[81]; //
	$b082 = $row[82]; //
	$b083 = $row[83]; //
	$b084 = $row[84]; //
	$b085 = $row[85]; //
	$b086 = $row[86]; //
	$b087 = $row[87]; //
	$b088 = $row[88]; //
	$b089 = $row[89]; //
	$b090 = $row[90]; //7-1
	$b091 = $row[91]; //
	$b092 = $row[92]; //
	$b093 = $row[93]; //
	$b094 = $row[94]; //
	$b095 = $row[95]; //
	$b096 = $row[96]; //
	$b097 = $row[97]; //
	$b098 = $row[98]; //
	$b099 = $row[99]; //
	$b100 = $row[100]; //8-1
	$b101 = $row[101]; //
	$b102 = $row[102]; //
	$b103 = $row[103]; //
	$b104 = $row[104]; //
	$b105 = $row[105]; //
	$b106 = $row[106]; //
	$b107 = $row[107]; //
	$b108 = $row[108]; //
	$b109 = $row[109]; //
	$b110 = $row[110]; //9-1
	$b111 = $row[111]; //
	$b112 = $row[112]; //
	$b113 = $row[113]; //
	$b114 = $row[114]; //
	$b115 = $row[115]; //
	$b116 = $row[116]; //
	$b117 = $row[117]; //
	$b118 = $row[118]; //
	$b119 = $row[119]; //
	$b120 = $row[120]; //10-1
	$b121 = $row[121]; //
	$b122 = $row[122]; //
	$b123 = $row[123]; //
	$b124 = $row[124]; //
	$b125 = $row[125]; //
	$b126 = $row[126]; //
	$b127 = $row[127]; //
	$b128 = $row[128]; //
	$b129 = $row[129]; //

	}
}
//
//
if ($p160 == 1) {
	$a3key = 2;
	$a3item = "教師宿舍";	
}
if ($p161 == 1) {
	$a3key = 1;
	$a3item = "學生宿舍";	
}
if ($p160 == 1 && $p161 == 1) {
	$a3key = 3;
	$a3item = "教師宿舍及學生宿舍";
}

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p><b><? echo $title_a; ?> 經費表</b></p>
<b>※本項目申請經費：<? echo number_format($a010);?>元，其中包含經常門經費<? echo number_format($a011);?>元，資本門經費<? echo number_format($a012);?>元。</b><p>
<? if( !($op==2 || $op==3 || $op==5) ) echo "<!--"; ?>
※子項目一經費：<? echo number_format($a013);?>元，其中包含經常門經費<? echo number_format($a014);?>元，資本門經費<? echo number_format($a015);?>元。<br />
<? if( !($op==2 || $op==3 || $op==5) ) echo "-->"; ?>

<? //經費表 一 ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:14px;">
  <tr>
    <td colspan="9" align="left" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;"><? echo $title_a;?><? if($op==3 && $p160==1) echo "　教師宿舍";?></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">科目</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">類別</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">項目</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">金額</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">說明</td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">1.</td>
    <td align="left"><? echo $a030;?></td>
    <td align="left"><? echo $a031;?></td>
    <td align="left"><? echo $a032;?></td>
    <td align="left"><? echo $a033;?></td>
    <td align="left"><? echo $a034;?></td>
    <td align="left"><? echo $a035;?></td>
    <td align="left"><? echo $a036;?></td>
    <td align="left"><? echo $a037;?></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">2.</td>
    <td align="left"><? echo $a040;?></td>
    <td align="left"><? echo $a041;?></td>
    <td align="left"><? echo $a042;?></td>
    <td align="left"><? echo $a043;?></td>
    <td align="left"><? echo $a044;?></td>
    <td align="left"><? echo $a045;?></td>
    <td align="left"><? echo $a046;?></td>
    <td align="left"><? echo $a047;?></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">3.</td>
    <td align="left"><? echo $a050;?></td>
    <td align="left"><? echo $a051;?></td>
    <td align="left"><? echo $a052;?></td>
    <td align="left"><? echo $a053;?></td>
    <td align="left"><? echo $a054;?></td>
    <td align="left"><? echo $a055;?></td>
    <td align="left"><? echo $a056;?></td>
    <td align="left"><? echo $a057;?></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">4.</td>
    <td align="left"><? echo $a060;?></td>
    <td align="left"><? echo $a061;?></td>
    <td align="left"><? echo $a062;?></td>
    <td align="left"><? echo $a063;?></td>
    <td align="left"><? echo $a064;?></td>
    <td align="left"><? echo $a065;?></td>
    <td align="left"><? echo $a066;?></td>
    <td align="left"><? echo $a067;?></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">5.</td>
    <td align="left"><? echo $a070;?></td>
    <td align="left"><? echo $a071;?></td>
    <td align="left"><? echo $a072;?></td>
    <td align="left"><? echo $a073;?></td>
    <td align="left"><? echo $a074;?></td>
    <td align="left"><? echo $a075;?></td>
    <td align="left"><? echo $a076;?></td>
    <td align="left"><? echo $a077;?></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">6.</td>
    <td align="left"><? echo $a080;?></td>
    <td align="left"><? echo $a081;?></td>
    <td align="left"><? echo $a082;?></td>
    <td align="left"><? echo $a083;?></td>
    <td align="left"><? echo $a084;?></td>
    <td align="left"><? echo $a085;?></td>
    <td align="left"><? echo $a086;?></td>
    <td align="left"><? echo $a087;?></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">7.</td>
    <td align="left"><? echo $a090;?></td>
    <td align="left"><? echo $a091;?></td>
    <td align="left"><? echo $a092;?></td>
    <td align="left"><? echo $a093;?></td>
    <td align="left"><? echo $a094;?></td>
    <td align="left"><? echo $a095;?></td>
    <td align="left"><? echo $a096;?></td>
    <td align="left"><? echo $a097;?></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">8.</td>
    <td align="left"><? echo $a100;?></td>
    <td align="left"><? echo $a101;?></td>
    <td align="left"><? echo $a102;?></td>
    <td align="left"><? echo $a103;?></td>
    <td align="left"><? echo $a104;?></td>
    <td align="left"><? echo $a105;?></td>
    <td align="left"><? echo $a106;?></td>
    <td align="left"><? echo $a107;?></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">9.</td>
    <td align="left"><? echo $a110;?></td>
    <td align="left"><? echo $a111;?></td>
    <td align="left"><? echo $a112;?></td>
    <td align="left"><? echo $a113;?></td>
    <td align="left"><? echo $a114;?></td>
    <td align="left"><? echo $a115;?></td>
    <td align="left"><? echo $a116;?></td>
    <td align="left"><? echo $a117;?></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">10.</td>
    <td align="left"><? echo $a120;?></td>
    <td align="left"><? echo $a121;?></td>
    <td align="left"><? echo $a122;?></td>
    <td align="left"><? echo $a123;?></td>
    <td align="left"><? echo $a124;?></td>
    <td align="left"><? echo $a125;?></td>
    <td align="left"><? echo $a126;?></td>
    <td align="left"><? echo $a127;?></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">合計</td>
    <td align="left"><? echo number_format($a036+$a046+$a056+$a066+$a076+$a086+$a096+$a106+$a116+$a126);?></td>
    <td align="left">&nbsp;</td>
  </tr>
</table>
<? if ($a3key == 1) { echo "-->"; } ?>
<p>
<!-- 子項目二 -->
<? if ($op==1 || $op==4 || $op==7 || ($op==2 && $a2key == 1) || ($op==3 && $a3key == 2)) { echo "<!--"; } ?>
※子項目二經費：<? echo number_format($a016);?>元，其中包含經常門經費<? echo number_format($a017);?>元，資本門經費<? echo number_format($a018);?>元。<br />
<? //經費表 二 ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:14px;">
  <tr>
    <td colspan="9" align="left" nowrap="nowrap" bgcolor="#FFCC66"  style="font-size:14px;"><? echo $title_a;?><? if($op==3 && $p161==1) echo "　學生宿舍";?></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap" bgcolor="#FFCC99">項次</td>
    <td align="left" nowrap="nowrap" bgcolor="#FFCC99">科目</td>
    <td align="left" nowrap="nowrap" bgcolor="#FFCC99">類別</td>
    <td align="left" nowrap="nowrap" bgcolor="#FFCC99">項目</td>
    <td align="left" nowrap="nowrap" bgcolor="#FFCC99">單位</td>
    <td align="left" nowrap="nowrap" bgcolor="#FFCC99">單價</td>
    <td align="left" nowrap="nowrap" bgcolor="#FFCC99">數量</td>
    <td align="left" nowrap="nowrap" bgcolor="#FFCC99">金額</td>
    <td align="left" nowrap="nowrap" bgcolor="#FFCC99">說明</td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">1.</td>
    <td align="left"><? echo $b030;?></td>
    <td align="left"><? echo $b031;?></td>
    <td align="left"><? echo $b032;?></td>
    <td align="left"><? echo $b033;?></td>
    <td align="left"><? echo $b034;?></td>
    <td align="left"><? echo $b035;?></td>
    <td align="left"><? echo $b036;?></td>
    <td align="left"><? echo $b037;?></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">2.</td>
    <td align="left"><? echo $b040;?></td>
    <td align="left"><? echo $b041;?></td>
    <td align="left"><? echo $b042;?></td>
    <td align="left"><? echo $b043;?></td>
    <td align="left"><? echo $b044;?></td>
    <td align="left"><? echo $b045;?></td>
    <td align="left"><? echo $b046;?></td>
    <td align="left"><? echo $b047;?></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">3.</td>
    <td align="left"><? echo $b050;?></td>
    <td align="left"><? echo $b051;?></td>
    <td align="left"><? echo $b052;?></td>
    <td align="left"><? echo $b053;?></td>
    <td align="left"><? echo $b054;?></td>
    <td align="left"><? echo $b055;?></td>
    <td align="left"><? echo $b056;?></td>
    <td align="left"><? echo $b057;?></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">4.</td>
    <td align="left"><? echo $b060;?></td>
    <td align="left"><? echo $b061;?></td>
    <td align="left"><? echo $b062;?></td>
    <td align="left"><? echo $b063;?></td>
    <td align="left"><? echo $b064;?></td>
    <td align="left"><? echo $b065;?></td>
    <td align="left"><? echo $b066;?></td>
    <td align="left"><? echo $b067;?></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">5.</td>
    <td align="left"><? echo $b070;?></td>
    <td align="left"><? echo $b071;?></td>
    <td align="left"><? echo $b072;?></td>
    <td align="left"><? echo $b073;?></td>
    <td align="left"><? echo $b074;?></td>
    <td align="left"><? echo $b075;?></td>
    <td align="left"><? echo $b076;?></td>
    <td align="left"><? echo $b077;?></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">6.</td>
    <td align="left"><? echo $b080;?></td>
    <td align="left"><? echo $b081;?></td>
    <td align="left"><? echo $b082;?></td>
    <td align="left"><? echo $b083;?></td>
    <td align="left"><? echo $b084;?></td>
    <td align="left"><? echo $b085;?></td>
    <td align="left"><? echo $b086;?></td>
    <td align="left"><? echo $b087;?></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">7.</td>
    <td align="left"><? echo $b090;?></td>
    <td align="left"><? echo $b091;?></td>
    <td align="left"><? echo $b092;?></td>
    <td align="left"><? echo $b093;?></td>
    <td align="left"><? echo $b094;?></td>
    <td align="left"><? echo $b095;?></td>
    <td align="left"><? echo $b096;?></td>
    <td align="left"><? echo $b097;?></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">8.</td>
    <td align="left"><? echo $b100;?></td>
    <td align="left"><? echo $b101;?></td>
    <td align="left"><? echo $b102;?></td>
    <td align="left"><? echo $b103;?></td>
    <td align="left"><? echo $b104;?></td>
    <td align="left"><? echo $b105;?></td>
    <td align="left"><? echo $b106;?></td>
    <td align="left"><? echo $b107;?></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">9.</td>
    <td align="left"><? echo $b110;?></td>
    <td align="left"><? echo $b111;?></td>
    <td align="left"><? echo $b112;?></td>
    <td align="left"><? echo $b113;?></td>
    <td align="left"><? echo $b114;?></td>
    <td align="left"><? echo $b115;?></td>
    <td align="left"><? echo $b116;?></td>
    <td align="left"><? echo $b117;?></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">10.</td>
    <td align="left"><? echo $b120;?></td>
    <td align="left"><? echo $b121;?></td>
    <td align="left"><? echo $b122;?></td>
    <td align="left"><? echo $b123;?></td>
    <td align="left"><? echo $b124;?></td>
    <td align="left"><? echo $b125;?></td>
    <td align="left"><? echo $b126;?></td>
    <td align="left"><? echo $b127;?></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">合計</td>
    <td align="left"><? echo number_format($b036+$b046+$b056+$b066+$b076+$b086+$b096+$b106+$b116+$b126);?></td>
    <td align="left">&nbsp;</td>
  </tr>
</table>
<? if ($op==1 || $op==4|| $op==7 || ($op==2 && $a2key == 1) || ($op==3 && $a3key == 2)) { echo "-->"; } ?>
<p>
<input type="button" value="關閉本頁" onClick="window.close()">
<?php 
	include "../xSchoolForm/button_print.php";
	echo "<br>若要進行文書格式編修，建議複製到Excel編輯。<br>";
	echo "操作方式：1.全選&lt;Ctrl+A&gt; (在本頁全選)， 2.複製&lt;Ctrl+C&gt; (複製選取區)，3.貼上&lt;Ctrl+V&gt; (在Excel工作表貼上)";
	//include "../../footer.php"; 
?>