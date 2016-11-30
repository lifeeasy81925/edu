<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2008-03-25
// $Id: index.php,v 1.2 2008/05/14 01:24:52 tad Exp $
// ------------------------------------------------------------------------- //

/*-----------引入檔案區--------------*/
include_once "header.php";
$xoopsOption['template_main'] = "index_tpl.html";
/*-----------function區--------------*/

//列出所有tad_cbox資料
function list_tad_cbox(){
	global $xoopsDB,$xoopsModule,$xoopsModuleConfig,$xoopsUser;
	$MDIR=$xoopsModule->getVar('dirname');

	if($_GET['mode']=="box"){
	  if(empty($_SESSION['cbox_show_num'])){
      $_SESSION['cbox_show_num']=10;
		}
		$sql = "select * from ".$xoopsDB->prefix("tad_cbox")." order by post_date desc limit 0,{$_SESSION['cbox_show_num']}";
		$bar_tool="";
	}else{
		$sql = "select * from ".$xoopsDB->prefix("tad_cbox")." order by post_date desc";
		
		//getPageBar($原sql語法, 每頁顯示幾筆資料, 最多顯示幾個頁數選項);
    $PageBar=getPageBar($sql,20,10);
    $bar=$PageBar['bar'];
    $sql=$PageBar['sql'];
		$bar_tool="<tr><td class=bar>$bar</td></tr>";
	}
	
	
	$result = $xoopsDB->query($sql) or die($sql);


	//判斷是否對該模組有管理權限，  若空白
  if ($xoopsUser) {
    $module_id = $xoopsModule->getVar('mid');
    $isAdmin=$xoopsUser->isAdmin($module_id);
  }else{
    $isAdmin=false;

	}

  $cbox_root_msg_color=(empty($_SESSION['cbox_root_msg_color']))?"two":$_SESSION['cbox_root_msg_color'];

  if($isAdmin){
		$del_js="
		<script>
		function delete_tad_cbox_func(sn){
			var sure = window.confirm('"._BP_DEL_CHK."');
			if (!sure)	return;
			location.href=\"{$_SERVER['PHP_SELF']}?mode={$_GET['mode']}&op=delete_tad_cbox&sn=\" + sn;
		}
		</script>";
	}else{
    $del_js="";
	}

	$data="
	$del_js
	<div class='cbox'>
	<table id='cbox_show_tbl'>$bar_tool";
	$i=2;
	$talk_width=$_SESSION['talk_width'];
	while(list($sn,$publisher,$msg,$post_date,$ip,$only_root,$root_msg)=$xoopsDB->fetchRow($result)){
	  $bgcss=($i%2)?"color:{$xoopsModuleConfig['col1_color']};background-color:{$xoopsModuleConfig['col1_bgcolor']}":"color:{$xoopsModuleConfig['col2_color']};background-color:{$xoopsModuleConfig['col2_bgcolor']}";
	  
	  $post_date=date("Y-m-d H:i:s",xoops_getUserTimestamp(strtotime($post_date)));

	  if($only_root=='1' and !$isAdmin){
			$msg="<font class='lock_msg'>"._MA_TADCBOX_LOCK_MSG."</font>";
		}
		
		if($talk_width < 165 and $isAdmin){
			$post_date=substr($post_date,0,10);
		}

    

    $tool=($isAdmin)?"<img src='".XOOPS_URL."/modules/tad_cbox/images/re.gif' width=16 height=12 align=bottom hspace=2 onClick=\"window.open('".XOOPS_URL."/modules/tad_cbox/post.php?sn={$sn}','cboxform')\"><img src='".XOOPS_URL."/modules/tad_cbox/images/del2.gif' width=12 height=12 align=bottom hspace=2 onClick=\"delete_tad_cbox_func($sn)\">":"";

			$msg=str_replace("[s","<img src='".XOOPS_URL."/modules/tad_cbox/images/smiles/s",$msg);
			$msg=str_replace(".gif]",".gif' hspace=2 align='absmiddle'>",$msg);
      $msg=nl2br($msg);

		if(!empty($root_msg)){
      $root_msg=str_replace("[s","<img src='".XOOPS_URL."/modules/tad_cbox/images/smiles/s",$root_msg);
			$root_msg=str_replace(".gif]",".gif' hspace=2 align='absmiddle'>",$root_msg);
      $root_msg=nl2br($root_msg);
      
      $div_id=($_GET['mode']=="box")?"cbox_container":"cbox_container2";
      
		  $root="<div id='{$div_id}'><div class='{$cbox_root_msg_color}'>
			<b class='tl'><b class='tr'></b></b>
			<p>{$root_msg}</p>
			<b class='bl'></b><b class='br'><b class='point'></b></b>
			</div></div>";
		}else{
			$root="";
		}
		//$post_date=xoops_getUserTimestamp(strtotime($post_date));
		$data.="<tr>
		<td style='{$bgcss}'><div class='cbox_date'>{$post_date}{$tool}</div>{$root}
		<div class='txt_msg' style='word-wrap:break-word;word-break:break-all;-moz-binding: url(wordwrap.xml#wordwrap);overflow: hidden;line-height:140%'>
		<div class='cbox_publisher'>{$publisher}</div>: {$msg}</div></td>
		</tr>";
		$i++;
	}
	$data.="$bar_tool
	</table></div>";
	
	if($_GET['mode']!="box"){
		$data=div_3d("",$data,"corners");
	}
	return $data;
}

