<?php
include "../../mainfile.php";
include "../../header.php";
include "./connect.php";
include "./checkdate.php";
?>
<?
$datetime = date ("Y" , mktime(date('Y'))) ; 
?>

<?
if($class == '1' ){			
$sql = "select  *  from  100element_point345 where account like '$username'";
}
else{
$sql = "select  *  from  100junior_point345 where account like '$username'";
}

$result = mysql_query($sql);
while($row = mysql_fetch_row($result))
        {
			$a = $row[1]; //去年國三畢業生人數
			$b = $row[2]; //PR值≦25學生數
        }
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<a href="school_index.php">返回申請首頁</a>
<form name="form" method="post" action="point3_finish.php" onSubmit="return toCheck();" onKeyDown="if(event.keyCode == 13) return false;">
<p><font color="#0000FF"><strong>指標三</strong></font>
<p>
•去(99)學年度國三畢業生人數<input type="text" size="6" name="graduate" value="<? if( $a=='') echo ''; else echo $a;?>"/> 人
<p>
•第一次學測成績PR值≦25學生數<input type="text" size="6" name="pr" onChange="change1()" value="<? if( $b=='') echo ''; else echo $b;?>"/>人<br>
<font color=blue>（因推薦甄試取得高中職入學資格，而未參加第一次基本學歷測驗之學生除外）</font>
<p>
--指標界定三：第一次基本學力測驗總成績百分等級(PR值)在25以下之學生人數佔畢業生總數達40％以上<br><br>
	<INPUT TYPE="button" VALUE="上一頁" onClick="history.go(-1)">
	<input type="submit" name="button" value="儲存並到下一頁" />

<!-- 檢查空值 -->
<script language="JavaScript">
  function toCheck() {
    if ( document.form.graduate.value == "" ) {
      alert("請填寫「去年畢業學生數」！");
      document.form.graduate.focus();
      return false;
    }
    if ( document.form.pr.value == "" ) {
      alert("請填寫「第一次學測成績PR值≦25學生數」！");
      document.form.pr.focus();
      return false;
    }
		
    return true;
  }
</script>   
<?php include "../xSchoolForm/print_button.php"; ?>
</form>
<?php
include "../../footer.php";
?>