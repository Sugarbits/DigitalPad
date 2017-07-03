<html>
<head>
<script type="text/javascript" src="plugin/jQuery.TextSlider/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="plugin/jQuery.TextSlider/jquery.textslider.js"></script>
<style>
.slideText {
    position: relative;
    overflow: hidden;
    width: 100%;
    height: 3em;
}
.slideText ul, .slideText li {
    margin: 0;
    padding: 0;
    list-style: none;
    width: 100%;
}
.slideText ul {
    position: absolute;
}
.slideText li {
    text-align: center;
}
.slideText li a {
    display: block;
    overflow: hidden;
    font-size: 1em;
    height: 1.5em;
    line-height: 1.5em;
    text-decoration: none;
}
.slideText li a:hover {
    text-decoration: underline;
}
</style>
</head>
<?php
$myfile = fopen("word.txt", "r") or die("Unable to open file!");

// Output one character until end-of-file
$str = "";
while(!feof($myfile)) {
  $str.=fgetc($myfile);
}
fclose($myfile);

echo "
<div id=\"ann_box\" class=\"ann\" style=\"width:100px;\">
  <div id=\"a1\" class=\"ann\"><a href=\"exp01.php\" >exp01</a></div>
  <div id=\"a2\" class=\"ann\"><a href=\"exp02.php\" >exp02</a></div>
  <div id=\"a3\" class=\"ann\"><a href=\"exp03.php\" >exp03</a></div>
  <div id=\"a4\" class=\"ann\"><a href=\"exp04.php\" >exp04</a></div>
  <div id=\"a5\" class=\"ann\"><a href=\"exp05.php\" >exp05</a></div>
</div>";
?>

<!--
<marquee height="90%" behavior="scroll" direction="up" loop="infinite" scrollAmount=3><font size="6">
<?php //echo $str;?>
</font></marquee> 
-->

<script>
function slideLine(box,stf,delay,speed,h)
{
  //取得id
  var slideBox = document.getElementById(box);
  //預設值 delay:幾毫秒滾動一次(1000毫秒=1秒)
  //       speed:數字越小越快，h:高度
  var delay = delay||1000,speed = speed||20,h = h||20;
  var tid = null,pause = false;
  //setInterval跟setTimeout的用法可以咕狗研究一下~
  var s = function(){tid=setInterval(slide, speed);}
  //主要動作的地方
  var slide = function(){
  //當滑鼠移到上面的時候就會暫停
    if(pause) return;
  //滾動條往下滾動 數字越大會越快但是看起來越不連貫，所以這邊用1
    slideBox.scrollTop += 1;
  //滾動到一個高度(h)的時候就停止
    if(slideBox.scrollTop%h == 0){
  //跟setInterval搭配使用的
      clearInterval(tid);
  //將剛剛滾動上去的前一項加回到整列的最後一項
      slideBox.appendChild(slideBox.getElementsByTagName(stf)[0]);
  //再重設滾動條到最上面
      slideBox.scrollTop = 0;
  //延遲多久再執行一次
      setTimeout(s, delay);
    }
  }
  //滑鼠移上去會暫停 移走會繼續動
  //slideBox.onmouseover=function(){pause=true;}
  //slideBox.onmouseout=function(){pause=false;}
  //起始的地方，沒有這個就不會動囉
  setTimeout(s, delay);
}
//網頁load完會執行一次
//五個屬性各別是：外面div的id名稱、包在裡面的標籤類型
//延遲毫秒數、速度、高度
slideLine('ann_box','div',2000,25,20);

</script>
</html>