//跳過HTML的換行
function breakLongWords($str, $maxLength, $char){
    $wordEndChars = array(" ", "\n", "\r", "\f", "\v", "\0");
    $count = 0;
    $newStr = "";
    $openTag = false;
    for($i=0; $i<strlen($str); $i++){
        $newStr .= $str{$i};

        if($str{$i} == "<"){
            $openTag = true;
            continue;
        }
				
        if(($openTag) && ($str{$i} == ">")){
            $openTag = false;
            continue;
        }

        if(!$openTag){
            if(!in_array($str{$i}, $wordEndChars)){//If not word ending char
                $count++;
                if($count==$maxLength){//if current word max length is reached
                    $ch=substr($newStr,$count-1,1);
            				if(ord($ch)>127){
            				  $count++;
            				  continue;
										}
            
                    $newStr .= $char;//insert word break char
                    $count = 0;
                }
            }else{//Else char is word ending, reset word char count
                    $count = 0;
            }
        }

    }//End for
    return $newStr;
}

// 將字串中的網址加入超連結
function parseURL($strURL = null){
	$regex = "{ ((https?|telnet|gopher|file|wais|ftp):[\\w/\\#~:.?+=&%@!\\-]+?)(?=[.:?\\-]*(?:[^\\w/\\#~:.?+=&%@!\\-]|$)) }x";

	return preg_replace($regex,"<a href=\"$1\" target=\"_blank\">$1</a>",$strURL);
}


/*-----------執行動作判斷區----------*/
$_REQUEST['op']=(empty($_REQUEST['op']))?"":$_REQUEST['op'];
switch($_REQUEST['op']){
	//刪除資料
	case "delete_tad_cbox";
	delete_tad_cbox($_GET['sn']);
	header("location: {$_SERVER['PHP_SELF']}?mode={$_GET['mode']}");
	break;

	default:
	$main=list_tad_cbox();
	break;
}

