<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_city.php";
	include "../../function/checkdate_city.php";
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<INPUT TYPE="button" VALUE="回前頁" onClick="location='allowance_examine.php'">
補助項目六：交通不便地區學校交通車<br /><br />
已申請學校列表：
<table width="500px" border="1">
	<td align="center">序號</td>
    <td>學校代碼</td>
    <td>學校名稱</td>
    <td>申請補助金額</td>
    <td align="center">初審結果<br />(按<font color=red><b>F5</b></font>可<font color=red><b>重新整理</b></font>狀態)</td>
<?
	$school_year = 103; //為學年度

	$table_name = 'alc_transport_car';
	$a_num = 'a6';
	
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   //補六資料
		   "      , $a_num.* ".
		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join $table_name as $a_num on sy.seq_no = $a_num.sy_seq ".
		   " where sy.school_year = '$school_year' ". 
		   "   and sd.enabled = 'Y' ".
		   "   and sd.cityname = '$cityname' ".
		   " order by sd.account ";
		   
	//echo "<br />".$sql."<br />";
	$result = mysql_query($sql);
	$serial = 0;
	while($row = mysql_fetch_array($result))
	{
		$account = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];
		$area = $row['area'];
		
		$applied = $row['applied'];
		$applied_ary = explode(",", $applied); //已申請的補助
		$can_apply = $row['can_apply'];
		$can_apply_ary = explode(",", $can_apply); //可申請的補助
		
		$main_seq = $row['seq_no']; //sy.seq_no
		$s_total_money = ($row['s_total_money'] == '')?0:$row['s_total_money']; //NULL則填入0
		
		$city_approved = $row['city_approved'];
		$city_total_money = ($row['city_total_money'] == '')?0:$row['city_total_money']; //NULL則填入0
		
		if($s_total_money > 0 && in_array($a_num,$applied_ary) && in_array($a_num,$can_apply_ary))
		{
			$serial++;
			echo "<tr>";
			echo "<td align='center'>".$serial."</td>";
			echo "<td>";
			echo "$account";//學校代碼
			echo "</td>";
			echo "<td>";
			echo "$schoolname";//學校名稱
			echo "</td>";
			echo "<td>";
			echo "NT$ ".number_format($s_total_money);	//預算總合	
			echo "</td>";
			echo "<td>";
			if($city_approved == '') //若縣市審核狀態=''
			{ 
				echo "<font color=blue>待審核</font>";
				echo "("."NT$ ".number_format($city_total_money).")";
			}
			elseif($city_total_money >= 0 && $city_approved == 'Y') //若縣市審核金額>0 且 審核狀態=Y
			{ 
				echo "已審畢";
				echo '<img src="/edu/images/ok1.jpg" width="18" height="18" >';//顯示已審畢圖示
				echo "("."NT$ ".number_format($city_total_money).")";
			}
			else //非待審核 且 非已審畢 作為退件處理
			{ 
				echo "<font color=red>退件</font>";
				echo '<img src="/edu/images/ok1.jpg" width="18" height="18" >';
				echo "("."NT$ ".number_format($city_total_money).")";
			}
			echo "<form action='examine_allowance_$a_num.php' method='post' style='margin:0px; display:inline;'>";
			echo "<input type='hidden' name='account' id='account' value='$account'>";
			echo "<input type='submit' name='button' id='button' value='前往審核頁面'>";
			echo "</form>";
			
			echo "</td>";
			echo "</tr>";
		}
	}

?> 
</table>
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>