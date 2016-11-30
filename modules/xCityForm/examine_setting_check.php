<?php
	include "../../mainfile.php";
	include "../../header.php";
	session_start();

	$username = $xoopsUser->getVar('uname');

	global $xoopsDB;

	$sql = "select * from " . $xoopsDB->prefix('city') . " where `cityid` = '$username'";
	$result = $xoopsDB -> query($sql) or die($sql);

	while($row = mysql_fetch_row($result))
	{
		$cityno = $row[4];
	}
?>
<table align="center">
	<tr height="200px">
		<td align="center" valign="bottom">
			<font face="標楷體" size="+5">
				<?

					if($cityno >= '1' )
					{
						echo "<img src='/edu/images/epa_logo.jpg' height='150px'/><p>";
						echo "資料讀取中，請稍候．．．<p>";
						echo "<img src='/edu/images/progress.gif' height='150px'/><p>";
						echo '<meta http-equiv=REFRESH CONTENT=2;url=examine_setting_name.php>';
					}
					else
					{
						echo "您沒有設定權限";
						echo '<meta http-equiv=REFRESH CONTENT=2;url=city_index.php>';
					}
				?>
			</font>
		</td>
	</tr>
</table>
