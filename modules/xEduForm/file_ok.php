<?
include "../../mainfile.php";
include "../../header.php";
session_start(); 
$year = "101";	//學年度設定

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
	case "p_1":
		$point = "p1";
		break;
	case "p_2":
		$point = "p2";
		break;
	case "p_3":
		$point = "p3";
		break;
	case "p_4":
		$point = "p4";
		break;
	case "p_5":
		$point = "p5";
		break;
	case "p_6":
		$point = "p6";
		break;
	case "p_7":
		$point = "p7";
		break;
	case "p_8":
		$point = "p8";
		break;
	case "a_1_1":
		$point = "a_1_1";
		break;		
	case "a_1_2":
		$point = "a_1_2";
		break;
	case "a_1_3":
		$point = "a_1_3";
		break;
	case "a_1_4":
		$point = "a_1_4";
		break;
	case "a_2_1":
		$point = "a_2_1";
		break;		
	case "a_2_2":
		$point = "a_2_2";
		break;
	case "a_2_3":
		$point = "a_2_3";
		break;
	case "a_2_4":
		$point = "a_2_4";
		break;	
	case "a_3_1":
		$point = "a_3_1";
		break;		
	case "a_3_2":
		$point = "a_3_2";
		break;
	case "a_3_3":
		$point = "a_3_3";
		break;
	case "a_3_4":
		$point = "a_3_4";
		break;				
	case "a_4_1":
		$point = "a_4_1";
		break;		
	case "a_4_2":
		$point = "a_4_2";
		break;
	case "a_4_3":
		$point = "a_4_3";
		break;
	case "a_4_4":
		$point = "a_4_4";
		break;			
	case "a_5_1":
		$point = "a_5_1";
		break;		
	case "a_5_2":
		$point = "a_5_2";
		break;
	case "a_5_3":
		$point = "a_5_3";
		break;
	case "a_5_4":
		$point = "a_5_4";
		break;		
	case "a_6_1":
		$point = "a_6_1";
		break;		
	case "a_6_2":
		$point = "a_6_2";
		break;
	case "a_6_3":
		$point = "a_6_3";
		break;
	case "a_6_4":
		$point = "a_6_4";
		break;	
	case "a_7_1":
		$point = "a_7_1";
		break;		
	case "a_7_2":
		$point = "a_7_2";
		break;
	case "a_7_3":
		$point = "a_7_3";
		break;
	case "a_7_4":
		$point = "a_7_4";
		break;		
	case "a_8_1":
		$point = "a_8_1";
		break;		
	case "a_8_2":
		$point = "a_8_2";
		break;
	case "a_8_3":
		$point = "a_8_3";
		break;
	case "a_8_4":
		$point = "a_8_4";
		break;
	case "a_9_1":
		$point = "a_9_1";
		break;		
	case "a_9_2":
		$point = "a_9_2";
		break;
	case "a_9_3":
		$point = "a_9_3";
		break;
	case "a_9_4":
		$point = "a_9_4";
		break;
	case "final_1":
		$point = "final_1";
		break;		
	case "final_2":
		$point = "final_2";
		break;
	case "final_3":
		$point = "final_3";
		break;
	case "final_4":
		$point = "final_4";
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


/*  
//上傳
$uploaddir = 'upload/';
$uploadfile = $uploaddir.basename($_FILES['myfile']['name']);
$filename = $_FILES['myfile']['name'];
echo "<pre>";
if (move_uploaded_file($_FILES['myfile']['tmp_name'], iconv("utf-8", "big5", $uploadfile))) {
    echo "上傳 ";
	echo $_FILES['myfile']['name'];
	echo ' 成功'. '<br>';
} else {
    echo "上傳失敗 \n";
}
//print_r($_FILES);
echo "</pre>";

$table = $_POST['table'];

echo $table;
*/


//判斷是哪個table
//選擇資料表是國中還是國小

switch ($table)
{
	case "p_1":
		if($class == '1' ){
			$sql = "update 100element_upload_name set point1 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set point1 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "p_2":
		if($class > '1' ){
			$sql = "update 100element_upload_name set point2 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set point2 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "p_3":
		$point = "p3";
		break;
	case "p_4":
		if($class == '1' ){
			$sql = "update 100element_upload_name set point4 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set point4 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "p_5":
		$point = "p5";
		break;
	case "p_6":
		if($class == '1' ){
			$sql = "update 100element_upload_name set point6 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set point6 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "p_7":
		$point = "p7";
		break;
	case "p_8":
		$point = "p8";
		break;
	case "a_1_1":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance1_1 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance1_1 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "a_1_2":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance1_2 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance1_2 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "a_1_3":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance1_3 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance1_3 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "a_1_4":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance1_4 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance1_4 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;		
	case "a_2_1":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance2_1 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance2_1 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "a_2_2":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance2_2 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance2_2 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "a_2_3":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance2_3 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance2_3 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "a_2_4":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance2_4 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance2_4 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;	
	case "a_3_1":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance3_1 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance3_1 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "a_3_2":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance3_2 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance3_2 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "a_3_3":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance3_3 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance3_3 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "a_3_4":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance3_4 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance3_4 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;				
	case "a_4_1":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance4_1 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance4_1 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "a_4_2":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance4_2 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance4_2 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;		
	case "a_4_3":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance4_3 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance4_3 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "a_4_4":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance4_4 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance4_4 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;	
	case "a_5_1":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance5_1 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance5_1 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;		
	case "a_5_2":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance5_2 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance5_2 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "a_5_3":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance5_3 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance5_3 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "a_5_4":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance5_4 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance5_4 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;	
	case "a_6_1":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance6_1 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance6_1 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "a_6_2":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance6_2 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance6_2 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "a_6_3":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance6_3 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance6_3 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "a_6_4":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance6_4 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance6_4 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "a_7_1":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance7_1 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance7_1 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;		
	case "a_7_2":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance7_2 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance7_2 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "a_7_3":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance7_3 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance7_3 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "a_7_4":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance7_4 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance7_4 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "a_8_1":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance8_1 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance8_1 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "a_8_2":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance8_2 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance8_2 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "a_8_3":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance8_3 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance8_3 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "a_8_4":
		if($class == '1' ){
			$sql = "update 100element_upload_name set allowance8_4 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set allowance8_4 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "final_1":
		if($class == '1' ){
			$sql = "update 100element_upload_name set final_1 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set final_1 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "final_2":
		if($class == '1' ){
			$sql = "update 100element_upload_name set final_2 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set final_2 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "final_3":
		if($class == '1' ){
			$sql = "update 100element_upload_name set final_3 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set final_3 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "final_4":
		if($class == '1' ){
			$sql = "update 100element_upload_name set final_4 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set final_4 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	case "city2_1":
		if($class == '1' ){
			$sql = "update 100element_upload_name set city2_1 = '$filename' where account = '$username' ";
		}
		else{
			$sql = "update 100junior_upload_name set city2_1 = '$filename' where account = '$username' ";
		}
		mysql_query($sql);
		break;
	default:
		$point = "0000";
}

?>