<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2007-11-04
// $Id: post_function.php,v 1.4 2008/06/25 06:36:09 tad Exp $
// ------------------------------------------------------------------------- //

include_once(XOOPS_ROOT_PATH."/modules/tadnews/up_file.php");

//時間處理，$ifempty 若為空，要傳回甚麼 now
function check_time($date="",$ifempty=""){
	if(empty($date['date'])){
		$day=($ifempty=="now")?date("Y-m-d H:i:s"):"";
	}else{
		$day=strtotime($date['date']) + $date['time'];
		$day=date("Y-m-d H:i:s",$day);
	}
	return $day;
}


//標籤下拉選單
function prefix_tag_menu($prefix_tag=""){
	global $xoopsDB,$xoopsModuleConfig;

  $sql="select tag_sn,color,tag from ".$xoopsDB->prefix("tad_news_tags")." where `enable`='1'";
	$result=$xoopsDB->query($sql);
	while(list($tag_sn,$color,$tag)=$xoopsDB->fetchRow($result)){
	  $selected=($prefix_tag==$tag_sn)?"selected":"";
    $option.="<option value='{$tag_sn}'' $selected>{$tag}</option>";
  }
  	
  $select = "<select name='prefix_tag'><option value=''></option>$option</select>";
  return $select;
}

