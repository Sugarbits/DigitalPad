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
		right: 120px;
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
<iframe  style='margin-top: -15px; width: 100%; height: 450px; background-color:#FF9900;' scrolling="no" src="marqee2.php"  frameBorder="0">
  <p>Your browser does not support iframes.</p>
	</iframe>
<div id='results_icon' class='weather_icon'></div>
<div id='results' class='weather outline'></div>
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
   $.ajax({
  url: "../datacollection/grab_weather.php",
  cache: false
}).done(function( html ) {
	 //console.log(JSON.parse(html));
	 var obj = JSON.parse(html);
	 //$( "#results" ).html("");
	 $( "#results_icon" ).html("");
	 $( "#results_icon" ).append("<img src="+obj[1][0]+">");
	 //$( "#results" ).append(obj[2][0]);
	 //console.log(obj);
	 //$( "#results" ).append("花蓮市<BR>"+obj[3][0]+"度");
	 //$( "#results_left" ).append("濕度"+obj[4][0]+"");
    //$( "#results" ).append( html );
  });
 } 
 
 function ajax(){
   $.ajax({
  url: "../datacollection/xml_api.php",
  cache: false
}).done(function( html ) {
	 //console.log(JSON.parse(html));
	 var obj = JSON.parse(html);
	 $( "#results" ).html("");
	//$( "#results_icon" ).html("");
	 //$( "#results_left" ).html("");
	 //$( "#results_icon" ).append("<img src="+obj[3]+">");
	 //$( "#results" ).append(obj[2][0]);
	 //console.log(obj);
	 $( "#results" ).append(""+obj[0]+" °C");
	 //$( "#results_left" ).append("濕度"+obj[2][0][1]+"");
    //$( "#results" ).append( html );
  });
 }
 
});


</script>