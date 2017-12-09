<?php
if(empty($_FILES) || $_FILES["file"]["error"]) {
  die('{"OK": 0}');
}
//move_uploaded_file($_FILES["file"]["tmp_name"], "upload/".$_POST['name']."");
$fileName = $_FILES["file"]["name"];
$ext = end(explode('.', $fileName));
$desFileName = md5(uniqid()).'.'.$ext;
move_uploaded_file($_FILES["file"]["tmp_name"], "upload/$desFileName");
die('{"OK": 1}');
?>