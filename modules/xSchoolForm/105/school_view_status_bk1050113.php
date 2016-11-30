<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";

	include "../../function/config_for_105.php"; //本年度基本設定
    include "bootbox.php";  //1040521新增,引入bootbox

	// include "../../function/button_print.php";  // 105.01.05隱藏

	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".
		   //補一資料
		   "      , a1.s_total_money as a1_money, a1.s_p1_money as a1_p1_money, a1.s_p2_money as a1_p2_money ".
		   //補二資料
		   "      , a2.s_total_money as a2_money, a2.s_p1_money as a2_p1_money, a2.s_p2_money as a2_p2_money, a2.inherit_year as a2_inherit_year  ".
		   //補三資料
		   "      , a3.s_total_money as a3_money ".
		   //補四資料
		   "      , a4.s_total_money as a4_money ".
		   //補五資料
		   "      , a5.s_total_money as a5_money, a5.s_p1_money as a5_p1_money, a5.s_p2_money as a5_p2_money, a5.inherit_year as a5_inherit_year  ".
		   //補六資料
		   "      , a6.s_total_money as a6_money ".
		   //補七資料
		   "      , a7.s_total_money as a7_money ".

		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   "                       left join alc_parenting_education as a1 on sy.seq_no = a1.sy_seq ".
		   "                       left join alc_education_features as a2 on sy.seq_no = a2.sy_seq ".
		   "                       left join alc_repair_dormitory as a3 on sy.seq_no = a3.sy_seq ".
		   "                       left join alc_teaching_equipment as a4 on sy.seq_no = a4.sy_seq ".
		   "                       left join alc_aboriginal_education as a5 on sy.seq_no = a5.sy_seq ".
		   "                       left join alc_transport_car as a6 on sy.seq_no = a6.sy_seq ".
		   "                       left join alc_school_activity as a7 on sy.seq_no = a7.sy_seq ".
		   " where sy.school_year = '$school_year' ".
		   "   and sd.account = '$username' ";
	//echo "<p>".$sql."<p>";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$account = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];
		$area = $row['area'];

		$student = $row['student'];

		$lastyear_leaving = ($row['lastyear_leaving'] == '')?0:$row['lastyear_leaving'];
		$page3_warning = $row['page3_warning'];

		$sy_seq = $row['seq_no']; //school_year 的 seq_no

		$a1_money = ($row['a1_money'] == '')?0:$row['a1_money']; //NULL則填入0
		$a2_money = ($row['a2_money'] == '')?0:$row['a2_money'];
		$a3_money = ($row['a3_money'] == '')?0:$row['a3_money'];
		$a4_money = ($row['a4_money'] == '')?0:$row['a4_money'];
		$a5_money = ($row['a5_money'] == '')?0:$row['a5_money'];
		$a6_money = ($row['a6_money'] == '')?0:$row['a6_money'];
		$a7_money = ($row['a7_money'] == '')?0:$row['a7_money'];

		$a1_p1_money = ($row['a1_p1_money'] == '')?0:$row['a1_p1_money'];
		$a1_p2_money = ($row['a1_p2_money'] == '')?0:$row['a1_p2_money'];

		$a2_p1_money = ($row['a2_p1_money'] == '')?0:$row['a2_p1_money'];
		$a2_p2_money = ($row['a2_p2_money'] == '')?0:$row['a2_p2_money'];

		$a5_p1_money = ($row['a5_p1_money'] == '')?0:$row['a5_p1_money'];
		$a5_p2_money = ($row['a5_p2_money'] == '')?0:$row['a5_p2_money'];

		//j10407新增
		$keep = $row['keep'];
		$a2_inherit_year = $row['a2_inherit_year'];
		$a5_inherit_year = $row['a5_inherit_year'];

		$applied = $row['applied']; //已申請
		$applied_ary = explode(",", $applied); //已申請的補助
	}

	$sql = "select * from school_upload_name where sy_seq = '$sy_seq' ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$point2 = $row['point2'];
		$lastyear_leaving_file = $row['lastyear_leaving_file'];
		$a1_1 = $row['a1_1'];
		$a1_2 = $row['a1_2'];
		$a2_1 = $row['a2_1'];
		$a2_2 = $row['a2_2'];
		$a3_1 = $row['a3_1'];
		$a3_2 = $row['a3_2'];
		$a4_1 = $row['a4_1'];
		$a4_2 = $row['a4_2'];
		$a5_1 = $row['a5_1'];
		$a5_2 = $row['a5_2'];
		$a6_1 = $row['a6_1'];
		$a6_2 = $row['a6_2'];
		$a6_3 = $row['a6_3'];
		$a7_1 = $row['a7_1'];
		$final_1 = $row['final_1'];
		$final_2 = $row['final_2'];
	}

	$checkfinish = 1;	//是否已上傳應上傳檔案
	//$file_path = '/edu_upload/'.$school_year.'/'.$username.'/';

    //1040512修改，區分公開路徑$file_path及可能含個資$file_path2
	$file_path = '/epa_uploads/'.$school_year.'/pub/'.$username.'/';
	$file_path2 = '/epa_uploads/'.$school_year.'/pri/'.$username.'/';

	$newschool_ary = array("111111", "999999");
    $z = 0;
    if(in_array($username, $newschool_ary)){$z = 2;};