//tad_news編輯表單
function tad_news_form($nsn="",$ncsn=""){
	global $xoopsDB,$xoopsUser,$isAdmin,$xoopsModuleConfig;

	include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
  //取得目前使用者的所屬群組
	if($xoopsUser){
		$User_Groups=$xoopsUser->getGroups();
	}else{
		$User_Groups=array();
	}

	$nscn_arr=chk_cate_post_power("post");
	if(empty($nscn_arr)) redirect_header("index.php",3, _MA_TADNEW_NO_ADMIN_POWER."<br>".implode(";",$nscn_arr));

	//抓取預設值
	if(!empty($nsn)){
		$DBV=get_tad_news($nsn,true);
	}else{
		$DBV=array();
	}

	//預設值設定

	$nsn=(!isset($DBV['nsn']))?"":$DBV['nsn'];
	$ncsn=(!isset($DBV['ncsn']))?$ncsn:$DBV['ncsn'];
	$news_title=(!isset($DBV['news_title']))?"":$DBV['news_title'];
	$news_content=(!isset($DBV['news_content']))?"":$DBV['news_content'];
	$start_day=(!isset($DBV['start_day']) or $DBV['start_day']=="0000-00-00 00:00:00")?date("Y-m-d H:i:s",xoops_getUserTimestamp(time())):$DBV['start_day'];
	$end_day=(!isset($DBV['end_day']) or $DBV['end_day']=="0000-00-00 00:00:00")?"":$DBV['end_day'];
	$enable=(!isset($DBV['enable']))?"":$DBV['enable'];
	$uid=(!isset($DBV['uid']))?$xoopsUser->getVar('uid'):$DBV['uid'];

	$passwd=(!isset($DBV['passwd']))?"":$DBV['passwd'];
	$enable_group=(!isset($DBV['enable_group']))?"":explode(",",$DBV['enable_group']);
	$have_read_group=(!isset($DBV['have_read_group']))?"":explode(",",$DBV['have_read_group']);

	$prefix_tag=(!isset($DBV['prefix_tag']))?"":$DBV['prefix_tag'];
	$always_top=(!isset($DBV['always_top']))?"0":$DBV['always_top'];
	$always_top_date=(!isset($DBV['always_top_date']) or $DBV['always_top_date']=="0000-00-00 00:00:00")?date("Y-m-d H:i:s",time()+15*86400):$DBV['always_top_date'];


	$always_top_checked=($always_top=='1')?"checked":"";


	$SelectGroup_name = new XoopsFormSelectGroup("", "enable_group", false, $enable_group, 4, true);
	$SelectGroup_name->addOption("", _MA_TADNEW_ALL_OK, false);
	$enable_group = $SelectGroup_name->render();


	$SelectGroup_name2 = new XoopsFormSelectGroup("", "have_read_group", false, $have_read_group, 4, true);
	$SelectGroup_name2->addOption("", _MA_TADNEW_ALL_NO, false);
	$have_read_group = $SelectGroup_name2->render();

	//標籤選單
	$prefix_tag_menu=prefix_tag_menu($prefix_tag);

	//類別選單
	$cate_select=get_tad_news_cate_option(0,0,$ncsn);


	$start_date_form="<input type='text' value='{$start_day}' size='20' name='start_day' id='start_day' onClick=\"WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})\" >";

	$end_date_form="<input type='text' value='{$end_day}' size='20' name='end_day' id='end_day'  onClick=\"WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss',startDate:'%y-%M-{%d+14} %H:%m:%s'})\">";

  if(!file_exists(XOOPS_ROOT_PATH."/modules/tadtools/fck.php")){
    redirect_header("http://www.tad0616.net/modules/tad_uploader/index.php?of_cat_sn=50",3, _TAD_NEED_TADTOOLS);
  }
	include_once XOOPS_ROOT_PATH."/modules/tadtools/fck.php";
  $fck=new FCKEditor264("tadnews","news_content",$news_content);
  //if($xoopsModuleConfig['use_kcfinder']=='1'){
	// $fck->setCustomConfigurationsPath(XOOPS_URL.'/modules/tadnews/class/fckeditor_config.js');
	//}
	//$fck->setWidth(640);
	$fck->setHeight(350);
	$editor=$fck->render();

	$op=(empty($nsn))?"insert_tad_news":"update_tad_news";
	//$op="replace_tad_news";



  $pic='';
  //$pic_css="width:250px; height:100px; border:1px solid gray; background-position: left top; float:left; margin:4px; background-repeat:no-repeat;";

  if(!empty($nsn)){
    $pic=get_news_doc_pic("news_pic",$nsn,"big",'db',null,'demo_cover_pic');
    if(!empty($pic)){
    	$sql = "select description from ".$xoopsDB->prefix("tadnews_files_center")." where `col_name`='news_pic' and `col_sn`='{$nsn}' order by sort limit 0,1";
     	$result=$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
     	list($pic_css)=$xoopsDB->fetchRow($result);
    }
  }
  $use_pic_css=empty($pic_css)?"":"true";
  
  //creat_cate_group
  $creat_cate_tool=(chk_news_power(implode(",",$xoopsModuleConfig['creat_cate_group']),$User_Groups))?_MA_TADNEW_CREAT_NEWS_CATE." <br><input type='text' name='new_cate' id='new_cate_input'>":"";

  $now=time();
  $jquery_path=get_jquery(true);

  $css=get_pic_css($pic_css);
  $pic_css_set_hide=empty($pic_css)?"$('#pic_css_set').hide();":"";
	$main="
	$jquery_path
	<script type='text/javascript' src='".XOOPS_URL."/modules/tadtools/jqueryCookie/jquery.cookie.js'></script>
	<script src='".XOOPS_URL."/modules/tadtools/multiple-file-upload/jquery.MultiFile.js'></script>
	<script type='text/javascript' src='".XOOPS_URL."/modules/tadtools/My97DatePicker/WdatePicker.js'></script>
  <script type='text/javascript' src='".XOOPS_URL."/modules/tadnews/class/mColorPicker/javascripts/mColorPicker.js' charset='UTF-8'></script>

	<script type=\"text/javascript\">
  $('#color').mColorPicker({
  imageFolder: '".XOOPS_URL."/modules/tadnews/class/mColorPicker/images/'
  });

	$(document).ready(function() {

    var \$tabs = $('#jquery-tabs".$now."').tabs({ cookie: { expires: 30 } });
    $pic_css_set_hide
    $('#pic_css').change(function(){
      if($('#pic_css').val()=='true'){
        $('#pic_css_set').show();
      }else{
        $('#pic_css_set').hide();
      }
    });
    
		$('#setup_form').hide();
		if(!$always_top){
		  $('#top_date_input').hide();
		}

		$('#show_input_form').click(function() {
			if ($('#setup_form').is(':visible')) {
	       $('#setup_form').slideUp();
			} else{
	       $('#setup_form').slideDown();
			}
		});

		$('#always_top').click(function() {
			if ($('#top_date_input').is(':visible')) {
	       $('#top_date_input').fadeOut();
			} else{
	       $('#top_date_input').fadeIn();
			}
		});

	});
	
	</script>
  <form action='{$_SERVER['PHP_SELF']}' method='post' id='myForm' name='myForm' enctype='multipart/form-data'>
  <table class='form_tbl' style='width:100%;'>
  <tr>
  <td class='col' nowrap>"._MA_TADNEW_NEWS_CATE." <br>
    <select name='ncsn' id='ncsn' size=1 style='width:100px;'>
  		$cate_select
  	</select>
  	<input type='hidden' name='nsn' value='{$nsn}'>
	</td>
  <td class='col' nowrap>
  $creat_cate_tool
	</td>
	<td class='col'>"._MA_TADNEW_PREFIX_TAG."<br>$prefix_tag_menu</td>
	<td class='col' style='width:100%'>"._MA_TADNEW_NEWS_TITLE."<br><input type='text' name='news_title' id='news_title_input' style='width:100%' value='{$news_title}' ></td></tr>

	<tr>
	<td colspan='4'>$editor</td></tr>

	<tr><td colspan=4 style='font-size:12px;'>
  <div id='setup_form'>
    <div id='jquery-tabs{$now}'>

      <ul>
          <li><a href='#fragment-1'><span>"._MB_TADNEW_TIME_TAB."</span></a></li>
          <li><a href='#fragment-2'><span>"._MB_TADNEW_PRIVILEGE_TAB."</span></a></li>
          <li><a href='#fragment-3'><span>"._MB_TADNEW_NEWSPIC_TAB."</span></a></li>
          <li><a href='#fragment-4'><span>"._MB_TADNEW_FILES_TAB."</span></a></li>
      </ul>
      <div id='fragment-1'>

      	<table class='tbl' style='width:100%;'>
      	<tr>
        	<td nowrap>
            <input type='checkbox' name='always_top' id='always_top' value='1' $always_top_checked> "._MA_TADNEW_ALWAYS_TOP."
          </td>
        	<td colspan=3>
            <span id='top_date_input'>
            <input type='text' name='always_top_date'  id='always_top_date' size=20 value='{$always_top_date}' onClick=\"WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',startDate:'%y-%M-{%d+14} %H:%m'})\" align='absmiddle'>
            </span>
          </td>
      	</tr>

      	<tr>
          <td nowrap>"._MA_TADNEW_START_DATE."</td>
        	<td>{$start_date_form}</td>
        	<td nowrap>"._MA_TADNEW_END_DATE."</td>
        	<td>{$end_date_form}</td>
      	</tr>
      	</table>
      </div>

      <div id='fragment-2'>

      	<table class='tbl' style='width:100%;'>
       	<tr>
        	<td nowrap style='vertical-align:top;'>
        	<p>
          "._MA_TADNEW_NEWS_ENABLE._MD_TADNEW_FOR."
          <input type='radio' name='enable' value='1' id='enable1' ".chk($enable,'1',1).">"._MA_TADNEW_NEWS_ENABLE_OK."
          <input type='radio' name='enable' value='0' id='enable0' ".chk($enable,'0').">"._MA_TADNEW_NEWS_UNABLE."
          </p>
        	<p>
          "._MA_TADNEW_NEWS_PASSWD._MD_TADNEW_FOR."
          <input type='text' name='passwd' id='passwd' size='20' value='{$passwd}'>
          </p>
          </td>
        	<td nowrap style='text-align:center'>
            <div style='font-weight:bold;font-size:11pt;'>"._MA_TADNEW_CAN_READ_NEWS_GROUP."</div>
        		$enable_group
        	</td>

        	<td nowrap style='text-align:center'>
            <div style='font-weight:bold;font-size:11pt;'>"._MA_TADNEW_NEWS_HAVE_READ."</div>
            $have_read_group
          </td>
      	</tr>
      	</table>
      </div>

      <div id='fragment-3'>

          <div style='float:left'>"._MA_TADNEW_NEWS_PIC."
          <input type='file' name='upfile2[]' maxlength='1' accept='gif|jpg|png'><br>
          <!--textarea name='pic_css' style='width:300px;height:60px;font-size:12px;'>$pic_css</textarea-->
          </div>

        	<div style='float:left'>
          <table class='tbl' style='width:630px;'>
        	<tr>
            <th nowrap width=90 style='background-color:#E9F3FF;color:#5E88A3;text-align:left;font-weight:normal;padding:2px 4px;'>"._MB_TADNEW_ENABLE_NEWSPIC."</th>
            <td>
            <select name='pic_css[use_pic_css]' id='pic_css'>
            <option value='' ".chk($use_pic_css,'',1,'selected').">"._MB_TADNEW_ENABLE_NEWSPIC_NO."</option>
            <option value='true' ".chk($use_pic_css,'true',0,'selected').">"._MB_TADNEW_ENABLE_NEWSPIC_YES."</option>
            </select>
            </td>
          </tr>
          <tbody id='pic_css_set'>
        	<tr>
            <th nowrap style='background-color:#E9F3FF;color:#5E88A3;text-align:left;font-weight:normal;padding:2px 4px;'>"._MB_TADNEW_NEWSPIC_SIZE."</th>
            <td>
            "._MB_TADNEW_NEWSPIC_WIDTH."<input type='text' name='pic_css[width]' value='{$css['width']}' size=2 onChange=\"$('#demo_cover_pic').css('width',this.value+'px');\">px，
            "._MB_TADNEW_NEWSPIC_HEIGHT."<input type='text' name='pic_css[height]' value='{$css['height']}' size=2 onChange=\"$('#demo_cover_pic').css('height',this.value+'px');\">px</td>
            <td rowspan=3 id='demo_pic' style='background:#F5F5F5 url(".XOOPS_URL."/modules/tadnews/images/cover.png) no-repeat center center;width:220px;'></td>
          </tr>
        	<tr>
            <th nowrap style='background-color:#E9F3FF;color:#5E88A3;text-align:left;font-weight:normal;padding:2px 4px;'>"._MB_TADNEW_NEWSPIC_BORDER."</th>
            <td>
            "._MB_TADNEW_NEWSPIC_BORDER_WIDTH."<input type='text' name='pic_css[border_width]' value='{$css['border_width']}' size=1 onChange=\"$('#demo_cover_pic').css('border-width',this.value+'px');\">px，
            "._MB_TADNEW_NEWSPIC_BORDER_STYTLE."<select name='pic_css[border_style]' onChange=\"$('#demo_cover_pic').css('border-style',this.value);\">
            <option value='solid' ".chk($css['border_style'],'solid',1,'selected').">"._MB_TADNEW_NEWSPIC_SOLID." </option>
            <option value='dashed' ".chk($css['border_style'],'dashed',0,'selected').">"._MB_TADNEW_NEWSPIC_DASHED."</option>
            <option value='double' ".chk($css['border_style'],'double',0,'selected').">"._MB_TADNEW_NEWSPIC_DOUBLE."</option>
            <option value='dotted' ".chk($css['border_style'],'dotted',0,'selected').">"._MB_TADNEW_NEWSPIC_DOTTED."</option>
            <option value='groove' ".chk($css['border_style'],'groove',0,'selected').">"._MB_TADNEW_NEWSPIC_GROOVE."</option>
            <option value='ridge' ".chk($css['border_style'],'ridge',0,'selected').">"._MB_TADNEW_NEWSPIC_RIDGE."</option>
            <option value='inset' ".chk($css['border_style'],'inset',0,'selected').">"._MB_TADNEW_NEWSPIC_INSET."</option>
            <option value='outset' ".chk($css['border_style'],'outset',0,'selected').">"._MB_TADNEW_NEWSPIC_OUTSET."</option>
            <option value='none' ".chk($css['border_style'],'none',0,'selected').">"._MB_TADNEW_NEWSPIC_NONE."</option>
            </select>，
            "._MB_TADNEW_NEWSPIC_BORDER_COLOR."<input type='color' name='pic_css[border_color]' id='border_color' value='{$css['border_color']}' data-text='hidden' data-hex='true' style='height:20px;width:20px;' onChange=\"$('#demo_cover_pic').css('border-color',this.value);\" /></td>
          </tr>
        	<tr>
            <th nowrap style='background-color:#E9F3FF;color:#5E88A3;text-align:left;font-weight:normal;padding:2px 4px;'>"._MB_TADNEW_NEWSPIC_FLOAT."</th>
            <td>
            <select name='pic_css[float]' onChange=\"$('#demo_cover_pic').css('float',this.value);\">
            <option value='left' ".chk($css['float'],'left',1,'selected').">"._MB_TADNEW_NEWSPIC_FLOAT_LEFT."</option>
            <option value='right' ".chk($css['float'],'right',0,'selected').">"._MB_TADNEW_NEWSPIC_FLOAT_RIGHT."</option>
            <option value='none' ".chk($css['float'],'none',0,'selected').">"._MB_TADNEW_NEWSPIC_FLOAT_NONE."</option>
            </select>，
            "._MB_TADNEW_NEWSPIC_MARGIN."<input type='text' name='pic_css[margin]' value='{$css['margin']}' size=1 onChange=\"$('#demo_cover_pic').css('margin',this.value + 'px');\">px
            </td>
          </tr>
        	<tr>
            <th nowrap style='background-color:#E9F3FF;color:#5E88A3;text-align:left;font-weight:normal;padding:2px 4px;'>"._MB_TADNEW_NEWSPIC_CONTENT."</th>
            <td colspan=2>"._MB_TADNEW_NEWSPIC."<select name='pic_css[background_repeat]' onChange=\"$('#demo_cover_pic').css('background-repeat',this.value);\">
            <option value='no-repeat' ".chk($css['background_repeat'],'no-repeat',1,'selected').">"._MB_TADNEW_NEWSPIC_NO_REPEAT."</option>
            <option value='repeat' ".chk($css['background_repeat'],'repeat',0,'selected').">"._MB_TADNEW_NEWSPIC_REPEAT."</option>
            <option value='repeat-x' ".chk($css['background_repeat'],'repeat-x',0,'selected').">"._MB_TADNEW_NEWSPIC_X_REPEAT."</option>
            <option value='repeat-y' ".chk($css['background_repeat'],'repeat-y',0,'selected').">"._MB_TADNEW_NEWSPIC_Y_REPEAT."</option>
            </select>"._MB_TADNEW_NEWSPIC_SHOW."
            <select name='pic_css[background_position]' onChange=\"$('#demo_cover_pic').css('background-position',this.value);\">
            <option value='left top' ".chk($css['background_position'],'left top',1,'selected').">"._MB_TADNEW_NEWSPIC_LEFT_TOP."</option>
            <option value='left center' ".chk($css['background_position'],'left center',0,'selected').">"._MB_TADNEW_NEWSPIC_LEFT_CENTER."</option>
            <option value='left bottom' ".chk($css['background_position'],'left bottom',0,'selected').">"._MB_TADNEW_NEWSPIC_LEFT_BOTTOM."</option>
            <option value='right top' ".chk($css['background_position'],'right top',0,'selected').">"._MB_TADNEW_NEWSPIC_RIGHT_TOP."</option>
            <option value='right center' ".chk($css['background_position'],'right center',0,'selected').">"._MB_TADNEW_NEWSPIC_RIGHT_CENTER."</option>
            <option value='right bottom' ".chk($css['background_position'],'right bottom',0,'selected').">"._MB_TADNEW_NEWSPIC_RIGHT_BOTTOM."</option>
            <option value='center top' ".chk($css['background_position'],'center top',0,'selected').">"._MB_TADNEW_NEWSPIC_CENTER_TOP."</option>
            <option value='center center' ".chk($css['background_position'],'center center',0,'selected').">"._MB_TADNEW_NEWSPIC_CENTER_CENTER."</option>
            <option value='center bottom' ".chk($css['background_position'],'center bottom',0,'selected').">"._MB_TADNEW_NEWSPIC_CENTER_BOTTOM."</option>
            </select>"._MB_TADNEW_NEWSPIC_AND."
            <select name='pic_css[background_size]' onChange=\"$('#demo_cover_pic').css('background-size',this.value);\">
            <option value='' ".chk($css['background_size'],'',1,'selected').">"._MB_TADNEW_NEWSPIC_NO_RESIZE."</option>
            <option value='contain' ".chk($css['background_size'],'contain',0,'selected').">"._MB_TADNEW_NEWSPIC_CONTAIN."</option>
            <option value='cover' ".chk($css['background_size'],'cover',0,'selected').">"._MB_TADNEW_NEWSPIC_COVER."</option>
            </select>
            </td>
          </tr>
          </tbody>
        	</table>
          </div>

      	 <div style='float:left;margin:10px 0px; border:1px solid gray; padding:20px;'>
           {$pic}
           "._MB_TADNEW_NEWSPIC_DEMO."
         </div>
        <div style='clear:both;'></div>
      </div>

      <div id='fragment-4'>
      	<table class='tbl' style='width:100%;'>
      	<tr>
       	  <td valign='top'>
           "._MA_TADNEW_NEWS_FILES."
           <input type='file' name='upfile[]' class='multi' multiple='multiple'>
          </td>

        	<td>
           ".list_del_file("nsn",$nsn)."
          </td>
      	</tr>
      	</table>
      </div>

  	</div>
  </div>
	</td></tr>


  <tr><td class='bar' colspan='4'>
	<input type='hidden' name='uid' value='{$uid}'>
  <input type='hidden' name='op' value='{$op}'>
  <input type='button' value='"._MA_TADNEW_ADV_SETUP."' id='show_input_form'>
  <input type='submit' value='"._MA_TADNEW_SAVE_NEWS."'></td></tr>
  </table>
  </form>";

  $main=div_3d(_MA_TADNEW_ADD_NEWS,$main,"raised","width:100%;overflow:hidden;");

	return $main;
}

