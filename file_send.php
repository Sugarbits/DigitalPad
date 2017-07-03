<!DOCTYPE html>
<html>
<body>

<?php
// Output one character until end-of-file
$str = "";


$myfile = fopen("word.txt", "w") or die("Unable to open file!");
$txt = $_POST['message'];
fwrite($myfile, $txt);
//$txt = "Minnie Mouse\n";
//fwrite($myfile, $txt);
fclose($myfile);
echo "訊息已修改為：".$_POST['message'];
?>



</body>
</html>