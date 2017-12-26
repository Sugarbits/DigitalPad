<html>
<head>
<title>Widget2</title>
<script type="text/javascript" src="plugin/jquery.min.js"></script>
<style>
.div1{
	background-color:#a0a;
	font-family:'微軟正黑體';
	font-size:225%;
	font-weight: bold;
	
}
</style>
</head>
<body style='margin:0px;padding:0px;'>
<div class='div1'><span id='date'>初始中...</span><br><span id='time'>初始中...</span></div>
<div class='div1'>溫度25℃</div>
</body>
</html>
<script language="JavaScript">
$( document ).ready(function() {
    console.log( "ready!" );
	showtime();
});

var now,hours,minutes,seconds,timeValue;
function showtime(){
now = new Date();
day = now.getDate();
month = now.getMonth();
hours = now.getHours();
minutes = now.getMinutes();
seconds = now.getSeconds();
//timeValue = (hours >= 12) ? "下午 " : "上午 ";
timeValue = month+"月"+day+"日";
//timeValue2 = ((hours > 12) ? hours - 12 : hours) + "：";
timeValue2 = ((hours > 12) ? "PM "+(hours - 12) : "AM"+hours) + "：";
timeValue2 += ((minutes < 10) ? " 0" : " ") + minutes + "";
//timeValue2 += ((seconds < 10) ? " 0" : " ") + seconds + " 秒";
document.getElementById('date').innerHTML = timeValue;
document.getElementById('time').innerHTML = timeValue2;
setTimeout("showtime()",1000);
}

</script>

<body onload="showtime();" >

<span id='clock'></span>