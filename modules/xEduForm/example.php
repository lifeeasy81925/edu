<?php 
if (!empty($_POST["file1"])){ 
doProcess($_POST["file1"],$_POST['tb1']); 
} 

?>
 
<form id="form1" name="form1" enctype="multipart/form-data" method="post" action=""> 
<p> 
<label>Excel 檔名(完整路徑)： 
<input name="file1" type="text" id="file1" size="50" /> 
<br /> 
</label> 
</p> 
<p> 
<input type="submit" name="submit1" id="submit1" value="送出" /> 
</p> 
</form>
 
<?php
 
// Test CVS 
function doProcess($file1){ 
require_once 'Excel/reader.php'; 

$mysqli = new mysqli("localhost", "root", "xxxxxxxx","db1") or die($mysqli->error);
 

// ExcelFile($filename, $encoding); 
$data = new Spreadsheet_Excel_Reader();
 

// Set output Encoding. 
$data->setOutputEncoding('utf-8');
 
/*** 
* if you want you can change 'iconv' to mb_convert_encoding: 
* $data->setUTFEncoder('mb'); 
* 
**/
 
/*** 
* By default rows & cols indeces start with 1 
* For change initial index use: 
* $data->setRowColOffset(0); 
* 
**/
 
/*** 
* Some function for formatting output. 
* $data->setDefaultFormat('%.2f'); 
* setDefaultFormat - set format for columns with unknown formatting 
* 
* $data->setColumnFormat(4, '%.3f'); 
* setColumnFormat - set format for column (apply only to number fields) 
* 
**/
 
$file_big5 = mb_convert_encoding($file1, 'BIG5', 'UTF-8'); 
$data->read($file_big5);
 
/*
 

$data->sheets[0]['numRows'] - count rows 
$data->sheets[0]['numCols'] - count columns 
$data->sheets[0]['cells'][$i][$j] - data from $i-row $j-column
 
$data->sheets[0]['cellsInfo'][$i][$j] - extended info about cell 

$data->sheets[0]['cellsInfo'][$i][$j]['type'] = "date" | "number" | "unknown" 
if 'type' == "unknown" - use 'raw' value, because cell contain value with format '0.00'; 
$data->sheets[0]['cellsInfo'][$i][$j]['raw'] = value if cell without format 
$data->sheets[0]['cellsInfo'][$i][$j]['colspan'] 
$data->sheets[0]['cellsInfo'][$i][$j]['rowspan'] 
*/ 

error_reporting(E_ALL ^ E_NOTICE); 
$pos=mb_strrpos($file1,"\\"); 
$pos2=mb_strrpos($file1,"."); 
$len=mb_strlen($file1); 
$fileName=mb_substr($file1,$pos+1,($pos2-$pos-1));
 
for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) { 
$a=trim($data->sheets[0]['cells'][1][$j]); 
if (empty($a)) 
$fields="field".$j; 
else 
$fields= $data->sheets[0]['cells'][1][$j]; 

$fields.=" text"; 

if($j < $data->sheets[0]['numCols']) 
$fields.=","; 

$fs.=$fields; 
}
 
$mysqli->query("SET NAMES 'utf8'"); 
$q="DROP TABLE IF EXISTS ".$fileName;
 
$mysqli->query($q) or die($mysqli->error);
 
$q="create table ".$fileName."(".$fs.")"; 
$mysqli->query($q) or die($mysqli->error);
 

for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) { 
$q="insert ".$fileName." values("; 
for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) { 
$q.="\"".addslashes($data->sheets[0]['cells'][$i][$j]); 
if($j < $data->sheets[0]['numCols']) 
$q.="\","; 
else 
$q.="\""; 
} 
$q.=")"; 
// echo $q; 
$mysqli->query($q) or die($mysqli->error); 
}
 
} 

?> 

