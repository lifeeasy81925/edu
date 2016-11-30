<?php
function tadgallery_search($queryarray, $andor, $limit, $offset, $userid){
	global $xoopsDB;
	//�B�z�\�\�\
	if(get_magic_quotes_gpc()){
		if(is_array($queryarray)){
			foreach($queryarray as $k=>$v){
				$arr[$k]=addslashes($v);
			}
			$queryarray=$arr;
		}else{
			$queryarray=array();
		}
	}
	$sql = "SELECT sn,title,filename,post_date,uid FROM ".$xoopsDB->prefix("tad_gallery")." where 1";
	if ( $userid != 0 ) {
		$sql .= " AND uid=".$userid." ";
	}
	if ( is_array($queryarray) && $count = count($queryarray) ) {
		$sql .= " AND ((title LIKE '%$queryarray[0]%' OR description LIKE '%$queryarray[0]%' OR tag LIKE '%$queryarray[0]%')";
		for($i=1;$i<$count;$i++){
			$sql .= " $andor ";
			$sql .= "( title LIKE '%$queryarray[$i]%' OR description LIKE '%$queryarray[$i]%' OR tag LIKE '%$queryarray[$i]%')";
		}
		$sql .= ") ";
	}
	$sql .= "ORDER BY post_date DESC";
	//die($sql);
	$result = $xoopsDB->query($sql,$limit,$offset);
	$ret = array();
	$i = 0;
 	while($myrow = $xoopsDB->fetchArray($result)){
		$ret[$i]['image'] = "images/image.png";
		$ret[$i]['link'] = "view.php?sn=".$myrow['sn'];
		$ret[$i]['title'] = (!empty($myrow['title']))?$myrow['title']:$myrow['filename'];
		$ret[$i]['time'] = strtotime($myrow['post_date']);
		$ret[$i]['uid'] = $myrow['uid'];
		$i++;
	}
	return $ret;
}

?>
