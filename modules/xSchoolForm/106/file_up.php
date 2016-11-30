<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	include ($_SERVER['DOCUMENT_ROOT']."/edu/mainfile.php");
	include ($_SERVER['DOCUMENT_ROOT']."/edu/header.php");
	include "../../function/connect_school.php";
	
	$sy_seq         = $_GET['sy_seq'];	
	$school_year    = $_GET['school_year'];	
	
	$come_from_page = $_POST['come_from_page'];  // 來自的頁面，上傳後要再返回它。
	$column_name = $_POST['column_name']; //對應的資料庫欄位名稱

	//上傳路徑
	$upload_path = $_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/pub/'.$username.'/';

	//建立epa_uploads 資料夾
	if(!is_dir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads'))
	{
		mkdir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads', 0777);
	}
	//建立school_year 資料夾
	if(!is_dir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year))
	{
		mkdir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year, 0777);
	}

	//1040422修改，新增可公開的pub資料夾
	//建立pub資料夾
	if(!is_dir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/pub'))
	{
		mkdir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/pub', 0777);
	}
	//1040422修改，以上為建立pub資料夾

	//建立account 資料夾
	if(!is_dir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/pub/'.$username))
	{
		mkdir($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/pub/'.$username, 0777);
	}

	$is_success = false; //上傳是否成功

	// 來源檔案判斷與寫入

	$ext_name = strtolower(strrchr($_FILES["myfile"]["name"], "."));  // 副檔名也轉小寫

	if ($_FILES["myfile"]["error"] > 0)
	{
		switch ($_FILES["myfile"]["error"])  // Error messge
		{
			case 1:
				$msg[1] = "上傳的文件超過了 php.ini 中 upload_max_filesize 選項限制的值。（錯誤代碼：1）。";
				break;
			case 2:
				$msg[1] = "上傳文件的大小超過了 HTML 表單中 MAX_FILE_SIZE 選項值。（錯誤代碼：2）。";
				break;
			case 3:
				$msg[1] = "文件只有部分被上傳。（錯誤代碼：3）。";
				break;
			case 4:
				$msg[1] = "請先選擇檔案，再點選上傳。（錯誤代碼：4）。";  // 來源檔案有誤。
				break;
			case 5:
				$msg[1] = "上傳文件大小 = 0 Byte。（錯誤代碼：5）。";
				break;
			default:
				$msg[1] = "Invalid file or over size.（錯誤代碼：6）。";
		}
	}  // 原先有限制檔案格式，但因推廣開放文檔格式(ODF)，故取消限制。	
	elseif($_FILES["myfile"]["size"] == null) // 沒有Error Code，但是檔案大小是Null，就是超過檔案大小限制了。
	{
		$msg[1] = "您上傳的文件檔案容量有誤（單一檔案不超過 10 MB）。";
	}
	else  // 沒有例外，即是上傳檔案成功。
	{
		$s = date("mdHi", time() + 28800);  // 檔名加 月日時分，60×60×8=28800為台灣時區(GMT+8)

		$filename = $school_year . "_" . $s . "_" . $username . "_" . $column_name . $ext_name;

		$_FILES["myfile"]["name"] = $filename;

		if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $upload_path . $_FILES["myfile"]["name"]))
		{
			$msg[2] = "【檔案上傳成功！】" ;

			chmod($_SERVER['DOCUMENT_ROOT'].'/epa_uploads/'.$school_year.'/'.$username.'/pub/'.$filename, 0777); //chmod 在 windows 下沒用

			$is_success = true;
		}
		else
		{
			$msg[2] = "上傳失敗！請確認來源檔案是否有誤。" . $_FILES["myfile"]["tmp_name"] . $upload_path . $filename;
		}
	}
	

	// 輸出上傳資訊及該目錄現有檔案數

	$file_list = scandir($upload_path); //上傳目錄內容

	$list_len = count($file_list); //上傳目錄內容個數

	if($is_success == true) //上傳成功寫入資料庫
	{
		//一開始沒資料，先新增
		$cnt_sql = " SELECT sy_seq FROM school_upload_name where sy_seq = '$sy_seq' ";
		$result = mysql_query($cnt_sql);
		$num_rows = mysql_num_rows($result);
		if($num_rows == 0) //沒資料
		{
			$insert_sql = "insert into school_upload_name (sy_seq, account, school_year) ".
						  "                     values ('$sy_seq', '$username', '$school_year') ";
			mysql_query($insert_sql);
		}

		//刪除舊檔案
		$sql = " select $column_name from school_upload_name where sy_seq = '$sy_seq' ";
		$result = mysql_query($sql);
		while($row = mysql_fetch_row($result))
		{
			$old_file = $row[0];
			$old_path = $upload_path.$old_file;
			if($old_file != "") //有檔案才刪除
			{
				unlink($old_path);
			}
		}

		$sql = "update school_upload_name set $column_name = '$filename' where sy_seq = '$sy_seq' ";
		mysql_query($sql);
	}

	//把訊息串起來，javascript要用
	$msgbox = "";
	foreach($msg as $key => $value)
	{
		$msgbox = $msgbox . $value;
	}

	echo "<script langusge=\"javaScript\">";
	echo "window.alert(\"" . $msgbox . "\");";  // 從這邊秀文字
	if($come_from_page != "")
	{
		echo "document.location.href='" . $come_from_page . "';";
	}
	else
	{
		echo "history.back();";
		echo "windows.location.reload(1);";
	}
	echo "</script>";
?>
<?
/*
elseif(strrpos($ext_name, "docx") == false && strrpos($ext_name, "doc") == false && strrpos($ext_name, "xlsx") == false && strrpos($ext_name, "xls") == false && strrpos($ext_name, "pdf") == false && strrpos($ext_name, "jpg") == false)
{
$msg[1] = "您上傳的檔案不是Word、Excel、JPG或是PDF檔。";
}
*/
?>