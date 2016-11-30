<?php

if(!function_exists("mk_prefix_tag")){
  function mk_prefix_tag($tag_sn){
    global $xoopsUser,$xoopsDB;
    
    if(empty($tag_sn))return;
    
    //<font color='#0066FF'>[釋出]</font>
    $sql="select color,tag from ".$xoopsDB->prefix("tad_news_tags")." where `tag_sn`='$tag_sn'";
  	$result=$xoopsDB->query($sql);
  	list($color,$tag)=$xoopsDB->fetchRow($result);
  	list($r1,$g1,$b1)=hex2rgb($color);
  	$r0=$r1+20; if($r0>=255)$r0=255;
  	$g0=$g1+20; if($g0>=255)$g0=255;
  	$b0=$b1+20; if($b0>=255)$b0=255;
  	
  	$r2=$r1-20; if($r2<=0)$r2=0;
  	$g2=$g1-20; if($g2<=0)$g2=0;
  	$b2=$b1-20; if($b2<=0)$b2=0;
  	
  	$prefix_tag="<button class='btn btn-mini' style='background-color:rgb($r1,$g1,$b1);background-image:-moz-linear-gradient(center top , rgb($r0,$g0,$b0) , rgb($r2,$g2,$b2));color:white;margin-right:4px;padding:1px 2px;border:1px;'>$tag</button>";
    return $prefix_tag;
  }
}

if(!function_exists("hex2rgb")){
  function hex2rgb($hex) {
    if(substr($hex,0,1)!="#"){
      $hex=color_name_to_hex($hex);
    }
  
     $hex = str_replace("#", "", $hex);

     if(strlen($hex) == 3) {
        $r = hexdec(substr($hex,0,1).substr($hex,0,1));
        $g = hexdec(substr($hex,1,1).substr($hex,1,1));
        $b = hexdec(substr($hex,2,1).substr($hex,2,1));
     } else {
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));
     }
     $rgb = array($r, $g, $b);
     //return implode(",", $rgb); // returns the rgb values separated by commas
     return $rgb; // returns an array with the rgb values
  }
}

