<?php
/*
$arr = explode("/",$_SERVER['PHP_SELF']);
array_pop($arr);
$path = join('/',$arr);
$config["file_path"]	= "/../plugin/ajax-image-upload-master/uploads/";
$config["thumb_file_path"]	= "/../plugin/ajax-image-upload-master/uploads/thumb/";
*/
//目前功能和ajax_piclist_write 相同
//$_POST['target'] 是要移除的檔名，包含副檔名
$data = $_POST['data'];
$target = $_POST['target'];
$data2 =json_decode($data);
var_dump($_POST);

$text = "";
	foreach($data2 as $val){
		$text .= "\r\n" .$val;
	}
	$myfile = fopen("plugin/ajax-image-upload-master/uploads/files.txt", "w") or die("Unable to open file!");
	echo $text;
	//$str = $str. PHP_EOL .$data;
	fwrite($myfile, $text);
	fclose($myfile);
?>