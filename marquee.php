<html>
<head>
<title>Marqee</title>
<script type="text/javascript" src="plugin/jquery.min.js"></script>
<script type="text/javascript" src="plugin/giva_marquee/lib/jquery.marquee.min.js"></script>
<!---// load the Marquee CSS stylesheet //--->
<link type="text/css" href="plugin/giva_marquee/css/jquery.marquee_define.css" rel="stylesheet" media="all" />
</head>
<body>
<?php
$myfile = fopen("word.txt", "r") or die("Unable to open file!");
// Output one character until end-of-file
$str = "";
while(!feof($myfile)) {
  $str.=fgetc($myfile);
}
fclose($myfile);
$arr = explode("\n",$str);
$echo = "<ul id='marquee' class=\"marquee\">";
for($i=0;$i<sizeof($arr);$i++){
	$echo .= "<li>".$arr[$i]."</li>";
}
$echo .= "</ul>";        
    

echo $echo;
?>
<!--
<ul id="marquee" class="marquee">
  <li>
    (第1行)Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Sed a nulla. 
    Lorem ipsum dolor sit amet, consectetuer.</li>
  <li>
    (第2行)Class aptent taciti sociosqu ad litora torquent per conubia nostra, per 
    inceptos hymenaeos. Fusce tincidunt adipiscing,massa. Class aptent taciti 
    sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. 
    Fusce tincidunt adipiscing,massa.
  </li>
</ul>
<hr>
<ul id="marquee2" class="marquee">
  <li>
    (第1行)Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Sed a nulla. 
    Lorem ipsum dolor sit amet, consectetuer.</li>
  <li>
    (第2行)Class aptent taciti sociosqu ad litora torquent per conubia nostra, per 
    inceptos hymenaeos. Fusce tincidunt adipiscing,massa. Class aptent taciti 
    sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. 
    Fusce tincidunt adipiscing,massa.
  </li>
</ul>
-->
</body>
<script type="text/javascript">
$(document).ready(function (){
  $("#marquee").marquee({pauseSpeed: 10000, showSpeed: 850 });
  //$("#marquee2").marquee({pauseSpeed: 2000 });
});
</script>