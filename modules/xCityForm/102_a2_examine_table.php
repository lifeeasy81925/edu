<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect_city_ex.php";
include "./checkdate.php";
include "./checkmail.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="回前頁" onClick="location='102_allowance_examine.php'">
補助項目二：學校發展教育特色<br /><br />
已申請學校列表：
<table width="500" border="1">
	<td align="center">序號</td>
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>申請補助金額</td>
    <td align="center">初審結果<br />(按<font color=red><b>F5</b></font>可<font color=red><b>重新整理</b></font>狀態)</td>
<?
//合併二資料表再籂選
//$sql_element = "select * from 100element_money ,100element_examine_money  where 100element_money.account=100element_examine_money.account and 100element_money.school like '%$city%' order by 100element_money.account;";
$sql = "select * from 102allowance2 where cityname like '%$cityname%' order by account;";
$result = mysql_query($sql);
$serial = 0;
while($row = mysql_fetch_row($result)){
	$school = $row[0];						//學校帳號
	$class = $row[1];						//國中小別
	$school_name = $row[2].$row[4].$row[5];	//學校全名	

	//學校基本資料
	$sql_p = "select * from 102schooldata where account like '$school'";
	$result_p = mysql_query($sql_p);
	while($row_p = mysql_fetch_row($result_p)){
		$p100 = $row_p[100];		//全校學生數
		$classes = $row_p[101];	//全校班級數
	
		$p1_1 = $row_p[174];	//指標1-1值
		$p1_2 = $row_p[175];	//指標1-2值
		$p1_3 = $row_p[176];	//指標1-3值	
		$p1_4 = $row_p[177];	//指標1-4值
		$p2_1 = $row_p[178];	//指標2-1值
		$p2_2 = $row_p[179];	//指標2-2值
		$p2_3 = $row_p[180];	//指標2-3值	
		$p3_1 = $row_p[181];	//指標3-1值
		$p4_1 = $row_p[182];	//指標4-1值
		$p5_1 = $row_p[183];	//指標5-1值
		$p5_2 = $row_p[184];	//指標5-2值
		$p5_3 = $row_p[185];	//指標5-3值	
		$p6_1 = $row_p[186];	//指標6-1值
		$p6_2 = $row_p[187];	//指標6-2值

		$p150 = $row_p[150]; //符合補一
		$p151 = $row_p[151]; //符合補二
		$p152 = $row_p[152]; //符合補三教師
		$p153 = $row_p[153]; //符合補三學生
		$p154 = $row_p[154]; //符合補四
		$p155 = $row_p[155]; //符合補五
		$p156 = $row_p[156]; //符合補六
		$p157 = $row_p[157]; //符合補七
	
		$p158 = $row_p[158]; //申請補一
		$p159 = $row_p[159]; //申請補二
		$p160 = $row_p[160]; //申請補三教師
		$p161 = $row_p[161]; //申請補三學生
		$p162 = $row_p[162]; //申請補四
		$p163 = $row_p[163]; //申請補五
		$p164 = $row_p[164]; //申請補六
		$p165 = $row_p[165]; //申請補七
	}

	$total = $row[10];			//該校申請金額
	$total_1 = $row[11];		//該校申請經常門
	$total_2 = $row[12];		//該校申請資本門

	$pass = $row[130];			//縣市審核狀態
	$total_city = $row[132];	//縣市審核金額
	$exam_money_1 = $row[133];	//縣市審核經常門
	$exam_money_2 = $row[134];	//縣市審核資本門

	//$allowance_1 = $row[18];	//符合補助項目1申請資格
	//是否符合指標 且 申請金額大於0
	//echo "<br>".$total;
	if($total > 0 && $p151 > 0 && $p159 > 0){
		$serial++;
		echo "<tr>";
		echo "<td align='center'>".$serial."</td>";
		echo "<td>";
		echo "$school";//學校代碼
		echo "</td>";
    	echo "<td>";
      	echo "$school_name";//學校名稱
		echo "</td>";
		echo "<td>";
		echo "NT$".number_format($total);	//預算總合	
		echo "</td>";
		echo "<td>";
		if($total_city == 0 && $pass == 0){ //若縣市審核金額==0 且 審核狀態==0
		 	echo "<a href="."102_examine_allowance2.php?id=$row[0]"." target="."_blank".">"."<font color=blue>待審核</font>"."</a>";
			echo "("."NT$".number_format($total_city).")";
		}elseif($total_city >= 0 && $pass == 1){ //若縣市審核金額>=0 且 審核狀態==1
			echo "<a href="."102_examine_allowance2.php?id=$row[0]"." target="."_blank".">"."已審畢"."</a>";
			echo '<img src='.'"../../images/ok1.jpg"'.' width="18"'.' height="18"'.'>';//顯示已審畢圖示
			echo "("."NT$".number_format($total_city).")";
		}else{ //非待審核 且 非已審畢 作為退件處理
			//echo '<img src='.'"../../images/ok2.jpg"'.' width="20"'.' height="20"'.'>';
			echo "<a href="."102_examine_allowance2.php?id=$row[0]"." target="."_blank".">"."<font color=red>退件</font>"."</a>";
			echo '<img src='.'"../../images/ok1.jpg"'.' width="18"'.' height="18"'.'>';
			echo "("."NT$".number_format($total_city).")";
		}
		echo "</td>";
		echo "</tr>";
	}else{
		//echo "<br>".$total;
	}
}
?> 
</table>

<?php
include "../../footer.php";
?>