if(!function_exists("color_name_to_hex")){
  function color_name_to_hex($color_name){
      // standard 147 HTML color names
      $colors  =  array(
          'aliceblue'=>'F0F8FF',
          'antiquewhite'=>'FAEBD7',
          'aqua'=>'00FFFF',
          'aquamarine'=>'7FFFD4',
          'azure'=>'F0FFFF',
          'beige'=>'F5F5DC',
          'bisque'=>'FFE4C4',
          'black'=>'000000',
          'blanchedalmond '=>'FFEBCD',
          'blue'=>'0000FF',
          'blueviolet'=>'8A2BE2',
          'brown'=>'A52A2A',
          'burlywood'=>'DEB887',
          'cadetblue'=>'5F9EA0',
          'chartreuse'=>'7FFF00',
          'chocolate'=>'D2691E',
          'coral'=>'FF7F50',
          'cornflowerblue'=>'6495ED',
          'cornsilk'=>'FFF8DC',
          'crimson'=>'DC143C',
          'cyan'=>'00FFFF',
          'darkblue'=>'00008B',
          'darkcyan'=>'008B8B',
          'darkgoldenrod'=>'B8860B',
          'darkgray'=>'A9A9A9',
          'darkgreen'=>'006400',
          'darkgrey'=>'A9A9A9',
          'darkkhaki'=>'BDB76B',
          'darkmagenta'=>'8B008B',
          'darkolivegreen'=>'556B2F',
          'darkorange'=>'FF8C00',
          'darkorchid'=>'9932CC',
          'darkred'=>'8B0000',
          'darksalmon'=>'E9967A',
          'darkseagreen'=>'8FBC8F',
          'darkslateblue'=>'483D8B',
          'darkslategray'=>'2F4F4F',
          'darkslategrey'=>'2F4F4F',
          'darkturquoise'=>'00CED1',
          'darkviolet'=>'9400D3',
          'deeppink'=>'FF1493',
          'deepskyblue'=>'00BFFF',
          'dimgray'=>'696969',
          'dimgrey'=>'696969',
          'dodgerblue'=>'1E90FF',
          'firebrick'=>'B22222',
          'floralwhite'=>'FFFAF0',
          'forestgreen'=>'228B22',
          'fuchsia'=>'FF00FF',
          'gainsboro'=>'DCDCDC',
          'ghostwhite'=>'F8F8FF',
          'gold'=>'FFD700',
          'goldenrod'=>'DAA520',
          'gray'=>'808080',
          'green'=>'008000',
          'greenyellow'=>'ADFF2F',
          'grey'=>'808080',
          'honeydew'=>'F0FFF0',
          'hotpink'=>'FF69B4',
          'indianred'=>'CD5C5C',
          'indigo'=>'4B0082',
          'ivory'=>'FFFFF0',
          'khaki'=>'F0E68C',
          'lavender'=>'E6E6FA',
          'lavenderblush'=>'FFF0F5',
          'lawngreen'=>'7CFC00',
          'lemonchiffon'=>'FFFACD',
          'lightblue'=>'ADD8E6',
          'lightcoral'=>'F08080',
          'lightcyan'=>'E0FFFF',
          'lightgoldenrodyellow'=>'FAFAD2',
          'lightgray'=>'D3D3D3',
          'lightgreen'=>'90EE90',
          'lightgrey'=>'D3D3D3',
          'lightpink'=>'FFB6C1',
          'lightsalmon'=>'FFA07A',
          'lightseagreen'=>'20B2AA',
          'lightskyblue'=>'87CEFA',
          'lightslategray'=>'778899',
          'lightslategrey'=>'778899',
          'lightsteelblue'=>'B0C4DE',
          'lightyellow'=>'FFFFE0',
          'lime'=>'00FF00',
          'limegreen'=>'32CD32',
          'linen'=>'FAF0E6',
          'magenta'=>'FF00FF',
          'maroon'=>'800000',
          'mediumaquamarine'=>'66CDAA',
          'mediumblue'=>'0000CD',
          'mediumorchid'=>'BA55D3',
          'mediumpurple'=>'9370D0',
          'mediumseagreen'=>'3CB371',
          'mediumslateblue'=>'7B68EE',
          'mediumspringgreen'=>'00FA9A',
          'mediumturquoise'=>'48D1CC',
          'mediumvioletred'=>'C71585',
          'midnightblue'=>'191970',
          'mintcream'=>'F5FFFA',
          'mistyrose'=>'FFE4E1',
          'moccasin'=>'FFE4B5',
          'navajowhite'=>'FFDEAD',
          'navy'=>'000080',
          'oldlace'=>'FDF5E6',
          'olive'=>'808000',
          'olivedrab'=>'6B8E23',
          'orange'=>'FFA500',
          'orangered'=>'FF4500',
          'orchid'=>'DA70D6',
          'palegoldenrod'=>'EEE8AA',
          'palegreen'=>'98FB98',
          'paleturquoise'=>'AFEEEE',
          'palevioletred'=>'DB7093',
          'papayawhip'=>'FFEFD5',
          'peachpuff'=>'FFDAB9',
          'peru'=>'CD853F',
          'pink'=>'FFC0CB',
          'plum'=>'DDA0DD',
          'powderblue'=>'B0E0E6',
          'purple'=>'800080',
          'red'=>'FF0000',
          'rosybrown'=>'BC8F8F',
          'royalblue'=>'4169E1',
          'saddlebrown'=>'8B4513',
          'salmon'=>'FA8072',
          'sandybrown'=>'F4A460',
          'seagreen'=>'2E8B57',
          'seashell'=>'FFF5EE',
          'sienna'=>'A0522D',
          'silver'=>'C0C0C0',
          'skyblue'=>'87CEEB',
          'slateblue'=>'6A5ACD',
          'slategray'=>'708090',
          'slategrey'=>'708090',
          'snow'=>'FFFAFA',
          'springgreen'=>'00FF7F',
          'steelblue'=>'4682B4',
          'tan'=>'D2B48C',
          'teal'=>'008080',
          'thistle'=>'D8BFD8',
          'tomato'=>'FF6347',
          'turquoise'=>'40E0D0',
          'violet'=>'EE82EE',
          'wheat'=>'F5DEB3',
          'white'=>'FFFFFF',
          'whitesmoke'=>'F5F5F5',
          'yellow'=>'FFFF00',
          'yellowgreen'=>'9ACD32');

      $color_name = strtolower($color_name);
      if (isset($colors[$color_name]))
      {
          return ('#' . $colors[$color_name]);
      }
      else
      {
          return ($color_name);
      }
  }
}



