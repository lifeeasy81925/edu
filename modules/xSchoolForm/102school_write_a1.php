<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
include "./checkdate.php";
$datetime = date ("Y" , mktime(date('Y'))) ; 


$sql = "select * from 102schooldata where account like '$username' ";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$id = $row[0]; //帳號
	$type = $row[1]; //學校型態
	$city = $row[2]; //縣市
	$district = $row[4]; //區
	$school = $row[5]; //學校名稱

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
}

	
//a010 學校申請總額
$sql = "select * from 102allowance1 where account like '$username' ";
$result = mysql_query($sql);
while($row = mysql_fetch_row($result)){
	$a010 = $row[10]; //本項目學校申請總額
	$a011 = $row[11]; //本項目學校申請經常門
	$a012 = $row[12]; //本項目學校申請資本門
	$a013 = $row[13]; //親職講座總和
	$a014 = $row[14]; //親職講座場次
	$a015 = $row[15]; //親職講座人數
	$a016 = $row[16]; //家庭訪視總和
	$a017 = $row[17]; //家庭訪視人次
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
	
	//補一設定
	$a030 = "經常門";
	$a031 = "鐘點費";
	$a032 = "內聘講師";
	$a033 = "時";
	$a034 = 800;
	
	$a040 = "經常門";
	$a041 = "鐘點費";
	$a042 = "外聘講師";
	$a043 = "時";
	$a044 = 1200;
	
	$a050 = "經常門";
	$a051 = "鐘點費";
	$a052 = "外聘講師";
	$a053 = "時";
	$a054 = 1600;

	$a060 = "經常門";
	$a061 = "場地費";
	$a062 = "活動場地費";
	$a063 = "次";
	
	$a070 = "經常門";
	$a071 = "誤餐費";
	$a072 = "誤餐費";
	$a073 = "人";
	//$a074 = 80;

	$a080 = "經常門";
	$a081 = "講義文件費";
	//$a072 = "講義文件費";
	$a083 = "人";

	$a090 = "經常門";
	$a091 = "其他";

	$a100 = "經常門";
	$a101 = "其他";
	
	$a110 = "經常門";
	$a111 = "其他";
	
	$a120 = "經常門";
	$a121 = "雜支";
	if($a013<1) $a122 = "1"; //若尚未填寫金額，內定為申請雜支

}

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="102school_write_a1_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><b>補助項目一：推展親職教育活動</b>　<a href="/edu/modules/xSchoolForm/download/allowance-01.htm" target="_blank">(補助項目說明)</a></p>
<p style='margin-left: 1em; text-indent: -1em'>
<font color=blue>※親職教育-申請補助經費：<input type="text" size="6" name="familysum" value=<? echo $a013+$a016;?> style="border:0px; text-align: right;" readonly >元。(本列自動產生)</font><br />
說明：本項目最高補助7萬元，其中辦理親職教育活動最高補助2萬元，家庭訪視申請補助經費標準最高為每人次200元。
<p>
<strong>※親職講座</strong><br>
•預計辦理親職講座<input type="text" size="2" name="afterLec" value="<? if($a014 =='') echo ''; else echo $a014;?>"/>
場，參加人數<input type="text" size="3" name="afterNum" value="<? if($a015 =='') echo ''; else echo $a015;?>"/>人，<font color=blue>申請補助經費<input type="text" size="5" name="afterMon" onChange="change1()" value="<? if($a013 =='') echo ''; else echo $a013;?>" style="border:0px; text-align: right;" readonly >元</font>。
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFCC" style="font-size:12px;">
  <tr>
    <td colspan="9" align="left" nowrap="nowrap" bgcolor="#99CC66"  style="font-size:14px;">親職講座經費概算：</td>
    </tr>
  <tr>
    <td width="10" align="left" nowrap="nowrap" bgcolor="#99CCCC">項次</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">科目</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">類別</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">項目</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">單位</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">單價</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">數量</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">金額<br />
      (自動產生)</td>
    <td align="left" nowrap="nowrap" bgcolor="#99CCCC">說明</td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">1.</td>
    <td align="left"><input type="text" size="3" name="a030" value="<? if($a030 =='') echo ''; else echo $a030;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a031" value="<? if($a031 =='') echo ''; else echo $a031;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a032" value="<? if($a032 =='') echo ''; else echo $a032;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a033" value="<? if($a033 =='') echo ''; else echo $a033;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a034" onchange="js:Count(this);" value="<? if($a034 =='') echo ''; else echo $a034;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a035" onchange="js:Count(this);" value="<? if($a035 =='') echo ''; else echo $a035;?>"/></td>
    <td align="left"><input type="text" size="4" name="a036" value="<? if($a036 =='') echo ''; else echo $a036;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="a037" value="<? if($a037 =='') echo ''; else echo $a037;?>"/></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">2.</td>
    <td align="left"><input type="text" size="3" name="a040" value="<? if($a040 =='') echo ''; else echo $a040;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a041" value="<? if($a041 =='') echo ''; else echo $a041;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a042" value="<? if($a042 =='') echo ''; else echo $a042;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a043" value="<? if($a043 =='') echo ''; else echo $a043;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a044" onchange="js:Count(this);" value="<? if($a044 =='') echo ''; else echo $a044;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a045" onchange="js:Count(this);" value="<? if($a045 =='') echo ''; else echo $a045;?>"/></td>
    <td align="left"><input type="text" size="4" name="a046" value="<? if($a046 =='') echo ''; else echo $a046;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="a047" value="<? if($a047 =='') echo ''; else echo $a047;?>"/></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">3.</td>
    <td align="left"><input type="text" size="3" name="a050" value="<? if($a050 =='') echo ''; else echo $a050;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a051" value="<? if($a051 =='') echo ''; else echo $a051;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a052" value="<? if($a052 =='') echo ''; else echo $a052;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a053" value="<? if($a053 =='') echo ''; else echo $a053;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a054" onchange="js:Count(this);" value="<? if($a054 =='') echo ''; else echo $a054;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a055" onchange="js:Count(this);" value="<? if($a055 =='') echo ''; else echo $a055;?>"/></td>
    <td align="left"><input type="text" size="4" name="a056" value="<? if($a056 =='') echo ''; else echo $a056;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="a057" value="<? if($a057 =='') echo ''; else echo $a057;?>"/></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">4.</td>
    <td align="left"><input type="text" size="3" name="a060" value="<? if($a060 =='') echo ''; else echo $a060;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a061" value="<? if($a061 =='') echo ''; else echo $a061;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="10" name="a062" value="<? if($a062 =='') echo ''; else echo $a062;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="2" name="a063" value="<? if($a063 =='') echo ''; else echo $a063;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="4" name="a064" onchange="js:Count(this);" value="<? if($a064 =='') echo ''; else echo $a064;?>"/></td>
    <td align="left"><input type="text" size="2" name="a065" onchange="js:Count(this);" value="<? if($a065 =='') echo ''; else echo $a065;?>"/></td>
    <td align="left"><input type="text" size="4" name="a066" value="<? if($a066 =='') echo ''; else echo $a066;?>" style="border:0px; text-align: left;" readonly ></td>
    <td align="left"><input type="text" size="6" name="a067" value="<? if($a067 =='') echo ''; else echo $a067;?>"/></td>
  </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">5.</td>
    <td align="left"><input type="text" size="3" name="a070" value="<? if($a070 =='') echo ''; else echo $a070;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="10" name="a071" value="<? if($a071 =='') echo ''; else echo $a071;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="10" name="a072" value="<? if($a072 =='') echo ''; else echo $a072;?>"style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="2" name="a073" value="<? if($a073 =='') echo ''; else echo $a073;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a074" onchange="js:Count(this);" value="<? if($a074 =='') echo ''; else echo $a074;?>"/></td>
    <td align="left"><input type="text" size="2" name="a075" onchange="js:Count(this);" value="<? if($a075 =='') echo ''; else echo $a075;?>"/></td>
    <td align="left"><input type="text" size="4" name="a076" value="<? if($a076 =='') echo ''; else echo $a076;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="6" name="a077" value="<? if($a077 =='') echo ''; else echo $a077;?>"/></td>
    </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">6.</td>
    <td align="left"><input type="text" size="3" name="a080" value="<? if($a080 =='') echo ''; else echo $a080;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="10" name="a081" value="<? if($a081 =='') echo ''; else echo $a081;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="10" name="a082" value="<? if($a082 =='') echo ''; else echo $a082;?>"/></td>
    <td align="left"><input type="text" size="2" name="a083" value="<? if($a083 =='') echo ''; else echo $a083;?>"/></td>
    <td align="left"><input type="text" size="4" name="a084" onchange="js:Count(this);" value="<? if($a084 =='') echo ''; else echo $a084;?>"/></td>
    <td align="left"><input type="text" size="2" name="a085" onchange="js:Count(this);" value="<? if($a085 =='') echo ''; else echo $a085;?>"/></td>
    <td align="left"><input type="text" size="4" name="a086" value="<? if($a086 =='') echo ''; else echo $a086;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="6" name="a087" value="<? if($a087 =='') echo ''; else echo $a087;?>"/></td>
    </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">7.</td>
    <td align="left"><input type="text" size="3" name="a090" value="<? if($a090 =='') echo ''; else echo $a090;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="10" name="a091" value="<? if($a091 =='') echo ''; else echo $a091;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="10" name="a092" value="<? if($a092 =='') echo ''; else echo $a092;?>"/></td>
    <td align="left"><input type="text" size="2" name="a093" value="<? if($a093 =='') echo ''; else echo $a093;?>"/></td>
    <td align="left"><input type="text" size="4" name="a094" onchange="js:Count(this);" value="<? if($a094 =='') echo ''; else echo $a094;?>"/></td>
    <td align="left"><input type="text" size="2" name="a095" onchange="js:Count(this);" value="<? if($a095 =='') echo ''; else echo $a095;?>"/></td>
    <td align="left"><input type="text" size="4" name="a096" value="<? if($a096 =='') echo ''; else echo $a096;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="6" name="a097" value="<? if($a097 =='') echo ''; else echo $a097;?>"/></td>
    </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">8.</td>
    <td align="left"><input type="text" size="3" name="a100" value="<? if($a100 =='') echo ''; else echo $a100;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="10" name="a101" value="<? if($a101 =='') echo ''; else echo $a101;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="10" name="a102" value="<? if($a102 =='') echo ''; else echo $a102;?>"/></td>
    <td align="left"><input type="text" size="2" name="a103" value="<? if($a103 =='') echo ''; else echo $a103;?>"/></td>
    <td align="left"><input type="text" size="4" name="a104" onchange="js:Count(this);" value="<? if($a104 =='') echo ''; else echo $a104;?>"/></td>
    <td align="left"><input type="text" size="2" name="a105" onchange="js:Count(this);" value="<? if($a105 =='') echo ''; else echo $a105;?>"/></td>
    <td align="left"><input type="text" size="4" name="a106" value="<? if($a106 =='') echo ''; else echo $a106;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="6" name="a107" value="<? if($a107 =='') echo ''; else echo $a107;?>"/></td>
    </tr>
  <tr>
    <td align="center" nowrap="nowrap">9.</td>
    <td align="left"><input type="text" size="3" name="a110" value="<? if($a110 =='') echo ''; else echo $a110;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="10" name="a111" value="<? if($a111 =='') echo ''; else echo $a111;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="10" name="a112" value="<? if($a112 =='') echo ''; else echo $a112;?>"/></td>
    <td align="left"><input type="text" size="2" name="a113" value="<? if($a113 =='') echo ''; else echo $a113;?>"/></td>
    <td align="left"><input type="text" size="4" name="a114" onchange="js:Count(this);" value="<? if($a114 =='') echo ''; else echo $a114;?>"/></td>
    <td align="left"><input type="text" size="2" name="a115" onchange="js:Count(this);" value="<? if($a115 =='') echo ''; else echo $a115;?>"/></td>
    <td align="left"><input type="text" size="4" name="a116" value="<? if($a116 =='') echo ''; else echo $a116;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="6" name="a117" value="<? if($a117 =='') echo ''; else echo $a117;?>"/></td>
    </tr>
  <tr>
    <td width="10" align="center" nowrap="nowrap">10.</td>
    <td align="left"><input type="text" size="3" name="a120" value="<? if($a120 =='') echo ''; else echo $a120;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="10" name="a121" value="<? if($a121 =='') echo ''; else echo $a121;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left" valign="middle"><input type="checkbox" name="a122" onclick="js:chkbox(this);" value="1" <? if($a122 =='1') echo 'checked';?>/>
      申請雜支</td>
    <td align="left"><input type="text" size="2" name="a123" value="<? if($a123 =='') echo ''; else echo $a123;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a124" value="<? if($a124 =='') echo ''; else echo $a124;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="2" name="a125" value="<? if($a125 =='') echo ''; else echo $a125;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="4" name="a126" value="<? if($a126 =='') echo ''; else echo $a126;?>" style="border:0px; text-align: left;" readonly="readonly" /></td>
    <td align="left"><input type="text" size="6" name="a127" value="<? if($a127 =='') echo ''; else echo $a127;?>"/></td>
    </tr>