/*-----------秀出結果區--------------*/
if($_GET['mode']=="box"){
echo "<html><head>
<meta http-equiv='content-type' content='text/html; charset="._CHARSET."'>
<link rel='stylesheet' type='text/css' media='screen' href='".XOOPS_URL."/modules/tad_cbox/module.css' />
<link rel='stylesheet' type='text/css' media='screen' href='".XOOPS_URL."/modules/tad_cbox/module.php' />
</head><body bgcolor='#FFFFFF' style='scrollbar-face-color:#EDF3F7;scrollbar-shadow-color:#EDF3F7;scrollbar-highlight-color:#EDF3F7;scrollbar-3dlight-color:#FFFFFF;scrollbar-darkshadow-color:#FFFFFF;scrollbar-track-color:#FFFFFF;scrollbar-arrow-color:#232323;scrollbar-base-color:#FFFFFF;'>";
echo $main;
echo "</body></html>";
}else{
include XOOPS_ROOT_PATH."/header.php";
$talk_width=500;
$talk_width2=$talk_width-8;
$xoopsTpl->assign( "css" , "<link rel='stylesheet' type='text/css' media='screen' href='".XOOPS_URL."/modules/tad_cbox/module.css' />
<style type='text/css'>
#cbox_container2 {
	width: {$talk_width}px;
}
#cbox_container2 div:after {
	content: \".\";
	display: block;
	height: 11px;
	clear: both;
	visibility: hidden;
}
#cbox_container2 div {
	width: {$talk_width}px;
	height: auto;
	font-size: 11px;
}
b.tl {
	display: block;
	width: {$talk_width}px;
	height: 8px;
	font-size: 1px;
}
b.tr {
	display: block;
	width: {$talk_width2}px;
	height: 8px;
	font-size: 1px;
	float: right;
}
b.br {
	display: block;
	width: {$talk_width2}px;
	height: 8px;
	font-size: 1px;
	float: right;
	position: relative;
}
b.bl {
	display: block;
	width: 8px;
	height: 8px;
	font-size: 1px;
	float: left;
}
b.point {
	display: block;
	font-size: 1px;
	width: 25px;
	height: 14px;
}
#cbox_container2 div p {
	padding: 8px;
	margin: 0;
	border: 3px solid #fff;
	border-width: 0 3px;
	text-align: justify;
}
div.one b.tl {
	background: url(".XOOPS_URL."/modules/tad_cbox/images/top_left1.gif) top left no-repeat;
}
div.one b.tr {
	background: url(".XOOPS_URL."/modules/tad_cbox/images/top_right1.gif) top right no-repeat;
}
div.one p {
	background: #ecc7c7;
}
div.one b.bl {
	background: url(".XOOPS_URL."/modules/tad_cbox/images/bottom_left1.gif) top left no-repeat;
}
div.one b.br {
	background: url(".XOOPS_URL."/modules/tad_cbox/images/bottom_right1.gif) top right no-repeat;
}
div.one b.point {
	background: url(".XOOPS_URL."/modules/tad_cbox/images/point1.gif) top left no-repeat;
	margin: 5px 0 0 25px;
}
div.two b.tl {
	background: url(".XOOPS_URL."/modules/tad_cbox/images/top_left2.gif) top left no-repeat;
}
div.two b.tr {
	background: url(".XOOPS_URL."/modules/tad_cbox/images/top_right2.gif) top right no-repeat;
}
div.two p {
	background: #e5ecc9;
}
div.two b.bl {
	background: url(".XOOPS_URL."/modules/tad_cbox/images/bottom_left2.gif) top left no-repeat;
}
div.two b.br {
	background: url(".XOOPS_URL."/modules/tad_cbox/images/bottom_right2.gif) top right no-repeat;
}
div.two b.point {
	background: url(".XOOPS_URL."/modules/tad_cbox/images/point2.gif) top left no-repeat;
	margin: 5px 0 0 25px;
}
div.three b.tl {
	background: url(".XOOPS_URL."/modules/tad_cbox/images/top_left3.gif) top left no-repeat;
}
div.three b.tr {
	background: url(".XOOPS_URL."/modules/tad_cbox/images/top_right3.gif) top right no-repeat;
}
div.three p {
	background: #c9d7ec;
}
div.three b.bl {
	background: url(".XOOPS_URL."/modules/tad_cbox/images/bottom_left3.gif) top left no-repeat;
}
div.three b.br {
	background: url(".XOOPS_URL."/modules/tad_cbox/images/bottom_right3.gif) top right no-repeat;
}
div.three b.point {
	background: url(".XOOPS_URL."/modules/tad_cbox/images/point3.gif) top left no-repeat;
	margin: 5px 0 0 25px;
}
div.four b.tl {
	background: url(".XOOPS_URL."/modules/tad_cbox/images/top_left4.gif) top left no-repeat;
}
div.four b.tr {
	background: url(".XOOPS_URL."/modules/tad_cbox/images/top_right4.gif) top right no-repeat;
}
div.four p {
	background: #e5c9ec;
}
div.four b.bl {
	background: url(".XOOPS_URL."/modules/tad_cbox/images/bottom_left4.gif) top left no-repeat;
}
div.four b.br {
	background: url(".XOOPS_URL."/modules/tad_cbox/images/bottom_right4.gif) top right no-repeat;
}
div.four b.point {
	background: url(".XOOPS_URL."/modules/tad_cbox/images/point4.gif) top left no-repeat;
	margin: 5px 0 0 25px;
}

</style>") ;
$xoopsTpl->assign( "toolbar" , toolbar($interface_menu)) ;
$xoopsTpl->assign( "content" , $main) ;
include_once XOOPS_ROOT_PATH.'/footer.php';
}
?>
