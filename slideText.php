<html>
<head>
<script type="text/javascript" src="plugin/jQuery.TextSlider/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="plugin/jQuery.TextSlider/js/jquery.textslider.js"></script>
<style>
body{
	background-color:#FF9900;
}
.slideText {
    position: relative;
	text-align:left;
    overflow: hidden;
    width: 1080px;
    height: 5em;
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
    text-align: left;
	width: 100%;
}
.slideText li a {
    display: block;
    overflow: hidden;
    font-size: 1em;
    height: 1.5em;
    line-height: 1.5em;
    text-decoration: none;
}

/*自己修改的，若要使用含超連結的，請刪除上面*/
.slideText li {
    display: block;
    overflow: hidden;
    font-size: 2em;
    height: 2em;
    line-height: 2em;
	color:white; 
	font-weight: bold;
    text-decoration: none;
	    width: 100%;
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
$arr = explode("\n",$str);
$echo = "<div class=\"slideText\"><ul>";
for($i=0;$i<sizeof($arr);$i++){
	$echo .= "<li>".$arr[$i]."</li>";
}
$echo .= "</ul></div>";        
    

echo $echo;
?>
<!--
<div class="slideText"><ul><li>1臺北市政府申請案件處理時限表2016/12/20臺北市政府申請案件處理時限表2016/12/20
</li><li>2臺北市捷運行政大樓地下一樓會議廳場地使用申請書2016/12/15
</li><li>3臺北市捷運行政大樓地下一樓會議廳場地收費基準表2016/12/15
</li><li>4「創新行銷合作計畫」公開徵求提案公告2016/11/18
</li><li>5臺北捷運公司廣場、藝文廊租借範圍平面圖2016/9/1
</li><li>6型塑捷運中山雙連段帶狀公園願景論壇2016/8/25
</li><li>7錄影監視系統專區2016/7/1
</li><li>8臺北市政府及所屬各機關大專院校檔案開放應用要點2016/6/29
</li><li>9貓空纜車「團購票/特定團購票」申購優惠辦法2016/1/30
</li><li>10捷運系統設置文化藝術意象作品管理要點2015/11/11</li><li>1臺北市政府申請案件處理時限表2016/12/20臺北市政府申請案件處理時限表2016/12/20
</li><li>2臺北市捷運行政大樓地下一樓會議廳場地使用申請書2016/12/15
</li><li>3臺北市捷運行政大樓地下一樓會議廳場地收費基準表2016/12/15
</li><li>4「創新行銷合作計畫」公開徵求提案公告2016/11/18
</li><li>5臺北捷運公司廣場、藝文廊租借範圍平面圖2016/9/1
</li><li>6型塑捷運中山雙連段帶狀公園願景論壇2016/8/25
</li><li>7錄影監視系統專區2016/7/1
</li><li>8臺北市政府及所屬各機關大專院校檔案開放應用要點2016/6/29
</li><li>9貓空纜車「團購票/特定團購票」申購優惠辦法2016/1/30
</li><li>10捷運系統設置文化藝術意象作品管理要點2015/11/11</li></ul></div>
-->
<!--
<marquee height="90%" behavior="scroll" direction="up" loop="infinite" scrollAmount=3><font size="6">
<?php echo $str;?>
</font></marquee> 
-->

<script>
$('.slideText').textslider({
        direction : 'scrollUp', // 捲動方向: scrollUp向上, scrollDown向下
        scrollNum : 1, // 一次捲動幾個元素
        scrollSpeed : 800, // 捲動速度(ms)
        pause : 3500 // 停頓時間(ms)
    });
</script>
</html>