if(!function_exists("get_tadnews_files")){
  //$mode=filename
  function get_tadnews_files($nsn=""){
    global $xoopsUser,$xoopsDB;
    $modhandler = &xoops_gethandler('module');
    $xoopsModule = &$modhandler->getByDirname("tadnews");
    $config_handler =& xoops_gethandler('config');
    $xoopsModuleConfig =& $config_handler->getConfigsByCat(0, $xoopsModule->getVar('mid'));
  
  	//取得目前使用者的所屬群組
  	if($xoopsUser){
  		$reader_uid=$xoopsUser->getVar('uid');
  	}else{
  		$reader_uid="";
  	}
  	
    $show_url=true;
    $news=get_tad_news($nsn);
  	if($xoopsModuleConfig['download_after_read']=='1' and !empty($news['have_read_group'])){
      $time=chk_sign_status($reader_uid,$nsn);
      if(empty($time)){
        $show_url=false;
      }
      $have_pass=(isset($_SESSION['have_pass']))?$_SESSION['have_pass']:array();
			if(!empty($news['passwd']) and !in_array($nsn,$have_pass))$show_url=false;
    }

  	$sql = "select * from ".$xoopsDB->prefix("tadnews_files_center")." where `col_name`='nsn' and `col_sn`='{$nsn}' order by sort";

   	$result=$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
   	while($all=$xoopsDB->fetchArray($result)){
  	  //以下會產生這些變數： $files_sn, $col_name, $col_sn, $sort, $kind, $file_name, $file_type, $file_size, $description
      foreach($all as $k=>$v){
        $$k=$v;
      }
      $files.=($show_url)?"<a href='".XOOPS_URL."/modules/tadnews/index.php?fop=dl&files_sn=$files_sn#$description' target='_blank' title='$description' alt='$description'></a>":"<a href='".XOOPS_URL."/modules/tadnews/index.php?nsn=$nsn#$description' title='"._MD_TADNEW_DOWNLOAD_AFTER_READ."' alt='"._MD_TADNEW_DOWNLOAD_AFTER_READ."'></a>";
    }
    

    return $files;
  }
}


if(!function_exists("chk_sign_status")){
  //判斷簽收時間
  function chk_sign_status($uid="",$nsn=""){
  	global $xoopsDB,$xoopsUser;
     $sql="select sign_time from ".$xoopsDB->prefix("tad_news_sign")." where uid='$uid' and nsn='$nsn'";
     $result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
     list($sign_time)=$xoopsDB->fetchRow($result);
     return $sign_time;
  }
}


if(!function_exists("get_tad_news")){
  //以流水號取得某筆tad_news資料
  function get_tad_news($nsn="",$uid_chk=false){
  	global $xoopsDB,$xoopsUser,$xoopsModule;
  	if(empty($nsn))return;

  	$sql = "select * from ".$xoopsDB->prefix("tad_news")." where nsn='$nsn'";
  	$result = $xoopsDB->query($sql) or redirect_header("index.php",3,mysql_error());
  	$data=$xoopsDB->fetchArray($result);

    $news_content=strip_tags($data['news_content']);

    //支援xlanguage
    if(function_exists('xlanguage_ml')){
      $news_content=xlanguage_ml($news_content);
    }
  
  	$data['news_description']=xoops_substr($news_content, 0, 300);

  	if($uid_chk){
  	  if(empty($xoopsUser)) redirect_header("index.php",3,_MA_TADNEW_NO_ADMIN_POWER);
  		$module_id = $xoopsModule->getVar('mid');
  	  $isAdmin=$xoopsUser->isAdmin($module_id);
  		$uid=$xoopsUser->getVar('uid');
  	  if(!$isAdmin and $uid!=$data['uid']){
         redirect_header("index.php",3,_MA_TADNEW_NO_ADMIN_POWER);
  		}
    }

  	return $data;
  }
}


