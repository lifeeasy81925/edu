<?php
/*-----------引入檔案區--------------*/
include "../../../include/cp_header.php";

$of_csn=intval(str_replace("node-_","",$_POST['of_csn']));
$csn=intval(str_replace("node-_","",$_POST['csn']));

if($of_csn==$csn){
  die(_MA_TREETABLE_MOVE_ERROR1."(".date("Y-m-d H:i:s").")");
}elseif(chk_cate_path($csn,$of_csn)){
  die(_MA_TREETABLE_MOVE_ERROR2."(".date("Y-m-d H:i:s").")");
}

$sql="update ".$xoopsDB->prefix("tad_gallery_cate")." set `of_csn`='{$of_csn}' where `csn`='{$csn}'";
$xoopsDB->queryF($sql) or die("Reset Fail! (".date("Y-m-d H:i:s").")");

echo _MA_TREETABLE_MOVE_OK." (".date("Y-m-d H:i:s").")";

//檢查目的地編號是否在其子目錄下
function chk_cate_path($csn,$to_csn){
   global $xoopsDB;
    //抓出子目錄的編號
   $sql = "select csn from ".$xoopsDB->prefix("tad_gallery_cate")." where of_csn='{$csn}'";
   $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
   while(list($sub_csn)=$xoopsDB->fetchRow($result)){
    if(chk_cate_path($sub_csn,$to_csn))return true;
    if($sub_csn==$to_csn)return true;
   }
   return false;
}
?>