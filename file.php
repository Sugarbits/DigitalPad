<!DOCTYPE html>
<html>
<body>

<?php
$myfile = fopen("word.txt", "r") or die("Unable to open file!");

// Output one character until end-of-file
$str = "";
while(!feof($myfile)) {
  $str.=fgetc($myfile);
}
echo "<form method=\"POST\" action=\"file_send.php\"><textarea name=\"message\" rows=\"10\" cols=\"30\">".
		$str
		."</textarea><button id='submit'>儲存</button><form>";
$arr = explode("\n",$str);
for($i=0;$i<sizeof($arr);$i++){
	echo "<li>".$arr[$i]."</li>";
}
fclose($myfile);

/*
$myfile = fopen("word.txt", "w") or die("Unable to open file!");
$txt = "Mickey Mouse\n";
fwrite($myfile, $txt);
$txt = "Minnie Mouse\n";
fwrite($myfile, $txt);
fclose($myfile);
*/
?>



</body>
</html>