<!DOCTYPE html>
<!--slider include-->
<link href="indez.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="plugin/FlexSlider/flexslider.css" type="text/css" media="screen" />
<!--slider include END-->

<meta charset="UTF-8" />

        <div class="flexslider">
          <ul class="slides">
  	    	  <!--  <li>
  	    	    <img src="SliderData/images/05.png" />
  	    		</li>
  	    		<li>
  	    	    <img src="SliderData/images/04.png" />
  	    		</li>-->
  	    		<li>
  	    	    <img src="pic/slider_pic/00.jpg" />
  	    		</li>
  	    		<li>
  	    	    <img src="pic/slider_pic/01.jpg" />
  	    		</li>
				<li>
  	    	    <img src="pic/slider_pic/02.jpg" />
  	    		</li>
				<li>
  	    	    <img src="pic/slider_pic/03.jpg" />
  	    		</li>
          </ul>
        </div>

 <!-- jQuery -->
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

  <!-- Optional FlexSlider Additions -->



 <!--
<div style="width: 100px; float:left; height:100px; background:magenta; margin:20px">DIV 1</div>
<div style="width: 100px; float:left; height:100px; background:green; margin:20px">DIV 2</div>
<div style="width: 100px; float:left; height:100px; background:cyan; margin:20px">DIV 3</div>
-->
<!--<a href="javascript: alert('01');">
<span   class="word"></span>-->

<!--<form id="form0">
<fieldset> 
<legend>
客製化表單
</legend>
<input type='text'>
</fieldset>
</form>
-->


</html>