</table>


<br />
<strong>※家庭訪視</strong><br>
•預計申請個別家庭訪視<input type="text" size="3" name="afterFamMonLec" onchange="js:Count_family(this);" value="<? if($a017 =='') echo ''; else echo $a017;?>"/>人次，<font color=blue>申請輔助經費<input type="text" size="5" name="afterFamMon" onChange="change2()" value="<? if($a016 =='') echo ''; else echo $a016;?>" style="border:0px; text-align: right;" readonly >元(200元/人)</font>。<br />
說明：家庭訪視申請補助經費標準最高為每人次200元。
<p>
下載：<a href="/edu/modules/xSchoolForm/download/A0-1.空白計畫範本.doc" target="_new">空白計畫範本</a><br />
說明：確認送出後，請於學校入口「上傳檔案專區」上傳「推展親職教育活動實施計畫」檔案。
<p>
<INPUT TYPE="button" VALUE="上一頁(不儲存)" onClick="history.go(-1)">
<input type="submit" name="button" value="儲存並回上一頁" />

<script>
//申請補助經費更新
function numsum() { 
	var f = document.forms[0]; 
	f.familysum.value = (f.afterMon.value==""?0:parseFloat(f.afterMon.value)) + (f.afterFamMon.value==""?0:parseFloat(f.afterFamMon.value)); 
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

<!-- 檢查空值 與 數值檢核-->
<script language="JavaScript">
  function toCheck() {
    if ( document.form.afterMon.value == "" ) {
      alert("請填寫「親職講座申請補助經費」！");
      document.form.afterMon.focus();
      return false;
    }
    if ( document.form.afterLec.value == "" ) {
      alert("請填寫「親職講座預計辦理場次」！");
      document.form.afterLec.focus();
      return false;
    }
    if ( document.form.afterNum.value == "" ) {
      alert("請填寫「親職講座預計參加人數」！");
      document.form.afterNum.focus();
      return false;
    }		
    if ( document.form.afterFamMon.value == "" ) {
      alert("請填寫「家庭訪視申請補助經費」！");
      document.form.afterFamMon.focus();
      return false;
    }
    if ( document.form.afterFamMonLec.value == "" ) {
      alert("請填寫「家庭訪視預計訪視人次」！");
      document.form.afterFamMonLec.focus();
      return false;
    }
	//數值檢核
	if ( document.form.afterMon.value > 20000 ) {
      alert("親職講座最高補助金額2萬元！");
      document.form.afterMon.focus();
      return false;
    } else if ( document.form.afterFamMon.value > document.form.afterFamMonLec.value * 200 ) {
      alert("家庭訪視最高補助金額每人200元！");
      document.form.afterFamMon.focus();
      return false;
	} else if ( (document.form.afterMon.value * 1 + document.form.afterFamMon.value * 1) > 70000 ) {
      alert("本項目最高補助金額7萬元！");
      document.form.afterFamMon.focus();
      return false;
	}
			
    return true;
  }
  
	function Count(obj)
	{
		//控制項的名稱前半部 ex.a03 , a04
		var groupname = left(obj.name);

		//驗證輸入的資料是否為數字 
		var regex = /^[0-9]*$/;
		var flag = 1;
		if (!(regex.test(document.getElementsByName(groupname + 4)[0].value)))
		{
			alert('單價請輸入數字');
			document.getElementsByName(groupname + 4)[0].value = "";
			document.getElementsByName(groupname + 4)[0].focus();
			flag = 0;
		}
		
		if (!(regex.test(document.getElementsByName(groupname + 5)[0].value)))
		{
			alert('數量請輸入數字');
			document.getElementsByName(groupname + 5)[0].value = "";
			document.getElementsByName(groupname + 5)[0].focus();
			flag = 0;
		}
		
		//誤餐費單價上限不得超過80元。
		if (document.getElementsByName(groupname + 1)[0].value == "誤餐費" && document.getElementsByName(groupname + 4)[0].value > 80)
		{
			alert('誤餐費單價上限不得超過80元');
			document.getElementsByName(groupname + 4)[0].value = "";
			document.getElementsByName(groupname + 4)[0].focus();
			flag = 0;
		}
		
		//相加,不為空白才執行,
		if (flag == 1 && document.getElementsByName(groupname + 4)[0].value != "" && document.getElementsByName(groupname + 5)[0].value != "")
		{
			//類別&項目&單位，不為空白才相加
			if (document.getElementsByName(groupname + 1)[0].value != "" && document.getElementsByName(groupname + 2)[0].value != "" && document.getElementsByName(groupname + 3)[0].value != "")
			{
				document.getElementsByName(groupname + 6)[0].value = document.getElementsByName(groupname + 4)[0].value * document.getElementsByName(groupname + 5)[0].value;
				
			}
			else
			{
				alert('類別&項目&單位，不可為空白');
				document.getElementsByName(groupname + 4)[0].value = "";
				document.getElementsByName(groupname + 5)[0].value = "";
				document.getElementsByName(groupname + 6)[0].value = "";
				
			}
		}
		else if (document.getElementsByName(groupname + 4)[0].value == "" || document.getElementsByName(groupname + 5)[0].value == "")
		{
			document.getElementsByName(groupname + 6)[0].value = "";
			
		}
		
		chkbox(document.getElementsByName("a122")[0]);

	}

	//雜支未選則清空
	function chkbox(obj)
	{
		if (obj.checked == false)
		{
			document.getElementsByName("a126")[0].value = "";
		}
		else
		{
			var total = 0;

			//把a036 ~ a096加總，空值跳過
			for(var i = 3 ; i < 12 ; i++)
			{
				if(document.getElementsByName("a" + padLeft(i.toString(), 2) + "6")[0].value != "")
				{
					total += parseInt(document.getElementsByName("a" + padLeft(i.toString(), 2) + "6")[0].value);
				}
			}

			document.getElementsByName("a126")[0].value = parseInt(total * 0.06);
		}

		count_all();
	}

	//計算總金額
	function count_all()
	{
		var total = 0;

		//把a036 ~ a106加總，空值跳過
		for(var i = 3 ; i <= 12 ; i++)
		{
			if(document.getElementsByName("a" + padLeft(i.toString(), 2) + "6")[0].value != "")
			{
				total += parseInt(document.getElementsByName("a" + padLeft(i.toString(), 2) + "6")[0].value);
			}
		}
		
		document.getElementsByName("afterMon")[0].value = total;
		if (document.getElementsByName("afterFamMon")[0].value == "")
		{
			document.getElementsByName("afterFamMon")[0].value = 0;
		}
		
		document.getElementsByName("familysum")[0].value = total + parseInt(document.getElementsByName("afterFamMon")[0].value);
	
	}
	
	//計算家庭訪視金額
	function Count_family(obj)
	{
		//驗證輸入的資料是否為數字 
		var regex = /^[0-9]*$/;
		if (!(regex.test(document.getElementsByName("afterFamMonLec")[0].value)))
		{
			alert('「家庭訪視人次」必須為數字');
			document.getElementsByName("afterFamMonLec")[0].value = "";
			document.getElementsByName("afterFamMonLec")[0].focus();
		}
		else
		{
			if (document.getElementsByName("afterFamMonLec")[0].value == "")
				document.getElementsByName("afterFamMonLec")[0].value = 0;
				
			document.getElementsByName("afterFamMon")[0].value = parseInt(document.getElementsByName("afterFamMonLec")[0].value) * 200;
			count_all();
		}
		
	}

	//取得群組名稱
	function left(mainStr) 
	{ 
		return mainStr.substring(0,3);
	}
	
	// 左邊補0
	function padLeft(str,lenght)
	{
		if(str.length >= lenght)
			return str;
		else
			return padLeft("0" + str,lenght);
	}

	
</script>     

</form>

<!--(今年執行沒有建資料庫)-->
<?php include "../../footer.php"; ?>