//取得圖片的 CSS 設定
function get_pic_css($pic_css=''){
  if(empty($pic_css)){
    $css['width']=200;
    $css['height']=150;
    $css['border_width']='1';
    $css['border_style']='solid';
    $css['border_color']='#909090';
    $css['background_position']='left top';
    $css['background_repeat']='no-repeat';
    $css['float']='left';
    $css['margin']='4';
    $css['background_size']='contain';
  }else{
    $cssArr=explode(';' , $pic_css);
    foreach($cssArr as $css_set){
      list($k,$v)=explode(':',$css_set);
      $k=trim($k);
      $v=trim($v);
      $set[$k]=$v;
    }
    $css['width']=is_null($set['width'])?null:str_replace('px','',$set['width']);
    $css['height']=is_null($set['height'])?null:str_replace('px','',$set['height']);
    if(!is_null($set['border'])){
      list($borderwidth,$borderstyle,$bordercolor)=explode(' ',$set['border']);
      $css['border_width']=is_null($borderwidth)?null:str_replace('px','',$borderwidth);
      $css['border_style']=is_null($borderstyle)?null:$borderstyle;
      $css['border_color']=is_null($bordercolor)?null:$bordercolor;
    }

    $css['background_position']=is_null($set['background-position'])?null:$set['background-position'];
    $css['background_repeat']=is_null($set['background-repeat'])?null:$set['background-repeat'];
    $css['float']=is_null($set['float'])?null:$set['float'];
    $css['margin']=is_null($set['margin'])?null:str_replace('px','',$set['margin']);
    $css['background_size']=is_null($set['background-size'])?null:$set['background-size'];
  }
  return $css;
}


