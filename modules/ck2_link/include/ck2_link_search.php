<?php
  //好站推薦搜尋程式
function ck2_link_search($queryarray, $andor, $limit, $offset, $userid){
	global $xoopsDB;
	//處理許功蓋
	if(get_magic_quotes_gpc()){
		foreach($queryarray as $k=>$v){
			$arr[$k]=addslashes($v);
		}
		$queryarray=$arr;
	}
	$sql = "SELECT `link_sn`,`link_title`,`post_date`, `uid` FROM ".$xoopsDB->prefix("ck2_link")." WHERE enable='1' ";
	if ( $userid != 0 ) {
		$sql .= " AND uid=".$userid." ";
	}
	if ( is_array($queryarray) && $count = count($queryarray) ) {
		$sql .= " AND ((`link_title` LIKE '%{$queryarray[0]}%'  OR `link_desc` LIKE '%{$queryarray[0]}%' OR  `link_url` LIKE '%{$queryarray[0]}%')";
		for($i=1;$i<$count;$i++){
			$sql .= " $andor ";
			$sql .= "(`link_title` LIKE '%{$queryarray[$i]}%' OR  `link_desc` LIKE '%{$queryarray[$i]}%'  OR  `link_url` LIKE '%{$queryarray[$i]}%')";
		}
		$sql .= ") ";
	}
	$sql .= "ORDER BY  `link_sort` DESC";
	$result = $xoopsDB->query($sql,$limit,$offset);
	$ret = array();
	$i = 0;
 	while($myrow = $xoopsDB->fetchArray($result)){
		$ret[$i]['image'] = "images/anchor.png";
		$ret[$i]['link'] = "view.php?link_sn=".$myrow['link_sn'];
		$ret[$i]['title'] = $myrow['link_title'];
		$ret[$i]['time'] = strtotime($myrow['post_date']);
		$ret[$i]['uid'] = $myrow['uid'];
		$i++;
	}
	return $ret;
}
?>
