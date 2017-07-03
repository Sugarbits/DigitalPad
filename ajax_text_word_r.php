<?php
$myfile = fopen("word.txt", "r") or die("Unable to open file!");
	// Output one character until end-of-file
$str = "";
while(!feof($myfile)) {
  $str.=fgetc($myfile);
}
fclose($myfile);
/*
$crr=array("id","name","note");
$brr = explode("\r\n",$str);

$drr = array();
$arr = array();

for($i=1; $i < sizeof($brr); $i++){
    $drr[$crr[0]] = $i;
    $drr[$crr[1]] = $brr[$i];
    $drr[$crr[2]] = '';
	array_push($arr,$drr);
}
	echo json_encode($arr);
*/
echo $str;

?>