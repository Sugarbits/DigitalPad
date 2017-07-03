<html>
<head>
<title>Marqee</title>
</head>
<body onLoad="startBanner()">
<span id='mq'></span>
</body>
<script language="JavaScript">
<!--
var speed = 100
var pause = 2000
var timerID = null
var bannerRunning = false
var ar = new Array()
ar[0] = "這個跑馬燈很特別喔"
ar[1] = "不但有打字機效果"
ar[2] = "還可以秀出好幾行不同的文字"
ar[3] = "很好玩吧"
var currentMessage = 0
var offset = 0
function stopBanner() {
 if (bannerRunning)
  clearTimeout(timerID)
 bannerRunning = false
}
function startBanner() {
 stopBanner()
 showBanner()
}
function showBanner() {
 var text = ar[currentMessage]
 if (offset < text.length) {
  if (text.charAt(offset) == " ")
   offset++   
  var partialMessage = text.substring(0, offset + 1) 
  //window.status = partialMessage
  document.getElementById("mq").innerHTML = partialMessage;
  offset++ // IE sometimes has trouble with "++offset"
  timerID = setTimeout("showBanner()", speed)
  bannerRunning = true
 } else {
  offset = 0
  currentMessage++
  if (currentMessage == ar.length)
   currentMessage = 0
  timerID = setTimeout("showBanner()", pause)
  bannerRunning = true
 }
}
-->
</script>