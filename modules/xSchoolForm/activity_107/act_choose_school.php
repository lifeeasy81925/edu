<?php
	include "../../../mainfile.php";
	include "../../../header.php";
	
	session_start();
	$id = $xoopsUser->getVar('uname');
	
	$sql = 	"    SELECT edu_users.user_from                        ".
			"         , edu_users.user_occ                         ".
			"         , schooldata.cityname                        ".
			"         , schooldata.district                        ".
			"         , schooldata.schoolname                      ".
			"         , schooldata.schooltype                      ".
			"      FROM edu_users                                  ".
			" LEFT JOIN schooldata                                 ".
			"        ON edu_users.uname       = schooldata.account ".
			"     WHERE edu_users.uname       = '$id'              ";

    $result = mysql_query($sql) or die('MySQL query error');

	while($row = mysql_fetch_row($result))
	{
		$username   = $row[0];
		$position   = $row[1];
		$cityname   = $row[2];
		$district   = $row[3];
		$schoolname = $row[4];
		$schooltype = $row[5];
		
		if($schooltype == "1")
		{
			$schooltype = "國小";
		}
		elseif($schooltype == "2")
		{
			$schooltype = "國中";
		}		
	}
?>

<font size="+2">選擇教育行動區合作學校</font><p>

<? echo  "[" . $schooltype . "] ". $id . " " . $cityname . $district . $schoolname . "，" . $username . " " . $position . "，您好。" ?><p>

<p>
<hr>
<p>

