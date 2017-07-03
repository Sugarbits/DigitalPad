<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<title>Simple Layout Demo</title>
	<script type="text/javascript" src="plugin/layout-master/jquery.js"></script>
	<script type="text/javascript" src="plugin/layout-master/jquery.layout.min.js"></script>
	
	<!--slider include-->
	<link href="indez.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="plugin/FlexSlider/flexslider.css" type="text/css" media="screen" />
	<script defer src="plugin/FlexSlider/jquery.flexslider.js"></script>
	<!--slider include END-->
	<script type="text/javascript" src="plugin/jquery-ui/jquery-ui.js"></script>
	<link href="plugin/jquery-ui/jquery-ui.css" rel="stylesheet">
	<!--<script type="text/javascript" src="js/complex.js"></script>-->
	<script type="text/javascript">

	var myLayout; // a var is required because this page utilizes: myLayout.allowOverflow() method

	$(document).ready(function () {
		myLayout = $('body').layout({
			west__showOverflowOnHover: true
		});
		myLayout.sizePane("north", '50%');
		myLayout.sizePane("east", '50%');
		myLayout.toggle("west");
		 $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: false,
        pausePlay: true,
		controlNav: false,
        start: function(slider){
        }
      });

 	});

	</script>

	<style type="text/css">
	/**
	 *	Basic Layout Theme
	 * 
	 *	This theme uses the default layout class-names for all classes
	 *	Add any 'custom class-names', from options: paneClass, resizerClass, togglerClass
	 */

	.ui-layout-pane { /* all 'panes' */ 
		background: #FFF; 
		border: 1px solid #BBB; 
		padding: 10px; 
		overflow: auto;
	} 

	.ui-layout-resizer { /* all 'resizer-bars' */ 
		background: #DDD; 
	} 

	.ui-layout-toggler { /* all 'toggler-buttons' */ 
		background: #AAA; 
	} 


	</style>

	<style type="text/css">
	/*	本人定義的	 */

	.ui-layout-north {
		background-image:url("pic/header.jpg");
	} 
	//flexslider
	.flexslider {
		width: 100%;
		height: 100%;
	}

	.flexslider .slides img {
		width: 100%;
		height: 100%;
	}
	//flexslider end
	</style>




</head>
<body>

<!-- manually attach allowOverflow method to pane -->
<div class="ui-layout-north" onmouseover="myLayout.allowOverflow('north')" onmouseout="myLayout.resetOverflow(this)">
<marquee height="90%" behavior="scroll" direction="up" loop="infinite" scrollAmount=3><font size="6">
2017-03-28	106學年度「大學個人申請入學」_試場公告	2932 <br>
2017-03-16	106學年度「大學個人申請入學」_查詢繳費帳號及通過一階篩選名單	2833<br>
2017-03-15	106學年度大專校院身心障礙學生甄試北部考區(淡江大學)接駁車行駛班次時間	77<br>
2017-03-08	106學年度碩士在職專班、數位學習碩專班招生考試面試試場分配表	332<br>
2017-03-08	106學年度「大學個人申請入學」_第二階段補充規定	2699<br>
2017-03-07	106學年度「大學繁星推薦入學」_錄取查詢	464<br>
2017-03-01	★2017陸生研究所開始報名★	69<br>
2017-02-14	106學年度「大學個人申請入學」_低收入戶考生甄試往返交通費補助相關訊息	149<br>
2017-02-14	106學年度「大學個人申請入學」_審查資料上傳作業操作說明	877<br>
2016-11-03	★淡江大學不舉辦106學年度陸生轉學考，特此公告★	466 
</font></marquee> 
</div>

<!-- allowOverflow auto-attached by option: west__showOverflowOnHover = true -->

<div class="ui-layout-west">
 
<ol id="selectable">
  <li class="ui-widget-content">Item 1</li>
  <li class="ui-widget-content">Item 2</li>
  <li class="ui-widget-content">Item 3</li>
  <li class="ui-widget-content">Item 4</li>
  <li class="ui-widget-content">Item 5</li>
  <li class="ui-widget-content">Item 6</li>
  <li class="ui-widget-content">Item 7</li>
</ol>

</div>

<div class="ui-layout-south">
	This is the south pane, closable, slidable and resizable &nbsp;
	<button onclick="myLayout.toggle('north')">Toggle North Pane</button>
</div>

<div class="ui-layout-east">
	<iframe  style='width:90%; height:450px;' scrolling="no" src="http://192.168.10.34:81/videostream.cgi?user=ty&pwd=ty">
  <p>Your browser does not support iframes.</p>
	</iframe>
</div>

<div class="ui-layout-center">
	  <div id="container" style="z-index:0;"  align="center" class="cf">


<div id="main" role="main" style='width:60%;'>
      <section class="slider">
        <div class="flexslider">
          <ul class="slides">
            <li>
  	    	  <!--  <li>
  	    	    <img src="SliderData/images/05.png" />
  	    		</li>
  	    		<li>
  	    	    <img src="SliderData/images/04.png" />
  	    		</li>-->
  	    		<li>
  	    	    <img src="SliderData/images/00.jpg" />
  	    		</li>
  	    		<li>
  	    	    <img src="SliderData/images/01.jpg" />
  	    		</li>
				<li>
  	    	    <img src="SliderData/images/02.jpg" />
  	    		</li>
				<li>
  	    	    <img src="SliderData/images/03.jpg" />
  	    		</li>
          </ul>
        </div>
      </section>
    </div>
</div>

</div>

</body>
</html>