if(!function_exists("block_chk_cate_power")){
	//判斷本文之所屬分類是否允許該用戶之所屬群組觀看
	function block_chk_cate_power($ncsn="",$User_Groups=array()){
		$cate=block_get_tad_news_cate($ncsn);
		$enable_group=$cate['enable_group'];
		if(!empty($enable_group)){
			$ok=false;
			$cate_enable_group=explode(",",$enable_group);
			foreach($User_Groups as $gid){
				if(in_array($gid,$cate_enable_group)){
					return true;
				}
			}
		}else{
			return true;
		}
		return false;
	}
}


if(!function_exists("block_get_tad_news_cate")){
	//以流水號取得某筆tad_news_cate資料
	function block_get_tad_news_cate($ncsn=""){
		global $xoopsDB;
		if(empty($ncsn))return;
		$sql = "select * from ".$xoopsDB->prefix("tad_news_cate")." where ncsn='$ncsn'";
		$result = $xoopsDB->query($sql) or redirect_header(XOOPS_URL,3,mysql_error());
		$data=$xoopsDB->fetchArray($result);
		return $data;
	}
}


if(!function_exists("block_admin_tool")){
	//編輯工具
	function block_admin_tool($uid,$nsn,$counter=""){
		global $xoopsUser,$xoopsModule;

		if($xoopsUser){
			$uuid=$xoopsUser->getVar('uid');
			$modhandler = &xoops_gethandler('module');
		  $xoopsModule = &$modhandler->getByDirname("tadnews");
			$module_id = $xoopsModule->getVar('mid');
	    $isAdmin=$xoopsUser->isAdmin($module_id);
		}else{
			$uuid="";
			$isAdmin="";
		}

		//不是本人或網管就不秀出工具
		if($uid!=$uuid and !$isAdmin)return "";


		$fun="<div>
		<a href='".XOOPS_URL."/modules/tadnews/post.php'>"._MB_TADNEW_ADD."</a> |
		<a href='".XOOPS_URL."/modules/tadnews/post.php?op=tad_news_form&nsn=$nsn'>"._MB_TADNEW_EDIT."</a> |
		"._MB_TADNEW_HOT."{$counter}
		</div>";
		return $fun;
	}
}


if(!function_exists("b_del_tadnews_js")){
	//刪除的js
	function b_del_tadnews_js(){
		$js="<script>
		function delete_tad_news_func(nsn){
			var sure = window.confirm('"._MB_TADNEW_SURE_DEL."');
			if (!sure)	return;
			location.href=\"".XOOPS_URL."/modules/tadnews/index.php?op=delete_tad_news&nsn=\" + nsn;
		}
		</script>";
		return $js;
	}
}


if(!function_exists("chk_always_top")){
	//取得附檔
	function chk_always_top(){
		global $xoopsDB,$xoopsUser;
    $now=date("Y-m-d H:i:s" , xoops_getUserTimestamp(time()));
		$sql="update ".$xoopsDB->prefix("tad_news")." set always_top='0' WHERE always_top_date <='{$now}' and always_top_date!='0000-00-00 00:00:00'";
		$xoopsDB->queryF($sql);
	}
}

