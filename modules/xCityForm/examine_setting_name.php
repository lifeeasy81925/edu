<?php
	include "../../mainfile.php";
	include "../../header.php";
	session_start();
?>

<a href="city_index.php">
	<img src="/edu/images/button/b_home1.png" align="absmiddle" height="35px"
		 onmouseout="this.src='/edu/images/button/b_home1.png'"
		 onmouseover="this.src='/edu/images/button/b_home1_on.png'">
</a>

<p>
<hr>
<p>

<img src="/edu/images/lock.png" align="absmiddle" /> <b>審查權限設定</b>

<p>
<hr>
<p>

<?
	$username = $xoopsUser->getVar('uname');

	global $xoopsDB;

	$sql_city = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
	$result_city = $xoopsDB -> query($sql_city) or die($sql_city);

	while($row = mysql_fetch_row($result_city))
	{
		$cityid  = $row[0];//ID
		$city    = $row[1];//單位
		$cityman = $row[2];//承辦人
		$cityno  = $row[4];
	}
	if($cityno >= '1' )
	{
		echo "您的身分是：";
		echo $username . " ";
		echo $city . " ";
		echo $cityman;
		echo "<p>";
		echo "請選擇您要設定的委員權限：";
	}
	else
	{
		echo "您沒有設定權限";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=city_index.php>';
	}

	if     ($city=='基隆市'){$cityid2='kl';}
	elseif ($city=='新北市'){$cityid2='ntpc';}
	elseif ($city=='臺北市'){$cityid2='tp';}
	elseif ($city=='桃園市'){$cityid2='tyc';}
	elseif ($city=='新竹縣'){$cityid2='hcc';}
	elseif ($city=='新竹市'){$cityid2='hcs';}
	elseif ($city=='苗栗縣'){$cityid2='mlc';}
	elseif ($city=='臺中市'){$cityid2='tc';}
	elseif ($city=='南投縣'){$cityid2='ntct';}
	elseif ($city=='彰化縣'){$cityid2='chc';}
	elseif ($city=='雲林縣'){$cityid2='ylc';}
	elseif ($city=='嘉義縣'){$cityid2='cyc';}
	elseif ($city=='嘉義市'){$cityid2='cys';}
	elseif ($city=='臺南市'){$cityid2='tn';}
	elseif ($city=='高雄市'){$cityid2='kh';}
	elseif ($city=='屏東縣'){$cityid2='ptc';}
	elseif ($city=='臺東縣'){$cityid2='ttct';}
	elseif ($city=='花蓮縣'){$cityid2='hlc';}
	elseif ($city=='宜蘭縣'){$cityid2='ilc';}
	elseif ($city=='澎湖縣'){$cityid2='phc';}
	elseif ($city=='金門縣'){$cityid2='km';}
	else                    {$cityid2='matsu';}
?>

<?
	$sql = "select  *  from  edu_city where cityid like '$cityid2%';";
	$result = mysql_query($sql);
?>

<table border="1">
	<tr height="40px">
		<td align=center width="70px" >委員代碼</td>
		<td align=center>權限內容</td>
		<td align=center width="70px" >設定權限</td>
	</tr>

	<?
		while($row = mysql_fetch_row($result))
		{
			$city_name = $row[0];  // 各委員代號
			$exam_1 = $row[5];     // 補助項目一
			$exam_2 = $row[6];     // 補助項目二
			$exam_3 = $row[7];     // 補助項目三
			$exam_4 = $row[8];     // 補助項目四
			$exam_5 = $row[9];     // 補助項目五
			$exam_6 = $row[10];    // 補助項目六

			/*
			$exam_7 = $row[11];//補助項目七
			$exam_8 = $row[12];//補助項目八
			*/

			$city_1 = $row[13];//基隆市
			$city_2 = $row[14];//新北市
			$city_3 = $row[15];//臺北市
			$city_4 = $row[16];//桃園市
			$city_5 = $row[17];//新竹縣
			$city_6 = $row[18];//新竹市
			$city_7 = $row[19];//苗栗縣
			$city_8 = $row[20];//臺中市
			$city_9 = $row[21];//南投縣
			$city_10 = $row[22];//彰化縣
			$city_11 = $row[23];//雲林縣
			$city_12 = $row[24];//嘉義縣
			$city_13 = $row[25];//嘉義市
			$city_14 = $row[26];//臺南市
			$city_15 = $row[27];//高雄市
			$city_16 = $row[28];//屏東縣
			$city_17 = $row[29];//臺東縣
			$city_18 = $row[30];//花蓮縣
			$city_19 = $row[31];//宜蘭縣
			$city_20 = $row[32];//澎湖縣
			$city_21 = $row[33];//金門縣
			$city_22 = $row[34];//連江縣

			echo "<tr height='40px'>";

				echo "<td align=center>";  // 委員代碼
				echo $city_name;
				echo "</td>";

				echo "<td>";  // 權限內容
				if($exam_1 == 1){echo ' 補助項目一,';}
				if($exam_2 == 1){echo ' 補助項目二,';}
				if($exam_3 == 1){echo ' 補助項目三,';}
				if($exam_4 == 1){echo ' 補助項目四,';}
				if($exam_5 == 1){echo ' 補助項目五,';}
				if($exam_6 == 1){echo ' 補助項目六,';}
				echo "</td>";

				echo "<td align=center>";  // 設定權限
				echo "<INPUT TYPE="."button"." VALUE="."設權限"." onClick="."location="."'examine_setting.php?id="."$city_name&city="."$cityid2'".">";
				echo "</td>";

			echo "</tr>";
		}
	?>
</table><p>

● 各縣市預設使用編號 1～29 帳號，請使用者保管好密碼，並且勿設定權限給未使用之帳號！

<? include "../../footer.php"; ?>

<?
/* 備用功能 */
/*
	<label>委員代號
	<Option>
	<select name="name" id="name">
	<option value="examine_setting.php?id=<?echo $cityid2; ?>002&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>002</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>003&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>003</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>004&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>004</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>005&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>005</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>006&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>006</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>007&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>007</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>008&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>008</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>009&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>009</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>010&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>010</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>011&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>011</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>012&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>012</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>013&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>013</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>014&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>014</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>015&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>015</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>016&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>016</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>017&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>017</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>018&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>018</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>019&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>019</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>020&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>020</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>021&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>021</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>022&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>022</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>023&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>023</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>024&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>024</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>025&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>025</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>026&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>026</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>027&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>027</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>028&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>028</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>029&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>029</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>030&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>030</option>
	<option value="examine_setting.php?id=<?echo $cityid2; ?>001&city=<?echo $cityid2; ?>"><?echo $cityid2; ?>001</option>
	</select>
	<input Type="Button" id="name" name="name" value="權限設定" OnClick="self.location.href=document.getElementById('name').value">
	</label>
*/
?>