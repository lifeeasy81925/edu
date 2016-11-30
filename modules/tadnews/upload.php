<?php
@$ftmp = $_FILES['image']['tmp_name'];
@$oname = $_FILES['image']['name'];
@$fname = $_FILES['image']['name'];
@$fsize = $_FILES['image']['size'];
@$ftype = $_FILES['image']['type'];

if(IsSet($ftmp)) :
    $fp      = fopen($ftmp, 'r');
    $content = fread($fp, filesize($ftmp));
    $content = addslashes($content);
    fclose($fp);
    // include your database configuration & connection
    $new_file_name = time()."_".$fname;
    $query = "INSERT INTO file_upload (name, type, size, content)
    VALUES('".$new_file_name."', '".$ftype."', ".$fsize.", '".$content."')";
    $result = mysql_query($query);
    $file_id = mysql_insert_id();
?>
<html><head><script>
var par = window.parent.document;
var list = par.getElementById('list');
var fileid = par.createElement('div');
var inpid = par.createElement('input');
var imgdiv = list.getElementsByTagName('div')[<?=(int)$_POST['imgnum']?>];
var image = imgdiv.getElementsByTagName('img')[0];

imgdiv.removeChild(image);
list.removeChild(imgdiv);

fileid.setAttribute('id', 'upfile<?=$file_id?>');
fileid.innerHTML = '<?=$oname?>';
inpid.type = 'hidden';
inpid.name = 'filename[]';
inpid.value = '<?=$file_id?>';
list.appendChild(fileid);
fileid.appendChild(inpid);
</script></head>
</html>
<?php
    exit();
endif;
?>
<html><head>
<script language="javascript">
function upload(){
// hide old iframe
    var par = window.parent.document;
    var num = par.getElementsByTagName('iframe').length - 1;
    var iframe = par.getElementsByTagName('iframe')[num];
    iframe.className = 'hidden';

    // create new iframe
    var new_iframe = par.createElement('iframe');
    new_iframe.src = 'upload.php';
    new_iframe.frameBorder = '0';
    par.getElementById('iframe').appendChild(new_iframe);

    // add image progress
    var list = par.getElementById('list');
    var new_div = par.createElement('div');
    var new_img = par.createElement('img');
    new_img.src = 'indicator.gif';
    new_img.className = 'load';
    new_div.appendChild(new_img);
    list.appendChild(new_div);

    // send
    var imgnum = list.getElementsByTagName('div').length - 1;
    document.iform.imgnum.value = imgnum;
    document.iform.submit();
}
</script>
<style>
body {vertical-align:top;}
</style>
<head>
<body>
<form name="iform" action="" method="post" enctype="multipart/form-data">
<input id="file" type="file" name="image" onchange="upload()" />
<input type="hidden" name="imgnum" />
</form>
</html>