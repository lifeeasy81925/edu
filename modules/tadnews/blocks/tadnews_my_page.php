<?php
//  ------------------------------------------------------------------------ //
// ���Ҳե� tad �s�@
// �s�@����G2007-11-04
// $Id: tadnews_re_block.php,v 1.2 2008/05/14 01:31:48 tad Exp $
// ------------------------------------------------------------------------- //

//�ۿﭶ��
function tadnews_my_page($options){
	global $xoopsDB;
	if(empty($options[0]))return "";

	include_once XOOPS_ROOT_PATH."/modules/tadnews/block_function.php";

		//���o�ثe�ϥΪ̪����ݸs��
	if($xoopsUser){
		$User_Groups=$xoopsUser->getGroups();
	}else{
		$User_Groups=array();
	}
	
	$sql="select ncsn,nc_title,not_news from ".$xoopsDB->prefix("tad_news_cate")." ";
	$result=$xoopsDB->query($sql);
	while(list($ncsn,$nc_title,$not_news)=$xoopsDB->fetchRow($result)){
		$cates[$ncsn]=$nc_title;
		$index[$ncsn]=($not_news=='1')?"page.php":"index.php";
	}

	
	$sql = "select * from ".$xoopsDB->prefix("tad_news")." where nsn in({$options[0]})";
	$result = $xoopsDB->query($sql);
	

	$block['lang_news_cate']=_MB_TADNEW_NEWS_CATE;
	$block['lang_news_title']=_MB_TADNEW_NEWS_TITLE;
	$block['lang_news_counter']=_MB_TADNEW_COUNTER;
	
	$i=2;
	while($all_news=$xoopsDB->fetchArray($result)){
	  foreach($all_news as $k=>$v){
			$$k=$v;
		}


		//�P�_���大���ݤ����O�_���\�ӥΤᤧ���ݸs���[��
		if(!block_chk_cate_power($ncsn,$User_Groups)){
			continue;
		}

		//�P�_����O�_���\�ӥΤᤧ���ݸs���[��
		if(!empty($enable_group)){
			$ok=false;
			$news_enable_group=explode(",",$enable_group);
			foreach($User_Groups as $gid){
				if(in_array($gid,$news_enable_group)){
					$ok=true;
				}
			}
			if(!$ok)continue;
		}
		
		$need_sign=(!empty($have_read_group))?"<img src='".XOOPS_URL."/modules/tadnews/images/sign_s.png' align='absmiddle' hspace='3' alt='{$news_title}'>":"";

		
        $uid_name=XoopsUser::getUnameFromId($uid,1);
        $uid_name=(empty($uid_name))?XoopsUser::getUnameFromId($uid,0):$uid_name;

		$post_date=substr($start_day,0,10);
		$today_pic=($now==$post_date)?"<img src='".XOOPS_URL."/modules/tadnews/images/today.gif' alt='"._MB_TADNEW_TODAY_NEWS."' title='"._MB_TADNEW_TODAY_NEWS."' hspace=3 align='absmiddle'>":"";

		$always_top_pic=($always_top=='1')?"<img src='".XOOPS_URL."/modules/tadnews/images/top.gif' alt='"._MB_TADNEW_ALWAYS_TOP."' title='"._MB_TADNEW_ALWAYS_TOP."' hspace=3 align='absmiddle'>":$today_pic;

      $prefix_tag=mk_prefix_tag($prefix_tag);
			$page[$i]['style']=($i%2)?"odd":"even";
			$page[$i]['ncsn']=$ncsn;
			$page[$i]['cate_name']=$cates[$ncsn];
			$page[$i]['prefix_tag']=$prefix_tag;
			$page[$i]['index']=$index[$ncsn];
			$page[$i]['nsn']=$nsn;
			$page[$i]['news_title']=$news_title;
			$page[$i]['counter']=$counter;
			$page[$i]['need_sign']=$need_sign;
			
			
			$i++;
	}
	$block['page']=$page;
	$block['col1']=_MB_TADNEW_NEWS_CATE;
	$block['col2']=_MB_TADNEW_NEWS_TITLE;
	$block['col3']=_MB_TADNEW_COUNTER;
	
	return $block;
}

//�϶��s��禡
function tadnews_my_page_edit($options){

	$form="
	<b>"._MB_TADNEW_TADNEWS_MY_PAGE."</b><br>
	<textarea  name='options[0]' cols=30 rows=6>{$options[0]}</textarea>
	";
	return $form;
}


if(!function_exists("block_chk_cate_power")){
	//�P�_���大���ݤ����O�_���\�ӥΤᤧ���ݸs���[��
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
	//�H�y�������o�Y��tad_news_cate���
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
	//�s��u��
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

		//���O���H�κ��޴N���q�X�u��
		if($uid!=$uuid and !$isAdmin)return "";


		$fun="<div>
		<a href='".XOOPS_URL."/modules/tadnews/post.php'>"._MB_TADNEW_ADD."</a> |
		<a href='".XOOPS_URL."/modules/tadnews/post.php?op=tad_news_form&nsn=$nsn'>"._MB_TADNEW_EDIT."</a> |
		<a href=\"javascript:delete_tad_news_func($nsn);\">"._MB_TADNEW_DEL."</a> |
		"._MB_TADNEW_HOT."{$counter}
		</div>";
		return $fun;
	}
}




if(!function_exists("chk_always_top")){
	//���o����
	function chk_always_top(){
		global $xoopsDB,$xoopsUser;
    $now=date("Y-m-d H:i:s" , xoops_getUserTimestamp(time()));
		$sql="update ".$xoopsDB->prefix("tad_news")." set always_top='0' WHERE always_top_date <='{$now}' and always_top_date!='0000-00-00 00:00:00'";
		$xoopsDB->queryF($sql);
	}
}
?>
