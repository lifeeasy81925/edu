<?
include "../../mainfile.php";
include "../../header.php";
session_start(); 
$year = "102";	//學年度設定

$username = $xoopsUser->getVar('uname');
  global $xoopsDB;
  $sql = "select * from " . $xoopsDB->prefix('school') . " where `account` = '$username'";
  $result = $xoopsDB -> query($sql) or die($sql);
  list($account , $city , $school , $class) = $xoopsDB->fetchRow($result);

// 檢查指標項目  
// $point = $_POST["point"];  //upload_post.php 的 Ratio button 指標號
$table = $_POST['table'];
// echo $table . "<br>";
switch ($table)
{
	case "city_1":
		$point = "city_1";
		break;
	case "city_2":
		$point = "city_2";
		break;
	case "city_3":
		$point = "city_3";
		break;
	case "city_4":
		$point = "city_4";
		break;
	case "city_5":
		$point = "city_5";
		break;
	default:
		$point = "000";
}

$directory = "upload" . "/" . $year . "/" . $username ;  //上傳目錄
$upload_path = $directory . "/"; //上傳路徑
// 建立upload目錄只有在系統新建置第一次執行時才會用到
if (is_dir( "upload" )) {	
	// echo "目錄" . "upload" . "已存在。<br>";
} else {
	//echo "建立目錄 /" . "upload" . "<br>";
	$msg[0] = "建立目錄 /" . "upload" . '\n';	
	mkdir("upload");
}
// 建立年度目錄只有在該年度第一次執行時才會用到
if (is_dir( "upload" . "/" . $year )) {	
	// echo "目錄" . "upload" . "已存在。" . <br>;
} else {
	//echo "建立目錄 /" . "upload" . "/" . $year . "<br>";
	$msg[1] = "建立目錄 /" . "upload" . "/" . $year . '\n';
	mkdir("upload" . "/" . $year );
}
// 判斷user專用目錄是否存在
if (is_dir( $upload_path )) {
	// echo "目錄" . $upload_path . "已存在。<br>";
} else {
	//echo "建立目錄 /" . $upload_path . "<br>";
	$msg[2] = "建立目錄 /" . $upload_path . '\n';
	mkdir($upload_path);
}
// 來源檔案判斷與寫入
if ($_FILES["myfile"]["size"] < 104857600) //檢查檔案大小
{
	if ($_FILES["myfile"]["error"] > 0)
	{
		//echo "Error: " . $_FILES["myfile"]["error"] . "<br><br>";
		switch ($_FILES["myfile"]["error"])  //error messge
		{
			case 1:
				//echo "<font color=red>上傳的文件超過了 php.ini 中 upload_max_filesize 選項限制的值。</font><br><br>";
				$msg[3] = "上傳的文件超過了 php.ini 中 upload_max_filesize 選項限制的值。".'\n\n';
				break;  
			case 2:
				//echo "<font color=red>上傳文件的大小超過了 HTML 表單中 MAX_FILE_SIZE 選項指定的值。</font><br><br>";
				$msg[3] = "上傳文件的大小超過了 HTML 表單中 MAX_FILE_SIZE 選項指。".'\n\n';
				break;
			case 3:
				//echo "<font color=red>文件只有部分被上傳。</font><br><br>";
				$msg[3] = "文件只有部分被上傳 (Error Code: 3)。".'\n\n';
				break;
			case 4:
				//echo "<font color=red>沒有文件被上傳。</font><br><br>";
				$msg[3] = "上傳失敗！請確認來源檔案是否有誤 (Error Code: 4)。".'\n\n';
				break;
			case 5:
				//echo "<font color=red>上傳文件大小=0 byte。</font><br><br>";
				$msg[3] = "上傳文件大小=0 byte。".'\n\n';
				break;
			default:
				//echo "<font color=red>Invalid file or over size.</font><br><br>";
				$msg[3] = "Invalid file or over size.".'\n\n';
		}
	}
	else
	{
		//echo "原始上傳檔案：" . iconv("utf-8", "big5", $_FILES["myfile"]["name"]) . "<br>";
		$msg[4] = "原始上傳檔案：" . iconv("utf-8", "big5", $_FILES["myfile"]["name"]) . '\n';
		//echo "格式：" . $_FILES["myfile"]["type"] . "<br>";
		$msg[5] = "格式：" . $_FILES["myfile"]["type"] . '\n';
		//echo "大小：" . round(($_FILES["myfile"]["size"] ) / 1024) . " KB<br><br>";
		$msg[6] = "大小：" . round(($_FILES["myfile"]["size"] ) / 1024) . " KB" . '\n\n';
		$ext_name = strtolower(strrchr($_FILES["myfile"]["name"], "."));  // 副檔名也轉小寫
		$filename = $year . "_" . $username . "_" . $point . $ext_name;
		$_FILES["myfile"]["name"] = $filename;
		if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $upload_path . $_FILES["myfile"]["name"]))
		{
			//echo "<font color=blue>檔案上傳成功！</font>" . "<br><br>";
			$msg[7] = "【檔案上傳成功！】" . '\n\n';
			//echo "指標編號：" . $point . "<br>";
			$msg[8] = "指標編號：" . $point . '\n';
			//echo "儲存檔名：" . $_FILES["myfile"]["name"] . "<br><br>";
			$msg[9] = "儲存檔名：" . $_FILES["myfile"]["name"] . '\n\n';
		}
		else
		{
			//echo "<font color=red>上傳失敗！請確認來源檔案是否有誤。</font><br><br>";
			$msg[7] = "上傳失敗！請確認來源檔案是否有誤。".'\n\n';
		}
	}
}
else
{
	switch ($_FILES["myfile"]["error"])  //error messge
	{
		case 1:
			//echo "<font color=red>上傳的文件超過了 php.ini 中 upload_max_filesize 選項限制的值。</font><br><br>";
			$msg[3] = "上傳的文件超過了 php.ini 中 upload_max_filesize 選項限制的值。".'\n\n';
			break;  
		case 2:
				//echo "<font color=red>上傳文件的大小超過了 HTML 表單中 MAX_FILE_SIZE 選項指定的值。</font><br><br>";
			$msg[3] = "上傳文件的大小超過了 HTML 表單中 MAX_FILE_SIZE 選項指。".'\n\n';
			break;
		case 3:
			//echo "<font color=red>文件只有部分被上傳。</font><br><br>";
			$msg[3] = "文件只有部分被上傳 (Error Code: 3)。".'\n\n';
			break;
		case 4:
			//echo "<font color=red>沒有文件被上傳。</font><br><br>";
			$msg[3] = "上傳失敗！請確認來源檔案是否有誤 (Error Code: 4)。".'\n\n';
			break;
		case 5:
			//echo "<font color=red>上傳文件大小=0 byte。</font><br><br>";
			$msg[3] = "上傳文件大小=0 byte。".'\n\n';
			break;
		default:
			//echo "<font color=red>Invalid file or over size.</font><br><br>";
			$msg[3] = "Invalid file or over size.".'\n\n';
	}
}

