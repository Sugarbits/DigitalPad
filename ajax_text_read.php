<?php
$myfile = fopen("word.txt", "r") or die("Unable to open file!");
	// Output one character until end-of-file
$str = "";
while(!feof($myfile)) {
  $str.=fgetc($myfile);
}
fclose($myfile);
echo $str;
?>