if(!function_exists("block_news_format")){
  function block_news_format($nsn="",$title="",$news_content="",$fun="",$fun2="",$prefix_tag="",$uid="",$ncsn="",$cate="",$start_day="",$files="",$have_read_group="",$have_read_chk="",$style=""){
    $uid_name=XoopsUser::getUnameFromId($uid,1);
    if(empty($uid_name)){
      $uid_name=XoopsUser::getUnameFromId($uid,0);
    }


    $sign_bg=(!empty($have_read_group))?"style='background-image:url(".XOOPS_URL."/modules/tadnews/images/sign_bg.png);background-position: right top;background-repeat: no-repeat;'":"";

    $prefix_tag=mk_prefix_tag($prefix_tag);
    $main="
    <div id='clean_news' style='{$style}'>
      <div id='news_head' $sign_bg>
         <div id='news_title'>{$prefix_tag} <a href='".XOOPS_URL."/modules/tadnews/index.php?nsn={$nsn}'>{$title}</a></div>
         <div id='news_toolbar'>$fun</div>
         <div id='news_info'>
         <a href='".XOOPS_URL."/userinfo.php?uid={$uid}'>{$uid_name}</a> - <a href='".XOOPS_URL."/modules/tadnews/index.php?ncsn={$ncsn}'>{$cate}</a> | {$start_day}
         </div>
      </div>

      <div id='news_content'>{$news_content}</div>
      $have_read_chk
      $files
      <div style='clear:both;height:10px;'></div>
      <div id='news_toolbar'>{$fun2}</div>
    </div>
    <div style='clear:both;'></div>";
  	return $main;
  }
}



//取得新聞封面圖片檔案
if(!function_exists("get_news_doc_pic")){
  function get_news_doc_pic($col_name="",$col_sn="",$mode="big",$style="db",$only_url=false,$id='cover_pic'){
  	global $xoopsDB,$xoopsUser,$xoopsModule;

  	$sql = "select * from ".$xoopsDB->prefix("tadnews_files_center")." where `col_name`='{$col_name}' and `col_sn`='{$col_sn}' order by sort";

   	$result=$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
   	while($all=$xoopsDB->fetchArray($result)){
  	  //以下會產生這些變數： $files_sn, $col_name, $col_sn, $sort, $kind, $file_name, $file_type, $file_size, $description
      foreach($all as $k=>$v){
        $$k=$v;
      }
      
      $style=($style=='db')?$description:$style;
      if(empty($style) and !$only_url)return;
      
      if($mode!="big"){
        if($only_url){
          return XOOPS_URL."/uploads/tadnews/image/.thumbs/{$file_name}";
        }else{
          return "<a href='".XOOPS_URL."/modules/tadnews/index.php?nsn=$col_sn'><div id='$id' style='background-image:url(".XOOPS_URL."/uploads/tadnews/image/.thumbs/{$file_name});{$style}'></div></a>";
        }
      }else{
        if($only_url){
          return XOOPS_URL."/uploads/tadnews/image/{$file_name}";
        }else{
          return "<a href='".XOOPS_URL."/modules/tadnews/index.php?nsn=$col_sn'><div id='$id' style='background-image:url(".XOOPS_URL."/uploads/tadnews/image/{$file_name});{$style}'></div></a>";
        }
      }
    }
    return ;
  }
}


//取得所有類別標題
if(!function_exists("block_news_cate")){
  function block_news_cate($selected=""){
  	global $xoopsDB;

  	if(!empty($selected)){
  		$sc=explode(",",$selected);
  	}

  	$js="<script>
  	function bbv(){
  	  i=0;
  	  var arr = new Array();";

  	$sql = "select ncsn,nc_title from ".$xoopsDB->prefix("tad_news_cate")." where not_news!='1' order by sort";
  	$result = $xoopsDB->query($sql);
  	$option="";
  	while(list($ncsn,$nc_title)=$xoopsDB->fetchRow($result)){

  	  $js.="if(document.getElementById('c{$ncsn}').checked){
  	   arr[i] = document.getElementById('c{$ncsn}').value;
  		 i++;
  		}";
  	  $ckecked=(in_array($ncsn,$sc))?"checked":"";
  		$option.="<span style='white-space:nowrap;'><input type='checkbox' id='c{$ncsn}' value='{$ncsn}' class='bbv' onChange=bbv() $ckecked><label for='c{$ncsn}'>$nc_title</label></span> ";
  	}

  	$js.="document.getElementById('bb').value=arr.join(',');
  	}
  	</script>";

  	$main['js']=$js;
  	$main['form']=$option;
  	return $main;
  }
}
?>