<form name="myForm">
	請選擇教育行動區合作學校：
	<table border="2">
		<tr height="50px" align="center">
			<td>縣市/鄉鎮市區</td>
			<td>學校名稱</td>
			<td>邀請狀態</td>
			<td>國小回覆狀態</td>
		</tr>
		<tr height="50px" align="center">
			<td>
				<select name="city" onChange="Buildkey(this.selectedIndex);">
				　<option value="基隆市">基隆市</option>
				　<option value="臺北市">臺北市</option>
				　<option value="新北市">新北市</option>
				　<option value="桃園市">桃園市</option>
				  <option value="新竹市">新竹市</option>
				　<option value="新竹縣">新竹縣</option>
				　<option value="苗栗縣">苗栗縣</option>
				　<option value="臺中市">臺中市</option>
				　<option value="彰化縣">彰化縣</option>
				　<option value="南投縣">南投縣</option>
				　<option value="雲林縣">雲林縣</option>
				　<option value="嘉義市">嘉義市</option>
				  <option value="嘉義縣">嘉義縣</option>
				　<option value="臺南市">臺南市</option>
				　<option value="高雄市">高雄市</option>
				　<option value="屏東縣">屏東縣</option>			
				　<option value="宜蘭縣">宜蘭縣</option>
				　<option value="花蓮縣">花蓮縣</option>
				　<option value="臺東縣">臺東縣</option>
				　<option value="澎湖縣">澎湖縣</option>
				  <option value="金門縣">金門縣</option>
				　<option value="連江縣">連江縣</option>
				</select>
				<select name="district">
				　<option value="中正區">中正區</option>
				</select>
			</td>
			<td>
				三民國小
			</td>
			<td>已邀請<br>2016/05/02</td>
			<td>同意</td>
		</tr>
		<tr height="50px" align="center">
			<td>
				<select name="city" onChange="Buildkey(this.selectedIndex);">
				　<option value="基隆市">基隆市</option>
				　<option value="臺北市">臺北市</option>
				　<option value="新北市">新北市</option>
				　<option value="桃園市">桃園市</option>
				  <option value="新竹市">新竹市</option>
				　<option value="新竹縣">新竹縣</option>
				　<option value="苗栗縣">苗栗縣</option>
				　<option value="臺中市">臺中市</option>
				　<option value="彰化縣">彰化縣</option>
				　<option value="南投縣">南投縣</option>
				　<option value="雲林縣">雲林縣</option>
				　<option value="嘉義市">嘉義市</option>
				  <option value="嘉義縣">嘉義縣</option>
				　<option value="臺南市">臺南市</option>
				　<option value="高雄市">高雄市</option>
				　<option value="屏東縣">屏東縣</option>			
				　<option value="宜蘭縣">宜蘭縣</option>
				　<option value="花蓮縣">花蓮縣</option>
				　<option value="臺東縣">臺東縣</option>
				　<option value="澎湖縣">澎湖縣</option>
				  <option value="金門縣">金門縣</option>
				　<option value="連江縣">連江縣</option>
				</select>
				<select name="district">
				　<option value="中正區">中正區</option>
				</select>
			</td>
			<td>
				民族國小				
			</td>
			<td>已邀請<br>2016/05/04</td>
			<td>同意</td>
		</tr>
		<tr height="50px" align="center">
			<td>
				<select name="city" onChange="Buildkey(this.selectedIndex);">
				　<option value="基隆市">基隆市</option>
				　<option value="臺北市">臺北市</option>
				　<option value="新北市">新北市</option>
				　<option value="桃園市">桃園市</option>
				  <option value="新竹市">新竹市</option>
				　<option value="新竹縣">新竹縣</option>
				　<option value="苗栗縣">苗栗縣</option>
				　<option value="臺中市">臺中市</option>
				　<option value="彰化縣">彰化縣</option>
				　<option value="南投縣">南投縣</option>
				　<option value="雲林縣">雲林縣</option>
				　<option value="嘉義市">嘉義市</option>
				  <option value="嘉義縣">嘉義縣</option>
				　<option value="臺南市">臺南市</option>
				　<option value="高雄市">高雄市</option>
				　<option value="屏東縣">屏東縣</option>			
				　<option value="宜蘭縣">宜蘭縣</option>
				　<option value="花蓮縣">花蓮縣</option>
				　<option value="臺東縣">臺東縣</option>
				　<option value="澎湖縣">澎湖縣</option>
				  <option value="金門縣">金門縣</option>
				　<option value="連江縣">連江縣</option>
				</select>
				<select name="district">
				　<option value="中正區">中正區</option>
				</select>
			</td>
			<td>
				民權國小				
			</td>
			<td>已邀請<br>2016/05/04</td>
			<td>同意</td>
		</tr>
		<tr height="50px" align="center">
			<td>
				<select name="city" onChange="Buildkey(this.selectedIndex);">
				　<option value="基隆市">基隆市</option>
				　<option value="臺北市">臺北市</option>
				　<option value="新北市">新北市</option>
				　<option value="桃園市">桃園市</option>
				  <option value="新竹市">新竹市</option>
				　<option value="新竹縣">新竹縣</option>
				　<option value="苗栗縣">苗栗縣</option>
				　<option value="臺中市">臺中市</option>
				　<option value="彰化縣">彰化縣</option>
				　<option value="南投縣">南投縣</option>
				　<option value="雲林縣">雲林縣</option>
				　<option value="嘉義市">嘉義市</option>
				  <option value="嘉義縣">嘉義縣</option>
				　<option value="臺南市">臺南市</option>
				　<option value="高雄市">高雄市</option>
				　<option value="屏東縣">屏東縣</option>			
				　<option value="宜蘭縣">宜蘭縣</option>
				　<option value="花蓮縣">花蓮縣</option>
				　<option value="臺東縣">臺東縣</option>
				　<option value="澎湖縣">澎湖縣</option>
				  <option value="金門縣">金門縣</option>
				　<option value="連江縣">連江縣</option>
				</select>
				<select name="district">
				　<option value="中正區">中正區</option>
				</select>
			</td>
			<td>
				民生國小				
			</td>
			<td>已邀請<br>2016/05/04</td>
			<td>同意</td>
		</tr>
	</table>
	<p>

	<script language="JavaScript">
	/*
		key = new Array(3);
		key[0] = new Array(3);
		key[1] = new Array(2);
		key[2] = new Array(3);

		key[0][0]="蘋果";
		key[0][1]="蓮霧";
		key[0][2]="李子";

		key[1][0]="柳丁";
		key[1][1]="葡萄柚";

		key[2][0]="芭樂";
		key[2][1]="西瓜";
		key[2][2]="棗子";

		function Buildkey(num)
		{
			document.myForm.district.selectedIndex = 0;
			
			for(ctr = 0; ctr < key[num].length; ctr++)
			{
				document.myForm.district.options[ctr]=new Option(key[num][ctr],key[num][ctr]);
			}
			
			document.myForm.district.length=key[num].length;
		}
	*/
	</script>
</Form>

<a href="act_total_money.php"><input type="submit" name="submit" value="　送出邀請　"></a>

<?php include "../../../footer.php"; ?>
