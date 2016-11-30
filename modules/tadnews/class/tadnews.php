<?php
//TadNews物件
class tadnews{
	var $kind="news";
	var $now;
	var $today;
	var $view_ncsn;
	var $view_uid;
	var $show_mode="summary"; //summary,list,cate
	var $show_num="10";
	var $admin_tool=false;
	var $show_enable=1;
	var $show_cate_select=0;
	var $show_author_select=0;
	var $news_check_mode=0;
	var $batch_tool="";
	var $sort_tool=0;

	//建構函數
	function tadnews(){
		$this->now=date("Y-m-d",xoops_getUserTimestamp(time()));
		$this->today=date("Y-m-d H:i:s",xoops_getUserTimestamp(time()));
	}

	//設定種類
	function set_news_kind($new_kind="news"){
		$this->kind=$new_kind;
	}
	
	//設定是否開啟選擇模式
	function set_news_check_mode($mode="0"){
		$this->news_check_mode=$mode;
		$this->batch_tool=$this->batch_tool();
	}
	

	//設定是否開啟選擇模式
	function set_sort_tool($mode="0"){
		$this->sort_tool=$mode;
	}

	//設定是否秀出草稿
	function set_show_enable($enable="1"){
		$this->show_enable=$enable;
	}

	//設定欲觀看分類
	function set_view_ncsn($ncsn=""){
	  global $xoopsDB;
		$this->view_ncsn=$ncsn;
		$sql="select not_news from ".$xoopsDB->prefix("tad_news_cate")." where ncsn='{$ncsn}'";
		$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
		list($not_news)=$xoopsDB->fetchRow($result);
		if($not_news==1){
			$this->set_news_kind("page");
		}
	}

	//設定欲觀看作者
	function set_view_uid($uid=""){
		$this->view_uid = $uid;
	}
	
	//設定顯示方式，summary,list,cate
	function set_show_mode($show_mode="summary"){
		$this->show_mode=$show_mode;
	}

	//設定顯示資料數
	function set_show_num($show_num="10"){
	  if($this->show_mode=="list"){
      $show_num*=2;
		}elseif($this->show_mode=="cate"){
      $show_num=round($show_num/2,0);
		}
		$this->show_num=$show_num;
	}

	//設定管理工具
	function set_admin_tool($admin_tool=false){
		$this->admin_tool=$admin_tool;
	}

  //設定是否列出分類篩選工具
	function set_news_cate_select($show='0'){
    $this->show_cate_select=$show;
  }

  //設定是否列出作者篩選工具
	function set_news_author_select($show='0'){
    $this->show_author_select=$show;
  }


	//置頂圖示
	function get_news_pic($always_top="",$post_date=""){
		$always_top_pic=($always_top=='1')?"<img src='".XOOPS_URL."/modules/tadnews/images/top.gif' alt='"._MB_TADNEW_ALWAYS_TOP."' title='"._MB_TADNEW_ALWAYS_TOP."' hspace=3 align='absmiddle'>":$this->get_today_pic($post_date);
		return $always_top_pic;
	}


	//今日文章
	function get_today_pic($post_date=""){
		$today_pic=($this->now==$post_date)?"<img src='".XOOPS_URL."/modules/tadnews/images/today.gif' alt='"._MB_TADNEW_TODAY_NEWS."' title='"._MB_TADNEW_TODAY_NEWS."' hspace=3 align='absmiddle'>":"";
		return $today_pic;
	}