//把圖片的 CSS 設定整成成一般css
function mk_pic_css($set=''){
  if(empty($set) or empty($set['use_pic_css'])){
    $pic_css='';
  }else{
    $pic_css='';
    $pic_css.=is_null($set['width'])?'':"width:{$set['width']}px; ";
    $pic_css.=is_null($set['height'])?'':"height:{$set['height']}px; ";
    $pic_css.=is_null($set['border_width'])?'':"border:{$set['border_width']}px {$set['border_style']} {$set['border_color']}; ";
    $pic_css.=is_null($set['background_position'])?'':"background-position:{$set['background_position']}; ";
    $pic_css.=is_null($set['background_repeat'])?'':"background-repeat:{$set['background_repeat']}; ";
    $pic_css.=is_null($set['background_size'])?'':"background-size:{$set['background_size']}; ";
    $pic_css.=is_null($set['float'])?'':"float:{$set['float']}; ";
    $pic_css.=is_null($set['margin'])?'':"margin:{$set['margin']}px; ";

  }
  return $pic_css;
}

//新增資料到tad_news中
function insert_tad_news(){
	global $xoopsDB,$xoopsUser,$isAdmin;
	$uid=$xoopsUser->getVar('uid');

 	if(empty($_POST['enable_group']) or in_array("",$_POST['enable_group'])){
    $enable_group="";
	}else{
		$enable_group=implode(",",$_POST['enable_group']);
	}

		//需簽收群組
	if(empty($_POST['have_read_group']) or in_array("",$_POST['have_read_group'])){
    $have_read_group="";
	}else{
		$have_read_group=implode(",",$_POST['have_read_group']);
	}

  if(!empty($_POST['new_cate'])){
    $ncsn=creat_tad_news_cate($_POST['ncsn'],$_POST['new_cate']);
  }else{
    $ncsn=intval($_POST['ncsn']);
  }

	$myts =& MyTextSanitizer::getInstance();
	$news_title=$myts->addSlashes($_POST['news_title']);
	$news_content=$myts->addSlashes($_POST['news_content']);
  $always_top=(empty($_POST['always_top']))?"0":"1";
	$pic_css=mk_pic_css($_POST['pic_css']);


	$sql = "insert into ".$xoopsDB->prefix("tad_news")." (ncsn,news_title,news_content,start_day,end_day,enable,uid,passwd,enable_group,prefix_tag,always_top,always_top_date,have_read_group) values('{$ncsn}','{$news_title}','{$news_content}','{$_POST['start_day']}','{$_POST['end_day']}','{$_POST['enable']}','{$uid}','{$_POST['passwd']}','{$enable_group}','{$_POST['prefix_tag']}','{$always_top}','{$_POST['always_top_date']}','{$have_read_group}')";
	$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	//取得最後新增資料的流水編號
	$nsn=$xoopsDB->getInsertId();

	//處理上傳的檔案
	upload_file('upfile',"nsn",$nsn);
	upload_file('upfile2',"news_pic",$nsn,null,1,$pic_css);

	$xoopsUser->incrementPost();

  $cate=get_tad_news_cate($_POST['ncsn']);
  $page=($cate['not_news']=='1')?"page":"index";
	header("location: ".XOOPS_URL."/modules/tadnews/{$page}.php?nsn={$nsn}");
	exit;
	return $nsn;
}

