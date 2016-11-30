<?php
include "../../mainfile.php";
include "../../header.php";
session_start();
?>
<INPUT TYPE="button" VALUE="回前頁" onClick="location='education_index.php'">
<?
$table = $_GET["id"];
$username = $xoopsUser->getVar('uname');
echo $username."_";
echo $edu."_";
echo $eduman;
global $xoopsDB;
$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
$result_city = $xoopsDB -> query($sql) or die($sql);
while($row = mysql_fetch_row($result_city)) {
            $city = $row[1];
			$cityman = $row[2];
			$examine = $row[3];
			$eduno = $row[4];
			$city_1 = $row[13];//基隆市
			$city_2 = $row[14];//新北市
			$city_3 = $row[15];//臺北市
			$city_4 = $row[16];//桃園縣
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
}
?>
<table width="246" border="1">
  <tr>
    <td width="144"><div align="center">縣市</div></td>
    <td width="86"><div align="center">進入審核</div></td>
  </tr>
<?
  if($city_1 == '1'){
  echo "<tr>";
    echo "<td>基隆市</td>";
    echo "<td>";
	echo "<a href="."allowance_examine_2.php?id=基隆市"." target="."_self".">"."審核"."</a>";
    echo "</td>"; 
  echo "</tr>";
  }
  
  if($city_2 == '1'){
  echo "<tr>";
    echo "<td>新北市</td>";
    echo "<td>";
	echo "<a href="."allowance_examine_2.php?id=新北市"." target="."_self".">"."審核"."</a>";
    echo "</td>"; 
  echo "</tr>";
  }
  
  if($city_3 == '1'){
  echo "<tr>";
    echo "<td>臺北市</td>";
    echo "<td>";
	echo "<a href="."allowance_examine_2.php?id=臺北市"." target="."_self".">"."審核"."</a>";
    echo "</td>"; 
  echo "</tr>";
  }
  
  if($city_4 == '1'){
  echo "<tr>";
    echo "<td>桃園縣</td>";
    echo "<td>";
	echo "<a href="."allowance_examine_2.php?id=桃園縣"." target="."_self".">"."審核"."</a>";
    echo "</td>"; 
  echo "</tr>";
  }
  
  if($city_5 == '1'){
  echo "<tr>";
    echo "<td>新竹縣</td>";
    echo "<td>";
	echo "<a href="."allowance_examine_2.php?id=新竹縣"." target="."_self".">"."審核"."</a>";
    echo "</td>"; 
  echo "</tr>";
  }
  
  if($city_6 == '1'){
  echo "<tr>";
    echo "<td>新竹市</td>";
    echo "<td>";
	echo "<a href="."allowance_examine_2.php?id=新竹市"." target="."_self".">"."審核"."</a>";
    echo "</td>"; 
  echo "</tr>";
  }
  
  if($city_7 == '1'){
  echo "<tr>";
    echo "<td>苗栗縣</td>";
    echo "<td>";
	echo "<a href="."allowance_examine_2.php?id=苗栗縣"." target="."_self".">"."審核"."</a>";
    echo "</td>"; 
  echo "</tr>";
  }
  
  if($city_8 == '1'){
  echo "<tr>";
    echo "<td>臺中市</td>";
    echo "<td>";
	echo "<a href="."allowance_examine_2.php?id=臺中市"." target="."_self".">"."審核"."</a>";
    echo "</td>"; 
  echo "</tr>";
  }
  
  if($city_9 == '1'){
  echo "<tr>";
    echo "<td>南投縣</td>";
    echo "<td>";
	echo "<a href="."allowance_examine_2.php?id=南投縣"." target="."_self".">"."審核"."</a>";
    echo "</td>"; 
  echo "</tr>";
  }
  
  if($city_10 == '1'){
  echo "<tr>";
    echo "<td>彰化縣</td>";
    echo "<td>";
	echo "<a href="."allowance_examine_2.php?id=彰化縣"." target="."_self".">"."審核"."</a>";
    echo "</td>"; 
  echo "</tr>";
  }
  
  if($city_11 == '1'){
  echo "<tr>";
    echo "<td>雲林縣</td>";
    echo "<td>";
	echo "<a href="."allowance_examine_2.php?id=雲林縣"." target="."_self".">"."審核"."</a>";
    echo "</td>"; 
  echo "</tr>";
  }
  
  if($city_12 == '1'){
  echo "<tr>";
    echo "<td>嘉義縣</td>";
    echo "<td>";
	echo "<a href="."allowance_examine_2.php?id=嘉義縣"." target="."_self".">"."審核"."</a>";
    echo "</td>"; 
  echo "</tr>";
  }
  
  if($city_13 == '1'){
  echo "<tr>";
    echo "<td>嘉義市</td>";
    echo "<td>";
	echo "<a href="."allowance_examine_2.php?id=嘉義市"." target="."_self".">"."審核"."</a>";
    echo "</td>"; 
  echo "</tr>";
  }
  
  if($city_14 == '1'){
  echo "<tr>";
    echo "<td>臺南市</td>";
    echo "<td>";
	echo "<a href="."allowance_examine_2.php?id=臺南市"." target="."_self".">"."審核"."</a>";
    echo "</td>"; 
  echo "</tr>";
  }
  
  if($city_15 == '1'){
  echo "<tr>";
    echo "<td>高雄市</td>";
    echo "<td>";
	echo "<a href="."allowance_examine_2.php?id=高雄市"." target="."_self".">"."審核"."</a>";
    echo "</td>"; 
  echo "</tr>";
  }
  
  if($city_16 == '1'){
  echo "<tr>";
    echo "<td>屏東縣</td>";
    echo "<td>";
	echo "<a href="."allowance_examine_2.php?id=屏東縣"." target="."_self".">"."審核"."</a>";
    echo "</td>"; 
  echo "</tr>";
  }
  
  if($city_17 == '1'){
  echo "<tr>";
    echo "<td>臺東縣</td>";
    echo "<td>";
	echo "<a href="."allowance_examine_2.php?id=臺東縣"." target="."_self".">"."審核"."</a>";
    echo "</td>"; 
  echo "</tr>";
  }
  
  if($city_18 == '1'){
  echo "<tr>";
    echo "<td>花蓮縣</td>";
    echo "<td>";
	echo "<a href="."allowance_examine_2.php?id=花蓮縣"." target="."_self".">"."審核"."</a>";
    echo "</td>"; 
  echo "</tr>";
  }
  
  if($city_19 == '1'){
  echo "<tr>";
    echo "<td>宜蘭縣</td>";
    echo "<td>";
	echo "<a href="."allowance_examine_2.php?id=宜蘭縣"." target="."_self".">"."審核"."</a>";
    echo "</td>"; 
  echo "</tr>";
  }
  
  if($city_20 == '1'){
  echo "<tr>";
    echo "<td>澎湖縣</td>";
    echo "<td>";
	echo "<a href="."allowance_examine_2.php?id=澎湖縣"." target="."_self".">"."審核"."</a>";
    echo "</td>"; 
  echo "</tr>";
  }
  
  if($city_21 == '1'){
  echo "<tr>";
    echo "<td>金門縣</td>";
    echo "<td>";
	echo "<a href="."allowance_examine_2.php?id=金門縣"." target="."_self".">"."審核"."</a>";
    echo "</td>"; 
  echo "</tr>";
  }
  
  if($city_22 == '1'){
  echo "<tr>";
    echo "<td>連江縣</td>";
    echo "<td>";
	echo "<a href="."allowance_examine_2.php?id=連江縣"." target="."_self".">"."審核"."</a>";
    echo "</td>"; 
  echo "</tr>";
  }
?>
</table>
<?php
include "../../footer.php";
?>