<?php
$data = $_POST['data'];
$data2 =json_decode($data);
//var_dump($data2);
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