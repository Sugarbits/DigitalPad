<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>table</title>
  <meta name="description" content="table">

  <meta name="viewport" content="width=device-width,initial-scale=1">

  <link rel="stylesheet" href="plugin/jPages-master/css/style.css">
  <link rel="stylesheet" href="plugin/jPages-master/css/jPages.css">
  <link rel="stylesheet" href="plugin/jPages-master/css/animate.css">

  <script type="text/javascript" src="plugin/jPages-master/js/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" src="plugin/jPages-master/js/highlight.pack.js"></script>
  <script type="text/javascript" src="plugin/jPages-master/js/tabifier.js"></script>
  <script src="plugin/jPages-master/js/js.js"></script>
  <script src="plugin/jPages-master/js/jPages.js"></script>

  <script type="text/javascript">
/*
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-28718218-1']);
  _gaq.push(['_trackPageview']);
*/
 

  </script>

  <script>
  $(function(){
    $("div.holder").jPages({
      containerID : "target",
      previous : "←",
      next : "→",
      perPage : 5,
      delay : 20
    });
  });
  </script>

  <style type="text/css">
  table{ width: 30%; margin-top: 10px; }
  td, th{ text-align: left; height:25px; }
  th { background: #f5f5f5; }
  th:nth-child(1){ width:5%; }
  th:nth-child(2){ width:15%; }
  th:nth-child(3){ width:10%; }
  th:nth-child(4){ width:10%;}

  form { float: right; margin-right: 10px; }
  form label { margin-right: 5px; }
  form select { margin-right: 75px; }
  </style>

</head>
<body>

  <div id="container" class="clearfix">

    <div id="content" class="defaults">

      <h2>Table</h2>

      <div class="holder"></div>

    </div> <!--! end of #content -->
  </div> <!--! end of #container -->



</body>
</html>
<style>
    body {
	margin-left: 0px;
	overflow:hidden;
	}
	
</style>
<?php
$myfile = fopen("upload/files.txt", "r") or die("Unable to open file!");

// Output one character until end-of-file
       
$str = "";
while(!feof($myfile)) {
  $str.=fgetc($myfile);
}
fclose($myfile);
$crr=array("id","name","note");
$brr = explode("\r\n",$str);

$drr = array();
$arr = array();

$tb = "<table border='1'><thead><tr><th>#</th><th>檔名</th><th>預覽</th><th>刪除</th></tr></thead><tbody id='target'>";

for($i=1; $i < sizeof($brr); $i++){
	$temp = "<img src=\"upload/thumb/$brr[$i]\" alt=\"my image\">";
	$tb .= "<tr><td>$i</td><td>$brr[$i]</td><td>$temp</td><td><input type='button' value='x'/></td></tr>";
    $drr[$crr[0]] = $i;
    $drr[$crr[1]] = $brr[$i];
    $drr[$crr[2]] = '';
	array_push($arr,$drr);
}
$tb .= "</tbody></table>";
echo $tb;
?>