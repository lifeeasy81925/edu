<?php

//列出所有tad_news資料（$kind="news","page"）
function list_tad_news($the_ncsn="0",$kind="news",$show_uid=""){
	global $xoopsDB,$xoopsModule,$xoopsUser,$xoopsOption,$xoopsModuleConfig;

	$xoopsOption['template_main'] = "list_tpl.html";

	$tadnews=new tadnews();
	if(!empty($show_uid)){
	 $tadnews->set_view_uid($show_uid);
	}
	$tadnews->set_news_kind($kind);
	$tadnews->set_show_mode("list");
	$tadnews->set_admin_tool(true);
	$tadnews->set_show_num($xoopsModuleConfig['show_num']);
	$tadnews->set_show_enable(0);
	$tadnews->set_news_cate_select(1);
	$tadnews->set_news_author_select(1);
	$tadnews->set_news_check_mode(1);

	if(!empty($the_ncsn)){
		$tadnews->set_view_ncsn($the_ncsn);
    if($kind=="page"){
		  $tadnews->set_sort_tool(1);
		}
	}
	$data=$tadnews->get_news();

	return $data;
}


//列出所有tad_news_cate資料
function list_tad_news_cate($of_ncsn=0,$level=0,$not_news='0'){
	global $xoopsDB,$xoopsModule;
	$old_level=$level;
	$left=$level*18+4;
	$level++;


	$sql = "select * from ".$xoopsDB->prefix("tad_news_cate")." where not_news='{$not_news}' and of_ncsn='{$of_ncsn}' order by sort";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());


	$data="";


	while(list($ncsn,$of_ncsn,$nc_title,$enable_group,$enable_post_group,$sort,$cate_pic,$not_news)=$xoopsDB->fetchRow($result)){

	  $sql2 = "select count(*) from ".$xoopsDB->prefix("tad_news")." where ncsn='{$ncsn}'";
		$result2 = $xoopsDB->query($sql2);
		list($counter)=$xoopsDB->fetchRow($result2);

    $pic=(empty($cate_pic))?"../images/no_cover.png":_TADNEWS_CATE_URL."/{$cate_pic}";
		$g_txt=txt_to_group_name($enable_group,_MA_TADNEW_ALL_OK);
		$gp_txt=txt_to_group_name($enable_post_group,_MA_TADNEW_ONLY_ROOT);
		
		$new_kind=($not_news=='1')?0:1;
		$change_text=($not_news=='1')?_MA_TADNEW_CHANGE_TO_NEWS:_MA_TADNEW_CHANGE_TO_PAGE;

		$data.="<tr>
		<td style='padding-left: {$left}px;' nowrap>
		<img src='{$pic}' width=50 align=left hspace=4 alt='{$nc_title}' title='{$nc_title}' style='margin:0px 4px;'>
		<b>({$sort}) {$nc_title}</b>
    <p style='margin:4px 0px;'><a href='".XOOPS_URL."/modules/tadnews/index.php?ncsn=$ncsn' style='color:#669900;font-weight:normal;'>"._MA_TADNEW_CATE_COUNTER."{$counter}</a></p></td>
		<td>{$g_txt}</td>
		<td>{$gp_txt}</td>
		<td nowrap>
		<a href='{$_SERVER['PHP_SELF']}?ncsn=$ncsn'>"._MA_TADNEW_EDIT."</a> |
		<a href=\"javascript:delete_tad_news_cate_func($ncsn);\">"._MA_TADNEW_DEL."</a><br />
		<a href='{$_SERVER['PHP_SELF']}?op=move&ncsn=$ncsn'>"._MA_TADNEW_MOVE."</a><br />
		<a href='cate.php?op=change_kind&not_news=$new_kind&ncsn=$ncsn'>$change_text</a>
		</td></tr>";
		$data.=list_tad_news_cate($ncsn,$level,$not_news);
	}
	
	
	if($old_level==0){
		$main_data="
		<script>
		function delete_tad_news_cate_func(ncsn){
			var sure = window.confirm('"._MD_TADNEW_SURE_DEL."');
			if (!sure)	return;
			location.href=\"{$_SERVER['PHP_SELF']}?op=delete_tad_news_cate&ncsn=\" + ncsn;
		}
		</script>
		<table id='tbl' style='width:100%;'>
		<tr>
		<th>"._MA_TADNEW_CATE_SORT."/"._MA_TADNEW_CATE_TITLE."</th>
		<th>"._MA_TADNEW_CAN_READ_CATE_GROUP_S."</th>
		<th>"._MA_TADNEW_CAN_POST_CATE_GROUP_S."</th>
		<th>"._MA_TADNEW_FUNCTION."</th></tr>
		<tbody>
		$data
		</tbody>
		</table>";
	}else{
    $main_data=$data;
	}

	return $main_data;
}

//縮圖上傳
function mk_thumb($ncsn="",$col_name="",$width=100){
	global $xoopsDB;
	include XOOPS_ROOT_PATH."/modules/tadtools/upload/class.upload.php";

	if(file_exists(_TADNEWS_CATE_DIR."/{$ncsn}.png")){
		unlink(_TADNEWS_CATE_DIR."/{$ncsn}.png");
	}

  $handle = new upload($_FILES[$col_name]);
  if ($handle->uploaded) {
      $handle->file_new_name_body   = $ncsn;
      $handle->image_convert = 'png';
      $handle->image_resize         = true;
      $handle->image_x              = $width;
      $handle->image_ratio_y        = true;
      $handle->file_overwrite 			= true;
      $handle->process(_TADNEWS_CATE_DIR);
      $handle->auto_create_dir = true;
      if ($handle->processed) {
          $handle->clean();
          $sql = "update ".$xoopsDB->prefix("tad_news_cate")." set  cate_pic = '{$ncsn}.png' where ncsn='$ncsn'";
					$xoopsDB->queryF($sql);
          return true;
      }
  }
  return false;
}