	//取得新聞
	function get_news(){
	  global $xoopsDB,$xoopsUser,$xoopsModuleConfig,$isAdmin;

    $summary_lengths=$xoopsModuleConfig['summary_lengths'];
      
	  //取得目前使用者的所屬群組
		if($xoopsUser){
			$User_Groups=$xoopsUser->getGroups();
			$now_uid=$xoopsUser->uid();
		}else{
			$User_Groups=array();
			$now_uid=0;
		}

		//分析目前觀看得是新聞還是自訂頁面
	  $kind_chk=($this->kind=="news")?"not_news!='1'":"not_news='1'";

	  //找出所有分類
    $sql="select ncsn,nc_title,enable_group,enable_post_group,cate_pic from ".$xoopsDB->prefix("tad_news_cate")." where $kind_chk order by sort";


		$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],10, mysql_error()."<br>$sql");

		$cates_enable_post_group[]="";

		//假如是要秀出類別新聞
		if($this->show_mode=="cate"){
		  $all_news="<table id='tbl' style='width:100%'>";
			while(list($ncsn,$nc_title,$enable_group,$enable_post_group,$cate_pic)=$xoopsDB->fetchRow($result)){
				//判斷本文及所屬分類是否允許該用戶之所屬群組觀看
				$cate_read_poewr=$this->chk_cate_power($ncsn,$User_Groups,$cates_enable_post_group[$ncsn],"read");
				$news_read_poewr=$this->chk_news_power($enable_group,$User_Groups);
				if(!$cate_read_poewr or !$news_read_poewr){
					continue;
				}
				
				$pic=(empty($cate_pic))?XOOPS_URL."/modules/tadnews/images/no_cover.png":XOOPS_URL."/uploads/tadnews/cate/{$cate_pic}";

		    $all_news.="<tr><td style='vertical-align:top;width:130px;'><img src='{$pic}' align=left hspace=4 alt='{$nc_title}' title='{$nc_title}' class='cate_thumb' onClick='window.location.href=\"".XOOPS_URL."/modules/tadnews/index.php?ncsn={$ncsn}\"'></td>
				<td colspan=2 style='vertical-align:top;'><a href='".XOOPS_URL."/modules/tadnews/index.php?ncsn=$ncsn'><img src='".XOOPS_URL."/modules/tadnews/images/icon_more.gif' alt='more' title='more' align=right></a><div class='cate_title'><a href='".XOOPS_URL."/modules/tadnews/index.php?ncsn=$ncsn'>{$nc_title}</a></div>
				<table style='width:100%'>";

				$sql2 = "select nsn,news_title,news_content,start_day,end_day,enable,uid,passwd,enable_group,counter,prefix_tag,always_top,have_read_group from ".$xoopsDB->prefix("tad_news")." where ncsn='{$ncsn}' $show_enable and start_day < '{$this->today}' and (end_day > '{$this->today}' or end_day='0000-00-00 00:00:00') order by always_top desc , start_day desc limit 0,{$this->show_num}";
				$result2 = $xoopsDB->query($sql2) or redirect_header($_SERVER['PHP_SELF'],3, $sql2);
				while(list($nsn,$news_title,$news_content,$start_day,$end_day,$enable,$uid,$passwd,$enable_group,$counter,$prefix_tag,$always_top,$have_read_group)=$xoopsDB->fetchRow($result2)){


          if(!$isAdmin and $uid!=$now_uid and $enable=='0'){
            continue;
          }

    			if(!empty($summary_lengths)){
            $news_content=strip_tags($news_content);
            //支援xlanguage
            if(function_exists('xlanguage_ml')){
              $news_content=xlanguage_ml($news_content);
            }
            $content="<div class='news_summary'>".xoops_substr($news_content , 0 , $summary_lengths , "...")."</div>";
    			}else{
            $content="";
          }
          
          $need_sign=(!empty($have_read_group))?"<img src='".XOOPS_URL."/modules/tadnews/images/sign_s.png' align='absmiddle' hspace='3' alt='{$news_title}'>":"";

			    $enable_txt=($enable==1)?"":"["._MA_TADNEW_NEWS_UNABLE."]";
					$end_day=($end_day=="0000-00-00 00:00:00")?"":"~ ".$end_day;

          $uid_name=XoopsUser::getUnameFromId($uid,1);
          $uid_name=(empty($uid_name))?XoopsUser::getUnameFromId($uid,0):$uid_name;

					$news_title=(empty($news_title))?_MD_TADNEWS_NO_TITLE:$news_title;
					$post_date=substr($start_day,0,10);
					$today_pic=($now==$post_date)?"<img src='".XOOPS_URL."/modules/tadnews/images/today.gif' alt='"._MB_TADNEW_TODAY_NEWS."' title='"._MB_TADNEW_TODAY_NEWS."' hspace=3 align='absmiddle'>":"";
					$always_top_pic=($always_top=='1')?"<img src='".XOOPS_URL."/modules/tadnews/images/top.gif' alt='"._MB_TADNEW_ALWAYS_TOP."' title='"._MB_TADNEW_ALWAYS_TOP."' hspace=3 align='absmiddle'>":$today_pic;
          $link_page=($this->kind=='page')?"page.php":"index.php";
          $prefix_tag=mk_prefix_tag($prefix_tag);
			  	$all_news.="<tr>
          <td style='width:80px;' class='noline'>$post_date</td>
          <td class='noline'>{$prefix_tag}{$need_sign}{$enable_txt}{$always_top_pic} <a href='".XOOPS_URL."/modules/tadnews/{$link_page}?nsn={$nsn}'>{$news_title}</a>{$content}</td>
          </tr>";

				}
				$all_news.="</table>
				</td></tr>";
			}
    	$all_news.="</table>";
			$data=$all_news;
		}else{
			while(list($ncsn,$nc_title,$enable_group,$enable_post_group,$cate_pic)=$xoopsDB->fetchRow($result)){
			  //只有可讀的分類才納入
				$cate_read_poewr=$this->chk_cate_power($ncsn,$User_Groups,$enable_group,"read");
				if($cate_read_poewr){
					$ncsn_ok[]=$ncsn; //權限內可觀看群組
					$cates[$ncsn]=$nc_title;
					$cates_enable_post_group[$ncsn]=$enable_post_group;
					$cates_enable_group[$ncsn]=$enable_group;
					$cates_pic[$ncsn]=$cate_pic;
				}

			}


			$ok_cate=implode(",",$ncsn_ok);

			//假如沒有指定觀看分類
			if(is_null($this->view_ncsn)){
			  if($this->kind=="page"){
					$where_cate=(empty($ok_cate))?"and 0":"and ncsn in($ok_cate)";
				}else{
          $where_cate=(empty($ok_cate))?"and ncsn='0'":"and (ncsn in($ok_cate) or ncsn='0')";
				}

			}else{
        //找出底下的子分類
        $sql2 = "select ncsn from ".$xoopsDB->prefix("tad_news_cate")." where of_ncsn='".$this->view_ncsn."'";
      	$result2 = $xoopsDB->query($sql2) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
      	$ncsn_arr[]=$this->view_ncsn;
      	while(list($sub_ncsn)=$xoopsDB->fetchRow($result2)){
          $ncsn_arr[]=$sub_ncsn;
        }
        ;
	      $where_cate="and ncsn in(".implode(',',$ncsn_arr).")";
			}

			//假如沒有指定觀看作者
			if(!empty($this->view_uid)){
				$where_uid="and uid='{$this->view_uid}'";
			}else{
	      $where_uid="";
			}
			

			$desc=($this->kind=="page")?"order by page_sort":"order by always_top desc , start_day desc";

			//判斷是否要檢查日期
			$date_chk=($this->admin_tool)?"":"and start_day < '".$this->today."' and (end_day > '".$this->today."' or end_day='0000-00-00 00:00:00') ";


			$sql = "select * from ".$xoopsDB->prefix("tad_news")." where 1 $show_enable $where_uid $where_cate  $date_chk  $desc";

			//getPageBar($原sql語法, 每頁顯示幾筆資料, 最多顯示幾個頁數選項);
			$PageBar=getPageBar($sql,$this->show_num);
			$bar=$PageBar['bar'];
			$sql=$PageBar['sql'];

			$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());


      //分類篩選工具
      if($this->show_cate_select){
        $not_news=($this->kind=="news")?0:1;
        $cate_select=$this->news_cate_select($not_news);
      }else{
        $cate_select="";
      }

      //作者篩選工具
      if($this->show_author_select){
        $author_select=$this->news_author_select();
      }else{
        $author_select="";
      }
			$all_news="";
			while($news=$xoopsDB->fetchArray($result)){

				foreach($news as $k=>$v){
					$$k=$v;
				}


        if(!$isAdmin and $uid!=$now_uid and $enable=='0'){
          continue;
        }

				//判斷本文及所屬分類是否允許該用戶之所屬群組觀看
				$news_read_poewr=$this->chk_news_power($enable_group,$User_Groups);
				if(!$news_read_poewr){
					continue;
				}

				//新聞資訊列
				$fun=$this->admin_tool($uid,$nsn,$counter);
				$end_day=($end_day=="0000-00-00 00:00:00")?"":"~ ".$end_day;
				$enable_txt=($enable==1)?"":"["._MA_TADNEW_NEWS_UNABLE."]";

				//製作新聞標題內容，及密碼判斷
				$have_pass=(isset($_SESSION['have_pass']))?$_SESSION['have_pass']:array();
				if(!empty($passwd) and !in_array($nsn,$have_pass)){
					$news_content="<form action='{$_SERVER['PHP_SELF']}' method='post'><img src='images/lock.png' align='absmiddle' hspace=4 alt='lock.png'>"._MD_TADNEW_NEWS_NEED_PASSWD."
					<input type='hidden' name='nsn' value='{$nsn}'>
					<input type='password' name='tadnews_passwd'>
					<input type='submit'>
					</form>";
				}else{
					//$files=show_files("nsn",$nsn,true);
					//$news_content.=$files;

					if(eregi(_SEPARTE2,$news_content)){
            //支援xlanguage
            if(function_exists('xlanguage_ml')){
              $news_content=xlanguage_ml($news_content);
            }
					  $news_content=str_replace("<p>"._SEPARTE2."</p>",_SEPARTE2,$news_content);
			      $content=explode(_SEPARTE2,$news_content);
					}else{
						$content=explode(_SEPARTE,$news_content);
					}

					$more=(empty($content[1]))?"":"<p><a href='".XOOPS_URL."/modules/tadnews/index.php?nsn={$nsn}'>"._MD_TADNEW_MORE."...</a></p>";
					$news_content=$content[0].$more;
				}

        $uid_name=XoopsUser::getUnameFromId($uid,1);
        $uid_name=(empty($uid_name))?XoopsUser::getUnameFromId($uid,0):$uid_name;

				$news_title=(empty($news_title))?_MD_TADNEWS_NO_TITLE:$news_title;
				$cate_name=(empty($cates[$ncsn]))?_MD_TADNEWS_NO_CATE:$cates[$ncsn];

				$post_date=substr($start_day,0,10);
				$today_pic=$this->get_news_pic($always_top,$start_day);

				if($this->show_mode=="list"){
          $need_sign=(!empty($have_read_group))?"<img src='".XOOPS_URL."/modules/tadnews/images/sign_s.png' align='absmiddle' hspace='3' alt='{$news_title}'>":"";
				  $g_txt=$this->txt_to_group_name($enable_group,_MA_TADNEW_ALL_OK);

				  $show_admin_tool=($this->admin_tool)?"<td nowrap>$passwd</td><td nowrap>$g_txt</td><td nowrap><a href='post.php?op=tad_news_form&nsn=$nsn'>"._MA_TADNEW_EDIT."</a>
			<a href=\"javascript:delete_tad_news_func($nsn);\">"._MA_TADNEW_DEL."</a></td>":"";

          $link_page=($this->kind=='page')?"page.php":"index.php";
          
          $chkbox=($this->news_check_mode)?"<input type='checkbox' name='nsn_arr[]' value='$nsn'> ":"";


    			if(!empty($summary_lengths)){
            $news_content=strip_tags($news_content);
            //支援xlanguage
            if(function_exists('xlanguage_ml')){
              $news_content=xlanguage_ml($news_content);
            }
            $content="<div class='news_summary'>".xoops_substr($news_content , 0 , $summary_lengths , "...")."</div>";
    			}else{
            $content="";
          }

          $prefix_tag=mk_prefix_tag($prefix_tag);

		      $all_news.="<tr id='tr_{$nsn}'>
          <td nowrap style='text-align:right;'>{$chkbox}<a href='index.php?ncsn={$ncsn}' style='font-size:12px;'>{$cate_name}</a>
          <div style='font-size:10px;'>$post_date</div></td>
          <td>{$prefix_tag}{$need_sign}{$enable_txt}{$today_pic} <a href='".XOOPS_URL."/modules/tadnews/{$link_page}?nsn={$nsn}'>{$news_title}</a><span style='color:gray;font-size:12px;'> (<a href='index.php?show_uid={$uid}'>$uid_name</a> / $counter)</span> {$content}</td>
          $show_admin_tool</tr>";

				}else{
          $all_news.=news_format($nsn,$news_title,$news_content,$fun,"",$always_top_pic.$prefix_tag,$uid,$ncsn,$cate_name,"{$start_day} {$end_day}",$files,$have_read_group);
				}
			}

			if(empty($all_news)){
			  $cate_post_power=$this->chk_cate_power($ncsn,$User_Groups,"post");
			  $no_news=(empty($cate_post_power))?_MD_TADNEW_NO_NEWS:"<input type=\"button\" value=\""._MD_TADNEW_ADD_FIRST."\" onClick=\"window.location.href='post.php'\">";

			$all_news="
				<div class=\"tadnews_inset\">
				<b class=\"b1\"></b><b class=\"b2\"></b><b class=\"b3\"></b><b class=\"b4\"></b>
				<div class=\"boxcontent\">
					<div style=\"text-align:center\">$no_news</div>
				</div>
				<b class=\"b4b\"></b><b class=\"b3b\"></b><b class=\"b2b\"></b><b class=\"b1b\"></b>
				</div>"
				;
			}elseif($this->show_mode=="list"){
			  $show_admin_tool_title=($this->admin_tool)?"<th nowrap>"._MA_TADNEW_NEWS_PASSWD."</th><th nowrap>"._MA_TADNEW_CAN_READ_NEWS_GROUP."</th><th nowrap>"._MA_TADNEW_FUNCTION."</th>":"";

        //排序工具
        if($this->sort_tool){
          $jquery=get_jquery(true);
          $sort_tool="$jquery
          <script language='JavaScript'>
          $().ready(function(){
              $(function() {
                  $('#sort').sortable({ opacity: 0.6, cursor: 'move', update: function() {
                      var order = $(this).sortable('serialize') + '&action=updateRecordsListings';
                      $.post('save_sort.php', order, function(theResponse){
                          $('#tadnews_save_msg').html(theResponse);
                      });
                  }
                  });
            });
          });
        </script>";
        }else{
          $sort_tool="";
        }

			  
			  $all_news="
			  $sort_tool
			  <div id='tadnews_save_msg'></div>
			  <form action='{$_SERVER['PHP_SELF']}' method='post'>
        <table id='tbl' style='width:100%' class='dot'>
        <tr>
        <th nowrap>"._MA_TADNEW_NEWS_CATE."</th>
        <th nowrap>"._MA_TADNEW_NEWS_TITLE."</th>
        $show_admin_tool_title
        </tr>
        <tbody id='sort'>
        $all_news
        </tbody>
        </table>
        {$this->batch_tool}
        </form>";
			  
		    $all_news=div_3d("",$all_news,"corners","width:100%");
			}

			$del_js=del_js();

			$data="
			$del_js
			$cate_select
			$author_select
			$all_news
			<div class='bar' align='center'>{$bar}</div>";
		}
		return $data;

	}




	//取得分類新聞
	function get_cate_news($show_ncsn=0,$the_level=0){
	  global $xoopsDB;

	  //取得目前使用者的所屬群組
		if($xoopsUser){
			$User_Groups=$xoopsUser->getGroups();
		}else{
			$User_Groups=array();
		}

    $sql="select ncsn,nc_title,enable_group,enable_post_group,cate_pic from ".$xoopsDB->prefix("tad_news_cate")." where not_news!='1' and of_ncsn='{$show_ncsn}' order by sort";
		$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

		$all_news=($level > 0)?"":"
		<!--TadNews Start-->
		<table id='tbl' style='width:96%'>";

		$pic_w=$xoopsModuleConfig['cate_pic_width']+10;

		while(list($ncsn,$nc_title,$enable_group,$enable_post_group,$cate_pic)=$xoopsDB->fetchRow($result)){
			//判斷所屬分類是否允許該用戶之所屬群組觀看
			$cate_read_poewr=$this->chk_cate_power($ncsn,$User_Groups,$cates_enable_post_group[$ncsn],"read");
			if(!$cate_read_poewr){
				continue;
			}
			$pic=(empty($cate_pic))?"images/no_cover.png":_TADNEWS_CATE_URL."/{$cate_pic}";
			
			
			
			$all_news.="<tr><td style='vertical-align:top;width:{$pic_w}px;'><img src='{$pic}' align=left hspace=4 alt='{$nc_title}' title='{$nc_title}' class='cate_thumb'></td><td colspan=2><a href='index.php?ncsn=$ncsn'><img src='images/icon_more.gif' alt='more' title='more' align=right></a><div class='cate_title'><a href='index.php?ncsn=$ncsn'>{$nc_title}</a></div>
		<table style='width:100%'>";


			$sql2 = "select * from ".$xoopsDB->prefix("tad_news")." where ncsn='{$ncsn}' $show_enable and start_day < '".$this->today."' and (end_day > '".$this->today."' or end_day='0000-00-00 00:00:00') order by always_top desc , start_day desc limit 0,".$this->show_num;
			$result2 = $xoopsDB->query($sql2) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
			while($news=$xoopsDB->fetchArray($result2)){

				foreach($news as $k=>$v){
					$$k=$v;
				}
				$news_read_poewr=$this->chk_news_power($enable_group,$User_Groups);
				if(!$news_read_poewr){
					continue;
				}

				$news_title=(empty($news_title))?_MD_TADNEWS_NO_TITLE:$news_title;
				$post_date=substr($start_day,0,10);
				$today_pic=$this->get_news_pic($always_top,$post_date);
        $prefix_tag=mk_prefix_tag($prefix_tag);
  
		  	$all_news.="<tr><td style='width:80px;' class='noline'>$post_date</td><td class='noline'>{$always_top_pic}{$prefix_tag} <a href='".XOOPS_URL."/modules/tadnews/index.php?nsn={$nsn}'>{$news_title}</a></td></tr>";

			}
			$all_news.="</table>
			</td></tr>";

			$level++;
			$all_news.=$this->get_cate_news($ncsn,$level);
		}
		$all_news.=($the_level > 0)?"":"</table>
		<!--TadNews End-->";

		return $all_news;
	}

	//判斷本文之所屬分類是否允許該用戶之所屬群組觀看或發佈
	function chk_cate_power($ncsn="",$User_Groups="",$enable_group="",$kind="read"){
		global $xoopsDB,$xoopsUser;

		if(!empty($enable_group)){
			$ok=false;
			$cate_enable_group=explode(",",$enable_group);
			if(in_array("",$cate_enable_group)){
	      return true;
			}

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

	//判斷本文是否允許該用戶之所屬群組觀看或發佈
	function chk_news_power($enable_group="",$User_Groups=""){
		global $xoopsDB,$xoopsUser;

		if(empty($enable_group))return true;

		$news_enable_group=explode(",",$enable_group);
		foreach($User_Groups as $gid){
			if(in_array($gid,$news_enable_group)){
				return true;
			}
		}

		return false;
	}


	//新聞編輯工具
	function admin_tool($uid,$nsn,$counter=""){
		global $xoopsUser,$xoopsModuleConfig,$xoopsModule;
		if($xoopsUser){
			$uuid=$xoopsUser->getVar('uid');
			$module_id = $xoopsModule->getVar('mid');
      $isAdmin=$xoopsUser->isAdmin($module_id);
		}else{
			$uuid=$isAdmin="";
		}


		$admin_fun=($uid==$uuid or $isAdmin)?"
		<a href='post.php'>"._MD_TADNEW_ADD."</a> |
		<a href='post.php?op=tad_news_form&nsn=$nsn'>"._MD_TADNEW_EDIT."</a> |
		<a href=\"javascript:delete_tad_news_func($nsn);\">"._MD_TADNEW_DEL."</a> |":"";


		$bbcode=($xoopsModuleConfig['show_bbcode']=='1')?"<a href='".XOOPS_URL."/modules/tadnews/index.php?nsn={$nsn}&bb=1'>BBCode</a> |":"";

		$fun="<div>
		$admin_fun
		$bbcode
		"._MD_TADNEW_HOT."{$counter}
		</div>";

		return $fun;
	}



	//刪除的js
	function del_js(){
		$js="<script>
		function delete_tad_news_func(nsn){
			var sure = window.confirm('"._MD_TADNEW_SURE_DEL."');
			if (!sure)	return;
			location.href=\"{$_SERVER['PHP_SELF']}?op=delete_tad_news&nsn=\" + nsn;
		}
		</script>";
		return $js;
	}

  //把字串換成群組
	function txt_to_group_name($enable_group="",$default_txt="",$syb="<br />"){
		$groups_array=$this->get_all_groups();
		if(empty($enable_group)){
	    $g_txt=$default_txt;
		}else{
		  $gs=explode(",",$enable_group);
		  $g_txt="";
		  foreach($gs as $gid){
	    	$g_txt.=$groups_array[$gid]."{$syb}";
			}
		}
		return $g_txt;
	}

  //取得所有群組
	function get_all_groups(){
		global $xoopsDB;
		$sql = "select groupid,name from ".$xoopsDB->prefix("groups")."";
		$result = $xoopsDB->query($sql);
		while(list($groupid,$name)=$xoopsDB->fetchRow($result)){
			$data[$groupid]=$name;
		}
		return $data;
	}


  //列出所有作者
	function news_author_select(){
	  global $xoopsDB;
		$sql="select uid from ".$xoopsDB->prefix("tad_news")." group by uid";
		$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
		$opt=_MA_TADNEW_SHOW_AUTHOR_NEWS."
  	<select onChange=\"window.location.href='{$_SERVER['PHP_SELF']}?show_uid='+this.value\">
    <option value=''></option>";
		while(list($uid)=$xoopsDB->fetchRow($result)){
      $uid_name=XoopsUser::getUnameFromId($uid,1);
      $uid_name=(empty($uid_name))?XoopsUser::getUnameFromId($uid,0):$uid_name;
      $selected=($this->view_uid==$uid)?"selected":"";
      $opt.="<option value='$uid' $selected>$uid_name</option>";
    }
    $opt.="</select>";
  	return $opt;
  }
  
  //列出分類篩選工具
	function news_cate_select($not_news=""){
    $cate_select=$this->get_tad_news_cate_option(0,0,$this->view_ncsn,0,"1",$not_news);
    $form=_MA_TADNEW_SHOW_CATE_NEWS."
  	<select onChange=\"window.location.href='{$_SERVER['PHP_SELF']}?ncsn='+this.value\">
  		$cate_select
  	</select>";
  	return $form;
  }

  //取得分類下拉選單
  function get_tad_news_cate_option($of_ncsn=0,$level=0,$v="",$this_ncsn="",$no_self="0",$not_news="null"){
  	global $xoopsDB,$xoopsUser,$xoopsModule;

  	if ($xoopsUser) {
      $module_id = $xoopsModule->getVar('mid');
      $isAdmin=$xoopsUser->isAdmin($module_id);
    }else{
      $isAdmin=false;
  	}

  	$ok_cat=$this->chk_cate_post_power();

  	$left=$level*10;
  	$level+=1;

  	$and_not_news=($not_news!="null")?"and not_news='{$not_news}'":"";


  	$option=($of_ncsn or !$isAdmin)?"":"<option value='0'></option>";
  	$option=="";
  	$sql = "select ncsn,nc_title,not_news from ".$xoopsDB->prefix("tad_news_cate")." where of_ncsn='{$of_ncsn}' $and_not_news order by sort";
  	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

  	while(list($ncsn,$nc_title,$not_news)=$xoopsDB->fetchRow($result)){
  	  if(!in_array($ncsn,$ok_cat))continue;
  	  if($no_self=='1' and $this_ncsn==$ncsn)continue;
  		$selected=($v==$ncsn)?"selected":"";
  		$color=($not_news=='1')?"red":"black";
  		$option.="<option value='{$ncsn}' style='padding-left: {$left}px;color:{$color};' $selected>{$nc_title}</option>";
  		$option.=$this->get_tad_news_cate_option($ncsn,$level,$v,$this_ncsn,$no_self,$not_news);
  	}
  	return $option;
  }

  //判斷目前登入者在哪些類別中有發表的權利
  function chk_cate_post_power($kind="post"){
  	global $xoopsDB,$xoopsUser,$xoopsModule;
  	if(empty($xoopsUser))return false;

    $module_id = $xoopsModule->getVar('mid');
    $isAdmin=$xoopsUser->isAdmin($module_id);
  	if($isAdmin){
      $ok_cat[]="";
  	}
  	$user_array=$xoopsUser->getGroups();

  	$col=($kind=="post")?"enable_post_group":"enable_group";

  	//非管理員才要檢查
  	$where=($isAdmin)?"":"where $col!=''";

  	$sql = "select ncsn,{$col} from ".$xoopsDB->prefix("tad_news_cate")." $where";
  	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

  	while(list($ncsn,$power)=$xoopsDB->fetchRow($result)){
  	  if($isAdmin){
        $ok_cat[]=$ncsn;
  		}else{
  			$power_array=explode(",",$power);
  			foreach($power_array as $gid){
  				if(in_array($gid,$user_array)){
  					$ok_cat[]=$ncsn;
  					break;
  				}
  			}
  		}
  	}
  	return $ok_cat;
  }
  
  //批次工具
  function batch_tool(){

		//分析目前觀看得是新聞還是自訂頁面
	  //$not_news=($this->kind=="news")?'0':'1';
	  
    $move="<input type='radio' name='act' value='move_news'>"._MA_TADNEW_MOVE_TO."<select name='ncsn'>".$this->get_tad_news_cate_option(0,0,"","","1")."</select>";
    
    $del="<input type='radio' name='act' value='del_news'>"._MA_TADNEW_DEL;
    
    $tool="<fieldset>
    <legend>"._MB_TADNEW_BATCH_TOOLS."</legend>
    <div>{$move} {$del}</div>
    <div>
    <input type='hidden' name='kind' value='{$this->kind}'>
    <input type='hidden' name='op' value='batch'>
    <input type='submit' value='"._MA_TADNEW_NP_SUBMIT."'>
    </div>
    </fieldset>";
    return $tool;
  }

}
?>
