<!DOCTYPE html>
<html>
<head>
</head>
<body>
<link href="indez.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="plugin/FlexSlider/flexslider.css" type="text/css" media="screen" />
<style>
.flexslider{
	background:none;
	border:none;
	box-shadow:none;
	margin:0px;
}
</style>
<?php
$myfile = fopen("plugin/ajax-image-upload-master/uploads/files.txt", "r") or die("Unable to open file!");

// Output one character until end-of-file
       
$str = "";
while(!feof($myfile)) {
  $str.=fgetc($myfile);
}
fclose($myfile);
$echo = "";
$echo .="<div class=\"flexslider\"><ul class=\"slides\">";
$arr = explode("\n",$str);
for($i=1;$i<sizeof($arr);$i++){
	$echo .= "<li><img src='plugin/ajax-image-upload-master/uploads/".$arr[$i]."' /></li>";
}
$echo .="</ul></div>";
echo $echo;

/*
$myfile = fopen("word.txt", "w") or die("Unable to open file!");
$txt = "Mickey Mouse\n";
fwrite($myfile, $txt);
$txt = "Minnie Mouse\n";
fwrite($myfile, $txt);
fclose($myfile);
*/
?>

  <script src="jquery-1.11.2.js"></script>
  <script>window.jQuery || document.write('<script src="SliderData/js/libs/jquery-1.7.min.js">\x3C/script>')</script>

  <!-- FlexSlider -->
  <script defer src="plugin/FlexSlider/jquery.flexslider.js"></script>

  <script type="text/javascript">

    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: true,
        pausePlay: false,
		directionNav: false, //Boolean:  (true/false)是否顯示左右控制按鈕
		controlNav: false, //Boolean:  usage是否顯示控制菜單//什麼是控制菜單？
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>

</body>
</html>