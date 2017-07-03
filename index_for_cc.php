<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple Layout Demo</title>
<script type="text/javascript" src="plugin/jquery.min.js"></script>
<link href="indez.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="plugin/FlexSlider/flexslider.css" type="text/css" media="screen" />
<script defer src="plugin/FlexSlider/jquery.flexslider.js"></script>
<!--slider include END-->
<script type="text/javascript" src="plugin/jquery-ui/jquery-ui.min.js"></script>
<link href="plugin/jquery-ui/jquery-ui.min.css" rel="stylesheet">
	<style type="text/css">
	/*	本人定義的	 */
	.outline {
		background: rgba(0%,10%,20%,0.6);
  // -webkit-text-stroke: 2px #a23;
   //color: white;
   text-shadow:
    //3px 3px 0 #000,
     -1px -1px 0 #000,  
      1px -1px 0 #000,
     -1px 1px 0 #000,
      1px 1px 0 #000;
	}
	.weather{
		position:absolute;
		font-size: 35px;
		color:white;
		right:20px;
		bottom: 140px;
	}
	.weather_icon{
		z-index:10;
		position:absolute;
		font-size: 25px;
		right: 130px;
		bottom: 140px;
	}
	.pic_fb{
		z-index:10;
		position:absolute;
		right:10px;
		bottom: 70px;
	}
	.pic_fb>img {
		max-width: 300px;
		height: auto;
	}
    body {
	margin-left: 0px;
	overflow:hidden;
}
    </style>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div  class='pic_fb'>
 <img  src="pic/FBS.gif" />
</div>
    <div  class='black-word'></div>
    
	<iframe  style='overflow: visible; width: 102%; height: 700px; display: block; position: relative; visibility: visible; z-index: 0; top: -8px; left: -1%;' scrolling="no" src="pic_file.php"  frameBorder="0">
  <p>Your browser does not support iframes.</p>

	</iframe>

<table width='100%' border='0'><tr>
<td width='80%'>
<iframe  style='margin-top: -81px;margin-left: -2px; width: 100%; height: 450px; background-color:#FF9900;' scrolling="no" src="marqee2.php"  frameBorder="0">
  <p>Your browser does not support iframes.</p>
	</iframe>
</td>
<td width='20%' >
<iframe  style='margin-top: -81px;margin-left: -6px; width: 110%; height: 450px; background-color:rgba(0%,10%,20%,0.6);' scrolling="no" src="marqee3.php"  frameBorder="0">
  <p>Your browser does not support iframes.</p>
	</iframe>
</td>
</tr></table>
<!--
<div id='results_icon' class='weather_icon'>
<iframe style=' width: 105px; height: 50px; ' scrolling="no" src="http://192.168.10.111/datacollection/grab_temp2.php"  frameBorder="0">
  <p>Your browser does not support iframes.</p>
	</iframe>
</div>
<div id='results' class='weather outline'>
<iframe style=' width: 105px; height: 50px; ' scrolling="no" src="http://192.168.10.111/datacollection/grab_temp.php"  frameBorder="0">
  <p>Your browser does not support iframes.</p>
	</iframe>
</div>
-->

</body>
</html>

<script>
setInterval(function() {
                  window.location.reload();
                }, 1800000);

$(function(){
	function setIntervalAndExecute(fn, t) {
    fn();
    return(setInterval(fn, t));
	}
 setIntervalAndExecute(ajax,(60*1000));
 setIntervalAndExecute(ajax_old,(60*1000)); 
 
 function ajax_old(){
	 //沒有網路，請192.168.10.111支援
	 //$( "#results_icon" ).html("");
	//$( "#results_icon" ).append("<img src='http://192.168.10.111/datacollection/weather.gif'>");
	;
 } 
 
 function ajax(){
 	 //$( "#results" ).append(""+obj[0]+" °C");
 }
});


</script>