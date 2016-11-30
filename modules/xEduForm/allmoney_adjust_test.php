<?php
include "../../mainfile.php";
include "../../header.php";
session_start(); 
$username = $xoopsUser->getVar('uname');
  global $xoopsDB;
  $sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
  $result_city = $xoopsDB -> query($sql) or die($sql);
  while($row = mysql_fetch_row($result_city)) {
            $edu = $row[1];
			$eduman = $row[2];
			$examine = $row[3];
			$eduno = $row[4];
			}
  echo $username;
  echo $edu;
  echo $eduman;
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table width="1909" border="1">
  <tr>
    <td width="187" rowspan="3"><div align="center">縣市名稱</div></td>
    <td colspan="2"> 1.推展親職教育活動 </td>
    <td colspan="3"> 2.原住民及離島地區學校辦理學習輔導 </td>
    <td width="114" colspan="2"> 3.補助學校發展教育特色 </td>
    <td colspan="2"> 4.修繕離島或偏遠地區師生宿舍 </td>
    <td width="94" rowspan="3"> 5.充實學校基本教學設備 </td>
    <td width="86" colspan="2"> 6.發展原住民教育文化特色及充實設備器材 </td>
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
    <td colspan="2"> 設備、其他經費 </td>
    <td height="65" colspan="2"> 教師、學生宿舍 </td>
    <td colspan="2"> 設備器材其他經費 </td>
    <td width="82" rowspan="2"> 租車費 </td>
    <td width="82" rowspan="2"> 交通費 </td>
    <td width="81" rowspan="2"> 購交通車費 </td>
    <td width="83" rowspan="2"> 綜合球場 </td>
    <td width="80" rowspan="2"> 小型集會風雨教室 </td>
    <td width="82" rowspan="2"> 運動場 </td>
    <td rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td> 資本門</td>
    <td> 經常門</td>
    <td width="95"> <div align="center">修繕 </div></td>
    <td width="95"> <div align="center">充實設備 </div></td>
    <td> 資本門</td>
    <td> 經常門</td>
  </tr>
  <?
  //補助金額-國小			
	$sql = "select  *  from 100education_money ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_row($result))
        {
                 $a1_1=$row[2];
				 $a1_2=$row[3];
				 $a2_1=$row[4];
				 $a2_2=$row[5];
				 $a2_3=$row[6];
				 $a3_1=$row[18];
				 $a3_2=$row[19];
				 $a4_1=$row[8];
				 $a4_2=$row[9];
				 $a5=$row[10];
				 $a6_1=$row[20];
				 $a6_2=$row[21];
				 $a7_1=$row[12];
				 $a7_2=$row[13];
				 $a7_3=$row[14];
				 $a8_1=$row[15];
				 $a8_2=$row[16];
 				 $a8_3=$row[17];
				 $total = $row[18];
				 $rate = $row[22];
				 
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
				echo "$row[18]";
						echo "</td>";
			echo "<td>"."<div align='right'>";
				echo "$row[19]";
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
				echo "$row[20]";
						echo "</td>";
				echo "<td>"."<div align='right'>";
				echo "$row[21]";
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
		
				// $p1_1=($p1_1+$row[2])*$_post["a1_1"];
				 $p1_1=($p1_1+$row[2])* '1';
				 $p1_2=$p1_2+$row[3]*$_post["a1_2"];
				 $p2_1=$p2_1+$row[4]*$_post["a2_1"];
				 $p2_2=$p2_2+$row[5]*$_post["a2_2"];
				 $p2_3=$p2_3+$row[6]*$_post["a2_3"];
				 $p3_1=$p3_1+$row[18]*$_post["a3_1"];
				 $p3_2=$p3_2+$row[19]*$_post["a3_2"];
				 $p4_1=$p4_1+$row[8]*$_post["a4_1"];
				 $p4_2=$p4_2+$row[9]*$_post["a4_2"];
				 $p5=$p5+$row[10]*$_post["a5"];
				 $p6_1=$p6_1+$row[20]*$_post["a6_1"];
				 $p6_2=$p6_2+$row[21]*$_post["a6_2"];
				 $p7_1=$p7_1+$row[12]*$_post["a7_1"];
				 $p7_2=$p7_2+$row[13]*$_post["a7_2"];
				 $p7_3=$p7_3+$row[14]*$_post["a7_3"];
				 $p8_1=$p8_1+$row[15]*$_post["a8_1"];
				 $p8_2=$p8_2+$row[16]*$_post["a8_2"];
 				 $p8_3=$p8_3+$row[17]*$_post["a8_3"];													
	}
	
  ?>
  <tr>
    <td height="46">總經費微調</td>
    <td><form id="form1" name="a1_1" method="post" action="">
      <label>
        <select name="a1_1" id="a1_1">
		  <option value="1" selected="selected">100%</option>
          <option value="1">100%</option>
          <option value="0.9">90%</option>
          <option value="0.8">80%</option>
          <option value="0.7">70%</option>
          <option value="0.6">60%</option>
          <option value="0.5">50%</option>
		  <option value="0.4">40%</option>
          <option value="0.3">30%</option>
          <option value="0.2">20%</option>
          <option value="0.1">10%</option>
          <option value="0">0%</option>
          </select>
        <input type="submit" name="a1_1" id="a1_1" value="調整" />
      </label>
    </form>
    </td>
    <td><form id="form2" name="a1_2" method="post" action="">
      <label>
        <select name="a1_2" id="a1_2">
          <option value="1">100%</option>
          <option value="0.9">90%</option>
          <option value="0.8">80%</option>
          <option value="0.7">70%</option>
          <option value="0.6">60%</option>
          <option value="0.5">50%</option>
		  <option value="0.4">40%</option>
          <option value="0.3">30%</option>
          <option value="0.2">20%</option>
          <option value="0.1">10%</option>
          <option value="0">0%</option>
        </select>
        <input type="submit" name="a1_2" id="a1_2" value="調整" />
      </label>
    </form>
    </td>
    <td><form id="form3" name="a2_1" method="post" action="">
      <label>
        <select name="1_a" id="a2_1">
          <option value="1">100%</option>
          <option value="0.9">90%</option>
          <option value="0.8">80%</option>
          <option value="0.7">70%</option>
          <option value="0.6">60%</option>
          <option value="0.5">50%</option>
		  <option value="0.4">40%</option>
          <option value="0.3">30%</option>
          <option value="0.2">20%</option>
          <option value="0.1">10%</option>
          <option value="0">0%</option>
        </select>
        <input type="submit" name="a2_1" id="a2_1" value="調整" />
      </label>
    </form></td>
    <td><form id="form4" name="a2_2" method="post" action="">
      <label>
        <select name="a2_2" id="a2_2">
          <option value="1">100%</option>
          <option value="0.9">90%</option>
          <option value="0.8">80%</option>
          <option value="0.7">70%</option>
          <option value="0.6">60%</option>
          <option value="0.5">50%</option>
		  <option value="0.4">40%</option>
          <option value="0.3">30%</option>
          <option value="0.2">20%</option>
          <option value="0.1">10%</option>
          <option value="0">0%</option>
        </select>
        <input type="submit" name="a2_2" id="a2_2" value="調整" />
      </label>
    </form></td>
    <td><form id="form5" name="a2_3" method="post" action="">
      <label>
        <select name="a2_3" id="a2_3">
          <option value="1">100%</option>
          <option value="0.9">90%</option>
          <option value="0.8">80%</option>
          <option value="0.7">70%</option>
          <option value="0.6">60%</option>
          <option value="0.5">50%</option>
		  <option value="0.4">40%</option>
          <option value="0.3">30%</option>
          <option value="0.2">20%</option>
          <option value="0.1">10%</option>
          <option value="0">0%</option>
        </select>
        <input type="submit" name="a2_3" id="a2_3" value="調整" />
      </label>
    </form></td>
    <td><form id="form6" name="a3_1" method="post" action="">
      <label>
        <select name="a3_1" id="a3_1">
          <option value="1">100%</option>
          <option value="0.9">90%</option>
          <option value="0.8">80%</option>
          <option value="0.7">70%</option>
          <option value="0.6">60%</option>
          <option value="0.5">50%</option>
		  <option value="0.4">40%</option>
          <option value="0.3">30%</option>
          <option value="0.2">20%</option>
          <option value="0.1">10%</option>
          <option value="0">0%</option>
        </select>
        <input type="submit" name="a3_1" id="a3_1" value="調整" />
      </label>
    </form></td>
    <td><form id="form7" name="a3_2" method="post" action="">
      <label>
        <select name="a3_2" id="a3_2">
          <option value="1">100%</option>
          <option value="0.9">90%</option>
          <option value="0.8">80%</option>
          <option value="0.7">70%</option>
          <option value="0.6">60%</option>
          <option value="0.5">50%</option>
		  <option value="0.4">40%</option>
          <option value="0.3">30%</option>
          <option value="0.2">20%</option>
          <option value="0.1">10%</option>
          <option value="0">0%</option>
        </select>
        <input type="submit" name="a3_2" id="a3_2" value="調整" />
      </label>
    </form></td>
    <td><form id="form8" name="a4_1" method="post" action="">
      <label>
        <select name="a4_1" id="a4_1">
          <option value="1">100%</option>
          <option value="0.9">90%</option>
          <option value="0.8">80%</option>
          <option value="0.7">70%</option>
          <option value="0.6">60%</option>
          <option value="0.5">50%</option>
		  <option value="0.4">40%</option>
          <option value="0.3">30%</option>
          <option value="0.2">20%</option>
          <option value="0.1">10%</option>
          <option value="0">0%</option>
        </select>
        <input type="submit" name="a4_1" id="a4_1" value="調整" />
      </label>
    </form></td>
    <td><form id="form9" name="a4_2" method="post" action="">
      <label>
        <select name="a4_2" id="a4_2">
          <option value="1">100%</option>
          <option value="0.9">90%</option>
          <option value="0.8">80%</option>
          <option value="0.7">70%</option>
          <option value="0.6">60%</option>
          <option value="0.5">50%</option>
		  <option value="0.4">40%</option>
          <option value="0.3">30%</option>
          <option value="0.2">20%</option>
          <option value="0.1">10%</option>
          <option value="0">0%</option>
        </select>
        <input type="submit" name="a4_2" id="a4_2" value="調整" />
      </label>
    </form></td>
    <td><form id="form10" name="a5" method="post" action="">
      <label>
        <select name="a5" id="a5">
          <option value="1">100%</option>
          <option value="0.9">90%</option>
          <option value="0.8">80%</option>
          <option value="0.7">70%</option>
          <option value="0.6">60%</option>
          <option value="0.5">50%</option>
		  <option value="0.4">40%</option>
          <option value="0.3">30%</option>
          <option value="0.2">20%</option>
          <option value="0.1">10%</option>
          <option value="0">0%</option>
        </select>
        <input type="submit" name="a5" id="a5" value="調整" />
      </label>
    </form></td>
    <td><form id="form11" name="a6_1" method="post" action="">
      <label>
        <select name="a6_1" id="a6_1">
          <option value="1">100%</option>
          <option value="0.9">90%</option>
          <option value="0.8">80%</option>
          <option value="0.7">70%</option>
          <option value="0.6">60%</option>
          <option value="0.5">50%</option>
		  <option value="0.4">40%</option>
          <option value="0.3">30%</option>
          <option value="0.2">20%</option>
          <option value="0.1">10%</option>
          <option value="0">0%</option>
        </select>
        <input type="submit" name="a6_1" id="a6_1" value="調整" />
      </label>
    </form></td>
    <td><form id="form12" name="a6_2" method="post" action="">
      <label>
        <select name="a6_2" id="a6_2">
          <option value="1">100%</option>
          <option value="0.9">90%</option>
          <option value="0.8">80%</option>
          <option value="0.7">70%</option>
          <option value="0.6">60%</option>
          <option value="0.5">50%</option>
		  <option value="0.4">40%</option>
          <option value="0.3">30%</option>
          <option value="0.2">20%</option>
          <option value="0.1">10%</option>
          <option value="0">0%</option>
        </select>
        <input type="submit" name="a6_2" id="a6_2" value="調整" />
      </label>
    </form></td>
    <td><form id="form13" name="a7_1" method="post" action="">
      <label>
        <select name="a7_1" id="a7_1">
          <option value="1">100%</option>
          <option value="0.9">90%</option>
          <option value="0.8">80%</option>
          <option value="0.7">70%</option>
          <option value="0.6">60%</option>
          <option value="0.5">50%</option>
		  <option value="0.4">40%</option>
          <option value="0.3">30%</option>
          <option value="0.2">20%</option>
          <option value="0.1">10%</option>
          <option value="0">0%</option>
        </select>
        <input type="submit" name="a7_1" id="a7_1" value="調整" />
      </label>
    </form></td>
    <td><form id="form14" name="a7_2" method="post" action="">
      <label>
        <select name="a7_2" id="a7_2">
          <option value="1">100%</option>
          <option value="0.9">90%</option>
          <option value="0.8">80%</option>
          <option value="0.7">70%</option>
          <option value="0.6">60%</option>
          <option value="0.5">50%</option>
		  <option value="0.4">40%</option>
          <option value="0.3">30%</option>
          <option value="0.2">20%</option>
          <option value="0.1">10%</option>
          <option value="0">0%</option>
        </select>
        <input type="submit" name="a7_2" id="a7_2" value="調整" />
      </label>
    </form></td>
    <td><form id="form15" name="a7_3" method="post" action="">
      <label>
        <select name="a7_3" id="a7_3">
          <option value="1">100%</option>
          <option value="0.9">90%</option>
          <option value="0.8">80%</option>
          <option value="0.7">70%</option>
          <option value="0.6">60%</option>
          <option value="0.5">50%</option>
		  <option value="0.4">40%</option>
          <option value="0.3">30%</option>
          <option value="0.2">20%</option>
          <option value="0.1">10%</option>
          <option value="0">0%</option>
        </select>
        <input type="submit" name="a7_3" id="a7_3" value="調整" />
      </label>
    </form></td>
    <td><form id="form16" name="a8_1" method="post" action="">
      <label>
        <select name="a8_1" id="a8_1">
          <option value="1">100%</option>
          <option value="0.9">90%</option>
          <option value="0.8">80%</option>
          <option value="0.7">70%</option>
          <option value="0.6">60%</option>
          <option value="0.5">50%</option>
		  <option value="0.4">40%</option>
          <option value="0.3">30%</option>
          <option value="0.2">20%</option>
          <option value="0.1">10%</option>
          <option value="0">0%</option>
        </select>
        <input type="submit" name="a8_1" id="a8_1" value="調整" />
      </label>
    </form></td>
    <td><form id="form17" name="a8_2" method="post" action="">
      <label>
        <select name="a8_2" id="a8_2">
          <option value="1">100%</option>
          <option value="0.9">90%</option>
          <option value="0.8">80%</option>
          <option value="0.7">70%</option>
          <option value="0.6">60%</option>
          <option value="0.5">50%</option>
		  <option value="0.4">40%</option>
          <option value="0.3">30%</option>
          <option value="0.2">20%</option>
          <option value="0.1">10%</option>
          <option value="0">0%</option>
        </select>
        <input type="submit" name="a8_2" id="a8_2" value="調整" />
      </label>
    </form></td>
    <td><form id="form18" name="a8_3" method="post" action="">
      <label>
        <select name="a8_3" id="a8_3">
          <option value="1">100%</option>
          <option value="0.9">90%</option>
          <option value="0.8">80%</option>
          <option value="0.7">70%</option>
          <option value="0.6">60%</option>
          <option value="0.5">50%</option>
		  <option value="0.4">40%</option>
          <option value="0.3">30%</option>
          <option value="0.2">20%</option>
          <option value="0.1">10%</option>
          <option value="0">0%</option>
        </select>
        <input type="submit" name="a8_3" id="a8_3" value="調整" />
      </label>
    </form></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="187" height="46">補助項目總合</td>
    <td><div align="right"><? echo $p1_1;?></div></td>
    <td><div align="right"><? echo $p1_2;?></td>
    <td><div align="right"><? echo $p2_1;?></td>
    <td><div align="right"><? echo $p2_2;?></td>
    <td><div align="right"><? echo $p2_3;?></td>
    <td><div align="right"><? echo $p3_1;?></td>
    <td><div align="right"><? echo $p3_2;?></td>
    <td><div align="right"><? echo $p4_1;?></td>
    <td><div align="right"><? echo $p4_2;?></td>
    <td><div align="right"><? echo $p5;?></td>
    <td><div align="right"><? echo $p6_1;?></td>
    <td><div align="right"><? echo $p6_2;?></td>
    <td><div align="right"><? echo $p7_1;?></td>
    <td><div align="right"><? echo $p7_2;?></td>
    <td><div align="right"><? echo $p7_3;?></td>
    <td><div align="right"><? echo $p8_1;?></td>
    <td><div align="right"><? echo $p8_2;?></td>
    <td><div align="right"><? echo $p8_3;?></td>
    <td><div align="right"><? echo $p1_1+$p1_2+$p2_1+$p2_2+$p2_3+$p3_1+$p3_2+$p4_1+$p4_2+$p5+$p6_1+$p6_2+$p7_1+$p7_2+$p7_3+$p8_1+$p8_2+$p8_3;?></td>
  </tr>
</table>
<?php
include "../../footer.php";
?>