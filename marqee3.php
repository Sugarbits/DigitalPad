<html>
<head>
<title>Marqee</title>
<script type="text/javascript" src="plugin/jquery.min.js"></script>
<script type="text/javascript" src="plugin/giva_marquee/lib/jquery.marquee.min.js"></script>
<!---// load the Marquee CSS stylesheet //--->
<link type="text/css" href="plugin/giva_marquee/css/jquery.marquee_define2.css" rel="stylesheet" media="all" />
</head>
<body  onload="startTime()">
<ul id="marquee" class="marquee">
  <li>
  <span id='txt'></span>
  </li>
  <li>
  <span id='txt2'></span>
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
</body>
<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
	
	m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
	
	var wd = today.getDay();
	var d = today.getDate();
	var y = today.getFullYear();
	var month = today.getMonth();
	var wdName=['星期日','星期一','星期二','星期三','星期四','星期五','星期六'];
	document.getElementById('txt2').innerHTML =
	y+ "年" + (month+1) + "月" + d + "日 ";
	//y+ "年" + (month+1) + "月" + d + "日 "+wdName[wd];
	
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
<script type="text/javascript">
$(document).ready(function (){
  $("#marquee").marquee({pauseSpeed: 10000, showSpeed: 850 });
  //$("#marquee2").marquee({pauseSpeed: 2000 });
});
</script>