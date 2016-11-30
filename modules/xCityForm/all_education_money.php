<?php session_start(); 
$username = $_SESSION['username'];?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//資料庫設定
//資料庫位置
$db_server = "localhost";
//資料庫名稱
$db_name = "school";
//資料庫管理者帳號
$db_user = "root";
//資料庫管理者密碼
$db_passwd = "ntcuedu";

//對資料庫連線
if(!@mysql_connect($db_server, $db_user, $db_passwd))
        die("無法對資料庫連線");

//資料庫連線採UTF8
mysql_query("SET NAMES utf8");

//選擇資料庫
if(!@mysql_select_db($db_name))
        die("無法使用資料庫");
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table width="1909" border="1">
  <tr>
    <td width="187" rowspan="3"><div align="center">縣市名稱</div></td>
    <td colspan="2"> 1.推展親職教育活動 </td>
    <td colspan="3"> 2.原住民及離島地區學校辦理學習輔導 </td>
    <td width="114"> 3.補助學校發展教育特色 </td>
    <td colspan="2"> 4.修繕離島或偏遠地區師生宿舍 </td>
    <td width="94" rowspan="3"> 5.充實學校基本教學設備 </td>
    <td width="86"> 6.發展原住民教育文化特色及充實設備器材 </td>
    <td colspan="3"> 7.補助交通不便學校交通車 </td>
    <td colspan="3"> 8.整修學校社區化活動場所 </td>
    <td width="123"><div align="center">各縣市總合</div></td>
  </tr>
  <tr>
    <td width="101" rowspan="2"> 親職教育活動 </td>
    <td width="117" rowspan="2"> 目標學生家庭訪視輔導 </td>
    <td width="116" rowspan="2"> 課後學習輔導 </td>
    <td width="88" rowspan="2"> 寒暑假學習輔導 </td>
    <td width="91" rowspan="2"> 住校生夜間學校輔導 </td>
    <td rowspan="2"> 設備、其他經費 </td>
    <td height="65" colspan="2"> 教師、學生宿舍 </td>
    <td rowspan="2"> 設備器材其他經費 </td>
    <td width="82" rowspan="2"> 租車費 </td>
    <td width="82" rowspan="2"> 交通費 </td>
    <td width="81" rowspan="2"> 購交通車費 </td>
    <td width="83" rowspan="2"> 綜合球場 </td>
    <td width="80" rowspan="2"> 小型集會風雨教室 </td>
    <td width="82" rowspan="2"> 運動場 </td>
    <td rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="95"> <div align="center">修繕 </div></td>
    <td width="95"> <div align="center">充實設備 </div></td>
  </tr>
  <?
  //補助金額-國小			
	$sql = "select  *  from 98education_money ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_row($result))
        {
                 $a1_1=$row[2];
				 $a1_2=$row[3];
				 $a2_1=$row[4];
				 $a2_2=$row[5];
				 $a2_3=$row[6];
				 $a3=$row[7];
				 $a4_1=$row[8];
				 $a4_2=$row[9];
				 $a5=$row[10];
				 $a6=$row[11];
				 $a7_1=$row[12];
				 $a7_2=$row[13];
				 $a7_3=$row[14];
				 $a8_1=$row[15];
				 $a8_2=$row[16];
 				 $a8_3=$row[17];
				 $total = $row[18];
				 
				echo "<tr width='187' height='46'>";
				 		echo "<td>";
				echo "$row[1]";//縣市名稱
						echo "</td>";
				 		echo "<td>"."<div align='right'>";
				echo "$row[2]";//a1_1
						echo "</td>";
						
						echo "<td>"."<div align='right'>";
				echo "$row[3]";//a1_2
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[4]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[5]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[6]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[7]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[8]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[9]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[10]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[11]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[12]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[13]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[14]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[15]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[16]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[17]";
						echo "</td>";
			
						
						echo "<td>"."<div align='right'>";
				echo "$row[18]";
						echo "</td>";
		
				 $p1_1=$p1_1+$row[2];
				 $p1_2=$p1_2+$row[3];
				 $p2_1=$p2_1+$row[4];
				 $p2_2=$p2_2+$row[5];
				 $p2_3=$p2_3+$row[6];
				 $p3=$p3+$row[7];
				 $p4_1=$p4_1+$row[8];
				 $p4_2=$p4_2+$row[9];
				 $p5=$p5+$row[10];
				 $p6=$p6+$row[11];
				 $p7_1=$p7_1+$row[12];
				 $p7_2=$p7_2+$row[13];
				 $p7_3=$p7_3+$row[14];
				 $p8_1=$p8_1+$row[15];
				 $p8_2=$p8_2+$row[16];
 				 $p8_3=$p8_3+$row[17];													
	}
  ?>
  <tr>
    <td width="187" height="46">補助項目總合</td>
    <td><div align="right"><? echo $p1_1;?></div></td>
    <td><div align="right"><? echo $p1_2;?></td>
    <td><div align="right"><? echo $p2_1;?></td>
    <td><div align="right"><? echo $p2_2;?></td>
    <td><div align="right"><? echo $p2_3;?></td>
    <td><div align="right"><? echo $p3;?></td>
    <td><div align="right"><? echo $p4_1;?></td>
    <td><div align="right"><? echo $p4_2;?></td>
    <td><div align="right"><? echo $p5;?></td>
    <td><div align="right"><? echo $p6;?></td>
    <td><div align="right"><? echo $p7_1;?></td>
    <td><div align="right"><? echo $p7_2;?></td>
    <td><div align="right"><? echo $p7_3;?></td>
    <td><div align="right"><? echo $p8_1;?></td>
    <td><div align="right"><? echo $p8_2;?></td>
    <td><div align="right"><? echo $p8_3;?></td>
    <td><div align="right"><? echo $p1_1+$p1_2+$p1_3+$p2_1+$p2_2+$p2_3+$p3+$p4_1+$p4_2+$p5+$p6+$p7_1+$p7_2+$p7_3+$p8_1+$p8_2+$p8_3;?></td>
  </tr>
</table>
