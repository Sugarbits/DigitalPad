<?php
$data = $_POST['data'];
$text=$data;
	/*$myfile = fopen("plugin/ajax-image-upload-master/uploads/files.txt", "r") or die("Unable to open file!");
	// Output one character until end-of-file
	$str = "";
	while(!feof($myfile)) {
		$str.=fgetc($myfile);
	}
	fclose($myfile);*/
	$myfile = fopen("word.txt", "w") or die("Unable to open file!");
	echo $text;
	//$str = $str. PHP_EOL .$data;
	fwrite($myfile, $text);
	fclose($myfile);
?>