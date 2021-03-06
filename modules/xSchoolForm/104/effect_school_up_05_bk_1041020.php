<?php
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	
	include "../../function/config_for_104.php"; //本年度基本設定
	include "bootbox.php";  //1040521新增,引入bootbox
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p>
<font color="blue"><strong><?=$school_year;?>年度 執行成果填報</strong></font><br />
<strong>項目：五、發展原住民教育文化特色及充實設備器材  </strong><a href="/edu/modules/xSchoolForm/download/allowance-05.htm" target="_blank">(補助項目說明)</a>
<?
	$sql = " select sd.account, sd.schooltype, sd.cityname, sd.district, sd.schoolname, sd.area, sd.getmoney_85to91, sd.traffic_status ".
		   "      , sy.* ".		   
		   		   
		   " from schooldata as sd left join schooldata_year as sy on sd.account = sy.account ".
		   " where sy.school_year = '$school_year' ". 
		   "   and sd.account = '$username' ";
	//echo "<br />".$sql."<br />";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$account = $row['account'];
		$schooltype = ($row['schooltype'] == 1)?"國小":"國中";
		$cityname = $row['cityname'];
		$district = $row['district'];
		$schoolname = $row['schoolname'];
		$area = $row['area'];
		
		$sy_seq = $row['seq_no']; //school_year 的 seq_no
	}

	//讀取上傳檔案資料
	$sql = " select effect_a5_1, effect_a5_2, effect_a5_3, effect_a5_4 ".
		   " from school_upload_name ".
		   " where account like '$username' ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$file_1 = $row['effect_a5_1'];
		$file_2 = $row['effect_a5_2'];
		$file_3 = $row['effect_a5_3'];
		$file_4 = $row['effect_a5_4'];
	}
	
	//$file_path = '/edu_upload/'.$school_year.'/'.$username.'/';
	//1040424修改，修改路徑pub	
	$file_path = '/epa_uploads/'.$school_year.'/pub/'.$username.'/';
	$file_path2 = '/epa_uploads/'.$school_year.'/pri/'.$username.'/';
?>
<table width="90%" border="1" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<form onSubmit="return check()" action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<strong>※上傳核定後執行計畫</strong> <font color=red>(必填)</font>
				<br />註：請彙整於於Word檔。<br />
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="effect_a5_1">
				<input type="file" name="myfile">
				<input type="submit" value="上傳核定後執行計畫"><br />
				<table border="0">
				<tr><td width="47%">
				核定後執行計畫：
				<? 
					if ($file_1 == '')
						echo "<font color='red'>未上傳</font> (上傳後請按F5更新狀態)</td>";
					else 
						echo "<font color='blue'>已上傳</font></td><td><a href='".$file_path.$file_1."' target='_new'><img src='../../../images/btn_dl.png'/></a></td>";

				?>
				</tr>
				</table>
			</form>
			<p>
		</td>
	</tr>
	<tr>
		<td>
			<form onSubmit="return check()" action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<strong>※上傳核定後執行經費概算表</strong> <font color=red>(必填)</font>
				<br />註：請彙整於於Excel檔，若各縣市政府教育局處若有特殊檔案格式要求，請以各縣市要求檔案格式為準。<br />
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="effect_a5_2">
				<input type="file" name="myfile">
				<input type="submit" value="上傳核定後執行經費概算表"><br />
				<table border="0">
				<tr><td width="47%">
				核定後執行經費概算表：
				<? 
					if ($file_2 == '')
						echo "<font color='red'>未上傳</font> (上傳後請按F5更新狀態)</td>";
					else 
						echo "<font color='blue'>已上傳</font></td><td><a href='".$file_path.$file_2."' target='_new'><img src='../../../images/btn_dl.png'/></a></td>";

				?>
				</tr>
				</table>
			</form>
			<p>
		</td>
	</tr>
	<tr>
		<td>
			<form onSubmit="return check()" action="file_up.php?sy_seq=<?=$sy_seq;?>&school_year=<?=$school_year;?>" method="post" enctype="multipart/form-data" target="_self">
				<strong>※上傳執行成果與照片</strong>
				<br />註：請彙整於Word檔，並填寫執行成果與圖片說明後上傳，勿超過10MB。<br />
				<input type="hidden" name="max_file_size" value="102400000">
				<input type="hidden" name="column_name" value="effect_a5_3">
				<input type="file" name="myfile">
				<input type="submit" value="上傳執行成果與照片"><br />
				<table border="0">
				<tr><td width="47%">
				上傳執行成果與照片：
				<? 
					if ($file_3 == '')
						echo "<font color='red'>未上傳</font> (上傳後請按F5更新狀態)</td>";
					else 
						echo "<font color='blue'>已上傳</font></td><td><a href='".$file_path.$file_3."' target='_new'><img src='../../../images/btn_dl.png'/></a></td>";
				?>
				</tr>
				</table>
			</form>
			<p>
		</td>
	</tr>
</table>
<input type="button" value="返回補助項目列表" onClick="location='effect_school_list.php'">
<p>
<font color="blue"><strong>※ 注意事項：</strong></font><br />
1. <strong>每個上傳檔案請勿超過10MB。</strong>請適當壓縮圖片適合於螢幕呈現即可。<br />
<!--1040522新增以下，上傳檔案前，出現個資提示-->
<script type="text/javascript">
    $('form').submit(function(e) {
        var currentForm = this;
        e.preventDefault();
		 bootbox.dialog({
                message: "※為避免個人資料(個資)之外洩及保障個人隱私權，若上傳之執行計畫或成果內容涉及個資內容，<font color='red'><b>請勿顯示全名、身份證字號、電話、E-mail等個資。詳細資料請自行留存學校備查!!</b></font>",
                title: " 重要提醒!!",
                buttons: {
                      OK: {
                        label: "我已確實了解!!",
                        className: "btn-primary",						
                        callback: function (result) {
						            if (result) {
                               currentForm.submit();
                             }
                        
                        }
                    }
                }
             });
         });
</script>
<!--1040522新增以上 -->
<?php include ($_SERVER['DOCUMENT_ROOT']."/edu/footer.php"); ?>