<?php 
$data = $_POST['data'];
print_r($data);
?>
<html>
<head>
<title>Widget2</title>
<script type="text/javascript" src="plugin/jquery.min.js"></script>
<style>

#div1{
	//background-image: url("new_pic/cloudy.png");
	//background-repeat: no-repeat, repeat;
	width:128px;
	height:64px;
	font-size:64px;
}
#div2{
	font-family:'微軟正黑體';
	font-size:200%;
	font-weight: bold;
}
</style>
</head>
<body style='margin:0px;padding:0px;'>
<div id='div1'>25度</div><div id='div2'>花蓮縣</div>
</body>
</html>