//新增資料到tad_news_cate中
function creat_tad_news_cate($of_ncsn="",$new_cate="",$not_news='0'){
	global $xoopsDB,$xoopsModuleConfig;
  $enable_group=$enable_post_group=$setup="";
  $sort=get_max_sort($of_ncsn);

  $myts =& MyTextSanitizer::getInstance();
  $new_cate=$myts->addSlashes($new_cate);

	$sql = "insert into ".$xoopsDB->prefix("tad_news_cate")." (of_ncsn,nc_title,enable_group,enable_post_group,sort,not_news,setup) values('{$of_ncsn}','{$new_cate}','{$enable_group}','{$enable_post_group}','{$sort}','{$not_news}','{$setup}')";
	$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, _MA_TADNEW_DB_ADD_ERROR1);
	//取得最後新增資料的流水編號
	$ncsn=$xoopsDB->getInsertId();
	return $ncsn;
}


//更新tad_news某一筆資料
function update_tad_news($nsn=""){
	global $xoopsDB,$xoopsUser;
	$uid=$xoopsUser->getVar('uid');

	//確認有管理員或本人才能管理
	$news=get_tad_news($nsn);
	if(!chk_who($news['uid'])){
		redirect_header($_SERVER['PHP_SELF'],3, _MA_TADNEW_NO_ADMIN_POWER);
	}

	//可讀群組
	if(empty($_POST['enable_group']) or in_array("",$_POST['enable_group'])){
    $enable_group="";
	}else{
		$enable_group=implode(",",$_POST['enable_group']);
	}

	//需簽收群組
	if(empty($_POST['have_read_group']) or in_array("",$_POST['have_read_group'])){
    $have_read_group="";
	}else{
		$have_read_group=implode(",",$_POST['have_read_group']);
	}

	$myts =& MyTextSanitizer::getInstance();
	$news_title=$myts->addSlashes($_POST['news_title']);
	$news_content=$myts->addSlashes($_POST['news_content']);
	$always_top=(empty($_POST['always_top']))?"0":"1";
	$pic_css=mk_pic_css($_POST['pic_css']);

	$sql = "update ".$xoopsDB->prefix("tad_news")." set  ncsn = '{$_POST['ncsn']}', news_title = '{$news_title}', news_content = '{$news_content}', start_day = '{$_POST['start_day']}', end_day = '{$_POST['end_day']}', enable = '{$_POST['enable']}', passwd = '{$_POST['passwd']}', enable_group = '{$enable_group}',prefix_tag='{$_POST['prefix_tag']}',always_top='{$always_top}',always_top_date='{$_POST['always_top_date']}',have_read_group='{$have_read_group}' where nsn='$nsn'";
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

	//處理上傳的檔案
	upload_file('upfile',"nsn",$nsn);
	upload_file('upfile2',"news_pic",$nsn,null,1,$pic_css);

  $cate=get_tad_news_cate($_POST['ncsn']);
  $page=($cate['not_news']=='1')?"page":"index";
	header("location: ".XOOPS_URL."/modules/tadnews/{$page}.php?nsn={$nsn}");
	exit;
}



//取得tad_news所有資料陣列
function get_tad_news_all(){
	global $xoopsDB;
	$sql = "select * from ".$xoopsDB->prefix("tad_news");
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3,  mysql_error());
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

?>