// 輸出上傳資訊及該目錄現有檔案數
//echo "上傳目錄內容：";
$msg[10] = "上傳目錄內容：";
$file_list = scandir($directory); //上傳目錄內容
/*$list_len = count($file_list); //上傳目錄內容個數
echo $list_len . "<br>";*/

$list_len = count($file_list); //上傳目錄內容個數
//echo $list_len - 2 . " 個檔案。<br>";
$msg[11] = $list_len - 2 . " 個檔案。" . '\n';


foreach ($file_list as $key => $value)
{
	if ( $value == "." || $value == ".."){}
	else
	{
		//echo $key-1 . " ) " . $value . "<br>";
		$msg[$key+13] = $key-1 . " ) " . $value . '\n';
	}
}
//echo "<br><br>";
//echo "<input type='button' value='關閉本視窗' onclick='window.close()'> <br><br>"; //關閉按鈕

$str1 = "";
foreach($msg as $key => $value){
	//echo $value;
	$str1 = $str1 . $value;
}

echo "<script langusge=\"javaScript\">";
echo "window.alert(\"" . $str1 . "\");";
//echo "location.href(\"" . $insertGoTo . "\");";
//echo "window.history.back();"; // Multi-Frame時不相容
//echo "window.top.back();"; // IE 8 不相容
echo "window.top.history.back();";

echo "</script>";


// 寫入資料庫
if($filename <> ''){
switch ($table)
{
	case "city_1":
		$sql = "update 102city_upload_name set city2_1 = '$filename' where account = '$username' ";
		mysql_query($sql);
		break;
	case "city_2":
		$sql = "update 102city_upload_name set city2_2 = '$filename' where account = '$username' ";
		mysql_query($sql);
		break;
	case "city_3":
		$sql = "update 102city_upload_name set city2_3 = '$filename' where account = '$username' ";
		mysql_query($sql);
		break;
	case "city_4":
		$sql = "update 102city_upload_name set city2_4 = '$filename' where account = '$username' ";
		mysql_query($sql);
		break;
	case "city_5":
		$sql = "update 102city_upload_name set city2_5 = '$filename' where account = '$username' ";
		mysql_query($sql);
		break;
	default:
		$point = "0000";
}
}
?>