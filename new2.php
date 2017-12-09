<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple Layout Demo</title>
<script type="text/javascript" src="plugin/jquery.min.js"></script>
<link rel="stylesheet" href="plugin/FlexSlider/flexslider.css" type="text/css" media="screen" />
<script defer src="plugin/FlexSlider/jquery.flexslider.js"></script>
<!--slider include END-->
<script type="text/javascript" src="plugin/jquery-ui/jquery-ui.min.js"></script>
<link href="plugin/jquery-ui/jquery-ui.min.css" rel="stylesheet">
	<style type="text/css">
    body {
	margin-left: 0px;
	overflow:hidden;
	padding: 0;
	background:#00FF00;
	}
	.div_a{
	 //background-image:url('http://placehold.it/500/f00/000000&text=75/100+DIV+A');
	 background-image:url('http://placehold.it/1000x500/f00/000000&text=Slider');
	 width:100vw;
	 height:87.5vh;
	}
	.div_a iframe {display: block; width: 100%; height: 100%; border: none;}
    .div_b{
	 //background-image:url('http://placehold.it/300X100/faa/000000&text=25/100+DIV+B');
	 //background-image:url('http://placehold.it/300X100/afa/000000&text=25/100+DIV+B');
	 width:100vw;
	 height:12.5vh;
	}
	.div_bc{
	 background-image:url('http://placehold.it/200X160/f0f/000000&text=Mark');
	 //background-image:url('http://placehold.it/200X160/f0f/000000&text=100/10DIV+BC');
	background-image: url("new_pic/TY.jpg");
	background-repeat: no-repeat, repeat;
	width:64px;
	height:64px;
	 background-position:50% 55%;
	 width:10%;
	 height:100%;
	 float:left;  672 1024
	}
	.div_bd{
	 background-image:url('http://placehold.it/800X120/faa/000000&text=Marquee');
	 //background-image:url('http://placehold.it/200X160/faa/000000&text=100/10DIV+BC');
	 width:85%;
	 height:100%;
	 float:left;
	}
	.div_bd iframe {display: block; width: 100%; height: 100%; border: none;}
	.div_be{
	 //background-image:url('http://placehold.it/200X220/a0a/000000&text=Widget');
	 //background-image:url('http://placehold.it/200X220/a0a/000000&text=100/10DIV+BD');
	 background-position:50% 55%;
	 width:10%;
	 height:100%;
	 float:left;
	}
	.div_f{
	// background-image:url('http://placehold.it/120X100/fff/000000&text=Widget2');
	  background-color:rgba(255,255,255,0.5);
	  top: 9%;
	  right: 3%;
	 width:12%;
	 height:16%;
	 position:absolute;
	}
	.div_f_in{
	// background-image:url('http://placehold.it/120X100/fff/000000&text=Widget2');
	  opacity: 0.9;
	  top: 9%;
	  right: 3%;
	 width:12%;
	 height:16%;
	 position:absolute;
	}
    </style>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div class='div_a'>
<iframe  style='overflow: visible; display: block; position: relative; visibility: visible; z-index: 0;' scrolling="no" src="new_main.php"  frameBorder="0">
  <p>Your browser does not support iframes.</p>
	</iframe></div>
<div class='div_b'>
	<!--<div class='div_bc'></div>-->
	<div class='div_bd'>
	<iframe  style='background-color:gray;' scrolling="no" src="new_marquee.php"  frameBorder="0">
		<p>Your browser does not support iframes.</p>
	</iframe>
	</div>
	<div class='div_be'>
	<iframe  style='overflow: visible; display: block; position: relative; visibility: visible; z-index: 0;' scrolling="no" src="new_widget1.php"  frameBorder="0">
	<p>Your browser does not support iframes.</p>
	</iframe>
	</div>
</div>
<div class='div_f'>
</div>
<div class='div_f_in'>
<iframe  style='overflow: visible; display: block; position: relative; visibility: visible; z-index: 0;' scrolling="no" src="new_widget2.php"  frameBorder="0">
  <p>Your browser does not support iframes.</p>
	</iframe>
</div>
</body>
</html>