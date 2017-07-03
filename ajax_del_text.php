<?php
	$arr = explode("/",$_SERVER['PHP_SELF']);
	array_pop($arr);
	$path = join('/',$arr);
	
$config["file_path"]	= "/../plugin/ajax-image-upload-master/uploads/";
$config["thumb_file_path"]	= "/../plugin/ajax-image-upload-master/uploads/thumb/";
$data = $_POST['data'];
$target = $_POST['target'];
$data2 =json_decode($data);
//var_dump($data2);
/*
if(file_exists($path.$config["file_path"].$target)){
            echo "del ok";
            unlink($path.$config["file_path"].$target);//將檔案刪除
        }else{
            exit($path.$config["file_path"].$target."del fail");
        }
	*/
$text = "";
	/*$myfile = fopen("plugin/ajax-image-upload-master/uploads/files.txt", "r") or die("Unable to open file!");
	// Output one character until end-of-file
	$str = "";
	while(!feof($myfile)) {
		$str.=fgetc($myfile);
	}
	fclose($myfile);*/
	foreach($data2 as $val){
		$text .= "\r\n" .$val;
	}
	$text = $text;
	$myfile = fopen("plugin/ajax-image-upload-master/uploads/files.txt", "w") or die("Unable to open file!");
	echo $text;
	//$str = $str. PHP_EOL .$data;
	fwrite($myfile, $text);
	fclose($myfile);
?>