?>

<p>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<input TYPE="button" VALUE="回上一頁" onclick="history.go(-1)">
<input type="button" name="Submit" value="回主選單" onclick="location.href='../school_index.php'">

<p>

<div id="print_content">


<table style="background-color:#CFC">  <!-- 各校應核章上傳檔案 -->

	<tr>
		<td colspan="2" style="background-color:#FFDDAA">
			<p><p><b>● 請將下列<?=($z == 2)?'兩個':''; ?>檔案上傳後，才算填報完成。</b>（須經校長核章）
		</td>
	</tr>

	<? if($keep == 1){echo "<!--";} ?>
		<tr>
			<td colspan="2">
				<p><p><b>教育部<?=$school_year;?>年度推動教育優先區指標界定調查紀錄表 - 學校</b>
				<?
				 if($keep == 0)
				 {
					if($final_1 == '')
					{
						echo "指標界定調查表：<font color=red>未上傳</font>";
						$checkfinish = 0;
					}
					else
					{
						echo "指標界定調查表：<font color='blue'>已上傳</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$file_path.$final_1."' target='_new'><img src='../../../images/btn_dl.png'/></a>";
					}
				 }
				?>
			</td>
		</tr>
	<? if($keep == 1){echo "-->";} ?>

	<tr>
		<td colspan="2">
			<p><p><b>教育部<?=$school_year;?>年度推動教育優先區補助項目經費需求彙整表 - 學校</b>
		<td>
	</tr>
	<tr>
		<td width="47%">
		<?
			if($final_2 == '')
			{
				echo "經費需求彙整表：<font color=red>未上傳</font>";
				$checkfinish = 0;
			}
			else
			{
				echo "經費需求彙整表：<font color='blue'>已上傳</font></td><td><a href='".$file_path.$final_2."' target='_new'><img src='../../../images/btn_dl.png'/></a>";
			}
		?>
		</td>
	</tr>

</table>

<p><p><p><p><p>

<table style="background-color:#CFC">
	<? if($page3_warning == ''){echo "<!--";} ?>
	<tr>
		<td style="background-color:#FFDDAA">
			<p><p><b>● 目標學生名冊</b>
		</td>
	</tr>
	<tr>
		<td>
			<p><p>
			<?
			if($point2 == '' && $page3_warning != '')
			{
				echo "目標學生名冊：<font color=red>未上傳</font>";
				$checkfinish = 0;
			}
			else
			{
				echo "目標學生名冊：<font color=blue>已上傳</font>（此文件內含個資，上傳後即可，不提供下載）";
			}
			?>
		</td>
	</tr>
	<? if($page3_warning == ''){echo "-->";} ?>
</table>

<p><p><p><p><p>

<!-- 各已申請補助項目應上傳檔案 -->

<table style="background-color:#FFDDAA">
	<tr>
		<td>
			<p><p><b>● 補助項目填報及檔案上傳狀態：</b>（僅列出貴校有申請的補助項目）
		</td>
	</tr>
</table>