//新增資料到tad_news_cate中
function insert_tad_news_cate(){
	global $xoopsDB,$xoopsModuleConfig;
	if(empty($_POST['enable_group']) or in_array("",$_POST['enable_group'])){
    $enable_group="";
	}else{
		$enable_group=implode(",",$_POST['enable_group']);
	}
	$enable_post_group=implode(",",$_POST['enable_post_group']);
	
	foreach($_POST['setup'] as $key=>$val){
		$setup.="{$key}=$val;";
	}
	$setup=substr($setup,0,-1);

  $myts =& MyTextSanitizer::getInstance();
  $nc_title=$myts->addSlashes($_POST['nc_title']);
	
	
	$sql = "insert into ".$xoopsDB->prefix("tad_news_cate")." (of_ncsn,nc_title,enable_group,enable_post_group,sort,not_news,setup) values('{$_POST['of_ncsn']}','{$nc_title}','{$enable_group}','{$enable_post_group}','{$_POST['sort']}','{$_POST['not_news']}','{$setup}')";
	$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, _MA_TADNEW_DB_ADD_ERROR1);
	//取得最後新增資料的流水編號
	$ncsn=$xoopsDB->getInsertId();

	if(!empty($_FILES['cate_pic'])){
    mk_thumb($ncsn,"cate_pic",$xoopsModuleConfig['cate_pic_width']);
	}

	return $ncsn;
}


//更新tad_news_cate某一筆資料
function update_tad_news_cate($ncsn=""){
	global $xoopsDB,$xoopsModuleConfig;
	if(empty($_POST['enable_group']) or in_array("",$_POST['enable_group'])){
    $enable_group="";
	}else{
		$enable_group=implode(",",$_POST['enable_group']);
	}
	$enable_post_group=implode(",",$_POST['enable_post_group']);
	
	foreach($_POST['setup'] as $key=>$val){
		$setup.="{$key}=$val;";
	}
	$setup=substr($setup,0,-1);
	
	$sql = "update ".$xoopsDB->prefix("tad_news_cate")." set  of_ncsn = '{$_POST['of_ncsn']}', nc_title = '{$_POST['nc_title']}', enable_group = '{$enable_group}', enable_post_group = '{$enable_post_group}', sort = '{$_POST['sort']}',not_news='{$_POST['not_news']}',setup='{$setup}' where ncsn='$ncsn'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, _MA_TADNEW_DB_UPDATE_ERROR1."<br>$sql");

	if(!empty($_FILES['cate_pic']['name'])){
    mk_thumb($ncsn,"cate_pic",$xoopsModuleConfig['cate_pic_width']);
	}

	return $ncsn;
}



//刪除tad_news_cate某筆資料資料
function delete_tad_news_cate($ncsn=""){
	global $xoopsDB;
	
	$cate_org=get_tad_news_cate($ncsn);

	//先找看看底下有無分類，若有將其父分類變成原分類之父分類
	$sql = "update ".$xoopsDB->prefix("tad_news_cate")."  set  of_ncsn = '{$cate_org['of_ncsn']}' where of_ncsn='$ncsn'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, _MA_TADNEW_DB_DEL_ERROR1."<br>$sql");


	$sql = "delete from ".$xoopsDB->prefix("tad_news_cate")." where ncsn='$ncsn'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, _MA_TADNEW_DB_DEL_ERROR1);
}


//搬移
function news_move($ncsn="",$kind=""){
	global $xoopsDB;
  $sql = "select nc_title from ".$xoopsDB->prefix("tad_news_cate")." where ncsn='{$ncsn}'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()."<br>$sql");
	list($nc_title)=$xoopsDB->fetchRow($result);


	$cate_select=get_tad_news_cate_option(0,0,0,$ncsn,"1");
  $form=sprintf(_MA_TADNEW_MOVE_TO_WHERE,$nc_title)."
	<form action='{$_SERVER['PHP_SELF']}' method='post' id='myForm'>
	<select name='to_ncsn' size=1>
		$cate_select
	</select>
	<input type='hidden' name='ncsn' value='{$ncsn}'>
	<input type='hidden' name='op' value='move_to'>
	<input type='submit' value='"._MA_TADNEW_MOVE_TO."'>
	</form>";
	$main=div_3d(_MA_TADNEW_MOVE,$form,"corners");
	return $main;
}


//搬移文章
function move_to_cate($ncsn="",$to_ncsn=""){
	global $xoopsDB;

  $sql = "update ".$xoopsDB->prefix("tad_news")." set ncsn='{$to_ncsn}' where ncsn='{$ncsn}'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()."<br>$sql");
  return;
}

//批次移動
function move_news($nsn_arr=array(),$ncsn=""){
	global $xoopsDB;
	if(empty($nsn_arr) or !is_array($nsn_arr))return;

  foreach($nsn_arr as $nsn){
    $sql = "update ".$xoopsDB->prefix("tad_news")." set ncsn='{$ncsn}' where nsn='{$nsn}'";
  	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()."<br>$sql");
	}
  return;
}

//批次刪除
function del_news($nsn_arr=array()){
	global $xoopsDB;
	if(empty($nsn_arr) or !is_array($nsn_arr))return;

  foreach($nsn_arr as $nsn){
    $sql = "delete from ".$xoopsDB->prefix("tad_news")." where nsn='{$nsn}'";
  	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()."<br>$sql");
	}
  return;
}
?>