<table width="90%" border="1" cellspacing="0" cellpadding="0">
<?
	for($i = 0;$i < count($applied_ary);$i++)
	{
		switch($applied_ary[$i])
		{
			case "a1":
				echo '<tr>';
				echo '<td><b>● 補助項目一：推展親職教育活動</b>';
				if($a1_p1_money > 0) //沒申請親職教育的不需上傳
				{
					echo "<p><p>　親職教育講座實施計畫：";
					if($a1_1 == '')
					{
						echo "<font color=red>未上傳</font>";
						$checkfinish = 0;
					}
					else
					{
						//echo '<font color=blue>已上傳</font>'.'&nbsp;&nbsp;&nbsp;&nbsp;'.'<a href="'.$file_path.$a1_1.'" target="_new">下載已上傳檔案</a>';
						echo "<font color='blue'>已上傳</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$file_path.$a1_1."' target='_new'><img src='../../../images/btn_dl.png'/></a>";
					}
				}

				if($a1_p2_money > 0) //沒申請家庭訪視的不需上傳
				{
					echo "<p><p>　家庭訪視實施計畫：";
					if($a1_2 == '')
					{
						echo "<font color=red>未上傳</font>";
						$checkfinish = 0;
					}
					else
					{
						//echo '<font color=blue>已上傳</font>'.'&nbsp;&nbsp;&nbsp;&nbsp;'.'<a href="'.$file_path.$a1_2.'" target="_new">下載已上傳檔案</a>';
						echo "<font color='blue'>已上傳</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$file_path.$a1_2."' target='_new'><img src='../../../images/btn_dl.png'/></a>";
					}
				}
				echo '</td>';
				echo '<td align="center" nowrap="nowrap">'.(($a1_money > 0)?"已申請":"<font color=red>未申請</font>").'</td>';
				echo '<td align="center" nowrap="nowrap">'.(($a1_money > 0)?"<a href='school_funds.php?op=1' target='_blank'>列印經費表</a>":"").'</td>';
				echo '</tr>';
				if($a1_money == 0)
					$checkfinish = 0;
				break;

			case "a2":
				echo '<tr>';
				echo '<td><b>● 補助項目二：學校發展教育特色</b>';
				if($a2_p1_money > 0) //沒申請親職教育的不需上傳
				{
					echo "<p><p>　特色一實施計畫：";

					    if($a2_inherit_year == '104')              //j10407新增,判別是否沿用
						{
							echo "<font color=red>沿用104年度計畫</font>";
						}
						else
						{

					        if($a2_1 == '')
					            {
					            	echo "<font color=red>未上傳</font>";
					            	$checkfinish = 0;
					            }
					            else
					            {
					         	  //echo '<font color=blue>已上傳</font>'.'&nbsp;&nbsp;&nbsp;&nbsp;'.'<a href="'.$file_path.$a2_1.'" target="_new">下載已上傳檔案</a>';
					         	  echo "<font color='blue'>已上傳</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$file_path.$a2_1."' target='_new'><img src='../../../images/btn_dl.png'/></a>";
					             }
						}
				}

				if($a2_p2_money > 0) //沒申請親職教育的不需上傳
				{
					echo "<p><p>　特色二實施計畫：";

					if($a2_inherit_year == '104')              //j10407新增,判別是否沿用
					{
							echo "<font color=red>沿用104年度計畫</font>";
					}
					else
					{

				     	if($a2_1 == '')
				     	{
				     		echo "<font color=red>未上傳</font>";
				     		$checkfinish = 0;
				     	}
				     	else
				     	{
				     		//echo '<font color=blue>已上傳</font>'.'&nbsp;&nbsp;&nbsp;&nbsp;'.'<a href="'.$file_path.$a2_2.'" target="_new">下載已上傳檔案</a>';
				     		echo "<font color='blue'>已上傳</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$file_path.$a2_2."' target='_new'><img src='../../../images/btn_dl.png'/></a>";
				     	}
					}
				}
				echo '</td>';
				echo '<td align="center" nowrap="nowrap">'.(($a2_money > 0)?"已申請":"<font color=red>未申請</font>").'</td>';
				echo '<td align="center" nowrap="nowrap">'.(($a2_money > 0)?"<a href='school_funds.php?op=2' target='_blank'>列印經費表</a>":"").'</td>';
				echo '</tr>';
				if($a2_money == 0)
					$checkfinish = 0;
				break;

			case "a3_1":
			case "a3_2":
				echo '<tr>';
				echo '<td><b>● 補助項目三：修繕離島或偏遠地區教師宿舍</b>';
				echo "<p><p>　實施計畫：";
				if($a3_1 == '')
				{
					echo "<font color=red>未上傳</font>";
					$checkfinish = 0;
				}
				else
				{
					//echo '<font color=blue>已上傳</font>'.'&nbsp;&nbsp;&nbsp;&nbsp;'.'<a href="'.$file_path.$a3_1.'" target="_new">下載已上傳檔案</a>';
					echo "<font color='blue'>已上傳</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$file_path.$a3_1."' target='_new'><img src='../../../images/btn_dl.png'/></a>";
				}
				echo "<p><p>　近三年住宿人員資料：";
				if($a3_2 == '')
				{
					echo "<font color=red>未上傳</font>";
					$checkfinish = 0;
				}
				else
				{
					echo "<font color='blue'>已上傳</font><br>　（此文件內含個資，上傳後即可，不提供下載）";
				}
				echo '</td>';
				echo '<td align="center" nowrap="nowrap">'.(($a3_money > 0)?"已申請":"<font color=red>未申請</font>").'</td>';
				echo '<td align="center" nowrap="nowrap">'.(($a3_money > 0)?"<a href='school_funds.php?op=3' target='_blank'>列印經費表</a>":"").'</td>';
				echo '</tr>';
				if($a3_money == 0)
					$checkfinish = 0;
				break;

			case "a4":
				echo '<tr>';
				echo '<td><b>● 補助項目四：充實學校基本教學設備</b>';
				
				echo '<table><tr><td width="60%">';
				echo "實施計畫：";
				if($a4_1 == '')
				{
					echo "<font color=red>未上傳</font>";
					$checkfinish = 0;
				}
				else
				{
					echo "<font color='blue'>已上傳</font></td><td><a href='".$file_path.$a4_1."' target='_new'><img src='../../../images/btn_dl.png'/></a>";
				}
				echo '</td></tr></table>';
				
				echo "<p><p>　領域小組會議紀錄：";
				if($a4_2 == '')
				{
					echo "<font color=red>未上傳</font>";
					$checkfinish = 0;
				}
				else
				{
					echo "<font color='blue'>已上傳</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$file_path.$a4_2."' target='_new'><img src='../../../images/btn_dl.png'/></a>";
				}
				
				echo '</td>';
				echo '<td align="center" nowrap="nowrap">'.(($a4_money > 0)?"已申請":"<font color=red>未申請</font>").'</td>';
				echo '<td align="center" nowrap="nowrap">'.(($a4_money > 0)?"<a href='school_funds.php?op=4' target='_blank'>列印經費表</a>":"").'</td>';
				echo '</tr>';
				if($a4_money == 0)
					$checkfinish = 0;
				break;

			case "a5":
				echo '<tr>';
				echo '<td><b>● 補助項目五：發展原住民教育文化特色及充實設備器材</b>';
				if($a5_p1_money > 0) //沒申請親職教育的不需上傳
				{
					echo "<p><p>　特色一實施計畫：";
					if($a5_inherit_year == '104')              //j10407新增,判別是否沿用
						{
							echo "<font color=red>沿用104年度計畫</font>";
						}
						else
						{

					        if($a5_1 == '')
					        {
				        		echo "<font color=red>未上傳</font>";
				        		$checkfinish = 0;
			        		}
			        		else
				        	{
				        		//echo '<font color=blue>已上傳</font>'.'&nbsp;&nbsp;&nbsp;&nbsp;'.'<a href="'.$file_path.$a5_1.'" target="_new">下載已上傳檔案</a>';
				        		echo "<font color='blue'>已上傳</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$file_path.$a5_1."' target='_new'><img src='../../../images/btn_dl.png'/></a>";
				        	}
						}
				}

				if($a5_p2_money > 0) //沒申請親職教育的不需上傳
				{
					echo "<p><p>　特色二實施計畫：";

			    if($a5_inherit_year == '104')              //j10407新增,判別是否沿用
						{
							echo "<font color=red>沿用104年度計畫</font>";
						}
						else
						{

					        if($a5_2 == '')                    //1040512修正為 $a5_2，原本 $a5_1
					        {
						     echo "<font color=red>未上傳</font>";
						     $checkfinish = 0;
				        	}
					       else
					      {
						     //echo '<font color=blue>已上傳</font>'.'&nbsp;&nbsp;&nbsp;&nbsp;'.'<a href="'.$file_path.$a5_2.'" target="_new">下載已上傳檔案</a>';
						     echo "<font color='blue'>已上傳</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$file_path.$a5_2."' target='_new'><img src='../../../images/btn_dl.png'/></a>";
				        	}
						}
				}
				echo '</td>';
				echo '<td align="center" nowrap="nowrap">'.(($a5_money > 0)?"已申請":"<font color=red>未申請</font>").'</td>';
				echo '<td align="center" nowrap="nowrap">'.(($a5_money > 0)?"<a href='school_funds.php?op=5' target='_blank'>列印經費表</a>":"").'</td>';
				echo '</tr>';
				if($a5_money == 0)
					$checkfinish = 0;
				break;

			case "a6":
				echo '<tr>';
				echo '<td><b>● 補助項目六：交通不便地區學校交通車</b>';
				echo "<p><p>　實施計畫：";
				if($a6_1 == '')
				{
					echo "<font color=red>未上傳</font>";
					$checkfinish = 0;
				}
				else
				{
					//echo '<font color=blue>已上傳</font>'.'&nbsp;&nbsp;&nbsp;&nbsp;'.'<a href="'.$file_path.$a6_1.'" target="_new">下載已上傳檔案</a>';
					echo "<font color='blue'>已上傳</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$file_path.$a6_1."' target='_new'><img src='../../../images/btn_dl.png'/></a>";
				}
				echo "<p><p>　各搭車路線學生名冊：";
				if($a6_2 == '')
				{
					echo "<font color=red>未上傳</font>";
					$checkfinish = 0;
				}
				else
				{
					echo "<font color='blue'>已上傳</font><br>　（此文件內含個資，上傳後即可，不提供下載）";
				}
				echo "<p><p>　學校現有交通車調查表：";
				if($a6_3 == '')
				{
					echo "<font color=red>未上傳</font>";
					$checkfinish = 0;
				}
				else
				{
					//echo '<font color=blue>已上傳</font>'.'&nbsp;&nbsp;&nbsp;&nbsp;'.'<a href="'.$file_path.$a6_3.'" target="_new">下載已上傳檔案</a>';
					echo "<font color='blue'>已上傳</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$file_path.$a6_3."' target='_new'><img src='../../../images/btn_dl.png'/></a>";
				}
				echo '</td>';
				echo '<td align="center" nowrap="nowrap">'.(($a6_money > 0)?"已申請":"<font color=red>未申請</font>").'</td>';
				echo '<td align="center" nowrap="nowrap">'.(($a6_money > 0)?"<a href='school_funds.php?op=6' target='_blank'>列印經費表</a>":"").'</td>';
				echo '</tr>';
				if($a6_money == 0)
					$checkfinish = 0;
				break;

			case "a7":
				echo '<tr>';
				echo '<td><b>● 補助項目七：整修學校社區化活動場所</b>';
				echo "<p><p>　實施計畫：";
				if($a7_1 == '')
				{
					echo "<font color=red>未上傳</font>";
					$checkfinish = 0;
				}
				else
				{
					//echo '<font color=blue>已上傳</font>'.'&nbsp;&nbsp;&nbsp;&nbsp;'.'<a href="'.$file_path.$a7_1.'" target="_new">下載已上傳檔案</a>';
					echo "<font color='blue'>已上傳</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$file_path.$a7_1."' target='_new'><img src='../../../images/btn_dl.png'/></a>";
				}
				echo '</td>';
				echo '<td align="center" nowrap="nowrap">'.(($a7_money > 0)?"已申請":"<font color=red>未申請</font>").'</td>';
				echo '<td align="center" nowrap="nowrap">'.(($a7_money > 0)?"<a href='school_funds.php?op=7' target='_blank'>列印經費表</a>":"").'</td>';
				echo '</tr>';
				if($a7_money == 0)
					$checkfinish = 0;
				break;

			default:
				echo "";
		}
	}
?>
</table>

<p>
<p>

<font color=red>
	<?
		if($checkfinish == 1)
			echo "● 貴校已完成填報。";
		else
			echo "● 貴校尚未完成填報，請檢視是否有未上傳檔案。";
	?>
</font>

</div>

<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>